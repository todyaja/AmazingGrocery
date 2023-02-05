<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    //

    public function landing()
    {
        $items = DB::table('items')->simplePaginate(10);

        return view('landing', compact(['items']));
    }

    public function login()
    {
        return view('login');
    }
    public function register()
    {
        $role = DB::table('roles')->get();
        $gender = DB::table('genders')->get();
        return view('register', compact(['gender', 'role']));
    }
    public function postLogin(Request $request)
    {
        if (Auth::attempt($request->only('email', 'password'))) {
            return redirect('/');
        }
        return back()->withErrors([
            'email' => 'Wrong Email/Password. Please Check Again',
        ])->onlyInput('email');
        return view('login');
    }
    public function postRegist(Request $request)
    {

        $this->validate($request, [
            'firstName' => 'required|alpha_dash|max:25',
            'lastName' => 'required|alpha_dash|max:25',
            'email' => 'required|email',
            'role' => 'required',
            'gender' => 'required',
            'displayPicture' => 'required|mimes:jpg,png,jpeg,svg',
            'password' => 'required|min:8',
            'confirmPassword' => 'required_with:password|same:password'
        ]);

        //file management
        if ($request->file('displayPicture')) {
            $file = $request->file('displayPicture');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $request->file('displayPicture')->move(public_path('assets/profile_picture/'), $filename);
        }

        User::create([
            'first_name' => $request->firstName,
            'last_name' => $request->lastName,
            'email' => $request->email,
            'role_id' => $request->role,
            'gender_id' => $request->gender,
            'display_picture' => $filename,
            'password' => bcrypt($request->password),
        ]);

        $request->session()->flash('alert', 'user created succesfully !');

        return redirect('/login');
    }
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return view('post_logout');
    }
    public function accountManagement()
    {
        $users = DB::table('users')
            ->join('roles', 'roles.id', '=', 'users.role_id')
            ->select('users.id', 'first_name', 'last_name', 'roles.role_name')
            ->get();;

        return view('account_management', compact(['users']));
    }
    public function deleteUser(Request $request, $id)
    {
        DB::table('users')->delete($id);

        $request->session()->flash('alert', 'user deleted succesfully !');

        return redirect('/accountManagement');
    }
    public function updateRole($id)
    {
        $user = DB::table('users')->where('id', $id)->first();
        $role = DB::table('roles')->get();
        return view('update_role', compact(['user', 'role']));
    }
    public function postUpdateRole(Request $request)
    {
        //dd($request->role);
        DB::table('users')->where('id', $request->userId)->update(['role_id' => $request->role,]);
        $request->session()->flash('alert', 'role updated succesfully !');

        return redirect('/accountManagement');
    }
    public function profile()
    {
        $user = DB::table('users')
            ->where('users.id', auth()->user()->id)
            ->select('users.id', 'first_name', 'last_name', 'roles.role_name', 'users.display_picture', 'users.email', 'users.gender_id')
            ->join('roles', 'roles.id', '=', 'users.role_id')
            ->first();
        $role = DB::table('roles')->get();
        $gender = DB::table('genders')->get();
        return view('profile', compact(['role', 'gender', 'user']));
    }
    public function updateProfile(Request $request)
    {
        $this->validate($request, [
            'firstName' => 'required|alpha_dash|max:25',
            'lastName' => 'required|alpha_dash|max:25',
            'email' => 'required|email',
            'gender' => 'required',
            'displayPicture' => 'required|mimes:jpg,png,jpeg,svg',
            'password' => 'required|min:8',
            'confirmPassword' => 'required_with:password|same:password'
        ]);

         //file management
         if ($request->file('displayPicture')) {
            $file = $request->file('displayPicture');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $request->file('displayPicture')->move(public_path('assets/profile_picture/'), $filename);
        }

        DB::table('users')
        ->where('id', auth()->user()->id)
        ->update(
            [
                'first_name' => $request->firstName,
                'last_name' => $request->lastName,
                'email' => $request->email,
                'gender_id' => $request->gender,
                'display_picture' => $filename,
                'password' => bcrypt($request->password),
            ]
        );

        $request->session()->flash('alert', 'user updated succesfully !');

        return redirect('/');
    }
}
