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
                    <p><b>(+) {{ Auth::user()->points }}</b></p>
                    <img src="{{ asset(Auth::user()->profilePicture) }}" alt="User Profile" >
                </div>
            </a>
        </div>
        <div class="tombol">
            <div class="level">
                <div class="levels"><a href="{{ route('dashboard-level') }}"><p>Levels</p></a></div>
                <div class="deadline"><a href="{{ route('dashboard-deadline') }}"><p>Deadline</p></a></div>
            </div>
            <div class="tambah"><a href="{{ route('showTaskForm') }}"><p>+</p></a></div>
        </div>
        @foreach ($tasks as $task)
            <div class="isi">
                <div class="isi2">
                    <form action="{{ route('tasks.update.dashboarddeadline', $task->id) }}" method="POST">
                        @csrf
                        <input type="checkbox" name="isCompleted" {{ $task->isCompleted ? 'checked' : '' }} onchange="this.form.submit();toggleTaskDecoration(this)">
                    </form>
                    <div class="isi3">
                        <div class="namatask{{ $task->isCompleted ? ' completed' : '' }}"><p>{{ $task->taskName }}</p></div>
                        <div class="edit"><a href="{{ route('editTaskForm', $task->id) }}"><i class="fa-regular fa-pen-to-square"></i></a></div>
                        <div class="tanggal">{{ \Carbon\Carbon::parse($task->taskDueDate)->format('d F Y H:i') }}</div>
                        <div class="warna">
                            @php
                            $color = '';
                            switch($task->taskCategory) {
                                case 'Hard':
                                    $color = '#f87666';
                                    break;
                                case 'Medium':
                                    $color = '#F9DB6D';
                                    break;
                                case 'Easy':
                                    $color = '#78D700';
                                    break;
                                default:
                                    $color = 'black';
                            }
                            @endphp
                            <i class="fa-solid fa-square" style="color: {{ $color }}"></i>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach

    </div>
</body>

<script>
    function toggleTaskDecoration(checkbox) {
        var namatask = checkbox.parentNode.nextElementSibling.querySelector('.namatask');
        if (checkbox.checked) {
            namatask.classList.add('completed');
        } else {
            namatask.classList.remove('completed');
        }
    }
</script>

</html>
