<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class All extends CI_Controller {
	

	public function __construct()
    {
		parent::__construct();
		$this->load->model('Models_model');
		$this->load->helper('helpers');
		$this->load->helper('url');
	}
	
	public function index()
	{
		$this->load->view('layouts/header');
		$this->load->view('welcome');
		$this->load->view('layouts/footer');
	}

	public function manager()
	{
		LoginCheck();
		$this->load->view('layouts/header');
		$this->load->view('manager');
		$this->load->view('layouts/footer');
	}

	public function nuestros_servicios()
	{
		$this->load->view('layouts/header');
		$this->load->view('nuestros_servicios');
		$this->load->view('layouts/footer');
	}

	public function contacto()
	{
		$this->load->view('layouts/header');
		$this->load->view('contacto');
		$this->load->view('layouts/footer');
	}

	public function magazine()
	{
		$this->load->view('layouts/header');
		$this->load->view('magazine');
		$this->load->view('layouts/footer');
	}

	public function view_category()
	{
		//echo $_GET["id"];
		$this->load->view('layouts/header');
		$this->load->view('view_category');
		$this->load->view('layouts/footer');
	}

	public function login()
	{
		if ($this->session->userdata('username'))
		{
			redirect('All/manager');
		}

		if (isset($_POST['username']))
		{
			$username = $_POST['username'];
			$password = $_POST['password'];
			if ($this->Models_model->login($username,$password))
			{
				redirect('All/manager');
			}
			else
			{
				redirect('All/login#bad_password');
			}
		}
		
		$this->load->view('layouts/header');
		$this->load->view('login');
		$this->load->view('layouts/footer');
	}

	public function login_close ()
	{
		$this->session->sess_destroy();
		redirect('');
	}

	public function clients_gestionar()
	{
		LoginCheck();
		$buscar = $this->input->get('search');
		$pag = $this->input->get('pag');
		$limit = '';
		if (is_null($pag))
		{
			$pag = 1;
		}

		if (!is_null($buscar))
		{
			$TotalPags = number_format($this->db->query('SELECT cl.id FROM clients cl, categories ca where cl.category = ca.id and cl.empresa like "%'.$buscar.'%" or cl.category = ca.id and cl.responsable like "%'.$buscar.'%"')->num_rows() / 10, 0, '', ' ');
		}else
		{
			$TotalPags = number_format($this->db->query('SELECT id FROM clients')->num_rows() / 10, 0, '', ' ');
		}
		
		
		$limit = 'LIMIT '.(($pag * 10) - 10).', 10;';
		$data['pags'] = $TotalPags;
		$data['pag'] = $pag;

		if (!is_null($buscar))
		{
			$data['data'] = $this->db->query('SELECT cl.id, ca.name, cl.empresa, cl.active, cl.direccion, cl.mail, cl.telefono, cl.responsable, ca.id as "id_cat", cl.premium5 FROM clients cl, categories ca where cl.category = ca.id and cl.empresa like "%'.$buscar.'%" or cl.category = ca.id and cl.responsable like "%'.$buscar.'%" '. $limit.' ')->result();
		}else
		{
			$data['data'] = $this->db->query('SELECT cl.id, ca.name, cl.empresa, cl.active, cl.direccion, cl.mail, cl.telefono, cl.responsable, ca.id as "id_cat", cl.premium5 FROM clients cl, categories ca where cl.category = ca.id '.$limit.' ')->result();
		}
		
		
		
		$this->load->view('layouts/header');
		$this->load->view('clients_gestionar', $data);
		$this->load->view('layouts/footer');
	}
	
	public function client_add ()
	{
		LoginCheck();
		$url = $this->input->post('url');
		
		$data = array(
			'category' => $this->input->post('category'),
			'empresa'  => $this->input->post('empresa'),
			'active'  => true,
			'direccion'  => $this->input->post('direccion'),
			'mail'  => $this->input->post('email'),
			'telefono'  => $this->input->post('telefono'),
			'responsable'  => $this->input->post('responsable')
		);
		
		$this->db->insert('clients',$data);

		if ($this->db->affected_rows() >= 1 )
		{
			redirect($url.'?clientaddtrue=true');
		}else
		{
			redirect($url.'?clientaddfalse=false');
		}

	}

	public function client_update ()
	{
		LoginCheck();
		$url = $this->input->post('url');
		$status = 0;
		$status_premium = 0;
		
		if (!is_null($this->input->post('estatus')))
		{
			$status = 1;
		}

		if (!is_null($this->input->post('premium5')))
		{
			$status_premium = 1;
		}


		$data = array(
				'category' => $this->input->post('category'),
				'empresa' => $this->input->post('empresa'),
				'active' => $status,
				'direccion' => $this->input->post('direccion'),
				'mail' => $this->input->post('email'),
				'telefono' => $this->input->post('telefono'),
				'responsable' => $this->input->post('responsable'),
				'premium5' => $status_premium
		);
		
		$this->db->where('id', $this->input->post('id'))->update('clients', $data);

		if ($this->db->affected_rows() >= 1 )
		{
			redirect($url.'?clientaupdatetrue=true');
		}else
		{
			redirect($url.'?clientupdatefalse=false');
		}

	}

	public function client_delete ()
	{
		LoginCheck();
		$url = $this->input->post('url');
		
		$this->db->where('id', $this->input->post('id'))->delete('clients');

		if ($this->db->affected_rows() >= 1 )
		{
			redirect($url.'?clientadeletetrue=true');
		}else
		{
			redirect($url.'?clientdeletefalse=false');
		}

	}

	public function clients_administrar()
	{
		$id = $this->input->get('id');
		$data['item'] = $this->db->query('SELECT cl.id, ca.name, cl.empresa, cl.active, cl.direccion, cl.mail, cl.telefono, cl.responsable, ca.id as "id_cat", cl.premium5 FROM clients cl, categories ca where cl.category = ca.id and cl.id = '.$id.' ')->row();

		$data['gallery'] = $this->db->query('SELECT * FROM empresa_gallery where empresa = '.$id.' order by id desc ')->result();
		
		$this->load->view('layouts/header');
		$this->load->view('clients_administrar', $data);
		$this->load->view('layouts/footer');
	}

	public function clients_administrar_img_add()
	{
		LoginCheck();
		$url = $this->input->post('url');
		$id_empresa = $this->input->post('id_empresa');
		$premium = 0;
		
		if (!is_null($this->input->post('premium')))
		{
			$premium = 1;
		}
		
		$extencion = pathinfo($_FILES["img"]["name"], PATHINFO_EXTENSION);
		$config['upload_path'] = "././public/images/clients/";
		$config['allowed_types'] = 'gif|jpg|png|jpeg';
		$config['file_name'] = $id_empresa.'_'. date("YmdHis").'.'.$extencion;
		$config['max_size'] = '5000';
		$config['max_width']  = '5024';
		$config['max_height']  = '5768';

		$this->load->library('upload', $config);
		
		if ( ! $this->upload->do_upload('img'))
		{
			/*Existe error al tratar de subir imagen*/
			//echo $this->upload->display_errors();
			redirect($url.'?id='.$id_empresa.'&clientaddimgnoupdate=false');
		}else
		{
			$data = array(
				'empresa' => $id_empresa,
				'url'  => '../../public/images/clients/'.$config['file_name'],
				'url_img'  => '../../public/images/clients/'.$config['file_name'],
				'premium'  => $premium,
				'title'  => $this->input->post('title'),
				'descripcion'  => $this->input->post('descripcion'),
				'tags'  => $this->input->post('tags')
			);
			
			$this->db->insert('empresa_gallery',$data);
	
			if ($this->db->affected_rows() >= 1 )
			{
				redirect($url.'?id='.$id_empresa.'&clientaddimgtrue=true');
			}else
			{
				unlink('../../public/images/clients/'.$config['file_name']);
				redirect($url.'?id='.$id_empresa.'&clientaddimgfalse=false');
			}
		}

	}
	
	public function clients_administrar_img_Update()
	{
		LoginCheck();
		$url = $this->input->post('url');
		$id_empresa = $this->input->post('id_empresa');
		$premium = 0;
		
		if (!is_null($this->input->post('premium')))
		{
			$premium = 1;
		}


		$data = array(
				'descripcion' => $this->input->post('descripcion'),
				'tags' => $this->input->post('tags'),
				'title' => $this->input->post('title'),
				'premium' => $premium
		);
		
		$this->db->where('id', $this->input->post('id'))->update('empresa_gallery', $data);

		if ($this->db->affected_rows() >= 1 )
		{
			redirect($url.'?id='.$id_empresa.'&img_clients_update_true=true');
		}else
		{
			redirect($url.'?id='.$id_empresa.'&img_clients_update_false=false');
		}
	}

	public function clients_administrar_img_delete ()
	{
		LoginCheck();
		$url = $this->input->post('url');
		$id_empresa = $this->input->post('id_empresa');

		$this->db->where('id', $this->input->post('id'))->delete('empresa_gallery');

		if ($this->db->affected_rows() >= 1 )
		{
			unlink($this->input->post('url_foto'));
			redirect($url.'?id='.$id_empresa.'&img_clients_delete_true=true');
		}else
		{
			redirect($url.'?id='.$id_empresa.'&img_clients_delete_false=false');
		}
	}

	public function clients_administrar_vdo_add ()
	{
		LoginCheck();
		$url = $this->input->post('url');
		$premium = 0;
		
		if (!is_null($this->input->post('premium')))
		{
			$premium = 1;
		}

		// YouTube video url
		$videoURL = $this->input->post('url_vdo');
		$urlArr = explode("/",$videoURL);
		$urlArrNum = count($urlArr);

		// Youtube video ID
		$youtubeVideoId = $urlArr[$urlArrNum - 1];
		// Generate youtube thumbnail url
		$url_img = 'http://img.youtube.com/vi/'.str_replace('watch?v=','',$youtubeVideoId).'/mqdefault.jpg';
		$newfile = '././public/images/clients/'.$this->input->post('id_empresa').'_'. date("YmdHis").'.'.'jpg';
		$img_db = '../../public/images/clients/'.$this->input->post('id_empresa').'_'. date("YmdHis").'.'.'jpg';

		
		if ( copy($url_img, $newfile) ) {
			$data = array(
				'empresa' => $this->input->post('id_empresa'),
				'url'  => $this->input->post('url_vdo'),
				'url_img'  => $img_db,
				'premium'  => $premium,
				'title'  => $this->input->post('title'),
				'descripcion'  => $this->input->post('descripcion'),
				'tags'  => $this->input->post('tags')
			);
			
			$this->db->insert('empresa_gallery',$data);
	
			if ($this->db->affected_rows() >= 1 )
			{
				redirect($url.'?id='.$this->input->post('id_empresa').'&clientaddvdotrue=true');
			}else
			{
				redirect($url.'?id='.$this->input->post('id_empresa').'&clientaddvdofalse=false');
			}
		}else{
			redirect($url.'?id='.$this->input->post('id_empresa').'&clientaddvdofalse=false');
		}

	}

	public function clients_administrar_sendmail ()
	{
		$url = $this->input->post('url');
		$url_web = 'http://localhost/';

		$this->load->library("email");
 
		//configuracion para gmail
		$configGmail = array(
		'protocol' => 'smtp',
		'smtp_host' => 'ssl://smtp.gmail.com',
		'smtp_port' => 465,
		'smtp_user' => 'documentos@cyberchoapas.com',
		'smtp_pass' => 'Zxasqw10',
		'mailtype' => 'html',
		'charset' => 'utf-8',
		'newline' => "\r\n"
		);    
		$this->email->initialize($configGmail);
		
		$body = '
			<h2>'.$this->input->post('descripcion').'</h2>
			<a target="_blank" href="'.$this->input->post('url_cont').'"><img src="'.str_replace('../../',$url_web,$this->input->post('url_image')).'" alt="'.$this->input->post('title').'"></a>
			<br><br>
			Tambien puedes ver toda la galeria de '.NameEmpresaID($this->input->post('id_empresa')).' <a href="'.$url_web. 'index.php/all/clients_administrar?id='.$this->input->post('id_empresa').'" target="_blank"> AQUI</a>
			<br><br>
			O todas nuestras empresas <a href="'.$url_web. 'index.php/all/view_category" target="_blank"> AQUI</a>
		';
		
		$this->email->from("Link u Projects");
		$this->email->to($this->input->post('emails'));
		$this->email->subject($this->input->post('title') . ' !' );
		$this->email->message($body);
		
		if ($this->email->send())
		{
			redirect($url.'?id='.$this->input->post('id_empresa').'&sendmailtrue=true');
		}else
		{
			redirect($url.'?id='.$this->input->post('id_empresa').'&sendmailfalse=false');
		}
	}
}
?>