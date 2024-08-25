@extends('layouts.app')
@section('title', 'Register')
@section('content')
<div class="container mx-auto my-8 p-6 bg-white rounded-lg shadow-lg">
    <h1 class="text-3xl font-bold mb-6 text-center">Registration Form</h1>

    @if (session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4" role="alert">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('register') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <!-- Account Information Section -->
        <div class="mb-6 p-4 border border-gray-300 rounded-lg">
            <h2 class="text-xl font-semibold mb-4">Account Information (For Logging Into the System)</h2>
            <div class="grid grid-cols-3 md:grid-cols-1 gap-4">
                <div class="form-group">
                    <label class="block text-gray-700 font-semibold mb-2" for="email">Email:</label>
                    <input type="email" name="email" id="email" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                </div>
                <div class="form-group">
                    <label class="block text-gray-700 font-semibold mb-2" for="password">Password:</label>
                    <input type="password" name="password" id="password" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                </div>
                <div class="form-group">
                    <label class="block text-gray-700 font-semibold mb-2" for="password_confirmation">Confirm Password:</label>
                    <input type="password" name="password_confirmation" id="password_confirmation" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                </div>
            </div>
        </div>

        <!-- Main Details Section -->
        <div class="mb-6">
            <h2 class="text-xl font-semibold mb-4">Main Details</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div class="form-group">
                    <label class="block text-gray-700 font-semibold mb-2" for="registrant">Registrant Name:</label>
                    <input type="text" name="registrant" id="registrant" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                </div>
                <div class="form-group">
                    <label class="block text-gray-700 font-semibold mb-2" for="registration_number">Registration Number:</label>
                    <input type="text" name="registration_number" id="registration_number" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                </div>
                <div class="form-group">
                    <label class="block text-gray-700 font-semibold mb-2" for="full_name">Full Name:</label>
                    <input type="text" name="full_name" id="full_name" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                </div>
                <div class="form-group">
                    <label class="block text-gray-700 font-semibold mb-2" for="user_id">User ID:</label>
                    <input type="text" name="user_id" id="user_id" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                </div>
            </div>
        </div>

        <!-- GST Information Section -->
        <div class="mb-6">
            <h2 class="text-xl font-semibold mb-4">GST Information</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div class="form-group">
                    <label class="block text-gray-700 font-semibold mb-2" for="gst_reference_number">GST Reference Number:</label>
                    <input type="text" name="gst_reference_number" id="gst_reference_number" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                </div>
                <div class="form-group">
                    <label class="block text-gray-700 font-semibold mb-2" for="gst_start_date">GST Start Date:</label>
                    <input type="date" name="gst_start_date" id="gst_start_date" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                </div>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-1 gap-4 mb-4">
                <div class="form-group">
                    <label class="block text-gray-700 font-semibold mb-2" for="gst_end_date">GST End Date:</label>
                    <input type="date" name="gst_end_date" id="gst_end_date" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                </div>
            </div>
        </div>

        <!-- Address Section -->
        <div class="mb-6">
            <h2 class="text-xl font-semibold mb-4">Address Information</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div class="form-group">
                    <label class="block text-gray-700 font-semibold mb-2" for="address_line1">Address Line 1:</label>
                    <input type="text" name="address_line1" id="address_line1" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                </div>
                <div class="form-group">
                    <label class="block text-gray-700 font-semibold mb-2" for="postal_code">Postal Code:</label>
                    <input type="text" name="postal_code" id="postal_code" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                </div>
                <div class="form-group">
                    <label class="block text-gray-700 font-semibold mb-2" for="address_line2">Address Line 2:</label>
                    <input type="text" name="address_line2" id="address_line2" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
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
                </div>
            </div>
        </div>

        <!-- Contact Information Section -->
        <div class="mb-6">
            <h2 class="text-xl font-semibold mb-4">Contact Information</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div class="form-group">
                    <label class="block text-gray-700 font-semibold mb-2" for="phone_number">Phone Number:</label>
                    <input type="text" name="phone_number" id="phone_number" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                </div>
                <div class="form-group">
                    <label class="block text-gray-700 font-semibold mb-2" for="mobile_number">Mobile Number:</label>
                    <input type="text" name="mobile_number" id="mobile_number" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                </div>
            </div>
        </div>

        <!-- Verification Section -->
        <div class="mb-6">
            <h2 class="text-xl font-semibold mb-4">Verification</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div class="form-group">
                    <label class="block text-gray-700 font-semibold mb-2" for="vendor_name">Vendor Name:</label>
                    <input type="text" name="vendor_name" id="vendor_name" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                </div>
                <div class="form-group">
                    <label class="block text-gray-700 font-semibold mb-2" for="ic_number">IC Number:</label>
                    <input type="text" name="ic_number" id="ic_number" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                </div>
            </div><br>
            <div class="flex items-center mb-4">
                <label class="inline-flex items-center">
                    <input type="checkbox" class="form-checkbox h-5 w-5 text-gray-600" name="document_confirmation" required>
                    <span class="ml-2 text-gray-700">The following required documents are submitted during the registration application.</span>
                </label>
            </div>
            <div class="flex items-center mb-4">
                <label class="inline-flex items-center">
                    <input type="checkbox" class="form-checkbox h-5 w-5 text-gray-600" name="declaration" required>
                    <span class="ml-2 text-gray-700">I hereby declare that the information provided above is true and I take responsibility for this registration application.</span>
                </label>
            </div>
        </div>
        <div class="mb-4">
                <label class="block text-gray-700 font-semibold mb-2" for="identity_card">Upload Copy of Identity Card/Passport:</label>
                <input type="file" name="identity_card" id="identity_card" class="form-control-file" accept="application/pdf" required>
        </div>

        <!-- File Upload Section -->
        <div class="mb-6">
            <h2 class="text-xl font-semibold mb-4">File Uploads</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div class="form-group">
                    <label class="block text-gray-700 font-semibold mb-2" for="signature">
                        Upload Signature or Company Stamp (JPEG, PNG):
                    </label>
                    <input type="file" name="signature" id="signature" class="form-control-file" accept=".jpg,.jpeg,.png" required>
                    <small class="text-gray-600">Allowed formats: JPEG, PNG</small>
                </div>
                <div class="form-group">
                    <label class="block text-gray-700 font-semibold mb-2" for="identity_card">
                        Upload Copy of Identity Card/Passport:
                    </label>
                    <input type="file" name="identity_card" id="identity_card" class="form-control-file" accept="application/pdf" required>
                </div>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div class="form-group">
                    <label class="block text-gray-700 font-semibold mb-2" for="registration_certificate">
                        Upload Copy of Supplier Registration Certificate:
                    </label>
                    <input type="file" name="registration_certificate" id="registration_certificate" class="form-control-file" accept="application/pdf" required>
                </div>
                <div class="form-group">
                    <label class="block text-gray-700 font-semibold mb-2" for="bank_statement">
                        Upload Copy of Bank Account Book/Bank Statement:
                    </label>
                    <input type="file" name="bank_statement" id="bank_statement" class="form-control-file" accept="application/pdf" required>
                </div>
            </div>
        </div>

        <div class="flex items-center justify-between">
            <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
                Register
            </button>
        </div>
    </form>

    @if ($errors->any())
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4" role="alert">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
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