<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Taskventures||Add Task</title>
    <link rel="stylesheet" href="/css/addTask.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    
</head>
<body>
    <nav class="nav">
        <ul>
            <li>
                <a href="#" class="logo">
                    <img src="{{ asset('stok/Logoo.png') }}" alt="">
                    <span class="nav-item">TaskVentures</span>
                </a>
            </li>
            <br>
            <li><a href="/dashboard-level">
                <i class="fas fa-home"></i>
                <span class="nav-item">Home</span>
            </a></li>
            <li><a href="/leaderboard">
                <i class="fa-solid fa-ranking-star"></i>
                <span class="nav-item">Leaderboard</span>
            </a></li>
            <br><br>
            <p>My Tasks</p>
            <br>
            <li><a href="hardTask.html">
                <i class="fa-solid fa-square" style="color: #f87666;"></i>
                <span class="nav-item">Hard</span>
            </a></li>
            <li><a href="mediumTask.html">
                <i class="fa-solid fa-square" style="color: #F9DB6D;"></i>
                <span class="nav-item">Medium</span>
            </a></li>
            <li><a href="easyTask.html">
                <i class="fa-solid fa-square" style="color: #78D700;"></i>
                <span class="nav-item">Easy</span>
            </a></li>
            <li><a href="/login" class="logout">
                <i class="fa-solid fa-right-from-bracket"></i>
                <span class="nav-item">Logout</span>
            </a></li>
        </ul>
    </nav>
    <div class="main-cont">
        <div class="heder">
            <h2>Start your Taskventures</h2>
            <div class="profill">
                <p><b>(+)3000</b></p>
                <img src="{{ asset('stok/girl.png') }}" alt="">
                
            </div>
        </div>
        <div class="isi">
            <div id="backButton">
                <a href="#"><i class="fa-solid fa-backward" style="color: #b0b0b0;"></i></a>
            </div>

            <form action="{{ $task ? '/managetask/' . $task->id : '/managetask' }}" method="POST">
                @csrf
                @if($task)  
                    @method('PUT') 
                    
                @endif
                <input type="hidden" name="user_id" value="{{ $userId }}">
                <div class="judultask"><input placeholder="Title of Task" name="taskName" type="text" value="{{ $task ? $task->taskName : '' }}"></div>
                <div class="deskripsi">
                    <textarea placeholder="Input description of Task" name="taskDescription" id="desk">{{ $task ? $task->taskDescription : '' }}</textarea>
                </div>
                <div class="berdua">
                    <div class="deadline">
                        <div class="judul"><p><b>Deadline</b></p></div>
                        <div class="date">
                            <p>Date and Time : </p>
                            <input type="datetime-local" name="taskDueDate" placeholder="dd/mm/yyyy 00:00" value="{{ $task ? date('Y-m-d\TH:i', strtotime($task->taskDueDate)) : '' }}">
                        </div>
                    </div>
                    <div class="levels">
                        <div class="radio-container">
                            <p><b>Levels</b></p>
                            <input type="radio" id="radio1" name="taskCategory" value="Hard" {{ $task && $task->taskCategory === 'Hard' ? 'checked' : '' }}>
                            <label for="radio1">Hard</label>
                            <br>
                            <input type="radio" id="radio2" name="taskCategory" value="Medium" {{ $task && $task->taskCategory === 'Medium' ? 'checked' : '' }}>
                            <label for="radio2">Medium</label>
                            <br>
                            <input type="radio" id="radio3" name="taskCategory" value="Easy" {{ $task && $task->taskCategory === 'Easy' ? 'checked' : '' }}>
                            <label for="radio3">Easy</label> 
                        </div>
                    </div>
                </div>

                <div class="footer">
                    <div class="save">
                        <button type="submit">{{ $task ? 'Save Changes' : 'Add Task' }}</button>
                    </div>
                </div>
            </form>

            @if($task)
            <div class="footer">
                <div class="delete">
                    <form action="{{ route('deleteTask', ['id' => $task->id]) }}" method="POST">
                        @csrf
                        <button type="submit">Delete Task</button>
                    </form>
                </div>
            </div>
            @endif

        </div>  
    </div>
   
    <script>
    document.getElementById('backButton').addEventListener('click', function() {
        window.history.back();
    });

    </script>

</body>
</html>