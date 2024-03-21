<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the seeder for the products table
     * ? 5 categories
     * ? 5 products per category
     */
    public function run(): void
    {
        DB::table('products')->insert([
            //* Hoodies
            [
                'c1_id' => 2, // MALE PRODUCT
                'c2_id' => 1, // Hoodie
                'name' => 'ChillChic Hoodie',
                'slug' => 'cool-hoodie',
                'description' => 'Effortlessly cool with a relaxed silhouette, perfect for casual outings and lounging in style.',
                'original_price' => '50.00',
                'selling_price' => '40.00',
                'image' => '/images/product-images/hoodies/cool-hoodie.png',
                'meta_title' => 'Sample Product 1',
                'meta_description' => 'Sample meta description for Product 1',
                'meta_keywords' => 'sample, product, keyword',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'c1_id' => 3, // FEMALE PRODUCT
                'c2_id' => 1, // Hoodie
                'name' => 'CozyComfort Hoodie',
                'slug' => 'comfy-hoodie',
                'description' => 'Luxuriously soft fabric provides ultimate comfort, making it the go-to choice for cozy nights and chilly days.',
                'original_price' => '75.00',
                'selling_price' => '55.00',
                'image' => '/images/product-images/hoodies/comfy-hoodie.png',
                'meta_title' => '',
                'meta_description' => '',
                'meta_keywords' => '',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'c1_id' => 2, // MALE PRODUCT
                'c2_id' => 1, // Hoodie
                'name' => 'SportFlex Hoodie',
                'slug' => 'sporty-hoodie',
                'description' => 'Engineered for performance, featuring moisture-wicking fabric and ergonomic design, ensuring comfort during intense workouts or outdoor activities.',
                'original_price' => '45.00',
                'selling_price' => '30.00',
                'image' => '/images/product-images/hoodies/sporty-hoodie.png',
                'meta_title' => '',
                'meta_description' => '',
                'meta_keywords' => '',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'c1_id' => 1, // UNISEX PRODUCT
                'c2_id' => 1, // Hoodie
                'name' => 'UrbanEase Oversize Hoodie',
                'slug' => 'oversized-hoodie',
                'description' => 'Make a fashion statement with its oversized silhouette, offering both comfort and urban sophistication for a standout look.',
                'original_price' => '45.00',
                'selling_price' => '30.00',
                'image' => '/images/product-images/hoodies/oversized-hoodie.png',
                'meta_title' => '',
                'meta_description' => '',
                'meta_keywords' => '',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'c1_id' => 2, // MALE PRODUCT
                'c2_id' => 1, // Hoodie
                'name' => 'SvelteFit Hoodie',
                'slug' => 'slim-fit-hoodie',
                'description' => 'Tailored for a sleek silhouette, combining style and comfort seamlessly, ideal for those seeking a polished yet relaxed appearance.',
                'original_price' => '45.00',
                'selling_price' => '30.00',
                'image' => '/images/product-images/hoodies/slim-fit-hoodie.png',
                'meta_title' => '',
                'meta_description' => '',
                'meta_keywords' => '',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'c1_id' => 3, // FEMALE PRODUCT
                'c2_id' => 1, // Hoodie
                'name' => 'WinterWarmth Hoodie',
                'slug' => 'winter-hoodie',
                'description' => 'Stay cozy and stylish during colder months with its insulating fabric and trendy design, perfect for layering in the winter season.',
                'original_price' => '45.00',
                'selling_price' => '30.00',
                'image' => '/images/product-images/hoodies/winter-hoodie.png',
                'meta_title' => '',
                'meta_description' => '',
                'meta_keywords' => '',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            //* T-shirts
            [
                'c1_id' => 1, // MALE PRODUCT
                'c2_id' => 2, // T-shirt
                'name' => 'EssentialClassic Crew Tee',
                'slug' => 'normal-t-shirt',
                'description' => 'Crafted from premium materials, offering timeless versatility and comfort for everyday wear.',
                'original_price' => '45.00',
                'selling_price' => '30.00',
                'image' => '/images/product-images/t-shirt/normal-t-shirt.png',
                'meta_title' => '',
                'meta_description' => '',
                'meta_keywords' => '',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'c1_id' => 2, // MALE PRODUCT
                'c2_id' => 2, // T-shirt
                'name' => 'StreetSmart Boxy Tee',
                'slug' => 'boxy-t-shirt',
                'description' => 'Make a statement with a structured yet relaxed silhouette, perfect for urban chic.',
                'original_price' => '45.00',
                'selling_price' => '30.00',
                'image' => '/images/product-images/t-shirt/boxy-t-shirt.png',
                'meta_title' => '',
                'meta_description' => '',
                'meta_keywords' => '',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'c1_id' => 2, // MALE PRODUCT
                'c2_id' => 2, // T-shirt
                'name' => 'SculptFit Tees',
                'slug' => 'slim-fit-t-shirt',
                'description' => 'Sleek and tailored for a refined silhouette, blending style with comfort effortlessly.',
                'original_price' => '45.00',
                'selling_price' => '30.00',
                'image' => '/images/product-images/t-shirt/slim-fit-t-shirt.png',
                'meta_title' => '',
                'meta_description' => '',
                'meta_keywords' => '',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'c1_id' => 1, // UNISEX PRODUCT
                'c2_id' => 2, // T-shirt
                'name' => 'UrbanEase Oversize Tee',
                'slug' => 'oversized-t-shirt',
                'description' => 'Luxuriously oversized, this tee offers laid-back charm with an urban twist.',
                'original_price' => '45.00',
                'selling_price' => '35.00',
                'image' => '/images/product-images/t-shirt/oversized-t-shirt.png',
                'meta_title' => '',
                'meta_description' => '',
                'meta_keywords' => '',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'c1_id' => 2, // MALE PRODUCT
                'c2_id' => 2, // T-shirt
                'name' => 'BreezeFit Tee',
                'slug' => 'baggy-t-shirt',
                'description' => 'Embrace laid-back allure with a relaxed, baggy fit for effortless style.',
                'original_price' => '45.00',
                'selling_price' => '30.00',
                'image' => '/images/product-images/t-shirt/baggy-t-shirt.png',
                'meta_title' => '',
                'meta_description' => '',
                'meta_keywords' => '',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'c1_id' => 2, // MALE PRODUCT
                'c2_id' => 2, // T-shirt
                'name' => 'ChicVerve V-Neck Tee',
                'slug' => 'v-neck-t-shirt',
                'description' => 'Elevate your look with classic sophistication, featuring a flattering V-neckline.',
                'original_price' => '45.00',
                'selling_price' => '30.00',
                'image' => '/images/product-images/t-shirt/v-neck-t-shirt.png',
                'meta_title' => '',
                'meta_description' => '',
                'meta_keywords' => '',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'c1_id' => 2, // MALE PRODUCT
                'c2_id' => 2, // T-shirt
                'name' => 'ActiveFlex Performance Tee',
                'slug' => 'sports-t-shirt',
                'description' => 'Engineered for peak performance, keeping you cool and focused during any activity.',
                'original_price' => '45.00',
                'selling_price' => '30.00',
                'image' => '/images/product-images/t-shirt/sports-t-shirt.png',
                'meta_title' => '',
                'meta_description' => '',
                'meta_keywords' => '',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            //* Jackets
            [
                'c1_id' => 3, // FEMALE PRODUCT
                'c2_id' => 3, // Jackets
                'name' => 'DenimEssentials Jacket',
                'slug' => 'demin-jacket',
                'description' => 'Classic denim, versatile for casual, everyday wear with timeless style.',
                'original_price' => '45.00',
                'selling_price' => '35.00',
                'image' => '/images/product-images/jackets/denim-jacket.png',
                'meta_title' => '',
                'meta_description' => '',
                'meta_keywords' => '',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'c1_id' => 3, // FEMALE PRODUCT
                'c2_id' => 3, // Jackets
                'name' => 'UrbanEdge Leather Jacket',
                'slug' => 'leather-jacket',
                'description' => 'Iconic leather, exuding urban sophistication and timeless appeal.',
                'original_price' => '45.00',
                'selling_price' => '30.00',
                'image' => '/images/product-images/jackets/leather-jacket.png',
                'meta_title' => '',
                'meta_description' => '',
                'meta_keywords' => '',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'c1_id' => 2, // MALE PRODUCT
                'c2_id' => 3, // Jackets
                'name' => 'ChillBreeze Gilet',
                'slug' => 'gilet',
                'description' => 'Lightweight and versatile, adding a layer of warmth without bulk for transitional weather.',
                'original_price' => '45.00',
                'selling_price' => '30.00',
                'image' => '/images/product-images/jackets/gilet.png',
                'meta_title' => '',
                'meta_description' => '',
                'meta_keywords' => '',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'c1_id' => 2, // MALE PRODUCT
                'c2_id' => 3, // Jackets
                'name' => 'PuffPerfection Jacket',
                'slug' => 'puffer-jacket',
                'description' => 'Insulated and cozy, offering warmth and style during cold weather with a modern twist.',
                'original_price' => '45.00',
                'selling_price' => '30.00',
                'image' => '/images/product-images/jackets/puffer-jacket.png',
                'meta_title' => '',
                'meta_description' => '',
                'meta_keywords' => '',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'c1_id' => 3, // FEMALE PRODUCT
                'c2_id' => 3, // Jackets
                'name' => 'CropCool Jacket:',
                'slug' => 'cropped-jacket',
                'description' => 'Trendy and chic, featuring a cropped silhouette for a fashion-forward statement piece.',
                'original_price' => '45.00',
                'selling_price' => '30.00',
                'image' => '/images/product-images/jackets/cropped-puffer-jacket.png',
                'meta_title' => '',
                'meta_description' => '',
                'meta_keywords' => '',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            //* Trousers
            [
                'c1_id' => 2, // MALE PRODUCT
                'c2_id' => 4, // Trousers
                'name' => 'Streamline Leg Trousers',
                'slug' => 'straight-leg-trousers',
                'description' => 'Timeless and versatile, offering a sleek silhouette suitable for any occasion.',
                'original_price' => '45.00',
                'selling_price' => '35.00',
                'image' => '/images/product-images/trousers/straight-legged-trousers.png',
                'meta_title' => '',
                'meta_description' => '',
                'meta_keywords' => '',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'c1_id' => 2, // MALE PRODUCT
                'c2_id' => 4, // Trousers
                'name' => 'ActiveFlex Joggers',
                'slug' => 'joggers',
                'description' => 'Designed for comfort and style, perfect for both workouts and casual outings with a sporty edge.',
                'original_price' => '45.00',
                'selling_price' => '30.00',
                'image' => '/images/product-images/trousers/joggers.png',
                'meta_title' => '',
                'meta_description' => '',
                'meta_keywords' => '',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'c1_id' => 2, // MALE PRODUCT
                'c2_id' => 4, // Trousers
                'name' => 'DenimEssentials Jeans',
                'slug' => 'jeans',
                'description' => 'Classic denim crafted for durability and comfort, essential for effortless everyday wear.',
                'original_price' => '45.00',
                'selling_price' => '35.00',
                'image' => '/images/product-images/trousers/jeans.png',
                'meta_title' => '',
                'meta_description' => '',
                'meta_keywords' => '',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'c1_id' => 2, // MALE PRODUCT
                'c2_id' => 4, // Trousers
                'name' => 'Breezy Shorts',
                'slug' => 'shorts',
                'description' => 'Lightweight and comfortable, ideal for warm days and leisurely activities, ensuring freedom of movement.',
                'original_price' => '45.00',
                'selling_price' => '30.00',
                'image' => '/images/product-images/trousers/shorts.png',
                'meta_title' => '',
                'meta_description' => '',
                'meta_keywords' => '',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'c1_id' => 2, // MALE PRODUCT
                'c2_id' => 4, // Trousers
                'name' => 'CargoReady Cargos',
                'slug' => 'cargos',
                'description' => 'Functional and rugged, featuring ample pockets for utility and adventure-ready style.',
                'original_price' => '45.00',
                'selling_price' => '30.00',
                'image' => '/images/product-images/trousers/cargos.png',
                'meta_title' => '',
                'meta_description' => '',
                'meta_keywords' => '',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'c1_id' => 2, // MALE PRODUCT
                'c2_id' => 4, // Trousers
                'name' => 'CityChic Chinos',
                'slug' => 'chinos',
                'description' => 'Sophisticated and versatile, providing a refined look suitable for any setting, from casual to formal.',
                'original_price' => '45.00',
                'selling_price' => '30.00',
                'image' => '/images/product-images/trousers/chinos.png',
                'meta_title' => '',
                'meta_description' => '',
                'meta_keywords' => '',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'c1_id' => 2, // MALE PRODUCT
                'c2_id' => 4, // Trousers
                'name' => 'Classic Khakis',
                'slug' => 'khakis',
                'description' => 'Timeless and comfortable, offering a polished aesthetic perfect for everyday wear or dressier occasions.',
                'original_price' => '45.00',
                'selling_price' => '30.00',
                'image' => '/images/product-images/trousers/khakis.png',
                'meta_title' => '',
                'meta_description' => '',
                'meta_keywords' => '',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            //* Accessories
            [
                'c1_id' => 3, // FEMALE PRODUCT
                'c2_id' => 5, // Accessories
                'name' => 'CozyComfort Beanie',
                'slug' => 'beanie-hat',
                'description' => 'Warmth meets style, perfect for cold days with a snug fit and trendy design.',
                'original_price' => '45.00',
                'selling_price' => '35.00',
                'image' => '/images/product-images/accessories/beanie-hat.png',
                'meta_title' => '',
                'meta_description' => '',
                'meta_keywords' => '',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'c1_id' => 1, // MALE PRODUCT
                'c2_id' => 5, // Accessories
                'name' => 'ChillWrap Scarf',
                'slug' => 'scarf',
                'description' => 'Versatile and cozy, adding an extra layer of warmth and style to any outfit.',
                'original_price' => '45.00',
                'selling_price' => '30.00',
                'image' => '/images/product-images/accessories/scarf.png',
                'meta_title' => '',
                'meta_description' => '',
                'meta_keywords' => '',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'c1_id' => 2, // MALE PRODUCT
                'c2_id' => 5, // Accessories
                'name' => 'StreetSmart Baseball Cap',
                'slug' => 'baseball-cap',
                'description' => 'Casual yet cool, offering sun protection with a touch of urban edge.',
                'original_price' => '45.00',
                'selling_price' => '30.00',
                'image' => '/images/product-images/accessories/baseball-cap.png',
                'meta_title' => '',
                'meta_description' => '',
                'meta_keywords' => '',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'c1_id' => 1, // MALE PRODUCT
                'c2_id' => 5, // Accessories
                'name' => 'Sunshine Aviators',
                'slug' => 'aviator-sunglasses',
                'description' => 'Classic and stylish, providing both sun protection and a timeless, sophisticated look.',
                'original_price' => '45.00',
                'selling_price' => '30.00',
                'image' => '/images/product-images/accessories/aviator-glasses.png',
                'meta_title' => '',
                'meta_description' => '',
                'meta_keywords' => '',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'c1_id' => 3, // FEMALE PRODUCT
                'c2_id' => 5, // Accessories
                'name' => 'SockEssentials',
                'slug' => 'socks',
                'description' => 'Comfortable and durable, perfect for everyday wear with a variety of stylish designs.',
                'original_price' => '45.00',
                'selling_price' => '15.00',
                'image' => '/images/product-images/accessories/socks.png',
                'meta_title' => '',
                'meta_description' => '',
                'meta_keywords' => '',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
