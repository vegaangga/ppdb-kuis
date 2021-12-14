<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="UTF-8">
	<title>SMAN 1 Puri</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="{{asset('homepage/css/Style.css')}}">
<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-144808195-1"></script>
	<script>
	  window.dataLayer = window.dataLayer || [];
	  function gtag(){dataLayer.push(arguments);}
	  gtag('js', new Date());

	  gtag('config', 'UA-144808195-1');
	</script>
    <script src="{{asset ('homepage/jquery.min.js')}}"></script>
<style>
body {font-family: "Lato", sans-serif}
.mySlides {display: none}
</style>
<body>

<!-- Navbar -->
<div class="w3-top">
  <div class="w3-bar w3-black w3-card">
    <a class="w3-bar-item w3-button w3-padding-large w3-hide-medium w3-hide-large w3-right" href="javascript:void(0)" onclick="myFunction()" title="Toggle Navigation Menu"><i class="fa fa-bars"></i></a>
    <img src="{{asset ('homepage/img/logo-puri.png')}}" alt="logo" style="width:40px;">
    <a href="#" class="w3-bar-item w3-button w3-padding-large">WELCOME</a>
    <div class="w3-dropdown-hover w3-hide-small w3-right">
      <button class="w3-padding-large w3-button" title="More">MORE <i class="fa fa-caret-down"></i></button>
      <div class="w3-dropdown-content w3-bar-block w3-card-4">
        <a href="{{ route('login') }}" class="w3-bar-item w3-button">Login</a>

      </div>
    </div>
    <a href="#contact" class="w3-bar-item w3-button w3-padding-large w3-hide-small w3-right">CONTACT</a>
    <a href="#ppdb" class="w3-bar-item w3-button w3-padding-large w3-hide-small w3-right">PPDB</a>
    <a href="#profile" class="w3-bar-item w3-button w3-padding-large w3-hide-small w3-right">PROFILE</a>
    </div>


</div>

<!-- Navbar on small screens (remove the onclick attribute if you want the navbar to always show on top of the content when clicking on the links) -->
<div id="navDemo" class="w3-bar-block w3-black w3-hide w3-hide-large w3-hide-medium w3-top" style="margin-top:46px">
  <a href="#profile" class="w3-bar-item w3-button w3-padding-large" onclick="myFunction()">PROFILE</a>
  <a href="#ppdb" class="w3-bar-item w3-button w3-padding-large" onclick="myFunction()">PPDB</a>
  <a href="#contact" class="w3-bar-item w3-button w3-padding-large" onclick="myFunction()">CONTACT</a>
  <a href="#" class="w3-bar-item w3-button w3-padding-large" onclick="myFunction()">MERCH</a>
</div>

<!-- Page content -->
<div class="w3-content" style="max-width:2000px;margin-top:46px">

  <!-- Automatic Slideshow Images -->
  <div class="mySlides w3-display-container w3-center">
    <img src="{{asset('homepage/img/p.png')}}" style="width:100%; height:600px">
    <div class="w3-display-bottommiddle w3-container w3-text-white w3-padding-32 w3-hide-small">

    </div>
  </div>
  <div class="mySlides w3-display-container w3-center">
    <img src="{{asset('homepage/img/p1.jpg')}}" style="width:100%; height:600px">
    <div class="w3-display-bottommiddle w3-container w3-text-white w3-padding-32 w3-hide-small" style="margin-bottom: 200px;">
      <h3>ACC</h3>
      <p><b>Amazing Competition Of Castle</b></p>
    </div>
  </div>


  <!-- The Band Section -->
  <div class="w3-container w3-content w3-center w3-padding-64" style="max-width:800px" id="profile">
    <h2 class="w3-wide">PROFILE</h2>
    <p class="w3-opacity"><i>Visi</i></p>
    <p class="w3-justify">
    ( BESTARI )
