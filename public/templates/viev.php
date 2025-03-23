<?php
/**
 * @var $article
 */
include_once "templates/header.php"; // Подключаем header
?>

<body class="align-items-center py-4">

<div class="container">
    <main class="w-100 m-auto">
        <div class="my-5">
            <?php include_once "templates/menu.php"; ?> <!-- Подключаем меню   -->
        </div>
        <div class="d-flex flex-row mb-3">
            <div class="me-5"><img src="/images/<?=$article['img']?>" alt=""></div>
            <div class="ms-5">
                <h3><?=$article['title']?></h3>
                <p><?=$article['content']?></p>
            </div>
        </div>
    </main>
</div>

</body>
<?php include_once "templates/footer.php"; ?> <!-- Подключаем footer   -->
