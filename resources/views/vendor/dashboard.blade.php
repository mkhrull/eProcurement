@extends('layouts.app')
@section('title', 'Vendor Dashboard')
@section('content')

<div class="min-h-screen flex flex-col items-center justify-center bg-gray-100 py-8">
@if(session()->has('success'))
            <div class="alert bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded">
                {{ session('success') }}
            </div>
        @endif    
<!-- Vendor Information -->
    <div class="container p-6 bg-white rounded-lg shadow-lg max-w-lg w-full mb-8">
        <h1 class="text-3xl font-bold mb-4 text-center text-gray-800">Vendor Dashboard</h1>
        
        <div class="space-y-4 mb-6">
            <p class="text-lg"><strong class="text-gray-700">Name:</strong> {{ $vendor->registrant }}</p>
            <p class="text-lg"><strong class="text-gray-700">Status:</strong> {{ $vendor->status }}</p>
            <p class="text-lg"><strong class="text-gray-700">Email:</strong> {{ $vendor->email }}</p>
            
            <div class="text-center">
                <a href="{{ url('vendor/edit/' . $vendor->id) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded">
                    Edit Details
                </a>
            </div>
        </div>
    </div>
    
    <!-- Tender List -->
    <div class="container p-6 bg-white rounded-lg shadow-lg max-w-7xl w-full">
        <h2 class="text-2xl font-bold mb-4 text-center text-gray-800">List of Tenders</h2>
        
        <table class="table-auto w-full border-collapse">
            <thead>
                <tr class="bg-gray-200">
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
                    <td class="px-4 py-2 border text-right">10,000.00</td>
                    <td class="px-4 py-2 border text-center">2024-09-15</td>
                </tr>
                <tr class="border-b">
                    <td class="px-4 py-2 border">Tender B</td>
                    <td class="px-4 py-2 border">Cleaning and maintenance services</td>
                    <td class="px-4 py-2 border">Faculty of Engineering</td>
                    <td class="px-4 py-2 border text-right">12,500.00</td>
                    <td class="px-4 py-2 border text-center">2024-09-20</td>
                </tr>
                <tr class="border-b">
                    <td class="px-4 py-2 border">Tender C</td>
                    <td class="px-4 py-2 border">IT Services</td>
                    <td class="px-4 py-2 border">Faculty of Business</td>
                    <td class="px-4 py-2 border text-right">8,000.00</td>
                    <td class="px-4 py-2 border text-center">2024-10-01</td>
                </tr>
                <tr class="border-b">
                    <td class="px-4 py-2 border">Tender D</td>
                    <td class="px-4 py-2 border">Electrical and Technician Services</td>
                    <td class="px-4 py-2 border">Faculty of Engineering</td>
                    <td class="px-4 py-2 border text-right">15,000.00</td>
                    <td class="px-4 py-2 border text-center">2024-10-10</td>
                </tr>
                <tr class="border-b">
                    <td class="px-4 py-2 border">Tender E</td>
                    <td class="px-4 py-2 border">Office furniture and fixtures</td>
                    <td class="px-4 py-2 border">Faculty of Computer Science</td>
                    <td class="px-4 py-2 border text-right">20,000.00</td>
                    <td class="px-4 py-2 border text-center">2024-10-15</td>
                </tr>
                <tr class="border-b">
                    <td class="px-4 py-2 border">Tender F</td>
                    <td class="px-4 py-2 border">Catering and food services</td>
                    <td class="px-4 py-2 border">Faculty of Medicine</td>
                    <td class="px-4 py-2 border text-right">9,500.00</td>
                    <td class="px-4 py-2 border text-center">2024-10-20</td>
                </tr>
                <tr class="border-b">
                    <td class="px-4 py-2 border">Tender G</td>
                    <td class="px-4 py-2 border">Security and surveillance services</td>
                    <td class="px-4 py-2 border">Faculty of Law</td>
                    <td class="px-4 py-2 border text-right">11,000.00</td>
                    <td class="px-4 py-2 border text-center">2024-11-01</td>
                </tr>
                <tr class="border-b">
                    <td class="px-4 py-2 border">Tender H</td>
                    <td class="px-4 py-2 border">Audio-visual equipment</td>
                    <td class="px-4 py-2 border">Faculty of Engineering</td>
                    <td class="px-4 py-2 border text-right">14,000.00</td>
                    <td class="px-4 py-2 border text-center">2024-11-05</td>
                </tr>
                <tr class="border-b">
                    <td class="px-4 py-2 border">Tender I</td>
                    <td class="px-4 py-2 border">Printing and stationary supplies</td>
                    <td class="px-4 py-2 border">Faculty of Computer Science</td>
                    <td class="px-4 py-2 border text-right">7,500.00</td>
                    <td class="px-4 py-2 border text-center">2024-11-10</td>
                </tr>
                <tr class="border-b">
                    <td class="px-4 py-2 border">Tender J</td>
                    <td class="px-4 py-2 border">Maintenance of laboratory equipment</td>
                    <td class="px-4 py-2 border">Faculty of Medicine</td>
                    <td class="px-4 py-2 border text-right">18,000.00</td>
                    <td class="px-4 py-2 border text-center">2024-11-15</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

@endsection
