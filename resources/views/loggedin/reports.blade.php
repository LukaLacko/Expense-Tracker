@extends("layout.app")

@section('title') Reports @endsection

@section('content')

<div class="container d-flex flex-wrap justify-content-between mt-5">
    <div class="col-md-5">
        <div class="card">
            <div class="card-header text-center">
                TOP 5 EXPENSES
            </div>
        </div>
        <table class="table border">
            <thead>
                <th>Title</th>
                <th>Category</th>
                <th>Amount</th>
            </thead>
            <tbody>
                @foreach($top5Expenses as $expense)
                    <tr>
                        <td>{{ $expense->title }}</td>
                        <td>{{ $expense->category->name }}</td>
                        <td>${{ $expense->amount }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="col-md-5">
        <div class="card">
            <div class="card-header text-center">
                TOP 5 EXPENSES THIS MONTH
            </div>
        </div>
        <table class="table border">
            <thead>
                <th>Title</th>
                <th>Category</th>
                <th>Amount</th>
            </thead>
            <tbody>
                @foreach ($top5ExpensesMonthly as $expenseMonthly)
                    <tr>
                        <td>{{ $expenseMonthly->title }}</td>
                        <td>{{ $expenseMonthly->category->name }}</td>
                        <td>${{ $expenseMonthly->amount }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="col-md-5">
        <div class="card">
            <div class="card-header text-center">
                BIGGEST EXPENSE TODAY
            </div>
        </div>
        <table class="table border">
            <thead>
                <th>Title</th>
                <th>Category</th>
                <th>Amount</th>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $biggestExpenseToday->title }}</td>
                    <td>{{ $biggestExpenseToday->category->name }}</td>
                    <td>${{ $biggestExpenseToday->amount }}</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

@endsection