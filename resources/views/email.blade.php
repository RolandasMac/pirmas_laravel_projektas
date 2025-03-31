@extends('layouts.app2') <!-- Jei turite bendrą maketą -->

@section('content')
    <div class="container">
        <h1>send email page</h1>
        <form action="{{ route('send.email') }}" method="POST" class="flex flex-col">
            @csrf
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
            <label for="subject">Subject:</label><input type="text" id="subject" name="subject"></label>
            <label for="message">Message:</label>
            <textarea id="message" name="message" required></textarea>


            <button type="submit" class="btn btn-success mt-2">Send Email</button>



        </form>


    </div>
@endsection