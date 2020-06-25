@extends('layouts.main')

@section('content')
<div class="site-wrap">
  <section class="section-1" id="section-1">

    <div id="myIndex" class="herovideo">
      <video playsinline autoplay="autoplay" loop muted id="bgvideo" width="x" height="y">
        <source src="/images/{{$site->photo}}" type="video/mp4">
      </video>
      <div class="home-content">
        <div class="row home-content__main">
          <div class="naslov">
            <h1>

              {{$site->title}}

            </h1>
            <h3>Product and Real Estate video & photography specialists

            </h3>
          </div>
          <p class="textUvod"> {{$site->description}}
          </p></br>
        </div>
      </div>
      <ul class="home-social">

        <li><a href="https://www.facebook.com/pg/nordphotosandvideos/about/?ref=page_internal" target="_blank">
            <i class="fa fa-facebook"></i>
          </a></li>
        <li><a href="https://www.instagram.com/nordphotosandvideos/?fbclid=IwAR3h3gXVaK-BhBNbWXY9N3IFy9J-_5BhxMgx0prGpiya6tSwY_nsjr0xtC4" target="_blank">
            <i class="fa fa-instagram"></i>
          </a></li>
        <li><a href="https://www.youtube.com/channel/UClx7DimS-Cl0dx2H13Bz1PQ" target="_blank">
            <i class="fa fa-youtube"></i>
          </a></li>
      </ul>
      <div class="scrollDiv">
        <a href="#section-2" class="mouse smoothscroll">
          <span class="mouse-icon">
            <span class="mouse-wheel"></span>
          </span>

        </a>

      </div>
    </div>

    @if(count($photos)>0)

  </section>

  <section class="section section-2" id="section-2">

    @if(count($albums)>0)
    <?php
    $colcount = count($albums);
    $i = 1;
    ?>
    <div class="main-content">

      <div class=" jumbotron-fluid ourLate">
        <div class="container-fluid ">
          <h1>Our latest projects</h1>
          <hr class="my-4">


        </div>
      </div>
      <div class="container-fluid ">


        <div class="glavniR">
          @foreach($albums as $album)
          <div class="col-sm-6	col-md-6	col-lg-3	col-xl-3   {{$album->id}} pb-2  pl-2" data-aos="zoom-in-up" data-aos-once="true">
            <div id="mediaContainer" class="mediaDiv glry-img ">
              <a class="cat" href="/app/gallery_media/{{$album->id}}">
                <img class="picInd" data-src="/images/cover_image/{{$album->cover_image}}" alt="Cover picture">
                <div class="overlay_index">
                  <div class=" headOver">
                    <img src="/images/cover_image/logos/{{$album->logo_image}}" alt=" Logo Image">
                  </div>
                </div>
              </a>
            </div>
          </div>
          <?php
          if ($i++ == 3)
            break;
          ?>

          @endforeach
          <div class="showMore">
            <a href="/galeries">
              <svg class="ov-visible" xmlns="http://www.w3.org/1500/svg" width="100" height="55" viewBox="0 0 90 55">
   <defs>
   <style>.a{fill:black;transition: 0.3s ease;}
     
   </style>
   </defs>
   <rect class="a" id ="square0" width="15" height="17"/>
   <rect class="a" id ="square1" width="15" height="17" transform="translate(0 25)"/>
   <rect class="a" id ="square2" width="15" height="17" transform="translate(25)"/>
   <rect class="a" id ="square3"  width="15" height="17" transform="translate(25 25)"/>
   <rect class="a" id ="square4" width="15" height="17" transform="translate(50)"/>
   <rect class="a" id ="square5" width="15" height="17" transform="translate(75)"/>
   <rect class="a" id ="square6" width="15" height="17" transform="translate(50 25)"/>
   <rect class="a" id ="square7" width="15" height="17" transform="translate(75 25)"/>
   
   </svg>
             </a>
          </div>
        </div>
      </div>
    </div>

    @else
    <p style="color:white">No Albums</p><!--  -->
    @endif
  </section>
  <section class="section section-3" id="section-3">
    <div class="main-content sliders ">

      <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
          <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
          <div class="carousel-item active">
            
            <img class="d-block w-100 sliderslika" src="/images/scott-walsh-CQl3Y5bV6FA-unsplash_1593071724.jpg" alt="First slide">
          </div>       
          @if(count($sliders)>0) 
            @foreach($sliders as $slider)
            <div class="carousel-item ">
              <img class="d-block w-100 sliderslika" src="/images/sliders/{{$slider->photo}}" alt="{{$slider->title}}">
            </div>     
            @endforeach
