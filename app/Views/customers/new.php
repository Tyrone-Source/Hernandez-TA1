<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>New Customer</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body class="container mt-4">
    <h2>Add New Customer</h2>
    <?php if (isset($validation)): ?>
        <div class="alert alert-danger"><?= $validation->listErrors() ?></div>
    <?php endif; ?>
    <form action="<?= site_url('/customers/create') ?>" method="post">
        <div class="mb-3">
            <label class="form-label">Full Name</label>
            <input type="text" name="full_name" class="form-control" value="<?= old('full_name', $old['full_name'] ?? '') ?>" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Email</label>
            <input type="email" name="email" class="form-control" value="<?= old('email', $old['email'] ?? '') ?>" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Phone</label>
            <input type="text" name="phone" class="form-control" value="<?= old('phone', $old['phone'] ?? '') ?>">
        </div>
        <button type="submit" class="btn btn-primary">Save Customer</button>
        <a href="<?= site_url('/customers') ?>" class="btn btn-secondary">Cancel</a>
    </form>
</body>
</html>