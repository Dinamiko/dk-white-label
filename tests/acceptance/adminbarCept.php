<?php
$I = new AcceptanceTester($scenario);
$I->wantTo('check if adminbar showns as expected');

$I->am( 'admin' );
$I->loginAsAdmin();

$I->amOnPluginsPage();
$I->activatePlugin('dk-white-label');

$I->amOnPage( 'wp-admin/options-general.php?page=dkwl_settings&tab=admin_elements' );
$I->see('UI Elements');

$I->uncheckOption('#hide_frontend_toolbar');
$I->click('Save Settings');

$I->click('Log Out', '#wp-admin-bar-logout a');
$I->seeElement('#user_login');
$I->see('Log In');

$I->am( 'site visitor' );
$I->amOnPage('/');
$I->expect('adminbar isn\'t shown');
$I->seeElement('#wpadminbar');

// test log in and log out wp admin cases
// test with plugin active and unactive
// test #hide_frontend_toolbar checked and unchecked (uncheckOption)

// frontend check if adminbar exists
