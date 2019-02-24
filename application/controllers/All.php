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
		$data['categories'] = $this->db->query('SELECT * FROM `categories`')->result();
		$data['sliders'] = $this->db->query('SELECT * FROM c_zacatecas ORDER BY RAND() LIMIT 8')->result();
		
		$this->load->view('layouts/header');
		$this->load->view('welcome', $data);
		$this->load->view('layouts/footer');
	}

	public function nuestros_servicios()
	{
		$this->load->view('layouts/header');
		$this->load->view('nuestros_servicios');
		$this->load->view('layouts/footer');
	}

	public function c_zacatecas()
	{
		
		$data['data'] = $this->db->query('SELECT * FROM `c_zacatecas` ')->result();

		$this->load->view('layouts/header');
		$this->load->view('c_zacatecas', $data);
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
		
		$TotalPags = number_format($this->db->query('SELECT id FROM magazine')->num_rows() / 6, 0, '', ' ');

		$limit = 'LIMIT '.(($pag * 6) - 6).', 6;';
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
			//chmod($config['upload_path'] . $extencion, 777);
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

	public function gallery_add()
	{
		LoginCheck();
		$url = $this->input->post('url');
		
		//subir imagen
		$extencion = pathinfo($_FILES["img"]["name"], PATHINFO_EXTENSION);
		$config['upload_path'] = "././public/images/gallery/";
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
			//chmod($config['upload_path'] . $extencion, 777);
			redirect($url.'?galleryaddfalse=false');
		}else
		{
			$data = array(
				'title' => $this->input->post('title'),
				'url' => '../../public/images/gallery/'.$config['file_name']
			);

			$this->db->insert('gallery',$data);

			if ($this->db->affected_rows() >= 1 )
			{
				redirect($url.'?id='.$this->db->insert_id().'&galleryaddtrue=true');
			}else
			{
				redirect($url.'?galleryaddfalse=false');
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

	public function gallery_delete()
	{
		LoginCheck();
		$url = $this->input->post('url');
		$id_img = $this->input->post('id');
		$pag = $this->input->post('pag');

		$this->db->where('id', $this->input->post('id'))->delete('gallery');

		if ($this->db->affected_rows() >= 1 )
		{
			redirect($url.'?gallerydeletetrue=true');
		}else
		{
			redirect($url.'?gallerydeletefalse=false');
		}
	}

	public function login()
	{
		if ($this->session->userdata('username'))
		{
			redirect(base_url() . 'all/clients_gestionar');
		}

		if (isset($_POST['username']))
		{
			if ($this->Models_model->login($_POST['username'], $_POST['password']))
			{
				redirect(base_url() . 'all/clients_gestionar');
			}
			else
			{
				redirect(base_url() . 'all/login?loginfalse=true');
			}
		}
		
		$this->load->view('layouts/header');
		$this->load->view('login');
		$this->load->view('layouts/footer');
	}

	public function login_close ()
	{
		$this->session->sess_destroy();
		redirect(base_url());
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
			$TotalPags = number_format($this->db->query('SELECT ga.id FROM empresa_gallery ga, clients cl WHERE ga.empresa = cl.id and cl.category = '.$category.' ')->num_rows() / 9, 0, '', ' ');
		}
		else if (!is_null($buscar))
		{
			$like = "'%" .$buscar. "%'";
			$TotalPags = number_format($this->db->query('SELECT ga.id FROM empresa_gallery ga, clients cl WHERE ga.empresa = cl.id and cl.empresa like '.$like.' or ga.empresa = cl.id and ga.title like '.$like.' or ga.empresa = cl.id and ga.descripcion like '.$like.' ')->num_rows() / 9, 0, '', ' ');
		}
		else
		{
			$TotalPags = number_format($this->db->query('SELECT id FROM empresa_gallery')->num_rows() / 9, 0, '', ' ');
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
			$TotalPags_ = $this->db->query('SELECT cl.id FROM clients cl, categories ca where cl.category = ca.id and cl.empresa like "%'.$buscar.'%" or cl.category = ca.id and cl.responsable like "%'.$buscar.'%"')->num_rows() / 10;
		}else
		{
			$TotalPags_ = $this->db->query('SELECT id FROM clients')->num_rows() / 10;
		}
		
		$TotalPags = number_format($TotalPags_, 0, '', ' ');

		if ($TotalPags_ > $TotalPags) { $TotalPags = $TotalPags + 1; }


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
		$config['max_width']  = '900';
		$config['max_height']  = '600';
		$config['min_width']  = '900';
		$config['min_height']  = '600';

		$this->load->library('upload', $config);
		
		if ( ! $this->upload->do_upload('img'))
		{
			/*Existe error al tratar de subir imagen*/
			//echo $this->upload->display_errors();
			//chmod($config['upload_path'] . $extencion, 777);
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
				//unlink('../../public/images/clients/'.$config['file_name']);
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
			//unlink($this->input->post('url_foto'));
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
		$url_img = 'http://img.youtube.com/vi/'.str_replace('watch?v=','',$youtubeVideoId).'/maxresdefault.jpg';
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

	private function ValidateRecaptcha ($recaptchaResponse, $urls)
	{
		$r = false;

		$recaptchaResponse = trim($recaptchaResponse);
 
        $userIp = $this->input->ip_address();
     
        $secret = $this->config->item('google_secret');

		$url="https://www.google.com/recaptcha/api/siteverify?secret=".$secret."&response=".$recaptchaResponse."&remoteip=".$userIp;
 
        $ch = curl_init(); 
        curl_setopt($ch, CURLOPT_URL, $url); 
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
        $output = curl_exec($ch); 
        curl_close($ch);      
         
        $status= json_decode($output, true);
 
        if ($status['success']) {
            $r = true;
		}else{
			redirect($urls.'?soy_robot=true');
		}

		return $r;
	}

	public function servicio_inteserado ()
	{
		if ($this->ValidateRecaptcha($this->input->post('g-recaptcha-response'), $this->input->post('url') )) {
            $url = $this->input->post('url');
		
			$to = $this->config->item('correo_receptor');

			$subject = $this->input->post('asunto') . ' !' ;

			$headers = "From: " . $this->input->post('email') . "\r\n";
			$headers .= "Reply-To: ". $this->input->post('email') . "\r\n";
			$headers .= "MIME-Version: 1.0\r\n";
			$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";  

			
			$body = $this->input->post('comentario') . '
				<br><br>Nombre<br>'.$this->input->post('nombre').'
				<br><br>Empresa:<br>'.$this->input->post('empresa').'
				<br><br>Sitio web:<br><a href="'.$this->input->post('web').'">'.$this->input->post('web').'</a>
				<br><br>Email:<br><a href="mailto:'.$this->input->post('email').'" target="_top">'.$this->input->post('email').'</a>
				<br><br>Telefono:<br>'.$this->input->post('telefono').'
			';
			
			
			if (mail($to, $subject, $body, $headers))
			{
				redirect($url.'?sendmailserviciotrue=true');
			}else
			{
				redirect($url.'?sendmailserviciofalse=false');
			}
        }
	}
	
	public function category_administrar_sendmail ()
	{
		$url = $this->input->post('url');
		
		$to = $this->input->post('emails');

		$subject = $this->input->post('title') . ' !';

		$headers = "From: " . 'info@linku.com.mx' . "\r\n";
		$headers .= "Reply-To: ". $this->input->post('email') . "\r\n";
		$headers .= "MIME-Version: 1.0\r\n";
		$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";  

		$url_img = str_replace('../../',str_replace('index.php/','',base_url()),$this->input->post('url_image'));

		$body = '
			<h2>'.$this->input->post('descripcion').'</h2>
			<a target="_blank" href="'.$this->input->post('url_cont').'"><img src="'.$this->input->post('url_cont').'" alt="'.$this->input->post('title').'"></a>
			<br><br>
			Tambien puedes ver toda la galeria de '.NameEmpresaID($this->input->post('id_empresa')).' <a href="'.base_url(). 'all/clients_administrar?id='.$this->input->post('id_empresa').'" target="_blank"> AQUI</a>
			<br><br>
			O todas nuestras empresas <a href="'.base_url(). 'all/view_category?id=0&pag=1" target="_blank"> AQUI</a>
		';
		
		if (mail($to, $subject, $body, $headers))
		{
			redirect($url.'?sendmailserviciotrue=true&id='.$this->input->post('id_empresa').'');
		}else
		{
			redirect($url.'?sendmailserviciofalse=false&id='.$this->input->post('id_empresa').'');
		}
	}

	public function register_magazine()
	{
		if ($this->ValidateRecaptcha($this->input->post('g-recaptcha-response'), $this->input->post('url'))) {
			$r_informacion = 0; $r_promo_nego = 0;
			if (!is_null($this->input->post('r_informacion'))) { $r_informacion = 1; }
			if (!is_null($this->input->post('r_promo_nego'))) { $r_promo_nego = 1; }
		
			require_once('././oxxo_pay/lib/Conekta.php');
			\Conekta\Conekta::setApiKey("key_S1vdzHRjAjT7eUory5Fhxg");
			\Conekta\Conekta::setApiVersion("2.0.0");

			try{
        	$order = \Conekta\Order::create(
				array(
					"line_items" => array(
					array(
						"name" => "Subscripcion anual U Magazine",
						"unit_price" => 10000,
						"quantity" => 1
					)),
					"currency" => "MXN",
					"customer_info" => array(
					"name" => $this->input->post('nombre'),
					"email" => $this->input->post('email'),
					"phone" => '+52'.$this->input->post('phone')
					),
					"charges" => array(
						array(
							"payment_method" => array(
							"type" => "oxxo_cash"
							)
						)
					)
				)
				);
				
				$to = $this->input->post('email');

				$headers = "From: " . $this->config->item('correo_receptor') . "\r\n";
				$headers .= "Reply-To: ". $this->input->post('email') . "\r\n";
				$headers .= "MIME-Version: 1.0\r\n";
				$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";  

				
				/*$body_mail = '
					<center><h1>Recibe anualidad completa de la revista U Magazine. 
					<br>paga en el oxxo  mas cercano solo $ 100 MXN !
					<br> <a target="_BLANK" href='.base_url() . 'all/oxxo_ficha?ref_oxxo='.$order->charges[0]->payment_method->reference.'&pay='.$order->amount/100 . $order->currency.' ?> Descargar ficha </a></h1></center>
				';*/

				$array = str_split($order->charges[0]->payment_method->reference,4);
				$body = "";
				foreach($array as $item){
				$body .= $item . ' - '; 
				}  
				$body = substr($body, 0, -3);
				$total_pagar =  $body;
				
				$body_mail = '
				<html>
				<head>
					<meta charset="utf-8">
					<link href="styles.css" media="all" rel="stylesheet" type="text/css" />
					<link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700" rel="stylesheet">
					<style>
					/* Reset -------------------------------------------------------------------- */
					* 	 { margin: 0;padding: 0; }
					body { font-size: 14px; }
			
					/* OPPS --------------------------------------------------------------------- */
			
					h4 {
						margin-bottom: 8px;
						font-size: 12px;
						font-weight: 600;
						text-transform: uppercase;
					}
			
					.opps {
						width: 496px; 
						border-radius: 4px;
						box-sizing: border-box;
						padding: 0 45px;
						margin: 40px auto;
						overflow: hidden;
						border: 1px solid #b0afb5;
						font-family: "Open Sans", sans-serif;
						color: #4f5365;
					}
			
					.opps-reminder {
						position: relative;
						top: -1px;
						padding: 9px 0 10px;
						font-size: 11px;
						text-transform: uppercase;
						text-align: center;
						color: #ffffff;
						background: #000000;
					}
			
					.opps-info {
						margin-top: 26px;
						position: relative;
					}
			
					.opps-info:after {
						visibility: hidden;
						display: block;
						font-size: 0;
						content: " ";
						clear: both;
						height: 0;
			
					}
			
					.opps-ammount {
						width: 100%;
						float: right;
					}
			
					.opps-ammount h2 {
						font-size: 36px;
						color: #000000;
						line-height: 24px;
						margin-bottom: 15px;
					}
			
					.opps-ammount h2 sup {
						font-size: 16px;
						position: relative;
						top: -2px
					}
			
					.opps-ammount p {
						font-size: 10px;
						line-height: 14px;
					}
			
					.opps-reference {
						margin-top: 14px;
					}
			
					h3 {
						font-size: 15px;
						color: #000000;
						text-align: center;
						margin-top: -1px;
						padding: 6px 0 7px;
						border: 1px solid #b0afb5;
						border-radius: 4px;
						background: #f8f9fa;
					}
			
					.opps-instructions {
						margin: 32px -45px 0;
						padding: 32px 45px 45px;
						border-top: 1px solid #b0afb5;
						background: #f8f9fa;
					}
			
					ol {
						margin: 14px 0 0 13px;
					}
			
					li + li {
						margin-top: 8px;
						color: #000000;
					}
			
					a {
						color: #1155cc;
					}
			
					.opps-footnote {
						margin-top: 22px;
						padding: 22px 20 24px;
						color: #108f30;
						text-align: center;
						border: 1px solid #108f30;
						border-radius: 4px;
						background: #ffffff;
					}
			</style>
				</head>
				<body>
				<div class="opps">
				<div class="opps-header">
					<div class="opps-reminder">Ficha digital. No es necesario imprimir.</div>
					<div class="opps-info">
						<div class="opps-ammount">
							<h4>Monto a pagar</h4>
									<h2>$ '.str_replace('MXN','',$order->amount/100 . $order->currency).'<sup>MXN</sup></h2>
									<p>OXXO cobrará una comisión adicional al momento de realizar el pago.</p>
								</div>
							</div>
							<div class="opps-reference">
								<h4>Referencia</h4>
					<h3>'.$total_pagar.'</h3>
								</div>
						</div>
						<div class="opps-instructions">
							<h2>Instrucciones</h2>
							<ol>
								<li>Acude a la tienda OXXO más cercana. <a href="https://www.google.com.mx/maps/search/oxxo/" target="_blank">Encuéntrala aquí</a>.</li>
								<li>Indica en caja que quieres realizar un pago de <strong>OXXOPay</strong>.</li>
								<li>Dicta al cajero el número de referencia en esta ficha para que tecleé directamente en la pantalla de venta.</li>
								<li>Realiza el pago correspondiente con dinero en efectivo.</li>
								<li>Al confirmar tu pago, el cajero te entregará un comprobante impreso. <strong>En el podrás verificar que se haya realizado correctamente.</strong> Conserva este comprobante de pago.</li>
							</ol>
							<div class="opps-footnote">Al completar estos pasos recibirás un correo de <strong>Link U projects</strong> confirmando tu pago.</div>
						</div>
					</div>	
				</body>
			</html>

				';
				
				mail($to, 'Ficha OXXO', $body_mail, $headers);
				
				$data = array(
					'id'=> $order->charges[0]->payment_method->reference,
					'name' => $this->input->post('nombre'),
					'direccion'  => $this->input->post('direccion'),
					'email'  => $this->input->post('email'),
					'phone'  => '+52'.$this->input->post('phone'),
					'info_email'  => $r_informacion,
					'promo_nego	'  => $r_promo_nego,
					'estatus'  => 0,
					'f_ini' => date("Y-m-d")
				);
				$this->db->insert('register_magazine',$data);
				
				if ($this->db->affected_rows() >= 1 )
				{
					if (empty($this->input->post('pag'))){
						redirect(base_url().'?ref_oxxo='.$order->charges[0]->payment_method->reference.'&pay='.$order->amount/100 . $order->currency.'&id_img='.$this->input->post('id_img').'&pag='.$this->input->post('pag').' ');	
					}else{
						redirect($this->input->post('url').'?ref_oxxo='.$order->charges[0]->payment_method->reference.'&pay='.$order->amount/100 . $order->currency.'&id_img='.$this->input->post('id_img').'&pag='.$this->input->post('pag').' ');	
					}
				}else
				{
					redirect($this->input->post('url'));
				}
				
			} catch (\Conekta\ParameterValidationError $error){
				echo $error->getMessage();
			} catch (\Conekta\Handler $error){
				echo $error->getMessage();
			}
		}
	}

	public function oxxo_ficha ()
	{
		$this->load->view('oxxo_ficha');
	}

	public function oxxo_webhook ()
	{
		$body = @file_get_contents('php://input');
		$data = json_decode($body);
		
		if ($data->type == 'charge.paid')
		{
			$referencia = $data->data->object->payment_method->reference;
			
			$val = $this->db->query('SELECT * FROM register_magazine where id = '.$referencia.' ')->row();

			$to = $val->email;
    
    		$subject = 'Confirmacion PAGO - U Magazine';
    
			$headers = "From: " .$this->config->item('correo_receptor'). "\r\n";
			$headers .= "CCO: " .$this->config->item('correo_receptor'). "\r\n";
    		$headers .= "Reply-To: ".$to."\r\n";
    		$headers .= "MIME-Version: 1.0\r\n";
    		$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";  
	
			$body_email = '
			<html>
			<head>
				<meta charset="utf-8">
				<link href="styles.css" media="all" rel="stylesheet" type="text/css" />
			<link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700" rel="stylesheet">
			<style>
				/* Reset -------------------------------------------------------------------- */
			* 	 { margin: 0;padding: 0; }
				body { font-size: 14px; }

				/* OPPS --------------------------------------------------------------------- */

				h3 {
					margin-bottom: 10px;
					font-size: 13px;
					font-weight: 600;
					text-transform: uppercase;
				}

				.opps {
					width: 496px; 
					border-radius: 4px;
					box-sizing: border-box;
					padding: 0 45px;
					margin: 40px auto;
					overflow: hidden;
					border: 1px solid #b0afb5;
					font-family: "Open Sans", sans-serif;
					color: #4f5365;
				}

				.opps-reminder {
					position: relative;
					top: -1px;
					padding: 9px 0 10px;
					font-size: 11px;
					text-transform: uppercase;
					text-align: center;
					color: #ffffff;
					background: #000000;
				}

				.opps-info {
					margin-top: 26px;
					position: relative;
				}

				.opps-info:after {
					visibility: hidden;
					display: block;
					font-size: 0;
					content: " ";
					clear: both;
					height: 0;

				}

				.opps-brand {
					width: 45%;
					float: left;
				}

				.opps-brand img {
					max-width: 150px;
					margin-top: 2px;
				}

				.opps-ammount {
					width: 100%;
					float: right;
				}

				.opps-ammount h2 {
					font-size: 36px;
					color: #000000;
					line-height: 24px;
					margin-bottom: 15px;
				}

				.opps-ammount h2 sup {
					font-size: 16px;
					position: relative;
					top: -2px
				}

				.opps-ammount p {
					font-size: 10px;
					line-height: 14px;
				}

				.opps-reference {
					margin-top: 14px;
				}

				h1 {
					font-size: 27px;
					color: #000000;
					text-align: center;
					margin-top: -1px;
					padding: 6px 0 7px;
					border: 1px solid #b0afb5;
					border-radius: 4px;
					background: #f8f9fa;
				}

				.opps-instructions {
					margin: 32px -45px 0;
					padding: 32px 45px 45px;
					border-top: 1px solid #b0afb5;
					background: #f8f9fa;
				}

				ol {
					margin: 17px 0 0 16px;
				}

				li + li {
					margin-top: 10px;
					color: #000000;
				}

				a {
					color: #1155cc;
				}

				.opps-footnote {
					margin-top: 22px;
					padding: 22px 20 24px;
					color: #108f30;
					text-align: center;
					border: 1px solid #108f30;
					border-radius: 4px;
					background: #ffffff;
				}
				</style>
					</head>
					<body>
						<div class="opps">
							<div class="opps-header">
								<div class="opps-reminder">ANUALIDAD U MAGAZINE</div>
								<div class="opps-info">
						
						<div class="opps-ammount">
						<center><h3>ESTIMADO/A '.$val->name.', AGRADECEMOS SU REGISTRO. REF: '.$referencia.'</h3></center>
									</div>
						<hr><br>
						<div class="opps-ammount">
										<CENTER><h3>De manera mensual sera enviada nuestra publicacion impresa a la siguiente direccion</h3></CENTER>
										<hr><br><P>'.$val->direccion.'</P><br>
									</div>
								</div>
								<div class="opps-reference"></div>
							</div>
						</div>	
					</body>
				</html>';

			$update = array(
					'estatus' => 1,
			);
			
			$this->db->where('id', $referencia)->update('register_magazine', $update);
			
			if ($this->db->affected_rows() >= 1 )
			{
				mail($to, $subject, $body_email, $headers);
				http_response_code(200);
			}
		}

	}

	public function magazine_sub()
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
			$TotalPags_ = $this->db->query('SELECT id FROM register_magazine where `name` like "%'.$buscar.'%" or direccion like "%'.$buscar.'%" or phone like "%'.$buscar.'%" or id like "%'.$buscar.'%" ')->num_rows() / 10;
		}else
		{
			$TotalPags_ = $this->db->query('SELECT id FROM register_magazine')->num_rows() / 10 ;
		}
		
		$TotalPags = number_format($TotalPags_, 0, '', ' ');

		if ($TotalPags_ > $TotalPags) { $TotalPags = $TotalPags + 1; }
		
		$limit = 'LIMIT '.(($pag * 10) - 10).', 10;';
		$data['pags'] = $TotalPags;
		$data['pag'] = $pag;

		if (!is_null($buscar))
		{
			$data['data'] = $this->db->query('SELECT id, name, direccion, email, phone, info_email, promo_nego, estatus, f_ini FROM register_magazine where `name` like "%'.$buscar.'%" or direccion like "%'.$buscar.'%" or phone like "%'.$buscar.'%" or id like "%'.$buscar.'%" '.$limit.' ')->result();
		}else
		{
			$data['data'] = $this->db->query('SELECT id, name, direccion, email, phone, info_email, promo_nego, estatus, f_ini FROM register_magazine '.$limit.' ')->result();
		}
		
		$this->load->view('layouts/header');
		$this->load->view('magazine_sub', $data);
		$this->load->view('layouts/footer');
	}

	public function magazine_sub_update ()
	{
		LoginCheck();
		$url = $this->input->post('url');
		$r_informacion = 0;
		$r_promo_nego = 0;
		$estatus = 0;
		
		if (!is_null($this->input->post('r_informacion'))){ $r_informacion = 1; }
		if (!is_null($this->input->post('r_promo_nego'))){ $r_promo_nego = 1; }
		if (!is_null($this->input->post('estatus'))){ $estatus = 1; }


		$data = array(
				'name' => $this->input->post('name'),
				'direccion' => $this->input->post('direccion'),
				'email' => $this->input->post('email'),
				'phone' => $this->input->post('phone'),
				'info_email' => $r_informacion,
				'promo_nego' => $r_promo_nego,
				'estatus' => $estatus,
				'f_ini' => $this->input->post('f_ini')
		);
		
		$this->db->where('id', $this->input->post('id'))->update('register_magazine', $data);

		if ($this->db->affected_rows() >= 1 )
		{
			redirect($url.'?clientaupdatetrue=true');
		}else
		{
			redirect($url.'?clientupdatefalse=false');
		}

	}
	
	public function magazine_sub_delete ()
	{
		LoginCheck();
		$url = $this->input->post('url');
		
		$this->db->where('id', $this->input->post('id'))->delete('register_magazine');

		if ($this->db->affected_rows() >= 1 )
		{
			redirect($url.'?clientadeletetrue=true');
		}else
		{
			redirect($url.'?clientdeletefalse=false');
		}
	}

	public function users ()
	{
		LoginCheck();
		$data['users'] = $this->db->query('SELECT * FROM users order by name asc')->result();

		$this->load->view('layouts/header');
		$this->load->view('users',$data);
		$this->load->view('layouts/footer');
	}

	public function users_add ()
	{
		LoginCheck();
		$url = $this->input->post('url');
		
		$data = array(
			'username' => $this->input->post('username'),
			'password'  => md5(md5($this->input->post('password'))),
			'name'  => $this->input->post('name'),
			'mail'  => $this->input->post('mail')
		);
		
		$this->db->insert('users',$data);

		if ($this->db->affected_rows() >= 1 )
		{
			redirect($url.'?useraddtrue=true');
		}else
		{
			redirect($url.'?useraddfalse=false');
		}
	}

	public function users_delete ()
	{
		LoginCheck();
		$url = $this->input->post('url');
		
		$this->db->where('id', $this->input->post('id'))->delete('users');

		if ($this->db->affected_rows() >= 1 )
		{
			redirect($url.'?userdeletetrue=true');
		}else
		{
			redirect($url.'?userdeletefalse=false');
		}
	}

	public function users_update()
	{
		LoginCheck();
		$url = $this->input->post('url');

		$data = array(
				'username' => $this->input->post('username'),
				'name' => $this->input->post('name'),
				'mail' => $this->input->post('mail')
		);

		if (!empty($this->input->post('password')) && $this->input->post('password') == $this->input->post('password_confirm'))
		{
			$data = array(
					'username' => $this->input->post('username'),
					'name' => $this->input->post('name'),
					'mail' => $this->input->post('mail'),
					'password' => md5(md5($this->input->post('password')))
			);
		}

		$this->db->where('id', $this->input->post('id'))->update('users', $data);

		if ($this->db->affected_rows() >= 1 )
		{
			redirect($url.'?userupdatetrue=true');
		}else
		{
			redirect($url.'?userupdatetrue=false');
		}
	}

	public function pdf_activos_magazine ()
	{
		$llamadas = $this->db->query('SELECT id, name, direccion, email, phone, IF(info_email = true, "Si", "No") as info_email, IF( promo_nego = true, "Si", "No") as  promo_nego, estatus, f_ini FROM `register_magazine` where estatus = 1 order by name asc')->result();

		if(count($llamadas) > 0){
			//Cargamos la librería de excel.
			$this->load->library('excel'); $this->excel->setActiveSheetIndex(0);
			$this->excel->getActiveSheet()->setTitle('suscriptores_activos_magazine');
			//Contador de filas
			$contador = 1;
			//Le aplicamos ancho las columnas.
			$this->excel->getActiveSheet()->getColumnDimension('A')->setWidth(25);
			$this->excel->getActiveSheet()->getColumnDimension('B')->setWidth(40);
			$this->excel->getActiveSheet()->getColumnDimension('C')->setWidth(60);
			$this->excel->getActiveSheet()->getColumnDimension('D')->setWidth(20);
			$this->excel->getActiveSheet()->getColumnDimension('E')->setWidth(20);
			$this->excel->getActiveSheet()->getColumnDimension('F')->setWidth(20);
			$this->excel->getActiveSheet()->getColumnDimension('G')->setWidth(20);
			$this->excel->getActiveSheet()->getColumnDimension('H')->setWidth(20);
			//Le aplicamos negrita a los títulos de la cabecera.
			$this->excel->getActiveSheet()->getStyle("A{$contador}")->getFont()->setBold(true);
			$this->excel->getActiveSheet()->getStyle("B{$contador}")->getFont()->setBold(true);
			$this->excel->getActiveSheet()->getStyle("C{$contador}")->getFont()->setBold(true);
			$this->excel->getActiveSheet()->getStyle("D{$contador}")->getFont()->setBold(true);
			$this->excel->getActiveSheet()->getStyle("E{$contador}")->getFont()->setBold(true);
			$this->excel->getActiveSheet()->getStyle("F{$contador}")->getFont()->setBold(true);
			$this->excel->getActiveSheet()->getStyle("G{$contador}")->getFont()->setBold(true);
			$this->excel->getActiveSheet()->getStyle("H{$contador}")->getFont()->setBold(true);
			//Centrar encabezados
			$this->excel->getActiveSheet()->getStyle("A{$contador}")->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
			$this->excel->getActiveSheet()->getStyle("A{$contador}")->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
			$this->excel->getActiveSheet()->getStyle("B{$contador}")->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
			$this->excel->getActiveSheet()->getStyle("C{$contador}")->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
			$this->excel->getActiveSheet()->getStyle("D{$contador}")->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
			$this->excel->getActiveSheet()->getStyle("E{$contador}")->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
			$this->excel->getActiveSheet()->getStyle("F{$contador}")->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
			$this->excel->getActiveSheet()->getStyle("G{$contador}")->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
			$this->excel->getActiveSheet()->getStyle("H{$contador}")->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
			//Definimos los títulos de la cabecera.
			$this->excel->getActiveSheet()->setCellValue("A{$contador}", 'FOLIO ACTIVACIÓN');
			$this->excel->getActiveSheet()->setCellValue("B{$contador}", 'NOMBRE');
			$this->excel->getActiveSheet()->setCellValue("C{$contador}", 'DIRECCIÓN');
			$this->excel->getActiveSheet()->setCellValue("D{$contador}", 'CORREO ELECTRÓNICO');
			$this->excel->getActiveSheet()->setCellValue("E{$contador}", 'TELÉFONO');
			$this->excel->getActiveSheet()->setCellValue("F{$contador}", 'FECHA INSCRIPCIÓN');
			$this->excel->getActiveSheet()->setCellValue("G{$contador}", 'ENVIAR INF. POR EMAIL');
			$this->excel->getActiveSheet()->setCellValue("H{$contador}", 'ENVIAR PROMOCIONES DE NEGOCIOS');
			//Definimos la data del cuerpo.        
			foreach($llamadas as $l){
			//Incrementamos una fila más, para ir a la siguiente.
			$contador++;
				//Informacion de las filas de la consulta.
				$this->excel->getActiveSheet()->setCellValue("A{$contador}", $l->id);
				$this->excel->getActiveSheet()->getStyle("A{$contador}")->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);

				$this->excel->getActiveSheet()->setCellValue("B{$contador}", $l->name);
				$this->excel->getActiveSheet()->getStyle("B{$contador}")->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);

				$this->excel->getActiveSheet()->setCellValue("C{$contador}", $l->direccion);
				$this->excel->getActiveSheet()->getStyle("C{$contador}")->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);

				$this->excel->getActiveSheet()->setCellValue("D{$contador}", $l->email);
				$this->excel->getActiveSheet()->getStyle("D{$contador}")->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
				
				$this->excel->getActiveSheet()->setCellValue("E{$contador}", $l->phone);
				$this->excel->getActiveSheet()->getStyle("E{$contador}")->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

				$this->excel->getActiveSheet()->setCellValue("F{$contador}", $l->f_ini);
				$this->excel->getActiveSheet()->getStyle("F{$contador}")->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

				$this->excel->getActiveSheet()->setCellValue("G{$contador}", $l->info_email);
				$this->excel->getActiveSheet()->getStyle("G{$contador}")->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

				$this->excel->getActiveSheet()->setCellValue("H{$contador}", $l->promo_nego);
				$this->excel->getActiveSheet()->getStyle("H{$contador}")->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
			}

			//Le ponemos un nombre al archivo que se va a generar.
			$archivo = "suscriptores_activos_magazine.xls";
			header('Content-Type: application/vnd.ms-excel');
			header('Content-Disposition: attachment;filename="'.$archivo.'"');
			header('Cache-Control: max-age=0');
			$objWriter = PHPExcel_IOFactory::createWriter($this->excel, 'Excel5');
			//Hacemos una salida al navegador con el archivo Excel.
			$objWriter->save('php://output');
		}else{
			echo 'No se han encontrado suscriptores activos.';
			exit;        
		}
	}

	public function view_category_premium()
	{
		$category =  $_GET["id"];
		$pag = $this->input->get('pag');
		$limit = '';

		if (is_null($pag))
		{
			$pag = 1;
		}

		if ($category > 0)
		{
			$TotalPags = number_format($this->db->query('SELECT ga.id FROM empresa_gallery ga, clients cl WHERE ga.empresa = cl.id and cl.category = '.$category.' and cl.premium5 = 1 and ga.premium = 1 ')->num_rows() / 9, 0, '', ' ');
		}
		else
		{
			$TotalPags = number_format($this->db->query('SELECT ga.id FROM empresa_gallery ga, clients cl where ga.empresa = cl.id and cl.premium5 = 1 and ga.premium = 1 ')->num_rows() / 9, 0, '', ' ');
		}

		if ($TotalPags < 1){ $TotalPags = 1; }

		$limit = 'LIMIT '.(($pag * 9) - 9).', 9;';
		$data['pags'] = $TotalPags;
		$data['pag'] = $pag;

		if ($category > 0)
		{
			$data['data'] = $this->db->query('SELECT ga.id, ga.url, ga.url_img, ga.title, ga.descripcion, cl.category, cl.empresa, ga.premium, cl.id as cl_id_empresa FROM empresa_gallery ga, clients cl WHERE ga.empresa = cl.id and cl.category = '.$category .' and cl.premium5 = 1 and ga.premium = 1 '. $limit.' ')->result();
		}
		else
		{
			$data['data'] = $this->db->query('SELECT ga.id, ga.url, ga.url_img, ga.title, ga.descripcion, cl.category, cl.empresa, ga.premium, cl.id as cl_id_empresa FROM empresa_gallery ga, clients cl WHERE ga.empresa = cl.id and cl.premium5 = 1 and ga.premium = 1 '.$limit.' ')->result();
		}

		
		$this->load->view('layouts/header');
		$this->load->view('view_category_premium', $data);
		$this->load->view('layouts/footer');
	}

	public function qr()
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
			$TotalPags_ = $this->db->query('SELECT p.id, c.id AS id_empresa, c.empresa, p.name, p.descripcion, p.url, p.qr_img FROM promotions p, clients c where p.client = c.id and p.name like "%'.$buscar.'%" or p.client = c.id and p.descripcion like "%'.$buscar.'%" or p.client = c.id and c.empresa like "%'.$buscar.'%" '.$limit.' ')->num_rows() / 10;
		}else
		{
			$TotalPags_ = $this->db->query('SELECT id FROM promotions')->num_rows() / 10;
		}
		
		$TotalPags = number_format($TotalPags_, 0, '', ' ');

		if ($TotalPags_ > $TotalPags) { $TotalPags = $TotalPags + 1; }


		$limit = 'LIMIT '.(($pag * 10) - 10).', 10;';
		$data['pags'] = $TotalPags;
		$data['pag'] = $pag;

		if (!is_null($buscar))
		{
			$data['data'] = $this->db->query('SELECT p.id, c.id AS id_empresa, c.empresa, p.name, p.descripcion, p.url, p.qr_img FROM promotions p, clients c where p.client = c.id and p.name like "%'.$buscar.'%" or p.client = c.id and p.descripcion like "%'.$buscar.'%" or p.client = c.id and c.empresa like "%'.$buscar.'%" '.$limit.' ')->result();
		}else
		{
			$data['data'] = $this->db->query('SELECT p.id, c.id AS id_empresa, c.empresa, p.name, p.descripcion, p.url, p.qr_img FROM promotions p, clients c where p.client = c.id '.$limit.' ')->result();
		}

		$this->load->view('layouts/header');
		$this->load->view('qr',$data);
		$this->load->view('layouts/footer');
	}

	public function qr_add ()
	{
		LoginCheck();
		
		$url = $this->input->post('url');
		
		//Agregamos la libreria para genera códigos QR
		require_once 'phpqrcode/qrlib.php';    
		
		//Declaramos una carpeta temporal para guardar la imagenes generadas
		$dir = '././public/images/qr_promotions/qr_promo_'. date("YmdHis").'.'.'.png';
	
		//Parametros de Condiguración
		
		$tamaño = 20; //Tamaño de Pixel
		$level = 'H'; //Precisión Baja
		$framSize = 2; //Tamaño en blanco
		$contenido = $this->input->post('url_promo');
		
		//Enviamos los parametros a la Función para generar código QR 
		QRcode::png($contenido, $dir, $level, $tamaño, $framSize); 

		

		$data = array(
			'client' => $this->input->post('client'),
			'name'  => $this->input->post('name'),
			'descripcion'  => $this->input->post('descripcion'),
			'url'  => $this->input->post('url_promo'),
			'qr_img'  => str_replace('./','../',$dir)
		);
		
		$this->db->insert('promotions',$data);

		if ($this->db->affected_rows() >= 1 )
		{
			redirect(base_url() . 'all/qr?qraddtrue=true&search='.$this->input->post('name').'');
		}else
		{
			redirect(base_url() . 'all/qr?qraddfalse=true');
		}

	}

	public function qr_delete ()
	{
		LoginCheck();
		$url = $this->input->post('url');
		
		$this->db->where('id', $this->input->post('id'))->delete('promotions');

		if ($this->db->affected_rows() >= 1 )
		{
			redirect($url.'?qrtionadeletetrue=true');
		}else
		{
			redirect($url.'?qrtiondeletefalse=false');
		}
	}

	public function qr_update ()
	{
		LoginCheck();
		$url = $this->input->post('url');
		
		$data = array(
				'client' => $this->input->post('client'),
				'name' => $this->input->post('name'),
				'descripcion' => $this->input->post('descripcion')
		);
		
		$this->db->where('id', $this->input->post('id'))->update('promotions', $data);

		if ($this->db->affected_rows() >= 1 )
		{
			redirect($url.'?qrtionaupdatetrue=true');
		}else
		{
			redirect($url.'?qrtionupdatefalse=false');
		}

	}

	public function promotions()
	{
		$pag = $this->input->get('pag');
		$buscar = $this->input->get('search');
		$limit = '';

		if (is_null($pag))
		{
			$pag = 1;
		}

		if (!is_null($buscar))
		{
			$like = "'%" .$buscar. "%'";
			$TotalPags = number_format($this->db->query('SELECT * FROM promotions_locals where name like '.$like.' order by id desc ')->num_rows() / 18, 0, '', ' ');
		}
		else
		{
			$TotalPags = number_format($this->db->query('SELECT id FROM promotions_locals order by id desc')->num_rows() / 18, 0, '', ' ');
		}

		$limit = 'LIMIT '.(($pag * 18) - 18).', 18;';
		$data['pags'] = $TotalPags;
		$data['pag'] = $pag;

		if (!is_null($buscar))
		{
			$like = "'%" .$buscar. "%'";
			$data['data'] = $this->db->query('SELECT * FROM promotions_locals where name like '.$like.' order by id desc '.$limit.' ')->result();
		}
		else
		{
			$data['data'] = $this->db->query('SELECT * FROM promotions_locals order by id desc '.$limit.' ')->result();
		}
		

		$this->load->view('layouts/header');
		$this->load->view('promotions', $data);
		$this->load->view('layouts/footer');
	}

	public function promo_add()
	{
		LoginCheck();
		$url = $this->input->post('url');
		
		//subir imagen
		$extencion = pathinfo($_FILES["img"]["name"], PATHINFO_EXTENSION);
		$config['upload_path'] = "././public/images/promotions/";
		$config['allowed_types'] = 'gif|jpg|png|jpeg';
		$config['file_name'] = 'promo_'. date("YmdHis").'.'.$extencion;
		$config['max_size'] = '5000';
		$config['max_width']  = '5024';
		$config['max_height']  = '5768';

		$this->load->library('upload', $config);
		
		if ( ! $this->upload->do_upload('img'))
		{
			redirect(base_url() . 'all/promotions?addpromofalse=true');
		}else
		{
			$data = array(
				'url' => '../../public/images/promotions/'.$config['file_name'],
				'price' => $this->input->post('price'),
				'name' => $this->input->post('name')
			);

			$this->db->insert('promotions_locals',$data);

			if ($this->db->affected_rows() >= 1 )
			{
				redirect(base_url() . 'all/promotions?addpromotrue=true&id_img='.$this->db->insert_id().'&pag=1');
			}else
			{
				redirect(base_url() . 'all/promotions?addpromofalse=true&id_img=0&pag=1');
			}
		}
	}

	public function promotion_delete()
	{
		LoginCheck();
		$url = $this->input->post('url');
		$id_img = $this->input->post('id');
		$pag = $this->input->post('pag');

		$this->db->where('id', $id_img)->delete('promotions_locals');

		if ($this->db->affected_rows() >= 1 )
		{
			redirect($url.'?promotiondeletetrue=true&id_img=0&pag='.$pag.'');
		}else
		{
			redirect($url.'?promotiondeletefalse=false&id_img='.$id_img.'&pag='.$pag.'');
		}
	}

	public function nuestros_servicios_publicidad()
	{
		$this->load->view('layouts/header');
		$this->load->view('nuestros_servicios_publicidad');
		$this->load->view('layouts/footer');
	}

	public function nuestros_servicios_desarrollo()
	{
		$this->load->view('layouts/header');
		$this->load->view('nuestros_servicios_desarrollo');
		$this->load->view('layouts/footer');
	}

	public function nuestros_servicios_gestion()
	{
		$this->load->view('layouts/header');
		$this->load->view('nuestros_servicios_gestion');
		$this->load->view('layouts/footer');
	}

	public function galery()
	{
		$data['data'] = $this->db->query('SELECT * FROM `gallery` order by id desc')->result();		
		$this->load->view('layouts/header');
		$this->load->view('galery', $data);
		$this->load->view('layouts/footer');
	}

	public function update_video()
	{
		LoginCheck();
		$url = $this->input->post('url');
		$code = $this->input->post('code');

		
		$data = array(
				'video' => $code
		);
		
		$this->db->update('users', $data);

		if ($this->db->affected_rows() >= 1 )
		{
			redirect($url.'?updatevideo=true');
		}else
		{
			redirect($url.'?noupdatevideo=true');
		}
	}
}
?>