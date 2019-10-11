@extends('layouts.app')

@section('content')
<div class="container">
   <div class="row justify-content-center">
       <div class="col-md-8">
           <div class="card">
               <div class="card-header">Naujas autorius:</div>

               <div class="card-body">
                    <div class="form-group">


<form method="POST" action="{{route('author.store')}}">
    Name: <input type="text"class="form-control" name="author_name"value="{{old('author_name')}}">
    Surname: <input type="text"class="form-control" name="author_surname"value="{{old('author_surname')}}">
    @csrf
    <button type="submit">ADD</button>
 </form>
</div>
</div>
</div>
</div>
</div>
</div>
@endsection
