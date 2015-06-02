<?php

/* -AFTERLOGIC LICENSE HEADER- */

class_exists('CApi') or die();

class COverrideDomainSettingsPlugin extends AApiPlugin
{
	/**
	 * @param CApiPluginManager $oPluginManager
	 */
	public function __construct(CApiPluginManager $oPluginManager)
	{
		parent::__construct('1.0', $oPluginManager);

		$this->AddHook('api-change-account-by-id', 'PluginApiChangeAccount');
		$this->AddHook('api-change-account-on-login', 'PluginApiChangeAccount');
	}
	
	/**
	 * @param CAccount $oAccount
	 */
	public function PluginApiChangeAccount(&$oAccount)
	{
		if ($oAccount && $oAccount->Domain)
		{
			// example

			$oAccount->Domain->AllowUsersAddNewAccounts = false;
			$oAccount->Domain->AllowUsersChangeEmailSettings = false;
		}
	}
}

return new COverrideDomainSettingsPlugin($this);
