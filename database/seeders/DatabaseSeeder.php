<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use App\Models\Berita;
use App\Models\Pasbar;
use App\Models\Keluhan;
use App\Models\Udl;
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

        User::create([
            'name' => 'Administrator',
            'username' => 'admin',
            'email' => 'admin@gmail.com',
            'role' => 'admin',
            'password' => bcrypt('admin')
        ]);
        User::create([
            'name' => 'Abd Rahman',
            'username' => 'abd_rahman.02',
            'email' => 'abdul.190180078@mhs.unimal.ac.id',
            'role' => 'pelanggan',
            'password' => bcrypt('smanda009')
        ]);
        // User::factory(30)->create();
        Berita::factory(6)->create();
        // Keluhan::factory(30)->create();
        // Pasbar::factory(50)->create();
        // Udl::factory(30)->create();
        // Pasbar::create([
        //     'user_id' => '2',
        //     'alamat' => 'Jln. Mangunsarkoro',
        //     'kelurahan' => 'Kisaran Baru',
        //     'no_rumah' => '12',
        //     'rt' => '1',
        //     'rw' => '1',
        //     'telepon' => '082360162637',
        //     'identitas' => 'KTP',
        //     'no_identitas' => '12901230193089',
        //     'layanan' => 'Prabayar',
        //     'peruntukan' => 'Rumah Tangga',
        //     'daya' => '450'
        // ]);
    }
}
