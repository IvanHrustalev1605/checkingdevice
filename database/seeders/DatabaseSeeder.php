<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Objects;
use App\Models\Pribori;
use App\Models\Verifier;
use App\Models\Where;
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
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
       // $pribori = Pribori::factory(10) -> create();
       // $where = Where::factory(10) -> create();
       // $verifier = Verifier::factory(10) -> create();
       Objects::factory(8)->create();
    }

}
