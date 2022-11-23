<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Cashflow extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_cashflow');
        $this->load->helper('url');
        $this->load->library(array('session'));
    }
    
	//CRUD dengan jquery Ajax cashflow awal pendapatan
	function data_cashawpend()
	{
		$id_lb = $this->input->post('id_lb');
		$data = $this->m_cashflow->cashawpend_list($id_lb);
		echo json_encode($data);
	}

	function get_cashawpend()
	{
		$id_cf = $this->input->get('id');
		$data = $this->m_cashflow->get_cashawpend_by_kode($id_cf);
		echo json_encode($data);
	}

	function seleksi_cashawpend()
	{
		$id_cf = $this->input->post('id_cf');
		$id_lb = $this->input->post('id_lb');
		$kode = $this->input->post('kode');
		$query = $this->m_cashflow->cek_id($id_lb, $kode)->num_rows();
		if (empty($query)) {
			$this->m_cashflow->add_cashawpend($id_cf);
		} else {
			$this->db->where(array('id_lb' => $id_lb));
			$this->db->where(array('kode' => $kode));
			$this->db->delete('cashflow_b');
			$this->m_cashflow->edit_cashawpend($kode);
		}
	}

	function update_cashawpend()
	{
		$id_lb = $this->input->post('id_lb');
        $kode = $this->input->post('kode');

        $this->db->where(array('id_lb' => $id_lb));
        $this->db->where(array('kode' => $kode));
        $this->db->delete('cashflow_b');

        $hasil = $this->m_cashflow->edit_cashawpend($kode);
		echo json_encode($hasil);
	}

	function delete_cashawpend()
	{
		$kode = $this->input->post('kode');
		$id_lb = $this->input->post('id_lb');
		$data = $this->m_cashflow->delete_cashawpend($kode,$id_lb);
		echo json_encode($data);
	}
	//End CRUD Jquery Ajax
	    
	//CRUD dengan jquery Ajax cashflow awal pengeluaran
	function data_cashawpeng()
	{
		$id_lb = $this->input->post('id_lb');
		$data = $this->m_cashflow->cashawpeng_list($id_lb);
		echo json_encode($data);
	}

	function get_cashawpeng()
	{
		$id_cf = $this->input->get('id');
		$data = $this->m_cashflow->get_cashawpend_by_kode($id_cf);
		echo json_encode($data);
	}

	function seleksi_cashawpeng()
	{
		$id_cf = $this->input->post('id_cf');
		$id_lb = $this->input->post('id_lb');
		$kode = $this->input->post('kode');
		$query = $this->m_cashflow->cek_id($id_lb, $kode)->num_rows();
		if (empty($query)) {
			$this->m_cashflow->add_cashawpeng($id_cf);
		} else {
			$this->db->where(array('id_lb' => $id_lb));
			$this->db->where(array('kode' => $kode));
			$this->db->delete('cashflow_b');
			$this->m_cashflow->edit_cashawpeng($kode);
		}
	}

	function update_cashawpeng()
	{
		$id_lb = $this->input->post('id_lb');
        $kode = $this->input->post('kode');

        $this->db->where(array('id_lb' => $id_lb));
        $this->db->where(array('kode' => $kode));
        $this->db->delete('cashflow_b');

        $hasil = $this->m_cashflow->edit_cashawpeng($kode);
		echo json_encode($hasil);
	}

	function delete_cashawpeng()
	{
		$kode = $this->input->post('kode');
		$id_lb = $this->input->post('id_lb');
		$data = $this->m_cashflow->delete_cashawpend($kode,$id_lb);
		echo json_encode($data);
	}
	//End CRUD Jquery Ajax
	    
	//CRUD dengan jquery Ajax cashflow setelah pendapatan
	function data_cashsetpend()
	{
		$id_lb = $this->input->post('id_lb');
		$data = $this->m_cashflow->cashsetpend_list($id_lb);
		echo json_encode($data);
	}

	function get_cashsetpend()
	{
		$id_cf = $this->input->get('id');
		$data = $this->m_cashflow->get_cashsetpend_by_kode($id_cf);
		echo json_encode($data);
	}

	function seleksi_cashsetpend()
	{
		$id_cf = $this->input->post('id_cf');
		$id_lb = $this->input->post('id_lb');
		$kode = $this->input->post('kode');
		$query = $this->m_cashflow->cek_id_set($id_lb, $kode)->num_rows();
		if (empty($query)) {
			$this->m_cashflow->add_cashsetpend($id_cf);
		} else {
			$this->db->where(array('id_lb' => $id_lb));
			$this->db->where(array('kode' => $kode));
			$this->db->delete('cashflow_a');
			$this->m_cashflow->edit_cashsetpend($kode);
		}
	}

	function update_cashsetpend()
	{
		$id_lb = $this->input->post('id_lb');
        $kode = $this->input->post('kode');

        $this->db->where(array('id_lb' => $id_lb));
        $this->db->where(array('kode' => $kode));
        $this->db->delete('cashflow_a');

        $hasil = $this->m_cashflow->edit_cashsetpend($kode);
		echo json_encode($hasil);
	}

	function delete_cashsetpend()
	{
		$kode = $this->input->post('kode');
		$id_lb = $this->input->post('id_lb');
		$data = $this->m_cashflow->delete_cashsetpend($kode,$id_lb);
		echo json_encode($data);
	}
	//End CRUD Jquery Ajax
		    
	//CRUD dengan jquery Ajax cashflow setelah pengeluaran
	function data_cashsetpeng()
	{
		$id_lb = $this->input->post('id_lb');
		$data = $this->m_cashflow->cashsetpeng_list($id_lb);
		echo json_encode($data);
	}

	function get_cashsetpeng()
	{
		$id_cf = $this->input->get('id');
		$data = $this->m_cashflow->get_cashsetpend_by_kode($id_cf);
		echo json_encode($data);
	}

	function seleksi_cashsetpeng()
	{
		$id_cf = $this->input->post('id_cf');
		$id_lb = $this->input->post('id_lb');
		$kode = $this->input->post('kode');
		$query = $this->m_cashflow->cek_id_set($id_lb, $kode)->num_rows();
		if (empty($query)) {
			$this->m_cashflow->add_cashsetpeng($id_cf);
		} else {
			$this->db->where(array('id_lb' => $id_lb));
			$this->db->where(array('kode' => $kode));
			$this->db->delete('cashflow_a');
			$this->m_cashflow->edit_cashsetpeng($kode);
		}
	}

	function update_cashsetpeng()
	{
		$id_lb = $this->input->post('id_lb');
        $kode = $this->input->post('kode');

        $this->db->where(array('id_lb' => $id_lb));
        $this->db->where(array('kode' => $kode));
        $this->db->delete('cashflow_a');

        $hasil = $this->m_cashflow->edit_cashsetpeng($kode);
		echo json_encode($hasil);
	}

	function delete_cashsetpeng()
	{
		$kode = $this->input->post('kode');
		$id_lb = $this->input->post('id_lb');
		$data = $this->m_cashflow->delete_cashsetpend($kode,$id_lb);
		echo json_encode($data);
	}
	//End CRUD Jquery Ajax		  

	//CRUD dengan jquery Ajax cashflow setelah hutang
	function data_cashsethut()
	{
		$id_lb = $this->input->post('id_lb');
		$data = $this->m_cashflow->cashsethut_list($id_lb);
		echo json_encode($data);
	}

	function get_cashsethut()
	{
		$id_cf = $this->input->get('id');
		$data = $this->m_cashflow->get_cashsetpend_by_kode($id_cf);
		echo json_encode($data);
	}

	function seleksi_cashsethut()
	{
		$id_cf = $this->input->post('id_cf');
		$id_lb = $this->input->post('id_lb');
		$kode = $this->input->post('kode');
		$query = $this->m_cashflow->cek_id_set($id_lb, $kode)->num_rows();
		if (empty($query)) {
			$this->m_cashflow->add_cashsethut($id_cf);
		} else {
			$this->db->where(array('id_lb' => $id_lb));
			$this->db->where(array('kode' => $kode));
			$this->db->delete('cashflow_a');
			$this->m_cashflow->edit_cashsethut($kode);
		}
	}

	function update_cashsethut()
	{
		$id_lb = $this->input->post('id_lb');
        $kode = $this->input->post('kode');

        $this->db->where(array('id_lb' => $id_lb));
        $this->db->where(array('kode' => $kode));
        $this->db->delete('cashflow_a');

        $hasil = $this->m_cashflow->edit_cashsethut($kode);
		echo json_encode($hasil);
	}

	function delete_cashsethut()
	{
		$kode = $this->input->post('kode');
		$id_lb = $this->input->post('id_lb');
		$data = $this->m_cashflow->delete_cashsetpend($kode,$id_lb);
		echo json_encode($data);
	}
	//End CRUD Jquery Ajax
    
	//CRUD dengan jquery Ajax cashflow lain pendapatan
