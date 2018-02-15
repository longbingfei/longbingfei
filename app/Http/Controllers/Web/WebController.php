<?php

namespace App\Http\Controllers\Web;

use App\Models\Company as CompanyModel;
use App\Models\Need;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Http\Controllers\Controller;
use App\Models\WebUser as WebUserModel;
use Illuminate\Support\Facades\Auth;
use Qiniu\Auth as QiniuAuth;
use App\Models\QiniuUpload as QiniuUploadModel;
use Illuminate\Support\Facades\DB;
use App\Models\City as CityModel;
use App\Models\Prd as PrdModel;
use App\Models\NeedCompany as NCModel;
use App\Models\News as NewsModel;


class WebController extends Controller
{
    private function checkAdmin()
    {
        if (!session('id') || session('id') != 1) {
            return redirect('/');
        }
    }

    public function index()
    {
        $c_images = unserialize(DB::table('net')->first()->index_images);
        $news = NewsModel::where(['is_promote' => 1])->limit(4)->orderBy('id', 'desc')->get()->toArray();
        $news = array_map(function ($y) {
            $res = preg_match('<img.*?src=[\'\"](.*?)[\'\"]>', $y['content'], $m);
            $y['cover'] = $res ? $m[1] : '/asset/web/image/news_default.jpg';
            return $y;
        }, $news);
        $data = [
            'index' => true,
            'news' => $news,
            'c_images' => $c_images,
        ];
        $net = DB::table('net')->first();
        $net = [
            'wechat_image' => $net->wechat_image,
            'about_us' => $net->about_us,
            'service' => $net->service,
            'help' => $net->help,
            'zone' => $net->zone,
            'address' => $net->address,
            'tel' => $net->tel,
            'email' => $net->email,
        ];
        session(['net' => $net]);
        return view('tpl.default.index', $data);
    }

    public function news()
    {
        $news = NewsModel::where(['is_promote' => 1])->orderBy('id', 'desc')->paginate(15)->get()->toArray();
        $data = [
            'news' => $news,
        ];
        return view('tpl.default.news', $data);
    }

    public function newsDetail($id)
    {

        return request()->get('is_ajax') ? NewsModel::find($id) : view('tpl.default.newsDetail', ['news' => NewsModel::find($id)]);
    }

    public function need()
    {
        $needs = DB::table('needs')->where('needs.status', '>', 0)
            ->leftjoin('need_company', 'need_company.need_id', '=', 'needs.id')
            ->groupBy('needs.id')
            ->select(['needs.*', DB::raw('count(need_company.need_id) as baomingshu')])
            ->paginate(10);
        $data = ['data' => $needs];
        return view('tpl.default.need', $data);
    }

    public function needDetail($id)
    {
        $data = DB::table('needs')->where(['id' => $id])->first();
        $data->images = unserialize($data->images);
        $data->companys = NCModel::where(['need_company.need_id' => $id])
            ->leftJoin('companys', 'need_company.company_id', '=', 'companys.id')
            ->groupBy('companys.id')
            ->select(['companys.*'])->paginate(10);
        $data->companys_user = array_map(function ($y) {
            return $y['user_id'];
        }, $data->companys->toArray()['data']);
        if (session('id') && session('type')) {
            $self_company = CompanyModel::where('user_id', session('id'))->first();
        }
        $data->self_company = isset($self_company) ? $self_company->id : 0;
        return view('tpl.default.need_detail', ['data' => $data]);
    }

    public function needForm()
    {
        if (!Auth::check()) {
            return redirect('/login');
        }
        $data = [
            'qiniu_access_token' => $this->getQiniuUploadToken(),
            'qiniu_img_domain' => env('QINIU_IMG_DOMAIN')
        ];
        return view('tpl.default.need_form', $data);
    }

    public function needUpdateForm($id)
    {
        if (!Auth::check()) {
            return redirect('/login');
        }
        $data = DB::table('needs')->where(['id' => $id])->first();
        if (!$data || !in_array(session('id'), [1, $data->user_id])) {
            return ['error_msg' => '不合法的修改请求！'];
        }
        $data->images = $data->images ? unserialize($data->images) : [];
        $data = [
            'detail' => $data,
            'qiniu_access_token' => $this->getQiniuUploadToken(),
            'qiniu_img_domain' => env('QINIU_IMG_DOMAIN')
        ];
        return view('tpl.default.need_update_form', $data);
    }

