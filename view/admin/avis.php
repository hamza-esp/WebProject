<?php
include '../../controller/avisC/avisC.php';
$avisC = new avisC();
$list = $avisC->listavis();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="au theme template">
    <meta name="author" content="Hau Nguyen">
    <meta name="keywords" content="au theme template">

    <!-- Title Page-->
    <title>Tables</title>

    <!-- Fontfaces CSS-->
    <link href="css/font-face.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
    <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">

    <!-- Bootstrap CSS-->
    <link href="vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">

    <!-- Vendor CSS-->
    <link href="vendor/animsition/animsition.min.css" rel="stylesheet" media="all">
    <link href="vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet" media="all">
    <link href="vendor/wow/animate.css" rel="stylesheet" media="all">
    <link href="vendor/css-hamburgers/hamburgers.min.css" rel="stylesheet" media="all">
    <link href="vendor/slick/slick.css" rel="stylesheet" media="all">
    <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="vendor/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="css/theme.css" rel="stylesheet" media="all">

</head>

<body class="animsition">
    <div class="page-wrapper">
        <!-- HEADER MOBILE-->
        <?php require('menu.php'); ?>
        <!-- END MENU SIDEBAR-->

        <!-- PAGE CONTAINER-->
        <div class="page-container">
            <!-- HEADER DESKTOP-->
            <?php require('header.php'); ?>

            <!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row m-t-30">
                            <div class="col-md-12">
                                <!-- DATA TABLE-->
                                <div class="table-responsive m-b-40">
                                <div class="input-group mb-3">
  <input type="text" class="form-control" placeholder="Search" id="search-input">
</div>
<div class="form-check">
  <input class="form-check-input" type="checkbox" value="" id="treated-checkbox">
  <label class="form-check-label" for="treated-checkbox">
    Treated only
  </label>
</div>

                                    <table class="table table-borderless table-data3">
                                        <thead>
                                            <tr>
                                                <th>email</th>
                                                <th>user review</th>
                                                <th>user rating <i class="fa fa-star "></i></th>
                                                <th>status</th>
                                                <th>actions</th>
                                            </tr>
                                        </thead>
                                      
                <tbody>
            <?php
                  foreach ($list as $avis):
        
                  ?>
                  <tr>
               <td><?php echo   $avis['email'];?></td>
               <td><?php echo  $avis['user_review'];  ?></td>
               <td><?php echo  $avis['user_rating'];  ?></td>
               <td><?php echo  $avis['status'];  ?></td>
               <td>  
               <?php      
         if($avis['status'] == "pending")   {
           echo   '<a href="../../controller/avisC/avis-treated.php?id='  .$avis['idR'].'"><button  type="submit" class="btn btn-primary btn-xs"><i class="fa fa-check "></i></button></a>';
         }            
         ?>                        
        <a href="../../controller/avisC/avis-delete.php?delete=<?php echo    $avis['idR']; ?>"><button  type="submit" class="btn btn-danger btn-xs"><i class="fa fa-trash "></i></button></a>

              </td>

                  </tr>

<?php   endforeach;?>
                                    </table>
                                </div>
                                <!-- END DATA TABLE-->
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
  $(document).ready(function(){
    $('#search-input').on('keyup', function(){
      var searchText = $(this).val().toLowerCase();
      var isTreated = $('#treated-checkbox').prop('checked');
      $('table tbody tr').each(function(){
        var rowText = $(this).text().toLowerCase();
        var rowTreated = $(this).find('td:eq(3)').text().toLowerCase();
        if(rowText.includes(searchText) && (isTreated === false || (isTreated === true && rowTreated === "treated"))){
          $(this).show();
        } else {
          $(this).hide();
        }
      });
    });
    $('#treated-checkbox').on('change', function(){
      $('#search-input').trigger('keyup');
    });
  });
</script>

</script>
    <!-- Jquery JS-->
    <script src="vendor/jquery-3.2.1.min.js"></script>
    <!-- Bootstrap JS-->
    <script src="vendor/bootstrap-4.1/popper.min.js"></script>
    <script src="vendor/bootstrap-4.1/bootstrap.min.js"></script>
    <!-- Vendor JS       -->
    <script src="vendor/slick/slick.min.js">
    </script>
    <script src="vendor/wow/wow.min.js"></script>
    <script src="vendor/animsition/animsition.min.js"></script>
    <script src="vendor/bootstrap-progressbar/bootstrap-progressbar.min.js">
    </script>
    <script src="vendor/counter-up/jquery.waypoints.min.js"></script>
    <script src="vendor/counter-up/jquery.counterup.min.js">
    </script>
    <script src="vendor/circle-progress/circle-progress.min.js"></script>
    <script src="vendor/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="vendor/chartjs/Chart.bundle.min.js"></script>
    <script src="vendor/select2/select2.min.js">
    </script>

    <!-- Main JS-->
    <script src="js/main.js"></script>

</body>

</html>
<!-- end document-->
