<?php namespace Odenktools\Cms\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * IdeKecil Core Model
 */
class OdenktoolsModel extends Model
{
    /**
     * Table prefix
     *
     * @var string
     */
    protected $prefix = '';

    /**
     * Default IdeKecil Table
     *
     * @var array|mixed
     */
    protected $tables = array();

    /**
     * @param array $attributes
     */
    public function __construct(array $attributes = array())
    {
        parent::__construct($attributes);

        $defaultDb = \Config::get('database.default');

        if($defaultDb == 'mysql'){

            // Set the prefix
            $this->prefix = \Config::get('odenktools.prefix');

            $this->tables = \Config::get('odenktools.tables');

            $this->tables['user'] = $this->prefix.$this->tables['user'];

            $this->tables['user_fields'] = $this->prefix.$this->tables['user_fields'];

            $this->tables['role'] = $this->prefix.$this->tables['role'];

            $this->tables['role_profile_fields'] = $this->prefix.$this->tables['role_profile_fields'];

            if($this->getTable() != '' ){
                $this->table = $this->prefix.$this->getTable();
            }
        }
    }
}
