<style>
    .contact_field:focus {
        color: white !important;
    }
    .maplink{
        color:rgba(255, 255, 255, .65);

    }
    .maplink:hover{
        color: red !important;
    }
</style>

@include('layouts/website/header')
<!-- Header -->
<header id="header">
    <div class="intro">
        <div class="overlay">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2 intro-text">
                        <h1>Bronx-based real estate <br>
                            management company</h1>
                        <p>The company is responsible for managing the day-to-day operation of approximately 350
                            buildings
                            containing over 11,000 dwelling units and 300 commercial units.</p>
                        <a href="#about" class="btn btn-custom btn-lg page-scroll">Apply Now</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
<!-- Get Touch Section -->
<div id="get-touch">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-md-6 col-md-offset-1">
                <h3>Cost for your home renovation project</h3>
                <p>Get started today and complete our form to request your free estimate</p>
            </div>
            <div class="col-xs-12 col-md-4 text-center"><a href="#contact"
                    class="btn btn-custom btn-lg page-scroll">Free
                    Estimate</a></div>
        </div>
    </div>
</div>


<!-- Services Section -->
<div id="services">
    <div class="container">
        <div class="section-title">
            <h2>Our Services</h2>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="service-media"> <img src="{{ asset('assets/website/img/property.avif') }}" alt=" ">
                </div>
                <div class="service-desc">
                    <h3>PROPERTY MANAGEMENT</h3>
                    <p>Langsam Property Services Corp. is a full-service organization that provides all property
                        management
                        related services. These include building maintenance, legal services, tenant account management,
                        financial
                        management and analysis, and insurance coverage.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="service-media"> <img
                        src="{{ asset('assets/website/img/istockphoto-1297780288-170667a.webp') }}" alt=" ">
                </div>
                <div class="service-desc">
                    <h3>CONSTRUCTION SERVICES</h3>
                    <p>Langsam Property Services Corp. and its affiliated company, RLA General Contracting Corp. (RLA),
                        have the
                        capability of acting as construction manager and general contractor for building rehabilitation
                        work.
                        Current professional employees have several years experience in construction and design.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="service-media"> <img src="{{ asset('assets/website/img/ASSET MANAGEMENT.jpg') }}"
                        alt=" "> </div>
                <div class="service-desc">
                    <h3>ASSET MANAGEMENT</h3>
                    <p>Asset management differs from day-to-day management of property. Institutional investors,
                        recognized
                        that, while their organizations may have the best financial analysts in the world, they lacked
                        the
                        technical expertise to manage real estate. These investors realized that the most efficient way
                        to manage
                        their portfolio was to outsource the Asset Management function.</p>
                </div>
            </div>
        </div>
        <!-- <div class="row">
        <div class="col-md-4">
          <div class="service-media"> <img src="img/services/service-4.jpg" alt=" "> </div>
          <div class="service-desc">
            <h3>Kitchen Remodels</h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis sed dapibus leo nec ornare diam sedasd
              commodo nibh ante facilisis bibendum dolor feugiat at.</p>
          </div>
        </div>
        <div class="col-md-4">
          <div class="service-media"> <img src="img/services/service-5.jpg" alt=" "> </div>
          <div class="service-desc">
            <h3>Windows & Doors</h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis sed dapibus leo nec ornare diam sedasd
              commodo nibh ante facilisis bibendum dolor feugiat at.</p>
          </div>
        </div>
        <div class="col-md-4">
          <div class="service-media"> <img src="img/services/service-6.jpg" alt=" "> </div>
          <div class="service-desc">
            <h3>Decks & Porches</h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis sed dapibus leo nec ornare diam sedasd
              commodo nibh ante facilisis bibendum dolor feugiat at.</p>
          </div>
        </div>
      </div> -->
    </div>
</div>
<!-- Testimonials Section -->
<div id="testimonials">
    <div class="container">
        <div class="section-title">
            <h2>PROJECTS</h2>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="testimonial">
                    <div class="testimonial-image"> <img src="{{ asset('assets/website/img/testimonials/01.jpg') }}"
                            alt=""> </div>
                    <div class="testimonial-content">
                        <p>"Park South Lofts <span class="testimonial-meta">(43-45 East 30th Street)</span>, in the
                            Rosehill
                            section of Manhattan, was completed in
                            2005. All of the luxury condominium lofts have been sold out. The highlight was a five-story
                            “Mansion in
                            the Sky” with an internal elevator, over 2000 square feet of terraces, and a rooftop pool."
                        </p>
                        <!-- <div class="testimonial-meta"> - John Doe </div> -->
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="testimonial">
                    <div class="testimonial-image"> <img src="{{ asset('assets/website/img/testimonials/02.jpg') }}"
                            alt=""> </div>
                    <div class="testimonial-content">
                        <p>" <span class="testimonial-meta">123-125 Baxter Street</span>, in Little Italy, Manhattan,
                            features 22
                            luxury condominiums, a spectacular
                            townhouse, and NYC’s first fully automated garage. The development was completed in 2007."
                        </p>
                        <!-- <div class="testimonial-meta"> - Johnathan Doe </div> -->
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="testimonial">
                    <div class="testimonial-image"> <img src="{{ asset('assets/website/img/testimonials/03.jpg') }}"
                            alt=""> </div>
                    <div class="testimonial-content">
                        <p>"The Omni <span class="testimonial-meta">(206 East 95th Street)</span>, in Manhattan's
                            prestigious
                            Upper East Side, is a 43-unit, 18-story
                            condominium targeted at first-time home buyers. The building contains a full-time doorman
                            and unique
                            rooftop terraces. The development was completed in 2007."</p>
                        <!-- <div class="testimonial-meta"> - John Doe </div> -->
                    </div>
                </div>
            </div>
            <div class="row"> </div>
            <div class="col-md-4">
                <div class="testimonial">
                    <div class="testimonial-image"> <img src="{{ asset('assets/website/img/testimonials/04.jpg') }}"
                            alt=""> </div>
                    <div class="testimonial-content">
                        <p>"M at Beekman <span class="testimonial-meta">(343 East 50th Street)</span>, in Manhattan, is
                            a 24-unit
                            luxury condominium with townhouse and
                            loft-style units. High ceilings, luxurious moldings, and superior finishes are features. The
                            project was
                            completed in 2007."</p>
                        <!-- <div class="testimonial-meta"> - Johnathan Doe </div> -->
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="testimonial">
                    <div class="testimonial-image"> <img src="{{ asset('assets/website/img/testimonials/05.jpg') }}"
                            alt=""> </div>
                    <div class="testimonial-content">
                        <p>"L Lofts <span class="testimonial-meta">(1610 DeKalb Avenue)</span>, in Brooklyn, is a luxury
                            and
                            retail development in the
                            Ridgewood/Bushwick development zone. It has loft-like apartment living at affordable prices
                            with upper
                            floor views of Manhattan and only a few short subway stops away!"</p>
                        <!-- <div class="testimonial-meta"> - John Doe </div> -->
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="testimonial">
                    <div class="testimonial-image"> <img src="{{ asset('assets/website/img/testimonials/06.jpg') }}"
                            alt=""> </div>
                    <div class="testimonial-content">
                        <p>"<span class="testimonial-meta">100 Wyckoff Avenue</span>, in Brooklyn, is a 90-space secure
                            parking
                            facility developed near Wyckoff Heights
                            Hospital. This facility operates on a 24/7 basis and has access to the developed units at
                            1610 DeKalb
                            Avenue."</p>
                        <!-- <div class="testimonial-meta"> - Johnathan Doe </div> -->
                    </div>
                </div>
            </div>
            <div>

                <div class="row"> </div>
                <div class="col-md-4">
                    <div class="testimonial">
                        <div class="testimonial-image"> <img
                                src="{{ asset('assets/website/img/testimonials/06.jpg') }}" alt=""> </div>
                        <div class="testimonial-content">
                            <p><span class="testimonial-meta">552 W. 43rd Street </span>"is a boutique 10-unit
                                condominium building
                                converted out of an old horse stable.
                                The project was completed in 2009."</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Gallery Section -->
<!-- <div id="portfolio">
    <div class="container">
      <div class="section-title">
        <h2>Our Works</h2>
      </div>
      <div class="row">
        <div class="portfolio-items">
          <div class="col-sm-6 col-md-4 col-lg-4">
            <div class="portfolio-item">
              <div class="hover-bg"> <a href="img/portfolio/01-large.jpg" title="Project Title"
                  data-lightbox-gallery="gallery1">
                  <div class="hover-text">
                    <h4>Lorem Ipsum</h4>
                  </div>
                  <img src="img/portfolio/01-small.jpg" class="img-responsive" alt="Project Title">
                </a> </div>
            </div>
          </div>
          <div class="col-sm-6 col-md-4 col-lg-4">
            <div class="portfolio-item">
              <div class="hover-bg"> <a href="img/portfolio/02-large.jpg" title="Project Title"
                  data-lightbox-gallery="gallery1">
                  <div class="hover-text">
                    <h4>Adipiscing Elit</h4>
                  </div>
                  <img src="img/portfolio/02-small.jpg" class="img-responsive" alt="Project Title">
                </a> </div>
            </div>
          </div>
          <div class="col-sm-6 col-md-4 col-lg-4">
            <div class="portfolio-item">
              <div class="hover-bg"> <a href="img/portfolio/03-large.jpg" title="Project Title"
                  data-lightbox-gallery="gallery1">
                  <div class="hover-text">
                    <h4>Lorem Ipsum</h4>
                  </div>
                  <img src="img/portfolio/03-small.jpg" class="img-responsive" alt="Project Title">
                </a> </div>
            </div>
          </div>
          <div class="col-sm-6 col-md-4 col-lg-4">
            <div class="portfolio-item">
              <div class="hover-bg"> <a href="img/portfolio/04-large.jpg" title="Project Title"
                  data-lightbox-gallery="gallery1">
                  <div class="hover-text">
                    <h4>Lorem Ipsum</h4>
                  </div>
                  <img src="img/portfolio/04-small.jpg" class="img-responsive" alt="Project Title">
                </a> </div>
            </div>
          </div>
          <div class="col-sm-6 col-md-4 col-lg-4">
            <div class="portfolio-item">
              <div class="hover-bg"> <a href="img/portfolio/05-large.jpg" title="Project Title"
                  data-lightbox-gallery="gallery1">
                  <div class="hover-text">
                    <h4>Adipiscing Elit</h4>
                  </div>
                  <img src="img/portfolio/05-small.jpg" class="img-responsive" alt="Project Title">
                </a> </div>
            </div>
          </div>
          <div class="col-sm-6 col-md-4 col-lg-4">
            <div class="portfolio-item">
              <div class="hover-bg"> <a href="img/portfolio/06-large.jpg" title="Project Title"
                  data-lightbox-gallery="gallery1">
                  <div class="hover-text">
                    <h4>Dolor Sit</h4>
                  </div>
                  <img src="img/portfolio/06-small.jpg" class="img-responsive" alt="Project Title">
                </a> </div>
            </div>
          </div>
          <div class="col-sm-6 col-md-4 col-lg-4">
            <div class="portfolio-item">
              <div class="hover-bg"> <a href="img/portfolio/07-large.jpg" title="Project Title"
                  data-lightbox-gallery="gallery1">
                  <div class="hover-text">
                    <h4>Dolor Sit</h4>
                  </div>
                  <img src="img/portfolio/07-small.jpg" class="img-responsive" alt="Project Title">
                </a> </div>
            </div>
          </div>
          <div class="col-sm-6 col-md-4 col-lg-4">
            <div class="portfolio-item">
              <div class="hover-bg"> <a href="img/portfolio/08-large.jpg" title="Project Title"
                  data-lightbox-gallery="gallery1">
                  <div class="hover-text">
                    <h4>Lorem Ipsum</h4>
                  </div>
                  <img src="img/portfolio/08-small.jpg" class="img-responsive" alt="Project Title">
                </a> </div>
            </div>
          </div>
          <div class="col-sm-6 col-md-4 col-lg-4">
            <div class="portfolio-item">
              <div class="hover-bg"> <a href="img/portfolio/09-large.jpg" title="Project Title"
                  data-lightbox-gallery="gallery1">
                  <div class="hover-text">
                    <h4>Adipiscing Elit</h4>
                  </div>
                  <img src="img/portfolio/09-small.jpg" class="img-responsive" alt="Project Title">
                </a> </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div> -->
<!-- Inquiry Requirement -->
<div id="requirement">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 " style="display: flex; flex-direction: column;">
                <div class="section-title">
                    <h2>INQUIRY REQUIREMENT</h2>
                </div>
                <div class="list-style">
                    <h4>DOCUMENTS REQUIRED WITH APPLICATION</h4>
                    <div class="col-lg-6 col-sm-6 col-xs-12 list-style-col" style="padding: 0px;">
                        <ul>
                            <li>Cunent lease in the name of the applicant unless the applicant is a first time renter
                            </li>
                            <li>Two .fonns of photo identification, issued by US Government, Stat~ or municipality such
                                as
                                passport, resident card, and driver's license. </li>
                            <li>Birth certificate of any children. Social Security Card of all household members</li>
                            <li>Last 3 consecutive months of utility or phone bill in your name</li>
                            <li>6 recent consecutive pay stubs</li>
                            <li>Original employment letter on company letterhead</li>
                        </ul>
                    </div>
                    <div class="col-lg-6 col-sm-6 col-xs-12 list-style-col" style="padding: 0px;">
                        <ul>
                            <li>Self-Employed: Notmized Letter from accountant or tax preparer projecting current year's
                                earning</li>
                            <li>Last 2 years of income tax returns.with W-2(s) [1099(s) and all other schedules
                                if.applicable]</li>
                            <li>Pension/SSI/Public Assistance Award(s) </li>
                            <li>Proof of child support (if applicable)</li>
                            <li>6 months of recent consecutive bank statements</li>
                            <li>Current savings account statements </li>
                            <li>Rent Subsidy voucher such as Section 8 or any other program </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- About Section -->
