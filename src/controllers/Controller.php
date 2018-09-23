<?php
namespace TonySong\DashQ\controllers;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    public function index(){
        return view('tonysong::home');
    }
}
