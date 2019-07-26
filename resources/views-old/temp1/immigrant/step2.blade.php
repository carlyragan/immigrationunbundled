@extends('layout.user-master', [
    'body_class' => 'score-page'
])


@section('contents')

    @include('temp1._inc.stepper', [
        'stepper_selected' => 2,
        'stepper_title' => 'Step 2: Learn What Your Score Means'
    ])
    <div class="score-graph text-center">
        <h1 class="calculated-result text-center">{{ $score }}</h1>
        <div id='myChart'></div>
    </div>
    <div class="score-meansForYou text-center">
        <h1>What this means for you?</h1>
        <div class="row">
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card h-100 shadow-box-hover">
                    <h2>Highest Score Wins</h2>
                    <p>The Canadian government uses a score to rank applicants against each other and "invite" the
                        people with high score to apply for permanent residence. The score required to get invited
                        range from 333+.</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card h-100 shadow-box-hover">
                    <h2>Increase Scores First</h2>
                    <p>Although based on many factors, the primary factors which effect your score are your education,
                        age, work experience, and Ilets Score. Our tool will tell you the most efficient way to increase
                        your score based on your personal profile.</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card h-100 shadow-box-hover">

                </div>
            </div>
        </div>
    </div>
    <div class="increase-score">
        <form action="{{ route('immigrant.step3')}}" method="post">
            {{csrf_field()}}
            <input type="hidden" name="">
        <input type="submit" class="btn btn-theme" value="Increase Score">    
        </form>
        
    </div>
    <div class="questions text-center">
        <h6>Here are a few questions we got tired of answering</h6>
            <div class="row">
                <div class="col-md-3">
                    <h1>Frequently Asked Questions</h1>
                </div>
                <div class="col-md-9">
                    <div class="accordion questions-list" id="accordionExample">
                        <div class="card">
                            <div class="card-header" id="headingOne">
                                <h2 class="mb-0">
                                    <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                        Do I need job offer to immigrate?
                                        <i class="fa fa-plus"></i>
                                    </button>
                                </h2>
                            </div>

                            <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                                <div class="card-body">
                                    Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                                </div>
                            </div>
                        </div>
                        <!-- /.card -->
                        <div class="card">
                            <div class="card-header" id="headingOne">
                                <h2 class="mb-0">
                                    <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne1" aria-expanded="true" aria-controls="collapseOne1">
                                        How do I get work permit?
                                        <i class="fa fa-plus"></i>
                                    </button>
                                </h2>
                            </div>

                            <div id="collapseOne1" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                                <div class="card-body">
                                    Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                                </div>
                            </div>
                        </div>
                        <!-- /.card -->
                        <div class="card">
                            <div class="card-header" id="headingOne">
                                <h2 class="mb-0">
                                    <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne2" aria-expanded="true" aria-controls="collapseOne2">
                                        How do I apply for province nominee program?
                                        <i class="fa fa-plus"></i>
                                    </button>
                                </h2>
                            </div>

                            <div id="collapseOne2" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                                <div class="card-body">
                                    Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                                </div>
                            </div>
                        </div>
                        <!-- /.card -->
                    </div>
                </div>
            </div>
    </div>

    @endsection


@section('footer-assets')

    <script src= "https://cdn.zingchart.com/zingchart.min.js"></script>
    <script> zingchart.MODULESDIR = "https://cdn.zingchart.com/modules/";
        ZC.LICENSE = ["569d52cefae586f634c54f86dc99e6a9","ee6b7db5b51705a13dc2339db3edaf6d"];</script>

    <script type="text/javascript">
        window.feed = function(callback) {
          var tick = {};
          tick.plot0 = {{ $score }};
          callback(JSON.stringify(tick));
        };
        var myConfig = {
            type: "gauge",
            globals: {
                fontSize: 25,
                backgroundColor:'transparent'
            },
            plotarea: {
                marginTop: 80,
                marginBottom: 0,
                backgroundColor:'transparent'
            },
            plot: {
                size: '100%',
            },
            tooltip: {
                borderRadius: 5
            },
            scaleR: {
                aperture: 180,
                minValue: 260,
                maxValue: 460,
                step: 10,
                center: {
                    visible: false
                },
                tick: {
                    visible: false
                },
                item: {
                    offsetR: 0,
                    rules: [
                        {
                            rule: '%i == 9',
                            offsetX: 15
                        }
                    ]
                },
                labels: ['10', '50', '150', '200', '250','300', '450', '500'],
                ring: {
                    size: 30,
                    rules: [
                        {
                            rule: '%v <= 360',
                            backgroundColor: '#ea4033'
                        },
                        {
                            rule: '%v > 360 && %v < 420',
                            backgroundColor: '#ea4033'
                        },
                        {
                            rule: '%v >= 420 && %v < 440',
                            backgroundColor: '#f2a533'
                        },
                        {
                            rule: '%v >= 440 && %v < 450',
                            backgroundColor: '#cacb25'
                        },
                        {
                            rule: '%v >= 450 && %v < 460',
                            backgroundColor: '#fdf633'
                        },
                        {
                            rule: '%v >= 460',
                            backgroundColor: '#326604'
                        }
                    ]
                }
            },
            series: [
                {
                    values: [{{$score}}], // starting value
                    backgroundColor: 'black',
                    indicator: [10, 10, 10, 10, 0.75],
                    animation: {
                        effect: 2,
                        method: 1,
                        sequence: 4,
                        speed: 100
                    },
                }
            ]
        };

        zingchart.render({
            id: 'myChart',
            data: myConfig,
            width: '100%',
            height: '400px'
        });
    </script>

    @endsection
