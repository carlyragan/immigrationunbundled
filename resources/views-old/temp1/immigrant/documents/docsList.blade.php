@extends('layout.user-master', ['body_class' => 'set-score'])

@section('contents')
<link rel="stylesheet" href="{{ asset('temp1/dataTables/dataTables.bootstrap.css') }}" />
<div class="flash-message">

    @if(session()->has('message'))
    <p class="alert alert-success">{{session()->has('message') ? session()->get('message') : ''}}<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>

    @endif

</div>
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading h2">
                Canada Immigration User Documents List
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Education Credential Assessment</th>
                                <th scope="col">IELTS Results</th>
                                <th scope="col">Uploaded date</th>
                            </tr>
                            @foreach ($userUploadsData as $row)
                            <tr>
                                <th scope="row">1</th>
                                <td>{{$row->name}}</td>
                                <td><a href="{{Storage::url('app/'.$row->education_credential_assessment)}}" target="_blank">Education Credential Assessment</a> <i class="fa fa-download" aria-hidden="true"></i></td>
                                <td><a href="{{Storage::url('app/'.$row->ielts)}}" target="_blank">IELTS Results</a> <i class="fa fa-download" aria-hidden="true"></i></td>
                                <td>{{ date('Y-m-d', strtotime($row->created_at))}}</td>
                                
                            </tr>
                            @endforeach
                        </thead>
                        <tbody>
                           
                            
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
</div>
<!-- /.form-container -->

@endsection



@section('footer-assets')
<script type="text/javascript">
    $(function () {
        $("#changeStatus").change(function () {
            $("form").submit();
        });
    });
</script>
    <script src="{{ asset('temp1/dataTables/jquery.dataTables.js') }}"></script>
<script src="{{ asset('temp1/dataTables/dataTables.bootstrap.js') }}"></script>

@endsection