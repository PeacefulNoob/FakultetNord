@extends('layouts.app')

@section('content')
<div class="site-wrap ">

    <main class="main-content1 ">
        <div class="container-fluid">
            <div class="btnBack" >
                <a class="btn " href="/admin/photos/upload_p/" style="background-color: transparent; color:white;">                
                        @include('components.back')     
                </a>

            </div>
            <div class="row justify-content-center">

                <div class="col-md-5 pt-3">
                    <div class= "jumbotron text-center">
                    <h3 style="color:white;"> Add New Slider </h3>
                </div>
                    <form action="{{ action('SliderController@store') }}" method="POST" enctype="multipart/form-data">
                        <div class="form-row">
                            <div class="form-group  formaAddAlb">
                                <label style="color:white;width: 100%;" for="name">Title</label>
                                <input type="text" style="background-color: white !important; color:black" name="title" id="name" required>
                            </div>
                        </div>
                        <div class="form-group formaAddAlb">
                            <label style="color:white" for="description">Description</label>
                            <textarea class="form-control" style="background-color: white !important; color:black" name="description" rows="3" maxlength="240" id="description">  </textarea>
                        </div>
                        <div class="form-group formaAddAlb text-white" style=" padding-bottom:20px">
                            <label> Select file to upload:</label>
                            <input type="file" style="background-color: white !important; color:black; " name="photo" id="photo">
                            <div class="invalid-feedback">
                                Please choose a file.
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary" id="uploadB">Upload</button>

                        <input type="hidden" value="{{ csrf_token() }}" name="_token">

                    </form>

                    <script>

                    </script>
                </div>
            </div>
        </div>
    </main>
    @endsection