<?php
require_once 'class/application.php';
$application = new Application();
$qurery_result = $application->allPublishedBlogInfo();
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="icon" href="../../favicon.ico">

        <title>Blog Management</title>
        <link href="asset/css/bootstrap.min.css" rel="stylesheet">
    </head>

    <body>

        <nav class="navbar navbar-inverse navbar-fixed-top">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#">Blog Management</a>
                </div>
                <div id="navbar" class="navbar-collapse collapse">
                    <form class="navbar-form navbar-right">
                        <div class="form-group">
                            <input type="text" placeholder="Email" class="form-control">
                        </div>
                        <div class="form-group">
                            <input type="password" placeholder="Password" class="form-control">
                        </div>
                        <button type="submit" class="btn btn-success">Sign in</button>
                    </form>
                </div><!--/.navbar-collapse -->
            </div>
        </nav>

        <!-- Main jumbotron for a primary marketing message or call to action -->
        <div class="jumbotron">
            <div class="container">
                <marquee><h1 style="color:hsl(0,100%,50%); font-weight: bold;">Kilgore News Herald - COVID-19 Local News Fund Thanks for keeping journalism alive and thriving in Kilgore.But the necessary work of producing good journalism must go on.</h1></marquee>
                <marquee style="font-weight: bold;"><p>Here we published all newspaper current news and others news. we also published international news.But the necessary work of producing good journalism must go on</p></marquee>

            </div>
        </div>

        <div class="container">
            <!-- Example row of columns -->
            <div class="row">
                <?php while ($blog_info = mysqli_fetch_assoc($qurery_result)) { ?> 
                    <div class="col-md-4">
                        <h2 style="text-align: center;  font-weight: bold;"><?php echo $blog_info['blog_title']; ?> <small> - <?php echo $blog_info['author_name']; ?></small></h2>
                        <img src="admin/<?php echo $blog_info['blog_image']; ?>" alt="" style="height: 150px; width: 250px; margin-left: 
                             15%; margin-bottom: 5%" class="img-thumbnail" />
                        <p style="text-align: center;"><?php echo mb_substr($blog_info['blog_description'], 0, 160) ?></p>
                        <p><a class="btn btn-primary "style="margin-left:30% " href="blog_details.php?id=<?php echo $blog_info['blog_id']; ?>&&title=<?php echo $blog_info['blog_title']; ?>" role="button">View blog details &raquo;</a></p>
                    </div> 
                <?php } ?>
            </div>
            <hr>
            <footer>
                <p>&copy; 2016 Company, Inc.</p>
            </footer>
        </div> <!-- /container -->


        <!-- Bootstrap core JavaScript
        ================================================== -->
        <!-- Placed at the end of the document so the pages load faster -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
        <script src="../../dist/js/bootstrap.min.js"></script>
        <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
        <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
    </body>
</html>
