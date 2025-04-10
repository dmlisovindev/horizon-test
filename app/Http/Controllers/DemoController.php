<?php

namespace App\Http\Controllers;

use App\JobModel;
use App\Jobs\BaseTestJob;
use Illuminate\Http\Request;
use Symfony\Component\VarDumper\VarDumper;

class DemoController extends Controller
{
    /**
     * Render demo
     *
     * @return Response
     */
    public function index()
    {
        $models = JobModel::all();


          $models->transform(function($item, $key) {
             $item->amount = rand(0,200);
             return $item;
          });



        return view('index',['models'=>$models]);
    }


    /**
     * Set up the jobs
     *
     * @return Response
     */
    public function run(Request $request)
    {
        $amounts = $request->get('amount');
        $models = JobModel::all();
        $models->transform(function($item, $key) use ($amounts) {
            $item->amount = $amounts[$item->id];
            return $item;
        });
        foreach ($models as $model){
            for($i = 0; $i<$model->amount;$i++){
                BaseTestJob::dispatch($model);
            }
        }

        return view('index',['models'=>$models]);
    }



    /**
     * Render demo
     *
     * @return Response
     */
    public function welcome()
    {

    }
}
