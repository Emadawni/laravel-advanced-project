<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TestController extends Controller
{
    public function showUsers()
    {
        $users = DB::table('users')->get();
        return view('users_list', compact('users'));
    }

    public function editUser($id)
    {
        $user = DB::table('users')->where('id', $id)->first();
        return view('edit_user', compact('user'));
    }

    public function updateUser(Request $request, $id)
    {
        DB::table('users')->where('id', $id)->update([
            'name' => $request->name,
            'email' => $request->email,
            'updated_at' => now(),
        ]);
        
        return redirect()->route('users.index');
    }

    public function deleteUser($id)
    {
        DB::table('users')->where('id', $id)->delete();
        
        return redirect()->route('users.index');
    }
}
