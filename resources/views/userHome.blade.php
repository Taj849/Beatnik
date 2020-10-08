@extends('layouts.adminapp')
@section('body')

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="clearfix">
    <div class="container d-flex h-100">
      <div class="row justify-content-center align-self-center" data-aos="fade-up">
        <div class="col-md-6 intro-info order-md-first order-last" data-aos="zoom-in" data-aos-delay="100">
          <h2>Technology Solutions<br>for Your <span>Business!</span></h2>
          <div>
            <a href="#about" class="btn-get-started scrollto">Get Started</a>
          </div>
        </div>

        <div class="col-md-6 intro-img order-md-last order-first" data-aos="zoom-out" data-aos-delay="200">
          <img src="assets/img/intro-img.svg" alt="" class="img-fluid">
        </div>
      </div>

    </div>
  </section><!-- End Hero -->

  <main id="main">

    <!-- ======= About Section ======= -->
    <section id="about" class="about">

      <div class="container" data-aos="fade-up">
        <div class="row">
          @foreach ($about as $item)
              
          
          <div class="col-lg-5 col-md-6">
            <div class="about-img" data-aos="fade-right" data-aos-delay="100">
              <img src="images/about/{{$item->aboutImage}}" alt="">
            </div>
          </div>

          <div class="col-lg-7 col-md-6">
            <div class="about-content" data-aos="fade-left" data-aos-delay="100">
              <h2>About Us</h2>
              <h3>{{$item->aboutTitle}}</h3>
              <p>{{$item->aboutDetail}}</p>
              @endforeach  
              <ul>
                @foreach ($list as $data)
                <li><i class="ion-android-checkmark-circle"></i> {{$data->aboutList}}</li>
                @endforeach
                
 
              </ul>
            </div>
          </div>
        </div>
      </div>

    </section><!-- End About Section -->

    <!-- ======= Services Section ======= -->
    <section id="services" class="services section-bg">
      <div class="container" data-aos="fade-up">

        <header class="section-header">
          <h3>Services</h3>
          <p>As The Leading Communications Development & Advertising Agency In Dhaka, Beatnik Technology Limited Delivers:</p>
        </header>

        <div class="row">
          @foreach ($service as $s_item)
          <div class="col-md-6 col-lg-4 wow bounceInUp" data-aos="zoom-in" data-aos-delay="100">
            <div class="box">
              <div class="icon" style="background: #fceef3;"><i class="ion-ios-analytics-outline" style="color: #ff689b;"></i></div>
              <h4 class="title"><a href="">{{$s_item->serviceTitle}}</a></h4>
              <p class="description">{{$s_item->serviceDetail}}</p>
            </div>
          </div>
          @endforeach
          
          

      </div>

      </div>
    </section><!-- End Services Section -->

    <!-- ======= Why Us Section ======= -->
    <section id="why-us" class="why-us">
      <div class="container-fluid" data-aos="fade-up">

        <header class="section-header">
          <h3>Make The Ordinary Into Extraordinary</h3>
          <p>Beatnik creative effort aims to convert the ordinary into extraordinary and build authoritative presence. We work on establishing consumer perception, build value & successfully present and communicate that value to the consumer.</p>
        </header>

        <div class="row">

          <div class="col-lg-6" data-aos="zoom-in" data-aos-delay="100">
            <div class="why-us-img">
              <img src="assets/img/why-us.jpg" alt="" class="img-fluid">
            </div>
          </div>

          <div class="col-lg-6">
            <div class="why-us-content">
              <p>
             Crafting a compelling websites can sometimes become a hard task. This is where our years of knowledge and deep understanding of user habits and behaviors comes in handy to design websites that are lucrative. We believe that your online presence - is your business front, it is a gateway to infinite scalability.
              </p>

              <div class="features clearfix" data-aos="fade-up" data-aos-delay="100">
                <i class="fa fa-diamond" style="color: #f058dc;"></i>
                <h4>One Stop Destination</h4>
                <p>We are one stop destination for all kind of web development services and marketing solutions.</p>
              </div>

              <div class="features clearfix" data-aos="fade-up" data-aos-delay="200">
                <i class="fa fa-object-group" style="color: #ffb774;"></i>
                <h4>Expertise & Specialization</h4>
                <p>We are experts and specializes in application development, website design, digital marketing, E-commerce services, SEO, content management and marketing.</p>
              </div>

            </div>

          </div>

        </div>

      </div>

      <div class="container">
        <div class="row counters" data-aos="fade-up" data-aos-delay="100">

          <div class="col-lg-3 col-6 text-center">
            <span data-toggle="counter-up">274</span>
            <p>Clients</p>
          </div>

          <div class="col-lg-3 col-6 text-center">
            <span data-toggle="counter-up">421</span>
            <p>Projects</p>
          </div>

          <div class="col-lg-3 col-6 text-center">
            <span data-toggle="counter-up">1,364</span>
            <p>Hours Of Support</p>
          </div>

          <div class="col-lg-3 col-6 text-center">
            <span data-toggle="counter-up">18</span>
            <p>Hard Workers</p>
          </div>

        </div>

      </div>
    </section><!-- End Why Us Section -->

    <!-- ======= Call To Action Section ======= -->
    <section id="call-to-action" class="call-to-action">
      <div class="container" data-aos="zoom-out">
        <div class="row">
          <div class="col-lg-9 text-center text-lg-left">
            <h3 class="cta-title">Get a quote now</h3>
            <p class="cta-text"> Contact us today and discuss, how we can develop a mutually beneficial and long term relationship!</p>
          </div>
          <div class="col-lg-3 cta-btn-container text-center">
            <a class="cta-btn align-middle" href="#">Get a quote now</a>
          </div>
        </div>

      </div>
    </section><!--  End Call To Action Section -->

    <!-- ======= Portfolio Section ======= -->
    <section id="portfolio" class="portfolio section-bg">
      <div class="container" data-aos="fade-up">

        <header class="section-header">
          <h3 class="section-title">Our Portfolio</h3>
        </header>
        @php
            $data=0;
            $image=0;
        @endphp
        <div class="row" data-aos="fade-up" data-aos-delay="100">
          <div class="col-lg-12">
            <ul id="portfolio-flters">
              <li data-filter="*" class="filter-active">All</li>
              @for ($j = 0; $j < $i; $j++)
                  @php
                      $count=count($portfolio_name[$j]);
                  @endphp
                  @for ($k = 0; $k < $count; $k++)
                      @if ($portfolio_name[$j][$k]->categoryTitles_id!=$data)
                      <li data-filter=".filter-{{$portfolio_name[$j][$k]->categoryName}}">{{$portfolio_name[$j][$k]->categoryName}}</li>
                          @php
                               $data=$portfolio_name[$j][$k]->categoryTitles_id;
                          @endphp
                      @endif
                  @endfor
              @endfor
            </ul>
          </div>
        </div>

        <div class="row portfolio-container" data-aos="fade-up" data-aos-delay="200">
          @for ($j = 0; $j < $i; $j++)
                  @php
                      $count=count($portfolio_name[$j]);
                  @endphp
                  @for ($k = 0; $k < $count; $k++)
                      @if ($portfolio_name[$j][$k]->categoryTitles_id!=$image)
                      <div class="col-lg-4 col-md-6 portfolio-item filter-{{$portfolio_name[$j][$k]->categoryName}}">
                        <div class="portfolio-wrap">
                          <img src="/images/portfolio/{{$portfolio_name[$j][$k]->prject_image}}" class="img-fluid" alt="">
                          <div class="portfolio-info">
                            <h4><a href="portfolio-details.html">{{$portfolio_name[$j][$k]->categoryName}}</a></h4>
                            <p>{{$portfolio_name[$j][$k]->categoryName}}</p>
                            <div>
                              <a href="/images/portfolio/{{$portfolio_name[$j][$k]->prject_image}}" data-gall="portfolioGallery" title="App 1" class="link-preview venobox"><i class="ion ion-eye"></i></a>
                              <a href="/portfolio-details/{{$portfolio_name[$j][$k]->categoryTitles_id}}/{{$portfolio_name[$j][$k]->categoryName}}" class="link-details" title="More Details"><i class="ion ion-android-open"></i></a>
                            </div>
                          </div>
                        </div>
                      </div>
                          @php
                               $image=$portfolio_name[$j][$k]->categoryTitles_id;
                          @endphp
                      @endif
                  @endfor
              @endfor


            </div>
          </div>

        </div>

      </div>
    </section><!-- End Portfolio Section -->

   
    <!-- ======= F.A.Q Section ======= -->
    <section id="faq" class="faq">
      <div class="container" data-aos="fade-up">
        <header class="section-header">
          <h3>Frequently Asked Questions</h3>
        </header>
        <ul id="faq-list" data-aos="fade-up" data-aos-delay="100">
          @php
              $w=1;
          @endphp
          @foreach ($question as $q_item)
          <li>
            <a data-toggle="collapse" class="collapsed" href="#faq{{$w}}">{{$q_item->questionTitle}} <i class="ion-android-remove"></i></a>
            <div id="faq{{$w}}" class="collapse" data-parent="#faq-list">
              <p>
                {{$q_item->questionDetail}}
              </p>
            </div>
          </li>
          @php
              $w++;
          @endphp
          @endforeach
          

         
        </ul>

      </div>
    </section><!-- End F.A.Q Section -->

  </main><!-- End #main -->

  @endsection