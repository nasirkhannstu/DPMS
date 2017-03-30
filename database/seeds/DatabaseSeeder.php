<?php

use Illuminate\Database\Seeder;
use App\Medicine;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(InvoiceTableSeeder::class);
        factory(Medicine::class, 100)->create();
    }
}
