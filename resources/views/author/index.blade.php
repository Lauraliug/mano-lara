
@extends('layouts.app')

@section('content')
<div class="container">
   <div class="row justify-content-center">
       <div class="col-md-8">
           <div class="card">
               <div class="card-header">autoriai</div>

               <div class="card-body">
               <table class="table">
                    <tr>
                        <th>vardas</th>
                        <th>pavarde</th>
                        <th>redaguoti</th>
                        <th>trinti</th>
                    </tr>
                    @foreach ($authors as $author)
                    <tr>
                        <td>{{$author->name}} </td>
                        <td>{{$author->surname}} </td>
                        <td>
                            <a href="{{route('author.edit',[$author])}}"><button class="btn btn-primary">redaguoti</button></a>
                        </td>
                        <td>
                            <form method="POST" action="{{route('author.destroy', $author)}}">
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
