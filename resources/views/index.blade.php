@extends('layouts.app')

@section('content')
    <style>
        .uper {
            margin-top: 40px;
        }
    </style>
    <div class="uper">
        @if(session()->get('success'))
            <div class="alert alert-success">
                {{ session()->get('success') }}
            </div><br />
        @endif
        <table class="table table-striped">
            <thead>
            <tr>
                <td>ID</td>
                <td>Name</td>
                <td>ISBN No</td>
                <td>Description</td>
                <td>Price</td>
                <td>Author</td>
                <td colspan="2">Action</td>
            </tr>
            </thead>
            <tbody>
            @foreach($books as $book)
                <tr>
                    <td>{{$book->id}}</td>
                    <td>{{$book->name}}</td>
                    <td>{{$book->isbn_no}}</td>
                    <td>{{$book->description}}</td>
                    <td>{{$book->price}}</td>
                    <td>{{$book->user->name}}</td>
                    <td><a href="{{ route('books.edit', $book->id)}}" class="btn btn-primary">Edit</a></td>
                    <td>
                        <form action="{{ route('books.destroy', $book->id)}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger" type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div>
@endsection