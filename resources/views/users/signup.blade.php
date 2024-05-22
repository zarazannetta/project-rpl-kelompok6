<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TaskVenture|Sign Up</title>
</head>
<body>
<main class="form-signup">
    <form action="/signup" method="post">
    @csrf
    <h1>Create an account</h1>
    
        <div>
        <label for="username">Username</label>
        <input type="text" name="username" class="form-control" id="username" placeholder="Enter new username">
        </div>

        <div>
        <label for="password">Password</label>
        <input type="password" name="password" class="form-control" id="password" placeholder="Enter new password">
        </div>
        </label>
        </div>

        <button class="button-submit-signup" type="submit">Create an account</button>
    </form>

    <p>Already have an account? <a href="/login">Log in</a></p>
</main>

</body>
</html>