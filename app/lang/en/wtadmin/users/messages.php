<?php

return array(

	'already_exists'    => 'User already exists!',
	'does_not_exist'    => 'User does not exist.',
	'login_required'    => 'The login field is required',
	'password_required' => 'The password is required.',
	'password_does_not_match' => 'The passwords provided do not match.',

	'create' => array(
		'error'   => 'User was not created, please try again.',
		'success' => 'User created successfully.'
	),
    'import' => array(
        'error' => 'User was not import successfully, please try again.',
        'success' => 'User Import successfully.',
        'file_error' => 'Uploaded file has some error.',
        'empty_array' => 'No record import.',
    ),
    'edit' => array(
        'impossible' => 'You cannot edit yourself.',
        'error'      => 'There was an issue editing the user. Please try again.',
        'success'    => 'The user has been updated successfully.'
    ),

    'delete' => array(
        'impossible' => 'You cannot delete yourself.',
        'error'      => 'There was an issue deleting the user. Please try again.',
        'success'    => 'The user was deleted successfully.'
    )

);
