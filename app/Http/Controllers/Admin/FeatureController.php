<?php
// app/Http/Controllers/Admin/FeatureController.php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Feature;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FeatureController extends Controller
{
    public function index()
    {
        $features = Feature::orderBy('order')->get();
        return view('admin.features.index', compact('features'));
    }

    public function create()
    {
        return view('admin.features.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'icon' => 'required|string|max:50',
            'title_uz' => 'required|string|max:255',
            'title_ru' => 'nullable|string|max:255',
            'title_en' => 'nullable|string|max:255',
            'description_uz' => 'required|string',
            'description_ru' => 'nullable|string',
            'description_en' => 'nullable|string',
            'order' => 'integer',
            'is_active' => 'boolean'
        ]);

        Feature::create($validated);
        
        return redirect()->route('admin.features.index')
            ->with('success', 'Xususiyat muvaffaqiyatli qo\'shildi!');
    }

    public function edit(Feature $feature)
    {
        return view('admin.features.edit', compact('feature'));
    }

    public function update(Request $request, Feature $feature)
    {
        $validated = $request->validate([
            'icon' => 'required|string|max:50',
            'title_uz' => 'required|string|max:255',
            'title_ru' => 'nullable|string|max:255',
            'title_en' => 'nullable|string|max:255',
            'description_uz' => 'required|string',
            'description_ru' => 'nullable|string',
            'description_en' => 'nullable|string',
            'order' => 'integer',
            'is_active' => 'boolean'
        ]);

        $feature->update($validated);
        
        return redirect()->route('admin.features.index')
            ->with('success', 'Xususiyat muvaffaqiyatli yangilandi!');
    }

    public function destroy(Feature $feature)
    {
        $feature->delete();
        
        return redirect()->route('admin.features.index')
            ->with('success', 'Xususiyat muvaffaqiyatli o\'chirildi!');
    }
}