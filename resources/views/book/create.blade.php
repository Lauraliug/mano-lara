@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">nauja knyga</div>

                <div class="card-body">
                    <form method="POST" action="{{route('book.store')}}" enctype="multipart/form-data">
                        <div class="form-group">
                            <label>Title</label>
                            <input type="text" name="book_title" class="form-control" value="{{old('book_title')}}">
                            <small class="form-text text-muted">Knygos pavadinimas.</small>
                        </div>
                        <div class="form-group">
                            <label>ISBN</label>
                            <input type="text" name="book_isbn" class="form-control">
                            <small class="form-text text-muted">ISBN</small>
                        </div>
                        <div class="form-group">
                            <label>pages</label>
                            <input type="text" name="book_pages" class="form-control">
                            <small class="form-text text-muted">puslapiai</small>
                        </div>

                        <div class="form-group">
                            <label>about</label>
                            <textarea name="book_about" class="form-control" id="book_about" rows="3"></textarea>
                            <small class="form-text text-muted">aprasymas</small>
                        </div>

                        <div class="form-group">
                        <label> nuotrauka</label><br>
                       <input type="file" name="photo" >
                    </div>

                        <select name="author_id" class="form-control form-control-lg">
                            @foreach ($authors as $author)
                            <option value="{{$author->id}}">{{$author->name}} {{$author->surname}}</option>
                            @endforeach
                        </select>
                        @csrf
                        <br>
                        <button class="btn btn-primary" type="submit">ADD</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection