@extends('students.layout')

@section('content')
<div class="container">
    <div class="row">
        <h1>Product Admin</h1>
        <hr>
        <div class="row">
                <div class="pull-left">
                    <a class="btn btn-success" href="{{ route('students.create') }}"> Create New Product</a>
                </div>
        
                <div class="pull-right">
                    {{-- <form action="{{ route('students.index') }}" method="GET">
                            <input type="text" name="search" id="search-input" class="form-control" placeholder="Search...">
                            <button type="submit" class="btn btn-primary">Search<i class="fas fa-search"></i></button>
                    </form> --}}
        
                    <form action="{{ route('students.index') }}" method="GET">
                        <input type="text" name="search" placeholder="Search...">
                        <button type="submit" class="btn btn-primary">Search</button>
                    </form>
                </div>
        </div><br>
    </div>
    
    <div class="row">
        
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    @if($students->isEmpty())
        <p>No students found.</p>
        @else
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Lead</th>
                        <th>Heading</th>
                        <th>Image</th>
                        <th>Desc</th>
                        <th width="280px">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($students as $student)
                        <tr>
                            <td>{{ $student->id }}</td>
                            <td>{{ $student->lead }}</td>
                            <td>{{ $student->heading }}</td>
                            <td>{{ $student->image }}</td>
                            <td>{{ $student->desc }}</td>
                            <td>
                                <form action="{{ route('students.destroy', $student->id) }}" method="POST">
                                    <a class="btn btn-info" href="{{ route('students.show', $student->id) }}">Show</a>
                                    <a class="btn btn-primary" href="{{ route('students.edit', $student->id) }}">Edit</a>
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <div class="align-self-center">
                {{ $students->links('pagination.custom') }}
            </div>
    
    @endif
</div>
@endsection