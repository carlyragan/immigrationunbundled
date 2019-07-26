<h1 class="mb-5">{{ $stepper_title }}</h1>
<div class="stepper">
<!-- stepper here -->
<div class="d-table w-100">
    <div class="d-table-cell">
        <span class="stepper-dot{{ $stepper_selected == '1' ? ' active' : '' }}"></span>
    </div>
    <div class="d-table-cell">
        <span class="stepper-dot{{ $stepper_selected == '2' ? ' active' : '' }}"></span>
    </div>
    <div class="d-table-cell">
        <span class="stepper-dot{{ $stepper_selected == '3' ? ' active' : '' }}"></span>
    </div>
    <div class="d-table-cell">
        <span class="stepper-dot{{ $stepper_selected == '4' ? ' active' : '' }}"></span>
    </div>
    <div class="d-table-cell">
        <span class="stepper-dot{{ $stepper_selected == '5' ? ' active' : '' }}"></span>
    </div>
    <div class="d-table-cell">
        <span class="stepper-dot{{ $stepper_selected == '6' ? ' active' : '' }}"></span>
    </div>
</div>
</div>