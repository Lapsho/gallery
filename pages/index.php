<!DOCTYPE html>
<html>
<head>
    <title><?php echo $getCollection::PAGE_TITLE ?></title>
    <?php include Commons::CSS_PATH ?>
    <?php include Commons::FANCYBOX_PATH ?>
</head>

<body>
<div class="general">
    <div class="head">
        <ul class="nav justify-content-end">
            <?php if ($collectErrors->isLoggedIn()): ?>
                <li class="nav-item">
                    <a class="nav-link" href="/logout">Log out</a>
                </li>
            <?php else: ?>
                <li class="nav-item">
                    <a class="nav-link" href="/login">Login</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/register">Registration</a>
                </li>
            <?php endif; ?>
        </ul>
        <h1 class="h1 text-center font-title"><?php echo $getCollection::PAGE_TITLE ?></h1>
        <?php if ($collectErrors->isLoggedIn()): ?>
        <div class="btn-head-group">
            <button type="button" class="btn btn-info btn-head" onclick="location.href='form'">Upload image</button>
            <form action="switchCollections" method="get" class="btn-group btn-head">
                <button type="submit" class="btn btn-info" name="display" value="all">Display all images</button>
                <button type="submit" class="btn btn-info" name="display" value="own">Display own images</button>
            </form>
        </div>
        <?php else: echo "</br>"; ?>
        <?php endif; ?>
    </div>
    <?php if ($messages = $collectErrors->getMessages()): ?>
        <div class="alert alert-warning">
            <?php echo $messages ?>
        </div>
    <?php endif; ?>
    <div class="contain">
        <?php if (!empty($images = $getCollection->switchCollections())): ?>
            <?php foreach ($images as $image): ?>
                <div class="image-container">
                    <div class="img-thumbnail">
                        <a data-fancybox='images' href="<?php echo $image['image_path']; ?>">
                            <img src="<?php echo $image['thumbnail_path']; ?>" />
                        </a>
                        <p>
                            Author: <i><?php echo $image['author_name'] ?>,</i></br>
                            Description: <i><?php echo $image['description'] ?>,</i></br>
                            Owner: <i><?php echo $image['login'] ?></i></br>
                            Created at: <i><?php echo $image['created_at'] ?></i></br>
                        </p>
                        <?php if (($_SESSION['auth'] === $image['user_id']) or ($_SESSION['access'] === 'admin')): ?>
                            <button type="button" class="btn btn-warning btn-block"
                                    onclick="if (confirm('Are you sure?'))
                                    {
                                        location.href = '/removeImage?id=<?php echo $image['id'] ?>';
                                    }">
                                Delete
                            </button>
                        <?php endif; ?>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            </br>
            <div class="image-center">
                <img src="<?php echo Collection::NO_IMAGES; ?>" />
                <p><i>...no pictures also</i></p>
            </div>
        <?php endif; ?>
    </div>
    <div class="position-bottom">
        <nav>
            <ul class="pagination justify-content-center">
                <?php echo $pagination->renderPagination() ?>
            </ul>
        </nav>
    </div>
    </div>
</div>
</body>
</html>

