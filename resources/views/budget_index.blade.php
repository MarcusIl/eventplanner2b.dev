<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Budget Management</title>
</head>
<body>
    <h1>Budget Management</h1>
    <table>
        <thead>
            <tr>
                <th>Item</th>
                <th>Amount</th>
            </tr>
        </thead>
        <tbody>
            @foreach($budgets as $budget)
                <tr>
                    <td>{{ $budget->item }}</td>
                    <td>{{ $budget->amount }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
