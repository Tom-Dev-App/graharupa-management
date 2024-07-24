<?php

namespace App\Http\Controllers;

use App\Models\MaterialUnit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class MaterialUnitController extends Controller
{
    public function index(Request $request) {
        $materialUnits = MaterialUnit::withTrashed()
            ->select(['id', 'name', 'unit', 'deleted_at'])
            ->paginate(25);
        
       
        return view('pages.dashboard.material-unit.index', compact('materialUnits'));
    }

    public function create() {
        return view('pages.dashboard.material-unit.create');
    }

    public function store(Request $request) {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'unit' => 'required|string|max:255',
        ]);

         MaterialUnit::create([
            'name' => $validatedData['name'],
            'unit' => $validatedData['unit'],
        ]);

      

        return redirect()->route('unit.index')->with('success', 'Material Unit created successfully');
    }

    public function edit($id) {
        $id = (int)$id;
        Gate::authorize('admin');
        $materialUnit = MaterialUnit::withTrashed()->find($id);

        if (!$materialUnit) {
            return redirect()->route('unit.index')->with('error', 'Unit not found.');
        }

        return view('pages.dashboard.material-unit.edit', compact('materialUnit'));
    }

    public function update(Request $request, $id) {
        $id = (int)$id;

        Gate::authorize('admin');

        $unit = MaterialUnit::withTrashed()->findOrFail($id);

        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'unit' => 'required|string|max:255|',
        ]);

        $unit->name = $validatedData['name'];
        $unit->unit = $validatedData['unit'];
        $unit->save();

        
        return redirect()->route('unit.index')->with('success', 'Material Unit updated successfully');
    }

    public function destroy( $id) {
        $id = (int)$id;

        Gate::authorize('admin');

        $unit = MaterialUnit::findOrFail($id);
        $unit->delete();
        return redirect()->route('unit.index')->with('success', 'Material Unit Deleted successfully');
    }

    public function restore($id) {
        $id = (int)$id;

        Gate::authorize('admin');

        $materialUnit = MaterialUnit::withTrashed()->find($id);

        if ($materialUnit && $materialUnit->trashed()) {
            $materialUnit->restore();
            return redirect()->route('unit.index')->with('success', 'Material Unit restored successfully.');
        }

        return redirect()->route('unit.index')->with('error', 'Unit not found or not deleted.');
    }
}
