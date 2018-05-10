<?php
class queries extends CI_Model
{
	public function getPosts()
	{
		//$query = $this->db->get('crudtable');
		$query = $this->db->query("Select * from crudtable");
		//echo '<pre>';
		//print_r($query->result_array()) ;
		//exit;
		if($query->num_rows() >0)
		{
			return $query->result();
		}
	}

	public function addPosts($data)
	{
		//$data = array(
		//	'crudName'	=>  $_POST['name'],
		//	'crudEmail' =>  $_POST['email'],
		//	'crudUpdate'	=>  $_POST['date']
		//);
		//$query = $this->db->query("Insert  into crudtable(crudName,crudEmail,crudUpdate) values($data)");
		return $this->db->insert('crudtable', $data);
		//return ($query);
	}

	public function getSinglePosts($id)
	{
		$query = $this->db->get_where('crudtable', array('crudId' => $id));
		if($query->num_rows() >0)
		{
			return $query->row();
		}
	}

	public function updatePosts($data, $id)
	{
		return $this->db->where('crudId', $id) ->update('crudtable', $data);
	}

	public function deletePosts($id)
	{
		return $this->db->delete('crudtable',['crudId'=> $id]);
	}

}
?>
