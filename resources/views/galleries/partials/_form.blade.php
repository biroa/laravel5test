<!-- form comes here -->
<div class="form-group">
    {!! Form::label('name','Gallery name') !!}
    {!! Form::text('name',$gallery->name,['class'=>'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('category_id','Categories') !!}
    {!!
    Form::select('category_id',$gallery,null,['id'=>'$gallery','class'=>'form-control'])
    !!}
</div>

<div class="form-group">
    {!! Form::label('Gallery thumbnail') !!}
    {!! Form::file('image', null) !!}
</div>

<div class="form-group">
    {!! Form::label('lg_width','Medium Image Width') !!}
    {!! Form::text('lg_width',$gallery->lg_width,['class'=>'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('lg_height','Large Image Height') !!}
    {!! Form::text('lg_height',$gallery->lg_height,['class'=>'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('m_width','Medium Image Width') !!}
    {!! Form::text('m_width',$gallery->m_width,['class'=>'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('m_height','Medium Image Height') !!}
    {!! Form::text('m_height',$gallery->m_height,['class'=>'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('sm_width','Small Image Width') !!}
    {!! Form::text('sm_width',$gallery->sm_width,['class'=>'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('sm_height','Small Image Height') !!}
    {!! Form::text('sm_height',$gallery->sm_height,['class'=>'form-control']) !!}
</div>






<div class="form-group">
    {!! Form::submit($submitButtonText, ['class' => 'btn btn-primary
    form-control']) !!}
</div>