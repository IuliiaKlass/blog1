<?php include_once "templates/header.php"; ?> <!-- Подключаем header   -->

<main>

    <div class="album py-5 bg-light">
        <div class="container">

            <?php include_once "templates/menu.php"; ?> <!-- Подключаем меню   -->

            <table class="table">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Img</th>
                    <th scope="col">Title</th>
                    <th scope="col">Created At</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                <?php while($row = $stmt->fetch()) :?>
                <tr>
                    <th scope="row"><?=$row['id']?></th>
                    <td><img src="/images/<?=$row['img']?>" alt=""></td>
                    <td><?=$row['title']?></td>
                    <td><?=$row['createdAt']?></td>
                    <td><a class="btn btn-primary" href="/?act=edit&id=<?=$row['id']?>" role="button">Edit</a>
                        <a class="btn btn-danger" href="/?act=delete&id=<?=$row['id']?>" role="button">Delete</a></td>
                </tr>
                <?php endwhile; ?>
                <?php if ($stmt->rowCount() === 0) : ?>
                    <tr>
                        <td colspan="4">Not found</td> <!-- если нет статей выводить данный текст -->
                    </tr>
                <?php endif; ?>
                </tbody>
            </table>

        </div>
    </div>

</main>

<?php include_once "templates/footer.php"; ?> <!-- Подключаем footer   -->