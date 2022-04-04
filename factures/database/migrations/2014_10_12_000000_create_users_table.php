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
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('contact_email')->unique();
            $table->string('phone')->nullable();
            $table->string('company_name');
            $table->string('company_address');
            $table->string('company_siret')->unique();
            $table->integer('APE');
            $table->string('bank_incumbent');
            $table->string('bank_domiciliation');
            $table->string('bank_details');
            $table->string('IBAN');
            $table->string('BIC');
            $table->rememberToken();
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