Beriman, Bertaqwa, Berdisiplin, Berprestasi, Berbudaya Santun, Berwawasan Adiwiyata dan Pelayanan Prima Serta Berkreasi dengan Semangat Mentari  dan memiliki daya saing tinggi di Era Globalisasi.
    </p>
    <p class="w3-opacity"><i>Misi</i></p>

      <ul style="text-align: initial;">
        <li>Menumbuhkan dan meningkatkan Keimanan, Ketaqwaan terhadap Tuhan Yang Maha Esa serta meningkatkan sikap disiplin dalam membentuk warga sekolah yang berbudaya santun dan berakhlak mulia.</li>
        <li>Meningkatkan Proses Pembelajaran dan Bimbingan serta Pembinaan secara terus menerus dalam mencapai Prestasi di bidang akademik dan non akademik.</li>
        <li>Meningkatkan pelayanan terhadap peserta didik dalam mengembangkan segala potensi diri sesuai dengan bakat dan minat.</li>
        <li>Memberdayakan seluruh warga sekolah secara optimal dengan semangat mentari dalam menciptakan lingkungan sekolah yang bersih dan sehat</li>
        <li>Menghemat SDA dengan prinsip 3 R (Reduce, Reuse, Recycling )</li>
        <li>Mewujudkan tujuan pendidikan yang memenuhi 8 Standar  Nasional Pendidikan untuk menghasilkan lulusan yang berkualitas dan mampu bersaing di era globalisasi.</li>
        <li>Meningkatkan upaya pengelolaan sampah mandiri</li>
        <li>Turut menjaga ketersediaan air bawah tanah dengan meningkatkan ruang terbuka hijau disekolah</li>
        <li>Menumbuhkan budaya peduli lingkungan bagi semua warga sekolah</li>
      </ul>
  </div>

  <!-- The Tour Section -->
  <div class="w3-black" id="ppdb">
    <div class="w3-container w3-content w3-padding-64" style="max-width:800px">
      <h2 class="w3-wide w3-center">PPDB 2021</h2>
      <p class="w3-opacity w3-center"><i>Join to SMAN1PURI</i></p><br>
      <p class="w3-center"><a class="btn btn-primary" href="{{ route('register') }}">Daftar</a></p>

      <div class="w3-row-padding w3-padding-32" style="margin:0 -16px">
        <div class="w3-third w3-margin-bottom">
          <img src="{{asset('homepage/img/eks2.jpg')}}" alt="New York" style="width:100%; height: 200px" class="w3-hover-opacity">
          <div class="w3-container w3-white">
            <p><b>Basket</b></p>
            <p class="w3-opacity">Fri 27 Nov 2016</p>
            <p>SMAN 1 Puri's Team participated in the Honda DBL East Java Series 2019 - North Region - Basketball Girls</p>
            </div>
        </div>
        <div class="w3-third w3-margin-bottom">
          <img src="{{asset('homepage/img/eks1.jpg')}}" alt="Paris" style="width:100%; height: 200px" class="w3-hover-opacity">
          <div class="w3-container w3-white" style="height: 180px;">
            <p><b>Futsal</b></p>
            <p class="w3-opacity">Sat 28 Nov 2016</p>
            <p>SMAN 1 Puri's Team got 2nd place for ACC 2019</p>
            </div>
        </div>
        <div class="w3-third w3-margin-bottom">
          <img src="{{asset('homepage/img/eks3.jpg')}}" alt="San Francisco" style="width:100%; height: 200px" class="w3-hover-opacity">
          <div class="w3-container w3-white" style="height: 180px;">
            <p><b>Modern Dance</b></p>
            <p class="w3-opacity">Sun 29 Nov 2016</p>
            <p>1st runner up on Highschool dance competition in the Ciputra world.</p>
            </div>
        </div>
      </div>
      <p class="w3-opacity w3-center"><i>WANT TO KNOW MORE?</i> <a href="##" onclick="document.getElementById('register').style.display='block'">JOIN US NOW</a></p><br>
    </div>
  </div>

  <!-- Ticket Modal -->


  <!-- The Contact Section -->
  <div class="w3-container w3-content w3-padding-64" style="max-width:800px" id="contact">
    <h2 class="w3-wide w3-center">CONTACT</h2>
    <p class="w3-opacity w3-center"><i>Contact Us</i></p>
    <div class="w3-row w3-padding-32">
      <div class="w3-col m6 w3-large w3-margin-bottom">
        <i class="fa fa-map-marker" style="width:30px"></i> Jl. Jayanegara No. 2 Mojokerto<br>
        <i class="fa fa-phone" style="width:30px"></i> Phone: (0321) 322636 | Fax. (0321) 327674<br>
        <i class="fa fa-envelope" style="width:30px"> </i> Email: info@sman1puri.sch.id<br>
      </div>

    </div>

  </div>

