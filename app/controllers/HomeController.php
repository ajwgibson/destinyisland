<?php

class HomeController extends BaseController {

	public function index()
	{
		$this->layout->with('subtitle', 'home');
		$this->layout->content = View::make('home');
	}

}
