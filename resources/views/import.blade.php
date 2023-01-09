@extends('layouts.admin')

@section('content')

<div class="card bg-light">
        <div class="card-header">
            Import Employees
        </div>
        <div class="card-body">
            <form action="{{ route('import') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="file" name="file" class="form-control" required>
                <br>
                <button class="btn btn-success">Import User Data</button>
            </form>
        </div>
    </div>

@endsection