    public function createNeed()
    {
        if (!Auth::check()) {
            return redirect('/login');
        }
        $filters = [
            'sort_id',
            'area_id',
            'period',
            'fork',
            'hot',
            'title',
            'company_name',
            'budget',
            'tel',
            'qq',
            'wechat',
            'images',
            'describe',
            'mark',
        ];
        $data = request()->only($filters);
        $data['images'] = $data['images'] ? serialize($data['images']) : '';
        $data['user_id'] = session('id');
        $data['created_at'] = $data['updated_at'] = Date('Y-m-d H:i:s');
        try {
            $return = ['code' => 0, 'data' => ['id' => DB::table('needs')->insertGetId(array_filter($data))]];
        } catch (\Exception $e) {
            $return = ['code' => -1, 'msg' => '需求创建失败!'];
        }
        return json_encode($return);
    }

    public function needUpdate($id)
    {
        if (!Auth::check()) {
            return redirect('/login');
        }
        $need = DB::table('needs')->where(['id' => $id])->first();
        if (!$need || !in_array(session('id'), [1, $need->user_id])) {
            return ['error_msg' => '不合法的修改请求！'];
        }
        $filters = [
            'sort_id',
            'area_id',
            'period',
            'fork',
            'hot',
            'title',
            'company_name',
            'budget',
            'tel',
            'qq',
            'wechat',
            'images',
            'describe',
            'mark',
        ];
        $data = request()->only($filters);
        $data['images'] = $data['images'] ? serialize($data['images']) : '';
        $data['updated_at'] = Date('Y-m-d H:i:s');
        try {
            $return = ['code' => 0, 'data' => ['id' => DB::table('needs')->where(['id' => $id])->update($data)]];
        } catch (\Exception $e) {
            $return = ['code' => -1, 'msg' => '需求更新失败!'];
        }
        return json_encode($return);
    }


    public function needBaoming()
    {
        $params = request()->only(['uid', 'cid', 'nid']);
        if (!Auth::check() || session('id') != $params['uid']) {
            $return = ['code' => -1, 'msg' => '当前用户认证失败!'];
        } else {
            try {
                if (NCModel::where(['company_id' => $params['cid'], 'need_id' => $params['nid']])->count()) {
                    $return = ['code' => -1, 'msg' => '请勿重复报名!'];
                } else {
                    NCModel::create(['company_id' => $params['cid'], 'need_id' => $params['nid']]);
                    $return = ['code' => 0];
                }
            } catch (\Exception $e) {
                $return = ['code' => -1, 'msg' => '报名失败!'];
            }
        }
        return json_encode($return);
    }

    public function needDelete($id)
    {
        if (!Auth::check() || !$need = Need::find($id)) {
            $return = ['code' => -1, 'msg' => '当前用户认证失败!'];
        } else {
            try {
                Need::where(['id' => $id])->delete();
                NCModel::where(['need_id' => $id])->delete();
                $return = ['code' => 0, 'msg' => '相关报名信息已删除!'];
            } catch (\Exception $e) {
                $return = ['code' => -1, 'msg' => '删除失败!'];
            }
        }
        return json_encode($return);
    }

    public function company()
    {
        $companys = DB::table('companys')->where(['status' => 1])->paginate(10);
        $data = ['data' => $companys];
        return view('tpl.default.company', $data);
    }

    public function companyForm()
    {
        if (!Auth::check()) {
            return redirect('/login');
        }
        $provs = CityModel::where(['pid' => 1])->get()->toArray();
        $data = [
            'provs' => $provs,
            'qiniu_access_token' => $this->getQiniuUploadToken(),
            'qiniu_img_domain' => env('QINIU_IMG_DOMAIN')
        ];
        return view('tpl.default.company_form', $data);
    }

