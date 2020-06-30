@extends('layouts.app')

@section('content')
<div class="">

@if(count($sliders)>0)
<main class="main-content1  ">
    <div class="container-fluid ">
        <div class="btnBack" >

            <a class="btn back " href="/admin/">@include('components.back')</a>
        </div>
        <div class="jumbotron text-center">
            <h1>Sliders Grid</h1> 
            </div>
        <div class="allAlRow">
            @foreach($sliders as $slider)

            <div class="card" style="width: 22rem;    margin: auto;">
                <a href="/admin/edit_slider/{{$slider->id}}">

                    <img class="card-img-top allAlimg" src="/images/sliders/{{$slider->photo}}" alt="Card image cap">

                </a>
                <div class="card-body">
                    <h5 class="card-title" style="text-align: center;">
                        {{$slider->title}}</h5>
                    <div class="row">
                        <!-- <div class="col-md-6 editAlbum ">
                            <a href="/admin/edit_slider/{{$slider->id}}">
                                <button type="button" class="btnEdit">Edit</button>
                            </a>
                        </div> -->
                        <!--          <div class="col-md-6 deleteAlbum ">

                            <form action="/admin/deleteSlider/{{$slider->id}}" method="POST" enctype="multipart/form-data">
                                <input type="hidden" value="{{ csrf_token() }}" name="_token">
                                <button type="submit" class="btnError1">Delete</button>
                            </form>
                        </div> -->
                    </div>

                </div>
            </div>

            @endforeach
        </div>
    </div>
</main>
@else
<p style="color:white">No sliders</p>
@endif
</div>

@endsection