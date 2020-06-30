@extends('layouts.app')

@section('content')
<div class="postMain text-white " >

    <h1>Create Post</h1>
    {!! Form::open(['action' => 'PostsController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
    <div class="form-group">
        {{ Form::label('title', 'Title') }}
        {{ Form::text('title', '', ['class' => 'form-control', 'placeholder' => 'Title']) }}
    </div>
    <div class="form-group">
        {{ Form::label('body', 'Body') }}
        {{ Form::textarea('body', '', ['id' => 'article-ckeditor', 'class' => 'form-control', 'placeholder' => 'Body Text']) }}
    </div>
    <div class="row">
        <div class="col-12 form-group p-5">
            {!! Form::label('tag', 'Tags', ['class' => 'control-label']) !!}
            <button type="button" class="btn btn-primary btn-xs" id="selectbtn-tag">
                Select all
            </button>
            <button type="button" class="btn btn-primary btn-xs" id="deselectbtn-tag">
                Deselect all
            </button>
            {!! Form::select('tag[]', $tags, old('tag'), ['class' => 'form-control select2', 'multiple' => 'multiple', 'id' => 'selectall-tag' ]) !!}
            <p class="help-block"></p>
            @if($errors->has('tag'))
                <p class="help-block">
                    {{ $errors->first('tag') }}
                </p>
            @endif
        </div>
    </div>
    <div class="form-group">
        {{ Form::file('cover_image') }}
    </div>
    {{ Form::submit('Submit', ['class'=>'btn btn-primary']) }}
    {!! Form::close() !!}
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
<script>
    $("#selectbtn-tag").click(function(){
        $("#selectall-tag > option").prop("selected","selected");
        $("#selectall-tag").trigger("change");
    });
    $("#deselectbtn-tag").click(function(){
        $("#selectall-tag > option").prop("selected","");
        $("#selectall-tag").trigger("change");
    });

    $(document).ready(function () {
        $('.select2').select2();
    });
</script>
@endsection
