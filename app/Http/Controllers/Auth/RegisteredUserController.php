<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Canva;
use App\Models\Corcel\WpUser;
use App\Models\Role;
use App\Models\User;
use App\Notifications\Frontend\User\RegistrationNotification;
use App\Providers\RouteServiceProvider;
use App\Rules\GoogleCaptcha;
use Corcel\Services\PasswordService;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Notification;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules;
use Illuminate\Support\Str;
use Laravel\Socialite\Facades\Socialite;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        if (!settings('signup')) {
            abort(404);
        }
        return view("frontend.auth.register.index-1-0");
        // return view('frontend.auth.register.index', compact('countries'));
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
            'first_name' => ['required', 'string', 'max:50'],
            'last_name' => ["nullable", 'string', 'max:50'],
            'role' => ['required', 'string'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'station' => ["required_if:role,station"],
        ]);

        $user = new User;
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->role = Role::where('slug', Str::replace("-", '_', $request->role))->first()->id;
        $user->source = "signup";
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->username = Str::random(8);
        $user->role = ($request->role == 'admin') ? 1 : 2;
        $user->state = $request->station;
        try {
            //code...
            $user->save();
        } catch (\Throwable $th) {
            session()->flash("error", "Unable to register your account at the moment. Please try again later.");
            return back()->withInput();
        }
        return redirect(RouteServiceProvider::HOME);
    }
}
