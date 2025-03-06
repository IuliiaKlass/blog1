<?php
/**
 * @var $user
 */
?>

<!doctype html>
<html lang="en" data-bs-theme="auto">
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.122.0">
    <title>Signin Template · Bootstrap v5.3</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.3/examples/sign-in/">



    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@docsearch/css@3">

    <link href="/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <meta name="theme-color" content="#712cf9">


    <!-- Custom styles for this template -->
    <link href="/css/sign-in.css" rel="stylesheet">

    <style>
        .form-signin {
            max-width: 420px;
        }
    </style>
</head>
<body class="d-flex align-items-center py-4 bg-body-tertiary">


<main class="form-signin w-100 m-auto">
    <div class="my-5">
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
        <p class="mt-5 mb-3 text-body-secondary">&copy; 2017–2024</p>
    </form>
</main>
<script src="/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>
</html>
