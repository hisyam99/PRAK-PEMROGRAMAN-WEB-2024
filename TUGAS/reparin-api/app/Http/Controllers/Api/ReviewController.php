<?php

namespace App\Http\Controllers\Api;

use App\Models\Review;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\ReviewResource;
use Illuminate\Support\Facades\Validator;

class ReviewController extends Controller
{
    public function index()
    {
        // Get all reviews
        $reviews = Review::latest()->paginate(5);

        // Return collection of services as a resource
        return new ReviewResource(true, 'List of Reviews', $reviews);
    }
    
    public function store(Request $request)
    {
        // Validasi data
        $validator = Validator::make($request->all(), [
            'service_id' => 'required',
            'user_id' => 'required',
            'review' => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        // Simpan data review
        $review = Review::create($request->all());

        return new ReviewResource(true, 'Review berhasil disimpan!', $review);
    }

    public function show($id)
    {
        // Cari review berdasarkan ID
        $review = Review::find($id);

        return new ReviewResource(true, 'Review ditemukan!', $review);
    }

    public function update(Request $request, $id)
    {
        // Validasi data
        $validator = Validator::make($request->all(), [
            'review' => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        // Cari review berdasarkan ID
        $review = Review::find($id);

        // Update data review
        $review->update($request->all());

        return new ReviewResource(true, 'Review berhasil diupdate!', $review);
    }

    public function destroy($id)
    {
        // Cari review berdasarkan ID
        $review = Review::find($id);

        // Hapus data review
        $review->delete();

        return new ReviewResource(true, 'Review berhasil dihapus!', null);
    }
}
