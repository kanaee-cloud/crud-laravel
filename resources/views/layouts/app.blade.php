<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MyApp</title>
    @vite('resources/css/app.css')
</head>
<body>
    <x-navbar />
    <div class="container mx-auto">
        @yield('content')
    </div>
    <x-footer />
        
</body>
</html>
