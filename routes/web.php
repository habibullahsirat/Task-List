<?php

// use GuzzleHttp\Psr7\Response;
use App\Http\Requests\TaskRequest;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use \App\Models\Task;

Route::get('/', function () {
    return redirect()->route('tasks.index');
});

Route::get('/tasks', function () {
  // $tasks = \App\Models\Task::all();
  // $tasks = \App\Models\Task::paginate();
  // $tasks = \App\Models\Task::latest()->get();
  $tasks = \App\Models\Task::latest()->paginate(10);
  // $tasks = \App\Models\Task::latest()->where('completed', true)->get();

    return view('index', [
        'tasks' => $tasks
    ]);
})->name('tasks.index');

Route::view('/tasks/create', 'create')->name('tasks.create');

Route::get('/tasks/{task}/edit', function (Task $task) {
  //It will work when the app works with {id}
    // $task = Task::findOrFail($task);

    return view('edit', ['task' => $task]);
})->name('tasks.edit');

Route::get('/tasks/{task}', function (Task $task) {
    return view('show', ['task' => $task]);
})->name('tasks.show');

// For action method of form
Route::post('/tasks', function (TaskRequest $request) {
  //To view the data to webpage
  // dd($request->all());

  // $data = $request->validate([
  //   'title' => 'required|max:255',
  //   'description' => 'required',
  //   'long_description' => 'required'
  // ]);
  // After creating the TaskRequest
  // $data = $request->validated(); //This can be used in Task::create()
  // // If create metod is used then no need to add below codes.
  // $task = new Task;
  // $task->title = $data['title'];
  // $task->description = $data['description'];
  // $task->long_description = $data['long_description'];
  // $task->save();
  $task = Task::create($request->validated());

  return redirect()->route('tasks.show', ['task' => $task->id])->with('success', 'Task created successfully!');
})->name('tasks.store');

Route::put('tasks/{task}/toggle-complete', function(Task $task) {
  $task->toggleComplete();
  return redirect()->back()->with('success', 'Task updated successfully');
})->name('tasks.toggle-complete');

Route::put('/tasks/{task}', function (Task $task, TaskRequest $request) {
  //To view the data to webpage
  // dd($request->all());

  // $data = $request->validate([
  //   'title' => 'required|max:255',
  //   'description' => 'required',
  //   'long_description' => 'required'
  // ]);

  // $task = Task::findOrFail($id);

  // $data = $request->validated();
  // $task->title = $data['title'];
  // $task->description = $data['description'];
  // $task->long_description = $data['long_description'];
  // $task->save();

  $task->update($request->validated());

  return redirect()->route('tasks.show', ['task' => $task->id])->with('success', 'Task Updated successfully!');
})->name('tasks.update');

Route::delete('/tasks/{task}', function(Task $task) {
  $task->delete();

  return redirect()->route('tasks.index')->with('success', 'Task deleted successfully!');
})->name('tasks.destroy');









// Dummy data for testing
// class Task
// {
//   public function __construct(
//     public int $id,
//     public string $title,
//     public string $description,
//     public ?string $long_description,
//     public bool $completed,
//     public string $created_at,
//     public string $updated_at
//   ) {
//   }
// }

// $tasks = [
//   new Task(
//     1,
//     'Go to University',
//     'Task 1 description',
//     'Task 1 long description',
//     false,
//     '2023-03-01 12:00:00',
//     '2023-03-01 12:00:00'
//   ),
//   new Task(
//     2,
//     'Do classes',
//     'Task 2 description',
//     null,
//     false,
//     '2023-03-02 12:00:00',
//     '2023-03-02 12:00:00'
//   ),
//   new Task(
//     3,
//     'Do Hangouts',
//     'Task 3 description',
//     'Task 3 long description',
//     true,
//     '2023-03-03 12:00:00',
//     '2023-03-03 12:00:00'
//   ),
//   new Task(
//     4,
//     'Go for a walk',
//     'Task 4 description',
//     null,
//     false,
//     '2023-03-04 12:00:00',
//     '2023-03-04 12:00:00'
//   ),
// ];




// Route::get('/greet', function() {
//     return 'Hello';
// })->name('hello');

// Route::get('/grt', function() {
//     return redirect()->route('hello');
// });

// Route::get('/greet/{name}', function($name) {
//     return 'Hello ' . $name;
// });

?>