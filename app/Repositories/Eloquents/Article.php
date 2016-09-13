<?php
/**
 * Created by PhpStorm.
 * User: zhangxian
 * Date: 16/5/19
 * Time: 上午9:20
 */
namespace App\Repositories\Eloquents;

use Auth;
use Illuminate\Http\Request;
use App\Models\Article as ArticleModel;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use App\Repositories\InterfacesBag\Image as ImageInterface;
use App\Repositories\InterfacesBag\Article as ArticleInterface;

class Article implements ArticleInterface
{
    protected $module = 'article';
    protected $image;

    public function __construct(ImageInterface $image)
    {
        $this->image = $image;
    }

    //文稿列表
    public function index(array $condition)
    {
        $articles = ArticleModel::where('articles.id', '>', 0);
        if ($user_id = intval($condition['user_id'])) {
            $articles = $articles->where('articles.user_id', $user_id);
        }
        if ($sort_id = intval($condition['sort_id'])) {
            $articles = $articles->where('articles.sort_id', $sort_id);
        }
        if ($title = trim($condition['title'])) {
            $articles = $articles->where('articles.title', 'like', '%' . $title . '%');
        }
        if ($created_at = trim($condition['created_at'])) {
            $articles = $articles->where('articles.created_at', '>=', $created_at);
        }
        if ($updated_at = trim($condition['updated_at'])) {
            $articles = $articles->where('articles.updated_at', '>=', $updated_at);
        }
        $articles = $articles->leftJoin('article_sorts', 'articles.sort_id', '=', 'article_sorts.id')
            ->leftJoin('administrators', 'articles.author_id', '=', 'administrators.id')
            ->select(
                'articles.*',
                'article_sorts.name as sort_name',
                'administrators.username as author_name'
            );
        $orderBy = trim($condition['order_by']) ? trim($condition['order_by']) : 'id';
        $order = strtoupper(trim($condition['order'])) === 'ASC' ? 'ASC' : 'DESC';
        $articles = $articles->orderBy('articles.' . $orderBy, $order);
        $per_page_num = intval($condition['per_page_num']) ? intval($condition['per_page_num']) : 15;
        $page = intval($condition['page']) ? intval($condition['page']) : 0;
        $articles = $articles->paginate($per_page_num, ['*'], 'page', $page)->toArray();
        $articles['data'] = array_map(function($value) {
            $value['index_pic'] = $value['index_pic'] ? unserialize($value['index_pic']) : [];

            return $value;
        }, $articles['data']);

        return $articles;
    }

    //文稿详情
    public function show($id)
    {
        if (!$article = ArticleModel::where('id', $id)->first()) {
            return ["errorCode" => 1203];
        }
        $article = ArticleModel::where('articles.id', $id)
            ->leftJoin('article_sorts', 'articles.sort_id', '=', 'article_sorts.id')
            ->leftJoin('administrators', 'articles.author_id', '=', 'administrators.id')
            ->select(
                'articles.*',
                'article_sorts.name as sort_name',
                'administrators.username as author_name'
            );

        return $article->first()->toArray();
    }

    //文稿新建
    public function create(array $data)
    {
        $data['author_id'] = Auth::id();
        $data['sort_id'] = $data['sort_id'] ? $data['sort_id'] : 1;
        $data['status'] = $data['status'] ? 1 : 0;
        if ($data['file'] instanceof UploadedFile) {
            $image = $this->image->create($data['file']);
            $data['index_pic'] = serialize($image);
        }

        if ($article = ArticleModel::create($data)) {
            event('log', [[$this->module, 'c', $data]]);

            return $article;
        }

        return ["errorCode" => 1205];
    }

    //文稿更新
    public function update($id, array $data)
    {
        $data = array_filter($data);
        if (!$before = ArticleModel::where('id', $id)->first()) {
            return ["errorCode" => 1203];
        }
        $data['content'] = isset($data['content']) ? $data['content'] : '';
        $data['editor_id'] = Auth::id();
        if (isset($data['file']) && $data['file'] instanceof UploadedFile) {
            $image = $this->image->create($data['file']);
            $data['index_pic'] = serialize($image);
            unset($data['file']);
        }
        if (ArticleModel::where('id', $id)->update($data)) {
            $after = ArticleModel::findOrFail($id);
            if ($before->index_pic && ($image = unserialize($before->index_pic))) {
                $this->image->delete($image['id']);
            }
            event('log', [[$this->module, 'u', ['before' => $before, 'after' => $after]]]);

            return $after;
        }
    }

    //文稿删除
    public function delete($id)
    {
        if (!$info = ArticleModel::where('id', $id)->first()) {
            return ["errorCode" => 1203];
        }
        if (ArticleModel::destroy($id)) {
            if ($info->index_pic && ($image = unserialize($info->index_pic))) {
                $this->image->delete($image['id']);
            }
            event('log', [[$this->module, 'd', $info]]);

            return $info->toArray();
        }

        return ["errorCode" => 1204];
    }
}