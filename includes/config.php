<?php
						$sql["host"] = "localhost";
						$sql["user"] = "purchasify123";
						$sql["pass"] = "purchasify123";
						$sql["base"] = "purchasify_ravi";
						$connection = mysql_connect($sql["host"],$sql["user"],$sql["pass"]);
						$select_database = mysql_select_db($sql["base"], $connection);
						mysql_query("SET NAMES utf8");
						?>
						