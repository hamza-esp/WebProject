<?php 
  session_start();
  if(empty($_SESSION['user']))
{

    header('Location: index.php');
}
?>
<!doctype html>
<html class="no-js" lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Blog || Asbab - eCommerce HTML5 Template</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <!-- Place favicon.ico in the root directory -->
    <link rel="shortcut icon" type="image/x-icon" href="images/favicon.ico">
    <link rel="apple-touch-icon" href="apple-touch-icon.png">
    

    <!-- All css files are included here. -->
    <!-- Bootstrap fremwork main css -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- Owl Carousel min css -->
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <!-- This core.css file contents all plugings css file. -->
    <link rel="stylesheet" href="css/core.css">
    <!-- Theme shortcodes/elements style -->
    <link rel="stylesheet" href="css/shortcode/shortcodes.css">
    <!-- Theme main style -->
    <link rel="stylesheet" href="style.css">
    <!-- Responsive css -->
    <link rel="stylesheet" href="css/responsive.css">
    <!-- User style -->
    <link rel="stylesheet" href="css/custom.css">


    <!-- Modernizr JS -->
    <script src="js/vendor/modernizr-3.5.0.min.js"></script>
</head>

<body>
    <!--[if lt IE 8]>
        <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
    <![endif]-->  

    <!-- Body main wrapper start -->
    <div class="wrapper">
        <?php  
        ob_start();
        require('menu.php');     
        ?>
        <!-- End Offset Wrapper -->
        <!-- Start Bradcaump area -->
        <div class="ht__bradcaump__area" style="background: rgba(0, 0, 0, 0) url(images/bg/4.jpg) no-repeat scroll center center / cover ;">
            <div class="ht__bradcaump__wrap">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="bradcaump__inner">
                                <nav class="bradcaump-inner">
                                  <a class="breadcrumb-item" href="index.html">Home</a>
                                  <span class="brd-separetor"><i class="zmdi zmdi-chevron-right"></i></span>
                                  <span class="breadcrumb-item active">Blog</span>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Bradcaump area -->
        <!-- Start Blog Area -->
        <section class="htc__blog__area bg__white ptb--100">
            <div class="container">
                <div class="row">
                    <div class="ht__blog__wrap blog--page clearfix">
                    <input type="text" id="searchInput" placeholder="Search articles...">
                    <button id="sortOldest">Sort by Oldest</button>
<button id="sortNewest">Sort by Newest</button>
<div class="row" id="articleList">     
                    <?php 
   include_once '../controller/articleC/ArticleC.php';
                  $ArticleC = new ArticleC();
                  $listeTD=$ArticleC->listArticles("client");
                  foreach ($listeTD as $value):


?>                        <div class="col-md-6 col-lg-4 col-sm-12 col-xs-12">
                            <div class="blog">
                                <div class="blog__details">
                                    <div class="bl__date">
                                        <span><?php echo  $value['created_at'] ?> </span>
                                    </div>
                                    <h2><a href="article-details.php?id=<?php echo  $value['id'] ?>"><?php echo  $value['title'] ?> </a></h2>
                                    <p><?php echo  $value['subject'] ?> .</p>
                                    <div class="blog__btn">
                                        <a href="article-details.php?id=<?php echo  $value['id'] ?>">Read More</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php   endforeach;?>
                        </div>
                    </div>
                </div>

            </div>
        </section>
        <!-- End Blog Area -->
        <!-- Start Banner Area -->
        <div class="htc__banner__area">
            <ul class="banner__list owl-carousel owl-theme clearfix">
                <li><a href="product-details.html"><img src="images/banner/bn-3/1.jpg" alt="banner images"></a></li>
                <li><a href="product-details.html"><img src="images/banner/bn-3/2.jpg" alt="banner images"></a></li>
                <li><a href="product-details.html"><img src="images/banner/bn-3/3.jpg" alt="banner images"></a></li>
                <li><a href="product-details.html"><img src="images/banner/bn-3/4.jpg" alt="banner images"></a></li>
                <li><a href="product-details.html"><img src="images/banner/bn-3/5.jpg" alt="banner images"></a></li>
                <li><a href="product-details.html"><img src="images/banner/bn-3/6.jpg" alt="banner images"></a></li>
                <li><a href="product-details.html"><img src="images/banner/bn-3/1.jpg" alt="banner images"></a></li>
                <li><a href="product-details.html"><img src="images/banner/bn-3/2.jpg" alt="banner images"></a></li>
            </ul>
        </div>
        <!-- End Banner Area -->
        <!-- End Banner Area -->
        <!-- Start Footer Area -->
        <?php  
        require('footer.php');     
        ?>
        <!-- End Footer Style -->
    </div>
    <!-- Body main wrapper end -->

    <!-- Placed js at the end of the document so the pages load faster -->

    <!-- jquery latest version -->
    <script src="js/vendor/jquery-3.2.1.min.js"></script>
    <!-- Bootstrap framework js -->
    <script src="js/bootstrap.min.js"></script>
    <!-- All js plugins included in this file. -->
    <script src="js/plugins.js"></script>
    <script src="js/slick.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <!-- Waypoints.min.js. -->
    <script src="js/waypoints.min.js"></script>
    <!-- Main js file that contents all jQuery plugins activation. -->
    <script src="js/main.js"></script>
    <script>
document.addEventListener("DOMContentLoaded", function () {
    const searchInput = document.getElementById("searchInput");
    const articleList = document.getElementById("articleList");

    // Function to filter articles based on the search query
    function searchArticles() {
        const searchQuery = searchInput.value.toLowerCase();
        const articles = articleList.getElementsByClassName("blog");

        for (const article of articles) {
            const title = article.querySelector("h2 a").textContent.toLowerCase();
            const subject = article.querySelector(".blog__details p").textContent.toLowerCase();

            // Check if the article's title or subject contains the search query
            if (title.includes(searchQuery) || subject.includes(searchQuery)) {
                article.style.display = "block"; // Show the article
            } else {
                article.style.display = "none"; // Hide the article
            }
        }
    }

    // Attach an event listener to the search input
    searchInput.addEventListener("input", searchArticles);
});
</script>
<script>
document.addEventListener("DOMContentLoaded", function () {
    const articleList = document.getElementById("articleList");
    const articles = Array.from(articleList.getElementsByClassName("blog"));

    // Function to sort articles by oldest date
    function sortOldest() {
        articles.sort((a, b) => {
            const dateA = new Date(a.querySelector(".bl__date span").textContent);
            const dateB = new Date(b.querySelector(".bl__date span").textContent);
            return dateA - dateB;
        });

        updateArticleOrder();
    }

    // Function to sort articles by newest date
    function sortNewest() {
        articles.sort((a, b) => {
            const dateA = new Date(a.querySelector(".bl__date span").textContent);
            const dateB = new Date(b.querySelector(".bl__date span").textContent);
            return dateB - dateA;
        });

        updateArticleOrder();
    }

    // Function to update the DOM with the sorted articles
    function updateArticleOrder() {
        for (const article of articles) {
            articleList.appendChild(article);
        }
    }

    // Attach event listeners to sorting buttons
    document.getElementById("sortOldest").addEventListener("click", sortOldest);
    document.getElementById("sortNewest").addEventListener("click", sortNewest);
});
</script>
</body>

</html>