<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index(){

        return view('index');
    }

    public function menu(){

        return view('menu');
    }

    public function editFood(){

        return view('editFood');
    }

    public function report(){

        return view('report');
    }

    public function orders(){

        return view('orders');
    }

    public function contact(){

        return 'contact';
    }
}
