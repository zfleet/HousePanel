<?php
/*
 * House Panel application for SmartThings and Hubitat
 * author: Ken Washington  (c) 2017, 2018, 2019
 *
 * Must be paired with housepanel.groovy on the SmartThings or Hubitat side
 * HousePanel now obtains all auth information from the setup step upon first run
 *
 * Revision History
 */
$devhistory = "
 2.103      link tile query fix and media art fine tune
              - add default icons for water sensors and enable water actions
 2.100      User specific skin support
              - add custom tiles to user account
              - now save user account files in true json format
              - fix query to linked items
              - improve album art search and support tunein items
 2.092      Major update to documentation on housepanel.net
              - tweak info window when inspected near right edge
              - enable album art upon first change in song
 2.091      Fix LINK for custom tile actions; bugfix album art for grouped speakers
 2.090      Add curl call to gather usage statistics on central server
 2.087      Minor formatting cleanup in show info routine
 2.086      Update install script to support user skins and updates easily
             - remove hubtype from main array to save load time as it wasn't used
 2.085      Clean up handling of custom names
 2.084      Bugfix auth code to handle PHP installs without builtin functions
             - change minimum username length to 3 and look for admin name
             - drag drop name fix
 2.083      Properly load things and options for use in GUI and other bug fixes
 2.082      Fixed snarky bug in auth that reset hubpush ports and other things
             - did more cleanup and robusting of auth flow
 2.081      Security lock down - no longer accept blanks to make new bogus user
             - reauth request via api if not logged in will return to login page
             - default user name not set to admin rather set to blank now
             - reauth page still available if options file is missing
             - reset code will also launch to auth page all the time if enabled
 2.080      Remove blank customtile.css files to avoid overwriting user version
             - LINK customizer bugfix
             - minor bug fix of weather tile name
             - custom field image default CSS fix, misc code cleanup
             - show status when click on tiles that typically have no actions
             - speed up initial load after refresh page
 2.078      Bugfixes to 2.076 and 2.077 - skin missing from tileeditor
             - fix long standing bug of duplicate Node.js clients
             - properly close sockets upon disconnect and remove dups
 2.077      Remove http requirement for URL entries to enable intent links
 2.076      Various password updates and fixes
             - add password support for tiles using the custom field feature
             - change main password from simple hash to strong algorithm
             - fix bug in the action buttons and links in clock tiles
             - remove reserved fields from hub push results
             - enabled return and cancel keys in popup dialog boxes
 2.075      js Time bugfixes
             - finish implementing the sorting feature for user fields
             - speedup by avoiding reading options on each tile make
 2.073      Major speedup in Tile Customizer (customize.js)
             - prep work for sorting feature - not yet implemented
             - minor bug fixes
 2.072      Honor time format in js updates every second
             - merge in README clean up pull request
             - enable multiple things in a query request
             - minor bugfix for auto of non-groovy tiles
             - update hpapi.py demo to work with current version
 2.071      Bypass cache for updated frames and other special tiles
             - minor bug fix to tile editor for tile name setting
             - fix bug where special tile count was not being saved
             - fix bug that screwed up max number of custom tiles
             - fix bug for page changes not sticking
 2.070      Bugfixes to beta 2.065, code cleanup, ignore DeviceWatch-Enroll
             - includes error checking for bogus hub calls
             - also fixed hidden check in tile editor for fields that match type
             - handled obscure cases for refreshing special tiles properly
 2.065      Migrate image and blank tiles over to php server side
             - provide user way to select city in AccuWeather
             - but user must find the Location Code first
 2.064      Fix music control siblings and improve Album Art reliability
 2.063      Implement music icons for native Echo Speaks and Generic music
 2.062      Retain edit and custom names upon refresh; minor bug fixes
 2.061      Custom frame and video tile name bugfix
 2.060      Auto detect and grab artist, album title, and album art image
 2.057      Minor cleanup including proper detection of hidden status in editor
 2.056      Groovy file update only to specify event date format
 2.055      Update version number in Groovy file and more error checking
 2.054      Clean up groovy file; add direct mode action buttons
 2.053      Misc bug fixes: LINK on/off; tile editor tweaks
            - new feature in Tile Editor to pick inline/blcok & absolute/relative
 2.052      Really fixed clobber this time (in hubpush). Added portrait CSS support
 2.051      Another run at fixing name clobber; update modern skin for flash
 2.050      Fix cloberred custom names; fix Hubitat event reporting; add timezone
 2.049      Time zone fix for real time javascript digital clock
            - add version number to main screen
 2.048      Visual cue for clicking on any tile for 3/4 of a second
 2.047      Clean up SHM and HSM to deliver similar display fields and bug fixes
 2.046      Avoid fatal error if prefix not given, fix Routine bug in groovy, etc
 2.045      Merge groovy files into one with conditional hub detector
 2.042      Minor tweak to CSS default for showing history only on some things
            - add dev history to show info and auto create version info from this
            - add on and off toggle icons from modern to the default skin
            - doc images update
 2.040      Four event fields added to most tiles for reporting (ST only for now)
 2.031      Use custom name for head title and name field
 2.030      Fix HSM and SHM bugs and piston styling for modern skin
 2.020      Macro rule graduate from beta to tested feature - still no gui
 2.010      Grid snap feature and fix catalog for modern skin
 2.000      Release of rule feature as non beta. Fixed level and other tweaks
 1.998      Macro rules implemented as beta feature. No easy GUI provided yet
 1.997      Improve crude rule feature to only do push from last client
            minor performance and aesthetic improvements in push Node code
 1.996      Fix hubId bug in push file
            implement crude rule capability triggered by custom tile use
            - if a motion sensor is added to a light it will trigger it on
            - if a contact is added to a light, open will turn on, close off
            - if another switch is added to a light, it will trigger it too
 1.995      Update install script to properly implement push service setup
            remove .service file because install script makes this
            clean up hubid usage to use the real id for each hub consistently
            refresh screen automatically after user reorders tiles
 1.992      Bugfix for swapping skins to enable new skin's customtiles
            this also changes the custom tiles comments to avoid dups
            minor tweaks to the modern skin and controller look
 1.991      New modern skin and include door in classes from tile names
 1.990      Final cleanup before public release of hubpush bugfixes
            move housepanel-push to subfolder beneath main files
            update housepanel-push to include more robust error checking
            Fixed bug in housepanel-push service causing it to crash
            Corrected and cleaned up install.sh script to work with hubpush
 1.989      Continued bug fixing hubpush and auth flow stuff
 1.988      Major bugfix to auth flow for new users without a cfg file
 1.987      Bugfix for broken hubpush after implementing hubId indexing
            publish updated housepanel-push.js Node.js program
 1.986      Minor fix to use proper hub name and type in info tables
 1.985      Finish implementing hub removal feature
            - added messages to inform user during long hub processes in auth
            - position delete confirm box near the tile
            - minor bug fixes
 1.983      2019-02-14
              bugfix in auth page where default hub was messed up
 1.982      2019-02-14
              change hubnum to use hubId so we can remove hubs without damage
 1.981      Upgrade to install.sh script and enable hub removal
 1.980      Update tiles using direct push from hub using Node.js middleman
 1.972      Add ability to tailor fast polling to include any tile
            by adding a refresh user field with name fast, slow, or never
            - also added built-in second refresh for clock tiles
            - two new floor lamp icons added to main skin
            - fix bug so that hidden items in editor now indicate hidden initially
 1.971      Fix clicking on linked tiles so it updates the linked to tile
            - also fixes an obscure bug with user linked query tiles
 1.970      Tidy up customizer dialog to give existing info
 1.966      Enable duplicate LINK items and add power meter things
 1.965      Restored weather icons using new mapping info
 1.964      Updated documentation and tweak CSS for Edge browser
 1.963      Improved user guidance for Hubitat installations
 1.962      Bring Hubitat and SmartThigns groovy files into sync with each other
            and in the process found a few minor bugs and fixed them
 1.961      Important bug fixes to groovy code for switches, locks, valves
 1.960      New username feature and change how auth dialog box works
            - fixed error in door controller
 1.953      Fix room delete bug - thanks to @hefman for flagging this
 1.952      Finalize GUI for tile customization (wicked cool)
            - fix bug in Music player for controls
            - revert to old light treatment in Hubitat
 1.951      Bug fixes while testing major 1.950 update
            - fix bug that made kiosk mode setting not work in the Options page
            - fix bug that broke skin media in tile edit while in kiosk mode
            - use the user config date formats before setting up clock in a refresh
 1.950      Major new update with general customizations for any tile
            - this is a major new feature that gives any tile the ability to
              add any element from any other tile or any user provided text
              so basically all tiles now behave like custom tiles in addition
              to their native behavior. You can even replace existing elements
              For example, the analog clock skin can be changed now by user
              User provided URL links and web service POST calls also supported
              Any URL link provided when clicked will open in a new tab/window
            - fix weird bug in processing names for class types
            - added ability to customize time formats leveraging custom feature
            - now refresh frames so their content stays current
            - include blanks, clocks, and custom tiles in fast non-hub refresh
            - enable frame html file names to be specified as name in TileEdit
            - lots of other cleanups and bug fixes
 1.941      Added config tile for performing various options from a tile
            - also fixed a bug in cache file reload for customtiles
 1.940      Fix bug in Tile Editor for rotating icon setting and slower timers
 1.930      Fix thermostat and video tag obscure bugs and more
            - chnage video to inherit size
            - change tile editor to append instead of prepend to avoid overlaps
            - increase default polling speed
            - first release of install script install.sh
 1.928      Disallow hidden whole tiles and code cleanup
 1.927      Added flourescent graphic to default skin, fix edit of active tile
 1.926      Doc update to describe video tiles and minor tweaks, added help button
 1.925      Various patches and hub tweaks
            - Hub name retrieval from hub
            - Show user auth activation data
            - Hack to address Hubitat bug for Zwave generic dimmers
            - Added border styling to TileEditor
 1.924      Update custom tile status to match linked tiles
            Added option to select number of custom tiles to use (beta)
 1.923      TileEditor updates
            - new option to align icons left, center or right
            - added images of Sonos speakers to media library
            - fixed bug where header invert option was always clicked
            - renamed Text Width/Height to Item Width/Height
 1.922      Updated default skin to make custom reflect originals in more places
 1.921      Hybrid custom tile support using hmoptions user provided input
 1.920      CSS cleanup and multiple new features
            - enable skin editing on the main page
            - connect customtiles to each skin to each one has its own
              this means all customizations are saved in the skin directory too
            - migrated fixed portions of skin to tileedit.css
            - fix plain skin to use as skin swapping demo
            - various bug fixes and performance improvements
 1.910      Clean up CSS files to prepare for new skin creation
 1.900      Refresh when done auth and update documentation to ccurrent version
 1.809      Fix disappearing things in Hubitat bug - really this time...
 1.808      Clean up page tile editing and thermostat bug fix
 1.807      Fix brain fart mistake with 1.806 update
 1.806      Multi-tile editing and major upgrade to page editing
 1.805      Updates to tile editor and change outside image; other bug fixes
 1.804      Fix invert icon in TileEditor, update plain skin to work
 1.803      Fix http missing bug on hubHost, add custom POST, and other cleanup
 1.802      Password option implemented - leave blank to bypass
 1.801      Squashed a bug when tile instead of id was used to invoke the API
 1.80       Merged multihub with master that included multi-tile api calls
 1.793      Cleaned up auth page GUI, bug fixes, added hub num & type to tiles 
 1.792      Updated but still beta update to multiple ST and HE hub support
 1.791      Multiple ST hub support and Analog Clock
 1.79       More bug fixes
            - fix icon setting on some servers by removing backslashes
            - added separate option for timers and action disable
 1.78       Activate multiple things for API calls using comma separated lists
            to use this you mugit stst have useajax=doaction or useajax=dohubitat
            and list all the things to control in the API call with commas separating
 1.77       More bug fixes
             - fix accidental delete of icons in hubitat version
             - incorporate initial width and height values in tile editor
 1.76       Misc cleanup for first production release
             - fixed piston graphic in tileeditor
             - fix music tile status to include stop state in tileeditor
             - added ?v=hash to js and css files to force reload upon change
             - removed old comments and dead code
 
 1.75       Page name editing, addition, and removal function and reorder bug fixes
 1.74       Add 8 custom tiles, zindex bugfix, and more tile editor updates
 1.73       Updated tile editor to include whole tile backgrounds, custom names, and more
 1.72       Timezone bug fix and merge into master
 1.71       Bug fixes and draft page edit commented out until fixed
 1.7        New authentication approach for easier setup and major code cleanup
 1.622      Updated info dump to include json dump of variables
 1.621      ***IMPT**bugfix to prior 1.62 update resolving corrupt config files
 1.62       New ability to use only a Hubitat hubg
 1.61       Bugfixes to TileEditor
 1.60       Major rewrite of TileEditor
 1.53       Drag and drop tile addition and removal and bug fixes
 1.52       Bugfix for disappearing rooms, add Cancel in options, SmartHomeMonitor add
 1.51       Integrate skin-material from @vervallsweg to v1.0.0 to work with sliders
 1.50       Enable Hubitat devices when on same local network as HP
 1.49       sliderhue branch to implement slider and draft color picker
 1.48       Integrate @nitwitgit (Nick) TileEdit V3.2
 1.47       Integrate Nick's color picker and custom dialog
 1.46       Free form drag and drop of tiles
 1.45       Merge in custom tile editing from Nick ngredient-master branch
 1.44       Tab row hide/show capabilty in kiosk and regular modes
            Added 4 generally customizable tiles to each page for styling
            Fix 1 for bugs in hue lights based on testing thanks to @cwwilson08
 1.43       Added colorTemperature, hue, and saturation support - not fully tested
            Fixed bug in thermostat that caused fan and mode to fail
            Squashed more bugs
 1.42       Clean up CSS file to show presence and other things correctly
            Change blank and image logic to read from Groovy code
            Keep session updated for similar things when they change
              -- this was done in the js file by calling refreshTile
            Fix default size for switch tiles with power meter and level
              -- by default will be larger but power can be disabled in CSS
 1.41       Added filters on the Options page
            Numerous bug fixes including default Kiosk set to false
            Automatically add newly identified things to rooms per base logic
            Fix tablet alignment of room tabs
            Add hack to force background to show on near empty pages
 1.4        Official merge with Open-Dash
            Misc bug fixes in CSS and javascript files
            Added kiosk mode flag to options file for hiding options button
 1.32       Added routines capabilities and cleaned up default icons
 1.31       Minor bug fixes - fixed switchlevel to include switch class
 1.3        Intelligent class filters and force feature
            user can add any class to a thing using <<custom>>
            or <<!custom>> the only difference being ! signals
            to avoid putting custom in the name of the tile
            Note - it will still look really ugly in the ST app
            Also adds first three words of the thing name to class
            this is the preferred customizing approach
 1.2        Cleaned up the Groovy file and streamlined a few things
            Added smoke, illuminance, and doors (for Garages)
            Reorganized categories to be more logical when selecting things
 1.1 beta   Added cool piston graph for Webcore tiles 
            Added png icons for browser and Apple products
            Show all fields supported - some hidden via CSS
            Battery display on battery powered sensors
            Support Valves - only tested with Rachio sprinklers
            Weather tile changed to show actual and feels like side by side
            Power and Energy show up now in metered plugs
            Fix name of web page in title
            Changed backgrounds to jpg to make them smaller and load faster
            Motion sensor with temperature readings now show temperature too
 0.8 beta   Many fixes based on alpha user feedback - first beta release
            Includes webCoRE integration, Modes, and Weather tile reformatting
            Also includes a large time tile in the default skin file
            Squashed a few bugs including a typo in file usage
 0.7-alpha  Enable a skinning feature by moving all CSS and graphics into a 
            directory. Added parameter for API calls to support EU
 0.6-alpha  Minor tweaks to above - this is the actual first public version
 0.5-alpha  First public test version
 0.2        Cleanup including fixing unsafe GET and POST calls
            Removed history call and moved to javascript side
            put reading and writing of options into function calls
            replaced main page bracket from table to div
 0.1        Implement new architecture for files to support sortable jQuery
 0.0        Initial release
";
ini_set('max_execution_time', 300);
ini_set('max_input_vars', 20);

// grab the version number from the latest history entry
$version = trim(substr($devhistory,1,10));
define('HPVERSION', $version);
define('APPNAME', 'HousePanel V' . HPVERSION);
define('CRYPTSALT','HP$by%KW');

// developer debug options
// options 2 and 4 will stop the flow and must be reset to continue normal operation
// option3 can stay on and will just print lots of stuff on each page
define('DEBUG',  false); // turns on debugs 3 and 5
define('DEBUG2', false); // authentication flow debug and stop
define('DEBUG3', false); // room display debug - show all things
define('DEBUG4', false); // options processing debug and stop
define('DEBUG5', false); // debug print included in output table
define('DEBUG6', false); // show devices and stop
define('DEBUG7', false); // show what getallthings returns and stop
define('DEBUG8', false); // debug custom development - add info to doaction return

define("DONATE", true);  // turn on or off the donate button

// turns on ?code=reset to invoke api - this is not secure but it will
// allow you to go to the reauth page without manually deleting cookies
define('ENABLERESET', true);

// set error reporting to just show fatal errors
error_reporting(E_ERROR);

// header and footer
function htmlHeader($skin="skin-housepanel") {
    $tc = '<!DOCTYPE html>';
    $tc.= '<html><head><title>House Panel</title>';
    $tc.= '<meta content="text/html; charset=iso-8859-1" http-equiv="Content-Type">';
    
    // specify icon and color for windows machines
    $tc.= '<meta name="msapplication-TileColor" content="#2b5797">';
    $tc.= '<meta name="msapplication-TileImage" content="media/mstile-144x144.png">';
    
    // specify icons for browsers and apple
    $tc.= '<link rel="icon" type="image/png" href="media/favicon-16x16.png" sizes="16x16"> ';
    $tc.= '<link rel="icon" type="image/png" href="media/favicon-32x32.png" sizes="32x32"> ';
    $tc.= '<link rel="icon" type="image/png" href="media/favicon-96x96.png" sizes="96x96"> ';
    $tc.= '<link rel="apple-touch-icon" href="media/apple-touch-icon.png">';
    $tc.= '<link rel="shortcut icon" href="media/favicon.ico">';
    
    // load jQuery and themes
    $tc.= '<link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">';
    $tc.= '<script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha256-ZosEbRLbNQzLpnKIkEdrPv7lOy9C27hHQ+Xp8a4MxAQ=" crossorigin="anonymous"></script>';
    $tc.= '<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>';

    // md5 function
    $tc.= '<script src="md5.min.js"></script>';
    
    // include hack from touchpunch.furf.com to enable touch punch through for tablets
    $tc.= '<script src="jquery.ui.touch-punch.min.js"></script>';
    
    // minicolors library
    $tc.= '<script src="jquery.minicolors.min.js"></script>';
    $tc.= '<link rel="stylesheet" href="jquery.minicolors.css">';

    // analog clock support
    $tc.= '<!--[if IE]><script type="text/javascript" src="excanvas.js"></script><![endif]-->';
    $tc.= '<script type="text/javascript" src="coolclock.js"></script>';
    
    // load main script file
    $jshash = md5_file("housepanel.js");
    $tc.= '<script type="text/javascript" src="housepanel.js?v=' . $jshash . '"></script>';  
    
    // check for valid skin folder
    if (!$skin || !file_exists("$skin/housepanel.css")) {
        $skin = "skin-housepanel";
    }
    
    // if this theme has a helper js then load it
    if ( file_exists( $skin . "/housepanel-theme.js") ) {
        $helperhash = md5_file($skin . "/housepanel-theme.js");
        $tc.= "<script type=\"text/javascript\" src=\"$skin/housepanel-theme.js?v=" . $helperhash . "\"></script>";
    }
	
    // load tile editor fixed css file with cutomization helpers
    $tejshash = md5_file("tileeditor.js");
    $tecsshash = md5_file("tileeditor.css");
    $tc.= "<script type=\"text/javascript\" src=\"tileeditor.js?v=" . $tejshash . "\"></script>";
    $tc.= "<link id=\"tileeditor\" rel=\"stylesheet\" type=\"text/css\" href=\"tileeditor.css?v=" . $tecsshash . "\">";	

    // load tile customizer
    $cm_hash = md5_file("customize.js");
    $tc.= "<script type=\"text/javascript\" src=\"customize.js?v=" . $cm_hash . "\"></script>";

    // load the main css file
    $csshash = md5_file("$skin/housepanel.css");
    $tc.= "<link rel=\"stylesheet\" type=\"text/css\" href=\"$skin/housepanel.css?v=" . $csshash . "\">";

    // load the custom tile sheet if it exists
    // replaced logic to make customizations skin specific
    if (file_exists("$skin/customtiles.css")) {
        $customhash = md5_file("$skin/customtiles.css");
        $tc.= "<link id=\"customtiles\" rel=\"stylesheet\" type=\"text/css\" href=\"$skin/customtiles.css?v=". $customhash ."\">";
    }
    
    // begin creating the main page
    $tc.= '</head><body>';
    $tc.= '<div class="maintable">';
    return $tc;
}

function htmlFooter() {
    $tc = "";
    $tc.= "</div>";
    $tc.= "</body></html>";
    return $tc;
}

// helper function to put a hidden field inside a form
function hidden($pname, $pvalue, $id = false) {
    $inpstr = "<input type='hidden' name='$pname'  value='$pvalue'";
    if ($id) { $inpstr .= " id='$id'"; }
    $inpstr .= " />";
    return $inpstr;
}

function putdiv($value, $class) {
    $tc = "<div class=\"" . $class . "\">" . $value . "</div>";
    return $tc;
}

// function to make a curl call
function curl_call($host, $headertype="", $nvpstr="", $calltype="GET", $webcall=false)
{
    //setting the curl parameters for GET to tack onto host
    if ( $calltype==="GET" && $nvpstr) {
        $host = $host . "?$nvpstr";
        $nvpstr = "";
    }

    // tell curl where to go
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $host);
    
    // add header setting if provided
    if ($headertype) {
    	curl_setopt($ch, CURLOPT_HTTPHEADER, $headertype);
    }

    //turning off peer verification
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
    curl_setopt($ch, CURLOPT_VERBOSE, TRUE);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
    
    if ($calltype==="POST") {
    	curl_setopt($ch, CURLOPT_POST, TRUE);
    	curl_setopt($ch, CURLOPT_PUT, FALSE);
    } else if ($calltype==="PUT") {
    	curl_setopt($ch, CURLOPT_POST, FALSE);
    	curl_setopt($ch, CURLOPT_PUT, TRUE);
    } else {
    	curl_setopt($ch, CURLOPT_POST, FALSE);
    	curl_setopt($ch, CURLOPT_PUT, FALSE);
        if ( $calltype!=="GET" ) {
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $calltype);           
        }
    }
    if ($nvpstr) {
        curl_setopt($ch, CURLOPT_POSTFIELDS, $nvpstr);
    }

    //getting response from server
    try {
        $response = curl_exec($ch);
    } catch (Exception $e) {
        $response = false;
    }
    curl_close($ch);
    
    // handle errors
    if ($response===false) {
        $nvpResArray = false;
    } else {
        // convert json returned by Groovy into associative array
        if ( $webcall ) {
            $nvpResArray = $response;
        } else {
            $nvpResArray = json_decode($response, TRUE);
        }
    }
    return $nvpResArray;
}

function getAlbumArt($artist, $album) {

    $query = "https://www.google.com/search";
    $nvpstr = "as_st=y&tbm=isch&as_epq=" . urlencode("$album by $artist");
    $tc = curl_call($query . "?$nvpstr", false, "", "GET", true);

    // get the location of the first image returned by Google
    $ipos = strpos($tc, "table class=\"images_table\"");
    if ( $ipos ) {
        $imgpos = strpos($tc, "<img", $ipos);
        $imgend = strpos($tc, ">", $imgpos);
        $image = substr($tc, $imgpos, $imgend - $imgpos + 1);
    } else {
        $image = "";
    }
    return $image;
}

// return all devices in one call
// TODO: Implement logic to read Wink, OpenHab, and Vera hubs
function getDevices($allthings, $options, $hubnum, $hubType, $hubAccess, $hubEndpt, $clientId, $clientSecret) {

    // we now always get all things at once
    $specialtiles = getSpecials();
    $host = $hubEndpt . "/getallthings";
    $headertype = array("Authorization: Bearer " . $hubAccess);
    $nvpreq = "client_secret=" . urlencode($clientSecret) . "&scope=app&client_id=" . urlencode($clientId);
    $response = curl_call($host, $headertype, $nvpreq, "POST");

    if (DEBUG6) {
        echo "<br>Response<br><pre>";
        print_r($response);
        echo "</pre>";
        exit(0);
    }    

    // configure returned array with the "id"
    if ($response && is_array($response) && count($response)) {
        foreach ($response as $k => $content) {
            $thetype = $content["type"];
            $thevalue = $content["value"];
            $id = $content["id"];
            $thename = $content["name"];
            
            // ** IMPT ** Users can hack the code here and add other tiles to fast poll
            // like what is shown in comments below will fast poll Office Light
            // be careful with this feature because polling is cloud intensive
            // so you should only activate a small number of devices
            // this hack is obsolete because any tile can change refresh 
            // to fast by changing the text of refresh in the customizer
            // but this is still available
            $reftype = "normal";
//            if ( $thename==="Office Light" ) {
//                $reftype = "fast";
//            }
            
            // make a unique index for this thing based on id and type
            // new to this array is the hub number and hub type
            // we also skip making any legacy type special tiles
            if ( !array_key_exists($thetype, $specialtiles) ) {
                $idx = $thetype . "|" . $id;
                $allthings[$idx] = array("id" => $id, "name" => $thename, 
                        "hubnum" => $hubnum,
                        "type" => $thetype, 
                        "refresh"=>$reftype, "value" => $thevalue );
            }
        }
    }
    return $allthings;
}

// new function to get name from hub
function getName($hubAccess, $hubEndpt, $clientId, $clientSecret) {
    $host = $hubEndpt . "/gethubinfo";
    $headertype = array("Authorization: Bearer " . $hubAccess);
    $nvpreq = "client_secret=" . urlencode($clientSecret) . "&scope=app&client_id=" . urlencode($clientId);
    $response = curl_call($host, $headertype, $nvpreq, "POST");
    return array( $response["sitename"], $response["hubId"] );
}

function fixHost($stweb) {
    if ( substr(strtolower($stweb),0,4) !== "http" ) {
        if ( preg_match("/{1,3}\d\.{1,3}\d\.{1,3}\d\.{1,3}\d/", $stweb) ) {
            $stweb = is_ssl() . $stweb;
        } else {
            $stweb = "https://" . $stweb;
        }
    }
    return $stweb;
}

// function to get authorization code
// this does a redirect back here with results
// this is the first step of the oauth flow
// the new logic works for both SmartThings and Hubitat
// TODO: Implement logic to obtain Wink and Vera auth codes
function getAuthCode($returl, $stweb, $clientId, $hubType) {
    $nvpreq="response_type=code&client_id=" . urlencode($clientId) . "&scope=app&redirect_uri=" . urlencode($returl);
    $location = $stweb . "/oauth/authorize?" . $nvpreq;
    header("Location: $location");
}

// return access token from oauth flow
// this should work for both SmartThings and HousePanel
// TODO: Implement logic to read Wink and Vera hub access tokens
function getAccessToken($returl, $code, $stweb, $clientId, $clientSecret, $hubType) {

    $host = $stweb . "/oauth/token";
    $ctype = "application/x-www-form-urlencoded";
    $headertype = array('Content-Type: ' . $ctype);
    
    $nvpreq = "grant_type=authorization_code&code=" . urlencode($code) . "&client_id=" . urlencode($clientId) .
                         "&client_secret=" . urlencode($clientSecret) . "&redirect_uri=" . $returl;
    
    $response = curl_call($host, $headertype, $nvpreq, "POST");

    // save the access token    
    if ($response) {
        $token = $response["access_token"];
    } else {
        $token = false;
    }

    return $token;
    
}

