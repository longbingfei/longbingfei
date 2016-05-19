<?php
/**
 * Created by PhpStorm.
 * User: zhangxian
 * Date: 16/5/19
 * Time: 上午9:20
 */
namespace App\Repositories\Eloquents;
use App\Repositories\InterfacesBag\Article as ArticleInterface;
use App\Models\Article as ArticleModel;
use Auth;
class Article implements ArticleInterface{
    protected $module = 'article';
    public function index(){
        return ArticleModel::all();
    }
    public function show($id){
        $article = ArticleModel::findOrFail($id)->toArray();
        $article['content'] = htmlspecialchars_decode($article['content']);

        return $article;
    }
    public function create(array $data){
        $data['author_id'] = Auth::id();
        $data['content'] = htmlspecialchars($data['content']);
        $data['sort_id'] = isset($data['sort_id']) ?  intval($data['sort_id']) : 1;
        if($article = ArticleModel::create($data)){
            event('log',[[$this->module,'c',$data]]);

            return 1;
        }
    }
    public function update($id,array $data){
        $before = ArticleModel::findOrFail($id)->toArray();
        $data['content'] = htmlspecialchars($data['content']);
        if(isset($data['status'])){
            $data['status'] = intval($data['status']);
        }
        $data['editor_id'] = Auth::id();
        if(ArticleModel::where('id',$id)->update($data)){
            event('log',[[$this->module,'u',['before'=>$before,'after'=>ArticleModel::findOrFail($id)->toArray()]]]);

            return 1;
        }
    }
    public function delete($id){
        $info = ArticleModel::findOrFail()->toArray();
        if(ArticleModel::destroy($id)){
            event('log',[[$this->module,'d',$info]]);

            return 1;
        }
    }
}