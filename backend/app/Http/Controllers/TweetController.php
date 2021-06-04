<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tweet;
use Validator;

class TweetController extends Controller
{
    /**
     * トップページを表示
     * 
     */
    public function index() {
        $tweets = Tweet::all();
        return view('tweets/index', ['tweets' => $tweets]);
    }

    /**
     * 投稿機能
     * 
     */
    public function store(Request $request) {
        $tweet = new Tweet();
        $form = $request->all();

        $rules = [
            'user_id' => 'integer|required',
            'text' => 'required'
        ];

        $message = [
            'user_id.integer' => 'System Error',
            'user_id.required' => 'System Error',
            'text.required' => '※ツイートが入力されていません'
        ];

        $validator = Validator::make($form, $rules, $message);

        if($validator->fails()){
            return redirect('/')->withErrors($validator)->withInput();
        }else{
            unset($form['_token']);
            $tweet->user_id = $request->user_id;
            $tweet->text = $request->text;
            $tweet->image_path = $request->image_path;
            $tweet->save();
            return redirect('/');
        }
    }
}
