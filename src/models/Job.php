<?php

namespace TonySong\DashQ\models;

use Illuminate\Support\Facades\DB;

class Job
{
    static public $tableName = 'jobs';
    static public function getCount(){
        return DB::table(self::$tableName)->count();
    }
    static public function get($keyword = '', $itemsPerPage = 15)
    {
            return DB::table(self::$tableName)
                ->where('payload', 'LIKE', '%' . $keyword . '%')
                ->orWhere('queue', 'LIKE', '%' . $keyword . '%')
                ->orderByDesc('id')->paginate($itemsPerPage);
    }

    static public function delete($ids)
    {
        if (is_array($ids)) {
            DB::transaction(function () use ($ids) {
                foreach ($ids as $id) {
                    DB::table(self::$tableName)->delete($id);
                }
            });
        } else {
            DB::table(self::$tableName)->delete($ids);
        }
        return true;
    }

    static public function deleteAll(){
        DB::table(self::$tableName)->truncate();
        return true;
    }
}
