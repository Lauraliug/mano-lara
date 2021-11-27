@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">redagavimas</div>

                <div class="card-body">
                    <form method="POST" action="{{route('book.update',[$book])}}">
                        <div class="form-group">
                            <label>Title</label>
                            <input type="text" name="book_title" class="form-control" value="{{old('book_title',$book->book_title)}}">
                            <small class="form-text text-muted">Knygos pavadinimas.</small>
                        </div>
                        <div class="form-group">
                            <label> ISBN</label>
                            <input type="text" name="book_isbn" class="form-control" value="{{$book->isbn}}">
                            <small class="form-text text-muted"> ISBN</small>
                        </div>

                        <div class="form-group">
                            <label>Pages</label>
                            <input type="text" name="book_pages" class="form-control" value="{{$book->pages}}">
                            <small class="form-text text-muted">puslapiai</small>
                        </div>

                        <div class="form-group">
                            <label for="book_about">about</label>
                            <textarea class="form-control" name="book_about" id="book_about" rows="3">{{$book->about}}</textarea>
                            <small class="form-text text-muted">aprasymas</small>
                        </div>

                        <select name="author_id" class="form-control form-control-lg">
                            @foreach ($authors as $author)
                            <option value="{{$author->id}}" @if($author->id == $book->author_id) selected @endif>
                                {{$author->name}} {{$author->surname}}
                            </option>
                            @endforeach
                        </select>
                        @csrf
                        <br>
                        <button class="btn btn-success" type="submit">EDIT</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection