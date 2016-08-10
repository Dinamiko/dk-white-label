@import url("<?php echo admin_url('css/colors.css'); ?>");

html {
  background: #f1f1f1;
}

/* Links */
a {
  color: #0073aa;
}

a:hover, a:active, a:focus {
  color: #0096dd;
}

#media-upload a.del-link:hover,
div.dashboard-widget-submit input:hover,
.subsubsub a:hover,
.subsubsub a.current:hover {
  color: #0096dd;
}

/* Forms */
input[type=checkbox]:checked:before {
  color: <?php echo get_option('dkwl_color_scheme_2', '#333' );?>;
}

input[type=radio]:checked:before {
  background: <?php echo get_option('dkwl_color_scheme_2', '#333' );?>;
}

.wp-core-ui input[type="reset"]:hover,
.wp-core-ui input[type="reset"]:active {
  color: #0096dd;
}

/* Core UI */
.wp-core-ui .button-primary {
  background: #9ebaa0;
  border-color: #80a583 #719a74 #719a74;
  color: white;
  -webkit-box-shadow: 0 1px 0 #719a74;
  box-shadow: 0 1px 0 #719a74;
  text-shadow: 0 -1px 1px #719a74, 1px 0 1px #719a74, 0 1px 1px #719a74, -1px 0 1px #719a74;
}

.wp-core-ui .button-primary:hover, .wp-core-ui .button-primary:focus {
  background: #a7c0a9;
  border-color: #719a74;
  color: white;
  -webkit-box-shadow: 0 1px 0 #719a74;
  box-shadow: 0 1px 0 #719a74;
}

.wp-core-ui .button-primary:focus {
  -webkit-box-shadow: inset 0 1px 0 #80a583, 0 0 2px 1px #33b3db;
  box-shadow: inset 0 1px 0 #80a583, 0 0 2px 1px #33b3db;
}

.wp-core-ui .button-primary:active {
  background: #80a583;
  border-color: #719a74;
  -webkit-box-shadow: inset 0 2px 0 #719a74;
  box-shadow: inset 0 2px 0 #719a74;
}

.wp-core-ui .button-primary[disabled], .wp-core-ui .button-primary:disabled, .wp-core-ui .button-primary.button-primary-disabled, .wp-core-ui .button-primary.disabled {
  color: #c7d1c8 !important;
  background: #86a989 !important;
  border-color: #719a74 !important;
  text-shadow: none !important;
}

.wp-core-ui .button-primary.button-hero {
  -webkit-box-shadow: 0 2px 0 #719a74 !important;
  box-shadow: 0 2px 0 #719a74 !important;
}

.wp-core-ui .button-primary.button-hero:active {
  -webkit-box-shadow: inset 0 3px 0 #719a74 !important;
  box-shadow: inset 0 3px 0 #719a74 !important;
}

.wp-core-ui .wp-ui-primary {
  color: #fff;
  background-color: <?php echo get_option('dkwl_color_scheme_2', '#333' );?>;
}

.wp-core-ui .wp-ui-text-primary {
  color: <?php echo get_option('dkwl_color_scheme_2', '#333' );?>;
}

.wp-core-ui .wp-ui-highlight {
  color: #fff;
  background-color: #9ebaa0;
}

.wp-core-ui .wp-ui-text-highlight {
  color: #9ebaa0;
}

.wp-core-ui .wp-ui-notification {
  color: #fff;
  background-color: <?php echo get_option('dkwl_color_scheme_4', '#00a0d2' );?>;
}

.wp-core-ui .wp-ui-text-notification {
  color: <?php echo get_option('dkwl_color_scheme_4', '#00a0d2' );?>;
}

.wp-core-ui .wp-ui-text-icon {
  color: #f2fcff;
}

/* List tables */
.wrap .add-new-h2:hover,
.wrap .page-title-action:hover,
.tablenav .tablenav-pages a:hover,
.tablenav .tablenav-pages a:focus {
  color: #fff;
  background-color: <?php echo get_option('dkwl_color_scheme_2', '#333' );?>;
}

