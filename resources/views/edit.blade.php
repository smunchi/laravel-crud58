@extends('layouts.app')

@section('content')
    <style>
        .uper {
            margin-top: 40px;
        }
    </style>
    <div class="card uper">
        <div class="card-header">
            Edit Book
        </div>
        <div class="card-body">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div><br />
            @endif
            <form method="post" action="{{ route('books.update', $book->id) }}">
                <div class="form-group">
                    @csrf
                    @method('PATCH')
                    <label for="name">Book Name:</label>
                    <input type="text" class="form-control" name="book_name" value="{{$book->name}}"/>
                </div>
                <div class="form-group">
                    <label for="isbn_no">ISBN No:</label>
                    <input type="text" class="form-control" name="isbn_no" value="{{ $book->isbn_no }}"/>
                </div>
                <div class="form-group">
                    <label for="description">Description:</label>
                    <textarea class="form-control" name="description" rows="3" cols="15">{{ $book->description }}</textarea>
                </div>
                <div class="form-group">
                    <label for="price">Price:</label>
                    <input type="text" class="form-control" name="price" value="{{ $book->price }}"/>
                </div>
                <button type="submit" class="btn btn-primary">Update Book</button>
            </form>
        </div>
    </div>
@endsection