<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\CategoryRepository;

class CategoryController extends Controller
{
    public function index(Request $request)
    {
        // Fetch all services from the repository
        $categories = app(CategoryRepository::class)->get($request)->paginate(20);

        // Return the index view with services data
        return view('backend.category.index', [
            'categories' => $categories,
            'request' => $request
        ]);
    }

    public function create()
    {
        return view('backend.category.create');
    }

    /**
     * Show the form for editing the specified service.
     *
     * @param  int  $id
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $category = app(CategoryRepository::class)->find($id);
        if (!$category) {
            return redirect()->route('admin.category.index')
                ->with('error', 'category not found');
        }

        return view('backend.category.edit', compact('category'));
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
            $category = app(CategoryRepository::class)->update($id, $request->all());
            return redirect()->route('admin.category.index')->with('success', 'City updated successfully.');
        } catch (\Exception $e) {
            return back()->withInput()->with('error', 'Failed to update city: ' . $e->getMessage());
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
        try {
            // Create a new service using the validated request data.
            $category = app(CategoryRepository::class)->create($request->all());

            // Redirect to the index page with a success message.
            return redirect()->route('admin.category.index')->with('success', 'category created successfully.');
        } catch (\Exception $e) {
            // Log the error for debugging purposes and redirect back with an error message.
            // $this->logError('store', $e, $request->all());
            return back()->withInput()->with('error', 'Failed to create category: ' . $e->getMessage());
        }
    }

    public function deactivateCategory($id)
    {
        try {
            $category = app(CategoryRepository::class)->find($id); // Fetch the city by ID
            if (!$category) {
                return redirect()->back()->with('error', 'City not found.');
            }

            // Deactivate the City
            $deactivate =   app(CategoryRepository::class)->deactivate($id);

            return redirect()->route('admin.category.index', ['id' => $category->id])
                ->with('success', 'City deactivated successfully.');
        } catch (\Exception $e) {
            $this->logError('deactivateCategory', $e, $id);
            return back()->withInput()->with('error', 'Failed to deactivate category: ' . $e->getMessage());
        }
    }

    public function activateCategory($id)
    {
        try {
             $category = app(CategoryRepository::class)->find($id);
            if (!$category) {
                return redirect()->back()->with('error', 'City not found.');
            }

            // Activate the City
            $activate =  $category = app(CategoryRepository::class)->activate($id);

            return redirect()->route('admin.category.index', ['id' => $category->id])
                ->with('success', 'City activated successfully.');
        } catch (\Exception $e) {
            $this->logError('activateCategory', $e, $id);
            return back()->withInput()->with('error', 'Failed to activate category: ' . $e->getMessage());
        }
    }
}
