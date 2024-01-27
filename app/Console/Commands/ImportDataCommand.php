<?php

namespace App\Console\Commands;

use App\Components\ImportData;
use App\Models\Film;
use App\Models\Film_people;
use App\Models\Gender;
use App\Models\Homeworld;
use App\Models\People;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class ImportDataCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'import:data';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Get data from SWAPI';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $gender = new Gender;
        $gender->gender = 'male';
        $gender->save();

        $gender = new Gender;
        $gender->gender = 'female';
        $gender->save();

        $gender = new Gender;
        $gender->gender = 'hermaphrodite';
        $gender->save();

        $gender = new Gender;
        $gender->gender = 'none';
        $gender->save();

        $gender = new Gender;
        $gender->gender = 'n/a';
        $gender->save();

        $import = new ImportData();
        $films_next = 'https://swapi.dev/api/films';
        while ($films_next) {
            $response = $import->client->request('GET', $films_next);
            $response_json = json_decode($response->getBody()->getContents());

            $data = $response_json->results;
            foreach ($data as $item)
            {
                Film::create([
                    'title' => $item->title,
                    'episode_id' => $item->episode_id,
                    'release_date' => $item->release_date,
                    'created' => date("Y-m-d h:i:s", strtotime($item->created)),
                    'url' => $item->url,
                ]);
                $films_next = $response_json->next;
            }
        }

        $import = new ImportData();
        $planets_next = 'https://swapi.dev/api/planets';
        while ($planets_next) {
            $response = $import->client->request('GET', $planets_next);
            $response_json = json_decode($response->getBody()->getContents());

            $data = $response_json->results;
            foreach ($data as $item)
            {
                Homeworld::create([
                    'name' => $item->name,
                    'created' => date("Y-m-d h:i:s", strtotime($item->created)),
                    'url' => $item->url,
                ]);
                $planets_next = $response_json->next;
            }
        }

        $import = new ImportData();
        $people_next = 'https://swapi.dev/api/people';
        while ($people_next) {
            $response = $import->client->request('GET', $people_next);
            $response_json = json_decode($response->getBody()->getContents());

            $data = $response_json->results;
            foreach ($data as $item)
            {
                $model = People::create([
                    'name' => $item->name,
                    'height' => $item->height != 'unknown' ? $item->height : null,
                    'mass' => $item->mass != 'unknown' ? floatval(str_replace(',', '.',$item->mass)) : null,
                    'hair_color' => $item->hair_color,
                    'birth_year' => $item->birth_year,
                    'gender_id' => DB::table('genders')->where('gender', $item->gender)->value('id'),
                    'homeworld_id' => (int)filter_var($item->homeworld, FILTER_SANITIZE_NUMBER_INT),
                    'created' => date("Y-m-d h:i:s", strtotime($item->created)),
                    'url' => $item->url,
                ]);

                //$people_id = $model->id;
                $film_links = $item->films;
                $films = [];
                foreach ($film_links as $film_link) {
                    $film_id = (int)filter_var($film_link, FILTER_SANITIZE_NUMBER_INT);
                    $films[] = $film_id;
                }

                $model->films()->attach($films);
                $people_next = $response_json->next;
            }
        }

    }
}
