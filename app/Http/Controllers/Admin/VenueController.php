<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreVenueRequest;
use App\Models\Categories;
use App\Models\Venue;
use App\Models\VenueHasCategory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use illuminate\Support\Str;
use Illuminate\View\View;

class VenueController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        return view('admin.venues.index', [
            'venues' => Venue::latest()->paginate(10),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('admin.venues.create', [
            'categories' => Categories::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreVenueRequest $request, Venue $venue): RedirectResponse
    {
        try {
            $newVenue = Venue::create([
                'name' => $request->name,
                'slug' => Str::slug($request->name),
                'description' => $request->description,
                'images' => $request->images,
                'phone' => $request->phone,
                'email' => Auth::user()->email,
                'city' => $request->city,
            ]);

            $categories = $request->category_id;

            foreach ($categories as $category) {
                VenueHasCategory::create([
                    'venue_id' => $newVenue->id,
                    'category_id' => $category,
                ]);
            }

            return redirect()->route('venues.index')
                ->withSuccess('New venue is added successfully.');
        } catch (\Exception $e) {
            dd($e->getMessage());
            return redirect()->back()->withError('Failed to add new venue. Please try again.');
        }
    }


    /**
     * Display the specified resource.
     */
    public function show(string $slug): View
    {
        return view('admin.venues.show', [
            'venue' => Venue::where('slug', $slug)->first(),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
