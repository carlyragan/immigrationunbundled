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
                Canada Immigration Registered User List
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">File</th>
                                <th scope="col">Role</th>
                                <th scope="col">Status</th>
                                <th scope="col">Created date</th>
                                <td>Action</td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($usersList as $users)
                            <tr>
                                <th scope="row">1</th>
                                <td>{{$users->name}}</td>
                                <td>{{$users->email}}</td>
                                <td>
                                    @if(!empty($users->files))
                                    <a href="{{Storage::url('app/'.$users->files)}}" title="Click to view file" target="_blank">{{substr($users->files, 0, 20) }}...</a>
                                    @else
                                    No file Uploaded
                                    @endif
                                </td>
                                
                                <td>@if($users->role == 1) Administrator @else user @endif</td>
                                <td>@if($users->status == 1) Active @else Pending @endif</td>
                                <td>{{$users->created_at}}</td>
                                <td>
                                    <form action="{{ route('immigrant.users.edit', ['id' => $users->id]) }}" method="post">
                                        {{ csrf_field() }}
                                        <div class="form-group">
                                            <select class="form-control" name="status" onchange="this.form.submit()">
                                                <option>Select Status</option>
                                                <option value="1" @if($users->status == 1) selected @else "" @endif>Activate</option>
                                                <option value="0" @if($users->status == 0) selected @else "" @endif>Deactivate</option>
                                            </select>
                                        </div>
                                    </form>
                                    @if($users->role == 0)
                                    <a href="{{ route('immigrant.users.delete', ['id' => $users->id]) }}" title="Delete" onclick="return confirm('Are you sure you want to delete this item?');"><span><i class="fa fa-trash" aria-hidden="true"></i><span></a>
                                     <a href="{{ route('immigrant.users.detail', ['id' => $users->id]) }}" title="User detail"><button type="button" class="btn btn-primary btn-xs">Detail</button></a>
                                    @endif
                                </td>
                            </tr>
                            @endforeach
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