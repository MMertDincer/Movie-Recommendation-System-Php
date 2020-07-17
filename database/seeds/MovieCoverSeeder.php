<?php

use App\Movies;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

class MovieCoverSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $json = File::get("database/data/movieCover.json");
        $data = json_decode($json, true);

        for ($i=0; $i < count($data); $i++){
            Movies::Where('id', $data[$i]['id'])->update([
                "movie_cover_link" => $data[$i]['pic']
            ]);
        }

        //$this->command->getOutput()->writeln('SA:'.$data[$i]['id']);


    }
}
