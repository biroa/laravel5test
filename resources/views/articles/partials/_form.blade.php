<div class="form-group">
    {!! Form::label('title','Article title') !!}
    {!! Form::text('title',null,['class'=>'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('url','Url') !!}
    {!!
    Form::text('url',$article->url,['class'=>'form-control'])
    !!}
</div>

<div class="form-group">
    {!! Form::label('excerpt','Lead') !!}
    {!!
    Form::text('excerpt',$article->excerpt,['class'=>'form-control'])
    !!}
</div>

<div class="form-group">
    {!! Form::label('body','Body') !!}
    {!! Form::textarea('body',null,['class'=>'form-control']) !!}
</div>


<div class="form-group">
    {!! Form::label('published_at','Published at') !!}
    {!!
    Form::input('date','published_at',$article->published_at,['class'=>'form-control'])
    !!}
</div>
<div class="form-group">
    {!! Form::label('tag_list','Tags') !!}
    {!!
    Form::select('tag_list[]',$tags,null,['id'=>'tag_list','class'=>'form-control','multiple'=>'multiple'])
    !!}
</div>
<div class="form-group">
    {!! Form::submit($submitButtonText, ['class' => 'btn btn-primary
    form-control']) !!}
</div>

@section('footer')
    <script type="text/javascript">
        $(document).ready(function () {
            $('#tag_list').select2();
        });
    </script>
@endsection