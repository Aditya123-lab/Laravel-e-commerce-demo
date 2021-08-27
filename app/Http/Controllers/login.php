<?php

namespace App\Http\Controllers;

use App\Models\register;
use Illuminate\Contracts\Session\Session as SessionSession;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;


class login extends Controller
{
    public function login(Request $request)
    {
        if ($request->session()->get('admin_id')) {

            return redirect('/home');

        } else {

            return view('AdminTheme.login');
        }
    }

    public function loginprocess(Request $request)
    {
        $request->validate([

            'email' => 'required | email',
            'pass' => 'required',

        ]);

        $email = $request->email;
        $password = $request->pass;

        if ($request->remember === null) {

            $session = register::where('email', $email)->where('pass', $password)->get();

            setcookie('admin_email', $email, time() - 86400 * 15);
            setcookie('admin_password', $password, time() - 86400 * 15);

            if (count($session) > 0) {

                Session::put('admin',$session);
                $request->session()->put('admin',$session['0']);
                $request->session()->put('admin_id', $session['0']->id);
                $request->session()->put('admin_name', $session['0']->f_name);

                return redirect('desbord');
            } else {

                return back()->with('fail', 'Email_id or Password does not match');
            }
        } else {

            $session = register::where('email', $email)->where('pass', $password)->get();

            setcookie('admin_email', $email, time() + 86400 * 15);
            setcookie('admin_password', $password, time() + 86400 * 15);

            if (count($session) > 0) {

               
                $request->session()->put('admin_id', $session['0']->id);
                $request->session()->put('admin_name', $session['0']->f_name);

                return redirect('desbord');
            } else {

                return back()->with('fail', 'Email_id or Password does not match');
            }
        }
    }
}
