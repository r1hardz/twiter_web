<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddImageColumnToTweets extends Migration
{
    public function up()
    {
        Schema::table('tweets', function (Blueprint $table) {
            $table->string('image')->nullable();
        });
    }

    public function down()
    {
        Schema::table('tweets', function (Blueprint $table) {
            if (Schema::hasColumn('tweets', 'image')) {
                $table->dropColumn('image');
            }
        });
    }
}
