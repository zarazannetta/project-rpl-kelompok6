<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Leaderboard</title>
    <link rel="stylesheet" href="{{ asset('css/leaderboard.css') }}">
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
        <div class="lb"><p><b>TOP 50 WORLD LEADERBOARD</b></p></div>
        @foreach($users as $user)
            <div class="{{ $user->username == $currentUser ? 'urutan' : 'urutan2' }}">
                <div class="nama">
                    <img src="{{ asset($user->profilePicture) }}" alt="" style="border-radius: 20px;">
                    <p><b>{{ $user->username }}</b></p>
                </div>
                <div class="score"><p><b>{{ $user->points }}</b></p></div>
            </div>
        @endforeach
    </div>

</body>
</html>
