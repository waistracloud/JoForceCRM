<?php
/*+***********************************************************************************
 * The contents of this file are subject to the vtiger CRM Public License Version 1.2
 * ("License"); You may not use this file except in compliance with the License
 * The Original Code is: vtiger CRM Open Source
 * The Initial Developer of the Original Code is vtiger.
 * Portions created by vtiger are Copyright (C) vtiger.
 * All Rights Reserved.
 * Contributor(s): JoForce.com
 *************************************************************************************/

class Head_ModCommentsDetailAjax_View extends Head_IndexAjax_View {

	function __construct() {
		$this->exposeMethod('saveRollupSettings');
		$this->exposeMethod('getNextGroupOfRollupComments');
	}

	public function process(Head_Request $request) {
		$mode = $request->getMode();
		if (!empty($mode) && $this->isMethodExposed($mode)) {
			$this->invokeExposedMethod($mode, $request);
			return;
		}

		$moduleName = $request->getModule();
		$viewer = $this->getRollupComments($request);
		echo $viewer->view('ShowAllComments.tpl', $moduleName, true);
	}

	function getRollupComments($request) {
		$startindex = $request->get('startindex');

		$parentRecordId = $request->get('parentId');
		$parenModule = $request->get('parent');
		$currentUserModel = Users_Record_Model::getCurrentUserModel();
		$request->set('rollup_status', 1);
		$rollupsettings = ModComments_Module_Model::storeRollupSettingsForUser($currentUserModel, $request);
		$parentRecordModel = Head_Record_Model::getInstanceById($parentRecordId, $parenModule);
		$commentsRecordModel = $parentRecordModel->getRollupCommentsForModule($startindex);
		$modCommentsModel = Head_Module_Model::getInstance('ModComments');

		$fileNameFieldModel = Head_Field::getInstance("filename", $modCommentsModel);
		$fileFieldModel = Head_Field_Model::getInstanceFromFieldObject($fileNameFieldModel);

		$viewer = $this->getViewer($request);
		$viewer->assign('CURRENTUSER', $currentUserModel);
		$viewer->assign('COMMENTS_MODULE_MODEL', $modCommentsModel);
		$viewer->assign('PARENT_COMMENTS', $commentsRecordModel);
		$viewer->assign('MODULE_NAME', $parenModule);
		$viewer->assign('FIELD_MODEL', $fileFieldModel);
		$viewer->assign('MAX_UPLOAD_LIMIT_MB', Head_Util_Helper::getMaxUploadSize());
		$viewer->assign('MAX_UPLOAD_LIMIT_BYTES', Head_Util_Helper::getMaxUploadSizeInBytes());
		$viewer->assign('MODULE_RECORD', $parentRecordId);
		$viewer->assign('ROLLUP_STATUS', $request->get('rollup_status'));
		$viewer->assign('ROLLUPID', $rollupsettings['rollupid']);
		$viewer->assign('STARTINDEX', $startindex + 10);

		return $viewer;
	}

	function saveRollupSettings(Head_Request $request) {
		$currentUserModel = Users_Record_Model::getCurrentUserModel();
		ModComments_Module_Model::storeRollupSettingsForUser($currentUserModel, $request);
	}

	function getNextGroupOfRollupComments(Head_Request $request) {
		$moduleName = $request->getModule();
		$viewer = $this->getRollupComments($request);
		if (count($viewer->tpl_vars['PARENT_COMMENTS']->value))
			echo $viewer->view('CommentsList.tpl', $moduleName, true);
	}

}