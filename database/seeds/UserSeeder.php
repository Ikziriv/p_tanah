<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Role;
use App\UserRole;
use App\Desa;
use App\Blok;
use App\Status;
use App\SPPT;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->create_role();
        $this->create_user();
        // $this->create_user_role();
        $this->create_desa();
        $this->create_blok();
        $this->create_sppt();
        $this->create_stat();
        $this->create_berkas(); 
        $this->create_penjual(); 
        $this->create_harga(); 
    }

    public function create_role()
    {
        $role = App\Modules\Backend\Role\Role::create([
            'nama' => 'Admin',
        ]);
        $role = App\Modules\Backend\Role\Role::create([
            'nama' => 'Manager',
        ]);
        $role = App\Modules\Backend\Role\Role::create([
            'nama' => 'Staff',
        ]);
    }

    public function create_user()
    {
        $admin = App\User::create([
            'nama' => 'Admin',
            'username' => 'admin',
            'role' => 'admin',
			'email' => 'sa@test.io',
            'tlp' => '08775544112',
            'password' => bcrypt('secret'),
            'is_active' => 1,
        ]);
        $admin = App\User::create([
            'nama' => 'Manager',
            'username' => 'manager',
            'role' => 'manager',
            'email' => 'manager@test.io',
            'tlp' => '08775544112',
            'password' => bcrypt('secret'),
            'is_active' => 1,
        ]);
        $admin = App\User::create([
            'nama' => 'Staff',
            'username' => 'timberkas',
            'role' => 'staff',
            'email' => 'staff@test.io',
            'tlp' => '08775544112',
            'password' => bcrypt('secret'),
            'is_active' => 1,
        ]);
    }

    public function create_user_role()
    {
        $admin = App\UserRole::create([
            'user_id' => 1,
            'role_id' => 1,
        ]);
        $admin = App\UserRole::create([
            'user_id' => 2,
            'role_id' => 2,
        ]);
        $admin = App\UserRole::create([
            'user_id' => 3,
            'role_id' => 3,
        ]);
    }

    public function create_desa()
    {
        // Menu
        $desa = App\Modules\Backend\Desa\Desa::create([
            'nama' => 'Dukuh Jengkol',
            'slug' => 'dujeng',
        ]);
        $desa = App\Modules\Backend\Desa\Desa::create([
            'nama' => 'Cibunut',
            'slug' => 'cibun',
        ]);
        $desa = App\Modules\Backend\Desa\Desa::create([
            'nama' => 'Kenceh I',
            'slug' => 'kenceh',
        ]);
        $desa = App\Modules\Backend\Desa\Desa::create([
            'nama' => 'Cinyasag',
            'slug' => 'cinyas',
        ]);
    }

    public function create_blok()
    {
        // Menu
        $blok = App\Modules\Backend\Blok\Blok::create([
            'kode' => '001',
        ]);
        $blok = App\Modules\Backend\Blok\Blok::create([
            'kode' => '002',
        ]);
        $blok = App\Modules\Backend\Blok\Blok::create([
            'kode' => '003',
        ]);
        $blok = App\Modules\Backend\Blok\Blok::create([
            'kode' => '004',
        ]);
        $blok = App\Modules\Backend\Blok\Blok::create([
            'kode' => '005',
        ]);
    }

    public function create_stat()
    {
        // Menu
        $sppt = App\Modules\Backend\Status\Status::create([
            'nama' => 'Lunas',
            'precent' => 100,
            'is_active' => 0,
        ]);
        $sppt = App\Modules\Backend\Status\Status::create([
            'nama' => 'DP 80%',
            'precent' => 80,
            'is_active' => 1,
        ]);
    }

    public function create_sppt()
    {
        // Menu
        $sppt = App\Modules\Backend\SPPT\SPPT::create([
            'kode' => 'String',
        ]);
        $sppt = App\Modules\Backend\SPPT\SPPT::create([
            'kode' => 'Int',
        ]);
    }

    public function create_berkas()
    {
        // Menu
        $berkas = App\Modules\Backend\Berkas\Berkas::create([
            'nama' => 'PPJB (2 Rangkap)',
            'slug' => 'ppjb',
            'stat' => 1,
        ]);
        $berkas = App\Modules\Backend\Berkas\Berkas::create([
            'nama' => 'SPH (4 Rangkap)',
            'slug' => 'sph',
            'stat' => 1,
        ]);
        $berkas = App\Modules\Backend\Berkas\Berkas::create([
            'nama' => 'SPPT 2015',
            'slug' => 'sppt',
            'stat' => 1,
        ]);
        $berkas = App\Modules\Backend\Berkas\Berkas::create([
            'nama' => 'KTP Penjual',
            'slug' => 'ktp',
            'stat' => 1,
        ]);
        $berkas = App\Modules\Backend\Berkas\Berkas::create([
            'nama' => 'KTP Suami / Istri',
            'slug' => 'ktp_s_i',
            'stat' => 1,
        ]);
    }

    public function create_penjual()
    {
        // Penjual
        $penjual = App\Modules\Backend\Penjual\Penjual::create([
            'ktp' => '0087653312',
            'nama' => 'Robert Tanah Luas',
            'alamat' => 'Dasana Indah Blok RR no 99',
            'tlp' => '08976543321',
            'email' => 'penjual@gmail.com',
        ]);
    }

    public function create_harga()
    {
        // Harga
        $penjual = App\Modules\Backend\HargaTanah\HargaTanah::create([
            'harga' => '10000',
            'keterangan' => 'Harga Tanah Desa',
            'status' => 1,
            'is_active' => 1,
        ]);
    }
}
