<?php
/*+***********************************************************************************
 * The contents of this file are subject to the vtiger CRM Public License Version 1.0
 * ("License"); You may not use this file except in compliance with the License
 * The Original Code is:  vtiger CRM Open Source
 * The Initial Developer of the Original Code is vtiger.
 * Portions created by vtiger are Copyright (C) vtiger.
 * All Rights Reserved.
 * Contributor(s): JoForce.com
 *************************************************************************************/

class Head_RemoveWidget_Action extends Head_IndexAjax_View {

	public function process(Head_Request $request) {
		$currentUser = Users_Record_Model::getCurrentUserModel();
		$linkId = $request->get('linkid');
		$response = new Head_Response();
		
		if ($request->has('reportid')) {
			$widget = Head_Widget_Model::getInstanceWithReportId($request->get('reportid'), $currentUser->getId());
		} else if ($request->has('widgetid')) {
			$widget = Head_Widget_Model::getInstanceWithWidgetId($request->get('widgetid'), $currentUser->getId());
        } else {
			$widget = Head_Widget_Model::getInstance($linkId, $currentUser->getId());
		}

		if (!$widget->isDefault()) {
			$widget->remove();
			$response->setResult(array('linkid' => $linkId, 'name' => $widget->getName(), 'url' => $widget->getUrl(), 'title' => vtranslate($widget->getTitle(), $request->getModule())));
		} else {
			$response->setError(vtranslate('LBL_CAN_NOT_REMOVE_DEFAULT_WIDGET', $moduleName));
		}
		$response->emit();
	}

	public function validateRequest(Head_Request $request) {
		$request->validateWriteAccess();
	}
}
