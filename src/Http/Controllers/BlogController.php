<?php namespace Odenktools\Cms\Http\Controllers;

use Illuminate\Contracts\View\Factory as view;

/**
 * @todo
 */

class BlogController extends PublicController
{
	public function index()
	{
        if (view()->exists('odenktools::public.blog.index')) {
            return view('odenktools::public.blog.index');
        }
	}
}
