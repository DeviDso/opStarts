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
Route::post('/bybiene', ['as' => 'bybis', 'uses' => 'UserController@cropImage']);
Route::post('/bybiene2', ['as' => 'bybis2', 'uses' => 'MyPagesController@picture']);
Route::group(['middleware' => 'categories'], function(){
    Auth::routes();

    Route::get('/', ['as' => 'home', 'uses' => 'PagesController@home', 'middleware' => ['categories', 'invitations']]);
//USER
    Route::group(['middleware' => ['auth', 'invitations']], function(){

        Route::get('/user/profile/{id}', ['as' => 'viewUser', 'uses' => 'PagesController@user']);

        Route::get('/profile', ['as' => 'profile', 'uses' => 'PagesController@profile']);
        Route::get('/profile/settings', ['as' => 'settings', 'uses' => 'PagesController@settings']);
        Route::get('/profile/password', ['as' => 'password', 'uses' => 'PagesController@password']);

        //POST
        Route::post('/profile', ['as' => 'postProfile', 'uses' => 'UserController@postProfile']);
        Route::post('/profile/image/post', ['as' => 'postProfilePicture', 'uses' => 'CropController@postUpload']);
        Route::post('/profile/image/crop', ['as' => 'postProfileCrop', 'uses' => 'CropController@postCrop']);

        Route::group(['middleware' => 'unconfirmed'], function(){
            Route::get('/confirmation', ['as' => 'confirmation', 'uses' => 'PagesController@confirmation']);
            Route::post('/confirmation', ['as' => 'postConfirmation', 'uses' => 'UserController@postConfirmation']);
            Route::post('/resend-confirmation', ['as' => 'resendConfirmation', 'uses' => 'UserController@resendConfirmation']);
        });

        Route::group(['middleware' => 'confirmed'], function(){
            //PAGES
            Route::get('/new', ['as' => 'newPage', 'uses' => 'PagesController@newPage']);
            Route::get('/my', ['as' => 'myPages', 'uses' => 'PagesController@myPages']);

            Route::get('/my/{id}', ['as' => 'myPage', 'uses' => 'MyPages@viewPage']);

            //Post
            Route::post('/user/page/{id}/update', ['as' => 'updatePageZZ']);
            Route::post('/user/page/{id}/update/description', ['as' => 'updatePageDescription', 'uses' => 'MyPages@description']);
            Route::post('/user/page/{id}/update/name', ['as' => 'updatePageName', 'uses' => 'MyPages@name']);
            Route::post('/user/page/{id}/update/email', ['as' => 'updatePageEmail', 'uses' => 'MyPages@email']);
            Route::post('/user/page/{id}/update/phone', ['as' => 'updatePagePhone', 'uses' => 'MyPages@phone']);
            Route::post('/user/page/{id}/update/website', ['as' => 'updatePagesWebsite', 'uses' => 'MyPages@website']);
            Route::post('/user/page/{id}/update/address', ['as' => 'updatePageAddress', 'uses' => 'MyPages@address']);
            Route::post('/user/page/{id}/update/logo', ['as' => 'updatePageLogo', 'uses' => 'MyPages@logo']);

            Route::get('/my/individual/{id}', ['as' => 'myIndividualPage', 'uses' => 'PagesController@myIndividualPage']);
            Route::post('/my-page/individual/{id}', ['as' => 'editIndividualPage', 'uses' => 'MyPages@editIndividualPage']);

            Route::get('/my/company/{id}', ['as' => 'myCompanyPage', 'uses' => 'PagesController@myCompanyPage']);
            Route::post('/my/company/{id}', ['as' => 'editCompanyPage', 'uses' => 'MyPages@editCompanyPage']);
            Route::get('/my/page/status/{id}', ['as' => 'changePageStatus', 'uses' => 'MyPages@changePageStatus']);

            //Gallery
            Route::post('/pages/update/gallery/add/new/item', ['as' => 'galleryPost', 'uses' => 'GalleryController@store']);


            Route::get('/my-list', ['as' => 'myList', 'uses' => 'PagesController@myList']);

            Route::get('/my-list/portfolio/{page}', ['as' => 'myPagePortfolio', 'uses' => 'PagesController@myPagePortfolio']);
            Route::get('/activate-page/{id}', ['as' => 'activatePage', 'uses' => 'MyPages@activatePage']);
            Route::get('/suspend-page/{id}', ['as' => 'suspendPage', 'uses' => 'MyPages@suspendPage']);

            //POST
            Route::post('/new-page', ['as' => 'postPage', 'uses' =>'MyPages@postPage']);
            Route::post('/update/page/{id}', ['as' => 'updatePage', 'uses' =>'MyPages@editPage']);
            Route::post('/delete/page/{id}', ['as' => 'deletePage', 'uses' =>'MyPages@deletePage']);
            Route::post('/my-list/portfolio/{page}', ['as' => 'postPortfolio', 'uses' => 'MyPages@postPortfolio']);

            //GROUPS
            Route::get('/groups/add', ['as' => 'newGroup', 'uses' => 'UserGroupsController@create']);
            Route::get('/group/{id}', ['as' => 'userGroup', 'uses' => 'UserGroupsController@group']);

            //POST
            Route::post('/groups/add', ['as' => 'postGroup', 'uses' => 'UserGroupsController@postGroup']);

            //GROUP INVITES
            Route::get('/group-invitations', ['as' => 'groupInvitations', 'uses' => 'UserGroupsController@invitations']);
            Route::post('/group-invitations/accept', ['as' => 'acceptGroupInvitation', 'uses' => 'UserGroupsController@acceptInvitation']);
            Route::post('/group-invitations/reject', ['as' => 'rejectGroupInvitation', 'uses' => 'UserGroupsController@rejectInvitation']);
        });

        //ADMIN
        Route::group(['middleware' => 'admin'], function(){

        });
    });

//PAGES
    Route::get('/about', ['as' => 'about', 'uses' => 'PagesController@about']);

//COMPANIES LISTING
    Route::get('/{category}', ['as' => 'category', 'uses' => 'PagesController@category']);
    Route::get('/{category}/{city}', ['as' => 'categoryCity', 'uses' => 'PagesController@categoryCity']);
    Route::get('/{category}/service/{skill}', ['as' => 'categorySkill', 'uses' => 'PagesController@categorySkill']);
    Route::get('/{category}/{city}/{skill}', ['as' => 'categoryCitySkill', 'uses' => 'PagesController@categoryCitySkill']);
    Route::get('/view/{category}/{city}/{slug}/{id}', ['as' => 'viewPage', 'uses' => 'PagesController@viewPage']);
    //Route::get('/company/{category}/{city}/{slug}-{id}', ['as' => 'viewCompany', 'uses' => 'PagesController@viewCompany']);

//EXPORTS
    Route::get('/opStarts/export/data/categories', ['as' => 'exportCategories', 'uses' => 'ExportController@categories']);
    Route::get('/opStarts/export/data/professions', ['as' => 'exportProfessions', 'uses' => 'ExportController@professions']);
    Route::get('/opStarts/export/data/services', ['as' => 'exportServices', 'uses' => 'ExportController@services']);
    Route::get('/opStarts/export/data/pageGeo/{id}', ['as' => 'exportPageGeo', 'uses' => 'ExportController@pageGeo']);
    Route::get('/opStarts/export/data/skills', ['as' => 'exportSkills', 'uses' => 'ExportController@allSkills']);
    Route::get('/opStarts/export/data/members', ['as' => 'exportMembers', 'uses' => 'ExportController@allMembers']);

});


