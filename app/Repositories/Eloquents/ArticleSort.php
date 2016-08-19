<?php
/**
 * Created by PhpStorm.
 * User: zhangxian
 * Date: 16/5/19
 * Time: 上午9:17
 */
namespace App\Repositories\Eloquents;

use Auth;
use App\Models\ArticleSort as ArticleSortModel;
use App\Repositories\InterfacesBag\ArticleSort as ArticleSortInterface;

class ArticleSort implements ArticleSortInterface
{
    protected $module = 'article-sort';

    public function index($fid = 0)
    {
        return ArticleSortModel::where('fid', intval($fid))->get()->toArray();
    }

    public function create(array $data)
    {
        $data['user_id'] = Auth::id();

        if (ArticleSortModel::where('name', $data['name'])->count()) {
            event('log', [[$this->module, 'c', 'sort_already_exist', 0]]);

            return ['errorCode' => 1206];
        }

        if ($sort = ArticleSortModel::create($data)->toArray()) {
            event('log', [[$this->module, 'c', $sort]]);

            return $sort;
        }
    }

    public function update($id, $name)
    {
        $data['user_id'] = Auth::id();
        if (!$name = trim($name)) {
            return ['errorCode' => 1208];
        }
        if (!$before = ArticleSortModel::where('id', $id)->first()) {
            return ['errorCode' => 1207];
        }
        if (ArticleSortModel::where('name', $name)->count()) {
            event('log', [[$this->module, 'u', 'sort_already_exist', 0]]);

            return ['errorCode' => 1206];
        }

        if (ArticleSortModel::where('id', $id)->update(['name' => $name])) {
            $after = ArticleSortModel::where('id', $id)->first();
            event('log', [[$this->module, 'u', ['before' => $before, 'after' => $after]]]);

            return $after;
        }
    }

    public function delete($id)
    {
        if (!$info = ArticleSortModel::where('id', $id)->first()) {
            return ['errorCode' => 1207];
        }
        if (ArticleSortModel::destroy($id)) {
            event('log', [[$this->module, 'd', $info]]);

            return $info;
        }
    }
}