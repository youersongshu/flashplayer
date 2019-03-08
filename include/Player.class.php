<?php
/**
 * Player class
 *
 */
class Player
{
	/**
	 * 插入用例
	 * 
	 * @param string $name
	 * @param string $source
	 * @param string $description
	 * @param string $important
	 * @param string $config
	 * @return int $lastId
	 * @return int $category_id 
	 */
	public function insert($name,$source,$description,$important,$config,$category_id) {
		$db = new DB();
		$db->prepare('INSERT INTO t_testcase_player(name,source,description,important,config,category_id) VALUES(:name,:source,:description,:important,:config,:category_id)');
		$db->bind(':name',$name);
		$db->bind(':source',$source);
		$db->bind(':description',$description);
		$db->bind(':important',$important);
		$db->bind(':category_id',$category_id);
		$db->bind(':config',$config);
		$db->execute();
		$lastId = $db->getLastInsertId();
		$db->close();
		return $lastId;
	}
	/**
	 * 更新用例
	 * 
	 * @param int $id
	 * @param string $name
	 * @param string $description
	 * @param string $important
	 * @param string $config
	 * @return int $lastId
	 */
	public function update($id,$name,$source,$description,$important,$config,$category_id) {
		$db = new DB();
		$db->prepare('UPDATE t_testcase_player SET name=:name,source=:source,description=:description,important=:important,config=:config,category_id=:category_id WHERE id=:id');
		$db->bind(':id',$id);
		$db->bind(':name',$name);
		$db->bind(':source',$source);
		$db->bind(':description',$description);
		$db->bind(':important',$important);
		$db->bind(':config',$config);
		$db->bind(':category_id',$category_id);
		$db->execute();
		$affectRows = $db->getRowCount();
		$db->close();
		return $affectRows;
	}
	/**
	 * 删除用例
	 * 
	 * @param int $id
	 * @return int $lastId
	 */
	public function delete($id) {
		$db = new DB();
		$db->prepare('DELETE FROM t_testcase_player WHERE id=:id');
		$db->bind(':id',$id);
		$db->execute();
		$affectRows = $db->getRowCount();
		$db->close();
		return $affectRows;
	}
	//获取用例总数
	public function getCount($categoryid,$type,$keyword,$page=1,$pageSize=20) {
/*		$db = new DB();
		$sql = "SELECT count(1) FROM t_testcase_player";
		if (!empty($categoryid)) {
			$sql .= ' WHERE category_id=:categoryid';
		}
     	$db->prepare($sql);
		if (!empty($categoryid)) {
			$db->bind(':categoryid',$categoryid);
		}
*/
		$db = new DB();
		$sql = "SELECT count(1) FROM t_testcase_player";
		$w = array();
		if (!empty($categoryid)) {
			 $w[] = 'category_id=:categoryid';
		}
		if (!empty($keyword)) {
			switch($type) {
				case 1: $w[]="name like '%$keyword%'";break;
                case 2: $w[]="source like '%$keyword%'";break;
			    case 3: $w[]="description like '%$keyword%'";break;
				}
		}
		 // where
        if (!empty($w)) {
            $sql .= ' WHERE ' . implode(' AND ',$w);
        }

     	$db->prepare($sql . " ORDER BY id DESC LIMIT " . ($page-1)*$pageSize . "," . $pageSize);
		if (!empty($categoryid)) {
			$db->bind(':categoryid',$categoryid);
		}
	
		
		$db->execute();
		$result = $db->selectOne();//测试用例总数
		return $result[0];
	}
	/**
	 * 得到所有测试用例
	 *
	 * @param int $page
	 * @param int $count
	 * @return array
	 */
	public function getByCategory($categoryid,$page=1,$pageSize=20,$keyword=null,$type=null) {
		$db = new DB();
		$sql = "SELECT * FROM t_testcase_player";
		$w = array();
		if (!empty($categoryid)) {
			 $w[] = 'category_id=:categoryid';
		}
		if (!empty($keyword)) {
			switch($type) {
				case 1: $w[]="name like '%$keyword%'";break;
                case 2: $w[]="source like '%$keyword%'";break;
			    case 3: $w[]="description like '%$keyword%'";break;
				}
		}
		 // where
        if (!empty($w)) {
            $sql .= ' WHERE ' . implode(' AND ',$w);
        }

     	$db->prepare($sql . " ORDER BY id DESC LIMIT " . ($page-1)*$pageSize . "," . $pageSize);
		if (!empty($categoryid)) {
			$db->bind(':categoryid',$categoryid);
		}
		$db->execute();
		$result = $db->selectAll();
		$db->close();
		return $result;
	
	}
	/**
	 * 根据ID取得测试用例信息
	 *
	 * @param int $id
	 * @return array
	 */
	public function getById($id) {
		$db = new DB();
		$db->prepare('SELECT * FROM t_testcase_player WHERE id=:id');
		$db->bind(':id',$id);
		$db->execute();
		$result = $db->selectOne();
		$db->close();
		return $result;
	}
    
 

	/**
	 * 分析config
	 *
	 * @param string $config
	 * @return array
	 */
	public function parseConfig($config) {
		$result = array();
		$confArr = explode("\n",$config);
		foreach($confArr as $c) {
			preg_match("/^\[([a-z0-9_]*)\](.*)/i",$c,$matches);
			if (count($matches)==3) {
				$result[$matches[1]] = trim($matches[2]);
			}
		}
		return $result;
	}
	/**
	 * 得到所有测试分类
	 *
	 * @return array
	 */
	public function getCategories($page=1,$count=100) {
		$db = new DB();
		$start = ($page-1)*$count;
		$db->prepare("SELECT * FROM t_testcase_category ORDER BY id ASC LIMIT $start,$count");
		$db->execute();
		$result = $db->selectAll();
		$db->close();
		return $result;
	}
	/**
	 * 得到分类名称根据ID
	 *
	 * @param string $categoryId
	 * @return array
	 */
	public function getCategoryNameById($categoryId) {
		$db = new DB();
		$db->prepare('SELECT * FROM t_testcase_category WHERE id=:id');
		$db->bind(':id',$categoryId);
		$db->execute();
		$result = $db->selectOne();
		$db->close();
		return $result['name'];
	}
}
?>
