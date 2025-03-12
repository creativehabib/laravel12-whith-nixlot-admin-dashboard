<?php

namespace App\Http\Controllers\Backend;

use App\Helpers\Helpers;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class ProfileController extends Controller
{
    public function index()
    {
        return view('backend.profile.index');
    }

    /**
     * @param Request $request
     * @return RedirectResponse
     * @throws ValidationException
     */
    public function update(Request $request): RedirectResponse
    {
        $this->validate($request, [
            'name'      => 'required|string|max:255',
            'email'     => 'required|string|email|max:255|unique:users,email,'. Auth::id(),
            'phone'     => 'nullable|numeric',
            'address'   => 'nullable|string|max:255',
            'bio'       => 'nullable|string',
            'avatar'    => 'nullable|image'
        ]);
        $user = Auth::user();
        $user->update([
            'name'      => $request->name,
            'email'     => $request->email,
            'phone'     => $request->phone,
            'address'   => $request->address,
            'bio'       => $request->bio,
            'avatar'    => Helpers::handleFileUpload($request, 'avatar', Auth::user()->avatar ?? null, User::IMAGE_UPLOAD_PATH)
        ]);
        notify()->success("Profile updated successfully.");
        return back();
    }

    public function changePassword()
    {
        return view('backend.profile.change-password');
    }

    /**
     * @param Request $request
     * @return RedirectResponse
     * @throws ValidationException
     */
    public function updatePassword(Request $request): RedirectResponse
    {
        $this->validate($request, [
            'current_password'  => 'required',
            'password'          => 'required|string|min:8|confirmed',
        ]);
        $old_password = Auth::user()->password;
        if(Hash::check($request->current_password, $old_password)){
            if(!Hash::check($request->password, $old_password)){
                Auth::user()->update([
                    'password' => Hash::make($request->password)
                ]);
                Auth::logout();
                notify()->success("Password changed successfully. Please login with new password.");
                return redirect()->route('login');
            } else {
                notify()->warning("New password cannot be same as old password!");
            }
        } else {
            notify()->warning("Current password not match!");
        }
        return back();
    }
}
