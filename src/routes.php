<?php
$dashqMiddleware = [];
$dashqConfig = config('dashq');
$dashqUri = $dashqConfig['uri'];

if(is_array($dashqConfig['middleware'])){
    $dashqMiddleware = array_merge($dashqMiddleware,$dashqConfig['middleware']);
}
$dashqMiddleware[] = 'web';
$dashqMiddleware[] = 'checkJobSystem';


Route::group(['middleware' => $dashqMiddleware, 'prefix' => $dashqUri], function(){
    Route::get('/', 'TonySong\DashQ\controllers\Controller@index')->name('dashq::home');
    Route::get('jobs', 'TonySong\DashQ\controllers\Controller@jobs')->name('dashq::jobs');
    Route::get('failedjobs', 'TonySong\DashQ\controllers\Controller@failedJobs')->name('dashq::failedjobs');
    //action
    //on failed jobs page
    Route::get('retryjob/{id}', 'TonySong\DashQ\controllers\Controller@retryFailedJob')->name('dashq::retryFailedJob');
    Route::post('retryfailedjobs', 'TonySong\DashQ\controllers\Controller@retryFailedJobs')->name('dashq::retryFailedJobs');
    Route::get('retryalljobs', 'TonySong\DashQ\controllers\Controller@retryAllFailedJobs')->name('dashq::retryAllFailedJobs');
    Route::get('deletefailedjob/{id}', 'TonySong\DashQ\controllers\Controller@deleteFailedJob')->name('dashq::deleteFailedJob');
    Route::post('deletefailedjobs', 'TonySong\DashQ\controllers\Controller@deleteFailedJobs')->name('dashq::deleteFailedJobs');
    Route::get('deleteallfailedjobs', 'TonySong\DashQ\controllers\Controller@deleteAllFailedJobs')->name('dashq::deleteAllFailedJobs');

    //on jobs
    Route::get('deletejob/{id}', 'TonySong\DashQ\controllers\Controller@deleteJob')->name('dashq::deleteJob');
    Route::post('deletejobs', 'TonySong\DashQ\controllers\Controller@deleteJobs')->name('dashq::deleteJobs');
    Route::get('deletealljob', 'TonySong\DashQ\controllers\Controller@deleteAllJobs')->name('dashq::deleteAllJobs');

});


