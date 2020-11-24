<h1>Contact Us</h1>
<form action="{{route('send-contact')}}" method="post">
    @csrf
    <label for="">email</label>
    <input type="text" name="email">
    <label for="">question</label>
    <input type="text" name="content">
    <button type="submit">Send</button>
</form>