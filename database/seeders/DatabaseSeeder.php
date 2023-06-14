<?php

namespace Database\Seeders;

    use App\Models\MyObject;
    use Illuminate\Database\Seeder;

    class DatabaseSeeder extends Seeder
    {
        public function run()
        {
            //$this->call(UsersTableSeeder::class);
//            MyObject::factory()->times(50)->create();
            $this->call(TicketSeeder::class);

        }
    }
