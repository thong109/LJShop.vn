@extends('layout')
@section('content')
<section id="hoatdong">
    <div class="container">
        <!-- Main Heading -->
        <div class="heading text-center" >
            <h4>Hoạt động</h4>
            <div style="border-bottom: 1px solid white;margin-bottom: 10px;"></div>
        </div>
    </div>
    <!-- New Arrival -->
    <div class="arrival-block container">
        <!-- Item -->@foreach ($activity as $key =>$acti)
        <div class="item">
            <!-- Images -->
            <img class="img-1" src="{{asset('public/uploads/product/'.$acti->activity_image)}}" alt="" > <img class="img-2" src="{{asset('public/uploads/product/'.$acti->activity_image)}}" alt="" >
            <!-- Overlay  -->
            <div class="overlay">
                <!-- Price -->
                <div class="position-center-center"> <a href="{{asset('public/uploads/product/'.$acti->activity_image)}}" data-lighter><i class="fa fa-eye"> Preview</i></a> </div>
            </div>

        </div>
        @endforeach
    </div>

</section>
@endsection
