<div class="form-group">
    {!! Form::label('name','Tag title') !!}
    {!! Form::text('name',$tag->name,['class'=>'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::submit($submitButtonText, ['class' => 'btn btn-primary
    form-control']) !!}
</div>