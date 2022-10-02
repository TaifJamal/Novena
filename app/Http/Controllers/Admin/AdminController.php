<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;

class AdminController extends Controller
{

    public function index()
    {
        return view('admin.index');
    }

    public function user()
    {
        Gate::authorize('all_user');
        $users =User::all();
        return view('admin.user',compact('users'));
    }

    public function destroy($id)
    {
        Gate::authorize('delete_user');
        $user=User::find($id);
        $user->delete();
        return redirect()->route('admin.user')->
        with('msg', 'user delete successfully')->with('type', 'success');
    }
}
