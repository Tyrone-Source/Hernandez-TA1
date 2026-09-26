<!DOCTYPE html>
<html>
<head>
    <title>Customer Accounts</title>
</head>
<body>

    <h1>Customer Accounts</h1>

    <hr>

    <a href="/">Home</a> |
    <a href="/about">About</a> |
    <a href="/customers">Customer Accounts</a> |
    <a href="/users">User Accounts</a>

    <br><br>

    <table border="1" cellpadding="10">
        <tr>
            <th>Full Name</th>
            <th>Email</th>
            <th>Phone</th>
        </tr>

        <?php foreach ($customers as $customer): ?>
    <tr>
        <td><?= $customer['full_name']; ?></td>
        <td><?= $customer['email']; ?></td>
        <td><?= $customer['phone']; ?></td>
    </tr>
    <?php endforeach; ?>
    </table>

</body>
</html>