    public function companyUpdateForm($id)
    {
        if (!Auth::check()) {
            return redirect('/login');
        }
        $c = DB::table('companys')->where(['id' => $id])->first();
        if (!$c || !in_array(session('id'), [1, $c->user_id])) {
            return ['error_msg' => '不合法的修改请求！'];
        }
        $c->operate_ids = $c->operate_ids ? explode(',', $c->operate_ids) : [];
        $provs = CityModel::where(['pid' => 1])->get()->toArray();
        $data = [
            'company'=>$c,
            'provs' => $provs,
            'qiniu_access_token' => $this->getQiniuUploadToken(),
            'qiniu_img_domain' => env('QINIU_IMG_DOMAIN')
        ];
        return view('tpl.default.company_update_form', $data);
    }

    public function establish()
    {
        if (!Auth::check()) {
            return redirect('/login');
        }
        $filters = [
            'company_name',
            'name',
            'tel',
            'wechat',
            'email',
            'qq',
            'area_ids',
            'address',
            'sort_ids',
            'operate_ids',
            'image',
            'logo',
            'describe',
            'mark',
        ];
        $params = request()->only($filters);
        $params['area_ids'] = $params['area_ids'] ? implode(',', array_filter($params['area_ids'])) : '';
        $params['sort_ids'] = $params['sort_ids'] ? implode(',', $params['sort_ids']) : '';
        $params['operate_ids'] = $params['operate_ids'] ? implode(',', $params['operate_ids']) : '';
        $params['user_id'] = session('id');
        try {
            $return = ['code' => 0, 'data' => ['id' => CompanyModel::create($params)->id]];
        } catch (\Exception $e) {
            $return = ['code' => -1, 'msg' => '企业入驻失败!'];
        }
        return json_encode($return);
    }
    public function companyUpdate($id)
    {
        if (!Auth::check()) {
            return redirect('/login');
        }
        $c = DB::table('companys')->where(['id' => $id])->first();
        if (!$c || !in_array(session('id'), [1, $c->user_id])) {
            return ['error_msg' => '不合法的修改请求！'];
        }
        $filters = [
            'company_name',
            'name',
            'tel',
            'wechat',
            'email',
            'qq',
            'area_ids',
            'address',
            'sort_ids',
            'operate_ids',
            'image',
            'logo',
            'describe',
            'mark',
        ];
        $params = request()->only($filters);
        $params['area_ids'] = $params['area_ids'] ? implode(',', array_filter($params['area_ids'])) : '';
        $params['sort_ids'] = $params['sort_ids'] ? implode(',', $params['sort_ids']) : '';
        $params['operate_ids'] = $params['operate_ids'] ? implode(',', $params['operate_ids']) : '';
        try {
            CompanyModel::where('id',$id)->update($params);
            $return = ['code' => 0];
        } catch (\Exception $e) {
            $return = ['code' => -1, 'msg' => '企业入驻信息修改失败!'];
        }
        return json_encode($return);
    }

    public function companyDetail($id)
    {
        $data = CompanyModel::where(['id' => $id])->first();
        $data->sort_ids = $data->sort_ids ? explode(',', $data->sort_ids) : '';
        $data->operate_ids = $data->operate_ids ? explode(',', $data->operate_ids) : '';
        if ($data->area_ids) {
            $city = CityModel::whereIn('id', explode(',', $data->area_ids))->get()->toArray();
            $data->city = implode(' ', array_column($city, 'name'));
        }
        $product = PrdModel::where(['company_id' => $id])->get()->toArray();
        $data->product = array_map(function ($y) {
            $images = $y['images'] ? unserialize($y['images']) : '';
            $y['cover'] = $images ? $images[0] : '/asset/web/image/kabuki.jpg';
            return $y;
        }, $product);
        return view('tpl.default.company_detail', ['data' => $data]);
    }

    public function product()
    {
        $data = ['data' => PrdModel::where(['status' => 1])->paginate(10)];
        return view('tpl.default.product', $data);
    }

