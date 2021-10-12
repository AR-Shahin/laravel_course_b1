<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $admins = Admin::latest()->get();
        return view('Backend.Admin.index', compact('admins'));
    }
    public function create()
    {
        return view('Backend.Admin.create');
    }
    public function store(Request $request)
    {

        return view('Admin.index', compact('admins'));
    }
}
