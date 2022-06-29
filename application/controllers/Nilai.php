<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Nilai extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("nilai_model");
        $this->load->model("supplier_model");
        $this->load->model("bobot_model");
        $this->load->library('session');
        $this->load->library('form_validation');
        $this->load->library('pagination');
    }

    public function index()
    {
        //konfigurasi pagination
        $config['base_url'] = site_url('nilai/index'); //site url
        $config['total_rows'] = $this->db->count_all('nilai'); //total row
        $config['per_page'] = 5;  //show record per halaman
        $config["uri_segment"] = 3;  // uri parameter
        $choice = $config["total_rows"] / $config["per_page"];
        $config["num_links"] = floor($choice);

        // Membuat Style pagination untuk BootStrap v4
        $config['first_link']       = 'First';
        $config['last_link']        = 'Last';
        $config['next_link']        = 'Next';
        $config['prev_link']        = 'Prev';
        $config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
        $config['full_tag_close']   = '</ul></nav></div>';
        $config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
        $config['num_tag_close']    = '</span></li>';
        $config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
        $config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
        $config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
        $config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['prev_tagl_close']  = '</span>Next</li>';
        $config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
        $config['first_tagl_close'] = '</span></li>';
        $config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['last_tagl_close']  = '</span></li>';

        $this->pagination->initialize($config);
        $data['page'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $data['nilai_supplier'] = $this->nilai_model->get_nilai_list($config["per_page"], $data['page']);
        $data["bobot"] = $this->bobot_model->getAll();
        $data['pagination'] = $this->pagination->create_links();
        $this->load->view('nilai/list', $data);
        /*
        $data["nilai"] = $this->nilai_model->getAll();
		$data["supplier"] = $this->supplier_model->getAll();
		$data["bobot"] = $this->bobot_model->getAll();
		$data['nilai_supplier'] = $this->supplier_model->join2table()->result(); 
        $this->load->view("nilai/list", $data);
		*/
    }

    public function filter()
    {
        $tahun = $this->input->post('tahun');
        $periode = $this->input->post('periode');
        $where = array(
            'tahun' => $tahun,
            'periode' => $periode
        );
        //konfigurasi pagination
        $config['base_url'] = site_url('nilai/filter'); //site url
        $config['total_rows'] = $this->db->get_where('nilai', $where)->num_rows(); //total row
        $config['per_page'] = 5;  //show record per halaman
        $config["uri_segment"] = 3;  // uri parameter
        $choice = $config["total_rows"] / $config["per_page"];
        $config["num_links"] = floor($choice);

        // Membuat Style pagination untuk BootStrap v4
        $config['first_link']       = 'First';
        $config['last_link']        = 'Last';
        $config['next_link']        = 'Next';
        $config['prev_link']        = 'Prev';
        $config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
        $config['full_tag_close']   = '</ul></nav></div>';
        $config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
        $config['num_tag_close']    = '</span></li>';
        $config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
        $config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
        $config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
        $config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['prev_tagl_close']  = '</span>Next</li>';
        $config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
        $config['first_tagl_close'] = '</span></li>';
        $config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['last_tagl_close']  = '</span></li>';

        $this->pagination->initialize($config);
        $data['page'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $data['nilai_supplier'] = $this->nilai_model->get_nilai_list($config["per_page"], $data['page'], $tahun, $periode);
        $data["bobot"] = $this->bobot_model->getAll();
        $data['pagination'] = $this->pagination->create_links();
        $this->load->view('nilai/list', $data);
        /*
        $data["nilai"] = $this->nilai_model->getAll();
		$data["supplier"] = $this->supplier_model->getAll();
		$data["bobot"] = $this->bobot_model->getAll();
		$data['nilai_supplier'] = $this->supplier_model->join2table()->result(); 
        $this->load->view("nilai/list", $data);
		*/
    }

    public function add()
    {
        $nilai = $this->nilai_model;
        $validation = $this->form_validation;
        $validation->set_rules($nilai->rules());

        if ($validation->run()) {
            $nilai->save();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }

        $this->load->view("nilai/add");
    }

    public function edit($id = null)
    {
        if (!isset($id)) redirect('nilai');

        $nilai = $this->nilai_model;
        $validation = $this->form_validation;
        $validation->set_rules($nilai->rules());

        if ($validation->run()) {
            var_dump('oi');
            die;
            $nilai->update();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }

        $data["nilai"] = $nilai->getById($id);
        if (!$data["nilai"]) {
            var_dump('oi');
            die;
        };

        $this->load->view("nilai/edit", $data);
    }

    public function view_tambah_nilai($id)
    {

        if (!isset($id)) redirect('nilai');

        $nilai = $this->nilai_model;
        $validation = $this->form_validation;
        $validation->set_rules($nilai->rules());

        if ($validation->run()) {
            var_dump('oi');
            die;
            $nilai->update();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }

        $data["nilai"] = $nilai->getById($id);
        if (!$data["nilai"]) {
            var_dump('oi');
            die;
        };

        $this->load->view("nilai/tambah_nilai", $data);
    }

    public function UpdateNilai()
    {
        # code...
        $data = $this->db->get_where('nilai', array('id_nilai' => $this->input->post('id')))->row();
        $tahun = $this->input->post('tahun');
        $periode = $this->input->post('periode');

        if (($tahun != $data->tahun) || $periode != $data->periode) {
            $data_sup = $this->db->get('nilai')->result_array();
            if ($data_sup == null) {
                $id = 'NI000001';
            } else {
                $id_code = null;
                foreach ($data_sup as $rkm) {
                    $code =  substr($rkm['id_nilai'], 2);
                    if ($id_code == null) {

                        $id_code = $code;
                    } else {
                        if ($code > $id_code) {
                            $id_code = $code;
                        }
                    }
                }
                $id = 'NI' . str_pad($id_code + 1, 6, '0', STR_PAD_LEFT);
            }
            $data_update = array(
                'id_nilai' => $id,
                'tahun' => $this->input->post('tahun'),
                'periode' => $this->input->post('periode'),
                'rasa' => $this->input->post('rasa'),
                'aroma' => $this->input->post('aroma'),
                'warna' => $this->input->post('warna'),
                'aksesibilitas' => $this->input->post('aksesibilitas'),
                'packaging' => $this->input->post('packaging'),
                'konsistensi' => $this->input->post('konsistensi'),
                'harga' => $this->input->post('harga'),
                'fleksibilitas' => $this->input->post('fleksibilitas'),
                'garansi' => $this->input->post('garansi'),
                'jarak' => $this->input->post('jarak'),
                'lokasi' => $this->input->post('lokasi'),
                'legalitas' => $this->input->post('legalitas'),
                'manajerial' => $this->input->post('manajerial'),
                'komunikasi' => $this->input->post('komunikasi'),
                'id_supplier' => $data->id_supplier,
                'id_users' => $this->session->userdata('id_users'),
                'status' => 1



            );
            $this->nilai_model->Tambah_data($data_update, 'nilai');
        } else {
            $data_update = array(
                'rasa' => $this->input->post('rasa'),
                'aroma' => $this->input->post('aroma'),
                'warna' => $this->input->post('warna'),
                'aksesibilitas' => $this->input->post('aksesibilitas'),
                'packaging' => $this->input->post('packaging'),
                'konsistensi' => $this->input->post('konsistensi'),
                'harga' => $this->input->post('harga'),
                'fleksibilitas' => $this->input->post('fleksibilitas'),
                'garansi' => $this->input->post('garansi'),
                'jarak' => $this->input->post('jarak'),
                'lokasi' => $this->input->post('lokasi'),
                'legalitas' => $this->input->post('legalitas'),
                'manajerial' => $this->input->post('manajerial'),
                'komunikasi' => $this->input->post('komunikasi'),
                'id_supplier' => $data->id_supplier,
                'id_users' => $this->session->userdata('id_users'),
                'status' => 1



            );
            $where = array(
                'id_nilai' => $this->input->post('id')
            );
            $this->nilai_model->edit_data($where, $data_update, 'nilai');
        }

        // var_dump($data_update);
        redirect(site_url('nilai'));
    }

    public function delete($id = null)
    {
        if (!isset($id)) show_404();

        if ($this->nilai_model->delete($id)) {
            redirect(site_url('nilai'));
        }
    }
    public function TambahNilai()
    {
        # code...
        $data['supplier'] = $this->db->get('supplier')->result_array();
        $data['sup_nilai'] = array_column($this->db->get('nilai')->result_array(), 'id_supplier');

        $this->load->view("nilai/add_nilai", $data);
    }
    public function MenambahNilai()
    {
        # code...
        $tahun = $this->input->post('tahun');
        $periode = $this->input->post('periode');


        $data_sup = $this->db->get('nilai')->result_array();
        if ($data_sup == null) {
            $id = 'NI000001';
        } else {
            $id_code = null;
            foreach ($data_sup as $rkm) {
                $code =  substr($rkm['id_nilai'], 2);
                if ($id_code == null) {

                    $id_code = $code;
                } else {
                    if ($code > $id_code) {
                        $id_code = $code;
                    }
                }
            }
            $id = 'NI' . str_pad($id_code + 1, 6, '0', STR_PAD_LEFT);
        }
        $data_update = array(
            'id_nilai' => $id,
            'tahun' => $this->input->post('tahun'),
            'periode' => $this->input->post('periode'),
            'rasa' => $this->input->post('rasa'),
            'aroma' => $this->input->post('aroma'),
            'warna' => $this->input->post('warna'),
            'aksesibilitas' => $this->input->post('aksesibilitas'),
            'packaging' => $this->input->post('packaging'),
            'konsistensi' => $this->input->post('konsistensi'),
            'harga' => $this->input->post('harga'),
            'fleksibilitas' => $this->input->post('fleksibilitas'),
            'garansi' => $this->input->post('garansi'),
            'jarak' => $this->input->post('jarak'),
            'lokasi' => $this->input->post('lokasi'),
            'legalitas' => $this->input->post('legalitas'),
            'manajerial' => $this->input->post('manajerial'),
            'komunikasi' => $this->input->post('komunikasi'),
            'id_supplier' => $this->input->post('id_supplier'),
            'id_users' => $this->session->userdata('id_users'),
            'status' => 1



        );
        // var_dump($data_update);
        // die;
        $this->nilai_model->Tambah_data($data_update, 'nilai');
        redirect(site_url('nilai'));
    }
    public function getData()
    {
        # code...
        $id = $this->input->post('id_sup');
        $data = $this->db->get_Where('nilai', array('id_supplier' => $id))->result_array();
        echo json_encode($data);
    }
}
