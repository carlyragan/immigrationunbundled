@extends('layout.user-master', ['body_class' => 'set-score'])

@section('contents')

<h3>Canada Immigration User detail of  {{$userdetail->name}}</h3>
{{session()->has('message') ? session()->get('message') : ''}}
<div class="container emp-profile">
    <form method="post">
        <div class="row">
            <div class="col-md-4">
                <div class="profile-img">
                    <img src="{{ asset('/temp1/blank-profile.png') }}" alt=""/>

                </div>
            </div>
            <div class="col-md-6">
                <div class="profile-head">
                    <h5>
                        {{$userdetail->name}}
                    </h5>
                    <h6>
                        {{$userdetail->email}}
                    </h6>
                    <p class="proile-rating">Score : <span>{{$score}}</span></p>
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Detail Applicants data</a>
                        </li>
                        <li class="nav-item">
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">

            </div>
            <div class="col-md-8">
                <div class="tab-content profile-tab" id="myTabContent">
                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                        <div class="row">
                            <div class="col-md-6">
                                <label>Are you planning to apply alone or with a spouse?</label>
                            </div>
                            <div class="col-md-6">
                                <p>{{$userdetail->relationship}}</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label>What is your age </label>
                            </div>
                            <div class="col-md-6">
                                <p>{{$userdetail->age}}</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label>What are you IELTS language test scores?</label>
                            </div>
                            <div class="col-md-6">
                                <p></p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label>Speaking</label>
                            </div>
                            <div class="col-md-6">
                                <p>{{$userdetail->speaking}}</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label>Listening</label>
                            </div>
                            <div class="col-md-6">
                                <p>{{$userdetail->listening}}</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label>Reading</label>
                            </div>
                            <div class="col-md-6">
                                <p>{{$userdetail->reading}}</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label>Writing</label>
                            </div>
                            <div class="col-md-6">
                                <p>{{$userdetail->writing}}</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label>How Many Years of skilled work experience do you have in one role?</label>
                            </div>
                            <div class="col-md-6">
                                <p>
                                    @if($userdetail->experience == 'a')
                                        1-2 years
                                    @else
                                        3+ years
                                    @endif
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>           
</div>
<!-- /.form-container -->

@endsection
