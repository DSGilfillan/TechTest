<?php

use Illuminate\Database\Seeder;
use App\CandidatesModel;

class CandidatesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (($handle = fopen ( public_path () . '/candidates.csv', 'r' )) !== FALSE) {
            while ( ($data = fgetcsv ( $handle, 1000, ',' )) !== FALSE ) {
                $csv_data = new CandidatesModel();
                $csv_data->id = $data [0];
                $csv_data->first_name = $data [1];
                $csv_data->surname = $data [2];
                $csv_data->email_address = $data [3];
                $csv_data->save ();
            }
            fclose ( $handle );
        }
    }
}
