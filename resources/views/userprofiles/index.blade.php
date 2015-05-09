@extends('app')

@section('content')
    <div class="row">
        <div class="col-lg-6 text-left">
            <h1>Users' Profiles</h1>
        </div>
        <div class="col-lg-6 text-right">
            <a href="/userprofiles/create" class="btn btn-primary" role="button">Create New User</a>
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
                        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                            <thead>
                            <tr>
                                {{--<th>id</th>--}}
                                <th>first name</th>
                                <th>last name</th>
                                <th>gender</th>
                                <th>contact nmail</th>
                                <th>mobile</th>
                                <th>address</th>
                                <th>city</th>
                                <th>county</th>
                                {{--<th>State</th>--}}
                                {{--<th>Updated at</th>--}}
                                {{--<th>Created at</th>--}}
                                <th>edit</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($users as $user)

                                <tr>
                                    {{--<td>{{$user->id}}</td>--}}
                                    <td>{{$user->first_name}}</td>
                                    <td>{{$user->last_name}}</td>
                                    @if ($user->gender == 0)
                                        <td>Female</td>
                                    @else
                                        <td>Male</td>
                                    @endif
                                    <td>{{$user->contact_email}}</td>
                                    <td>{{$user->mobile_phone}}</td>
                                    <td>{{$user->address}}</td>
                                    <td>{{$user->city}}</td>
                                    <td>{{$user->county}}</td>
                                    {{--<td>{{$user->state}}</td>--}}
                                    {{--<td>{{$user->updated_at}}</td>--}}
                                    {{--<td>{{$user->created_at}}</td>--}}
                                    <td><a href=<?='/userprofiles/' . $user->id . '/edit' ?> ><span class="glyphicon glyphicon-pencil"></span></a><span>&nbsp;</span><span class="glyphicon glyphicon-remove""></span></td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <?php echo $users->render(); ?>
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