<html>
<title>Tender</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="tender.css">
<style>
table 
{
    border-collapse: collapse;
    width: 75%;
}

th, td 
{
    text-align: left;
    padding: 8px;
}

tr:nth-child(even){background-color: #f2f2f2}

th 
{
    background-color: #000;
    color: white;
}

</style>
<body>

<?php require 'header.php' ?>

<br>
<br>
<br>

<div class="tender-container tender-padding-32" id="contact">
    <h3 class="tender-border-bottom tender-border-light-grey tender-padding-12">Contact</h3>
    <p>Lets get in touch and talk about your and our next project.</p>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
      <input class="tender-input" type="text" placeholder="Name" required name="name">
      <input class="tender-input tender-section" type="email" placeholder="Email" required name="email">
      <input class="tender-input tender-section" type="text" placeholder="Subject" required name="subject">
      <input class="tender-input tender-section" type="text" placeholder="Comment" required name="comment">
      <button class="tender-btn tender-section" type="submit">
        <i class="fa fa-paper-plane"></i> Submit feedback
      </button>
    </form>
    <?php

    if($_POST)
      {
        $name=$_POST["name"];
        $email=$_POST["email"];
        $subject=$_POST["subject"];
        $comment=$_POST["comment"];

        $link=mysqli_connect("localhost","root","","tender");
        $sql="INSERT INTO feedback(name,email,subject,comment) values ('$name','$email','$subject','$comment')";

        if(!mysqli_query($link,$sql))
        {
          echo "ERROR! Please re-check the details entered.";
        }
        else
        {
          mysqli_close($link);
          echo "Feedback has been submitted. Thank you.";
        }
      }
      
    ?>
  </div>
<br>
<br>
<br>
  <!-- End page content -->
</div>

<!-- Google Map -->
<div id="googleMap" class="tender-grayscale" style="width:100%;height:450px;"></div>

<!-- Footer -->
<?php require 'footer.php' ?>

<!-- Add Google Maps -->
<script src="https://maps.googleapis.com/maps/api/js"></script>

<script>
// Google Map Location
var myCenter = new google.maps.LatLng(12.9361,77.6055);

function initialize() {
var mapProp = {
  center: myCenter,
  zoom: 12,
  scrollwheel: false,
  draggable: false,
  mapTypeId: google.maps.MapTypeId.ROADMAP
  };

var map = new google.maps.Map(document.getElementById("googleMap"),mapProp);

var marker = new google.maps.Marker({
  position: myCenter,
});

marker.setMap(map);
}

google.maps.event.addDomListener(window, 'load', initialize);
</script>

</body>
</html>