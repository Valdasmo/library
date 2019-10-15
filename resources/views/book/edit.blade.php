@extends('layouts.app')

@section('content')
<div class="container">
   <div class="row justify-content-center">
       <div class="col-md-8">
           <div class="card">
               <div class="card-header">Knyga:</div>

               <div class="card-body">
                    <div class="form-group">

<form method="POST" action="{{route('book.update',[$book])}}"enctype="multipart/form-data">
    Title: <input type="text"class="form-control" name="book_title" value="{{$book->title}}">
    Publisher: <input type="text"class="form-control" name="book_publisher" value="{{$book->publisher}}">
    Critic: <textarea name="book_critic"id="summernote"class="form-control">{{$book->critic}}"</textarea>
    <select name="author_id">
        @foreach ($authors as $author)
            <option value="{{$author->id}}" @if($author->id == $book->author_id) selected @endif>
                {{$author->name}} {{$author->surname}}
            </option>
        @endforeach
</select>
    @csrf
    <button type="submit">EDIT</button>
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
