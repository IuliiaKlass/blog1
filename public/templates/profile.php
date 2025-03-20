<?php
/**
 * @var $result
 */
include_once "templates/header.php"; // Подключаем header
?>

<main class="form-signin w-100 m-auto">
    <div class="my-5">
        <?php include_once "templates/menu.php"; ?> <!-- Подключаем меню   -->
    </div>
    <form class="form-horizontal" role="form" method="POST" action="">
        <input type="hidden" name="act" value="profile"/>
        <h1 class="h3 mb-3 fw-normal">Profile</h1>

        <div class="form-floating mt-3">
            <input type="text" name="name" class="form-control" id="name" placeholder="Name" value="<?=$user['name']?>">
            <label for="floatingInput">Name</label>
        </div>
        <div class="form-floating mt-3">
            <input type="text" name="surname" class="form-control" id="surname" placeholder="Surname" value="<?=$user['surname']?>">
            <label for="floatingInput">Surname</label>
        </div>
        <div class="form-floating mt-3">
            <input type="text" name="phone" class="form-control" id="phone" placeholder="Phone" value="<?=$user['phone']?>">
            <label for="floatingInput">Phone</label>
        </div>
        <div class="from-floating mt-3">
            <textarea class="form-textarea w-100 form-control" name="about" placeholder="About" cols="0" rows="3"><?=$user['about']?></textarea>
        </div>


        <button class="btn btn-primary w-100 py-2 mt-3" type="submit">Save</button>
        <p class="mt-5 mb-3 text-body-secondary">&copy; 2025</p>
    </form>
</main>
<?php include_once "templates/footer.php"; ?> <!-- Подключаем footer   -->
