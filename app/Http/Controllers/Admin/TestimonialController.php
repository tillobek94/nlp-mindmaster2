<?php
// app/Http/Controllers/Admin/TestimonialController.php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Testimonial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TestimonialController extends Controller
{
    public function index()
    {
        $testimonials = Testimonial::orderBy('order')->get();
        return view('admin.testimonials.index', compact('testimonials'));
    }

    public function create()
    {
        return view('admin.testimonials.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'author_name' => 'required|string|max:255',
            'author_position' => 'required|string|max:255',
            'content_uz' => 'required|string',
            'content_ru' => 'nullable|string',
            'content_en' => 'nullable|string',
            'avatar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'rating' => 'integer|min:1|max:5',
            'order' => 'integer',
            'is_active' => 'boolean'
        ]);

        if ($request->hasFile('avatar')) {
            $validated['avatar'] = $request->file('avatar')->store('avatars', 'public');
        }

        Testimonial::create($validated);
        
        return redirect()->route('admin.testimonials.index')
            ->with('success', 'Sharh muvaffaqiyatli qo\'shildi!');
    }

    public function edit(Testimonial $testimonial)
    {
        return view('admin.testimonials.edit', compact('testimonial'));
    }

    public function update(Request $request, Testimonial $testimonial)
    {
        $validated = $request->validate([
            'author_name' => 'required|string|max:255',
            'author_position' => 'required|string|max:255',
            'content_uz' => 'required|string',
            'content_ru' => 'nullable|string',
            'content_en' => 'nullable|string',
            'avatar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'rating' => 'integer|min:1|max:5',
            'order' => 'integer',
            'is_active' => 'boolean'
        ]);

        if ($request->hasFile('avatar')) {
            // Eski avatar faylini o'chirish
            if ($testimonial->avatar) {
                Storage::disk('public')->delete($testimonial->avatar);
            }
            $validated['avatar'] = $request->file('avatar')->store('avatars', 'public');
        }

        $testimonial->update($validated);
        
        return redirect()->route('admin.testimonials.index')
            ->with('success', 'Sharh muvaffaqiyatli yangilandi!');
    }

    public function destroy(Testimonial $testimonial)
    {
        if ($testimonial->avatar) {
            Storage::disk('public')->delete($testimonial->avatar);
        }
        
        $testimonial->delete();
        
        return redirect()->route('admin.testimonials.index')
            ->with('success', 'Sharh muvaffaqiyatli o\'chirildi!');
    }
}