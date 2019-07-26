@extends('layout.user-master', [
    'body_class' => 'learn'
])


@section('contents')

    @include('temp1._inc.stepper', ['stepper_selected' => 3, 'stepper_title' => 'Step 3: Learn How To Increase Your Score'])
    <h1 class="calculated-result text-center my-5">
        {{ $score }}
        @if(isset($recalc))
            <small class="text-center" style="font-size: 16px;display: block;">
                These are the recalculated score as per <b>{{$recalc}}</b></small>
        @endif
    </h1>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6">
                <div class="learn-box shadow-box-hover">
                    <div class="lb-show">
                        <h1>#1 Get More Work Experience</h1>
                        <p>
                            Continue working until you have 2+ year of work experience in your profession.
                        </p>
                        <div class="text-center">
                            <a href="#" class="learn-btn learn-more-switch btn btn-default mb-2">Learn More</a>
                        </div>
                    </div>
                    <div class="lb-hidden">
                        <p>
                            Based on your personal profile,this is the most efficient way for you to increase your score.
                            3+ years of work experience in the same occupation well give you the maxium amount of points.
                            Calculate your new score using button below.if you apply as soon as you have complete 3+ this will be your score
                            <br> &nbsp;
                        </p>
                        <div class="text-center">
                            <a href="#" class="learn-btn learn-more-switch btn btn-default mb-2">Hide More</a>
                        </div>
                    </div>
                    <div class="text-center">
                        <a href="#" class="learn-btn btn btn-default">Calculate New Score</a>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="learn-box shadow-box-hover">
                    <div class="lb-show">
                        <h1>#2 Retake Ielts <br> &nbsp;</h1>
                        <p>
                            Retake the IELTS as many times as it takes you to recieve 777 in reading,writing,speaking,and 8 in listening.
                        </p>
                        <div class="text-center">
                            <a href="#" class="learn-btn learn-more-switch btn btn-default mb-2">Learn More</a>
                        </div>
                    </div>
                    <div class="lb-hidden">
                        <p>
                            Based on your personal profile,this is the 2nd most efficient way for you to increase your score.
                            You need to recieve those specefic scores in each language ability.it is not the overall average score which matters.
                            Your score will also increase as indicated if you receive 7 or higher in reading,writing, and speaking,and 8 or higher in listening.
                        </p>
                        <div class="text-center">
                            <a href="#" class="learn-btn learn-more-switch btn btn-default mb-2">Hide More</a>
                        </div>
                    </div>
                    <div class="text-center">
                        <a href="{{ route('immigrant.recalc') }}" class="learn-btn btn btn-default">Calculate New Score</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col text-center">
                <a href="{{ route('immigrant.step4') }}" class="btn btn-default btn-theme btn-talk-lawyer">Talk To A Lawyer Now</a>
            </div>
        </div>
    </div>

    @endsection



@section('footer-assets')

    <script>
        $(".learn-more-switch").click(function (e) {
            e.preventDefault();
            $(this).parent().parent().parent().find('.lb-hidden').attr('class', 'lb-show');
            $(this).parent().parent().attr('class', 'lb-hidden');
        })
    </script>
    @endsection