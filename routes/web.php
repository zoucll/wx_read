<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
	echo "hello laravel";exit;
    return view('welcome');
});

Route::any('zou/chun',function(){
	
})->name('zou');

Route::get('/index', function () {
	//生成url地址
	$url = route('zou');
	echo $url;exit;
	return $this->route('zou');
});

Route::any('back','Zoucontroller@index');

//测试一个路由组
Route::middleware('check_age')->group(function(){
    Route::get('young',function(){
        return 'I m you';

   });
});
//管理后台用户组
Route::prefix('admin')->group(function(){
    Route::get('login',function(){
       return '登录成功';
    })->middleware('admin_user');
});

Route::get('student/index','Studencontroller@index');

//学习类路由组
Route::prefix('study')->group(function(){
    Route::any('get/bonus','Study\BounsController@getBonus');//获取红包的路由

    Route::get("guess/add",'Study\GuessController@add');//竞猜添加页面
    Route::post('guess/doAdd','Study\GuessController@doAdd');//竞猜执行添加页面
    Route::get("guess/list",'Study\GuessController@list');//竞猜列表页面
    Route::get('guess/guess','Study\GuessController@guess');//竞猜添加的页面
    Route::get('guess/result','Study\GuessController@checkResult');//竞猜添加的页面
    Route::post('guess/doGuess','Study\GuessController@doGuess');//竞猜添加的页面



    //抽奖页面
    Route::get('lottery/index','Study\LotteryController@lottery');
    //执行抽奖
    Route::any('lottery/do','Study\LotteryController@doLottery');
    //抽奖的结果
    Route::get('lottery/list/{phone}','Study\LotteryController@list');



});

