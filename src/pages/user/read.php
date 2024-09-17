<?php
require_once '../../../config.php';
require_once '../../actions/user.php';
require_once '../../../src/modules/messages.php';
require_once '../partials/header.php';
use Src\Database\Pagination;

$users = readUserAction($conn);
$pagina = 1;

if(isset($_GET['pagina']))
    $pagina = filter_input(INPUT_GET, "pagina", FILTER_VALIDATE_INT);

if(!$pagina)
    $pagina = 1;
?>

<div class="container">
    <div class="row">
        <a href="../../../"><h1>Users - Read</h1></a>
        <a class="btn btn-primary" href="./create.php">New</a>
    </div>
    <div class="row flex-center">
        <?php if(isset($_GET['message'])) echo(printMessage($_GET['message'])); ?>
    </div>

    <table class="table table-striped">
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th></th>
            <th></th>
        </tr>
        <?php foreach($users as $user): ?>
            <tr>

                <td class="user-name"><?=htmlspecialchars($user['name'])?></td>
                <td class="user-email"><?=htmlspecialchars($user['email'])?></td>
                <td class="user-phone"><?=htmlspecialchars($user['phone'])?></td>
                <td>
                    <a class="btn btn-primary text-white" href="./edit.php?id=<?=$user['id']?>">Edit</a>
                </td>
                <td>
                    <a class="btn btn-danger text=white" href="./delete.php?id=<?=$user['id']?>">Delete</a>
                </td>
            </tr>
            <?php endforeach; ?>
    </table>
</div>
<?php
$qtdNomes = new Pagination($conn);
?>
<div class="row flex-center">
    <a href="?pagina=1"> Primeira </a>
    <a href="?pagina=<?=$pagina-1?>"> < < </a>
    <a href="?pagina=<?=$pagina+1?>"> > > </a>
    <a href=""> Última </a>
</div>
<?php require_once '../partials/footer.php'; ?> 