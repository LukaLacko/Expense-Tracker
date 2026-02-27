@extends("layout.app")


@section("content")
    
    <!-- Custom styles for this template -->
    <link href="{{ asset("css/dashboard.css") }}" rel="stylesheet">

<div class="container-fluid">
  <div class="row">
    <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse min-vh-100 d-flex flex-column">
      <div class="position-sticky pt-3 d-flex flex-column flex-grow-1" style="height: 100%;">
        <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="{{ route("loggedin.dashboard") }}">
              <span data-feather="home"></span>
              Dashboard
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route("loggedin.income") }}">
              <span data-feather="trending-up"></span>
              Income
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route("loggedin.expenses") }}">
              <span data-feather="trending-down"></span>
              Expenses
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#transakcije">
              <span data-feather="list"></span>
              Transactions
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route("loggedin.exchange") }}">
              <span data-feather="dollar-sign"></span>
              Currency Converter
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/reports">
              <span data-feather="bar-chart-2"></span>
              Reports
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/loggedin/budget">
              <span data-feather="layers"></span>
              Budget
            </a>
          </li>
        </ul>
        {{--
        <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
          <span>Saved reports</span>
          <a class="link-secondary" href="#" aria-label="Add a new report">
            <span data-feather="plus-circle"></span>
          </a>
        </h6>
        <ul class="nav flex-column mb-2">
          <li class="nav-item">
            <a class="nav-link" href="#">
              <span data-feather="file-text"></span>
              Current month
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <span data-feather="file-text"></span>
              Last quarter
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <span data-feather="file-text"></span>
              Social engagement
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <span data-feather="file-text"></span>
              Year-end sale
            </a>
             --}}
        <ul class="nav flex-column mt-auto pb-3" style="background-color: #008080;">
          <li class="nav-item border-top pt-2">
            <a class="nav-link text-center fw-bold text-white" href="/subscribe">
              Get Financial Advice
            </a>
          </li>
        </ul>
      </div>
    </nav>

    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Dashboard</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
          <div class="btn-group me-2">
            <span class="badge rounded-pill bg-success bg-opacity-10 text-success border border-success border-opacity-30 px-3 py-2 me-3">
              <i class="bi bi-currency-exchange me-1"></i> 1 USD = {{ $eurRate }} EUR
          </span>            
          <a class="btn btn-sm btn-outline-secondary rounded-1" href="{{ route("transactions.export") }}">Export Transactions</a>
          </div>
          <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle">
            <span data-feather="calendar"></span>
            This week
          </button>
        </div>
      </div>

      <canvas class="my-4 w-100" id="myChart" width="900" height="380"></canvas>

      <h2>All Transactions</h2>
      <div id="transakcije" class="table-responsive">
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th scope="col">Type</th>
              <th scope="col">Title</th>
              <th scope="col">Category</th>
              <th scope="col">Amount</th>
              <th scope="col">Created_at</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($transactions as $data )
              <tr>
                @php
                  $isIncome = (get_class($data) === 'App\Models\Income')
                @endphp
                @if ($isIncome)
                <td class=" bg-success-soft text-success">
                  <span data-feather="trending-up"></span> Income
                </td>
                @else
                <td class=" bg-danger-soft text-danger">
                  <span data-feather="trending-down"></span> Expense
                </td>                
                @endif
                <td>{{ $data->title }}</td>
                <td>{{ $data->category->name }}</td>
                <td class="{{ $isIncome ? 'text-success' : 'text-danger' }} fw-bold"> {{ $isIncome ? '+' : '-' }} {{ $data->amount }}</td>
                <td>{{ $data->created_at->format('Y.m.d H:i') }}</td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
      <div class="d-flex align-items-start justify-content-start border-bottom border-secondary border-opacity-25 mb-4">
        <h2 class="mb-4">Spent by Category</h2>
      </div>
      <div class="d-flex align-items-start">
        <div class="row align-items-start ">
          {{-- @foreach ($expenseCategories as $data)
            <p class="text-nowrap">{{ $loop->iteration }}. {{$data->name }}</p>
          @endforeach --}}

        </div>
        <canvas id="myPieChart" width="" height="500"></canvas>

      </div>
    </main>
  </div>
</div>

@endsection

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js"></script>
    <script>
      window.linechartLabels = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Avg', 'Sep', 'Oct', 'Nov', 'Dec'];
      window.incomeData = @json($incomeData ?? array_fill(0,12,0));
      window.expenseData = @json($expenseData ?? array_fill(0,12,0));

      window.totalIncomeSum = {{ array_sum($incomeData) }};
      window.totalExpenseSum = {{ array_sum($expenseData) }};

      window.piechartLabels = @json($pieLabels);
      window.chartValues = @json($pieValues);
      console.log("Podaci stigli:", window.chartLabels, window.chartValues);

    </script>
    
    <script src="{{ asset('js/dashboard.js') }}"></script>
@endpush