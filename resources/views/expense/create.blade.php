@extends("layout.public")

@section("title")
    Add Expense
@endsection

@section("content")
<div class="d-flex justify-content-center">
    <div class="col-12 col-md-8">
        <div class="card mt-4 rounded-4">
            <div class="card-header bg-primary text-white">
                <h4 class="text-center">Add Expense</h4>
            </div>
            <div class="card-body">
                <form action="" method="post">
                    @csrf
                    <div class="mb-3">
                        <label for="" class="form-label">Title</label>
                        <input type="text" class="form-control" name="title" placeholder="Write here...">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Category</label>
                        <select class="form-select" name="expense_category_id" id="">
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Description <span class="text-muted">(<i>optional</i>)</span></label>
                        <textarea name="description" class="form-control" id="description" rows="4"></textarea>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <label for="" class="form-label">Date</label>
                            <input type="date" class="form-control shadow-sm border-primary-subtle " value="{{ old('created_at', date('Y-m-d')) }}"  name="created_at">
                            <div class="form-text mb-2">Select the date of income</div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Amount</label>
                        <input type="number" class="form-control" name="amount" placeholder="...">
                    </div>
                    <button type="submit" class="btn btn-primary">Add</button>
                    <a href="{{ route("loggedin.expenses") }}" class="btn btn-secondary">Back</a>
                </form>
            </div>
        </div>
    </div>
</div>



@endsection