<?php 
Route::get('/osstest',function(){
    //app('oss')->remove('avatar/admin/15543432693646.jpg');
    return app('oss')->getPublicUrl('avatar/admin/15543432696607.jpg');
    //return 'this is oss test';
})
?>