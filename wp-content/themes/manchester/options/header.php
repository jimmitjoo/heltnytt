<?php 

PLS_Style::add(array( 
		"name" => __("Header Styles", 'manchester'),
		"type" => "heading"));
		
		PLS_Style::add(array(
				"name" => __("Site Title Typography", 'manchester'),
				"desc" => "",
				"id" => "header_title",
				"selector" => "header#lvl1 a h1, header#lvl1 a:visited h1",
				"type" => "typography"));

		PLS_Style::add(array(
				"name" => __("Site Title on hover", 'manchester'),
				"desc" => "",
				"id" => "header_title_hover",
				"selector" => "header#lvl1 a:hover h1",
				"type" => "typography"));

			PLS_Style::add(array(
					"name" => __("Site Sub-Title Typography", 'manchester'),
					"desc" => "",
					"id" => "header_subtitle",
					"selector" => "header#lvl1 #slogan",
					"type" => "typography"));
