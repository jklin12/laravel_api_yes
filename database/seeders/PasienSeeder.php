<?php

namespace Database\Seeders;

use Facade\Ignition\Support\FakeComposer;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class PasienSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('id_ID');
        $gender = $faker->randomElement(['L', 'P']);
    	for($i = 1; $i <= 50; $i++){
 
    	      // insert data ke table pegawai menggunakan Faker
    		DB::table('pasiens')->insert([
    			'no_rekam_medis' => sprintf('%05d', $i),
    			'pasien_nama' => $faker->name,
    			'pasien_alamat' => $faker->address,
    			'pasien_telp' => $faker->phoneNumber,
    			'pasien_jenis_kelamin' => $gender,
    			'pasien_tempat_lahir' => $faker->city,
    			'pasien_tgl_lahir' => $faker->dateTimeThisCentury->format('Y-m-d'),
    			'pasien_pekerjaan' => $faker->jobTitle,
               
    		]);
 
    	}
    }
}
