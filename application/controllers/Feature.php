<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Feature extends CI_Controller {

	public function __construct() {

		// load codeigniter default constructer

		parent::__construct();

		//load database library

		$this->load->database();

		// load model crud_model

		$this->load->model('Feature_model');

		$this->load->helper('url');

	}

	public function index() {
		$result['data'] = $this->Feature_model->display_records();
		$this->load->view('/Template/featurelist', $result);
	}

	public function addfeature() {
		//  $data['feature'] = $this->Feature_model->fetch_feature();

		$this->load->view('/Template/insert');

		if ($this->input->post('save')) {

			$feature    = $this->input->post('feature');
			$package_id = $this->input->post('package');
			$package    = $this->input->post('package[]');

			$data = implode(',', $package);

			$this->Feature_model->savefeatures($feature, $data);
			echo 'records saved successfully';
			return redirect('/codeigniter/index.php/feature/index');
		}

	}

	public function updatefeature() {
		$id             = $this->input->get('id');
		$result['data'] = $this->Feature_model->displayrecordsById($id);
		$this->load->view('/Template/updatefeatures', $result);

		if ($this->input->post('update')) {
			$feature = $this->input->post('feature');
			$package = $this->input->post('package[]');

			$data = implode(',', $package);

			$this->Feature_model->update_records($feature, $data, $id);
			echo 'data updated successfully!';
			return redirect('/codeigniter/index.php/feature/index');
		}
	}

	public function deletefeature() {
		$id = $this->input->get('id');
		$this->Feature_model->deleterecords($id);
		echo "Date deleted successfully !";
		return redirect('/codeigniter/index.php/feature/index');
	}

}
?>