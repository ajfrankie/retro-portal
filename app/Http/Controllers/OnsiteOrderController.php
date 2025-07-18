<?php

namespace App\Http\Controllers;

use App\Repositories\CakeRepository;
use App\Repositories\CategoryRepository;
use Illuminate\Http\Request;

class OnsiteOrderController extends Controller
{
    public function index()
    {
        // Logic to display onsite orders
        return view('backend.onsiteorders.index');
    }

    public function create(Request $request)
    {
        $categories = app(CategoryRepository::class)->get($request)->get();
        $cakes = app(CakeRepository::class)->get($request)->get();
        return view('backend.onsiteorders.create', [
            'cakes' => $cakes,
            'categories' => $categories
        ]);
    }

    public function store(Request $request)
    {
        // Logic to store onsite order
        // Validate and save the order data
        return redirect()->route('admin.onsite.index')->with('success', 'Onsite order created successfully.');
    }

    public function edit(Request $request)
    {
        $categories = app(CategoryRepository::class)->get($request)->get();
        $cakes = app(CakeRepository::class)->get($request)->get();
        return view('backend.onsiteorders.edit', [
            'cakes' => $cakes,
            'categories' => $categories
        ]);
    }

    public function update(Request $request)
    {
        // Logic to update onsite order
        // Validate and update the order data
        return redirect()->route('admin.onsite.index')->with('success', 'Onsite order updated successfully.');
    }
}
