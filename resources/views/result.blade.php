<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>URL Shortener - Result</title>

    <!-- Styles -->
    <link href="css/app.css" rel="stylesheet">

</head>
<body>
<div class="flex-center position-ref full-height">

    <div class="content">
        <div>Full URL: {{ $fullUrl }}</div>
        <div>Short URL: <a href="{{ $shortUrl }}">{{ $shortUrl }}</a></div>
        <div><a href="/myshortener">Create new</a></div>
    </div>
</div>
</body>
</html>
