<?php

PLS_Style::add(array( 
		"name" => __("Listing Styles", 'manchester'),
		"type" => "heading"));

		PLS_Style::add(array( 
				"name" => __("General Listing Styles", 'manchester'),
				"desc" => "",
				"type" => "info"));

				PLS_Style::add(array(
						"name" => __("Listing Address Link", 'manchester'),
						"desc" => "",
						"id" => "listing_address",
						"selector" => ".list-info h5 a, .list-info h5 a:visited",
						"type" => "typography"));

				PLS_Style::add(array(
						"name" => __("Listing Address link on hover", 'manchester'),
						"desc" => "",
						"id" => "listing_address_hover",
						"selector" => ".list-info h5 a:hover",
						"type" => "typography"));

				PLS_Style::add(array(
						"name" => __("Listing Details", 'manchester'),
						"desc" => "",
						"id" => "listing_details",
						"selector" => ".list-info .nrm-txt",
						"type" => "typography"));

		PLS_Style::add(array( 
				"name" => __("Single Property Styles", 'manchester'),
				"desc" => "",
				"type" => "info"));

				PLS_Style::add(array(
						"name" => __("Single Property Address", 'manchester'),
						"desc" => "",
						"id" => "single_property_address",
						"selector" => "body.single-property article.property-details .property-title b",
						"type" => "typography"));

				PLS_Style::add(array(
						"name" => __("Single Property Section Titles", 'manchester'),
						"desc" => "",
						"id" => "single_property_section_titles",
						"selector" => "body.single-property h5",
						"type" => "typography"));

				PLS_Style::add(array(
						"name" => __("Single Property Paragraph Text", 'manchester'),
						"desc" => "",
						"id" => "single_property_paragraph_text",
						"selector" => "body.single-property .list-item p, body.single-property .list-item label, body.single-property .list-details",
						"type" => "typography"));
