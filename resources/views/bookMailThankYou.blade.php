
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Bootstrap Example</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
    <div class="jumbotron text-xs-center">
        <h1 class="display-3">Thank You!</h1>
        <p class="lead"><strong>We Will Answer Soon</strong> --</p>
        <hr>
        <p class="lead">
            <a class="btn btn-primary btn-sm" href="{{ env('APP_URL') }}" role="button">Continue to homepage</a>
        </p>
    </div>

</div>

</body>
</html>