    public function productForm()
    {
        if (!Auth::check()) {
            return redirect('/login');
        }
        $companys = CompanyModel::where(['user_id' => session('id')])->get()->toArray();
        $provs = CityModel::where(['pid' => 1])->get()->toArray();
        $data = [
            'provs' => $provs,
            'companys' => $companys,
            'qiniu_access_token' => $this->getQiniuUploadToken(),
            'qiniu_img_domain' => env('QINIU_IMG_DOMAIN')
        ];
        return view('tpl.default.product_form', $data);
    }

    public function productCreate()
    {
        if (!Auth::check()) {
            return redirect('/login');
        }
        if (!session('type')) {
            return json_encode(['code' => -1, 'msg' => '非商家无法发布!']);
        }
        $filters = [
            'name',
            'price',
            'storage',
            'images',
            'sort_ids',
            'area_ids',
            'describe',
            'company_id',
        ];
        $params = request()->only($filters);
        $params['area_ids'] = $params['area_ids'] ? implode(',', array_filter($params['area_ids'])) : '';
        $params['sort_ids'] = $params['sort_ids'] ? implode(',', $params['sort_ids']) : '';
        $params['images'] = $params['images'] ? serialize($params['images']) : '';
        $params['user_id'] = session('id');
        try {
            $return = ['code' => 0, 'data' => ['id' => PrdModel::create($params)->id]];
        } catch (\Exception $e) {
            $return = ['code' => -1, 'msg' => '产品发布失败!'];
        }
        return json_encode($return);
    }

    public function productDetail($id)
    {
        $data = PrdModel::where(['id' => $id])->first();
        $data->sort_ids = $data->sort_ids ? explode(',', $data->sort_ids) : ['未定义'];
        $data->images = $data->images ? json_encode(array_map(function ($y) {
            return ['path' => $y, 'thumb' => $y];
        }, unserialize($data->images))) : '';
        $data->company = CompanyModel::find($data->company_id);
        $data->company->sort_ids = $data->company->sort_ids ? explode(',', $data->company->sort_ids) : ['未定义'];
        $data->company->operate_ids = $data->company->operate_ids ? explode(',', $data->company->operate_ids) : ['未定义'];
        if ($data->area_ids) {
            $city = CityModel::whereIn('id', explode(',', $data->area_ids))->get()->toArray();
            $data->city = implode(' ', array_column($city, 'name'));
        }
        return view('tpl.default.product_detail', ['data' => $data]);
    }

    public function productUpdateForm($id)
    {
        if (!Auth::check()) {
            return redirect('/login');
        }
        $companys = CompanyModel::where(['user_id' => session('id')])->get()->toArray();
        $provs = CityModel::where(['pid' => 1])->get()->toArray();
        $data = DB::table('prds')->where(['id' => $id])->first();
        if (!$data || !in_array(session('id'), [1, $data->user_id])) {
            return ['error_msg' => '不合法的修改请求！'];
        }
        $data->images = $data->images ? unserialize($data->images) : [];
        $data = [
            'detail' => $data,
            'companys' => $companys,
            'provs' => $provs,
            'qiniu_access_token' => $this->getQiniuUploadToken(),
            'qiniu_img_domain' => env('QINIU_IMG_DOMAIN')
        ];
        return view('tpl.default.product_update_form', $data);
    }

    public function productUpdate($id)
    {
        if (!Auth::check()) {
            return redirect('/login');
        }
        $prd = DB::table('prds')->where(['id' => $id])->first();
        if (!$prd || !in_array(session('id'), [1, $prd->user_id])) {
            return ['error_msg' => '不合法的修改请求！'];
        }
        $filters = [
            'sort_ids',
            'area_ids',
            'name',
            'price',
            'storage',
            'images',
            'describe',
            'mark',
        ];
        $data = request()->only($filters);
        $data['images'] = $data['images'] ? serialize($data['images']) : '';
        $data['sort_ids'] = $data['sort_ids'] ? implode(',',$data['sort_ids']) : '';
        $data['area_ids'] = $data['area_ids'] ? implode(',',$data['area_ids']) : '';
        $data['updated_at'] = Date('Y-m-d H:i:s');
        try {
            $return = ['code' => 0, 'data' => ['id' => DB::table('prds')->where(['id' => $id])->update($data)]];
        } catch (\Exception $e) {
            $return = ['code' => -1, 'msg' => '产品更新失败!'];
        }
        return json_encode($return);
    }
    public function productDelete($id)
    {
        if (!Auth::check()) {
            return redirect('/login');
        }
        $prd = DB::table('prds')->where(['id' => $id])->first();
        if (!$prd || !in_array(session('id'), [1, $prd->user_id])) {
            return ['error_msg' => '不合法的删除请求！'];
        }
        try {
            DB::table('prds')->where(['id' => $id])->delete();
            $return = ['code' => 0];
        } catch (\Exception $e) {
            $return = ['code' => -1, 'msg' => '产品删除失败!'];
        }
        return json_encode($return);
    }



