<!DOCTYPE html>
<html lang="en-US">
    <head>
        <meta charset="utf-8">
    </head>
    <body>
        <h2>Verify Your Email Address</h2>

        <div>
            Thanks for creating an account with our app.
            <a href="{{ route('register/activate', $user->id) }}">Please follow the link below to verify your email address</a>

        </div>

    </body>
</html>