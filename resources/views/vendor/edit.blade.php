@extends('layouts.app')
@section('title', 'Edit Vendor')
@section('content')

<div class="container mx-auto mt-8 p-6 bg-white rounded-lg shadow-lg">
    <div class="mb-4 flex items-center justify-between">
        <h1 class="text-2xl font-semibold text-gray-800">Edit Vendor Info</h1>
        <a href="{{ route('vendor.dashboard') }}" class="bg-gray-500 hover:bg-gray-700 text-white font-semibold py-2 px-4 rounded">
            Back
        </a>
    </div>

    <form action="{{ route('vendor.update', $vendor->id) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
        @csrf
        @method('PUT')

        @if(session()->has('success'))
            <div class="alert bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded">
                {{ session('success') }}
            </div>
        @endif

        @if(session()->has('status'))
            <div class="alert bg-blue-100 border border-blue-400 text-blue-700 px-4 py-3 rounded">
                {{ session('status') }}
            </div>
        @endif

        <!-- Account Information -->
        <div class="mb-6">
            <h2 class="text-xl font-semibold mb-4">Account Information</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div class="form-group">
                    <label class="block text-gray-700 font-semibold mb-2" for="registrant">Registrant:</label>
                    <input type="text" name="registrant" id="registrant" value="{{ old('registrant', $vendor->registrant) }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                </div>
                <div class="form-group">
                    <label class="block text-gray-700 font-semibold mb-2" for="email">Email:</label>
                    <input type="email" name="email" id="email" value="{{ old('email', $vendor->email) }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                </div>
                <div class="form-group">
                    <label class="block text-gray-700 font-semibold mb-2" for="vendor_name">Vendor Name:</label>
                    <input type="text" name="vendor_name" id="vendor_name" value="{{ old('vendor_name', $vendor->vendor_name) }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                </div>
                <div class="form-group">
                    <label class="block text-gray-700 font-semibold mb-2" for="ic_number">IC Number:</label>
                    <input type="text" name="ic_number" id="ic_number" value="{{ old('ic_number', $vendor->ic_number) }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                </div>
            </div>
        </div>

        <!-- GST Information -->
        <div class="mb-6">
            <h2 class="text-xl font-semibold mb-4">GST Information</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div class="form-group">
                    <label class="block text-gray-700 font-semibold mb-2" for="gst_reference_number">GST Reference Number:</label>
                    <input type="text" name="gst_reference_number" id="gst_reference_number" value="{{ old('gst_reference_number', $vendor->gst_reference_number) }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                </div>
                <div class="form-group">
                    <label class="block text-gray-700 font-semibold mb-2" for="gst_start_date">GST Start Date:</label>
                    <input type="date" name="gst_start_date" id="gst_start_date" value="{{ old('gst_start_date', $vendor->gst_start_date) }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                </div>
                <div class="form-group">
                    <label class="block text-gray-700 font-semibold mb-2" for="gst_end_date">GST End Date:</label>
                    <input type="date" name="gst_end_date" id="gst_end_date" value="{{ old('gst_end_date', $vendor->gst_end_date) }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                </div>
            </div>
        </div>

        <!-- Address Information -->
        <div class="mb-6">
            <h2 class="text-xl font-semibold mb-4">Address Information</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div class="form-group">
                    <label class="block text-gray-700 font-semibold mb-2" for="address_line1">Address Line 1:</label>
                    <input type="text" name="address_line1" id="address_line1" value="{{ old('address_line1', $vendor->address_line1) }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                </div>
                <div class="form-group">
                    <label class="block text-gray-700 font-semibold mb-2" for="address_line2">Address Line 2:</label>
                    <input type="text" name="address_line2" id="address_line2" value="{{ old('address_line2', $vendor->address_line2) }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                </div>
                <div class="form-group">
                    <label class="block text-gray-700 font-semibold mb-2" for="address_line3">Address Line 3:</label>
                    <input type="text" name="address_line3" id="address_line3" value="{{ old('address_line3', $vendor->address_line3) }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                </div>
                <div class="form-group">
                    <label class="block text-gray-700 font-semibold mb-2" for="postal_code">Postal Code:</label>
                    <input type="text" name="postal_code" id="postal_code" value="{{ old('postal_code', $vendor->postal_code) }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                </div>
                <div class="form-group">
                <label class="block text-gray-700 font-semibold mb-2" for="city">City:</label>
                <select name="city" id="city" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                    <option value="">Select City</option>
                    <option value="Kuala Lumpur">Kuala Lumpur</option>
                    <option value="Johor Bahru">Johor Bahru</option>
                    <option value="George Town">George Town</option>
                    <option value="Ipoh">Ipoh</option>
                    <option value="Shah Alam">Shah Alam</option>
                    <option value="Kota Kinabalu">Kota Kinabalu</option>
                    <option value="Kuching">Kuching</option>
                    <option value="Malacca">Malacca</option>
                    <option value="Petaling Jaya">Petaling Jaya</option>
                    <option value="Seremban">Seremban</option>
                    <option value="Alor Setar">Alor Setar</option>
                    <option value="Sibu">Sibu</option>
                    <option value="Bintulu">Bintulu</option>
                    <option value="Miri">Miri</option>
                    <option value="Sandakan">Sandakan</option>
                    <option value="Kota Bharu">Kota Bharu</option>
                    <option value="Tawau">Tawau</option>
                    <option value="Batu Pahat">Batu Pahat</option>
                    <option value="Kluang">Kluang</option>
                    <option value="Segamat">Segamat</option>
                    <option value="Kuala Terengganu">Kuala Terengganu</option>
                    <option value="Kangar">Kangar</option>
                    <option value="Putrajaya">Putrajaya</option>
                    <option value="Labuan">Labuan</option>
                </select>
                <input type="text" name="custom_city" id="custom_city" class="mt-2 shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline hidden" placeholder="Type your city here">
            </div>

            <div class="form-group">
                <label class="block text-gray-700 font-semibold mb-2" for="state">State:</label>
                <select name="state" id="state" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                    <option value="">Select State</option>
                    <option value="Johor">Johor</option>
                    <option value="Kedah">Kedah</option>
                    <option value="Kelantan">Kelantan</option>
                    <option value="Malacca">Malacca</option>
                    <option value="Negeri Sembilan">Negeri Sembilan</option>
                    <option value="Pahang">Pahang</option>
                    <option value="Penang">Penang</option>
                    <option value="Perak">Perak</option>
                    <option value="Perlis">Perlis</option>
                    <option value="Selangor">Selangor</option>
                    <option value="Terengganu">Terengganu</option>
                    <option value="Sabah">Sabah</option>
                    <option value="Sarawak">Sarawak</option>
                    <option value="Kuala Lumpur">Kuala Lumpur</option>
                    <option value="Putrajaya">Putrajaya</option>
                    <option value="Labuan">Labuan</option>
                </select>
                <input type="text" name="custom_state" id="custom_state" class="mt-2 shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline hidden" placehol
                <div class="form-group">
                    <label class="block text-gray-700 font-semibold mb-2" for="phone_number">Phone Number:</label>
                    <input type="text" name="phone_number" id="phone_number" value="{{ old('phone_number', $vendor->phone_number) }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                </div>
                <div class="form-group">
                    <label class="block text-gray-700 font-semibold mb-2" for="mobile_number">Mobile Number:</label>
                    <input type="text" name="mobile_number" id="mobile_number" value="{{ old('mobile_number', $vendor->mobile_number) }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                </div>
                <div class="form-group">
                    <label class="block text-gray-700 font-semibold mb-2" for="fax_number">Fax Number:</label>
                    <input type="text" name="fax_number" id="fax_number" value="{{ old('fax_number', $vendor->fax_number) }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                </div>
            </div>
        </div>

        <!-- Documents -->
        <div class="mb-6">
            <h2 class="text-xl font-semibold mb-4">Documents</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div class="form-group">
                    <label class="block text-gray-700 font-semibold mb-2" for="signature">Signature:</label>
                    <input type="file" name="signature" id="signature" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                    @if($vendor->signature)
                        <img src="{{ asset('storage/' . $vendor->signature) }}" alt="Signature" class="mt-2 max-w-xs max-h-24 rounded-md">
                    @endif
                </div>
                <div class="form-group">
                    <label class="block text-gray-700 font-semibold mb-2" for="identity_card_path">Identity Card:</label>
                    <input type="file" name="identity_card_path" id="identity_card_path" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                    @if($vendor->identity_card_path)
                        <a href="{{ asset('storage/' . $vendor->identity_card_path) }}" target="_blank" class="mt-2 text-blue-600 hover:underline">View Identity Card</a>
                    @endif
                </div>
                <div class="form-group">
                    <label class="block text-gray-700 font-semibold mb-2" for="registration_certificate_path">Registration Certificate:</label>
                    <input type="file" name="registration_certificate_path" id="registration_certificate_path" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                    @if($vendor->registration_certificate_path)
                        <a href="{{ asset('storage/' . $vendor->registration_certificate_path) }}" target="_blank" class="mt-2 text-blue-600 hover:underline">View Registration Certificate</a>
                    @endif
                </div>
                <div class="form-group">
                    <label class="block text-gray-700 font-semibold mb-2" for="bank_statement_path">Bank Statement:</label>
                    <input type="file" name="bank_statement_path" id="bank_statement_path" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                    @if($vendor->bank_statement_path)
                        <a href="{{ asset('storage/' . $vendor->bank_statement_path) }}" target="_blank" class="mt-2 text-blue-600 hover:underline">View Bank Statement</a>
                    @endif
                </div>
            </div>
        </div>

        <div class="mb-4 flex justify-end">
            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded">
                Update
            </button>
        </div>
    </form>
</div>
<script>
    $(document).ready(function() {
        $('#city').select2({
            allowClear: true,
            tags: true,
            createTag: function (params) {
                return {
                    id: params.term,
                    text: params.term,
                    newOption: true
                }
            }
        });

        $('#state').select2({
            allowClear: true,
            tags: true,
            createTag: function (params) {
                return {
                    id: params.term,
                    text: params.term,
                    newOption: true
                }
            }
        });
    });
</script>
@endsection
