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
        $this->call(CandidatesTableSeeder::class);
        $this->call(JobsTableSeeder::class);

        foreach (CandidatesModel::all() as $candidate) {
            print 'Candidate: ' . $candidate->first_name . ' ' . $candidate->surname . PHP_EOL;
            print 'Candidate Email: ' . $candidate->email_address . PHP_EOL;
            print PHP_EOL;

            $jobs = JobsModel::where('candidates_id', $candidate->id)
                ->orderBy('end_date', 'desc')
                ->get();
        
            foreach ($jobs as $job) {
                print 'Job: ' . $job->job_title . ' - ' . $job->company_name . PHP_EOL;
                print 'Job Duration: ' . $job->start_date . ' to ' . $job->end_date . PHP_EOL;
                print PHP_EOL;
            }
            print '----------------' . PHP_EOL;
        }
    }
}
