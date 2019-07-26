@extends('layout.user-master', ['body_class' => 'set-score'])

@section('contents')

    @include('temp1._inc.stepper', ['stepper_selected' => 1, 'stepper_title' => 'Step 1: Check Your Score'])
    <br>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form class="form-horizontal" method="POST" action="{{ route('immigrant.savestep1') }}">
        {{ csrf_field() }}
        <div class="form-container">
            <p class="text-center num-persons">
                Are you planning to apply alone or with a spouse?</p>
            <div class="d-table w-100 text-center">
                <span class="d-table-cell">
                    <input type="radio" name="relationship" id="applytype1" value="alone">
                    <label for="applytype1">Alone</label>
                </span>
                    <span class="d-table-cell">
                    <input type="radio" name="relationship" id="applytype2" value="spouse">
                    <label for="applytype2">With Spouse</label>
                </span>
            </div>
            <span class="d-block text-center age-field">
                <label for="age">What is your age</label>
                <br>
                <input type="number" name="age" id="age" placeholder="Age i.e 24" min="1" max="200">
            </span>
            <div class="text-center uni-edu">
                <p class="uni-level-para">What level of university education have you completed?</p>
                <span class="d-block">
                    <input type="radio" name="education" id="applytype3" value="a">
                    <label for="applytype3">1 Degree</label>
                </span>
                <span class="d-block">
                    <input type="radio" name="education" id="applytype4" value="b">
                    <label for="applytype4">2 Degrees (1 of 3+ years)</label>
                </span>
                <span class="d-block">
                    <input type="radio" name="education" id="applytype5" value="c">
                    <label for="applytype5">Masters Degree</label>
                </span>
                <span class="d-block">
                    <input type="radio" name="education" id="applytype6" value="d">
                    <label for="applytype6">P.H.D</label>
                </span>
            </div>
            <div class="text-center ielts-score-field">
                <p>What are you IELTS language test scores?</p>
                <div class="row ielts-score">
                    <div class="col-md">
                        <p>Speaking</p>
                        <span class="d-block">
                        <input type="radio" name="speaking" id="speaking1" value="7.5">
                        <label for="speaking1">7.5 - 9</label>
                    </span>
                        <span class="d-block">
                        <input type="radio" name="speaking" id="speaking2" value="7.0">
                        <label for="speaking2">7.0</label>
                    </span>
                        <span class="d-block">
                        <input type="radio" name="speaking" id="speaking3" value="6.5">
                        <label for="speaking3">6.5</label>
                    </span>
                        <span class="d-block">
                        <input type="radio" name="speaking" id="speaking4" value="6.0">
                        <label for="speaking4">6.0</label>
                    </span>
                    </div>
                    <!-- /.col-md -->

                    <div class="col-md">
                        <p>Listening</p>
                        <span class="d-block">
                        <input type="radio" name="listening" id="listening1" value="7.5">
                        <label for="listening1">7.5 - 9</label>
                    </span>
                        <span class="d-block">
                        <input type="radio" name="listening" id="listening2" value="7.0">
                        <label for="listening2">7.0</label>
                    </span>
                        <span class="d-block">
                        <input type="radio" name="listening" id="listening3" value="6.5">
                        <label for="listening3">6.5</label>
                    </span>
                        <span class="d-block">
                        <input type="radio" name="listening" id="listening4" value="6.0">
                        <label for="listening4">6.0</label>
                    </span>
                    </div>
                    <!-- /.col-md -->

                    <div class="col-md">
                        <p>Reading</p>
                        <span class="d-block">
                        <input type="radio" name="reading" id="reading1" value="7.5">
                        <label for="reading1">7.5 - 9</label>
                    </span>
                        <span class="d-block">
                        <input type="radio" name="reading" id="reading2" value="7.0">
                        <label for="reading2">7.0</label>
                    </span>
                        <span class="d-block">
                        <input type="radio" name="reading" id="reading3" value="6.5">
                        <label for="reading3">6.5</label>
                    </span>
                        <span class="d-block">
                        <input type="radio" name="reading" id="reading4" value="6.0">
                        <label for="reading4">6.0</label>
                    </span>
                    </div>
                    <!-- /.col-md -->

                    <div class="col-md">
                        <p>Writing</p>
                        <span class="d-block">
                        <input type="radio" name="writing" id="writing1" value="7.5">
                        <label for="writing1">7.5 - 9</label>
                    </span>
                        <span class="d-block">
                        <input type="radio" name="writing" id="writing2" value="7.0">
                        <label for="writing2">7.0</label>
                    </span>
                        <span class="d-block">
                        <input type="radio" name="writing" id="writing3" value="6.5">
                        <label for="writing3">6.5</label>
                    </span>
                        <span class="d-block">
                        <input type="radio" name="writing" id="writing4" value="6.0">
                        <label for="writing4">6.0</label>
                    </span>
                    </div>
                    <!-- /.col-md -->
                </div>
                <!-- /.row.ielts-score -->
            </div>
            <p class="text-center skils-para">
                How many years of skilled work experience do you
                have in one role? <br>
                <small>
                    The work experience does not have to match your
                    education, it simply has to be all in the same type
                    of role.
                </small>
            </p>
            <div class="d-table w-100 text-center">
                <span class="d-table-cell">
                    <input type="radio" name="experience" id="work_experience1" value="a">
                    <label for="work_experience1">1-2 years</label>
                </span>
                    <span class="d-table-cell">
                    <input type="radio" name="experience" id="work_experience2" value="c">
                    <label for="work_experience2">3+ years</label>
                </span>
            </div>
            <div class="spouse-bio" style="display: none;">
                <div class="text-center uni-edu">
                    <p class="uni-level-para">What is the highest level of your spouse education?</p>
                    <span class="d-block">
                        <input type="radio" name="spouse_education" id="applytype23" value="a">
                        <label for="applytype23">1 Degree</label>
                    </span>
                        <span class="d-block">
                        <input type="radio" name="spouse_education" id="applytype24" value="b">
                        <label for="applytype24">2 Degrees (1 of 3+ years)</label>
                    </span>
                        <span class="d-block">
                        <input type="radio" name="spouse_education" id="applytype25" value="c">
                        <label for="applytype25">Master Degree</label>
                    </span>
                        <span class="d-block">
                        <input type="radio" name="spouse_education" id="applytype26" value="d">
                        <label for="applytype26">PH.D</label>
                    </span>
                </div>
                <p class="text-center skils-para">
                    In the last 10 years how many years of skilled work experience does your spouse have? <br>
                </p>
                <div class="d-table w-100 text-center">
                    <span class="d-table-cell">
                        <input type="radio" name="spouse_experience" id="spouse_experience1" value="a">
                        <label for="spouse_experience1">1-2 years</label>
                    </span>
                        <span class="d-table-cell">
                        <input type="radio" name="spouse_experience" id="spouse_experience2" value="c">
                        <label for="spouse_experience2">3+ years</label>
                    </span>
                </div>
            </div>
            <!-- /.spouse-bio -->
            <div class="text-center">
                <button type="submit" class="btn btn-default btn-theme-secondary mt-5 btn-lg">Calculate Your Score</button>
            </div>
        </div>
    </form>
    <!-- /.form-container -->

    @endsection



@section('footer-assets')

    <script>


            $('input[name="relationship"]').on('change', function () {
                var type = $(this).val();
                if (type === 'spouse') {
                    $(".spouse-bio").show();
                } else {
                    $(".spouse-bio").hide();
                }
            })


    </script>

    @endsection