<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class AdminProductCreateController extends CI_Controller{
	public function __construct(){
		parent::__construct();

    	if(!$this->LSession->user()){
      		redirect("/");
    	}

    	if($this->LSession->user()['role'] != "admin"){
    		redirect("/");
    	}
	}

	public function index(){
		$category = $this->MCategory->all();

        $this->LTemplate->headerAdmin();

        $this->load->view("admin/product-create",[
        	"category" => $category
        ]);
        
        $this->LTemplate->footerAdmin();
	}

	public function add(){
		$this->form_validation->set_rules(
			'name','Nama','required',[
				'required' => '%s harus diisi'
			]
		);

		$this->form_validation->set_rules(
			'rent_price','Harga Sewa','required',[
				'required' => '%s harus diisi'
			]
		);

		$this->form_validation->set_rules(
			'category_id','Kategori','required|integer',[
				'required' => '%s harus diisi',
				'integer' => '%s tidak valid'
		]);

		$this->form_validation->set_rules(
			'description','Deskripsi','required',[
				'required' => '%s harus diisi'
		]);

        $this->form_validation->set_rules(
			'condition','Kondisi','required',[
				'required' => '%s harus diisi',				
		]);

		$this->form_validation->set_rules(
			'fine','Denda','required',[
				'required' => '%s harus diisi'
		]);

		$this->form_validation->set_rules(
			'question','Pertanyaan','required',[
				'required' => '%s harus diisi'
		]);

        if ($this->form_validation->run() == FALSE){
        	$theError = $this->form_validation->error_array();
        	$keyArray = array_keys($theError);
        	$this->LRedirect->backWith("error",[
        		"text" => $theError[$keyArray[0]],
        		"title" => "Terjadi Kesalahan"
        	]);
        }

        // VALIDASI CATEGORY
        if(!$this->MCategory->first_id($this->input->post('category_id'))){
        	$this->LRedirect->backWith("error",[
        		"text" => "Category id tidak valid",
        		"title" => "Terjadi Kesalahan"
        	]);
        }

        // VALIDASI IMAGE1
        $isValidImage = $this->LValidateImage->isValid($_FILES['image1'],[
            "required" => true, 
        ]);

        if($isValidImage){
            $this->LRedirect->backWith("error",$isValidImage);
        }

        // VALIDASI IMAGE2        
        if(!empty($_FILES['image2']['name'])){
        	$isValidImage = $this->LValidateImage->isValid($_FILES['image2'],[
        		'required' => true
        	]);

        	if($isValidImage){
        		$this->LRedirect->backWith("error",$isValidImage);
        	}
        }

        // VALIDASI IMAGE3
        if(!empty($_FILES['image3']['name'])){
        	$isValidImage = $this->LValidateImage->isValid($_FILES['image3'],[
        		'required' => true
        	]);

        	if($isValidImage){
        		$this->LRedirect->backWith("error",$isValidImage);
        	}
        }

        $payload = $this->input->post(['name','category_id','description','condition','fine','question']);
        $payload['rent_price'] = intval(str_replace(".", "", $this->input->post('rent_price')));
        $payload['status'] = 'aktif';

        $images = [];

	    $nameFile1 = random_string('alpha',20);
        $extension1 = substr($_FILES['image1']['name'], -3);
        $theNameFile1 = $nameFile1.".".$extension1;
        array_push($images,$theNameFile1);

        if(!empty($_FILES['image2']['name'])){
        	$nameFile2 = random_string('alpha',20);
        	$extension2 = substr($_FILES['image2']['name'], -3);
        	$theNameFile2 = $nameFile2.".".$extension2;
        	array_push($images,$theNameFile2);
        }

        if(!empty($_FILES['image3']['name'])){
			$nameFile3 = random_string('alpha',20);
        	$extension3 = substr($_FILES['image3']['name'], -3);
        	$theNameFile3 = $nameFile3.".".$extension3;
        	array_push($images,$theNameFile3);
        }

        $payload["images"] = json_encode($images);

        $this->db->trans_start();

        if($this->MProduct->create($payload)["success"]){
        	$path1 = "./assets/images/products/".$theNameFile1;        
            move_uploaded_file($_FILES["image1"]["tmp_name"], $path1);

        	if(!empty($_FILES['image2']['name'])){
            	$path2 = "./assets/images/products/".$theNameFile2;
            	move_uploaded_file($_FILES["image2"]["tmp_name"], $path2);
            }

        	if(!empty($_FILES['image3']['name'])){
	  			$path3 = "./assets/images/products/".$theNameFile3;
            	move_uploaded_file($_FILES["image3"]["tmp_name"], $path3);
            }

            $this->db->trans_complete();

        	$this->LRedirect->backWith("success",[
        		"title" => "Berhasil",
        		"text" => "Berhasil membuat product"
        	]);
        }

        $this->LRedirect->backWith("error",[
        	"title" => "Terjadi Kesalahan",
        	"text" => "Tidak dapat membuat product"
        ]);
	}
}