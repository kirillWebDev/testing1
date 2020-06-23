<?php

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
| Here is where you can register Admin routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "web", "auth" and "admin" middleware groups. Enjoy building your Admin!
|
*/

/**
 * admin url
 */
Route::get('/', function () {
    return redirect()->route('admin.index');
});

Route::get('/dashboard', ['uses' => 'AdminController@index', 'as' => 'admin.index']);
Route::get('/settings', ['uses' => 'AdminController@settings', 'as' => 'admin.settings']);
Route::post('/settings', ['uses' => 'AdminController@saveSettings', 'as' => 'admin.save-settings']);
Route::post('/upload/image', ['uses' => 'ImageController@uploadImage', 'as' => 'upload.image']);
Route::delete('/delete/file', ['uses' => 'FileController@deleteFile', 'as' => 'delete.file']);
Route::post('/upload/file', ['uses' => 'FileController@uploadFile', 'as' => 'upload.file']);

/**
 * Admin uri
 */

Route::get('/tags', ['uses' => 'TagController@index', 'as' => 'admin.tags']);
Route::delete('/tags/delete', 'TagController@deleteSelected');
Route::get('/tags/datatables', ['uses' => 'TagController@datatables', 'as' => 'admin.tags.datatables']);

Route::get('/parsers/keys', ['uses' => 'KeyController@index', 'as' => 'admin.parsers.keys']);
Route::delete('/parsers/keys/delete', 'KeyController@deleteSelected');

Route::get('/keys/datatables', ['uses' => 'KeyController@datatables', 'as' => 'admin.keys.datatables']);

Route::get('/parsers/keys/import', ['uses' => 'KeyController@import' , 'as' => 'admin.keys.import']);
Route::any('/parsers/keys/import/file', 'KeyController@importFile');

Route::get('/parsers/words', ['uses' => 'RandomizeWordController@index', 'as' => 'admin.parsers.words']);
Route::delete('/parsers/words/delete', 'RandomizeWordController@deleteSelected');
Route::get('/words/datatables', ['uses' => 'RandomizeWordController@datatables', 'as' => 'admin.words.datatables']);

Route::get('/statistic/urls', ['uses' => 'StatisticUrlController@index', 'as' => 'admin.statistic.urls']);
Route::delete('/statistic/urls/delete', 'StatisticUrlController@deleteSelected');
Route::get('/statistic/urls/datatables', ['uses' => 'StatisticUrlController@datatables', 'as' => 'admin.statistic.urls.datatables']);


Route::get('/statistic/monitoring', ['uses' => '\App\Http\Controllers\MonitoringController@index', 'as' => 'admin.statistic.monitoring']);
Route::get('/statistic/monitoring/datatables', ['uses' => '\App\Http\Controllers\MonitoringController@datatables', 'as' => 'admin.statistic.datatables']);
Route::delete('/statistic/monitoring/delete/{id?}', ['uses' => '\App\Http\Controllers\MonitoringController@deleteSelected', 'as' => 'statistic_articles.destroy']);

Route::get('/seo/tags', ['uses' => 'GlobalTagController@index', 'as' => 'admin.seo.tags']);
Route::delete('/seo/tags/delete', 'GlobalTagController@deleteSelected');
Route::get('/seo/tags/datatables', ['uses' => 'GlobalTagController@datatables', 'as' => 'admin.seo.tags.datatables']);

Route::get('/menus', ['uses' => 'MenuController@index', 'as' => 'admin.menus']);
Route::delete('/menus/delete', 'MenuController@deleteSelected');
Route::get('/menus/datatables', ['uses' => 'MenuController@datatables', 'as' => 'admin.menus.datatables']);

// USERS
Route::get('/users', ['uses' => 'UserController@index', 'as' => 'admin.users']);

Route::get('/users/new', ['uses' => 'UserController@create', 'as' => 'admin.users.create']);
Route::post('/users/new', ['uses' => 'UserController@store', 'as' => 'admin.users.store']);

