<?php namespace models\_model_nilai;
	
	use _config\Config as Config;

	class Model_Nilai extends Config {
		function __construct() {
			parent::__construct();

			$this->db = new Config();
		}

		public function SELECT_ALL() {
			//------------------------ 1 -------------------------------
			// $this->db->select('tb_siswa.nama, tb_siswa.alamat, tb_siswa.jk, tb_nilai.nilai, tb_mapel.mapel');

			//------------------------ 2 -------------------------------
			// $this->db->select('tb_siswa.nama');
			// $this->db->select('tb_siswa.alamat');
			// $this->db->select('tb_siswa.jk');
			// $this->db->select('tb_nilai.nilai');
			// $this->db->select('tb_mapel.mapel');

			//------------------------ 3 -------------------------------
			// $select = ['tb_siswa.nama', 'tb_siswa.alamat', 'tb_siswa.jk', 'tb_nilai.nilai', 'tb_mapel.mapel'];

			//-----------------------------------------------------------------------------------

			$this->db->select('tb_nilai.id_nilai, tb_siswa.nama, tb_nilai.nilai, tb_mapel.mapel');
			
			$this->db->from('tb_siswa, tb_mapel, tb_nilai');
			$this->db->where('tb_nilai.id_siswa', 'tb_siswa.id_siswa');
			$this->db->where('tb_nilai.id_mapel', 'tb_mapel.id_mapel');
			$this->db->order('tb_mapel.mapel', 'ASC');

			$data = $this->db->get();

			return $data;
		}

		public function SELECT_BY_ID($id) {
			$this->db->select('*');			
			$this->db->from('tb_nilai');
			$this->db->where('id_nilai', $id);

			$data = $this->db->get();

			return $data[0];
		}

		public function SELECT_ALL_BY_Mapel($id_mapel='') {
			$this->db->select('tb_siswa.nama, tb_nilai.nilai, tb_mapel.mapel');
			
			$this->db->from('tb_siswa, tb_mapel, tb_nilai');
			$this->db->where('tb_nilai.id_siswa', 'tb_siswa.id_siswa');
			$this->db->where('tb_nilai.id_mapel', 'tb_mapel.id_mapel');
			$this->db->where('tb_nilai.id_mapel', $id_mapel);

			$data = $this->db->get();

			return $data;
		}

		public function LIKE($search) {
			$this->db->select('tb_nilai.id_nilai, tb_siswa.nama, tb_nilai.nilai, tb_mapel.mapel');
			
			$this->db->from('tb_siswa, tb_mapel, tb_nilai');
			$this->db->where('tb_nilai.id_siswa', 'tb_siswa.id_siswa');
			$this->db->where('tb_nilai.id_mapel', 'tb_mapel.id_mapel');
			$this->db->and_like('tb_mapel.mapel', $search);

			$this->db->or_where('tb_nilai.id_siswa', 'tb_siswa.id_siswa');
			$this->db->where('tb_nilai.id_mapel', 'tb_mapel.id_mapel');
			$this->db->and_like('tb_siswa.nama', $search);

			$this->db->or_where('tb_nilai.id_siswa', 'tb_siswa.id_siswa');
			$this->db->where('tb_nilai.id_mapel', 'tb_mapel.id_mapel');
			$this->db->and_like('tb_nilai.nilai', $search);

			$data = $this->db->get();

			return $data;
		}

		public function INSERT($data) {
			$this->db->select('*');
			$this->db->from('tb_nilai');
			$this->db->where('id_siswa', $data['id_siswa']);
			$this->db->where('id_mapel', $data['id_mapel']);

			$data_duplikat = $this->db->get();

			if (count($data_duplikat) == 0) {
				$result = $this->db->insert('tb_nilai', $data);
				return $result;
			} else {
				header('location: ../nilai.php');
			}
		}

		public function DELETE($id) {
			$this->db->delete("tb_nilai");
			$this->db->where_delete("id_nilai", $id);

			$result = $this->db->getDelete();

			return $result;
		}

		public function CUSTOM_DELETE($field, $value) {
			$this->db->delete("tb_nilai");
			$this->db->where_delete($field, $value);

			$result = $this->db->getDelete();

			return $result;
		}

		public function UPDATE($data, $id) {
			$this->db->update("tb_nilai", $data);
			$this->db->where_update("id_nilai", $id);

			$result = $this->db->getUpdate();

			return $result;
		}
	}
?>