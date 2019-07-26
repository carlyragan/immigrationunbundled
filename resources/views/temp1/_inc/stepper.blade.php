<h1 class="mb-5">{{ $stepper_title }}</h1>
<div class="stepper">
<!-- stepper here -->
<div class="d-table w-100">
    <div class="d-table-cell">

        <a href="{{ route('immigrant.step1') }}"><span class="stepper-dot{{ $stepper_selected == '1' ? ' active' : '' }}"></span></a>

    </div>
    <div class="d-table-cell">
        <a href="{{ route('immigrant.step2') }}"><span class="stepper-dot{{ $stepper_selected == '2' ? ' active' : '' }}"></span></a>
    </div>
    <div class="d-table-cell">
        <a href="{{ route('immigrant.step3') }}"><span class="stepper-dot{{ $stepper_selected == '3' ? ' active' : '' }}"></span></a>
    </div>
    <div class="d-table-cell">
        <a href="{{ route('immigrant.step4') }}"><span class="stepper-dot{{ $stepper_selected == '4' ? ' active' : '' }}"></span></a>
    </div>
    <div class="d-table-cell">
        <a href="{{ route('immigrant.step5') }}"><span class="stepper-dot{{ $stepper_selected == '5' ? ' active' : '' }}"></span></a>
    </div>
    <div class="d-table-cell">
        <a href=""><span class="stepper-dot{{ $stepper_selected == '6' ? ' active' : '' }}"></span></a>
    </div>
</div>
</div>