    public function zone($id)
    {
        if (!session('id') || session('id') != $id) {
            return redirect('/');
        }
        $needs = DB::table('needs')->where('needs.user_id', session('id'))
            ->leftjoin('need_company', 'need_company.need_id', '=', 'needs.id')
            ->groupBy('needs.id')
            ->select(['needs.*', DB::raw('count(need_company.need_id) as baomingshu')])
            ->paginate(10);

        $neesStatusShow = [
            '0' => '待审核',
            '1' => '招标中',
            '2' => '线下对接中',
            '3' => '已完成',
            '-1' => '审核未通过',
        ];
        $pStatus = [
            '0' => '待审核',
            '1' => '发布中',
            '-1' => '未通过'
        ];
        $cStatus = [
            '0' => '待审核',
            '1' => '正常',
            '-1' => '未通过'
        ];
        $prds = DB::table('prds')->where('user_id', session('id'))
            ->paginate(10);

        $company = CompanyModel::where(['user_id' => $id])->get();
        $data = ['need' => $needs, 'neesStatusShow' => $neesStatusShow, 'pStatus' => $pStatus, 'prds' => $prds,'company'=>$company,'cStatus'=>$cStatus];
        return view('tpl.default.zone', $data);
    }

    public function adminZone()
    {
        $this->checkAdmin();
        return view('tpl.default.admin_zone');
    }

    //管理用户
    public function adminUser()
    {
        $this->checkAdmin();
        $users = WebUserModel::paginate(15);
        $statusShow = [
            '0' => '冻结',
            '1' => '正常',
        ];
        $typeShow = [
            '0' => '普通用户',
            '1' => '厂家',
            '2' => '管理员',
        ];
        return view('tpl.default.admin_user', ['data' => $users, 'statusShow' => $statusShow, 'typeShow' => $typeShow]);
    }

    //更改用户状态
    public function adminCUS()
    {
        $this->checkAdmin();
        $params = request()->all();
        return json_encode(['code' => WebUserModel::where(['id' => $params['id']])->update(['status' => $params['status']]) ? 0 : '-1']);
    }

    //管理需求
    public function adminNeed()
    {
        $this->checkAdmin();
        $needs = DB::table('needs')->paginate(15);

        $statusShow = [
            '0' => '待审核',
            '1' => '招标中',
            '2' => '线下对接中',
            '3' => '已完成',
            '-1' => '审核未通过',
        ];

        return view('tpl.default.admin_need', ['data' => $needs, 'statusShow' => $statusShow]);
    }

    //更改需求状态
    public function adminCNS()
    {
        $this->checkAdmin();
        $params = request()->all();
        return json_encode(['code' => DB::table('needs')->where(['id' => $params['id']])->update(['status' => $params['status']]) ? 0 : '-1']);
    }

    //删除需求
    public function adminDN($id)
    {
        $this->checkAdmin();
        return json_encode(['code' => DB::table('needs')->where(['id' => $id])->delete() ? 0 : '-1']);
    }

    //管理厂家
    public function adminCompany()
    {
        $this->checkAdmin();
        $needs = DB::table('companys')->paginate(15);

        $statusShow = [
            '0' => '待审核',
            '1' => '已审核',
            '3' => '未通过',
        ];

        return view('tpl.default.admin_company', ['data' => $needs, 'statusShow' => $statusShow]);
    }

