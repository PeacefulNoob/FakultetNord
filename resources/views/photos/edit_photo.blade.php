
@extends('layouts.app')

@section('content')
<main  class="main-content1 ">
    <div class="container-fluid memd">
        <div class="btnBack" >
            <a class="btn " href="/admin/" style="background-color: transparent; color:white;">   @include('components.back')</a>

        </div>
        <div class="jumbotron text-center">
            <h1>   Edit Media</h1> 
            </div>
        <div class="row">
          
            <div class="divEditAl">
                <form action=" /admin/photos/updatePhoto/{{$data->id}}" name=" /admin/photos/updatePhoto/{{$data->id}}" method="POST" enctype="multipart/form-data">

                    @csrf
                    <div class="form-group">
                        <input type="text" class="form-control" style="background-color: white !important; color:black" name="title" value="{{$data->title}}" id="title" required>
                    </div>

                    <div class="form-group">
                        <input type="text" class="form-control" style="background-color: white !important; color:black" value="{{$data->location}}" name="location" id="location" required>
                    </div>
                    <div class="row fas">
                        <div class="form-group col-6">
                            <select class="form-control" id="exampleFormControlSelect1" name="album_id" style="background-color: white !important; color:black" required>
                                <option value="{{$data->album_id}}" style="background-color: white !important; color:black">{{$data->album_id}}</option>
                                @foreach($albums as $album)
                                <option value="{{$album->id}}" style="background-color: white !important; color:black">{{$album->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-6">
                            <a href="/admin/create" style="color: white;margin:auto;padding-left:20px">+ Add Album</a>
                        </div>

                    </div>
                    @if($data->url)
                    <div class="form-group">
                        <label style="color:white" for="location">Video Url</label>
                        <input type="text" class="form-control" style="background-color: white !important; color:black" value="{{$data->url}}" name="url" id="url" required>
                    </div>

                    @else
                    <div class="form-group mt-3 fas" style="text-align: center;">
                        <label class="custom-file-upload">
                            <i class="fa fa-cloud-upload"></i>+Add Picture
                        </label>
                        <input type="file" class="up" name="photo" id="photo">
                        <div class="invalid-feedback">
                            You need to choose one*
                        </div>
                    </div>

                    <div class="form-group mt-3 fas" style="text-align: center;">
                        <label class="custom-file-upload">
                            <i class="fa fa-cloud-upload"></i>+Add thumbnail
                        </label>
                        <input class="up" type="file" name="thumbnail" />
                        <div class="invalid-feedback">
                            You need to choose one*
                        </div>
                    </div>
                    @endif



                    <div class="row epb">
                        <div class="col-4 form-group" style="margin: auto;">
                            <button type="submit" class="btn editB " id="uploadB">SAVE</button>
                        </div>
                    </div>


                </form>

                <div class="col-4 form-group" style="margin: auto;padding-top:20px">
                    <form action="/admin/photos/destroy/{{$data->id}}" method="POST" enctype="multipart/form-data">
                        <input type="hidden" value="{{ csrf_token() }}" name="_token">
                        <button type="submit" class="btn btnError">delete</button>
                    </form>
                </div>
            </div>
            <div class="divEditAlbum">
                @if($data->media_type == 'png'|| $data->media_type == 'jpg' || $data->media_type == 'svg'|| $data->media_type == 'PNG')
                <th class="borderT"><img src="/images/thumbnail/{{$data->thumbnail}}" style="width: 100%;" /></th>
                @else
                <th class="borderT"><img src="{{$data->thumbnail}}" style="width: 100%;" /></th>

                @endif
            </div>

        </div>
    </div>

</main>

@endsection