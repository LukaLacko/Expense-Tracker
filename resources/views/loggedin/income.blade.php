@extends("layout.public")

@section("title")
    Dobrodošli!
@endsection

@section("content")

@if(session("success"))
    <div class="alert alert-success alert-dismissible fade show mt-2">
        {{ session("success") }}
    </div>
@endif

@if(session("info"))
    <div class="alert alert-info alert-dismissible fade show mt-2">
        {{ session("info") }}
    </div>
@endif

<div class="d-flex align-items-center mt-4 w-100">
    <h4 class="mb-0 me-3">Months:</h4>
    @php
        $months = [
            1 => 'Jan', 2 => 'Feb', 3 => 'Mar', 4 => 'Apr', 5 => 'May',
            6 => 'Jun', 7 => 'Jul', 8 => 'Avg', 9 => 'Sep', 10 => 'Oct',
            11 => 'Nov', 12 => 'Dec'
        ];
    @endphp

    <div class="d-none d-md-flex btn-group shadow-sm flex-grow-1">
        <a href="{{ route("loggedin.income") }}" class="btn btn-sm {{ !request()->has('month') ? 'btn-primary' : 'btn-outline-secondary' }}">All</a>
        @foreach ($months as $number => $name)
        <a href="{{ route("loggedin.income", ["month" => $number]) }}" class="btn btn-sm flex-fill {{ request('month') == $number ? 'btn-primary' : 'btn-outline-secondary' }}">
            {{ $name }}
        </a>
        @endforeach
    </div>

    <!-- Dropdown - just for Phone-->
    <div class="d-md-none flex-grow">
        <select class="form-select" onchange="window.location=this.value">
            <option value="{{ route('loggedin.income') }}" {{ !request()->has('month') ? 'selected' : '' }}>All</option>
            @foreach ($months as $number => $name)
            <option value="{{ route('loggedin.income', ['month' => $number]) }}" {{ request('month') == $number ? 'selected' : '' }}>
                {{ $name }}
            </option>
            @endforeach
        </select>
    </div>
    
</div>

<div class="d-flex justify-content-between mt-5 mb-2">
    <h1>Income:</h1>
    <a class="btn btn-primary btn-lg align-self-center" href="{{ route("income.create") }}">Add Income</a>
</div>
<div class="table-responsive">
    <table class="table table-hover table-striped border">
        <thead>
            <th>Title</th>
            <th>Category</th>
            <th>Amount</th>
            <th>Created at</th>
            <th>Details</th>
            <th>Edit</th>
            <th>Delete</th>
        </thead>
        <tbody>
            @foreach($userIncomes as $income)
            <tr>
                <td>{{ $income->title }}</td>
                <td>{{ $income->category->name}}</td>
                <td class="fw-bold">${{ $income->amount }}</td>
                <td>{{ $income->created_at->format('d.m.Y') }}</td>
                
                <td><a href="{{ route("income.details", $income->id) }}">Details</a></td>
                <td><a href="{{ route("income.edit", $income->id) }}" class="btn btn-secondary">Edit</a></td>
                <td><a href="{{ route("income.delete", $income->id) }}" class="btn btn-danger">Delete</a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
<div class="paggination-wrapper">
    {{ $userIncomes->links() }}
</div>
<div class="d-flex justify-content-between">
    <table class="table border table-secondary w-auto">
        <thead>
            <tr>
                <th style="width: 1%; white-space: nowrap;">Total Income:</th>
                <th>${{ $totalIncome }}</th>
            </tr>
            <tr>
                <th style="width: 1%; white-space: nowrap;">Avg Income:</th>
                <th>${{ $avgIncome }}</th>
            </tr>
        </thead>
    </table>
    <a href="{{ route('incomes.export') }}" class="btn btn-success shadow-sm mb-3 mt-1 align-self-center">
        <i class="bi bi-file-earmark-excel"></i> Export to Excel
    </a>
</div>
@endsection