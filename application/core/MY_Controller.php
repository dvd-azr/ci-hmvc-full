<?php
class MY_Controller extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		// $this->check_installer();
		$this->check_version();
		// $this->module_count();
	}

	public function check_version()
	{
		var_dump(CI_VERSION);
	}


	function check_installer()
	{
		// var_dump(CI_VERSION);
		$CI = &get_instance();
		$CI->load->database();
		$CI->load->dbutil();
		// var_dump($CI->db->database);
		// die;
		if ($CI->db->database == "") {
			header('Location: install');
		} else {
			if (!$CI->dbutil->database_exists($CI->db->database)) {
				header('Location: install/index.php?e=db');
			} else if (is_dir('install')) {
				header('Location: install/index.php?e=folder');
			}
		}
	}
}