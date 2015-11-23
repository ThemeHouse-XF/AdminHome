<?php

class ThemeHouse_AdminHome_Option_HomeHeadings
{
	public static function renderOption(XenForo_View $view, $fieldPrefix, array $preparedOption, $canEdit)
	{
		/* @var $navigationModel XenForo_Model_AdminNavigation */
		$navigationModel = XenForo_Model::create('XenForo_Model_AdminNavigation');
		$adminNavigation = $navigationModel->groupAdminNavigation($navigationModel->getAdminNavigationEntries());
		
		$topHeadings = array_keys($adminNavigation['']);
		
		$preparedOption['formatParams'] = array();
		foreach ($topHeadings as $topHeading)
		{
			if (!isset($adminNavigation[$topHeading])) continue;
			foreach ($adminNavigation[$topHeading] as $headingName => $heading)
			{
				if ($topHeading == "setup" && !isset($heading['show_in_options'])) continue;
				$preparedOption['formatParams'][] = array(
					'name' => "{$fieldPrefix}[{$preparedOption['option_id']}][$headingName]",
					'label' => new XenForo_Phrase('admin_navigation_'.$headingName),
					'selected' => isset($preparedOption['option_value'][$headingName])
				);
			}
		}

		return XenForo_ViewAdmin_Helper_Option::renderOptionTemplateInternal(
			'option_list_option_checkbox', $view, $fieldPrefix, $preparedOption, $canEdit,
			array('class' => 'checkboxColumns')
		);
	}
}