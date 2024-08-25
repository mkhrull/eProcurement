@extends('layouts.app')
@section('title', 'Vendor List')
@section('content')
<div class="container mx-auto my-8 p-6 bg-white rounded-lg shadow-lg">
    <h1 class="text-3xl font-bold mb-6 text-center">Vendor List</h1>

    @if (session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4 text-center" role="alert">
            {{ session('success') }}
        </div>
    @endif

    <div class="overflow-x-auto">
        <table class="table-auto w-full text-center">
            <thead>
                <tr class="bg-gray-200">
                    <th class="px-4 py-2">Registrant Name</th>
                    <th class="px-4 py-2">Email</th>
                    <th class="px-4 py-2">Status</th>
                    <th class="px-4 py-2">Action</th>
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
@endsection
