profile<?php 

echo "<pre>";
print_r($session->get('name'));
print_r($session->get('id'));
print_r($session->get('email'));



?>
<a href="logout">logout</a>
<a href="showfeedbackform/<?php echo $session->get('id');?>">Feedback</a>