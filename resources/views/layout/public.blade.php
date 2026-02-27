<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield("title")</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
    <nav class="navbar navbar-expand-md navbar-dark bg-dark">
      <div class="container-fluid">
        <a class="navbar-brand" href="{{ route("homepage") }}">Home</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
          <ul class="navbar-nav me-auto mb-2 mb-md-0">
            @guest
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="{{ route("homepage") }}">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ route("login") }}">Login</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ route("register") }}">Register</a>
            </li>
            @endguest
            @auth
              <li>
                <a class="nav-link {{ Route::is('loggedin.dashboard') ? 'active' : '' }}" href="{{ route("loggedin.dashboard") }}">Dashboard</a>
              </li>
              <li>
                <a class="nav-link {{ Route::is('loggedin.income') ? 'active' : '' }}" href="{{ route("loggedin.income") }}">Income</a>
              </li>
              <li>
                <a class="nav-link {{ Route::is('loggedin.expenses') ? 'active' : '' }}" href="{{ route("loggedin.expenses") }}">Expenses</a>
              </li>
              <li>
                <a class="nav-link {{ Route::is('loggedin.budget') ? 'active' : '' }}" href="{{ route("loggedin.budget") }}">Budgets</a>
              </li>
              <li>
                <a class="nav-link {{ Route::is('loggedin.exchange') ? 'active' : '' }}" href="{{ route("loggedin.exchange") }}">Currency Converter</a>
              </li>
              <li>
                <a class="nav-link {{ Route::is('loggedin.reports') ? 'active' : '' }}" href="{{ route("loggedin.reports") }}">Reports</a>
              </li>
              <li>
                <a class="nav-link" href="{{ route("logout") }}">Logout</a>
              </li>
            @endauth
          </ul>
        </div>
      </div>
    </nav>
  </head>
  <body>
    <div class="container">
        @yield("content")
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
  
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            setTimeout(function() {
                let alerts = document.querySelectorAll('.alert');
                alerts.forEach(function(alert) {
                    // Bootstrap 5 način za zatvaranje
                    let bsAlert = new bootstrap.Alert(alert);
                    bsAlert.close();
                });
            }, 3000); // 3000ms = 3 sekunde
        });
    </script>
  </body>
</html>