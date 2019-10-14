@extends('layouts.app')

@section('content')
<div class="container">
   <div class="row justify-content-center">
       <div class="col-md-8">
           <div class="card">
               <div class="card-header">Autorius

               <a href="{{route('author.index', ['sort'=>'a-z'])}}">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M3 12v1.5l11 4.75v-2.1l-2.2-.9v-5l2.2-.9v-2.1L3 12zm7 2.62l-5.02-1.87L10 10.88v3.74zm8-10.37l-3 3h2v12.5h2V7.25h2l-3-3z"/><path fill="none" d="M0 0h24v24H0z"/></svg>
            </a>
            <a href="{{route('author.index', ['sort'=>'z-a'])}}">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M21 12v-1.5L10 5.75v2.1l2.2.9v5l-2.2.9v2.1L21 12zm-7-2.62l5.02 1.87L14 13.12V9.38zM6 19.75l3-3H7V4.25H5v12.5H3l3 3z"/><path fill="none" d="M0 0h24v24H0z"/></svg>
            </a>
          </div>
               <div class="card-body">
                  <div class="form-group">


@foreach ($authors as $author)
  <a href="{{route('author.edit',[$author])}}"class="form-control">{{$author->name}} {{$author->surname}}</a>
  <form method="POST" action="{{route('author.destroy', [$author])}}">
      
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

