<?php
    include "../database/dbh.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Joel Dangmei</title>
    <link rel="stylesheet" href="../boilerplate.css">
    <link rel="stylesheet" href="../css-file/blog/main.css">
</head>
<body>
    <form action="../php/search.php" method="POST">
        <input type="text" name="search-box" placeholder="Search..." autocomplete="off">
        <button type="submit" name="submit-search">Search</button>
    </form>
    <div class="articles-container">
        <?php
            $sql = "SELECT * FROM article";
            $result = mysqli_query($conn, $sql);
            $queryresult = mysqli_num_rows($result);

            if ($queryresult > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<div class='articles'>
                    <h1>".$row['a_title']."</h1>
                    <p>".$row['a_content']."</p>
                    <h3>".$row['a_author']."</h3>
                    <span>".$row['a_data']."</span>
                    </div>\n";
                }
            }
        ?>
    </div>
</body>
</html>