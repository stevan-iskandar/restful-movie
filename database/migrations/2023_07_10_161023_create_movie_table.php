<?php

use App\Models\Movies;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create(Movies::ATTR_TABLE, function (Blueprint $table) {
            $table->id();

            $table->char(Movies::ATTR_CHAR_TITLE);
            $table->text(Movies::ATTR_TEXT_DESCRIPTION);
            $table->float(Movies::ATTR_FLOAT_RATING);
            $table->char(Movies::ATTR_CHAR_IMAGE)->nullable();

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists(Movies::ATTR_TABLE);
    }
};
