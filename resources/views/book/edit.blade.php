<form method="POST" action="{{route('book.update',[$book])}}">
    Title: <input type="text" name="book_title" value="{{$book->title}}">
    Publisher: <input type="text" name="book_publisher" value="{{$book->publisher}}">
    Critic: <textarea name="book_critic">{{$book->critic}}"</textarea>
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
