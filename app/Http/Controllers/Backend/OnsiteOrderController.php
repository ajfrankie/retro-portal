<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreOnsiteOrdersRequest;
use App\Http\Requests\UpdateOnsiteOrdersRequest;
use App\Repositories\CakeRepository;
use App\Repositories\CategoryRepository;
use App\Repositories\OnsiteRepository;

class OnsiteOrderController extends Controller
{
    public function index(Request $request)
    {

        $onsiteOrders = app(OnsiteRepository::class)->get($request)->paginate(20);
        return view('backend.onsiteorders.index', [
            'onsiteOrders' => $onsiteOrders,
            'request' => $request
        ]);
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

    public function store(StoreOnsiteOrdersRequest $request)
    {
        try {
            app(OnsiteRepository::class)->create($request->all());

            return redirect()->route('admin.onsite.index')->with('success', 'Onsite order created created successfully.');

            return redirect()->route('admin.onsite.index')->with('success', 'Onsite order created successfully.');
        } catch (\Exception $e) {
            return back()->withInput()->with('error', 'Failed to create size: ' . $e->getMessage());
        }
    }

    public function edit(Request $request, $id)
    {
        $onsite = app(OnsiteRepository::class)->find($id);
        $categories = app(CategoryRepository::class)->get($request)->get();
        $cakes = app(CakeRepository::class)->get($request)->get();
        return view('backend.onsiteorders.edit', [
            'cakes' => $cakes,
            'onsite' => $onsite,
            'categories' => $categories
        ]);
    }

    public function update(UpdateOnsiteOrdersRequest $request, $id)
    {
        try {
            // Pass both the $id and the $input (request data) to the update method
            app(OnsiteRepository::class)->update($id, $request->all());

            return redirect()->route('admin.onsite.index')->with('success', 'Onsite order updated successfully.');
        } catch (\Exception $e) {
            return back()->withInput()->with('error', 'Failed to update Onsite order: ' . $e->getMessage());
        }
    }

   public function show($id, Request $request)
    {
        try {
            $onsite = app(OnsiteRepository::class)->find($id);
            $categories = app(CategoryRepository::class)->get($request)->get();
            $cakes = app(CakeRepository::class)->get($request)->get();
            if (!$onsite) {
                return redirect()->route('admin.onsite.index')->with('error', 'Onsite order  not found.');
            }

            return view('backend.onsiteorders.show', [
                'cakes' => $cakes,
                'onsite' => $onsite,
                'categories' => $categories
            ]);
        } catch (\Exception $e) {
            $this->logError('edit', $e, ['id' => $id]);
            return back()->with('error', 'Failed to fetch Onsite order  details: ' . $e->getMessage());
        }
    }
}
