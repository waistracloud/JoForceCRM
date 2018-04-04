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

/**
 * Inventory Record Model Class
 */
class Invoice_Record_Model extends Inventory_Record_Model {

	public function getCreatePurchaseOrderUrl() {
        global $site_URL;
		$purchaseOrderModuleModel = Head_Module_Model::getInstance('PurchaseOrder');
		return $site_URL.$purchaseOrderModuleModel->getName()."/view/".$purchaseOrderModuleModel->getEditViewName()."?invoice_id=".$this->getId();
	}
}
