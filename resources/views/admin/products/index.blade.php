@extends('templates.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ __('Products') }}</div>

                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>{{ __('Lead') }}</th>
                                    <th>{{ __('Heading') }}</th>
                                    <th>{{ __('Image') }}</th>
                                    <th>{{ __('Desc') }}</th>
                                    <th>{{ __('Created At') }}</th>
                                    <th>{{ __('Actions') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($products as $product)
                                    <tr>
                                        <td>{{ $product->lead }}</td>
                                        <td>{{ $product->heading }}</td>
                                        <td>{{ $product->image }}</td>
                                        <td>{{ $product->desc }}</td>
                                        <td>{{ $product->created_at }}</td>
                                        <td>
                                            <a href="{{ route('admin.products.show', $product) }}" class="btn btn-primary">{{ __('View') }}</a>
                                            <a href="{{ route('admin.products.edit', $product) }}" class="btn btn-secondary">{{ __('Edit') }}</a>
                                            <form action="{{ route('admin.products.destroy', $product) }}" method="POST" style="display: inline-block;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger">{{ __('Delete') }}</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $products->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection