@extends('layouts.main')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="d-block w-100" src="https://dummyimage.com/600x400/948894/2a39bf&text=first" alt="First slide">
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="https://dummyimage.com/600x400/948894/2a39bf&text=second" alt="Second slide">
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="https://dummyimage.com/600x400/948894/2a39bf&text=third" alt="Third slide">
                </div>
            </div>
        </div>
    </div>
</div>
@endsection