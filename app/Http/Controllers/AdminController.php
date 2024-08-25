<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard()
    {
        return view('admin.dashboard'); // Return the admin dashboard view
    }

    public function vendors()
    {
        return view('admin.vendors'); // Return the vendor list view
    }
}