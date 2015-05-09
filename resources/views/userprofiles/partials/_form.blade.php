<div class="form-group">
    {!! Form::label('first_name','First name') !!}
    {!! Form::text('first_name',$userprofile->first_name,['class'=>'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('last_name','Last name') !!}
    {!! Form::text('last_name',$userprofile->last_name,['class'=>'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('gender','Gender') !!}
    {!!
    Form::select('gender',['0' => 'Female','1' => 'Male'],null,['id'=>'$userprofile->gender','class'=>'form-control'])
    !!}

</div>

<div class="form-group">
    {!! Form::label('contact_email','Contact Email') !!}
    {!! Form::text('contact_email',$userprofile->contact_email,['class'=>'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('address','Address') !!}
    {!! Form::text('address',$userprofile->address,['class'=>'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('city','Mobile') !!}
    {!! Form::text('city',$userprofile->city,['class'=>'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('county','County') !!}
    {!! Form::text('county',$userprofile->county,['class'=>'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('state','State') !!}
    {!! Form::text('state',$userprofile->state,['class'=>'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::submit($submitButtonText, ['class' => 'btn btn-primary
    form-control']) !!}
</div>