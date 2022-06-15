<?php

namespace App\Http\Controllers\Customer;

use App\Models\User;
use App\Traits\HasImage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class SettingController extends Controller
{
    use HasImage;

    public function index()
    {
        $user = Auth::user();
        return view('customer.setting.index', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $image = $this->uploadImage($request, $path = 'public/avatars/', $name = 'avatar');

        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'department' => 'required',
        ]);

        $password = !empty($request->password) ? bcrypt($request->password) : $user->password;

        $user->update([
            'name' => $request->name,
            'department' => $request->department,
            'email' => $request->email,
            'password' => $password,
        ]);

        if($request->file($name)){
            $this->updateImage(
                $path = 'public/avatars/', $name = 'avatar', $data = $user, $url = $image->hashName()
            );
        }

        return back()->with('toast_success', 'Akun Berhasil Diubah');
    }
}
