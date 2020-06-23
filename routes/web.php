<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/
// route('route name', ['lang' => 'uk']);
Route::group(
    [ 
        'prefix' => LocalizationService::locale(),
        'middleware' => 'setLocale'
    ], 
    function() {

        // //Переключение языков
        Route::get('setlocale/{lang}', function ($lang) {
            // dd($lang);
            $referer = Redirect::back()->getTargetUrl(); //URL предыдущей страницы
            $parse_url = parse_url($referer, PHP_URL_PATH); //URI предыдущей страницы

            //разбиваем на массив по разделителю
            $segments = explode('/', $parse_url);

            //Если URL (где нажали на переключение языка) содержал корректную метку языка
               
            if (in_array($segments[1], config('app.locales') ) && ($segments[1] != $lang)) {

                unset($segments[1]); //удаляем метку
            } 

            //Добавляем метку языка в URL (если выбран не язык по-умолчанию)
            if ( $lang != config('app.locale') ){ 
                array_splice($segments, 1, 0, $lang); 
            }
            $new_segments = [];

            //формируем полный URL
            foreach ($segments as $key => $segment) {
                if ( !empty($segment) ) 
                    $new_segments[] = $segment;
            }

            // dd( implode( "/", $new_segments ));

            $url = Request::root() . '/' . implode( "/", $new_segments );
            
            //если были еще GET-параметры - добавляем их
            if(parse_url($referer, PHP_URL_QUERY)){    
                $url = $url.'?'. parse_url($referer, PHP_URL_QUERY);
            }

            return redirect($url); //Перенаправляем назад на ту же страницу                            

        })->name('setlocale');

        Route::get('/tasks/post/articles/12D3c4DFd', function () {
            $article = \App\Models\Article::query()
                ->withoutGlobalScopes()
                ->orderBy('created_at', 'ASC')
                ->whereNull('published_at')
                ->first();

            $article->update([
                'published_at' => now(),
            ]);

            return response()
                ->json(['status' => 'success']);
        });


        // Site route
        // Route::get('/', ['uses' => 'HomeController@index', 'as' => 'index']);
        Route::get('/blogger/{name}', ['uses' => 'BloggerController@single', 'as' => 'blogger.single']);
        Route::get('/bloggers', ['uses' => 'BloggerController@archive', 'as' => 'blogger.archive']);
        
        Route::get('/tags/test',  ['uses' => 'TagController@test', 'as' => 'test']);

        // Post
        Route::get('/', ['uses' => 'ArticleController@mainPage', 'as' => 'main']);

        Route::get('/search', ['uses' => 'ArticleController@search', 'as' => 'search']);
        Route::get('/projects', ['uses' => 'HomeController@projects', 'as' => 'projects']);
        Route::get('/achieve', ['uses' => 'HomeController@achieve', 'as' => 'achieve']);

        Route::get('article/mainpart', ['uses' => 'ArticleController@mainPart', 'as' => 'article.mainpart']);
        Route::get('article/mainpartlazy', ['uses' => 'ArticleController@mainPartLazyCats']);


        Route::get('articles/monitoring/init', ['uses' => 'MonitoringController@articlesMonitoring', 'as' => 'articles.monitoring']);

        // User Auth
        // Auth::routes(['register' => false]);
        Route::get('logout', 'Auth\LoginController@logout');
        
        Route::get('admin/vxod01', 'Auth\LoginController@showLoginForm')->name('login');
        Route::post('login/', 'Auth\LoginController@login');


        // User
        Route::get('/user/{name}', ['uses' => 'UserController@show', 'as' => 'user.show']);
        Route::get('/user/me/settings', ['uses' => 'UserController@settings', 'as' => 'user.settings']);
        Route::get('/user/me/pictures', ['uses' => 'UserController@pictures', 'as' => 'user.pictures']);
        Route::get('/notifications', ['uses' => 'UserController@notifications', 'as' => 'user.notifications']);
        Route::delete('/notifications', ['uses' => 'UserController@deleteReadNotifications', 'as' => 'user.delete_read_notifications']);
        Route::get('/read_notification/{id}', ['uses' => 'UserController@readNotification', 'as' => 'user.read_notification']);
        Route::get('/delete_notification/{id}', ['uses' => 'UserController@deleteNotification', 'as' => 'user.delete_notification']);
        Route::patch('/user/update/avatar', ['uses' => 'UserController@updateAvatar', 'as' => 'user.update.avatar']);
        Route::patch('/user/delete/avatar', ['uses' => 'UserController@deleteAvatar', 'as' => 'user.delete.avatar']);
        Route::patch('/user/update/profile', ['uses' => 'UserController@updateProfile', 'as' => 'user.update.profile']);
        Route::patch('/user/delete/profile', ['uses' => 'UserController@deleteProfile', 'as' => 'user.delete.profile']);
        Route::patch('/user/update/info', ['uses' => 'UserController@update', 'as' => 'user.update.info']);

        // Category
        Route::get('/category/{name}', ['uses' => 'CategoryController@show', 'as' => 'category.show']);

        Route::get('/category', ['uses' => 'CategoryController@index', 'as' => 'category.index']);

        // Tag
        Route::get('/tag/{name}', ['uses' => 'TagController@show', 'as' => 'tag.show']);
        Route::get('/tag', ['uses' => 'TagController@index', 'as' => 'tag.index']);

        // Comment
        Route::get('/commentable/{commentable_id}/comments', ['uses' => 'CommentController@show', 'as' => 'comment.show']);
        Route::get('comment/{comment}', ['uses' => 'CommentController@edit', 'as' => 'comment.edit']);
        Route::get('comment/{comment}/edit', ['uses' => 'CommentController@edit', 'as' => 'comment.edit'])->where(['comment' => '[0-9]+']);

        // SiteMap
        // Route::get('sitemap', 'GeneratedController@index');
        // Route::get('sitemap.xml', 'GeneratedController@index');
        
        Route::get('sitemap.xml', 'GeneratedController@sitemapContain');
        Route::get('sitemap/sitemap0.xml', 'GeneratedController@index');
        Route::get('sitemap/sitemap{nubmer}.xml', 'GeneratedController@sitemap');
        Route::get('xml-news-sitemap.xsl', 'GeneratedController@xmlSitemap');
         // Route::get('sitemapegen/2275000_6487.xml', 'GeneratedController@sitemapegen');

        // Feed
        Route::get('feed.xml', 'GeneratedController@feed')->name('feed');

        // Comment
        Route::resource('comment', 'CommentController', ['only' => ['store', 'destroy', 'update']]);

        // Polls
        Route::post('/polls', ['uses' => 'PollController@vote', 'as' => 'poll.vote']);

        /*
         * must last
         */
        Route::get('/{slug}', ['uses' => 'ArticleController@show', 'as' => 'article.show'])->where('slug', '(.*)');
        // Route::get('/{slug}', ['uses' => 'ArticleController@set_tags']);
        //Route::get('/{name}', ['uses' => 'PageController@show', 'as' => 'page.show']);
        
    }
);
