<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TaskVenture|Sign in</title>
</head>
<body>
    @if(session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success')}}
        </div>
    @endif

    @if(session()->has('loginError'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{ session('loginError')}}
        </div>
    @endif
<main class="form-login">
    <form action="/login" method="post">
    @csrf
    <h1>Sign in</h1>
    
        <div>
        <label for="username">Username</label>
        <input type="text" name="username" class="form-control" id="username" 
        placeholder="Enter your username" autofocus required>
        </div>

        <div>
        <label for="password">Password</label>
        <input type="password" name="password" class="form-control" id="password" 
        placeholder="Enter your password" required>
        </div>
        </label>
        </div>

        <button class="button-submit-login" type="submit">Login</button>
    </form>

    <button class="signup-button" type="button"><a href="/signup">Create an account</a></button>
</main>

</body>
</html>