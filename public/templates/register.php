<?php
/**
 * @var $result
 */
include_once "templates/header.php"; // Подключаем header
?>

<main class="form-signin w-100 m-auto py-5 my-5">
    <form class="form-horizontal" role="form" method="post" action="">
        <input type="hidden" name="act" value="register"/>
        <h1 class="h3 mb-3 fw-normal">Please register</h1>

        <div class="form-floating">
            <input type="text" name="email" class="form-control" id="email" placeholder="name@example.com">
            <label for="floatingInput">Email address</label>
        </div>
        <div class="form-floating mt-3">
            <input type="password" name="password" class="form-control" id="floatingPassword" placeholder="Password">
            <label for="floatingPassword">Password</label>
        </div>
        <div class="form-floating">
            <input type="password" name="password2" class="form-control" id="floatingPassword" placeholder="Password repeat">
            <label for="floatingPassword">Password repeat</label>
        </div>

        <div class="form-check text-start my-3">
            <input class="form-check-input" type="checkbox" value="remember-me" id="flexCheckDefault">
            <label class="form-check-label" for="flexCheckDefault">
                Remember me
            </label>
        </div>
        <button class="btn btn-primary w-100 py-2" type="submit">Register</button>
        <p class="mt-5 mb-3 text-body-secondary">&copy; 2017–2024</p>
    </form>
</main>

<?php include_once "templates/footer.php"; ?> <!-- Подключаем footer   -->