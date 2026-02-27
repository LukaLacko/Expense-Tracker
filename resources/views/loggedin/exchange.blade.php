@extends("layout.app")

@section("title") Exchange Calculator @endsection

@section("content")

<style>
    body{
        background-color: #C0C0C0;
        background-image: url("/img/back-img.jpeg");
        background-size: cover;
        background-position: center;
    }
</style>

<div class="container d-flex justify-content-center mt-4">
    <div class="col-md-5">
        <div class="card mt-5 shadow-lg rounded-5 rounded-top border-0" style="background: rgba(255, 255, 255, 0.9); backdrop-filter: blur(10px);">
            <div class="card-header" style="background-image: linear-gradient(90deg, #00d2ff 0%, #3a47d5 100%)">
                <h3 class="text-center">Currency Converter</h3>
            </div>
            <div class="card-body text-center">
                <form action="{{ route('exchange.calculate') }}" method="post">
                    @csrf
                    <label for="" class="form-label mt-4 ">From:</label>
                    <select name="from" id="from" class="form-select ">
                        <option value="USD" selected>USD</option>
                        <option value="EUR">EUR</option>
                        <option value="RSD">RSD</option>
                        <option value="CHF">CHF</option>
                    </select>
                    <label for="to" class="form-label mt-5">To:</label>
                    <select name="to" id="to" class="form-select ">
                        <option value="USD">USD</option>
                        <option value="EUR" selected>EUR</option>
                        <option value="RSD">RSD</option>
                        <option value="CHF">CHF</option>                    
                    </select>
                    <label for="amount" class="form-label mt-5">Amount:</label>
                    <input type="number" class="form-control mb-5" name="amount" step="0.01" value="1">

                    @if(session('result'))
                    <div class="alert alert-info bg-info bg-opacity-10 border-info text-center mt-5">
                        <h2 class="fw-bold mb-0">
                            {{ session('amount') }} {{ session('from') }} = {{ session('result') }} {{ session('to') }}
                        </h2>
                    </div>
                    @endif

                        <button type="submit" class="btn btn-success col-md-10">Convert</button>
                        <a href="/loggedin/dashboard" class="btn btn-outline-secondary">Back</a>

                </form>
            </div>
        </div>
    </div>
</div>

@endsection