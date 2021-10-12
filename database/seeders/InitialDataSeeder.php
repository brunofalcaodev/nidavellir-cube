<?php

namespace Nidavellir\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Bus;
use Nidavellir\Cube\Models\Exchange;
use Nidavellir\Cube\Models\OrderType;
use Nidavellir\Cube\Models\User;
use Nidavellir\Jobs\Coingecko\UpsertTokensJob as UpsertTokensJobCoingecko;
use Nidavellir\Jobs\Kucoin\UpsertTokensJob as UpsertTokensJobKucoin;

class InitialDataSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // Create my user.
        $user = User::create([
            'name' => 'Bruno Falcao',
            'email' => 'me@brunofalcao.dev',
            'email_verified_at' => now(),
            'password' => bcrypt('password'),
        ]);

        // Create Kucoin Exchange.
        $exchange = Exchange::create([
            'name' => 'Kucoin',
            'canonical' => 'kucoin',
            'site_url' => 'kucoin.com',
            'api_url' => 'https://api.kucoin.com',
            'sandbox_api_url' => 'https://openapi-sandbox.kucoin.com',
        ]);

        // Order types
        OrderType::create([
            'name' => 'Market',
            'canonical' => 'market',
        ]);

        OrderType::create([
            'name' => 'Limit',
            'canonical' => 'limit',
        ]);

        Bus::chain([
            new UpsertTokensJobKucoin,
            new UpsertTokensJobCoingecko,
        ])->dispatch();
    }
}
