<?php
/**
 * DB class
 *
 * author: zhangjunbao@youku.com
 *
 * Sample 1(insert)
 * $db = new DB();
 * $db->prepare('INSERT INTO x(f1) values(:f1)');
 * $db->bind(':f1','aaaa');
 * $db->execute();
 * $lastId = $db->getLastInsertId();
 * $db->close();
 *
 * Sample 2(update/delete)
 * $db = new DB();
 * $db->prepare('UPDATE x SET f1=:f1 WHERE id=:id');
 * $db->bind(':f1','bbbb');
 * $db->bind(':id',1);
 * $db->execute();
 * $affectRows = $db->getRowCount();
 * $db->close();
 *
 * Sample 3(select one)
 * $db = new DB();
 * $db->prepare('SELECT * FROM x WHERE id=:id');
 * $db->bind(':id',1);
 * $db->execute();
 * $result = $db->selectOne();
 * $db->close();
 *
 * Sample 4(select all)
 * $db = new DB();
 * $db->prepare('SELECT * FROM x ORDER BY id DESC limit 10');
 * $db->execute();
 * $result = $db->selectAll();
 * $db->close();
 *
 */
class DB
{
	private $_conn;
	private $_stmt;

	public function __construct() {
		$dsn = 'mysql:dbname=' . DB_NAME . ';host=' . DB_HOST;
//		$dsn = 'mysql:host=10.10.221.12;dbname=testcase_player';
		$driver_options = array(
			PDO::ATTR_TIMEOUT => 5,
			PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'
		);
		try {
			$this->_conn = new PDO($dsn,DB_USERNAME,DB_PASSWORD,$driver_options); 
		} catch(PDOException $e) {
			echo 'Connection failed: ' . $e->getMessage();
		}
	}
	public function prepare($sql) {
		if (empty($this->_conn)) return;
		$this->_stmt = $this->_conn->prepare($sql);
	}
	public function bind($parameter,$value,$data_type=PDO::PARAM_STR) {
		if (empty($this->_stmt)) return;
		$this->_stmt->bindValue($parameter,$value,$data_type);
	}
	public function execute() {
		if (empty($this->_stmt)) return;
		$this->_stmt->execute();
	}
	// Get the number of rows affected by the last DELETE, INSERT, or UPDATE
	public function getRowCount() {
		if (empty($this->_stmt)) return 0;
		return $this->_stmt->rowCount();
	}
	// Returns the ID of the last inserted row
	public function getLastInsertId() {
		if (empty($this->_conn)) return 0;
		return $this->_conn->lastInsertId();
	}
	// select one
	public function selectOne() {
		if (empty($this->_stmt)) return;
		return $this->_stmt->fetch();
	}
	// select all 
	public function selectAll() {
		if (empty($this->_stmt)) return;
		return $this->_stmt->fetchAll();
	}

	public function close() {
		$this->_conn = null;
		$this->_stmt = null;
	}
}
?>
