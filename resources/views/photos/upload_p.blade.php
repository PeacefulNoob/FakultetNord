@extends('layouts.app')

@section('content')
<div class="site-wrap ">
    <main class="main-content1">
        <div class="btnBack" >
            <a class="btn " href="/admin/" style="background-color: transparent; color:white;">   @include('components.back')</a>

        </div>
        <div class="jumbotron text-center">
            <h1>   Upload Media</h1> 
            </div>
        <div class="row uploadOpcija">
            <div class="col-6" style="text-align:right">
                <button id="videoButton"> VIDEO </button>
            </div>
            <div class="col-6" style="text-align:left">
                <button id="photoButton"> PHOTO </button>
            </div>
        </div>
        <div class="uploadFift" style=" margin: auto; ">
            <form class="formaUpload" action="{{ action('PhotoController@store') }}"
                name="{{ action('PhotoController@store') }}" method="POST"
                enctype="multipart/form-data">
                <div class="form-group fas">
                    <input type="text" class="form-control" placeholder="Title"
                        style="background-color: white !important; color:black" name="title" id="title" required>
                </div>

                <div class="form-group fas ">
                    <input type="text" class="form-control" placeholder="Location"
                        style="background-color: white !important; color:black" name="location" id="location" required>
                </div>
                <div class="row fas">
                    <div class="form-group col-6">
                        <select class="form-control" id="exampleFormControlSelect1" name="album_id"
                            style="background-color: white !important; color:black" required>
                            <option selected>Album</option>
                            @foreach($albums as $album)
                                <option value="{{ $album->id }}" style="background-color: white !important; color:black">
                                    {{ $album->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-5">
                        <a href="/admin/create" style="color: white;margin:auto;padding-left:20px">+ Add new Album</a>
                    </div>

                </div>


                <div class="form-group fas " id="saveVideo">
                    <div style="padding-top: 10px;">
                        <input type="text" class="form-control" placeholder="Youtube link"
                            style="background-color: white !important; color:black" name="url" id="url">
                    </div>
                </div>


                <div class="form-group fas mt-3" style="text-align: center;" id="saveSliku">
                    <div style="padding-top: 10px; ">
                        <label class="custom-file-upload">
                            <i class="fa fa-cloud-upload"></i> +Add Media
                        </label>
                        <input type="file" class="up" name="photo" id="photo">
                        <div class="invalid-feedback">
                            You need to choose one*
                        </div>
                    </div>
                </div>

                <div class="row form-group">
                    <div class="col-md-4" style="margin:auto">
                        <button type="submit" id="uploadB">save</button>
                    </div>
                </div>
                <input type="hidden" value="{{ csrf_token() }}" name="_token">

            </form>
        </div>
    </main>
</div>
@endsection
