<?php 

return array(
    'dashboard' => array(
        array(
            'title' => trans('syntara::breadcrumbs.dashboard'),
            'link' => URL::route('indexDashboard'),
            'icon' => 'glyphicon-home'
        )
    ),
    'domain_signup' => array(
        array(
            'title' => trans('syntara::breadcrumbs.dashboard'),
            'link' => URL::route('indexDashboard'),
            'icon' => 'glyphicon-home'
        ),
        array(
            'title' => trans('syntara::breadcrumbs.domain_signup'),
            'link' => URL::current(),
            'icon' => 'glyphicon-plus-sign'
        ),
    ),
    'domain_detail' => array(
        array(
            'title' => trans('syntara::breadcrumbs.dashboard'),
            'link' => URL::route('indexDashboard'),
            'icon' => 'glyphicon-home'
        ),
        array(
            'title' => trans('syntara::breadcrumbs.domains'),
            'link' => URL::current(),
            'icon' => 'glyphicon-globe'
        ),
    ),
    'domain_size' => array(
        array(
            'title' => trans('syntara::breadcrumbs.dashboard'),
            'link' => URL::route('indexDashboard'),
            'icon' => 'glyphicon-home'
        ),
        array(
            'title' => trans('syntara::breadcrumbs.domains'),
            'link' => URL::route('indexDashboard'),
            'icon' => 'glyphicon-globe'
        ),
    ),
    'domain_category' => array(
        array(
            'title' => trans('syntara::breadcrumbs.dashboard'),
            'link' => URL::route('indexDashboard'),
            'icon' => 'glyphicon-home'
        ),
        array(
            'title' => trans('syntara::breadcrumbs.cate'),
            'link' => URL::route('cateManagement'),
            'icon' => 'glyphicon-list'
        ),
    ),
    'domain_feature' => array(
        array(
            'title' => trans('syntara::breadcrumbs.dashboard'),
            'link' => URL::route('indexDashboard'),
            'icon' => 'glyphicon-home'
        ),
        array(
            'title' => trans('syntara::breadcrumbs.domains'),
            'link' => URL::route('indexDashboard'),
            'icon' => 'glyphicon-globe'
        ),
        array(
            'title' => trans('syntara::breadcrumbs.domain_feature'),
            'link' => URL::current(),
            'icon' => 'glyphicon-globe'
        ),
    ),
    'size' => array(
        array(
            'title' => trans('syntara::breadcrumbs.dashboard'),
            'link' => URL::route('indexDashboard'),
            'icon' => 'glyphicon-home'
        ),
        array(
            'title' => trans('syntara::breadcrumbs.size'),
            'link' => URL::current(),
            'icon' => 'glyphicon-globe'
        ),
    ),
    'sub_size' => array(
        array(
            'title' => trans('syntara::breadcrumbs.dashboard'),
            'link' => URL::route('indexDashboard'),
            'icon' => 'glyphicon-home'
        ),
        array(
            'title' => trans('syntara::breadcrumbs.size'),
            'link' => URL::route('sizeManagement'),
            'icon' => 'glyphicon-globe'
        ),
        array(
            'title' => trans('syntara::breadcrumbs.sub_size'),
            'link' => URL::current(),
            'icon' => 'glyphicon-globe'
        ),
    ),
    'new_size' => array(
        array(
            'title' => trans('syntara::breadcrumbs.dashboard'),
            'link' => URL::route('indexDashboard'),
            'icon' => 'glyphicon-home'
        ),
        array(
            'title' => trans('syntara::breadcrumbs.size'),
            'link' => URL::route('sizeManagement'),
            'icon' => 'glyphicon-globe'
        ),
        array(
            'title' => trans('syntara::breadcrumbs.new_size'),
            'link' => URL::current(),
            'icon' => 'glyphicon-globe'
        ),
    ),
    'show_size' => array(
        array(
            'title' => trans('syntara::breadcrumbs.dashboard'),
            'link' => URL::route('indexDashboard'),
            'icon' => 'glyphicon-home'
        ),
        array(
            'title' => trans('syntara::breadcrumbs.size'),
            'link' => URL::route('sizeManagement'),
            'icon' => 'glyphicon-globe'
        ),
        array(
            'title' => trans('syntara::breadcrumbs.show_size'),
            'link' => URL::current(),
            'icon' => 'glyphicon-globe'
        ),
    ),
    'promo' => array(
        array(
            'title' => trans('syntara::breadcrumbs.dashboard'),
            'link' => URL::route('indexDashboard'),
            'icon' => 'glyphicon-home'
        ),
        array(
            'title' => trans('syntara::breadcrumbs.promo'),
            'link' => URL::current(),
            'icon' => 'glyphicon-globe'
        ),
    ),
    'new_promo' => array(
        array(
            'title' => trans('syntara::breadcrumbs.dashboard'),
            'link' => URL::route('indexDashboard'),
            'icon' => 'glyphicon-home'
        ),
        array(
            'title' => trans('syntara::breadcrumbs.promo'),
            'link' => URL::route('promoManagement'),
            'icon' => 'glyphicon-globe'
        ),
        array(
            'title' => trans('syntara::breadcrumbs.new_promo'),
            'link' => URL::current(),
            'icon' => 'glyphicon-globe'
        ),
    ),
    'show_promo' => array(
        array(
            'title' => trans('syntara::breadcrumbs.dashboard'),
            'link' => URL::route('indexDashboard'),
            'icon' => 'glyphicon-home'
        ),
        array(
            'title' => trans('syntara::breadcrumbs.promo'),
            'link' => URL::route('promoManagement'),
            'icon' => 'glyphicon-globe'
        ),
        array(
            'title' => trans('syntara::breadcrumbs.show_promo'),
            'link' => URL::current(),
            'icon' => 'glyphicon-globe'
        ),
    ),
    'login' => array(
        array(
            'title' => trans('syntara::breadcrumbs.login'),
            'link' => URL::route('getLogin'),
            'icon' => 'glyphicon-user'
        )
    ),
    'users' => array(
        array(
            'title' => trans('syntara::breadcrumbs.users'),
            'link' => URL::route('listUsers'),
            'icon' => 'glyphicon-user'
        )
    ),
    'create_user' => array(
        array(
            'title' => trans('syntara::breadcrumbs.users'),
            'link' => URL::route('listUsers'),
            'icon' => 'glyphicon-user'
        ), 
        array(
            'title' => trans('syntara::breadcrumbs.new-user'),
            'link' => URL::current(),
            'icon' => 'glyphicon-plus-sign'
        )
    ),
    'groups' => array(
        array(
            'title' => trans('syntara::breadcrumbs.groups'),
            'link' => URL::route('listGroups'),
            'icon' => 'glyphicon-list-alt'
        )
    ),
    'create_group' => array(
        array(
            'title' => trans('syntara::breadcrumbs.groups'),
            'link' => URL::route('listGroups'),
            'icon' => 'glyphicon-list-alt'
        ),
        array(
            'title' => trans('syntara::breadcrumbs.new-group'),
            'link' => URL::current(),
            'icon' => 'glyphicon-plus-sign'
        )
    ),
    'permissions' => array(
       array(
            'title' => trans('syntara::breadcrumbs.permissions'),
            'link' => URL::route('listPermissions'),
            'icon' => 'glyphicon-ban-circle'
        )
    ),
    'create_permission' => array(
        array(
            'title' => trans('syntara::breadcrumbs.permissions'),
            'link' => URL::route('listPermissions'),
            'icon' => 'glyphicon-ban-circle'
        ),
        array(
            'title' => trans('syntara::breadcrumbs.new-permission'),
            'link' => URL::current(),
            'icon' => 'glyphicon-plus-sign'
        )
    ),
    'cate' => array(
        array(
            'title' => trans('syntara::breadcrumbs.dashboard'),
            'link' => URL::route('indexDashboard'),
            'icon' => 'glyphicon-home'
        ),
        array(
            'title' => trans('syntara::breadcrumbs.cate'),
            'link' => URL::current(),
            'icon' => 'glyphicon-globe'
        ),
    ),
    'sub_cate' => array(
        array(
            'title' => trans('syntara::breadcrumbs.dashboard'),
            'link' => URL::route('indexDashboard'),
            'icon' => 'glyphicon-home'
        ),
        array(
            'title' => trans('syntara::breadcrumbs.cate'),
            'link' => URL::route('cateManagement'),
            'icon' => 'glyphicon-globe'
        ),
        array(
            'title' => trans('syntara::breadcrumbs.sub_cate'),
            'link' => URL::current(),
            'icon' => 'glyphicon-globe'
        ),
    ),
    'new_cate' => array(
        array(
            'title' => trans('syntara::breadcrumbs.dashboard'),
            'link' => URL::route('indexDashboard'),
            'icon' => 'glyphicon-home'
        ),
        array(
            'title' => trans('syntara::breadcrumbs.cate'),
            'link' => URL::route('cateManagement'),
            'icon' => 'glyphicon-globe'
        ),
        array(
            'title' => trans('syntara::breadcrumbs.new_cate'),
            'link' => URL::current(),
            'icon' => 'glyphicon-globe'
        ),
    ),
    'show_cate' => array(
        array(
            'title' => trans('syntara::breadcrumbs.dashboard'),
            'link' => URL::route('indexDashboard'),
            'icon' => 'glyphicon-home'
        ),
        array(
            'title' => trans('syntara::breadcrumbs.cate'),
            'link' => URL::route('cateManagement'),
            'icon' => 'glyphicon-globe'
        ),
        array(
            'title' => trans('syntara::breadcrumbs.show_cate'),
            'link' => URL::current(),
            'icon' => 'glyphicon-globe'
        ),
    ),
);