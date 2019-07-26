@extends('layout.user-master')


@section('contents')

@include('temp1._inc.stepper', [
'stepper_selected' => '5',
'stepper_title' => 'Step 5: Book your schedule/Arrange your meeting'
])
<div class="legal-team mt-3">
    <!-- Calendly inline widget begin -->
<div class="calendly-inline-widget" data-url="https://calendly.com/canadaimmigration" style="min-width:320px;height:580px;"></div>
<script type="text/javascript" src="https://assets.calendly.com/assets/external/widget.js"></script>
<!-- Calendly inline widget end -->
</div>


@endsection