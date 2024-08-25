<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;


class AuthController extends Controller
{
    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'registrant' => 'required|string|max:255',
            'registration_number' => 'required|string|max:255',
            'full_name' => 'required|string|max:255',
            'user_id' => 'required|string|max:255',
            'address_line1' => 'required|string|max:255',
            'postal_code' => 'required|string|max:10',
            'gst_reference_number' => 'nullable|string|max:255',
            'gst_start_date' => 'nullable|date',
            'gst_end_date' => 'nullable|date',
            'city' => 'nullable|string|max:255',
            'state' => 'nullable|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'vendor_name' => 'required|string|max:255',
            'ic_number' => 'required|string|max:20',
            'signature' => 'required|file|mimes:jpg,jpeg,png|max:2048',
            'document_confirmation' => 'accepted',
            'declaration' => 'accepted',
            'identity_card' => 'required|file|mimes:pdf|max:2048',
            'registration_certificate' => 'required|file|mimes:pdf|max:2048',
            'bank_statement' => 'required|file|mimes:pdf|max:2048',
        ]);

        // Handle file uploads
        $identityCardPath = $request->file('identity_card')->store('uploads/identity_cards');
        $registrationCertificatePath = $request->file('registration_certificate')->store('uploads/registration_certificates');
        $bankStatementPath = $request->file('bank_statement')->store('uploads/bank_statements');
        $signaturePath = $request->file('signature')->store('uploads/signatures');

        User::create([
            'registrant' => $request->registrant,
            'registration_number' => $request->registration_number,
            'full_name' => $request->full_name,
            'user_id' => $request->user_id,
            'address_line1' => $request->address_line1,
            'address_line2' => $request->address_line2,
            'address_line3' => $request->address_line3,
            'postal_code' => $request->postal_code,
            'gst_reference_number' => $request->gst_reference_number,
            'gst_start_date' => $request->gst_start_date,
            'gst_end_date' => $request->gst_end_date,
            'city' => $request->city,
            'state' => $request->state,
            'phone_number' => $request->phone_number,
            'mobile_number' => $request->mobile_number,
            'fax_number' => $request->fax_number,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 1, // Default role as vendor
            'document_confirmation' => $request->has('document_confirmation'),
            'vendor_name' => $request->vendor_name,
            'ic_number' => $request->ic_number,
            'signature' => $signaturePath,
            'identity_card_path' => $identityCardPath,
            'registration_certificate_path' => $registrationCertificatePath,
            'bank_statement_path' => $bankStatementPath,
        ]);

        return redirect()->route('login')->with('success', 'Registration successful! Please login.');
    }

    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $user = Auth::user();

            // Redirect based on user role
            if ($user->role == 0) {
                return redirect()->intended('/admin/dashboard');
            } elseif ($user->role == 1) {
                return redirect()->intended('/vendor/dashboard');
            }
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}
