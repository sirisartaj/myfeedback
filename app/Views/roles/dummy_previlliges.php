<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <title>Permissions List</title>
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</head>
<body>
<?php
// var_dump($modules);
// var_dump($role_previliges);die;
$previliges = $role_previliges[0];
if($previliges['access'] != ''){
$previliges['access'] = explode(',',$previliges['access']);
}else{
$previliges['access'] = [];
}
if($previliges['p_add'] != ''){
$previliges['p_add'] = explode(',',$previliges['p_add']);
}else{
$previliges['p_add'] = [];
}
if($previliges['edit'] != ''){
$previliges['edit'] = explode(',',$previliges['edit']);
}else{
$previliges['edit'] = [];
}
if($previliges['p_delete'] != ''){
$previliges['p_delete'] = explode(',',$previliges['p_delete']);
}else{
$previliges['p_delete'] = [];
}
if($previliges['status'] != ''){
$previliges['status'] = explode(',',$previliges['status']);
}else{
$previliges['status'] = [];
}

?>
<table class="table">
 <thead>
   <tr>
      <th>Module Name</th>
      <th>Access</th>
      <th>Add</th>
      <th>Edit</th>
      <th>Delete</th>
      <th>Status</th>
   </tr>
  </thead>
  <tbody>

  <?php foreach($modules as $i=>$v):?>
  <tr>
  <td> <?php echo $v['module_name']; ?> </td>  
  <td id="access<?php echo $i;?>">
  <?php if(in_array($v['module_id'],$previliges['access'])){ ?>
  <a style="color:green" onclick="changePreviliges('access<?php echo $i;?>',<?php echo $previliges['role_id']?>,<?php echo $v['module_id'];?>,'n','access')"><i class="fa fa-check"></i> </a>
  <?php } else { ?>
  <a style="color:red" onclick="changePreviliges('access<?php echo $i;?>',<?php echo $previliges['role_id'];?>,<?php echo $v['module_id']?>,'y','access')"><i class="fa fa-check"></i> </a><?php } ?>
  </td>
  <td id="add<?php echo $i;?>">
  <?php if(in_array($v['module_id'],$previliges['p_add'])){ ?>
  <a style="color:green" onclick="changePreviliges('add<?php echo $i;?>',<?php echo $previliges['role_id'];?>,<?php echo $v['module_id'];?>,'n','add')"><i class="fa fa-check"></i> </a>
  <?php } else { ?>
  <a style="color:red" onclick="changePreviliges('add<?php echo $i;?>',<?php echo $previliges['role_id'];?>,<?php echo $v['module_id'];?>,'y','add')"><i class="fa fa-check"></i> </a><?php } ?>
  </td>
   <td id="edit<?php echo $i;?>">
  <?php if(in_array($v['module_id'],$previliges['edit'])){ ?>
  <a style="color:green" onclick="changePreviliges('edit<?php echo $i;?>',<?php echo $previliges['role_id'];?>,<?php echo $v['module_id']?>,'n','edit')"><i class="fa fa-check"></i> </a>
  <?php } else { ?>
  <a style="color:red" onclick="changePreviliges('edit<?php echo $i;?>',<?php echo $previliges['role_id'];?>,<?php echo $v['module_id'];?>,'y','edit')"><i class="fa fa-check"></i> </a><?php } ?>
  </td>
   <td id="p_delete<?php echo $i;?>">
  <?php if(in_array($v['module_id'],$previliges['p_delete'])){ ?>
  <a style="color:green" onclick="changePreviliges('p_delete<?php echo $i;?>',<?php echo $previliges['role_id'];?>,<?php echo $v['module_id'];?>,'n','delete')"><i class="fa fa-check"></i> </a>
  <?php } else { ?>
  <a style="color:red" onclick="changePreviliges('p_delete<?php echo $i;?>',<?php echo $previliges['role_id'];?>,<?php echo $v['module_id'];?>,'y','delete')"><i class="fa fa-check"></i> </a><?php } ?>
  </td>
   <td id="status<?php echo $i;?>">
  <?php if(in_array($v['module_id'],$previliges['status'])){ ?>
  <a style="color:green" onclick="changePreviliges('status<?php echo $i;?>',<?php echo $previliges['role_id'];?>,<?php echo $v['module_id'];?>,'n','status')"><i class="fa fa-check"></i> </a>
  <?php } else { ?>
  <a style="color:red" onclick="changePreviliges('status<?php echo $i;?>',<?php echo $previliges['role_id'];?>,<?php echo $v['module_id'];?>,'y','status')"><i class="fa fa-check"></i> </a><?php } ?>
  </td>
  </tr>
 
  <?php endforeach;?>

  </tbody>
</table>
<script type="text/javascript">
function changePreviliges(id,role_id,module_id,status,previliges){
console.log(id,role_id,module_id,status,previliges);
var id2= $.trim(id);
   jQuery.ajax({
   method: "POST",            
   url: "<?php echo base_url(); ?>/changePreviliges",
   data: "role_id="+role_id+'&module_id='+module_id+'&status='+status+'&previliges='+previliges,
   success: function(data) {        
        console.log(data);
        if(data){
        if(status === 'n'){
        var status2 = 'y';
        $('#'+id).html('<a style="color:red" onclick="changePreviliges(\''+id2+'\',\''+role_id+'\',\''+module_id+'\',\''+status2+'\',\''+previliges+'\')"><i class="fa fa-check"></i> </a>');
        }
        else if(status === 'y'){
        var status2 = 'n';
        $('#'+id).html('<a style="color:green" onclick="changePreviliges(\''+id+'\',\''+role_id+'\',\''+module_id+'\',\''+status2+'\',\''+previliges+'\')"><i class="fa fa-check"></i> </a>');
        }
        }else{
        alert('error');
        }
    }
   });

}
</script>
</body>

</html>