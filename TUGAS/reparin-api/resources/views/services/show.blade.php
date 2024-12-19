@extends('layouts.app')

@section('title', 'Service Details')

@section('content')
<div class="bg-white p-6 rounded-lg shadow-lg">
    <h1 class="text-2xl font-bold mb-6">{{ $service->name }}</h1>
    <img src="{{ $service->image_url }}" alt="{{ $service->name }}" class="w-full h-64 rounded-md object-cover mb-4">
    <p class="text-gray-600">{{ $service->category }}</p>
    <p class="text-gray-800 font-bold">Price Range: {{ $service->price_range }}</p>
    <p class="mt-4">{{ $service->description }}</p>

    <hr class="my-6">

    <h2 class="text-xl font-semibold">Ratings</h2>
    @foreach ($ratings as $rating)
        <div class="mb-4">
            <p class="font-bold">{{ $rating->user->name }}</p>
            <p class="text-yellow-500">{{ str_repeat('★', $rating->rating) }}{{ str_repeat('☆', 5 - $rating->rating) }}</p>
        </div>
    @endforeach

    <h2 class="text-xl font-semibold mt-6">Reviews</h2>
    @foreach ($reviews as $review)
        <div class="mb-4">
            <p class="font-bold">{{ $review->user->name }}</p>
            <p>{{ $review->review }}</p>
        </div>
    @endforeach

    <hr class="my-6">

    <h2 class="text-xl font-semibold">Add Your Rating and Review</h2>
    <form action="{{ route('ratings.store') }}" method="POST">
        @csrf
        <input type="hidden" name="service_id" value="{{ $service->id }}">

        <div class="mb-4">
            <label for="rating" class="block text-gray-700 font-bold">Rating</label>
            <select name="rating" id="rating" class="w-full border-gray-300 rounded-md">
                <option value="1">1 - Poor</option>
                <option value="2">2 - Fair</option>
                <option value="3">3 - Good</option>
                <option value="4">4 - Very Good</option>
                <option value="5">5 - Excellent</option>
            </select>
        </div>

        <div class="mb-4">
            <label for="review" class="block text-gray-700 font-bold">Review</label>
            <textarea name="review" id="review" rows="4" class="w-full border-gray-300 rounded-md"></textarea>
        </div>

        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded-md">Submit</button>
    </form>
</div>
@endsection
