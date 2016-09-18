<?php 

/*
* PLEASE NOTE: 
* This is an over-simplified script to demonstrate the basic functionality of UWUM integration
* Not to be used as-is in production sites
*/

/*
* On callback (that is after login) UWUM should return the state and code
*/
if(!isset($_REQUEST['state'], $_REQUEST['code'])) {
    die('Callback failed (state and code do not received correctly)<br />');
}

/*
* At this point you need to handle 
*  local user management (create, fetch, etc) 
*  DB update, 
*  session management, 
*  error handling and so on...
*/

// redirect to grant.php passing state and code
$url = 'grant.php?state='.$_REQUEST['state'].'&code='.$_REQUEST['code'];
header('Location: ' . $url);