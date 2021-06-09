<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
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
            if($image = $request->file('image_path')) {
                $filename = time().$image->getClientOriginalName();
                $path = $image->storeAs('images', $filename, 'public');
            }else{
                $filename = "";
            }
            $tweet->image_path = $filename;
            $tweet->save();
            return redirect('/');
        }
    }

    /**
     * 投稿を削除
     * 
     */
    public function destroy($id) {
        $tweet = Tweet::find($id)->delete();
        return redirect('/');
    }
}
