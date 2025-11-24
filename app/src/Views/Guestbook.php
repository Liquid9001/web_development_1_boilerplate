<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Guestbook</title>
    <link rel="stylesheet" href="/css/style.css">
</head>

<body>
    <div class="postmessage" >
        <h2>Leave a Message</h2>
        <form action="/guestbook" method="post">
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" required>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email">
            </div>
            <div class="form-group">
                <label for="message">Message:</label>
                <textarea id="message" name="message" rows="4" required></textarea>
            </div>
            <button type="submit">Submit</button>
        </form>


    </div>
    <div class="container">
        <header>
            <h1>Guestbook</h1>
        </header>

        <?php if (!empty($posts)) { ?>
            <section class="guestbook-list">
                <h2 style="margin-top:0.25rem;">Guestbook Entries</h2>

                <?php foreach ($posts as $post) {
                    $name = htmlspecialchars($post['name'] ?? 'Anonymous');
                    $message = htmlspecialchars($post['message'] ?? '');
                    $postedAt = isset($post['posted_at']) ? date("F j, Y, g:i a", strtotime($post['posted_at'])) : '';
                ?>
                    <article class="entry">
                        <div class="author"><?php echo $name; ?></div>
                        <?php if ($message !== '') { ?>
                            <blockquote><?php echo nl2br($message); ?></blockquote>
                        <?php } else { ?>
                            <p style="color:#69717a; margin:0 0 .6rem;">(No message)</p>
                        <?php } ?>
                        <div class="meta"><?php echo $postedAt; ?></div>
                    </article>
                <?php } ?>

            </section>
        <?php } else { ?>
            <p>No guestbook entries found.</p>
        <?php } ?>
    </div>

</body>

</html>