<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\CakeRepository;
use App\Repositories\CategoryRepository;

class CakeController extends Controller
{
    public function index(Request $request)
    {
        $cakes = app(CakeRepository::class)->get($request)->paginate(20);

        return view('backend.cake.index', [
            'cakes' => $cakes,
            'request' => $request
        ]);
    }

    public function create(Request $request)
    {
        $categories = app(CategoryRepository::class)->get($request)->get();
        return view('backend.cake.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'veg_nonveg' => 'required|in:veg,non-veg',
            'category_id' => 'required|exists:categories,id',
            'availability' => 'required|in:in-stock,out-of-stock,pre-order',
            'description' => 'nullable|string',
        ]);

        try {
            app(CakeRepository::class)->create($validated);
            return redirect()->route('admin.cake.index')->with('success', 'Cake created successfully.');
        } catch (\Exception $e) {
            return back()->withInput()->with('error', 'Failed to create cake: ' . $e->getMessage());
        }
    }

    public function edit(Request $request,$id)
    {
        $categories = app(CategoryRepository::class)->get($request)->get();
        $cake = app(CakeRepository::class)->find($id);
        if (!$cake) {
            return redirect()->route('admin.cake.index')->with('error', 'Cake not found');
        }

        return view('backend.cake.edit',
    [
        'cake' => $cake,
        'categories' => $categories,

    ]);
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'veg_nonveg' => 'required|in:veg,non-veg',
            'category_id' => 'required|exists:categories,id',
            'availability' => 'required|in:in-stock,out-of-stock,pre-order',
            'description' => 'nullable|string',
        ]);

        try {
            app(CakeRepository::class)->update($id, $validated);
            return redirect()->route('admin.cake.index')->with('success', 'Cake updated successfully.');
        } catch (\Exception $e) {
            return back()->withInput()->with('error', 'Failed to update cake: ' . $e->getMessage());
        }
    }

    public function deactivateCake($id)
    {
        try {
            $cake = app(CakeRepository::class)->deactivate($id);
            return redirect()->route('admin.cake.index')->with('success', 'Cake deactivated successfully.');
        } catch (\Exception $e) {
            return back()->withInput()->with('error', 'Failed to deactivate cake: ' . $e->getMessage());
        }
    }

    public function activateCake($id)
    {
        try {
            $cake = app(CakeRepository::class)->activate($id);
            return redirect()->route('admin.cake.index')->with('success', 'Cake activated successfully.');
        } catch (\Exception $e) {
            return back()->withInput()->with('error', 'Failed to activate cake: ' . $e->getMessage());
        }
    }
}
