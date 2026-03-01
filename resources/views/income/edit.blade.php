@extends("layout.public")

@section("title")
    Edit Income
@endsection

@section("content")
@if(session("error"))
    <div class="alert alert-danger">
        {{ session("error") }}
    </div>
@endif

<div class="row d-flex justify-content-center">
    <div class="col-12 col-md-8">
        <div class="card mt-4 rounded-4">
            <div class="card-header bg-secondary text-white">
                <h4 class="text-center">Edit Income</h4>
            </div>
            <div class="card-body">
                <form action="" method="post">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label" for="">Title</label>
                        <input type="text" value="{{ $income->title }}" class="form-control" name="title">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Category</label>
                        <select class="form-select" name="income_category_id" id="">
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}" {{ $income->income_category_id == $category->id ? 'selected' : '' }}>
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Details</label>
                        <textarea type="text" class="form-control" name="description" rows="4">{{ $income->description }}</textarea> 
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <label for="" class="form-label">Date</label>
                            <input type="date" class="form-control shadow-sm border-primary-subtle " value="{{ old('created_at', $income->created_at->format('Y-m-d')) }}"  name="created_at">
                            <div class="form-text mb-2">Select the date of income</div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Amount</label>
                        <input type="number" value="{{ $income->amount }}" class="form-control" name="amount" step="0.01">
                    </div>
                    <button type="submit" class="btn btn-primary">Edit Income</button>
                    <a href="{{ route("loggedin.income") }}" class="btn btn-secondary px-4">Back</a>
                </form>
            </div>
        </div>
    </div>
</div>








@endsection