<?php

namespace App\Repositories;

use App\Models\CustomizedOrder;
use Illuminate\Http\Request;


class CustomizedOrderRepository
{
    protected $model;

    public function __construct(CustomizedOrder $customizedOrder)
    {
        $this->model = $customizedOrder;
    }
    /**
     * Get all categories with optional filtering
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function get(Request $request)
    {
        $query = CustomizedOrder::query();


        return $query;
    }

    /**
     * Create a new category
     *
     * @param array $input
     * @return \App\Models\CustomizedOrder
     */
    public function create($input)
    {
        $input['is_activated'] = true;
        return CustomizedOrder::create($input);
    }

    public function find($id)
    {
        return CustomizedOrder::find($id);
    }

    /**
     * Update the specified category
     *
     * @param int $id
     * @param array $input
     * @return \App\Models\CustomizedOrder|null
     */
    public function update($id, $input)
    {
        $customizedOrder = $this->find($id);
        if ($customizedOrder) {
            $customizedOrder->update($input);
        }
        return $customizedOrder;
    }

    /**
     * Delete the specified category
     *
     * @param int $id
     * @return void
     */
    public function delete($id)
    {
        $customizedOrder = $this->find($id);
        if ($customizedOrder) {
            $customizedOrder->delete();
        }
    }

    public function deactivate($id)
    {
        $customizedOrder = $this->find($id);
        if ($customizedOrder) {
            $customizedOrder->is_activated = false;
            $customizedOrder->save();
            return $customizedOrder;
        }
        throw new \Exception('On Site Order not found');
    }

    public function activate($id)
    {
        $customizedOrder = $this->find($id);
        if ($customizedOrder) {
            $customizedOrder->is_activated = true;
            $customizedOrder->save();
            return $customizedOrder;
        }
        throw new \Exception('On Site Order not found');
    }
}