/**
 * It takes the value of the id_lb field from the form, and uses it to query the database for the data
 * that matches that id_lb
 */
	function data_cashpendlain()
	{
		$id_lb = $this->input->post('id_lb');
		$data = $this->m_cashflow->cashpendlain_list($id_lb);
		echo json_encode($data);
	}

/**
 * It gets the data from the database and returns it as a JSON object
 */
	function get_cashpendlain()
	{
		$id_cf = $this->input->get('id');
		$data = $this->m_cashflow->get_cashpendlain_by_kode($id_cf);
		echo json_encode($data);
	}

/**
 * It checks if the row exists, if it doesn't, it inserts a new row, if it does, it deletes the row and
 * inserts a new one
 */
	function seleksi_cashpendlain()
	{
		$id_cf = $this->input->post('id_cf');
		$id_lb = $this->input->post('id_lb');
		$kode = $this->input->post('kode');
		$query = $this->m_cashflow->cek_id_lain($id_lb, $kode)->num_rows();
		if (empty($query)) {
			$this->m_cashflow->add_cashpendlain($id_cf);
		} else {
			$this->db->where(array('id_lb' => $id_lb));
			$this->db->where(array('kode' => $kode));
			$this->db->delete('cashflow_lain');
			$this->m_cashflow->edit_cashpendlain($kode);
		}
	}

