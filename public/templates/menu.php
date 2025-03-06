<?php if (isset($user) && $user) : ?>
<a class="btn btn-primary" href="/?act=articles" role="button">Articles</a>
<a class="btn btn-success" href="/?act=add" role="button">Add new article</a>
<a class="btn btn-secondary" href="/?act=profile" role="button">Profile</a>
<a class="btn btn-dark" href="/?act=logout" role="button">Logout</a>
<?php endif ?>