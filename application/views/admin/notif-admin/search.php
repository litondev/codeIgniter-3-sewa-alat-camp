<div class="card shadow mb-4">
	<form
		action="<?php echo site_url();?>/admin/notif-admin"
		method="get">
    	<div class="card-body row">
	
    		<div class="col-12">
    			<h6>Search : </h6>
    		</div>	

	    	<div class="col-md-3 col-lg-3 col-sm-12 mt-2">
		    	<input type="text" 
		    		class="form-control" 
		    		placeholder="Dari id" 
		    		name="form_id"
		    		onkeypress="event.key == 'enter' || event.key == 'Enter' ? this.form.submit() : ''"
		    		value="<?php echo $this->input->get('form_id') ?? '';?>">
	    	</div>

	    	<div class="col-md-3 col-lg-3 col-sm-12 mt-2">
	    		<input type="text" 
	    			class="form-control" 
	    			placeholder="Ke id" 
	    			name="to_id"
	    			onkeypress="event.key == 'enter' || event.key == 'Enter' ? this.form.submit() : ''"
		    		value="<?php echo $this->input->get('to_id') ?? '';?>">
	    	</div>

	    	<div class="col-md-3 col-lg-3 col-sm-12 mt-2">
	    		<input type="text" 
	    			class="form-control" 
	    			placeholder="Kontent" 
	    			name="content"
	    			onkeypress="event.key == 'enter' || event.key == 'Enter' ? this.form.submit() : ''"
	    			value="<?php echo $this->input->get('content') ?? '';?>">
	    	</div>

	    	<div class="col-md-3 col-lg-3 col-sm-12 mt-2">
	    		<input type="text" 
	    			class="form-control" 
	    			placeholder="Search Tgl"
	    			name="search_created_at"
	    			id="search-created-at">
	    	</div>		    	

	    	<div class="col-md-3 col-lg-3 col-sm-12 mt-2">
	    		<a class="btn btn-info" 
	    			href="<?php echo site_url();?>/admin/notif-admin">
	    			<i class="fa fa-redo"></i>
	    			Reset
	    		</a>
	    	</div>
	    </div>
	</form>
</div>