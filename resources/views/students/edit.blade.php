@extends('students.layout')

@section('content')
    <div class="container">
        <h1>Edit Product</h1>
        <hr>
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-right">
                    <a class="btn btn-primary" href="{{ route('students.index') }}"> Back</a>
                </div>
            </div>
        </div>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('students.update', $student->id) }}">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="lead">lead</label>
                <input type="text" class="form-control" id="lead" name="lead" value="{{ $student->lead }}">
            </div>

            <div class="form-group">
                <label for="heading">First Name</label>
                <input type="text" class="form-control" id="heading" name="heading" value="{{ $student->heading }}">
            </div>

            <div class="form-group">
                <label for="image">Middle Name</label>
                <input type="text" class="form-control" id="image" name="image" value="{{ $student->image }}">
            </div>

            <div class="form-group">
                <label for="desc">Last Name</label>
                <input type="text" class="form-control" id="desc" name="desc" value="{{ $student->desc }}">
            </div>


            <button type="submit" class="btn btn-primary">Update</button>
            <a href="{{ route('students.index') }}" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
@endsection
