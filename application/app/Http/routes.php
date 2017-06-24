<?php


Route::group(['middleware' => 'guest'], function(){
    Route::get('login', 'LoginController@loginView');

});

Route::auth();

Route::group(['middleware' => 'auth'], function() {

    Route::get('/home', 'HomeController@show');
    //Student
    Route::group(['prefix' => '/student/'], function(){
        Route::get('list', 'StudentController@show');
        Route::get('add', 'StudentController@addView');
        Route::post('add', 'StudentController@add');
        Route::get('edit/{id}', 'StudentController@editView');
        Route::post('edit/{id}', 'StudentController@edit');
        Route::get('delete/{id}', 'StudentController@delete');
    });

    //Faculty Member
    Route::group(['prefix' => '/faculty-member/'], function(){
        Route::get('list', 'FacultyMemberController@show');
        Route::get('add', 'FacultyMemberController@addView');
        Route::post('add', 'FacultyMemberController@add');
        Route::get('edit/{id}', 'FacultyMemberController@editView');
        Route::post('edit/{id}', 'FacultyMemberController@edit');
        Route::get('delete/{id}', 'FacultyMemberController@delete');
    });

    //Lecture
    Route::group(['prefix' => '/lecture/'], function(){
        Route::get('list', 'LectureController@show');
        Route::get('add', 'LectureController@addView');
        Route::post('add', 'LectureController@add');
        Route::get('edit/{id}', 'LectureController@editView');
        Route::post('edit/{id}', 'LectureController@edit');
        Route::get('delete/{id}', 'LectureController@delete');
    });

    //Classroom
    Route::group(['prefix' => '/classroom/'], function(){
        Route::get('list', 'ClassroomController@show');
        Route::get('add', 'ClassroomController@addView');
        Route::post('add', 'ClassroomController@add');
        Route::get('edit/{id}', 'ClassroomController@editView');
        Route::post('edit/{id}', 'ClassroomController@edit');
        Route::get('delete/{id}', 'ClassroomController@delete');
    });

    //Lecture Register
    Route::get('lecture-register', 'LectureRegisterController@view');
    Route::get('lecture-register/{lectureId}', 'LectureRegisterController@add');
});