successfeedback

<?php print_r(session()->get('role')); 

if(session()->get('role') ==1){?>

<a href="feebackreport">feedback report</a>


<?php }else{ ?>
<a href="profile">profile</a>
 <?php }
?>