// changed this routine to only get endpoint
// since we now get the location name separately
// this only works if the clientid within theendpoint matches our auth version
// TODO: Implement logic to read Wink and Vera hub end points
function getEndpoint($access_token, $stweb, $clientId, $hubType) {

    if ( $hubType==="SmartThings" ) {
        $host = $stweb . "/api/smartapps/endpoints";
    } else if ( $hubType ==="Hubitat" ) {
        $host = $stweb . "/apps/api/endpoints";
    } else {
        $host = $stweb . "/api/smartapps/endpoints";
    }
    $headertype = array("Authorization: Bearer " . $access_token);
    $response = curl_call($host, $headertype);

    $endpt = false;
    if ($response) {
        if ( is_array($response) ) {
	    $endclientid = $response[0]["oauthClient"]["clientId"];
	    if ($endclientid === $clientId) {
                $endpt = $response[0]["uri"];
	    }
        } else {
	    $endclientid = $response["oauthClient"]["clientId"];
	    if ($endclientid === $clientId) {
                $endpt = $response["uri"];
	    }
        }
    }
    return $endpt;
}

function tsk($timezone, $skin, $kiosk, $uname, $port, $webSocketServerPort, $fast_timer, $slow_timer) {

    $tc= "";
    $tc.= "<div><label class=\"startupinp\">Timezone: </label>";
    $tc.= "<input id=\"newtimezone\" class=\"startupinp\" name=\"timezone\" width=\"80\" type=\"text\" value=\"$timezone\"/></div>"; 

    $tc.= "<div><label class=\"startupinp\">Skin Directory: </label>";
    $tc.= "<input id=\"newskindir\" class=\"startupinp\" name=\"skindir\" width=\"80\" type=\"text\" value=\"$skin\"/></div>"; 

    $tc.= "<div><label class=\"startupinp\">Listen On Port: </label>";
    $tc.= "<input id=\"newport\" class=\"startupinp\" name=\"port\" width=\"20\" type=\"text\" value=\"$port\"/></div>"; 

    $tc.= "<div><label class=\"startupinp\">WebSocket Port: </label>";
    $tc.= "<input id=\"newsocketport\" class=\"startupinp\" name=\"webSocketServerPort\" width=\"20\" type=\"text\" value=\"$webSocketServerPort\"/></div>"; 

    $tc.= "<div><label class=\"startupinp\">Fast Timer: </label>";
    $tc.= "<input id=\"newfast_timer\" class=\"startupinp\" name=\"fast_timer\" width=\"20\" type=\"text\" value=\"$fast_timer\"/></div>"; 

    $tc.= "<div><label class=\"startupinp\">Slow Timer: </label>";
    $tc.= "<input id=\"newslow_timer\" class=\"startupinp\" name=\"slow_timer\" width=\"20\" type=\"text\" value=\"$slow_timer\"/></div>"; 

    $tc.= "<div><label for=\"uname\" class=\"startupinp\">Username: </label>";
    $tc.= "<input id=\"uname\" class=\"startupinp\" name=\"uname\" width=\"20\" type=\"text\" value=\"$uname\"/></div>"; 

    $tc.= "<div><span class='typeopt'>(blank to keep prior)<br/></span><label for=\"pword\" class=\"startupinp\">Set New Password: </label>";
    $tc.= "<input id=\"pword\" class=\"startupinp\" name=\"pword\" width=\"80\" type=\"password\" value=\"\"/></div>"; 

    $tc.= hidden("use_kiosk", $kiosk);
    return $tc;
    
}

function getLoginPage($returnURL, $uname) {
    $tc = "";
    $tc.= "<h2>" . APPNAME . "</h2>";
    $tc.= "<br /><br />";
    $tc.= "<form name=\"login\" action=\"$returnURL\"  method=\"POST\">";
    $tc.= hidden("returnURL", $returnURL);
    $tc.= hidden("pagename", "login");
    $tc.= hidden("useajax", "dologin");
    $tc.= hidden("id", "none");
    $tc.= hidden("type", "none");
    $tc.= "<div>";
    $tc.= "<label for=\"uname\" class=\"startupinp\">Username: </label>";
    $tc.= "<input id=\"uname\" name=\"uname\" width=\"20\" type=\"text\" value=\"$uname\"/>"; 
    $tc.= "<br /><br />";
    $tc.= "<label for=\"pword\" class=\"startupinp\">Password: </label>";
    $tc.= "<input id=\"pword\" name=\"pword\" width=\"40\" type=\"password\" value=\"\"/>"; 
    $tc.= "<br /><br />";
    $tc.= "<input class=\"submitbutton\" value=\"Login\" name=\"submit\" type=\"submit\" />";
    $tc.= "</div>";
    $tc.= "</form>";
    return $tc;
}

// screen that greets user and asks for authentication
function getAuthPage($returl, $hpcode, $hubset=null, $newthings=null) {
    $tc = "";
    $tc.= "<h2>" . APPNAME . "</h2>";

    // provide welcome page with instructions for what to do
    // this will show only if the user hasn't set up HP
    // or if a reauth is requested or when converting old passwords
    $tc.= "<div class=\"greeting\">";

    $tc.="<p>You are seeing this because you either requested a re-authentication " .
            "or you have not yet authorized a valid SmartThings or Hubitat hub for" .
            "HousePanel to access your smart home devices. With HousePanel " .
            "you can use any number and combination of hub types at the same time. " . 
            "To configure HousePanel you should have the following info about at least one hub: " .
            "API URL, Client ID, and Client Secret. A unique Hub ID must be specified for SmartThings hubs. " .
            "A unique Hub ID will be automatically assigned for Hubitat hubs.</p><br />";
    
    $tc.= "<p><strong>*** IMPORTANT ***</strong><br /> This information is secret and it will be stored " .
            "on your server in a configuration file called <i>hmoptions.cfg</i> " . 
            "This is why HousePanel should <strong>*** NOT ***</strong> be hosted on a public-facing website " .
            "unless the site is secured via some means such as password protection. <strong>A locally hosted " . 
            "website on a Raspberry Pi is the strongly preferred option</strong>.</p>";
    $tc.= "</div>";

    if ( defined("DONATE") && DONATE===true ) {
        $tc.= '<br /><h4>Donations appreciated for HousePanel support and continued improvement, but none required to proceed.</h4>
            <br /><div><form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_blank">
            <input type="hidden" name="cmd" value="_s-xclick">
            <input type="hidden" name="hosted_button_id" value="XS7MHW7XPYJA4">
            <input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_donateCC_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
            <img alt="" border="0" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" width="1" height="1">
            </form></div>';
    }
    
    // get the current settings from options file
    // we no longer use clientinfo but it is supported for backward compatibility purposes
    // but only if the hmoptions file is not current
    $options = readOptions();
    $rewrite = false;
    $legacy = false;
    
    // first check for existence of options file
    if ( ! $options ) {
        $options = array();
        $rewrite = true;
    }
    
    // check for some type of config setup
    if ( array_key_exists("config", $options) ) {
        $configoptions = $options["config"];
        if ( array_key_exists("timezone", $configoptions) ) {
            $timezone = $configoptions["timezone"];
        } else {
            $timezone = "America/Detroit";
            $rewrite = true;
        }
        
        // fix any legacy settings to put skin in the config section
        if ( array_key_exists("skin", $options) ) {
            $skin = $options["skin"];
            $configoptions["skin"] = $skin;
            $rewrite = true;
            unset($options["skin"]);
        } else if ( array_key_exists("skin", $configoptions) ) {
            $skin = $configoptions["skin"];
            if ( $skin==="" ) {
                $skin = "skin-housepanel";
            }
        } else {
            $skin = "skin-housepanel";
            $rewrite = true;
        }
        if (array_key_exists("port", $configoptions)) {
            $port = $configoptions["port"];
        } else {
            $port = "19234";
            $rewrite = true;
        }
        if (array_key_exists("webSocketServerPort", $configoptions)) {
            $webSocketServerPort = $configoptions["webSocketServerPort"];
        } else {
            $webSocketServerPort = "1337";
            $rewrite = true;
        }
        if (array_key_exists("fast_timer", $configoptions)) {
            $fast_timer = $configoptions["fast_timer"];
        } else {
            $fast_timer = 30000;
            $rewrite = true;
        }
        if (array_key_exists("slow_timer", $configoptions)) {
            $slow_timer = $configoptions["slow_timer"];
        } else {
            $slow_timer = 3600000;
            $rewrite = true;
        }
        
        // fix any legacy settings to put kiosk in the config section
        if ( array_key_exists("kiosk", $options) ) {
            $kiosk = strval($options["kiosk"]);
            $rewrite = true;
            unset($options["kiosk"]);
        } else if ( array_key_exists("kiosk", $configoptions) ) {
            $kiosk = strval($configoptions["kiosk"]);
        } else {
            $kiosk = false;
            $rewrite = true;
        }
        
        if ( $kiosk===true || $kiosk === "true" || $kiosk==="yes" || $kiosk==="on" || $kiosk==="1" ) {
            $kiosk = true;
        } else {
            $kiosk = false;
        }

        // get the password information and if needed
        // convert to new array format to support multiple users
        if ( array_key_exists("pword", $configoptions) ) {
            $pwords = $configoptions["pword"];
            
            // handle current format with multiple passwords
            if ( is_array($pwords) ) {
                
                // ensure we have latest format for pwords
                $opwords = $pwords;
                foreach ($opwords as $un => $pw) {
                    if ( !is_array($pw) ) {
                        $pwords[$un] = array($pw, $skin);
                        $rewrite = true;
                    }
                }
                
                // get the current user name and password
                if ( isset($_COOKIE["uname"]) ) {
                    $uname = $_COOKIE["uname"];
                } else {
                    $uname = "";
                }

                // if user doesn't exist, add user with blank password
                if ( !array_key_exists($uname, $pwords) ) {
                    $pword = "";
                    $pwords[$uname] = array("", $skin);
                    $rewrite = true;
                } else {
                    $pword = $pwords[$uname][0];
                    $skin = $pwords[$uname][1];
                }

            // if only one password then convert to multiple format
            // but no longer give default admin user access
            } else {
                $uname = "";
                $pwords = array();
                $rewrite = true;
            }
            
        // this branch handles really old files without any pasword section
        } else {
            $uname = "";
            $pwords = array();
            $rewrite = true;
        }
        
        // handle legacy hmoptions files that have the old setup without arrays
        // this will only work once - the first time used
        if ( array_key_exists("use_st", $configoptions) &&
             array_key_exists("st_web", $configoptions) &&
             array_key_exists("client_id", $configoptions) &&
             array_key_exists("client_secret", $configoptions) ) 
        { 
            $hubs = array();
            $legacy = true;
            $rewrite = true;
            
            // check for a smartthings hub
            if ( $configoptions["use_st"] ) {
                if ( array_key_exists("user_access", $configoptions) &&
                     array_key_exists("user_endpt", $configoptions) ) {
                    $userAccess = $configoptions["user_access"];
                    $userEndpt = $configoptions["user_endpt"];
                    $hubAccess = $userAccess;
                    $hubEndpt = $userEndpt;
                    $hubId = "unknown-st";
                } else {
                    $userAccess = "";
                    $userEndpt = "";
                    $hubAccess = "";
                    $hubEndpt = "";
                    $hubId = "unknown-st";
                }
                if ( array_key_exists("user_sitename", $configoptions) ) {
                    $hubName = $configoptions["user_sitename"];
                } else {
                    $hubName = "SmartThings Home";
                }
                $sthub = array("hubType"=>"SmartThings", 
                    "hubHost"=>$configoptions["st_web"], 
                    "clientId"=>$configoptions["client_id"], 
                    "clientSecret"=>$configoptions["client_secret"],
                    "userAccess"=>$userAccess, "userEndpt"=>$userEndpt, 
                    "hubName"=>$hubName, 
                    "hubId"=>$hubId,
                    "hubTimer"=>60000,
                    "hubAccess"=>$hubAccess, 
                    "hubEndpt"=>$hubEndpt);
                $hubs[] = $sthub;
            }
            
            // check for a hubitat hub
            // note that the legacy hubId was actually the appId
            // so we no longer have any clue what the hubId is being set to
            if ( array_key_exists("use_he", $configoptions) && $configoptions["use_he"] ) {
                if ( array_key_exists("hubitat_access", $configoptions) &&
                     array_key_exists("hubitat_id", $configoptions) ) {
                    $userAccess = $configoptions["hubitat_access"];
                    $hubAccess = $configoptions["hubitat_access"];
                    $appId = $configoptions["hubitat_id"];
                    $hubId = "unknown-he";
                } else {
                    $userAccess = "";
                    $hubAccess = "";
                    $appId = "";
                    $hubId = "unknown-he";
                }
                if ( array_key_exists("hubitat_endpt", $configoptions) ) {
                    $userEndpt = $configoptions["hubitat_endpt"];
                } else {
                    $userendpt = $configoptions["hubitat_host"] . "/apps/api/" . $appId;
                }
                $hubEndpt = $userendpt;
                if ( array_key_exists("user_sitename", $configoptions) ) {
                    $hubName = $configoptions["user_sitename"];
                } else {
                    $hubName = "Hubitat Home";
                }
                $hehub = array("hubType"=>"Hubitat", 
                    "hubHost"=>$configoptions["hubitat_host"], 
                    "clientId"=>"", 
                    "clientSecret"=>"",
                    "userAccess"=>$userAccess, 
                    "userEndpt"=>$userEndpt, 
                    "hubName"=>$hubName, 
                    "hubId"=>$hubId,
                    "hubTimer"=>60000,
                    "hubAccess"=>$hubAccess, 
                    "hubEndpt"=>$hubEndpt);
                $hubs[] = $hehub;
            }
        
        // otherwise it must be a new multihub setup
        // removed the old endpt setup since it no longer applies
        } else {
            $hubs = $configoptions["hubs"];
        }
    } else {
        // hyper old format without even a config section
        // set default to not have any hub
        // HousePanel now works without any hub for custom tiles only
        $rewrite = true;
        $timezone = date_default_timezone_get();
        $skin = "skin-housepanel";
        $kiosk = false;
        $port = "19234";
        $webSocketServerPort = "1337";
        $fast_timer = 60000;
        $slow_timer = 3600000;
        $uname = "";
        $pwords = array();
        $hubs = array();
    }
    
    // get version and time info
    // force rewrite of options if a new version
    if ( array_key_exists("time", $options) ) {
        $time = $options["time"];
        $info = explode(" @ ", $time);
        $version = $info[0];
        $timestamp = $info[1];
        $lastedit = date("M j, Y h:i:s a", $timestamp);
        if ( $version != HPVERSION ) {
            $rewrite = true;
        }
    } else {
        $rewrite = true;
        $lastedit = "Unknown";
        $version = "Pre Version 1.7";
    }

    // removed clientinfo support - too old to make sense any more
    // update the options with updated set
    // all user provided skins are now tied to a user name under pwords
    // last one given is saved here also in main area as the new default
    if ( $rewrite ) {
        $configoptions = array(
            "timezone" => $timezone,
            "skin" => $skin,
            "kiosk" => $kiosk,
            "housepanel_url" => $returl,
            "port" => $port,
            "webSocketServerPort" => $webSocketServerPort,
            "fast_timer" => $fast_timer,
            "slow_timer" => $slow_timer,
            "hubs" => $hubs,
            "pword" => $pwords
        );
        
        $options["config"] = $configoptions;
        writeOptions($options);
    }
        
    // add a new blank hub at the end for adding new ones
    // note: the type must be "New" because js uses this to do stuff
    $newhub = array("hubType"=>"New", "hubHost"=>"https://graph.api.smartthings.com", 
                    "clientId"=>"", "clientSecret"=>"",
                    "userAccess"=>"", "userEndpt"=>"", "hubName"=>"", "hubId"=>"",
                    "hubTimer"=>60000, "hubAccess"=>"", "hubEndpt"=>"");
    $hubs[] = $newhub;
    
    $tc.= hidden("returnURL", $returl);
    $tc.= hidden("pagename", "auth");
    
    $tc.= "<div class=\"greetingopts\">";
    $tc.= "<div><span class=\"startupinp\">Last update: $lastedit</span></div>";
    
    // ------------------ general settings ----------------------------------
    $tc.= "<div id=\"tskwrapper\">";
    $tc.= tsk($timezone, $skin, $kiosk, $uname, $port, $webSocketServerPort, $fast_timer, $slow_timer);
    $tc.= "</div>"; 
    
    if ( $hubset!==null && $newthings!==null && is_array($newthings) ) {
        $defhub = strval($hubset);
        $numnewthings = count($newthings);
        $ntc= "Hub with hubId= $defhub was authorized and $numnewthings devices were retrieved.";
    } else {
        $defhub = strval($hubs[0]["hubId"]);
        $ntc = "";
    }
    // $defhub = "1";
    $tc.= "<div id=\"newthingcount\">$ntc</div>";
    
    $tc.= "<div class='hubopt'><label for=\"pickhub\" class=\"startupinp\">Authorize which hub?</label>";
    $tc.= "<select name=\"pickhub\" id=\"pickhub\" class=\"startupinp\">";

    $i= 0;
    foreach ($hubs as $hub) {
        $hubName = $hub["hubName"];
        $hubType = $hub["hubType"];
        $hubId = strval($hub["hubId"]);
        if ( $hubId === $defhub) {
            $hubselected = "selected";
        } else {
            $hubselected = "";
        }
        $tc.= "<option value=\"$hubId\" $hubselected>Hub #$i ($hubType)</option>";
        $i++;
    }
    $tc.= "</select></div>";

    $tc.="<div id=\"authhubwrapper\">";
    $i = 0;
    foreach ($hubs as $hub) {
        
        putStats($hub);
        $hubType = $hub["hubType"];
        $hubId = strval($hub["hubId"]);
        if ( $hubId === $defhub) {
            $hubclass = "authhub";
        } else {
            $hubclass = "authhub hidden";
        }
        $tc.="<div id=\"authhub_$hubId\" hubid=\"$hubId\" hubtype=\"$hubType\" class=\"$hubclass\">";
        
        $tc.= "<form id=\"hubform_$hubId\" class=\"houseauth\" action=\"" . $returl . "\"  method=\"POST\">";
        $tc.= hidden("doauthorize", $hpcode);
        // $tc.= hidden("hubnum", $i);

        // we use this div below to grab the hub type dynamically chosen
        $tc.= "<div id=\"hubdiv_$hubId\"><label class=\"startupinp\">Hub Type: </label>";
        $tc.= "<select name=\"hubType\" class=\"startupinp\">";
        $st_select = $he_select = $w_select = $v_select = $o_select = "";
        if ( $hubType==="SmartThings" ) { $st_select = "selected"; }
        if ( $hubType==="Hubitat" ) { $he_select = "selected"; }
//        if ( $hubType==="Wink" ) { $w_select = "selected"; }
//        if ( $hubType==="Vera" ) { $v_select = "selected"; }
//        if ( $hubType==="OpenHab" ) { $o_select = "selected"; }
        $tc.= "<option value=\"SmartThings\" $st_select>SmartThings</option>";
        $tc.= "<option value=\"Hubitat\" $he_select>Hubitat</option>";
        // $tc.= "<option value=\"Wink\" $w_select>Wink</option>";
        // $tc.= "<option value=\"Vera\" $v_select>Vera</option>";
        // $tc.= "<option value=\"OpenHab\" $o_select>OpenHab</option>";
        $tc.= "</select></div>";
        
        if ( !$hub["hubHost"] ) {
            $hub["hubHost"] = "https://graph.api.smartthings.com";
        }
        $tc.= "<div><label class=\"startupinp required\">API Url: </label>";
        $tc.= "<input class=\"startupinp\" title=\"Enter the hub OAUTH address here\" name=\"hubHost\" width=\"80\" type=\"text\" value=\"" . $hub["hubHost"] . "\"/></div>"; 

        $tc.= "<div><label class=\"startupinp required\">Client ID: </label>";
        $tc.= "<input class=\"startupinp\" name=\"clientId\" width=\"80\" type=\"text\" value=\"" . $hub["clientId"] . "\"/></div>"; 

        $tc.= "<div><label class=\"startupinp required\">Client Secret: </label>";
        $tc.= "<input class=\"startupinp\" name=\"clientSecret\" width=\"80\" type=\"text\" value=\"" . $hub["clientSecret"] . "\"/></div>"; 

        $tc.= "<div><label class=\"startupinp\">Fixed Access Token: </label>";
        $tc.= "<input class=\"startupinp\" name=\"userAccess\" width=\"80\" type=\"text\" value=\"" . $hub["userAccess"] . "\"/></div>"; 

        $tc.= "<div><label class=\"startupinp\">Fixed Endpoint: </label>";
        $tc.= "<input class=\"startupinp\" name=\"userEndpt\" width=\"80\" type=\"text\" value=\"" . $hub["userEndpt"] . "\"/></div>"; 

        $tc.= "<div><label class=\"startupinp\">Hub Name: </label>";
        $tc.= "<input class=\"startupinp\" name=\"hubName\" width=\"80\" type=\"text\" value=\"" . $hub["hubName"] . "\"/></div>"; 

        // $tc.= "<div><label class=\"startupinp required\">Hub ID: </label>";
        // $tc.= "<input class=\"startupinp\" name=\"hubId\" width=\"10\" type=\"text\" value=\"" . $hubId . "\"/></div>"; 
        hidden("hubId", $hubId);

        $tc.= "<div><label class=\"startupinp required\">Refresh Timer: </label>";
        $tc.= "<input class=\"startupinp\" name=\"hubTimer\" width=\"10\" type=\"text\" value=\"" . $hub["hubTimer"] . "\"/></div>"; 

        $tc.= "<input class=\"hidden\" name=\"hubAccess\" type=\"hidden\" value=\"" . $hub["hubAccess"] . "\"/>"; 
        $tc.= "<input class=\"hidden\" name=\"hubEndpt\" type=\"hidden\" value=\"" . $hub["hubEndpt"] . "\"/>"; 
        
        $tc.= "<div>";
        $tc .= "<input hub=\"$i\" hubid=\"$hubId\" class=\"authbutton hubauth\" value=\"Authorize Hub #$i\" type=\"button\" />";
        $tc .= "<input hub=\"$i\" hubid=\"$hubId\" class=\"authbutton hubdel\" value=\"Remove Hub #$i\" type=\"button\" />";
        $tc.= "</div>";
        
        $tc.= "</form>";
        $tc.= "</div>";
        
        $i++;
    }
    $tc.= "</div>";
    $tc.= "<div id=\"authmessage\"></div>";
    $tc.= "<input id=\"cancelauth\" class=\"authbutton\" value=\"Done Authorizing\" name=\"cancelauth\" type=\"button\" />";
    return $tc;
}

function getCustomName($defname, $idx, $options) {
    $rooms = $options["rooms"];
    $thingoptions = $options["things"];
    $tileid = intval($options["index"][$idx]);
    foreach ($rooms as $room => $ridx) {
        if ( array_key_exists($room, $thingoptions) ) {
           $things = $thingoptions[$room];
           foreach ($things as $kindexarr) {
              // only do this if we have custom names defined in rooms
              if ( is_array($kindexarr) && count($kindexarr) > 3 ) {
                 $kindex = intval($kindexarr[0]);
                 $customname = strval($kindexarr[4]);
                 // if our tile matches and there is a custom name, use it
                 if ( $kindex===$tileid && $customname!=="" ) {
                    return $customname;
                 }
              }
           }
        }
    }
    return $defname;
}

function getClock($clockname, $clockid, $options, $allthings, $clockskin="", $fmtdate="M d, Y", $fmttime="h:i:s A") {
    $clockname = getCustomName($clockname, "clock" . "|" . $clockid, $options);
    $weekday = date("l");
    $dateofmonth = date($fmtdate);
    $timeofday = date($fmttime);
    $timezone = date("T");
    $dclock = array("name" => $clockname, "skin" => $clockskin, "weekday" => $weekday, "date" => $dateofmonth, "time" => $timeofday, "tzone" => $timezone,
                    "fmt_date"=>$fmtdate, "fmt_time"=> $fmttime);
    $dclock = getCustomTile($dclock, "clock", $clockid, $options, $allthings);
    
    // adjust format of date and time based on custom time config
    $dateofmonth = date($dclock["fmt_date"]);
    $timeofday = date($dclock["fmt_time"]);
    $dclock["date"] = $dateofmonth;
    $dclock["time"] = $timeofday;
    return $dclock;
}

function addSpecials(&$allthings, $options) {
    // set hub number to nothing for manually created tiles
    $hubnum = -1;
    $hubType = "None";

    // add digital clock tile
    // never refresh since clocks have their own refresh timer built into the javascript code
    $clockid = "clockdigital";
    $dclock = getClock("Digital Clock", $clockid, $options, $allthings, "", "M d, Y", "h:i:s A");
    $allthings["clock|$clockid"] = array("id" => $clockid, "name" => $dclock["name"], 
        "hubnum" => $hubnum, "type" => "clock", "refresh"=>"never", "value" => $dclock);

    // add analog clock tile - no longer use dclock format settings by default
    $clockid = "clockanalog";
    $aclock = getClock("Analog Clock", $clockid, $options, $allthings, "CoolClock:swissRail:72", "M d, Y", "h:i:s A");
    $allthings["clock|$clockid"] = array("id" => $clockid, "name" => $aclock["name"], 
        "hubnum" => $hubnum, "type" => "clock", "refresh"=>"never", "value" => $aclock);

    // add special tiles based on type and user provided count
    // this replaces the old code that handled only video and frame tiles
    // this also creates image and blank tiles here that used to be made in groovy
    // putting this here allows them to be handled just like other modifiable tiles
    // these tiles all refresh fast except first 4 frames that are reserved for weather
    // renamed accuweather to forecast2 for simplicity sake and to make sorting work
    // array("video" =>"vid", "frame" =>"frame", "image"=>"img", "blank"=>"blank", "custom"=>"custom_");
    $specialtiles = getSpecials();
    foreach ($specialtiles as $stype => $sid) {
        $speed = ($stype==="frame") ? "slow" : "normal";
        $fcnt = getCustomCount($stype, $options);
        for ($i=0; $i<$fcnt; $i++) {

            $k = strval($i + 1);
            $fid = $sid[0] . $k;

            // the forecasts now must be in files frame1.html through frame4.html
            // or you can just change the name in the editor to a valid file
            $fw = $sid[1];
            $fh = $sid[2];
            $idx = $stype . "|" . $fid;
            $fn = getCustomName($stype . $k, $idx, $options);
            $fval = returnFile($fn, $fw, $fh, $stype);
            $ftile = array("name"=>$fn, $stype=>$fval, "width"=> $fw, "height"=>$fh);
            $allthings["$stype|$fid"] = array("id" => $fid, "name" => $ftile["name"], "hubnum" => $hubnum, 
                "type" => $stype, "refresh"=>$speed, "value" => $ftile);
        }
    }
    
    // create the controller tile
    // keys starting with c__ will get the confirm class added to it
    // this tile cannot be customized by the user due to its unique nature
    // but it can be visually styled just like any other tile
    $controlval = array("name"=>"Controller", "showoptions"=>"Options","refresh"=>"Refresh","c__refactor"=>"Reset",
                 "c__reauth"=>"Re-Auth","showid"=>"Show Info","toggletabs"=>"Toggle Tabs",
                 "showdoc"=>"Documentation",
                 "blackout"=>"Blackout","operate"=>"Operate","reorder"=>"Reorder","edit"=>"Edit");
    $allthings["control|control_1"] = array("id" => "control_1", "name" => $controlval["name"], "hubnum" => $hubnum, 
                "type" => "control", "refresh"=>"never", "value" => $controlval);
}

