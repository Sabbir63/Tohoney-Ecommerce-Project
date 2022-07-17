<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(){
      DB::table('settings')->insert([
          'setting_name' => 'phone',
          'setting_value' => '01797152105',
      ]);
      DB::table('settings')->insert([
          'setting_name' => 'email',
          'setting_value' => 'nahiddx100@gmail.com',
      ]);
      DB::table('settings')->insert([
          'setting_name' => 'setting_address',
          'setting_value' => 'AGC,CNB,QUATER,PABNA,SADAR,PABNA',
      ]);
      DB::table('settings')->insert([
          'setting_name' => 'setting_descript',
          'setting_value' => 'In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before final copy is available.',
      ]);
    }
}
