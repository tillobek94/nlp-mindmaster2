<?php

namespace App\Http\Controllers;

use App\Models\Feature;
use App\Models\Testimonial;
use App\Models\Statistic;
use App\Models\Setting;
use App\Models\Page;
use App\Models\Contact; // Qo'shildi
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index()
    {
        $features = Feature::where('is_active', true)->orderBy('order')->get();
        $testimonials = Testimonial::where('is_active', true)->orderBy('order')->get();
        $statistics = Statistic::where('is_active', true)->orderBy('order')->get();
        $settings = Setting::all();
        
        return view('front.index', compact('features', 'testimonials', 'statistics', 'settings'));
    }

    // About sahifasi
    public function about()
    {
        // Database'dan about sahifasini olish
        $page = Page::where('slug', 'about')->where('is_active', true)->first();
        
        // Agar about sahifasi database'da bo'lmasa, default ma'lumotlar
        if (!$page) {
            $page = (object)[
                'title_uz' => 'Biz haqimizda',
                'title_ru' => 'О нас',
                'title_en' => 'About Us',
                'content_uz' => 'NLP MindMaster - bu shaxsiy rivojlanish va NLP texnologiyalari bo\'yicha yetakchi platforma.',
                'content_ru' => 'NLP MindMaster - ведущая платформа по личностному развитию и NLP технологиям.',
                'content_en' => 'NLP MindMaster is a leading platform for personal development and NLP technologies.',
                'image' => null
            ];
        }
        
        $settings = Setting::all();
        $features = Feature::where('is_active', true)->orderBy('order')->get();
        $team = []; // Kelajakda jamoa a'zolari uchun
        
        return view('front.about', compact('page', 'settings', 'features', 'team'));
    }

    // Contact sahifasi
    public function contact()
    {
        $settings = Setting::all();
        
        // Agar contact sahifasi database'da bo'lmasa, default
        $page = Page::where('slug', 'contact')->where('is_active', true)->first();
        
        if (!$page) {
            $page = (object)[
                'title_uz' => 'Bog\'lanish',
                'title_ru' => 'Контакты',
                'title_en' => 'Contact Us',
                'content_uz' => 'Biz bilan bog\'laning',
                'content_ru' => 'Свяжитесь с нами',
                'content_en' => 'Contact us',
                'image' => null
            ];
        }
        
        return view('front.contact', compact('page', 'settings'));
    }

    // Contact form yuborish
    public function contactStore(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:20',
            'subject' => 'required|string|max:255',
            'message' => 'required|string|min:10'
        ]);

        Contact::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'subject' => $request->subject,
            'message' => $request->message,
            'status' => 'new'
        ]);

        return redirect()->back()
            ->with('success', 'Xabaringiz muvaffaqiyatli yuborildi! Tez orada siz bilan bog\'lanamiz.');
    }
}