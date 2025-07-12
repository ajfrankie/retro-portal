<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\CakeRepository;
use App\Repositories\CategoryRepository;
use App\Repositories\SizeRepository;

class SizeController extends Controller
{
    public function index(Request $request)
    {
        // Fetch all services from the repository
        $sizes = app(SizeRepository::class)->get($request)->paginate(20);

        // Return the index view with services data
        return view('backend.size.index', [
            'sizes' => $sizes,
            'request' => $request
        ]);
    }

    public function create(Request $request)
    {
        $cakes = app(CakeRepository::class)->get($request)->get();
        $categories = app(CategoryRepository::class)->get($request)->get();
        return view('backend.size.create', [
            'cakes' => $cakes,
            'categories' => $categories,
            'request' => $request
        ]);
    }

    /**
     * Show the form for editing the specified service.
     *
     * @param  int  $id
     * @return \Illuminate\View\View
     */
    public function edit($id, Request $request)
    {
        $size = app(SizeRepository::class)->find($id);
        $cakes = app(CakeRepository::class)->get($request)->get();
        $categories = app(CategoryRepository::class)->get($request)->get();
        if (!$size) {
            return redirect()->route('admin.size.index')
                ->with('error', 'sizes not found');
        }

        return view('backend.size.edit', [
            'size' => $size,
            'cakes' => $cakes,
            'categories' => $categories,
            'request' => $request
        ]);
    }

    /**
     * Update the specified service in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        try {
            $size =  app(SizeRepository::class)->update($id, $request->all());
            return redirect()->route('admin.size.index')->with('success', 'size updated successfully.');
        } catch (\Exception $e) {
            return back()->withInput()->with('error', 'Failed to update size: ' . $e->getMessage());
        }
    }
    /**
     * Store a newly created group in storage.
     *
     * @param  StoreGroupRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'size' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'cake_id' => 'required|exists:cakes,id',
            'veg_nonveg' => 'required|in:veg,non-veg',
            'price' => 'required|numeric|min:0',
        ]);

        try {
            app(SizeRepository::class)->create($validated);

            return redirect()->route('admin.size.index')->with('success', 'Size created successfully.');
        } catch (\Exception $e) {
            return back()->withInput()->with('error', 'Failed to create size: ' . $e->getMessage());
        }
    }


    public function deactivateSize($id)
    {
        try {
            $size = app(SizeRepository::class)->find($id); // Fetch the city by ID
            if (!$size) {
                return redirect()->back()->with('error', 'City not found.');
            }

            // Deactivate the City
            $size =   app(SizeRepository::class)->deactivate($id);

            return redirect()->route('admin.size.index', ['id' => $size->id])
                ->with('success', 'size deactivated successfully.');
        } catch (\Exception $e) {
            $this->logError('deactivateSize', $e, $id);
            return back()->withInput()->with('error', 'Failed to deactivate size: ' . $e->getMessage());
        }
    }

    public function activateSize($id)
    {
        try {
            $size = app(SizeRepository::class)->find($id);
            if (!$size) {
                return redirect()->back()->with('error', 'size not found.');
            }

            // Activate the City
            $size = app(SizeRepository::class)->activate($id);

            return redirect()->route('admin.category.index', ['id' => $size->id])
                ->with('success', 'size activated successfully.');
        } catch (\Exception $e) {
            $this->logError('activateCategory', $e, $id);
            return back()->withInput()->with('error', 'Failed to activate size: ' . $e->getMessage());
        }
    }

   
}
