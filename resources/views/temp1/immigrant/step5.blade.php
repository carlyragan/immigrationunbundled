@extends('layout.user-master')


@section('contents')

@include('temp1._inc.stepper', [
'stepper_selected' => '5',
'stepper_title' => 'Step 5: Upload your documents'
])
<br/>
@if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
@if(session()->has('message'))
    <p class="alert alert-success">{{session()->has('message') ? session()->get('message') : ''}}<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
    @endif
    <h4 class="text-center mt-4 px-2">Prior to consultation</h4>
    <div class="content text-center mb-4 px-2">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book</div>
    <br/>

    <div class="col-md-12">
        <div class="mainbar">
            <div class="row upload-page justify-content-center">

                <div class="col-md-4">
                    <form method="post" action="{{route('immigrant.saveUploads')}}" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="card">
                        <div class="card-header">
                            <h3 class="text-center">Education Credential Assessment</h3>
                        </div>
                        <div class="card-body text-center">
                            <label for="img1" class="select-img">
                                <span class="upload-text">Select an image to upload</span>
                                <img src="#" id="showImage1" style="display: none;">
                                <input type="file" name="image" id="img1" onchange="readURL(this, '#showImage1')">
                            </label>
                        </div>
                        <div class="body-footer text-center">
                            <button class="btn btn-default btn-upload-n mb-3">
                                Upload
                                <img src="{{ asset('/temp1/n-download-img.png') }}" width="20px" alt="">
                            </button>
                        </div>
                    </div>
                    </form>
                </div>


                <div class="col-md-4">
                    <form method="post" action="{{route('immigrant.saveUploads2')}}" enctype="multipart/form-data">
                {{ csrf_field() }}
                    <div class="card">
                        <div class="card-header">
                            <h3 class="text-center">IELTS Results</h3>
                        </div>
                        <div class="card-body text-center">
                            <label for="img2" class="select-img">
                                <span class="upload-text">Select an image to upload</span>
                                <img src="#" id="showImage2" style="display: none;">
                                <input type="file" name="image" id="img2" onchange="readURL(this, '#showImage2')">
                            </label>
                        </div>
                        <div class="body-footer text-center">
                            <button class="btn btn-default btn-upload-n mb-3">
                                Upload
                                <img src="{{ asset('/temp1/n-download-img.png') }}" width="20px" alt="">
                            </button>
                        </div>
                    </div>
                    </form>
                </div>

            </div>

            <br/>
            <div class="faq text-center">
                <div class="row justify-content-center">
                    <div class="col-md-4">
                        <div class="accordion" id="accordionExample">
                            <div class="card">
                                <div class="card-header" id="headingOne">
                                    <h2 class="mb-0 text-left font-os">
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
                                    <h2 class="mb-0 text-left font-os">
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
                                    <h2 class="mb-0 text-left font-os">
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
                    <div class="col-md-4">
                        <div class="accordion" id="accordionExample">
                            <div class="card">
                                <div class="card-header" id="headingTwo">
                                    <h2 class="mb-0 text-left font-os">
                                        <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseOne">
                                            Do I need job offer to immigrate?
                                            <i class="fa fa-plus"></i>
                                        </button>
                                    </h2>
                                </div>

                                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                                    <div class="card-body">
                                        Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                                    </div>
                                </div>
                            </div>
                            <!-- /.card -->
                            <div class="card">
                                <div class="card-header" id="headingTwo">
                                    <h2 class="mb-0 text-left font-os">
                                        <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseTwo1" aria-expanded="true" aria-controls="collapseOne1">
                                            How do I get work permit?
                                            <i class="fa fa-plus"></i>
                                        </button>
                                    </h2>
                                </div>

                                <div id="collapseTwo1" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                                    <div class="card-body">
                                        Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                                    </div>
                                </div>
                            </div>
                            <!-- /.card -->
                            <div class="card">
                                <div class="card-header" id="headingTwo">
                                    <h2 class="mb-0 text-left font-os">
                                        <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseTwo2" aria-expanded="true" aria-controls="collapseOne2">
                                            How do I apply for province nominee program?
                                            <i class="fa fa-plus"></i>
                                        </button>
                                    </h2>
                                </div>

                                <div id="collapseTwo2" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
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

        </div>

        <!-- /.mainbar -->
    </div>

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