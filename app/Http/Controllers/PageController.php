<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Setting;

class PageController extends Controller
{
    public function index()
    {
        // Database ishlamasa ham ishlashi uchun
        try {
            // Database connection borligini tekshirish
            \DB::connection()->getPdo();
            
            // Settings
            $settings = Setting::all();
            
            // Features
            if (\Schema::hasTable('features')) {
                $features = \App\Models\Feature::where('status', 'active')
                    ->orderBy('order')
                    ->get();
            } else {
                $features = collect([]);
            }
            
            // Testimonials
            if (\Schema::hasTable('testimonials')) {
                $testimonials = \App\Models\Testimonial::where('status', 'active')
                    ->orderBy('created_at', 'desc')
                    ->get();
            } else {
                $testimonials = collect([]);
            }
            
            // Statistics
            if (\Schema::hasTable('statistics')) {
                $statistics = \App\Models\Statistic::where('status', 'active')
                    ->orderBy('order')
                    ->get();
            } else {
                $statistics = collect([]);
            }
            
        } catch (\Exception $e) {
            // Agar database xatosi bo'lsa, bo'sh ma'lumotlar
            $settings = collect([]);
            $features = collect([]);
            $testimonials = collect([]);
            $statistics = collect([]);
        }
        
        // FRONT INDEX sahifasini ko'rsatish
        return view('front.index', compact('settings', 'features', 'testimonials', 'statistics'));
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
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
        ]);
        
        try {
            // Database ishlasa saqlash
            \DB::connection()->getPdo();
            \App\Models\Contact::create([
                'name' => $validated['name'],
                'email' => $validated['email'],
                'subject' => $validated['subject'],
                'message' => $validated['message'],
                'status' => 'new'
            ]);
            
            return back()->with('success', 'Xabaringiz yuborildi! Tez orada aloqaga chiqamiz.');
        } catch (\Exception $e) {
            // Database ishlamasa ham form ishlashi uchun
            return back()->with('success', 'Xabaringiz qabul qilindi. Rahmat!');
        }
    }
}
