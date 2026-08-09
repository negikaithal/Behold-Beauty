<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\BridalPackage;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function index()
    {
        $categories = [
            'Hair Services',
            'Facial & Skin Care',
            'Threading',
            'Waxing',
            'Manicure & Pedicure',
            'Bridal Makeup',
            'Party & Occasion Makeup',
            'Special Makeup',
            'Pre-Bridal Services',
            'Additional Services'
        ];

        $servicesGrouped = Service::all()->groupBy('category');
        $bridalPackages = BridalPackage::all();

        return view('services.index', compact('categories', 'servicesGrouped', 'bridalPackages'));
    }

    public function show($slug)
    {
        $service = Service::where('slug', $slug)->firstOrFail();
        $relatedServices = Service::where('category', $service->category)
            ->where('id', '!=', $service->id)
            ->take(4)
            ->get();

        return view('services.show', compact('service', 'relatedServices'));
    }
}
