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
    <title>Blog Details || Asbab - eCommerce HTML5 Template</title>
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

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/open-iconic-bootstrap.min.css">


    <!-- Modernizr JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
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
            <!-- End Cart Panel -->
        </div>
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
                                  <span class="breadcrumb-item active">Blog Details</span>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Bradcaump area -->
        <!-- Start Blog Details Area -->
        <?php 
   include_once '../controller/articleC/ArticleC.php';
                  $ArticleC = new ArticleC();
                  $row=$ArticleC->getArticleById($_GET['id']);         
?> 
        <section class="htc__blog__details bg__white ptb--100">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-lg-12">
                        <div class="htc__blog__details__wrap">
                            <div class="ht__bl__thumb">
                            <h1>L'article</h1>
                            </div>
                            <div class="bl__dtl">
                            <h2><a href="blog-details.html"><?= $row[0]['title']; ?></a></h2>

                                <p><?= $row[0]['subject']; ?></p>
           
                
                            <!-- Start Comment Area -->
                            <div class="htc__comment__area">
                                <h4 class="title__line--5">COMMENTS</h4>
                                <div class="ht__comment__content">
                                    <!-- Start Single Comment -->
                                    <div class="mt-5" id="review_content"></div>

                                    <!-- End Single Comment -->
                                </div>
                            </div>
                            <!-- End Comment Area -->
                            <!-- Start comment Form -->
                            <style>


    .ht__comment__form .fa-star {
        font-size: 2rem; /* Increase the star size */
    }


</style>

<div class="ht__comment__form">
    <h4 class="title__line--5">Leave a Comment</h4>
    <div class="mb-3">
        <i class="fas fa-star star-light submit_star mr-1" id="submit_star_1" data-rating="1"></i>
        <i class="fas fa-star star-light submit_star mr-1" id="submit_star_2" data-rating="2"></i>
        <i class="fas fa-star star-light submit_star mr-1" id="submit_star_3" data-rating="3"></i>
        <i class="fas fa-star star-light submit_star mr-1" id="submit_star_4" data-rating="4"></i>
        <i class="fas fa-star star-light submit_star mr-1" id="submit_star_5" data-rating="5"></i>
    </div>
    <div class="comment__form message center">

        <textarea name="user_review" id="user_review" type="text" class="form-control" placeholder="Leave your review" style="text-align: center;"></textarea>
    </div>
    <div class="ht__comment__form__inner__btn--2 mt--30">
        <button id="save_review" class="fr__btn" type="button">Submit</button>
    </div>
</div>



                            <!-- End comment Form -->
                            
                        </div>
                    </div>  
                </div>
            </div>
        </section>
        <!-- End Blog Details Area -->
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
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>

<script>
$(document).ready(function() {

    var rating_data = 0;


    $(document).on('mouseenter', '.submit_star', function() {

        var rating = $(this).data('rating');

        reset_background();

        for (var count = 1; count <= rating; count++) {

            $('#submit_star_' + count).addClass('text-warning');

        }

    });

    function reset_background() {
        for (var count = 1; count <= 5; count++) {

            $('#submit_star_' + count).addClass('star-light');

            $('#submit_star_' + count).removeClass('text-warning');

        }
    }

    $(document).on('mouseleave', '.submit_star', function() {

        reset_background();

        for (var count = 1; count <= rating_data; count++) {

            $('#submit_star_' + count).removeClass('star-light');

            $('#submit_star_' + count).addClass('text-warning');
        }

    });

    $(document).on('click', '.submit_star', function() {

        rating_data = $(this).data('rating');

    });

    $('#save_review').click(function() {
        
    
        var UserID = "<?php echo $_SESSION['user']; ?>";

        var article_id = "<?= $row[0]['id']; ?>";

        var user_review = $('#user_review').val();

        if (user_review == '') {
            alert("Please Fill Both Field");
            return false;
        } else {
            $.ajax({
                url: "../controller/avisC/avisC.php?add=oui",
                method: "POST",
                data: {
                    article_id: article_id,
                    rating_data: rating_data,
                    UserID: UserID,
                    user_review: user_review
                },
               success: function(data) {
                    // console.log(data);
                    window.location.replace('article-details.php?id='+article_id); 
                }
            })
        }

    });


});

