<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->id();

            $table->string('customer_last_name', 50)->nullable()->index();
            $table->string('customer_first_name', 50)->nullable()->index();
            $table->string('company_name', 50)->nullable()->index();
            $table->string('company_vat', 50)->nullable();

            $table->string('address_street', 50)->nullable()->index();
            $table->string('address_number', 20)->nullable()->index();
            $table->string('address_country', 3)->nullable();
            $table->string('address_postal_code', 10)->nullable()->index();
            $table->string('address_place', 100)->nullable()->index();

            $table->string('phone', 50)->nullable();
            $table->string('email', 191)->nullable()->unique()->index();

            $table->string('delivery_address_street', 50)->nullable();
            $table->string('delivery_address_number', 20)->nullable();
            $table->string('delivery_address_country', 3)->nullable();
            $table->string('delivery_address_postal_code', 10)->nullable();
            $table->string('delivery_address_place', 50)->nullable();

            $table->boolean('send_newsletter')->default(0);

            $table->timestamps();
            $table->softDeletes();
        });

        // composiet indexen
        Schema::table('customers', function (Blueprint $table) {
            $table->index(['customer_last_name', 'customer_first_name']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('customers');
    }
}
