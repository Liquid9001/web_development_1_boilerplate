<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Guestbook Management</title>
    <link rel="stylesheet" href="/css/style.css">
</head>
<body>
    <div class="container">
        <header>
            <h1>Guestbook - Management</h1>
            <p><a href="/guestbook">Back to guestbook</a> | <a href="/logout">Logout</a></p>
        </header>

        <?php if (!empty($posts)) { ?>
            <table class="guestbook-table" style="width:100%; border-collapse:collapse;">
                <thead>
                    <tr>
                        <th style="text-align:left; padding:8px;">ID</th>
                        <th style="text-align:left; padding:8px;">Name</th>
                        <th style="text-align:left; padding:8px;">Email</th>
                        <th style="text-align:left; padding:8px;">Message</th>
                        <th style="text-align:left; padding:8px;">Posted At</th>
                        <th style="text-align:left; padding:8px;">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($posts as $post) {
                        $name = htmlspecialchars($post['name'] ?? 'Anonymous');
                        $email = htmlspecialchars($post['email'] ?? '');
                        $message = htmlspecialchars($post['message'] ?? '');
                        $postedAt = isset($post['posted_at']) ? date("F j, Y, g:i a", strtotime($post['posted_at'])) : '';
                    ?>
                        <tr style="border-top:1px solid #eaeaea;">
                            <td style="padding:8px; vertical-align:top;"><?php echo $post['id']; ?></td>
                            <td style="padding:8px; vertical-align:top;"><?php echo $name; ?></td>
                            <td style="padding:8px; vertical-align:top;"><?php echo $email; ?></td>
                            <td style="padding:8px; vertical-align:top; max-width:400px;"><?php echo nl2br($message); ?></td>
                            <td style="padding:8px; vertical-align:top;"><?php echo $postedAt; ?></td>
                            
                            <td style="padding:8px; vertical-align:top;">
                                <a href="/guestbook/edit/<?php echo $post['id']; ?>">Edit</a>
                                <form action="/guestbook/delete" method="post" style="display:inline; margin-left:.5rem;">
                                    <input type="hidden" name="id" value="<?php echo $post['id']; ?>">
                                    <button type="submit" onclick="return confirm('Delete this post?');">Delete</button>
                                </form>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        <?php } else { ?>
            <p>No posts found.</p>
        <?php } ?>
    </div>
</body>
</html>