(function ($) {
    "use strict";
    
    // Dropdown on mouse hover
    $(document).ready(function () {
        function toggleNavbarMethod() {
            if ($(window).width() > 992) {
                $('.navbar .dropdown').on('mouseover', function () {
                    $('.dropdown-toggle', this).trigger('click');
                }).on('mouseout', function () {
                    $('.dropdown-toggle', this).trigger('click').blur();
                });
            } else {
                $('.navbar .dropdown').off('mouseover').off('mouseout');
            }
        }
        toggleNavbarMethod();
        $(window).resize(toggleNavbarMethod);
    });


    // Date and time picker
    $('.date').datetimepicker({
        format: 'L'
    });
    $('.time').datetimepicker({
        format: 'LT'
    });
    
    
    // Back to top button
    $(window).scroll(function () {
        if ($(this).scrollTop() > 100) {
            $('.back-to-top').fadeIn('slow');
        } else {
            $('.back-to-top').fadeOut('slow');
        }
    });
    $('.back-to-top').click(function () {
        $('html, body').animate({scrollTop: 0}, 1500, 'easeInOutExpo');
        return false;
    });


    // Team carousel
    $(".team-carousel, .related-carousel").owlCarousel({
        autoplay: true,
        smartSpeed: 1000,
        center: true,
        margin: 30,
        dots: false,
        loop: true,
        nav : true,
        navText : [
            '<i class="fa fa-angle-left" aria-hidden="true"></i>',
            '<i class="fa fa-angle-right" aria-hidden="true"></i>'
        ],
        responsive: {
            0:{
                items:1
            },
            576:{
                items:1
            },
            768:{
                items:2
            },
            992:{
                items:3
            }
        }
    });


    // Testimonials carousel
    $(".testimonial-carousel").owlCarousel({
        autoplay: true,
        smartSpeed: 1500,
        margin: 30,
        dots: true,
        loop: true,
        center: true,
        responsive: {
            0:{
                items:1
            },
            576:{
                items:1
            },
            768:{
                items:2
            },
            992:{
                items:3
            }
        }
    });


    // Vendor carousel
    $('.vendor-carousel').owlCarousel({
        loop: true,
        margin: 30,
        dots: true,
        loop: true,
        center: true,
        autoplay: true,
        smartSpeed: 1000,
        responsive: {
            0:{
                items:2
            },
            576:{
                items:3
            },
            768:{
                items:4
            },
            992:{
                items:5
            },
            1200:{
                items:6
            }
        }
    });
    
})(jQuery);


</script>

<script>
$(document).ready(function() {
    console.log(load_rating_data());

    function load_rating_data() {
        $.ajax({
            url: "../controller/avisC/avisC.php?id=<?= $row[0]['id']; ?>",
            method: "POST",
            data: {
                action: 'load_data'
            },
            dataType: "JSON",
            success: function(data) {
                $('#average_rating').text(data.average_rating);
                $('#total_review').text(data.total_review);

                var count_star = 0;

                $('.main_star').each(function() {
                    count_star++;
                    if (Math.ceil(data.average_rating) >= count_star) {
                        $(this).addClass('text-warning');
                        $(this).addClass('star-light');
                    }
                });

                $('#total_five_star_review').text(data.five_star_review);

                $('#total_four_star_review').text(data.four_star_review);

                $('#total_three_star_review').text(data.three_star_review);

                $('#total_two_star_review').text(data.two_star_review);

                $('#total_one_star_review').text(data.one_star_review);

                $('#five_star_progress').css('width', (data.five_star_review / data.total_review) *
                    100 + '%');

                $('#four_star_progress').css('width', (data.four_star_review / data.total_review) *
                    100 + '%');

                $('#three_star_progress').css('width', (data.three_star_review / data
                    .total_review) * 100 + '%');

                $('#two_star_progress').css('width', (data.two_star_review / data.total_review) *
                    100 + '%');

                $('#one_star_progress').css('width', (data.one_star_review / data.total_review) *
                    100 + '%');

                if (data.review_data.length > 0) {
                    var html = '';

                    for (var count = 0; count < data.review_data.length; count++) {
                        html += '<div class="container  pb-3">';

                        html += '<div class="col-sm-14">';

                        html += '<div class="card">';

                        html += '<div class="card-body">';

                        html += 'UserName : '+data.review_data[count].user_name;

                        html += '<br />';

                        for (var star = 1; star <= 5; star++) {
                            var class_name = '';

                            if (data.review_data[count].rating >= star) {
                                class_name = 'text-warning';
                            } else {
                                class_name = 'star-light';
                            }

                            html += '<i class="fas fa-star ' + class_name + ' mr-1"></i>';
                        }

                        html += '<br />';

                        html += '<br />';

                        html += 'Review : '+data.review_data[count].user_review;

                        html += '</div>';

                        html += '<div class="card-footer text-right">On ' + data.review_data[count]
                            .datetime + '</div>';

                        html += '<div class="card-footer text-right"></div></div>';
                       
                        html += '</div>';

                        html += '</div>';
                    }
                    $('#review_content').html(html);
                }
            }
        })
    }

});


</script>
</body>

</html>


