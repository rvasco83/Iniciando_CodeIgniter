<?php

class Pages extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('pagesModel');
    }

    public function index()
    {
        $results = $this->pagesModel->get();

        $this->load->view('template/header');
        $this->load->view('pages/index', ['pages'=>$results]);
        $this->load->view('template/footer');
    }

    public function view($id) {
        $page = $this->pagesModel->get($id);
        $this->load->view('template/header');
        $this->load->view('pages/view', ['page' => $page]);
        $this->load->view('template/footer');
    }

    public function new()
    {
        $this->load->library('form_validation');

        $this->form_validation->set_rules('title', 'Título', 'required' );
        $this->form_validation->set_rules('body', 'Conteúdo', 'required');

        if ($this->form_validation->run() === false) {
            $this->load->view('template/header');
            $this->load->view('pages/new');
            $this->load->view('template/footer');
        } else {
            $data['back'] ='/pages';
            $this->pagesModel->new();
            $this->load->view('template/success', $data);
        }
    }

    public function edit($id)
    {
        $this->load->library('form_validation');

        $this->form_validation->set_rules('title', 'Título', 'required');
        $this->form_validation->set_rules('body', 'Conteúdo', 'required');

        if($this->form_validation->run() === false) {
            $page = $this->pagesModel->get($id);
            $this->load->view('template/header');
            $this->load->view('pages/edit', ['page' => $page]);
            $this->load->view('template/footer');
        }else {
            $data['back'] = '/pages/' . $id;
            $this->pagesModel->update($id);
            $this->load->view('template/success', $data);
        }

    }

    public function delete($id)
    {
        $data['back'] = '/pages';
        $this->pagesModel->delete($id);
        $this->load->view('template/success', $data);
    }
}