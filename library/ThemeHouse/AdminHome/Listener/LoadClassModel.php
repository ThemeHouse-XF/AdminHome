<?php
						
class ThemeHouse_AdminHome_Listener_LoadClassModel extends ThemeHouse_Listener_LoadClass
{
	public static function loadClassModel($class, array &$extend)
	{
		switch ($class)
		{
			case 'XenForo_Model_AdminNavigation':
				self::_extend('ThemeHouse_AdminHome_Model_AdminNavigation', $extend);
				break;
		}
	}
}