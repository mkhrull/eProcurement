<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'registrant', // Registrant name
        'registration_number', // Registration number
        'full_name', // User's full name
        'user_id', // Unique user ID
        'gst_reference_number', // GST reference number
        'gst_start_date', // GST start date
        'gst_end_date', // GST end date
        'address_line1', // Address line 1
        'address_line2', // Address line 2
        'address_line3', // Address line 3
        'postal_code', // Postal code
        'city', // City
        'state', // State
        'phone_number', // Phone number
        'mobile_number', // Mobile number
        'fax_number', // Fax number
        'email', // Email field
        'password', // Password field
        'role', // Role: 0=admin, 1=vendor
        'document_confirmation', // Checkbox for document submission
        'vendor_name', // Vendor name
        'ic_number', // IC number
        'signature', // Signature path
        'identity_card_path', // Path for identity card
        'registration_certificate_path', // Path for registration certificate
        'bank_statement_path', // Path for bank statement
        'reference_number', // Reference number
        'notes', // Notes field
        'staff_name', // Staff name
        'staff_signature', // Staff signature
        'staff_date', // Staff date
        'approver_name', // Name of approver
        'approver_signature', // Signature of approver
        'approval_date', // Date of approval
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
}
