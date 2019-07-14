<?php@casticapps mediawiki]# vim LocalSettings.php
# This file was automatically generated by the MediaWiki 1.26.4
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

$wgSitename = "CASTIC Wiki";
$wgMetaNamespace = "CASTIC_Wiki";

## The URL base path to the directory containing the wiki;
## defaults for all runtime URL paths are based off of this.
## For more information on customizing the URLs
## (like /w/index.php/Page_title to /wiki/Page_title) please see:
## https://www.mediawiki.org/wiki/Manual:Short_URL
$wgScriptPath = "/mediawiki";

## The protocol and server name to use in fully-qualified URLs
$wgServer = "https://casticapps.fiu.edu";


## The URL path to static resources (images, scripts, etc.)
$wgResourceBasePath = $wgScriptPath;

## The URL path to the logo.  Make sure you change this from the default,
## or else you'll overwrite your logo when you upgrade!
$wgLogo = "$wgResourceBasePath/resources/assets/wiki.png";

## UPO means: this is also a user preference option

$wgEnableEmail = true;
$wgEnableUserEmail = true; # UPO

$wgEmergencyContact = "castic@fiu.edu";
$wgPasswordSender = "castic@fiu.edu";

$wgEnotifUserTalk = true; # UPO
$wgEnotifWatchlist = true; # UPO
$wgEmailAuthentication = true;

## Database settings
$wgDBtype = "mysql";
$wgDBserver = "localhost";
$wgDBname = "my_wiki";
$wgDBuser = "root";
$wgDBpassword = "Anaw322!";

# MySQL specific settings
$wgDBprefix = "";

# MySQL table options to use during installation or update
$wgDBTableOptions = "ENGINE=InnoDB, DEFAULT CHARSET=binary";

# Experimental charset support for MySQL 5.0.
$wgDBmysql5 = false;

## Shared memory settings
$wgMainCacheType = CACHE_NONE;
$wgMemCachedServers = array();

## To enable image uploads, make sure the 'images' directory
## is writable, then set this to true:
$wgEnableUploads = true;
#$wgUseImageMagick = true;
#$wgImageMagickConvertCommand = "/usr/bin/convert";

# InstantCommons allows wiki to use images from https://commons.wikimedia.org
$wgUseInstantCommons = false;

## If you use ImageMagick (or any other shell command) on a
## Linux server, this will need to be set to the name of an
## available UTF-8 locale
$wgShellLocale = "en_US.utf8";

## If you want to use image uploads under safe mode,
## create the directories images/archive, images/thumb and
## images/temp, and make them all writable. Then uncomment
## this, if it's not already uncommented:
#$wgHashedUploadDirectory = false;

## Set $wgCacheDirectory to a writable directory on the web server
## to make your wiki go slightly faster. The directory should not
## be publically accessible from the web.
#$wgCacheDirectory = "$IP/cache";

# Site language code, should be one of the list in ./languages/Names.php
$wgLanguageCode = "en";

$wgSecretKey = "7eeb7ff5a6a6e536e3ed9f8561dba3bd26146aea3c3bde4299ac965b72f414b6";

# Site upgrade key. Must be set to a string (default provided) to turn on the
# web installer while LocalSettings.php is in place
$wgUpgradeKey = "56d9fb458c613616";

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
$wgGroupPermissions['*']['embed_pdf'] = true;

## Default skin: you can change the default skin. Use the internal symbolic
## names, ie 'vector', 'monobook':
$wgDefaultSkin = "MonoBook";

# Enabled skins.
# The following skins were automatically enabled:
wfLoadSkin( 'CologneBlue' );
wfLoadSkin( 'Modern' );
wfLoadSkin( 'MonoBook' );
wfLoadSkin( 'Vector' );


# End of automatically generated settings.
# Add more configuration options below.

# LDAP
# Chaitanya (LDAP) ; Joseph (Configuration and Documentation)
# Please review set-up information at:
# https://www.mediawiki.org/wiki/Extension:LDAP_Authentication/Configuration_Options

