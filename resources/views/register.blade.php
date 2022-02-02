<!DOCTYPE html>
<html lang="en">
<head>
    <x-head />
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
</head>
<body>
    <div class="loginDiv">


            <form action="/api/register" method="post">

                <h2>Registrera dig</h2>

                <div>
                    <label for="First Name">First name</label>
                    <input type="text" name="fName" placeholder="Firstname" required>
                    <label for="First Name">Surname</label>
                    <input type="text" name="sName" placeholder="Surname" required>
                </div>

                <label for="username">Email</label>
                <input type="text" name="email" placeholder="Email" id="username" required>

                <label for="password">Password</label>
                <input type="password" name="password" placeholder="Password" id="password" required>

                <span class="erronspan">
                    {{$error}}
                </span>

                <button>Registrera dig</button>
                <span>
                    Har du ett Konto? <a class="register-link" href="/login">Logga in</a>
                </span>
        </form>


    </div>
</body>
</html>
