<?php

namespace TonySong\DashQ\middlewares;

use Closure;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CheckJobSystem
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $connection = config('dashq.db.connection','mysql');
        $queueDriver = config('queue.default');
        $schema = Schema::connection($connection);
        $hasFailedJobsTable = $schema->hasTable('failed_jobs');
        $hasJobsTable =Schema::connection($connection)->hasTable('jobs');
        if($hasFailedJobsTable && $hasJobsTable && ($queueDriver == 'database')){
            return $next($request);
        }
        else{
            return response(view('tonysong::notready')->with([
                'queueDriver' => $queueDriver,
                'hasJobsTable' => $hasJobsTable,
                'hasFailedJobsTable' => $hasFailedJobsTable
            ]));
        }

    }
}
