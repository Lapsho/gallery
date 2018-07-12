<!DOCTYPE html>
<html>
<head>
    <title><?php echo $getCollection::PAGE_TITLE ?></title>
    <?php include Commons::CSS_PATH ?>
    <?php include Commons::FANCYBOX_PATH ?>
    <?php include Commons::BOOTSTRAP_JS ?>
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

        <div class="btn-head-group">
            <?php if ($collectErrors->isLoggedIn()): ?>
                <button type="button" class="btn btn-info btn-head" onclick="location.href='form'">
                    Upload image
                </button>
            <?php endif; ?>
            <form action="switchCollections" method="get" class="btn-group btn-head">
                <button type="submit" class="btn btn-info" name="display" value="all">Display all images</button>
                <?php if ($collectErrors->isLoggedIn()): ?>
                    <button type="submit" class="btn btn-info" name="display" value="own">
                        Display own images
                    </button>
                <?php endif; ?>
                <button id="btnGroupDrop1" type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                    By category
                </button>
                <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                    <?php foreach (Commons::CATEGORY_LIST as $category): ?>
                        <button type="submit" class="btn dropdown-item" name="display" value=<?php echo $category ?>>
                            <?php echo $category ?>
                        </button>
                    <?php endforeach; ?>
                </div>
            </form>
        </div>
    </div>
    <?php if ($messages = $collectErrors->getMessages()): ?>
        <div class="alert alert-warning">
            <?php echo $messages ?>
        </div>
    <?php endif; ?>
    <div class="contain">
        <?php if (!empty($images = $getCollection->switchCollections($connectDB))): ?>
            <?php foreach ($images as $image): ?>
                <div class="image-container">
                    <div class="img-thumbnail">
                        <a data-fancybox='images' href="<?php echo $image['image_path']; ?>">
                            <img src="<?php echo $image['thumbnail_path']; ?>"/>
                        </a>
                        <p>
                            <?php if ($image['author_name'] != ''): ?>
                                Author: <i><?php echo $image['author_name'] ?>,</i></br>
                            <?php endif ?>
                            Description: <i><?php echo $image['description'] ?>,</i></br>
                            Category: <i><?php echo $image['category'] ?></i></br>
                            Owner: <i><?php echo $image['login'] ?></i></br>
                            Created at: <i><?php echo $image['created_at'] ?></i></br>
                        </p>
                        <?php if ((isset($_SESSION['auth']) == $image['user_id']) or (isset($_SESSION['access']) == 'admin')): ?>
                            <button type="button" class="btn btn-warning btn-block"
                                    onclick="if (confirm('Are you sure?'))
                                            {location.href = '/removeImage?id=<?php echo $image['id'] ?>';}">
                                Delete
                            </button>
                        <?php endif; ?>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            </br>
            <div class="image-center">
                <img src="<?php echo Collection::NO_IMAGES; ?>"/>
                <?php if (in_array($_SESSION['switch_collections'], Commons::CATEGORY_LIST)): ?>
                    <h3 class="font-title">
                        <i>In the category "<?php echo $_SESSION['switch_collections'] ?>" there are no images yet</i>
                    </h3>
                <?php else: ?>
                    <h3 class="font-title"><i>To get something, you have to put something</i></h3>
                <?php endif; ?>
            </div>
        <?php endif; ?>
    </div>
    <div class="position-bottom">
        <nav>
            <ul class="pagination justify-content-center">
                <?php echo $pagination->renderPagination($connectDB) ?>
            </ul>
        </nav>
    </div>
</div>
</div>
</body>
</html>

