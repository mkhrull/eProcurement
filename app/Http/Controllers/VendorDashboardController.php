<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Storage;


class VendorDashboardController extends Controller
{
    
    public function index()
    {
        $vendor = Auth::user(); // Get the authenticated vendor
        return view('vendor.dashboard', compact('vendor'));
    }

    public function edit($id)
    {
        // Find the vendor by ID
        $vendor = User::findOrFail($id);

        // Return the view with the vendor data
        return view('vendor.edit', compact('vendor'));
    }
    public function update(Request $request, $id)
{
    // Validate request
    $request->validate([
        'registrant' => 'required|string|max:255',
        'email' => 'required|email|max:255',
        'status' => 'required|string|max:255',
        'vendor_name' => 'nullable|string|max:255',
        'ic_number' => 'nullable|string|max:255',
        'signature' => 'nullable|file|image|max:2048',
        'gst_reference_number' => 'nullable|string|max:255',
        'gst_start_date' => 'nullable|date',
        'gst_end_date' => 'nullable|date',
        'address_line1' => 'nullable|string|max:255',
        'address_line2' => 'nullable|string|max:255',
        'address_line3' => 'nullable|string|max:255',
        'postal_code' => 'nullable|string|max:10',
        'city' => 'nullable|string|max:255',
        'state' => 'nullable|string|max:255',
        'phone_number' => 'nullable|string|max:20',
        'mobile_number' => 'nullable|string|max:20',
        'fax_number' => 'nullable|string|max:20',
        'identity_card_path' => 'nullable|file|mimes:jpeg,png,pdf|max:2048',
        'registration_certificate_path' => 'nullable|file|mimes:jpeg,png,pdf|max:2048',
        'bank_statement_path' => 'nullable|file|mimes:jpeg,png,pdf|max:2048',
    ]);

    // Find the vendor
    $vendor = User::findOrFail($id);

    // Update vendor details
    $vendor->registrant = $request->input('registrant');
    $vendor->email = $request->input('email');
    $vendor->status = $request->input('status') === 'rejected' ? 'pending' : $request->input('status');
    $vendor->vendor_name = $request->input('vendor_name');
    $vendor->ic_number = $request->input('ic_number');

    // Handle file uploads
    if ($request->hasFile('signature')) {
        // Delete old file if exists
        if ($vendor->signature) {
            Storage::disk('public')->delete($vendor->signature);
        }
        $vendor->signature = $request->file('signature')->store('signatures', 'public');
    }

    $vendor->gst_reference_number = $request->input('gst_reference_number');
    $vendor->gst_start_date = $request->input('gst_start_date');
    $vendor->gst_end_date = $request->input('gst_end_date');
    $vendor->address_line1 = $request->input('address_line1');
    $vendor->address_line2 = $request->input('address_line2');
    $vendor->address_line3 = $request->input('address_line3');
    $vendor->postal_code = $request->input('postal_code');
    $vendor->city = $request->input('city');
    $vendor->state = $request->input('state');
    $vendor->phone_number = $request->input('phone_number');
    $vendor->mobile_number = $request->input('mobile_number');
    $vendor->fax_number = $request->input('fax_number');

    if ($request->hasFile('identity_card_path')) {
        // Delete old file if exists
        if ($vendor->identity_card_path) {
            Storage::disk('public')->delete($vendor->identity_card_path);
        }
        $vendor->identity_card_path = $request->file('identity_card_path')->store('identity_cards', 'public');
    }

    if ($request->hasFile('registration_certificate_path')) {
        // Delete old file if exists
        if ($vendor->registration_certificate_path) {
            Storage::disk('public')->delete($vendor->registration_certificate_path);
        }
        $vendor->registration_certificate_path = $request->file('registration_certificate_path')->store('registration_certificates', 'public');
    }

    if ($request->hasFile('bank_statement_path')) {
        // Delete old file if exists
        if ($vendor->bank_statement_path) {
            Storage::disk('public')->delete($vendor->bank_statement_path);
        }
        $vendor->bank_statement_path = $request->file('bank_statement_path')->store('bank_statements', 'public');
    }

    // Save the changes
    $vendor->save();

    return redirect()->route('vendor.dashboard')->with('success', 'Vendor details updated successfully!');
}

}
