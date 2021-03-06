<?php 
session_start();
include 'config.php';
?>

<!DOCTYPE html>
	<html lang="zxx" class="no-js">
	<head>
		<!-- Mobile Specific Meta -->
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<!-- Favicon-->
		<link rel="shortcut icon" href="img/fav.png">
		<!-- Author Meta -->
		<meta name="author" content="codepixer">
		<!-- Meta Description -->
		<meta name="description" content="">
		<!-- Meta Keyword -->
		<meta name="keywords" content="">
		<!-- meta character set -->
		<meta charset="UTF-8">
		<!-- Site Title -->
		<title>Category</title>

		<link href="https://fonts.googleapis.com/css?family=Poppins:100,200,400,300,500,600,700" rel="stylesheet"> 
			<!--
			CSS
			============================================= -->
			<link rel="stylesheet" href="../temp-fiyeo/css/linearicons.css">
			<link rel="stylesheet" href="../temp-fiyeo/css/font-awesome.min.css">
			<link rel="stylesheet" href="../temp-fiyeo/css/bootstrap.css">
			<link rel="stylesheet" href="../temp-fiyeo/css/magnific-popup.css">
			<link rel="stylesheet" href="../temp-fiyeo/css/nice-select.css">					
			<link rel="stylesheet" href="../temp-fiyeo/css/animate.min.css">
			<link rel="stylesheet" href="../temp-fiyeo/css/owl.carousel.css">
			<link rel="stylesheet" href="../temp-fiyeo/css/main.css">
        
        <style>
.nice-select .list { max-height: 300px; overflow: scroll; }
</style>
		</head>
		<body>

