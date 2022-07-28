<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/userguide3/general/urls.html
	 */
	public function dashboard()
	{
		$data['cat'] = $this->m_product->get_count();
		$this->load->view('templates/header');
		$this->load->view('dashboard');
		$this->load->view('templates/footer');
	}
	public function update_product($id){
		$where = array('id_product' =>$id);
		$data['product'] = $this->m_product->update_product($where, 'product')->result_array();
		$this->load->view('templates/header');
		$this->load->view('update_product',$data);
		$this->load->view('templates/footer');
	}
	public function update_category($id){
		$where = array('id_category' =>$id);
		$data['category'] = $this->m_product->update_category($where, 'category_product')->result_array();
		$this->load->view('templates/header');
		$this->load->view('update_category',$data);
		$this->load->view('templates/footer');
	}
	public function update_suppliers($id){
		$where = array('id_suppliers' =>$id);
		$data['suppliers'] = $this->m_product->update_suppliers($where, 'suppliers')->result_array();
		$this->load->view('templates/header');
		$this->load->view('update_suppliers',$data);
		$this->load->view('templates/footer');
	}
	public function category(){
		$data['category'] = $this->m_product->category();
		$this->load->view('templates/header');
		$this->load->view('category',$data);
		$this->load->view('templates/footer');
	}
	public function suppliers(){
		$data['suppliers'] = $this->m_product->suppliers();
		$this->load->view('templates/header');
		$this->load->view('suppliers',$data);
		$this->load->view('templates/footer');
	}
	public function update(){
		{
			$id = $this->input->post('id');
			$nama = $this->input->post('nama');
			$description = $this->input->post('description');
			$category = $this->input->post('category');
			$suppliers = $this->input->post('suppliers');
			$status = $this->input->post('status');
		if($_FILES['image'][''] !="")
		{
		$config['upload_path'] = './image/';
			$config['allowed_types'] =     'gif|jpg|png|jpeg|jpe|pdf|doc|docx|rtf|text|txt';
			$this->load->library('upload', $config);
			if ( ! $this->upload->do_upload('image'))
			{
			 echo "Failed update product";
			}
			else
			{
				$upload_data=$this->upload->data();
				$image =$upload_data['file_name'];
			}
		}
		else{
					$image =$this->input->post('old');
				}
				$data = array(
					'name' => $nama,
					'image' => $image,
					'description' => $description,
					'active' => $status,
					'id_category' => $category,
					'id_suppliers' => $suppliers
				);
				$where = array(
					'id_product' => $id
				);
				$this->m_product->update($where, 'product',$data);
				redirect('admin/product'); 
	}
	}
	public function update_category2(){
		$id = $this->input->post('id');
		$nama = $this->input->post('nama');
		$status = $this->input->post('status');
		$data = array(
			'name' => $nama,
			'active' => $status
		);
		$where = array(
			'id_category' => $id
		);
		$this->m_product->update($where, 'category_product',$data);
		redirect('admin/category'); 
	}
	public function update_suppliers2(){
		$id = $this->input->post('id');
		$nama = $this->input->post('supp_name');
		$address = $this->input->post('address');
		$phone = $this->input->post('phone');
		$data = array(
			'supplier_name' => $nama,
			'address' => $address,
			'phone' => $phone
		);
		$where = array(
			'id_suppliers' => $id
		);
		$this->m_product->update($where, 'suppliers',$data);
		redirect('admin/suppliers'); 
	}

	public function product(){
		$this->load->model('m_product');
        $data['product']=$this->m_product->get_data();
	
		$this->load->view('templates/header');
		$this->load->view('produk',$data);
		$this->load->view('templates/footer');
	}
	public function delete($id){
		$where = array('id_product' => $id);
		$this->m_product->delete_product($where, 'product');
		redirect('admin/product');
	 }
	 public function delete_supp($id){
		$where = array('id_suppliers' => $id);
		$this->m_product->delete_product($where, 'suppliers');
		redirect('admin/suppliers');
	 }
	 public function delete2($id){
		$where = array('id_category' => $id);
		$this->m_product->delete_category($where, 'category_product');
		redirect('admin/category');
	 }
	public function add_product(){
		$config['upload_path']          = './image/';
		$config['allowed_types']        = 'gif|jpg|png';
		$config['max_size']             = 10000;
		$config['max_width']            = 10240;
		$config['max_height']           = 7680;

		$this->load->library('upload', $config);

		if ( ! $this->upload->do_upload('image'))
		{
			echo "Failed add product ";
		}
		else
		{
			$image = $this->upload->data();
			$image = $image['file_name'];
			$nama = $this->input->post('nama', TRUE);
			$description = $this->input->post('description', TRUE);
			$category = $this->input->post('category', TRUE);
			$suppliers = $this->input->post('suppliers', TRUE);

		$data = array(
			'name' => $nama,
			'image' => $image,
			'description' => $description,
			'id_category' => $category,
			'id_suppliers' => $suppliers
		);
		$this->db->insert('product', $data);
		// $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Product added successfully</div>');
		redirect('http://localhost:8080/Belajar-ci3/index.php/admin/product');
		
		}

}
public function add_category(){
	$nama = $this->input->post('nama');
	$data = array(
		'name' => $nama
	);
	$this->db->insert('category_product', $data);
	redirect('http://localhost:8080/Belajar-ci3/index.php/admin/category');
}
public function add_suppliers(){
	$nama = $this->input->post('nama');
	$address = $this->input->post('address');
	$phone = $this->input->post('phone');
	$data = array(
		'supplier_name' => $nama,
		'address' => $address,
		'phone' => $phone
	);
	$this->db->insert('suppliers', $data);
	redirect('http://localhost:8080/Belajar-ci3/index.php/admin/suppliers');
}




		
	}
