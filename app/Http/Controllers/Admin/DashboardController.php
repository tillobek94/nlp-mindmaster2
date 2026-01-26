<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Feature;
use App\Models\Testimonial;
use App\Models\Statistic;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'features_count' => Feature::count(),
            'testimonials_count' => Testimonial::where('is_active', true)->count(),
            'statistics_count' => Statistic::where('is_active', true)->count(),
            'active_features' => Feature::where('is_active', true)->count()
        ];
        
        return view('admin.dashboard', compact('stats'));
    }
}