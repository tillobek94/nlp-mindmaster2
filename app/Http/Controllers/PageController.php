<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index()
    {
        // Sizning haqiqiy front sahifangiz (front/index.blade.php) uchun
        // Database bo'lmasa ham ishlashi uchun dummy data
        $settings = collect([
            (object)['key' => 'site_name', 'value' => 'NLP MindMaster'],
            (object)['key' => 'site_email', 'value' => 'info@nlpmindmaster.uz'],
            (object)['key' => 'site_phone', 'value' => '+998785553007'],
            (object)['key' => 'site_address', 'value' => 'Toshkent, O\'zbekiston'],
            (object)['key' => 'hero_title', 'value' => 'Mедитация ва амалиётлар маркази'],
            (object)['key' => 'hero_description', 'value' => 'Бу - минглаб аёллар ва эркаклар ўзлари ҳамда бутун олам билан уйғунликни топа олган жой.'],
        ]);
        
        $statistics = collect([
            (object)['title_uz' => 'Ўкувчи', 'number' => '5000+'],
            (object)['title_uz' => 'Мамлакат', 'number' => '50+'],
            (object)['title_uz' => 'Ёкилғи', 'number' => '90%'],
            (object)['title_uz' => 'Тажриба', 'number' => '10+ йил'],
        ]);
        
        // Agar database bo'lsa, haqiqiy ma'lumotlarni olish
        try {
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
        
        try {
            if (class_exists('App\Models\Contact') && \Schema::hasTable('contacts')) {
                \App\Models\Contact::create([
                    'name' => $request->name,
                    'email' => $request->email,
                    'subject' => $request->subject,
                    'message' => $request->message,
                    'status' => 'new'
                ]);
            }
        } catch (\Exception $e) {
            // Xato bo'lsa ham davom etish
        }
        
        return back()->with('success', 'Xabaringiz qabul qilindi!');
    }
}
