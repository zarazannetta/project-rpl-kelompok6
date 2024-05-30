<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TaskVentures|Dashboard</title>
    <link rel="stylesheet" href="css/dashboard.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
</head>
<body>
    <nav class="nav">
        <ul>
            <li>
                <a href="#" class="logo">
                    <img src="stok/Logoo.png" alt="">
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
            <h3>Welcome back, @if (session('username')){{ session('username') }}@endif</h3>
            <a href="/profile">
            <div class="profill">
                <p><b>(+)3000</b></p>
                <img src="stok//girl.png" alt="">
            </div>
            </a>
        </div>
        <div class="tombol">
            <div class="levels"><a href="/dashboard-level"><p>Levels</p></a></div>
            <div class="deadline"><a href="/dashboard-deadline"><p>Deadline</p></a></div>
        </div>
        <div class="isi">
            <div class="hard">
                <div class="atas">
                    <p>Hard(30 points)</p>
                    <a href="/managetask" id="add">
                        <i class="fa-solid fa-circle-plus" style="color: #bfbfbf;"></i>
                        <p>Add new task</p>
                    </a>
                </div>

                @foreach ($hardTasks as $task)
                <a href="/managetask/{{ $task->id }}" class="input">
                    <input type="checkbox" {{ $task->isCompleted ? 'checked' : '' }}>
                    <div class="task">
                        <p>{{ $task->taskName }}</p>
                        <p>{{ $task->taskDescription }}</p>
                        <div class="tanggal">{{ \Carbon\Carbon::parse($task->taskDueDate)->format('d F Y H:i') }}</div>
                    </div>
                </a>
                @endforeach

            </div>
            <div class="medium">
                <div class="atas2">
                    <p>Medium(20 points)</p>
                    <a href="/managetask" id="add">
                        <i class="fa-solid fa-circle-plus" style="color: #bfbfbf;"></i>
                        <p>Add new task</p>
                    </a>
                </div>

                @foreach ($mediumTasks as $task)
                <a href="/managetask/{{ $task->id }}" class="input">
                    <input type="checkbox" {{ $task->isCompleted ? 'checked' : '' }}>
                    <div class="task">
                        <p>{{ $task->taskName }}</p>
                        <p>{{ $task->taskDescription }}</p>
                        <div class="tanggal">{{ \Carbon\Carbon::parse($task->taskDueDate)->format('d F Y H:i') }}</div>
                    </div>
                </a>
                @endforeach

            </div>
            <div class="easy">
                <div class="atas3">
                    <p>Easy(10 points)</p>
                    <a href="/managetask" id="add">
                        <i class="fa-solid fa-circle-plus" style="color: #bfbfbf;"></i>
                        <p>Add new task</p>
                    </a>
                </div>
                @foreach ($easyTasks as $task)
                <a href="/managetask/{{ $task->id }}" class="input">
                    <input type="checkbox" {{ $task->isCompleted ? 'checked' : '' }}>
                    <div class="task">
                        <p>{{ $task->taskName }}</p>
                        <p>{{ $task->taskDescription }}</p>
                        <div class="tanggal">{{ \Carbon\Carbon::parse($task->taskDueDate)->format('d F Y H:i') }}</div>
                    </div>
                </a>
                @endforeach
            </div>
        </div>
    </div>
</body>
</html>