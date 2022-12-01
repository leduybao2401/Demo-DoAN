<?php

namespace App\Http\Controllers\Admini;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function users()
    {
        $user = User::all();
        return view('admin.user.index', compact('user'));
    }
    public function viewuser($id)
    {
        $user = User::find($id);
        return view('admin.user.view', compact('user'));
        // return view('admin.user.index', compact('user'));
    }
}
