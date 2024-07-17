<?php
if (isset($_POST['login']) && $_POST['login'] == 'true') {
    $result = $this->obj->teacherLogin($_POST['email'], $_POST['password']);

    if (isset($_SESSION["teacher"])) {
        header('location: index.php?c=teacher&f=dashbord ');
    } else {
        echo '<script>alert("Please Try Agin");</script>';
    }
}
?>
<div class="mt-5">
    <div class="row justify-content-center">
        <form class="col-sm-6" action="" method="POST">
            <input type="hidden" name="login" value="true">
            <div class="form-group">
                <label for="exampleInputEmail1">Email address</label>
                <input type="email" class="form-control" name="email" value="teacher@gmail.com" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Password</label>
                <input type="password" class="form-control" name="password" value="123456" id="exampleInputPassword1" placeholder="Password">
            </div>
            <div class="text-center">
                <button type="submit" class="btn btn-primary">Login</button>
            </div>
        </form>
    </div>
</div>