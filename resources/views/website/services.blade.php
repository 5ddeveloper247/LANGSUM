<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Biztek</title>

  <!-- Favicon -->
  <link rel="shortcut icon" href="images/biztek-logo.png" />

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Archivo:400,500,600,700&amp;display=swap">

  <!-- CSS Global Compulsory (Do not remove)-->
  <link rel="stylesheet" href="css/font-awesome/all.min.css" />
  <link rel="stylesheet" href="css/flaticon/flaticon.css" />
  <link rel="stylesheet" href="css/bootstrap/bootstrap.min.css" />

  <link rel="stylesheet" href="css/owl-carousel/owl.carousel.min.css" />
  <link rel="stylesheet" href="css/swiper/swiper.min.css" />
  <link rel="stylesheet" href="css/animate/animate.min.css" />
  <link rel="stylesheet" href="css/magnific-popup/magnific-popup.css" />

  <!-- Template Style -->
  <link rel="stylesheet" href="css/style.css" />
  <style>
    .side-menu {
      width: 20%;
      display: flex;
      justify-content: center;
    }

    .sticky-side-menu {
      position: sticky;
      top: calc(90px + 35px);
      height: 100%;
    }

    .side-menu ul li {
      margin-bottom: 20px;
    }

    .side-menu ul li a {
      display: block;
      padding: 8px 0 8px 20px;
      border-left: 1px solid #000;
      color: #000;
      font-size: 12px;
      transition: all 0.2s ease-in-out;
    }

    .side-menu ul li a.side-menu-active {
      border-left: 1px solid #FFA500;
      color: #FFA500;
      font-weight: 500;
      transition: all 0.2s ease-in-out;

    }

    .side-menu ul li a:hover {
      border-left: 1px solid #FFA500;
      color: #FFA500;
    }

    .main-menu {
      width: 80%;
    }

    /* .main-menu-inner{
      margin-top: 88px;
    } */
    #business-benefits span {
      font-size: 14px;
    }

    #business-benefits .nav-pills .nav-link {
      font-size: 14px;
    }

    #business-benefits .nav-pills .nav-link:after {
      content: none;
      font-family: "Font Awesome 5 Free";
      font-weight: bold;
      opacity: 0;
      position: absolute;
      right: 20px;
      top: 50%;
    }

    #business-benefits .nav-pills .nav-link:hover {
      color: #FFA500;
      background: transparent;
      padding-left: 15px !important;
    }

    .show-more {
      color: #FFA500;

    }

    #development-process {
      background: #242424;
    }

    #development-process .nav-pills .nav-link {
      font-size: 14px;
      color: #fff;
    }

    #development-process .nav-pills .nav-link:hover {
      font-size: 14px;
      color: #FFA500;
    }

    #development-process .nav-pills .nav-link.active {
      font-size: 14px;
      color: #FFA500;
    }

    #development-process .nav-pills .nav-link:after {
      content: none;
      font-family: "Font Awesome 5 Free";
      font-weight: bold;
      opacity: 0;
      position: absolute;
      right: 20px;
      top: 50%;
    }

    .development-icon {
      width: 48px;
      height: 48px;
      font-size: 28px;
      padding: 5px;
      transition: all 0.2s ease-in-out;
    }

    #industry-expertie .nav-pills .nav-link {
      font-size: 14px;
      width: 100%;
      min-height: 125px;
      padding: 15px 25px;
      display: flex;
      align-items: end;
    }

    #industry-expertie .nav-pills .nav-link:hover {
      font-size: 14px;
    }

    #industry-expertie .nav-pills .nav-link.active {
      font-size: 14px;
      display: flex;
      align-items: end;
      color: black;
      width: 100%;
      min-height: 125px;
      padding: 15px 25px;
      border: 1px solid #f6f6f6;
      background-color: #FFA500;
    }

    #industry-expertie .nav-pills .nav-link:after {
      content: none;
      font-family: "Font Awesome 5 Free";
      font-weight: bold;
      opacity: 0;
      position: absolute;
      right: 20px;
      top: 50%;
    }

    #industry-expertie ul li:hover {
      background-color: #dde0ed;
      color: #000;
    }

    .industry-expertise-img {
      width: 30%;
    }
    .industry-expertise-img img{
      height: 100%;
    }
    @media screen and (max-width: 768px) {
      .industry-expertise-img img{
      height: 50vh;
    }
}

    .industry-expertise-content {
      width: 70%;
    }

    #industry-expertie-tabContent {
      min-height: 442px;
    }

    #technologies .nav-pills .nav-link {
      font-size: 16px;
      margin: 0 25px;
    }

    #technologies .nav-pills .nav-link:after {
      content: none;
      font-family: "Font Awesome 5 Free";
      font-weight: bold;
      opacity: 0;
      position: absolute;
      right: 20px;
      top: 50%;
    }

    #technologies .nav-pills .nav-link:hover {
      color: #FFA500;
      background: transparent;
    }

    #technologies .nav-pills .nav-link.active {
      border-bottom: 2px solid #FFA500;
    }

    #technologies ul li a {
      padding-bottom: 10px;
    }

    .tile {
      display: flex;
      flex-direction: column;
      padding: 50px 30px;
      box-shadow: 0px 12px 30px rgba(103, 180, 106, 0.1);
      transition: all 0.2s ease-in-out;
    }

    .tile:hover {
      scale: 1.1;
    }

    .accordion-border {
      border-left: 2px solid #000;
      border-radius: 0px;
      padding: 2px 10px;
      color: #000;
    }
    @media screen and (max-width: 768px) {
      .accordion-border {
      padding: 2px 5px;
    }
}

    .accordion-border:focus {
      border-left: 2px solid #FFA500;
      color: #FFA500;
    }

    .accordion-border:hover {
      border-left: 2px solid #FFA500;
      color: #FFA500;
    }

    .owl-prev {
      transform: rotate(180deg);
      cursor: pointer;
    }

    .owl-next {
      cursor: pointer;
    }

    .main-carosal {
      position: relative;
    }

    .custom-nav {
      position: absolute;
      right: 0;
      bottom: 0;
    }

    @keyframes sliderr-carosal {
      from {
        transform: translateX(0);
      }

      to {
        transform: translateX(-100%);
      }
    }

    .slider-carosal {
      overflow: hidden;
      padding: 60px 0;
      /* background: white; */
      white-space: nowrap;
      position: relative;
    }

    .slider-carosal:before,
    .slider-carosal:after {
      position: absolute;
      top: 0;
      width: 250px;
      height: 100%;
      content: "";
      z-index: 2;
    }

    .slider-carosal:before {
      left: 0;
      /* background: linear-gradient(to left, rgba(255, 255, 255, 0), white); */
    }

    .slider-carosal:after {
      right: 0;
      /* background: linear-gradient(to right, rgba(255, 255, 255, 0), white); */
    }

    .slider-carosal:hover .slides_carosal {
      animation-play-state: paused;
    }

    .slides_carosal {
      display: inline-block;
      animation: 15s sliderr-carosal infinite linear;
    }

    .slides_carosal img {
      height: 25px;
      margin: 0 40px;
      filter: grayscale(1);
    }

    .dark-bg {
      background-color: #242424;
      height: 100%;
    }

    .icon.xl {
      min-width: 80px;
      width: 80px;
      height: 80px;
    }

    .icon.s {
      height: 16px;
    }

    .message-text-area {
      min-height: 150px;
    }

    .required-text {
      display: flex;
      align-items: center;
    }

    .required-text::before {
      display: block;
      width: 5px;
      height: 5px;
      margin: 0 5px;
      border-radius: 100%;
      background: #96e199;
      content: '';
    }

    .section__bg {
      background-image: url("https://addepto.com/wp-content/themes/addepto/img/banner--service.webp");
      opacity: 0.8;
      background-position: center;
    }

    .services-card {
      background-color: black;
    }
  </style>
</head>

