@extends ('layouts.app')

@section ('content')
    <header class="flex items-center mb-3 py-4">
        <div class="flex justify-between items-end w-full">
            <p class="text-grey text-sm font-normal">
                <a href="/projects" class="text-grey text-sm font-normal">My re:minders</a> / {{ $project->title }}
            </p>
            <a href="{{ $project->path().'/edit' }}" class="button">Edit re:minder</a>
        </div>
    </header>

    <main>
        <div class="lg:flex -mx-3">
            <div class="lg:w-3/4 px-3 mb-8">
                <div class="mb-6">
                    <h2 class="text-grey text-lg font-normal mb-3">Tasks</h2>
                    @foreach ($project->tasks as $task)
                        <div class="card mb-3">
                            <form method="POST" action="{{ $task->path() }}">
                                @method('PATCH')
                                @csrf

                                <div class="flex">
                                    <input name="body" class="w-full {{ $task->completed ? 'text-grey line-through' : '' }}" value="{{ $task->body}}">
                                    <input name="completed" type="checkbox" onChange="this.form.submit()" {{ $task->completed ? 'checked' : '' }}>
                                </div>
                            </form>
                        </div>
                    @endforeach
                    <div class="card mb-3">
                        <form action="{{ $project->path() . '/tasks' }}" method="POST">
                            @csrf
                            <input name="body" class="w-full" placeholder="Add a task...">
                        </form>
                    </div>
                </div>
                <div>
                    <h2 class="text-grey text-lg font-normal mb-3">Notes</h2>
                    <form method="POST" action="{{ $project->path() }}">
                        @csrf
                        @method('PATCH')
                        <textarea 
                            name="notes" 
                            class="card w-full mb-4" 
                            style="min-height:200px" 
                            placeholder="Any extra information you want to keep a note of?"
                            >{{ $project->notes }}</textarea>
                        <button type="submit" class="button">Save</button>
                    </form>

                    @include ('errors')
                </div>
            </div>

            <div class="lg:w-1/4 px-3">
                @include ('projects.card')
            </div>
        </div>
    </main>



@endsection