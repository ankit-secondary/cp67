<?php

class Feature_model extends CI_Model {

	function savefeatures($feature, $data) {

		$query = "insert into features values('','$feature','$data')";
		$this->db->query($query);

	}

	/*View*/
	function display_records() {
		$query = $this->db->query("select * from features");
		return $query->result();
	}

	function fetch_feature() {
		$query = $this->db->get("featureselect");
		return $query->result();
	}

	function deleterecords($id) {
		$this->db->query("delete  from features where id='".$id."'");
	}

	function displayrecordsById($id) {
		$query = $this->db->query("select * from features  where id='".$id."'");
		return $query->result();
	}

	function update_records($feature, $data, $id) {

		$query = $this->db->query("update features SET feature='$feature',package='$data' where id='$id'");
	}

}

?>