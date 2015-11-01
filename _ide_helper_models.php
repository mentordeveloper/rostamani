<?php
/**
 * An helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace {
/**
 * AssignedRoles
 *
 * @property integer $id
 * @property integer $user_id
 * @property integer $role_id
 */
	class AssignedRoles {}
}

namespace {
/**
 * Category
 *
 * @property integer $cat_id
 * @property integer $user_id
 * @property integer $post_id
 * @property string $content
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property-read \User $author
 * @property-read \Post $post
 * @property-read \User $user
 */
	class Category {}
}

namespace {
/**
 * Comment
 *
 * @property integer $id
 * @property integer $user_id
 * @property integer $post_id
 * @property string $content
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property-read \User $author
 * @property-read \Post $post
 * @property-read \User $user
 */
	class Comment {}
}

namespace {
/**
 * Grade
 *
 */
	class Grade {}
}

namespace {
/**
 * Page
 *
 * @property-read \User $author
 * @property-read \categories $catName
 * @property-read \Illuminate\Database\Eloquent\Collection|\Comment[] $comments
 */
	class Page {}
}

namespace {
/**
 * PageAssignment
 *
 */
	class PageAssignment {}
}

namespace {
/**
 * Permission
 *
 * @property integer $id
 * @property string $name
 * @property string $display_name
 * @property-read \Illuminate\Database\Eloquent\Collection|\Config::get('entrust::role[] $roles
 */
	class Permission {}
}

namespace {
/**
 * PermissionLis
 *
 */
	class PermissionLis {}
}

namespace {
/**
 * Post
 *
 * @property integer $id
 * @property integer $user_id
 * @property string $title
 * @property string $slug
 * @property string $content
 * @property string $meta_title
 * @property string $meta_description
 * @property string $meta_keywords
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property-read \User $author
 * @property-read \Illuminate\Database\Eloquent\Collection|\Comment[] $comments
 */
	class Post {}
}

namespace {
/**
 * PostImageVideo
 *
 */
	class PostImageVideo {}
}

namespace {
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
	class Role {}
}

namespace {
/**
 * School
 *
 */
	class School {}
}

namespace {
/**
 * User
 *
 * @property integer $id
 * @property string $username
 * @property string $email
 * @property string $password
 * @property string $confirmation_code
 * @property string $remember_token
 * @property boolean $confirmed
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\Config::get('entrust::role[] $roles
 */
	class User {}
}

namespace {
/**
 * UserGrades
 *
 */
	class UserGrades {}
}

namespace {
/**
 * UsersTheme
 *
 */
	class UsersTheme {}
}

