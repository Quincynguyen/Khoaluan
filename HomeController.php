<?php

namespace App\Http\Controllers;

use App\Models\StudentClass;
use Illuminate\Http\Request;
use Auth;
use Validator;
class HomeController extends Controller
{
     public function __construct() {
    	$this->middleware('auth',['except'=>'getLogout']);
    }
   public function getIndex() {
      $class = StudentClass::where('status',1); 
      return view('home', ['class' => $class]);
      //return view('home');
    }
    public function getLogout() {
   	Auth::logout();
   	return redirect('login');
	}
}
