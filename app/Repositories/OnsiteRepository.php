<?php

namespace App\Repositories;

use App\Models\OnSiteOrder;
use Illuminate\Http\Request;


class OnsiteRepository
{
    protected $model;

    public function __construct(OnSiteOrder $onsiteorder)
    {
        $this->model = $onsiteorder;
    }
    /**
     * Get all categories with optional filtering
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function get(Request $request)
    {
        $query = OnSiteOrder::query();


        return $query; 
    }


    /**
     * Create a new category
     *
     * @param array $input
     * @return \App\Models\OnSiteOrder
     */
    public function create($input)
    {
        $input['is_activated'] = true;
        return OnSiteOrder::create($input);
    }

    public function find($id)
    {
        return OnSiteOrder::find($id);
    }

    /**
     * Update the specified category
     *
     * @param int $id
     * @param array $input
     * @return \App\Models\onsiteorder|null
     */
    public function update($id, $input)
    {
        $onsiteorder = $this->find($id);
        if ($onsiteorder) {
            $onsiteorder->update($input);
        }
        return $onsiteorder;
    }

    /**
     * Delete the specified category
     *
     * @param int $id
     * @return void
     */
    public function delete($id)
    {
        $onsiteorder = $this->find($id);
        if ($onsiteorder) {
            $onsiteorder->delete();
        }
    }

    public function deactivate($id)
    {
        $onsiteorder = $this->find($id);
        if ($onsiteorder) {
            $onsiteorder->is_activated = false;
            $onsiteorder->save();
            return $onsiteorder;
        }
        throw new \Exception('On Site Order not found');
    }

    public function activate($id)
    {
        $onsiteorder = $this->find($id);
        if ($onsiteorder) {
            $onsiteorder->is_activated = true;
            $onsiteorder->save();
            return $onsiteorder;
        }
        throw new \Exception('On Site Order not found');
    }
}