/**
 * It takes the id_lb and kode from the form, deletes the old data from the database, and then inserts
 * the new data
 */
	function update_cashpendlain()
	{
		$id_lb = $this->input->post('id_lb');
        $kode = $this->input->post('kode');

        $this->db->where(array('id_lb' => $id_lb));
        $this->db->where(array('kode' => $kode));
        $this->db->delete('cashflow_lain');

        $hasil = $this->m_cashflow->edit_cashpendlain($kode);
		echo json_encode($hasil);
	}

/**
 * The above function is used to delete the cash flow data.
 */
	function delete_cashpendlain()
	{
		$kode = $this->input->post('kode');
		$id_lb = $this->input->post('id_lb');
		$data = $this->m_cashflow->delete_cashpendlain($kode,$id_lb);
		echo json_encode($data);
	}
	//End CRUD Jquery Ajax
	    
	//CRUD dengan jquery Ajax cashflow lain pengeluaran
/**
 * It takes the value of the id_lb field from the form, and uses it to query the database for the data
 * that matches that id_lb
 */
	function data_cashpenglain()
	{
		$id_lb = $this->input->post('id_lb');
		$data = $this->m_cashflow->cashpenglain_list($id_lb);
		echo json_encode($data);
	}

/**
 * The above function is used to get the cash flow data from the database.
 */
	function get_cashpenglain()
	{
		$id_cf = $this->input->get('id');
		$data = $this->m_cashflow->get_cashpendlain_by_kode($id_cf);
		echo json_encode($data);
	}

/**
 * It checks if the row exists, if it doesn't, it inserts a new row, if it does, it updates the
 * existing row
 */
	function seleksi_cashpenglain()
	{
		$id_cf = $this->input->post('id_cf');
		$id_lb = $this->input->post('id_lb');
		$kode = $this->input->post('kode');
		$query = $this->m_cashflow->cek_id_lain($id_lb, $kode)->num_rows();
		if (empty($query)) {
			$this->m_cashflow->add_cashpenglain($id_cf);
		} else {
			$this->db->where(array('id_lb' => $id_lb));
			$this->db->where(array('kode' => $kode));
			$this->db->delete('cashflow_lain');
			$this->m_cashflow->edit_cashpenglain($kode);
		}
	}

	/**
	 * It takes the id_lb and kode from the form, deletes the row from the database, and then updates the
	 * database with the new values
	 */
	function update_cashpenglain()
	{
		$id_lb = $this->input->post('id_lb');
        $kode = $this->input->post('kode');

        $this->db->where(array('id_lb' => $id_lb));
        $this->db->where(array('kode' => $kode));
        $this->db->delete('cashflow_lain');

        $hasil = $this->m_cashflow->edit_cashpenglain($kode);
		echo json_encode($hasil);
	}