    //更改厂家状态
    public function adminCCS()
    {
        $this->checkAdmin();
        $params = request()->all();
        try{
            $c = CompanyModel::find($params['id']);
            DB::table('companys')->where(['id' => $params['id']])->update(['status' => $params['status']]);
            if($c && ($c->user_id != 1) && (!$c->type) && ($params['status'] >= 0)){
                WebUserModel::where('id',$c->user_id)->update(['type'=>1]);
            }
            if($c && ($c->user_id != 1) && ($c->type) && ($params['status'] < 0)){
                WebUserModel::where('id',$c->user_id)->update(['type'=>0]);
            }
            $return = ['code'=>0];
        }catch(\Exception $e){
            $return = ['code'=>'-1'];
        }

        return json_encode($return);
    }

    //删除厂家
    public function adminDC($id)
    {
        $this->checkAdmin();
        try{
            $c = CompanyModel::find($id);
            DB::table('companys')->where(['id' => $id])->delete();
            if($c && ($c->user_id != 1) && ($c->type)){
                WebUserModel::where('id',$c->user_id)->update(['type'=>0]);
            }
            $return = ['code'=>0];
        }catch(\Exception $e){
            $return = ['code'=>'-1'];
        }
        return json_encode($return);
    }

    //管理产品
    public function adminPrd()
    {
        $this->checkAdmin();
        $needs = DB::table('prds')->paginate(15);

        $statusShow = [
            '0' => '待审核',
            '1' => '已审核',
            '3' => '未通过',
        ];

        return view('tpl.default.admin_product', ['data' => $needs, 'statusShow' => $statusShow]);
    }

    //更改产品状态
    public function adminCPS()
    {
        $this->checkAdmin();
        $params = request()->all();
        return json_encode(['code' => DB::table('prds')->where(['id' => $params['id']])->update(['status' => $params['status']]) ? 0 : '-1']);
    }

    //删除产品
    public function adminDP($id)
    {
        $this->checkAdmin();
        return json_encode(['code' => DB::table('prds')->where(['id' => $id])->delete() ? 0 : '-1']);
    }

    public function adminNews()
    {
        $this->checkAdmin();
        return view('tpl.default.admin_news', ['data' => NewsModel::paginate(10)]);
    }

    public function adminNewsCreate()
    {
        $this->checkAdmin();
        $params = request()->only(['title', 'content']);
        $params['user_id'] = session('id');
        return json_encode(['code' => NewsModel::create($params) ? 0 : '-1']);
    }

    public function adminNewsUpdate($id)
    {
        $this->checkAdmin();
        $info = request()->only(['title', 'content']);
        return json_encode(['code' => NewsModel::where(['id' => $id])->update($info) ? 0 : '-1']);
    }

    public function adminCNES()
    {
        $this->checkAdmin();
        $params = request()->all();
        return json_encode(['code' => DB::table('news')->where(['id' => $params['id']])->update(['is_promote' => $params['status']]) ? 0 : '-1']);
    }

    public function adminDNES($id)
    {
        $this->checkAdmin();
        return json_encode(['code' => DB::table('news')->where(['id' => $id])->delete() ? 0 : '-1']);
    }


    public function login(Request $request)
    {
        $info = $request->only(['username', 'password']);
        $userInfo = WebUserModel::where('username', trim($info['username']));
        if (!$userInfo->count()) {
            return ['error_msg' => '用户不存在'];
        }
        if (!$userInfo->first()->status) {
            return ['error_msg' => '用户冻结中'];
        }
        $password = $userInfo->first()->password;
        if (!password_verify(trim($info['password']), $password)) {
            return ['error_msg' => '密码错误'];
        }
        Auth::login($userInfo->first());
        if (!Auth::check()) {
            return ['error_msg' => '登录失败'];
        }
        $currentUser = WebUserModel::where('id', Auth::id());
        $timenow = Carbon::now();
        $currentUser->update(
            [
                'last_login_time' => $currentUser->first()->login_at,
                'last_login_ip' => $currentUser->first()->login_ip,
                'login_at' => Carbon::now(),
                'login_ip' => $request->getClientIp(),
                'access_token' => str_random(40),
                'token_expr_at' => Date('Y-m-d H:i:s', strtotime($timenow) + env('ACCESS_TOKEN_EXPR'))
            ]);
        $currentUser = $currentUser->get()->toArray();
        session($currentUser[0]);
        return redirect('/');
    }

