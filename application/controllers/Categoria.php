<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Categoria extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('pagination');
        $this->load->model('Productos');
        $this->load->helper('url');
    }

    public function mostrar($categoria, $page=0) {
        $config['base_url'] = base_url() . 'index.php/categoria/mostrar/' . $categoria;
        $config['uri_segment']=4;
        $config['total_rows'] = $this->Productos->num_filas($categoria);
        $config['per_page'] = 3;
        $config['num_links'] = 1;
        $config['full_tag_open'] = '<ul class="pagination">';
        $config['full_tag_close'] = '</ul>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="active"><span>';
        $config['cur_tag_close'] = '</span></li>';
        $config['prev_tag_open'] = '<li>';
        $config['prev_tag_close'] = '</li>';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';
        $config['first_link'] = 'Primero';
        $config['prev_link'] = 'Anterior';
        $config['last_link'] = 'Último';
        $config['next_link'] = 'Siguiente';
        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '</li>';

        $this->pagination->initialize($config);
        $productos = array('pro' => $this->Productos->ProductosDe($categoria, $page, $config['per_page']),
            'paginacion' => $this->pagination->create_links());
        
        $categorias = $this->Productos->Categorias();
        $cuerpo['d1'] = $this->load->view('category', array('cat'=>$categorias), true);
        $cuerpo['d2'] = $this->load->view('shop', $productos, true);
        $this->load->view('plantilla', array('cuerpo' => $cuerpo));
    }
    
    public function mostrarTodo($page=0){
        $config['base_url'] = base_url() .'index.php/categoria/mostrarTodo';
        $config['uri_segment']=3;
        $config['total_rows'] = $this->Productos->num_filas_tot();
        $config['per_page'] = 6;
        $config['num_links'] = 1;
        $config['full_tag_open'] = '<ul class="pagination">';
        $config['full_tag_close'] = '</ul>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="active"><span>';
        $config['cur_tag_close'] = '</span></li>';
        $config['prev_tag_open'] = '<li>';
        $config['prev_tag_close'] = '</li>';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';
        $config['first_link'] = 'Primero';
        $config['prev_link'] = 'Anterior';
        $config['last_link'] = 'Último';
        $config['next_link'] = 'Siguiente';
        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '</li>';
        
        $this->pagination->initialize($config);
        $productos = array('pro' => $this->Productos->TodosProductos($page, $config['per_page']),
            'paginacion' => $this->pagination->create_links());
        
        $categorias = $this->Productos->Categorias();
        $cuerpo['d1'] = $this->load->view('category', array('cat'=>$categorias), true);
        $cuerpo['d2'] = $this->load->view('shop', $productos, true);
        $this->load->view('plantilla', array('cuerpo' => $cuerpo));
    }

}
