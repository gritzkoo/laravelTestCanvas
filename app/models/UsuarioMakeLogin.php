<?php
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;
	
class UsuarioMakeLogin extends Eloquent implements UserInterface, RemindableInterface
{
	public $USU_ID;
	
	public function getAuthIdentifier ()
	{
		return $this->USU_ID;
	}

	public function getAuthPassword ()
	{

	}

	public function getRememberToken ()
	{

	}

	public function setRememberToken ($value)
	{

	}

	public function getRememberTokenName ()
	{

	}

	public function getReminderEmail ()
	{
		return ''; // $this->email;
	}

	public function newQuery()
	{
		return new UsuarioLogadoQuery();
	}

	public function set($data)
	{
		foreach ($data AS $key => $value)
		{
			$this->{$key} = $value;
		}
	}
}

class UsuarioLogadoQuery
{
	public function find ($id)
	{
		if (Session::has("user") && Session::get("user")->USU_ID == $id)
		{
			return Session::get("user");
		}
		return null;
	}
}