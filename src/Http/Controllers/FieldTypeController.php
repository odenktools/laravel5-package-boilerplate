<?php namespace Odenktools\Cms\Http\Controllers;

use Odenktools\Cms\Models\FieldType;

class FieldTypeController extends OdenktoolsController
{
    /**
     * @return void
     */
    public function index()
    {
        if (view()->exists('idekecil::admin.modules.fieldtype.index')) {
            return view('idekecil::admin.modules.fieldtype.index');
        }
    }
	
	/**
	 * @todo
	 */	
	public function getTestmodel()
	{
		$field_type = FieldType::all();
		
		echo json_encode($field_type);
		
	}
	
}