@extends('layouts.app')
@section('title', 'Vendor List')
@section('content')
<div class="container mx-auto my-8 p-6 bg-white rounded-lg shadow-lg">
    <h1 class="text-3xl font-bold mb-6 text-center text-gray-800">Vendor List</h1>

    @if (session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4 text-center" role="alert">
            {{ session('success') }}
        </div>
    @endif

    <div class="overflow-x-auto mb-8">
        <table class="table-auto w-full text-center border-collapse">
            <thead>
                <tr class="bg-gray-200 text-gray-800">
                    <th class="px-4 py-2 border">Registrant Name</th>
                    <th class="px-4 py-2 border">Email</th>
                    <th class="px-4 py-2 border">Status</th>
                    <th class="px-4 py-2 border">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($vendors as $vendor)
                    <tr class="border-b">
                        <td class="px-4 py-2">{{ $vendor->registrant }}</td>
                        <td class="px-4 py-2">{{ $vendor->email }}</td>
                        <td class="px-4 py-2">{{ $vendor->status }}</td>
                        <td class="px-4 py-2">
                            <a href="{{ route('admin.vendors.view', $vendor->id) }}" class="text-blue-500 hover:text-blue-700">View Details</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<div class="container mx-auto my-8 p-6 bg-white rounded-lg shadow-lg">
    <h2 class="text-2xl font-bold mb-4 text-center text-gray-800">List of Tenders</h2>
    
    <div class="overflow-x-auto">
        <table class="table-auto w-full border-collapse text-center">
            <thead>
                <tr class="bg-gray-200 text-gray-800">
                    <th class="px-4 py-2 border">Tender Name</th>
                    <th class="px-4 py-2 border">Details</th>
                    <th class="px-4 py-2 border">Faculty</th>
                    <th class="px-4 py-2 border">Quotation (RM)</th>
                    <th class="px-4 py-2 border">Closing Date</th>
                </tr>
            </thead>
            <tbody>
                <tr class="border-b">
                    <td class="px-4 py-2 border">Tender A</td>
                    <td class="px-4 py-2 border">Supplies for office inventory</td>
                    <td class="px-4 py-2 border">Faculty of Computer Science</td>
                    <td class="px-4 py-2 border">10,000.00</td>
                    <td class="px-4 py-2 border">2024-09-15</td>
                </tr>
                <tr class="border-b">
                    <td class="px-4 py-2 border">Tender B</td>
                    <td class="px-4 py-2 border">Cleaning and maintenance services</td>
                    <td class="px-4 py-2 border">Faculty of Engineering</td>
                    <td class="px-4 py-2 border">12,500.00</td>
                    <td class="px-4 py-2 border">2024-09-20</td>
                </tr>
                <tr class="border-b">
                    <td class="px-4 py-2 border">Tender C</td>
                    <td class="px-4 py-2 border">IT Services</td>
                    <td class="px-4 py-2 border">Faculty of Business</td>
                    <td class="px-4 py-2 border">8,000.00</td>
                    <td class="px-4 py-2 border">2024-10-01</td>
                </tr>
                <tr class="border-b">
                    <td class="px-4 py-2 border">Tender D</td>
                    <td class="px-4 py-2 border">Electrical and Technician Services</td>
                    <td class="px-4 py-2 border">Faculty of Engineering</td>
                    <td class="px-4 py-2 border">15,000.00</td>
                    <td class="px-4 py-2 border">2024-10-10</td>
                </tr>
                <tr class="border-b">
                    <td class="px-4 py-2 border">Tender E</td>
                    <td class="px-4 py-2 border">Office furniture and fixtures</td>
                    <td class="px-4 py-2 border">Faculty of Computer Science</td>
                    <td class="px-4 py-2 border">20,000.00</td>
                    <td class="px-4 py-2 border">2024-10-15</td>
                </tr>
                <tr class="border-b">
                    <td class="px-4 py-2 border">Tender F</td>
                    <td class="px-4 py-2 border">Catering and food services</td>
                    <td class="px-4 py-2 border">Faculty of Medicine</td>
                    <td class="px-4 py-2 border">9,500.00</td>
                    <td class="px-4 py-2 border">2024-10-20</td>
                </tr>
                <tr class="border-b">
                    <td class="px-4 py-2 border">Tender G</td>
                    <td class="px-4 py-2 border">Security and surveillance services</td>
                    <td class="px-4 py-2 border">Faculty of Law</td>
                    <td class="px-4 py-2 border">11,000.00</td>
                    <td class="px-4 py-2 border">2024-11-01</td>
                </tr>
                <tr class="border-b">
                    <td class="px-4 py-2 border">Tender H</td>
                    <td class="px-4 py-2 border">Audio-visual equipment</td>
                    <td class="px-4 py-2 border">Faculty of Engineering</td>
                    <td class="px-4 py-2 border">14,000.00</td>
                    <td class="px-4 py-2 border">2024-11-05</td>
                </tr>
                <tr class="border-b">
                    <td class="px-4 py-2 border">Tender I</td>
                    <td class="px-4 py-2 border">Printing and stationary supplies</td>
                    <td class="px-4 py-2 border">Faculty of Computer Science</td>
                    <td class="px-4 py-2 border">7,500.00</td>
                    <td class="px-4 py-2 border">2024-11-10</td>
                </tr>
                <tr class="border-b">
                    <td class="px-4 py-2 border">Tender J</td>
                    <td class="px-4 py-2 border">Maintenance of laboratory equipment</td>
                    <td class="px-4 py-2 border">Faculty of Medicine</td>
                    <td class="px-4 py-2 border">18,000.00</td>
                    <td class="px-4 py-2 border">2024-11-15</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
@endsection
