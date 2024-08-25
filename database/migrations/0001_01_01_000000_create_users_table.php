<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('registrant'); // Registrant name
            $table->string('registration_number'); // Registration number
            $table->string('full_name'); // User's full name
            $table->string('user_id'); // Unique user ID
            $table->string('gst_reference_number')->nullable(); // GST reference number
            $table->date('gst_start_date')->nullable(); // GST start date
            $table->date('gst_end_date')->nullable(); // GST end date
            $table->string('address_line1'); // Address line 1
            $table->string('address_line2')->nullable(); // Address line 2
            $table->string('address_line3')->nullable(); // Address line 3
            $table->string('postal_code', 10); // Postal code
            $table->string('city')->nullable(); // City
            $table->string('state')->nullable(); // State
            $table->string('phone_number', 15)->nullable(); // Phone number
            $table->string('mobile_number', 15)->nullable(); // Mobile number
            $table->string('fax_number', 15)->nullable(); // Fax number
            $table->string('email')->unique(); // Email field
            $table->string('password'); // Password field
            $table->tinyInteger('role')->default(1); // Role: 0=admin, 1=vendor
            $table->enum('status', ['pending', 'accepted', 'rejected'])->default('pending'); // Approval status
            $table->string('rejection_reason')->nullable(); // Reason for rejection
            $table->boolean('document_confirmation')->default(false); // Checkbox for document submission
            $table->string('vendor_name')->nullable(); // Vendor name
            $table->string('ic_number')->nullable(); // IC number
            $table->string('signature')->nullable(); // Signature
            $table->string('identity_card_path')->nullable(); // Path for identity card
            $table->string('registration_certificate_path')->nullable(); // Path for registration certificate
            $table->string('bank_statement_path')->nullable(); // Path for bank statement
            $table->string('reference_number')->nullable(); // Reference number
            $table->text('notes')->nullable(); // Notes field
            $table->string('staff_name')->nullable(); // Staff name
            $table->string('staff_signature')->nullable(); // Staff signature
            $table->date('staff_date')->nullable(); // Staff date
            $table->string('approver_name')->nullable(); // Name of approver
            $table->string('approver_signature')->nullable(); // Signature of approver
            $table->date('approval_date')->nullable(); // Date of approval
            $table->rememberToken(); // For "remember me" functionality
            $table->timestamps(); // Created at and updated at timestamps
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
        Schema::dropIfExists('password_reset_tokens');
        Schema::dropIfExists('sessions');
    }
};
