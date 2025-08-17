@extends('layouts.app')

@section('title', 'The list of Tasks')

@section('content')

    <nav class="mb-4">
        <a href="{{ route('tasks.create') }}" class="link">
            Add task</a>
    </nav>

    @forelse ($tasks as $task)
        <div>
            <a href="{{ route('tasks.show', ['task' => $task->id]) }}"
                @class(['line-through' => $task->completed])>
                {{ $task->title }}</a>
        </div>
    @empty
        <div>There is no task</div>
    @endforelse

    @if($tasks->count())
        <nav class="mt-10">
            {{ $tasks->links() }}
        </nav>
    @endif
@endsection




<!-- <div> -->
    <!-- @if (count($tasks)) -->
        <!-- @forelse ($tasks as $task)
            <div>{{$task->title}}</div>
        @empty
            <div>There is no task</div>
        @endforelse -->
    <!-- @else -->
        <!-- <div>There are no tasks</div> -->
    <!-- @endif -->
<!-- </div> -->
