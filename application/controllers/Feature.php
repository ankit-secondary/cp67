<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Feature extends CI_Controller {

	public function __construct() {

		// load codeigniter default constructer

		parent::__construct();

		//load database library

		$this->load->database();

		// load model Feature_model

		$this->load->model('Feature_model');

		$this->load->library("session");

		$this->load->library('form_validation');

		$this->load->helper('url');

	}

	public function index() {
		$result['data'] = $this->Feature_model->display_records();

		$this->load->view('/Template/featurelist', $result);
	}

	public function addfeature() {

		$this->load->view('/header');

		$this->form_validation->set_rules('hidden_package[]', 'Package', 'required');
		$this->form_validation->set_rules('hidden_feature[]', 'feature', 'required');
		if ($this->form_validation->run() == TRUE) {

			if ($this->input->post('insert')) {

				$feature = $this->input->post('hidden_feature[]');

				$package = $this->input->post('hidden_package[]');
				$rowno   = count($package);

				$this->Feature_model->savefeatures($feature, $package, $rowno);

				// set flash data to show success message

				$this->session->set_flashdata('success', "<div class='alert alert-success'>successfully added new data</div>");

				return redirect('/feature/index');
			} else {

				$this->session->set_flashdata('error', 'please try again');
			}

		}

		$this->load->view('/Template/insert');

	}

	public function updatefeature() {

		$this->load->view('/header');
		$id             = $this->input->get('id');
		$result['data'] = $this->Feature_model->displayrecordsById($id);

		$this->form_validation->set_rules('package[]', 'Package', 'required');

		if ($this->form_validation->run() == TRUE) {

			if ($this->input->post('update')) {
				$feature = $this->input->post('feature');
				$package = $this->input->post('package[]');

				$data = implode(',', $package);

				$featuredata = ['feature' => $feature, 'package' => $data];

				$this->Feature_model->update_records($featuredata, $id);

				$this->session->set_flashdata('success', "<div class='alert alert-success'>successfully updated  data</div>");

				return redirect('/feature/index');

			} else {
				$this->session->set_flashdata('success', "<div class='alert alert-danger'>please try again</div>");

				return redirect('/feature/index');
			}
		}

		$this->load->view('/Template/updatefeatures', $result);

	}

	public function deletefeature() {
		$id = $this->input->get('id');
		$this->Feature_model->deleterecords($id);

		$this->session->set_flashdata('success', "<div class='alert alert-danger'>successfully deleted  data</div>");

		return redirect('/feature/index');
	}

}
?>