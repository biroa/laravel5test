<div class="form-group">
    {!! Form::label('name','Image title') !!}
    {!! Form::text('name',$images->name,['class'=>'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('description','Description') !!}
    {!! Form::text('description',$images->description,['class'=>'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('Image') !!}
    {!! Form::file('image', null) !!}
</div>
<div class="form-group">
    {!! Form::label('tag_list','Tags') !!}
    {!!
    Form::select('tag_list[]',$tags,null,['id'=>'tag_list','class'=>'form-control','multiple'=>'multiple'])
    !!}
</div>
<div class="form-group">
    {!! Form::label('Camera','camera') !!}
    {!! Form::text('camera',$images->camera,['class'=>'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('lens','Lens') !!}
    {!! Form::text('lens',$images->lens,['class'=>'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('focal_length','Focal length') !!}
    {!! Form::text('focal_length',$images->focal_length,['class'=>'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('shutter_speed','Shutter speed') !!}
    {!! Form::text('shutter_speed',$images->shutter_speed,['class'=>'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('aperture','Aperture') !!}
    {!! Form::text('aperture',$images->aperture,['class'=>'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('iso','Iso') !!}
    {!! Form::text('iso',$images->iso,['class'=>'form-control']) !!}
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