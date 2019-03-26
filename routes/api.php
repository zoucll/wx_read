<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

/************************[首页]**********************/
//首页banser图接口
Route::post('home/banners','Api\HomeController@banners');
//首页最新小说的接口
Route::post('home/news','Api\HomeController@newsList');
//点击量最高
Route::post('home/clicks','Api\HomeController@cliclsList');

//分类列表的接口
Route::any('categort/list','Api\CategortController@getCategort');
//分类小说列表的接口
Route::any('categort/novel','Api\CategortController@getCategortNovel');
//小说搜索接口
Route::any('search/novel','Api\SearchController@getSearchList');

//小说书单接口
Route::get('book/list','Api\NovelController@bookList');
//小说阅读榜单接口
Route::post('read/rank','Api\NovelController@bookRank');
//小说详情接口
Route::post('novel/detail/{id}','Api\NovelController@detail');
//小说章节列表接口
Route::post('chapter/list/{novel_id}','Api\ChapterController@chapterList');