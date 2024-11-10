<div class="container">
    <h2 class="heading">Sign Up</h2>
<form action="./server/request.php" method = "post">
    <div class="col-6 offset-sm-3 margin-bottom-15">
        <label for="username" class="form-label">Username</label>
        <input type="text" name="username" class="form-control" id="username" placeholder="Enter Your Username...">
    </div>
    <div class="col-6 offset-sm-3 margin-bottom-15">
        <label for="email" class="form-label">Email</label>
        <input type="email" name="email" class="form-control" id="email" placeholder="Enter Your Email...">
    </div>
    <div class="col-6 offset-sm-3 margin-bottom-15">
        <label for="password" class="form-label">Password</label>
        <input type="password" name="password" class="form-control" id="password" placeholder="Enter Your password...">
    </div>
    <div class="col-6 offset-sm-3 margin-bottom-15">
        <label for="address" class="form-label">Address</label>
        <input type="text" name="address" class="form-control" id="address" placeholder="Enter Your Address...">
    </div>
    <div class="col-6 offset-sm-3 margin-bottom-15">
        <button type="submit" name="signup" class="btn btn-primary">Sign Up</button>
    </div>
</form>
</div>