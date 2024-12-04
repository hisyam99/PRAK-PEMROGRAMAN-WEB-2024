@extends('layouts.app')

@section('title', 'Service List')

@section('content')
<div class="bg-white p-6 rounded-lg shadow-lg">
    <h1 class="text-2xl font-bold mb-6">Available Services</h1>

    @foreach ($services as $service)
        <div class="mb-4 border-b pb-4">
            <div class="flex items-center">
                <img src="{{ $service->image_url }}" alt="{{ $service->name }}" class="w-20 h-20 rounded-md mr-4">
                <div>
                    <h2 class="text-xl font-semibold">{{ $service->name }}</h2>
                    <p class="text-gray-600">{{ $service->category }}</p>
                    <p class="text-gray-800 font-bold">Price Range: {{ $service->price_range }}</p>
                </div>
            </div>
            <p class="mt-2">{{ $service->description }}</p>

            <div class="mt-4">
                <a href="{{ route('services.show', $service->id) }}" class="text-blue-600 hover:underline">View Details</a>
            </div>
        </div>
    @endforeach

    <div class="mt-6">
        {{ $services->links() }}
    </div>
</div>
@endsection