/**
 * The above function is used to delete the cash flow data.
 */
	function delete_cashpenglain()
	{
		$kode = $this->input->post('kode');
		$id_lb = $this->input->post('id_lb');
		$data = $this->m_cashflow->delete_cashpendlain($kode,$id_lb);
		echo json_encode($data);
	}
	//End CRUD Jquery Ajax
	 






    public function index()
    {
        $data['title'] = 'Latar Belakang';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $data['query'] = $this->m_cashflow->tampil_data();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('kredit/lb', $data);
        $this->load->view('templates/footer');
    }

    public function add()
    {
        $id_cf = $this->input->post('id_cf');

        $this->m_cashflow->add_data($id_cf);
    }

    public function edit()
    {
        $id_lb = $this->input->post('id_lbcp');
        $kode = $this->input->post('kodecp');

        $this->db->where(array('id_lb' => $id_lb));
        $this->db->where(array('kode' => $kode));
        $this->db->delete('cashflow_a');

        $this->m_cashflow->edit_data($kode);
    }
    
    public function hapusCashflowsPendapatan()
	{
		$idt = $this->input->post('idHapusCashflowsPendapatan');        
		$id_lb = $this->input->post('id_lb');
		$this->m_cashflow->hapusCashflowsPendapatan($idt, $id_lb);
	}

    public function add2()
    {
        $id_cf = $this->input->post('id_cf');
        $this->m_cashflow->add_data2($id_cf);
    }
    
    public function editp()
    {
        $id_lb = $this->input->post('id_lbcpe');
        $kode = $this->input->post('kodecpe');
        
        $this->db->where(array('id_lb' => $id_lb));
        $this->db->where(array('kode' => $kode));
        $this->db->delete('cashflow_a');

        $this->m_cashflow->edit_datap($kode);
    }
        
    public function hapusCashflowsPengeluaran()
	{
		$idt = $this->input->post('idHapusCashflowsPengeluaran');        
		$id_lb = $this->input->post('id_lb');
		$this->m_cashflow->hapusCashflowsPengeluaran($idt, $id_lb);
	}

    public function add_hutang()
    {
        $id_cf = $this->input->post('id_cf');
        $this->m_cashflow->add_data_hutang($id_cf);
    }

	
/*
    public function templateword()
    {
        $id_lb = $_GET['id_lb'];
        $next = $this->db->query("SELECT * FROM latar_belakang WHERE id_lb='$id_lb'");
        foreach ($next->result() as $row) {
            require 'vendor/autoload.php';
            $templateProcessor = new \PhpOffice\PhpWord\TemplateProcessor("C:/xampp/htdocs/analisakredit/cache/" . $row->nama_debitur . date('d-m-y') . ".docx");
        }

        $surat = $this->db->query("SELECT * FROM cashflow_b WHERE id_lb='$id_lb'");
        foreach ($surat->result() as $row) {

            $replacements = array();
            foreach ($surat->result() as $row) {

                $replacements[] = array(
                    'no_cf'    => $row->no,
                    'ket_cf'    => $row->keterangan,
                    'pemasukan'        => number_format($row->pemasukan),
                    'pengeluaran'        => number_format($row->pengeluaran),
                    'saldo_cf'  => number_format($row->saldo)
                );
            }
            $templateProcessor->cloneRowAndSetValues('no_cf', $replacements);

            foreach ($next->result() as $row) {
                $pathToSave = "C:/xampp/htdocs/analisakredit/cache/" . $row->nama_debitur . date('d-m-y') . ".docx";
                $templateProcessor->saveAs($pathToSave);
            }
            redirect('test?id_lb=' . $id_lb);
        }
    }

    public function templateword2()
    {
        $id_lb = $_GET['id_lb'];
        $next = $this->db->query("SELECT * FROM latar_belakang WHERE id_lb='$id_lb'");
        foreach ($next->result() as $row) {
            require 'vendor/autoload.php';
            $templateProcessor = new \PhpOffice\PhpWord\TemplateProcessor("C:/xampp/htdocs/analisakredit/cache/" . $row->nama_debitur . date('d-m-y') . ".docx");
        }

        $surat = $this->db->query("SELECT * FROM cashflow_a WHERE id_lb='$id_lb'");
        foreach ($surat->result() as $row) {

            $replacements = array();
            foreach ($surat->result() as $row) {

                $replacements[] = array(
                    'no_cf_'    => $row->no,
                    'ket_cf_'    => $row->keterangan,
                    'pemasukan_'        => number_format($row->pemasukan),
                    'pengeluaran_'        => number_format($row->pengeluaran),
                    'saldo_cf_'  => number_format($row->saldo)
                );
            }
            $templateProcessor->cloneRowAndSetValues('no_cf_', $replacements);

            foreach ($next->result() as $row) {
                $pathToSave = "C:/xampp/htdocs/analisakredit/cache/" . $row->nama_debitur . date('d-m-y') . ".docx";
                $templateProcessor->saveAs($pathToSave);
            }
            redirect('test?id_lb=' . $id_lb);
        }
    }

*/
}
