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
        Schema::table('enrolls', function (Blueprint $table) {
            $table ->string('place_of_birth')->nullable();
            $table ->string('address')->nullable();
            $table ->string('nationality')->nullable();
            $table ->string('study_level')->nullable();
            $table ->string('last_school_enrolled')->nullable();
            $table ->string('type_blood')->nullable();
            $table ->string('full_name_person_in_charge')->nullable();
            $table ->string('sexe_person_in_charge')->nullable();
            $table ->string('telephone_person_in_charge')->nullable();
            $table ->string('address_person_in_charge')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('enrolls', function (Blueprint $table) {
            //
        });
    }
};
