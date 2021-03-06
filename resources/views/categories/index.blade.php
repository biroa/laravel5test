@extends('app')

@section('content')
    <div class="row">
        <div class="col-lg-6 text-left">
            <h1>Categories</h1>
        </div>
        <div class="col-lg-6 text-right">
            <a href="/categories/create" class="btn btn-primary" role="button">Create Category</a>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    List of Categories
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                            <thead>
                            <tr>
                                <th>id</th>
                                <th>name</th>
                                <th>short_lead</th>
                                <th>updated</th>
                                <th>created</th>
                                <th>edit</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if($categories->count() > 0)
                                @foreach($categories as $category)
                                    <tr>
                                        <td>{{$category->id}}</td>
                                        <td>{{$category->name}}</td>
                                        <td>{{$category->short_lead}}</td>
                                        <td>{{$category->updated_at}}</td>
                                        <td>{{$category->created_at}}</td>
                                        <td><a href=<?='/categories/' . $category->id . '/edit' ?> ><span class="glyphicon glyphicon-pencil"></span></a><span>&nbsp;</span><span class="glyphicon glyphicon-remove""></span></td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="6">
                                        There is no category yet.
                                    </td>
                                </tr>

                            @endif
                            </tbody>
                        </table>
                    </div>
                    <!-- /.table-responsive -->
                    <?php echo $categories->render(); ?>
                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
@stop