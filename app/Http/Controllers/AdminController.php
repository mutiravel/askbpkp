<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Crypt;
use App\Models\ask;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\users;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = users::all();
        return view('admin.index', compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'confirm_password' => 'required',
            'mobile' => 'required'
        ]);
        $user = new users;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->confirm_password = $request->confirm_password;
        $user->mobile = $request->mobile;

        $user->save();
        return redirect('/admin');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user = users::find($id);
        return view('admin.detail', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = users::find($id);
        return view('admin.update', compact('id', 'user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'confirm_password' => 'required',
            'mobile' => 'required'
        ]);
        users::where('id', $id)->update([
            'name' => $request->name,
            'email' => $request->email,
            'passsword' => $request->password,
            'confirm_password' => $request->confirm_password,
            'mobile' => $request->mobile,
        ]);
        return redirect('/admin');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $deleted = users::destroy($id);

        if ($deleted) {
            return back()->with('message:success', 'Deleted');
        } else {
            return back()->with('message:error', 'Error');
        }
    }


    function registerUser(Request $req)
    {
        $validateData = $req->validate([
            'name' => 'required|regex:/^[a-z A-Z]+$/u',
            'email' => 'required|email',
            'password' => 'required|min:6|max:12',
            'confirm_password' => 'required|same:password',
            'mobile' => 'numeric|required|digits:12'
        ]);
        $result = DB::table('users')
            ->where('email', $req->input('email'))
            ->get();

        $res = json_decode($result, true);
        print_r($res);

        if (sizeof($res) == 0) {
            $data = $req->input();
            $user = new users;
            $user->name = $data['name'];
            $user->email = $data['email'];
            $encrypted_password = crypt::encrypt($data['password']);
            $user->password = $encrypted_password;
            $encrypted_password = crypt::encrypt($data['confirm_password']);
            $user->confirm_password = $encrypted_password;
            $user->mobile = $data['mobile'];
            $user->save();
            session()->flash('register_status', 'User has been registered successfully');
            return redirect('/register');
        } else {
            session()->flash('register_status', 'This Email already exists.');
            return redirect('/register');
        }
    }
}