.view-switch a.current:before {
  color: <?php echo get_option('dkwl_color_scheme_2', '#333' );?>;
}

.view-switch a:hover:before {
  color: <?php echo get_option('dkwl_color_scheme_4', '#00a0d2' );?>;
}

/* Admin Menu */
#adminmenuback,
#adminmenuwrap,
#adminmenu {
  background: <?php echo get_option('dkwl_color_scheme_2', '#333' );?>;
}

#adminmenu a {
  color: #fff;
}

#adminmenu div.wp-menu-image:before {
  color: #f2fcff;
}

#adminmenu a:hover,
#adminmenu li.menu-top:hover,
#adminmenu li.opensub > a.menu-top,
#adminmenu li > a.menu-top:focus {
  color: #fff;
  background-color: #9ebaa0;
}

#adminmenu li.menu-top:hover div.wp-menu-image:before,
#adminmenu li.opensub > a.menu-top div.wp-menu-image:before {
  color: #fff;
}

/* Active tabs use a bottom border color that matches the page background color. */
.about-wrap h2 .nav-tab-active,
.nav-tab-active,
.nav-tab-active:hover {
  background-color: #f1f1f1;
  border-bottom-color: #f1f1f1;
}

/* Admin Menu: submenu */
#adminmenu .wp-submenu,
#adminmenu .wp-has-current-submenu .wp-submenu,
#adminmenu .wp-has-current-submenu.opensub .wp-submenu,
.folded #adminmenu .wp-has-current-submenu .wp-submenu,
#adminmenu a.wp-has-current-submenu:focus + .wp-submenu {
  background: <?php echo get_option('dkwl_color_scheme_1', '#222' );?>;
}

#adminmenu li.wp-has-submenu.wp-not-current-submenu.opensub:hover:after {
  border-right-color: <?php echo get_option('dkwl_color_scheme_1', '#222' );?>;
}

#adminmenu .wp-submenu .wp-submenu-head {
  color: #d5dde0;
}

#adminmenu .wp-submenu a,
#adminmenu .wp-has-current-submenu .wp-submenu a,
.folded #adminmenu .wp-has-current-submenu .wp-submenu a,
#adminmenu a.wp-has-current-submenu:focus + .wp-submenu a,
#adminmenu .wp-has-current-submenu.opensub .wp-submenu a {
  color: #d5dde0;
}

#adminmenu .wp-submenu a:focus, #adminmenu .wp-submenu a:hover,
#adminmenu .wp-has-current-submenu .wp-submenu a:focus,
#adminmenu .wp-has-current-submenu .wp-submenu a:hover,
.folded #adminmenu .wp-has-current-submenu .wp-submenu a:focus,
.folded #adminmenu .wp-has-current-submenu .wp-submenu a:hover,
#adminmenu a.wp-has-current-submenu:focus + .wp-submenu a:focus,
#adminmenu a.wp-has-current-submenu:focus + .wp-submenu a:hover,
#adminmenu .wp-has-current-submenu.opensub .wp-submenu a:focus,
#adminmenu .wp-has-current-submenu.opensub .wp-submenu a:hover {
  color: #9ebaa0;
}

/* Admin Menu: current */
#adminmenu .wp-submenu li.current a,
#adminmenu a.wp-has-current-submenu:focus + .wp-submenu li.current a,
#adminmenu .wp-has-current-submenu.opensub .wp-submenu li.current a {
  color: #fff;
}

#adminmenu .wp-submenu li.current a:hover, #adminmenu .wp-submenu li.current a:focus,
#adminmenu a.wp-has-current-submenu:focus + .wp-submenu li.current a:hover,
#adminmenu a.wp-has-current-submenu:focus + .wp-submenu li.current a:focus,
#adminmenu .wp-has-current-submenu.opensub .wp-submenu li.current a:hover,
#adminmenu .wp-has-current-submenu.opensub .wp-submenu li.current a:focus {
  color: #9ebaa0;
}

