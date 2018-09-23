<?php
namespace TonySong\DashQ\models;
use Illuminate\Support\Facades\DB;

class FailedJob
{
    static public $tableName = 'failed_jobs';

    static public function get($page = 0, $itemsPerPage = 10)
    {
        if ($page === 0) {
            return DB::table(self::$tableName);
        }
        $page = $page - 1;
        $startFrom = $page * $itemsPerPage;
        return DB::table(self::$tableName)->skip($startFrom)->take($itemsPerPage)->get();
    }

    static public function delete($ids){
        if(is_array($ids)){
            DB::transaction(function() use($ids){
               foreach ($ids as $id){
                   DB::table(self::$tableName)->delete($id);
               }
            });
        }
        else{
            DB::table(self::$tableName)->delete($ids);
        }
        return true;
    }

    static public function retry($ids){
        if(is_array($ids)){
            foreach ($ids as $id){
                Artisan::call('queue:retry', [
                    $id
                ]);
            }
        }
        else {
            Artisan::call('queue:retry', [
               $ids
            ]);
        }
        return true;
    }

}
