<?php

namespace App\Http\Controllers\Api;

use App\Models\Rating;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\RatingResource;
use Illuminate\Support\Facades\Validator;

class RatingController extends Controller
{
    /**
     * index
     *
     * @return void
     */
    public function index()
    {
        // Get all ratings
        $ratings = Rating::latest()->paginate(5);

        // Return collection of services as a resource
        return new RatingResource(true, 'List of Ratings', $ratings);
    }

    public function store(Request $request)
    {
        // Validasi data
        $validator = Validator::make($request->all(), [
            'service_id' => 'required',
            'user_id' => 'required',
            'rating' => 'required|integer|between:1,5',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        // Simpan data rating
        $rating = Rating::create($request->all());

        return new RatingResource(true, 'Rating berhasil disimpan!', $rating);
    }

    public function show($id)
    {
        // Cari rating berdasarkan ID
        $rating = Rating::find($id);

        if (!$rating) {
            return response()->json(['message' => 'Rating tidak ditemukan'], 404);
        }

        return new RatingResource(true, 'Rating ditemukan!', $rating);
    }

    public function update(Request $request, $id)
    {
        // Validasi data
        $validator = Validator::make($request->all(), [
            'rating' => 'required|integer|between:1,5',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        // Cari rating berdasarkan ID
        $rating = Rating::find($id);

        if (!$rating) {
            return response()->json(['message' => 'Rating tidak ditemukan'], 404);
        }

        // Update data rating
        $rating->update($request->all());

        return new RatingResource(true, 'Rating berhasil diupdate!', $rating);
    }

    public function destroy($id)
    {
        // Cari rating berdasarkan ID
        $rating = Rating::find($id);

        // Hapus data rating
        $rating->delete();

        return new RatingResource(true, 'Rating berhasil dihapus!', null);
    }
}
