<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contoh extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/Contoh
	 *	- or -
	 * 		http://example.com/index.php/Contoh/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/Contoh/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		echo "<h1>Hello World!</h1>";
	}
}
