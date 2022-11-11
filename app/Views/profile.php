profile<?php 

echo "<pre>";
print_r($session->get('name'));
print_r($session->get('id'));
print_r($session->get('email'));



?>
<a href="logout">logout</a>
<a href="feedbackform">Feedback</a>