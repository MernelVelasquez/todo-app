<!DOCTYPE html>
<html>

<head>

    <title>Create Task</title>

    <link rel="stylesheet"
          href="{{ asset('css/style.css') }}">

</head>

<body>

<div class="container">

    <div class="header">

        <h1>Create Task</h1>

        <a href="{{ route('tasks.index') }}"
           class="add-btn">

            Back

        </a>

    </div>

    <form action="{{ route('tasks.store') }}"
      method="POST">

    @csrf

    <div class="form-row">

        <input type="text"
               name="title"
               placeholder="Task Title"
               required>

        <textarea name="description"
                  placeholder="Task Description"></textarea>

    </div>

    <div class="form-row">

        <select name="category_id"
                required>

            <option value="">
                Select Category
            </option>

            @foreach($categories as $category)

                <option value="{{ $category->id }}">

                    {{ $category->name }}

                </option>

            @endforeach

        </select>

        <input type="date"
               name="due_date"
               required>

    </div>

    <button type="submit"
            class="save-btn">

        Save Task

    </button>

</form>

</div>

</body>
</html>