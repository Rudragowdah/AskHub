<div class="container">
    <h2 class="heading">Ask A Question</h2>
<form action="./server/request.php" method="post">
    <div class="col-6 offset-sm-3 margin-bottom-15">
        <label for="title" class="form-label">Title</label>
        <input type="text" name="title" class="form-control" id="title" placeholder="Enter Title...">
    </div>
    <div class="col-6 offset-sm-3 margin-bottom-15">
        <label for="desc" class="form-label">Description</label>
        <textarea name="desc" rows="4" class="form-control" id="desc" placeholder="Enter Description..."></textarea>
    </div>
    <div class="col-6 offset-sm-3 margin-bottom-15">
        <label for="category" class="form-label">Category</label>
        <?php
            include("category.php");
        ?>
    </div>
    <div class="col-6 offset-sm-3 margin-bottom-15">
        <button type="submit" name="ask" class="btn btn-primary">Ask Question</button>
    </div>
</form>
</div>