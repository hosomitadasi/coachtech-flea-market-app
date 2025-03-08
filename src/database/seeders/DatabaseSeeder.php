<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;


class DatabaseSeeder extends Seeder
{

    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(CategoriesTableSeeder::class);
        $this->call(ConditionsTableSeeder::class);
        $this->call(ItemsTableSeeder::class);
    }
}
