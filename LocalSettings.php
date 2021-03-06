<?php
# This file was automatically generated by the MediaWiki 1.30.0
# installer. If you make manual changes, please keep track in case you
# need to recreate them later.
#
# See includes/DefaultSettings.php for all configurable settings
# and their default values, but don't forget to make changes in _this_
# file, not there.
#
# Further documentation for configuration settings may be found at:
# https://www.mediawiki.org/wiki/Manual:Configuration_settings

# Protect against web entry
if ( !defined( 'MEDIAWIKI' ) ) {
	exit;
}

## Uncomment this to disable output compression
# $wgDisableOutputCompression = true;

$wgSitename = "YSJ Wiki";
$wgMetaNamespace = "YSJ_Wiki";

## The URL base path to the directory containing the wiki;
## defaults for all runtime URL paths are based off of this.
## For more information on customizing the URLs
## (like /w/index.php/Page_title to /wiki/Page_title) please see:
## https://www.mediawiki.org/wiki/Manual:Short_URL
$wgScriptPath = "/mediawiki";

## The protocol and server name to use in fully-qualified URLs
$wgServer = "http://192.168.175.148";

## The URL path to static resources (images, scripts, etc.)
$wgResourceBasePath = $wgScriptPath;

## The URL path to the logo.  Make sure you change this from the default,
## or else you'll overwrite your logo when you upgrade!
$wgLogo = "$wgResourceBasePath/resources/assets/wiki.png";

## UPO means: this is also a user preference option

$wgEnableEmail = true;
$wgEnableUserEmail = false; # UPO

$wgEmergencyContact = "apache@192.168.175.148";
$wgPasswordSender = "apache@192.168.175.148";

$wgEnotifUserTalk = false; # UPO
$wgEnotifWatchlist = true; # UPO
$wgEmailAuthentication = true;

## Database settings
$wgDBtype = "";
$wgDBserver = "";
$wgDBname = "";
$wgDBuser = "";
$wgDBpassword = "";

# MySQL specific settings
$wgDBprefix = "";

# MySQL table options to use during installation or update
$wgDBTableOptions = "ENGINE=InnoDB, DEFAULT CHARSET=utf8";

# Experimental charset support for MySQL 5.0.
$wgDBmysql5 = false;

## Shared memory settings
$wgMainCacheType = CACHE_ACCEL;
$wgMemCachedServers = [];

## To enable image uploads, make sure the 'images' directory
## is writable, then set this to true:
$wgEnableUploads = true;
#$wgUseImageMagick = true;
#$wgImageMagickConvertCommand = "/usr/bin/convert";

# InstantCommons allows wiki to use images from https://commons.wikimedia.org
$wgUseInstantCommons = false;

# Periodically send a pingback to https://www.mediawiki.org/ with basic data
# about this MediaWiki instance. The Wikimedia Foundation shares this data
# with MediaWiki developers to help guide future development efforts.
$wgPingback = false;

## If you use ImageMagick (or any other shell command) on a
## Linux server, this will need to be set to the name of an
## available UTF-8 locale
$wgShellLocale = "C.UTF-8";

## Set $wgCacheDirectory to a writable directory on the web server
## to make your wiki go slightly faster. The directory should not
## be publically accessible from the web.
#$wgCacheDirectory = "$IP/cache";

# Site language code, should be one of the list in ./languages/data/Names.php
$wgLanguageCode = "en-gb";

$wgSecretKey = "a806b09b59ecff4c631a9d86617c52a94606c6927d426cc90575f21490bda178";

# Changing this will log out all existing sessions.
$wgAuthenticationTokenVersion = "1";

# Site upgrade key. Must be set to a string (default provided) to turn on the
# web installer while LocalSettings.php is in place
$wgUpgradeKey = "13e4da43b1704833";

## For attaching licensing metadata to pages, and displaying an
## appropriate copyright notice / icon. GNU Free Documentation
## License and Creative Commons licenses are supported so far.
$wgRightsPage = ""; # Set to the title of a wiki page that describes your license/copyright
$wgRightsUrl = "";
$wgRightsText = "";
$wgRightsIcon = "";

# Path to the GNU diff3 utility. Used for conflict resolution.
$wgDiff3 = "/usr/bin/diff3";

# The following permissions were set based on your choice in the installer
$wgGroupPermissions['*']['createaccount'] = false;
$wgGroupPermissions['*']['edit'] = false;
$wgGroupPermissions['*']['read'] = false;

## Default skin: you can change the default skin. Use the internal symbolic
## names, ie 'vector', 'monobook':
$wgDefaultSkin = "vector";

# Enabled skins.
# The following skins were automatically enabled:
wfLoadSkin( 'Vector' );


# End of automatically generated settings.
# Add more configuration options below.

/* DB credentials are stored in another file, outside of mediawiki root folder */
require_once('../database_settings.php');

/* Protect main page from editing */
$wgNamespaceProtection[NS_MAIN] = array('edit-main');
$wgGroupPermissions['sysop']['edit-main'] = true; //Only admins can edit the main page!

/* Protect the User namespace */
$wgNamespaceProtection[NS_USER] = array('user-pages');
$wgGroupPermissions['sysop']['user-pages'] = true; //Only admins have the right to edit User namespace pages

define('HelpDeskNS',100); //define a namespace
$wgNamespaceProtection[HelpDeskNS] = array('hdGroup-edit');//create a permission
$wgGroupPermissions['HelpDeskUsers']['hdGroup-edit'] = true; //HelpDeskUsers group can only edit this namespace
$wgGroupPermissions['sysop']['hdGroup-edit'] = true; //allow Admins to edit HelpDesk pages
$wgRevokePermissions['HelpDeskUsers']['editmyprivateinfo'] = true; //Disable prefs editing

define('DevelopersNS',101); //define a namespace
$wgNamespaceProtection[DevelopersNS] = array('devsGroup-edit');//create a permission
$wgGroupPermissions['DevUsers']['devsGroup-edit'] = true; //DevUsers group can only edit this namespace
$wgGroupPermissions['sysop']['devsGroup-edit'] = true; //allow Admins to edit DevGroup pages
$wgRevokePermissions['DevUsers']['editmyprivateinfo'] = true; //Disable preferences editing

/* The URL for a new page will be http://$wgServer/index.php/NAMESPACE_VARIABLE:page_name */
/* i.e. in this case, http://192.168.175.148/mediawiki/index.php/developers:moodle_upgrade */
$wgExtraNamespaces = array(
	HelpDeskNS => 'HelpDeskGroup',
	DevelopersNS => 'Developers'
);
