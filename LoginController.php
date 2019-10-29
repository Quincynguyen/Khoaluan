<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Validator;
use Auth;
use Illuminate\Support\MessageBag;

class LoginController extends Controller
{
    
    public function getLogin() {
    	return view('login');
    }
    public function postLogin(Request $request) {
    	$rules = [
    		'username' =>'bail|required|min:6|max:10',
    		'password' => 'required|min:8'
    	];
    	$messages = [
    		'username.required' => 'Username là trường bắt buộc',
    		'username.min' => 'username ít nhất là 6 kí tự',
    		'username.max' => 'username nhiều nhất là 10 kí tự',
    		'password.required' => 'Mật khẩu là trường bắt buộc',
    		'password.min' => 'Mật khẩu phải chứa ít nhất 8 ký tự',
    	];
    	$validator = Validator::make($request->all(), $rules, $messages);

    	if ($validator->fails()) {
    		return redirect()->back()->withErrors($validator)->withInput();
    	} else {
    		$username = $request->input('username');
    		$password = $request->input('password');

    		if( Auth::attempt(['username' => $username, 'password' =>$password])) {
    			return redirect()->intended('/');
    		} else {
    			$errors = new MessageBag(['errorlogin' => 'Username hoặc mật khẩu không đúng']);
    			return redirect()->back()->withInput()->withErrors($errors);
    		}
    	}
    }
}