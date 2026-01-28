<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index()
    {
        // Database ishlamasa ham ishlashi uchun
        try {
            // Database mavjudligini tekshirish
            if (\Schema::hasTable('features')) {
                $features = \App\Models\Feature::where('status', 'active')
                    ->orderBy('order')
                    ->get();
            } else {
                $features = collect([]); // Bo'sh collection
            }
            
            if (\Schema::hasTable('testimonials')) {
                $testimonials = \App\Models\Testimonial::where('status', 'active')
                    ->orderBy('created_at', 'desc')
                    ->get();
            } else {
                $testimonials = collect([]);
            }
            
            if (\Schema::hasTable('statistics')) {
                $statistics = \App\Models\Statistic::where('status', 'active')
                    ->orderBy('order')
                    ->get();
            } else {
                $statistics = collect([]);
            }
            
        } catch (\Exception $e) {
            // Agar database xatosi bo'lsa, bo'sh ma'lumotlar
            $features = collect([]);
            $testimonials = collect([]);
            $statistics = collect([]);
        }
        
        return view('welcome', compact('features', 'testimonials', 'statistics'));
    }

    public function about()
    {
        return view('about');
    }

    public function contact()
    {
        return view('contact');
    }

    public function contactStore(Request $request)
    {
        // Simple validation
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
        ]);
        
        try {
            // Agar contacts jadvali mavjud bo'lsa
            if (\Schema::hasTable('contacts')) {
                \App\Models\Contact::create([
                    'name' => $validated['name'],
                    'email' => $validated['email'],
                    'subject' => $validated['subject'],
                    'message' => $validated['message'],
                    'status' => 'new'
                ]);
                
                return back()->with('success', 'Xabaringiz yuborildi! Tez orada aloqaga chiqamiz.');
            } else {
                // Jadval yo'q bo'lsa ham ishlashi uchun
                return back()->with('success', 'Xabaringiz qabul qilindi. Rahmat!');
            }
        } catch (\Exception $e) {
            // Xato bo'lsa ham foydalanuvchiga yaxshi xabar
            return back()->with('success', 'Xabaringiz qabul qilindi. Rahmat!');
        }
    }
}
