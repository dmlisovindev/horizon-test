<?php

use Illuminate\Database\Seeder;
use App\JobModel;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('job_models')->delete();
        $now = date('Y-m-d H:i:s');
        JobModel::create([
            'name' => 'basic',
            'queue' => 'default',
            'fail_percent_chance' => 5,
            'delay_min' => 2,
            'delay_max' => 2,
            'tags' => '',
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        JobModel::create([
            'name' => 'lazy',
            'queue' => 'default',
            'fail_percent_chance' => 40,
            'delay_min' => 10,
            'delay_max' => 15,
            'tags' => 'slow,unreliable',
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        JobModel::create([
            'name' => 'different',
            'queue' => 'other',
            'fail_percent_chance' => 2,
            'delay_min' => 0,
            'delay_max' => 5,
            'tags' => '',
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        JobModel::create([
            'name' => 'too slow',
            'queue' => 'third',
            'fail_percent_chance' => 0,
            'delay_min' => 18,
            'delay_max' => 30,
            'tags' => 'slow, really_slow',
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        JobModel::create([
            'name' => 'one more queue',
            'queue' => 'last',
            'fail_percent_chance' => 15,
            'delay_min' => 0,
            'delay_max' => 10,
            'tags' => '',
            'created_at' => $now,
            'updated_at' => $now,
        ]);

    }
}
