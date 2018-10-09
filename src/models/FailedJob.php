<?php

namespace TonySong\DashQ\models;

use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;

class FailedJob
{
    static public $tableName = 'failed_jobs';
    static public function getCount()
    {
        return DB::connection(config('dashq.db.connection','mysql'))->table(self::$tableName)->count();
    }

    static public function get($keyword = '', $itemsPerPage = 15)
    {
        return DB::connection(config('dashq.db.connection','mysql'))->table(self::$tableName)
            ->where('exception', 'LIKE', '%' . $keyword . '%')
            ->orWhere('payload', 'LIKE', '%' . $keyword . '%')
            ->orWhere('queue', 'LIKE', '%' . $keyword . '%')
            ->orWhere('connection', 'LIKE', '%' . $keyword . '%')
            ->orderByDesc('id')->paginate($itemsPerPage);
    }

    static public function delete($ids)
    {
        if (is_array($ids)) {
            DB::transaction(function () use ($ids) {
                foreach ($ids as $id) {
                    DB::connection(config('dashq.db.connection','mysql'))->table(self::$tableName)->delete($id);
                }
            });
        } else {
            DB::connection(config('dashq.db.connection','mysql'))->table(self::$tableName)->delete($ids);
        }
        return true;
    }

    static public function deleteAll()
    {
        DB::connection(config('dashq.db.connection','mysql'))->table(self::$tableName)->truncate();
        return true;
    }

    static public function retry($ids)
    {
        if (is_array($ids)) {
            foreach ($ids as $id) {
                Artisan::call('queue:retry', [
                    'id' => [$id]
                ]);
            }
        } else {
            Artisan::call('queue:retry', [
                'id' => [$ids]
            ]);
        }
        return true;
    }

    static public function retryAll()
    {
        Artisan::call('queue:retry', 'all');
        return true;
    }
}
