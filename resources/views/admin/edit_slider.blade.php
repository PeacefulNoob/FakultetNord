@extends('layouts.app')

@section('content')

<main class="myMain adminMain">
    <div class="container-fluid memd">
        <div class="row" style="padding-bottom:20px">
            <a class="btn back " href="/admin/all_sliders"><i class="fa fa-arrow-left" aria-hidden="true"></i> Nazad</a>

        </div>
        <div class="row">

            <div class="divEditAl">
                <form action="/admin/updateSlider/{{$data->id}}" method="POST" enctype="multipart/form-data" style="padding: 20px;">
                    @csrf
                    <div class="form-group">
                        <input type="text" class="form-control" style="background-color: white !important; color:black" name="title" value="{{$data->title}}" id="title" required>
                    </div>
                    <div class="form-group">
                        <textarea class="form-control" style="background-color: white !important; color:black" name="description" rows="3" id="description" maxlength="240" required>{{$data->description}} </textarea>
                    </div>

                    <div class="form-group text-white">
                        <label style="color:white"> Select Media to upload:</label>
                        <input type="file" name="photo" id="photo">
                        <div class="invalid-feedback text-white">
                            Please choose a file.
                        </div>
                    </div>
                    <input type="checkbox" name="isActive">
                    <label class="text-white">Is slider active?</label><br /><br />
<label class="text-white">{{$data->isActive}} ( 0-no 1-yes) </label>
                    <div class="row form-group">

                        <div class="col-md-12" style="text-align:center">
                            <button type="submit" class="btn btn-primary" id="uploadB">POTVRDI</button>
                        </div>
                    </div>
                </form>

            </div>
            <div class="divEditAlbum">
                <img src="/images/sliders/{{$data->photo}}" style="    width: 100%;
" />
            </div>
        </div>
    </div>
</main>

@endsection