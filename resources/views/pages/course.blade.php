@extends('layout')
@section('content')
<section class="padding-top-50 padding-bottom-150" id="gioithieu">
    <div class="container block">
       <div class="col-md-6">
            <div class="heading text-center">
                <h4>Tin tuc</h4>
                <div style="border-bottom: 1px solid white;margin-bottom: 10px;"></div>
            </div>
            <div class="tintuc">
            <figure class="snip1563">
                <img src="" alt="sample110" />
                    <figcaption>
                        <h3></h3>
                        <p></p>
                    </figcaption>
                <a href="#"></a>
            </figure>

            </div>
       </div>
        <div class="col-md-6">
        <!-- Main Heading -->
        <div class="heading text-center" id="khoahoc">
          <h4>Khoa hoc</h4>
          <div style="border-bottom: 1px solid white;margin-bottom: 20px;"></div>
      </div>



      <div class="arrival-block-1">
          @foreach ($course as $key => $cou )
          <!-- Item -->
          <div class="item">
              <!-- Images -->
              <img class="img-1" src="{{asset('public/uploads/product/'.$cou->course_image)}}" alt="" > <img class="img-2" src="{{asset('public/uploads/product/'.$cou->course_image)}}" alt="" >
              <!-- Overlay  -->
              <div class="overlay">
                  <!-- Price -->
                  <div class="position-center-center"> <a href="{{asset('public/uploads/product/'.$cou->course_image)}}" data-lighter><i class="fa fa-search"></i></a> </div>
              </div>
              <!-- Item Name -->
              <div class="item-name">
                  <a href="#">{{$cou->course_name}}</a>
              </div>
          </div>
          @endforeach
      </div>
        </div>
    </div>
</section>
@endsection
