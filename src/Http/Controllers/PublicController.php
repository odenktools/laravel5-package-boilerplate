<?php namespace IdeKecil\Cms\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;

abstract class PublicController extends BaseController
{
	protected $_mainMenu = null;

    /**
     *
     */
    public function __construct(){}
}