ul#adminmenu a.wp-has-current-submenu:after,
ul#adminmenu > li.current > a.current:after {
  border-right-color: #f1f1f1;
}

#adminmenu li.current a.menu-top,
#adminmenu li.wp-has-current-submenu a.wp-has-current-submenu,
#adminmenu li.wp-has-current-submenu .wp-submenu .wp-submenu-head,
.folded #adminmenu li.current.menu-top {
  color: #fff;
  background: #9ebaa0;
}

#adminmenu li.wp-has-current-submenu div.wp-menu-image:before,
#adminmenu a.current:hover div.wp-menu-image:before,
#adminmenu li.wp-has-current-submenu a:focus div.wp-menu-image:before,
#adminmenu li.wp-has-current-submenu.opensub div.wp-menu-image:before,
#adminmenu li:hover div.wp-menu-image:before,
#adminmenu li a:focus div.wp-menu-image:before,
#adminmenu li.opensub div.wp-menu-image:before,
.ie8 #adminmenu li.opensub div.wp-menu-image:before {
  color: #fff;
}

/* Admin Menu: bubble */
#adminmenu .awaiting-mod,
#adminmenu .update-plugins {
  color: #fff;
  background: <?php echo get_option('dkwl_color_scheme_4', '#00a0d2' );?>;
}

#adminmenu li.current a .awaiting-mod,
#adminmenu li a.wp-has-current-submenu .update-plugins,
#adminmenu li:hover a .awaiting-mod,
#adminmenu li.menu-top:hover > a .update-plugins {
  color: #fff;
  background: <?php echo get_option('dkwl_color_scheme_1', '#222' );?>;
}

/* Admin Menu: collapse button */
#collapse-menu {
  color: #f2fcff;
}

#collapse-menu:hover {
  color: #fff;
}

#collapse-button div:after {
  color: #f2fcff;
}

#collapse-menu:hover #collapse-button div:after {
  color: #fff;
}

/* Admin Bar */
#wpadminbar {
  color: #fff;
  background: <?php echo get_option('dkwl_color_scheme_2', '#333' );?>;
}

#wpadminbar .ab-item,
#wpadminbar a.ab-item,
#wpadminbar > #wp-toolbar span.ab-label,
#wpadminbar > #wp-toolbar span.noticon {
  color: #fff;
}

#wpadminbar .ab-icon,
#wpadminbar .ab-icon:before,
#wpadminbar .ab-item:before,
#wpadminbar .ab-item:after {
  color: #f2fcff;
}

#wpadminbar:not(.mobile) .ab-top-menu > li:hover > .ab-item,
#wpadminbar:not(.mobile) .ab-top-menu > li > .ab-item:focus,
#wpadminbar.nojq .quicklinks .ab-top-menu > li > .ab-item:focus,
#wpadminbar.nojs .ab-top-menu > li.menupop:hover > .ab-item,
#wpadminbar .ab-top-menu > li.menupop.hover > .ab-item {
  color: #9ebaa0;
  background: <?php echo get_option('dkwl_color_scheme_1', '#222' );?>;
}

#wpadminbar:not(.mobile) > #wp-toolbar li:hover span.ab-label,
#wpadminbar:not(.mobile) > #wp-toolbar li.hover span.ab-label,
#wpadminbar:not(.mobile) > #wp-toolbar a:focus span.ab-label {
  color: #9ebaa0;
}

#wpadminbar:not(.mobile) li:hover .ab-icon:before,
#wpadminbar:not(.mobile) li:hover .ab-item:before,
#wpadminbar:not(.mobile) li:hover .ab-item:after,
#wpadminbar:not(.mobile) li:hover #adminbarsearch:before {
  color: #fff;
}

