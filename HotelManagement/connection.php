<?php
   $con=mysqli_connect("localhost","root","","testings");
   
   if(mysqli_connect_error())
   {
       echo"<script>alert('Cannot Connect');</script>";
       exit();
   }

?>