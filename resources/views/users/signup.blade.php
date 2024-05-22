<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TaskVentures|Sign Up</title>
    <link rel="stylesheet" href="css/register.css">
</head>
<body>
    <div class="kepala"> 
        <img src="stok/Logoo.png" alt="">
        <h1>Create an account</h1>
    </div>
    <form action="/signup" method="post">
    @csrf
    <div class="body">
            <div class="bodyy">
                <p>Username</p>
                <input type="text" name="username" id="username" placeholder="Enter new username">

                <div class="password">
                <p>Password</p>
                <label class="container">
                </div>

                <input type="password" name="password" id="password" placeholder="Enter new password">
            </div>
        </div>
        <div class="footer">
            <button type="submit">Create an Account</button>
            <p>Already have an Account? <a href="/login">Log in</a></p>
        </div>
    </form>
</body>
</html>