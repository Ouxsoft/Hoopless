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
			$instance->window("header", true);
			include("lib/alert.class.php");
			echo "<div class=\"container\">";
			$alert->add("alert","<a href=\"{$instance->href("users/sign-up.html")}\">Sign up</a> to access this page");
			$alert->get();	
			echo "</div>";
			include("pages/users/sign-in.php");
			$instance->window("footer", true);
		} else {
			$instance->window("header");
			include("pages/{$instance->page["current"]["file"]}");
			$instance->window("footer");
		}
		break;
	case "protected":
		// check for account has access to protected access 
		if (isset($instance->user["id"])) {
			if($instance->user["permission"]==1){
				$instance->window("header");
				include("pages/{$instance->page["current"]["file"]}");
				$instance->window("footer");
			} else { 
				// deny access
				include("lib/alert.class.php");
				$instance->window("header", true);
				echo "<div class=\"container\">";
				$alert->add("alert","<b style=\"text-transform: uppercase;\">{$instance->user["username"]}</b>, your account is not authorized to access this page. Sign in with an account authorized to use this page");
				$alert->get();
				echo "<div class=\"pagepad\" style=\"display: block; text-align: center; font-weight: bold; text-transform: uppercase; font-size: 18px; font-family: Arial, Helvetica, sans-serif; margin-top: 25px;\">Authorized Users Only</div>";
				echo "</div>";
				include("pages/users/sign-in.php");
				$instance->window("footer", true);
			}
		} else {
			// sign required
			$instance->window("header", true);
			include("lib/alert.class.php");
			echo "<div class=\"container\">";
			$alert->add("alert","You must sign-in to an authorized account to access this page");
			$alert->get();
			echo "<div class=\"pagepad\" style=\"display: block; text-align: center; font-weight: bold; text-transform: uppercase; font-size: 18px; font-family: Arial, Helvetica, sans-serif; margin-top: 25px;\">Authorized Users Only</div>";
			echo "</div>";
			include("pages/users/sign-in.php");
			$instance->window("footer", true);
		}
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