    public function logout()
    {
        Auth::logout();
        session()->clear();
        return redirect('/');
    }

    public function register(Request $request)
    {
        $info = $request->only(['username', 'password', 'role_ids']);
        $info['ip'] = $request->getClientIp();

        $info = array_filter($info);
        if (!isset($info['username'])) {
            return ['error_code' => '用户名为空'];
        }
        if (!isset($info['password'])) {
            return ['error_code' => '密码为空'];
        }
        if (WebUserModel::where('username', $info['username'])->count()) {

            return ['error_code' => '用户名已存在'];
        }
        $info['password'] = password_hash($info['password'], PASSWORD_BCRYPT);
        $info['creator_id'] = 1;
        $info['login_time'] = Carbon::now();
        $info['login_ip'] = $info['ip'];
        $user = WebUserModel::create($info);
        Auth::login($user);
        session($user->toArray());
        return redirect('/');
    }

    private function getQiniuUploadToken()
    {
        $auth = new QiniuAuth('-u-Xkb6750ZFc7x0_ymb0Tig3GJwQwGUSmYGL_W6', 'wlJiz10cNHTlyO2D1QpDk1i8QzQheUEuPknMJiRD');
        $policy = [
            'scope' => env('QINIU_BUCKET'),
            'deadline' => time() + 3600,
            'callbackUrl' => env('QINIU_CALLBACK_URL'),
            'callbackBody' => '{"key":"$(key)","hash":"$(etag)","w":"$(imageInfo.width)","h":"$(imageInfo.height)","symbol":"$(x:symbol)"}',
            'callbackBodyType' => 'application/json'
        ];
        $upToken = $auth->uploadToken(env('QINIU_BUCKET'), null, 3600, $policy);
        return $upToken;
    }

    public function qiniuCallback(Request $request)
    {
        $data = $request->only(['key', 'hash', 'w', 'h', 'symbol']);
        if (!isset($data['key']) || !$data['key']) {
            return;
        }
        QiniuUploadModel::create($data);
    }

    public function task(Request $request)
    {
        if (!$symbol = $request->get('symbol')) {
            $return = ['code' => 1, '任务标志不存在'];
        } else {
            $res = QiniuUploadModel::where('symbol', $symbol)->first();
            $return = $res ? ['code' => 0, 'data' => ['key' => $res->key, 'hash' => $res->hash]] : ['code' => -1, 'msg' => '无相关数据'];
        }
        return json_encode($return);
    }

    public function getCity($pid)
    {
        return CityModel::where(['pid' => $pid])->get()->all();
    }

    public function adminNet()
    {
        $this->checkAdmin();
        $net = DB::table('net')->first();
        $data = [
            'qiniu_access_token' => $this->getQiniuUploadToken(),
            'qiniu_img_domain' => env('QINIU_IMG_DOMAIN'),
            'c_images' => unserialize($net->index_images),
            'login_image' => $net->login_image,
            'wechat_image' => $net->wechat_image,
            'about_us' => $net->about_us,
            'service' => $net->service,
            'help' => $net->help,
            'zone' => $net->zone,
            'address' => $net->address,
            'tel' => $net->tel,
            'email' => $net->email,
        ];
        return view('tpl.default.admin_net', $data);
    }

    public function adminNetUpdate()
    {
        $params = request()->only(['index_images', 'login_image', 'wechat_image', 'about_us', 'service', 'help', 'zone', 'address', 'tel', 'email']);
        if (!is_array($params['index_images']) || count($params['index_images']) !== 5 || !$params['login_image']) {
            return json_encode(['code' => -1, 'msg' => '数据不合法!']);
        }
        $params['index_images'] = serialize($params['index_images']);
        try {
            DB::table('net')->where(['id' => 1])->update($params);
            $return = ['code' => 0];
        } catch (\Exception $e) {
            $return = ['code' => '-1'];
        }
        return json_encode($return);
    }
}
