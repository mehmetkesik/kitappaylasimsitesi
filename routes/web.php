<?php

use Illuminate\Support\Facades\Route;

Route::get('/', "IndexController@index")->name('index');

Route::get('/kitap/{id?}', "BookController@book")->name('book');

Route::get('/kitap-ara/{text?}/{page?}', "BookController@search")->name('search');
Route::get('/yeni-eklenenler', "BookController@new_added")->name('new_added');
Route::get('/en-sevilenler', "BookController@most_loved")->name('most_loved');
Route::get('/cok-okunanlar', "BookController@much_read")->name('much_read');

Route::get('/forum-ara/{text?}/{page?}', "ForumController@forumSearch")->name('forum.search');
Route::get('/forum/{id}/{page?}', "ForumController@forum")->name('forum.{id}');

Route::get('/hakkinda', function () {
    return view("about");
})->name('about');
Route::get('/iletisim', function () {
    return view("contact");
})->name('contact');

Route::group(['middleware' => ['auth']], function () {
    Route::get("/profil", "IndexController@profile")->name("profile");
    Route::get("/profil/duzenle", "IndexController@profileEdit")->name("profile.edit");
    Route::post("/profil/duzenle/post", "IndexController@profileEditPost")->name("profile.edit.post");
    Route::get("/sifre/duzenle", "IndexController@passwordEdit")->name("password.edit");
    Route::post("/sifre/duzenle/post", "IndexController@passwordEditPost")->name("password.edit.post");
    Route::get("/kitap-yukle", "BookController@bookUpload")->name("book.upload");
    Route::post("/kitap-yukle-post", "BookController@bookUploadPost")->name("book.upload.post");
    Route::post("/kitap-istek", "BookController@bookRequestPost")->name("book.request.post");
    Route::post("/kitap-sil", "BookController@bookDelete")->name("book.delete");
    Route::post('/forum-comment-post', "ForumController@forumCommentPost")->name('forum.comment.post');
    Route::post('/forum-post', "ForumController@forumPost")->name('forum.post');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
