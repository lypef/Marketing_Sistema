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
		$pag = $this->input->get('pag');
		$img = $this->input->get('id_img');
		$limit = '';
		
		if (is_null($pag))
		{
			$pag = 1;
		}
		
		$TotalPags = number_format($this->db->query('SELECT id FROM magazine')->num_rows() / 4, 0, '', ' ');

		$limit = 'LIMIT '.(($pag * 4) - 4).', 4;';
		$data['pags'] = $TotalPags;
		$data['pag'] = $pag;

		$data['data'] = $this->db->query('SELECT * FROM magazine ORDER BY f_publicacion DESC  '.$limit.' ')->result();
		
		if ($img > 0 && !is_null($img))
		{
			$data['select'] = $this->db->query('SELECT * FROM magazine where id = '.$img.' ')->row();
		}

		$this->load->view('layouts/header');
		$this->load->view('magazine', $data);
		$this->load->view('layouts/footer');
	}

	public function magazine_add()
	{
		LoginCheck();
		$url = $this->input->post('url');
		$id_img = $this->input->post('id_img');
		$pag = $this->input->post('pag');
		
		//subir imagen
		$extencion = pathinfo($_FILES["img"]["name"], PATHINFO_EXTENSION);
		$config['upload_path'] = "././public/images/magazine/";
		$config['allowed_types'] = 'gif|jpg|png|jpeg';
		$config['file_name'] = 'magazine_'. date("YmdHis").'.'.$extencion;
		$config['max_size'] = '5000';
		$config['max_width']  = '5024';
		$config['max_height']  = '5768';

		$this->load->library('upload', $config);
		
		if ( ! $this->upload->do_upload('img'))
		{
			/*Existe error al tratar de subir imagen*/
			//echo $this->upload->display_errors();
			redirect($url.'?magazineaddfalse=false&id_img=0&pag='.$pag.'');
		}else
		{
			$data = array(
				'nombre' => $this->input->post('nombre'),
				'numero' => $this->input->post('numero'),
				'url_img' => '../../public/images/magazine/'.$config['file_name'],
				'f_publicacion' => $this->input->post('f_publicacion')
			);

			$this->db->insert('magazine',$data);

			if ($this->db->affected_rows() >= 1 )
			{
				redirect($url.'?magazineaddtrue=true&id_img=0&pag='.$pag.'');
			}else
			{
				redirect($url.'?magazineaddfalse=false&id_img='.$id_img.'&pag='.$pag.'');
			}
		}
	}

	public function magazine_update()
	{
		LoginCheck();
		$url = $this->input->post('url');
		$id_img = $this->input->post('id_img');
		$pag = $this->input->post('pag');
		$id = $this->input->post('id');
		
		$data = array(
				'nombre' => $this->input->post('nombre'),
				'numero' => $this->input->post('numero'),
				'f_publicacion' => $this->input->post('f_publicacion')
		);
		
		$this->db->where('id', $this->input->post('id'))->update('magazine', $data);

		if ($this->db->affected_rows() >= 1 )
		{
			redirect($url.'?magazineupdatetrue=true&id_img='.$id_img.'&pag='.$pag.'');
		}else
		{
			redirect($url.'?magazineupdatefalse=false&id_img='.$id_img.'&pag='.$pag.'');
		}
	}

	public function magazine_delete()
	{
		LoginCheck();
		$url = $this->input->post('url');
		$id_img = $this->input->post('id_img');
		$pag = $this->input->post('pag');

		$this->db->where('id', $this->input->post('id'))->delete('magazine');

		if ($this->db->affected_rows() >= 1 )
		{
			redirect($url.'?magazinedeletetrue=true&id_img=0&pag='.$pag.'');
		}else
		{
			redirect($url.'?magazinedeletefalse=false&id_img='.$id_img.'&pag='.$pag.'');
		}
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

	public function view_category()
	{
		$category =  $_GET["id"];
		$pag = $this->input->get('pag');
		$buscar = $this->input->get('search');
		$limit = '';

		if (is_null($pag))
		{
			$pag = 1;
		}

		if ($category > 0)
		{
			$TotalPags = number_format($this->db->query('SELECT ga.id FROM empresa_gallery ga, clients cl WHERE ga.empresa = cl.id and cl.category = '.$category.' ')->num_rows() / 10, 0, '', ' ');
		}
		else if (!is_null($buscar))
		{
			$like = "'%" .$buscar. "%'";
			$TotalPags = number_format($this->db->query('SELECT ga.id FROM empresa_gallery ga, clients cl WHERE ga.empresa = cl.id and cl.empresa like '.$like.' or ga.empresa = cl.id and ga.title like '.$like.' or ga.empresa = cl.id and ga.descripcion like '.$like.' ')->num_rows() / 10, 0, '', ' ');
		}
		else
		{
			$TotalPags = number_format($this->db->query('SELECT id FROM empresa_gallery')->num_rows() / 10, 0, '', ' ');
		}

		$limit = 'LIMIT '.(($pag * 9) - 9).', 9;';
		$data['pags'] = $TotalPags;
		$data['pag'] = $pag;

		if ($category > 0)
		{
			$data['data'] = $this->db->query('SELECT ga.id, ga.url, ga.url_img, ga.title, ga.descripcion, cl.category, cl.empresa, ga.premium, cl.id as cl_id_empresa FROM empresa_gallery ga, clients cl WHERE ga.empresa = cl.id and cl.category = '.$category .' '. $limit.' ')->result();
		}
		else if (!is_null($buscar))
		{
			$like = "'%" .$buscar. "%'";
			$data['data'] = $this->db->query('SELECT ga.id, ga.url, ga.url_img, ga.title, ga.descripcion, cl.category, cl.empresa, ga.premium, cl.id as cl_id_empresa FROM empresa_gallery ga, clients cl WHERE ga.empresa = cl.id and cl.empresa like '.$like.' or ga.empresa = cl.id and ga.title like '.$like.' or ga.empresa = cl.id and ga.descripcion like '.$like. ' ' . $limit .' ')->result();
		}
		else
		{
			$data['data'] = $this->db->query('SELECT ga.id, ga.url, ga.url_img, ga.title, ga.descripcion, cl.category, cl.empresa, ga.premium, cl.id as cl_id_empresa FROM empresa_gallery ga, clients cl WHERE ga.empresa = cl.id  '.$limit.' ')->result();
		}

		
		$this->load->view('layouts/header');
		$this->load->view('view_category', $data);
		$this->load->view('layouts/footer');
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

	public function servicio_inteserado ()
	{
		$url = $this->input->post('url');
		$url_web = 'http://localhost/';

		$this->load->library("email");
 
		//configuracion para gmail
		$configGmail = array(
		'protocol' => 'smtp',
		'smtp_host' => 'ssl://smtp.gmail.com',
		'smtp_port' => $this->config->item('correo_port'),
		'smtp_user' => $this->config->item('correo_smtp'),
		'smtp_pass' => $this->config->item('correo_pass'),
		'mailtype' => 'html',
		'charset' => 'utf-8',
		'newline' => "\r\n"
		);  

		$this->email->initialize($configGmail);
		
		$body = $this->input->post('comentario') . '
			<br><br>Nombre<br>'.$this->input->post('nombre').'
			<br><br>Empresa:<br>'.$this->input->post('empresa').'
			<br><br>Sitio web:<br><a href="'.$this->input->post('web').'">'.$this->input->post('web').'</a>
			<br><br>Email:<br><a href="mailto:'.$this->input->post('email').'" target="_top">'.$this->input->post('email').'</a>
			<br><br>Telefono:<br>'.$this->input->post('telefono').'
		';
		
		$this->email->from($this->config->item('correo_smtp'),$this->input->post('nombre'));
		$this->email->reply_to($this->input->post('email'), $this->input->post('nombre'));
		$this->email->to($this->config->item('correo_recepcion'));
		$this->email->subject($this->input->post('asunto') . ' !' );
		$this->email->message($body);
		
		if ($this->email->send())
		{
			redirect($url.'?sendmailserviciotrue=true');
		}else
		{
			redirect($url.'?sendmailserviciofalse=false');
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
		'smtp_port' => $this->config->item('correo_port'),
		'smtp_user' => $this->config->item('correo_smtp'),
		'smtp_pass' => $this->config->item('correo_pass'),
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
			O todas nuestras empresas <a href="'.$url_web. 'index.php/all/view_category?id=0&pag=1" target="_blank"> AQUI</a>
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

	public function category_administrar_sendmail ()
	{
		$url = $this->input->post('url');
		$url_web = 'http://localhost/';

		$this->load->library("email");
 
		//configuracion para gmail
		$configGmail = array(
		'protocol' => 'smtp',
		'smtp_host' => 'ssl://smtp.gmail.com',
		'smtp_port' => $this->config->item('correo_port'),
		'smtp_user' => $this->config->item('correo_smtp'),
		'smtp_pass' => $this->config->item('correo_pass'),
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
			O todas nuestras empresas <a href="'.$url_web. 'index.php/all/view_category?id=0&pag=1" target="_blank"> AQUI</a>
		';
		
		$this->email->from("Link u Projects");
		$this->email->to($this->input->post('emails'));
		$this->email->subject($this->input->post('title') . ' !' );
		$this->email->message($body);
		
		if ($this->email->send())
		{
			redirect($url.'?id='.$this->input->post('category').'&sendmailtrue=true');
		}else
		{
			redirect($url.'?id='.$this->input->post('category').'&sendmailfalse=false');
		}
	}
}
?>