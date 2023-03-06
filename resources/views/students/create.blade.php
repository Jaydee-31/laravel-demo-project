@extends('students.layout')
@section('content')

   <div class="container">

 
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="row">
                        <div class="col-lg-12 margin-tb">
                            <div class="pull-left">
                                <h2>Create New Student</h2>
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
                                        <strong>LRN</strong>
                                        <input type="text" name="student_lrn" class="form-control" placeholder="LRN" value="{{ old('student_lrn') }}" autofocus>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>first_name:</strong>
                                        <input type="text" name="first_name" class="form-control" placeholder="first_name" value="{{ old('first_name') }}">
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>middle_name:</strong>
                                        <input type="text" name="middle_name" class="form-control" placeholder="middle_name" value="{{ old('middle_name') }}">
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>last_name:</strong>
                                        <input type="text" name="last_name" class="form-control" placeholder="last_name" value="{{ old('last_name') }}">
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>age:</strong>
                                        <input type="number" name="age" class="form-control" placeholder="age" value="{{ old('age') }}">
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>year_level:</strong>
                                        <input type="text" name="year_level" class="form-control" placeholder="year_level" value="{{ old('year_level') }}">
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>section:</strong>
                                        <input type="text" name="section" class="form-control" placeholder="section" value="{{ old('section') }}">
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