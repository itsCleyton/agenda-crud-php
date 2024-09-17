<?php
require_once '../../../config.php';
require_once '../../actions/user.php';
require_once '../partials/header.php';

if (isset($_POST["id"], $_POST["name"], $_POST["email"], $_POST["phone"]))
    updateUserAction($conn, $_POST["id"], $_POST["name"], $_POST["email"], $_POST["phone"]);

$user = findUserAction ($conn, $_GET["id"]);

?>

<div class="container">
    <div class="row">
        <a href="../../../index.php">Users - Edit</a>
        <a class="btn btn-success text-white" href="../../../index.php">Prev</a>
    </div>
    <div class="row flex-center">
        <div class="form-div">
            <form class="form" action="../../pages/user/edit.php" method="POST">
                <input type="hidden" name="id" value="<?=$user['id']?>">
                <label for="name">Name</label>
                <input type="text" name="name" id="name" value="<?=$user['name']?>" required>
                <label for="email">Email</label>
                <input type="email" name="email" id="email" value="<?=$user['email']?>" required>
                <label for="phone">Phone</label>
                <input type="text" name="phone" id="phone" value="<?=$user['phone']?>" required>

                <button type="submit" class="btn btn-success text-white">Save</button>
            </form>
        </div>
    </div>
</div>
<?php require_once '../partials/footer.php' ?>