<?php namespace Odenktools\Cms\Providers;

use Illuminate\Auth\Guard;
use Illuminate\Contracts\Auth\Guard as GuardContract;
use Odenktools\Cms\Providers\OdenktoolsHelper;

/**
 * @todo
 */
class OdenktoolsGuard extends Guard implements GuardContract
{
	/**
	 * @todo
	 */	
    public function verify(array $credentials = array(), $remember = false, $login = true)
    {
        $this->fireAttemptEvent($credentials, $remember, $login);

        $this->lastAttempted = $user = $this->provider->retrieveByCredentials($credentials);

        if (!$this->hasValidCredentials($user, $credentials)) {
			
            return OdenktoolsHelper::INVALID_CREDENTIALS;
			
        }else{
			
			return OdenktoolsHelper::SUCCESS;
		}

        if (!$this->provider->isVerified($user)) {
            return OdenktoolsHelper::UNVERIFIED;
        }

        if ($this->provider->isActivated($user)) {
            return OdenktoolsHelper::ACTIVATED;
        }

        if ($login) {
            $this->login($user, $remember);
        }

        return OdenktoolsHelper::SUCCESS;
    }
}