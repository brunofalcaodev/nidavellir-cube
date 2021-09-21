<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Nidavellir\Database\Seeders\InitialDataSeeder;
use Nidavellir\Database\Seeders\TestDataSeeder;

class CreateNidavellirSchema extends Migration
{
    public function up()
    {
        Schema::create('positions', function (Blueprint $table) {
            $table->id();

            $table->foreignId('token_id');
            $table->foreignId('pair_id');
            $table->foreignId('order_id');

            $table->string('buy_id')
            ->comment('The exchange/api system buy id');

            $table->decimal('buy_rate', 36, 18)
            ->nullable()
            ->comment('The effective token order close price');

            $table->decimal('amount', 36, 18)
            ->nullable()
            ->comment('The token amount bought');

            $table->decimal('cost', 36, 18)
            ->nullable()
            ->comment('The total quote amount invested, from the user wallet');

            $table->timestamp('order_date')
            ->comment('At what time did the order close, given from the exchange system');

            $table->timestamps();
            $table->softDeletes();

            $table->engine = 'InnoDB';
        });

        Schema::create('apis', function (Blueprint $table) {
            $table->id();

            $table->string('hashcode')
            ->unique()
            ->comment('The hashcode to be used in the alerts. Normally, a uniqid()');

            $table->text('description')
            ->nullable()
            ->comment('A humanable description of what is this api used for');

            $table->foreignId('exchange_id')
                  ->comment('The relatable Exchange that this api instance belongs to');

            $table->foreignId('user_id')
            ->constrained()
            ->comment('The relatable User that his api instance belongs to');

            $table->string('api_key')
            ->nullable()
            ->comment('The API key returned from the exchange api creation');

            $table->string('api_secret')
            ->nullable()
            ->comment('The API secret returned from the exchange api creation');

            $table->string('api_passphrase')
            ->nullable()
            ->comment('The API key returned from the exchange api creation');

            $table->timestamps();
            $table->softDeletes();

            $table->engine = 'InnoDB';
        });

        Schema::create('pairs', function (Blueprint $table) {
            $table->id();

            $table->foreignId('token_id')
                  ->comment('Relatable token id');

            $table->string('quote')
                  ->comment('The stable coin connected to the pair');

            $table->timestamps();
            $table->softDeletes();

            $table->engine = 'InnoDB';
        });

        Schema::create('tokens', function (Blueprint $table) {
            $table->id();

            $table->string('symbol')
                  ->comment('The token canonical symbol (e.g.: ADA)');

            $table->string('name')
                  ->nullable()
                  ->comment('The token technical symbol name (e.g.: Cardano)');

            $table->text('image_url')
                  ->nullable()
                  ->comment('Token image url');

            $table->timestamps();
            $table->softDeletes();

            $table->engine = 'InnoDB';
        });

        Schema::create('orders', function (Blueprint $table) {
            $table->id();

            $table->string('system_id')
            ->comment('The exchange order system id');

            $table->foreignId('api_id')
            ->comment('Relatable api');

            $table->foreignId('alert_id')
            ->comment('Relatable alert');

            $table->foreignId('token_id')
            ->comment('Relatable token');

            $table->foreignId('pair_id')
            ->comment('Relatable pair');

            $table->string('operation_type')
            ->nullable()
            ->comment('In case it exists, from the exchange');

            $table->foreignId('order_type_id')
            ->comment('Relatable order type');

            $table->timestamps();
            $table->softDeletes();

            $table->engine = 'InnoDB';
        });

        Schema::create('order_types', function (Blueprint $table) {
            $table->id();

            $table->string('name')
            ->comment('Order type name');

            $table->string('canonical')
            ->comment('Order type canonical');

            $table->timestamps();
            $table->softDeletes();

            $table->engine = 'InnoDB';
        });

        Schema::create('alerts', function (Blueprint $table) {
            $table->id();

            $table->text('headers')
            ->nullable();

            $table->text('body')
            ->nullable();

            $table->string('status')
            ->default('received')
            ->comment('The current status (received, validated, processed, error)');

            $table->foreignId('order_id')
            ->nullable()
            ->comment('The respective order instance, when created');

            $table->text('error')
            ->nullable()
            ->comment('A possible error on the alert');

            $table->timestamps();
            $table->softDeletes();

            $table->engine = 'InnoDB';
        });

        Schema::create('exchanges', function (Blueprint $table) {
            $table->id();

            $table->string('name')
            ->unique()
            ->comment('Exchange name');

            $table->string('canonical')
            ->unique()
            ->comment('Exchange canonical name used in queries');

            $table->string('site_url')
            ->unique()
            ->nullable()
            ->comment('Exchange site URL');

            $table->string('api_url')
            ->unique()
            ->nullable()
            ->comment('Exchange API URL');

            $table->string('sandbox_api_url')
            ->unique()
            ->nullable()
            ->comment('Exchange sandbox API URL');

            $table->timestamps();
            $table->softDeletes();

            $table->engine = 'InnoDB';
        });

        Schema::table('users', function (Blueprint $table) {
            $table->boolean('is_active')
            ->default(true)
            ->after('email')
            ->comment('User is active, then can log in into the platform.');
        });

        Schema::table('users', function (Blueprint $table) {
            $table->boolean('is_subscribed')
            ->default(false)
            ->after('is_active')
            ->comment('Means user is using an active subscription at the moment, so full access to Nidavellir.');
        });

        $seeder = new InitialDataSeeder();
        $seeder->run();

        /*
        if (app()->environment() != 'production') {
            $seeder = new TestDataSeeder();
            $seeder->run();
        }
        */
    }

    public function down()
    {
        //
    }
}
