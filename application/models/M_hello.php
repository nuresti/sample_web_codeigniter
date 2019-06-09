<?php 

	/**
	 * 
	 */
	class M_hello extends CI_Model
	{
		
		function __construct()
		{
			parent::__construct();
		}
		var $halo = "Hello World";

		function katakata()
		{
			$kalimat = $this->halo."I'm from model";

			return $kalimat;
		}

	}
 ?>