/* Admin Bar: submenu */
#wpadminbar .menupop .ab-sub-wrapper {
  background: <?php echo get_option('dkwl_color_scheme_1', '#222' );?>;
}

#wpadminbar .quicklinks .menupop ul.ab-sub-secondary,
#wpadminbar .quicklinks .menupop ul.ab-sub-secondary .ab-submenu {
  background: #8f9a9e;
}

#wpadminbar .ab-submenu .ab-item,
#wpadminbar .quicklinks .menupop ul li a,
#wpadminbar .quicklinks .menupop.hover ul li a,
#wpadminbar.nojs .quicklinks .menupop:hover ul li a {
  color: #d5dde0;
}

#wpadminbar .quicklinks li .blavatar,
#wpadminbar .menupop .menupop > .ab-item:before {
  color: #f2fcff;
}

#wpadminbar .quicklinks .menupop ul li a:hover,
#wpadminbar .quicklinks .menupop ul li a:focus,
#wpadminbar .quicklinks .menupop ul li a:hover strong,
#wpadminbar .quicklinks .menupop ul li a:focus strong,
#wpadminbar .quicklinks .ab-sub-wrapper .menupop.hover > a,
#wpadminbar .quicklinks .menupop.hover ul li a:hover,
#wpadminbar .quicklinks .menupop.hover ul li a:focus,
#wpadminbar.nojs .quicklinks .menupop:hover ul li a:hover,
#wpadminbar.nojs .quicklinks .menupop:hover ul li a:focus,
#wpadminbar li:hover .ab-icon:before,
#wpadminbar li:hover .ab-item:before,
#wpadminbar li a:focus .ab-icon:before,
#wpadminbar li .ab-item:focus:before,
#wpadminbar li.hover .ab-icon:before,
#wpadminbar li.hover .ab-item:before,
#wpadminbar li:hover #adminbarsearch:before,
#wpadminbar li #adminbarsearch.adminbar-focused:before {
  color: #9ebaa0;
}

#wpadminbar .quicklinks li a:hover .blavatar,
#wpadminbar .quicklinks li a:focus .blavatar,
#wpadminbar .quicklinks .ab-sub-wrapper .menupop.hover > a .blavatar,
#wpadminbar .menupop .menupop > .ab-item:hover:before,
#wpadminbar.mobile .quicklinks .ab-icon:before,
#wpadminbar.mobile .quicklinks .ab-item:before {
  color: #9ebaa0;
}

#wpadminbar.mobile .quicklinks .hover .ab-icon:before,
#wpadminbar.mobile .quicklinks .hover .ab-item:before {
  color: #f2fcff;
}

/* Admin Bar: search */
#wpadminbar #adminbarsearch:before {
  color: #f2fcff;
}

#wpadminbar > #wp-toolbar > #wp-admin-bar-top-secondary > #wp-admin-bar-search #adminbarsearch input.adminbar-input:focus {
  color: #fff;
  background: #879ea5;
}

#wpadminbar #adminbarsearch .adminbar-input::-webkit-input-placeholder {
  color: #fff;
  opacity: 0.7;
}

#wpadminbar #adminbarsearch .adminbar-input:-moz-placeholder {
  color: #fff;
  opacity: 0.7;
}

#wpadminbar #adminbarsearch .adminbar-input::-moz-placeholder {
  color: #fff;
  opacity: 0.7;
}

#wpadminbar #adminbarsearch .adminbar-input:-ms-input-placeholder {
  color: #fff;
  opacity: 0.7;
}

/* Admin Bar: my account */
#wpadminbar .quicklinks li#wp-admin-bar-my-account.with-avatar > a img {
  border-color: #879ea5;
  background-color: #879ea5;
}

#wpadminbar #wp-admin-bar-user-info .display-name {
  color: #fff;
}

#wpadminbar #wp-admin-bar-user-info a:hover .display-name {
  color: #9ebaa0;
}

#wpadminbar #wp-admin-bar-user-info .username {
  color: #d5dde0;
}