<!-- End Page Content -->
</div>

<!-- Register Pop Up -->
<div id="register" class="modal">
  <div align="center">
			<div class="container">
					<div style="color:white">
					</div>
					 <form class="modal-content animate" method="post">
            <div class="imgcontainer">
            <span onclick="document.getElementById('register').style.display='none'" class="close" title="Close PopUp">&times;</span>
                <img src="{{asset('homepage/img/logocastle.png')}}" alt="Avatar" class="avatar">
                <h1 style="text-align:center;color: #0066FF; font:anton">Register</h1>
              </div>

              <div class="container" style="text-align: initial;">
                <input type="email" class="form-control" placeholder="Email" name="email" autofocus required>
                </br>
                <input type="password" class="form-control" placeholder="Password" name="password" required style="margin-bottom: 20px;">
                  <button class="btn" type="submit" style="float:right; margin-right:34px; margin-top:26px; color: white; background-color: #0066FF" name="btn-daftar"><b>Register</b></button>
                  <a href="##" onclick="document.getElementById('login').style.display='block'" style="text-decoration:none; margin-right:34px; margin-top:26px; color: #0066FF">Have Account?</a>
              </div>
            </form>
			<br \>
			</div>
		  </div>
		</div>
<!-- Login Pop Up -->
<div id="login" class="modal">
 <div align="center">
			<div class="container">
					<div style="color:white">
					</div>
					 <form class="modal-content animate" method="post">
            <div class="imgcontainer">
            <span onclick="document.getElementById('login').style.display='none'" class="close" title="Close PopUp">&times;</span>
                <img src="{{asset('homepage/img/logocastle.png')}}" alt="Avatar" class="avatar">
                <h1 style="text-align:center;color:#0066FF;">Sign In</h1>
              </div>

              <div class="container" style="text-align: initial;">
                <input type="email" class="form-control" placeholder="Email" name="email" autofocus required>
                </br>
                <input type="password" class="form-control" placeholder="Password" name="password" required style="margin-bottom: 20px;">
                  <button class="btn" type="submit" style="float:right; margin-right:34px; margin-top:26px; color: white; background-color: #0066FF" name="btn-login"><b>Sign In</b></button>
              </div>
            </form>

			<br \>
        </div>
		</div>
<script>
// If user clicks anywhere outside of the modal, Modal will close

var modal = document.getElementById('register');
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}

var modal = document.getElementById('login');
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
</script>


<!-- Footer -->
<footer class="w3-container w3-padding-64 w3-center w3-opacity w3-light-grey w3-xlarge">
<a href="https://www.facebook.com/pages/Sman%201%20Puri/710459215748006/" target="_blank"><i class="fa fa-facebook-official w3-hover-opacity" href=></i></a>
  <a href="https://www.instagram.com/sman1puri/" target="_blank"><i class="fa fa-instagram w3-hover-opacity"></i></a>
  <a href="https://twitter.com/sman1puri" target="_blank"><i class="fa fa-twitter w3-hover-opacity"></i></a>
  <p class="w3-medium">Powered by <a href="https://www.w3schools.com/w3css/default.asp" target="_blank">V.A.R & C-L</a></p>
</footer>

<script>
// Automatic Slideshow - change image every 4 seconds
var myIndex = 0;
carousel();

function carousel() {
  var i;
  var x = document.getElementsByClassName("mySlides");
  for (i = 0; i < x.length; i++) {
    x[i].style.display = "none";
  }
  myIndex++;
  if (myIndex > x.length) {myIndex = 1}
  x[myIndex-1].style.display = "block";
  setTimeout(carousel, 4000);
}

// Used to toggle the menu on small screens when clicking on the menu button
function myFunction() {
  var x = document.getElementById("navDemo");
  if (x.className.indexOf("w3-show") == -1) {
    x.className += " w3-show";
  } else {
    x.className = x.className.replace(" w3-show", "");
  }
}

// When the user clicks anywhere outside of the modal, close it
var modal = document.getElementById('ticketModal');
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}
</script>

</body>
</html>
