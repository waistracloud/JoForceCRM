{*+**********************************************************************************
* The contents of this file are subject to the vtiger CRM Public License Version 1.1
* ("License"); You may not use this file except in compliance with the License
* The Original Code is: vtiger CRM Open Source
* The Initial Developer of the Original Code is vtiger.
* Portions created by vtiger are Copyright (C) vtiger.
* All Rights Reserved.
************************************************************************************}

<div class="row main-container">
	<div class="inner-container">
		<div class="row">
			<div class="col-sm-10">
				<h4>{vtranslate('LBL_WELCOME', 'Install')}</h4>
			</div>
		</div>
		<hr>

		<form class="form-horizontal" name="step2" method="get" action="index.php">
			<input type=hidden name="module" value="Install" />
			<input type=hidden name="view" value="Index" />
			<input type=hidden name="mode" value="Step3" />

			<div class="license">
				<div class="lic-scroll">
                    {include file="licenses/License.html"}
                </div>
			</div>
			<div class="row">
				<div class="col-sm-12">
					<div class="button-container">
						<input name="back" type="button" class="btn btn-large" value="{vtranslate('LBL_DISAGREE', 'Install')}"/>
						<input id="agree" type="submit" class="btn btn-large btn-primary" value="{vtranslate('LBL_I_AGREE', 'Install')}"/>
					</div>
				</div>
			</div>
		</form>
	</div>
</div>