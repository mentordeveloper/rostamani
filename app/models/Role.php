<?php

use Zizaco\Entrust\EntrustRole;

/**
 * Role
 *
 * @property integer $id
 * @property string $name
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\Config::get('auth.model[] $users
 * @property-read \Illuminate\Database\Eloquent\Collection|\Config::get('entrust::permission[] $perms
 * @property mixed $permissions
 */
class Role extends EntrustRole {

    /**
     * Provide an array of strings that map to valid roles.
     * @param array $roles
     * @return stdClass
     */
    public function validateRoles( array $roles )
    {
        $user = Confide::user();
        $roleValidation = new stdClass();
        foreach( $roles as $role )
        {
            // Make sure theres a valid user, then check role.
            $roleValidation->$role = ( empty($user) ? false : $user->hasRole($role) );
        }
        return $roleValidation;
    }
}