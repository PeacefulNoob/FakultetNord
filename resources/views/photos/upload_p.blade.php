@extends('layouts.app')

@section('content')
<div class="site-wrap">
    <main class="memd">
        <div class="row" style="padding-bottom:20px">
            <a class="btn back " href="/admin/ "><i class="fa fa-arrow-left" aria-hidden="true"></i> Nazad</a>
        </div>
        <div class="row uploadOpcija">
            <div class="col-6" style="text-align:right">
                <button id="videoButton"> VIDEO </button>
            </div>
            <div class="col-6" style="text-align:left">
                <button id="photoButton"> FOTO </button>
            </div>
        </div>
        <div class="uploadFift" style=" margin: auto; ">
            <form class="formaUpload" action="{{ action('PhotoController@store') }}" name="{{ action('PhotoController@store') }}" method="POST" enctype="multipart/form-data">
                <div class="form-group fas">
                    <input type="text" class="form-control" placeholder="Naslov" style="background-color: white; color:black" name="title" id="title" required>
                </div>

                <div class="form-group fas ">
                    <input type="text" class="form-control" placeholder="Lokacija" style="background-color: white; color:black" name="location" id="location" required>
                </div>
                <div class="row fas">
                    <div class="form-group col-6">
                        <select class="form-control" id="exampleFormControlSelect1" name="album_id" style="background-color: white; color:black" required>
                            <option selected>Kategorija</option>
                            @foreach($albums as $album)
                            <option value="{{$album->id}}" style="background-color: white; color:black">{{$album->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-5">
                        <a href="/admin/create" style="color: white;margin:auto;padding-left:20px">+ Dodaj Kategoriju</a>
                    </div>

                </div>


                <div class="form-group fas " id="dodajVideo">
                    <div style="padding-top: 10px;">
                        <input type="text" class="form-control" placeholder="Youtube link" style="background-color: white; color:black" name="url" id="url">
                    </div>
                </div>


                <div class="form-group fas mt-3" style="text-align: center;" id="dodajSliku">
                    <div style="padding-top: 10px; ">
                        <label class="custom-file-upload">
                            <i class="fa fa-cloud-upload"></i> +dodaj Sliku
                        </label>
                        <input type="file" class="up" name="photo" id="photo">
                        <div class="invalid-feedback">
                            Nijedna datoteka nije odabrana*
                        </div>
                    </div>
                </div>

                <div class="row form-group">
                    <div class="col-md-4" style="margin:auto">
                        <button type="submit" id="uploadB">DODAJ</button>
                    </div>
                </div>
                <input type="hidden" value="{{ csrf_token() }}" name="_token">

            </form>
        </div>
    </main>
</div>
@endsection