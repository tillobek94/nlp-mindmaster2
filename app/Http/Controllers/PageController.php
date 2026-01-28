<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Setting;

class PageController extends Controller
{
    public function index()
    {
        try {
            // Database ishlamasa ham ishlashi uchun
            if (class_exists('App\Models\Setting')) {
                $settings = Setting::all();
            } else {
                $settings = collect([]);
            }
            
            if (class_exists('App\Models\Feature') && \Schema::hasTable('features')) {
                $features = \App\Models\Feature::where('status', 'active')->orderBy('order')->get();
            } else {
                $features = collect([]);
            }
            
            if (class_exists('App\Models\Testimonial') && \Schema::hasTable('testimonials')) {
                $testimonials = \App\Models\Testimonial::where('status', 'active')->orderBy('created_at', 'desc')->get();
            } else {
                $testimonials = collect([]);
            }
            
            if (class_exists('App\Models\Statistic') && \Schema::hasTable('statistics')) {
                $statistics = \App\Models\Statistic::where('status', 'active')->orderBy('order')->get();
            } else {
                $statistics = collect([]);
            }
            
        } catch (\Exception $e) {
            $settings = collect([]);
            $features = collect([]);
            $testimonials = collect([]);
            $statistics = collect([]);
        }
        
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
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
        ]);
        
        return back()->with('success', 'Xabaringiz qabul qilindi. Rahmat!');
    }
}
