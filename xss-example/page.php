<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>XSS Vulnerable Site</title>
    <link rel="stylesheet" href="./style.css">
</head>
<body>
    <div class="container">
        <div class="card">

            <h1>XSS Me</h1>

            <h2>Comments:</h2>

            <?php if ($result->num_rows > 0): ?>

                <ul class="comment-list">

                    <?php while($row = $result->fetch_assoc()):

                        $username = strtolower($row['username']);
                        $date_posted = date("Y-m-d", strtotime($row['date_posted']));
                        $comment = $row['comment'];
                        ?>

                        <li class="comment">
                            <p class="comment-meta">
                                <span class="comment-username">@<?php echo $username ?></span>
                                <span class="comment-date-posted"><?php echo $date_posted ?></span>
                            </p>
                            <p class="comment-body"><?php echo $comment ?></p>
                        </li>

                    <?php endwhile; ?>

                </ul>

                <div class="divider"></div>

                <h2>Post a comment:</h2>

                <form class="form" action="./insert_comment.php" method="post">
                    <input class="form-username" name="username" type="text" placeholder="<username>">
                    <textarea class="form-comment" name="comment" rows="10" placeholder="<place your comment>"></textarea>

                    <div class="buttons">
                        <a class="button-reset" href="./reset_db.php">Reset</a>
                        <input class="button-submit" type="submit" value="Submit">
                    </div>
                </form>

            <?php else:
                require_once './reset_db.php';
            endif; ?>
            
        </div>
    </div>
</body>
</html>
