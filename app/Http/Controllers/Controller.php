<?php

namespace App\Http\Controllers;

use App\AliadosEstrategicos;
use DB;
use Illuminate\Http\Request;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function index(){

    $lis_aliados = AliadosEstrategicos::all()->toArray();
        return view('welcome',compact('lis_aliados'));

    }

}

