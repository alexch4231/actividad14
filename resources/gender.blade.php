<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gender Test</title>
</head>
<body>
    <table>
        <thead>
            <tr>
                <th>Name</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($gender as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>Name</td>
                </tr>
            @endforeach
        </tbody>
    </table>
<!-- <pre>{{print_r/$gender) }}</pre> -->
</body>
</html>