<?php
if (isset ($_SESSION['id'])!="") {
    $iduser = $_SESSION['id'];
   include ("header-loggedin.php");
}
else {
include("header-fiyeo.php");
}
?>
        <!-- #header -->


			<!-- start banner Area -->
			<section class="banner-area relative" id="home">	
				<div class="overlay overlay-bg"></div>
				<div class="container">
					<div class="row d-flex align-items-center justify-content-center">
						<div class="about-content col-lg-12">
							<h1 class="text-white">
								Event Organizer
							</h1>	
							<p class="text-white link-nav"><a href="index-fiyeo.php">Home </a>  <span class="lnr lnr-arrow-right"></span>  <a href="category-fiyeo.php"> Category</a></p>
						</div>											
					</div>
				</div>
			</section>
			<!-- End banner Area -->	
			
			<!-- Start post Area -->
			<section class="post-area section-gap" style="padding-top:50px;">
				<div class="container">
					<div class="row justify-content-center d-flex">
						<div class="col-lg-8 post-list">
                            
    <?php
	include("config.php");
	$query1="SELECT * from eo INNER JOIN provinsi ON eo.id_provinsi = provinsi.id_provinsi INNER JOIN kota ON eo.id_kota = kota.id_kota WHERE status='VERIFIED'";           
	$simpan1= mysqli_query($koneksi,$query1);
                           
   while($select = mysqli_fetch_assoc($simpan1)) {
			$id        = $select['id_eo'];
            $email     = $select['email_eo'];
            $password  = $select['password_eo'];
            $photo     = $select['foto_eo'];
            $name 	   = $select['nama_eo'];
			$desc 	   = $select['ket_eo'];
			$province  = $select['id_provinsi'];
			$city	   = $select['id_kota'];
			$address   = $select['alamat_eo'];
			$phone	   = $select['nohp_eo'];
            $fotoid    = $select['foto_ktp'];
            $fotoid1   = $select['fotodiri_ktp'];
            $fotoid2   = $select['foto_alamat'];
            $fotoid3   = $select['foto_siup'];
			$year	   = $select['tahun_diri'];
            $link	   = $select['link_web'];
			$status	   = $select['status'];
            $provname  = $select['nama_provinsi'];
            $cityname  = $select['nama_kota'];

    ?>   
							<div class="single-post d-flex flex-row">
 
                                <table>
                                <tr>
                                <td rowspan="5"><img src="../eo/<?php echo $photo ?>" width='150px' height='150px'></td>
                                <td style="padding-left:20px;"><a href="view-profile-eo.php?id_eo=<?php echo $id ?>"><h4><?php echo $name ?></h4></a></td>
                                <td>
                                </td>
                                </tr>
                                <tr>
                                <td style="color:#aa80ff; padding-left:20px;">
                                 <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i>
                                </td>
                                </tr>
                                <tr>
                                <td style="padding-left:20px;"><?php echo $desc ?></td>
                                </tr>
                                <tr>
                                <td style="padding-left:20px;"><i class="fa fa-map-o"></i>&nbsp; <?php echo $cityname ?>, <?php echo $provname ?></td>
                                </tr>
                                <tr>
                                <td style="padding-left:20px;"><i class="fa fa-money"></i>&nbsp; Start from IDR 3.000.000 </td>
                                </tr>
                                </table>
							</div>
                            
    <?php }
	?>

						</div>
						<div class="col-lg-4 sidebar">
							<div class="single-slidebar" style="background-color:#fff; border:2px dotted #aa80ff;">
				            <h4>Refine Your Search</h4>
                            <hr>
				            <div class="form-group">
                            <label><strong>Select Category</strong></label>
                            <div class="form-select" id="default-select" style="">
                            <select id="category" name='nama_kategori'>
                            <option value='belum milih' selected>- Choose Category -</option>
                            <?php 
                            include 'config.php';
                            $tampil=mysqli_query($koneksi, "SELECT id_kategori, nama_kategori FROM kategori");
                            while($id_kategori=mysqli_fetch_array($tampil)) {
                            echo "<option value='".$id_kategori[id_kategori]."' required> ".$id_kategori[nama_kategori]."</option>";}
                            ?>
                            </select>
                            </div>
				            </div>
                            <hr>
				            <div class="form-group">
                            <label><strong>Select Area</strong></label>
                            <div class="form-select" id="default-select" style="">
                            <select id="area" name='nama_area'>
                            <option value='belum milih' selected>- Choose Area -</option>
                            </select>
                            </div>
				            </div>
                            <hr>
                            <div class="form-group">
                            <label><strong>Sort By</strong></label>
                            <div class="form-select" id="default-select" style="">
                            <select id="sortby" name='sortby'>
                            <option value='belum milih' selected>- Default -</option>
                            </select>
                            </div>
                            <hr>
				            </div>
							</div>

						</div>
					</div>
				</div>	
			</section>
			<!-- End post Area -->

			<!-- Start callto-action Area -->
		<section class="callto-action-area section-gap" style="padding: 80px 0;" id="join">
				<div class="container">
					<div class="row d-flex justify-content-center">
						<div class="menu-content col-lg-9">
							<div class="title text-center">
								<h1 class="mb-10 text-white">Join us today without any hesitation</h1>
								<p class="text-white">We will connect you with customers so you can improve your business performance.</p>
								<a class="primary-btn" href="register-eo.php">Register as EO</a>
							</div>
						</div>
					</div>	
				</div>	
			</section>
			<!-- End calto-action Area -->			
		
	<!-- start footer Area -->		
			<footer class="footer-area section-gap" style="padding:50px 0; height:345px;">
				<div class="container">
					<div class="row">
						<div class="col-lg-3  col-md-12">
							<div class="single-footer-widget">
								<h6>F I Y E O</h6>
								<ul class="footer-nav">
                                    <li><a href="about-us.html">About Us</a></li>
									<li><a href="#">Privacy Policy</a></li>
									<li><a href="#">Terms & Conditions</a></li>
									<li><a href="#">Help</a></li>
									
								</ul>
							</div>
						</div>
						<div class="col-lg-6  col-md-12">
							<div class="single-footer-widget newsletter">
								<h6>Contact Us</h6>
								<p>E-mail : customerservice@fiyeo.com</p>
                                <p>Phone : (+62) 81250381345</p>	
							</div>
						</div>
						<div class="col-lg-3  col-md-12">
							<div class="single-footer-widget mail-chimp justify-content-center">
								<h6 class="mb-20">Stay Connected With Us</h6>
								<ul class="d-flex footer-social justify-content-center">
									<a href="#"><i class="fa fa-facebook"></i></a>
							<a href="#"><i class="fa fa-twitter"></i></a>
                           <a href="#"><i class="fa fa-instagram"></i></a>
								</ul>
							</div>
						</div>						
					</div>

					<div class="row footer-bottom d-flex justify-content-center" style="padding: 40px;">
						<p class="footer-text m-0 text-white">
							<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
<img src="../temp-fiyeo/img/irene/fiyeo2.png" alt=""> Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | PT. XYZ
						</p>
					</div>
				</div>
			</footer>
			<!-- End footer Area -->			

			<script src="../temp-fiyeo/js/vendor/jquery-2.2.4.min.js"></script>
			<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
			<script src="../temp-fiyeo/js/vendor/bootstrap.min.js"></script>			
			<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBhOdIF3Y9382fqJYt5I_sswSrEw5eihAA"></script>
  			<script src="../temp-fiyeo/js/easing.min.js"></script>			
			<script src="../temp-fiyeo/js/hoverIntent.js"></script>
			<script src="../temp-fiyeo/js/superfish.min.js"></script>	
			<script src="../temp-fiyeo/js/jquery.ajaxchimp.min.js"></script>
			<script src="../temp-fiyeo/js/jquery.magnific-popup.min.js"></script>	
			<script src="../temp-fiyeo/js/owl.carousel.min.js"></script>			
			<script src="../temp-fiyeo/js/jquery.sticky.js"></script>
			<script src="../temp-fiyeo/js/jquery.nice-select.min.js"></script>			
			<script src="../temp-fiyeo/js/parallax.min.js"></script>		
			<script src="../temp-fiyeo/js/mail-script.js"></script>	
			<script src="../temp-fiyeo/js/main.js"></script>	
		</body>
	</html>