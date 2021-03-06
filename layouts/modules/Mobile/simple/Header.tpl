{*<!--
/*************************************************************************************
** The contents of this file are subject to the vtiger CRM Public License Version 1.1
* ("License"); You may not use this file except in compliance with the License
* The Original Code is: vtiger CRM Open Source
* The Initial Developer of the Original Code is vtiger.
* Portions created by vtiger are Copyright (C) vtiger.
* All Rights Reserved.
*
**************************************************************************************/
-->*}<!doctype html>
<html ng-app="mobileapp">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <title>Head</title>
        <link rel="shortcut icon" href="data:image/x-icon;," type="image/x-icon"> 
        <link rel="stylesheet" href="../../{$TEMPLATE_WEBPATH}/resources/libs/angularjs/angular-material.min.css">
        <!--link rel="stylesheet" href="https://fonts.googleapis.com/css?family=RobotoDraft:300,400,500,700,400italic"-->

        {* Include desired styles injected *}
        {if $_styles}
            {foreach item=_style from=$_styles}
                <link type="text/css" rel="stylesheet" href="../../{$TEMPLATE_WEBPATH}/{$_style}">
            {/foreach}
        {/if}
        {* End *}
        <link type="text/css" rel="stylesheet" href="../../{$TEMPLATE_WEBPATH}/resources/libs/md-icons/css/materialdesignicons.min.css">
        <link type="text/css" rel="stylesheet" href="../../{$TEMPLATE_WEBPATH}/resources/libs/Head-icons/style.css">
        <link type="text/css" rel="stylesheet" href="../../{$TEMPLATE_WEBPATH}/resources/css/application.css">
        <link type="text/css" rel="stylesheet" href="../../{$TEMPLATE_WEBPATH}/resources/css/style.css">

        <script type="text/javascript" src="../../{$TEMPLATE_WEBPATH}/resources/libs/jquery/jquery2.min.js"></script>
        <script type="text/javascript" src="../../{$TEMPLATE_WEBPATH}/resources/libs/angularjs/angular.js"></script>
        <script type="text/javascript" src="../../{$TEMPLATE_WEBPATH}/resources/libs/angularjs/angular-touch.min.js"></script>
        <script type="text/javascript" src="../../{$TEMPLATE_WEBPATH}/resources/libs/angularjs/angular-animate.min.js"></script>
        <script type="text/javascript" src="../../{$TEMPLATE_WEBPATH}/resources/libs/angularjs/angular-aria.min.js"></script>
        <script type="text/javascript" src="../../{$TEMPLATE_WEBPATH}/resources/libs/angularjs/angular-material.min.js"></script>
        <script type="text/javascript" src="../../{$TEMPLATE_WEBPATH}/resources/libs/angularjs/angular-touch.min.js"></script>
        <script type="text/javascript" src="../../{$TEMPLATE_WEBPATH}/resources/libs/jquery/purl.js"></script>

        <script type="text/javascript" src="../../{$TEMPLATE_WEBPATH}/Head/js/application.js"></script>
        <script type="text/javascript" src="../../{$TEMPLATE_WEBPATH}/Head/js/Head.js"></script>
        <script type="text/javascript" src="../../{$TEMPLATE_WEBPATH}/Head/js/Utils.js"></script>	

        {* Include desired script injected *}
        {if $_scripts}
            {foreach item=_script from=$_scripts}
                <script type="text/javascript" src="../../{$TEMPLATE_WEBPATH}/{$_script}"></script>
            {/foreach}
        {/if}
        {* End *}

    </head>
    {literal}
    <body ng-controller="HeadBodyController" ng-init="init();" ng-cloak md-theme="{{dynamicTheme}}" md-theme-watch>
    {/literal}