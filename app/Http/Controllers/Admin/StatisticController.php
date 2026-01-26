<?php
// app/Http/Controllers/Admin/StatisticController.php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Statistic;
use Illuminate\Http\Request;

class StatisticController extends Controller
{
    public function index()
    {
        $statistics = Statistic::orderBy('order')->get();
        return view('admin.statistics.index', compact('statistics'));
    }

    public function create()
    {
        return view('admin.statistics.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'number' => 'required|string|max:50',
            'title_uz' => 'required|string|max:255',
            'title_ru' => 'nullable|string|max:255',
            'title_en' => 'nullable|string|max:255',
            'icon' => 'nullable|string|max:50',
            'color' => 'nullable|string|max:7',
            'order' => 'integer',
            'is_active' => 'boolean'
        ]);

        Statistic::create($validated);
        
        return redirect()->route('admin.statistics.index')
            ->with('success', 'Statistika muvaffaqiyatli qo\'shildi!');
    }

    public function edit(Statistic $statistic)
    {
        return view('admin.statistics.edit', compact('statistic'));
    }

    public function update(Request $request, Statistic $statistic)
    {
        $validated = $request->validate([
            'number' => 'required|string|max:50',
            'title_uz' => 'required|string|max:255',
            'title_ru' => 'nullable|string|max:255',
            'title_en' => 'nullable|string|max:255',
            'icon' => 'nullable|string|max:50',
            'color' => 'nullable|string|max:7',
            'order' => 'integer',
            'is_active' => 'boolean'
        ]);

        $statistic->update($validated);
        
        return redirect()->route('admin.statistics.index')
            ->with('success', 'Statistika muvaffaqiyatli yangilandi!');
    }

    public function destroy(Statistic $statistic)
    {
        $statistic->delete();
        
        return redirect()->route('admin.statistics.index')
            ->with('success', 'Statistika muvaffaqiyatli o\'chirildi!');
    }
}