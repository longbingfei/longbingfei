<?php
/**
 * Created by PhpStorm.
 * User: zhangxian
 * Date: 16/12/27
 * Time: 上午10:52
 */
namespace App\Repositories\Eloquents;

use App\Traits\Functions;
use Illuminate\Support\Facades\Auth;
use App\Models\Publish as PublishModel;
use App\Repositories\InterfacesBag\Image as ImageInterface;
use App\Repositories\InterfacesBag\Video as VideoInterface;
use App\Repositories\InterfacesBag\Article as ArticleInterface;
use App\Repositories\InterfacesBag\Product as ProductInterface;
use App\Repositories\InterfacesBag\Publish as PublishInterface;
use App\Repositories\InterfacesBag\Gallery as GalleryInterface;

class Publish implements PublishInterface
{
    use Functions;
    protected $module = 'publish';

    protected $image, $video, $article, $product, $gallery;

    public function __construct(ImageInterface $image, VideoInterface $video, ArticleInterface $article,
                                ProductInterface $product, GalleryInterface $gallery)
    {
        $this->image = $image;
        $this->video = $video;
        $this->article = $article;
        $this->product = $product;
        $this->gallery = $gallery;

    }

    public function index(array $condition)
    {
        $condition = array_filter($condition, 'strlen');
        $page = isset($condition['page']) ? $condition['page'] : 1;
        $per_page_num = isset($condition['per_page_num']) ? $condition['per_page_num'] : 15;
        $publish = PublishModel::where('id', '>', '0');
        array_map(function($y) use (&$publish, $condition) {
            if (isset($condition[$y])) {
                $s = '=';
                $w = $condition[$y];
                if (in_array($y, ['keywords', 'title'])) {
                    $s = 'like';
                    $w = '%' . $condition[$y] . '%';
                }
                $publish = $publish->where($y, $s, $w);
            }
        }, ['type', 'keywords', 'title', 'weight']);
        $publish = $publish->paginate($per_page_num, ['*'], 'page', $page)->toArray();

        return $publish;

    }

    public function show($id)
    {
        if (!$publish = PublishModel::find($id)) {
            return ['error_code' => 1604];
        }
        if (file_exists(public_path($publish->path))) {
            return redirect(url($publish->path));
        }
        $publish = $this->create(['id' => $publish->cid, 'type' => $publish->type, 'tpl_id' => null, 'path' => null]);

        return redirect(url($publish->path));
    }

    public function create(array $data)
    {
        if (!$content_id = $data['content_id']) {
            return ['error_code' => 1600];
        }
        if ((!$type = $data['type']) || !isset($this->{strtolower($data['type'])})) {
            return ['error_code' => 1601];
        }
        $detail = $this->$type->show($content_id);
        $tpl = $data['tpl_id'] ? : 'tpl.default.' . $type . '_detail';
        $html = view($tpl, ['detail' => $detail])->render();
        $params = $type == 'product' ? [
            'title'     => $detail['name'],
            'keywords'  => '',
            'index_pic' => empty($detail['images']) ? [] : current($detail['images'])['thumb'],
        ] : [
            'title'     => $detail['title'],
            'keywords'  => '',
            'index_pic' => empty($detail['index_pic']) ? '' : $detail['index_pic']['thumb'],
        ];
        $params['tag_ids'] = $detail['tag_ids'];
        $params['user_id'] = Auth::id();
        if ($publish = PublishModel::where('cid', $content_id)->where('type', $type)->first()) {
            $path = $publish->path;
            $this->checkDir(dirname($path));
            file_put_contents(public_path($path), $html);
            $publish = $this->update($publish->id, $params);
        } else {
            if (!$path = $this->checkDir($data['path'] ? : $type . '/' . Date('Y/m/d') . '/', 1)) {
                return ['error_code' => 1602];
            }
            $filename = microtime(1) * 10000 . '.html';
            $path = $path . $filename;
            file_put_contents(public_path($path), $html);
            $params['cid'] = $content_id;
            $params['type'] = $type;
            $params['path'] = $path;
            if (!$publish = PublishModel::create($params)) {
                return ['error_code' => 1603];
            }
            event('log', [[$this->module, 'c', $publish]]);
        }

        return $publish;
    }

    public function update($id, array $data)
    {
        if (!$before = PublishModel::find($id)) {
            return ['error_code' => 1604];
        }
        $data = array_intersect_key($data, array_flip(
                [
                    'title',
                    'keywords',
                    'index_pic',
                    'tag_ids',
                    'user_id',
                    'path'
                ]
            )
        );
        if (!PublishModel::where('id', $id)->update($data)) {
            return ['error_code' => 1605];
        }
        $after = PublishModel::find($id);
        event('log', [[$this->module, 'u', ['before' => $before, 'after' => $after]]]);

        return $after;
    }

    public function delete($id)
    {
        if (!$publish = PublishModel::find($id)) {
            return ['error_code' => 1604];
        }
        $path = $publish->path;
        if (!$publish->delete()) {
            return ['error_code' => 1606];
        }
        unlink(public_path($path));
        event('log', [[$this->module, 'd', $publish]]);

        return $publish;
    }
}