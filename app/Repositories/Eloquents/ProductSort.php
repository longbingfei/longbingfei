<?php
/**
 * Created by PhpStorm.
 * User: zhangxian
 * Date: 16/5/19
 * Time: 上午9:11
 */
namespace App\Repositories\Eloquents;

use Auth;
use App\Models\ProductSort as ProductSortModel;
use App\Repositories\InterfacesBag\ProductSort as ProductSortInterface;

class ProductSort implements ProductSortInterface
{
    protected $module = 'product-sort';

    public function index()
    {
        $product = ProductSortModel::all();

        return $product->count() ? $product->toArray() : [];
    }

    public function create(array $data)
    {
        $data['user_id'] = Auth::id();
        $data['fid'] = isset($data['fid']) ? intval($data['fid']) : 0;
        $father = ProductSortModel::where('id', $data['fid'])->first();
        if ($data['fid'] && !$father) {
            return ['errorCode' => 1312];
        }
        if (ProductSortModel::where('fid', $data['fid'])->where('name', $data['name'])->count()) {
            event('log', [[$this->module, 'c', 'sort_already_exist', 0]]);

            return ['errorCode' => 1311];
        }
        $newSort = ProductSortModel::create($data)->toArray();
        event('log', [[$this->module, 'c', $newSort]]);
        if ($father && $father->is_last) {
            $father->update(['is_last' => 0]);
        }

        return $newSort;
    }

    public function update($id, array $data)
    {
        $data['user_id'] = Auth::id();
        $before = ProductSortModel::findOrfail($id)->toArray();
        if (ProductSortModel::where('name', $data['name'])->count()) {
            event('log', [[$this->module, 'u', 'sort_already_exist', 0]]);

            return 0;
        }

        if (ProductSortModel::where('id', $id)->update($data)) {
            event('log', [[$this->module, 'u', ['before' => $before, 'after' => ProductSortModel::findOrfail($id)->toArray()
            ]]]);

            return 1;
        }
    }

    public function delete($id)
    {
        $info = ProductSortModel::findOrFail($id)->toArray();
        if (ProductSortModel::destroy($id)) {
            event('log', [[$this->module, 'd', $info]]);

            return 1;
        }
    }
}