@extends('layouts.app')

@section('content')
<div class="container">
   <div class="row justify-content-center">
       <div class="col-md-8">
           <div class="card">
               <div class="card-header">PAVADINIMAS</div>

                {{-- Filtravimas start --}}
 
                <form method="GET" action="{{route('book.index')}}">
                  <select class="form-control" name="filter">
                      @foreach ($authors as $author)
                      <option value="{{$author->id}}" @if($author->id==$filter) selected @endif>{{$author->name}}
                          {{$author->surname}}</option>
                      @endforeach
                  </select>

                  <br>
                  <button type="submit">Rodyti autoriaus knygą</button>
              </form>
              {{-- Filtravimas end --}}

               <div class="card-body">
                  <div class="form-group">

@foreach ($books as $book)
<a href="{{route('book.edit',[$book])}}"class="form-control">{{$book->title}} {{$book->bookAuthor->name}} {{$book->bookAuthor->surname}}</a>
<img src="{{asset('/img/'.$book->file)}}" style="width:150px;">  
<form method="POST" action="{{route('book.destroy', [$book])}}">
      
      @csrf
   <button type="submit">DELETE</button>
  </form>
  <br>
@endforeach
</div>
</div>
</div>
</div>
</div>
</div>
@endsection