Route::get('/users/{user}/edit', ['uses' => 'UserController@edit', 'as' => 'admin.users.edit']);
Route::post('/users/{user}/edit', ['uses' => 'UserController@update', 'as' => 'admin.users.update']);

Route::delete('/users/{user}/destroy', ['uses' => 'UserController@destroy', 'as' => 'admin.users.destroy']);

Route::get('/users/datatables', ['uses' => 'UserController@datatables', 'as' => 'admin.users.datatables']);
Route::delete('/users/delete', 'UserController@deleteSelected');

Route::get('/users/blogger', ['uses' => 'UserController@index', 'as' => 'admin.users-bloggers']);
Route::get('/users/blogger/create', ['uses' => 'UserController@create', 'as' => 'admin.users-bloggers.create']);
Route::post('/users/blogger/create', ['uses' => 'UserController@store', 'as' => 'admin.users-bloggers.store']);

Route::get('/users/blogger/{user}/edit', ['uses' => 'UserController@edit', 'as' => 'admin.users-bloggers.edit']);
Route::post('/users/blogger/{user}/edit', ['uses' => 'UserController@update', 'as' => 'admin.users-bloggers.update']);

Route::delete('/users/blogger/{user}/destroy', ['uses' => 'UserController@destroy', 'as' => 'admin.users-bloggers.destroy']);

Route::get('/users/blogger/datatables', ['uses' => 'UserController@datatables', 'as' => 'admin.users-bloggers.datatables']);
Route::delete('/users/blogger/delete', 'UserController@deleteSelected');

Route::post('/users/blogger/{user}/delete/image', ['uses' => 'UserController@deleteImage', 'as' => 'user.delete.image'])
    ->where(['user' => '[0-9]+']);
// END USERS

Route::get('/pages', ['uses' => 'PageController@index', 'as' => 'admin.pages']);
Route::get('/pages/datatables', ['uses' => 'PageController@datatables',
    'as' => 'admin.pages.datatables']);
Route::delete('/pages/delete', 'PageController@deleteSelected');


Route::get('/categories', ['uses' => 'CategoryController@index', 'as' => 'admin.categories']);

Route::get('/categories/datatables', ['uses' => 'CategoryController@datatables',
    'as' => 'admin.categories.datatables']);

Route::get('/categories/hierarchical', ['uses' => 'CategoryController@getHierarchicalStructure',
    'as' => 'category.show.hierarchical']); // With hierarchical

Route::get('/category/{id}/articles', ['uses' => 'CategoryController@getArticlesByCategory',
    'as' => 'category.show.articles'])->where(['id' => '[0-9]+']);

Route::delete('/categories/delete', 'CategoryController@deleteSelected');

Route::get('/images', ['uses' => 'ImageController@images', 'as' => 'admin.images']);
Route::get('/images-list', ['uses' => 'ImageController@images_list', 'as' => 'admin.images-list']);
Route::get('/files', ['uses' => 'FileController@files', 'as' => 'admin.files']);
Route::delete('/files/delete', 'FileController@deleteSelected');

Route::get('/ips', ['uses' => 'IpController@index', 'as' => 'admin.ips']);
Route::delete('/ips/delete', 'IpController@deleteSelected');
Route::get('/ips/datatables', ['uses' => 'IpController@datatables', 'as' => 'admin.ips.datatables']);

Route::get('/app', ['uses' => 'AppController@index', 'as' => 'admin.app']);
Route::post('/app/email', ['uses' => 'AppController@sendMail', 'as' => 'admin.app.send-mail']);


/**
 * Parser
 */

Route::get('/parsers/resources', ['uses' => 'ParserController@index', 'as' => 'admin.parsers.resources']);
Route::delete('/parsers/resources/delete', 'ParserController@deleteSelected');

//old parser
//Route::get('/parsers/panel', ['uses' => 'ParserController@panel', 'as' => 'admin.parsers.panel']);
//Route::post('/parsers/panel/parse', ['uses' => 'ParserController@panelParse', 'as' => 'admin.parser.panel.update']);
//Route::get('/parsers/panel/status', ['uses' => 'ParserController@panelStatus', 'as' => 'admin.parser.panel.status']);


Route::get('/parsers/panel', ['uses' => 'ParserAjaxController@index', 'as' => 'admin.parsers.panel']);
Route::get('/parsers/panel/resources', ['uses' => 'ParserAjaxController@getResources', 'as' => 'admin.parsers.panel.ajax.resources']);
Route::get('/parsers/panel/links', ['uses' => 'ParserAjaxController@getLinks', 'as' => 'admin.parsers.panel.ajax.links']);
Route::get('/parsers/panel/parse', ['uses' => 'ParserAjaxController@getParse', 'as' => 'admin.parsers.panel.ajax.parse']);


Route::get('/parsers/resources/datatables', ['uses' => 'ParserController@datatables',
    'as' => 'admin.parsers.resources.datatables']);

/*
* PROXY
*/
Route::get('/proxy', ['uses' => 'ProxyController@index', 'as' => 'admin.proxy']);
Route::post('/proxy/save', ['uses' => 'ProxyController@save', 'as' => 'admin.proxy.save']);
Route::post('/proxy/remove', ['uses' => 'ProxyController@remove', 'as' => 'admin.proxy.remove']);

/**
 * Comment
 */
Route::get('/comments', ['uses' => 'CommentController@index', 'as' => 'admin.comments']);
Route::get('/comment/{comment}/edit', ['uses' => 'CommentController@edit', 'as' => 'admin.comment.edit'])->where(['comment' => '[0-9]+']);
Route::any('/comment/{comment}/update', ['uses' => 'CommentController@update', 'as' => 'admin.comment.update'])->where(['comment' => '[0-9]+']);
Route::post('/comment/{comment}/restore', ['uses' => 'CommentController@restore', 'as' => 'comment.restore'])->where(['comment' => '[0-9]+']);
Route::get('/comment/{comment}/verify', ['uses' => 'CommentController@verify', 'as' => 'comment.verify'])->where(['comment' => '[0-9]+']);
Route::delete('comment/un-verified', ['uses' => 'CommentController@deleteUnVerifiedComments', 'as' => 'comment.delete-un-verified']);
Route::get('/comments/datatables', ['uses' => 'CommentController@datatables', 'as' => 'admin.comments.datatables']);
Route::delete('/comments/delete', 'CommentController@deleteSelected');
/***
 * Article
 */

Route::get('/articles', ['uses' => 'ArticleController@index', 'as' => 'admin.articles']);

Route::get('/articles/datatables', ['uses' => 'ArticleController@datatables', 'as' => 'admin.articles.datatables']);

Route::post('/article/{article}/restore', ['uses' => 'ArticleController@restore', 'as' => 'article.restore'])
    ->where(['article' => '[0-9]+']);

Route::post('/article/{article}/delete/image', ['uses' => 'ArticleController@deleteImage', 'as' => 'article.delete.image'])
    ->where(['article' => '[0-9]+']);

Route::get('/article/{id}/preview', ['uses' => 'ArticleController@preview', 'as' => 'article.preview']);

Route::post('/article/{article}/publish', ['uses' => 'ArticleController@publish', 'as' => 'article.publish'])
    ->where(['article' => '[0-9]+']);

Route::get('/article/{article}/download', ['uses' => 'ArticleController@download', 'as' => 'article.download'])
    ->where(['article' => '[0-9]+']);

Route::match(['get', 'post'],'/article/{article}/config', ['uses' => 'ArticleController@updateConfig', 'as' => 'article.config'])
    ->where(['article' => '[0-9]+']);

Route::get('/article/download-all', ['uses' => 'ArticleController@downloadAll', 'as' => 'article.download-all']);

Route::delete('/articles/delete', ['uses' => 'ArticleController@deleteSelected']);

Route::get('/article/publish_all', ['uses' => 'ArticleController@publishAll', 'as' => 'article.publish-all'])
    ->where(['article' => '[0-9]+']);

/**
 * Admin resource
 */
