<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Crypt;
use App\Models\ask;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\users;

class AskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ask = ask::all();
        return view('ask.index', compact('ask'));
    }
    public function index1()
    {
        //$ask = ask::all();
        $ask = ask::orderBy('tanya', 'desc')->limit(3)->get();
        return view('front1.master', compact('ask'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('ask.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'tanya' => 'required',
            'jawab' => 'required'
        ]);
        $ask = new ask;
        $ask->tanya = $request->tanya;
        $ask->jawab = $request->jawab;

        $ask->save();
        return redirect('/ask');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $ask = ask::find($id);
        return view('ask.detail', compact('ask'));
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $ask = ask::find($id);
        return view('ask.update', compact('id', 'ask'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'tanya' => 'required',
            'jawab' => 'required'
        ]);
        ask::where('id', $id)->update([
            'tanya' => $request->tanya,
            'jawab' => $request->jawab,
        ]);
        return redirect('/ask');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $deleted = ask::destroy($id);

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


    function login(Request $req)
    {
        $validatedData = $req->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $result = DB::table('users')
            ->where('email', $req->input('email'))
            ->get();

        $res = json_decode($result, true);
        print_r($res);

        if (sizeof($res) == 0) {
            session()->flash('error', 'Email Id does not exist. Please register yourself first');
            echo "Email Id Does not Exist.";
            return redirect('login');
        } else {
            echo "Hello";
            $encrypted_password = $result[0]->password;
            $decrypted_password = crypt::decrypt($encrypted_password);
            if ($decrypted_password == $req->input('password')) {
                echo "You are logged in Successfully";
                $req->session()->put('user', $result[0]->name);
                return redirect('ask');
            } else {
                session()->flash('error', 'Password Incorrect!!!');
                echo "Email Id Does not Exist.";
                return redirect('login');
            }
        }
    }
    public function logout(Request $request)
    {
        Auth::logout();
        return redirect('/');
    }
}
