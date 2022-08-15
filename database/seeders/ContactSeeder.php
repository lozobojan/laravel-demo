<?php

namespace Database\Seeders;

use App\Models\Contact;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ContactSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $contacts = [
            [
                "first_name" => "Filip",
                "last_name" => "Filipovic",
                "phone_number" => "+38267889977",
                "email" => "filip@mail.com"
            ],
            [
                "first_name" => "Janko",
                "last_name" => "Jankovic",
                "phone_number" => "+38267889900",
                "email" => "janko@mail.com"
            ],
            [
                "first_name" => "Marko",
                "last_name" => "Markovic",
                "phone_number" => "+38268990077",
                "email" => "marko@mail.com"
            ]
        ];

        foreach ($contacts as $contact){
            Contact::query()->create($contact);
        }

        Contact::factory(1000)->create();
    }
}
