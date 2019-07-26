@extends('layout.user-master')


@section('contents')

    @include('temp1._inc.stepper', [
        'stepper_selected' => '4',
        'stepper_title' => 'Step 4: Discuss Your Next Step With a Lawyer'
    ])
    <div class="legal-team mt-3">
        <h1 class="text-center my-5">Meet Your Legal Team</h1>
        <div class="text-center">
                        <a href="{{route('immigrant.calendy')}}" class="learn-btn btn btn-default">book consultation</a>
                    </div>
        <p>During 30 minutes consultation these immigration professional can
            answer aspecific question you have, verify a document for you, explain
            step of procedure, or tell you wether your document meets the requirments.
            your consultation will be online via skype. The immigration professionals are
            experienced in immigration applications and practising Lawyers/consultants. They
            will not provide job offers and will not. Your lawyer may be joined and added on
            the video call by his staff including immigration paralegals.</p>
    </div>
    <div class="legal-detail">
        <div class="row">
            <div class="col-md-5">
                <img src="{{ asset('temp1/Gurpreet-B&W.jpg') }}" style="" alt="picture">
            </div>
            <div class="col-md-1"></div>
            <div class="col-md-6">
                <h3>Gurpeet Gill</h3>
                <p>Immigration Lawyer with 10+ Year Expereince</p>
                <p>Practices in Alberta, Canada.</p>
                <p>Specializes in Permanent Residence, Applications for Skilled Workerws
                    and Spousal Sponserships</p>
            </div>
        </div>
    </div>

    @endsection