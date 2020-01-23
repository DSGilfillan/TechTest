<?php

use Illuminate\Database\Seeder;
use App\JobsModel;

class JobsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (($handle = fopen ( public_path () . '/jobs.csv', 'r' )) !== FALSE) {
            while ( ($data = fgetcsv ( $handle, 1000, ',' )) !== FALSE ) {
                $csv_data = new JobsModel();
                $csv_data->id = $data [0];
                $csv_data->candidates_id = $data [1];
                $csv_data->job_title = $data [2];
                $csv_data->company_name = $data [3];
                $csv_data->start_date = $data [4];
                $csv_data->end_date = $data [5];
                $csv_data->save ();
            }
            fclose ( $handle );
        }
    }
}
