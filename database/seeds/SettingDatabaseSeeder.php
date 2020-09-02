<?php

use App\Models\Setting;
use Illuminate\Database\Seeder;

class SettingDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Setting::setMany([
            'default locale' => 'ar',
            'default timezone' => 'Africa/Cairo',
            'reviews enabled' => true,
            'auto approve reviews' => true,
            'supported currencies' => [ 'USD', 'LE','SAR'],
            'default currency T'=> 'USD',
            'store_email' => 'admin@ecomerce.test',
            'search_engine' => 'mysql',
            'Local pickup cost' => 0,
            'flat rate cost!' => 0,
            'translatable' => [
                'store name' => 'FleetCart',
                'free shipping_label' => 'Free Shipping',
                'local label' => 'Local shipping',
                'outer label' => 'outer shipping',
            ],
        ]);
    }
}
