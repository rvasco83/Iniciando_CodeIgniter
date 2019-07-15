<?php

class PagesModel extends CI_Model
{
    private $tableName = 'pages';
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function get($id = null)
    {
        if ($id === null) {
            $query = $this->db->get($this->tableName);
            return $query->result();
        }
        $query = $this->db->get_where($this->tableName, ['id' => $id]);
        return $query->first_row();
    }

    public function new() {
        $this->load->helper('url');
        $slug = url_title($this->input->post('title'), 'dash', true);

        $data = [
            'title' => $this->input->post('title'),
            'body' => $this->input->post('body'),
            'slug' => $slug
        ];

        return $this->db->insert($this->tableName, $data);
    }

    public function update($id)
    {
        $this->load->helper('url');
        $slug = url_title($this->input->post('title'), 'dash', true);

        $data =[
            'title' => $this->input->post('title'),
            'body' => $this->input->post('body'),
            'slug' => $slug
        ];

        $this->db->where('id', $id);

        return $this->db->update($this->tableName, $data);
    }

    public function delete($id)
    {
        return $this->db->delete($this->tableName, ['id' => $id]);
    }
}