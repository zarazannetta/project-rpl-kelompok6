<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Medium Tasks</title>
    <link rel="stylesheet" href="{{ asset('css/level-medium.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
</head>
<body>
    <nav class="nav">
        <ul>
            <li>
                <a href="#" class="logo">
                    <img src="{{ asset('images/Logoo.png') }}" alt="">
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
            <li><a href="{{ route('logout') }}" class="logout">
                <i class="fa-solid fa-right-from-bracket"></i>
                <span class="nav-item">Logout</span>
            </a></li>
        </ul>
    </nav>
    <div class="main-cont">
        <div class="heder">
            <h2>Welcome Back, {{ Auth::user()->username }}</h2>
            <a href="{{ route('profile') }}">
                <div class="profill">
                    <p><b>(+){{ Auth::user()->points }}</b></p>
                    <img src="{{ asset('stok/Logoo.png') }}" alt="">
                </div>
            </a>
        </div>
        <div class="isi">
            <div class="medium">
                <div class="atas">
                    <p><b>Medium (20 points)</b></p>
                    <a href="{{ route('tasks.create') }}" id="add">
                        <i class="fa-solid fa-circle-plus" style="color: #bfbfbf;"></i>
                        <p>Add new task</p>
                    </a>
                </div>
                @foreach($tasks as $task)
                <div class="input">
                    <form action="{{ route('tasks.update.medium', $task->id) }}" method="POST">
                        @csrf
                        <input type="checkbox" name="is_completed" {{ $task->is_completed ? 'checked' : '' }} onchange="this.form.submit()">
                        <div class="task">
                            <p>{{ $task->description }}</p>
                            <div class="tanggal">{{ \Carbon\Carbon::parse($task->deadline)->format('d M Y H:i') }}</div>
                        </div>
                        <div class="edit">
                            <a href="{{ route('tasks.edit', $task->id) }}"><i class="fa-regular fa-pen-to-square"></i></a>
                        </div>
                    </form>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</body>
</html>
