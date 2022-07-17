<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Nilai extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if($this->session->userdata('level') != $this->input->post('username')){
            $this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Maaf!</strong><br> Anda Harus Login Dulu
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
                </div>');
            redirect('login');
        }
        $this->load->model("nilai_model");
        $this->load->model("supplier_model");
        $this->load->model("bobot_model");
        $this->load->library('session');
        $this->load->library('form_validation');
        $this->load->library('pagination');
    }

    public function index()
    {
        $this->load->view('nilai/list');
    }

    public function load_awal()
    {
        $where = [];
        $data['nilai_supplier'] = $this->nilai_model->get_nilai_list($where);
        $data["bobot"] = $this->bobot_model->getAll();

        $this->load->view('nilai/filter_nilai_list', $data);
    }

    public function filter()
    {
        $tahun = $this->input->post('tahun');
        $periode = $this->input->post('periode');

        $where = array(
            'tahun' => $tahun,
            'periode' => $periode
        );

        $data['nilai_supplier'] = $this->nilai_model->get_nilai_list($where);
        $data["bobot"] = $this->bobot_model->getAll();

        $this->load->view('nilai/filter_nilai_list', $data);
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
                // 'status' => 1

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
                // 'status' => 1

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
            // 'status' => 1

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
