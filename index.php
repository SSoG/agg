<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN"
 
<html xmlns="
<head>
    <title>SSoG News Aggregator</title>
    <link rel="stylesheet" type="text/css" href="style/style.css">
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
    <script type="text/javascript" src="scripts/cookies.js"></script>
    <script type="text/javascript" src="scripts/refresh.js"></script>
</head>
<body>
<?php
 
// Make sure SimplePie is included. You may need to change this to match the location of autoloader.php
require_once('../agg/php/autoloader.php');
 
// We'll process this feed with all of the default options.
$feed = new SimplePie();

//For each feed, if there is a cookie, read it, check or uncheck the box, and disable the checkbox
//If there's no cookie, read from url if it should be active, and enable the checkbox
//If there's no cookie and no url, set it to active, and enable the checkbox

//destructoid
if ($_COOKIE['destructoid']!="no"){
    if ($_GET["d"] == "1" or $_GET["d"] == null or $_COOKIE['destructoid'] == "yes"){
    $feedarraybuilder .= "http://feeds.feedburner.com/Destructoid,";
    $destructoid = "checked";}
    if ($_COOKIE['destructoid'] == "yes"){
    $destructoid_enabled = "false";}
}
else{
    $destructoid = "unchecked";
    $destructoid_enabled = "false";
    }
//polygon
if ($_COOKIE['polygon']!="no"){
    if ($_GET["p"] == "1" or $_GET["p"] == null or $_COOKIE['polygon'] == "yes"){
    $feedarraybuilder .= "http://www.polygon.com/rss/index.xml,";
    $polygon = "checked";}
    if ($_COOKIE['polygon'] == "yes"){
    $polygon_enabled = "false";}
}
else{
    $polygon = "unchecked";
    $polygon_enabled = "false";
    }
//joystiq
if ($_COOKIE['joystiq']!="no"){
    if ($_GET["j"] == "1" or $_GET["j"] == null or $_COOKIE['joystiq'] == "yes"){
    $feedarraybuilder .= "http://www.joystiq.com/rss.xml,";
    $joystiq = "checked";}
    if ($_COOKIE['joystiq'] == "yes"){
    $joystiq_enabled = "false";}
}
else{
    $joystiq = "unchecked";
    $joystiq_enabled = "false";
    }
//kotaku
if ($_COOKIE['kotaku']!="no"){
    if ($_GET["k"] == "1" or $_GET["k"] == null or $_COOKIE['kotaku'] == "yes"){
    $feedarraybuilder .= "http://feeds.gawker.com/kotaku/full,";
    $kotaku = "checked";}
    if ($_COOKIE['kotaku'] == "yes"){
    $kotaku_enabled = "false";}
}
else{
    $kotaku = "unchecked";
    $kotaku_enabled = "false";
    }
//siliconera
if ($_COOKIE['siliconera']!="no"){
    if ($_GET["s"] == "1" or $_GET["s"] == null or $_COOKIE['siliconera'] == "yes"){
    $feedarraybuilder .= "http://www.siliconera.com/feed/,";
    $siliconera = "checked";}
    if ($_COOKIE['siliconera'] == "yes"){
    $siliconera_enabled = "false";}
}
else{
    $siliconera = "unchecked";
    $siliconera_enabled = "false";
    }

//convert string to array
$feedarrayfinal = explode(",",$feedarraybuilder);

// Set the feed to process.
$feed->set_feed_url($feedarrayfinal);
 
// Run SimplePie.
$feed->init();
 
// This makes sure that the content is sent to the browser as text/html and the UTF-8 character set (since we didn't change it).
$feed->handle_content_type();
?>
    <div class="container">
    <table><tr height="25px">
    <td style="vertical-align:middle"><img src="images/aggregator.png" width="50px"/></td>
    <td style="vertical-align:middle">SSoG News Aggregator</td>
    <td width=350px>&nbsp</td>
    <td style="vertical-align:middle">
    <input type="checkbox" label="Kotaku" id = "Kotaku" name = "Kotaku" <?php if($kotaku=="checked") echo (' checked = true'); ?><?php if($kotaku_enabled=="false") echo (' disabled = true'); ?>>Kotaku
    <input type="checkbox" label ="Polygon" id = "Polygon" name="Polygon" <?php if($polygon=="checked") echo (' checked = true'); ?><?php if($polygon_enabled=="false") echo (' disabled = true'); ?>>Polygon
    <input type="checkbox" label="Joystiq" id = "Joystiq" name="Joystiq" <?php if($joystiq=="checked") echo (' checked = true'); ?><?php if($joystiq_enabled=="false") echo (' disabled = true'); ?>>Joystiq
    <input type="checkbox" label="Destructoid" id = "Destructoid" name="Destructoid" <?php if($destructoid=="checked") echo (' checked = true'); ?> <?php if($destructoid_enabled=="false") echo (' disabled = true'); ?>>Destructoid
    <input type="checkbox" label="Siliconera" id = "Siliconera" name="Siliconera" <?php if($siliconera=="checked") echo (' checked = true'); ?><?php if($siliconera_enabled=="false") echo (' disabled = true'); ?>>Siliconera
    <button value="Filter" onclick="refresh_url()">Filter</button>
    <button value="Save" onclick="save_cookies()">Save Settings</button>
    <button value="Clear" onclick="clear_cookies()">Clear Settings</button>
    </td>
    </tr></table>
    
    <?php
	/*
	Here, we'll loop through all of the items in the feed, and $item represents the current item in the loop.
	*/
	foreach ($feed->get_items() as $item):
        
        /* Set the color for the background.  There has to be a better way to do this... */
        $color = "";
        if ($item->get_base() == "http://www.joystiq.com/")
        $color = "joystiq";
        if ($item->get_base() == "http://www.polygon.com/")
        $color = "polygon";
        if ($item->get_base() == "http://www.destructoid.com/?mode=atom")
        $color = "destructoid";
        if ($item->get_base() == "http://kotaku.com/")
        $color = "kotaku";
        if ($item->get_base() == "http://www.siliconera.com/")
        $color = "siliconera";
    
    ?>
        <div 
        onmouseover="this.style.cursor='hand'; this.style.opacity=.6; this.filters.alpha.opacity=60" 
        onmouseout= "this.style.opacity=1; this.filters.alpha.opacity=100" 
        onclick= "window.location.href = '<?php echo $item->get_permalink(); ?>'"
        class= "item <?php echo $color;?>">
        	<h2><?php echo $item->get_title(); ?></h2>
			<div class = "longtext"><?php echo $item->get_description(); ?></div>
			<p><small>Posted on <?php echo $item->get_date('j F Y | g:i a'); ?></small></p>            
        </div>
        
	<?php endforeach; ?>
</div>
</body>
</html>