<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $user = Auth::user();
        return view('pages.user.profile', compact('user'));
    }

    public function updateProfileImage(Request $req)
    {
        $user = Auth::user();
        $profile_image = $req->file('profile_image');
        if ($profile_image) {
            if (!is_null($user->profile_image) && Storage::exists($user->profile_image)) {
                Storage::delete($user->profile_image);
            }
            $path = Storage::disk('public')->put('user_images', $profile_image);
            $user->update(['profile_image' => $path]);
        }
        return redirect()->back()->with('success', 'Berhasil mengubah foto profile');
    }

    public function update(Request $req)
    {
        $user = Auth::user();
        $user->update($req->all());
        return redirect()->back()->with('success', 'Berhasil Memperbarui Profile');
    }
}
