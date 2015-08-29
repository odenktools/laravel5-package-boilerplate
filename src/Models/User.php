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
	
    /**
     * @var array Validation rules
     */
    public $rules = [
		'username' 	=> 'required|between:3,64',
		'email' 	=> 'required|between:3,64|email|unique:users',
		'password' 	=> 'required:create|between:2,32|confirmed',
		'password_confirmation' => 'required_with:password|between:2,32'
    ];
	
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
	 * From OctoberCMS
	 * 
     * Generate a random string
     * @return string
     */
    public function getRandomString($length = 42)
    {
        /*
         * Use OpenSSL (if available)
         */
        if (function_exists('openssl_random_pseudo_bytes')) {
            $bytes = openssl_random_pseudo_bytes($length * 2);
			
            if ($bytes === false)
			throw new RuntimeException('Unable to generate a random string');
			
            return substr(str_replace(['/', '+', '='], '', base64_encode($bytes)), 0, $length);
        }
		
        $pool = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
		
        return substr(str_shuffle(str_repeat($pool, 5)), 0, $length);
    }
	
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