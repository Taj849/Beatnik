@extends('layouts.adminapp')
@section('body')
<main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
      <div class="container">

        <ol>
          <li><a href="{{url('/')}}">Home</a></li>
          <li>Portfolio Details</li>
        </ol>
        <h2>Portfolio Details</h2>

      </div>
    </section><!-- End Breadcrumbs -->

    <!-- ======= Portfolio Details Section ======= -->
    <section id="portfolio-details" class="portfolio-details">
      <div class="container" data-aos="fade-up">

        <div class="portfolio-details-container">

          <div class="owl-carousel portfolio-details-carousel">
            @foreach ($get_image as $item)
            <img style="width: 100%;height:600px;" src="/images/portfolio/{{$item->prject_image}}" class="img-fluid" alt="">
            @endforeach
          </div>

          <div class="portfolio-info">
            <h3>Project information</h3>
            <ul>
              @foreach ($portfolio_details as $data)
              <li><strong>Category</strong>: {{$categoryName}}</li>
              <li><strong>Client</strong>: {{$data->categoryClient}}</li>
              <li><strong>Project date</strong>: {{$data->prjectDate}}</li>
              <li><strong>Project URL</strong>: <a href="{{$data->prjectUrl}}">{{$data->prjectUrl}}</a></li> 
              @endforeach
              
            </ul>
          </div>

        </div>

        <div class="portfolio-description">
          @foreach ($portfolio_details as $data)
          <h2>{{$data->prjectTitle}}</h2>
          <p>
            {{$data->prjectDetail}}
           </p>
          @endforeach
          
        </div>

      </div>
    </section><!-- End Portfolio Details Section -->

  </main><!-- End #main -->    
@endsection