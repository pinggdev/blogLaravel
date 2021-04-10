@extends('template_backend.home')
@section('content')
    <h1>INI ADALAH CATEGORY</h1>
    <table class="table table-striped table-hover table-sm table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
                @foreach ($category as $result)
                    <tr>
                        <td></td>
                        <td>{{ $result->name }}</td>
                        <td><a href="" class="btn btn-primary btn-sm">Edit</a></td>
                        <td><a href="" class="btn btn-danger btn-sm">Delete</a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
@endsection