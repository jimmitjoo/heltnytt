<?php

PLS_Style::add(array(
		"name" => __("Navigation Styles", 'manchester'),
		"type" => "heading"));

		PLS_Style::add(array(
				"name" => __("Navigation Pages' Typography", 'manchester'),
				"desc" => "",
				"id" => "navigation_item_typography",
				"selector" => ".main-nav ul li a",
				"type" => "typography"));

		PLS_Style::add(array(
				"name" => __("Navigation Pages' Typography on hover", 'manchester'),
				"desc" => "",
				"id" => "navigation_item_typography_hover",
				"selector" => ".main-nav ul li a:hover",
				"type" => "typography"));

		PLS_Style::add(array(
				"name" => __("Navigation Pages on hover background", 'manchester'),
				"desc" => "",
				"id" => "navigation_item_hover_background",
				"selector" => ".main-nav ul li a:hover",
				"type" => "background"));

		PLS_Style::add(array(
				"name" => __("Navigation Current Page", 'manchester'),
				"desc" => "",
				"id" => "navigation_current_item_typography",
				"selector" => ".main-nav ul li.current_page_item a",
				"type" => "typography"));

		PLS_Style::add(array(
				"name" => __("Navigation Current Page Background", 'manchester'),
				"desc" => "",
				"id" => "navigation_current_item_background",
				"selector" => ".main-nav ul li.current_page_item a",
				"type" => "background"));