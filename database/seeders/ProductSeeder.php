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
                'description' => 'Effortlessly cool, this black hoodie features a relaxed cotton silhouette and a design in the middle. Made from 100% cotton, this male-oriented piece is perfect for casual outings and stylish lounging.',
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
                'description' => 'Crafted from 100% cotton, this luxuriously soft pink hoodie offers ultimate comfort, making it the ideal choice for cozy nights and chilly days.',
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
                'description' => 'Engineered for performance, this grey hoodie features a moisture-wicking fabric composed of 70% polyester and 30% cotton, alongside an ergonomic design to ensure comfort during intense workouts or outdoor activities.',
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
                'description' => 'Designed with a unisex appeal, this grey hoodie epitomizes contemporary style with its 100% cotton construction and oversized silhouette. It marries comfort with urban sophistication, offering a distinguished look suitable for a broad spectrum of tastes and preferences.',
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
                'description' => 'Tailored for a sleek silhouette in black, this hoodie combines style and comfort seamlessly with its 70% polyester and 30% cotton blend, ideal for those seeking a polished yet relaxed appearance.',
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
                'description' => 'Stay cozy and stylish during colder months with this 100% cotton piece, featuring white, fluffy fabric. Its insulating qualities and trendy design make it perfect for layering in the winter season.',
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
                'description' => 'This luxuriously oversized black tee, crafted from 100% cotton, exudes laid-back charm with an urban twist.',
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
                'description' => 'Engineered for peak performance, this white and grey t-shirt, crafted from a blend of nylon, polyester, and spandex, ensures you stay cool and focused during any activity.',
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
                'description' => 'This iconic black jacket, crafted from 100% leather, exudes urban sophistication and timeless appeal.',
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
                'description' => 'This black puffer jacket, crafted from durable nylon or polyester with cozy down or synthetic insulation, offers warmth and style with a modern twist for cold weather.This black puffer jacket, crafted from durable nylon or polyester with cozy down or synthetic insulation, offers warmth and style with a modern twist for cold weather.',
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
                'description' => 'These brown joggers, made from an 80% cotton and 20% polyester blend, are designed for comfort and style, ideal for both workouts and casual outings with a sporty edge.',
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
                'description' => 'These grey shorts, crafted from cotton, are lightweight and comfortable, ideal for warm days and leisurely activities, ensuring freedom of movement.',
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
                'description' => 'These green cotton cargos shorts are functional and rugged, featuring ample pockets for utility, making them perfect for adventure-ready style.',
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
                'description' => 'This red beanie, made from a warm blend of cotton and acrylic, offers the perfect combination of snug fit and trendy design, ideal for cold days.',
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
                'description' => 'This red scarf, crafted from a blend of wool, linen, silk, and cotton, is versatile and cozy, adding an extra layer of warmth and style to any outfit.',
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
                'description' => 'This blue baseball cap is casual yet cool, offering sun protection with a touch of urban edge, perfect for any outdoor activity.',
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
                'description' => 'These white socks, crafted from a blend of polyester, wool, cotton, and spandex, offer comfort and durability, perfect for everyday wear with a variety of stylish designs.',
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