// rewrite this to use our new groovy code to get all things
// this should be considerably faster
// updated to now include 4 video tiles and make both hub calls consistent
// endpt and access_token are now arrays supporting multiple hubs
function getAllThings($reset = false) {

    if ( !$reset && isset($_SESSION["allthings"]) ) {
        $allthings = unserialize($_SESSION["allthings"]);
        $insession = true;
    } else {
    
        $options = readOptions();
        $configoptions = $options["config"];
        $tz = $configoptions["timezone"];
        date_default_timezone_set($tz);

        $insession = false;
        $allthings = array();

        // first get all things from hubs
        // doing this first enables linked custom tiles to work properly
        $hubs = $configoptions["hubs"];
        foreach( $hubs as $hub) {
            $hubType = $hub["hubType"];
            $clientId = $hub["clientId"];
            $clientSecret = $hub["clientSecret"];
            $access_token = $hub["hubAccess"];
            $endpt = $hub["hubEndpt"];
            $hubId = $hub["hubId"];
            if ( $endpt && $access_token ) {
                $allthings = getDevices($allthings, $options, $hubId, $hubType, $access_token, $endpt, $clientId, $clientSecret);
            }
        }
        addSpecials($allthings, $options);
        
        // now loop through all things and all customizations
        // we do it here in a second loop instead of inside getDevices
        // so that references between tiles work
        // we skip the control tile since it has its own refresh field that means something else
        // this final loop also sets the value for our special tiles by calling returnFile
        // this is why I didn't bother calling it above to save some comnpute time
        foreach ($allthings as $idx => $thing) {
            $stype = $thing["type"];
            if ( $stype!=="control" ) {
                $thing["value"]["name"] = getCustomName($thing["value"]["name"], $idx, $options);
                $thing["value"] = getCustomTile($thing["value"], $thing["type"], $thing["id"], $options, $allthings);
                $thing["name"] = $thing["value"]["name"];
                
                // adjust refresh if user gave a custom refresh type
                if ( array_key_exists("refresh",$thing["value"]) ) {
                   $thing["refresh"] = $thing["value"]["refresh"];
                   unset($thing["value"]["refresh"]);
                }
                
                // update special tiles with custom name and width and height values
                // this will call returnFile a second time to get any custom naems or sizes
                if ( array_key_exists($stype, $specialtiles) ) {
                    $fn = $thing["value"]["name"];
                    if ( array_key_exists("width", $thing["value"]) ) {
                        $fw = $thing["value"]["width"];
                    } else {
                        $fw = $specialtiles[$stype][1];
                    }
                    if ( array_key_exists("height", $thing["value"]) ) {
                        $fh = $thing["value"]["height"];
                    } else {
                        $fh = $specialtiles[$stype][2];
                    }
                    $thing["value"][$stype] = returnFile($fn, $fw, $fh, $stype);
                }
                $allthings[$idx] = $thing;
            }
        }
        
        // save the things
        $_SESSION["allthings"] = serialize($allthings);
    }
    
    if ( DEBUG7 ) {
        echo "<div class='debug'>things retrieved";
        if ( $insession ) {
            echo "<br>Retrieved from session variable - $insession<br>";
        }
        echo "<pre>";
        print_r($allthings);
        echo "</pre>";
        exit(0);
    }
    
    return $allthings; 
}

// create addon subid's for any tile
// this enables a unique customization effect
// the last parameter is only needed for LINK customizations
function getCustomTile($custom_val, $customtype, $customid, $options, $allthings=false) {
    
    $reserved = array("index","rooms","things","config","control","useroptions");
    $idx = $customtype . "|" . $customid;
    $rooms = $options["rooms"];
    $thingoptions = $options["things"];
    $tileid = $options["index"][$idx];
    
    // get custom tile name if it was defined in tile editor and stored
    // in the room array - this is a temp fix until I change the architecture
    // to store custom names in the index of things instead
    $customname= "";
    foreach ($rooms as $room => $ridx) {
        if ( array_key_exists($room, $thingoptions) ) {
            $things = $thingoptions[$room];
            foreach ($things as $kindexarr) {
                // only do this if we have custom names defined in rooms
                if ( is_array($kindexarr) && count($kindexarr) > 3 ) {
                    $kindex = $kindexarr[0];

                    // if our tile matches and there is a custom name, use it
                    if ( intval($kindex)===intval($tileid) && $kindexarr[4]!=="" ) {
                        $customname = $kindexarr[4];
                        break;
                        // if ( $customname!=="" ) { break; }
                    }
                }
            }
        }
        // if ( $customname!=="" ) { break; }
    }
    
    if ( $customname!=="" ) {
        $custom_val["name"] = $customname;
    }
    
    // see if a section for this id is in options file
    if (array_key_exists("user_" . $customid, $options) ) {
        $lines = $options["user_" . $customid];
    } else if ( !in_array ($customid, $reserved) && array_key_exists($customid, $options) ) {
        $lines = $options[$customid];
    } else {
        $lines = false;
    }

    $ignores = array(" ","'","*","<",">","!","{","}","-",".",",",":","+","&","%");
    if ( $lines && is_array($lines) ) {
        
        // allow user to skip wrapping single entry in an array
        // the GUI will never do this but a user might in a manual edit
        if ( !is_array($lines[0]) ) {
            $lines = array($lines);
        }
        
        // first remove existing ones so we can readd them in the proper order
        foreach ($lines as $msgs) {
            $subidraw = trim($msgs[2]);
            $subid = str_replace($ignores, "", $subidraw);
            $companion = "user_" . $subid;
            unset($custom_val[$subid]);
            unset($custom_val[$companion]);
        }
        
        // sort the lines and add them back in the requested order
        // replacements of default items will occur in default place
        usort($lines, sortlinefunc);
        
        // loop through each item and add to tile
        foreach ($lines as $msgs) {
            
            // check to make sure we have an array of three long
            // this strict rule is followed to enforce discipline use
            if ( is_array($msgs) && count($msgs)>=3 ) {
            
                $calltype = trim(strtoupper($msgs[0]));
                $content = trim($msgs[1]);
                $posturl = urlencode($content);
                $subidraw = trim($msgs[2]);
                $subid = str_replace($ignores, "", $subidraw);
                $companion = "user_" . $subid;

                // process web calls made in custom tiles
                // this adds a new field for the URL or LINK information
                // in a tag called user_$subid where $subid is the requested field
                // web call results and linked values are stored in the subid field
                if ( $content && substr(strtolower($content),0,4)==="http" &&
                     ($calltype==="PUT" || $calltype==="GET" || $calltype==="POST")  )
                {
                    $custom_val[$companion] = "::" . $calltype . "::" . $posturl;
                    $custom_val[$subid] = $calltype . ": " . $subid;
               
                } else if ( $calltype==="LINK" ) {
                    // code for enabling mix and match subid's into custom tiles
                    // this stores the tile number so we can quickly grab it upon actions
                    // this also allows me to find the hub number of the linked tile easily
                    // and finally, the linked tile is displayable at user's discretion
                    // for this to work the link info is stored in a new element that is hidden
                    $idx = array_search($content, $options["index"]);
                    if ( $allthings && $idx!== false && array_key_exists($idx, $allthings) ) {
                        $thesensor = $allthings[$idx];
                        $thevalue = $thesensor["value"];
                        $thetype = $thesensor["type"];
                
                        // if the subid exists in our linked tile add it
                        // this can replace existing fields with linked value
                        // if an error exists show text of intended link
                        // first case is if link is valid and not an existing field
                        if ( array_key_exists($subid, $thevalue) ) {
                            $custom_val[$companion] = "::" . $thetype . "::" . $calltype . "::" . $content;
                            $custom_val[$subid]= $thevalue[$subid];
                            
                        // final two cases are if link tile wasn't found
                        // first sub-case is if subid begins with the text of a valid key
                        } else {
                            // handle user provided names that start with a valid link subid
                            // and there is more beyond the start than numbers
                            $realsubid = false;
                            foreach ($custom_val as $key => $val) {
                                if ( strpos($subid, $key) === 0 ) {
                                    $realsubid = $key;
                                    break;
                                }
                            }
                            if ( $realsubid ) {
                                $custom_val[$companion] = "::" . $thetype . "::" . $calltype . "::" . $content;
                                $custom_val[$subid]= $thevalue[$realsubid];
                            } else {
                                $custom_val[$companion] = "::" . $thetype . "::" . $calltype . "::" . $content;
                                $custom_val[$subid] = "Invalid link to tile #" . $content . " with subid=$subid";
                            }
                        }
                    } else {
                        $custom_val[$companion] = "::" . $thetype . "::" . $calltype . "::" . $content;
                        $custom_val[$subid] = "Invalid link to #" . $content . " with subid=$subid idx=$idx at-count: " . count($allthings);
                    }

                } else if ( $calltype==="URL" ) {
                    $custom_val[$companion] = "::" . $calltype . "::" . $posturl;
                    $custom_val[$subid] = $content;
               
                } else if ( $calltype==="RULE" ) {
                    $custom_val[$companion] = "::" . $calltype . "::" . $content;
                    $custom_val[$subid] = "RULE::$subid";

                } else {
                    // code for any user provided text string
                    // we could skip this but including it bypasses the hub call
                    // which is more efficient and safe in case user provides
                    // a subid that the hub might recognize - this way it is
                    // guaranteed to just pass the text on the browser
                    $calltype = "TEXT";
                    $custom_val[$companion] = "::" . $calltype . "::" . $content;
                    $custom_val[$subid] = $content;
                }
            }
        }
    }
    return $custom_val;
}

function sortlinefunc($a, $b) {
    $compa = (is_array($a) && count($a) > 3) ? intval($a[3]) : 99;
    $compb = (is_array($b) && count($b) > 3) ? intval($b[3]) : 99;

    if ( $compa===$compb) { return 0; }
    return ($compb > $compa) ? -1 : 1;
}

// function to search for triggers in the name to include as classes to style
function processName($thingname, $thingtype) {

    // get rid of 's and split along white space
    // but only for tiles that are not weather
    $subtype = "";
    if ( $thingtype!=="weather") {
        $ignores = array("'s","*","<",">","!","{","}","-",".",",",":","+","&","%");
        // $ignore2 = getTypes();
        // ignore all but door types
        $ignore2 = array("routine","switch", "light", "switchlevel", "bulb", "momentary","contact",
                         "motion", "lock", "thermostat", "temperature", "music", "valve",
                         "illuminance", "smoke", "water",
                         "weather", "presence", "mode", "shm", "hsm", "piston", "other",
                         "clock", "blank", "image", "frame", "video", "custom", "control", "power");
        $lowname = str_replace($ignores, "", strtolower($thingname));
        // $lowname = str_replace($ignore2, "", $lowname);
        $subopts = preg_split("/[\s,;|]+/", $lowname);
        $k = 0;
        foreach ($subopts as $key) {
            if ( !in_array($key, $ignore2) && strtolower($key) !== $thingtype && !is_numeric($key) && strlen($key)>1 ) {
                $subtype.= " " . $key;
                $k++;
            }
            if ($k === 2) { break; }
        }
    }
    
    return array($thingname, $subtype);
}

// returns proper html to display an image, video, or frame
// if some other type is requested it returns a div of requested size and skips search
// searches in main folder and media subfolder for file name
function returnFile($fname, $width, $height, $ctype) {

    switch ($ctype) {
        case "image":
            $grtypes = array("",".jpg",".png",".gif");
            break;
        case "video":
            $grtypes = array("",".mp4",".ogg");
            break;
        case "frame":
            $grtypes = array("",".html",".htm",".php");
            break;
        case "custom":
            $grtypes = array("",".jpg",".png",".gif",".mp4",".ogg",".html",".htm",".php");
            break;
        default:
            $grtypes = false;
            break;
    }
    
    $vn = "";
    if ( $fname && $grtypes ) {
        foreach ($grtypes as $ext) {
            if ( file_exists($fname . $ext) ) {
                $vn = $fname . $ext;
                break;
                
            } else if ( file_exists("media/" . $fname . $ext) ) {
                $vn = "media/" . $fname . $ext;
                break;
            }
        }
    }
    
    if ( $vn ) {
        $pathparts = pathinfo($vn);
        $ve = $pathparts["extension"];
        
        switch ($ve) {
            case "jpg":
            case "png":
            case "gif":
                // $vnhash = md5_file($vn);
                // $v = "<img width=\"$width\" height=\"$height\" src=\"$vn" . "?v=$vnhash" ."\">";
                $v = "<img width=\"$width\" height=\"$height\" src=\"$vn" ."\">";
                break;
            
            case "mp4":
            case "ogg":
                // $vnhash = md5_file($vn);
                $v= "<video width=\"$width\" height=\"$height\" autoplay>";
                // $v.= "<source src=\"$vn" . "?v=$vnhash" ."\" type=\"video/$ve\">";
                $v.= "<source src=\"$vn" ."\" type=\"video/$ve\">";
                $v.= "Video Not Supported</video>";
                break;
                
            case "html":
            case "htm":
            case "php":
                // $vnhash = md5_file($vn);
                // $v = "<iframe width=\"$width\" height=\"$height\" src=\"$vn" . "?v=$vnhash" ."\" frameborder=\"0\"></iframe>";
                $v = "<iframe width=\"$width\" height=\"$height\" src=\"$vn" ."\" frameborder=\"0\"></iframe>";
                break;
                
            default:
                $contents = file_get_contents($vn, NULL, NULL, 0, 1024);
                $v = "<div style=\"width: $width" . "px; height: $height" . "px;\">$contents</div>";
                break;
        }
    } else {
        $v = "<div style=\"width: $width" . "px; height: $height" . "px\"></div>";
    }
    return $v;
}

// function to create frame2.html with AccuWeather for a city
// the City Name, Country Code, and the Location Code from AccuWeather must be provided
// getAccuWeather("ann-arbor-mi","us","329380");
function getAccuWeather($city, $region, $code, $unit="f") {
    $tc = "<!DOCTYPE html>";
    $tc.= "<html><body>";
    $tc.= "<a href=\"https://www.accuweather.com/en/$region/$city/$code/weather-forecast/$code\" class=\"aw-widget-legal\">";
    $tc.= "</a><div id=\"awcc1531959686475\" class=\"aw-widget-current\"  data-locationkey=\"$code\" data-unit=\"$unit\" data-language=\"en-us\" data-useip=\"false\" data-uid=\"awcc1531959686475\"></div>";
    $tc.= "<script type=\"text/javascript\" src=\"https://oap.accuweather.com/launch.js\"></script>";
    $tc.= "</body></html>";
    file_put_contents("frame2.html", $tc);
}

function getWeatherIcon($num) {
    $num = strval($num);
    if ( strlen($num) < 2 ) {
        $num = "0" . $num;
    }
    
    // uncomment this to use ST's copy. Default is to use local copy
    // so everything stays local
    // $iconimg = "https://smartthings-twc-icons.s3.amazonaws.com/" . $num . ".png";
    $iconimg = "media/weather/" . $num . ".png";
    $iconstr = "<img src=\"$iconimg\" alt=\"$num\" width=\"80\" height=\"80\">";
    return $iconstr;
}

// the primary tile generation function
// all tiles on screen are created using this call
// some special cases are handled such as clocks, weather, and video tiles
// updated to include hub number and hub type in each thing
// user elements are included but with a simple hidden class
// because we don't want users to ever show these - but they must be there
// so that the js code can send info needed to do actions and invoke web calls
function makeThing($idx, $i, $kindex, $thesensor, $panelname, $options, $postop=0, $posleft=0, $zindex=1, $customname="", $wysiwyg="") {

    // grab options
    // $options = readOptions();
    $allthings = getAllThings();
    $specialtiles = getSpecials();
   
    $bid = $thesensor["id"];
    $thingvalue = $thesensor["value"];
    $thingtype = $thesensor["type"];
    if ( array_key_exists("hubnum", $thesensor) ) {
        $hubnum = $thesensor["hubnum"];
    } else {
        $hubnum = -1;
    }
    if ( array_key_exists("refresh", $thesensor) ) {
        $refresh = $thesensor["refresh"];
    } else {
        $refresh = "normal";
    }

    $pnames = processName($thesensor["name"], $thingtype);
    $thingname = $pnames[0];
    $subtype = $pnames[1];
    
    // if ( $thingtype==="control" ) { $subtype= " " . $thesensor["name"]; }
    
    $postop= intval($postop);
    $posleft = intval($posleft);
    $zindex = intval($zindex);;
    
    if ( $wysiwyg ) {
        $idtag = $wysiwyg;
    } else {
        $idtag = "t-$i";
    }

    // set the custom name
    if ( $customname ) { 
        $thingvalue["name"] = $customname;
    }

    // update fields with custom settings
    $thingvalue = getCustomTile($thingvalue, $thingtype, $bid, $options, $allthings);

    // set the custom name
    // limit to 132 visual columns but show all for special tiles and custom names
    // now we use custom name in both places
    $thingname = $thingvalue["name"];
    if ( !$customname && strlen($thingname) > 132 && !array_key_exists($thingtype, $specialtiles) ) {
        $thingpr = substr($thingname,0,132) . " ...";
    } else {
        $thingpr = $thingname;
    }
    
    // wrap thing in generic thing class and specific type for css handling
    // IMPORTANT - changed tile to the saved index in the master list
    //             so one must now use the id to get the value of "i" to find elements
    $tc=  "<div id=\"$idtag\" hub=\"$hubnum\" tile=\"$kindex\" bid=\"$bid\" type=\"$thingtype\" ";
    $tc.= "panel=\"$panelname\" class=\"thing $thingtype" . "-thing" . $subtype . " p_$kindex\" "; 
    $tc.= "refresh=\"$refresh\" ";
    if ( ($postop!==0 && $posleft!==0) || $zindex>1 ) {
        $tc.= "style=\"position: relative; left: $posleft" . "px" . "; top: $postop" . "px" . "; z-index: $zindex" . ";\"";
    }
    $tc.= ">";

    // special handling for weather tiles
    // this allows for feels like and temperature to be side by side
    // and it also handles the inclusion of the icons for status
    if ($thingtype==="weather") {
        if ( $customname ) {
            $weathername = $customname;
        } else {
            $weathername = $thingpr . "<br>" . $thingvalue["city"];
        }
        $tc.= "<div aid=\"$i\" class=\"thingname $thingtype t_$kindex\" id=\"s-$i\">";
        // $tc.= "<span class=\"original n_$kindex\">" . $weathername . "</span>";
        $tc.= $weathername;
        $tc.= "</div>";
        $tc.= putElement($kindex, $i, 0, $thingtype, $thingvalue["name"], "name");
        $tc.= putElement($kindex, $i, 1, $thingtype, $thingvalue["city"], "city");
        $tc.= "<div class=\"weather_temps\">";
        $tc.= putElement($kindex, $i, 2, $thingtype, $thingvalue["temperature"], "temperature");
        $tc.= putElement($kindex, $i, 3, $thingtype, $thingvalue["feelsLike"], "feelsLike");
        $tc.= "</div>";
        
        // use new weather icon mapping
        $tc.= "<div class=\"weather_icons\">";
        $wiconstr = getWeatherIcon($thingvalue["weatherIcon"]);
        $ficonstr = getWeatherIcon($thingvalue["forecastIcon"]);
        $tc.= putElement($kindex, $i, 4, $thingtype, $wiconstr, "weatherIcon");
        $tc.= putElement($kindex, $i, 5, $thingtype, $ficonstr, "forecastIcon");
        $tc.= "</div>";
        $tc.= putElement($kindex, $i, 6, $thingtype, "Sunrise: " . $thingvalue["localSunrise"] . " Sunset: " . $thingvalue["localSunset"], "sunriseset");
        $tc.= putElement($kindex, $i, 7, $thingtype, $thingvalue["localSunrise"], "localSunrise");
        $tc.= putElement($kindex, $i, 8, $thingtype, $thingvalue["localSunset"], "localSunset");
        $j = 9;
        foreach($thingvalue as $tkey => $tval) {
            if ($tkey!=="temperature" &&
                $tkey!=="feelsLike" &&
                $tkey!=="city" &&
                $tkey!=="weather" &&
                $tkey!=="weatherIcon" &&
                $tkey!=="forecastIcon" &&
                $tkey!=="alertKeys" &&
                $tkey!=="localSunrise" &&
                $tkey!=="localSunset" ) 
            {
                $tc.= putElement($kindex, $i, $j, $thingtype, $tval, $tkey);
                $j++;
            }
        }
        
    } else {

        // handle special tiles
        if ( array_key_exists($thingtype, $specialtiles) ) 
        {
            $fn = $thingvalue["name"];
            if ( array_key_exists("width", $thingvalue) ) {
                $fw = $thingvalue["width"];
            } else {
                $fw = $specialtiles[$thingtype][1];
            }
            if ( array_key_exists("height", $thingvalue) ) {
                $fh = $thingvalue["height"];
            } else {
                $fh = $specialtiles[$thingtype][2];
            }
            $thingvalue[$thingtype] = returnFile($fn, $fw, $fh, $thingtype );
        }
        
        if ( $thingtype==="music" ) {
            $thingvalue = getMusicArt($thingvalue);
        } 
        
        $tc.= "<div aid=\"$i\" type=\"$thingtype\" class=\"thingname $thingtype t_$kindex\" id=\"s-$i\">";
        // $tc.= "<span class=\"original n_$kindex\">" . $thingpr. "</span>";
        $tc.= $thingpr;
        $tc.= "</div>";
	
        // create a thing in a HTML page using special tags so javascript can manipulate it
        // multiple classes provided. One is the type of thing. "on" and "off" provided for state
        // for multiple attribute things we provide a separate item for each one
        // the first class tag is the type and a second class tag is for the state - either on/off or open/closed
        // ID is used to send over the groovy thing id number passed in as $bid
        // for multiple row ID's the prefix is a$j-$bid where $j is the jth row
        if (is_array($thingvalue)) {
            $j = 0;
            
            // check if there is a color key - use to set color
            // no longer print this first since we need to include in custom logic
            $bgcolor= "";
            if ( array_key_exists("color", $thingvalue) ) {
                $cval = $thingvalue["color"];
                if ( preg_match("/^#[abcdefABCDEF\d]{6}/",$cval) ) {
                    $bgcolor = " style=\"background-color:$cval;\"";
                    // $tc.= putElement($kindex, $i, $j, $thingtype, $cval, "color", $subtype, $bgcolor);
                    // $j++;
                }
            }

            // create on screen element for each key
            // this includes a check for helper items created by getCustomTile
            foreach($thingvalue as $tkey => $tval) {
                
                // print a hidden field for user web calls and links
                // this is what enables customization of any tile to happen
                // ::type::LINK::tval  or ::LINK::tval
                // this special element is not displayed and sits inside the overlay
                // we only process the non helpers and look for helpers in same list
                if ( substr($tkey,0,5)!=="user_" && substr($tval,0,2)!=="::" && 
                     (strpos($tkey, "DeviceWatch-") === false) &&
                     (strpos($tkey, "checkInterval") === false) 
                   ) { 
                    
                    $helperkey = "user_" . $tkey;
                    if ( array_key_exists($helperkey, $thingvalue) &&
                         substr($thingvalue[$helperkey],0,2)==="::" ) {
                    
                        $helperval = $thingvalue[$helperkey];
                        $ipos = strpos($helperval,"::",2);
                        $linktypeval = substr($helperval,$ipos);
                        $jpos = strpos($linktypeval,"::",2);

                        // case with helperval = ::TEXT::val  &  linktypeval = ::val
                        if ( $jpos===false ) { 
                            $linktype = $thingtype;
                            $command = substr($helperval, 2, $ipos-2);
                            $linkval = substr($linktypeval,2);

                        // case with tval = ::type::LINK::val &  linktypeval = ::LINK::val
                        } else {
                            $linktype = substr($helperval, 2, $ipos-2);
                            $command = substr($linktypeval, 2, $jpos-2);
                            $linkval = substr($linktypeval, $jpos+2);
                        }
                        // use the original type here so we have it for later
                        // but in the actual target we use the linktype
                        $sibling= "<div linktype=\"$linktype\" value=\"$tval\" linkval=\"$linkval\" command=\"$command\" subid=\"$tkey\" class=\"user_hidden\">" . "</div>";
                    } else {
                        $linktype = $thingtype;
                        $sibling = "";
                    }

                    $tc.= putElement($kindex, $i, $j, $linktype, $tval, $tkey, $subtype, $bgcolor, $sibling);
                    $j++;	
                }
            }
				
        } else {
            $tc.= putElement($kindex, $i, 0, $thingtype, $thingvalue, $thingtype, $subtype);
        }
    }
    $tc.= "</div>";
    return $tc;
}

// cleans up the name of music tracks for proper html page display
// no longer trim the name because that breaks album art
function fixTrack($tval) {
    if ( trim($tval)==="" ) {
        $tval = "None"; 
//    } else if ( strlen($tval) > 132) { 
//        $tval = substr($tval,0,129) . " ..."; 
    }
    return $tval;
}