<body class="bg-light">
  <!--=================================
    header -->
  <header class="header">
    <div class="container">
      <div class="row">
        <div class="col-sm-12">
          <nav class="navbar navbar-static-top navbar-expand-lg">
            <button type="button" class="navbar-toggler" data-toggle="collapse" data-target=".navbar-collapse"><i class="fas fa-align-left"></i></button>
            <a class="navbar-brand" href="{{url('home')}}">
              <img class="img-fluid" src="images/biztek-logo.png" alt="logo">
            </a>
            <div class="navbar-collapse collapse">
              <ul class="nav navbar-nav">
                <li class="nav-item">
                  <a class="nav-link" href="{{url('home')}}" role="button">Home</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="{{url('about-us')}}" role="button">About</a>
                </li>
                <li class="nav-item active">
                  <a class="nav-link" href="{{url('services')}}" role="button">Services</a>
                </li>
                <li class="dropdown nav-item">
                  <a href="project-list.html" class="nav-link" data-toggle="dropdown">Projects</a>
                  <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="{{url('project-list')}}">Project List<i class="fas fa-arrow-right"></i></a></li>
                    <li><a class="dropdown-item" href="{{url('project-details')}}">Project Details<i class="fas fa-arrow-right"></i></a></li>
                  </ul>
                </li>
                <li class="nav-item ">
                  <a class="nav-link" href="{{url('contact-us')}}" role="button">Contact</a>
                </li>
              </ul>
            </div>
            <div class="d-none d-sm-flex ml-auto mr-5 mr-lg-0 pr-4 pr-lg-0">
              <ul class="nav ml-1 ml-lg-2 align-self-center">
                <li class="contact-number nav-item pr-4 d-none d-xl-block">
                  <a class="font-weight-bold" href="#"><i class="fab fa-whatsapp pr-2"></i></a>
                </li>
                <li class="contact-number nav-item pr-4 d-none d-xl-block">
                  <a class="font-weight-bold" href="#"><i class="fab fa-facebook-f"></i></a>
                </li>
                <li class="contact-number nav-item pr-4 d-none d-xl-block">
                  <a class="font-weight-bold" href="#"><i class="fab fa-twitter"></i></a>
                </li>
                <li class="contact-number nav-item pr-4 d-none d-xl-block">
                  <a class="font-weight-bold" href="#"><i class="fab fa-linkedin-in"></i></a>
                </li>
              </ul>
            </div>
          </nav>
        </div>
      </div>
    </div>
  </header>
  <!--=================================
    header -->


  <!--=================================
    banner -->
  <section class="bg-primary overflow-hidden project-start-area">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-lg-6 col-md-12">
          <div class="project-start-content center">
            <h1 class="txt-size">Services</h1>
          </div>
        </div>
        <div class="col-lg-6 col-md-12">
          <div class="project-start-image">
            <img class="img-fluid" src="images/project-start1.png" alt="Responsive image" />
          </div>
        </div>
      </div>

      <div class="vector-shape9">
        <img src="images/vector-shape9.png" alt="image" />
      </div>
      <div class="vector-shape10">
        <img src="images/vector-shape10.png" alt="image" />
      </div>

    </div>
  </section>
  <!--=================================
    banner -->

  <!--=================================Tab -->
  <section class=" pad-tp d-none">
    <div class="container">
      <div class="row">
        <div class="col-md-8 mt-3 mt-md-0 ">
          <div class="tab-content" id="v-pills-tabContent">
            <div class="tab-pane fade show active" id="AI-ML" role="tabpanel" aria-labelledby="AI-ML-tab">
              <div class="row">
                <div class="col-sm-12 align-self-lg-center mb-4">
                  <img class="img-fluid rounded img-width" src="images/slider/ai-ml.jpg" alt="">
                </div>
              </div>
            </div>
            <div class="tab-pane  fade " id="Data-Analysis" role="tabpanel" aria-labelledby="Data-Analysis-tab">
              <div class="row">
                <div class="col-sm-12 align-self-lg-center mb-4 ">
                  <img class="img-fluid rounded img-width" src="images/slider/ai.jpg" alt="">
                </div>
              </div>
            </div>
            <div class="tab-pane fade" id="Ai" role="tabpanel">
              <div class="row">
                <div class="col-sm-12 align-self-lg-center mb-4">
                  <img class="img-fluid rounded center img-width" src="images/slider/ai-2.jpg" alt="">
                </div>
              </div>
            </div>
            <div class="tab-pane fade" id="Data-visualization" role="tabpanel" aria-labelledby="Data-visualization-tab">
              <div class="row">
                <div class="col-sm-12 align-self-lg-center mb-4 ">
                  <img class="img-fluid rounded img-width" src="images/slider/dv.jpg" alt="">
                </div>
              </div>
            </div>
          </div>
          <div class="service-details">
            <h4 class="font-weight-bold">AI & ML Development</h4>
            <p class="mb-4">Do it today. Remind yourself of someone you know who died suddenly and the fact that there is no guarantee that tomorrow will come.You carry on doing the same things, living the same way and dealing with this thing in the same way as you have been doing. If you were choose the path to the right, the right path, there are new possibilities, achievement, freedom of mind, positive and progressive implications. Think about that as you stand at this place where the path splits. You want to make a decision and commit to one of these paths. Before you make that decision, we are going to see what each path holds for your future.</p>
            <div class="row mb-4">
              <div class="col-md-6 mb-4 mb-md-0">
                <img class="img-fluid border-radius" src="images/slider/facts.jpg" alt="">
              </div>
              <div class="col-md-6">
                <h4 class="font-weight-bold">Important Facts</h4>
                <p class="mb-4">You carry on doing the same things, living the same way and dealing with this thing in the same way as you have been doing.</p>
                <ul class="list list-unstyled mb-4">
                  <li class="d-flex"><i class="fas fa-check pr-2 pt-1 text-primary"></i><span>Use a past defeat</span></li>
                  <li class="d-flex"><i class="fas fa-check pr-2 pt-1 text-primary"></i><span>Give yourself the power</span></li>
                  <li class="d-flex"><i class="fas fa-check pr-2 pt-1 text-primary"></i><span>Remind yourself </span></li>
                  <li class="d-flex"><i class="fas fa-check pr-2 pt-1 text-primary"></i><span>Achievements toward </span></li>
                </ul>
              </div>
            </div>
            <p class="mb-4">Do it today. Remind yourself of someone you know who died suddenly and the fact that there is no guarantee that tomorrow will come.You carry on doing the same things, living the same way and dealing with this thing in the same way as you have been doing. If you were choose the path to the right, the right path, there are new possibilities, achievement, freedom of mind, positive and progressive implications. Think about that as you stand at this place where the path splits. You want to make a decision and commit to one of these paths. Before you make that decision, we are going to see what each path holds for your future.</p>

          </div>
          <div class="row category category-grid-style-02 ">
            <div class="col-12">
              <div>
                <h4>Application Areas</h4>
              </div>
              <div class="row">
                <div class="col-4">
                  <h5 class="app-list"><a href="#"><i class="flaticon-rocket"></i> Automotive</a></h5>
                </div>
                <div class="col-4">
                  <h5 class="app-list"><a href="#"><i class="flaticon-mobile-phone"></i> Services</a></h5>
                </div>
                <div class="col-4">
                  <h5 class="app-list"><a href="#"><i class="flaticon-author"></i> Education</a></h5>
                </div>
                <div class="col-4">
                  <h5 class="app-list"><a href="#"><i class="flaticon-rocket"></i> Automotive</a></h5>
                </div>
                <div class="col-4">
                  <h5 class="app-list"><a href="#"><i class="flaticon-target"></i> Healthcare</a></h5>
                </div>
                <div class="col-4">
                  <h5 class="app-list"><a href="#"><i class="flaticon-mobile-phone"></i> Communication</a></h5>
                </div>
              </div>
              <br>
              <div>
                <h4>Technology That We Use</h4>
              </div>
              <div class="row">
                <div class="col-3">
                  <li class="d-flex"><i class="fas fa-check pr-2 pt-1 text-primary"></i><span>JavaScript</span></li>
                  <li class="d-flex"><i class="fas fa-check pr-2 pt-1 text-primary"></i><span>Java</span></li>

                </div>
                <div class="col-3">
                  <li class="d-flex"><i class="fas fa-check pr-2 pt-1 text-primary"></i><span>Python</span></li>
                  <li class="d-flex"><i class="fas fa-check pr-2 pt-1 text-primary"></i><span>PHP</span></li>

                </div>
                <div class="col-3">
                  <li class="d-flex"><i class="fas fa-check pr-2 pt-1 text-primary"></i><span>C/C++</span></li>
                  <li class="d-flex"><i class="fas fa-check pr-2 pt-1 text-primary"></i><span>Swift</span></li>
                </div>
                <div class="col-3">
                  <li class="d-flex"><i class="fas fa-check pr-2 pt-1 text-primary"></i><span>C/C++</span></li>
                  <li class="d-flex"><i class="fas fa-check pr-2 pt-1 text-primary"></i><span>Swift</span></li>
                </div>
              </div>
              <br>
              <div>
                <h4>Brochures</h4>
              </div>
              <div class="row">
                <div class="col-3">
                  <li class="d-flex">
                    <a href="#">PDF Download <i class="bx bxs-file-pdf"></i></a>
                  </li>
                </div>
                <div class="col-3">
                  <li class="d-flex">
                    <a href="#">Services Details.txt <i class="bx bxs-file-txt"></i></a>
                  </li>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="d-flex is-sticky">
            <div class="bg-white shadow nav flex-column nav-pills w-100 align-self-lg-center " id="v-pills-tab" role="tablist" aria-orientation="vertical">
              <ul class="service-list">
                <li>
                  <a class="active" href="service-details.html">AI &amp; ML Development</a>
                </li>
                <li><a href="services.html">Data Analytics</a></li>
                <li><a href="services.html">Data Science</a></li>
                <li>
                  <a href="services.html">Artificial Intelligence</a>
                </li>
                <li><a href="services.html">Data Visualization</a></li>
              </ul>
            </div>
          </div>
        </div>

      </div>
    </div>
  </section>
  <!--=================================Tab -->
  <!-- ===============New Section by added Arsam================== -->
  <section class="mt-5">
    <div class="row">
      <div class="side-menu sticky-side-menu">
        <ul class="nav nav-tabs d-flex flex-column">
          <li>
            <a href="#business-benefits">Business benefits</a>
          </li>
          <li>
            <a href="#development-process">Development process</a>
          </li>
          <li>
            <a href="#industry-expertie">Industry expertise</a>
          </li>
          <li>
            <a href="#technologies">Technologies</a>
          </li>
          <li>
            <a href="#key-benefits">Key benefits</a>
          </li>
          <li>
            <a href="#glossary">Glossary</a>
          </li>
          <button type="button" class="btn btn-sm btn-primary px-2 d-md-block d-none">Schedule a call</button>
        </ul>
      </div>
      <div class="main-menu">
        <div class=" px-md-4 px-2" id="business-benefits">
          <div class="main-menu-inner">
            <span>Business benefits</span>
            <h2>Artificial Intelligence – consulting in the field of AI solutions</h2>
            <div class="container accordion-body row mt-5">
              <div class="col-5 pl-0">
                <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                  <a class="nav-link active" id="ai-consulting-tab" data-toggle="pill" href="#ai-consulting" role="tab" aria-controls="ai-consulting" aria-selected="true">AI Consulting Services</a>
                  <a class="nav-link" id="ai-strategy-tab" data-toggle="pill" href="#ai-strategy" role="tab" aria-controls="ai-strategy" aria-selected="false">AI Strategy Consulting</a>
                  <a class="nav-link" id="ai-technology-tab" data-toggle="pill" href="#ai-technology" role="tab" aria-controls="ai-technology" aria-selected="false">AI Technologies Consulting</a>
                  <a class="nav-link" id="ai-benefits-tab" data-toggle="pill" href="#ai-benefits" role="tab" aria-controls="ai-benefits" aria-selected="false">AI Benefits</a>
                  <a class="nav-link" id="our-team-tab" data-toggle="pill" href="#our-team" role="tab" aria-controls="our-team" aria-selected="false">Our team</a>

                </div>
              </div>
              <div class="col-7 mt-3">
                <div class="tab-content" id="v-pills-tabContent">
                  <div class="tab-pane fade show active" id="ai-consulting" role="tabpanel" aria-labelledby="ai-consulting-tab">
                    <h5>What AI consulting services can you expect?</h5>
                    <div class="content__main pt-3">
                      <p>Addepto offers unique <strong>AI consulting services that will help you realize how many opportunities come from implementing AI solutions into your business.</strong></p>
                      <p>Artificial Intelligence influences most industries, among the most popular are: retail, eCommerce, manufacturing, finance, healthcare, marketing, and gaming sector.</p>
                      <p>
                      </p>
                    </div>
                    <div class="d-flex justify-content-between align-items-center fd-r-m mt-a">
                      <button type="button" class="btn btn-sm btn-primary px-3">Let's talk</button>
                      <a class="show-more" href="#" data-expand="">show more</a>
                    </div>
                  </div>
                  <div class="tab-pane fade" id="ai-strategy" role="tabpanel" aria-labelledby="ai-strategy-tab">
                    <h5>Comprehensive AI Plan</h5>
                    <div class="content__main pt-3">
                      <p>AI strategy is a comprehensive plan developed by organizations to leverage artificial intelligence (AI) technologies effectively for their goals and objectives.</p>
                      <p>An AI strategy outlines how AI will be integrated into various aspects of an entity’s operations, innovation, decision-making processes, and overall business or societal objectives.</p>
                      <p></p>
                    </div>
                    <div class="d-flex justify-content-between align-items-center fd-r-m mt-a">
                      <button type="button" class="btn btn-sm btn-primary px-3">Let's talk</button>
                      <a class="show-more" href="#" data-expand="">show more</a>
                    </div>
                  </div>
                  <div class="tab-pane fade" id="ai-technology" role="tabpanel" aria-labelledby="ai-technology-tab">
                    <h5>Our team develops customized AI solutions based on recent technologies.</h5>
                    <div class="content__main pt-3">
                      <p><span style="font-weight: 400;">Our team specializes in developing customized AI solutions, leveraging the latest technologies available. </span>We implement solutions based on high-tech solutions such as Computer Vision, Natural Language Processing, Predictive analytics, Image Recognition, Recommendation Engines, Smart Search Engines, and many more.</p>
                      <p></p>
                    </div>
                    <div class="d-flex justify-content-between align-items-center fd-r-m mt-a">
                      <button type="button" class="btn btn-sm btn-primary px-3">Let's talk</button>
                      <a class="show-more" href="#" data-expand="">show more</a>
                    </div>
                  </div>
                  <div class="tab-pane fade" id="ai-benefits" role="tabpanel" aria-labelledby="ai-benefits-tab">
                    <h5>The biggest advantages of AI are self-learning capabilities and scalability.</h5>
                    <p>It gives SaaS applications the ability to use algorithms for thousands of customers.</p>
                    <p>Due to the fact that AI learns the history of all users, it gives amazing opportunities for the Marketplace. One of the examples is using a recommendation system based on the preferences of each individual person.</p>
                    <p><em>More than 9 in 10 leading businesses have ongoing investments in AI.</em></p>
                    <div class="d-flex justify-content-between align-items-center fd-r-m mt-a">
                      <button type="button" class="btn btn-sm btn-primary px-3">Let's talk</button>
                    </div>
                  </div>
                  <div class="tab-pane fade" id="our-team" role="tabpanel" aria-labelledby="our-team-tab">
                    <h5>At Addepto, our AI consultants stay in touch on a daily basis with our clients.</h5>
                    <p>This way you can be sure that your project is our top priority.</p>
                    <ul class="pl-3">
                      <li class="mb-2">solve complex business challenges using analytic algorithms and AI</li>
                      <li class="mb-2">design, build and deploy predictive and prescriptive models using statistical modeling and optimization</li>
                      <li class="mb-2">use structured decision-making to complete projects</li>
                      <li class="mb-2">manage an entire AI project from business issue identification, data audit to model maintenance in production.</li>
                    </ul>
                    <div class="d-flex justify-content-between align-items-center fd-r-m mt-a">
                      <button type="button" class="btn btn-sm btn-primary px-3">Let's talk</button>
                    </div>
                  </div>

                </div>

              </div>
            </div>
          </div>
        </div>

        <div class="mt-5 ml-4" id="development-process">
          <div class="p-5">
            <h2 class="text-white">AI as a Service</h2>
            <ul class="nav nav-pills mb-3" id="development-process-tab" role="tablist">
              <li class="nav-item pr-4 d-flex flex-column">
                <a class="nav-link active" id="discover-tab" data-toggle="pill" href="#discover" role="tab" aria-controls="discover" aria-selected="true">
                  <i class="fas fa-search pr-2 development-icon"></i>
                </a>
              </li>
              <li class="nav-item px-4">
                <a class="nav-link" id="feasibilty-tab" data-toggle="pill" href="#feasibilty" role="tab" aria-controls="feasibilty" aria-selected="false">
                  <i class="fas fa-lightbulb pr-2 development-icon"></i>
                </a>
              </li>
              <li class="nav-item px-4">
                <a class="nav-link" id="poc-tab" data-toggle="pill" href="#poc" role="tab" aria-controls="poc" aria-selected="false">
                  <i class="fas fa-tv pr-2 development-icon"></i>
                </a>
              </li>
              <li class="nav-item px-4">
                <a class="nav-link" id="integration-tab" data-toggle="pill" href="#integration" role="tab" aria-controls="integration" aria-selected="false">
                  <i class="fas fa-cog pr-2 development-icon"></i>
                </a>
              </li>
              <li class="nav-item px-4">
                <a class="nav-link" id="final-result-tab" data-toggle="pill" href="#final-result" role="tab" aria-controls="final-result" aria-selected="false">
                  <i class="fas fa-rocket pr-2 development-icon"></i>
                </a>
              </li>
            </ul>
            <div class="tab-content" id="development-process-tabContent">
              <div class="tab-pane fade show active" id="discover" role="tabpanel" aria-labelledby="discover-tab">
                <div class="active">
                  <h3 class="text-white">Discovering client’s needs</h3>
                  <div>
                    <ul class="pl-3">
                      <li class="text-white py-2">Our first step is to understand our clients and their requirements thoroughly.</li>
                      <li class="text-white py-2">We analyze areas for improvement and explore cutting-edge solutions that would be most effective.</li>
                      <li class="text-white py-2">We identify where AI can be strategically injected into processes to maximize business value.</li>
                    </ul>
                    <p class="text-white"><strong>This involves determining the optimal balance between end-to-end automation and human-AI collaboration, taking into account security considerations.</strong></p>
                  </div>
                </div>
              </div>
              <div class="tab-pane fade" id="feasibilty" role="tabpanel" aria-labelledby="feasibilty-tab">
                <div class="active">
                  <h3 class="text-white">Feasibility study</h3>
                  <div>
                    <ul class="pl-3">
                      <li class="text-white py-2">During this stage, we work closely with the client’s team, gaining access to vital data and exchanging information regularly.</li>
                      <li class="text-white py-2">We meticulously map the process, evaluating the quality and quantity of data involved, as well as the data infrastructure.</li>
                    </ul>
                    <p class="text-white"><strong>Our Artificial Intelligence Consulting is aimed to build an AI and Machine Learning solution that aligns with the client’s infrastructure or propose the best possible toolset in terms of cost and security.</strong></p>
                  </div>
                </div>
              </div>
              <div class="tab-pane fade" id="poc" role="tabpanel" aria-labelledby="poc-tab">
                <div class="active">
                  <h3 class="text-white">Building a Proof of Concept (PoC)</h3>
                  <div>
                    <ul class="pl-3">
                      <li class="text-white py-2">Once we’ve reached an agreement, we focus on bringing the idea to life. Our team devises a comprehensive plan, assigns tasks, and establishes a timeline.</li>
                    </ul>
                    <p class="text-white"><strong>We develop a prototype that aligns with our main objective and review it with the client to finalize details.</strong></p>
                  </div>
                </div>
              </div>
              <div class="tab-pane fade" id="integration" role="tabpanel" aria-labelledby="integration-tab">
                <div class="active">
                  <h3 class="text-white">Integration, Production Deployment, Testing</h3>
                  <div>
                    <ul class="pl-3">
                      <li class="text-white py-2">The Addepto team implements tailor-made AI solutions into the client’s existing systems.</li>
                      <li class="text-white py-2">Our experts conduct rigorous testing, thoroughly examining the functionality and performance of the integrated AI components.</li>
                      <li class="text-white py-2">The Addepto team implements tailor-made AI solutions into the client’s existing systems.</li>
                    </ul>
                    <p class="text-white"><strong>Our dedication to thorough testing ensures a smooth production deployment, minimizing disruptions and maximizing the benefits of the AI and Machine Learning implementation.</strong></p>
                  </div>
                </div>
              </div>
              <div class="tab-pane fade" id="final-result" role="tabpanel" aria-labelledby="final-result-tab">
                <div class="active">
                  <h3 class="text-white">Final results / Transformation of your organization</h3>
                  <div>
                    <ul class="pl-3">
                      <li class="text-white py-2">With the integration complete, your company can harness the latest technological solutions and witness how advanced AI algorithms enhance business outcomes.</li>
                      <li class="text-white py-2">In addition to delivering the AI solution, we emphasize knowledge sharing as a crucial aspect of our service. After deployment, we ensure that the client receives comprehensive manuals and documentation, empowering them with the knowledge to use and extend the solution effectively.</li>
                      <li class="text-white py-2">We facilitate a seamless transition by passing entire ownership over the solution to the client.</li>
                    </ul>
                    <p class="text-white"><strong>Our team ensures that the client is well-versed in the operation and maintenance of the AI and Machine Learning systems, enabling them to leverage its capabilities to the fullest extent.</strong></p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div id="industry-expertie">
          <div class="px-5 py-md-5 py-3">
            <div class="d-flex justify-content-between align-items-center">
              <h2 class="m-0">Why work with us</h2>
              <div class="d-flex align-items-center">
                <p class="m-0">Your industry isn't here? That’s not a problem!</p>
                <button type="button" class="btn btn-sm btn-primary px-2 mx-3">Let's talk</button>
              </div>
            </div>
            <div class="d-flex flex-column">
              <div class="d-flex mt-5">
                <div class="industry-expertise-img pt-md-0 pt-md-5">
                  <img class="img-fluid" src="https://addepto.com/wp-content/uploads/2022/05/manufacturing-factory.webp">
                  <img class="img-fluid" src="https://addepto.com/wp-content/uploads/2022/05/retail.webp" style="display: none;">
                  <img class="img-fluid" src="https://addepto.com/wp-content/uploads/2022/05/shipping-and-logistics.webp" style="display: none;">
                  <img class="img-fluid" src="https://addepto.com/wp-content/uploads/2022/05/ezgif.com-gif-maker-1.webp" style="display: none;">
                </div>
                <div class="industry-expertise-content pt-md-5">
                  <div class="tab-content" id="industry-expertie-tabContent">
                    <div class="tab-pane fade show active" id="manufacturing" role="tabpanel" aria-labelledby="manufacturing-tab">
                      <div class="active px-md-5 px-1">
                        <h4>We’ve helped a leading manufacturing company enhance management efficiency</h4>
                        <p>All thanks to the implementation of an automated reporting and demand prediction system with predictive maintenance capabilities.</p>
                        <p><strong>Addepto AI consultants have developed and created a system that helps managers and operation leaders to make the right decision on the costs and demand planning.</strong> Predictive maintenance solution is predicting when a particular production machine needs to be checked and potentially replaced.</p>
                        <p>Benefits include one integrated data platform and yearly savings of around 10m $ on right demand planning and inventory management. Continues production process and prevention from machine failures which are resulting in millions of dollars in costs.</p>
                        <div class="d-flex justify-content-end">
                          <a class="show-more" href="#">
                            read more
                          </a>
                        </div>
                      </div>
                    </div>
                    <div class="tab-pane fade" id="retails" role="tabpanel" aria-labelledby="retails-tab">
                      <div class="active px-md-5 px-1">
                        <h4>We’ve helped one of the global retail & eCommerce companies to optimize advertising processes using AI, ML, and ad targeting</h4>
                        <p>All thanks to the implementation of an automated reporting and demand prediction system with predictive maintenance capabilities.</p>
                        <p><strong>Addepto AI consultants have developed and created a system that helps managers and operation leaders to make the right decision on the costs and demand planning.</strong> Predictive maintenance solution is predicting when a particular production machine needs to be checked and potentially replaced.</p>
                        <p>Benefits include one integrated data platform and yearly savings of around 10m $ on right demand planning and inventory management. Continues production process and prevention from machine failures which are resulting in millions of dollars in costs.</p>
                        <div class="d-flex justify-content-end">
                          <a class="show-more" href="#">
                            read more
                          </a>
                        </div>
                      </div>
                    </div>
                    <div class="tab-pane fade" id="logistics" role="tabpanel" aria-labelledby="logistics-tab">
                      <div class="active px-md-5 px-1">
                        <h4>We’ve helped a leading manufacturing company enhance management efficiency</h4>
                        <p>All thanks to the implementation of an automated reporting and demand prediction system with predictive maintenance capabilities.</p>
                        <p><strong>Addepto AI consultants have developed and created a system that helps managers and operation leaders to make the right decision on the costs and demand planning.</strong> Predictive maintenance solution is predicting when a particular production machine needs to be checked and potentially replaced.</p>
                        <p>Benefits include one integrated data platform and yearly savings of around 10m $ on right demand planning and inventory management. Continues production process and prevention from machine failures which are resulting in millions of dollars in costs.</p>
                        <div class="d-flex justify-content-end">
                          <a class="show-more" href="#">
                            read more
                          </a>
                        </div>
                      </div>
                    </div>
                    <div class="tab-pane fade" id="finance" role="tabpanel" aria-labelledby="finance-tab">
                      <div class="active px-md-5 px-1">
                        <h4>We’ve helped one of the global retail & eCommerce companies to optimize advertising processes using AI, ML, and ad targeting</h4>
                        <p>All thanks to the implementation of an automated reporting and demand prediction system with predictive maintenance capabilities.</p>
                        <p><strong>Addepto AI consultants have developed and created a system that helps managers and operation leaders to make the right decision on the costs and demand planning.</strong> Predictive maintenance solution is predicting when a particular production machine needs to be checked and potentially replaced.</p>
                        <p>Benefits include one integrated data platform and yearly savings of around 10m $ on right demand planning and inventory management. Continues production process and prevention from machine failures which are resulting in millions of dollars in costs.</p>
                        <div class="d-flex justify-content-end">
                          <a class="show-more" href="#">
                            read more
                          </a>
                        </div>
                      </div>
                    </div>

                  </div>
                  <ul class="nav nav-pills d-flex flex-lg-nowrap flex-wrap" id="industry-expertie-tab" role="tablist">
                    <li class="nav-item w-100 d-flex align-items-end">
                      <a class="nav-link industry-expertise-link active" id="manufacturing-tab" data-toggle="pill" href="#manufacturing" role="tab" aria-controls="manufacturing" aria-selected="true">Manufacturing</a>
                    </li>
                    <li class="nav-item w-100 d-flex align-items-end">
                      <a class="nav-link industry-expertise-link" id="pills-profile-tab" data-toggle="pill" href="#retails" role="tab" aria-controls="retails" aria-selected="false">Retail</a>
                    </li>
                    <li class="nav-item w-100 d-flex align-items-end">
                      <a class="nav-link industry-expertise-link" id="logistics-tab" data-toggle="pill" href="#logistics" role="tab" aria-controls="logistics" aria-selected="false">Logistics</a>
                    </li>
                    <li class="nav-item w-100 d-flex align-items-end">
                      <a class="nav-link industry-expertise-link" id="finance-tab" data-toggle="pill" href="#finance" role="tab" aria-controls="finance" aria-selected="false">Finance & Insurance</a>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div id="technologies">
          <div class="p-5">
            <h3>Tools and frameworks for AI solutions</h3>
            <ul class="nav nav-pills mb-3" id="technologies-tab" role="tablist">
              <li class="nav-item">
                <a class="nav-link active" id="programming-language-tab" data-toggle="pill" href="#programming-language" role="tab" aria-controls="programming-language" aria-selected="true">Programming languages</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="database-tab" data-toggle="pill" href="#database" role="tab" aria-controls="database" aria-selected="false">Database</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="frameworks-tab" data-toggle="pill" href="#frameworks" role="tab" aria-controls="frameworks" aria-selected="false">Frameworks</a>
              </li>
            </ul>
            <div class="tab-content" id="technologies-tabContent">
              <div class="tab-pane fade show active" id="programming-language" role="tabpanel" aria-labelledby="programming-language-tab">
                <div class="active">
                  <div class="row">
                    <div class="col-md-3">
                      <img class="img-fluid" data-src="https://addepto.com/wp-content/uploads/2022/06/Python.webp" alt="Python" src="https://addepto.com/wp-content/uploads/2022/06/Python.webp" srcset="https://addepto.com/wp-content/uploads/2022/06/Python.webp">
                    </div>
                    <div class="col-md-9 px-md-5 px-2">
                      Python – Python is considered the most popular programming language in the Data Science area mostly because of its quite straightforward and easy-to-read syntax. Still, the benefits of using it in building Machine Learning solutions are numerous.

                      This language has a large and active community that develops and maintains a wide range of libraries and frameworks specifically for Machine Learning and Artificial Intelligence, which provide pre-built algorithms and tools for building and training models.

                      Python is a versatile and flexible language; it can be used in scientific computing and web development, which makes it a great choice for building ML models, often requiring a mix of programming, data analysis, and visualization.
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-3">
                      <img class="img-fluid" data-src="https://addepto.com/wp-content/uploads/2022/06/Python-_1_.webp" alt="R" src="https://addepto.com/wp-content/uploads/2022/06/Python-_1_.webp" srcset="https://addepto.com/wp-content/uploads/2022/06/Python-_1_.webp">
                    </div>
                    <div class="col-md-9 px-md-5 px-2">
                      R – With built-in statistical functions, R was made specifically for machine learning applications. This language also has an extensive library of data visualization tools, which makes it easy to create charts, graphs, and other visualizations of data.

                      Moreover, R has an interactive console that allows users to explore data and experiment with different analyses and models in real time, enabling Data Scientists to test different models and approaches. R - as well as Python - can be easily integrated with other tools and languages, such as Python, SQL, and Hadoop.
                    </div>
                  </div>
                </div>
              </div>
              <div class="tab-pane fade" id="database" role="tabpanel" aria-labelledby="database-tab">
                <div class="active">
                  <div class="row">
                    <div class="col-md-3">
                      <img class="img-fluid" data-src="https://addepto.com/wp-content/uploads/2022/06/Python-_1_.webp" alt="R" src="https://addepto.com/wp-content/uploads/2022/06/Python-_1_.webp" srcset="https://addepto.com/wp-content/uploads/2022/06/Python-_1_.webp">
                    </div>
                    <div class="col-md-9 px-md-5 px-2">
                      R – With built-in statistical functions, R was made specifically for machine learning applications. This language also has an extensive library of data visualization tools, which makes it easy to create charts, graphs, and other visualizations of data.

                      Moreover, R has an interactive console that allows users to explore data and experiment with different analyses and models in real time, enabling Data Scientists to test different models and approaches. R - as well as Python - can be easily integrated with other tools and languages, such as Python, SQL, and Hadoop.
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-3">
                      <img class="img-fluid" data-src="https://addepto.com/wp-content/uploads/2022/06/Python-_1_.webp" alt="R" src="https://addepto.com/wp-content/uploads/2022/06/Python-_1_.webp" srcset="https://addepto.com/wp-content/uploads/2022/06/Python-_1_.webp">
                    </div>
                    <div class="col-md-9 px-md-5 px-2">
                      R – With built-in statistical functions, R was made specifically for machine learning applications. This language also has an extensive library of data visualization tools, which makes it easy to create charts, graphs, and other visualizations of data.

                      Moreover, R has an interactive console that allows users to explore data and experiment with different analyses and models in real time, enabling Data Scientists to test different models and approaches. R - as well as Python - can be easily integrated with other tools and languages, such as Python, SQL, and Hadoop.
                    </div>
                  </div>
                </div>
              </div>
              <div class="tab-pane fade" id="frameworks" role="tabpanel" aria-labelledby="frameworks-tab">
                <div class="active">
                  <div class="row">
                    <div class="col-md-3">
                      <img class="img-fluid" data-src="https://addepto.com/wp-content/uploads/2022/06/Python.webp" alt="Python" src="https://addepto.com/wp-content/uploads/2022/06/Python.webp" srcset="https://addepto.com/wp-content/uploads/2022/06/Python.webp">
                    </div>
                    <div class="col-md-9 px-md-5 px-2">
                      Python – Python is considered the most popular programming language in the Data Science area mostly because of its quite straightforward and easy-to-read syntax. Still, the benefits of using it in building Machine Learning solutions are numerous.

                      This language has a large and active community that develops and maintains a wide range of libraries and frameworks specifically for Machine Learning and Artificial Intelligence, which provide pre-built algorithms and tools for building and training models.

                      Python is a versatile and flexible language; it can be used in scientific computing and web development, which makes it a great choice for building ML models, often requiring a mix of programming, data analysis, and visualization.
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-3">
                      <img class="img-fluid" data-src="https://addepto.com/wp-content/uploads/2022/06/Python-_1_.webp" alt="R" src="https://addepto.com/wp-content/uploads/2022/06/Python-_1_.webp" srcset="https://addepto.com/wp-content/uploads/2022/06/Python-_1_.webp">
                    </div>
                    <div class="col-md-9 px-md-5 px-2">
                      R – With built-in statistical functions, R was made specifically for machine learning applications. This language also has an extensive library of data visualization tools, which makes it easy to create charts, graphs, and other visualizations of data.

                      Moreover, R has an interactive console that allows users to explore data and experiment with different analyses and models in real time, enabling Data Scientists to test different models and approaches. R - as well as Python - can be easily integrated with other tools and languages, such as Python, SQL, and Hadoop.
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div id="key-benefits">
          <div class="px-5 py-md-5 py-3">
            <h6>Key benefits</h6>
            <h3>Artificial intelligence can improve your business in <br>many ways</h3>
            <div class="d-flex mt-5 flex-md-nowrap flex-wrap">
              <div class="tile w-100">
                <div class="icon">
                  <img data-src="https://addepto.com/wp-content/uploads/2022/05/icon-person-48×48-px.svg" alt="" data-scroll-zoom="" style="transform: scale(1.044);" src="https://addepto.com/wp-content/uploads/2022/05/icon-person-48×48-px.svg" srcset="https://addepto.com/wp-content/uploads/2022/05/icon-person-48×48-px.svg">
                </div>
                <hr class="m">
                <h3 class="h5">Reducing human labor</h3>
                <hr class="m">
                <div>
                  <p>Using AI leads to reducing human labor, especially in handling repetitive tasks.</p>
                </div>
              </div>
              <div class="tile w-100">
                <div class="icon">
                  <img data-src="https://addepto.com/wp-content/uploads/2022/05/icon-dollar-48×48-px-2.svg" alt="" data-scroll-zoom="" style="transform: scale(1.028);" src="https://addepto.com/wp-content/uploads/2022/05/icon-dollar-48×48-px-2.svg" srcset="https://addepto.com/wp-content/uploads/2022/05/icon-dollar-48×48-px-2.svg">
                </div>
                <hr class="m">
                <h3 class="h5">Cost savings</h3>
                <hr class="m">
                <div>
                  <p>A one-time investment in AI will be more cost-effective than hiring a full-time worker, as AI and machine learning can automate labor-intensive processes without harm to quality.</p>
                </div>
              </div>
              <div class="tile w-100">
                <div class="icon">
                  <img data-src="https://addepto.com/wp-content/uploads/2022/05/icon-risk.svg" alt="" data-scroll-zoom="" style="transform: scale(1.028);" src="https://addepto.com/wp-content/uploads/2022/05/icon-risk.svg" srcset="https://addepto.com/wp-content/uploads/2022/05/icon-risk.svg">
                </div>
                <hr class="m">
                <h3 class="h5">Minimizing the risk</h3>
                <hr class="m">
                <div>
                  <p>By providing the ability to analyze various unstructured data, AI can identify patterns related to past incidents and predict future risk factors.</p>
                </div>
              </div>
              <div class="tile w-100">
                <div class="icon">
                  <img data-src="https://addepto.com/wp-content/uploads/2022/05/icon-decision-48×48-px.svg" alt="" data-scroll-zoom="" style="transform: scale(1.028);" src="https://addepto.com/wp-content/uploads/2022/05/icon-decision-48×48-px.svg" srcset="https://addepto.com/wp-content/uploads/2022/05/icon-decision-48×48-px.svg">
                </div>
                <hr class="m">
                <h3 class="h5">Real-time decision making</h3>
                <hr class="m">
                <div>
                  <p>Artificial Intelligence increases the efficiency of decision-making processes as it constantly evaluates data coming from multiple sources, providing stakeholders with precise and real-time insights.</p>
                </div>
              </div>
            </div>
          </div>

        </div>
        <div id="glossary">
          <div class="pb-md-5 pb-1 pt-0 px-5">
            <h3>All you need to know about AI consulting</h3>
            <div class="accordion" id="accordionExample">
              <div id="headingOne">
                <h2 class="mb-0">
                  <button class="btn btn-link accordion-border" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                    What is artificial intelligence?
                  </button>
                </h2>
              </div>

              <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                <div class="px-md-3 px-2">
                  Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                </div>
              </div>

              <!-- Second Accordion -->
              <div id="headingTwo">
                <h2 class="mb-0">
                  <button class="btn btn-link accordion-border" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                    How does artificial intelligence work?
                  </button>
                </h2>
              </div>
              <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                <div class="px-md-3 px-2">
                  <p>Artificial Intelligence (AI) is an area of computer science that focuses on the creation of intelligent machines which “think” and react like humans. </p>
                  <p>The main goal of AI technology is to imitate the behavior of an intelligent human being.</p>
                </div>
              </div>

              <!-- Third Accordion -->
              <div id="headingThree">
                <h2 class="mb-0">
                  <button class="btn btn-link accordion-border" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                    How to prepare for AI implementation?
                  </button>
                </h2>
              </div>
              <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                <div class="px-md-3 px-2">
                  Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                </div>
              </div>

              <!-- Fourth Accordion -->
              <div id="headingFour">
                <h2 class="mb-0">
                  <button class="btn btn-link accordion-border" type="button" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                    Fourth Accordion Title
                  </button>
                </h2>
              </div>
              <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordionExample">
                <div class="px-md-3 px-2">
                  Content for fourth accordion.
                </div>
              </div>

              <!-- Fifth Accordion -->
              <div id="headingFive">
                <h2 class="mb-0">
                  <button class="btn btn-link accordion-border" type="button" data-toggle="collapse" data-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                    Fifth Accordion Title
                  </button>
                </h2>
              </div>
              <div id="collapseFive" class="collapse" aria-labelledby="headingFive" data-parent="#accordionExample">
                <div class="px-md-3 px-2">
                  Content for fifth accordion.
                </div>
              </div>

              <!-- Sixth Accordion -->
              <div id="headingSix">
                <h2 class="mb-0">
                  <button class="btn btn-link accordion-border" type="button" data-toggle="collapse" data-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
                    Sixth Accordion Title
                  </button>
                </h2>
              </div>
              <div id="collapseSix" class="collapse" aria-labelledby="headingSix" data-parent="#accordionExample">
                <div class="px-md-3 px-2">
                  Content for sixth accordion.
                </div>
              </div>

              <!-- Seventh Accordion -->
              <div id="headingSeven">
                <h2 class="mb-0">
                  <button class="btn btn-link accordion-border" type="button" data-toggle="collapse" data-target="#collapseSeven" aria-expanded="false" aria-controls="collapseSeven">
                    Seventh Accordion Title
                  </button>
                </h2>
              </div>
              <div id="collapseSeven" class="collapse" aria-labelledby="headingSeven" data-parent="#accordionExample">
                <div class="px-md-3 px-2">
                  Content for seventh accordion.
                </div>
              </div>

              <!-- Eighth Accordion -->
              <div id="headingEight">
                <h2 class="mb-0">
                  <button class="btn btn-link accordion-border" type="button" data-toggle="collapse" data-target="#collapseEight" aria-expanded="false" aria-controls="collapseEight">
                    Eighth Accordion Title
                  </button>
                </h2>
              </div>
              <div id="collapseEight" class="collapse" aria-labelledby="headingEight" data-parent="#accordionExample">
                <div class="px-md-3 px-2">
                  Content for eighth accordion.
                </div>
              </div>

              <!-- Ninth Accordion -->
              <div id="headingNine">
                <h2 class="mb-0">
                  <button class="btn btn-link accordion-border" type="button" data-toggle="collapse" data-target="#collapseNine" aria-expanded="false" aria-controls="collapseNine">
                    Ninth Accordion Title
                  </button>
                </h2>
              </div>
              <div id="collapseNine" class="collapse" aria-labelledby="headingNine" data-parent="#accordionExample">
                <div class="px-md-3 px-2">
                  Content for ninth accordion.
                </div>
              </div>


            </div>
          </div>
        </div>
        <!-- slider  -->
        <div class="my-md-5 my-3 mx-5">
          <h3>We are a fast-growing company with <br>the trust of international corporations</h3>
          <div class="row justify-content-start mx-1">
            <div class="col-md-7 main-carosal bg-white ">
              <div class="owl-carousel p-5">
                <div>
                  <div class="d-flex align-items-center">
                    <img src="https://addepto.com/wp-content/themes/addepto/img/quote-icon.svg" style="height: 30px; width:30px">
                    <h2 class="px-2 m-0">Slide 1</h2>
                  </div>
                  <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam id urna vel elit pretium rutrum ut sit amet nulla. Sed eleifend ex et libero consectetur, ac tristique lectus convallis. Nullam vel sapien nec justo dignissim commodo.</p>
                </div>
                <div>
                  <div class="d-flex align-items-center">
                    <img src="https://addepto.com/wp-content/themes/addepto/img/quote-icon.svg" style="height: 30px; width:30px">
                    <h2 class="px-2 m-0">Slide 2</h2>
                  </div>
                  <p>Phasellus condimentum sapien vel lectus ullamcorper, et consequat quam fermentum. Donec nec magna ut urna vestibulum lacinia. Integer at quam sed nunc convallis aliquam. Sed lobortis risus non metus ultrices, eu tincidunt lectus lacinia.</p>
                </div>
                <div>
                  <div class="d-flex align-items-center">
                    <img src="https://addepto.com/wp-content/themes/addepto/img/quote-icon.svg" style="height: 30px; width:30px">
                    <h2 class="px-2 m-0">Slide 3</h2>
                  </div>
                  <p>Etiam id consequat urna, sit amet venenatis mi. Proin et ex varius, mollis neque ut, vehicula mi. In et ante a enim convallis convallis vel ut magna. Aliquam erat volutpat. Nulla facilisi.</p>
                </div>
              </div>
              <div class="custom-nav d-flex justify-content-end">
                <div class="owl-prev">
                  <img src="https://addepto.com/wp-content/themes/addepto/img/carousel-arrow.svg" alt="">
                </div>
                <div class="owl-next"><img src="https://addepto.com/wp-content/themes/addepto/img/carousel-arrow.svg" alt=""></div>
              </div>
            </div>
            <div class="col-md-5 main-carosal d-flex align-items-center">
              <div class="owl-carousel">
                <div class="d-flex align-items-center">
                  <img src="https://addepto.com/wp-content/uploads/2024/04/mad2023-addepto.png" style="width:90px">
                </div>
                <div class="d-flex align-items-center">
                  <img src="https://addepto.com/wp-content/uploads/2024/04/deloittefast50-addepto-1.png" style="width:90px">
                </div>
                <div class="d-flex align-items-center">
                  <img src="https://addepto.com/wp-content/uploads/2024/04/mad2023-addepto.png" style="width:90px">
                </div>
                <div class="d-flex align-items-center">
                  <img src="https://addepto.com/wp-content/uploads/2024/04/deloittefast50-addepto-1.png" style="width:90px">
                </div>
              </div>
              <div class="custom-nav d-flex justify-content-end">
                <div class="owl-prev">
                  <img src="https://addepto.com/wp-content/themes/addepto/img/carousel-arrow.svg" alt="">
                </div>
                <div class="owl-next"><img src="https://addepto.com/wp-content/themes/addepto/img/carousel-arrow.svg" alt=""></div>
              </div>
            </div>
          </div>
          <div class="row p-3">
            <h6>Our clients</h6>
            <div class="slider-carosal">
              <div class="slides_carosal">
                <img src="https://addepto.com/wp-content/uploads/2022/05/sita.svg">
                <img src="https://addepto.com/wp-content/uploads/2022/06/hertz.svg">
                <img src="https://addepto.com/wp-content/uploads/2022/05/inpost.svg">
                <img src="https://addepto.com/wp-content/uploads/2022/06/abb.svg">
                <img src="https://addepto.com/wp-content/uploads/2022/05/jabil.svg">
                <img src="https://addepto.com/wp-content/uploads/2024/03/NDA-2.png">
              </div>
              <div class="slides_carosal">
                <img src="https://addepto.com/wp-content/uploads/2022/05/sita.svg">
                <img src="https://addepto.com/wp-content/uploads/2022/06/hertz.svg">
                <img src="https://addepto.com/wp-content/uploads/2022/05/inpost.svg">
                <img src="https://addepto.com/wp-content/uploads/2022/06/abb.svg">
                <img src="https://addepto.com/wp-content/uploads/2022/05/jabil.svg">
                <img src="https://addepto.com/wp-content/uploads/2024/03/NDA-2.png">
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="row mt-5">
      <div class="col-md-4 p-0">
        <div class="dark-bg d-flex flex-column justify-content-center px-5 py-0">
          <h3 class="text-white">Let's discuss <br>a solution <br>for you</h3>
          <div class="d-flex align-items-center pt-4">
            <div class="icon xl circle">
              <img class="img-fluid" style="border-radius: 50%;" data-src="https://addepto.com/wp-content/themes/addepto/img/edwin-lisowski-2.webp" alt="" src="https://addepto.com/wp-content/themes/addepto/img/edwin-lisowski-2.webp" srcset="https://addepto.com/wp-content/themes/addepto/img/edwin-lisowski-2.webp">
            </div>
            <div>
              <p class="text-white"><strong>Edwin Lisowski</strong></p>
              <p class="text-white">will help you estimate <br>your project.</p>
              <div class="d-flex align-items-center">
                <img class="fit icon s" data-src="https://addepto.com/wp-content/themes/addepto/img/envelope-icon.svg" alt="" src="https://addepto.com/wp-content/themes/addepto/img/envelope-icon.svg" srcset="https://addepto.com/wp-content/themes/addepto/img/envelope-icon.svg">
                <a class="text-white" href="mailto:hi@addepto.com">hi@addepto.com</a>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-8 p-0">
        <form class="p-5 d-flex flex-column justify-content-center">
          <div class="row">
            <div class="form-group col-md-4">
              <label for="inputEmail4">Full name</label>
              <input type="text" class="form-control" id="inputEmail4" placeholder="Name and surname">
            </div>
            <div class="form-group col-md-4">
              <label for="inputPassword4">Email</label>
              <input type="email" class="form-control" id="inputPassword4" placeholder="Email address">
            </div>
            <div class="form-group col-md-4">
              <label for="inputEmail4">Phone number</label>
              <input type="number" class="form-control" id="inputEmail4" placeholder="+00 000 000 000">
            </div>
            <div class="form-group col-12">
              <label for="exampleFormControlTextarea1">Your Message Here</label>
              <textarea class="form-control message-text-area" id="exampleFormControlTextarea1" rows="3"></textarea>
            </div>
          </div>
          <div class="required-text d-flex justify-content-end">
            Required fields
          </div>
          <div class="row">
            <div class="col-md-8">
              <p>For more information about how we process your personal data see our <br>
                <a href="#"><b>Privacy policy</b></a>
              </p>
              <div class="d-flex align-items-start">
                <input class="mt-1" id="form-term-2" type="checkbox">
                <label class="px-2" for="form-term-2">I consent to the processing of my personal data for marketing purposes (e.g. receiving newsletters, marketing calls, SMS messages).</label>
              </div>
            </div>
            <div class="col-md-4 d-flex justify-content-end align-items-end p-0">
              <button type="button" class="btn btn-sm btn-primary px-2">Estimate project</button>
            </div>
          </div>
        </form>
      </div>
    </div>
    <section>
      <div class="section__bg animation__img p-5">
        <h3 class="text-white">Check out our other services</h3>
        <div class="row" data-animation="false">
          <div class="col-md-4 p-0">
            <a class="services-card tile m-1" href="https://addepto.com/mlops-consulting/">
              <div class="text-white">MLOps Consulting</div>
              <strong class="text-white pt-3">check</strong>
            </a>
          </div>
          <div class="col-md-4 p-0">
            <a class="services-card tile m-1" href="https://addepto.com/business-intelligence-services/">
              <div class="text-white">Business Intelligence Services</div>
              <strong class="text-white pt-3">check</strong>
            </a>
          </div>
          <div class="col-md-4 p-0">
            <a class="services-card tile m-1" href="https://addepto.com/computer-vision-solutions/">
              <div class="text-white">Computer Vision Solutions</div>
              <strong class="text-white pt-3">check</strong>
            </a>
          </div>
          <div class="col-md-4 p-0">
            <a class="services-card tile m-1" href="https://addepto.com/data-engineering-services/">
              <div class="text-white">Data Engineering Services</div>
              <strong class="text-white pt-3">check</strong>
            </a>
          </div>
        </div>
      </div>
    </section>
  </section>

  <!-- ===============New Section by edned Arsam================== -->


  <!--=================================footer-->
  <footer class="footer pt-top">
    <div class="bg-primary">
      <div class="container">
        <div class="row ">
          <div class="col-1"></div>
          <div class="col-10">
            <div class="bg-white shadow-lg p-4 p-sm-5 border-radius mt-5 mt-lg-n6" style="background-image: url(images/slider/4.jpg);">
              <div class="row">
                <div class="col-lg-12">
                  <h3>You Have Several Ways To Get In <span class="text-purple">Success</span></h3>
                  <div class="mb-3 d-flex">
                    <i class="fas fa-arrow-right pr-3 pt-1 text-dark"></i>
                    <div>
                      <h6 class="text-dark">Visit us at our office in <span class="text-purple">United Kingdom, United Arab Emirates or Kingdom of Saudi Arabia</span></h6>
                    </div>
                  </div>
                  <div class="mb-3 d-flex">
                    <i class="fas fa-arrow-right pr-3 pt-1 text-dark"></i>
                    <div>
                      <h6 class="text-dark">If you are using social media, find us on <span class="text-purple">Linkedin, Facebook</span></h6>
                    </div>
                  </div>
                  <div class="mb-3 d-flex">
                    <i class="fas fa-arrow-right pr-3 pt-1 text-dark"></i>
                    <div>
                      <h6 class="text-dark">If you prefer,<span class="text-purple">"info@biztek"</span> with your query. </h6>
                    </div>
                  </div>
                  <div class="form-group mb-0 center">
                    <button type="submit" class="btn btn-purple text-white" data-toggle="modal" data-target="#contactus">Contact Us<i class="fas fa-arrow-right pl-3"></i></button>
                  </div>
                </div>
                <!--modal-->
                <div class="modal fade" id="contactus" tabindex="-1" role="dialog" aria-labelledby="contactusLabel" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-body">
                        <h4>Need assistance? please fill the form</h4>
                        <form class="mt-4">
                          <div class="form-group mb-3">
                            <input type="text" class="form-control" id="exampleInputName" placeholder="Name">
                          </div>
                          <div class="form-group mb-3">
                            <input type="text" class="form-control" id="exampleInputEmail" placeholder="Email">
                          </div>
                          <div class="form-group mb-3">
                            <input type="text" class="form-control" id="exampleInputEnquiry" placeholder="Subject">
                          </div>
                          <div class="form-group mb-4">
                            <textarea class="form-control" id="exampleInputEnquiry-Description" placeholder="Description" rows="5"></textarea>
                          </div>
                          <div class="form-group mb-4">
                            <div class="custom-control custom-checkbox">
                              <input type="checkbox" class="custom-control-input" id="customCheck1">
                              <label class="custom-control-label small" for="customCheck1">I agree to talk about my project with Biztek</label>
                            </div>
                          </div>
                          <div class="form-group mb-0">
                            <button type="submit" class="btn btn-purple text-white">Send Massage<i class="fas fa-arrow-right pl-3"></i></button>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
                <!--modal-->
              </div>
            </div>
          </div>
          <div class="col-1"></div>
        </div>
        <div class="row py-5 py-lg-6">
          <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6">
              <div class="footer-contact-info">
                <a href="index.html"><img class="img-fluid mb-4" style="width:130px;" src="images/biztek-logo-2.png" alt="logo"></a>
                <p class="mb-2 mb-sm-4">We have years of involvement in principles consistent HTML, PERL CGI, ASP, JAVA and PHP scripts; a wide assortment of database motors; standard picture control, and PDF change.</p>
                <div class=" text-center text-lg-left mb-3 mb-lg-0">
                  <ul class="list-unstyled mb-0 social-icon">
                    <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                    <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                    <li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
                    <li><a href="#"><i class="fab fa-github"></i></a></li>
                  </ul>
                </div>
              </div>
            </div>
            <div class="col-lg-5 col-md-6 col-sm-12 mt-4 mt-md-0 pl-lg-5">
              <h5 class=" mb-2 mb-sm-4">IT Services</h5>
              <div class="footer-link">
                <ul class="list-unstyled mb-0">
                  <li><a href="#">Data Synchronization</a></li>
                  <li><a href="#">Content Management</a></li>
                  <li><a href="#">Content Delivery</a></li>
                  <li><a href="#">Transaction Processing</a></li>
                  <li><a href="#">Process Automation</a></li>
                  <li><a href="#">Event Processing</a></li>
                </ul>
                <ul class="list-unstyled mb-0">
                  <li><a href="#">Event Processing</a></li>
                  <li><a href="#">Information Security</a></li>
                  <li><a href="#">Mobile Platforms</a></li>
                  <li><a href="#">Communications</a></li>
                  <li><a href="#">Content Management</a></li>
                  <li><a href="#">Content Delivery</a></li>
                </ul>
              </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-6 mt-4 mt-lg-0">
              <h5>Head office</h5>
              <p>214 West Arnold St. New York, NY 10002</p>
              <p><i class="fab fa-whatsapp mr-2 "></i>+(704) 279-1249</p>
              <p><i class="far fa-envelope mr-2"></i>info@biztek.com</p>
              <h4 class="mb-0 font-weight-bold"><a href="#">+(704) 279-1249</a></h4>
            </div>
          </div>
        </div>
      </div>
    </div>
  </footer>
  <!--=================================
    footer-->
  <!--=================================
    Back To Top-->
  <div id="back-to-top" class="back-to-top">up</div>
  <!--=================================
    Back To Top-->

  <!--=================================
    Javascript -->

  <!-- JS Global Compulsory (Do not remove)-->
  <script src="js/jquery-3.4.1.min.js"></script>
  <script>
    $(document).ready(function() {
      const $sideMenuLinks = $('.side-menu ul li a');
      const $mainMenuSections = $('.main-menu > div');

      function setActiveLink() {
        const scrollTop = $(window).scrollTop();
        $mainMenuSections.each(function() {
          const sectionId = $(this).attr('id');
          const sectionOffset = $(this).offset().top;
          const windowHeight = $(window).height();
          if (scrollTop >= sectionOffset && scrollTop < sectionOffset + windowHeight) {
            $sideMenuLinks.removeClass('side-menu-active');
            $(`.side-menu ul li a[href="#${sectionId}"]`).addClass('side-menu-active');
          }
        });
      }
      setActiveLink();

      $(window).on('scroll', setActiveLink);

      $sideMenuLinks.on('click', function(event) {
        $sideMenuLinks.removeClass('side-menu-active');
        $(this).addClass('side-menu-active');
      });

      $sideMenuLinks.eq(0).addClass('side-menu-active');
    });
  </script>
  <script>
    $(document).ready(function() {
      $(".industry-expertise-img img:first").show();
      $(".industry-expertise-link").click(function() {
        var index = $(this).parent().index();
        $(".industry-expertise-img img").hide().eq(index).show();
      });
    });
  </script>

  <script src="js/popper/popper.min.js"></script>
  <script src="js/bootstrap/bootstrap.min.js"></script>

  <!-- Page JS Implementing Plugins (Remove the plugin script here if site does not use that feature)-->
  <script src="js/jquery.appear.js"></script>
  <script src="js/swiper/swiper.min.js"></script>
  <script src="js/swiperanimation/SwiperAnimation.min.js"></script>
  <script src="js/owl-carousel/owl.carousel.min.js"></script>
  <script src="js/counter/jquery.countTo.js"></script>
  <script src="js/jarallax/jarallax.min.js"></script>
  <script src="js/jarallax/jarallax-video.min.js"></script>
  <script src="js/magnific-popup/jquery.magnific-popup.min.js"></script>

  <!-- Template Scripts (Do not remove)-->
  <script src="js/custom.js"></script>
  <script>
    $(document).ready(function() {
      $('.owl-carousel').owlCarousel({
        loop: true,
        margin: 10,
        nav: false,
        dots: true,
        responsive: {
          0: {
            items: 1
          },
          600: {
            items: 2
          },
          1000: {
            items: 3
          }
        }
      });

      // Custom navigation arrows
      $('.custom-nav .owl-prev').click(function() {
        $('.owl-carousel').trigger('prev.owl.carousel');
      });

      $('.custom-nav .owl-next').click(function() {
        $('.owl-carousel').trigger('next.owl.carousel');
      });
    });
  </script>

</body>

</html>