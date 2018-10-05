<?php
Route::middleware(['web'])->group(function(){
    Route::get('dashq', 'TonySong\DashQ\controllers\Controller@index')->name('dashq::home');
    Route::get('dashq/jobs', 'TonySong\DashQ\controllers\Controller@jobs')->name('dashq::jobs');
    Route::get('dashq/failedjobs', 'TonySong\DashQ\controllers\Controller@failedJobs')->name('dashq::failedjobs');
    //action
    //on failed jobs page
    Route::get('dashq/retryjob/{id}', 'TonySong\DashQ\controllers\Controller@retryFailedJob')->name('dashq::retryFailedJob');
    Route::post('dashq/retryfailedjobs', 'TonySong\DashQ\controllers\Controller@retryFailedJobs')->name('dashq::retryFailedJobs');
    Route::get('dashq/retryalljobs', 'TonySong\DashQ\controllers\Controller@retryAllFailedJobs')->name('dashq::retryAllFailedJobs');
    Route::get('dashq/deletefailedjob/{id}', 'TonySong\DashQ\controllers\Controller@deleteFailedJob')->name('dashq::deleteFailedJob');
    Route::post('dashq/deletefailedjobs', 'TonySong\DashQ\controllers\Controller@deleteFailedJobs')->name('dashq::deleteFailedJobs');
    Route::get('dashq/deleteallfailedjobs', 'TonySong\DashQ\controllers\Controller@deleteAllFailedJobs')->name('dashq::deleteAllFailedJobs');

    //on jobs
    Route::get('dashq/deletejob/{id}', 'TonySong\DashQ\controllers\Controller@deleteJob')->name('dashq::deleteJob');
    Route::post('dashq/deletejobs', 'TonySong\DashQ\controllers\Controller@deleteJobs')->name('dashq::deleteJobs');
    Route::get('dashq/deletealljob', 'TonySong\DashQ\controllers\Controller@deleteAllJobs')->name('dashq::deleteAllJobs');



});


