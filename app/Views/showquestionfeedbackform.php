<html>
<head></head>
<body>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js" integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
	<script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>

	<div class="container">
        <div class="row justify-content-md-center">
            <div class="col-5">
                
                <h2>Feedback Questions</h2>
                
                <?php if(session()->getFlashdata('msg')):?>
                    <div class="alert alert-warning">
                       <?= session()->getFlashdata('msg') ?>
                    </div>
                <?php endif;?>
                <?php if(isset($validation)):?>
                <div class="alert alert-warning">
                   <?= $validation->listErrors() ?>
                </div>
                <?php endif;?>
                <?php 
//print_r($session);
//echo $session->get('name');
$user_id = $session->get('id');
                ?>
                <form action="<?php echo base_url(); ?>/savefeedback" method="post" onsubmit="return valid();">
                    <?php $i=1; foreach($qu as $qusestion){ ?>
                    <div class="form-group mb-3">
                    	
                        <input type="hidden"  id="fid" name="fid[]" placeholder="fid" value="<?php echo $qusestion['fid'] ?>" class="form-control" >
                        <input type="hidden"  id="user_id" name="user_id"  value="<?php echo $user_id; ?>" class="form-control" >
                        <h3 ><label><?php echo $i++;?>, </label><?php echo $qusestion['question'] ?></h3>
                        <h4> <input type="radio" name="ansoption_<?php echo $qusestion['fid'] ?>[]" value="option1"><?php echo $qusestion['option1'] ?></h4>
                        <h4> <input type="radio" name="ansoption_<?php echo $qusestion['fid'] ?>[]" value="option2"><?php echo $qusestion['option2'] ?></h4>
                        <h4> <input type="radio" name="ansoption_<?php echo $qusestion['fid'] ?>[]" value="option3"><?php echo $qusestion['option3'] ?></h4>
                    </div>
                    <?php  } ?>
                    <div class="d-grid">
                         <button type="submit" class="btn btn-success">Save</button>
                    </div>     
                </form>
            </div>
              
        </div>
    </div>

<script>
	function valid(){
		/*var error =0;
		if($('#question').val()==''){
			$('#error_question').html('please enter question');
			error = 1;
		}

		if($('#option1').val()==''){
			$('#error_option1').html('please enter option1');
			error = 1;
		}

		if($('#option2').val()==''){
			$('#error_option2').html('please enter option2');
			error = 1;
		}

		if($('#option3').val()==''){
			$('#error_option3').html('please enter option3');
			error = 1;
		}

		if(error ==1){
			return false;
		}*/
		return true;

	}

</script>
</body>
</html>