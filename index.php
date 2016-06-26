<?php
session_start();
require("lib/log.class.php");
require("lib/db.class.php");
require("lib/instance.class.php");

// if page is active, protected, or disabled and provide results
switch ($instance->page["current"]["state"]) {
	case "active":
		// require signin for specific pages if not signed in
		if(($instance->page["current"]["signin_required"]==1)&&(!isset($instance->user["id"]))){
			// to do
		} else {
			$instance->window("header");
			include("pages/{$instance->page["current"]["file"]}");
			$instance->window("footer");
		}
		break;
	case "protected":
		// to do
		break;
	default:
		$instance->page["current"]["name"] = "Page Not Found";
		$instance->page["current"]["file"] = "page-not-found.php";
		$instance->page["current"]["link"] = "page-not-found.html";
		$instance->page["current"]["page_description"] = "Page not found";
		$instance->page["current"]["standalone"] = false;
		$instance->page["current"]["state"] = "active";
		$instance->page["breadcrumbs"] = array(array("id" => 1, "link" => "home.html", "name"=>"Home"), array("id"=>NULL, "link" => "page-not-found.html", "name"=>"Page Not Found"));
		$instance->window("header");
		include("pages/{$instance->page["current"]["file"]}");
		$instance->window("footer");
		break;
}
?>