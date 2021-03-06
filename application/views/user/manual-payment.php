<div class="container">
	<div class="row pb-5 pt-5 pl-2 pr-2">
		<div class="col-md-7 col-lg-7 col-sm-12 box-camp border-radius-20 pl-3 pr-3 mb-3">
			<div class="col-12 text-center mt-3 mb-3">
				<h6>Pembayaran Manual</h6>
				<img 
					src="<?php echo base_url('assets/images/manual-payment.png');?>"
					width="40%">
			</div>

			<form
				id="form-manual-payment"
				method="post"
				action="<?php echo site_url();?>/action/manual-payment"
				enctype="multipart/form-data">											

				<input type="hidden" value="<?php echo $this->security->get_csrf_hash();?>"
					name="<?php echo $this->security->get_csrf_token_name();?>">

				<div class="form-group row">
					<div class="col-md-2 col-sm-12 col-lg-2 mb-3">
						Bukti 
					</div>
					<div class="col-md-10 col-sm-12 col-lg-10">
						<input type="file" 
							name="proof" 
							class="form-control"
							data-parsley-required>

						<small class="ft-10">
							* Format file harus bertipe jpeg,jpg dan png <br>
							* Max size file 10 mb <br>
							* Max dimensions 5000
						</small>
					</div>
				</div>

				<div class="form-group row">
					<div class="col-md-2 col-sm-12 col-lg-2 mb-3">
						Keterangan 
					</div>
					<div class="col-md-10 col-sm-12 col-lg-10">
						<textarea placeholder="Keterangan" 
							class="form-control" 
							name="description" 
							data-parsley-required></textarea>	
					</div>
				</div>

				<div class="form-group row">
					<div class="col-12">
						<button class="btn btn-violet box-button-camp no-border text-light" 
							id="button-manual-payment">
							<i class="fab fa-telegram-plane"></i>
							Kirim
						</button>
					</div>
				</div>
			</form>
		</div>

		<div class="col-md-5 col-lg-5 col-sm-12">
			<div class="box-camp border-radius-20 p-3">
				<h6>Riwayat Pembayaran Manual</h6>
				<hr/>
				<div class="table-responsive">
					<table class="table">
						<tr>
							<td class="no-border">Status</td>
							<td class="no-border">Deskripsi</td>
							<td class="no-border">Bukti</td>
							<td class="no-border">Dikirim</td>
						</tr>
						<?php foreach($invoice['manual_payment'] as $item){ ?>
						<tr>				
							<td class="no-border">
								<?php if($item['status'] == 'validasi'){ ?>
									<span class="badge badge-primary">
										Validasi
									</span>
			          			<?php }elseif($item['status'] == 'failed'){ ?>
			          				<span class="badge badge-danger">
			          					Gagal
			          				</span>
			          			<?php }elseif($item['status'] == 'success'){ ?>
			          				<span class="badge badge-success">
			          					Berhasil
			          				</span>
			          			<?php } ?>
				          	</td>
							<td class="no-border"><?php echo $item['description'];?></td>
							<td class="no-border">
								<a href="<?php echo base_url('assets/images/proofs/'.$item['proof']);?>" target="_blank">
									<img src="<?php echo base_url('assets/images/proofs/'.$item['proof']);?>" width="50px">
								</a>
							</td>
							<td class="no-border">
								<?php echo $item['created_at'];?>
							</td>
						</tr>
						<?php } ?>
						<?php if(count($invoice['manual_payment']) < 1){ ?>
						<tr>
							<td colspan="100" class="text-center no-border">
								<img src="<?php echo base_url('assets/images/not-found.png');?>" width="40%"class="img-fluid">
								<br>
								Data tidak ditemukan
							</td>
						</tr>
						<?php } ?>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>

<!-- RESPONSIVE -->
<script>
function phone_res(){
	$(".border-radius-20").removeClass("box-camp p-3");
}

function tablet_res(){
	$(".border-radius-20").removeClass("box-camp p-3");
}

function destop_res(){
	$(".border-radius-20").removeClass("box-camp p-3").addClass("box-camp p-3");
}
</script>

<script>
 $("#form-manual-payment").parsley().on('form:validate',function(){
	 if($("#form-manual-payment").parsley().isValid()){
		 $("#button-manual-payment").html("<i class='fa fa-spinner fa-spin'></i>")
 		 $("#button-manual-payment").attr("disabled",true);
	 }else{
		 toastr.warning("Sepertinya ada data yang belum valid","");
	 }
 });
</script>