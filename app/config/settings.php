<?php

return array(
	'script_url' => URL::to_route('upload'),
	'upload_dir' => path('public').'bundles/uploads/files/',
	'upload_url' => URL::base().'/bundles/uploads/files/',
	'delete_type' => 'POST',
	'image_versions' => array(
		'thumbnail' => array(
			'upload_dir' => path('public').'bundles/uploads/thumbnails/',
			'upload_url' => URL::base().'/bundles/uploads/thumbnails/',
		),
	),
);