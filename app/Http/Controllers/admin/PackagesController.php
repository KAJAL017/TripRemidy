<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class PackagesController extends Controller
{

    public function index()
    {
        $result['packages'] = DB::table('packages')->orderBy('id', 'desc')->get();
        return view('admin.pages.packages.list',$result);
    }

    public function create()
    {
        return view('admin.pages.packages.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'package-name' => 'required|string|max:255',
            'tour-heading' => 'required|string|max:255',
            'tour-location' => 'required|string|max:255',
            'gmap-link' => 'nullable|url',
            'tour-badge' => 'nullable|string',
            'group-size' => 'nullable|string',
            'available-languages' => 'nullable|array',
            'tour-overview' => 'required|string',
            'tour-highlights' => 'required|string',
            'included-items' => 'required|string',
            'important-info' => 'required|string',
            'price' => 'required|numeric',
            'images' => 'required|array',
            'images.*' => 'image|mimes:jpg,jpeg,png,webp',
        ]);

        DB::beginTransaction();

        try {
            $packageID = DB::table('packages')->insertGetId([
                'name' => $validated['package-name'],
                'heading' => $validated['tour-heading'],
                'slug' => Str::slug($validated['tour-heading']),
                'location' => $validated['tour-location'],
                'gmap_link' => $validated['gmap-link'] ?? null,
                'price' => $validated['price'] ?? null,
                'badge' => $validated['tour-badge'] ?? null,
                'group_size' => $validated['group-size'] ?? null,
                'languages' => isset($validated['available-languages']) ? json_encode($validated['available-languages']) : null,
                'overview' => $validated['tour-overview'],
                'highlights' => $validated['tour-highlights'],
                'included_items' => $validated['included-items'],
                'important_info' => $validated['important-info'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            if ($request->hasFile('images')) {
                foreach ($request->file('images') as $file) {
                    $filename = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
                    $destinationPath = public_path('uploads/packages/images');
                    if (!file_exists($destinationPath)) {
                        mkdir($destinationPath, 0755, true);
                    }
                    $file->move($destinationPath, $filename);
                    DB::table('package_images')->insert([
                        'package_id' => $packageID,
                        'image_path' => 'public/uploads/packages/images/' . $filename,
                        'created_at' => now(),
                        'updated_at' => now(),
                    ]);
                }
            }

            DB::commit();
            session()->flash('success', 'Tour package created successfully!');
            return response()->json([
                'status' => true,
                'redirect' => route('admin.packages.index')
            ]);

        } catch (\Exception $e) {
            DB::rollBack();

            return response()->json([
                'status' => false,
                'message' => 'Something went wrong!',
                'error' => $e->getMessage()
            ], 500);
        }
    }


    public function show(string $id)
    {
        //
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
