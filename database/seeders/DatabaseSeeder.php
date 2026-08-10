<?php

namespace Database\Seeders;

use App\Models\Service;
use App\Models\BridalPackage;
use App\Models\PortfolioItem;
use App\Models\Review;
use App\Models\Booking;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // 1. SEED SERVICES
        $services = [
            // Hair Services
            ['name' => 'Haircut & Styling', 'category' => 'Hair Services', 'subcategory' => 'Styling & Cut', 'price' => 800, 'duration' => '45 mins', 'description' => 'Precision cut tailored to your face shape, followed by luxury blow-dry styling.'],
            ['name' => 'Hair Wash & Blow Dry', 'category' => 'Hair Services', 'subcategory' => 'Styling & Cut', 'price' => 500, 'duration' => '30 mins', 'description' => 'Deep conditioning hair wash with relaxing scalp massage and sleek blow dry.'],
            ['name' => 'Hair Spa', 'category' => 'Hair Services', 'subcategory' => 'Treatments', 'price' => 1500, 'duration' => '60 mins', 'description' => 'Nourishing cream hair mask, steam treatment, and invigorating massage.'],
            ['name' => 'Hair Straightening', 'category' => 'Hair Services', 'subcategory' => 'Treatments', 'price' => 4500, 'duration' => '150 mins', 'description' => 'Permanent straightening for sleek, frizz-free hair.'],
            ['name' => 'Hair Smoothening', 'category' => 'Hair Services', 'subcategory' => 'Treatments', 'price' => 5000, 'duration' => '180 mins', 'description' => 'Smooths texture and adds mirror shine while retaining natural bounce.'],
            ['name' => 'Keratin Treatment', 'category' => 'Hair Services', 'subcategory' => 'Treatments', 'price' => 6500, 'duration' => '180 mins', 'description' => 'Intense protein rebuild treatment for silky, manageable hair up to 5 months.'],
            ['name' => 'Hair Rebonding', 'category' => 'Hair Services', 'subcategory' => 'Treatments', 'price' => 6000, 'duration' => '210 mins', 'description' => 'Ultra-straightening rebonding treatment for resistant textures.'],
            ['name' => 'Hair Coloring', 'category' => 'Hair Services', 'subcategory' => 'Coloring', 'price' => 2500, 'duration' => '90 mins', 'description' => 'Rich vibrant hair shades using ammonia-free luxury color products.'],
            ['name' => 'Global Hair Color', 'category' => 'Hair Services', 'subcategory' => 'Coloring', 'price' => 3500, 'duration' => '120 mins', 'description' => 'Full length global tone coverage with multi-dimensional shine.'],
            ['name' => 'Highlights & Lowlights', 'category' => 'Hair Services', 'subcategory' => 'Coloring', 'price' => 4000, 'duration' => '120 mins', 'description' => 'Dimensional foil highlights customized to complement skin undertones.'],
            ['name' => 'Root Touch-Up', 'category' => 'Hair Services', 'subcategory' => 'Coloring', 'price' => 1200, 'duration' => '45 mins', 'description' => 'Grey coverage root touch-up with seamless color blending.'],
            ['name' => 'Balayage', 'category' => 'Hair Services', 'subcategory' => 'Coloring', 'price' => 6500, 'duration' => '180 mins', 'description' => 'Hand-painted sun-kissed gradient color transition.'],
            ['name' => 'Hair Extensions', 'category' => 'Hair Services', 'subcategory' => 'Extensions', 'price' => 8000, 'duration' => '120 mins', 'description' => '100% Remy human hair volume and length extensions.'],
            ['name' => 'Bridal Hair Styling', 'category' => 'Hair Services', 'subcategory' => 'Bridal', 'price' => 3500, 'duration' => '90 mins', 'description' => 'Intricate bridal bun, floral adornments, and veil fixing.'],
            ['name' => 'Party Hair Styling', 'category' => 'Hair Services', 'subcategory' => 'Styling & Cut', 'price' => 1800, 'duration' => '45 mins', 'description' => 'Hollywood waves, chic updos, or trendy braids for special occasions.'],

            // Facial & Skin Care
            ['name' => 'Basic Facial', 'category' => 'Facial & Skin Care', 'subcategory' => 'Facials', 'price' => 1200, 'duration' => '45 mins', 'description' => 'Cleansing, gentle exfoliation, steam, and soothing hydration mask.'],
            ['name' => 'Cleanup', 'category' => 'Facial & Skin Care', 'subcategory' => 'Facials', 'price' => 800, 'duration' => '30 mins', 'description' => 'Quick pore unclogging, blackhead removal, and soothing skin mist.'],
            ['name' => 'Deep Cleansing Facial', 'category' => 'Facial & Skin Care', 'subcategory' => 'Facials', 'price' => 1800, 'duration' => '60 mins', 'description' => 'Vacuum pore extraction, detoxifying clay mask, and serum boost.'],
            ['name' => 'Gold Facial', 'category' => 'Facial & Skin Care', 'subcategory' => 'Luxury Facials', 'price' => 2800, 'duration' => '75 mins', 'description' => '24K gold foil infused facial for opulent bridal radiance and glow.'],
            ['name' => 'Diamond Facial', 'category' => 'Facial & Skin Care', 'subcategory' => 'Luxury Facials', 'price' => 3500, 'duration' => '75 mins', 'description' => 'Diamond ash exfoliation and brightness infusion for crystal clear skin.'],
            ['name' => 'Pearl Facial', 'category' => 'Facial & Skin Care', 'subcategory' => 'Luxury Facials', 'price' => 2500, 'duration' => '60 mins', 'description' => 'Natural pearl dust treatment for fair tone and pearl illumination.'],
            ['name' => 'Fruit Facial', 'category' => 'Facial & Skin Care', 'subcategory' => 'Organic', 'price' => 1500, 'duration' => '60 mins', 'description' => 'Organic fresh fruit enzymes to refresh sensitive skin naturally.'],
            ['name' => 'Hydrating Facial', 'category' => 'Facial & Skin Care', 'subcategory' => 'Facials', 'price' => 2200, 'duration' => '60 mins', 'description' => 'Hyaluronic acid deep moisture surge treatment.'],
            ['name' => 'Anti-Aging Facial', 'category' => 'Facial & Skin Care', 'subcategory' => 'Specialized', 'price' => 3200, 'duration' => '75 mins', 'description' => 'Collagen firming massage and peptide lifting treatment.'],
            ['name' => 'Acne Treatment Facial', 'category' => 'Facial & Skin Care', 'subcategory' => 'Specialized', 'price' => 2000, 'duration' => '60 mins', 'description' => 'Salicylic soothing facial with blue light therapy to calm breakouts.'],
            ['name' => 'De-Tan Facial', 'category' => 'Facial & Skin Care', 'subcategory' => 'De-Tan', 'price' => 1800, 'duration' => '60 mins', 'description' => 'Removes sun tan and restores natural skin tone evenly.'],
            ['name' => 'Brightening Facial', 'category' => 'Facial & Skin Care', 'subcategory' => 'Specialized', 'price' => 2600, 'duration' => '60 mins', 'description' => 'Vitamin C glow boost for uneven pigmentation and spots.'],
            ['name' => 'Skin Polishing', 'category' => 'Facial & Skin Care', 'subcategory' => 'Specialized', 'price' => 3000, 'duration' => '60 mins', 'description' => 'Microdermabrasion resurfacing for satin-smooth porcelain skin.'],
            ['name' => 'Bleach', 'category' => 'Facial & Skin Care', 'subcategory' => 'Bleach & Tan', 'price' => 450, 'duration' => '20 mins', 'description' => 'Gentle herbal face bleaching.'],
            ['name' => 'De-Tan Treatment', 'category' => 'Facial & Skin Care', 'subcategory' => 'Bleach & Tan', 'price' => 750, 'duration' => '30 mins', 'description' => 'O3+ de-tan pack application for instant brightness.'],

            // Threading
            ['name' => 'Eyebrow Threading', 'category' => 'Threading', 'subcategory' => 'Face Threading', 'price' => 80, 'duration' => '10 mins', 'description' => 'Precise brow shaping to accent your eyes.'],
            ['name' => 'Upper Lip', 'category' => 'Threading', 'subcategory' => 'Face Threading', 'price' => 50, 'duration' => '5 mins', 'description' => 'Gentle upper lip hair removal.'],
            ['name' => 'Lower Lip', 'category' => 'Threading', 'subcategory' => 'Face Threading', 'price' => 40, 'duration' => '5 mins', 'description' => 'Lower lip hair threading.'],
            ['name' => 'Forehead', 'category' => 'Threading', 'subcategory' => 'Face Threading', 'price' => 60, 'duration' => '10 mins', 'description' => 'Clean forehead hairline threading.'],
            ['name' => 'Full Face Threading', 'category' => 'Threading', 'subcategory' => 'Face Threading', 'price' => 350, 'duration' => '25 mins', 'description' => 'Complete face hair removal for smooth makeup application.'],
            ['name' => 'Chin Threading', 'category' => 'Threading', 'subcategory' => 'Face Threading', 'price' => 60, 'duration' => '5 mins', 'description' => 'Targeted chin hair threading.'],

            // Waxing
            ['name' => 'Full Arms', 'category' => 'Waxing', 'subcategory' => 'Body Waxing', 'price' => 450, 'duration' => '20 mins', 'description' => 'Smooth full arm hair removal.'],
            ['name' => 'Half Arms', 'category' => 'Waxing', 'subcategory' => 'Body Waxing', 'price' => 300, 'duration' => '15 mins', 'description' => 'Forearm waxing treatment.'],
            ['name' => 'Full Legs', 'category' => 'Waxing', 'subcategory' => 'Body Waxing', 'price' => 700, 'duration' => '30 mins', 'description' => 'Full leg waxing.'],
            ['name' => 'Half Legs', 'category' => 'Waxing', 'subcategory' => 'Body Waxing', 'price' => 450, 'duration' => '20 mins', 'description' => 'Half leg waxing.'],
            ['name' => 'Underarms', 'category' => 'Waxing', 'subcategory' => 'Body Waxing', 'price' => 150, 'duration' => '10 mins', 'description' => 'Gentle underarm waxing.'],
            ['name' => 'Full Body Waxing', 'category' => 'Waxing', 'subcategory' => 'Body Waxing', 'price' => 2500, 'duration' => '90 mins', 'description' => 'Head-to-toe full body hair removal with soothing oil.'],
            ['name' => 'Bikini Waxing', 'category' => 'Waxing', 'subcategory' => 'Specialized Waxing', 'price' => 1200, 'duration' => '30 mins', 'description' => 'Hygienic and comfortable bikini line waxing.'],
            ['name' => 'Back Waxing', 'category' => 'Waxing', 'subcategory' => 'Body Waxing', 'price' => 600, 'duration' => '20 mins', 'description' => 'Full back waxing.'],
            ['name' => 'Stomach Waxing', 'category' => 'Waxing', 'subcategory' => 'Body Waxing', 'price' => 500, 'duration' => '20 mins', 'description' => 'Stomach area waxing.'],
            ['name' => 'Chocolate Waxing', 'category' => 'Waxing', 'subcategory' => 'Flavored Wax', 'price' => 900, 'duration' => '45 mins', 'description' => 'Aromatic chocolate wax for less pain and hydrated skin.'],
            ['name' => 'Rica Waxing', 'category' => 'Waxing', 'subcategory' => 'Flavored Wax', 'price' => 1400, 'duration' => '45 mins', 'description' => 'Italian liposoluble Rica wax for sensitive skin without redness.'],

            // Manicure & Pedicure
            ['name' => 'Basic Manicure', 'category' => 'Manicure & Pedicure', 'subcategory' => 'Nails', 'price' => 600, 'duration' => '30 mins', 'description' => 'Nail shaping, cuticle care, hand massage, and polish.'],
            ['name' => 'Spa Manicure', 'category' => 'Manicure & Pedicure', 'subcategory' => 'Nails', 'price' => 1100, 'duration' => '50 mins', 'description' => 'Exfoliating scrub, hydrating mask, warm towel wrap, and massage.'],
            ['name' => 'Gel Manicure', 'category' => 'Manicure & Pedicure', 'subcategory' => 'Nails', 'price' => 1400, 'duration' => '60 mins', 'description' => 'Long-lasting high shine gel polish cured under UV LED.'],
            ['name' => 'French Manicure', 'category' => 'Manicure & Pedicure', 'subcategory' => 'Nails', 'price' => 900, 'duration' => '45 mins', 'description' => 'Classic timeless white tip French manicure.'],
            ['name' => 'Basic Pedicure', 'category' => 'Manicure & Pedicure', 'subcategory' => 'Pedicure', 'price' => 800, 'duration' => '40 mins', 'description' => 'Foot soak, heel scrubbing, nail clipping, and polish.'],
            ['name' => 'Spa Pedicure', 'category' => 'Manicure & Pedicure', 'subcategory' => 'Pedicure', 'price' => 1400, 'duration' => '60 mins', 'description' => 'Bubble foot bath, dead skin removal, massage, and hydrating pack.'],
            ['name' => 'Gel Pedicure', 'category' => 'Manicure & Pedicure', 'subcategory' => 'Pedicure', 'price' => 1700, 'duration' => '60 mins', 'description' => 'Pedicure finished with chip-resistant gel enamel.'],
            ['name' => 'Foot Spa', 'category' => 'Manicure & Pedicure', 'subcategory' => 'Pedicure', 'price' => 1200, 'duration' => '45 mins', 'description' => 'Relaxing herbal foot bath and reflexology pressure massage.'],
            ['name' => 'Nail Shaping', 'category' => 'Manicure & Pedicure', 'subcategory' => 'Nails', 'price' => 200, 'duration' => '15 mins', 'description' => 'Quick nail trimming, filing, and buffering.'],
            ['name' => 'Nail Art', 'category' => 'Manicure & Pedicure', 'subcategory' => 'Nail Art', 'price' => 800, 'duration' => '30 mins', 'description' => 'Handcrafted designer nail art, glitters, and embellishments.'],

            // Bridal Makeup
            ['name' => 'Bridal Makeup', 'category' => 'Bridal Makeup', 'subcategory' => 'Bridal', 'price' => 15000, 'duration' => '180 mins', 'description' => 'Traditional wedding bridal makeover with flawless finish.'],
            ['name' => 'HD Bridal Makeup', 'category' => 'Bridal Makeup', 'subcategory' => 'Bridal', 'price' => 22000, 'duration' => '210 mins', 'description' => 'High-Definition camera-ready makeup using top international brands.'],
            ['name' => 'Airbrush Bridal Makeup', 'category' => 'Bridal Makeup', 'subcategory' => 'Bridal', 'price' => 28000, 'duration' => '210 mins', 'description' => 'Weightless silicon airbrush base for 24-hour waterproof perfection.'],
            ['name' => 'Engagement Makeup', 'category' => 'Bridal Makeup', 'subcategory' => 'Pre-Wedding', 'price' => 10000, 'duration' => '120 mins', 'description' => 'Radiant engagement glow look matching your ring ceremony outfit.'],
            ['name' => 'Reception Makeup', 'category' => 'Bridal Makeup', 'subcategory' => 'Pre-Wedding', 'price' => 12000, 'duration' => '150 mins', 'description' => 'Glamorous evening look for grand wedding reception.'],
            ['name' => 'Bridal Hairstyling', 'category' => 'Bridal Makeup', 'subcategory' => 'Bridal', 'price' => 4000, 'duration' => '90 mins', 'description' => 'Grand bridal hair structure, extensions, and floral arrangement.'],
            ['name' => 'Bridal Draping', 'category' => 'Bridal Makeup', 'subcategory' => 'Bridal', 'price' => 1500, 'duration' => '30 mins', 'description' => 'Flawless Saree, Lehenga, or Dupatta draping and pleating.'],
            ['name' => 'Bridal Makeup Trial', 'category' => 'Bridal Makeup', 'subcategory' => 'Bridal', 'price' => 3000, 'duration' => '90 mins', 'description' => 'Consultation and mini makeup trial to finalize your dream wedding look.'],

            // Party & Occasion Makeup
            ['name' => 'Party Makeup', 'category' => 'Party & Occasion Makeup', 'subcategory' => 'Party', 'price' => 3500, 'duration' => '60 mins', 'description' => 'Chic makeup styling for weddings, sangeet, or anniversaries.'],
            ['name' => 'Reception Makeup', 'category' => 'Party & Occasion Makeup', 'subcategory' => 'Party', 'price' => 8000, 'duration' => '90 mins', 'description' => 'Sophisticated evening glam for guests and family.'],
            ['name' => 'Engagement Makeup', 'category' => 'Party & Occasion Makeup', 'subcategory' => 'Party', 'price' => 8000, 'duration' => '90 mins', 'description' => 'Soft glam look for sister or relative engagement functions.'],
            ['name' => 'Cocktail Makeup', 'category' => 'Party & Occasion Makeup', 'subcategory' => 'Party', 'price' => 4500, 'duration' => '60 mins', 'description' => 'Bold evening eyes and bronzed glamour for cocktail nights.'],
            ['name' => 'Birthday Makeup', 'category' => 'Party & Occasion Makeup', 'subcategory' => 'Party', 'price' => 3000, 'duration' => '60 mins', 'description' => 'Fresh glowing birthday makeover.'],
            ['name' => 'Photoshoot Makeup', 'category' => 'Party & Occasion Makeup', 'subcategory' => 'Editorial', 'price' => 6000, 'duration' => '90 mins', 'description' => 'Matte HD camera-friendly makeup for portfolio photoshoots.'],
            ['name' => 'Fashion Makeup', 'category' => 'Party & Occasion Makeup', 'subcategory' => 'Editorial', 'price' => 7000, 'duration' => '90 mins', 'description' => 'Runway and high-fashion conceptual makeup.'],
            ['name' => 'Pre-Wedding Makeup', 'category' => 'Party & Occasion Makeup', 'subcategory' => 'Pre-Wedding', 'price' => 9000, 'duration' => '120 mins', 'description' => 'Dual look makeup for outdoor pre-wedding shoot.'],

            // Special Makeup
            ['name' => 'Natural Makeup', 'category' => 'Special Makeup', 'subcategory' => 'Styles', 'price' => 2500, 'duration' => '45 mins', 'description' => 'No-makeup makeup look enhancing your natural features.'],
            ['name' => 'Glam Makeup', 'category' => 'Special Makeup', 'subcategory' => 'Styles', 'price' => 4500, 'duration' => '75 mins', 'description' => 'Full glam with cut crease eyes and bold lip.'],
            ['name' => 'HD Makeup', 'category' => 'Special Makeup', 'subcategory' => 'Techniques', 'price' => 5000, 'duration' => '75 mins', 'description' => 'High definition finish for flawless photography.'],
            ['name' => 'Airbrush Makeup', 'category' => 'Special Makeup', 'subcategory' => 'Techniques', 'price' => 7000, 'duration' => '90 mins', 'description' => 'Spray airbrush foundation for featherlight velvet skin.'],
            ['name' => 'Celebrity-Inspired Makeup', 'category' => 'Special Makeup', 'subcategory' => 'Styles', 'price' => 6000, 'duration' => '90 mins', 'description' => 'Recreation of iconic celebrity red carpet makeup looks.'],
            ['name' => 'Traditional Makeup', 'category' => 'Special Makeup', 'subcategory' => 'Styles', 'price' => 4000, 'duration' => '60 mins', 'description' => 'Classic Indian traditional look with bindi and kajal accent.'],
            ['name' => 'Contemporary Makeup', 'category' => 'Special Makeup', 'subcategory' => 'Styles', 'price' => 4500, 'duration' => '60 mins', 'description' => 'Modern dewy skin with pastel eye palette.'],
            ['name' => 'Nude Makeup', 'category' => 'Special Makeup', 'subcategory' => 'Styles', 'price' => 3000, 'duration' => '45 mins', 'description' => 'Earthy nude tones and sculpted cheekbones.'],
            ['name' => 'Eye Makeup', 'category' => 'Special Makeup', 'subcategory' => 'Targeted', 'price' => 1500, 'duration' => '30 mins', 'description' => 'Express eye makeup focus only with falsies.'],
            ['name' => 'Smokey Eye Makeup', 'category' => 'Special Makeup', 'subcategory' => 'Targeted', 'price' => 2000, 'duration' => '35 mins', 'description' => 'Intense charcoal or glitter smokey eye artistry.'],

            // Pre-Bridal Services
            ['name' => 'Pre-Bridal Facial', 'category' => 'Pre-Bridal Services', 'subcategory' => 'Pre-Bridal', 'price' => 3500, 'duration' => '90 mins', 'description' => 'Multi-step brightening and skin tightening treatment.'],
            ['name' => 'Body Polishing', 'category' => 'Pre-Bridal Services', 'subcategory' => 'Pre-Bridal', 'price' => 4500, 'duration' => '120 mins', 'description' => 'Full body scrub, moisturizing body wrap, and essential oil massage.'],
            ['name' => 'Skin Hydration', 'category' => 'Pre-Bridal Services', 'subcategory' => 'Pre-Bridal', 'price' => 2500, 'duration' => '60 mins', 'description' => 'Intense hydration infusion for radiant bridal texture.'],
            ['name' => 'Nail Care', 'category' => 'Pre-Bridal Services', 'subcategory' => 'Pre-Bridal', 'price' => 1500, 'duration' => '45 mins', 'description' => 'Pre-bridal nail strengthening and cuticle oil therapy.'],

            // Additional Services
            ['name' => 'Saree Draping', 'category' => 'Additional Services', 'subcategory' => 'Draping', 'price' => 600, 'duration' => '20 mins', 'description' => 'Custom saree pleating (Nivi, Bengali, Gujarati style).'],
            ['name' => 'Bridal Dupatta Draping', 'category' => 'Additional Services', 'subcategory' => 'Draping', 'price' => 800, 'duration' => '20 mins', 'description' => 'Royal double dupatta pinning for brides.'],
            ['name' => 'False Eyelashes', 'category' => 'Additional Services', 'subcategory' => 'Addons', 'price' => 500, 'duration' => '10 mins', 'description' => 'Premium mink 3D false eyelash application.'],
            ['name' => 'Nail Extensions', 'category' => 'Additional Services', 'subcategory' => 'Nails', 'price' => 2500, 'duration' => '90 mins', 'description' => 'Acrylic or Gel nail extensions with length choices.'],
            ['name' => 'Mehndi / Bridal Mehndi', 'category' => 'Additional Services', 'subcategory' => 'Mehndi', 'price' => 8000, 'duration' => '240 mins', 'description' => 'Intricate traditional bridal henna design up to elbows and feet.'],
            ['name' => 'Eyelash Extensions', 'category' => 'Additional Services', 'subcategory' => 'Addons', 'price' => 3500, 'duration' => '120 mins', 'description' => 'Semi-permanent lash by lash extension set.'],
            ['name' => 'Eyebrow Shaping', 'category' => 'Additional Services', 'subcategory' => 'Brows', 'price' => 150, 'duration' => '15 mins', 'description' => 'Precision micro-tweezing and brow tinting.'],
            ['name' => 'Beauty Consultation', 'category' => 'Additional Services', 'subcategory' => 'Consultation', 'price' => 0, 'duration' => '30 mins', 'description' => 'Free 1-on-1 skin evaluation and bridal timeline planning.'],
            ['name' => 'Makeup Consultation', 'category' => 'Additional Services', 'subcategory' => 'Consultation', 'price' => 0, 'duration' => '30 mins', 'description' => 'Personalized makeover consultation and shade matching.'],
        ];

        foreach ($services as $srv) {
            Service::create([
                'name' => $srv['name'],
                'slug' => Str::slug($srv['name'] . '-' . $srv['category']),
                'category' => $srv['category'],
                'subcategory' => $srv['subcategory'] ?? null,
                'price' => $srv['price'],
                'duration' => $srv['duration'],
                'description' => $srv['description'],
                'features' => [
                    'Personalized skin consultation',
                    'Premium imported product range',
                    'Hygiene & sanitized tools guaranteed'
                ],
                'image_path' => 'images/salon_interior.jpg',
                'is_featured' => in_array($srv['name'], ['HD Bridal Makeup', 'Keratin Treatment', 'Gold Facial', 'Gel Manicure', 'Party Makeup']),
            ]);
        }

        // 2. SEED BRIDAL PACKAGES
        BridalPackage::create([
            'name' => 'Silver Bridal Package',
            'badge' => 'Classic Choice',
            'price' => 18999,
            'tagline' => 'Essential bridal glow and styling for your special day',
            'features' => [
                'Bridal Makeup (Classic HD)',
                'Hair Styling & Hair Extensions',
                'Basic Facial Treatment',
                'Eyebrow & Upper Lip Threading',
                'Bridal Draping (Lehenga/Saree)',
                'Touch-up Kit Included'
            ],
            'is_popular' => false,
        ]);

        BridalPackage::create([
            'name' => 'Gold Bridal Package',
            'badge' => 'Most Popular',
            'price' => 28999,
            'tagline' => 'Comprehensive makeover with complete nail & skin pampering',
            'features' => [
                'HD Bridal Makeup with Airbrush Accent',
                'Custom Bridal Hair Styling & Fresh Flowers',
                'Luxury Gold / Diamond Facial',
                'Spa Manicure & Spa Pedicure',
                'Rica Full Body Waxing',
                'Eyebrow & Upper Lip Threading',
                'Royal Bridal Draping (Double Dupatta)',
                '3D Mink Eyelashes & Brow Styling'
            ],
            'is_popular' => true,
        ]);

        BridalPackage::create([
            'name' => 'Premium Bridal Package',
            'badge' => 'Ultimate Luxury',
            'price' => 42999,
            'tagline' => 'The ultimate VIP pre-bridal and wedding day experience',
            'features' => [
                'HD / Silicon Airbrush Bridal Makeup',
                'Full Makeup & Hair Trial Session',
                'Couture Hair Styling & Extensions',
                'Royal Bridal Draping & Pleating',
                'Pre-Bridal Gold Skin Polishing Facial',
                'Full Body Waxing & Body Polishing Scrub',
                'Gel Manicure & Gel Pedicure with Designer Nail Art',
                'Eyelash Extensions & Eyebrow Tinting',
                'Eyebrow & Full Face Threading',
                'Complete Pre-Bridal Skin Care Routine'
            ],
            'is_popular' => false,
        ]);

        // 3. SEED PORTFOLIO ITEMS
        $portfolioItems = [
            [
                'title' => 'Royal Heritage Indian Bride',
                'category' => 'Bridal Makeup',
                'image_path' => 'images/hero_bridal_beauty.jpg',
                'before_image_path' => 'images/before_bare.jpg',
                'client_name' => 'Ananya Sharma',
                'description' => 'Traditional crimson lehenga with warm champagne gold eye shadow and velvet nude lips.',
                'is_featured' => true,
            ],
            [
                'title' => 'Radiant Bare to Glam Transformation',
                'category' => 'Before & After',
                'image_path' => 'images/after_glam.jpg',
                'before_image_path' => 'images/before_bare.jpg',
                'client_name' => 'Priya Patel',
                'description' => 'Complete skin correction, brow sculpting, and HD airbrush bridal foundation.',
                'is_featured' => true,
            ],
            [
                'title' => 'Sangeet Evening Soft Glam',
                'category' => 'Party Makeup',
                'image_path' => 'images/artist_portrait.jpg',
                'before_image_path' => null,
                'client_name' => 'Rhea Kapoor',
                'description' => 'Smokey bronze lids with glowing glass skin for Sangeet dance night.',
                'is_featured' => true,
            ],
            [
                'title' => 'Luxury Designer Nail Art',
                'category' => 'Nail Art',
                'image_path' => 'images/nail_art_look.jpg',
                'before_image_path' => null,
                'client_name' => 'Simran Kaur',
                'description' => 'Blush gel extensions decorated with 24K gold foil and pearl studs.',
                'is_featured' => true,
            ],
            [
                'title' => 'Modern Chic Salon Experience',
                'category' => 'Salon',
                'image_path' => 'images/salon_interior.jpg',
                'before_image_path' => null,
                'client_name' => 'Behold Beauty Makeup Studio',
                'description' => 'Our opulent private bridal suite with ambient gold vanity lighting.',
                'is_featured' => true,
            ],
            [
                'title' => 'Intricate Floral Hair Bun',
                'category' => 'Hair Styling',
                'image_path' => 'images/hero_bridal_beauty.jpg',
                'before_image_path' => null,
                'client_name' => 'Meera Varma',
                'description' => 'Classic low bun embellished with fresh white jasmine and gold hair pins.',
                'is_featured' => false,
            ],
            [
                'title' => 'Diamond Hydrating Facial Glow',
                'category' => 'Facial',
                'image_path' => 'images/salon_interior.jpg',
                'before_image_path' => null,
                'client_name' => 'Kavita Reddy',
                'description' => 'Deep cellular hydration for luminescent skin texture before wedding functions.',
                'is_featured' => false,
            ],
        ];

        foreach ($portfolioItems as $item) {
            PortfolioItem::create($item);
        }

        // 4. SEED REVIEWS
        $reviews = [
            [
                'customer_name' => 'Dr. Sneha Roy',
                'service_taken' => 'Premium Bridal Package',
                'rating' => 5,
                'review_text' => 'Behold Beauty Makeup Studio created absolute magic for my wedding day! My makeup looked completely weightless and stayed flawless through 14 hours of ceremony and dancing. Everyone complimented the natural glow. Best investment ever!',
                'customer_photo' => 'images/hero_bridal_beauty.jpg',
                'event_date' => 'December 2025',
                'is_featured' => true,
            ],
            [
                'customer_name' => 'Ridhima Malhotra',
                'service_taken' => 'HD Engagement Makeup',
                'rating' => 5,
                'review_text' => 'The artist listened carefully to what I wanted and gave me the most stunning soft glam look! The salon studio is super luxurious and clean. Highly recommended for every bride-to-be!',
                'customer_photo' => 'images/after_glam.jpg',
                'event_date' => 'January 2026',
                'is_featured' => true,
            ],
            [
                'customer_name' => 'Aakanksha Mehta',
                'service_taken' => 'Keratin & Spa Manicure',
                'rating' => 5,
                'review_text' => 'I regularly visit Behold Beauty Makeup Studio for hair spa and nail art. The staff is so hospitable and professional. Their hygiene standards are top-notch!',
                'customer_photo' => 'images/artist_portrait.jpg',
                'event_date' => 'February 2026',
                'is_featured' => true,
            ],
        ];

        foreach ($reviews as $rev) {
            Review::create($rev);
        }

        // 5. SEED BOOKINGS
        $bookings = [
            [
                'booking_number' => 'BB-65B201A',
                'customer_name' => 'Dr. Sneha Roy',
                'phone' => '+91 98765 43210',
                'email' => 'sneha.roy@gmail.com',
                'service_category' => 'Bridal Package',
                'specific_service' => 'VIP Royalty Bridal Package',
                'preferred_date' => now()->addDays(3)->format('Y-m-d'),
                'preferred_time' => '11:00 AM',
                'number_of_people' => 2,
                'message' => 'Need trial for wedding makeup on day 1.',
                'status' => 'Pending',
            ],
            [
                'booking_number' => 'BB-65B202B',
                'customer_name' => 'Ananya Sharma',
                'phone' => '+91 98111 22334',
                'email' => 'ananya.s@outlook.com',
                'service_category' => 'Bridal Makeup',
                'specific_service' => 'Airbrush Bridal Makeup',
                'preferred_date' => now()->addDays(5)->format('Y-m-d'),
                'preferred_time' => '02:00 PM',
                'number_of_people' => 1,
                'message' => 'Please assign senior makeup artist Shalu.',
                'status' => 'Confirmed',
            ],
            [
                'booking_number' => 'BB-65B203C',
                'customer_name' => 'Pooja Kapoor',
                'phone' => '+91 99887 76655',
                'email' => 'pooja.k@yahoo.com',
                'service_category' => 'Hair Services',
                'specific_service' => 'Keratin Treatment',
                'preferred_date' => now()->addDays(1)->format('Y-m-d'),
                'preferred_time' => '04:00 PM',
                'number_of_people' => 1,
                'message' => 'Looking forward to keratin hair smoothening.',
                'status' => 'Completed',
            ],
        ];

        foreach ($bookings as $b) {
            Booking::create($b);
        }
    }
}
