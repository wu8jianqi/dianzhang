<?php
/**
 * Created by PhpStorm.
 * User: wu
 * Date: 2020/3/11
 * Time: 15:16
 */

namespace App\Http\Controllers\Backend;


use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class WecartLogin extends Controller
{
    public function login()
    {
if(Auth::attempt(['username'=>'admin','password'=>'admin123456'])){

    return redirect('/');
    }
echo 234234;die;
//if (Auth::attempt(['email' => $email, 'password' => $password])) {
//    // 认证通过...
//return redirect()->intended('dashboard');
}
}