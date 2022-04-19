<?php
class user extends CI_Controller{
	
	function __construct(){
		parent::__construct();
		if($this->session->userdata('logged') !=TRUE){
            $url=base_url('administrator');
            redirect($url);
        };
		$this->load->model('user_model','user_model');
		$this->load->library('upload');
		$this->load->helper('text');
	}

	function index(){
		$x['data']=$this->user_model->get_user();
		$this->load->view('template/template_v', 'user/user_view',$x);
		$this->load->helper('text');
	}

	function insert(){
		$nama=htmlspecialchars($this->input->post('nama',TRUE),ENT_QUOTES);
		$email=htmlspecialchars($this->input->post('email',TRUE),ENT_QUOTES);
		$pass=htmlspecialchars($this->input->post('password',TRUE),ENT_QUOTES);
		$pass2=htmlspecialchars($this->input->post('password2',TRUE),ENT_QUOTES);
		$level=htmlspecialchars($this->input->post('level',TRUE),ENT_QUOTES);
		
		$config['upload_path'] = './uploads/user'; //path folder
	    $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
	    $config['encrypt_name'] = TRUE; //nama yang terupload nantinya
	    
	    $this->upload->initialize($config);
	    $cek_email = $this->user_model->validasi_email($email);
	    if($cek_email->num_rows() > 0){
	    	echo $this->session->set_flashdata('msg','error-email');
			redirect('user');
	    }else{
	    	if($pass == $pass2){
		    	if(!empty($_FILES['filefoto']['name'])){
			        if ($this->upload->do_upload('filefoto')){
			            $gbr = $this->upload->data();
		                //Compress Image
		                $config['image_library']='gd2';
		                $config['source_image']='./uploads/user/'.$gbr['file_name'];
		                $config['create_thumb']= FALSE;
		                $config['maintain_ratio']= FALSE;
		                $config['quality']= '60%';
		                $config['width']= 100;
		                $config['height']= 100;
		                $config['new_image']= './uploads/user/'.$gbr['file_name'];
		                $this->load->library('image_lib', $config);
		                $this->image_lib->resize();

			            $gambar=$gbr['file_name'];		
						$this->user_model->insert_user($nama,$email,$pass,$level,$gambar);
						echo $this->session->set_flashdata('msg','success');
						redirect('user');
					}else{
			            echo $this->session->set_flashdata('msg','error-img');
			            redirect('user');
			    	}
			                 
			    }else{
					$this->user_model->insert_user_noimg($nama,$email,$pass,$level);
					echo $this->session->set_flashdata('msg','success');
					redirect('user');
				}
		    }else{
		    	echo $this->session->set_flashdata('msg','error');
				redirect('user');
		    }
	    }
		    
	}

