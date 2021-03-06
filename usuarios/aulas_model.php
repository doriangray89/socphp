<?php
require_once('db_abstract_model.php');

class Aulas extends DBAbstractModel {
	public $num;
	public $superficie;
	public $edificio;
	public $id;

	function __construct() {
		$this->db_name = 'book_example';
	}

	//
	public function get($num='') {
		if($num != ''):
			$this->query = "SELECT id, num, superficie, edificio
			FROM aulas
			WHERE num = '$num'";
			$this->get_results_from_query();
		endif;
		if(count($this->rows) == 1):
			foreach ($this->rows[0] as $propiedad=>$valor):
				$this->$propiedad = $valor;
			endforeach;
		endif;
	}

	public function set($user_data=array()) {
		if(array_key_exists('num', $user_data)):
			$this->get($user_data['num']);
			if($user_data['num'] != $this->num):
				foreach ($user_data as $campo=>$valor):
					$$campo = $valor;
				endforeach;
				$this->query = "
				INSERT INTO aulas
				(num, superficie, edificio)
				VALUES
				($num, $superficie, '$edificio')";
				$this->execute_single_query();
			endif;
		endif;
	}

	public function edit($user_data=array()) {
		foreach ($user_data as $campo=>$valor):
			$$campo = $valor;
		endforeach;
		$this->query = "UPDATE aulas
		SET num='$num',
		superficie='$superficie',
		edificio='$edificio'
		WHERE num = '$num'
		";
		echo $this->query;
		$this->execute_single_query();
	}

	public function delete($num='') {
		$this->query = "
		DELETE FROM aulas
		WHERE num = '$num'
		";
		//echo $this->query;
		$this->execute_single_query();
	}

	public function listAll(){
		$this->query = "
		SELECT * FROM aulas";
		$this->get_results_from_query();
	}

	function __destruct() {
		unset($this);
	}
}
?>