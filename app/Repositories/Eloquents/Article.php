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
    public function index($condition = ['page'=>0]){
        $article_model = ArticleModel::orderBy('articles.id','DESC');
        $articles = $article_model
            ->leftJoin('article_sorts','articles.sort_id','=','article_sorts.id')
            ->leftJoin('administrators','articles.author_id','=','administrators.id')
            ->select
        (
            'articles.*',
            'article_sorts.name as sort_name',
            'administrators.username as author_name'
        )
            ->paginate(10,'*','page',intval($condition['page']))->toArray(); //paginate($per_page_num,array $colums,
        //$pageName,$page);

        return $articles;
    }
    public function show($id){
        $article = ArticleModel::findOrFail($id);
        $article['content'] = htmlspecialchars_decode($article['content']);

        return $article;
    }
    public function create(array $data){
        $data['author_id'] = Auth::id();
        $data['content'] = htmlspecialchars($data['content']);
        $data['sort_id'] = isset($data['sort_id']) ?  intval($data['sort_id']) : 1;
        if($article = ArticleModel::create($data)){
            event('log',[[$this->module,'c',$data]]);

            return $article;
        }
    }
    public function update($id,array $data){
        $before = ArticleModel::findOrFail($id);
        $data['content'] = htmlspecialchars($data['content']);
        if(isset($data['status'])){
            $data['status'] = intval($data['status']);
        }
        $data['editor_id'] = Auth::id();
        if(ArticleModel::where('id',$id)->update($data)){
            $after = ArticleModel::findOrFail($id);
            event('log',[[$this->module,'u',['before'=>$before,'after'=>$after]]]);

            return $after;
        }
    }
    public function delete($id){
        $info = ArticleModel::findOrFail($id);
        if(ArticleModel::destroy($id)){
            event('log',[[$this->module,'d',$info]]);

            return $info;
        }
    }
}