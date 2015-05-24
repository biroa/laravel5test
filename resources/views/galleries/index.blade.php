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
                                <th>category</th>
                                <th>name</th>
                                <th>thumbnail</th>
                                <th>lg_width</th>
                                <th>lg_height</th>
                                <th>m_width</th>
                                <th>m_height</th>
                                <th>sm_width</th>
                                <th>sm_height</th>
                                <th>edit</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($galleries as $gallery)

                                <tr>
                                    <td>{{$gallery->id}}</td>
                                    <td>{{$gallery->category_id}}</td>
                                    <td>{{$gallery->name}}</td>
                                    <td>{{$gallery->thumbnail}}</td>
                                    <td>{{$gallery->lg_width}}</td>
                                    <td>{{$gallery->lg_height}}</td>
                                    <td>{{$gallery->m_width}}</td>
                                    <td>{{$gallery->m_height}}</td>
                                    <td>{{$gallery->sm_width}}</td>
                                    <td>{{$gallery->sm_height}}</td>
                                    <td><a href=<?='/galleries/' . $gallery->id . '/edit' ?> ><span class="glyphicon glyphicon-pencil"></span></a><span>&nbsp;</span><span class="glyphicon glyphicon-remove""></span></td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- /.table-responsive -->
                    <?php echo $galleries->render(); ?>
                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
@stop