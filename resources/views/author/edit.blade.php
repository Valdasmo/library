@extends('layouts.app')

@section('content')
<div class="container">
   <div class="row justify-content-center">
       <div class="col-md-8">
           <div class="card">
               <div class="card-header">Autorius:</div>

               <div class="card-body">
                    <div class="form-group">


<form method="POST" action="{{route('author.update',[$author])}}">
    Name: <input type="text"class="form-control" name="author_name" value="{{$author->name}}">
    Surname: <input type="text"class="form-control" name="author_surname" value="{{$author->surname}}">
    @csrf
    <button type="submit">EDIT</button>
 </form>
</div>
</div>
</div>
</div>
</div>
</div>
@endsection
