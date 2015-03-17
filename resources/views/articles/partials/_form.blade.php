<div class="form-group">
    {!! Form::label('title','Article title') !!}
    {!! Form::text('title',null,['class'=>'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('body','Body') !!}
    {!! Form::textarea('body',null,['class'=>'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('published_at','Article title') !!}
    {!!
    Form::input('date','published_at',date('Y-m-d'),['class'=>'form-control'])
    !!}
</div>
<div class="form-group">
    {!! Form::label('tag_list','Tags') !!}
    {!! Form::select('tag_list[]',$tags,null,['class'=>'form-control','multiple']) !!}
</div>
<div class="form-group">
    {!! Form::submit($submitButtonText, ['class' => 'btn btn-primary
    form-control']) !!}
</div>