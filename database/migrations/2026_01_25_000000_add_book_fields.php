<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('books', function (Blueprint $table) {
            $table->integer('pages')->nullable()->after('year');
            $table->integer('current_page')->nullable()->after('pages');
            $table->tinyInteger('rating')->nullable()->after('current_page');
            $table->string('cover_path')->nullable()->after('rating');
            $table->text('notes')->nullable()->after('description');
            $table->string('priority')->default('normal')->after('status');
            $table->date('read_date')->nullable()->after('priority');
            $table->string('tags')->nullable()->after('read_date');
        });
    }

    public function down(): void
    {
        Schema::table('books', function (Blueprint $table) {
            $table->dropColumn([
                'pages',
                'current_page',
                'rating',
                'cover_path',
                'notes',
                'priority',
                'read_date',
                'tags',
            ]);
        });
    }
};
