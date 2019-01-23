@extends ('layouts.app')

@section ('content')

    <div class="flex items-center mb-3" style="display: flex; align-items: center;">
        <h1 class="mr-auto" style="margin-right:auto">All ProjeX</h1>
        <a href="/projects/create">New project</a>
    </div>

    <ul>
        @forelse ($projects as $project)
            <li><a href="{{ $project->path() }}">{{ $project->title }}</a></li>
        @empty
            No projects yet
        @endforelse
    </ul>

@endsection