//登录页面
Route::get('admin/login','Admin\LoginController@index');
//执行登录
Route::post('admin/doLogin','Admin\LoginController@doLogin');
//用户退出
Route::get('admin/logout','Admin\LoginController@logout');
//管路后台RBAC功能类的路由组
Route::middleware('admin_auth')->prefix('admin')->group(function(){
    //管理后台首页
    Route::get('home','Admin\HomeController@home')->name('admin.home');
    ###############################[权限相关]###############################################
    //权限列表
    Route::get('/permission/list','Admin\permissionController@list')->name('admin.permission.list');
    //获取权限的数据
    Route::any('/get/permission/list/{fid?}','Admin\permissionController@getPermissionList')->name('admin.get.permmission.list');
    //权限添加
    Route::get('/permission/create','Admin\PermissionController@create')->name('admin.permission.create');
    //执行权限的添加
    Route::post('/permission/doCreate','Admin\PermissionController@doCreate')->name('admin.permission.doCreate');
    //删除权限操作
    Route::get('/permission/del/{id}','Admin\PermissionController@del')->name('admin.permission.del');
    ###############################[权限相关]###############################################

    ###############################[用户相关]###############################################
    //用户添加页面
    Route::get('/user/add','Admin\AdminUserController@create')->name('admin.user.add');
    //执行用户添加
    Route::post('/user/store','Admin\AdminUserController@store')->name('admin.user.store');
    //用户列表页面
    Route::get('/user/list','Admin\AdminUserController@list')->name('admin.user.list');
    //用户删除操作
    Route::get('/user/del{id}','Admin\AdminUserController@del')->name('admin.user.del');
    //用户编辑页面
    Route::get('/user/edit{id}','Admin\AdminUserController@edit')->name('admin.user.edit');
    //用户执行编辑页面
    Route::post('/user/doEdit','Admin\AdminUserController@doEdit')->name('admin.user.doEdit');
    ###############################[用户相关]###############################################

    ###############################[角色相关]###############################################
    //角色列表
    Route::get('/role/list','Admin\RoleController@list')->name('admin.role.list');
    //角色删除
    Route::get("/role/del/{id}",'Admin\RoleController@delRole')->name('admin.role.del');
    //角色编剧
    Route::get("/role/edit/{id}",'Admin\RoleController@edit')->name('admin.role.edit');
    //角色执行编辑
    Route::post("/role/doEdit",'Admin\RoleController@doEdit')->name('admin.role.doEdit');
    //角色添加
    Route::get("/role/create",'Admin\RoleController@create')->name('admin.role.create');
    //角色执行添加
    Route::post("/role/store",'Admin\RoleController@store')->name('admin.role.store');
    //角色权限编剧
    Route::get("/role/permission/{id}",'Admin\RoleController@rolePermission')->name('admin.role.permission');
    //角色执行权限编辑
    Route::post("/role/permission/save",'Admin\RoleController@saveRolePermission')->name('admin.role.permission.save');

    ###############################[角色相关]###############################################

    ###############################[小说相关]###############################################

    //作者列表
    Route::get('author/list','Admin\AuthorController@list')->name('admin.author.list');
    //作者添加
    Route::get('author/create','Admin\AuthorController@create')->name('admin.author.create');
    //作者执行添加
    Route::any('author/store','Admin\AuthorController@store')->name('admin.author.store');
    //作者执行删除
    Route::get('author/del/{id}','Admin\AuthorController@del')->name('admin.author.del');

    //分类列表
    Route::get('categort/list','Admin\CategortController@list')->name('admin.categort.list');
    //分类添加
    Route::get('categort/create','Admin\CategortController@create')->name('admin.categort.create');
    //执行分类添加
    Route::post('categort/store','Admin\CategortController@store')->name('admin.categort.store');
    //执行分类删除
    Route::get('categort/del/{id}','Admin\CategortController@del')->name('admin.categort.del');
    //分类编辑
    Route::get("/categort/edit/{id}",'Admin\CategortController@edit')->name('admin.categort.edit');
    //分类执行编辑
    Route::post("/categort/doEdit",'Admin\CategortController@doEdit')->name('admin.categort.doEdit');

    //小说添加
    Route::get('novel/create','Admin\NovelController@create')->name('admin.novel.create');
    //执行小说添加
    Route::post('novel/store','Admin\NovelController@store')->name('admin.novel.store');
    //小说列表
    Route::get('novel/list','Admin\NovelController@list')->name('admin.novel.list');
    //小说编辑
    Route::get('novel/edit{id}','Admin\NovelController@edit')->name('admin.novel.edit');
    //执行小说编辑
    Route::post('novel/doEdit','Admin\NovelController@doEdit')->name('admin.novel.doEdit');
    //小说删除
    Route::get('novel/del/{id}','Admin\NovelController@del')->name('admin.novel.del');

    //添加小说章节页面
    Route::get('chapter/add/{novel_id}','Admin\ChapterController@create')->name('admin.chapter.create');
    //保存小说的章节
    Route::post('chapter/store','Admin\ChapterController@store')->name('admin.chapter.store');
    //小说章节列表
    Route::get('chapter/list/{novel_id?}','Admin\ChapterController@list')->name('admin.chapter.list');
    //章节删除
    Route::get('chapter/del/{id}','Admin\ChapterController@del')->name('admin.chapter.del');
    //章节编辑
    Route::get('chapter/edit/{id}','Admin\ChapterController@edit')->name('admin.chapter.edit');
    //执行章节编辑
    Route::post('chapter/doEdit','Admin\ChapterController@doEdit')->name('admin.chapter.doEdit');

    //小说评论列表页面
    Route::get('novel/comment/list','Admin\CommentController@list')->name('admin.novel.comment.list');
    //小说数据
    Route::get('novel/comment/data','Admin\CommentController@getComment')->name('admin.novel.comment.data');
    //小说评论审核
    Route::get('novel/comment/check/{id}','Admin\CommentController@check')->name('admin.novel.comment.check');
    //小说评论删除
    Route::get('novel/comment/del/{id}','Admin\CommentController@del')->name('admin.novel.comment.del');


    ###############################[小说相关]###############################################

    ###############################[商品品牌相关]###############################################
//    商品列表页面
    Route::get('brand/list','Admin\BrandController@list')->name('admin.brand.list');
    //获取列表数据
    Route::post('brand/data/list','Admin\BrandController@getListDate')->name('admin.brand.data.list');
    //商品添加页面
    Route::get('brand/add','Admin\BrandController@add')->name('admin.brand.add');
    //商品执行添加页面
    Route::post('brand/doAdd','Admin\BrandController@doAdd')->name('admin.brand.doAdd');
    //商品执行删除
    Route::get('brand/del/{id}','Admin\BrandController@del')->name('admin.brand.del');
    //商品编辑页面
    Route::get('brand/edit/{id}','Admin\BrandController@edit')->name('admin.brand.edit');
    //商品执行编辑操作
    Route::post('brand/doEdit','Admin\BrandController@doEdit')->name('admin.brand.doEdit');

    ###############################[商品品牌相关]###############################################

    ###############################[商品分类相关]###############################################
    //商品分类列表
    Route::get("category/list",'Admin\CategoryController@list')->name('admin.category.list');
    //获取商品分类列表接口的数据
    Route::get('category/get/data/{fid?}','Admin\CategoryController@getListDate')->name('admin.category.get.data');
    //商品分类添加
    Route::get("category/add",'Admin\CategoryController@add')->name('admin.category.add');
    //商品分类添加
    Route::post("category/doAdd",'Admin\CategoryController@doAdd')->name('admin.category.doAdd');
    //商品分类删除操作
    Route::get("category/del/{id}",'Admin\CategoryController@del')->name('admin.category.del');
    //商品分类修改
    Route::get("category/edit/{id}",'Admin\CategoryController@edit')->name('admin.category.edit');
    //商品分类执行修改
    Route::post("category/doEdit",'Admin\CategoryController@doEdit')->name('admin.category.doEdit');
    ###############################[商品分类相关]###############################################

    ###############################[文章分类相关]###############################################
    //文章分类列表
    Route::get('article/category/list','Admin\ArticleCategoryController@list')->name('admin.article.category.list');
    //文章分类添加
    Route::get('article/category/add','Admin\ArticleCategoryController@add')->name('admin.article.category.add');
    //文章分类执行添加
    Route::post('article/category/store','Admin\ArticleCategoryController@store')->name('admin.article.category.store');
    //文章分类删除
    Route::get('article/category/del/{id}','Admin\ArticleCategoryController@del')->name('admin.article.category.del');
    //文章分类编辑
    Route::get('article/category/edit/{id}','Admin\ArticleCategoryController@edit')->name('admin.article.category.edit');
    //文章分类执行编辑
    Route::post('article/category/doEdit','Admin\ArticleCategoryController@doEdit')->name('admin.article.category.doEdit');

    ###############################[文章分类相关]###############################################




});
