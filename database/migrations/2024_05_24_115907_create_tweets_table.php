<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddImageToTweetsTable extends Migration
{
    public function up()
    {
        Schema::table('tweets', function (Blueprint $table) {
            $table->string('image')->nullable()->after('content'); // Adding the image column
        });
    }

    public function down()
    {
        Schema::table('tweets', function (Blueprint $table) {
            $table->dropColumn('image');
        });
    }
}
