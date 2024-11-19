<div class="container">
    <h1 class="heading">Question</h1>
    <div class="row">
        <div class="col-8">
            <?php 
            include("./common/db.php");
            $query = "select * from questions where id=$qid";
            $result = $conn->query($query);
            $row = $result->fetch_assoc();
            $cid = $row['category_id'];
            // print_r($row);
            echo "<h4 class='margin-bottom-15'> Question: ".$row["title"]."</h4>
            <p class='margin-bottom-15' style='font-size:20px;'> Description: " .$row["description"]. "</p>";
            include("answers.php");
            ?>
            <form action="./server/request.php" method="post">
                <input type="hidden" value="<?php echo $qid;?>" name="question_id">
                <textarea class="form-control margin-bottom-15" rows="5" name="answer" placeholder="Your answer..."></textarea>
                <button class="btn btn-primary margin-bottom-15">Write Your Answer</button>
            </form>
        </div>
        <div class="col-4">
            <!-- <h2 style="text-align:center;">Coding</h2> -->
            <?php
            // echo $cid;
            $categoryquery = "select category from category where id=$cid";
            $categoryresult = $conn->query($categoryquery);
            $categoryrow = $categoryresult->fetch_assoc();
            echo "<h1>".$categoryrow['category']."</h1>";

            $query = "select * from questions where category_id=$cid and id!=$qid";
            $result = $conn->query($query);
            foreach($result as $row) {
                $id = $row['id'];
                $title = $row["title"];
                echo "<div class='question-list'>
                <h4>
                <a href='?q-id=$id'>$title</a>
                </h4>
                </div>";
            }
            ?>
        </div>
    </div>
</div>