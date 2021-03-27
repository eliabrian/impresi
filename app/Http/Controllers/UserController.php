<?php

namespace App\Http\Controllers;

use App\Models\User;
use DataTables;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function __construct(User $user)
    {
        $this->user = $user;   
    }

    public function index()
    {
        return view('admin.users.index');
    }

    public function ajax(Request $request)
    {
        return $this->user->dataTable();
    }
}
