<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit User</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body class="container mt-4">
    <h2>Edit User</h2>
    <?php if (isset($validation)): ?>
        <div class="alert alert-danger"><?= $validation->listErrors() ?></div>
    <?php endif; ?>
    <form action="<?= site_url('/users/update/' . $user['id']) ?>" method="post" enctype="multipart/form-data">
        <div class="mb-3">
            <label class="form-label">Username</label>
            <input type="text" name="username" class="form-control" value="<?= esc($user['username']) ?>" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Full Name</label>
            <input type="text" name="full_name" class="form-control" value="<?= esc($user['full_name']) ?>" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Current Avatar</label><br>
            <?php if (!empty($user['avatar'])): ?>
                <img src="<?= base_url('uploads/avatars/' . $user['avatar']) ?>" alt="Avatar" width="80" class="img-thumbnail mb-2">
            <?php else: ?>
                <img src="https://via.placeholder.com/80" alt="Default Avatar" class="img-thumbnail mb-2">
            <?php endif; ?>
        </div>
        <div class="mb-3">
            <label class="form-label">Upload New Avatar (JPG/PNG, max 2MB)</label>
            <input type="file" name="avatar" class="form-control" accept=".jpg,.jpeg,.png">
        </div>
        <button type="submit" class="btn btn-primary">Update User</button>
        <a href="<?= site_url('/users') ?>" class="btn btn-secondary">Cancel</a>
    </form>
</body>
</html>