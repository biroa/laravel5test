<div class="form-group">
    {!! Form::label('name','Tag title') !!}
    {!! Form::text('name',$tag0>name,['class'=>'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('created_at','Created at') !!}
    {!!
    Form::input('date','created_at',$tag->created_at,['class'=>'form-control'])
    !!}
</div>

<div class="form-group">
    {!! Form::submit($submitButtonText, ['class' => 'btn btn-primary
    form-control']) !!}
</div>