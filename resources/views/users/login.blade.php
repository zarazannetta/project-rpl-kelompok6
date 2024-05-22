<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TaskVentures|Sign in</title>
    <link rel="stylesheet" href="css/login.css">
</head>
<body>
    @if(session()->has('signupSuccess'))
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                setTimeout(function() {
                    alert('{{ session('signupSuccess') }}');
                }, 100);    
            });
        </script>
    @endif

    @if(session()->has('loginError'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{ session('loginError')}}
        </div>
    @endif
    <div class="body">
        <img src="stok/Logoo.png" alt="">
        <div class="border">
                <div class="kepala">
                    <h1>Sign In</h1>
                </div>
            <form action="/login" method="post">
            @csrf
                <div class="bodyy">
                    <p>Username</p>
                    <input type="text" name="username" id="username" 
                    placeholder="Enter your username" autofocus required>

                    <p>Password</p>
                    <input type="password" name="password" id="password"
                    placeholder="Enter your password" required>
                </div>

                <div class="footer">
                    <button type="submit">Login</button>
                </div>
            </form>
        </div>
    </div>
    <div class="create">
        <a href="/signup"><button>Create an Account</button></a>
    </div>
</body>
</html>