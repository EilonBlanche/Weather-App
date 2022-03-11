<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laravel Vue</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <div id="app">
        <div class="d-flex flex-column min-vh-100">
            <header-component></header-component>
            <main class="flex-fill">
                <div class="container-fluid border-0">
                    <router-view></router-view>
                </div>
            </main>
            <footer-component></footer-component>
    </div>
</body>
<script src="{{ asset('js/app.js') }}"></script>
</html>