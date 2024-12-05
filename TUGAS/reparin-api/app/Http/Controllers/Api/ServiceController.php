<?php

namespace App\Http\Controllers\Api;

// Import model Service
use App\Models\Service;

use Illuminate\Http\Request;

// Import resource ServiceResource (create if necessary)
use App\Http\Controllers\Controller;

// Import Http request
use App\Http\Resources\ServiceResource;

// Import facade Validator
use Illuminate\Support\Facades\Validator;

// Import facade Storage
use Illuminate\Support\Facades\Storage;

class ServiceController extends Controller
{
    /**
     * index
     *
     * @return void
     */
    public function index()
    {
        // Get all services
        $services = Service::latest()->paginate(5);

        // Return collection of services as a resource
        return new ServiceResource(true, 'List of Services', $services);
    }

    /**
     * store
     *
     * @param  mixed $request
     * @return void
     */
    public function store(Request $request)
    {
        // Define validation rules
        $validator = Validator::make($request->all(), [
            'image'  => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'name'       => 'required',
            'description' => 'required',
            'category'   => 'required',
            'price_range' => 'required',
        ]);

        // Check if validation fails
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        // Upload image
        $image = $request->file('image');
        $image->storeAs('public/services', $image->hashName());

        // Create service
        $service = Service::create([
            'image'  => $image->hashName(),
            'name'       => $request->name,
            'description' => $request->description,
            'category'   => $request->category,
            'price_range' => $request->price_range,
        ]);

        // Return response
        return new ServiceResource(true, 'Service successfully added!', $service);
    }

    /**
     * show
     *
     * @param  mixed $id
     * @return void
     */
    public function show($id)
    {
        // Find service by ID
        $service = Service::find($id);

        // Return single service as a resource
        return new ServiceResource(true, 'Service details!', $service);
    }

    // public function show($id)
    // {
    //     $service = Service::with(['ratings', 'reviews'])->findOrFail($id);
    //     $ratings = $service->ratings;
    //     $reviews = $service->reviews;

    //     return view('services.show', compact('service', 'ratings', 'reviews'));
    // }


    /**
     * update
     *
     * @param  mixed $request
     * @param  mixed $id
     * @return void
     */
    public function update(Request $request, $id)
    {
        // Define validation rules
        $validator = Validator::make($request->all(), [
            'name'       => 'required',
            'description' => 'required',
            'category'   => 'required',
            'price_range' => 'required',
        ]);

        // Check if validation fails
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        // Find service by ID
        $service = Service::find($id);

        // Check if image is not empty
        if ($request->hasFile('image')) {

            // Upload new image
            $image = $request->file('image');
            $image->storeAs('public/services', $image->hashName());

            // Delete old image
            Storage::delete('public/services/' . basename($service->image));

            // Update service with new image
            $service->update([
                'image'  => $image->hashName(),
                'name'       => $request->name,
                'description' => $request->description,
                'category'   => $request->category,
                'price_range' => $request->price_range,
            ]);
        } else {

            // Update service without image
            $service->update([
                'name'       => $request->name,
                'description' => $request->description,
                'category'   => $request->category,
                'price_range' => $request->price_range,
            ]);
        }

        // Return response
        return new ServiceResource(true, 'Service successfully updated!', $service);
    }

    /**
     * destroy
     *
     * @param  mixed $id
     * @return void
     */
    public function destroy($id)
    {
        // Find service by ID
        $service = Service::find($id);

        // Delete image
        Storage::delete('public/services/' . basename($service->image));

        // Delete service
        $service->delete();

        // Return response
        return new ServiceResource(true, 'Service successfully deleted!', null);
    }
}
