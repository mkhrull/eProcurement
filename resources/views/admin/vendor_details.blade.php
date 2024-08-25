@extends('layouts.app')
@section('title', 'Vendor Details')
@section('content')
<div class="container mx-auto my-8 p-6 bg-white rounded-lg shadow-lg">
    <h1 class="text-4xl font-bold mb-6 text-center text-gray-800">Vendor Details</h1>
    
    <div class="space-y-4">
        <p><strong class="text-gray-700">Registrant Name:</strong> {{ $vendor->registrant }}</p>
        <p><strong class="text-gray-700">Email:</strong> {{ $vendor->email }}</p>
        <p><strong class="text-gray-700">Status:</strong> {{ $vendor->status }}</p>
        <p><strong class="text-gray-700">Vendor Name:</strong> {{ $vendor->vendor_name }}</p>
        <p><strong class="text-gray-700">IC Number:</strong> {{ $vendor->ic_number }}</p>
        
        <div>
            <strong class="text-gray-700">Signature:</strong>
            @if($vendor->signature)
                <img src="{{ asset('storage/' . $vendor->identity_card_path) }}" alt="Signature" class="h-20 w-auto mt-2 border rounded">
            @else
                <p class="text-gray-600">No signature uploaded.</p>
            @endif
        </div>

        <p><strong class="text-gray-700">GST Reference Number:</strong> {{ $vendor->gst_reference_number }}</p>
        <p><strong class="text-gray-700">GST Start Date:</strong> {{ $vendor->gst_start_date }}</p>
        <p><strong class="text-gray-700">GST End Date:</strong> {{ $vendor->gst_end_date }}</p>
        <p><strong class="text-gray-700">Address Line 1:</strong> {{ $vendor->address_line1 }}</p>
        <p><strong class="text-gray-700">Address Line 2:</strong> {{ $vendor->address_line2 }}</p>
        <p><strong class="text-gray-700">Address Line 3:</strong> {{ $vendor->address_line3 }}</p>
        <p><strong class="text-gray-700">Postal Code:</strong> {{ $vendor->postal_code }}</p>
        <p><strong class="text-gray-700">City:</strong> {{ $vendor->city }}</p>
        <p><strong class="text-gray-700">State:</strong> {{ $vendor->state }}</p>
        <p><strong class="text-gray-700">Phone Number:</strong> {{ $vendor->phone_number }}</p>
        <p><strong class="text-gray-700">Mobile Number:</strong> {{ $vendor->mobile_number }}</p>
        <p><strong class="text-gray-700">Fax Number:</strong> {{ $vendor->fax_number }}</p>
    </div>

    <h2 class="text-2xl font-semibold mt-8 mb-4">Uploaded Files</h2>
    <div class="space-y-4">
        <div>
    <strong class="text-gray-700">Identity Card/Passport:</strong>
    @if($vendor->identity_card_path)
        <a href="{{ asset('storage/' . $vendor->identity_card_path) }}" target="_blank" class="text-blue-500 hover:text-blue-700">View Identity Card</a>
    @else
        <p class="text-gray-600">No identity card uploaded.</p>
    @endif
</div>

<div>
    <strong class="text-gray-700">Supplier Registration Certificate:</strong>
    @if($vendor->registration_certificate_path)
        <a href="{{ asset('storage/' . $vendor->registration_certificate_path) }}" target="_blank" class="text-blue-500 hover:text-blue-700">View Registration Certificate</a>
    @else
        <p class="text-gray-600">No registration certificate uploaded.</p>
    @endif
</div>

<div>
    <strong class="text-gray-700">Bank Statement:</strong>
    @if($vendor->bank_statement_path)
        <a href="{{ asset('storage/' . $vendor->bank_statement_path) }}" target="_blank" class="text-blue-500 hover:text-blue-700">View Bank Statement</a>
    @else
        <p class="text-gray-600">No bank statement uploaded.</p>
    @endif
</div>
    </div>

    <h2 class="text-2xl font-semibold mt-8 mb-4">Admin Verification</h2>
<form action="{{ route('admin.vendors.approve', $vendor->id) }}" method="POST" class="space-y-4">
    @csrf
    <div>
        <label class="flex items-center">
            <input type="checkbox" name="verification" required class="mr-2">
            <span>I hereby declare that I have reviewed and verified that the submitted documents are TRUE and COMPLETE, and the vendor registration action has been taken.</span>
        </label>
    </div>

    <div>
        <label for="reference_number" class="block text-gray-700">Reference Number:</label>
        <input type="text" name="reference_number" id="reference_number" required class="border rounded w-full py-2 px-3">
    </div>

    <div>
        <label for="notes" class="block text-gray-700">Notes:</label>
        <textarea name="notes" id="notes" rows="4" class="border rounded w-full py-2 px-3"></textarea>
    </div>

    <div>
        <label for="approver_name" class="block text-gray-700">Approver Name:</label>
        <input type="text" name="approver_name" id="approver_name" required class="border rounded w-full py-2 px-3">
    </div>

    <div>
        <label for="approval_date" class="block text-gray-700">Approval Date:</label>
        <input type="date" name="approval_date" id="approval_date" required class="border rounded w-full py-2 px-3">
    </div>

    <button type="submit" class="bg-green-500 hover:bg-green-700 text-white font-semibold py-2 px-4 rounded transition duration-300">
        Approve
    </button>
</form>

<form action="{{ route('admin.vendors.reject', $vendor->id) }}" method="POST" class="mt-4">
    @csrf
    <input type="text" name="reason" placeholder="Rejection Reason" required class="border rounded w-full py-2 px-3 mb-4">
    <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-semibold py-2 px-4 rounded transition duration-300">
        Reject
    </button>
</form>

    <div class="mt-4 text-center">
        <a href="{{ route('admin.vendors') }}" class="text-blue-500 hover:text-blue-700 font-semibold">Back to Vendor List</a>
    </div>
</div>

<script>
    // Set the current date as the default value for the approval_date input
    document.addEventListener('DOMContentLoaded', function() {
        const today = new Date().toISOString().split('T')[0]; // Get today's date in YYYY-MM-DD format
        document.getElementById('approval_date').value = today; // Set the value of the input
    });
</script>
@endsection