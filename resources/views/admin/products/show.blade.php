@extends('templates.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ __('Product Details') }}</div>

                    <div class="card-body">
                        <div class="form-group">
                            <label for="lead">{{ __('Lead') }}</label>
                            <input type="text" name="lead" id="lead" class="form-control" value
                            </div>
                    </div>
                    <div class="form-group">
                        <label for="heading">{{ __('Heading') }}</label>
                        <input type="text" name="heading" id="heading" class="form-control" value="{{ $product->heading }}" readonly>
                    </div>
                    <div class="form-group">
                        <label for="image">{{ __('Image') }}</label>
                        <input type="text" name="image" id="image" class="form-control" value="{{ $product->image }}" readonly>
                    </div>
                    <div class="form-group">
                        <label for="desc">{{ __('Desc') }}</label>
                        <textarea name="desc" id="desc" class="form-control" rows="3" readonly>{{ $product->desc }}</textarea>
                    </div>
                    <a href="{{ route('admin.products.edit', $product) }}" class="btn btn-primary">{{ __('Edit') }}</a>
                    <form action="{{ route('admin.products.destroy', $product) }}" method="POST" class="d-inline-block">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('{{ __('Are you sure you want to delete this product?') }}')">{{ __('Delete') }}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
