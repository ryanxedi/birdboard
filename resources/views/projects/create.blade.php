@extends ('layouts.app')

@section ('content')

    <h1>Create a project</h1>

        <form method="POST" action="/projects">
            @csrf
            <input type="text" class="input" name="title" placeholder="Title"><br>
            <textarea name="description" class="textarea"></textarea><br>
            <button type="submit" class="button is-link">Create re:minder</button> <a href="/projects">Cancel</a>
        </form>

@endsection