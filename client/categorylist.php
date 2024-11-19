<div>
    <h1 class="heading">Categories</h1>
    <?php
        include("./common/db.php");

        $query = "select * from category";
        $result = $conn->query($query);
        foreach($result as $row) {
            $category = ucfirst($row['category']);
            $id = $row['id'];
            echo "<div class='row question-list'><h5><a href='?c_id=$id'>$category</a></h5></div>";
        }
    ?>
</div>