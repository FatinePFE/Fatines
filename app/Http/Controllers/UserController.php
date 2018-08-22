<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\City;
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

            $cities = City::pluck('name','id')->all();

            $this->validate(request(), [
                    'name' => 'required',
                    //'email' => 'required|email|unique:users',
                    'password' => 'required|min:6|confirmed'
                ]);

                $user->name = request('name');
                //$user->email = request('email');

                if (request('password') != $user->password) {
                        $user->password = bcrypt(request('password'));
                }

                $user->phone = request('phone');
                $user->avatar = request('avatar');
                $user->city_id = request('city_id');


                $user->save();
                return redirect()->route('users.user.edit')
                ->with('success_message', 'Profile was successfully updated!');
            }
    }
