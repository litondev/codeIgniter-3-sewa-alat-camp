<style>
.box-reset-password{
	margin: auto;
	border: 0px solid rgb(127,127,127,0.3) !important;
	border-radius: 10px;
}
</style>

<div class="container">
	<div class="row pt-5 pb-5">
		<div class="col-md-4 col-sm-12 col-lg-4 box-camp box-reset-password">
			<div class="row">
				<div class="col-12">
					<div class="text-center text-camp-violet">
						<h2>Reset Password</h2>
					</div>				
					<div class="text-center">
						<img class="img-fluid" src="<?php echo base_url('assets/images/forget-password.png');?>">
					</div>
				</div>

				<div class="col-12">				
				 <form
				  	id="form-reset-password"
				  	action="<?php echo site_url();?>/action-reset-password"
				  	method="post">			

				 	<input type="hidden" value="<?php echo $this->security->get_csrf_hash();?>"
				 		name="<?php echo $this->security->get_csrf_token_name();?>">

				  	<input type="hidden" value="<?php echo $email;?>" name="email">

				  	<input type="hidden" value="<?php echo $key;?>" name="key">

				 	<div class="form-group row">
				 		<div class="col-12 text-camp-violet">
				 			Password
				 		</div>

				 		<div class="col-12">
				 			<input class="form-control input-camp-violet"
				 				type="password" 
				 				id="password"
				 				data-parsley-required
				 				data-parsley-minlength="8"				 			
				 				name="password"
				 			 	value="<?php echo $this->session->flashdata('old_post') ? $this->session->flashdata('old_post')['password'] : '';?>">
				 		</div>
				 	</div>

					<div class="form-group row">
				 		<div class="col-12 text-camp-violet">
				 			Password Confirm
				 		</div>
				 		<div class="col-12">
				 			<input class="form-control input-camp-violet"
				 			 	type="password" 
				 			 	data-parsley-required
				 			 	data-parsley-minlength="8"
				 			 	data-parsley-equalto="#password"				 			 
				 			 	name="password_confirmation"
				 			 	value="<?php echo $this->session->flashdata('old_post') ? $this->session->flashdata('old_post')['password_confirmation'] : '';?>">
				 		</div>
				 	</div>

				 	<div class="form-group row">
				 		<div class="col-12">
				 			<button class="btn btn-violet btn-block text-center text-light border-radius-10 box-button-camp no-border"
				 				id="button-reset-password">
				 				<i class="fab fa-telegram-plane"></i>
				 				Kirim
				 			</button>
				 		</div>
				 	</div>
				 </form>
				</div>
			</div>
		</div>
	</div>
</div>

<!-- REPONSIVE -->
<script>
function phone_res(){
	$(".box-reset-password").css({"border" : "0px solid white"});
	$(".box-reset-password").removeClass("box-camp");
}

function tablet_res(){
	$(".box-reset-password").css({"border" : "0px solid white"});
	$(".box-reset-password").removeClass("box-camp");
}

function destop_res(){	
	$(".box-reset-password").css({"border" : "2px solid rgb(127,127,127,0.3)"});
	$(".box-reset-password").removeClass("box-camp").addClass("box-camp");
}
</script>

<!-- FORM VALIDATION -->
<script>
$("#form-reset-password").parsley().on('form:validate',function(){
	if($("#form-reset-password").parsley().isValid()){
		$("#button-reset-password").html("<i class='fa fa-spinner fa-spin'></i>")
		$("#button-reset-password").attr("disabled",true);
	}else{
		toastr.warning("Sepertinya ada data yang belum valid","");
	}
});
</script>