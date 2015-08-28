<?php namespace Odenktools\Cms\Models;

class UserField extends OdenktoolsModel
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'user_fields';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['field_name', 'field_comment', 'possible_values', 'text_select_value', 'is_mandatory'];

}