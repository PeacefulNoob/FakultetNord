@extends('layouts.app')

@section('content')
<main class="myMain adminMain mem">
  <div class="container-fluid photos">
    <div class="row" style="padding-bottom:20px">

      <a class="btn btnDodajMedia" href="/admin/albums/all_albums">Sve Kategorije</a>

    </div>
    <div class="row" style="padding-bottom:20px">

      <a class="btn btnDodajMedia" href="/admin/photos/upload_p/">+Dodaj video/fotografiju</a>

    </div>
    <table class="table table-hover">
      <thead>
        <tr>
          <th>Naslov</th>
          <th>Kategorija</th>
          <th>Lokacija</th>
          <th>Kreirano</th>
          <th>Forma</th>
        </tr>
      </thead>
      <tbody>

        @foreach($photos as $photo)
        <tr>
          <th class="borderT">{{$photo->title}}</th>
          @php
          $album = DB::table('albums')->where('id', $photo->album_id)->first();
          @endphp

          @if($album)
          <th class="borderT">{{$album->name}}</th>
          @else
          <th class="borderT">Nema Album</th>
          @endif
          <th class="borderT">{{$photo->location}}</th>
          <th class="borderT">{{$photo->created_at}}</th>
          @if($photo->media_type == 'png'|| $photo->media_type == 'jpg' || $photo->media_type == 'svg'|| $photo->media_type == 'PNG'|| $photo->media_type == 'mp4')
          <th class="borderT"><img src="/images/thumbnail/{{$photo->thumbnail}}" style="height: 73px;width: 100px;" /></th>
          @else
          <th class="borderT"><img src="{{$photo->thumbnail}}" style="height: 73px;width: 100px;" /></th>

          @endif
          <th> <a href="/admin/photos/edit_photo/{{$photo->id}}"> <img class="imgEdit" style="color:white;" src="/images/iconfinder_edit_2561427.svg" /></th>
          <form action="/admin/photos/delete/{{$photo->id}}" method="POST" enctype="multipart/form-data">
            <input type="hidden" value="{{ csrf_token() }}" name="_token">
          </form>

        </tr>
        @endforeach
      </tbody>
    </table>

  </div>
</main>

@endsection