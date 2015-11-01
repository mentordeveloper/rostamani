<?php 

return array(
    // layouts
    'master' => 'syntara::layouts.dashboard.master',
    'header' => 'syntara::layouts.dashboard.header',
    'permissions-select' => 'syntara::layouts.dashboard.permissions-select',

    // dashboard
    'dashboard-index' => 'syntara::dashboard.index',
    'login' => 'syntara::dashboard.login',
    '2step_validation' => 'syntara::dashboard.2step',
    'error' => 'syntara::dashboard.error',

    // users
    'users-index' => 'syntara::user.index-user',
    'users-list' => 'syntara::user.list-users',
    'user-create' => 'syntara::user.new-user',
    'user-informations' => 'syntara::user.user-informations',
    'user-profile' => 'syntara::user.show-user',
    'user-activation' => 'syntara::user.activation',

    // groups
    'groups-index' => 'syntara::group.index-group',
    'groups-list' => 'syntara::group.list-groups',
    'group-create' => 'syntara::group.new-group',
    'users-in-group' => 'syntara::group.list-users-group',
    'group-edit' => 'syntara::group.show-group',

    // permissions
    'permissions-index' => 'syntara::permission.index-permission',
    'permissions-list' => 'syntara::permission.list-permissions',
    'permission-create' => 'syntara::permission.new-permission',
    'permission-edit' => 'syntara::permission.show-permission',
    
    // sub-Domain
    'domain-index' => 'syntara::domain.index-domain',
    'domain-list' => 'syntara::domain.list-domain',
    'domain-create' => 'syntara::domain.new-domain',
    'users-in-group' => 'syntara::domain.list-users-domain',
    'group-edit' => 'syntara::domain.show-domain',
    //sub-domain size listing
    'domain_size' => 'syntara::domain.list-domain-size',
    'domain_features' => 'syntara::domain.list-domain-feature',
    'domain_signup' => 'syntara::domain.domain_signup',
    'domain_edit' => 'syntara::domain.show-domain',
    'domain_detail' => 'syntara::domain.store_update',
    
    // Size Management
    'size-index' => 'syntara::size.index-size',
    'size-list' => 'syntara::size.list-size',
    'size-create' => 'syntara::size.new-size',
    'size-edit' => 'syntara::size.show-size',
    
    // Category Management
    'cate-index' => 'syntara::cate.index-cate',
    'cate-list' => 'syntara::cate.list-cate',
    'cate-create' => 'syntara::cate.new-cate',
    'cate-edit' => 'syntara::cate.show-cate',
    
    // Store users
    'store-users-index' => 'syntara::store_users.index',
    'store-users-list' => 'syntara::user.list-users',
    'store-user-create' => 'syntara::user.new-user',
    'store-user-informations' => 'syntara::user.user-informations',
    'store-user-profile' => 'syntara::user.show-user',
    'store-user-activation' => 'syntara::user.activation',
    
    // Coupon Code Management
    'promo-index' => 'syntara::promo.index-promo',
    'promo-list' => 'syntara::promo.list-promo',
    'promo-create' => 'syntara::promo.new-promo',
    'promo-edit' => 'syntara::promo.show-promo',
);