Route::resource('article', 'ArticleController', ['except' => ['show', 'index']]);
Route::resource('category', 'CategoryController', ['except' => ['index', 'show']]);
Route::resource('tag', 'TagController', ['except' => ['index', 'show', 'create']]);
Route::resource('key', 'KeyController', ['except' => ['index', 'show', 'create']]);
Route::resource('randomize_word', 'RandomizeWordController', ['except' => ['index', 'show', 'create']]);
Route::resource('menu', 'MenuController', ['except' => ['index', 'show']]);
Route::resource('global_tag', 'GlobalTagController', ['except' => ['index', 'show', 'create']]);
Route::resource('statistic_url', 'StatisticUrlController', ['except' => ['index', 'show', 'create']]);
Route::resource('parser', 'ParserController', ['except' => ['index', 'show']]);
Route::resource('page', 'PageController', ['except' => ['show', 'index']]);

Route::get('/parser/{parser}/test', ['uses' => 'ParserController@test', 'as' => 'admin.parser.test'])
    ->where(['parser' => '[0-9]+']);
Route::get('/parser/{parser}/test/links', ['uses' => 'ParserController@testLink', 'as' => 'admin.parser.test.link'])
    ->where(['parser' => '[0-9]+']);
Route::get('/parser/{parser}/test/preview', ['uses' => 'ParserController@preview', 'as' => 'admin.parser.test.preview'])
    ->where(['parser' => '[0-9]+']);
Route::get('/parser/{parser}/test/preview/page/{type}', ['uses' => 'ParserController@previewPage', 'as' => 'admin.parser.test.preview.page'])
    ->where(['parser' => '[0-9]+']);
Route::get('/parser/{parser}/log', ['uses' => 'ParserController@log', 'as' => 'admin.parser.log'])
    ->where(['parser' => '[0-9]+']);
Route::get('/parser/parsers/log', ['uses' => 'ParserController@logs', 'as' => 'admin.parsers.logs']);

/**
 * IPS
 */
Route::delete('/ip/{ip}/toggle', ['uses' => 'IpController@toggleBlock', 'as' => 'ip.block']);
Route::delete('/ip/{ip}', ['uses' => 'IpController@destroy', 'as' => 'ip.delete']);
Route::delete('/ip', ['uses' => 'IpController@deleteUnBlocked', 'as' => 'ip.delete-unblocked']);

/**
 * Failed jobs
 */
Route::delete('/failed-jobs', ['uses' => 'AdminController@flushFailedJobs', 'as' => 'admin.failed-jobs.flush']);

Route::get('/sitemaps', ['uses' => 'SitemapsController@index', 'as' => 'admin.sitemaps']);
Route::post('/sitemaps', ['uses' => 'SitemapsController@generate', 'as' => 'admin.generate-sitemaps']);
Route::post('/sitemaps/ua', ['uses' => 'SitemapsController@generateUa', 'as' => 'admin.generate-sitemaps-ua']);

/**
 * Polls (Votes)
 */
Route::get('/poll/datatables', ['uses' => 'PollController@datatables', 'as' => 'admin.poll.datatables']);
Route::delete('/poll/delete', ['uses' => 'PollController@deleteSelected', 'as' => 'admin.poll.deleteselected']);
Route::resource('poll', 'PollController', ['as' => 'admin']);

/**
* Ping services
*/
Route::get('/pingservice/datatables', ['uses' => 'PingserviceController@datatables', 'as' => 'admin.pingservice.datatables']);
Route::delete('/pingservice/delete', ['uses' => 'PingserviceController@deleteSelected', 'as' => 'admin.pingservice.deleteselected']);
Route::resource('pingservice', 'PingserviceController', ['as' => 'admin']);

/**
* Black List Words
*/
Route::get('/blacklist/datatables', ['uses' => 'BlacklistController@datatables', 'as' => 'admin.blacklist.datatables']);
Route::delete('/blacklist/delete', ['uses' => 'BlacklistController@deleteSelected', 'as' => 'admin.blacklist.deleteselected']);
Route::resource('blacklist', 'BlacklistController', ['as' => 'admin']);

Route::get('/posttags',['uses' => 'ArticleController@getTags', 'as' => 'admin.gettags']);
