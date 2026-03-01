@extends("layout.public")

@section("title")
Edit
@endsection

@section("content")
<div class="row d-flex justify-content-center">
    <div class="col-12 col-md-8">
        <div class="card mt-4  rounded-4">
            <div class="card-header bg-secondary">
                <h4 class="text-center text-white">Edit Expense</h4>
            </div>
            <div class="card-body">
                <form action="" method="post">
                    @csrf
                    <div class="mb-3">
                        <label for="" class="form-label">Title</label>
                        <input type="text" class="form-control" name="title" value="{{ $expense->title }}">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Category</label>
                        <select class="form-select" name="expense_category_id" id="">
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}" {{ $expense->expense_category_id == $category->id ? 'selected' : '' }}>
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Details</label>
                        <textarea type="text" class="form-control" name="description" rows="4">{{ $expense->description }}</textarea> 
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <label for="" class="form-label">Date</label>
                            <input type="date" class="form-control shadow-sm border-primary-subtle " value="{{ old('created_at', $expense->created_at->format('Y-m-d')) }}"  name="created_at">
                            <div class="form-text mb-2">Select the date of income</div>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="" class="form-label">Amount</label>
                        <input type="number" class="form-control" name="amount" value="{{ $expense->amount }}">
                    </div>
                    <button type="submit" class="btn btn-primary">Edit</button>
                    <a href="{{ route("loggedin.expenses") }}" class="btn btn-secondary">Back</a>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection