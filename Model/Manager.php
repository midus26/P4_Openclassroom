<?php
	class Manager
	{
		protected function bddConnect()
		{
			//local
			$bdd = new PDO('mysql:host=localhost;dbname=livre;charset=utf8', 'root', 'root');

			return $bdd;
		}
	}