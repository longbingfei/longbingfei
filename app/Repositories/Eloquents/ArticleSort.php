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

    public function index()
    {
        return ArticleSortModel::all();
    }

    public function create(array $data)
    {
        $data['user_id'] = Auth::id();

        if (ArticleSortModel::where('name', $data['name'])->count()) {
            event('log', [[$this->module, 'c', 'sort_already_exist', 0]]);

            return 0;
        }
        ArticleSortModel::create($data);
        event('log', [[$this->module, 'c', $data]]);

        return 1;
    }

    public function update($id, array $data)
    {
        $data['user_id'] = Auth::id();
        $before = ArticleSortModel::findOrfail($id)->toArray();
        if (ArticleSortModel::where('name', $data['name'])->count()) {
            event('log', [[$this->module, 'u', 'sort_already_exist', 0]]);

            return 0;
        }

        if (ArticleSortModel::where('id', $id)->update($data)) {
            event('log', [[$this->module, 'u', ['before' => $before, 'after' => ArticleSortModel::findOrfail($id)->toArray()
            ]]]);

            return 1;
        }
    }

    public function delete($id)
    {
        $info = ArticleSortModel::findOrFail($id)->toArray();
        if (ArticleSortModel::destroy($id)) {
            event('log', [[$this->module, 'd', $info]]);

            return 1;
        }
    }
}