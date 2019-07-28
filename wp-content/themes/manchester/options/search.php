<?php

PLS_Style::add(array( 
		"name" => __("Search Options", 'manchester'),
		"type" => "heading"));


	PLS_Style::add(array(
		"name" => __("Price Range Options", 'manchester'),
		"desc" => __("Use the controls below to change what options are displayed when users click the bedrooms filter", 'manchester'),
		"type" => "info"));

	PLS_Style::add(array(
		"name" => __("Min Search Price", 'manchester'),
		"desc" => "",
		"id" => "pls-option-price-min",
		"std" => "0",
		"type" => "text"));

	PLS_Style::add(array(
		"name" => __("Max Search Price", 'manchester'),
		"desc" => "",
		"id" => "pls-option-price-max",
		"std" => "1000000",
		"type" => "text"));

	PLS_Style::add(array(
		"name" => __("Price Increment", 'manchester'),
		"desc" => "",
		"std" => "50000",
		"id" => "pls-option-price-inc",
		"type" => "text"));
	
	//beds
	PLS_Style::add(array(
				"name" => __("Bedroom Options", 'manchester'),
				"desc" => __("Use the controls below to change what options are displayed when users click the bedrooms filter", 'manchester'),
				"type" => "info"));

	PLS_Style::add(array(
		"name" => __("Bedroom Options Start", 'manchester'),
		"desc" => "",
		"id" => "pls-option-bed-min",
		"std" => "0",
		"type" => "text"));

	PLS_Style::add(array(
		"name" => __("Bedroom Options End", 'manchester'),
		"desc" => "",
		"id" => "pls-option-bed-max",
		"std" => "15",
		"type" => "text"));

	//baths
	PLS_Style::add(array(
		"name" => __("Bathroom Options", 'manchester'),
		"desc" => __("Use the controls below to change what options are displayed when users click the bathrooms filter", 'manchester'),
		"type" => "info"));

	PLS_Style::add(array(
		"name" => __("Bathroom Options Start", 'manchester'),
		"desc" => "",
		"id" => "pls-option-bath-min",
		"std" => "0",
		"type" => "text"));

	PLS_Style::add(array(
		"name" => __("Bathroom Options End", 'manchester'),
		"desc" => "",
		"id" => "pls-option-bath-max",
		"std" => "10",
		"type" => "text"));

	//half-baths
	PLS_Style::add(array(
		"name" => __("Half Bath Options", 'manchester'),
		"desc" => __("Use the controls below to change what options are displayed when users click the bathrooms filter", 'manchester'),
		"type" => "info"));

	PLS_Style::add(array(
		"name" => __("Half Bath Options Start", 'manchester'),
		"desc" => "",
		"id" => "pls-option-half-bath-min",
		"std" => "0",
		"type" => "text"));

	PLS_Style::add(array(
		"name" => __("Half Bath Options End", 'manchester'),
		"desc" => "",
		"id" => "pls-option-half-bath-max",
		"std" => "5",
		"type" => "text"));