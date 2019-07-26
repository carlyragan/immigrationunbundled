@extends('layout.user-master')


@section('contents')

    @include('temp1._inc.stepper', [
        'stepper_selected' => '6',
        'stepper_title' => 'Step 6: Payement successfull'
    ])
    <div class="legal-team mt-3">
        <h1 class="text-center my-5">Payment status</h1>
        <p>Payement successfull.</p>
    </div>
    @endsection