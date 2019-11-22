<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title></title>
    @include('../partials.head')
</head>
<body>
<div id="main">
    @include('../partials.nav')
    <div style="height: 113px;"></div>
    @yield('content')
    @include('../partials.footer')

    <script type="text/javascript">
        //Alert Dismiss Function
        setTimeout(function () {
            let alert = $(".alert");
            alert.remove();
        }, 5000);
    </script>
</div>

</body>
</html>
