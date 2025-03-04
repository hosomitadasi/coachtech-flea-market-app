<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ConditionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $param = [
            'name' => '良好',
        ];
        DB::table('conditions')->insert($param);

        $param = [
            'name' => '目だった傷や汚れなし',
        ];
        DB::table('conditions')->insert($param);

        $param = [
            'name' => 'やや傷や汚れあり',
        ];
        DB::table('conditions')->insert($param);

        $param = [
            'name' => '状態が悪い',
        ];
        DB::table('conditions')->insert($param);

    }
}
