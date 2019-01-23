@extends('layouts.master')
@section('content')
<div class="main-container" style="padding:0px; background-color:#fff; ">

    <link href="https://fonts.googleapis.com/css?family=Droid+Sans:400,700" rel="stylesheet">
    <link rel="stylesheet" href="https://rawgit.com/LeshikJanz/libraries/master/Bootstrap/baguetteBox.min.css">
	
	<div class="container gallery-container">

    <h1>Jamidari Gallery</h1>

    <p class="page-description text-center">See Our Property</p>
    
    <div class="tz-gallery">

        <div class="row">

            <div class="col-sm-12 col-md-4">
                <a class="lightbox" href="{{asset('public/images/gallery/gallery1.jpg')}}">
                    <img src="{{asset('public/images/gallery/gallery1.jpg')}}" height="300px" width="435px">
                </a>
            </div>
            <div class="col-sm-6 col-md-4">
                <a class="lightbox" href="{{asset('public/images/gallery/gallery2.jpg')}}">
                    <img src="{{asset('public/images/gallery/gallery2.jpg')}}" height="300px" width="435px">
                </a>
            </div>
            <div class="col-sm-6 col-md-4">
                <a class="lightbox" href="{{asset('public/images/gallery/gallery3.jpg')}}">
                    <img src="{{asset('public/images/gallery/gallery3.jpg')}}" height="300px" width="435px">
                </a>
            </div>
            <div class="col-sm-6 col-md-4">
                <a class="lightbox" href="{{asset('public/images/gallery/gallery4.jpg')}}">
                    <img src="{{asset('public/images/gallery/gallery4.jpg')}}" height="300px" width="435px">
                </a>
            </div>
            <div class="col-sm-6 col-md-4">
                <a class="lightbox" href="{{asset('public/images/gallery/gallery5.jpg')}}">
                    <img src="{{asset('public/images/gallery/gallery5.jpg')}}" height="300px" width="435px">
                </a>
            </div> 
            <div class="col-sm-6 col-md-4">
                <a class="lightbox" href="{{asset('public/images/gallery/gallery6.jpg')}}">
                    <img src="{{asset('public/images/gallery/gallery6.jpg')}}" height="300px" width="435px">
                </a>
            </div>

        </div>

    </div>

</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.8.1/baguetteBox.min.js"></script>

<script>
    baguetteBox.run('.tz-gallery');
</script>
 
  
@endsection
@section('after_scripts')


@endsection