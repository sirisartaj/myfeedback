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
                <form action="<?php echo base_url(); ?>/submitquestion" method="post" onsubmit="return valid();">
                    <div class="form-group mb-3">
                    	<label>Question</label>
                        <input type="text"  id="question" name="question" placeholder="question" value="<?= set_value('question') ?>" class="form-control" >
                        <span id="error_question" class="text-danger"></span>
                    </div>
                    <div class="form-group mb-3">
                    	<label>Option 1</label>
                        <input type="text" name="option1"  id="option1" placeholder="option1" class="form-control" value="<?= set_value('option1') ?>">
                        <span id="option1" class="text-danger"></span>
                    </div>
                    <div class="form-group mb-3">
                    	<label>Option 2</label>
                        <input type="text" name="option2"  id="option2" placeholder="option2" class="form-control" value="<?= set_value('option2') ?>">
                        <span id="error_option2" class="text-danger"></span>
                    </div>
                    <div class="form-group mb-3">
                    	<label>Option 3</label>
                        <input type="text" name="option3" id="option3" placeholder="option3" class="form-control" value="<?= set_value('option3') ?>" >
                        <span id="error_option3" class="text-danger"></span>
                    </div>
                    
                    <div class="d-grid">
                         <button type="submit" class="btn btn-success">Add</button>
                    </div>     
                </form>
            </div>
              
        </div>
    </div>

<script>
	function valid(){
		var error =0;
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
		}

	}

</script>
</body>
</html>