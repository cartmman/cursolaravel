<?php namespace CodeCommerce\Http\Controllers;

use CodeCommerce\Category;

class WelcomeController extends Controller {


    public function __construct()
	{
		$this->middleware('guest');
	}

	/**
	 * Show the application welcome screen to the user.
	 *
	 * @return Response
	 */
	public function index()
	{
		return view('welcome');
	}
}
