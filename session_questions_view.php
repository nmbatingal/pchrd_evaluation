<?php
// This script and data application were generated by AppGini 5.74
// Download AppGini for free from https://bigprof.com/appgini/download/

	$currDir=dirname(__FILE__);
	include("$currDir/defaultLang.php");
	include("$currDir/language.php");
	include("$currDir/lib.php");
	@include("$currDir/hooks/session_questions.php");
	include("$currDir/session_questions_dml.php");

	// mm: can the current member access this page?
	$perm=getTablePermissions('session_questions');
	if(!$perm[0]){
		echo error_message($Translation['tableAccessDenied'], false);
		echo '<script>setTimeout("window.location=\'index.php?signOut=1\'", 2000);</script>';
		exit;
	}

	$x = new DataList;
	$x->TableName = "session_questions";

	// Fields that can be displayed in the table view
	$x->QueryFieldsTV = array(   
		"`session_questions`.`id`" => "id",
		"IF(    CHAR_LENGTH(`sessions1`.`session_name`), CONCAT_WS('',   `sessions1`.`session_name`), '') /* Session id */" => "session_id",
		"IF(    CHAR_LENGTH(`questions1`.`question`), CONCAT_WS('',   `questions1`.`question`), '') /* Question */" => "question_id",
		"IF(    CHAR_LENGTH(`question_types1`.`type`), CONCAT_WS('',   `question_types1`.`type`), '') /* Question type */" => "question_type",
		"`session_questions`.`order`" => "order"
	);
	// mapping incoming sort by requests to actual query fields
	$x->SortFields = array(   
		1 => '`session_questions`.`id`',
		2 => '`sessions1`.`session_name`',
		3 => '`questions1`.`question`',
		4 => '`question_types1`.`type`',
		5 => '`session_questions`.`order`'
	);

	// Fields that can be displayed in the csv file
	$x->QueryFieldsCSV = array(   
		"`session_questions`.`id`" => "id",
		"IF(    CHAR_LENGTH(`sessions1`.`session_name`), CONCAT_WS('',   `sessions1`.`session_name`), '') /* Session id */" => "session_id",
		"IF(    CHAR_LENGTH(`questions1`.`question`), CONCAT_WS('',   `questions1`.`question`), '') /* Question */" => "question_id",
		"IF(    CHAR_LENGTH(`question_types1`.`type`), CONCAT_WS('',   `question_types1`.`type`), '') /* Question type */" => "question_type",
		"`session_questions`.`order`" => "order"
	);
	// Fields that can be filtered
	$x->QueryFieldsFilters = array(   
		"`session_questions`.`id`" => "ID",
		"IF(    CHAR_LENGTH(`sessions1`.`session_name`), CONCAT_WS('',   `sessions1`.`session_name`), '') /* Session id */" => "Session id",
		"IF(    CHAR_LENGTH(`questions1`.`question`), CONCAT_WS('',   `questions1`.`question`), '') /* Question */" => "Question",
		"IF(    CHAR_LENGTH(`question_types1`.`type`), CONCAT_WS('',   `question_types1`.`type`), '') /* Question type */" => "Question type",
		"`session_questions`.`order`" => "Order"
	);

	// Fields that can be quick searched
	$x->QueryFieldsQS = array(   
		"`session_questions`.`id`" => "id",
		"IF(    CHAR_LENGTH(`sessions1`.`session_name`), CONCAT_WS('',   `sessions1`.`session_name`), '') /* Session id */" => "session_id",
		"IF(    CHAR_LENGTH(`questions1`.`question`), CONCAT_WS('',   `questions1`.`question`), '') /* Question */" => "question_id",
		"IF(    CHAR_LENGTH(`question_types1`.`type`), CONCAT_WS('',   `question_types1`.`type`), '') /* Question type */" => "question_type",
		"`session_questions`.`order`" => "order"
	);

	// Lookup fields that can be used as filterers
	$x->filterers = array(  'session_id' => 'Session id', 'question_id' => 'Question', 'question_type' => 'Question type');

	$x->QueryFrom = "`session_questions` LEFT JOIN `sessions` as sessions1 ON `sessions1`.`id`=`session_questions`.`session_id` LEFT JOIN `questions` as questions1 ON `questions1`.`id`=`session_questions`.`question_id` LEFT JOIN `question_types` as question_types1 ON `question_types1`.`id`=`session_questions`.`question_type` ";
	$x->QueryWhere = '';
	$x->QueryOrder = '';

	$x->AllowSelection = 1;
	$x->HideTableView = ($perm[2]==0 ? 1 : 0);
	$x->AllowDelete = $perm[4];
	$x->AllowMassDelete = false;
	$x->AllowInsert = $perm[1];
	$x->AllowUpdate = $perm[3];
	$x->SeparateDV = 1;
	$x->AllowDeleteOfParents = 0;
	$x->AllowFilters = 1;
	$x->AllowSavingFilters = 0;
	$x->AllowSorting = 1;
	$x->AllowNavigation = 1;
	$x->AllowPrinting = 1;
	$x->AllowCSV = 1;
	$x->RecordsPerPage = 10;
	$x->QuickSearch = 1;
	$x->QuickSearchText = $Translation["quick search"];
	$x->ScriptFileName = "session_questions_view.php";
	$x->RedirectAfterInsert = "session_questions_view.php?SelectedID=#ID#";
	$x->TableTitle = "Session Questions";
	$x->TableIcon = "table.gif";
	$x->PrimaryKey = "`session_questions`.`id`";

	$x->ColWidth   = array(  150, 150, 150, 150);
	$x->ColCaption = array("Session id", "Question", "Question type", "Order");
	$x->ColFieldName = array('session_id', 'question_id', 'question_type', 'order');
	$x->ColNumber  = array(2, 3, 4, 5);

	// template paths below are based on the app main directory
	$x->Template = 'templates/session_questions_templateTV.html';
	$x->SelectedTemplate = 'templates/session_questions_templateTVS.html';
	$x->TemplateDV = 'templates/session_questions_templateDV.html';
	$x->TemplateDVP = 'templates/session_questions_templateDVP.html';

	$x->ShowTableHeader = 1;
	$x->TVClasses = "";
	$x->DVClasses = "";
	$x->HighlightColor = '#FFF0C2';

	// mm: build the query based on current member's permissions
	$DisplayRecords = $_REQUEST['DisplayRecords'];
	if(!in_array($DisplayRecords, array('user', 'group'))){ $DisplayRecords = 'all'; }
	if($perm[2]==1 || ($perm[2]>1 && $DisplayRecords=='user' && !$_REQUEST['NoFilter_x'])){ // view owner only
		$x->QueryFrom.=', membership_userrecords';
		$x->QueryWhere="where `session_questions`.`id`=membership_userrecords.pkValue and membership_userrecords.tableName='session_questions' and lcase(membership_userrecords.memberID)='".getLoggedMemberID()."'";
	}elseif($perm[2]==2 || ($perm[2]>2 && $DisplayRecords=='group' && !$_REQUEST['NoFilter_x'])){ // view group only
		$x->QueryFrom.=', membership_userrecords';
		$x->QueryWhere="where `session_questions`.`id`=membership_userrecords.pkValue and membership_userrecords.tableName='session_questions' and membership_userrecords.groupID='".getLoggedGroupID()."'";
	}elseif($perm[2]==3){ // view all
		// no further action
	}elseif($perm[2]==0){ // view none
		$x->QueryFields = array("Not enough permissions" => "NEP");
		$x->QueryFrom = '`session_questions`';
		$x->QueryWhere = '';
		$x->DefaultSortField = '';
	}
	// hook: session_questions_init
	$render=TRUE;
	if(function_exists('session_questions_init')){
		$args=array();
		$render=session_questions_init($x, getMemberInfo(), $args);
	}

	if($render) $x->Render();

	// hook: session_questions_header
	$headerCode='';
	if(function_exists('session_questions_header')){
		$args=array();
		$headerCode=session_questions_header($x->ContentType, getMemberInfo(), $args);
	}  
	if(!$headerCode){
		include_once("$currDir/header.php"); 
	}else{
		ob_start(); include_once("$currDir/header.php"); $dHeader=ob_get_contents(); ob_end_clean();
		echo str_replace('<%%HEADER%%>', $dHeader, $headerCode);
	}

	echo $x->HTML;
	// hook: session_questions_footer
	$footerCode='';
	if(function_exists('session_questions_footer')){
		$args=array();
		$footerCode=session_questions_footer($x->ContentType, getMemberInfo(), $args);
	}  
	if(!$footerCode){
		include_once("$currDir/footer.php"); 
	}else{
		ob_start(); include_once("$currDir/footer.php"); $dFooter=ob_get_contents(); ob_end_clean();
		echo str_replace('<%%FOOTER%%>', $dFooter, $footerCode);
	}
?>