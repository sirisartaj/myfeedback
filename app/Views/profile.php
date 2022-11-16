<?php 
echo view('header'); 
echo view('appheader'); 
echo view('appsidebar'); 
?>

    <div class="app-content main-content mt-0"><?php 

echo "<pre>";
print_r($session->get('name'));
print_r($session->get('id'));
print_r($session->get('email'));



?>
<a href="logout">logout</a>
<a href="showfeedbackform/<?php echo $session->get('id');?>">Feedback</a>
</div>
<?php echo view('footer_text'); ?>
    </div>
    <?php echo view('footer'); ?>
  </body>
</html>