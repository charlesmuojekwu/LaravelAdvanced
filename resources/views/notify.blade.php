

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Account Registration</title>
</head>
<body>
   @foreach (auth()->user()->notifications  as $notification )
       <p>{{ $notification->data['data']; }}</p>
   @endforeach
</body>
</html>

