<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use App\Models\WebSetting;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        /**
         * Role Settings
         */
        Role::factory()->create([
            "role_name" => "Admin",
            "slug" => "admin",
            "default" => false,
            "permissions" => [
                "modules" => [
                    "*" => "*"
                ]
            ]
        ]);
        Role::factory()->create([
            "role_name" => "stations",
            "slug" => "stations",
            "default" => false,
            "permissions" => [
                "modules" => [
                    "Teacher" => "CRUD",
                    "Student" => "CRUD",
                ]
            ]
        ]);
        /**
         * User Settings
         */
        User::factory()->create([
            "first_name" => "Binod",
            "last_name" => "Giri",
            "role" => 1,
            "country" => "Nepal",
            "gender" => "male",
            "password" => "$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi",
            "email" => "adminuser@gmail.com",
            "username" => "uknownrocks619",
            "email_verified_at" => Carbon::now(),
            "phone_number" => '9851236141',
            "status" => "active"
        ]);

        /**
         * Web site settings
         */
        WebSetting::factory()->create([
            "name" => "logo",
            "value" => "logo.png",
            "created_at" => Carbon::now(),
            "updated_at" => Carbon::now()
        ]);
        // WebSetting::factory()->create([
        //     "name" => "logo",
        //     "value" => "logo.png",
        //     "created_at" => Carbon::now(),
        //     "updated_at" => Carbon::now()
        // ]);
        WebSetting::factory()->create([
            "name" => "loading_bar",
            "value" => true,
            "created_at" => Carbon::now(),
            "updated_at" => Carbon::now()
        ]);
        WebSetting::factory()->create([
            "name" => "cache",
            "value" => true,
            "created_at" => Carbon::now(),
            "updated_at" => Carbon::now()
        ]);
        WebSetting::factory()->create([
            "name" => "theme",
            "value" => "upschool",
            "created_at" => Carbon::now(),
            "updated_at" => Carbon::now()
        ]);
        WebSetting::factory()->create([
            "name" => "favicon",
            "value" => "favicon.ico",
            "created_at" => Carbon::now(),
            "updated_at" => Carbon::now()
        ]);
        WebSetting::factory()->create([
            "name" => "loading_bar_image",
            "value" => "loading.png",
            "created_at" => Carbon::now(),
            "updated_at" => Carbon::now()
        ]);
        WebSetting::factory()->create([
            "name" => "website_name",
            "value" => "Ticket Management",
            "created_at" => Carbon::now(),
            "updated_at" => Carbon::now()
        ]);
        WebSetting::factory()->create([
            "name" => "website_url",
            "value" => "https://ticket.dev.org",
            "created_at" => Carbon::now(),
            "updated_at" => Carbon::now()
        ]);
        WebSetting::factory()->create([
            "name" => "main_contact",
            "value" => "+44 7818 513129",
            "created_at" => Carbon::now(),
            "updated_at" => Carbon::now()
        ]);
        WebSetting::factory()->create([
            "name" => "official_email",
            "value" => "info@ticket.org",
            "created_at" => Carbon::now(),
            "updated_at" => Carbon::now()
        ]);
        WebSetting::factory()->create([
            "name" => "company_address",
            "value" => json_encode(["head_office" => "Chandragiri-1"]),
            "created_at" => Carbon::now(),
            "updated_at" => Carbon::now()
        ]);
        WebSetting::factory()->create([
            "name" => "tawk",
            "value" => "0",
            "created_at" => Carbon::now(),
            "updated_at" => Carbon::now()
        ]);
        WebSetting::factory()->create([
            "name" => "login",
            "value" => true,
            "created_at" => Carbon::now(),
            "updated_at" => Carbon::now()
        ]);
        WebSetting::factory()->create([
            "name" => "signup",
            "value" => true,
            "created_at" => Carbon::now(),
            "updated_at" => Carbon::now()
        ]);
        WebSetting::factory()->create([
            "name" => "pre_registration",
            "value" => true,
            "created_at" => Carbon::now(),
            "updated_at" => Carbon::now()
        ]);
        WebSetting::factory()->create([
            "name" => "facebook_login",
            "value" => false,
            "created_at" => Carbon::now(),
            "updated_at" => Carbon::now()
        ]);
        WebSetting::factory()->create([
            "name" => "pre_registration",
            "value" => false,
            "created_at" => Carbon::now(),
            "updated_at" => Carbon::now()
        ]);
    }
}
