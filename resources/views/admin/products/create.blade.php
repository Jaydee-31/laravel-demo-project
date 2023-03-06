@extends('templates.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ __('Create Product') }}</div>

                    <div class="card-body">
                        <form action="{{ route('admin.products.store') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="lead">{{ __('Lead') }}</label>
                                <input type="text" name="lead" id="lead" class="form-control @error('lead') is-invalid @enderror" value="{{ old('lead') }}" required>
                                @error('lead')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="heading">{{ __('Heading') }}</label>
                                <input type="text" name="heading" id="heading" class="form-control @error('heading') is-invalid @enderror
                                <div class="form-group">
                            <label for="desc">{{ __('Desc') }}</label>
                            <textarea name="desc" id="desc" class="form-control @error('desc') is-invalid @enderror" rows="3" required>{{ old('desc') }}</textarea>
                            @error('desc')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">{{ __('Save') }}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection