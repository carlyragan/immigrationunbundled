@extends('layout.user-master')


@section('contents')

@include('temp1._inc.stepper', [
'stepper_selected' => '5',
'stepper_title' => 'Step 5: Upload your documents'
])
<br/>
<form method="post" action="{{route('immigrant.saveUploads')}}" enctype="multipart/form-data">
    {{ csrf_field() }}
    <div class="col-md-12">
        <div class="mainbar">
            <div class="row upload-page">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="text-center">Education Credential Assessment</h3>
                        </div>
                        <div class="card-body text-center">
                            <label for="img1" class="select-img">
                                <span class="upload-text">Select an image to upload</span>
                                <img src="#" id="showImage1" style="display: none;">
                                <input type="file" name="education_credential_assessment" id="img1" onchange="readURL(this, '#showImage1')">
                            </label>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="text-center">IELTS Results</h3>
                        </div>
                        <div class="card-body text-center">
                            <label for="img2" class="select-img">
                                <span class="upload-text">Select an image to upload</span>
                                <img src="#" id="showImage2" style="display: none;">
                                <input type="file" name="ielts" id="img2" onchange="readURL(this, '#showImage2')">
                            </label>

                        </div>
                    </div>
                </div>

            </div>
            <br/>
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
            </div><br/>
            <div class="panel panel-default pull-right">
                <div class="panel-body">

                </div>
                <div class="panel-footer">
                    <button class="btn btn-default btn-upload-n">
                        Upload
                        <img src="{{ asset('/temp1/n-download-img.png') }}" width="20px" alt="">
                    </button>
                </div>
            </div>
        </div>

        <!-- /.mainbar -->
    </div>

</form>

@endsection
<script>
    function readURL(input, place) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $(place).attr('src', e.target.result).show();
                $(place).prev().hide()
            };

            reader.readAsDataURL(input.files[0]);
        }
    }

</script>