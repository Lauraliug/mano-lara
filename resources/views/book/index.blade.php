


@extends('layouts.app')

@section('content')
<div class="container">
   <div class="row justify-content-center">
       <div class="col-md-8">
           <div class="card">
               <div class="card-header">knyga</div>
               <div class="card-body">
               <table class="table">
                <tr>
                <th>cover</th>
                    <th>pavadinimas</th>
                    <th>redaguoti</th>
                    <th>trinti</th>
                </tr>
                @foreach ($books as $book)
                <tr>
                    <td>
                        @if ($book->photo != null)
                        <img src="{{asset('photos/small/'.$book->photo)}}" alt="" width="50" height="50">
                        <form action="{{route('book.deletePhoto',[$book])}}" method="post">
                        @csrf
                            <button type="submit" >trinti</button>
                          
                        </form>
                        <form action="{{route('book.updatePhoto',[$book])}}" method="post" enctype="multipart/form-data" >
                        @csrf
                        <input type="file" name="photo">
                        <button type="submit" >atnaujinti</button>
                        </form>
                        @endif
                    </td>
                    <td>{{$book->title}} </td>
                    <td>
                        <a href="{{route('book.edit',[$book])}}"><button class="btn btn-primary">redaguoti</button></a>
                    </td>
                    <td>
                        <form method="POST" action="{{route('book.destroy', $book)}}">
                        @csrf
                        <button class=" btn btn-danger" type="submit">trinti</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </table>

               </div>
           </div>
       </div>
   </div>
</div>
@endsection

