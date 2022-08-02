<!DOCTYPE html>
<html lang="en-US">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Right Resume</title>
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin="crossorigin"/>
    <link rel="preload" as="style" href="https://fonts.googleapis.com/css2?family=Poppins:wght@600&amp;family=Roboto:wght@300;400;500;700&amp;display=swap"/>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@600&amp;family=Roboto:wght@300;400;500;700&amp;display=swap" media="print" onload="this.media='all'"/>
    <noscript>
      <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@600&amp;family=Roboto:wght@300;400;500;700&amp;display=swap"/>
    </noscript>
    <link href="/css/font-awesome/css/all.min.css?ver=1.2.0" rel="stylesheet">
    <link href="/css/bootstrap.min.css?ver=1.2.0" rel="stylesheet">
    <link href="/css/aos.css?ver=1.2.0" rel="stylesheet">
    <link href="/css/main.css?ver=1.2.0" rel="stylesheet">
    <noscript>
      <style type="text/css">
        [data-aos] {
            opacity: 1 !important;
            transform: translate(0) scale(1) !important;
        }
      </style>
    </noscript>
  </head>
  <body id="top">
    <header class="d-print-none">
      <div class="container text-center text-lg-left">
        <div class="py-3 clearfix">
          <h1 class="site-title mb-0">{{ $name }}</h1>
          <div class="site-nav">
            <nav role="navigation">
              
            </nav>
          </div>
        </div>
      </div>
    </header>
    <div class="page-content">
      <div class="container">
<div class="cover shadow-lg bg-white">
  <div class="cover-bg p-3 p-lg-4 text-white">
    <div class="row">
      <div class="col-lg-4 col-md-5">
        <div class="avatar hover-effect bg-white shadow-sm p-1"><img src= "{{ url('images/'.$image)}}" width="200" height="200"/></div>
      </div>
      <div class="col-lg-8 col-md-7 text-center text-md-start">
        <h2 class="h1 mt-2" data-aos="fade-left" data-aos-delay="0">{{ $name }}</h2>
        <p data-aos="fade-left" data-aos-delay="100">{{ $worktitle }}</p>
        <div class="d-print-none" data-aos="fade-left" data-aos-delay="200"><a class="btn btn-light text-dark shadow-sm mt-1 me-1" href="right-resume.pdf" target="_blank">Download CV</a><a class="btn btn-success shadow-sm mt-1" href="#contact">Hire Me</a></div>
      </div>
    </div>
  </div>
  <div class="about-section pt-4 px-3 px-lg-4 mt-1">
    <div class="row">
      <div class="col-md-5 offset-md-1">
        <div class="row mt-2">
          <div class="col-sm-4">
            <div class="pb-1">Age</div>
          </div>
          <div class="col-sm-8">
            <div class="pb-1 text-secondary">{{ $age }}</div>
          </div>
          <div class="col-sm-4">
            <div class="pb-1">Email</div>
          </div>
          <div class="col-sm-8">
            <div class="pb-1 text-secondary">{{ $email }}</div>
          </div>
          <div class="col-sm-4">
            <div class="pb-1">Phone</div>
          </div>
          <div class="col-sm-8">
            <div class="pb-1 text-secondary">{{ $phone }}</div>
          </div>
          <div class="col-sm-4">
            <div class="pb-1">Address</div>
          </div>
          <div class="col-sm-8">
            <div class="pb-1 text-secondary">{{ $address }}</div>
          </div>
        </div>
      </div>
    </div>
  </div>
  
  <hr class="d-print-none"/>
  <div class="work-experience-section px-3 px-lg-4">
    <h2 class="h3 mb-4">Work Experience</h2>
    <div class="timeline">
      <div class="timeline-card timeline-card-primary card shadow-sm">
        <div class="card-body">
          <div class="h5 mb-1">{{ $worktitle }} <span class="text-muted h6">{{ $workcompany }}</span></div>
        </div>
      </div>
  </div>
  <hr class="d-print-none"/>
  <div class="page-break"></div>
  <div class="education-section px-3 px-lg-4 pb-4">
    <h2 class="h3 mb-4">Education</h2>
    <div class="timeline">
      
      <div class="timeline-card timeline-card-success card shadow-sm">
        <div class="card-body">
          <div class="h5 mb-1">{{ $educationdiscipline }} <span class="text-muted h6">from {{ $educationplace }}</span></div>
        </div>
      </div>
  </div>
  <hr class="d-print-none"/>
  
</div></div>
    </div>
    <footer class="pt-4 pb-4 text-muted text-center d-print-none">
      <div class="container">
        <div class="my-3">
          <div class="h4">{{ $name }}</div>
        </div>
      </div>
    </footer>
    <script src="scripts/bootstrap.bundle.min.js?ver=1.2.0"></script>
    <script src="scripts/aos.js?ver=1.2.0"></script>
    <script src="scripts/main.js?ver=1.2.0"></script>
  </body>
</html>