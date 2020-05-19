<?php

class Feature_model extends CI_Model {

	function savefeatures($featuredata) {

		//$query = "insert into features values('','$feature','$data')";
		//$this->db->query($query);

		$this->db->insert('features', $featuredata);

	}

	/*View*/
	function display_records() {

		//$query = $this->db->query("select * from features");

		$query = $this->db->get("features");

		return $query->result();

	}

	function deleterecords($id) {

		//$this->db->query("delete  from features where id='".$id."'");
		
		$this->db->where('id', $id);
		$this->db->delete('features');
	}

	function displayrecordsById($id) {

		//$query = $this->db->query("select * from features  where id='".$id."'");

		$this->db->where('id', $id);

		//$this->db->order_by('id', 'desc');

		$query = $this->db->get("features");

		return $query->result();
	}

	function update_records($featuredata, $id) {

		//$query = $this->db->query("update features SET feature='$feature',package='$data' where id='$id'");

		$this->db->where('id', $id);
		$this->db->update('features', $featuredata);
	}

}

?>