@else

<div class="carousel-item active">
  <img class="d-block w-100 sliderslika" src="/images/noImgAvatar.jpg" alt="No Images">
</div>   
@endif
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>
    </div>
  </section>
  <section class="section section-4" id="section-4">
    <div class="main-content my-5">

      <div class=" jumbotron-fluid ourLate">
        <div class="container-fluid">
          <h1>List of our media</h1>
          <hr class="my-4">

        </div>
      </div>
      <div class="container-fluid photos">

        <div id="myBtnContainer">
          <div class="dx">
            <button class="btn active" onclick="filterSelection('all')"> Show all</button>
            @if(count($albums)>0)
            @foreach($albums as $album)

            <button class="btn" onclick="filterSelection('{{$album->id}}')">{{$album->name}} </button>

            @endforeach
            @endif
          </div>
        </div>
        <div class="glavniR" id="glavni">
          @foreach($photos as $photo)
          @if($photo->media_type == 'png'|| $photo->media_type == 'jpg' || $photo->media_type == 'svg'|| $photo->media_type == 'PNG')

          <div class="col-sm-6	col-md-6	col-lg-3	col-xl-3  {{$photo->album_id}}" data-aos="zoom-in-up" data-aos-once="true">
            <div id="mediaContainer" class="mediaDiv glry-img">
              <img class="picInd" onclick="changeIt(this)" data-src="/images/thumbnail/{{$photo->thumbnail}}" data-value="{{$photo->id}}" name="/images/{{$photo->photo}}" alt="{{$photo->title}}">
              <div class="overlay">
                <div class="col-md-6 headOver">
                  <h4 class="heading">{{$photo->title}}</h4>
                </div>
                <div class="col-md-6 bodyOver">
                  <p class="locationPic"> {{$photo->location}} <i class="fa fa-map-marker" aria-hidden="true"></i></p>
                  <p class="datumPic"> {{$photo->updated_at}} <i class="fa fa-calendar" aria-hidden="true"></i></p>
                </div>
              </div>
            </div>
          </div>
          @else
          <div class="col-sm-6	col-md-6	col-lg-3	col-xl-3  {{$photo->album_id}}" data-aos="zoom-in-up" data-aos-once="true">

            @if($photo->photo == "null")
            <div id="mediaContainer" class="mediaDivV" data-toggle="modal" data-target="#modal1" data-myvalue="https://www.youtube.com/embed/{{$photo->url}}" data-index="{{$photo->id}}">
              <img class="picInd" src="{{$photo->thumbnail}}" />
              @else
              <div id="mediaContainer" class="mediaDivV" data-toggle="modal" data-target="#modal1" data-myvalue="/images/{{$photo->photo}}" data-index="{{$photo->id}}">
                <img class="picInd" data-src="/images/thumbnail/{{$photo->thumbnail}}" />
                @endif
                <span class="ikonica"><img src="/images/Play-BUTTON.svg"></span>
                <div class="overlay">
                  <div class="col-md-6 headOver">
                    <h4 class="heading">{{$photo->title}}</h4>
                  </div>
                  <div class="col-md-6 bodyOver">
                    <p class="locationPic"><i class="fa fa-map-marker" aria-hidden="true"></i>{{$photo->location}}</p>
                    <p class="datumPic"> <i class="fa fa-calendar" aria-hidden="true"></i> {{$photo->updated_at}}</p>
                  </div>
                </div>
              </div>
            </div>

            @endif
            @endforeach
          </div>
        </div>
      </div>

    @else
    <p style="color:white">No photos</p>
    @endif
</div>
</section>

</div>

@endsection