<!DOCTYPE html>
<html lang="ja">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="{{ asset('/css/reset.css')  }}">
        <link rel="stylesheet" href="{{ asset('/css/style.css')  }}">
        <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/jQuery-Validation-Engine/2.6.4/validationEngine.jquery.min.css"
        type="text/css" />
        <script src="https://yubinbango.github.io/yubinbango/yubinbango.js" charset="UTF-8"></script>
        <title>@yield('title')</title>
    </head>
    <body>
        <div class="form-content">
        @yield('content')
        </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jQuery-Validation-Engine/2.6.4/jquery-1.8.2.min.js"
    type="text/javascript"></script>
    <script
    src="https://cdnjs.cloudflare.com/ajax/libs/jQuery-Validation-Engine/2.6.4/languages/jquery.validationEngine-ja.min.js"
    type="text/javascript" charset="utf-8"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jQuery-Validation-Engine/2.6.4/jquery.validationEngine.min.js"
    type="text/javascript" charset="utf-8"></script>
    <script src="{{asset('js/form.js')}}"></script>
</body>
</html>