// primary workhorse function to create a single element of a tile for display
// this function is typically called multiple times to display a single tile
// each element of a tile uses this so that each subid can be uniquely styled
function putElement($kindex, $i, $j, $thingtype, $tval, $tkey="value", $subtype="", $bgcolor="", $sibling="") {
    $tc = "";
    // add a name specific tag to the wrapper class
    // and include support for hue bulbs - fix a few bugs too
    if ( in_array($tkey, array("heat", "cool", "heatingSetpoint", "coolingSetpoint", "hue", "saturation") )) {
//    if ($tkey=="heat" || $tkey=="cool" || $tkey=="level" || $tkey=="vol" ||
//        $tkey=="hue" || $tkey=="saturation" || $tkey=="colorTemperature") {
        $tkeyval = $tkey . "-val";
        if ( $bgcolor && (in_array($tkey, array("hue","saturation"))) ) {
            $colorval = $bgcolor;
        } else {
            $colorval = "";
        }
        
        // fix thermostats to have proper consistent tags
        // this is supported by changes in the .js file and .css file
        $tc.= "<div class=\"overlay $tkey" . $subtype . " v_$kindex\">";
        if ($sibling) { $tc.= $sibling; }
        $tc.= "<div aid=\"$i\" subid=\"$tkey-dn\" title=\"$thingtype down\" class=\"$thingtype $tkey-dn p_$kindex\"></div>";
        $tc.= "<div aid=\"$i\" subid=\"$tkey\" title=\"$thingtype $tkey\" class=\"$thingtype $tkey p_$kindex\"$colorval id=\"a-$i"."-$tkey\">" . $tval . "</div>";
        $tc.= "<div aid=\"$i\" subid=\"$tkey-up\" title=\"$thingtype up\" class=\"$thingtype $tkey-up p_$kindex\"></div>";
        $tc.= "</div>";
    
    // process analog clocks signalled by use of a skin with a valid name other than digital
    } else if ( $thingtype==="clock" && $tkey==="skin" && $tval && $tval!=="digital" ) {
        $tc.= "<div class=\"overlay $tkey v_$kindex\">";
        if ($sibling) { $tc.= $sibling; }
        $tc.= "<div aid=\"$i\" type=\"$thingtype\"  subid=\"$tkey\" title=\"Analog Clock\" class=\"" . $thingtype . $subtype . " p_$kindex" . "\" id=\"a-$i-$tkey" . "\">" .
              "<canvas id=\"clock_$i\" class=\"$tval\"></canvas>" . 
              "</div>";
        $tc.= "</div>";
    } else {
        // add state of thing as a class if it isn't a number and is a single word
        // also prevent dates and times from being added
        // also do not include any music album or artist names in the class
        // and finally if the value is complex with spaces or other characters, skip
        $extra = ( $tkey=="time" || $tkey==="date" || $tkey==="color" ||
                   (substr($tkey,0,6)==="event_") ||
                   $tkey==="trackDescription" || $tkey==="currentArtist" || $tkey==="currentAlbum" || $tkey==="trackImage" ||
                   is_numeric($tval) || $thingtype==$tval || $tval=="" || 
                   (substr($tval,0,5)==="track") || (substr($tval,0,7)==="number_") || (substr($tval,0,4)==="http") ||
                   strpos($tval," ") || strpos($tval,"\"") || strpos($tval,",") ) ? "" : " " . $tval;
        
        // fix track names for groups, empty, and super long
        if ($tkey==="trackDescription" || $tkey==="track") {
            $tval = fixTrack($tval);
        } else if ($tkey==="trackImage") {
            if ( substr($tval,0,4) === "http" ) {
                $tval = "<img width='120' height='120' src='" . $tval . "'>";
            }
        } else if ( $tkey == "battery") {
            $powmod = intval($tval);
            $powmod = (string)($powmod - ($powmod % 10));
            $tval = "<div style=\"width: " . $tval . "%\" class=\"ovbLevel L" . $powmod . "\"></div>";
        }
        
        // for music status show a play bar in front of it
        // now use the real item name and back enable old one
        // note that we add the sibling to the music controls
        // so that linked tiles will operate properly
        // only one sibling for all the controls. The js file deals with this.
        if ($tkey==="musicstatus" || ($thingtype==="music" && $tkey==="status") ) {
            // print controls for the player
            $tc.= "<div class=\"overlay music-controls" . $subtype . " v_$kindex\">";
            if ($sibling) { $tc.= $sibling; }
            $tc.= "<div  aid=\"$i\" subid=\"music-previous\" title=\"Previous\" class=\"$thingtype music-previous p_$kindex\"></div>";
            $tc.= "<div  aid=\"$i\" subid=\"music-pause\" title=\"Pause\" class=\"$thingtype music-pause p_$kindex\"></div>";
            $tc.= "<div  aid=\"$i\" subid=\"music-play\" title=\"Play\" class=\"$thingtype music-play p_$kindex\"></div>";
            $tc.= "<div  aid=\"$i\" subid=\"music-stop\" title=\"Stop\" class=\"$thingtype music-stop p_$kindex\"></div>";
            $tc.= "<div  aid=\"$i\" subid=\"music-next\" title=\"Next\" class=\"$thingtype music-next p_$kindex\"></div>";
            $tc.= "</div>";
        }

        // ignore keys for single attribute items and keys that match types
        if ( ($tkey===$thingtype ) || 
             ($tkey==="value" && $j===0) ) {
            $tkeyshow= "";
        // add confirm class for keys that start with c$_ so we can treat like buttons
        } else if ( substr($tkey,0,3) === "c__" ) {
            $tkey = substr($tkey, 3);
            $tkeyshow = " $tkey confirm";
        } else {
            $tkeyshow = " ".$tkey;
        }
        // include class for main thing type, the subtype, a sub-key, and a state (extra)
        // also include a special hack for other tiles that return number_ to remove that
        // this allows KuKu Harmony to show actual numbers in the tiles
        // finally, adjust for level sliders that can't have values in the content
        $tc.= "<div class=\"overlay $tkey v_$kindex\">";
        if ($sibling) { $tc.= $sibling; }
        if ( $tkey == "level" || $tkey=="colorTemperature" ) {
            $tc.= "<div aid=\"$i\" type=\"$thingtype\"  subid=\"$tkey\" value=\"$tval\" title=\"$tkey\" class=\"" . $thingtype . $tkeyshow . " p_$kindex" . "\" id=\"a-$i-$tkey" . "\">" . "</div>";
        } else if ( $thingtype==="other" && substr($tval,0,7)==="number_" ) {
            $numval = substr($tkey,8);
            $tc.= "<div aid=\"$i\" type=\"$thingtype\"  subid=\"$tkey\" title=\"$tkey\" class=\"" . $thingtype . $subtype . $tkeyshow . " p_$kindex" . "\" id=\"a-$i-$tkey" . "\">" . $numval . "</div>";
        } else {
            if ( substr($tval,0,6)==="RULE::" && $subtype!=="rule" ) {
                $tkeyshow.= " rule";
            }
            $tc.= "<div aid=\"$i\" type=\"$thingtype\"  subid=\"$tkey\" title=\"$tkey\" class=\"" . $thingtype . $subtype . $tkeyshow . " p_$kindex" . $extra . "\" id=\"a-$i-$tkey" . "\">" . $tval . "</div>";
        }
        $tc.= "</div>";
    }
    return $tc;
}

// this is the main page rendering function
// each HousePanel tab is generated by this function call
// each page is contained within its own form and tab division
// notice the call of $cnt by reference to keep running count
function getNewPage(&$cnt, $allthings, $roomtitle, $kroom, $things, $options, $kioskmode) {
    $indexoptions = $options["index"];
    $tc = "";
    $roomname = $roomtitle;
    $tc.= "<div id=\"$roomname" . "-tab\">";
    if ( $allthings ) {
        if ( DEBUG || DEBUG3) {
            $roomdebug = array();
        }
        $tc.= "<form title=\"" . $roomtitle . "\" action=\"#\">";
        
        // add room index to the id so can be style by number and names can duplicate
        // no longer use room number for id since it can change around
        // switched this to name - not used anyway other than manual custom user styling
        // if one really wants to style by room number use the class which includes it
        $tc.= "<div id=\"panel-$roomname\" title=\"" . $roomtitle . "\" class=\"panel panel-$kroom panel-$roomname\">";
        // $tc.= hidden("panelname",$keyword);

        // the things list can be integers or arrays depending on drag/drop
        foreach ($things as $kindexarr) {
            
            $thingid = false;
            // get the offsets and the tile id
            if ( is_array($kindexarr) ) {
                $kindex = $kindexarr[0];
                $postop = $kindexarr[1];
                $posleft = $kindexarr[2];
                
                if ( count($kindexarr) > 3 ) {
                    $zindex = $kindexarr[3];
                    $customname = $kindexarr[4];
                } else {
                    $zindex = 1;
                    $customname = "";
                }
            } else {
                $kindex = $kindexarr;
                $postop = 0;
                $posleft = 0;
                $zindex = 1;
                $customname = "";
            }
            
            // get the index into the main things list
            $thingid = array_search($kindex, $indexoptions);
            
            // if our thing is still in the master list, show it
            if ($thingid && array_key_exists($thingid, $allthings)) {
                $thesensor = $allthings[$thingid];
                if ( DEBUG || DEBUG3 ) {
                    $roomdebug[] = $thesensor;
                }

                // keep running count of things to use in javascript logic
                $cnt++;
                // use case version of room to make drag drop work
                $tc.= makeThing($thingid, $cnt, $kindex, $thesensor, $roomtitle, $options, $postop, $posleft, $zindex, $customname);
            }
        }
        
        // include a tile to toggle tabs on and off if in kioskmode
        // but no longer need to display it unless you really want to
        if ($kioskmode) {
            $tc.="<div class=\"restoretabs\">Hide Tabs</div>";
        }

        // end the form and this panel
        $tc.= "</div></form>";
    
    } else {
        $tc.= "<div class=\"error\">Unknown problem encountered while retrieving things for room: $roomtitle.</div>";
    }

    if (DEBUG || DEBUG3) {
        $tc .= "<br /><h2>Debug Info for Room $roomname</h2><br /><pre>" . print_r($roomdebug, true) . "</pre>";
    }
    
    // end this tab which is a different type of panel
    $tc.="</div>";
    return $tc;
}

function getCatalog($allthings) {
    $thingtypes = getTypes();
    sort($thingtypes);
    $options = readOptions();
    $useroptions = $options["useroptions"];
    $tc = "";
    $tc.= "<div id=\"catalog\">";
    $tc.= "<div class=\"filteroption\">Option Filters: ";
    $tc.= "<div id=\"allid\" class=\"smallbutton\">All</div>";
    $tc.= "<div id=\"noneid\" class=\"smallbutton\">None</div>";
    $tc.= "</div>";
    $tc.= "<table class=\"catoptions\"><tr>";
    $i= 0;
    foreach ($thingtypes as $opt) {
        $i++;
        if ( in_array($opt,$useroptions ) ) {
            $tc.= "<td><input type=\"checkbox\" name=\"useroptions[]\" value=\"" . $opt . "\" checked=\"1\"></td>";
        } else {
            $tc.= "<td><input type=\"checkbox\" name=\"useroptions[]\" value=\"" . $opt . "\"></td>";
        }
        $tc.= "<td class=\"optname\">" .  $opt . "</td>";
        if ( $i % 2 == 0) {
            $tc.= "</tr><tr>";
        }
    }
    $tc.= "</tr></table>";
    
    $tc.= "<br />";
    $i= 0;
    foreach($allthings as $thesensor) {
        $bid = $thesensor["id"];
//        if ( is_numeric($bid) ) {
//            $bid = "h_" . $bid;
//        }
        // $thingvalue = $thesensor["value"];
        $thingtype = $thesensor["type"];
        $thingname = $thesensor["name"];

        if (strlen($thingname) > 32 ) {
            $thingpr = substr($thingname,0,30) . " ...";
        } else {
            $thingpr = $thingname;
        }
        
        if (in_array($thingtype, $useroptions)) {
            $hide = "";
        } else {
            $hide = "hidden ";
        }

        $tc.= "<div id=\"cat-$i\" bid=\"$bid\" type=\"$thingtype\" ";
        $tc.= "panel=\"catalog\" class=\"thing " . $hide . "catalog-thing\">"; 
        $tc.= "<div class=\"thingname\">$thingpr</div>";
        $tc.= "<div class=\"thingtype\">$thingtype</div>";
        $tc.="</div>";
        $i++;
    }
    $tc.= "</div>";
    return $tc;
}

function doAction($hubnum, $path, $swid, $swtype, 
                  $swval="", $swattr="", $subid="", 
                  $command="", $content="", $macro=true ) {
    
    $specialtiles = getSpecials();
    $save = $swval;
    $options = readOptions();
    $configoptions = $options["config"];
    $hubs = $configoptions["hubs"];
    $tz = $configoptions["timezone"];
    date_default_timezone_set($tz);
    $mainidx = $swtype . "|" . $swid;
    $lidx = $mainidx;
    $response = array();
    $macrocount = 0;
    
    // check for macros tied to this id
    $idsub = $swtype . "|" . $swid . "|" . $subid;
    if ( $macro && $command!=="RULE" && $path==="doaction" && $swid!=="all" &&
         array_key_exists("macros", $options) && 
         array_key_exists($idsub, $options["macros"]) ) {
        $macros = $options["macros"];
        $actions = $macros[$idsub];
        if ( is_array($actions) ) {
            
            if ( !is_array($actions[0]) ) {
                $actions = array($actions);
            }    
            // loop through all the macro actions
            // calling this routine recursively
            // the last parameter prevents infinite loop
            foreach ($actions as $items) {
                if ( count($items) > 0 ) {
                    $macrohub = $items[0];
                    // enable macro to use same data as parent trigger by giving - or self
                    if ( $macrohub==="-" ) {
                        $macrohub= $hubnum;
                    }
                    if ( count($items) < 2 || $items[1]==="-" ) {
                        $macroid= $swid;
                    } else {
                        $macroid = $items[1];
                    }
                    if ( count($items) < 3 || $items[2]==="-" ) {
                        $macrotype= $swtype;
                    } else {
                        $macrotype = $items[2];
                    }
                    if ( count($items)<4 ) {
                        $macrosubid= "";
                    } else if ( $items[3]==="-" ) {
                        $macrosubid= $subid;
                    } else {
                        $macrosubid = $items[3];
                    }
                    if ( count($items)<5 ) {
                        $macroval= $swval;
                    } else if ( $items[4]==="-" ) {
                        $macroval= $swval;
                    } else {
                        $macroval = $items[4];
                    }
                    if ( count($items)<6 ) {
                        $macroattr= "";
                    } else if ( $items[5]==="-" ) {
                        $macroattr= $swattr;
                    } else {
                        $macroattr = $items[5];
                    }

                    // make the recursive call with false as last param to avoid loop
                    $macrocount++;
                    doAction($macrohub, "doaction", 
                         $macroid, $macrotype, $macroval, $macroattr, $macrosubid,
                         "", "", false);
                }
            }
        }
    }
    
    // detect if we have a session
    // not having a session typically means HP is in API mode
    // in API mode link and web api calls are not supported
    if ( isset($_SESSION["allthings"]) ) {
        $allthings = unserialize($_SESSION["allthings"]);
    } else {
        $allthings = false;
    }

    // handle clocks
    if ( $command==="" && $swid==="clockdigital") {
        $dclock = getClock("Digital Clock", "clockdigital", $options, $allthings, "", "M d, Y", "h:i:s A");
        $response = $dclock;
    } else if ( $command==="" && $swid==="clockanalog" ) {
        $aclock = getClock("Analog Clock", "clockanalog", $options, $allthings, "CoolClock:swissRail:72", "M d, Y", "h:i:s A");
        $response = $aclock;
        
    // this logic is complex so let me explain. First we get the value if available
    // then we get any provided custom name from tile editor
    // then we process all tile customizer settings which can also change the name
    // next we check customizer to see if name and width and height changed
    // finally, we send name, width, height to returnFile routine to get the html tag
    } else if ( $command==="" && array_key_exists($swtype, $specialtiles) ) {
        if ( $allthings ) {
            $thingvalue = $allthings["$swtype|$swid"]["value"];
        } else {
            $fw = $specialtiles[$swtype][1];
            $fh = $specialtiles[$swtype][2];
            $thingvalue = array("name"=> $swtype . "1", "id"=> $swid, "width"=> $fw, "height"=> $fh, "type"=> $swtype);
        }
        
        $idx = $swtype . "|" . $swid;
        $thingvalue["name"] = getCustomName($thingvalue["name"], $idx, $options);
        $thingvalue = getCustomTile($thingvalue, $swtype, $swid, $options, $allthings);
        if ( array_key_exists("width", $thingvalue) ) {
            $fw = $thingvalue["width"];
        } else {
            $fw = $specialtiles[$swtype][1];
        }
        if ( array_key_exists("height", $thingvalue) ) {
            $fh = $thingvalue["height"];
        } else {
            $fh = $specialtiles[$swtype][2];
        }
        $thingvalue[$swtype] = returnFile($thingvalue["name"], $fw, $fh, $swtype );
        $response = $thingvalue;
        
    // if the new fast type is requested return things that can be updated
    // without making a call out to the hub
    // this can be used to create stop-time videos in 
    // image, blank, or custom tiles updated frequently
    // all things must be in session for this to work
    // and fast actions are only supported in query mode
    } else if ( $swid==="fast" && $swtype==="fast" && $command==="" ) {

        if ( $allthings && $path==="doquery" ) {
            $response = array();
            $indexoptions = $options["index"];

            // go through all the tiles available in the system
            // and return those that don't require hub reading
            // any tile with fast set in refresh will work
            // note that the js routine will ignore those not in use
            // this is much faster than going room by room
            // we could skip customizations for speed but this would
            // make custom tiles useless for doing stop-motion effects
            foreach ($allthings as $fidx => $thing) {
                $thingtype = $thing["type"];
                $thingvalue = $thing["value"];
                $tileid = $indexoptions[$fidx];
                $hubnum2 = $thing["hubnum"];
                
                if ( array_key_exists("refresh", $thing) && $thing["refresh"]==="fast" ) {
                    // check if this fast thing requires a hub call other than blanks and images
                    // this is basically the old individual polling method and will be slow
                    // so you should not enable very many tiles to be polled in the fast loop
                    $hub2 = strval($hubnum2) === "-1" ? false : $hubs[findHub($hubnum2, $hubs)];
                    if ( $hub2 ) {
                        // $hub = $hubs[$hubnum2];
                        $access_token2 = $hub2["hubAccess"];
                        $endpt2 = $hub2["hubEndpt"];
                        $host2 = $endpt2 . "/doquery";
                        $headertype = array("Authorization: Bearer " . $access_token2);
                        $nvpreq = "swid=" . urlencode($thing["id"]) . 
                                  "&swattr=" . urlencode("") . 
                                  "&swvalue=" . urlencode("") . 
                                  "&swtype=" . urlencode($thingtype);
                        $response2 = curl_call($host2, $headertype, $nvpreq, "POST");
                        $thing["value"] = $response2;
                    }
                    $thingvalue = getCustomTile($thingvalue,$thing["type"],$thing["id"],$options, $allthings);
                    if ( array_key_exists($thingtype, $specialtiles) ) {
                        if ( array_key_exists("width", $thingvalue) ) {
                            $fw = $thingvalue["width"];
                        } else {
                            $fw = $specialtiles[$thingtype][1];
                        }
                        if ( array_key_exists("height", $thingvalue) ) {
                            $fh = $thingvalue["height"];
                        } else {
                            $fh = $specialtiles[$thingtype][2];
                        }
                        $thingvalue[$thingtype] = returnFile($thingvalue["name"], $fw, $fh, $thingtype);
                    } else if ( $thingtype==="music" ) {
                        $thingvalue = getMusicArt($thingvalue);
                    }
                    $thing["value"]= $thingvalue;
                    $response[$tileid] = $thing;
                }
            }
          
        } else {
            $response = array();
        }

    // if the new slow type is requested return things that can be updated seldomly
    // all things must be in session for this to work
    // and slow actions are only supported in query mode
    } else if ( $swid==="slow" && $swtype==="slow" && $command==="" ) {

        if ( $allthings && $path==="doquery" ) {
            $response = array();
            $indexoptions = $options["index"];

            // go through all the tiles available in the system
            // and return those that are updated slowly
            // these are also ignored in the main query loop
            foreach ($allthings as $fidx => $thing) {
                $thingtype = $thing["type"];
                $thingvalue = $thing["value"];
                $tileid = $indexoptions[$fidx];
                if ( array_key_exists("refresh", $thing) && $thing["refresh"]==="slow" ) {
                    $thingvalue["name"] = getCustomName($thingvalue["name"], $fidx, $options);
                    $thingvalue = getCustomTile($thingvalue, $thingtype, $thing["id"], $options, $allthings);
                    if ( array_key_exists($thingtype, $specialtiles) ) {
                        if ( array_key_exists("width", $thingvalue) ) {
                            $fw = $thingvalue["width"];
                        } else {
                            $fw = $specialtiles[$thingtype][1];
                        }
                        if ( array_key_exists("height", $thingvalue) ) {
                            $fh = $thingvalue["height"];
                        } else {
                            $fh = $specialtiles[$thingtype][2];
                        }
                        $thingvalue[$thingtype] = returnFile($thingvalue["name"], $fw, $fh, $thingtype);
                    } else if ( $thingtype==="music" ) {
                        $thingvalue = getMusicArt($thingvalue);
                    }
                    $thing["value"]= $thingvalue;
                    $thing["name"] = $thing["value"]["name"];
                    $response[$tileid] = $thing;
                }
            }
          
        } else {
            $response = array();
        }
        
    // the final default is for "all" doaction and doquery calls
    } else {
        
        // get the index to use in our pusher
        $hubindex = findHub($hubnum, $hubs);
        $hub = $hubs[$hubindex];
        
        // first check if this subid has a companion link or post element
        // and if so, handle differently using the linked info or making a web service call
        // this requires alloptions to be loaded which is true if an active session
        // which is fine because linked tiles don't make sense for API calls anyway
        // use command to signal this - HUB is usual case which makes hub call
        if ( $command==="" || !$command || ($swid==="all" && $swtype==="all") ) {
            $content = "";
            $command = "HUB";
        }
    
        switch ($command) {

            case "POST":
            case "GET":
            case "PUT":
                if ( $path==="doaction") {
                    // the content passed has been encoded for safety reasons
                    // so we decode it before sending it over to curl
                    $posturl = urldecode($content);
                    $webresponse = curl_call($posturl, FALSE, "", $command);
                    if ( $webresponse ) {
                        if (is_array($webresponse)) {
                            $response[$subid] = json_encode($webresponse); // "<pre>" . print_r($webresponse,true) . "</pre>";
                        } else {
                            $response[$subid] = $webresponse;
                        }
                    } else {
                        $response[$subid] = $command . ": " . $subid . ": Error";
                    }
                } else {
                    $response[$subid] = $swval;
                }
                break;
                
            case "LINK":
                $tileid = $content;
                $lidx = array_search($tileid, $options["index"]);
                if ( $allthings && array_key_exists($lidx, $allthings) ) {
                    $linked_hubnum = $allthings[$lidx]["hubnum"];
                    $thingvalue = $allthings[$mainidx]["value"];
                    $linked_swtype = $allthings[$lidx]["type"];
                    $linked_swid = $allthings[$lidx]["id"];
                    $linked_val = $allthings[$lidx]["value"];

                    // make hub call if requested and if the linked tile has one
                    $lhub = $hubs[findHub($linked_hubnum, $hubs)];
                    if ( $path==="doaction" ) {
                        $linked_access = $lhub["hubAccess"];
                        $linked_endpt = $lhub["hubEndpt"];
                        $linked_host = $linked_endpt . "/" . $path;
                        
                        if ( array_key_exists($subid, $linked_val) ) {
                            $realsubid = $subid;
                        } else {
                            $realsubid = $subid;
                            foreach ($linked_val as $key => $val) {
                                if ( strpos($subid, $key) === 0 ) {
                                    $realsubid = $key;
                                    break;
                                }
                            }
                        }
                        
                        // make the action call on the linked thing
                        $headertype = array("Authorization: Bearer " . $linked_access);
                        $nvpreq = "swid=" . urlencode($linked_swid) . 
                                  "&swattr=" . urlencode($swattr) . 
                                  "&swvalue=" . urlencode($swval) . 
                                  "&swtype=" . urlencode($linked_swtype);
                        if ( $realsubid ) { $nvpreq.= "&subid=" . urlencode($realsubid); }
                        $response = curl_call($linked_host, $headertype, $nvpreq, "POST");
                        
                        // return json_encode($response);
    
                        // if nothing returned and an action request, act like a query
                        if ( (!$response || count($response)===0) && $path==="doaction" && $realsubid ) {
                            if ( $thingvalue[$subid] ) {
                                $response = array($subid => $thingvalue[$subid]);
                            } else {
                                $response = array($realsubid => $linked_val[$realsubid]);
                            }
                            
                            // include a special return for linked tile update
                            $response["LINK"] = array("realsubid"=>$realsubid, "linked_swid"=>$linked_swid, "linked_val"=>$linked_val);
                        } else if ( $response && count($response)>0 ) {
                            // unset the name if returned because we want custom name to stay intact
                            unset( $response["name"] );
                            $thevalue = array_merge($linked_val, $response);
                            $allthings[$lidx]["value"] = $thevalue;
                            
                            // update the user tile doing the linking
                            $thingvalue[$subid] = $response[$realsubid];
                            $allthings[$mainidx]["value"] = $thingvalue;
                            $response = array($subid => $thingvalue[$subid]);
                            
                            // include a special return for linked tile update
                            $response["LINK"] = array("realsubid"=>$realsubid, "linked_swid"=>$linked_swid, "linked_val"=>$thevalue);
                            // $response = array($subid => "test1");
                        }

                    // if not hub or a query just grab the as-is value of the linked item
                    } else {
                        $realsubid = $subid;
                        if ( $thingvalue[$subid] ) {
                            $response = array($subid => $thingvalue[$subid]);
                        } else {
                            $response = array($realsubid => $linked_val[$realsubid]);
                        }
                        $response["LINK"] = array("realsubid"=>$realsubid, "linked_swid"=>$linked_swid, "linked_val"=>$linked_val);
                    }
                }
                break;
            
            case "TEXT":
                $response = array($subid => $content);
                break;
            
            case "RULE":
                // $rulecommands = explode(",",$content);
                $rulecommands = preg_split("/[\s,;]+/", $content);
                $response = array();
                $n = 1;
                foreach ($rulecommands as $rule) {
                    $rulepair = explode("=", $rule);
                    if ( count($rulepair) > 2 ) {
                        $tileid = strval($rulepair[0]);
                        $subid = strval($rulepair[1]);
                        $swval = strval($rulepair[2]);
                        $idx = array_search($tileid, $options["index"]);
                        $k = strpos($idx,"|");
                        $swtype = substr($idx, 0, $k);
                        $swid = substr($idx, $k+1);
                        $nvpreq = "swid=" . urlencode($swid) . 
                                  "&subid=" . urlencode($subid) . 
                                  "&swvalue=" . urlencode($swval) . 
                                  "&swtype=" . urlencode($swtype);
                        
                        if ( $subid==="level" ) {
                            $nvpreq.= "&swattr=level";
                        } else if ( $subid==="colorTemperature") {
                            $nvpreq.= "&swattr=level";
                        } else if ( $subid==="switch") {
                            $nvpreq.= "&swattr=none";
                        } else {
                            $nvpreq.= "&swattr=" . $swtype . " p_" . $tileid . " " . $swval;
                        }
                        
                        $lidx = array_search($tileid, $options["index"]);
                        if ( $allthings && array_key_exists($lidx, $allthings) ) {
                            $linked_hubnum = $allthings[$lidx]["hubnum"];
                            $lhub = $hubs[findHub($linked_hubnum, $hubs)];
                        } else {
                            $lhub = $hub;
                        }
                        
                        $access_token = $lhub["hubAccess"];
                        $endpt = $lhub["hubEndpt"];
                        $path = "doaction";
                        $host = $endpt . "/" . $path;
                        $myheader = array("Authorization: Bearer " . $access_token);
                        $res = curl_call($host, $myheader, $nvpreq, "POST");
                        $response[$tileid] = $res;
                    }
                    $n++;
                }
                return json_encode($response);
                break;
            
            case "HUB":
                $access_token = $hub["hubAccess"];
                $endpt = $hub["hubEndpt"];
                $host = $endpt . "/" . $path;
                $headertype = array("Authorization: Bearer " . $access_token);
                $nvpreq = "swid=" . urlencode($swid) . 
                          "&swattr=" . urlencode($swattr) . 
                          "&swvalue=" . urlencode($swval) . 
                          "&swtype=" . urlencode($swtype);
                if ( $subid ) { $nvpreq.= "&subid=" . urlencode($subid); }
                $response = curl_call($host, $headertype, $nvpreq, "POST");
                if ( $swtype==="music" ) {
                    $response = getMusicArt($response);
                }
                // $response[$subid] = $allthings[$mainidx]["value"][$subid];
                
                if ( $response && $allthings && array_key_exists($mainidx, $allthings) ) {
                    $allthings[$mainidx]["value"] = $response;
                }
                
                // if nothing returned and an action request, act like a query
                // otherwise update main array if something returned to keep it current
                if ( !$response && $path==="doaction" && $allthings && array_key_exists($mainidx, $allthings) ) {
                    $thing = $allthings[$mainidx];
                    $thing["value"] = getCustomTile($thing["value"], $thing["type"], $thing["id"], $options, $allthings);
                    $response = array($subid => $thing["value"][$subid]);
                }
                break;
        }

        // at this point we have the results in a $response variable
        // do nothing but return response for API if we don't have things loaded in a session
        // we just don't update the session for a web browser
        if ( $response && count($response)>0 && $allthings ) {
            
            // update session with new status and pick out all if needed
            if ( $path==="doquery" && $swid==="all" ) {
                $respvals = array();
                foreach($response as $thing) {
                    $idx = $thing["type"] . "|" . $thing["id"];
                    if ( ( !array_key_exists("refresh", $thing) || 
                           $thing["refresh"]==="normal" ) && 
                          array_key_exists($idx, $allthings) ) {
                        $oldthing = $allthings[$idx];
                        $newvalue = array_merge($oldthing["value"], $thing["value"]);
                        $newthing = array_merge($oldthing, $thing);
                        $allthings[$idx] = $newthing;
                    }
                }

                // add in clocks and special tiles
                addSpecials($allthings, $options);
                
                // process customizations for timer query
                foreach ($allthings as $idx => $thing) {
                    $stype = $thing["type"];
                    if ( $stype!=="control" ) {
                        $thing["name"] = getCustomName($thing["name"], $idx, $options);
                        $thing["value"] = getCustomTile($thing["value"], $thing["type"], $thing["id"], $options, $allthings);
                        if ( $thing["type"]==="music" ) {
                            $thing["value"] = getMusicArt($thing["value"]);
                        }

                        // adjust refresh if user gave a custom refresh type
                        if ( array_key_exists("refresh",$thing["value"]) ) {
                           $thing["refresh"] = $thing["value"]["refresh"];
                           unset($thing["value"]["refresh"]);
                        }

                        // update special tiles with custom name and width and height values
                        // this will call returnFile a second time to get any custom naems or sizes
                        if ( array_key_exists($stype, $specialtiles) ) {
                            $fn = $thing["value"]["name"];
                            if ( array_key_exists("width", $thing["value"]) ) {
                                $fw = $thing["value"]["width"];
                            } else {
                                $fw = $specialtiles[$stype][1];
                            }
                            if ( array_key_exists("height", $thing["value"]) ) {
                                $fh = $thing["value"]["height"];
                            } else {
                                $fh = $specialtiles[$stype][2];
                            }
                            $thing["value"][$stype] = returnFile($fn, $fw, $fh, $stype);
                        }
                        $thing["name"] = $thing["value"]["name"];
                        $allthings[$idx] = $thing;
                    }
                }
                
                // send all normal frequency tiles to update script
                foreach($allthings as $idx => $thing) {
                    if ( (!array_key_exists("refresh", $thing) || 
                          $thing["refresh"]==="normal") && 
                         array_key_exists($idx, $options["index"]) ) {
                        $tid = $options["index"][$idx];
                        $respvals[$tid] = $thing;
                    }
                }
                                                
                $response = $respvals;
                
            // not doing an all query - this is an individual click
            // or a query of an individual tile
            } else {
                if ( $command !== "LINK" && array_key_exists($lidx, $allthings) ) {
                    $newval = array_merge($allthings[$lidx]["value"], $response);
                    $allthings[$mainidx]["value"] = $newval;
                    $response = $newval;
                }
            }
            $_SESSION["allthings"] = serialize($allthings);
        }
    }
    
    if ( $macro && $macrocount>0 ) {
        $response["execmacro"] = strval($macrocount);
    }
    
    // add the hub index for use in timers and housepanel-push
    if ( $path==="doquery" && ($swid==="all" && $swtype=="all") ) {
        $response[] = $hubindex;
    }
    
    // debug code to show the codes upon return
    if ( DEBUG8 ) {
        $debugres = array("lidx" => $lidx, "mainidx"=> $mainidx, "tileid" => $tileid, "hubhum" => $hubnum,
            "access_token"=> $access_token, "endpt"=> $endpt,
            "swid"=> $swid, "attr"=> $swattr, "save"=>$save,  "value"=> $swval, "type"=> $swtype, "subid" => $subid,
            "access"=> $linked_access, "host" => $linked_host);
        $response = array_merge($response, $debugres);
    }

    return json_encode($response);
}

