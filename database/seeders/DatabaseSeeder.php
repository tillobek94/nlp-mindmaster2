<?php
// database/seeders/DatabaseSeeder.php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Feature;
use App\Models\Testimonial;
use App\Models\Statistic;
use App\Models\Setting;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        // Features
        Feature::create([
            'icon' => 'fas fa-brain',
            'title_uz' => 'НейроТрансформация',
            'description_uz' => 'Миянинг пластик хусусиятидан фойдаланиб, янги ижобий хатти-ҳаракат шаблонларини шакллантириш.',
            'order' => 1,
            'is_active' => true
        ]);
        
        Feature::create([
            'icon' => 'fas fa-bullseye',
            'title_uz' => 'Мақсадга Йўналтирилганлик',
            'description_uz' => 'SMART методологияси асосида аник мақсадлар белгилаш ва уларга эришиш стратегиялари.',
            'order' => 2,
            'is_active' => true
        ]);
        
        Feature::create([
            'icon' => 'fas fa-heart',
            'title_uz' => 'Эмоционал Интеллект',
            'description_uz' => 'Ўз ҳис-туйғуларингизни тушуниш ва бошқариш, муносибатлар самарадорлигини ошириш.',
            'order' => 3,
            'is_active' => true
        ]);
        
        // Testimonials
        Testimonial::create([
            'author_name' => 'Сарвар Н.',
            'author_position' => 'IT Компания Раҳбари',
            'content_uz' => 'НЛП MindMaster дастури менинг ҳаётимни тубдан ўзгартирди. 20 йил давомидаги ишончсизлигим 3 ой ичида енгди.',
            'rating' => 5,
            'order' => 1,
            'is_active' => true
        ]);
        
        Testimonial::create([
            'author_name' => 'Дилора М.',
            'author_position' => 'Бизнес Консультант',
            'content_uz' => 'Кочинг сессиялари менга ўз касбий мақсадларимга эришишда нақадар кучли ёрдам берганига ишона олмайман.',
            'rating' => 5,
            'order' => 2,
            'is_active' => true
        ]);
        
        // Statistics
        Statistic::create([
            'number' => '95%',
            'title_uz' => 'Кафолатланган Натижа',
            'icon' => 'fas fa-check-circle',
            'color' => '#10b981',
            'order' => 1,
            'is_active' => true
        ]);
        
        Statistic::create([
            'number' => '5000+',
            'title_uz' => 'Маъкул Натижалар',
            'icon' => 'fas fa-users',
            'color' => '#6366f1',
            'order' => 2,
            'is_active' => true
        ]);
        
        // Settings
        $settings = [
            ['key' => 'site_name', 'value' => 'NLP MindMaster', 'type' => 'text', 'group' => 'general'],
            ['key' => 'site_email', 'value' => 'info@nlpmindmaster.uz', 'type' => 'email', 'group' => 'general'],
            ['key' => 'site_phone', 'value' => '+998 90 123 45 67', 'type' => 'text', 'group' => 'general'],
            ['key' => 'site_address', 'value' => 'Тошкент, Ўзбекистон', 'type' => 'text', 'group' => 'general'],
            ['key' => 'hero_title', 'value' => 'Онг Ости Дастурларингизни Янгидан Яратинг', 'type' => 'text', 'group' => 'content'],
            ['key' => 'hero_description', 'value' => 'НЛП ва коучинг технологиялари орқали ҳаётингизни рақамли трансформацияга олиб келинг.', 'type' => 'textarea', 'group' => 'content'],
        ];
        
        foreach ($settings as $setting) {
            Setting::create($setting);
        }
        
        // Create Admin User
        \App\Models\User::create([
            'name' => 'Admin',
            'email' => 'admin@nlpmindmaster.uz',
            'password' => Hash::make('admin123'),
        ]);
        // Pages
         Page::create([
    'slug' => 'about',
    'title_uz' => 'Biz haqimizda',
    'title_ru' => 'О нас',
    'title_en' => 'About Us',
    'content_uz' => 'NLP MindMaster - bu shaxsiy rivojlanish va NLP texnologiyalari bo\'yicha yetakchi platforma. Bizning maqsadimiz har bir insonga o\'z ichki salohiyatini ochishda yordam berish.',
    'content_ru' => 'NLP MindMaster - ведущая платформа по личностному развитию и NLP технологиям.',
    'content_en' => 'NLP MindMaster is a leading platform for personal development and NLP technologies.',
    'meta_title' => 'Biz haqimizda | NLP MindMaster',
    'meta_description' => 'NLP MindMaster haqida batafsil ma\'lumot. Bizning missiyamiz, vazifamiz va qadriyatlarimiz.',
    'meta_keywords' => 'npl, mindmaster, biz haqimizda, kompaniya, missiya',
    'is_active' => true,
    'order' => 1
]);
    }
}