<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCustomizedOrderRequest;
use App\Http\Requests\StoreOnsiteOrdersRequest;
use App\Http\Requests\UpdateCustomizedOrderRequest;
use App\Repositories\CakeRepository;
use App\Repositories\CategoryRepository;
use App\Repositories\CustomizedOrderRepository;

class CustomizedOrderController extends Controller
{
    public function index(Request $request)
    {
        $customizedOrders = app(CustomizedOrderRepository::class)->get($request)->paginate(20);

        return view('backend.customizedOrders.index', [
            'customizedOrders' => $customizedOrders,
            'request' => $request
        ]);
    }

    public function create(Request $request)
    {
        $categories = app(CategoryRepository::class)->get($request)->get();
        $cakes = app(CakeRepository::class)->get($request)->get();

        return view('backend.customizedOrders.create', [
            'cakes' => $cakes,
            'categories' => $categories
        ]);
    }

    public function store(StoreCustomizedOrderRequest $request)
    {
        try {
            app(CustomizedOrderRepository::class)->create($request->all());

            return redirect()
                ->route('admin.customizedOrder.index')
                ->with('success', 'Customized order created successfully.');
        } catch (\Exception $e) {
            return back()
                ->withInput()
                ->with('error', 'Failed to create customized order: ' . $e->getMessage());
        }
    }

    public function edit(Request $request, $id)
    {
        $customizedOrder = app(CustomizedOrderRepository::class)->find($id);

        if (!$customizedOrder) {
            return redirect()
                ->route('admin.customizedOrder.index')
                ->with('error', 'Customized order not found.');
        }

        $categories = app(CategoryRepository::class)->get($request)->get();
        $cakes = app(CakeRepository::class)->get($request)->get();

        return view('backend.customizedOrders.edit', [
            'cakes' => $cakes,
            'customizedOrder' => $customizedOrder,
            'categories' => $categories
        ]);
    }

    public function update(UpdateCustomizedOrderRequest $request, $id)
    {
        try {
            app(CustomizedOrderRepository::class)->update($id, $request->all());

            return redirect()
                ->route('admin.customizedOrder.index')
                ->with('success', 'Customized order updated successfully.');
        } catch (\Exception $e) {
            return back()
                ->withInput()
                ->with('error', 'Failed to update customized order: ' . $e->getMessage());
        }
    }

    public function show($id, Request $request)
    {
        try {
            $customizedOrder = app(CustomizedOrderRepository::class)->find($id);

            if (!$customizedOrder) {
                return redirect()
                    ->route('admin.customizedOrder.index')
                    ->with('error', 'Customized order not found.');
            }

            $categories = app(CategoryRepository::class)->get($request)->get();
            $cakes = app(CakeRepository::class)->get($request)->get();

            return view('backend.customizedOrders.show', [
                'cakes' => $cakes,
                'customizedOrder' => $customizedOrder,
                'categories' => $categories
            ]);
        } catch (\Exception $e) {
            return back()
                ->with('error', 'Failed to fetch customized order details: ' . $e->getMessage());
        }
    }
}
