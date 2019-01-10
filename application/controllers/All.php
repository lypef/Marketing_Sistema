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
				redirect(base_url() . 'all/login#bad_password');
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

	public function servicio_inteserado ()
	{
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
		$r_informacion = 0; $r_promo_nego = 0;
		if (!is_null($this->input->post('r_informacion'))) { $r_informacion = 1; }
		if (!is_null($this->input->post('r_promo_nego'))) { $r_promo_nego = 1; }

		$data = array(
			'name' => $this->input->post('nombre'),
			'direccion'  => $this->input->post('direccion'),
			'email'  => $this->input->post('email'),
			'phone'  => '+52'.$this->input->post('phone'),
			'info_email'  => $r_informacion,
			'promo_nego	'  => $r_promo_nego,
			'estatus'  => 0
		);
		
		$this->db->insert('register_magazine',$data);

		if ($this->db->affected_rows() >= 1 )
		{
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

				
				$body_mail = '
					<center><h1>Recibe por un año completo la revista U Magazine. 
					<br>paga en el oxxo  mas cercano solo $ 100 MXN !
					<br> <a target="_BLANK" href='.base_url() . 'all/oxxo_ficha?ref_oxxo='.$order->charges[0]->payment_method->reference.'&pay='.$order->amount/100 . $order->currency.' ?> Descargar ficha </a></h1></center>
				';
				mail($to, 'Ficha OXXO', $body_mail, $headers);
				redirect($this->input->post('url').'?ref_oxxo='.$order->charges[0]->payment_method->reference.'&pay='.$order->amount/100 . $order->currency.'&id_img='.$this->input->post('id_img').'&pag='.$this->input->post('pag').' ');
			} catch (\Conekta\ParameterValidationError $error){
				echo $error->getMessage();
			} catch (\Conekta\Handler $error){
				echo $error->getMessage();
			}
			
		}else
		{
			redirect($this->input->post('url'));
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
        
        
        //if ($data->type == 'charge.paid'){
              $to = 'lypef@live.com';
    
    		$subject = 'Pago confirmado';
    
    		$headers = "From: " . 'info@linku.com.mx' . "\r\n";
    		$headers .= "Reply-To: 'lypef@live.com'\r\n";
    		$headers .= "MIME-Version: 1.0\r\n";
    		$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";  
    
    		mail($to, $subject, 'pagado', $headers);
        //}
        http_response_code(200); // Return 200 OK
	}
}
?>