function getMusicArt($thingvalue) {
               
    if (array_key_exists("trackDescription", $thingvalue) && $thingvalue["trackDescription"] ) {
        $trackname = trim($thingvalue["trackDescription"]);
        $astart = strpos($trackname," by ");
        $astop = strpos($trackname," from ");
    } else {
        $trackname = "";
        $astart = 0;
        $astop = 0;
    }
    
    // check for artist in the track description
    // we don't need to check the zero position since that will always have a song
    if ( $astart && $astop ) {
        $artist = substr($trackname, $astart+4, $astop-$astart-4);
        $album = substr($trackname, $astop+6);
        $bstop = strpos($album,"Grouped with ");
        if (  $bstop !== false ) {
            $album = substr($album, 0, $bstop);
        }
        $thingvalue["currentArtist"] = $artist;
        $thingvalue["currentAlbum"] = $album;
        if ( $artist && $album ) {
            $thingvalue["trackImage"] = getAlbumArt($artist, $album);
        } else {
            $thingvalue["trackImage"] = "";
        }
    
    // use native if there which will be true if it starts with http
    } else if ( array_key_exists("trackImage", $thingvalue) && 
         substr($thingvalue["trackImage"],0,4) === "http" ) {
        $imgvalue = "<img width='120' height='120' src='" . $thingvalue["trackImage"] . "'>";
        $thingvalue["trackImage"] = $imgvalue;
        
        // fix up bug in echo devices that stores artist in the album name
        $thingvalue["currentArtist"] = $thingvalue["currentAlbum"];
        $thingvalue["currentAlbum"] = $thingvalue["trackDescription"];

    // if we just have a song name use tunein to find icon
    } else if ( $trackname && $trackname!=="None" ) {
        $album = $trackname;
        $bstop = strpos($album,"Grouped with ");
        if (  $bstop !== false ) {
            $album = substr($album, 0, $bstop);
        }
        $thingvalue["currentArtist"] = "";
        $thingvalue["currentAlbum"] = $album;
        $thingvalue["trackImage"] = getAlbumArt("tunein", $album);
        
    } else {
        $thingvalue["currentArtist"] = "";
        $thingvalue["currentAlbum"] = "";
        $thingvalue["trackImage"] = "";
    }
    
    return $thingvalue;
}

function setOrder($endpt, $access_token, $swid, $swtype, $swval, $swattr) {
    $updated = false;
    $result = "none";
    $options = readOptions();

    // if the options file doesn't exist here something went wrong so skip
    if ($options) {
        // now update either the page or the tiles based on type
        switch($swtype) {
            case "rooms":
                // $options["rooms"] = $swval;
                $options["rooms"] = array();
                foreach( $swval as $roomname => $roomid) {
                    $options["rooms"][$roomname] = intval($roomid);
                }
                $updated = true;
                break;

            case "things":
                if (key_exists($swattr, $options["rooms"])) {
    //                $options["things"][$swattr] = $swval;
                    $options["things"][$swattr] = array();
                    foreach( $swval as $valarr) {
                        $val = intval($valarr[0],10);
                        $vname = $valarr[1];
                        $options["things"][$swattr][] = array($val,0,0,1,$vname);
                    }
    //              $updated = print_r($swval,true);
                    $updated = true;
                    // disabled dynamic updating of Options page
                    // this is handled instead inside processOptions
                    // by reading the prior options order and preserving
                    // $pgresult["order"] = $options["things"][$swattr];
                }
                break;
                
            default:
                $result = "error";
                break;
        }

        if ($updated!==false) {
            writeOptions($options);
            $result = "success";
        }
    } else {
        $result = "error";
    }
    
    return $result;
}

function setPosition($endpt, $access_token, $swid, $swtype, $swval, $swattr) {
    $updated = false;
    $options = readOptions();
    $panel = $swval["panel"];
    $tile = intval($swval["tile"],10);
    $zindex = intval($swval["zindex"],10);
    if ( array_key_exists("custom", $swval) ) {
        $customname = $swval["custom"];
    } else {
        $customname = "";
    }
    
    // first find which index this tile is
    // note that this code will not work if a tile is duplicated on a page
    // such duplication is not allowed by the UI anyway but in the
    // event that a user edits hmoptions.cfg to have duplicates
    // the code will get confused here and in other places
    // $i = array_search($tile, $options["things"][$panel]);
    $moved = false;
    foreach ($options["things"][$panel] as $i => $arr) {
        if ( is_array($arr) ) {
            $idx = intval($arr[0]);
        } else {
            $idx = intval($arr);
        }
        if ( $tile === $idx) {
            $moved = $i;
            $updated = true;
            break;
        }
    }
    if ( $updated ) {
        // change the room index to an array of tile, top, left
        // now we also save zindex and a tile custom name
        $options["things"][$panel][$moved] = array($tile, intval($swattr["top"],10), 
                                                   intval($swattr["left"],10), 
                                                   $zindex, $customname);
        writeOptions($options);
    }
    
}

// updated to use session for speed if it is there
function readOptions($reset = false) {
//    if ( isset($_SESSION["hmoptions"]) ) {
//        $options = $_SESSION["hmoptions"];
//    } else if ( file_exists("hmoptions.cfg") ) {
    if ( file_exists("hmoptions.cfg") ) {
        $serialoptions = file_get_contents("hmoptions.cfg");
        $serialnew = str_replace(array("\n","\r","\t"), "", $serialoptions);
        $options = json_decode($serialnew,true);
        $oldthingsarr = $options["things"];
//        $_SESSION["hmoptions"] = $options;
        
        $time = $options["time"];
        $info = explode(" @ ", $time);
        $version = floatval($info[0]);
        
        // fix old custom css files
        $skin = $options["config"]["skin"];
        if ( $version < 2.1 ) {
            fixCustomCss($skin);
        }
        
        // fix up pword to be array
        // could add version check here too but this is fast so don't bother
        $pwords = $options["config"]["pword"];
        $opwords = $pwords;
        foreach ($opwords as $un => $pw) {
            if ( !is_array($pw) ) {
                $pwords[$un] = array($pw, $skin);
            } else if ( !file_exists("$pw[1]/housepanel.css") ) {
                $pwords[$un] = array($pw[0], $skin);
            } else {
                $userskin = $pw[1];
                if ( $version < 2.1 && $userskin!==$skin ) {
                    fixCustomCss($userskin);
                }
            }
        }
        $options["config"]["pword"] = $pwords;
        
        // add special count if not there
        if ( !array_key_exists("specialtiles", $options["config"]) ) {
            $specialtiles = getSpecials();
            $specialcounts = array();
            foreach ($specialtiles as $stype => $sid) {
                $specialcounts[$stype] = 4;
            }
            $options["config"]["specialtiles"] = $specialcounts;
        }
    
        // make the room config file to support custom users
        if ( isset($_COOKIE["uname"]) && trim($_COOKIE["uname"]) ) {
            
            $uname = trim($_COOKIE["uname"]);
            if ( $reset ) {
                $customfname = "hm_" . $uname . ".cfg";
                $fc = fopen($customfname,"wb");
                $str_rooms = json_encode($options["rooms"]);
                $str_things = json_encode($options["things"]);
                fwrite($fc, $str_rooms . "\n" . $str_things);
                fflush($fc);
                fclose($fc);
            } else {
                $customfname = "hm_" . $uname . ".cfg";
                
                // read this assuming old or new method - either will work
                if ( file_exists($customfname) ) {
                    $fc = fopen($customfname,"rb");
                    $str = fgets($fc);
                    $str = str_replace(array("\n","\r","\t"), "", $str);
                    $opts = json_decode($str, true);
                    
                    // if this is missing the signature it must be old format
                    if ( !array_key_exists("::CUSTOM::", $opts) ) {
                        $opt_rooms = $opts;
                        $str_things = fgets($fc); 
                        $str_things = str_replace(array("\n","\r","\t"), "", $str_things);
                        $opt_things = json_decode($str_things, true);
                        fclose($fc);

                        // load in custom room settings
                        // custom thing settings is done below
                        $options["rooms"] = $opt_rooms;
                        
                    // read the new format by extracting rooms, things, and user_ items 
                    } else {
                        if (array_key_exists("rooms", $opts)) {
                            $opt_rooms = $opts["rooms"];
                        }
                        if (array_key_exists("things", $opts)) {
                            $opt_things = $opts["things"];
                        }
                        foreach ($opts as $key => $content) {
                            if ( substr($key,0,5)==="user_" ) {
                                $options[$key] = $content;
                            }
                        }
                    }
                    
                    if ( $opt_rooms && $opt_things ) {
                        $options["rooms"] = $opt_rooms;
                        $options["things"] = array();
                       
                        // protect against having a custom name and an empty custom user name
                        foreach ($opt_rooms as $room => $ridx) {
                            if ( array_key_exists($room, $opt_things) ) {
                                $things = $opt_things[$room];
                                $newthings = array();
                                foreach ($things as $kindexarr) {
                                    // check for a blank custom name
                                    if ( is_array($kindexarr) && count($kindexarr)>3 && $kindexarr[4]==="" ) {
                                        $kindex = $kindexarr[0];
                                        $oldthings = $oldthingsarr[$room];
                                        foreach($oldthings as $okidx) {
                                            if ( is_array($okidx) && $okidx[0]===$kindex && count($okidx)>3 && $okidx[4] ) {
                                               $kindexarr[4] = $okidx[4]; 
                                            }
                                        }
                                    }
                                    $newthings[] = $kindexarr;
                                }
                                $options["things"][$room] = $newthings;
                            }
                        }
                    }

                }
            }
        }
        
    } else {
        $options = false;
    }
    return $options;
}

function writeOptions($options) {
    $options["time"] = HPVERSION . " @ " . strval(time());
//    $_SESSION["hmoptions"] = $options;
    $f = fopen("hmoptions.cfg","wb");
    if ( defined(JSON_PRETTY_PRINT) ) {
        $str =  json_encode($options, JSON_PRETTY_PRINT);
        fwrite($f, $str);
    } else {
        $str =  json_encode($options);
        fwrite($f, cleanupStr($str));
    }
    fflush($f);
    fclose($f);
//    chmod($f, 0777);
    
    // make the room config file to support custom users
    // this can now be pretty printed but I don't
    if ( isset($_COOKIE["uname"]) ) {
        $uname = trim($_COOKIE["uname"]);
        if ( $uname ) {
            $customfname = "hm_" . $uname . ".cfg";
            $fc = fopen($customfname,"wb");
            
            // change this format to be real json and include user_ tiles
            // add a signature key to flag this format
            // commented code below is the old method that didn't include customizations
            $customopt = array();
            $customopt["::CUSTOM::"] = array($uname, HPVERSION, strval(time()));
            foreach ($options as $key => $content) {
                if ( $key==="rooms" || $key==="things" || substr($key,0,5)==="user_" ) {
                    $customopt[$key] = $content;
                }
            }
            $str_customopt = json_encode($customopt);
            fwrite($fc, $str_customopt);
//            $str_rooms = json_encode($options["rooms"]);
//            $str_things = json_encode($options["things"]);
//            fwrite($fc, $str_rooms . "\n" . $str_things);
            fflush($fc);
            fclose($fc);
        }
    }
    
}

// make the string easier to look at
function cleanupStr($str) {
    $str1 = str_replace(",\"",",\r\n\"",$str);
    $str2 = str_replace(":{\"",":{\r\n\"",$str1);
    // $str3 = str_replace("\"],","\"],\r\n",$str2);
    return $str2;
}

// call to write Custom Css Back to customtiles.css
// we actually write two copies - one saved in the skin for skin swapping
function writeCustomCss($skin, $str) {
    $today = date("F j, Y  h:i:s A");
    $fixstr = "";
    $ipos = strpos($str, "*---*/");
    if ( !$str || $ipos===false ) {
        $fixstr.= "/* HousePanel Generated Tile Customization File */\n";
        if ( $str ) {
            $fixstr.= "/* Updated: $today *---*/\n";
        } else {
            $fixstr.= "/* Created: $today *---*/\n";
        }
        $fixstr.= "/* ********************************************* */\n";
        $fixstr.= "/* ****** DO NOT EDIT THIS FILE DIRECTLY  ****** */\n";
        $fixstr.= "/* ****** EDITS MADE MAY BE REPLACED      ****** */\n";
        $fixstr.= "/* ****** WHENEVER TILE EDITOR IS USED    ****** */\n";
        $fixstr.= "/* ********************************************* */\n";
    } else {
        $fixstr.= "/* HousePanel Generated Tile Customization File */\n";
        $fixstr.= "/* Updated: $today *---*/\n";
        $ipos = $ipos + 7;
        $str = substr($str, $ipos);
    }

    // fix addition of backslashes before quotes on some servers
    // also, old custom skins used the directory of the skin in URL references
    // but this no longer works because the css file is now left in the skin folder
    // so we remove all references to rewrite the file
    if ( $str && strlen($str) ) {
        $str3 = str_replace("\\\"","\"",$str);
        $str4 = str_replace($skin . "/", "", $str3);
        $fixstr.= $str4;
    }
    
    // write to specific skin folder if the location is valid
    if ( $skin && file_exists("$skin/housepanel.css") ) {
        file_put_contents("$skin/customtiles.css", $fixstr);
    }
}

// read in customtiles ignoring the comments
// updated this to properly treat /*   */ comment blocks
function readCustomCss($skin) {
    $contents = file_get_contents("$skin/customtiles.css");
    return $contents;
}

// old custom skins used the directory of the skin in URL references
// but this no longer works because the css file is now left in the skin folder
// so we remove all references to rewrite the file
function fixCustomCss($skin) {
    $contents = file_get_contents("$skin/customtiles.css");
    $fixstr = str_replace($skin . "/", "", $contents);
    file_put_contents("$skin/customtiles.css", $fixstr);
}

// get the active user and skin
function getSkin($options, $uname="") {
    if ( !$uname && isset($_COOKIE["uname"]) ) {
        $uname = $_COOKIE["uname"];
    }
    $pwords = $options["config"]["pword"];
    if ( !$pwords || !is_array($pwords) || count($pwords)===0 ) {
        $skin = "skin-housepanel";
    } else if ( $uname && array_key_exists($uname, $pwords) ) {
        $pword = $pwords[$uname];
        if ( is_array($pword) ) {
            $skin = $pword[1];
        } else {
            $skin = $options["config"]["skin"];
        }
    } else {
        $skin = "skin-housepanel";
    }
    return $skin;
}

function refactorOptions($allthings) {
// new routine that renumbers all the things in your options file from 1
// NOTE: this also affects the custom tile settings
//       refactor now also modifies customtiles.css by reading and writing it
//       the user custom setup file is also reset to the main one

    // load in custom css strings
    $updatecss = false;
    $thingtypes = getTypes();
    $cnt = 0;
    $options = readOptions(true);
    $oldoptions = $options;
    $options["useroptions"] = $thingtypes;
    $options["things"] = array();
    $options["index"] = array();
    $skin = getSkin($options);
    $customcss = readCustomCss($skin);

    foreach ($oldoptions["index"] as $thingid => $idxarr) {
        
        // only keep items that are in our current set of hubs
        if ( array_key_exists($thingid, $allthings) ) {
        
            $cnt++;
            // fix the old system that could have an array for idx
            // discard any position that was saved under that system
            if ( is_array($idxarr) ) {
                $idx = intval($idxarr[0]);
            } else {
                $idx = intval($idxarr);
            }

            // replace all instances of the old "idx" with the new "cnt" in customtiles
            if ( $customcss && $idx!==$cnt ) {
                $customcss = str_replace(".p_$idx.", ".p_$cnt.", $customcss);
                $customcss = str_replace(".p_$idx ", ".p_$cnt ", $customcss);

                $customcss = str_replace(".v_$idx.", ".v_$cnt.", $customcss);
                $customcss = str_replace(".v_$idx ", ".v_$cnt ", $customcss);

                $customcss = str_replace(".t_$idx.", ".t_$cnt.", $customcss);
                $customcss = str_replace(".t_$idx ", ".t_$cnt ", $customcss);

                $customcss = str_replace(".n_$idx.", ".n_$cnt.", $customcss);
                $customcss = str_replace(".n_$idx ", ".n_$cnt ", $customcss);

                $updatecss = true;
            }

            // save the index number - fixed prior bug that only did this sometimes
            $options["index"][$thingid] = $cnt;
        }
    }

    // now replace all the room configurations
    // this is done separately now which is much faster and less prone to error
    foreach ($oldoptions["things"] as $room => $thinglist) {
        $options["things"][$room] = array();
        foreach ($thinglist as $key => $pidpos) {
            $zindex = 1;
            $customname = "";
            if ( is_array($pidpos) ) {
                $pid = intval($pidpos[0]);
                $postop = intval($pidpos[1]);
                $posleft = intval($pidpos[2]);
                if ( count($pidpos) > 4 ) {
                    $zindex = intval($pidpos[3]);
                    $customname = $pidpos[4];
                }
            } else {
                $pid = intval($pidpos);
                $postop = 0;
                $posleft = 0;
            }

            $thingid = array_search($pid, $oldoptions["index"]);
            if ( $thingid!==false && array_key_exists($thingid, $options["index"]) ) {
                $newid = $options["index"][$thingid];
                // use the commented code below if you want to preserve any user movement
                // otherwise a refactor call resets all tiles to their baseeline position  
                // $options["things"][$room][$key] = array($newid,$postop,$posleft,$zindex,"");
                $options["things"][$room][$key] = array($newid,0,0,1,$customname);
            }
        }
    }
    
    // now adjust all custom configurations
    // this will only work for new types of user_ customizations
    // it will not adjust old school custom_ manual ones other than custom_
    foreach ($oldoptions as $key => $lines) {
        if ( ( substr($key,0,5)==="user_" || substr($key,0,7)==="custom_" ) &&
               is_array($lines) ) {
            
            // allow user to skip wrapping single entry in an array
            if ( !is_array($lines[0]) ) {
                $lines = array($lines);
            }
            $newlines = array();
            foreach ($lines as $msgs) {
                $calltype = trim(strtoupper($msgs[0]));
                
                // switch to new index for links
                // otherwise we just copy the info over to options
                if ( $calltype==="LINK" ) {
                    $linkid = intval(trim($msgs[1]));
                    $thingid = array_search($linkid, $oldoptions["index"]);
                    if ( $thingid!==false && array_key_exists($thingid, $options["index"]) ) {
                        $msgs[1] = $options["index"][$thingid];
                    }
                }
                $newlines[] = $msgs;
            }
            $options[$key] = $newlines;
        }
    }
    
    // save our updated options and our custom style sheet file
    writeOptions($options);
    writeCustomCss($skin, $customcss);
    
}

function createSpecialIndex($customcnt, $stype, $spid, $options) {
    $n = strlen($stype) + 1;
    $oldindex = $options["index"];

    // remove all special types of this type
    foreach ($oldindex as $idx => $tileid) {
        if ( substr($idx,0,$n) === $stype . "|" ) {
            unset($options["index"][$idx]);
        }
    }
    $maxindex = getMaxIndex($options);
    if ( !array_key_exists("specialtiles", $options["config"]) ) {
        $options["config"]["specialtiles"] = array($stype => $customcnt);
    } else {
        $options["config"]["specialtiles"][$stype] = $customcnt; 
    }

    // add back in the requested number
    for ( $i=0; $i<$customcnt; $i++) {
        $k = strval($i + 1);
        $fid = $spid . $k;
        $sidnum = $stype . "|" . $fid;
        if ( array_key_exists($sidnum, $oldindex) ) {
            $theindex = intval($oldindex[$sidnum]);
            if ( $theindex > $maxindex ) {
                $maxindex= $theindex;
            }
        } else {
            $maxindex++;
            $theindex = $maxindex;
        }
        $options["index"][$sidnum] = $theindex;
    }
    return $options;
}

function getOptions($options, $newthings) {
    
    // get list of supported types
    $thingtypes = getTypes();
    
    // make all the user options visible by default
    if ( !key_exists("useroptions", $options )) {
        $options["useroptions"] = $thingtypes;
    }

    // find the largest index number for a sensor in our index
    // and undo the old flawed absolute positioning
    $cnt = getMaxIndex($options);
    $cnt++;

    // set zindex and custom names if not there
    // set positions too if the file is really old
    $copyopts = $options["things"];
    foreach ($copyopts as $roomname => $thinglist) {
        foreach ($thinglist as $n => $idxarray) {
            if ( !is_array($idxarray) ) {
                $idx = array($idxarray, 0, 0, 1, "");
                $options["things"][$roomname][$n] = $idx;
            } else if ( is_array($idxarray) && count($idxarray)===3 ) {
                $idx = array($idxarray[0], $idxarray[1], $idxarray[2], 1, "");
                $options["things"][$roomname][$n] = $idx;
            }
        }
    }

    // update the index with latest sensor information
    foreach ($newthings as $thingid =>$thesensor) {
        if ( !key_exists($thingid, $options["index"]) ||
             intval($options["index"][$thingid])===0 ) {
            $options["index"][$thingid] = $cnt;
            $cnt++;
        }
    }
    
    // make exactly the right number of special tiles
    $specialtiles = getSpecials();
    // $oldindex = $options["index"];
    foreach ($specialtiles as $stype => $sid) {
        $customcnt = getCustomCount($stype, $options);
        $spid = $sid[0];
        $options = createSpecialIndex($customcnt, $stype, $spid, $options);
    }

    return $options;
}

function setDefaults($options, $allthings) {

    // generic room setup
    $defaultrooms = array(
        "Kitchen" => "clock|kitchen|sink|pantry|dinette" ,
        "Family" => "clock|family|mud|fireplace|casual|thermostat",
        "Living" => "clock|living|dining|entry|front door|foyer",
        "Office" => "clock|office|computer|desk|work",
        "Bedrooms" => "clock|bedroom|kid|kids|bathroom|closet|master|guest",
        "Outside" => "clock|garage|yard|outside|porch|patio|driveway|weather",
        "Music" => "clock|sonos|music|tv|television|alexa|echo|stereo|bose|samsung|pioneer"
    );
    
    // make a default options array based on the old logic
    // protocol for the options array is an array of room names
    // where each item is an array with the first element being the order number
    // second element is an optional alternate name defaulted to room name
    // each subsequent item is then a tuple of ST id and ST type
    // encoded as ST-id|ST-type to enable an easy quick text search
    $options["rooms"] = array();
    $options["things"] = array();
    $k= 0;
    foreach(array_keys($defaultrooms) as $room) {
        $options["rooms"][$room] = $k;
        $options["things"][$room] = array();
        $k++;
    }

    foreach ($allthings as $thingid =>$thesensor) {
        $thename= $thesensor["name"];
        $k = $options["index"][$thingid];
        if ( $k ) {
            foreach($defaultrooms as $room => $regexp) {
                $regstr = "/(".$regexp.")/i";
                if ( preg_match($regstr, $thename) ) {
                    $options["things"][$room][] = array($k,0,0,1,"");
                }
            }
        }
    }
        
    return $options;
}

function getTypes() {
    $thingtypes = array("routine","switch", "light", "switchlevel", "bulb", "momentary","contact",
                        "motion", "lock", "thermostat", "temperature", "music", "valve",
                        "door", "illuminance", "smoke", "water",
                        "weather", "presence", "mode", "shm", "hsm", "piston", "other",
                        "clock", "blank", "image", "frame", "video", "custom", "control", "power");
    return $thingtypes;
}

function getSpecials() {
    $specialtiles = array("video" =>array("vid",480,240), 
                          "frame" =>array("frame",480,212),
                          "image" =>array("img",480,240),
                          "blank" =>array("blank",120,150),
                          "custom"=>array("custom_",120,150));
    return $specialtiles;
}

function mysortfunc($cmpa, $cmpb) {
    $thingtypes = getTypes();
    $namea = $cmpa["name"];
    $typea = $cmpa["type"];
    $nameb = $cmpb["name"];
    $typeb = $cmpb["type"];
    $k1 = array_search($typea, $thingtypes);
    $k2 = array_search($typeb, $thingtypes);
    
    $t = $k1*100 - $k2*100;
    if ($namea < $nameb) $t--;
    if ($namea > $nameb) $t++;
    if ($t ==0 ) $t= 1;
    return $t;
}

function getCustomCount($stype, $options) {
    if ( array_key_exists("specialtiles", $options["config"]) ) {
        $specialarr = $options["config"]["specialtiles"];
        if ( array_key_exists($stype, $specialarr) ) {
            $customcnt = intval($specialarr[$stype]);
            if ( !$customcnt || $customcnt < 1 ) { 
                $customcnt = 0; 
            }
        } else {
            $customcnt = 0;
        }
    } else {
        $customcnt = 0;
    }
    return $customcnt;
}

