<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>simple form</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <form action="index.php" method="post">
    
        <label for="">Title</label><br>
        <input type="text" name="post_title" id="title" /><br><br>
        
        <label for="">Author</label><br>
        <input type="text" name="post_author" id="author" /><br><br>
        
        <label for="">Excerpt</label><br>
        <textarea name="post_excerpt" id="title" cols="30" rows="10"></textarea><br><br>
        
        <label for="">Content</label><br>
        <textarea name="post_content" id="title" cols="30" rows="10"></textarea><br><br>
        
        
        <button type="submit" name="submit" id="submit" > Submit </button>
    </form>

    <table>
        <tr>
            <th>id</th>
            <th>title</th>
            <th>author</th>
            <th>excerpt</th>
            <th>content</th>
        </tr>
    <?php 
        $serverName = "localhost";
        $dbName = "blog_v2";
        $userName = "root";
        $password = "";

        //create connection
        $conn = mysqli_connect($serverName, $userName, $password, $dbName);

        //check connection
        if(!$conn){
            die("Connection failed: " . mysqli_connect_error());
        }
       // echo "Connected successfully!";

        $title = $_POST['post_title']; 
        $author = $_POST['post_author']; 
        $excerpt = $_POST['post_excerpt']; 
        $content = $_POST['post_content']; 

        $sql = "INSERT INTO posts (post_title, post_author, post_excerpt, post_content) VALUES ('$title', '$author', '$excerpt', '$content')";

        if (mysqli_query($conn, $sql)) {
        //    echo "New record created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn); 
        }

        //print data from posts table
        $sql_data = "SELECT post_id, post_title, post_author, post_excerpt, post_content from posts";
        $result = $conn-> query($sql_data);

        if ($result-> num_rows > 0) {
            while ($row = $result-> fetch_assoc()) {
                echo "<tr><td>" . $row["post_id"] . "</td><td>" . $row["post_title"] . "</td><td>" . $row["post_author"] . "</td><td>" . $row["post_excerpt"] . "</td><td>" . $row["post_content"] . "</td></tr>"; 
            } 
        }

        mysqli_close($conn);
    ?>
    </table>
</body>
</html>
