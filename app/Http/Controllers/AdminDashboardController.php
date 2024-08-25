<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminDashboardController extends Controller
{
    public function index()
    {
        // Retrieve all vendors to display on the dashboard
        $vendors = User::where('role', 1)->get(); // Get all vendors
        return view('admin.dashboard', compact('vendors'));
    }

    public function listVendors()
    {
        $vendors = User::where('role', 1)->get(); // Get all vendors
        return view('admin.vendors', compact('vendors'));
    }

    public function viewVendor($id)
    {
        $vendor = User::findOrFail($id);
        return view('admin.vendor_details', compact('vendor'));
    }

    public function approveVendor(Request $request, $id)
    {
        $vendor = User::findOrFail($id);
        $vendor->status = 'accepted';
        $vendor->rejection_reason = null; // Clear any rejection reason
        $vendor->reference_number = $request->input('reference_number');
        $vendor->notes = $request->input('notes');
        $vendor->staff_name = $request->input('staff_name');
        $vendor->staff_signature = $request->input('staff_signature');
        $vendor->staff_date = $request->input('staff_date');
        $vendor->approver_name = $request->input('approver_name');
        $vendor->approver_signature = $request->input('approver_signature');
        $vendor->approval_date = $request->input('approval_date');
        $vendor->save();

        return redirect()->route('admin.vendors')->with('success', 'Vendor approved successfully!');
    }

    public function rejectVendor(Request $request, $id)
    {
        $vendor = User::findOrFail($id);
        $vendor->status = 'rejected';
        $vendor->rejection_reason = $request->input('reason'); // Capture rejection reason
        $vendor->save();

        return redirect()->route('admin.vendors')->with('success', 'Vendor rejected successfully!');
    }
}