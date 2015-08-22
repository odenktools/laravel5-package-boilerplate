<?php namespace IdeKecil\Cms\Http\Controllers;

use IdeKecil\Cms\Models\FieldType;

class FieldTypeController extends IdeKecilController
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
	
	public function getTestmodel()
	{
		$field_type = FieldType::all();
		
		echo json_encode($field_type);
		
	}
	
}