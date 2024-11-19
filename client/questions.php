<div class="container">
    <div class="row">
        <div class="col-8">
            <h1 class="heading">Questions</h1>
            <?php 
            include("./common/db.php");
            if(isset($_GET['c_id'])){
                $query = "select * from questions where category_id=$c_id";
            }else {
                $query = "select * from questions";
            }
            $result = $conn->query($query);
            foreach($result as $row) {
                $title = $row['title'];
                $id = $row['id'];
                echo "<div class='row question-list'><h5><a href='?q-id=$id'>$title</a></h5></div>";
            }
            ?>
        </div>
        <div class="col-4">
            <?php
                include("categorylist.php");
            ?>
        </div>
    </div>
</div>