<?php

use Illuminate\Database\Seeder;

class TanahSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tanah = factory(App\Modules\Backend\Tanah\Tanah::class, 10)->create();
    }
}
