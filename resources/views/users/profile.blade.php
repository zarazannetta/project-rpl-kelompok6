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
        <div id="backButton">
            <a href="#"><i class="fa-solid fa-backward" style="color: #b0b0b0;"></i></a>
        </div>
        <div id="imageModal" class="modal">
            <div class="modal-content">
                <span class="close" onclick="closeModal()">&times;</span>
                <div class="image-grid">
                    <div class="image-option" data-path="/stok/girl.png">
                        <img src="/stok/girl.png" alt="Image 1">
                    </div>
                    <div class="image-option" data-path="/stok/frieren.jpeg">
                        <img src="/stok/frieren.jpeg" alt="Image 2">
                    </div>
                    <div class="image-option" data-path="/stok/cat.jpeg">
                        <img src="/stok/cat.jpeg" alt="Image 3">
                    </div>
                    <div class="image-option" data-path="/stok/bunny.jpeg">
                        <img src="/stok/bunny.jpeg" alt="Image 4">
                    </div>

                </div>
            </div>
        </div>
        <form action="/profile" method="POST" enctype="multipart/form-data" id="profileForm">
            @csrf
            @method('PUT')

            <div class="pp">
                <label for="profilePicture" id="profilePictureLabel">
                    <input type="hidden" id="selectedImagePath" name="selectedImagePath" value="">
                    <img id="profilePicturePreview" src="{{ asset(Auth::user()->profilePicture) }}" alt="Profile Picture" style="width: 100px; height: 100px;">
                    <div id="editProfileLabel" onclick="openModal()">Edit profile icon</div>
                </label>
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
        
        function confirmDelete() {
        if (confirm('Are you sure you want to delete your account?\nThis action cannot be undone.')) {
            document.getElementById('deleteAccount').submit();
        }};

        //js untuk select image
        function openModal() {
            document.getElementById("imageModal").style.display = "block";
        }
        function closeModal() {
            document.getElementById("imageModal").style.display = "none";
        }
        window.onclick = function(event) {
            var modal = document.getElementById("imageModal");
            if (event.target == modal) {
                closeModal();
            }
        }

        document.addEventListener('DOMContentLoaded', function() {
            const imageOptions = document.querySelectorAll('.image-option');

            imageOptions.forEach(function(imageOption) {
                imageOption.addEventListener('click', function() {
                    imageOptions.forEach(function(option) {
                        option.classList.remove('selected');
                    });

                    imageOption.classList.add('selected');
                    const selectedImagePath = imageOption.getAttribute('data-path');
                    document.getElementById('selectedImagePath').value = selectedImagePath;
                    document.getElementById('profilePicturePreview').src = selectedImagePath;

                    closeModal();
                });
            });
        });

    </script>
</body>
</html>