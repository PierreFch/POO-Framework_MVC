<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('github_id')->unique();
            $table->string('name');
            $table->string('email');
            $table->string('contact_email');
            $table->string('phone');
            $table->string('company_address');
            $table->string('company_siret')->unique();
            $table->string('company_ape');
            $table->string('bank_incumbent');
            $table->string('bank_domiciliation');
            $table->string('bank_rib');
            $table->string('bank_iban');
            $table->string('bank_bic');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
};
