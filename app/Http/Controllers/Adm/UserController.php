<?php

namespace App\Http\Controllers\Adm;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(){
        $users = User::with('role')->get();
        return view('adm.users', ['users'=>$users]);
    }

    public function ban(User $user){
//        $this->authorize('ban',$user);
        $user->update([
            'is_active' => false,
        ]);
        return back();
    }

    public function unban(User $user){
//        $this->authorize('unban',$user);
        $user->update([
            'is_active' => true,
        ]);
        return back();
    }

}
