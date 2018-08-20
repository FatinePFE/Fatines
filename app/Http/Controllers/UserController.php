<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\User;

class UserController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function edit(User $user)
    {
        $user = Auth::user();
        return view('users.edit', compact('user'));
    }

    public function update(User $user)
    {

            $this->validate(request(), [
                    'name' => 'required',
                    //'email' => 'required|email|unique:users',
                    'password' => 'required|min:6|confirmed'
                ]);

                $user->name = request('name');
                //$user->email = request('email');
                $user->password = request('password');
                $user->phone = request('phone');

                $user->save();
                return redirect()->route('users.user.edit')
                ->with('success_message', 'Profile was successfully updated!');


                //return back()->with('success_message', 'Profile was successfully updated!');;

            }
    }
