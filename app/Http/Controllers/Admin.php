<?php

namespace App\Http\Controllers;

use App\Models\addbook;
use Illuminate\Http\Request;
use App\Models\register;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class Admin extends Controller
{
    function registration()
    {
        return view('AdminTheme.registration');
    }

    public function desbord(Request $request)
    {
        if ($request->session()->get('admin_id') == "") {

            return redirect('/login');
        } else {

            $adminname = $request->session()->get('admin_name');

            return view('AdminTheme.home');
        }
    }

    public function chnage(Request $request)
    {
        if ($request->session()->get('admin_id') == "") {

            return redirect('/login');
        } else {

            return view('AdminTheme.chnage');
        }
    }

    function add_book(Request $request)
    {
        if ($request->session()->get('admin_id') == "") {

            return redirect('/login');
        } else {

            return view('AdminTheme.add_book');
        }
    }

    function logout()
    {
        Session::flush();
        return redirect('/login');
    }

    //registra admin
    public function formdataprocess(Request $request)
    {
        $request->validate([

            'f_name' => 'required',
            'l_name' => 'required',
            'email' => 'required | email',
            'pass' => 'required',
            'c_pass' => 'required | same:pass',
            'date' => 'required | date',
            'c_code' => 'required',
            'number' => 'required | min:10 | max:10',
            'gender' => 'required',
            'file' => 'required | mimes:png',
            'address' => 'required'

        ]);

        //insert data
        $register = new register;

        $register->f_name = request()->f_name;
        $register->l_name = request()->l_name;
        $register->email = request()->email;

        //check email
        $check_email = register::where('email', $request->email)->get();

        if (count($check_email) > 0) {

            return back()->with('fail', 'Email Exists');
        }

        $register->pass = request()->pass;
        $register->date = request()->date;
        $register->c_code = request()->c_code;
        $register->number = request()->number;
        $register->gender = request()->gender;

        //photo
        $image = $request->file('file');
        $imageName = time() . '.' . $image->extension();
        $image->move(public_path('uploades'), $imageName);

        $register->file = $imageName;
        $register->address = request()->address;

        $save = $register->save();

        if ('save') {
            return back()->with('success', 'Register successfully');
        } else {
            return back()->with('fail', 'Register fail');
        }
    }

    //chenge password
    public function check_password(Request $request)
    {
        $request->validate([

            'old_pass' => 'required',
            'new_pass' => 'required',
            'cof_pass' => 'required | same:new_pass'

        ]);

        $get_id = session()->get('admin_id');

        $admin = register::where('id', '=', $get_id)->first();

        if ($request->old_pass == $admin->pass) {

            if ($request->old_pass == $request->new_pass) {

                return back()->with('fail', 'Old Password and New Password Match');
            } else {

                $admin->pass = $request->new_pass;
                $admin->save();

                return back()->with('success', 'Password Chnage SuccessFully');
            }
        } else {

            return back()->with('fail', 'Old Password Not Match');
        }
    }

    //addbook data 
    public function addbook(Request $request)
    {
        $request->validate([

            'book' => 'required',
            'quantity' => 'required',
            'author' => 'required',
            'price' => 'required',
            'photo' => 'required',
            'intro' => 'required'
        ]);

        //add_bbok
        $add_book = new addbook;

        $add_book->book = request()->book;

        //check book
        $check_email = addbook::where('book', $request->book)->get();

        if (count($check_email) > 0) {

            return back()->with('fail', 'Book Exists');
        }

        $add_book->quantity = request()->quantity;
        $add_book->author = request()->author;
        $add_book->price = request()->price;


        //add photo
        $image = $request->file('photo');
        $imageName = time() . '.' . $image->extension();
        $image->move(public_path('uploades'), $imageName);

        $add_book->photo = $imageName;
        $add_book->intro = request()->intro;

        $save = $add_book->save();

        if ('save') {
            return back()->with('success', 'Book Add Successfully');
        } else {
            return back()->with('fail', 'Try Agai');
        }
    }

    public function show_book(Request $request)
    {
        if ($request->session()->get('admin_id') == "") {

            return redirect('/login');
        } else {

            $data = array(

                'list' => DB::table('addbooks')->get()
            );
            return view('AdminTheme.show_book', $data);
        }
    }

    public function Delete($id)
    {
        $delete = DB::table('addbooks')
            ->where('id', $id)
            ->delete();

        return redirect('show_book')->with('success', 'Book has been Deleted successfully');
    }

    function edit($id)
    {
        $find1 = DB::table('addbooks')
            ->where('id', $id)->first();
        return view('AdminTheme.edit', compact('find1'));
    }


    public function update(Request $request, $id)
    {
        $request->validate([

            'book' => 'required',
            'quantity' => 'required',
            'author' => 'required',
            'price' => 'required',
            'photo' => 'required',
            'intro' => 'required'
        ]);

        $userarray = addbook::where('id', $id)->first();

        $userarray->book = $request->get('book');
        $userarray->quantity = $request->get('quantity');
        $userarray->author = $request->get('author');
        $userarray->price = $request->get('price');

        //add photo
        $image = $request->file('photo');
        $imageName = time() . '.' . $image->extension();
        $image->move(public_path('uploades'), $imageName);

        $userarray->photo = $imageName;

        $userarray->intro = $request->get('intro');

        $save = $userarray->save();

        if ($save) {
            return redirect('show_book')->with('success', 'Book Update success fully');
        } else {
            return redirect('show_book')->with('fail', 'Book Not Update');
        }
    }
}
