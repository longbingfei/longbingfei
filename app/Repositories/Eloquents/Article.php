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
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use App\Repositories\InterfacesBag\Tag as TagInterface;
use App\Repositories\InterfacesBag\Image as ImageInterface;
use App\Repositories\InterfacesBag\Article as ArticleInterface;

class Article implements ArticleInterface
{
    protected $module = 'article';
    protected $image;
    protected $tag;

    public function __construct(ImageInterface $image, TagInterface $tag)
    {
        $this->image = $image;
        $this->tag = $tag;
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
        //查询符合标签ids的内容
        if ($tag_ids = trim($condition['tag_ids'])) {
            foreach (explode(',', $tag_ids) as $vo) {
                $articles = $articles->whereRaw("FIND_IN_SET($vo, articles.tag_ids)");
            }
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
        $articles = $articles
            ->leftJoin('article_sorts', 'articles.sort_id', '=', 'article_sorts.id')
            ->leftJoin('administrators', 'articles.author_id', '=', 'administrators.id')
            ->leftJoin('tags', DB::raw('FIND_IN_SET(tags.id,articles.tag_ids)'), DB::raw(null), DB::raw(null))
            ->groupBy('articles.id')
            ->select(
                'articles.*',
                'article_sorts.name AS sort_name',
                'administrators.username AS author_name',
                DB::raw('GROUP_CONCAT(tags.name) AS tag_names')
            );
        $orderBy = trim($condition['order_by']) ? trim($condition['order_by']) : 'id';
        $order = strtoupper(trim($condition['order'])) === 'ASC' ? 'ASC' : 'DESC';
        $articles = $articles->orderBy('articles.' . $orderBy, $order);
        $per_page_num = intval($condition['per_page_num']) ? intval($condition['per_page_num']) : 15;
        $page = intval($condition['page']) ? intval($condition['page']) : 0;
        $articles = $articles->paginate($per_page_num, ['*'], 'page', $page)->toArray();
        $articles['data'] = array_map(function($value) {
            $value['index_pic'] = json_decode($value['index_pic'], 1) ? : [];

            return $value;
        }, $articles['data']);

        return $articles;
    }

    //文稿详情
    public function show($id)
    {
        if (!$article = ArticleModel::where('id', $id)->first()) {
            return ["error_code" => 1203];
        }
        $article = ArticleModel::where('articles.id', $id)
            ->leftJoin('article_sorts', 'articles.sort_id', '=', 'article_sorts.id')
            ->leftJoin('administrators', 'articles.author_id', '=', 'administrators.id')
            ->leftJoin('tags', DB::raw("FIND_IN_SET(tags.id,articles.tag_ids)"), DB::raw(null), DB::raw(null))
            ->groupBy('articles.id')
            ->select(
                'articles.*',
                'article_sorts.name AS sort_name',
                'administrators.username AS author_name',
                DB::raw('GROUP_CONCAT(tags.name) AS tag_names')
            );
        $article = $article->first()->toArray();
        $article['index_pic'] = json_decode($article['index_pic'], 1) ? : [];

        return $article;
    }

    //文稿新建
    public function create(array $data)
    {
        $data['author_id'] = Auth::id();
        $data['sort_id'] = $data['sort_id'] ? $data['sort_id'] : 1;
        $data['status'] = $data['status'] ? 1 : 0;
        if ($data['tag_ids']) {
            $data['tag_ids'] = $this->tag->filterTagByIds($data['tag_ids']);
        }
        if ($data['file'] instanceof UploadedFile) {
            $image = $this->image->create($data['file']);
            $data['index_pic'] = json_encode($image);
        }

        if (!$article = ArticleModel::create($data)) {
            return ["error_code" => 1205];
        }
        event('log', [[$this->module, 'c', $article]]);
        if ($data['tag_ids']) {
            $this->tag->changeTagCount(['after' => $data['tag_ids']]);
        }

        return $article;
    }

    //文稿更新
    public function update($id, array $data)
    {
        $data = array_filter($data);
        if (!$before = ArticleModel::where('id', $id)->first()) {
            return ["error_code" => 1203];
        }
        if (isset($data['content'])) {
            $data['content'] = trim($data['content']);
        }
        if (isset($data['tag_ids'])) {
            $data['tag_ids'] = $this->tag->filterTagByIds($data['tag_ids']);
        }
        $data['editor_id'] = Auth::id();
        if (isset($data['file']) && $data['file'] instanceof UploadedFile) {
            $image = $this->image->create($data['file']);
            $data['index_pic'] = json_encode($image);
            unset($data['file']);
        }
        if (!ArticleModel::where('id', $id)->update($data)) {
            return ["error_code" => 1209];
        }
        $after = ArticleModel::where('id', $id)->first();
        if (isset($data['index_pic']) && $before->index_pic && ($image = json_decode($before->index_pic, 1))) {
            $this->image->delete($image['id']);
        }
        if (isset($data['tag_ids']) && !empty($data['tag_ids'])) {
            $this->tag->changeTagCount(['before' => $before->tag_ids, 'after' => $data['tag_ids']]);
        }
        event('log', [[$this->module, 'u', ['before' => $before, 'after' => $after]]]);

        return $after;
    }

    //文稿删除
    public function delete($id)
    {
        if (!$info = ArticleModel::where('id', $id)->first()) {
            return ["error_code" => 1203];
        }
        if (!ArticleModel::destroy($id)) {
            return ["error_code" => 1204];
        }
        if ($info->index_pic && ($image = json_decode($info->index_pic, 1))) {
            $this->image->delete($image['id']);
        }
        if ($tag_ids = $info->tag_ids) {
            $this->tag->changeTagCount(['before' => $tag_ids]);
        }
        event('log', [[$this->module, 'd', $info]]);

        return $info->toArray();
    }
}