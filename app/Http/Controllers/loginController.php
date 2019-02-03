<?php

namespace App\Http\Controllers;

use App\model\student;
use Illuminate\Cache\RetrievesMultipleKeys;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class loginController extends Controller
{
    function index()
    {
        return view('login.loginPage');
    }

    function loginStudent(Request $request)
    {
        $username = $request->username;
        $password = $request->password;
        $rememberMe = isset($request->remember_me);
        if (Auth::guard('student')->attempt(['username' => $username, 'password' => $password, 'status' => 1], $rememberMe)) {
            return redirect()->intended(route('student-dashboard'));

        }
        return redirect()->back()->with('success', 'error');
    }

    function logoutStudent()
    {
        Auth::guard('student')->logout();
        return redirect()->route('login-student');
    }


//    admin
    function adminIndex()
    {
        return view('backend.backendLogin.backendLoginPage.loginPage');
    }

    function adminPage(Request $request)
    {

        $username = $request->username;
        $password = $request->password;
        $rememberMe = isset($request->remember_me);
        if (Auth::guard('admin')->attempt(['username' => $username, 'password' => $password, 'status' => 1], $rememberMe)) {
            return redirect()->intended(route('admin-dashboard'));
        }
        return redirect()->back()->with('fail', 'invalid User');

    }

    function adminLogout()
    {
        Auth::guard('admin')->logout();
        return redirect()->route('login-admin');

    }


}
