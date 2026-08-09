<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\BridalPackage;
use App\Models\PortfolioItem;
use App\Models\Review;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $featuredServices = Service::where('is_featured', true)->take(6)->get();
        $bridalPackages = BridalPackage::all();
        $beforeAfterItems = PortfolioItem::whereNotNull('before_image_path')->get();
        $galleryCategories = ['Bridal Makeup', 'Party Makeup', 'Hair Styling', 'Nail Art', 'Facial', 'Salon', 'Before & After'];
        $portfolioItems = PortfolioItem::where('is_featured', true)->take(8)->get();
        $reviews = Review::where('is_featured', true)->get();

        return view('home', compact(
            'featuredServices',
            'bridalPackages',
            'beforeAfterItems',
            'galleryCategories',
            'portfolioItems',
            'reviews'
        ));
    }

    public function about()
    {
        $reviews = Review::all();
        return view('about', compact('reviews'));
    }

    public function artist()
    {
        return view('artist');
    }

    public function bridalMakeup()
    {
        $bridalServices = Service::where('category', 'Bridal Makeup')->get();
        $bridalPackages = BridalPackage::all();
        $preBridalServices = Service::where('category', 'Pre-Bridal Services')->get();
        $portfolioItems = PortfolioItem::where('category', 'Bridal Makeup')->get();

        return view('bridal-makeup', compact('bridalServices', 'bridalPackages', 'preBridalServices', 'portfolioItems'));
    }

    public function bridalPackages()
    {
        $bridalPackages = BridalPackage::all();
        $preBridalServices = Service::where('category', 'Pre-Bridal Services')->get();

        return view('bridal-packages', compact('bridalPackages', 'preBridalServices'));
    }

    public function gallery()
    {
        $categories = ['All', 'Bridal Makeup', 'Party Makeup', 'Hair Styling', 'Nail Art', 'Facial', 'Salon', 'Before & After'];
        $items = PortfolioItem::all();

        return view('gallery', compact('categories', 'items'));
    }

    public function testimonials()
    {
        $reviews = Review::all();
        return view('testimonials', compact('reviews'));
    }

    public function pricing()
    {
        $servicesGrouped = Service::all()->groupBy('category');
        $bridalPackages = BridalPackage::all();

        return view('pricing', compact('servicesGrouped', 'bridalPackages'));
    }

    public function contact()
    {
        return view('contact');
    }
}
