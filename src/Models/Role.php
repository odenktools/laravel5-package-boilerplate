<?php namespace Odenktools\Cms\Models;

use Illuminate\Database\Eloquent\SoftDeletes;

class Role extends OdenktoolsModel
{
	use SoftDeletes;
	
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'role';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
		'role_name',
		'role_description',
		'is_active',
		'is_purchaseable',
		'amount',
		'price',
		'time_left',
		'quantity',
		'period',
		'is_builtin',
		'backcolor',
		'forecolor'
	];

    /**
     * @param array $attributes
     */
    public function __construct(array $attributes = array())
    {
        parent::__construct($attributes);
    }

}