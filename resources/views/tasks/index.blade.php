<!DOCTYPE html>
<html>

<head>

    <title>Task Dashboard</title>

    <link rel="stylesheet"
          href="{{ asset('css/style.css') }}">

</head>

<body>

<div class="container">

    <div class="header">

        <h1>Task Dashboard</h1>

        <a href="{{ route('tasks.create') }}"
           class="add-btn">

            Add Task

        </a>

    </div>

    @if(session('success'))

        <div class="success-message">

            {{ session('success') }}

        </div>

    @endif

    <h2>Pending Tasks</h2>

    <div class="task-grid">

        @forelse($pendingTasks as $task)

            <div class="task-card">

                <h3>{{ $task->title }}</h3>

                <p>{{ $task->description }}</p>

                <p>
                    <strong>Category:</strong>
                    {{ $task->category->name }}
                </p>

                <p>
                    <strong>Due:</strong>
                    {{ $task->due_date }}
                </p>

                <div class="task-actions">

                    <form action="{{ route('tasks.toggle', $task->id) }}"
                          method="POST">

                        @csrf
                        @method('PATCH')

                        <button type="submit"
                                class="complete-btn">

                            Complete

                        </button>

                    </form>

                    <form action="{{ route('tasks.destroy', $task->id) }}"
                          method="POST">

                        @csrf
                        @method('DELETE')

                        <button type="submit"
                                class="delete-btn">

                            Delete

                        </button>

                    </form>

                </div>

            </div>

        @empty

            <p class="empty-text">
                No pending tasks.
            </p>

        @endforelse

    </div>

    <h2>Completed Tasks</h2>

    <div class="task-grid">

        @forelse($completedTasks as $task)

            <div class="task-card completed">

                <h3>{{ $task->title }}</h3>

                <p>{{ $task->description }}</p>

                <p>
                    <strong>Category:</strong>
                    {{ $task->category->name }}
                </p>

                <p>
                    <strong>Due:</strong>
                    {{ $task->due_date }}
                </p>

            </div>

        @empty

            <p class="empty-text">
                No completed tasks.
            </p>

        @endforelse

    </div>

</div>

</body>
</html>