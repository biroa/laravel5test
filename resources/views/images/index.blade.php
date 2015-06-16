@extends('app')

@section('content')
    <div class="row">
        <div class="col-lg-6 text-left">
            <h1>Images</h1>
        </div>
        <div class="col-lg-6 text-right">
            <a href="/images/create" class="btn btn-primary" role="button">Upload Images</a>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading" translate>
                    List of Articles
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                            <thead>
                            <tr>
                                <th>id</th>
                                <th>gallery</th>
                                <th>name</th>
                                <th>description</th>
                                <th>camera</th>
                                <th>lens</th>
                                <th>focal lens</th>
                                <th>shutter_speed</th>
                                <th>aperture</th>
                                <th>iso</th>
                                <th>edit</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if($images->count() > 0)
                                @foreach($images as $image)
                                    <tr>
                                        <td>{{$image->id}}</td>
                                        <td>{{$image->gallery->name}}</td>
                                        <td>{{$image->name}}</td>
                                        <td>{{$image->description}}</td>
                                        <td>{{$image->camera}}</td>
                                        <td>{{$image->lens}}</td>
                                        <td>{{$image->focal_length}}</td>
                                        <td>{{$image->shutter_speed}}</td>
                                        <td>{{$image->aperture}}</td>
                                        <td>{{$image->iso}}</td>
                                        <td><a href=<?='/images/' . $image->id . '/edit' ?> ><span class="glyphicon glyphicon-pencil"></span></a><span>&nbsp;</span><span class="glyphicon glyphicon-remove""></span></td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="11">
                                        There is no images yet.
                                    </td>
                                </tr>
                            @endif
                            </tbody>
                        </table>
                    </div>
                    <!-- /.table-responsive -->
                    <?php echo $images->render(); ?>
                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
@stop