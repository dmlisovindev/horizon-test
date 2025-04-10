<?php

namespace App\Jobs;

use App\JobModel;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class BaseTestJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * The job model with parameters.
     *
     * @var \App\JobModel
     */
    public $model;

    /**
     * Create a new job instance.
     * @param \App\JobModel $model
     *
     * @return void
     */
    public function __construct(JobModel $model)
    {
        $this->model = $model;
        $this->queue = $model->queue;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $failRandom = rand(0, 100);
        if ($failRandom < $this->model->fail_percent_chance) {
            $this->fail(new \Exception("The job " . get_class($this) . ' suddenly failed for no reason!'));
        }
        $delay = ($this->model->delay_max == $this->model->delay_min) ? $this->model->delay_min : rand($this->model->delay_max,
            $this->model->delay_min);
        sleep($delay);
    }

    /**
     * Get the tags that should be assigned to the job.
     *
     * @return array
     */
    public function tags()
    {
        if ($this->model->tags == '') {
            return;
        }
        $tags = explode(',', $this->model->tags);

        array_unshift($tags, $this->model->name);
        return $tags;
    }


}
