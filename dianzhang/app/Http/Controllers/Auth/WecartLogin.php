<?php
/**
 * Created by PhpStorm.
 * User: wu
 * Date: 2020/3/11
 * Time: 15:16
 */

namespace App\Http\Controllers\Auth;


use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class WecartLogin extends Controller
{
    public function login()
    {
        //echo 234;die;
        if (Auth::attempt(['username' => 'admin', 'password' => 'admin123456'])) {

          return redirect('/');
            //$user = Auth::user();
           // dd($user);
        }

        User::where('id',1)->update(['username'=>'admin','password'=>bcrypt('admin123456')]);
        echo 234234;
    }

    public function addUser()
    {

        $open_id = 'xiaoming';
        $password = bcrypt('xrh123456');


    }



}