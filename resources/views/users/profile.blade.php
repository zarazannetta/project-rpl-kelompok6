<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TaskVentures|Profile</title>
    <link rel="stylesheet" href="css/profil.css">
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
        <div id="backButton">
            <a href="#"><i class="fa-solid fa-backward" style="color: #b0b0b0;"></i></a>
        </div>
        <form action="/profile" method="POST">
            @csrf
            @method('PUT')

            <div class="pp">
                <img src="stok/girl.png" alt="" style="width: 100px; height: 100px;">
                <a id="editProfileLink">Edit profile picture</a>
                <input type="file" id="profilepic" name="profilepic">
            </div>
            <div class="uname">
                <label for="username">Username</label>
                <input type="text" id="username" name="username" value="{{ $userdata->username }}">
            </div>

            <div class="password">
                <label for="password">Change Password</label>
                <input type="password" id="password" name="password" placeholder="Enter new password">
            </div>

            <div class="password">
                <label for="confirmPassword">Confirm Password</label>
                <input type="password" id="confirmPassword" name="confirmPassword" placeholder="Confirm new password">
            </div>

            <div class="footer">
            <div class="delete">
                <button type="button" onclick="confirmDelete()">Delete account</button>
            </div>
            <div class="save"><button type="submit">Save Changes</button></div>
            </div>
        </form>
        <form action="/profile/delete" method="POST" id="deleteAccount" style="display: inline;">
            @csrf
            @method('DELETE')
        </form>
    </div>
    
    <script>
        document.getElementById('backButton').addEventListener('click', function() {
            window.history.back();
        });

        document.getElementById('editProfileLink').addEventListener('click', function() {
            document.getElementById('profilepic').click();
        });
        function confirmDelete() {
        if (confirm('Are you sure you want to delete your account?\nThis action cannot be undone.')) {
            document.getElementById('deleteAccount').submit();
        }
    }
    </script>
</body>
</html>