<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\User\UserBanRequest;
use App\Http\Requests\Admin\User\UserDestroyRequest;
use App\Http\Requests\Admin\User\UserUnlinkRelationshipRequest;
use App\Http\Requests\Admin\User\UserUpdateRequset;
use App\Models\Canva;
use App\Models\Corcel\WpUser;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    //

    public function index()
    {
        $users = User::with(["user_role"])->get();
        return view('admin.users.index_updated', compact('users'));
    }

    public function store(Request $request)
    {
        $request->validate([
            "first_name" => "required",
            "last_name" => "required",
            "email" => "required|email",
            "password" => "required",
            "role" => "required"
        ]);


        $user = new User();
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->source = "signup";
        $user->username = \Str::random(8);
        $user->password = Hash::make($request->password);
        $user->email_verified_at = date("Y-m-d H:i:s");
        $user->gender = ($request->gender) ? $request->gender : "male";
        $user->phone_number = $request->phone_number;
        $user->role = $request->role;
        $user->email = $request->email;

        try {
            $user->save();
        } catch (\Throwable $th) {
            //throw $th;
            dd($th->getMessage());
            session()->flash('error', "Error: " . $th->getMessage());
            return back();
        }

        session()->flash("success", "Staff Added.");
        return back();
    }

    public function wp_index()
    {
        $users = WpUser::paginate(20);
        return view('admin.users.wp-index', compact('users'));
    }

    public function edit(User $user)
    {
        return view('admin.users.edit', compact('user'));
    }

    public function update(UserUpdateRequset $request, User $user)
    {
        $request->validate([
            "first_name" => "required",
            "last_name" => "required",
            "email" => "required|email",
            "role" => "required"
        ]);

        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->source = "signup";
        $user->username = \Str::random(8);
        if ($request->password) {
            $user->password = Hash::make($request->password);
        }
        $user->gender = ($request->gender) ? $request->gender : "male";
        $user->phone_number = $request->phone_number;
        $user->role = $request->role;
        $user->email = $request->email;

        try {
            $user->save();
        } catch (\Throwable $th) {
            //throw $th;
            dd($th->getMessage());
            session()->flash('error', "Error: " . $th->getMessage());
            return back();
        }

        session()->flash("success", "Staff Updated.");
        return back();
    }

    /**
     * @param Request $request, User $user
     * @access Admim
     */
    public function banUser(UserBanRequest $request, User $user)
    {
        $user->status =  ($user->status == "suspend") ? "active" : "suspend";

        try {
            $user->save();
        } catch (\Throwable $th) {
            //throw $th;
            session()->flash("error", "Error: " . $th->getMessage());
            return back();
        }

        session()->flash("success", "User account updated.");
        return back();
    }

    public function destroy(UserDestroyRequest $request, User $user)
    {
        // remove user from course and organisation
        try {
            DB::transaction(function () use ($user) {

                $user->delete();
            });
        } catch (\Throwable $th) {
            //throw $th;
            dd($th->getMessage());
            session()->flash('error', "Error: " . $th->getMessage());
            return back();
        }

        session()->flash('success', "User Removed.");
        return back();
    }

    public function unlinkRelationShip(UserUnlinkRelationshipRequest $request, User $user)
    {
    }

    public function canvaUser()
    {
        $users = Canva::get();
        return view('admin.users.canva.list', compact("users"));
    }

    public function canvaUserStatus(Request $request, Canva $canva)
    {
        if ($request->type == "approve") {
            $canva->approved = true;
            $canva->rejected = false;
        } else {
            $canva->rejected = true;
            $canva->approved = false;
        }

        $canva->save();

        session()->flash('success', "Status Updated.");
        return back();
    }
}
