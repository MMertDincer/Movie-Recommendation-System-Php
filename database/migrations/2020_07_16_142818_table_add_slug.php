<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;

class TableAddSlug extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $rows = DB::table('movies')->get(['id', 'movie_title']);
        foreach ($rows as $row) {
            DB::table('movies')
                ->where('id', $row->id)
                ->update(['movie_slug' => Str::slug($row->movie_title)]);
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
