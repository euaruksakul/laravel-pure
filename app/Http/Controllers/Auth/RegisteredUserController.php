<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;

//MODELS
use App\Models\User;
use App\Models\UserDetail;

use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);



        event(new Registered($user));

        Auth::login($user);

        //add a row in user_details table (added by CE 20.08.2021)
        $id = Auth::user()->id;
        $userDetail = new UserDetail(); //Use the UserDetail model
        $userDetail->user_id = $id;
        
        $userDetail->save();

        //return redirect(RouteServiceProvider::HOME); //CE: To be changed to user details page
        return redirect()->route('user_details.edit',[Auth::user()->id]);
    }
}
