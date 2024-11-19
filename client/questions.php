<div class="container">
    <div class="row">
        <div class="col-8">
            <h1 class="heading">Questions</h1>
            <?php 
            include("./common/db.php");
            if(isset($_GET['c_id'])){
                $query = "select * from questions where category_id=$c_id";
            }
            elseif(isset($_GET['u_id'])) {
                $query = "select * from questions where user_id=$u_id";
            }
            elseif(isset($_GET['latest'])) {
                $query = "select * from questions order by id desc";
            }
            elseif(isset($_GET['search'])) {
                $query = "select * from questions where `title` Like '%$search%'";
            }
            else {
                $query = "select * from questions";
            }
            $result = $conn->query($query);
            foreach($result as $row) {
                $title = $row['title'];
                $id = $row['id'];
                echo "<div class='row question-list'><h5 class='my-question'><a href='?q-id=$id'>$title</a>";
                echo isset($_GET['u_id'])?"<a href='./server/request.php?delete=$id'>Delete</a>":NULL;
                echo "</h5></div>";
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