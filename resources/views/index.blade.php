<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

    <!-- Styles -->
    <style>
        html, body {
            background-color: #fff;
            color: #636b6f;
            font-family: 'Nunito', sans-serif;
            font-weight: 200;
            height: 100vh;
            margin: 0;
        }

        .full-height {
            height: 100vh;
        }

        .flex-center {
            align-items: center;
            display: flex;
            justify-content: center;
        }

        .position-ref {
            position: relative;
        }

        .top-right {
            position: absolute;
            right: 10px;
            top: 18px;
        }

        .content {
            text-align: center;
            width: 90%;
            margin-bottom: 100px;
        }

        .title {
            font-size: 84px;
        }

        .links > a {
            color: #636b6f;
            padding: 0 25px;
            font-size: 13px;
            font-weight: 600;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase;
        }

        .m-b-md {
            margin-bottom: 30px;
        }

        .job-model-table {
            width: 90%;
        }

        .job-attr-title {
            width: 15%;
            border-color: black;
            font-weight: bold;
            text-align: right;
        }

        .job-attr-value {
            width: 85%;
            border-color: black;
            text-align: left;
            padding-left: 30px;
        }


    </style>
</head>
<body>
<div class="flex-center position-ref">


    <div class="content">
        <div class="title m-b-md">
            Job Sender
        </div>
        <div>
            For simplicity, we have defined queue jobs with models that contain the queue the job should be put into,
            the job's tags, minimum and maximum run time and chance to fail in percents. You can alter, add or remove
            these job types through <a href="http://localhost:8080/" target="_blank">Adminer</a>.
        </div>
        <div>
            Fill in the inputs how many jobs of each type to send, submit the form and note the activity on Horizon tab.
        </div>
        <div>
            Click <a href="{{url('/demo')}}">here</a> to randomize the amounts.
        </div>
        {!! Form::open(['url' => 'demo', 'class' => 'form-horizontal', 'id' => 'display-model-form'])  !!}
        @foreach($models as $model)
            <div>
                <h3>{!! $model->name !!}</h3>
                <table class="job-model-table">
                    <tr>
                        <td class="job-attr-title">Queue:</td>
                        <td class="job-attr-value">{!! $model->queue !!}</td>
                    </tr>
                    <tr>
                        <td class="job-attr-title">Minimum run time:</td>
                        <td class="job-attr-value">{!! $model->delay_min !!}</td>
                    </tr>
                    <tr>
                        <td class="job-attr-title">Maximum run time:</td>
                        <td class="job-attr-value">{!! $model->delay_max !!}</td>
                    </tr>
                    <tr>
                        <td class="job-attr-title">Fail chance:</td>
                        <td class="job-attr-value">{!! $model->fail_percent_chance !!}%</td>
                    </tr>
                    <tr>
                        <td class="job-attr-title">Tags:</td>
                        <td class="job-attr-value">{!! $model->tags !!}</td>
                    </tr>
                    <tr>
                        <td>
                            {!! Form::text("amount[$model->id]", $model->amount, ['class' => 'form-control', 'id' => 'amount'.$model->id]) !!}

                        </td>
                    </tr>
                </table>
            </div>


        @endforeach
        {!! Form::submit() !!}
        {!! Form::close()  !!}
    </div>

</div>
</body>
</html>
