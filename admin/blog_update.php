
<?php
session_start();
$blog_id = $_GET['id'];
require_once '../class/blog.php';
$blog = new Blog();
$query_result = $blog->select_blog_info_by_id($blog_id);
$blog_info = mysqli_fetch_assoc($query_result);

if (isset($_POST['btn'])) {
    $blog->update_blog_info($_POST);
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Edit Blog</title>
        <link href="../asset/css/bootstrap.min.css" rel="stylesheet">
    </head>
    <body>

        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#">Blog Management System</a>
                </div>
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav">
                        <li class="active"><a href="dashbord.php">Add Blog</a></li>
                        <li><a href="blog_read.php">Manage Blog</a></li>
                    </ul>
                </div><!-- /.navbar-collapse -->
            </div><!-- /.container-fluid -->
        </nav>

        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h3 style="text-align: center"></h3>
                    <hr/>
                    <div class="well">
                        <form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-2 control-label">Blog Title</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" value="<?php echo $blog_info['blog_title']; ?>" name="blog_title">
                                    <input type="hidden" class="form-control" value="<?php echo $blog_info['blog_id']; ?>" name="blog_id">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputPassword3" class="col-sm-2 control-label">Author Name</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" value="<?php echo $blog_info['author_name']; ?>" name="author_name">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputPassword3" class="col-sm-2 control-label">Blog Description</label>
                                <div class="col-sm-10">
                                    <textarea name="blog_description" name="blog_description" class="form-control" rows="8"><?php echo $blog_info['blog_description']; ?></textarea>
                                </div>
                            </div>
                             <div class="form-group">
                                <label for="inputPassword3" class="col-sm-2 control-label">Blog Image</label>
                                <div class="col-sm-10">
                                    <input type="file" name="blog_image" accept="image/*"/>
                                    <img src="<?php echo $blog_info['blog_image']; ?>" alt="" height="100" width="100"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputPassword3" class="col-sm-2 control-label">Publication Status</label>
                                <div class="col-sm-10">
                                    <select class="form-control" name="publication_status">
                                        <option>Select Publication Status</option>
                                        <option value="1">Published</option>
                                        <option value="0">Unpublished</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-10">
                                    <button type="submit" name="btn" class="btn btn-success btn-block btn-lg">Update Customer Information</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>


        <script src="js/jquery-3.1.1.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
    </body>
</html>
