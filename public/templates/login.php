<?php
/**
 * @var $result
 */
include_once "templates/header.php"; // Подключаем header
?>

    <main class="form-signin w-100 m-auto py-5 my-5">
        <form class="form-horizontal" role="form" method="post" action="">
            <input type="hidden" name="act" value="login"/>
            <h1 class="h3 mb-3 fw-normal">Please sign in</h1>

            <div class="form-floating">
                <input type="text" name="email" class="form-control" value="" id="email" placeholder="name@example.com">
                <label for="floatingInput">Email address</label>
            </div>

            <div class="form-floating">
                <div class="from-control-feedback">
                <span class="text-danger align-middle">
                    <i class="fa fa-close"></i><?=$error?>
                </span>
                </div>
            </div>

            <div class="form-floating mt-3">
                <input type="password" name="password" class="form-control" value="" id="floatingPassword" placeholder="Password">
                <label for="floatingPassword">Password</label>
            </div>

            <div class="form-check text-start my-3">
                <input class="form-check-input" type="checkbox" value="remember-me" id="flexCheckDefault">
                <label class="form-check-label" for="flexCheckDefault">
                    Remember me
                </label>
            </div>
            <button class="btn btn-primary w-100 py-2" type="submit">Sign in</button>
            <p class="mt-5 mb-3 text-body-secondary">&copy; 2025</p>
        </form>
    </main>


<?php include_once "templates/footer.php"; // Подключаем header ?>
