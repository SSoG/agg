<?php
 
// Make sure SimplePie is included. You may need to change this to match the location of autoloader.php
// For 1.0-1.2:
 
#require_once('../simplepie.inc');
// For 1.3+:
require_once('php/autoloader.php');
 
// We'll process this feed with all of the default options.
$feed = new SimplePie();
 
// Set which feed to process.
$feed->set_feed_url(array(
	'http://www.gamestop.com/gs/content/feeds/gs_cs_All.xml',
));
 
// Run SimplePie.
$feed->init();
 
// This makes sure that the content is sent to the browser as text/html and the UTF-8 character set (since we didn't change it).
$feed->handle_content_type();
 
// Let's begin our XHTML webpage code.  The DOCTYPE is supposed to be the very first thing, so we'll keep it on the same line as the closing-PHP tag.
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN"
 
<html xmlns
<head>
	<title>Sample SimplePie Page</title>
	<meta
</head>
<body>
 
	<div class="header">
		<h1><a href="<?php echo $feed->get_permalink(); ?>"><?php echo $feed->get_title(); ?></a></h1>
		<p><?php echo $feed->get_description(); ?></p>
	</div>
 
	<?php
	/*
	Here, we'll loop through all of the items in the feed, and $item represents the current item in the loop.
	*/
	foreach ($feed->get_items() as $item):
	?>
		<div class="item">
			<?php $category = $item->get_category(); $label = $category->get_label(); ?>
			<?php if ($label == "PlayStation 3" or $label == "Nintendo Wii U" or $label == "Xbox 360" or $label == "PC" or $label == "Nintendo 3DS" or $label == "PS Vita"){ ?>
			<h2><a href="<?php echo $item->get_permalink(); ?>"><?php echo $item->get_title(); ?></a></h2>
			<p><?php echo $item->get_description(); ?></p>
			<br/><br/><br/><br/><br/><?php }?>
		</div>
 
	<?php endforeach; ?>
 
</body>
</html>