<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard</title>
</head>
<body>
    <h1> dashboard</h1>
    @auth
        <form method="POST" action="{{ route('logout') }}">
            @csrf

            <a :href="route('admin.logout')"
                onclick="event.preventDefault();
                        this.closest('form').submit();">
                {{ __('Log Out') }}
            </a >
        </form>
    @endauth


</body>
</html>