/* Pointers */
.wp-pointer .wp-pointer-content h3 {
  background-color: #9ebaa0;
  border-color: #8faf91;
}

.wp-pointer .wp-pointer-content h3:before {
  color: #9ebaa0;
}

.wp-pointer.wp-pointer-top .wp-pointer-arrow,
.wp-pointer.wp-pointer-top .wp-pointer-arrow-inner,
.wp-pointer.wp-pointer-undefined .wp-pointer-arrow,
.wp-pointer.wp-pointer-undefined .wp-pointer-arrow-inner {
  border-bottom-color: #9ebaa0;
}

/* Media */
.media-item .bar,
.media-progress-bar div {
  background-color: #9ebaa0;
}

.details.attachment {
  -webkit-box-shadow: inset 0 0 0 3px #fff, inset 0 0 0 7px #9ebaa0;
  box-shadow: inset 0 0 0 3px #fff, inset 0 0 0 7px #9ebaa0;
}

.attachment.details .check {
  background-color: #9ebaa0;
  -webkit-box-shadow: 0 0 0 1px #fff, 0 0 0 2px #9ebaa0;
  box-shadow: 0 0 0 1px #fff, 0 0 0 2px #9ebaa0;
}

.media-selection .attachment.selection.details .thumbnail {
  -webkit-box-shadow: 0px 0px 0px 1px #fff, 0px 0px 0px 3px #9ebaa0;
  box-shadow: 0px 0px 0px 1px #fff, 0px 0px 0px 3px #9ebaa0;
}

/* Themes */
.theme-browser .theme.active .theme-name,
.theme-browser .theme.add-new-theme a:hover:after,
.theme-browser .theme.add-new-theme a:focus:after {
  background: #9ebaa0;
}

.theme-browser .theme.add-new-theme a:hover span:after,
.theme-browser .theme.add-new-theme a:focus span:after {
  color: #9ebaa0;
}

.theme-section.current,
.theme-filter.current {
  border-bottom-color: <?php echo get_option('dkwl_color_scheme_2', '#333' );?>;
}

body.more-filters-opened .more-filters {
  color: #fff;
  background-color: <?php echo get_option('dkwl_color_scheme_2', '#333' );?>;
}

body.more-filters-opened .more-filters:before {
  color: #fff;
}

body.more-filters-opened .more-filters:hover,
body.more-filters-opened .more-filters:focus {
  background-color: #9ebaa0;
  color: #fff;
}

body.more-filters-opened .more-filters:hover:before,
body.more-filters-opened .more-filters:focus:before {
  color: #fff;
}

/* Widgets */
.widgets-chooser li.widgets-chooser-selected {
  background-color: #9ebaa0;
  color: #fff;
}

.widgets-chooser li.widgets-chooser-selected:before,
.widgets-chooser li.widgets-chooser-selected:focus:before {
  color: #fff;
}

/* Customize */
#customize-theme-controls .widget-area-select .selected {
  background-color: #9ebaa0;
  color: #fff;
}

/* Responsive Component */
div#wp-responsive-toggle a:before {
  color: #f2fcff;
}

.wp-responsive-open div#wp-responsive-toggle a {
  border-color: transparent;
  background: #9ebaa0;
}

.wp-responsive-open #wpadminbar #wp-admin-bar-menu-toggle a {
  background: <?php echo get_option('dkwl_color_scheme_1', '#222' );?>;
}

.wp-responsive-open #wpadminbar #wp-admin-bar-menu-toggle .ab-icon:before {
  color: #f2fcff;
}

/* TinyMCE */
.mce-container.mce-menu .mce-menu-item:hover,
.mce-container.mce-menu .mce-menu-item.mce-selected,
.mce-container.mce-menu .mce-menu-item:focus,
.mce-container.mce-menu .mce-menu-item-normal.mce-active,
.mce-container.mce-menu .mce-menu-item-preview.mce-active {
  background: #9ebaa0;
}

