<?php

namespace App\Repositories;

use App\Models\Cakes;
use Illuminate\Http\Request;

class CakeRepository
{
    protected $model;

    public function __construct(Cakes $cake)
    {
        $this->model = $cake;
    }

    public function get(Request $request)
    {
        $query = Cakes::query();

        if (!empty($request->name)) {
            $query->where('name', 'LIKE', "%{$request->name}%");
        }

        if (!empty($request->veg_nonveg)) {
            $query->where('veg_nonveg', $request->veg_nonveg);
        }

        if ($request->has('is_activated')) {
            $query->where('is_activated', (bool) $request->is_activated);
        }

        return $query;
    }

    public function create(array $input)
    {
        $input['is_activated'] = true;
        return Cakes::create($input);
    }

    public function find($id)
    {
        return Cakes::find($id);
    }

    public function update($id, array $input)
    {
        $cake = $this->find($id);
        if ($cake) {
            $cake->update($input);
        }
        return $cake;
    }

    public function delete($id)
    {
        $cake = $this->find($id);
        if ($cake) {
            $cake->delete();
        }
    }

    public function deactivate($id)
    {
        $cake = $this->find($id);
        if ($cake) {
            $cake->is_activated = false;
            $cake->save();
            return $cake;
        }
        throw new \Exception('Cake not found');
    }

    public function activate($id)
    {
        $cake = $this->find($id);
        if ($cake) {
            $cake->is_activated = true;
            $cake->save();
            return $cake;
        }
        throw new \Exception('Cake not found');
    }
}
