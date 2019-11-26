<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

/** @var \Illuminate\Database\Eloquent\Factory $factory */
// $factory->define(App\User::class, function (Faker\Generator $faker) {
//     static $password;

//     return [
//         'name' => $faker->name,
//         'email' => $faker->unique()->safeEmail,
//         'password' => $password ?: $password = bcrypt('secret'),
//         'remember_token' => str_random(10),
//     ];
// });

$factory->define(App\Modules\Backend\Tanah\Tanah::class, function (Faker\Generator $faker) {

    return [
        'nama' => $faker->name,
        'sppt' => $faker->randomNumber($nbDigits = NULL, $strict = false),
        'gps' => $faker->randomNumber($nbDigits = NULL, $strict = false),
        'luas_terbayar' => $faker->randomNumber($nbDigits = NULL, $strict = false),
        'desa_id' => 1,
        'blok_id' => 1,
        'sppt_id' => 1,
        'nomer_sph' => $faker->randomNumber($nbDigits = NULL, $strict = false),
        'tgl_sph' => $faker->date($format = 'Y-m-d', $max = 'now'),
        'stat_id' => 1,
        's_ppjb' => 1,
        's_sph' => 1,
        's_sppt' => 1,
        'ktp_penjual' => 1,
        'ktp_lain' => 1,
        's_kk' => 1,
        's_jual' => 1,
        's_sengketa' => 1,
        's_riwayat_tanah' => 1,
        's_persetujuan' => 1,
        's_ket_menikah' => 1,
        'buku_nikah' => 1,
        's_beda_nama' => 1,
        's_beda_luas' => 1,
        's_kematian' => 1,
        's_ahli_waris' => 1,
        's_kuasa_waris' => 1,
        'ktp_ahli_waris' => 1,
        'kk_ahli_waris' => 1,
        's_girik_hilang' => 1,
        'letter_c' => 1,
        'foto_transaksi' => 1,
        'kwitansi_pembayaran' => 1,
        'gambar_situasi' => 1,
        'bap' => 1,
        'dhkp' => 1,
        'npwp' => 1,
        'notes' => $faker->sentence($nbWords = 6, $variableNbWords = true),  
        'nomer_bpn' => $faker->randomNumber($nbDigits = NULL, $strict = false),
        'tgl_bpn' => $faker->date($format = 'Y-m-d', $max = 'now'),
        's_kuasa' => 1,
        's_pengakuan_tanah' => 1,
        's_kesepakatan_bersama' => 1,
        'tgl_pembuatan' => $faker->date($format = 'Y-m-d', $max = 'now'),
    ];
});
