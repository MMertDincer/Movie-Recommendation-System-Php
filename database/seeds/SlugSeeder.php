<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class SlugSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $movies = \App\Movies::all();

        //try{
          //  DB::beginTransaction();
            foreach ($movies as $movie){
                $movie->movie_slug = Str::slug($movie->movie_title);
            }
            //DB::commit();
        //}
        //catch(Exception $e){
        //    DB::rollback();
        //}

    }
}