function getOptionsPage($options, $retpage, $allthings, $sitename) {
    
    // show an option tabls within a form
    // $tc.= "<div id=\"options-tab\">";
    $thingtypes = getTypes();
    $specialtiles = getSpecials();
    sort($thingtypes);
    $roomoptions = $options["rooms"];
    $thingoptions = $options["things"];
    $indexoptions = $options["index"];
    $useroptions = $options["useroptions"];
    $configoptions = $options["config"];
    $skin = getSkin($options);
    $kioskoptions = $configoptions["kiosk"];
    $hubs = $configoptions["hubs"];
    
    $tc = "";
    $tc.= "<h3>" . APPNAME . " Options</h3>";
    $tc.= "<div class=\"formbutton formauto\"><a href=\"$retpage\">Cancel and Return to HousePanel</a></div>";
    
    $tc.= "<div id=\"optionstable\" class=\"optionstable\">";
    $tc.= "<form id=\"optionspage\" class=\"options\" name=\"options" . "\" action=\"$retpage\"  method=\"POST\">";
    $tc.= hidden("options",1);
    $tc.= hidden("returnURL", $retpage);
    $tc.= hidden("pagename", "options");
    $tc.= hidden("useajax", "saveoptions");
    $tc.= hidden("id", "none");
    $tc.= hidden("type", "none");
    $tc.= "<div class=\"filteroption\">Skin directory name: <input id=\"skinid\" width=\"240\" type=\"text\" name=\"skin\"  value=\"$skin\"/>";
    $tc.= "<label for=\"kioskid\" class=\"kioskoption\">Kiosk Mode: </label>";
    
    $kstr = ($kioskoptions===true || $kioskoptions=="true" || $kioskoptions==="1" || $kioskoptions==="yes") ? "checked" : "";
    $tc.= "<input id=\"kioskid\" width=\"24\" type=\"checkbox\" name=\"kiosk\"  value=\"$kioskoptions\" $kstr/>";
    $tc.= "</div>";
    
    $tc.= "<div class=\"filteroption\">Accuweather City: <input id=\"accucityid\" width=\"120\" type=\"text\" name=\"accucity\"  value=\"\"/>";
    $tc.= " Region: <input id=\"accuregionid\" width=\"6\" type=\"text\" name=\"accuregion\"  value=\"us\"/>";
    $tc.= " Code: <input id=\"accucodeid\" width=\"40\" type=\"text\" name=\"accucode\"  value=\"329380\"/>";
    $tc.= "<br><span class='typeopt'>(The Code above is only good for ann-arbor-mi You must find your code to use this feature.)</span>";
    $tc.= "</div>";
    
    $tc.= "<div class=\"filteroption\">";
    foreach ($specialtiles as $stype => $sid) {
        $customcnt = getCustomCount($stype, $options);
        $stypeid = "cnt_" . $stype;
        $tc.= "<br /><label for=\"$stypeid\" class=\"kioskoption\">Number of $stype tiles: </label>";
        $tc.= "<input class=\"specialtile\" id=\"$stypeid\" name=\"$stypeid\" width=\"10\" type=\"number\"  min='0' max='99' step='1' value=\"$customcnt\" />";
    }
    $tc.= "</div>";
    
    $tc.= "<br /><div class=\"filteroption\">Option Filters: ";
    $tc.= "<div id=\"allid\" class=\"smallbutton\">All</div>";
    $tc.= "<div id=\"noneid\" class=\"smallbutton\">None</div>";
    $tc.= "</div>";
    $tc.= "<table class=\"useroptions\"><tr>";
    $i= 0;
    foreach ($thingtypes as $opt) {
        $i++;
        if ( in_array($opt,$useroptions ) ) {
            $tc.= "<td><input type=\"checkbox\" name=\"useroptions[]\" value=\"" . $opt . "\" checked=\"1\"></td>";
        } else {
            $tc.= "<td><input type=\"checkbox\" name=\"useroptions[]\" value=\"" . $opt . "\"></td>";
        }
        $tc.= "<td class=\"optname\">" .  $opt . "</td>";
        if ( $i % 5 == 0 && $i < count($thingtypes) ) {
            $tc.= "</tr><tr>";
        }
    }
    $tc.= "</tr></table>";
    
    $tc.= "<br /><br />";
    $tc.= "<table class=\"headoptions\"><thead>";
    $tc.= "<tr><th class=\"thingname\">" . "Thing Name (type)" . "</th>";
    $tc.= "<th class=\"hubname\">Hub</th>";
   
    // list the room names in the proper order
    // for ($k=0; $k < count($roomoptions); $k++) {
    foreach ($roomoptions as $roomname => $k) {
        // search for a room name index for this column
        // $roomname = array_search($k, $roomoptions);
        if ( $roomname ) {
            $tc.= "<th class=\"roomname\">$roomname";
            $tc.= "</th>";
        }
    }
    $tc.= "</tr></thead>";
    $tc.= "</table>";
    $tc.= "<div class='scrollvtable'>";
    $tc.= "<table class=\"roomoptions\">";
    $tc.= "<tbody>";

    // sort the things
    uasort($allthings, "mysortfunc");
    
    // now print our options matrix
    // $rowcnt = 0;
    $evenodd = true;
    foreach ($allthings as $thingid => $thesensor) {
        // if this sensor type and id mix is gone, skip this row
        
        $thingname = $thesensor["name"];
        $thetype = $thesensor["type"];
        $hubnum = $thesensor["hubnum"];
        $hub = $hubs[findHub($hubnum, $hubs)];
        if ( $hubnum === -1 ) {
            $hubType = "None";
            $hubStr = "None";
        } else {
            $hubType = $hub["hubType"];
            $hubStr = $hub["hubName"];
        }

        // get the tile index number
        $arr = $indexoptions[$thingid];
        if ( is_array($arr) ) {
            $thingindex = $arr[0];
        } else {
            $thingindex = $arr;
        }
        
        // write the table row
        if ( array_key_exists($thetype, $specialtiles) ) {
            $special = " special";
        } else {
            $special = "";
        }
        if (in_array($thetype, $useroptions)) {
            $evenodd = !$evenodd;
            $evenodd ? $odd = " odd" : $odd = "";
            $tc.= "<tr type=\"$thetype\" tile=\"$thingindex\" class=\"showrow" . $odd . $special . "\">";
        } else {
            $tc.= "<tr type=\"$thetype\" tile=\"$thingindex\" class=\"hiderow" . $special . "\">";
        }
        
        $tc.= "<td class=\"thingname\">";
        $tc.= $thingname . "<span class=\"typeopt\"> (" . $thetype . ")</span>";
        $tc.= "</td>";
        
        $tc.="<td class=\"hubname\">";
        $tc.= $hubStr . "<br><span class=\"typeopt\">(" . $hubnum . ": " . $hubType . ")</span>";
        $tc.= "</td>";

        // loop through all the rooms
        // this addresses room bug
        // for ($k=0; $k < count($roomoptions); $k++) {
        foreach ($roomoptions as $roomname => $k) {
            
            // get the name of this room for this oclumn
            // $roomname = array_search($k, $roomoptions);
            // $roomlist = array_keys($roomoptions, $k);
            // $roomname = $roomlist[0];
            if ( array_key_exists($roomname, $thingoptions) ) {
                $things = $thingoptions[$roomname];
                                
                // now check for whether this thing is in this room
                $tc.= "<td>";
                
                $ischecked = false;
                foreach( $things as $arr ) {
                    if ( is_array($arr) ) {
                        $idx = $arr[0];
                    } else {
                        $idx = $arr;
                    }
                    if ( $idx == $thingindex ) {
                        $ischecked = true;
                        break;
                    }
                }
                
                if ( $ischecked ) {
                    $tc.= "<input type=\"checkbox\" name=\"" . $roomname . "[]\" value=\"" . $thingindex . "\" checked=\"1\" >";
                } else {
                    $tc.= "<input type=\"checkbox\" name=\"" . $roomname . "[]\" value=\"" . $thingindex . "\" >";
                }
                $tc.= "</td>";
            }
        }
        $tc.= "</tr>";
    }

    $tc.= "</tbody></table>";
    $tc.= "</div>";   // vertical scroll
    $tc.= "<div id='optionspanel' class=\"processoptions\">";
    $tc.= "<input id=\"submitoptions\" class=\"submitbutton\" value=\"Save\" name=\"submitoption\" type=\"button\" />";
    $tc.= "<div class=\"formbutton resetbutton\"><a href=\"$retpage\">Cancel</a></div>";
    $tc.= "<input class=\"resetbutton\" value=\"Reset\" name=\"canceloption\" type=\"reset\" />";
    $tc.= "</div>";
    $tc.= "</form>";
    $tc.= "</div>";

    return $tc;
}

// returns true if the index is in the room things list passed
function inroom($idx, $things) {
    $found = false;
    $idxint = intval($idx);
    foreach ($things as $arr) {
        $thingindex = is_array($arr) ? $arr[0] : intval($arr);
        if ( $idxint === $thingindex ) {
            $found = true;
            break;
        }
    }
    return $found;
}

// this returns a hub index based on its unique id
// if not found it gives the first hub
function findHub($hubId, $hubs) {
    $num = 0;
    foreach($hubs as $hub) {
        if ( strval($hub["hubId"]) === strval($hubId) ) {
            return $num;
        }
        $num++;
    }
    return 0;
}

// update the hubs array with a new hub value of a certain ID
// if not found the hub is added
function updateHubs($hubs, $newhub, $oldid) {
    $num = 0;
    foreach($hubs as $hub) {
        if ( strval($hub["hubId"]) === strval($oldid) ) {
            $hubs[$num] = $newhub;
            return $hubs;
        }
        $num++;
    }
    $hubs[] =  $newhub;
    return $hubs;
}

function addThing($bid, $thingtype, $panel, $cnt, $allthings) {
    
    $idx = $thingtype . "|" . $bid;
    $options = readOptions();
    $tilenum = intval($options["index"][$idx], 10);
    $thesensor = $allthings[$idx];
    $tilename = $thesensor["name"];
    
    // make sure tile number is big
    if ( ! is_numeric($cnt) ) {
        $cnt = substr($cnt,2);
    }
    $cnt = intval($cnt, 10);

    $options["things"][$panel] = array_values($options["things"][$panel]);
    $lastid = count( $options["things"][$panel] ) - 1;
    $lastitem = $options["things"][$panel][$lastid];
    $ypos  = intval($lastitem[1], 10);
    $xpos = intval($lastitem[2], 10);
    if ( count($lastitem) > 3 ) {
        $zindex = intval($lastitem[3], 10);
    } else {
        $zindex = 1;
    }
    if ( $xpos < -400 || $xpos > 400 || $ypos < -400 || $ypos > 400 ) {
        $xpos = 0;
        $ypos = 0;
    }
    
    // add it to our system
    $options["things"][$panel][] = array($tilenum, $ypos, $xpos, $zindex, $tilename);
    writeOptions($options);
    
    // make a new tile based on the dragged information
    $thing = makeThing($idx, $cnt, $tilenum, $thesensor, $panel, $options, $ypos, $xpos, $zindex, "");
    
    return $thing;
}

function delThing($bid, $thingtype, $panel, $tile) {
    
    $idx = $thingtype . "|" . $bid;
    $options = readOptions();
    $retcode = "error";
    
    if ( $panel && array_key_exists($panel, $options["things"]) &&
                   array_key_exists($idx, $options["index"]) ) {

        // as a double check the options file tile should match
        // if it doesn't then something weird triggered drag drop
        $tilenum = $options["index"][$idx];
        if ( $tile == $tilenum ) {

            // remove tile from this room
            foreach ( $options["things"][$panel] as $key => $thing) {
                if ( (is_array($thing) && $thing[0]==$tilenum) ||
                     (!is_array($thing) && $thing==$tilenum) ) {
                    unset( $options["things"][$panel][$key] );
                    $retcode = "success";
                    break;
                }
            }   

            if ( $retcode == "success" ) {
                $options["things"][$panel] = array_values($options["things"][$panel]);
                writeOptions($options);
            }
        }
    }
    return $retcode;
}

function delPage($pagenum, $pagename) {
    
    $pagenum = intval($pagenum);
    $options = readOptions();

    // check if room exists - ignore number matches
    if ( array_key_exists($pagename, $options["rooms"]) &&
         array_key_exists($pagename, $options["things"]) ) {

        unset( $options["rooms"][$pagename] );
        unset( $options["things"][$pagename] );
        writeOptions($options);
        $retcode = "success";
    } else {
        $retcode = "error - cannot find $pagename to delete.";
    }
    return $retcode;
}

function addPage() {
    
    $pagenum = 0;
    $options = readOptions();
    
    // get the largest room number
    foreach ($options["rooms"] as $roomname => $roomnum ) {
        $roomnum = intval($roomnum);
        $pagenum = $roomnum > $pagenum ? $roomnum : $pagenum;
    }
    $pagenum++;

    // get new room default name in sequential order
    $newname = "Newroom1";
    $num = 1;
    while ( array_key_exists($newname, $options["rooms"]) ) {
        $num++;
        $newname = "Newroom" . strval($num);
    }
    $options["rooms"][$newname] = $pagenum;
    $options["things"][$newname] = array();
    
    // put a digital clock in all new rooms so they are not empty
    $clockid = $options["index"]["clock|clockdigital"];
    $options["things"][$newname][] = array($clockid, 0, 0, 1, "");
    writeOptions($options);
    
    return $newname;
}

// returns the maximum index from the options
function getMaxIndex($options) {
    $maxindex = 0;
    foreach ( $options["index"] as $key => $var ) {
        $intvar = intval($var);
        $maxindex = ( $intvar > $maxindex ) ? $intvar : $maxindex;
    }
    return $maxindex;
}

// this processes a _POST return from the options page
function processOptions($optarray) {
    if (DEBUG4) {
        // echo "<html><body>";
        echo "<h2>Debug Print for Options Returned</h2><pre>";
        print_r($optarray);
        echo "</pre>";
        // exit(0);
    }
    $thingtypes = getTypes();
    $oldoptions = readOptions();
    
    // make an empty options array for saving
    $options = $oldoptions;
    $options["things"] = array();
    // $options["useroptions"] = $thingtypes;
    $roomnames = array_keys($options["rooms"]);
    $indexoptions = $oldoptions["index"];
    $specialtiles = getSpecials();
    if ( array_key_exists("specialtiles", $oldoptions["config"]) ) {
        $specialcounts = $oldoptions["config"]["specialtiles"];
    } else {
        $specialcounts = array();
        foreach ($specialtiles as $stype) {
            $specialcounts[$stype] = 4;
        }
        $oldoptions["config"]["specialtiles"] = $specialcounts;
        $options["config"]["specialtiles"] = $specialcounts;
    }
    
    // use clock instead of blank for default only tile
    $onlytile = $oldoptions["index"]["clock|clockdigital"];
    
    // fix long-standing bug by putting a clock in any empty room
    // to force the form to return each room defined in options file
    foreach(array_keys($oldoptions["rooms"]) as $room) {
        $options["things"][$room] = array();
        $options["things"][$room][] = array($onlytile,0,0,1,"");
    }

    // get all the rooms checkboxes and reconstruct list of active things
    // note that the list of checkboxes can come in any random order
    $options["config"]["kiosk"] = "false";
    foreach($optarray as $key => $val) {
        //skip the returns from the submit button and the flag
        if ($key==="options" || $key==="submitoption" || $key==="submitrefresh" ||
            $key==="allid" || $key==="noneid" || $key==="accuregion" || $key==="accucode" ) { continue; }
        
        // set skin
        if ($key==="skin") {
            $skin = $val;
            
            // change the skin if there is a housepanel.css file in that folder
            if ( $skin && file_exists($skin . "/housepanel.css") ) {
                // make sure our default skin has a custom file
                if ( !file_exists($skin . "/customtiles.css") ) {
                    writeCustomCss($skin, "");
                }
                
                // default skin option is updated
                $options["config"]["skin"] = $skin;
                
                // save the skin in my user specific setting
                $uname = $_COOKIE["uname"];
                $pwords = $options["config"]["pword"];
                if ( array_key_exists($uname, $pwords) ) {
                    $pwords[$uname][1] = $skin;
                    $options["config"]["pword"] = $pwords;
                }
            }
            
        }
        else if ( $key==="kiosk") {
            $options["config"]["kiosk"] = "true";
        }
        
        // write the frame2 html file
        else if ($key==="accucity") {
            $city = $val;
            $region = $optarray["accuregion"];
            $code = $optarray["accucode"];
            if ( $city && $region && $code ) {
                getAccuWeather($city, $region, $code);
            }
        }
        
        // handle user selected special tile count
        else if ( substr($key,0,4)==="cnt_" ) {
            $stype = substr($key,4);
            if ( array_key_exists($stype, $specialtiles) ) {
                $spid = $specialtiles[$stype][0];
                $oldcnt = $specialcounts[$stype];
                $customcnt = intval($val);
                if ( $customcnt !== $oldcnt ) {
                    $options = createSpecialIndex($customcnt, $stype, $spid, $options);
                    // $oldoptions = $options;
                }
                
            }
        }
        
        else if ( $key==="useroptions" && is_array($val) ) {
            $newuseroptions = $val;
            $options["useroptions"] = $newuseroptions;
        }
        // made this more robust by checking room name being valid
        // and if the value is an array it must be a room name with
        // else if ( is_array($val) ) {
        else if ( in_array($key, $roomnames) && is_array($val) ) {
            $roomname = $key;
            $options["things"][$roomname] = array();
            
            // first save the existing order of tiles if still there
            // this will preserve user drag and drop positions
            // but if a tile is removed then all tiles after it will be
            // shown shifted as a result
            $lasttop = 0;
            $lastleft = 0;
            $lastz = 1;
            if ($oldoptions) {
                $oldthings = $oldoptions["things"][$roomname];
                foreach ($oldthings as $arr) {
                    $zindex = 1;
                    $customname = "";
                    if ( is_array($arr) ) {
                        $tilenum = intval($arr[0],10);
                        $postop = $arr[1];
                        $posleft = $arr[2];
                        if ( count($arr) > 3) {
                            $zindex = $arr[3];
                            $customname = $arr[4];
                        }
                    } else {
                        $tilenum = intval($arr,10);
                        $postop = 0;
                        $posleft = 0;
                    }
                    if ( inroom($tilenum, $val) ) {
                        $options["things"][$roomname][] = array($tilenum,$postop,$posleft,$zindex,$customname);
                        $lasttop = $postop;
                        $lastleft = $posleft;
                        $lastz = $zindex;
                    }
                }
            }
            
            // add any new ones that were not there before
            // set position to next to last one unless it is moved a lot
            // the 400 distance is subjective but works in most cases
            $newthings = $options["things"][$roomname];
            if ( $lasttop < -400 || $lasttop > 400 || $lastleft < -400 || $lastleft > 400 ) {
                $lasttop = 0;
                $lastleft = 0; 
            }
            foreach ($val as $tilestr) {
                $tilenum = intval($tilestr,10);
                if ( ! inroom($tilenum, $newthings) ) {
                        $options["things"][$roomname][] = array($tilenum,$lasttop,$lastleft, $lastz, "");
                }
            }
            
            // put a clock in a room if it is empty
            if ( count($options["things"][$roomname]) == 0  ) {
                $options["things"][$roomname][] = array($onlytile,0,0,1,"");
            }
        }
    }
    if (DEBUG4) {
        // echo "<html><body>";
        echo "<h2>Debug Print for New Options Created</h2><pre>";
        print_r($options);
        echo "</pre>";
    }

    // write options to file
    writeOptions($options);
    
    // refresh the main array
    getAllThings(true);
}

function putStats($hub) {
    if ( $hub["hubType"] === "new" || !$hub["clientId"] ) {
        return;
    }
    // make call to housepanel.net to capture usage stats
    $host = "http://www.housepanel.net/userstats.php";
    $headertype = "Content-Type: application/x-www-form-urlencoded";
    $time = strval(time());
    $hubinfo = md5($hub["hubId"]);
    $signature = md5($time . HPVERSION);
    $nvpreq = "hub=" . urlencode($hubinfo) . 
              "&time=" . urlencode($time) . 
              "&version=" . urlencode(HPVERSION) . 
              "&signature=" . urlencode($signature);
    curl_call($host, $headertype, $nvpreq, "POST");
}

function getInfoPage($returnURL, $allthings, $devhistory) {
    $options = readOptions();
    $configoptions = $options["config"];
    $pwords = $configoptions["pword"];
    $uname = $_COOKIE["uname"];
    $skin = getSkin($options);
    $hubs = $configoptions["hubs"];
    $specialtiles = getSpecials();
    
    $tc = "";
    $tc.= "<h3>" . APPNAME . " Information Display</h3>";
    // $tc.= "<button class=\"infobutton\">Return to HousePanel</button><br>";

    if ( defined("DONATE") && DONATE===true ) {
        $tc.= '<br /><br /><div><form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_blank">
            <input type="hidden" name="cmd" value="_s-xclick">
            <input type="hidden" name="hosted_button_id" value="XS7MHW7XPYJA4">
            <input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_donateCC_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
            <img alt="" border="0" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" width="1" height="1">
            </form></div>';
    }
    
    $tc.="<form>";
    $tc.= hidden("returnURL", $returnURL);
    $tc.= hidden("pagename", "info");
    $tc.= "</form>";
    $tc.= "<div class=\"infopage\">";
    if ($uname) {
        $tc.= "<div class='bold'>Username = $uname </div>";
    }
    $tc.= "<div class='bold'>Site url = $returnURL </div>";
    $tc.= "<div class='bold'>Skin folder = $skin </div>";
    $tc.= "<div class='bold'>" . count($hubs) . " Hubs active</div>";
    $tc.= "<hr />";
    
    foreach ($hubs as $num => $hub) {
        putStats($hub);
        $hubType = $hub["hubType"];
        $hubName = $hub["hubName"];
        $hubHost = $hub["hubHost"];
        $hubId = $hub["hubId"];
        $clientId = $hub["clientId"];
        $clientSecret = $hub["clientSecret"];
        $access_token = $hub["hubAccess"];
        $endpt = $hub["hubEndpt"];
        $tc.= "<div class='bold'>Hub #$num</div>";
        $tc.= "<div class='bold'>Hub Name = $hubName</div>";
        $tc.= "<div>Type = $hubType</div>";
        $tc.= "<div>Hub ID = $hubId</div>";
        $tc.= "<div>Hub Host URL = $hubHost </div>";
        $tc.= "<div>Client ID = $clientId </div>";
        $tc.= "<div>Client Secret = $clientSecret </div>";
        $tc.= "<div>AccessToken = $access_token </div>";
        $tc.= "<div>Endpoint = $endpt </div>";
        if ( ($num + 1) < count($hubs) ) {
            $tc.= "<hr />";
        }
    }
    $tc.= "</div>";
    
    $tc.= "<button class=\"showhistory\">Show History</button>";
    $tc.= "<div id=\"devhistory\" class=\"infopage hidden\">";
    $tc.= "<pre>$devhistory</pre>";
    $tc.= "</div>";
    
    $tc.= "<br><br><h3>List of Authorized Things</h3>";
    $tc.= "<table class=\"showid\">";
    $tc.= "<thead><tr><th class=\"thingname\">" . "Name" . "</th><th class=\"thingarr\">" . "Value Array" . 
          "</th><th class=\"infotype\">" . "Type" . 
          "</th><th class=\"infoid\">" . "Thing id" .
          "</th><th class=\"hubid\">" . "Hub" .
          "</th><th class=\"infonum\">" . "Tile Num" . "</th></tr></thead>";
    foreach ($allthings as $bid => $thing) {
        if (is_array($thing["value"])) {
            $value = "";
            foreach ($thing["value"] as $key => $val) {
                if ( array_key_exists($key, $specialtiles) ) {
                    $value.= $key . "= <strong>embedded $key</strong><br/>";
                } else {
                    if ( $thing["type"]==="custom" && is_array($val) ) { $val = "Custom Array... "; }
                    if ( strlen($val) > 128 ) {
                        $val = substr($val,0,124) . " ...";
                    }
                    $value.= $key . "=" . $val . "<br/>";
                }
            }
        } else {
            $value = $thing["value"];
            if ( strlen($value) > 128 ) {
                $value = substr($value,0,124) . " ...";
            }
        }
        // limit size of the field shown
        
        $hubnum = $thing["hubnum"];
        $hub = $hubs[findHub($hubnum, $hubs)];
        if ( $hubnum === -1 ) {
            $hubType = "None";
            $hubName = "None";
            $hubstr = $hubName . "<br><span class=\"typeopt\"> (" . $hubnum . ": " . $hubType . ")</span>";
        } else {
            $hubType = $hub["hubType"];
            $hubName = $hub["hubName"];
            $hubstr = $hubName . "<br><span class=\"typeopt\"> (" . $hubnum . ": " . $hubType . ")</span>";
        }
        
        // $idx = $thing["type"] . "|" . $thing["id"];
        $tc.= "<tr><td class=\"thingname\">" . $thing["name"] . 
              "</td><td class=\"thingarr\">" . $value . 
              "</td><td class=\"infotype\">" . $thing["type"] .
              "</td><td class=\"infoid\">" . $thing["id"] . 
              "</td><td class=\"hubid\">" . $hubstr . 
              "</td><td class=\"infonum\">" . $options["index"][$bid] . 
              "</td></tr>";
    }
    $tc.= "</table>";
    $tc.= "<button class=\"infobutton fixbottom\">Return to HousePanel</button>";
    if (DEBUG || DEBUG5) {
        $tc.= "<div class='debug'><b>json dump of each thing</b>";
        foreach ($allthings as $bid => $thing) {
            $tc.= "<div class='jsonid'>" . $bid . "</div>";
            $tc.= "<div class='jsondump'>" . json_encode($thing) . "</div>";
        }
        $tc.="</div>";
    }
    return $tc;
}

function changePageName($oldname, $pagename, &$options) {
    
    $roomnames = $options["rooms"];
    if ( $oldname && $pagename && array_key_exists($oldname, $roomnames) ) {
        $pagenum = $roomnames[$oldname];
        $retcode = true;
        $roomthings = $options["things"][$oldname];
        unset( $options["rooms"][$oldname] );
        unset( $options["things"][$oldname] );
        $options["rooms"][$pagename] = $pagenum;
        $options["things"][$pagename] = $roomthings;
        $prooms = $options["rooms"];
        asort($prooms);
        $options["rooms"] = $prooms;
        writeOptions($options);
    } else {
        $retcode = false;
    }
    return $retcode;
}

function pw_hash($pword) {
    if ( ! $pword || !is_string($pword) ) {
        $hash = "";
    } else if ( function_exists("password_hash") && function_exists("password_verify") ) {
        $hash = password_hash($pword, PASSWORD_DEFAULT);
    } else if ( function_exists("crypt") ) {
        $hash = crypt($pword, CRYPTSALT);
    } else {
        $hash = md5($pword);
    }
    return $hash;
}

function pw_verify($pword, $hash) {
    if ( ! $pword  || !is_string($pword) ) {
        $ver = ($hash === "");
    } else if ( function_exists("password_hash") && function_exists("password_verify") ) {
        $ver = password_verify($pword, $hash);
    } else if ( function_exists("crypt") ) {
        $test = crypt($pword, CRYPTSALT);
        $ver = ($test === $hash);
    } else {
        $test = md5($pword);
        $ver = ($test === $hash);
    }
    return $ver;
}

function is_ssl() {
    if ( isset($_SERVER['HTTPS']) ) {
        if ( 'on' == strtolower($_SERVER['HTTPS']) || ( '1' == $_SERVER['HTTPS'] ) ) {
            return "https://";
        }
    } elseif ( isset($_SERVER['SERVER_PORT']) && ( '443' == $_SERVER['SERVER_PORT'] ) ) {
        return "https://";
    } elseif ( $_SERVER['REQUEST_SCHEME'] && $_SERVER['REQUEST_SCHEME']=="https" ) {
        return "https://";
    }
    return "http://";
}
/*
 * *****************************************************************************
 * Start of main routine
 * *****************************************************************************
 */
    session_start();
    
    // save authorization for this app for 10 years
    $expiry = time()+3650*24*3600;
    $expirz = time() - 24*3600;
    
    // get name of this webpage without any get parameters
    $serverName = $_SERVER['SERVER_NAME'];
    
    if ( isset($_SERVER['SERVER_PORT']) ) {
        $serverPort = ":" . $_SERVER['SERVER_PORT'];
    } else {
        $serverPort = "";
    }
    
    // no longer include port here since sockets use different one
    // $serverPort = "";
    
    $uri = $_SERVER['PHP_SELF'];
    $url = is_ssl() . $serverName . $serverPort;
    $returnURL = $url . $uri;
    
