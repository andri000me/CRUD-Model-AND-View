<?php namespace models\_model_siswa;
	
	use _config\Config as Config;

	class Model_Siswa extends Config {
		function __construct() {
			parent::__construct();

			$this->db = new Config();
		}

		public function SELECT_ALL() {
			$this->db->select('*');			
			$this->db->from('tb_siswa');

			$data = $this->db->get();

			return $data;
		}

		public function SELECT_BY_ID($id) {
			$this->db->select('*');			
			$this->db->from('tb_siswa');
			$this->db->where('id_siswa', $id);

			$data = $this->db->get();

			return $data[0];
		}

		public function LIKE($search) {
			$this->db->select('*');			
			$this->db->from('tb_siswa');
			$this->db->like('nama', $search);
			$this->db->like('alamat', $search);

			$data = $this->db->get();

			return $data;
		}

		public function INSERT($data) {
			$result = $this->db->insert('tb_siswa', $data);

			return $result;
		}

		public function DELETE($id) {
			$this->db->delete("tb_siswa");
			$this->db->where_delete("id_siswa", $id);

			$result = $this->db->getDelete();

			return $result;
		}

		public function UPDATE($data, $id) {
			$this->db->update("tb_siswa", $data);
			$this->db->where_update("id_siswa", $id);

			$result = $this->db->getUpdate();

			return $result;
		}
	}
?>