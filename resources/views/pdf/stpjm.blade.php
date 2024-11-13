<!DOCTYPE html>
<html lang="en">
<head>
    <title>STPJM PDF</title>
    <style>
        /* Add your styles here */
        body {
            font-family: Arial, sans-serif;
        }
        h1 {
            text-align: center;
        }
    </style>
</head>
<body>
    <h1>STPJM Details</h1>
    <p><strong>Date:</strong> {{ $record->tanggal }}</p>
    <p><strong>User Name:</strong> {{ $record->user->name }}</p>
    <p><strong>Created At:</strong> {{ $record->created_at }}</p>
    <p><strong>Updated At:</strong> {{ $record->updated_at }}</p>
</body>
</html>