/* 
 * *****************************************************************************
 * Check whether we are returning from a new user login
 * this can set Hubitat codes or start a SmartThings auth flow
 * or it can do both depending on user selections
 * the $hpcode is a security measure that assures we are returning from this web session
 * *****************************************************************************
 */
//    echo "hpcode = " . $_SESSION["hpcode"] . "<br /><pre>";
//    print_r($_POST);
//    echo "</pre>";
//    exit(0);

    $useajax= false;
    $reserved = array("index","rooms","things","config","control","time","useroptions");
    
    // add "api" as an alternative keyword for using the api to useajax
    if ( isset($_GET["api"]) ) { $useajax = $_GET["api"]; }
    else if ( isset($_POST["api"]) ) { $useajax = $_POST["api"]; }
    
    if ( isset($_GET["useajax"]) ) { $useajax = $_GET["useajax"]; }
    else if ( isset($_POST["useajax"]) ) { $useajax = $_POST["useajax"]; }
        
    // fix up old use of dohubitat since all calls are now doaction
    if ( $useajax==="dohubitat" ) {
        $useajax = "doaction";
    } else if ( $useajax==="queryhubitat" ) {
        $useajax = "doquery";
    }

    if ( $useajax==="cancelauth" ) { 
        unset($_SESSION["hpcode"]);
        
        // get the user attributes from login page
        $expiry = time()+3650*24*3600;
        $expirz = time()-3650*24*3600;
        $attr = $_POST["attr"];
        $timezone = $attr["timezone"];
        $skindir = $attr["skindir"];
        $port = $attr["port"];
        $webSocketServerPort = $attr["webSocketServerPort"];
        $fast_timer = $attr["fast_timer"];
        $slow_timer = $attr["slow_timer"];
        $uname = trim($attr["uname"]);
        setcookie("uname", $uname, $expiry, "/");
        $pword = trim($attr["pword"]);
        
        $allthings = getAllThings(true);
        $oldoptions = readOptions();
        $options= getOptions($oldoptions, $allthings);

        date_default_timezone_set($timezone);
        $options["config"]["timezone"] = $timezone;
        $options["config"]["skin"] = $skindir;
        $options["config"]["housepanel_url"] = $returnURL;
        $options["config"]["port"] = $port;
        $options["config"]["fast_timer"] = $fast_timer;
        $options["config"]["slow_timer"] = $slow_timer;
        $options["config"]["webSocketServerPort"] = $webSocketServerPort;
        $pwords = $options["config"]["pword"];
        
        // if password given, create new hash and logout forcing new login
        if ( $pword!=="" ) {
            $hash = pw_hash($pword);
            $pwords[$uname] = array($hash, $skindir);
            setcookie("pwcrypt", "", $expirz, "/");
            
        // otherwise keep old password unless user doesn't exist
        // blank passwords for new users are created here although not suggested
        } else {
            if ( !array_key_exists($uname, $pwords) ) {
                // blank pw created for a new user - logout
                setcookie("pwcrypt", "", $expirz, "/");
                echo "error - no password given and user $uname does not exist.";
                exit(0);
                // $pwords[$uname] = $hash;
            } else {
                // stay logged in if we were and update skin
                $hash = $pwords[$uname][0];
                $pwords[$uname] = array($hash, $skindir);
            }
        }
        $options["config"]["pword"] = $pwords;
        writeOptions($options);
        echo "success - uname = $uname hash = $hash";
        exit(0);
    }

    // first branch is for processing hub authorizations
    $doauthorize = filter_input(INPUT_POST, "doauthorize", FILTER_SANITIZE_SPECIAL_CHARS);
    if ( $doauthorize &&
         isset($_SESSION["hpcode"]) && 
         intval($doauthorize) <= intval($_SESSION["hpcode"]) ) {

        // get the hubId value and save in the old hubnum variable
        $hubId = filter_input(INPUT_POST, "hubId", FILTER_SANITIZE_SPECIAL_CHARS);
        $hubnum = $hubId;
        
        $skin = filter_input(INPUT_POST, "skindir", FILTER_SANITIZE_SPECIAL_CHARS);
        $timezone = filter_input(INPUT_POST, "timezone", FILTER_SANITIZE_SPECIAL_CHARS);
        $kiosk = false;
        $port = filter_input(INPUT_POST, "port", FILTER_SANITIZE_SPECIAL_CHARS);
        $webSocketServerPort = filter_input(INPUT_POST, "webSocketServerPort", FILTER_SANITIZE_SPECIAL_CHARS);
        $fast_timer = filter_input(INPUT_POST, "fast_timer", FILTER_SANITIZE_SPECIAL_CHARS);
        $slow_timer = filter_input(INPUT_POST, "slow_timer", FILTER_SANITIZE_SPECIAL_CHARS);
        
        // if blank user name given use last authenticated name if present
        // and if not use default user name of "user" - changed from admin previously
        $uname = filter_input(INPUT_POST, "uname", FILTER_SANITIZE_SPECIAL_CHARS);
        if ( $uname==="" ) {
            if ( isset($_COOKIE["uname"]) ) {
                $uname = $_COOKIE["uname"];
            } else {
                $uname = "user";
            }
        } else {
            setcookie("uname", $uname, $expiry, "/");
        }

        // get user requested new password for this user
        // if blank given then existing password will remain
        if ( isset( $_POST["pword"]) ) {
            $pword = trim($_POST["pword"]);
        } else {
            $pword = "";
        }
        
        $hubType = filter_input(INPUT_POST, "hubType", FILTER_SANITIZE_SPECIAL_CHARS);
        $hubHost = filter_input(INPUT_POST, "hubHost", FILTER_SANITIZE_SPECIAL_CHARS);
        $clientId = filter_input(INPUT_POST, "clientId", FILTER_SANITIZE_SPECIAL_CHARS);
        $clientSecret = filter_input(INPUT_POST, "clientSecret", FILTER_SANITIZE_SPECIAL_CHARS);
        $userAccess = filter_input(INPUT_POST, "userAccess", FILTER_SANITIZE_SPECIAL_CHARS);
        $userEndpt = filter_input(INPUT_POST, "userEndpt", FILTER_SANITIZE_URL);
        $hubName = filter_input(INPUT_POST, "hubName", FILTER_SANITIZE_SPECIAL_CHARS);
        $hubTimer = filter_input(INPUT_POST, "hubTimer", FILTER_SANITIZE_NUMBER_INT);
        $hubAccess = $userAccess;
        $hubEndpt = $userEndpt;
        $hubName = trim($hubName);
        
        // read the prior options
        $options = readOptions();
        $configoptions = $options["config"];
        
        // get or create the password array holding the hash
        // handle old style pword setting that wasn't an array
        // includes logic to bundle the skin with this user so that
        // now each user can use their own skin if they want
        if ( array_key_exists("pword", $configoptions) ) {
            $pwords = $configoptions["pword"];
        } else {
            $pwdata = array("", $skin);
            $pwords = array($uname => $pwdata);
        }
        
        // replace hash for this user if a new password given that is non blank
        if ( $pword!=="" ) {
            $hash = pw_hash($pword);
            $pwords[$uname] = $hash;
        }
        
        if (array_key_exists("hubs", $configoptions)) {
            $hubs = $configoptions["hubs"];
        } else {
            $hubs = array();
        }

        // now load the new data
        $hub = array();
        $hub["hubType"] = $hubType;
        $hub["hubHost"] = $hubHost;
        $hub["clientId"] = $clientId;
        $hub["clientSecret"] = $clientSecret;
        $hub["userAccess"] = $userAccess;
        $hub["userEndpt"] = $userEndpt;
        $hub["hubName"] = $hubName;
        $hub["hubId"] = $hubId;
        $hub["hubAccess"] = $hubAccess;
        $hub["hubEndpt"] = $hubEndpt;
        $hub["hubTimer"] = $hubTimer;

        if ( !$port ) {
            $port = "";
        }
        if ( !$webSocketServerPort ) {
            $webSocketServerPort = "";
        }

        // save the hubs
        $hubs = updateHubs($hubs, $hub, $hubId);
        
        // update with this hub's information including the generic settings
        $configoptions = array(
            "timezone" => $timezone,
            "skin" => $skin,
            "kiosk" => $kiosk,
            "housepanel_url" => $returnURL,
            "port" => $port,
            "webSocketServerPort" => $webSocketServerPort,
            "hubs" => $hubs,
            "pword" => $pwords
        );
        $options["config"] = $configoptions;

        // make sure legacy approach is undone
        unset( $options["timezone"] );
        unset( $options["skin"] );
        unset( $options["kiosk"] );
        
        // save options for now
        writeOptions($options);
        
        // if manual is set the skip OAUTH flow
        // also proceed with recapturing things from this hub
        if ( $userAccess && $userEndpt ) {

            // get all new devices and update the options index array
            $newthings = getDevices(array(), $options, $hubId, $hubType, $userAccess, $userEndpt, $clientId, $clientSecret);
            
            if ( count($newthings) ) {
                $options = getOptions($options, $newthings);
                $hubNameId = getName($userAccess, $userEndpt, $clientId, $clientSecret);
                if ( $hubName === "" ) {
                    $hubName = $hubNameId[0];
                    $hub["hubName"] = $hubName;
                }
                $oldid = $hubId;
                $hubId = $hubNameId[1];
                $hub["hubId"] = $hubNameId[1];
                $hubs = updateHubs($hubs, $hub, $oldid);
                $configoptions["hubs"] = $hubs;
                $options["config"] = $configoptions;
                writeOptions($options);
            }

            // no redirection - just pass the new things to javascript
            // which then reports the updates to the auth page
            $obj = array("action"=>"things", "count"=> count($newthings), "hubName"=> $hubName, "hubId" => $hubId);
            echo json_encode($obj);
            exit(0);
        } else {
            
            // start the OAUTH flow but first
            // save the hubId in a session variable
            // we now let javascript start the oauth flow
            // this is cleaner because it avoids an additional reload
            $_SESSION["HP_hubnum"] = $hubnum;
            $obj = array("action"=>"oauth", "count"=> 0);
            echo json_encode($obj);
            // getAuthCode($returnURL, $hubHost, $clientId, $hubType);
            exit(0);
        }

    } 
    
    // repeat auth page if the security check fails
    // or if we get a redoauth signal then also present auth page
    else if ( $doauthorize!==null || 
             ( isset($_SESSION["hpcode"]) && $_SESSION["hpcode"]==="redoauth" ) ) {
        $hpcode = time();
        $_SESSION["hpcode"] = $hpcode;
        unset($_SESSION["HP_hubnum"]);
        $authpage= getAuthPage($returnURL, $hpcode);
                
        echo htmlHeader();
        echo $authpage;
        echo htmlFooter();
        exit(0);
    } else if ( isset($_SESSION["hpcode"]) && $_SESSION["hpcode"]==="dologin" ) {
        echo htmlHeader();
        echo getLoginPage($returnURL, "");
        echo htmlFooter();
        unset($_SESSION["hpcode"]);
        exit(0);
    }
    
    // read the options file
    $options = readOptions();

    // check for API request or valid config file
    if ( !$options || !array_key_exists("config", $options) ) {
        // if making an API call return error unless configuring Hubitat
        if ( $useajax ) {
            echo "error - API cannot be used because HousePanel has not been authorized, or a valid hmoptions.cfg file cannot be located.";
        // otherwise return an auth page
        } else {
            unset($_SESSION["allthings"]);
            $_SESSION["hpcode"] = "redoauth";
            header("Location: $returnURL");
        }
        exit(0);
    }

/*
 * *****************************************************************************
 * Gather Basic Options
 * *****************************************************************************
 */
    $configoptions = $options["config"];
    $hubs = $configoptions["hubs"];
    $timezone = $configoptions["timezone"];
    $skin = getSkin($options);
    $kiosk = $configoptions["kiosk"];
    $port = $configoptions["port"];
    $webSocketServerPort = $configoptions["webSocketServerPort"];
    $fast_timer = $configoptions["fast_timer"];
    $slow_timer = $configoptions["slow_timer"];

/* 
 * *****************************************************************************
 * Handle user provided authentication including Smartthings OAUTH flow
 * *****************************************************************************
 */    
    $code = filter_input(INPUT_GET, "code", FILTER_SANITIZE_SPECIAL_CHARS);
    if ( $code ) {
        
        // unset session to force re-read of things since they could have changed
        unset($_SESSION["allthings"]);

        // check for manual reset flag for debugging purposes
        if ( $code==="reset") {
            setcookie("pwcrypt", "", $expirz, "/");
            if ( defined("ENABLERESET") && ENABLERESET===true ) {
                $_SESSION["hpcode"] = "redoauth";
            } else {
                $_SESSION["hpcode"] = "dologin";
            }
            header("Location: $returnURL");
            exit(0);
        }
        
        // get hub number and retrieve the required parameters
        // this is now actually the hubId value
        $hubId = $_SESSION["HP_hubnum"];
        $hub = $hubs[findHub($hubId, $hubs)];
        $hubType = $hub["hubType"];
        $hubName = $hub["hubName"];
        $hubHost = $hub["hubHost"];
        $clientId = $hub["clientId"];
        $clientSecret = $hub["clientSecret"];

        // make call to get the token
        $token = getAccessToken($returnURL, $code, $hubHost, $clientId, $clientSecret, $hubType);
        if ($token) {
            $endpt = getEndpoint($token, $hubHost, $clientId, $hubType);
        } else {
            $endpt = null;
        }

        // get the endpoint if the token is valid
        // this works for either ST or HE hubs
        if ($token && $endpt) {
            // $endpt = getEndpoint($token, $hubHost, $clientId, $hubType);

            // save auth info in hmoptions file
            // *** IMPT *** this is the info needed to allow HP to read things
            // if ($endpt) {
                $hub["hubAccess"] = $token;
                $hub["hubEndpt"] = $endpt;
                
                // get user provided name
                $hubNameId = getName($token, $endpt, $clientId, $clientSecret);
                if ( $hubName==="" ) {
                    $hubName = $hubNameId[0];
                }
                
                // update id number if different
                $oldid = $hubId;
                $hubId = $hubNameId[1];
                
                // get all new devices and update the options index array
                $newthings = getDevices(array(), $options, $hubId, $hubType, $token, $endpt, $clientId, $clientSecret);
                if ( count($newthings) ) {
                    $options = getOptions($options, $newthings);
                    $configoptions = $options["config"];
                }
                
                $hub["hubName"] = $hubName;
                $hub["hubId"] = $hubId;
                $hubs = updateHubs($hubs, $hub, $oldid);
                $configoptions["hubs"] = $hubs;
                $options["config"] = $configoptions;
                writeOptions($options);

                if (DEBUG2) {
                    echo "<br />Auth flow success";
                    echo "<br />serverName = $serverName";
                    echo "<br />returnURL = $returnURL";
                    echo "<br />hubId = $hubId";
                    echo "<br />hubType = $hubType";
                    echo "<br />hubHost = $hubHost";
                    echo "<br />clientId = $clientId";
                    echo "<br />clientSecret = $clientSecret";
                    echo "<br />code  = $code";
                    echo "<br />token = $token";
                    echo "<br />endpt = $endpt";
                    echo "<br />sitename = $hubName";
                    echo "<br />hub Id = $hubId";
                    echo "<br /><h3>Options</h3>";
                    echo "<pre>";
                    print_r($options);
                    echo "</pre>";
                    exit;
                }
                
                $hpcode = time();
                $_SESSION["hpcode"] = $hpcode;
                unset($_SESSION["HP_hubnum"]);
                $authpage= getAuthPage($returnURL, $hpcode, $hubId, $newthings);
                echo htmlHeader($skin);
                echo $authpage;
                echo htmlFooter();
                exit(0);
            // }

        // otherwise we have an error, so show the auth page again
        // use the session method to avoid repeating the code GET variable
        } else {
            if (DEBUG2) {
                echo "<br />Auth flow failure";
                echo "<br />serverName = $serverName";
                echo "<br />returnURL = $returnURL";
                echo "<br />hubId = $hubId";
                echo "<br />hubType = $hubType";
                echo "<br />hubHost = $hubHost";
                echo "<br />clientId = $clientId";
                echo "<br />clientSecret = $clientSecret";
                echo "<br />code  = $code";
                echo "<br />token = $token";
                echo "<br />endpt = $endpt";
                echo "<br />sitename = $hubName";
                echo "<br /><h3>Options</h3>";
                echo "<pre>";
                print_r($options);
                echo "</pre>";
                exit;
            }
            $_SESSION["hpcode"] = "redoauth";
            header("Location: $returnURL");
            exit(0);
        }

        // reload the page to remove GET parameters
        // config parameters will be stored in the cfg file
        unset($_SESSION["HP_hubnum"]);
        header("Location: $returnURL");

    // check for call to start a new authorization process
    // this branch of code can only be executed if the form is posted
    // from an active web session by pushing the auth button
    }
    
    // skip all of the ST authentication if this is a HUBITAT only install
/*
 * *****************************************************************************
 * Gather Authentication info
 * *****************************************************************************
 */
    $tc = "";

    // see if there is at least one valid hub
    // the first valid hub will be the default hub used for API calls
    $hubs = $configoptions["hubs"];
    $valid = false;
    $access_token = false;
    $endpt = false;
    $hubnum = false;
    foreach ( $hubs as $i => $hub ) {
        $hubType = $hub["hubType"];
        $hubHost = $hub["hubHost"];
        $access_token = $hub["hubAccess"];
        $endpt = $hub["hubEndpt"];
        $hubId = $hub["hubId"];
        if ( $hubHost && $access_token && $endpt ) {
            // save the first hub number
            $valid = true;
            if ( $hubnum===false ) {
                $hubnum = $hubId;
                break;
            }
        }
    }
    
    // get parms for the first hub as the default
    $hub = $hubs[findHub($hubnum, $hubs)];
    
    if ( !$useajax && !$valid ) {
        $_SESSION["hpcode"] = "dologin";
        header("Location: $returnURL");
        exit(0);
    }

    // take care of API calls when token is provided by user
    // this will by default override the first found valid hub
    if ( isset($_POST["st_access"]) && isset($_POST["st_endpt"]) ) {
        $access_token = $_POST["st_access"];
        $endpt = $_POST["st_endpt"];
        $hubnum = false;
    }
    else if ( isset($_GET["st_access"]) && isset($_GET["st_endpt"]) ) {
        $access_token = $_GET["st_access"];
        $endpt = $_GET["st_endpt"];
        $hubnum = false;
    }
    else if ( isset($_POST["he_access"]) && isset($_POST["he_endpt"]) ) {
        $access_token = $_POST["he_access"];
        $endpt = $_POST["he_endpt"];
        $hubnum = false;
    }
    else if ( isset($_GET["he_access"]) && isset($_GET["he_endpt"]) ) {
        $access_token = $_GET["he_access"];
        $endpt = $_GET["he_endpt"];
        $hubnum = false;
    }
    else if ( isset($_POST["hmtoken"]) && isset($_POST["hmendpoint"]) ) {
        $access_token = $_POST["hmtoken"];
        $endpt = $_POST["hmendpoint"];
        $hubnum = false;
    }
    else if ( isset($_GET["hmtoken"]) && isset($_GET["hmendpoint"]) ) {
        $access_token = $_GET["hmtoken"];
        $endpt = $_GET["hmendpoint"];
        $hubnum = false;
    }
    else if ( isset($_GET["hubnum"]) ) { 
        $num = intval($_GET["hubnum"]); 
        $hub = $hubs[$num];
        $hubnum = $hub["hubId"];
    }
    else if ( isset($_POST["hubnum"]) ) { 
        $num = intval($_POST["hubnum"]); 
        $hub = $hubs[$num];
        $hubnum = $hub["hubId"];
    }
    else if ( isset($_GET["hubId"]) ) {
        $hubnum = $_GET["hubId"];
        $hub = $hubs[findHub($hubnum, $hubs)];
    }
    else if ( isset($_GET["hubid"]) ) {
        $hubnum = $_GET["hubid"];
        $hub = $hubs[findHub($hubnum, $hubs)];
    }
    else if ( isset($_POST["hubId"]) ) {
        $hubnum = $_POST["hubId"];
        $hub = $hubs[findHub($hubnum, $hubs)];
    }
    else if ( isset($_POST["hubid"]) ) {
        $hubnum = $_POST["hubid"];
        $hub = $hubs[findHub($hubnum, $hubs)];
    }
    
    // if user token provided then search for the associated hub
    if ( $hubnum===false ) {
        foreach ( $hubs as $hub ) {
            if ( $hub["hubAccess"] === $access_token &&
                 $hub["hubEndpt"] === $endpt ) {
                $hubnum = $hub["hubId"];
                break;
            }
        }
        if ($hubnum===false) {
            if ( count($hubs) ) { 
                $hub = $hubs[0];
                $hubnum = $hub["hubId"];
            } else {
                $hub = false;
            }
        } else {
            $hub = $hubs[findHub($hubnum, $hubs)];
        }
    }
    
/*
 * *****************************************************************************
 * If no valid hub then proceed anyway
 * this allows HP installations to work without a valid hub
 * for using only custom tiles for example
 * *****************************************************************************
 */
    if ( $hub ) {
        $access_token = $hub["hubAccess"];
        $endpt = $hub["hubEndpt"];
        $hubType = $hub["hubType"];
        $hubName = $hub["hubName"];
        $hubHost = $hub["hubHost"];
        $clientId = $hub["clientId"];
        $clientSecret = $hub["clientSecret"];
        if ( $hub["hubName"] ) {
            $sitename = $hub["hubName"];
        } else {
            $sitename = $hubType . " Home";
        }
    }
 /*
 * *****************************************************************************
 * Get Parameters for Ajax
 * these calls can come from the HP gui screen touches or
 * from user provided API calls
 * these function calls provide all of the functionality of HousePanel
 * rendering of the pages follows near the bottom
 * updated this logic to enable auto calling of any type of id
 * *****************************************************************************
 */
    $swtype = "auto";
    $swid = "";
    $swval = "";
    $swattr = "";
    $subid = "";
    $tileid = "";
    $command = "";
    $linkval = "";

    if ( isset($_GET["type"]) ) { $swtype = $_GET["type"]; }
    else if ( isset($_POST["type"]) ) { $swtype = $_POST["type"]; }
    if ( isset($_GET["id"]) ) { $swid = $_GET["id"]; }
    else if ( isset($_POST["id"]) ) { $swid = $_POST["id"]; }
    if ( isset($_GET["value"]) ) { $swval = $_GET["value"]; }
    else if ( isset($_POST["value"]) ) { $swval = $_POST["value"]; }
    if ( isset($_GET["attr"]) ) { $swattr = $_GET["attr"]; }
    else if ( isset($_POST["attr"]) ) { $swattr = $_POST["attr"]; }
    if ( isset($_GET["subid"]) ) { $subid = $_GET["subid"]; }
    else if ( isset($_POST["subid"]) ) { $subid = $_POST["subid"]; }
    if ( isset($_GET["tile"]) ) { $tileid = $_GET["tile"]; }
    else if ( isset($_POST["tile"]) ) { $tileid = $_POST["tile"]; }
    
    // check for custom link parameters - can only be post type
    if ( isset($_POST["command"]) ) { $command = $_POST["command"]; }
    if ( isset($_POST["linkval"]) ) { $linkval = $_POST["linkval"]; }

    // take care of auto and multiple tile stuff
    // note - multiple tiles must be from the same hub
    $multicall = false;
    if ( $valid ) {
        if ( $swid==="" && $tileid && $options ) {
            
            // check for a tile array for multiple calls
            $len = strlen($tileid)-1;
            if ( strpos($tileid,",")!==false ) {
                $multicall = true;
                $tilearray = explode(",",$tileid);
                $valsave = $swval;
                $attrsave = $swattr;
                $subidsave = $subid;
                $swid = array();
                $swtype = array();
                $swval = array();
                $swattr = array();
                $subid = array();
                foreach($tilearray as $atile) {
                    $idx = array_search($atile, $options["index"]);
                    $k = strpos($idx,"|");
                    $swtype[] = substr($idx, 0, $k);
                    $swid[] = substr($idx, $k+1);
                    $swval[] = $valsave;
                    $swattr[] = $attrsave;
                    $subid[] = $subidsave;
                }
//                print_r($swid);
//                exit(0);
                
            } else {
                $idx = array_search($tileid, $options["index"]);
                $k = strpos($idx,"|");
                $swtype = substr($idx, 0, $k);
                $swid = substr($idx, $k+1);
            }
        }

        if ( !$multicall && strpos($swid,",")!==false ) {
            $multicall = true;
            $tilearray = explode(",",$swid);
            $typesave = $swtype;
            $valsave = $swval;
            $attrsave = $swattr;
            $subidsave = $subid;
            $swid = array();
            $swtype = array();
            $swval = array();
            $swattr = array();
            $subid = array();
            foreach($tilearray as $atile) {
                $swid[] = $atile;
                if ( substr($atile,0,5)=="clock") {
                    $swtype[] = "clock";
                } else if ( substr($atile,0,3)=="vid") {
                    $swtype[] = "video";
                } else if ( substr($atile,0,5) == "frame" ) {
                    $swtype[] = "frame";
                } else if ( substr($atile,0,5) == "image" ) {
                    $swtype[] = "image";
                } else if ( substr($atile,0,5) == "blank" ) {
                    $swtype[] = "blank";
                } else if ( substr($atile,0,6)=="custom") {
                    $swtype[] = "custom";
                } else if ( substr($atile,0,7)=="control") {
                    $swtype[] = "control";
                } else {
                    $swtype[] = $typesave;
                }
                $swval[] = $valsave;
                $swattr[] = $attrsave;
                $subid[] = $subidsave;
            }
        }

        // fix up id for hubitat
        if ( (substr($swid,0,2) === "h_") && $hubType==="Hubitat" ) {
            $swid = substr($swid,2);
        } 

        // handle special non-groovy based tile types
        if ( !$multicall && $swtype==="auto" && $swid && $useajax!=="addcustom") {
            if ( substr($swid,0,5)=="clock") {
                $swtype = "clock";
            } else if ( substr($swid,0,3)=="vid") {
                $swtype = "video";
            } else if ( substr($swid,0,5) == "frame" ) {
                $swtype = "frame";
            } else if ( substr($swid,0,5) == "image" ) {
                $swtype = "image";
            } else if ( substr($swid,0,5) == "blank" ) {
                $swtype = "blank";
            } else if ( substr($swid,0,6)=="custom") {
                $swtype = "custom";
            } else if ( substr($swid,0,7)=="control") {
                $swtype = "control";
            }
        }
        
        // if the hub number is given then use that hub
        // this will typically be true for GUI invoked calls to the api
        // to tell the api which hub to use for the request
        // for clocks and other generic stuff this will be false
        // which will default to using the first hub found
        if ( $hubnum!==false && $hubnum!==null ) {
            if ( $hubnum === -1 ) {
                $hub = $hubs[0];
                $hubType = "None";
            } else {
                // $hub = $hubs[$hubnum];
                $hub = $hubs[findHub($hubnum, $hubs)];
                $hubType = $hub["hubType"];
            }
            
            if ( $hub ) {
                $access_token = $hub["hubAccess"];
                $endpt = $hub["hubEndpt"];
                $hubHost = $hub["hubHost"];
                $clientId = $hub["clientId"];
                $clientSecret = $hub["clientSecret"];
            }
        }

        // set tileid from options if it isn't provided
//        if ( !$multicall && $tileid==="" && $swid && strtolower($swid)!=="none" && $swtype!=="auto" && $options && $options["index"] ) {
//            $idx = $swtype . "|" . $swid;
//            if ( array_key_exists($idx, $options["index"]) ) { 
//                $tileid = $options["index"][$idx]; 
//            }
//        }
    }
