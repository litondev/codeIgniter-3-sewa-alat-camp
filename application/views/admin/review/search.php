<div class="card shadow mb-4">
	<form
		action="<?php echo site_url();?>/admin/review"
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
	    			placeholder="Nama Product" 
	    			name="product_name"
	    			onkeypress="event.key == 'enter' || event.key == 'Enter' ? this.form.submit() : ''"
	    			value="<?php echo $this->input->get('product_name') ?? '';?>">
	    	</div>

	    	<div class="col-md-3 col-lg-3 col-sm-12 mt-2">
	    		<input type="text" 
	    			class="form-control" 
	    			placeholder="Nama User" 
	    			name="first_name"
	    			onkeypress="event.key == 'enter' || event.key == 'Enter' ? this.form.submit() : ''"
	    			value="<?php echo $this->input->get('first_name') ?? '';?>">
	    	</div>

	    	<div class="col-md-3 col-lg-3 col-sm-12 mt-2">
	    		<input type="text" 
	    			class="form-control" 
	    			placeholder="Komentar" 
	    			name="komentar"
	    			onkeypress="event.key == 'enter' || event.key == 'Enter' ? this.form.submit() : ''"
	    			value="<?php echo $this->input->get('komentar') ?? '';?>">
	    	</div>

			<div class="col-md-3 col-lg-3 col-sm-12 mt-2">
	    		<select
	    			name="star"
	    			class="form-control"
	    			onchange="this.form.submit()">
	    				<option value="">Pilih</option>
	    				<option value="1" <?php echo $this->input->get('star') && $this->input->get('star') == '1' ? 'selected' : '';?>>Bintang 1</option>
		    			<option value="2" <?php echo $this->input->get('star') && $this->input->get('star') == '2' ? 'selected' : '';?>>Bintang 2</option>
		    			<option value="3" <?php echo $this->input->get('star') && $this->input->get('star') == '3' ? 'selected' : '';?>>Bintang 3</option>
		    			<option value="4" <?php echo $this->input->get('star') && $this->input->get('star') == '4' ? 'selected' : '';?>>Bintang 4</option>
		    			<option value="5" <?php echo $this->input->get('star') && $this->input->get('star') == '5' ? 'selected' : '';?>>Bintang 5</option>
	    		</select>
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
	    			href="<?php echo site_url();?>/admin/review">
	    			<i class="fa fa-redo"></i>
	    			Reset
	    		</a>
	    	</div>
	    </div>
	</form>
</div>