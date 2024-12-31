<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('words', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('categoryId');
            $table->string('title');
            $table->string('titleVoice');
            $table->string('pronunciation');
            $table->string('explanation');
            $table->string('partOfSpeechType');
            $table->string('imageLink');
            $table->string('titleTranslation');
            $table->string('explanationTranslation');
            $table->json('examplesTranslation');
            $table->json('examples');
            
            $table->foreign('categoryId')
                    ->references('id')->on('word_categories')
                    ->onUpdate('cascade')
                    ->onDelete('cascade');
        });
    }


    public function down(): void
    {
        Schema::dropIfExists('words');
    }
};
