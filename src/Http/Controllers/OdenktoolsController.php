<?php namespace Odenktools\Cms\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;

abstract class OdenktoolsController extends BaseController
{
	use DispatchesJobs, ValidatesRequests;
	
	protected $_mainMenu = null;

    /**
     *
     */
    public function __construct()
    {
        $this->setupLayout();
    }
	
	/**
	 * Setup the layout used by the controller.
	 * @return void
	 */
	protected function setupLayout()
	{
		view()->share([
			'mainMenu' 		=> $this->_mainMenu,
			'currentUser' 	=> \Auth::user(),
		]);
	}
}