# When using password authentication
require_once ("$IP/extensions/LdapAuthentication/LdapAuthentication.php");
$wgAuth = new LdapAuthenticationPlugin();
$wgShowExceptionDetails = true;

// The names of one or more domains you wish to use
// These names will be used for the other options, it is freely choosable and not dependent
// on your system. These names will show in the Login-Screen, so it is important that the user 
// understands the meaning.
// REQUIRED
// Default: none
$wgLDAPDomainNames = array(  'ad.fiu.edu');

// The fully qualified name of one or more servers per domain you wish to use. If you are
// going to use SSL or StartTLS, it is important that the server names provided here exactly
// match the name provided by the SSL certificate returned by the server; otherwise, you may
// have problems.
// REQUIRED
// Default: none
$wgLDAPServerNames = array(  'ad.fiu.edu' => 'ad.fiu.edu');

// User and password used for proxyagent access.
// Please use a user with limited access, NOT your directory manager!
$wgLDAPProxyAgent =  array(  'ad.fiu.edu' => 'cn=castic bind,OU=Service Accounts,DC=ad,DC=fiu,DC=edu');
$wgLDAPProxyAgentPassword = array(  'ad.fiu.edu' => 'c8n4ocy8n4tsCCF');

// Search filter.
// These options are only needed if you want to search for users to bind with them. In otherwords,
// if you cannot do direct binds based upon $wgLDAPSearchStrings, then you'll need these two options.
// If you need a proxyagent to search, remember to set $wgLDAPProxyAgent, and $wgLDAPProxyAgentPassword.
// Anonymous searching is supported. To do an anonymous search, use SearchAttibutes and don't set a Proxy
// agent for the domain required.
# $wgLDAPSearchStrings = array( "ad.fiu.edu" => "USER-NAME@fiu.edu" ); # Option 1
 $wgLDAPSearchAttributes = array(  'ad.fiu.edu' => 'sAMAccountName'); # Option 2

// Base DNs. Group and User base DNs will be used if available; if they are not defined, the search
// will default to $wgLDAPBaseDNs
$wgLDAPBaseDNs = array(  'ad.fiu.edu' => 'DC=ad,DC=fiu,DC=edu');

// Connect with a non-standard port
// Available in 1.2b+
// Default: 389 for clear/tls, 636 for ssl
$wgLDAPPort = array(  'ad.fiu.edu' => 636,);

// The type of encryption you would like to use when connecting to the LDAP server.
// Available options are 'tls', 'ssl', and 'clear'
// Default: tls
$wgLDAPEncryptionType = array(  'ad.fiu.edu' => 'ssl');

// Shortest password a user is allowed to login using. Notice that 1 is the minimum so that
// when using a local domain, local users cannot login as domain users (as domain user's
// passwords are not stored)
// Default: 0
$wgMinimalPasswordLength = 1;

// Unsure why this is in here pending more information ************************* UNDER REVIEW
$wgGroupPermissions['*']['autocreateaccount'] = true;

// Option for getting debug output from the plugin. 1-3 available. 1 will show
// non-sensitive info, 2 will show possibly sensitive user info, 3+ will show
// sensitive system info. Setting this on a live public site is probably a bad
// idea.
// Default: 0
$wgLDAPDebug = 3;
$wgDebugLogGroups['ldap'] = "/tmp/Wikimedialdap.log";

// The file system path of the folder where uploaded files will be stored. **** UNDER REVIEW
$wgUploadDirectory = "/var/www/html/mediawiki/images";

// Extensions let you customize how MediaWiki looks and works.
// While some extensions are maintained by MediaWiki's developers, others were 
// written by third-party developers. As a result, many have bugs
wfLoadExtension('EmbedVideo');

#$wgCookieSecure = false;

#$wgDebugLogFile = "/tmp/DBlog.log";

#$wgSessionCacheType = CACHE_DB;

#Session_save_path("tmp");

#Edit allowed file extensions for upload
$wgFileExtensions = array('png', 'gif', 'jif', 'jpg', 'jpeg', 'csv', 'pdf');

#Enable PDFEmbed extension
wfLoadExtension('PDFEmbed');