@extends('layouts.app')

@section('content')
<div class="container">
   <div class="row justify-content-center">
       <div class="col-md-8">
           <div class="card">
               <div class="card-header">Nauja knyga:</div>

               <div class="card-body">
                    <div class="form-group">

<form method="POST" action="{{route('book.store')}}"enctype="multipart/form-data">
 Title: <input type="text"class="form-control" name="book_title">
    Publisher: <input type="text"class="form-control" name="book_publisher">
    Critic: <textarea name="book_critic"id="summernote"class="form-control"></textarea>
    Nuotrauka: <input type="file" class="form-control" name="book_photo" value="{{old('book_photo')}}">
    <small class="form-text text-muted">Knygos nuotrauka</small>
    <select name="author_id">
        @foreach ($authors as $author)
            <option value="{{$author->id}}">{{$author->name}} {{$author->surname}}</option>
        @endforeach
 </select>

    @csrf
    <button type="submit">ADD</button>
 </form>
</div>
</div>
</div>
</div>
</div>
</div>
<script>
        $(document).ready(function() {
           $('#summernote').summernote();
         });
        </script>
@endsection
