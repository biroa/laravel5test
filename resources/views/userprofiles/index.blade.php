@extends('app')

@section('content')
    <div class="row">
        <div class="col-lg-6 text-left">
            <h1>Users' Profiles</h1>
        </div>
        <div class="col-lg-6 text-right">
            <a href="/usersprofile/create" class="btn btn-primary" role="button">Create New User</a>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    List of Users' Profiles
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <div class="table-responsive">

                    </div>
                    <!-- /.table-responsive -->

                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
@stop