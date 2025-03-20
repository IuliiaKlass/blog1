<?php
/**
 * @var $result
 */
include_once "templates/header.php"; // Подключаем header
?>

<main class="form-signin w-100 m-auto py-5 my-5">
    <div class="my-5 pt-5">
        <?php include_once "templates/menu.php"; ?> <!-- Подключаем меню   -->
    </div>


    <form class="form-horizontal" role="form" method="POST" enctype="multipart/form-data"  action="">
        <input type="hidden" name="act" value="add"/>
        <h1 class="h3 mb-3 fw-normal">Add new article</h1>
        <span class="text-danger align-middle">
            <i class="fa fa-close"></i> <?=$error?>
        </span>
        <div class="form-floating">
            <input type="text" name="title" class="form-control" id="name" placeholder="Title">
            <label for="floatingInput"></label>
        </div>

        <div class="from-floating">
            <textarea class="form-textarea form-control my-2" name="content" placeholder="Text" cols="27" rows="4"></textarea>
        </div>

        <div class="from-floating">
            <label for="file"></label>
            <input type="file" class="form-control mb-3" id="file" name="file">
        </div>
        <button class="btn btn-primary w-100 py-2" type="submit">Add new article</button>
        <p class="mt-5 mb-3 text-body-secondary">&copy; 2025</p>
    </form>
</main>

<?php include_once "templates/footer.php"; ?> <!-- Подключаем footer   -->