<?php

class User_Model extends Model
{
	
	public function __construct()
	{
		parent::__construct();
	}
	
	public function userList() 
	{
		
		$sth = $this->DB->prepare("SELECT id, login, role FROM users");
		$sth->execute();
		return $sth->fetchAll();
		
	}
	
	public function userSingleList($id) 
	{	
		$sth = $this->DB->prepare("SELECT id, login, role FROM users WHERE id = :id");
		$sth->execute(array(':id'=>$id));
		return $sth->fetch();
	}
	
	public function create($data) 
	{
		$this->DB->insert('users',array(
			'login'		=>	$data['login'],
			'password'	=>	Hash::create('sha256',$data['password'],HASH_PASSWORD_KEY),
			'role'		=>	$data['role']
		));
		
		/*$sth = $this->DB->prepare("INSERT INTO users(`login`, `password`, `role`) VALUES (:login,:password,:role)");
		
		$sth->execute(array(
			':login'	=>	$data['login'],
			':password'	=>	Hash::create('md5',$data['password'],HASH_PASSWORD_KEY),
			':role'		=>	$data['role']
		));*/
	}
	
	public function editSave($data) 
	{
		$postData = array(
			'login'		=>	$data['login'],
			'password'	=>	Hash::create('sha256',$data['password'],HASH_PASSWORD_KEY),
			'role'		=>	$data['role']
		);
		
		$this->DB->update('users',$postData,"`id` = {$data['id']}");
		
		/*$sth = $this->DB->prepare("UPDATE users SET `login` = :login, `password` = :password, `role` = :role WHERE id = :id");
		
		$sth->execute(array(
			':id'		=>	$data['id'],
			':login'	=>	$data['login'],
			':password'	=>	Hash::create('md5',$data['password'],HASH_PASSWORD_KEY),
			':role'		=>	$data['role']
		));*/
	}
	
	public function delete($id) 
	{
		$sth = $this->DB->prepare("DELETE FROM users WHERE id = :id");
		$sth->execute(array(':id' => $id));
	}
	
}