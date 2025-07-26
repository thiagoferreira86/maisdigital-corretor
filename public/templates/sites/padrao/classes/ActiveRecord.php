<?php
ini_set('memory_limit', '-1');  // memória ilimitada
ini_set('allow_url_fopen', 1);
abstract class ActiveRecord {
	
	protected function getTable() {
		return strtolower(get_class($this)).'s';
	}
	
	protected function getFields() {
		return array_diff(array_keys(get_object_vars($this)),array('id'));
	}
	public function save() {
		if(!empty($this->id)) return $this->update();
		
		foreach($this->getFields() as $field) {
			$fields[] = $field;
			$values[] = "'".$this->$field."'";
		}		
		$query = sprintf("INSERT INTO `%s` (%s) VALUES (%s)",$this->getTable(),implode(',',$fields), implode(',',$values));
		
		$con = mysqli_connect(HOSTNAME, USERNAME, PASSWORD, DATABASE);
		
		mysqli_query($con, "SET NAMES 'utf8'");
		$return = mysqli_query($con, $query);
		$this->id = mysqli_insert_id($con);
		$this->error = mysqli_error($con);
		return $return;
		
	}

	protected static function load($table,$class,$conditions=null,$order='id ASC') {   
	    $con = mysqli_connect(HOSTNAME, USERNAME, PASSWORD, DATABASE);
		mysqli_query($con, "SET NAMES 'utf8'");
		$query = sprintf('SELECT * FROM `%s`',$table);
		
		if(!empty($conditions)) {
			$query .= ' WHERE '.implode(' AND ',$conditions);
		}
		$query .= ' ORDER BY '.$order;
		$result = mysqli_query($con, $query); 
		
		if($result){
		    $records = array();
		        while(($row = mysqli_fetch_object($result,$class))) {
			        $records[] = $row;
		        }
		}
		
		return $records;
		
	}
	
	protected static function query($query,$class=null) {
		$con = mysqli_connect(HOSTNAME, USERNAME, PASSWORD, DATABASE);
		mysqli_query($con, "SET NAMES 'utf8'");
		$result = mysqli_query($con, $query);
		
		$records = array();
		while(($row = mysqli_fetch_object($result,$class))) {
			$records[] = $row;
		}
		
		return $records;
	}
	
	protected  static function treatConditions($id,$conditions) {
		if(empty($conditions) and !empty($id)) {
			$conditions = array();
		}
		
		if(!empty($id)) {
			$conditions[] = sprintf("id='%d'",$id);
		}
		return $conditions;
	}
	
	public function destroy() {	
		$con = mysqli_connect(HOSTNAME, USERNAME, PASSWORD, DATABASE);
		mysqli_query($con, "SET NAMES 'utf8'");	
		$query = sprintf("DELETE FROM `%s` WHERE id='%d'",$this->getTable(),$this->id);
		return mysqli_query($con, $query);
	}
	
	private function update() {		
		foreach($this->getFields() as $field) {
			$fields[] = $field."='".$this->$field."'";
		}		
		$con = mysqli_connect(HOSTNAME, USERNAME, PASSWORD, DATABASE);
		mysqli_query($con, "SET NAMES 'utf8'");
		$query = sprintf("UPDATE `%s` SET %s WHERE id='%d'",$this->getTable(),implode(', ',$fields), $this->id);
		return mysqli_query($con, $query);
		
	}
	
	protected function increment_field($field) {	
		$con = mysqli_connect(HOSTNAME, USERNAME, PASSWORD, DATABASE);
		mysqli_query($con, "SET NAMES 'utf8'");
		$query = sprintf("UPDATE `%s` SET $field = $field + 1 WHERE id='%d'",$this->getTable(), $this->id);
		return mysqli_query($con, $query);
	}
	
	protected function change_field($table, $field, $value, $conditions='0=0') {	
		$con = mysqli_connect(HOSTNAME, USERNAME, PASSWORD, DATABASE);
		mysqli_query($con, "SET NAMES 'utf8'");	
		$query = sprintf("UPDATE `%s` SET `%s` = '%s' WHERE %s", $table, $field, $value, $conditions);
		echo $query;
		return mysqli_query($con, $query);
	}
	
	public function fetch($params) {
		foreach($params as $k=>$v) {
			if(in_array($k,$this->getFields())) {
				$this->$k = trim($v);	
			}
		}
	}
	
	public static function count($conditions='0=0',$table=null) {
		if($table==null) throw new Exception();		
		$con = mysqli_connect(HOSTNAME, USERNAME, PASSWORD, DATABASE);
		mysqli_query($con, "SET NAMES 'utf8'");
		$query = sprintf("SELECT count(id) as qntd FROM `%s` WHERE %s",$table,$conditions);
		$result = mysqli_query($con, $query);
		if($result){
		$r = mysqli_fetch_array($result);
		}
		return $r['qntd'];
	}
}
?>