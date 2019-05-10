<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>URL Shortener</title>

    <!-- Styles -->
    <link href="css/app.css" rel="stylesheet">

</head>
<body>
<div class="flex-center position-ref full-height">

    <div class="content">
        <div class="title m-b-md">
            URL Shortener
        </div>

        <form method="POST" action="/myshortener/create">
            @csrf
            <input class="url-input" type="url" name="full_url" value="" placeholder="https://example.com">
            <button>Create</button>
        </form>
    </div>
</div>
</body>
</html>
