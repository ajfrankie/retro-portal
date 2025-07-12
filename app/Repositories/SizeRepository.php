<?php

namespace App\Repositories;

use App\Models\Size;
use Illuminate\Http\Request;


class SizeRepository
{
    protected $model;

    public function __construct(Size $size)
    {
        $this->model = $size;
    }
    /**
     * Get all categories with optional filtering
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function get(Request $request)
    {
        $query = Size::query();

        return $query; 
    }


    /**
     * Create a new size
     *
     * @param array $input
     * @return \App\Models\Size
     */
    public function create($input)
    {
        $input['is_activated'] = true;
        return Size::create($input);
    }

    public function find($id)
    {
        return Size::find($id);
    }

    /**
     * Update the specified size
     *
     * @param int $id
     * @param array $input
     * @return \App\Models\size|null
     */
    public function update($id, $input)
    {
        $size = $this->find($id);
        if ($size) {
            $size->update($input);
        }
        return $size;
    }

    /**
     * Delete the specified size
     *
     * @param int $id
     * @return void
     */
    public function delete($id)
    {
        $size = $this->find($id);
        if ($size) {
            $size->delete();
        }
    }

    public function deactivate($id)
    {
        $size = $this->find($id); // Assuming `find` fetches the country by ID
        if ($size) {
            $size->is_activated = false;
            $size->save();
            return $size;
        }
        throw new \Exception('size not found');
    }

    public function activate($id)
    {
        $size = $this->find($id);
        if ($size) {
            $size->is_activated = true;
            $size->save();
            return $size;
        }
        throw new \Exception('size not found');
    }
}
