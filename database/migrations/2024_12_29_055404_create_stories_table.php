<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    
    public function up(): void
    {
        Schema::create('stories', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('titleTranslation');
            $table->string('coverImage');
            $table->string('voiceLink');
            $table->string('subtitleLink');
            $table->string('storyContent');
        });
    }

    
    public function down(): void
    {
        Schema::dropIfExists('stories');
    }
};