<div id="about">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-md-6"> <img src="{{ asset('assets/website/img/about1.jpg') }}"
                    class="img-responsive" alt=""> </div>
            <div class="col-xs-12 col-md-6">
                <div class="about-text">
                    <h2>About Us</h2>
                    <p>Langsam Property Services Corp. (Langsam) is a Bronx-based real estate management company formed
                        by
                        Ralph
                        Langsam in 1949. The President and Chief Executive Officer of the company is Mark Engel.
                        Originally
                        formed
                        as Ralph Langsam Associates, Langsam changed its name in 1993 to reflect the retirement of Ralph
                        Langsam
                        several years before.

                        When Mark Engel joined the organization over 25 years ago, it managed 2,500 housing units.
                        Langsam is
                        now
                        responsible for managing the day-to-day operation of approximately 350 buildings containing over
                        11,000
                        dwelling units and 300 commercial units. The buildings are located in the Bronx, Manhattan,
                        Queens,
                        Brooklyn, and lower Westchester County.</p>

                    <div id="more">
                        <p>Langsam is designated as an Accredited Management Organization (AMO), a standard for
                            excellence in
                            management conferred by the Chicago-based, Institute of Real Estate Management (IREM).

                            Mr. Engel served the Bronx-Manhattan Association of Realtors (BMAR) as Vice President,
                            Treasurer, and
                            twice as President. He currently serves as Vice President of the Rent Stabilization
                            Association (RSA),
                            a
                            trade association representing 25,000 property owners, and as Vice President of the Bronx
                            Realty
                            Advisory Board, which negotiates industry-wide contracts with building service employees'
                            union Local
                            32-B/J. He serves as a member of the Board of Advisors for the newsletter "Apartment Law
                            Insider". He
                            is
                            a member of several other organizations that promote legislation favorable to the industry.
                            He is an
                            advisor to the newly formed and exclusive group of owners known as the New York Realty
                            Group. The
                            prestigious group has fewer than twenty members and membership is by invitation only.

                            Langsam has managed properties for institutions such as Apple Bank for Savings, Northside
                            Savings
                            Bank,
                            Donaldson Lufkin & Jenrette, Emmes Asset Management, Montefiore Hospital Medical Center, the
                            Community
                            Preservation Corporation, and others. Langsam has managed and renovated 1,400 apartments for
                            the City
                            of
                            New York under the Private Ownership and Management Program (POMP). This program reclaimed
                            largely
                            neglected housing, and Langsam received the highest rating ever granted by POMP to a
                            participant in
                            its
                            program.

                            By using the Community Preservation Corporation, the New York City Department of Housing
                            Preservation
                            and Development's Participation Loan Program and Article VIII-A Loan Program and loans from
                            the
                            Federal
                            Home Loan Corporation, Langsam has completed the moderate rehabilitation of over 100
                            apartment
                            buildings. Most renovation has been done with tenants in residence and no tenant has been
                            forced to
                            move
                            permanently as a result of these renovations. Each building stands as a "showplace" in its
                            neighborhood.

                            The company also provides "back office" services for other property managers who want to
                            take
                            advantage
                            of Langsam's purchasing power and expertise in a variety of complex management scenarios.
                            This
                            expertise
                            is increasingly necessary in an ever-changing industry, which is under the authority of many
                            different
                            regulatory agencies.

                            Langsam is well known in the industry as leaders and Langsamtors. As the Bronx Borough
                            President,
                            Fernando Ferrer publicly stated to a group of Realtors, "You can always tell a Langsam
                            building just
                            by
                            driving by it. It will be the cleanest and nicest building on the block."</p>
                    </div>
                    <button onclick="toggleVisibility()" id="readMoreBtn"
                        style="display: block;
              margin-bottom: 20px;
              border: none;
              background: transparent;
              border-bottom: 2px solid black;
              padding: 0px;">Read
                        More</button>

                </div>
            </div>
        </div>
    </div>
