<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Contact;
use Illuminate\Database\Eloquent\Factories\Factory;
use Carbon\Carbon;

class ContactsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $faker = Faker::create();

        // $contact1 = Contact::create([
        //     'first_name'=> Faker\Factory::create()->firstName,
        //     'middle_name'=>Faker\Factory::create()->firstName,
        //     'last_name'=>Faker\Factory::create()->lastName,
        //     'email'=>Faker\Factory::create()->email,
        //     'mobile'=>Faker\Factory::create()->numerfiy('##########'),
        //     'landline'=>Faker\Factory::create()->numerfiy('########'),
        //     'notes'=>Faker\Factory::create()->paragraphs(rand(3,7),true),
        //     'image'=>'contacts/user.jpg',
        //     'created_at'=>Carbon::now()->format('Y-m-d')
        // ]);

    }
}
