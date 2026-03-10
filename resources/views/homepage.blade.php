@extends("layout.app")

@section('title')
  Lacks
@endsection

@section('content')

<div id="myCarousel" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-indicators">
      <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
      <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
      <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div>
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="{{ asset("img/sajtt.jpg") }}" class="d-block w-100" style="object-fit: cover; height: 100%;" alt="Opis slike">
        <div style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; background: rgba(0, 0, 0, 0.1); z-index: 1;"></div>

        <div class="container">
          <div class="carousel-caption text-end" style="background: rgba(255, 255, 255, 0.6); backdrop-filter: blur(10px); padding: 30px;       border-radius: 20px; bottom: 10%; max-width: 600px; margin-left: auto;">
            <h1 style="color: black;">Track Your Money. Control Your Life.</h1>
            <p style="color: black">A simple and powerful way to track your income and expenses, understand where your money goes.</p>
            @guest
              <p><a class="btn btn-lg btn-primary" href="{{ route("login") }}">Sign up today</a></p>
            @endguest
            @auth
              <p><a class="btn btn-lg btn-primary" href="{{ route("loggedin.dashboard") }}">Dashboard</a></p>
            @endauth
          </div>
        </div>
      </div>
      <div class="carousel-item">
        <img src="{{ asset('img/coins.jpg') }}" class="d-block w-100" style="object-fit: cover; object-position: 50% 85%; height: 60vh;" alt="Opis slike">
    
        <div class="container">
            <div class="carousel-caption text-end" style="background: rgba(255, 255, 255, 0.6); backdrop-filter: blur(10px); padding: 30px; border-radius: 20px; bottom: 10%; max-width: 600px; margin-left: auto;">
                <h1 class="" style="color: #000;">Finance Management Made Simple.</h1>
                <p style="color: #333; font-size: 1.2rem;">No more messy spreadsheets. Organize your expenses by category and see your financial health at a glance.</p>
                @guest
                <p><a class="btn btn-lg btn-primary" href="{{ route("login") }}">Sign up today</a></p>
              @endguest
              @auth
                <p><a class="btn btn-lg btn-primary" href="{{ route("loggedin.dashboard") }}">Dashboard</a></p>
              @endauth            
            </div>
        </div>
    </div>
      <div class="carousel-item">
        <img src="{{ asset("img/northfolk-Ok76F6yW2iA-unsplash.jpg") }}" class="d-block w-100" style="object-fit: cover; height: 60vh;" alt="Opis slike">

        <div class="container">
          <div class="carousel-caption text-end" style="background: rgba(255, 255, 255, 0.6); backdrop-filter: blur(10px); padding: 30px;   border-radius: 20px; bottom: 10%; max-width: 600px; margin-left: auto;">
            <h1 style="color: black">Save More, Stress Less.</h1>
            <p style="color: black">Identify spending habits that hold you back. Set goals and watch your savings grow month over month.</p>
            @guest
              <p><a class="btn btn-lg btn-primary" href="{{ route("login") }}">Sign up today</a></p>
            @endguest
            @auth
              <p><a class="btn btn-lg btn-primary" href="{{ route("loggedin.dashboard") }}">Dashboard</a></p>
            @endauth          
          </div>
        </div>
      </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#myCarousel" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#myCarousel" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>


  <!-- Marketing messaging and featurettes
  ================================================== -->
  <!-- Wrap the rest of the page in another container to center all the content. -->

  <div class="container marketing">

    <!-- Three columns of text below the carousel -->
    <div class="row fade-group">
      <div class="col-lg-4">
        <img src="{{ asset("img/ibrahim-rifath-OApHds2yEGQ-unsplash.jpg") }}" class="rounded-circle fade-in" width="140" height="140">

        <h2 class="fade-in">Secure & Private</h2>
        <p class="fade-in">Your financial data stays private and secure, always.</p>
      </div><!-- /.col-lg-4 -->
      <div class="col-lg-4">
        <img src="{{ asset("img/calculator.jpg") }}" class="bd-placeholder-img rounded-circle fade-in" width="140" height="140">

        <h2 class="fade-in">Visual Reports & Charts</h2>
        <p class="fade-in">See your spending trends with clear charts monthly totals, category breakdowns, and comparisons over time.</p>
      </div><!-- /.col-lg-4 -->
      <div class="col-lg-4">
        <img src="{{ asset("img/sajtt.jpg") }}" class="bd-placeholder-img rounded-circle fade-in" width="140" height="140">

        <h2 class="fade-in">Smart Expense Tracking</h2>
        <p class="fade-in">Easily add, edit, and categorize your expenses. Everything is stored securely and organized by date and category.</p>
      </div><!-- /.col-lg-4 -->
    </div><!-- /.row -->


    <!-- START THE FEATURETTES -->

    <hr class="featurette-divider">

    <div class="row featurette fade-in">
      <div class="col-md-7">
        <h2 class="featurette-heading">Managing money doesn’t have to be complicated<span class="text-muted"></span></h2>
        <p class="lead">Our expense and income tracker helps you stay organized, reduce unnecessary spending, and build better financial habits — all in one place...</p>
      </div>
      <div class="col-md-5">
        <img src="{{ asset('img/ben-kolde-FaPxZ88yZrw-unsplash.jpg') }}" class="img-fluid mx-auto shadow-lg" width="500" height="500" style="object-fit: cover;" alt="Opis slike">
      </div>
    </div>

    <hr class="featurette-divider">

    <div class="row featurette fade-in">
      <div class="col-md-7 order-md-2">
        <h2 class="featurette-heading">Help Your Money Grow</h2>
        <p class="lead">When you track your income and expenses, you stop guessing and start making smarter decisions. This app helps you identify unnecessary spending, optimize your budget, and redirect your money toward what really matters.</p>
      </div>
      <div class="col-md-5 order-md-1">
        <img src="{{ asset('img/micheile-henderson-ZVprbBmT8QA-unsplash.jpg') }}" class="img-fluid mx-auto shadow-lg" width="500" height="500" style="object-fit: cover;" alt="Opis slike">

      </div>
    </div>

    <hr class="featurette-divider">

    <div class="row featurette fade-in">
      <div class="col-md-7">
        <h2 class="featurette-heading">Structured tracking for long-term financial growth</h2>
        <p class="lead">Maintain a clear financial structure over time through categorized transactions, historical records, and consistent financial monitoring that supports sustainable growth.</p>
      </div>
      <div class="col-md-5">
        <img src="{{ asset('img/budget.jpg') }}" class="bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid mx-auto shadow-lg" width="500" height="500">

      </div>
    </div>

    <hr class="featurette-divider">

    <!-- /END THE FEATURETTES -->

  </div><!-- /.container -->


  <!-- FOOTER -->
  <footer class="container">
    <p class="float-end"><a href="#" class="btn btn-outline-secondary">Back to top</a></p>
    <p>&copy; 2020–2026 Lacks, Inc. &middot; <a href="/privacy">Privacy</a> &middot; <a href="/terms">Terms</a></p>
  </footer>
  @endsection