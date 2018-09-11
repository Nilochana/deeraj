<html>
<title>Tender</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="tender.css">
<body>
<?php
	session_start();
	if(isset($_SESSION['username'])) : ?>
<div class="tender-top">
  <ul class="tender-navbar tender-white tender-wide tender-padding-8 tender-card-2">
    <li>
      <a href="home1.php" class="tender-margin-left"><b>Tenders</b> India</a>
    </li>
    <!-- Float links to the right. Hide them on small screens -->
  </li>
    <li class="tender-right tender-hide-small">
    <a href="contact1.php" class="tender-left">Contact Us</a>
    <a href="logout.php" class="tender-left">Log out</a>
    </li>
    <li class="tender-hide-small tender-dropdown-hover tender-right">
    <a href="javascript:void(0);" title="Notifications">Available tender<i class="fa fa-caret-down tender-left"></i></a>     
    <div class="tender-dropdown-content tender-white tender-card-4">
      <a href="office.php">Office Buildings</a>
      <a href="school.php">Schools</a>
      <a href="mall.php">Malls</a>
    </div>
    </li>
    <li class="tender-right tender-hide-small">
      <a href="about1.php" class="tender-left tender-margin-right">About</a>
      <a href="user1.php" class="tender-left">User Details</a>
      <a href="add.php" class="tender-left">Add Tender</a>
    </li>
  </ul>
</div>
<?php else : ?>
<body>
<div class="tender-top">
  <ul class="tender-navbar tender-white tender-wide tender-padding-8 tender-card-2">
    <li>
      <a href="home1.php" class="tender-margin-left"><b>Tenders</b> India</a>
    </li>
    <!-- Float links to the right. Hide them on small screens -->
  </li>
    <li class="tender-right tender-hide-small">
      <a href="contact1.php" class="tender-left">Contact Us</a>
    </li>
    <li class="tender-hide-small tender-dropdown-hover tender-right">
    <a href="javascript:void(0);" title="Notifications">Available tender<i class="fa fa-caret-down tender-left"></i></a>     
    <div class="tender-dropdown-content tender-white tender-card-4">
      <a href="office.php">Office Buildings</a>
      <a href="school.php">Schools</a>
      <a href="mall.php">Malls</a>
    </div>
    </li>
    <li class="tender-right tender-hide-small">
      <a href="about1.php" class="tender-left tender-margin-right">About</a>
      <a href="login.php" class="tender-left">Login</a>
    </li>
  </ul>
</div>
</body>
<?php endif;?>
</html>