<?php

use App\Models\Person;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePeopleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('people', function (Blueprint $table) {
            $table->id();
            $table->string('dni');
            $table->string('names');
            $table->string('ape_pater');
            $table->string('ape_mater');
            $table->string('social_name');
            $table->string('fecha_naci');
            $table->string('nacionalidad');
            $table->string('email');
            $table->string('phone');
            $table->string('num_hijos')->nullable();
            $table->string('name_represent')->nullable();
            $table->string('dni_represent')->nullable();
            $table->string('time_progres')->nullable();
            $table->string('time_close')->nullable();
            $table->string('date_create')->nullable();
            $table->string('date_atend')->nullable();
            $table->string('date_close')->nullable();
            $table->enum('status', [Person::REGISTRADO, Person::ASIGNADO, Person::EN_PROCESO, Person::RESUELTO])->default(Person::REGISTRADO);

            $table->unsignedBigInteger('identity_id')->nullable();
            $table->unsignedBigInteger('birthplace_id')->nullable();
            $table->unsignedBigInteger('employment_id')->nullable();
            $table->unsignedBigInteger('homeplace_id')->nullable();
            $table->unsignedBigInteger('instruction_id')->nullable();
            $table->unsignedBigInteger('maritalstatus_id')->nullable();
            $table->unsignedBigInteger('profession_id')->nullable();
            $table->unsignedBigInteger('son_id')->nullable();
            $table->unsignedBigInteger('user_id')->nullable();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('identity_id')->references('id')->on('identities')->onDelete('set null');
            $table->foreign('birthplace_id')->references('id')->on('birth_places')->onDelete('set null');
            $table->foreign('employment_id')->references('id')->on('employments')->onDelete('set null');
            $table->foreign('homeplace_id')->references('id')->on('home_places')->onDelete('set null');
            $table->foreign('instruction_id')->references('id')->on('instructions')->onDelete('set null');
            $table->foreign('maritalstatus_id')->references('id')->on('marital_statuses')->onDelete('set null');
            $table->foreign('profession_id')->references('id')->on('professions')->onDelete('set null');
            $table->foreign('son_id')->references('id')->on('sons')->onDelete('set null');

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
        Schema::dropIfExists('people');
    }
}
