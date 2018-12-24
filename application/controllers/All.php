<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class All extends CI_Controller {
	
	public function __construct()
    {
		parent::__construct();
		$this->load->model('Models_model');
		$this->load->helper('helpers');
	}
	
	public function index()
	{
		$this->load->view('layouts/header');
		$this->load->view('welcome');
		$this->load->view('layouts/footer');
	}

	public function manager()
	{
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

	public function clients_gestionar()
	{
		
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
			$data['data'] = $this->db->query('SELECT cl.id, ca.name, cl.empresa, cl.active, cl.direccion, cl.mail, cl.telefono, cl.responsable, ca.id as "id_cat" FROM clients cl, categories ca where cl.category = ca.id and cl.empresa like "%'.$buscar.'%" or cl.category = ca.id and cl.responsable like "%'.$buscar.'%" '. $limit.' ')->result();
		}else
		{
			$data['data'] = $this->db->query('SELECT cl.id, ca.name, cl.empresa, cl.active, cl.direccion, cl.mail, cl.telefono, cl.responsable, ca.id as "id_cat" FROM clients cl, categories ca where cl.category = ca.id '.$limit.' ')->result();
		}
		
		
		
		$this->load->view('layouts/header');
		$this->load->view('clients_gestionar', $data);
		$this->load->view('layouts/footer');
	}

	public function view_category()
	{
		echo $_GET["id"];
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

	public function client_add ()
	{
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
		$url = $this->input->post('url');
		$status = 0;
		
		if (!is_null($this->input->post('estatus')))
		{
			$status = 1;
		}


		$data = array(
				'category' => $this->input->post('category'),
				'empresa' => $this->input->post('empresa'),
				'active' => $status,
				'direccion' => $this->input->post('direccion'),
				'mail' => $this->input->post('email'),
				'telefono' => $this->input->post('telefono'),
				'responsable' => $this->input->post('responsable')
		);
		
		$this->db->where('id', $this->input->post('id'));
		$this->db->update('clients', $data);

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
		$url = $this->input->post('url');
		
		$this->db->where('id', $this->input->post('id'));
		$this->db->delete('clients');

		if ($this->db->affected_rows() >= 1 )
		{
			redirect($url.'?clientadeletetrue=true');
		}else
		{
			redirect($url.'?clientdeletefalse=false');
		}

	}

}
?>