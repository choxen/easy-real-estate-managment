<?php

use App\Models\Land;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('lands', function (Blueprint $table) {
            $table->id();
            $table->string('cadastral_sign', Land::CADASTRAL_SIGN_LENGTH);
            $table->bigInteger('total_area');
            $table->date('measurement_date');
            $table->bigInteger('property_id')->unsigned()->index();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('lands');
    }
};
