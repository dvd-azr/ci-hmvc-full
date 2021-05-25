<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Root extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		// $this->config->load('config', TRUE);
		$this->config->load('mod_conf', TRUE);
		// $this->load->library("root_lib");
		$this->load->library("user_agent");
		$this->load->helper("root");
		// $this->module_count();

		$this->deviceDetector();
	}

	public function index()
	{
		// var_dump($this->config->item('base_url'));
		// var_dump($this->config->item('config_module', 'config'));

		// Loaded custom Configuration 
		// var_dump($this->config->item('mod_conf', "mod_conf"));

		// var_dump(helper_init());
		// var_dump(FCPATH);
		$data['controller'] = $this->root_lib->locate(__FILE__);
		$data['libraries'] = $this->root_lib->init();
		$data['helper'] = helper_init();
		$data['config'] = $this->config->item('mod_conf', "mod_conf");

		// echo "<br>" . $this->root_lib->locate(__FILE__);
		// echo "<br>" . $this->root_lib->test();

		// die;

		$this->load->view('welcome_message', $data);
		// $this->load->view('kalkulator_kehadiran');
	}

	public function module_count()
	{
		$myDirectory = opendir(APPPATH . "modules");
		// Gets each entry
		while ($entryName = readdir($myDirectory)) {
			$dirArray[] = $entryName;
		}

		// Closes directory
		closedir($myDirectory);
		// Sorts files
		sort($dirArray);
		// membuang 2 array yang kosong
		$a = $dirArray;
		$b = [$dirArray[0], $dirArray[1],];

		$hasil = array_diff($a, $b);
		// var_dump($hasil);

		$data['isi'] = $hasil;
		var_dump($hasil);
		die;
	}

	public function deviceDetector()
	{
		if ($this->agent->is_browser()) {
			$agent = $this->agent->browser() . ' ' . $this->agent->version();
		} elseif ($this->agent->is_robot()) {
			$agent = $this->agent->robot();
		} elseif ($this->agent->is_mobile()) {
			$agent = $this->agent->mobile();
		} else {
			die;
			$agent = 'Unidentified User Agent';
		}

		echo $agent . "<br>";

		echo $this->agent->platform() . "<br>";
		echo $this->agent->is_mobile();

		// Mencari kata windows
		if (strrchr($this->agent->platform(), "windows")) {
			echo "win";
		}
		die;
	}
}