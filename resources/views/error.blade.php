<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>URL Shortener - Error</title>

    <!-- Styles -->
    <link href="css/app.css" rel="stylesheet">

</head>
<body>
<div class="flex-center position-ref full-height">

    <div class="content">
        <div class="title m-b-md">
            URL Shortener
        </div>

        <div class="error">Error: {{ $message }}</div>
        <a href="/myshortener">Return</a>
    </div>
</div>
</body>
</html>