</div>
<!-- Contact Section -->
<div id="contact">
    <div class="container">
        <div class="col-md-8">
            <div class="row">
                <div class="section-title">
                    <h2>Get In Touch</h2>
                    <p>Please fill out the form below to send us an email and we will get back to you as soon as
                        possible.</p>
                </div>
                <form name="sentMessage" id="contactForm" novalidate>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="text" id="contact_name" name="contact_name"
                                    class="form-control contact_field" placeholder="Name" required>
                                <p class="help-block text-danger"></p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="email" id="contact_email" name="contact_email"
                                    class="form-control contact_field" placeholder="Email" required>
                                <p class="help-block text-danger"></p>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <textarea name="contact_message" id="contact_message" class="form-control contact_field" rows="4"
                            placeholder="Message" required></textarea>
                        <p class="help-block text-danger"></p>
                    </div>
                    <div id="success"></div>
                    <button type="submit" class="btn btn-custom btn-lg">Send Message</button>
                </form>
            </div>
        </div>
        <div class="col-md-3 col-md-offset-1 contact-info">
            <div class="contact-item">
                <h4>Contact Info</h4>
                <a title="See location on Map"class="maplink"href="https://maps.app.goo.gl/zt8U5ZZzJmCuhcSp9">
                <p><span>Address</span>1601 Bronxdale Avenue Bronx,<br>
                    NY 10462</p>
                </a>
            </div>
            <div class="contact-item">
                <p><span>Phone</span>(718) 518-8000 </p>

            </div>
            <div class="contact-item">
                <p> <span>Fax</span>(718) 518-8585</p>
            </div>
        </div>
        <div class="col-md-12">
            <div class="row">
                <div class="social">
                    <ul>
                        <li><a href="https://www.facebook.com/"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="https://x.com/?lang=en"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Layer_1" width="24px" height="24px" viewBox="0 0 24 24" style="enable-background:new 0 0 24 24;" xml:space="preserve">
                            <path fill="rgba(255, 255, 255, 0.65)" d="M14.095479,10.316482L22.286354,1h-1.940718l-7.115352,8.087682L7.551414,1H1l8.589488,12.231093L1,23h1.940717  l7.509372-8.542861L16.448587,23H23L14.095479,10.316482z M11.436522,13.338465l-0.871624-1.218704l-6.924311-9.68815h2.981339  l5.58978,7.82155l0.867949,1.218704l7.26506,10.166271h-2.981339L11.436522,13.338465z"/>
                          </svg>
                          </a></li>
                        <li><a href="https://www.google.com/"><i class="fa fa-google-plus"></i></a></li>
                        <li><a href="https://www.youtube.com/"><i class="fa fa-youtube"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Footer Section -->
@include('layouts/website/footer')


<script>
    $(document).ready(function() {
        $('#contactForm').validate({
            errorClass: 'text-danger',
            rules: {
                contact_name: {
                    required: true,
                },
                contact_email: {
                    required: true,
                    email: true
                },
                contact_message: {
                    required: true,
                }
            },
            messages: {
                contact_name: {
                    required: "Please enter your name",
                },
                contact_email: {
                    required: "Please enter your email",
                    email: "Please enter a valid email address"
                },
                contact_message: {
                    required: "Please enter a message",
                }
            },
            submitHandler: function(form) {
		$('#uiBlocker').show();
                $.ajax({
                    type: 'POST',
                    url: '{{ route('contactQuery') }}',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: $('#contactForm').serialize(),
                    dataType: 'json',
                    success: function(data) {
                        if (data.status == true || data.status == 'true') {
                           $('#uiBlocker').hide();
                            Lobibox.notify('success', {

                                size: 'mini',
                                rounded: true,
                                delayIndicator: false,
                                icon: 'bx bx-x-circle',
                                continueDelayOnInactiveTab: false,
                                position: 'top center',
                                msg: 'Form submitted, our team will be in touch with you soon'
                            });
                           setTimeout(() => {
                            
                               window.location.reload();
                           }, 2000);
                        }
                    },
                    error: function(xhr, status, error) {
                      $('#uiBlocker').hide();
                        if (xhr.responseJSON && xhr.responseJSON.errors) {
                            var errors = xhr.responseJSON.errors;


                            $.each(errors, function(key, value) {
                                $('[id="' + key + '"]').addClass('is-invalid')
                                    .next('.text-danger').html(value);
                            });
                        }
                    }
                });
            }
        });
    });
</script>
