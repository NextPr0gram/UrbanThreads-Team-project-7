<?php
// database/seeders/ContactFormSeeder.php

namespace Database\Seeders;

use App\Models\ContactForm;
use Illuminate\Database\Seeder;

class ContactFormSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // Use the factory to create 20 contact forms
        ContactForm::factory()->count(20)->create();
    }
}
