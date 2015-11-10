<?php 
class IndexModel extends ModelBase{
	public function show($data){
		$sql = sprintf('SELECT * FROM %s;', $data);
		$stmt = $this->db->query($sql);
		while($result = $stmt->fetch(PDO::FETCH_ASSOC)){
			print($result['id']);
			print($result['name'] . '<br>');
	    }
	    echo '<a href="/hello/hello" title="">link</a>';
	}
}