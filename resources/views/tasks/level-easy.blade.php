<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Easy Tasks</title>
    <link rel="stylesheet" href="{{ asset('css/level-easy.css') }}">
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
            <li><a href="{{ route('dashboard-level') }}">
                <i class="fas fa-home"></i>
                <span class="nav-item">Home</span>
            </a></li>
            <li><a href="{{ route('leaderboard') }}">
                <i class="fa-solid fa-ranking-star"></i>
                <span class="nav-item">Leaderboard</span>
            </a></li>
            <br><br>
            <p>My Tasks</p>
            <br>
            <li><a href="{{ route('tasks.hard') }}">
                <i class="fa-solid fa-square" style="color: #f87666;"></i>
                <span class="nav-item">Hard</span>
            </a></li>
            <li><a href="{{ route('tasks.medium') }}">
                <i class="fa-solid fa-square" style="color: #F9DB6D;"></i>
                <span class="nav-item">Medium</span>
            </a></li>
            <li><a href="{{ route('tasks.easy') }}">
                <i class="fa-solid fa-square" style="color: #78D700;"></i>
                <span class="nav-item">Easy</span>
            </a></li>
            <li>
                <a href="#" class="logout" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <i class="fa-solid fa-right-from-bracket"></i>
                    <span class="nav-item">Logout</span>
                </a>
            </li>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        </ul>
    </nav>
    <div class="main-cont">
        <div class="heder">
            <h2>Welcome Back, {{ Auth::user()->username }}</h2>
            <a href="{{ route('profile') }}">
                <div class="profill">
                    <p><b>(+){{ Auth::user()->points }}</b></p>
                    <img src="{{ asset(Auth::user()->profilePicture) }}" alt="">
                </div>
            </a>
        </div>
        <div class="isi">
            <div class="easy">
                <div class="atas">
                    <p><b>Easy (10 points)</b></p>
                    <a href="{{ route('showTaskForm') }}" id="add">
                        <i class="fa-solid fa-circle-plus" style="color: #bfbfbf;"></i>
                        <p>Add new task</p>
                    </a>
                </div>
                @foreach($tasks as $task)
                <form action="{{ route('tasks.update.hard', $task->id) }}" method="POST">
                    @csrf
                    <div class="input">
                        <input type="checkbox" name="isCompleted" {{ $task->isCompleted ? 'checked' : '' }} onchange="this.form.submit()">
                        <div class="task">
                            <p><b style="font-weight: 600;">{{ $task->taskName }}</b></p>
                            <p>{{ $task->taskDescription }}</p>
                            <div class="tanggal">{{ \Carbon\Carbon::parse($task->deadline)->format('d M Y H:i') }}</div>
                        </div>
                        <div class="edit">
                            <a href="{{ route('editTaskForm', $task->id) }}"><i class="fa-regular fa-pen-to-square"></i></a>
                    </div>
                </div>
                </form>
                @endforeach
            </div>
        </div>
    </div>
</body>
</html>
