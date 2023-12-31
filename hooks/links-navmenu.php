<?php
	/*
	* You can add custom links to the navigation menu by appending them here ...
	* The format for each link is:
		$navLinks[] = array(
			'url' => 'path/to/link', 
			'title' => 'Link title', 
			'groups' => array('group1', 'group2'), // groups allowed to see this link, use '*' if you want to show the link to all groups
			'icon' => 'path/to/icon',
			'table_group' => 0, // optional index of table group, default is 0
		);
	*/
$navLinks[] = array(
    'url' => 'reports.php', 
    'title' => 'Generate Reports', 
    'groups' => array('*'), // groups allowed to see this link, use '*' if you want to show the link to all groups
    'icon' => 'table.gif',
    'table_group' => 1, // optional index of table group, default is 0
);
$navLinks[] = array(
    'url' => 'forms.php', 
    'title' => 'Evaluation Forms', 
    'groups' => array('*'), // groups allowed to see this link, use '*' if you want to show the link to all groups
    'icon' => 'table.gif',
    'table_group' => 1, // optional index of table group, default is 0
);
