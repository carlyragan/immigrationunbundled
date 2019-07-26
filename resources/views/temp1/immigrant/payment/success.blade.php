@extends('layout.user-master')


@section('contents')

    @include('temp1._inc.stepper', [
        'stepper_selected' => '6',
        'stepper_title' => 'Step 6: Payement successfull'
    ])
    <br/>
    <div class="success-box-theme">
     <h5>Congratulation Carly!</h5>
     <h3>Payment Successful</h3>
     <img src="{{ asset('/temp1/tick.png') }}">
     <h6>Your consultation details</h6>
     <p>
     	Lawyer: Gurpeet Gill <br>
     	Company: VLG Lawyers <br>
     	Duration: 60 minutes <br>
     	Total: $100
     </p>
         <a href="{{route('immigrant.step5')}}" class="btn btn-block btn-default">Continue to next step</a>

     </div>
    @endsection