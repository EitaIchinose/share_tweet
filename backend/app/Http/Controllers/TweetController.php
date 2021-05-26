<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TweetController extends Controller
{
    /**
     * トップページを表示
     * 
     */
    public function index() {
        return view('tweets/index');
    }
}