	function update(){
		$id_user=$this->input->post('id_user',TRUE);
		$nama=htmlspecialchars($this->input->post('nama',TRUE),ENT_QUOTES);
		$email=htmlspecialchars($this->input->post('email',TRUE),ENT_QUOTES);
		$pass=htmlspecialchars($this->input->post('password',TRUE),ENT_QUOTES);
		$pass2=htmlspecialchars($this->input->post('password2',TRUE),ENT_QUOTES);
		$level=htmlspecialchars($this->input->post('level',TRUE),ENT_QUOTES);
		
		$config['upload_path'] = './uploads/user'; //path folder
	    $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
	    $config['encrypt_name'] = TRUE; //nama yang terupload nantinya
	    
	    $this->upload->initialize($config);
	    $cek_email = $this->user_model->validasi_email($email);
	    if($cek_email->num_rows() > 0){
	    	$row = $cek_email->row();
	    	$id_user = $row->id_user;
	    	if($id_user <> $id_user){
	    		echo $this->session->set_flashdata('msg','error-email');
				redirect('user');
	    	}else{
			    if(empty($pass) || empty($pass2)){
			    	if(!empty($_FILES['filefoto']['name'])){
				        if ($this->upload->do_upload('filefoto')){
				            $gbr = $this->upload->data();
			                //Compress Image
			                $config['image_library']='gd2';
			                $config['source_image']='./uploads/user/'.$gbr['file_name'];
			                $config['create_thumb']= FALSE;
			                $config['maintain_ratio']= FALSE;
			                $config['quality']= '60%';
			                $config['width']= 100;
			                $config['height']= 100;
			                $config['new_image']= './uploads/user/'.$gbr['file_name'];
			                $this->load->library('image_lib', $config);
			                $this->image_lib->resize();

				            $gambar=$gbr['file_name'];		
							$this->user_model->update_user_nopass($id_user,$nama,$email,$level,$gambar);
							echo $this->session->set_flashdata('msg','info');
							redirect('user');
						}else{
				            echo $this->session->set_flashdata('msg','error-img');
				            redirect('user');
				    	}
				                 
				    }else{
						$this->user_model->update_user_nopassimg($id_user,$nama,$email,$level);
						echo $this->session->set_flashdata('msg','info');
						redirect('user');
					}
			    }else{
			    	if($pass == $pass2){
				    	if(!empty($_FILES['filefoto']['name'])){
					        if ($this->upload->do_upload('filefoto')){
					            $gbr = $this->upload->data();
				                //Compress Image
				                $config['image_library']='gd2';
				                $config['source_image']='./uploads/user/'.$gbr['file_name'];
				                $config['create_thumb']= FALSE;
				                $config['maintain_ratio']= FALSE;
				                $config['quality']= '60%';
				                $config['width']= 100;
				                $config['height']= 100;
				                $config['new_image']= './uploads/user/'.$gbr['file_name'];
				                $this->load->library('image_lib', $config);
				                $this->image_lib->resize();

					            $gambar=$gbr['file_name'];		
								$this->user_model->update_user($id_user,$nama,$email,$pass,$level,$gambar);
								echo $this->session->set_flashdata('msg','info');
								redirect('user');
							}else{
					            echo $this->session->set_flashdata('msg','error-img');
					            redirect('user');
					    	}
					                 
					    }else{
							$this->user_model->update_user_noimg($id_user,$nama,$email,$pass,$level);
							echo $this->session->set_flashdata('msg','info');
							redirect('user');
						}
				    }else{
				    	echo $this->session->set_flashdata('msg','error');
						redirect('user');
				    }
			    }
			}
	    	
	    }else{
		    if(empty($pass) || empty($pass2)){
		    	if(!empty($_FILES['filefoto']['name'])){
			        if ($this->upload->do_upload('filefoto')){
			            $gbr = $this->upload->data();
		                //Compress Image
		                $config['image_library']='gd2';
		                $config['source_image']='./uploads/user/'.$gbr['file_name'];
		                $config['create_thumb']= FALSE;
		                $config['maintain_ratio']= FALSE;
		                $config['quality']= '60%';
		                $config['width']= 100;
		                $config['height']= 100;
		                $config['new_image']= './uploads/user/'.$gbr['file_name'];
		                $this->load->library('image_lib', $config);
		                $this->image_lib->resize();

			            $gambar=$gbr['file_name'];		
						$this->user_model->update_user_nopass($id_user,$nama,$email,$level,$gambar);
						echo $this->session->set_flashdata('msg','info');
						redirect('user');
					}else{
			            echo $this->session->set_flashdata('msg','error-img');
			            redirect('user');
			    	}
			                 
			    }else{
					$this->user_model->update_user_nopassimg($id_user,$nama,$email,$level);
					echo $this->session->set_flashdata('msg','info');
					redirect('user');
				}
		    }else{
		    	if($pass == $pass2){
			    	if(!empty($_FILES['filefoto']['name'])){
				        if ($this->upload->do_upload('filefoto')){
				            $gbr = $this->upload->data();
			                //Compress Image
			                $config['image_library']='gd2';
			                $config['source_image']='./uploads/user/'.$gbr['file_name'];
			                $config['create_thumb']= FALSE;
			                $config['maintain_ratio']= FALSE;
			                $config['quality']= '60%';
			                $config['width']= 100;
			                $config['height']= 100;
			                $config['new_image']= './uploads/user/'.$gbr['file_name'];
			                $this->load->library('image_lib', $config);
			                $this->image_lib->resize();

				            $gambar=$gbr['file_name'];		
							$this->user_model->update_user($id_user,$nama,$email,$pass,$level,$gambar);
							echo $this->session->set_flashdata('msg','info');
							redirect('user');
						}else{
				            echo $this->session->set_flashdata('msg','error-img');
				            redirect('user');
				    	}
				                 
				    }else{
						$this->user_model->update_user_noimg($id_user,$nama,$email,$pass,$level);
						echo $this->session->set_flashdata('msg','info');
						redirect('user');
					}
			    }else{
			    	echo $this->session->set_flashdata('msg','error');
					redirect('user');
			    }
		    }
		}

	}

	function lock(){
		$id_user=$this->uri->segment(4);
		$this->user_model->lock_user($id_user);
		redirect('user');
	}

	function unlock(){
		$id_user=$this->uri->segment(4);
		$this->user_model->unlock_user($id_user);
		redirect('user');
	}

	function delete(){
		$id_user=$this->input->post('kode',TRUE);
		$this->user_model->delete_user($id_user);
		echo $this->session->set_flashdata('msg','success-hapus');
		redirect('user');
	}


}