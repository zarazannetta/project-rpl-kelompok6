<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard-Deadline</title>
    <link rel="stylesheet" href="{{ asset('css/dashboard-deadline.css') }}">
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
                    <p><b>(+) {{ $userPoints }}</b></p>
                    <img src="{{ asset('images/user-profile.jpg') }}" alt="User Profile">
                </div>
            </a>
        </div>
        <div class="tombol">
            <div class="level">
                <div class="levels"><a href="{{ route('dashboard-level') }}"><p>Levels</p></a></div>
                <div class="deadline"><a href="{{ route('dashboard-deadline') }}"><p>Deadline</p></a></div>
            </div>
            <div class="tambah"><a href="{{ route('tasks.create') }}"><p>+</p></a></div>
        </div>
        @foreach ($tasks as $task)
            <div class="isi">
                <div class="isi2">
                    <input type="checkbox" {{ $task->isCompleted ? 'checked' : '' }}>
                    <div class="isi3">
                        <div class="namatask"><p>{{ $task->taskDescription }}</p></div>
                        <div class="edit"><a href="{{ route('tasks.edit', $task->id) }}"><i class="fa-regular fa-pen-to-square"></i></a></div>
                        <div class="tanggal"><p>{{ $task->taskDueDate->format('d M Y') }}</p></div>
                        <div class="jam"><p>{{ $task->taskDueDate->format('H:i') }}</p></div>
                        <div class="warna"><i class="fa-solid fa-square" style="color: {{ $task->categoryColor }}"></i></div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</body>
</html>
