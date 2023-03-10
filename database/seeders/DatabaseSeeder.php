<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        \App\Models\User::factory()->create([
            'name' => 'Андрей',
             'email' => 'wotacc0809@gmail.com',
             'role' => '1',
             'password' => '$2y$10$5sXScqKhyjdwuGvy/i1IaeZxD7jUA6sqXpTCIKVLFpzlng9K0bmZ.',
         ]);
        \App\Models\Type::factory()->count(2)->create();
        \App\Models\Char::factory()->create([
            'type_id' => 1,
            'chars' => '{"asd":"zxc","asd1":"ded","asd2":"asd"}',
        ]);
        \App\Models\Char::factory()->create([
            'type_id' => 2,
            'chars' => '{"asd":"zxc","asd1":"ded","asd2":"asd"}',
        ]);
        \App\Models\Product::factory()->count(100000)->create();
    }
}
