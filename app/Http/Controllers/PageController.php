<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index()
    {
        // Settings - dummy data
        $settings = collect([
            (object)['key' => 'site_name', 'value' => 'NLP MindMaster'],
            (object)['key' => 'site_email', 'value' => 'info@nlpmindmaster.uz'],
            (object)['key' => 'site_phone', 'value' => '+998785553007'],
            (object)['key' => 'site_address', 'value' => 'Toshkent, O\'zbekiston'],
            (object)['key' => 'hero_title', 'value' => 'Медитация ва амалиётлар маркази'],
            (object)['key' => 'hero_description', 'value' => 'Бу - минглаб аёллар ва эркаклар ўзлари ҳамда бутун олам билан уйғунликни топа олган жой. Балансни, энергиянгизни ва ичингиздаги бойликни топинг. Ички салоҳиятингизни очинг ва истиқболингизни яратинг.'],
        ]);
        
        // Statistics - dummy data
        $statistics = collect([
            (object)['title_uz' => 'Ўкувчи', 'number' => '5000+', 'color' => '#6366f1'],
            (object)['title_uz' => 'Мамлакат', 'number' => '50+', 'color' => '#8b5cf6'],
            (object)['title_uz' => 'Ёкилғи', 'number' => '90%', 'color' => '#ec4899'],
            (object)['title_uz' => 'Тажриба', 'number' => '10+ йил', 'color' => '#f59e0b'],
        ]);
        
        // Features - agar database bo'lsa, haqiqiy ma'lumot
        try {
            if (class_exists('App\Models\Feature') && \Schema::hasTable('features')) {
                $features = \App\Models\Feature::where('status', 'active')->orderBy('order')->get();
            } else {
                $features = collect([
                    (object)[
                        'title_uz' => 'НЛП Технологиялари', 
                        'description_uz' => 'Илмий асосланган нейролингвистик дастурлаш техникалари',
                        'icon' => 'fas fa-brain'
                    ],
                    (object)[
                        'title_uz' => 'Шахсий Ёндашув', 
                        'description_uz' => 'Ҳар бир ўкувчи учун алоҳида ишланган дастур',
                        'icon' => 'fas fa-user-graduate'
                    ],
                    (object)[
                        'title_uz' => 'Натижадорлик', 
                        'description_uz' => '90% ёкилғи билан исботланган методлар',
                        'icon' => 'fas fa-chart-line'
                    ]
                ]);
            }
            
            // Testimonials
            if (class_exists('App\Models\Testimonial') && \Schema::hasTable('testimonials')) {
                $testimonials = \App\Models\Testimonial::where('status', 'active')->orderBy('created_at', 'desc')->get();
            } else {
                $testimonials = collect([
                    (object)[
                        'author_name' => 'Sarvar',
                        'author_position' => 'IT Menejeri',
                        'content_uz' => 'Bu kurs mening hayotimni butunlay o\'zgartirdi. Endi o\'zimga ishonch hosil qildim va kariyeramda muvaffaqiyatga erishdim.',
                        'rating' => 5
                    ]
                ]);
            }
            
        } catch (\Exception $e) {
            $features = collect([]);
            $testimonials = collect([]);
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
        
        return back()->with('success', 'Xabaringiz qabul qilindi!');
    }
}