/*
 * *****************************************************************************
 * Handle Ajax Calls Section
 * *****************************************************************************
 */
    // this block returns control to caller immediately
    // it can either show a webpage or return a block of json data to js file
    if ( $useajax ) {
        $nothing = json_encode(array());
        switch ($useajax) {
            case "doaction":
            case "dohubitat":
                if ( $hubnum ) {
                    if ( $multicall ) {
                        $result = array();
                        for ($i= 0; $i < count($swid); $i++) {
                            $oneres= doAction($hubnum, "doaction", $swid[$i], $swtype[$i], $swval[$i], $swattr[$i], $subid[$i], "", "", false);
                            $result[] = json_decode($oneres);
                        }
                        echo json_encode($result);
                    } else {
                        echo doAction($hubnum, "doaction", $swid, $swtype, $swval, $swattr, $subid, $command, $linkval);
                    }
                } else {
                    echo $nothing;
                }
                break;
        
            case "doquery":
            case "queryhubitat":
                if ( $hubnum ) {
                    if ( $multicall ) {
                        $result = array();
                        for ($i= 0; $i < count($swid); $i++) {
                            $oneres= doAction($hubnum, "doquery", $swid[$i], $swtype[$i]);
                            $result[] = json_decode($oneres);
                        }
                        echo json_encode($result);
                    } else {
                        echo doAction($hubnum, "doquery", $swid, $swtype);
                    }
                } else {
                    echo $nothing;
                }
                break;

            case "wysiwyg2":
                // if we sorted the user fields in the customizer, save them
                if ( is_array($swattr) ) {
                    $uid = "user_" . $swid;
                    $options[$uid] = $swattr;
                    writeOptions($options);
                }
            case "wysiwyg":
                if ( $swtype==="page" && $useajax==="wysiwyg" ) {
                    // make the fake tile for the room for editing purposes
                    $faketile = array("panel" => "Panel", "tab" => "Tab Inactive", "tabon" => "Tab Selected" );
                    $thing = array("id" => "r_".strval($swid), "name" => $swval, 
                        "hubnum" => -1, "type" => "page", "value" => $faketile);
                    echo makeThing(0, $tileid, $tileid, $thing, $swval, $options, 0, 0, 99, "", $useajax );
                    
                } else {
                    $idx = $swtype . "|" . $swid;
                    $allthings = getAllThings();
                    $thing = $allthings[$idx];
                    // $thing["name"] = getCustomName($thing["name"], $idx, $options);
                    // $customname = getCustomName($thing["name"], $idx, $options);
                    echo makeThing($idx, 0, $tileid, $thing, "Options", $options, 0, 0, 99, "", $useajax);
                }
                break;
        
            case "pageorder":
                echo setOrder($endpt, $access_token, $swid, $swtype, $swval, $swattr);
                break;
                
            // implement free form drag drap capability
            case "dragdrop":
                echo setPosition($endpt, $access_token, $swid, $swtype, $swval, $swattr);
                break;
        
            // make new tile from drag / drop
            case "dragmake":
                if ( $swid && $swtype && $swval && $swattr ) {
                    $allthings = getAllThings();
                    $retcode = addThing($swid, $swtype, $swval, $swattr, $allthings);
                } else {
                    $retcode = "<div class='error'>error id = $swid type = $swtype val = $swval</div>";
                }
                echo $retcode;
                break;
            
            // remove tile from drag / drop
            case "dragdelete":
                if ( $swid && $swtype && $swval && $swattr ) {
                    $retcode = delThing($swid, $swtype, $swval, $swattr);
                } else {
                    $retcode = "error - invalid parameters for tile delete function";
                }
                echo $retcode;
                break;
            
            // remove tile from drag / drop
            case "pagedelete":
                if ( $swid && $swval ) {
                    $retcode = delPage($swid, $swval);
                } else {
                    $retcode = "error - invalid parameters for pagedelete function";
                }
                echo $retcode;
                break;
            
            // add a new page
            case "pageadd":
                $retcode = addPage();
                echo $retcode;
                break;
            
            case "getcatalog":
                $allthings = getAllThings();
                echo getCatalog($allthings);
                break;
                
            case "showoptions":
                $allthings = getAllThings();
                // get the custom directory for the active skin
                $skin = getSkin($options);
                $optpage = getOptionsPage($options, $returnURL, $allthings, $sitename);
                echo htmlHeader($skin);
                echo $optpage;
                echo htmlFooter();
                break;
        
            case "refactor":
                // this user selectable option will renumber the index
//                unset($_SESSION["hmoptions"]);
                $allthings = getAllThings();
                refactorOptions($allthings);
                header("Location: $returnURL");
                break;
        
            case "refresh":
//                unset($_SESSION["hmoptions"]);
                $allthings = getAllThings(true);
                $options= getOptions($options, $allthings);
                writeOptions($options);
        
                header("Location: $returnURL");
                break;
            
            // new API call to return the options as a json string
            // this is needed for the customization js file but...
            // end users can also use this to read the options file
            case "getoptions":
                $options = readOptions();
                echo json_encode($options);
                exit;
                break;
            
            // another new API call to return all the loaded things
            // not intended for end user use, but can be for power users
            // the customization js file uses this to perform LINK connections
            case "getthings":
                if ( $swattr==="reload" ) {
                    $allthings = getAllThings(true);
                } else {
                    $allthings = getAllThings(false);
                }
                echo json_encode($allthings);
                exit;
                break;
            
            // return json string of all hubs
            // this is in prep for the Node.js middleman
            case "gethubs":
                echo json_encode($hubs);
                exit;
                break;
            
            // lock down the reauth api to prevent any user from resetting pw
            case "reauth":
                if ( isset($_COOKIE["uname"]) && isset($_COOKIE["pwcrypt"]) ) {
                    $pwname = $_COOKIE["pwcrypt"];
                    $uname = $_COOKIE["uname"];
                    $options = readOptions();
                    $configoptions = $options["config"];
                    $pwords = $configoptions["pword"];
                    $skin = getSkin($options);
                    // setcookie("uname", $uname, $expiry, "/");
                    if ( $uname===$pwname && array_key_exists($uname, $pwords) ) {
                        $login = true;
                    } else {
                        $login = false;
                    }
                } else {
                    $skin = "";
                    $uname = "";
                    $login = false;
                }
                
                if ( $login ) {
                    unset($_SESSION["allthings"]);
                    unset($_SESSION["HP_hubnum"]);
                    $hpcode = time();
                    $_SESSION["hpcode"] = $hpcode;
                    $tc= getAuthPage($returnURL, $hpcode);
                } else {
                    $tc = getLoginPage($returnURL, $uname);
                }
                echo htmlHeader($skin);
                echo $tc;
                echo htmlFooter();
                break;
            
            // an Ajax option to display all the ID value for use in Python and EventGhost
            case "showid":
                $allthings = getAllThings();
                $tc = getInfoPage($returnURL, $allthings, $devhistory);
                echo htmlHeader();
                echo $tc;
                echo htmlFooter();
                break;
            
            case "savefilters":
                // the filter options is in value
                // and the new skin directory is in the attr
                // $options = readOptions();
                $options["useroptions"] = $swval;
                $skin = $swattr;

                // set the skin and replace the custom file with that skin's version
                if ( $skin && file_exists($skin . "/housepanel.css") ) {

                    // save the skin in my user specific setting
                    $uname = $_COOKIE["uname"];
                    $pwords = $options["config"]["pword"];
                    if ( $uname && array_key_exists($uname, $pwords) ) {
                        $pwords[$uname][1] = $skin;
                        $options["config"]["pword"] = $pwords;
                    }
                    
                    // make sure our default skin has a custom file
                    if ( !file_exists($skin . "/customtiles.css") ) {
                        writeCustomCss($skin, "");
                    }
                    
                    // set default skin to this skin - although it shouldn't be used ever
                    $options["config"]["skin"] = $skin;
                }
                writeOptions($options);
                echo "success";
                break;
            
            case "savetileedit":
                // grab the new tile name and set all tiles with matching id
                
                // $options = readOptions();
                $newname = $swattr;
                if ( $swtype === "page" ) {
                    $newname = str_replace(" ", "_", $newname);
                    $oldname = $tileid;
                    $updcss = changePageName($oldname, $newname, $options);
                    if ( $updcss ) {
                        writeOptions($options);
                        $result = "old page= $oldname new page = $newname";
                    } else {
                        $result = "old page= $oldname not found for $newname to replace";
                    }
                } else {
                    $thingoptions = $options["things"];
                    $updcss = false;
                    $nupd = 0;
                    foreach ($thingoptions as $room => $things) {
                        // look for matching options item
                        // and update to new value if it changed
                        // also guard against old style that wasn't an array
                        // or arrays that were not at least 4 elements long
                        // the 4th element of the array is the custom name
                        foreach ($things as $k => $tiles) {
                            if ( is_array($tiles) && (count($tiles)>3) &&
                                 (intval($tiles[0]) === intval($tileid)) &&
                                 ($tiles[4]!==$newname)  ) {
                                $tiles[4] = $newname;
                                $options["things"][$room][$k] = $tiles;
                                $nupd++;
                                $updcss = true;
                            }
                        }
                    }
                    if ( $updcss ) {
                        writeOptions($options);
                        $result = "$nupd names changed for type= $swtype tileid= $tileid newname= $newname";
                    } else {
                        $result = "Nothing updated for type= $swtype tileid= $tileid newname= $newname";
                    }
                }
                $skin = getSkin($options);
                writeCustomCss($skin, $swval);
                
                echo $result;
                break;
                
            case "saveoptions":
                if ( isset($_POST["options"]) ) {
                    processOptions($_POST);
                    header("Location: $returnURL");
                    exit(0);
                } else {
                    echo "error: Illegal $useajax API call. $useajax is only an internal command.";
                }
                break;
                
            // changed password logic to be more secure by checking here
            // and using the cookie to only store access okay state or not
            // this is signalled by setting cookie equal to logged in username
            // we never store the hash password anywhere except in hmoptions
            case "dologin":
    
                if ( isset($_POST["pword"]) && isset($_POST["uname"]) ) {
                    $uname = $_POST["uname"];
                    $pword = $_POST["pword"];
                    $options = readOptions();
                    $configoptions = $options["config"];
                    $pwords = $configoptions["pword"];
                    
                    // user is in our system so keep asking for pw until good
                    if (array_key_exists($uname, $pwords) && is_array($pwords[$uname])) {
                        $hash = $pwords[$uname][0];
                        setcookie("uname", $uname, $expiry, "/");
                        if ( ($hash==="" && $pword==="") || pw_verify($pword, $hash) ) {
                            setcookie("pwcrypt", $uname, $expiry, "/");
                            $skin = $pwords[$uname][1];
                            if ( $skin !== $options["config"]["skin"] ) {
                                $options["config"]["skin"] = $skin;
                                writeOptions($options);
                            }
                        } else {
                            setcookie("pwcrypt", "", $expirz, "/");
                        }
                        
                    // user given not in our system so reauth page
                    } else {
                        setcookie("pwcrypt", "", $expirz, "/");
                        $_SESSION["hpcode"] = "dologin";
                    }
                    header("Location: $returnURL");
                    exit(0);
                } else {
                    echo "error: Illegal $useajax API call. $useajax is only an internal command.";
                    // exit(0);
                }
                
//        echo "<br>useajax 7 = $useajax";
//        echo "<br><hr>";
//        print_r($pwords);
//        exit(0);
    
                break;
            
            // api call to use the builtin PHP strong hash function
            // we either create the hash or check an existing hash
            case "pwhash":
                if ( $swtype==="hash" ) {
                    $presult = pw_hash($swval);
                } else if ( $swtype==="verify" ) {
                    if ( pw_verify($swval, $swattr) ) {
                        $presult = "success";
                    } else {
                        $presult = "error";
                    }
                } else {
                    $presult = "error";
                }
                echo $presult;
                break;
            
            case "cancelauth":
                unset($_SESSION["hpcode"]);
                echo "success";
                break;
            
            // TODO - avoid creating duplicates by searching for existing
            case "addcustom":
                $options = readOptions();
                $userid = "user_" . $swid;
                if ( array_key_exists($swid, $options) && 
                        !in_array ($swid, $reserved) && 
                        !array_key_exists($userid, $options) ) {
                    $userid = $swid;
                }
                if ( !array_key_exists($userid, $options) ) {
                    $options[$userid] = array();
                }

                // handle encryption
                $swattr = strval($swattr);
                $subid = strval($subid);
                if ( $subid==="password" && $swattr ) {
                    $swattr = pw_hash($swattr);                    
                }
                
                $newitem = array($swval, $swattr, $subid);
                $newoptitem = array();
                $doneit = false;
                foreach( $options[$userid] as $val ) {
                    if ( $val[2] === strval($subid) ) {
                        if ( !$doneit ) {
                            $newoptitem[] = $newitem;
                            $doneit = true;
                        }
                    } else {
                        $newoptitem[] = $val;
                    }
                }
                if ( !$doneit ) {
                    $newoptitem[] = $newitem;
                }
                $options[$userid] = $newoptitem;
                writeOptions($options);
                
                $allthings = getAllThings();
                $idx = $swtype . "|" . $swid;
                
                // make the new custom field using the updated options above
                $thingval = getCustomTile($allthings[$idx]["value"], $swtype, $swid, $options, $allthings);

                // save it in the main array and update our session
                // this is way faster than re-reading everything
                $allthings[$idx]["value"] = $thingval;
                $_SESSION["allthings"] = serialize($allthings);
                
                // $allthings = getAllThings(true);
                echo json_encode($thingval);
                break;
                
            case "delcustom":
                $options = readOptions();
                $allthings = getAllThings();
                $userid = "user_" . $swid;
                if ( array_key_exists($swid, $options) && 
                        !in_array ($swid, $reserved) && 
                        !array_key_exists($userid, $options) ) {
                    $userid = $swid;
                }
                
                if ( array_key_exists($userid, $options) ) {
                    $oldlines = $options[$userid];
                    if ( ! is_array($oldlines[0]) ) {
                        $oldlines = array($oldlines);
                    }
                    // make new list of customs without the deleted item
                    $lines = array();
                    foreach ($oldlines as $newitem) {
                        if ( strval($newitem[2]) !== strval($subid) ) {
                            $lines[] = $newitem;
                        }
                    }
                    if ( count($lines) === 0 ) {
                        unset( $options[$userid] );
                    } else {
                        $options[$userid] = $lines;
                    }
                    writeOptions($options);
                    // $allthings = getAllThings(true);
                }
                
                $idx = $swtype . "|" . $swid;
                $companion = "user_" + $subid;
                $thingval = $allthings[$idx]["value"];
                
                // remove this field and any companion if it exists
                unset($thingval[$subid]);
                if ( array_key_exists($companion, $thingval) ) {
                    unset($thingval[$companion]);
                }
                
                // update the main array
                $allthings[$idx]["value"] = $thingval;
                $_SESSION["allthings"] = serialize($allthings);
                echo json_encode($thingval);
                break;
                
            case "hubdelete":
                $hubId = strval($swid);
                $oldhubs = $hubs;
                $update = false;
                foreach($oldhubs as $id => $hub) {
                    if ( strval($hub["hubId"]) === $hubId ) {
                        $update = true;
                        unset( $hubs[$id] );
                        break;
                    }
                }
                if ( $update ) {
                    $newhubs = array_values($hubs);
                    $hubs = $newhubs;
                    $configoptions["hubs"] = $newhubs;
                    $options["config"] = $configoptions;
                    writeOptions($options);
                }
                echo json_encode($newhubs);
                // $_SESSION["hpcode"] = "redoauth";
                // header("Location: $returnURL");
                // exit(0);
                break;
                
            case "trackupdate":
                $thingvalue = array("trackDescription"=> $swval);
                $results = getMusicArt($thingvalue);
                unset($results["trackDescription"]);
                
//                $trackname = $swval;
//                
                // search the track name for an artist
//                $astart = strpos($trackname," by ");
//                $astop = strpos($trackname," from ");
//                $artist = "";
//                $album = "";
//                $art = "";
//
//                // check for artist in the track description
//                // we don't need to check the zero position since that will always have a song
//                if ( $astart && $astop ) {
//                    $artist = substr($trackname, $astart+4, $astop-$astart-4);
//                    $album = substr($trackname, $astop+6);
//                    $bstop = strpos($album,"Grouped with ");
//                    if (  $bstop !== false ) {
//                        $album = substr($album, 0, $bstop);
//                    }
//                    if ( $artist && $album ) {
//                        $art = getAlbumArt($artist, $album);
//                    } else if ($album) {
//                        $art = "";
//                    }
//                } else if ($trackname) {
//                    $album = $trackname;
//                    $bstop = strpos($album,"Grouped with ");
//                    if (  $bstop !== false ) {
//                        $album = substr($album, 0, $bstop);
//                    }
//                    $artist = "";
//                    $art = getAlbumArt("tunein", $album);
//                }
//                $results = array("currentArtist"=> $artist, "currentAlbum"=> $album, "trackImage"=> $art);
                echo json_encode($results);
                break;
                
            case "logout":
                setcookie("uname", "", $expirz, "/");
                setcookie("pwcrypt", "", $expirz, "/");
                unset($_SESSION["allthings"]);
                $_SESSION["hpcode"] = "dologin";
                echo "success";
                break;
                
              
            default:
                // instead of printing a crazy message, return to main screen
                // if the dynoform asks for an invalid function
                if ( $swtype==="dynoform" ) {
                    header("Location: $returnURL");
                    
                // otherwise this is probably an API call so return an error message
                } else {
                    echo "error - API command = $useajax is not a valid option";
                }
                break;
        }
        exit(0);
    }
    
/*
 * *****************************************************************************
 * Display Main Page Section
 * *****************************************************************************
 */
    if ( $valid ) {

        $options = readOptions();
        $rewriteoptions = false;

        // check for an upgrade
        if ( array_key_exists("time", $options) ) {
            $time = $options["time"];
            $info = explode(" @ ", $time);
            $version = floatval($info[0]);
            $upgraded = ($version < floatval(HPVERSION) );
        } else {
            $version = 1.0;
            $upgraded = true;
            $options["time"] = HPVERSION . " @ " . strval(time());
        }
        
        // if options file is upgraded force reload of all things array
        if ( $upgraded ) {
            $rewriteoptions = true;
            unset($_SESSION["allthings"]);
        }
        
        $configoptions = $options["config"];
        $hubs = $configoptions["hubs"];
        $hubcount = count($hubs);
        $newhubs = array();
        foreach($hubs as $hub) {
            if ( !array_key_exists("hubTimer", $hub) ) {
                $hub["hubTimer"] = 60000;
                if ( $hub["hubType"] === "Hubitat" ) {
                    $hub["hubTimer"] = 10000;
                }
                $rewriteoptions = true;
            }
            $newhubs[] = $hub;
        }
        
        if ( $rewriteoptions ) {
            $configoptions["hubs"] = $newhubs;
            $hubs = $newhubs;
        }
        
        // set up time zone
        $timezone = $configoptions["timezone"];
        date_default_timezone_set($timezone);

        // get the skin directory name or use the default
        $skin = getSkin($options);

        // get the password config array
        $pwords = $configoptions["pword"];
        
        // if a legacy style pword was set then let user in
        // but send them to reauth page to reset password
        // and delete the legacy cookie type and old options hash
        if ( isset($_COOKIE["pword"]) ) {
            setcookie("pword", "", $expirz, "/");
            
            // preserve prior username if there
            if ( isset($_COOKIE["uname"]) ) {
                $uname = $_COOKIE["uname"];
            } else {
                $uname = "user";
            }
            
            // remove all the old md5 passwords
            // but keep new ones for the case where they were set on a different device
            // all new passwords use a 60 character strong cipher - use 50 just in case
            $rewritepw = false;
            $opwords = $pwords;
            foreach ( $opwords as $un => $pw) {
                $thepw = $pw[0];
                $theskin = $pw[1];
                if ( $thepw!=="" && strlen($thepw) < 50 ) {
                    $pwords[$un] = array("", $theskin);
                    $rewritepw = true;
                }
            }
            
            // if for some reason saved user doesn't have a pw, make a blank one
            if ( !array_key_exists($uname, $pwords) ) {
                $pwords[$uname] = array("", $skin);
            }
            $configoptions["pword"] = $pwords;
            
            // force reauth if old passwords were reset
            // or force login if new passwords are there but this is first time for this client
            if ($rewritepw ) {
                $login = "reauth";
                $rewriteoptions = true;
            } else {
                $login = ( $pwords[$uname][0]==="" ) ? true : false;
            }
            
        // new password approach detected
        // this includes blank passwords signaling don't use one
        // this is not recommended but it is supported
        } else if ( isset($_COOKIE["uname"]) && isset($_COOKIE["pwcrypt"]) ) {
            $pwname = $_COOKIE["pwcrypt"];
            $uname = $_COOKIE["uname"];
            // setcookie("uname", $uname, $expiry, "/");
            if ( $uname===$pwname && array_key_exists($uname, $pwords) ) {
                $login = true;
            } else {
                $login = false;
            }
        
        // security mechanism failed
        } else {
            if ( isset($_COOKIE["uname"]) ) {
                $uname = $_COOKIE["uname"];
            } else {
                $uname = "";
            }
            $login = false;
        }

        if ( $login!==false && $rewriteoptions ) {
            $options["config"] = $configoptions;
            writeOptions($options);
        }
        
        // handle legacy passwords that get sent to reauth page
        if ( $login==="reauth" ) {
            unset($_SESSION["allthings"]);
            unset($_SESSION["HP_hubnum"]);
            $hpcode = time();
            $_SESSION["hpcode"] = $hpcode;
            $tc= getAuthPage($returnURL, $hpcode);
            
        } else if ( $login===false ) {
            $tc = getLoginPage($returnURL, $uname);
            
        // otherwise begin the logic of creating the full housepanel webpage
        } else {
            
            // get kiosk mode
            $kiosk = $configoptions["kiosk"];
            $kioskmode = ($kiosk===true || strtolower($kiosk)==="yes" || 
                          $kiosk==="true" || intval($kiosk)===1 );

            // get user specific skin
            $skin = getSkin($options);
            
            // get all the things from all the hubs
            $allthings = getAllThings();
            $thingoptions = $options["things"];
            $roomoptions = $options["rooms"];
            $indexoptions = $options["index"];

            // create defaults if nothing setup
            $maxroom = 0;
            foreach ($thingoptions as $roomname => $thinglist) {
                if ( count($thinglist) > $maxroom ) {
                    $maxroom = count($thinglist);
                }
            }

            // if no room has more than 2 things setup defaults
            // I picked 2 because clock is always there
            if ( $maxroom < 2 ) {
                $options = setDefaults($options, $allthings);
                writeOptions($options);
            }

            // make sure our active skin has a custom file
            if ( !file_exists($skin . "/customtiles.css") ) {
                writeCustomCss($skin, "");
            }
            
            if (DEBUG || DEBUG5) {
                $tc.= "<h2>Allthings</h2>";
                $tc.= "<div class='debug'><pre>" . print_r($allthings,true) . "</pre></div>";
                $tc.= "<hr><h2>Options</h2>";
                $tc.= "<div class='debug'><pre>" . print_r($options,true) . "</pre></div>";
            }
            
            // new wrapper around catalog and things but excluding buttons
            $tc.= '<div id="dragregion">';

            $tc.= '<div id="tabs"><ul id="roomtabs">';
            // show all room with whatever index number assuming unique
            foreach ($roomoptions as $room => $k) {
                if ( array_key_exists($room, $thingoptions)) {
                    $tc.= "<li roomnum=\"$k\" class=\"tab-$room\"><a href=\"#" . $room . "-tab\">$room</a></li>";
                }
            }
            $tc.= '</ul>';
            $cnt = 0;

            // changed this to show rooms in the order listed
            // this is so we just need to rewrite order to make sortable permanent
            foreach ($roomoptions as $room => $k) {
                if ( array_key_exists($room, $thingoptions)) {
                    $things = $thingoptions[$room];
                    $tc.= getNewPage($cnt, $allthings, $room, $k, $things, $options, $kioskmode);
                }
            }
            
            // include doc button and username that is logged in
            $tc.= '<div id="showversion" class="showversion">';
            $tc.= '<span id="infoname">' . $uname . "</span><span> - V" . HPVERSION . '</span>';
            $tc.= '<div id="showdocs"><a href="http://www.housepanel.net" target="_blank">?</a></div>';
            $tc.= "</div>";

            // end of the tabs
            $tc.= "</div>";

            // end drag region enclosing catalog and main things
            $tc.= "</div>";

            // include form with useful data for js operation
            $tc.= "<form id='kioskform'>";
            $tc.= hidden("returnURL", $returnURL);
            $tc.= hidden("pagename", "main");

            // save the socket address for use on js side
            $webSocketUrl = $webSocketServerPort ? ("ws://" . $serverName . ":" . $webSocketServerPort) : "";
            $tc.= hidden("webSocketUrl", $webSocketUrl);
            
            // save Node.js address for use on the js side
            $nodejsUrl = $port ? ( is_ssl() . $serverName . ":" . $port ) : "";
            $tc.= hidden("nodejsUrl", $nodejsUrl);
            $datetimezone = new DateTimeZone($timezone);
            $datetime = new DateTime("now", $datetimezone);
            $tzoffset = timezone_offset_get($datetimezone, $datetime);
            $tc.= hidden("timezone", $tzoffset);
            $tc.= hidden("fast_timer", $fast_timer);
            $tc.= hidden("slow_timer", $slow_timer);
            
            // save all the hubs data for use in js (could read options instead)
            $tc.= hidden("allHubs", json_encode($hubs));
            
            // show user buttons if we are not in kiosk mode
            if ( !$kioskmode ) {
                $tc.= "<div id=\"controlpanel\">";
                $tc.='<div id="showoptions" class="formbutton">Options</div>';
                $tc.='<div id="refresh" class="formbutton">Refresh</div>';
                $tc.='<div id="refactor" class="formbutton confirm">Reset</div>';
                $tc.='<div id="reauth" class="formbutton confirm">Re-Auth</div>';
                $tc.='<div id="showid" class="formbutton">Show Info</div>';
                $tc.='<div id="toggletabs" class="formbutton">Hide Tabs</div>';
                $tc.='<div id="blackout" class="formbutton">Blankout</div>';

                $tc.= "<div class=\"modeoptions\" id=\"modeoptions\">
                  <input id=\"mode_Operate\" class=\"radioopts\" type=\"radio\" name=\"usemode\" value=\"operate\" checked><label for=\"mode_Operate\" class=\"radioopts\">Operate</label>
                  <input id=\"mode_Reorder\" class=\"radioopts\" type=\"radio\" name=\"usemode\" value=\"reorder\" ><label for=\"mode_Reorder\" class=\"radioopts\">Reorder</label>
                  <input id=\"mode_Edit\" class=\"radioopts\" type=\"radio\" name=\"usemode\" value=\"edit\" ><label for=\"mode_Edit\" class=\"radioopts\">Edit</label>
                  <input id=\"mode_Snap\" class=\"radioopts\" type=\"checkbox\" name=\"snapmode\" value=\"snap\"><label for=\"mode_Snap\" class=\"radioopts\">Grid Snap?</label>
                </div><div id=\"opmode\"></div>";
                $tc.="</div>";
                $tc.= "<input id=\"skinid\" type=\"hidden\" value=\"$skin\"/>";
            } else {
                $tc.= "<input id=\"skinid\" type=\"hidden\" value=\"$skin\"/>";
            }
            $tc.= "</form>";
        }
    }

    // display the dynamically created web site
    echo htmlHeader($skin);
    echo $tc;
    echo htmlFooter();
    