<?php

namespace TonySong\DashQ\controllers;

use Illuminate\Auth\Events\Failed;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Session;
use TonySong\DashQ\models\FailedJob;
use TonySong\DashQ\models\Job;

class Controller extends BaseController
{
    public function index()
    {
        $failedJobCount = FailedJob::getCount();
        $jobCount = Job::getCount();
        return view('tonysong::home', [
            'failedJobCount' => $failedJobCount,
            'jobCount' => $jobCount
        ]);
    }

    public function jobs()
    {
        $jobs = Job::get(isset($_GET['keyword']) ? $_GET['keyword'] : '');
        return view('tonysong::jobs', [
            'jobs' => $jobs
        ]);
    }

    public function failedJobs()
    {
        $failedJobs = FailedJob::get(isset($_GET['keyword']) ? $_GET['keyword'] : '');
        return view('tonysong::failedjobs', [
            'failedJobs' => $failedJobs
        ]);
    }

    public function retryFailedJob($id)
    {
        FailedJob::retry($id);
        return redirect()->back()->with('success', ['Job with id ' . $id . ' retried.']);
    }

    public function retryFailedJobs(Request $request)
    {
        $ids = $request->input('ids');
        FailedJob::retry($ids);
        return redirect()->back()->with('success', ['Job with id: ' . implode(', ', $ids) . ' retried.']);
    }

    public function retryAllFailedJobs()
    {
        FailedJob::retryAll();
        return redirect()->back()->with('success', ['All jobs retried']);
    }

    public function deleteFailedJob($id)
    {
        try {
            FailedJob::delete($id);
            return redirect()->back()->with('success', ['Job with id ' . $id . ' deleted.']);
        } catch (QueryException $exception) {
            return redirect()->back()->with('error', ['Failed to delete job with id ' . $id . '. Reason: ' . $exception->getMessage()]);
        }
    }

    public function deleteFailedJobs(Request $request)
    {
        $ids = $request->input('ids');
        try {
            FailedJob::delete($ids);
            return redirect()->back()->with('success', ['Job with id: ' . implode(', ', $ids) . ' deleted.']);
        } catch (QueryException $exception) {
            return redirect()->back()->with('error', ['Failed delete job with id: ' . implode(', ', $ids) . '. Reason: ' . $exception->getMessage()]);
        }
    }

    public function deleteAllFailedJobs()
    {
        try {
            FailedJob::deleteAll();
            return redirect()->back()->with('success', ['All jobs deleted']);
        } catch (QueryException $exception) {
            return redirect()->back()->with('error', ['Failed to delete jobs. Reason: ' . $exception->getMessage()]);
        }
    }

    public function deleteJob($id)
    {
        try {
            Job::delete($id);
            return redirect()->back()->with('success', ['Job with id ' . $id . ' deleted']);
        } catch (QueryException $exception) {
            return redirect()->back()->with('error', ['Failed to delete job with id ' . $id . '. Reason: ' .  $exception->getMessage()]);
        }
    }

    public function deleteJobs(Request $request){
        $ids = $request->input('ids');
        try{
            Job::delete($ids);
            return redirect()->back()->with('success', ['Job with id: ' . implode(', ', $ids) . ' deleted']);
        }
        catch (QueryException $exception){
            return redirect()->back()->with('error', ['Failed to delete job with id: ' . implode(', ', $ids) . '. Reason: ' . $exception->getMessage()]);
        }
    }

    public function deleteAllJobs(){
        try {
            Job::deleteAll();
            return redirect()->back()->with('success', ['All jobs deleted']);
        } catch (QueryException $exception) {
            return redirect()->back()->with('error', ['Failed to delete jobs. Reason: ' . $exception->getMessage()]);
        }
    }
}
