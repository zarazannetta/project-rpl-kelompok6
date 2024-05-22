<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TaskVentures|Dashboard</title>
    <link rel="stylesheet" href="css/dashboardD.css">
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
            <li><a href="/dashboard-deadline">
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
            <li><a href="hardTask.html">
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
            <h2>Welcome Back, Furina</h2>
            <a href="/profile">
                <div class="profill">
                    <p><b>(+)3000</b></p>
                    <img src="stok//girl.png" alt="">
                </div>
            </a>
        </div>
        <div class="tombol">
            <div class="level">
                <div class="levels"><a href="/dashboard-level"><p>Levels</p></a></div>
                <div class="deadline"><a href="/dashboard-deadline"><p>Deadline</p></a></div>
            </div>
            <div class="tambah"><a href="/managetask"><p>+</p></a></div>
        </div>
        <div class="isi">
            <div class="isi2">
                <input type="checkbox">
                <div class="isi3">
                    <div class="namatask"><p>This is task</p></div>
                    <div class="edit"><a href="addTask.html"><i class="fa-regular fa-pen-to-square"></i></a></div>
                    <div class="tanggal"><p>22-22-2222</p></div>
                    <div class="jam"><p>22:22</p></div>
                    <div class="warna"><i class="fa-solid fa-square" style="color: #f87666;"></i></div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>