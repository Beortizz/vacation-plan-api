<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Holiday Plan PDF</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        h1 {
            font-size: 24px;
            margin-bottom: 10px;
        }
        p {
            margin: 5px 0;
        }
        ul {
            list-style-type: none;
            padding: 0;
            margin: 5px 0;
        }
        li {
            margin: 5px 0;
        }
    </style>
</head>
<body>
    <h1>Holiday Plan</h1>
    <p><strong>Title:</strong> {{ $holidayPlan->title }}</p>
    <p><strong>Description:</strong> {{ $holidayPlan->description }}</p>
    <p><strong>Date:</strong> {{ $holidayPlan->date }}</p>
    <p><strong>Location:</strong> {{ $holidayPlan->location }}</p>
    <p><strong>Participants:</strong></p>
    <ul>
        @foreach ($holidayPlan->users as $user)
            <li><strong>Name:</strong> {{ $user->name }}, <strong>Email:</strong> {{ $user->email }}</li>
        @endforeach
    </ul>
</body>
</html>
