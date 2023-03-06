@extends('students.layout')
@section('content')

   <div class="container">

 
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="row">
                        <div class="col-lg-12 margin-tb">
                            <div class="pull-left">
                                <h2>Create New Product</h2>
                                <hr>
                            </div>
                            <div class="pull-right">
                                <a class="btn btn-primary" href="{{ route('students.index') }}"> Back</a>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">

                        {{-- @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                        @endif --}}

                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <strong>Whoops!</strong> There were some problems with your input.<br><br>
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form action="{{ route('students.store') }}" method="POST">
                            @csrf

                            <div class="form-group row">
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>lead</strong>
                                        <input type="text" name="lead" class="form-control" placeholder="LRN" value="{{ old('lead') }}" autofocus>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>heading:</strong>
                                        <input type="text" name="heading" class="form-control" placeholder="heading" value="{{ old('heading') }}">
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>image:</strong>
                                        <input type="text" name="image" class="form-control" placeholder="image" value="{{ old('image') }}">
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>desc:</strong>
                                        <input type="text" name="desc" class="form-control" placeholder="desc" value="{{ old('desc') }}">
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                                    <button type="submit" class="btn btn-primary">Submit</button>

                                    <a href="{{ route('students.index') }}" class="btn btn-secondary">Cancel</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection