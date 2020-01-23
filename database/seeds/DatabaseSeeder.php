<?php

use Illuminate\Database\Seeder;
use App\CandidatesModel;
use App\JobsModel;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //$this->call(CandidatesTableSeeder::class);
        //$this->call(JobsTableSeeder::class);

       foreach( CandidatesModel::all() as $candidate){
           print 'Candidate: '.$candidate ->first_name .' '.$candidate ->surname.PHP_EOL;
           print 'Candidate Email: '.$candidate ->email_address.PHP_EOL;
           print '----------------'.PHP_EOL;
       }
    }
}
