<!DOCTYPE html>
<html>
    <head>
        <title>Form</title>
        <?php include Commons::CSS_PATH ?>
    </head>
    <body>
        <div class="general">
            <div class="container">
                <h1 class="h1 text-center">Upload New Image</h1>
                <?php if ($errors = $collectErrors->getErrors()): ?>
                <div class="alert alert-danger">
                    <strong>Error:&nbsp;</strong><?php echo $errors ?>
                </div>
                <?php endif; ?>
                <form action="/submit" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="authorname">Author Name</label>
                        <input type="text" class="form-control" id="authorname" name="authorname" value="<?php echo $collectErrors->getFieldValue('authorname') ?>">
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea class="form-control" id="description" name="description" rows="3"><?php echo $collectErrors->getFieldValue('description') ?></textarea>
                    </div>
                    <div class="form-group">
                        <label for="inputState">Category</label>
                        <select id="inputState" class="form-control" name="category">
                            <option value="Another">Another</option>
                            <option value="Art">Art</option>
                            <option value="Buildings">Buildings</option>
                            <option value="Macro">Macro</option>
                            <option value="Interior">Interior</option>
                            <option value="Wall">Wall</option>
                            <option value="Paisajes">Paisajes</option>
                            <option value="People">People</option>
                            <option value="Machinery">Machinery</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="image">Select Image</label>
                        <input type="file" class="form-control-file" id="image" name="image">
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-10">
                            <a class="btn btn-dark" href="/">Back to Gallery</a>
                            <button type="submit" class="btn btn-success">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </body>
</html>