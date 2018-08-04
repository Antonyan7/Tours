
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Book</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
    <div class="jumbotron text-xs-center">
        <h1 class="display-3"></h1>
        <p class="lead"><strong>This is booked Tour Information</strong> --</p>
        <hr>
        <table class="table">
            <thead>
            <tr>
                @foreach($bookData as $key => $data)
                <th scope="col">{{$key}}</th>
                @endforeach
            </tr>
            </thead>
            <tbody>
                <tr>
                    @foreach($bookData as $data)
                    <th scope="row">{{ $data}}</th>
                    @endforeach
                </tr>
            </tbody>
        </table>
        <p class="lead">
            <a class="btn btn-primary btn-sm" href="{{ env('APP_URL').'/tour-page/'.$tour->id }}" target="_blank" role="button">View</a>
        </p>
    </div>
</div>

</body>
</html>