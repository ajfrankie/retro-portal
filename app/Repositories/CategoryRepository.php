<?php

namespace App\Repositories;

use App\Models\Category;
use Illuminate\Http\Request;


class CategoryRepository
{
    protected $model;

    public function __construct(Category $category)
    {
        $this->model = $category;
    }
    /**
     * Get all categories with optional filtering
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function get(Request $request)
    {
        $query = Category::query();

        // Apply filters if needed
        if (isset($request->name)) {
            if ($request->name != null) {
                $query = $query->where('name', 'LIKE', "%{$request->name}%");
            }
        }


        if (isset($request->type)) {
            if ($request->type != null) {
                $query = $query->where('type', $request->type);
            }
        }

        if (isset($request->is_activated)) {
            if ($request->is_activated != null) {
                $query = $query->where('is_activated', true);
            }
        }

        return $query; // <--- return the query builder, not ->get()
    }


    /**
     * Create a new category
     *
     * @param array $input
     * @return \App\Models\Category
     */
    public function create($input)
    {
        $input['is_activated'] = true;
        return Category::create($input);
    }

    public function find($id)
    {
        return Category::find($id);
    }

    /**
     * Update the specified category
     *
     * @param int $id
     * @param array $input
     * @return \App\Models\Category|null
     */
    public function update($id, $input)
    {
        $category = $this->find($id);
        if ($category) {
            $category->update($input);
        }
        return $category;
    }

    /**
     * Delete the specified category
     *
     * @param int $id
     * @return void
     */
    public function delete($id)
    {
        $category = $this->find($id);
        if ($category) {
            $category->delete();
        }
    }

    public function deactivate($id)
    {
        $category = $this->find($id); // Assuming `find` fetches the country by ID
        if ($category) {
            $category->is_activated = false;
            $category->save();
            return $category;
        }
        throw new \Exception('category not found');
    }

    public function activate($id)
    {
        $category = $this->find($id);
        if ($category) {
            $category->is_activated = true;
            $category->save();
            return $category;
        }
        throw new \Exception('category not found');
    }
}
