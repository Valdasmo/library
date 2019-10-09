<form method="POST" action="{{route('book.store')}}">
    Title: <input type="text" name="book_title">
    Publisher: <input type="text" name="book_publisher">
    Critic: <textarea name="book_critic"></textarea>
    <select name="author_id">
        @foreach ($authors as $author)
            <option value="{{$author->id}}">{{$author->name}} {{$author->surname}}</option>
        @endforeach
 </select>
    @csrf
    <button type="submit">ADD</button>
 </form>