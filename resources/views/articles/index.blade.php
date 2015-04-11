@extends('app')

@section('content')
    <h1>Articles</h1>

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
                                <th>title</th>
                                <th>excerpt</th>
                                <th>url</th>
                                <th>category</th>
                                <th>edit</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($articles as $article)

                                <tr>
                                    <td>{{$article->id}}</td>
                                    <td>{{$article->title}}</td>
                                    <td>{{$article->excerpt}}</td>
                                    <td>{{$article->url}}</td>
                                    <td>{{$article->category->name}}</td>
                                    <td><a href=<?='/articles/' . $article->id . '/edit' ?> ><span class="glyphicon glyphicon-pencil"></span></a><span>&nbsp;</span><span class="glyphicon glyphicon-remove""></span></td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
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