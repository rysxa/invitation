<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>400 Bad Request</title>

    <!-- Google font -->
    <link href="https://fonts.googleapis.com/css?family=Fredoka+One" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Raleway:400,700" rel="stylesheet">

    <!-- Custom stlylesheet -->
    <link rel="stylesheet" href="{{ asset('colorlib-error-404/colorlib-error-404-7/css/style.css') }}">

</head>

<body>

    <div id="notfound">
        <div class="notfound">
            <div class="notfound-404">
                <h1>400</h1>
            </div>
            <?php $user = Auth::user()->username; ?>
            <h2>Oops, The Page you are looking for can't be found!</h2>
            <a href="{{ route('admin.data.event', $user) }}"><span class="arrow"></span>Isi Form</a>
        </div>
    </div>

</body><!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>
