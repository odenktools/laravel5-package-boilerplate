<?php namespace IdeKecil\Cms\Http\Controllers;

use Illuminate\Contracts\View\Factory as view;

class BlogController extends PublicController
{
	public function index()
	{
        if (view()->exists('idekecil::public.blog.index')) {
            return view('idekecil::public.blog.index');
        }
	}
}
