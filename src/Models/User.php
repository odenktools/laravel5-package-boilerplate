<?php namespace Odenktools\Cms\Models;

use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use	Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use	Illuminate\Database\Eloquent\SoftDeletes;
use	Illuminate\Auth\Authenticatable;
use	Illuminate\Auth\Passwords\CanResetPassword;

/**
 * @todo
 */
class User extends OdenktoolsModel implements AuthenticatableContract, CanResetPasswordContract
{
	use Authenticatable, CanResetPassword;
	
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';

	protected $hidden = ['password', 'remember_token'];
	
    public function __construct(array $attributes = array())
    {
        parent::__construct($attributes);
    }
	
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
		'username',
		'user_mail',
		'email',
		'password',
		'is_active',
		'verified'
	];
	
	/**
	 * @todo
	 */
	public function scopeVerified($query)
	{
		return $query->where('verified', 1);
	}
	
	/**
	 * @todo
	 */
	public function scopeUnverified($query)
	{
		return $query->where('verified', 0);
	}
	
	/**
	 * @todo
	 */
	public function scopeUnactived($query)
	{
		return $query->where('is_active', 1);
	}
	
	/**
	 * @todo
	 */
	public function scopeActived($query)
	{
		return $query->where('is_active', 1);
	}
	
	/**
	 * @todo
	 */
	public function scopeBuiltin($query)
	{
		return $query->where('is_builtin', 1);
	}
}