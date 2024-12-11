<html>
    <head>
        <meta charset="UTF-8">
        <title>Login made by me</title>
        <link rel="stylesheet" href="index.css">
    </head>

    <body>
        <div class="container">
            <div class="blue-container">
                <h1 class="login_form">Login Form</h1>
            </div>

            <div class="line"></div>

            <h2>Email</h2>
            <input type="text" id="username" class="input-field" placeholder="Enter your email">

            <h2>Password</h2>
            <input type="password" id="password" class="input-field" placeholder="Enter your password">

            <br>

            <button type="button" class="Login" onclick="submitForm()">Login</button>

            <div id="loginResponse"></div>

            <br>

            <h5 class="made-by"> Made by Oliwier </h5>
        </div>
    </body>

    <script>
            function submitForm() {
                var username = document.getElementById('username').value;
                var password = document.getElementById('password').value;

                var xhr = new XMLHttpRequest();
                xhr.open("POST", "login.php", true);
                xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
                xhr.onload = function() {
                    if (xhr.status == 200) {
                        document.getElementById('loginResponse').innerHTML = xhr.responseText;
                    }
                };

                xhr.send("username=" + username + "&password=" + password);
            }
     </script>
</html>
