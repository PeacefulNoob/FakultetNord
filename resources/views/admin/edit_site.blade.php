@extends('layouts.app')

@section('content')

<main class="main-content1  ">
    <div class="container-fluid memd">
        <div class="btnBack" >
            <a class="btn back " href="/admin/albums/all_albums">   @include('components.back')</a>

        </div>
        <div class="jumbotron text-center">
            <h1>   Edit Website</h1> 
            </div>
        <div class="row">

            <div class="divEditAl">
                <form action=" /admin/updateSite/{{$data->id}}" method="POST" enctype="multipart/form-data" style="
                        padding: 20px;
                            ">
                    @csrf
                    <div class="form-group">
                        <input type="text" class="form-control" style=" color:white" name="title" value="{{$data->title}}" id="title" required>
                    </div>
                    <div class="form-group">
                        <textarea class="form-control" style=" color:white" name="description" rows="3" id="description" maxlength="1000" required>{{$data->description}} </textarea>
                    </div>

                    <div class="form-group text-white">
                        <label > Select Media to upload:</label>
                        <input type="file" name="photo" id="photo">
                        <div class="invalid-feedback">
                            Please choose a file.
                        </div>
                    </div>
            
                    <div class="row form-group">

                        <div class="col-md-12" style="text-align:center">
                            <button type="submit" class="btn btn-primary" id="uploadB">SAVE</button>
                        </div>
                    </div>
                </form>

            </div>
            <div class="divEditAlbum">
                <video playsinline autoplay="autoplay" loop muted  width="x" height="y">
                    <source src="/images/{{$data->photo}}" type="video/mp4">
                  </video>
            </div>
        </div>
    </div>
</main>

@endsection