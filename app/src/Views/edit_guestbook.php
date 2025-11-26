<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Post</title>
    <link rel="stylesheet" href="/css/style.css">
</head>
<body>
    <div class="container">
        <h1>Edit Post #<?php echo htmlspecialchars($post['id'] ?? ''); ?></h1>
        <form action="/guestbook/edit/<?php echo htmlspecialchars($post['id']); ?>" method="post">
            <input type="hidden" name="id" value="<?php echo htmlspecialchars($post['id']); ?>">
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" id="name" name="name" value="<?php echo htmlspecialchars($post['name'] ?? ''); ?>" required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($post['email'] ?? ''); ?>">
            </div>
            <div class="form-group">
                <label for="message">Message</label>
                <textarea id="message" name="message" rows="6"><?php echo htmlspecialchars($post['message'] ?? ''); ?></textarea>
            </div>
            <button type="submit">Save</button>
            <a href="/guestbook/manage" style="margin-left:1rem;">Cancel</a>
        </form>
    </div>
</body>
</html>
