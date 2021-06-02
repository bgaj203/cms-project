<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasColumn('posts', 'user_id')){
            Schema::table('posts', function(Blueprint $table){
                $table->dropColumn('user_id');
            });
        }

        Schema::create('posts', function (Blueprint $table) {
            $table->id('id')->unique();
            // $table->integer('user_id')->unsigned();
            $table->string('post_title');
            $table->text('post_body');
            $table->timestamps();
            // $table->boolean('is_admin')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts');
    }
}
