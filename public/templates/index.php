<?php
/**
 * @var $result
 */
include_once "templates/header.php"; // Подключаем header
?>

<main>

    <div class="album py-5 bg-light">
        <div class="container">

            <a class="btn btn-success" href="/?act=login" role="button">Login</a>
            <a class="btn btn-primary" href="/?act=register" role="button">Register</a>
            <a class="btn btn-dark" href="#" role="button">All blogs</a>


            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3 mt-3">
                <?php while($row = $result->fetch_assoc()) :?>
                <div class="col">
                    <div class="card shadow-sm">
<!--                        <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"/><text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text></svg>-->

                        <img class="card-img-top" src="/images/<?=$row['img']?>" alt="">

                        <div class="card-body">
                            <p class="card-text"><?=htmlspecialchars($row['title'])?></p>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="btn-group">
                                    <a href="/?act=view&id=<?=$row['id']?>"><button type="button" class="btn btn-sm btn-outline-secondary">View</button></a>
                                    <?php if($user && $row['userId'] == $user['id']): ?>
                                        <a href="/?act=edit&id=<?=$row['id']?>"><button type="button" class="btn btn-sm btn-outline-secondary">Edit</button></a>
                                    <?php endif ?>
                                </div>
                                <small class="text-muted">9 mins</small>
                            </div>
                        </div>
                    </div>
                </div>
                <?php endwhile; ?>
            </div>
        </div>
    </div>

</main>

<?php include_once "templates/footer.php"; ?> <!-- Подключаем footer   -->


<!--<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab, aliquam, aspernatur autem delectus deserunt dolor doloremque exercitationem facilis impedit ipsum, iure laudantium libero maxime mollitia nam obcaecati quia quo recusandae sed sit sunt tempora tenetur ullam unde voluptates! Corporis dolor impedit laudantium maiores, quidem recusandae rem ullam unde! Cupiditate, possimus.</p>-->