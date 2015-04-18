<div class="form-group">
    {!! Form::label('name','Category name') !!}
    {!! Form::text('name',null,['class'=>'form-control']) !!}
</div>


<div class="form-group">
    {!! Form::label('short_lead','Short Lead') !!}
    {!!
    Form::text('short_lead',$category->short_lead,['class'=>'form-control'])
    !!}
</div>

<div class="form-group">
    {!! Form::label('lead','Lead') !!}
    {!! Form::textarea('body',$category->lead,['class'=>'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('description','Description') !!}
    {!! Form::textarea('description',$category->description,['class'=>'form-control']) !!}
</div>


<div class="form-group">
    {!! Form::submit($submitButtonText, ['class' => 'btn btn-primary
    form-control']) !!}
</div>