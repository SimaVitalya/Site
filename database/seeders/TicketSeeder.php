<?php

namespace Database\Seeders;

use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TicketSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        for ($i = 0; $i < 50; $i++) {
            DB::table('users_tickets')->insert([
                'user_id' => 1,
                'category_id' => 1,
                'status' => 'open',
                'read_status'=>1,
                'created_at' => now(),
                'updated_at' => now(),

            ]);
        }
    }
}
