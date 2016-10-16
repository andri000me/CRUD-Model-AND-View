<?php namespace models\_model_mapel;

	use _config\Config as Config;

	class Model_Mapel extends Config {
		function __construct() {
			parent::__construct();

			$this->db = new Config();
		}

		public function SELECT_ALL() {
			$this->db->select('*');			
			$this->db->from('tb_mapel');

			$data = $this->db->get();

			return $data;
		}

		public function SELECT_BY_ID($id) {
			$this->db->select('*');			
			$this->db->from('tb_mapel');
			$this->db->where('id_mapel', $id);

			$data = $this->db->get();

			return $data[0];
		}

		public function LIKE($search) {
			$this->db->select('*');			
			$this->db->from('tb_mapel');
			$this->db->like('mapel', $search);

			$data = $this->db->get();

			return $data;
		}

		public function INSERT($data) {
			$result = $this->db->insert('tb_mapel', $data);

			return $result;
		}

		public function DELETE($id) {
			$this->db->delete("tb_mapel");
			$this->db->where_delete("id_mapel", $id);

			$result = $this->db->getDelete();

			return $result;
		}

		public function UPDATE($data, $id) {
			$this->db->update("tb_mapel", $data);
			$this->db->where_update("id_mapel", $id);

			$result = $this->db->getUpdate();

			return $result;
		}
	}
?>