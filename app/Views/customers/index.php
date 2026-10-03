<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Customer Accounts</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>Customer Accounts</h2>
        <div>
            <a href="<?= site_url('/customers/new') ?>" class="btn btn-primary">Add New Customer</a>
            <a href="<?= site_url('/users') ?>" class="btn btn-secondary">Manage Users</a>
        </div>
    </div>

    <?php if (session()->getFlashdata('success')): ?>
        <div class="alert alert-success"><?= session()->getFlashdata('success') ?></div>
    <?php endif; ?>

    <table class="table table-bordered table-striped align-middle">
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($customers) && is_array($customers)): ?>
                <?php foreach ($customers as $customer): ?>
                    <tr>
                        <td><?= esc($customer['name'] ?? $customer['full_name'] ?? $customer['customer_name'] ?? 'N/A') ?></td>
                        <td><?= esc($customer['email'] ?? 'N/A') ?></td>
                        <td><?= esc($customer['phone'] ?? '') ?></td>
                        <td>
                            <a href="<?= site_url('/customers/edit/' . $customer['id']) ?>" class="btn btn-sm btn-warning">Edit</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="4" class="text-center">No customers found.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</body>
</html>