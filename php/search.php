<?php
    include '../database/dbh.php'
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search: <?php echo $_POST['search-box'] ?></title>
    <link rel="stylesheet" href="../css-file/blog/main.css">
    <link rel="stylesheet" href="../boilerplate.css">
</head>
<body>
    <?php
        echo "Your search result: ".$_POST['search-box'];
    ?>
    <div class="articles-container">
        <?php
            if(isset($_POST["submit-search"])) {
                $search = mysqli_real_escape_string($conn, $_POST["search-box"]);
                $sql = "SELECT * FROM article WHERE a_title LIKE '%$search%' OR a_author LIKE '%$search%' OR a_data LIKE '%$search%'";
                $result = mysqli_query($conn, $sql);
                $queryresult = mysqli_num_rows($result);
                if ($queryresult > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<div class='articles'>
                        <h1>".$row['a_title']."</h1>
                        <p>".$row['a_content']."</p>
                        <h3>".$row['a_author']."</h3>
                        <span>".$row['a_data']."</span>
                        </div>";
                    }
                } else {
                    echo "<p class='no-result'>There are no results matching your search!</p>";
                }
            }
        ?>    
    </div>
</body>
</html>