<?php
						
class ThemeHouse_AdminHome_Model_AdminNavigation extends XFCP_ThemeHouse_AdminHome_Model_AdminNavigation
{
	/**
	 * Gets all admin navigation entries, in parent-display order.
	 *
	 * @param array Fetch options
	 *
	 * @return array [navigation id] => info
	 */
	public function getAdminNavigationEntries(array $fetchOptions = array())
	{
		$navigationEntries = parent::getAdminNavigationEntries($fetchOptions);
		
		$homeHeadings = XenForo_Application::get('options')->th_adminHome_homeHeadings;
		
		foreach($navigationEntries as $navigationId => $navigationEntry)
		{
			if (isset($homeHeadings[$navigationId]) && $homeHeadings[$navigationId])
			{
				$navigationEntries[$navigationId]['parent_navigation_id'] = 'setup';
				$navigationEntries[$navigationId]['show_in_options'] = true;
			}
		}
		
		return $navigationEntries;
	}
}