<?php
/**
 * Getting Started
 *
 * @package YOUTUBE_SHOWCASE
 * @since WPAS 5.3
 */
if (!defined('ABSPATH')) exit;
add_action('youtube_showcase_getting_started', 'youtube_showcase_getting_started');
/**
 * Display getting started information
 * @since WPAS 5.3
 *
 * @return html
 */
function youtube_showcase_getting_started() {
	global $title;
	list($display_version) = explode('-', YOUTUBE_SHOWCASE_VERSION);
?>
<style>
.about-wrap img{
max-height: 200px;
}
div.comp-feature {
    font-weight: 400;
    font-size:20px;
}
.edition-com {
    display: none;
}
.green{
color: #008000;
font-size: 30px;
}
#nav-compare:before{
    content: "\f179";
}
#emd-about .nav-tab-wrapper a:before{
    position: relative;
    box-sizing: content-box;
padding: 0px 3px;
color: #4682b4;
    width: 20px;
    height: 20px;
    overflow: hidden;
    white-space: nowrap;
    font-size: 20px;
    line-height: 1;
    cursor: pointer;
font-family: dashicons;
}
#nav-getting-started:before{
content: "\f102";
}
#nav-release-notes:before{
content: "\f348";
}
#nav-resources:before{
content: "\f118";
}
#nav-features:before{
content: "\f339";
}
#emd-about .embed-container { 
	position: relative; 
	padding-bottom: 56.25%;
	height: 0;
	overflow: hidden;
	max-width: 100%;
	height: auto;
	} 

#emd-about .embed-container iframe,
#emd-about .embed-container object,
#emd-about .embed-container embed { 
	position: absolute;
	top: 0;
	left: 0;
	width: 100%;
	height: 100%;
	}
#emd-about ul li:before{
    content: "\f522";
    font-family: dashicons;
    font-size:25px;
 }
#gallery {
display: -webkit-box;
display: -ms-flexbox;
display: flex;
-ms-flex-wrap: wrap;
    flex-wrap: wrap;
}
#gallery .gallery-item {
	margin-top: 10px;
	margin-right: 10px;
	text-align: center;
        cursor:pointer;
}
#gallery img {
	border: 2px solid #cfcfcf; 
height: 405px; 
width: auto; 
}
#gallery .gallery-caption {
	margin-left: 0;
}
#emd-about .top{
text-decoration:none;
}
#emd-about .toc{
    background-color: #fff;
    padding: 25px;
    border: 1px solid #add8e6;
    border-radius: 8px;
}
#emd-about h3,
#emd-about h2{
    margin-top: 0px;
    margin-right: 0px;
    margin-bottom: 0.6em;
    margin-left: 0px;
}
#emd-about p,
#emd-about .emd-section li{
font-size:18px
}
#emd-about a.top:after{
content: "\f342";
    font-family: dashicons;
    font-size:25px;
text-decoration:none;
}
#emd-about .toc a,
#emd-about a.top{
vertical-align: top;
}
#emd-about li{
list-style-type: none;
line-height: normal;
}
#emd-about ol li {
    list-style-type: decimal;
}
#emd-about .quote{
    background: #fff;
    border-left: 4px solid #088cf9;
    -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
    box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
    margin-top: 25px;
    padding: 1px 12px;
}
#emd-about .tooltip{
    display: inline;
    position: relative;
}
#emd-about .tooltip:hover:after{
    background: #333;
    background: rgba(0,0,0,.8);
    border-radius: 5px;
    bottom: 26px;
    color: #fff;
    content: 'Click to enlarge';
    left: 20%;
    padding: 5px 15px;
    position: absolute;
    z-index: 98;
    width: 220px;
}
</style>

<?php add_thickbox(); ?>
<div id="emd-about" class="wrap about-wrap">
<div id="emd-header" style="padding:10px 0" class="wp-clearfix">
<div style="float:right"><img src="<?php echo YOUTUBE_SHOWCASE_PLUGIN_URL . "assets/img/youtubesc-icon-128x128.png"; ?>"></div>
<div style="margin: .2em 200px 0 0;padding: 0;color: #32373c;line-height: 1.2em;font-size: 2.8em;font-weight: 400;">
<?php printf(__('Welcome to YouTube Showcase Community %s', 'youtube-showcase') , $display_version); ?>
</div>

<p class="about-text">
<?php printf(__("YouTube Showcase is a powerful but simple-to-use YouTube video gallery plugin with responsive frontend.", 'youtube-showcase') , $display_version); ?>
</p>
<div style="display: inline-block;"><a style="height: 50px; background:#ff8484;padding:10px 12px;color:#ffffff;text-align: center;font-weight: bold;line-height: 50px; font-family: Arial;border-radius: 6px; text-decoration: none;" href="https://emdplugins.com/plugin-pricing/youtube-showcase-wordpress-plugin-pricing/?pk_campaign=youtube-showcase-upgradebtn&amp;pk_kwd=youtube-showcase-resources"><?php printf(__('Upgrade Now', 'youtube-showcase') , $display_version); ?></a></div>
<div style="display: inline-block;margin-bottom: 20px;"><a style="height: 50px; background:#f0ad4e;padding:10px 12px;color:#ffffff;text-align: center;font-weight: bold;line-height: 50px; font-family: Arial;border-radius: 6px; text-decoration: none;" href="https://ytshowcase.emdplugins.com//?pk_campaign=youtube-showcase-buybtn&amp;pk_kwd=youtube-showcase-resources"><?php printf(__('Visit Pro Demo Site', 'youtube-showcase') , $display_version); ?></a></div>
<?php
	$tabs['getting-started'] = __('Getting Started', 'youtube-showcase');
	$tabs['release-notes'] = __('Release Notes', 'youtube-showcase');
	$tabs['resources'] = __('Resources', 'youtube-showcase');
	$tabs['features'] = __('Features', 'youtube-showcase');
	$active_tab = isset($_GET['tab']) ? $_GET['tab'] : 'getting-started';
	echo '<h2 class="nav-tab-wrapper wp-clearfix">';
	foreach ($tabs as $ktab => $mytab) {
		$tab_url[$ktab] = esc_url(add_query_arg(array(
			'tab' => $ktab
		)));
		$active = "";
		if ($active_tab == $ktab) {
			$active = "nav-tab-active";
		}
		echo '<a href="' . esc_url($tab_url[$ktab]) . '" class="nav-tab ' . $active . '" id="nav-' . $ktab . '">' . $mytab . '</a>';
	}
	echo '</h2>';
?>
<?php echo '<div class="tab-content" id="tab-getting-started"';
	if ("getting-started" != $active_tab) {
		echo 'style="display:none;"';
	}
	echo '>';
?>
<div style="height:25px" id="rtop"></div><div class="toc"><h3 style="color:#0073AA;text-align:left;">Quickstart</h3><ul><li><a href="#gs-sec-176">Live Demo Site</a></li>
<li><a href="#gs-sec-237">Need Help?</a></li>
<li><a href="#gs-sec-238">Learn More</a></li>
<li><a href="#gs-sec-236">Installation, Configuration & Customization Service</a></li>
<li><a href="#gs-sec-175">Introduction to YouTube Showcase</a></li>
<li><a href="#gs-sec-5">How to find your YouTube Video ID</a></li>
<li><a href="#gs-sec-6">Using Setup assistant</a></li>
<li><a href="#gs-sec-3">How to create your first video</a></li>
<li><a href="#gs-sec-7">YouTube Showcase Pro WordPress plugin helps you keep more visitors on your site longer.</a></li>
<li><a href="#gs-sec-8">EMD CSV Import Export Extension allows getting your videos in and out of WordPress quickly</a></li>
<li><a href="#gs-sec-142">EMD Advanced Filters and Columns Extension for finding what's important faster</a></li>
</ul></div><div class="quote">
<p class="about-description">The secret of getting ahead is getting started - Mark Twain</p>
</div>
<div id="gs-sec-176"></div><div style="color:white;background:#0000003b;padding:5px 10px;font-size: 1.4em;font-weight: 600;">Live Demo Site</div><div class="changelog emd-section getting-started-176" style="margin:0;background-color:white;padding:10px"><div id="gallery"></div><div class="sec-desc"><p>Feel free to check out our <a target="_blank" href="https://ytshowcasecom.emdplugins.com/?pk_campaign=youtube-showcase-gettingstarted&pk_kwd=youtube-showcase-livedemo">live demo site</a> to learn how to use YouTube Showcase Community starter edition. The demo site will always have the latest version installed.</p>
<p>You can also use the demo site to identify possible issues. If the same issue exists in the demo site, open a support ticket and we will fix it. If a YouTube Showcase Community feature is not functioning or displayed correctly in your site but looks and works properly in the demo site, it means the theme or a third party plugin or one or more configuration parameters of your site is causing the issue.</p>
<p>If you'd like us to identify and fix the issues specific to your site, purchase a work order to get started.</p>
<p><a target="_blank" style="
    padding: 16px;
    background: coral;
    border: 1px solid lightgray;
    border-radius: 12px;
    text-decoration: none;
    color: white;
    margin: 10px 0;
    display: inline-block;" href="https://emdplugins.com/expert-service-pricing/?pk_campaign=youtube-showcase-gettingstarted&pk_kwd=youtube-showcase-livedemo">Purchase Work Order</a></p></div></div><div style="margin-top:15px"><a href="#rtop" class="top">Go to top</a></div><hr style="margin-top:40px"><div id="gs-sec-237"></div><div style="color:white;background:#0000003b;padding:5px 10px;font-size: 1.4em;font-weight: 600;">Need Help?</div><div class="changelog emd-section getting-started-237" style="margin:0;background-color:white;padding:10px"><div id="gallery"></div><div class="sec-desc"><p>There are many resources available in case you need help:</p>
<ul>
<li>Search our <a target="_blank" href="https://emdplugins.com/support">knowledge base</a></li>
<li><a href="https://emdplugins.com/kb_tags/youtube-showcase" target="_blank">Browse our YouTube Showcase Community articles</a></li>
<li><a href="https://docs.emdplugins.com/docs/youtube-showcase-community-documentation" target="_blank">Check out YouTube Showcase Community documentation for step by step instructions.</a></li>
<li><a href="https://emdplugins.com/emdplugins-support-introduction/" target="_blank">Open a support ticket if you still could not find the answer to your question</a></li>
</ul>
<p>Please read <a href="https://emdplugins.com/questions/what-to-write-on-a-support-ticket-related-to-a-technical-issue/" target="_blank">"What to write to report a technical issue"</a> before submitting a support ticket.</p></div></div><div style="margin-top:15px"><a href="#rtop" class="top">Go to top</a></div><hr style="margin-top:40px"><div id="gs-sec-238"></div><div style="color:white;background:#0000003b;padding:5px 10px;font-size: 1.4em;font-weight: 600;">Learn More</div><div class="changelog emd-section getting-started-238" style="margin:0;background-color:white;padding:10px"><div id="gallery"></div><div class="sec-desc"><p>The following articles provide step by step instructions on various concepts covered in YouTube Showcase Community.</p>
<ul><li>
<a target="_blank" href="https://docs.emdplugins.com/docs/youtube-showcase-community-documentation/#article208">Concepts</a>
</li>
<li>
<a target="_blank" href="https://docs.emdplugins.com/docs/youtube-showcase-community-documentation/#article465">Quick Start</a>
</li>
<li>
<a target="_blank" href="https://docs.emdplugins.com/docs/youtube-showcase-community-documentation/#article216">Working with Videos</a>
</li>
<li>
<a target="_blank" href="https://docs.emdplugins.com/docs/youtube-showcase-community-documentation/#article209">Widgets</a>
</li>
<li>
<a target="_blank" href="https://docs.emdplugins.com/docs/youtube-showcase-community-documentation/#article210">Standards</a>
</li>
<li>
<a target="_blank" href="https://docs.emdplugins.com/docs/youtube-showcase-community-documentation/#article211">Integrations</a>
</li>
<li>
<a target="_blank" href="https://docs.emdplugins.com/docs/youtube-showcase-community-documentation/#article217">Roles and Capabilities</a>
</li>
<li>
<a target="_blank" href="https://docs.emdplugins.com/docs/youtube-showcase-community-documentation/#article212">Administration</a>
</li>
<li>
<a target="_blank" href="https://docs.emdplugins.com/docs/youtube-showcase-community-documentation/#article214">Screen Options</a>
</li>
<li>
<a target="_blank" href="https://docs.emdplugins.com/docs/youtube-showcase-community-documentation/#article397">Creating Shortcodes</a>
</li>
<li>
<a target="_blank" href="https://docs.emdplugins.com/docs/youtube-showcase-community-documentation/#article213">Localization(l10n)</a>
</li>
<li>
<a target="_blank" href="https://docs.emdplugins.com/docs/youtube-showcase-community-documentation/#article398">Customizations</a>
</li>
<li>
<a target="_blank" href="https://docs.emdplugins.com/docs/youtube-showcase-community-documentation/#article215">Glossary</a>
</li></ul>
</div></div><div style="margin-top:15px"><a href="#rtop" class="top">Go to top</a></div><hr style="margin-top:40px"><div id="gs-sec-236"></div><div style="color:white;background:#0000003b;padding:5px 10px;font-size: 1.4em;font-weight: 600;">Installation, Configuration & Customization Service</div><div class="changelog emd-section getting-started-236" style="margin:0;background-color:white;padding:10px"><div id="gallery"></div><div class="sec-desc"><p>Get the peace of mind that comes from having YouTube Showcase Community properly installed, configured or customized by eMarket Design.</p>
<p>Being the developer of YouTube Showcase Community, we understand how to deliver the best value, mitigate risks and get the software ready for you to use quickly.</p>
<p>Our service includes:</p>
<ul>
<li>Professional installation by eMarket Design experts.</li>
<li>Configuration to meet your specific needs</li>
<li>Installation completed quickly and according to best practice</li>
<li>Knowledge of YouTube Showcase Community best practices transferred to your team</li>
</ul>
<p>Pricing of the service is based on the complexity of level of effort, required skills or expertise. To determine the estimated price and duration of this service, and for more information about related services, purchase a work order.  
<p><a target="_blank" style="
    padding: 16px;
    background: coral;
    border: 1px solid lightgray;
    border-radius: 12px;
    text-decoration: none;
    color: white;
    margin: 10px 0;
    display: inline-block;" href="https://emdplugins.com/expert-service-pricing/?pk_campaign=youtube-showcase-gettingstarted&pk_kwd=youtube-showcase-livedemo">Purchase Work Order</a></p></div></div><div style="margin-top:15px"><a href="#rtop" class="top">Go to top</a></div><hr style="margin-top:40px"><div id="gs-sec-175"></div><div style="color:white;background:#0000003b;padding:5px 10px;font-size: 1.4em;font-weight: 600;">Introduction to YouTube Showcase</div><div class="changelog emd-section getting-started-175" style="margin:0;background-color:white;padding:10px"><div class="emd-yt" data-youtube-id="8MtOJaKQZKQ" data-ratio="16:9">loading...</div><div class="sec-desc"><p>Get started with YouTube Showcase. This video introduces YouTube Showcase based on the most common use cases. You will learn how to create and display your videos as well as the options available to have successful YouTube video site.</p></div></div><div style="margin-top:15px"><a href="#rtop" class="top">Go to top</a></div><hr style="margin-top:40px"><div id="gs-sec-5"></div><div style="color:white;background:#0000003b;padding:5px 10px;font-size: 1.4em;font-weight: 600;">How to find your YouTube Video ID</div><div class="changelog emd-section getting-started-5" style="margin:0;background-color:white;padding:10px"><div id="gallery"><div class="sec-img gallery-item"><a class="thickbox tooltip" rel="gallery-5" href="<?php echo YOUTUBE_SHOWCASE_PLUGIN_URL . "assets/img/video_id_large.png"; ?>"><img src="<?php echo YOUTUBE_SHOWCASE_PLUGIN_URL . "assets/img/video_id_540.png"; ?>"></a></div></div><div class="sec-desc"><p>It is very simple to find your YouTube video ID. First, go to the YouTube webpage. Look at the URL of that page, and at the end of it, you should see a combination of numbers and letters after an equal sign (=). This is the code you need to enter into the video key field.</p></div></div><div style="margin-top:15px"><a href="#rtop" class="top">Go to top</a></div><hr style="margin-top:40px"><div id="gs-sec-6"></div><div style="color:white;background:#0000003b;padding:5px 10px;font-size: 1.4em;font-weight: 600;">Using Setup assistant</div><div class="changelog emd-section getting-started-6" style="margin:0;background-color:white;padding:10px"><div id="gallery"><div class="sec-img gallery-item"><a class="thickbox tooltip" rel="gallery-6" href="<?php echo YOUTUBE_SHOWCASE_PLUGIN_URL . "assets/img/video_gallery_large.png"; ?>"><img src="<?php echo YOUTUBE_SHOWCASE_PLUGIN_URL . "assets/img/video_gallery_540.png"; ?>"></a></div></div><div class="sec-desc"><p>Setup assistant creates the gallery pages automatically.</p></div></div><div style="margin-top:15px"><a href="#rtop" class="top">Go to top</a></div><hr style="margin-top:40px"><div id="gs-sec-3"></div><div style="color:white;background:#0000003b;padding:5px 10px;font-size: 1.4em;font-weight: 600;">How to create your first video</div><div class="changelog emd-section getting-started-3" style="margin:0;background-color:white;padding:10px"><div id="gallery"><div class="sec-img gallery-item"><a class="thickbox tooltip" rel="gallery-3" href="<?php echo YOUTUBE_SHOWCASE_PLUGIN_URL . "assets/img/video_edit_large.png"; ?>"><img src="<?php echo YOUTUBE_SHOWCASE_PLUGIN_URL . "assets/img/video_edit_540.png"; ?>"></a></div></div><div class="sec-desc"><ol>
  <li>Log in to your Administration Panel.</li>
  <li>Click the 'Videos' tab.</li>
  <li>Click the 'Add New' sub-tab or the “Add New” button in the video list page.</li>
  <li>Start filling in your video fields. You must fill all required fields. All required fields have red star after their labels.</li>
  <li>As needed, set video taxonomies and relationships. All required relationships or taxonomies must be set.</li>
  <li>When you are ready, click Publish. If you do not have publish privileges, the "Submit for Review" button is displayed.</li>
  <li>After the submission is completed, the video status changes to "Published"</li>
<li>Click on the permalink to see the video page</li>
</ol></div></div><div style="margin-top:15px"><a href="#rtop" class="top">Go to top</a></div><hr style="margin-top:40px"><div id="gs-sec-7"></div><div style="color:white;background:#0000003b;padding:5px 10px;font-size: 1.4em;font-weight: 600;">YouTube Showcase Pro WordPress plugin helps you keep more visitors on your site longer.</div><div class="changelog emd-section getting-started-7" style="margin:0;background-color:white;padding:10px"><div id="gallery"><div class="sec-img gallery-item"><a class="thickbox tooltip" rel="gallery-7" href="<?php echo YOUTUBE_SHOWCASE_PLUGIN_URL . "assets/img/GetYouTubePro.png"; ?>"><img src="<?php echo YOUTUBE_SHOWCASE_PLUGIN_URL . "assets/img/GetYouTubePro.png"; ?>"></a></div></div><div class="sec-desc"><p>The most powerful and easy to use YouTube Video plugin for WordPress with enterprise features.</p>
<div style="margin:25px"><a href="https://emdplugins.com/plugins/youtube-showcase-wordpress-plugin/?pk_campaign=ytscpro-buybtn&pk_kwd=ytsc-resources"><img style="width: 154px;" src="<?php echo YOUTUBE_SHOWCASE_PLUGIN_URL . "assets/img/button_buy-now.png"; ?>"></a>
</div></div></div><div style="margin-top:15px"><a href="#rtop" class="top">Go to top</a></div><hr style="margin-top:40px"><div id="gs-sec-8"></div><div style="color:white;background:#0000003b;padding:5px 10px;font-size: 1.4em;font-weight: 600;">EMD CSV Import Export Extension allows getting your videos in and out of WordPress quickly</div><div class="changelog emd-section getting-started-8" style="margin:0;background-color:white;padding:10px"><div id="gallery"><div class="sec-img gallery-item"><a class="thickbox tooltip" rel="gallery-8" href="<?php echo YOUTUBE_SHOWCASE_PLUGIN_URL . "assets/img/video_impexp.png"; ?>"><img src="<?php echo YOUTUBE_SHOWCASE_PLUGIN_URL . "assets/img/video_impexp.png"; ?>"></a></div></div><div class="sec-desc"><p>EMD CSV Import Export Extension helps bulk import, export, update video information from CSV files. You can also reset(delete) all data and start over again without modifying database.</p>
<p><a href="https://emdplugins.com/plugin-features/youtube-showcase-importexport-addon/?pk_campaign=emdimpexp-buybtn&pk_kwd=ytsc-resources"><img style="width: 154px;" src="<?php echo YOUTUBE_SHOWCASE_PLUGIN_URL . "assets/img/button_buy-now.png"; ?>"></a></p></div></div><div style="margin-top:15px"><a href="#rtop" class="top">Go to top</a></div><hr style="margin-top:40px"><div id="gs-sec-142"></div><div style="color:white;background:#0000003b;padding:5px 10px;font-size: 1.4em;font-weight: 600;">EMD Advanced Filters and Columns Extension for finding what's important faster</div><div class="changelog emd-section getting-started-142" style="margin:0;background-color:white;padding:10px"><div id="gallery"><div class="sec-img gallery-item"><a class="thickbox tooltip" rel="gallery-142" href="<?php echo YOUTUBE_SHOWCASE_PLUGIN_URL . "assets/img/YouTubeShowCasePro_APM.png"; ?>"><img src="<?php echo YOUTUBE_SHOWCASE_PLUGIN_URL . "assets/img/YouTubeShowCasePro_APM.png"; ?>"></a></div></div><div class="sec-desc"><p>This extension is included in the pro edition.</p>
<p>EMD Advanced Filters and Columns Extension for YouTube Showcase Community edition helps you:</p>
<ul><li>Filter entries quickly to find what you're looking for</li>
<li>Save your frequently used filters so you do not need to create them again</li>
<li>Sort quote request columns to see what's important faster</li>
<li>Change the display order of columns </li>
<li>Enable or disable columns for better and cleaner look </li>
<li>Export search results to PDF or CSV for custom reporting</li></ul><div style="margin:25px"><a href="https://emdplugins.com/plugin-features/youtube-showcase-smart-search-and-columns-addon/?pk_campaign=emd-afc-buybtn&pk_kwd=youtube-showcase-resources"><img style="width: 154px;" src="<?php echo YOUTUBE_SHOWCASE_PLUGIN_URL . "assets/img/button_buy-now.png"; ?>"></a></div></div></div><div style="margin-top:15px"><a href="#rtop" class="top">Go to top</a></div><hr style="margin-top:40px">

<?php echo '</div>'; ?>
<?php echo '<div class="tab-content" id="tab-release-notes"';
	if ("release-notes" != $active_tab) {
		echo 'style="display:none;"';
	}
	echo '>';
?>
<p class="about-description">This page lists the release notes from every production version of YouTube Showcase Community.</p>


<h3 style="font-size: 18px;font-weight:700;color: white;background: #708090;padding:5px 10px;width:155px;border: 2px solid #fff;border-radius:4px;text-align:center">3.3.1 changes</h3>
<div class="wp-clearfix"><div class="changelog emd-section whats-new whats-new-1283" style="margin:0">
<h3 style="font-size:18px;" class="tweak"><div  style="font-size:110%;color:#33b5e5"><span class="dashicons dashicons-admin-settings"></span> TWEAK</div>
tested with WP 5.7</h3>
<div ></a></div></div></div><hr style="margin:30px 0">
<h3 style="font-size: 18px;font-weight:700;color: white;background: #708090;padding:5px 10px;width:155px;border: 2px solid #fff;border-radius:4px;text-align:center">3.3.0 changes</h3>
<div class="wp-clearfix"><div class="changelog emd-section whats-new whats-new-1262" style="margin:0">
<h3 style="font-size:18px;" class="fix"><div  style="font-size:110%;color:#c71585"><span class="dashicons dashicons-admin-tools"></span> FIX</div>
Pagination bar not showing in mobile devices in the video gallery view.</h3>
<div ></a></div></div></div><hr style="margin:30px 0">
<h3 style="font-size: 18px;font-weight:700;color: white;background: #708090;padding:5px 10px;width:155px;border: 2px solid #fff;border-radius:4px;text-align:center">3.2.9 changes</h3>
<div class="wp-clearfix"><div class="changelog emd-section whats-new whats-new-1211" style="margin:0">
<h3 style="font-size:18px;" class="fix"><div  style="font-size:110%;color:#c71585"><span class="dashicons dashicons-admin-tools"></span> FIX</div>
multi-select form component missing scroll bars when the content overflows its fixed height.</h3>
<div ></a></div></div></div><hr style="margin:30px 0">
<h3 style="font-size: 18px;font-weight:700;color: white;background: #708090;padding:5px 10px;width:155px;border: 2px solid #fff;border-radius:4px;text-align:center">3.2.8 changes</h3>
<div class="wp-clearfix"><div class="changelog emd-section whats-new whats-new-1210" style="margin:0">
<h3 style="font-size:18px;" class="tweak"><div  style="font-size:110%;color:#33b5e5"><span class="dashicons dashicons-admin-settings"></span> TWEAK</div>
fixes and improvements for better performance and compatibility</h3>
<div ></a></div></div></div><hr style="margin:30px 0">
<h3 style="font-size: 18px;font-weight:700;color: white;background: #708090;padding:5px 10px;width:155px;border: 2px solid #fff;border-radius:4px;text-align:center">3.2.7 changes</h3>
<div class="wp-clearfix"><div class="changelog emd-section whats-new whats-new-1139" style="margin:0">
<h3 style="font-size:18px;" class="new"><div style="font-size:110%;color:#00C851"><span class="dashicons dashicons-megaphone"></span> NEW</div>
Added version numbers to js and css files for caching purposes</h3>
<div ></a></div></div></div><hr style="margin:30px 0"><div class="wp-clearfix"><div class="changelog emd-section whats-new whats-new-1138" style="margin:0">
<h3 style="font-size:18px;" class="tweak"><div  style="font-size:110%;color:#33b5e5"><span class="dashicons dashicons-admin-settings"></span> TWEAK</div>
tested with WP 5.5.1</h3>
<div ></a></div></div></div><hr style="margin:30px 0"><div class="wp-clearfix"><div class="changelog emd-section whats-new whats-new-1132" style="margin:0">
<h3 style="font-size:18px;" class="tweak"><div  style="font-size:110%;color:#33b5e5"><span class="dashicons dashicons-admin-settings"></span> TWEAK</div>
updates to translation strings and libraries</h3>
<div ></a></div></div></div><hr style="margin:30px 0">
<h3 style="font-size: 18px;font-weight:700;color: white;background: #708090;padding:5px 10px;width:155px;border: 2px solid #fff;border-radius:4px;text-align:center">3.2.6 changes</h3>
<div class="wp-clearfix"><div class="changelog emd-section whats-new whats-new-1086" style="margin:0">
<h3 style="font-size:18px;" class="tweak"><div  style="font-size:110%;color:#33b5e5"><span class="dashicons dashicons-admin-settings"></span> TWEAK</div>
updates and improvements to libraries</h3>
<div ></a></div></div></div><hr style="margin:30px 0"><div class="wp-clearfix"><div class="changelog emd-section whats-new whats-new-1085" style="margin:0">
<h3 style="font-size:18px;" class="new"><div style="font-size:110%;color:#00C851"><span class="dashicons dashicons-megaphone"></span> NEW</div>
Added previous and next buttons for the edit screens of videos</h3>
<div ></a></div></div></div><hr style="margin:30px 0">
<h3 style="font-size: 18px;font-weight:700;color: white;background: #708090;padding:5px 10px;width:155px;border: 2px solid #fff;border-radius:4px;text-align:center">3.2.5 changes</h3>
<div class="wp-clearfix"><div class="changelog emd-section whats-new whats-new-1037" style="margin:0">
<h3 style="font-size:18px;" class="tweak"><div  style="font-size:110%;color:#33b5e5"><span class="dashicons dashicons-admin-settings"></span> TWEAK</div>
updates and improvements to form library</h3>
<div ></a></div></div></div><hr style="margin:30px 0"><div class="wp-clearfix"><div class="changelog emd-section whats-new whats-new-1034" style="margin:0">
<h3 style="font-size:18px;" class="tweak"><div  style="font-size:110%;color:#33b5e5"><span class="dashicons dashicons-admin-settings"></span> TWEAK</div>
Emd templates</h3>
<div ></a></div></div></div><hr style="margin:30px 0"><div class="wp-clearfix"><div class="changelog emd-section whats-new whats-new-1033" style="margin:0">
<h3 style="font-size:18px;" class="tweak"><div  style="font-size:110%;color:#33b5e5"><span class="dashicons dashicons-admin-settings"></span> TWEAK</div>
updates and improvements to libraries</h3>
<div ></a></div></div></div><hr style="margin:30px 0">
<h3 style="font-size: 18px;font-weight:700;color: white;background: #708090;padding:5px 10px;width:155px;border: 2px solid #fff;border-radius:4px;text-align:center">3.2.4 changes</h3>
<div class="wp-clearfix"><div class="changelog emd-section whats-new whats-new-943" style="margin:0">
<h3 style="font-size:18px;" class="tweak"><div  style="font-size:110%;color:#33b5e5"><span class="dashicons dashicons-admin-settings"></span> TWEAK</div>
Fix issue related to extensions</h3>
<div ></a></div></div></div><hr style="margin:30px 0">
<h3 style="font-size: 18px;font-weight:700;color: white;background: #708090;padding:5px 10px;width:155px;border: 2px solid #fff;border-radius:4px;text-align:center">3.2.3 changes</h3>
<div class="wp-clearfix"><div class="changelog emd-section whats-new whats-new-933" style="margin:0">
<h3 style="font-size:18px;" class="tweak"><div  style="font-size:110%;color:#33b5e5"><span class="dashicons dashicons-admin-settings"></span> TWEAK</div>
Remove unused code and additional hardening for security</h3>
<div ></a></div></div></div><hr style="margin:30px 0">
<h3 style="font-size: 18px;font-weight:700;color: white;background: #708090;padding:5px 10px;width:155px;border: 2px solid #fff;border-radius:4px;text-align:center">3.2.2 changes</h3>
<div class="wp-clearfix"><div class="changelog emd-section whats-new whats-new-922" style="margin:0">
<h3 style="font-size:18px;" class="fix"><div  style="font-size:110%;color:#c71585"><span class="dashicons dashicons-admin-tools"></span> FIX</div>
Paging issue on Video Gallery</h3>
<div ></a></div></div></div><hr style="margin:30px 0"><div class="wp-clearfix"><div class="changelog emd-section whats-new whats-new-921" style="margin:0">
<h3 style="font-size:18px;" class="fix"><div  style="font-size:110%;color:#c71585"><span class="dashicons dashicons-admin-tools"></span> FIX</div>
XSS related issues</h3>
<div ></a></div></div></div><hr style="margin:30px 0">
<h3 style="font-size: 18px;font-weight:700;color: white;background: #708090;padding:5px 10px;width:155px;border: 2px solid #fff;border-radius:4px;text-align:center">3.2.1 changes</h3>
<div class="wp-clearfix"><div class="changelog emd-section whats-new whats-new-913" style="margin:0">
<h3 style="font-size:18px;" class="tweak"><div  style="font-size:110%;color:#33b5e5"><span class="dashicons dashicons-admin-settings"></span> TWEAK</div>
Emd form builder upgrade messages</h3>
<div ></a></div></div></div><hr style="margin:30px 0">
<h3 style="font-size: 18px;font-weight:700;color: white;background: #708090;padding:5px 10px;width:155px;border: 2px solid #fff;border-radius:4px;text-align:center">3.2.0 changes</h3>
<div class="wp-clearfix"><div class="changelog emd-section whats-new whats-new-909" style="margin:0">
<h3 style="font-size:18px;" class="fix"><div  style="font-size:110%;color:#c71585"><span class="dashicons dashicons-admin-tools"></span> FIX</div>
Session cleanup workflow by creating a custom table to process records.</h3>
<div ></a></div></div></div><hr style="margin:30px 0"><div class="wp-clearfix"><div class="changelog emd-section whats-new whats-new-908" style="margin:0">
<h3 style="font-size:18px;" class="new"><div style="font-size:110%;color:#00C851"><span class="dashicons dashicons-megaphone"></span> NEW</div>
Added Emd form builder support</h3>
<div ></a></div></div></div><hr style="margin:30px 0">
<h3 style="font-size: 18px;font-weight:700;color: white;background: #708090;padding:5px 10px;width:155px;border: 2px solid #fff;border-radius:4px;text-align:center">3.1.1 changes</h3>
<div class="wp-clearfix"><div class="changelog emd-section whats-new whats-new-897" style="margin:0">
<h3 style="font-size:18px;" class="tweak"><div  style="font-size:110%;color:#33b5e5"><span class="dashicons dashicons-admin-settings"></span> TWEAK</div>
Misc. library updates for better stability and compatibility.</h3>
<div ></a></div></div></div><hr style="margin:30px 0">
<h3 style="font-size: 18px;font-weight:700;color: white;background: #708090;padding:5px 10px;width:155px;border: 2px solid #fff;border-radius:4px;text-align:center">3.1.0 changes</h3>
<div class="wp-clearfix"><div class="changelog emd-section whats-new whats-new-860" style="margin:0">
<h3 style="font-size:18px;" class="tweak"><div  style="font-size:110%;color:#33b5e5"><span class="dashicons dashicons-admin-settings"></span> TWEAK</div>
Emd templating system to match modern web standards</h3>
<div ></a></div></div></div><hr style="margin:30px 0"><div class="wp-clearfix"><div class="changelog emd-section whats-new whats-new-859" style="margin:0">
<h3 style="font-size:18px;" class="new"><div style="font-size:110%;color:#00C851"><span class="dashicons dashicons-megaphone"></span> NEW</div>
Created a new shortcode page which displays all available shortcodes. You can access this page under the plugin settings.</h3>
<div ></a></div></div></div><hr style="margin:30px 0">
<h3 style="font-size: 18px;font-weight:700;color: white;background: #708090;padding:5px 10px;width:155px;border: 2px solid #fff;border-radius:4px;text-align:center">3.0.0 changes</h3>
<div class="wp-clearfix"><div class="changelog emd-section whats-new whats-new-813" style="margin:0">
<h3 style="font-size:18px;" class="new"><div style="font-size:110%;color:#00C851"><span class="dashicons dashicons-megaphone"></span> NEW</div>
Added option to set No results found and No access messages in the plugin settings.</h3>
<div ></a></div></div></div><hr style="margin:30px 0"><div class="wp-clearfix"><div class="changelog emd-section whats-new whats-new-812" style="margin:0">
<h3 style="font-size:18px;" class="new"><div style="font-size:110%;color:#00C851"><span class="dashicons dashicons-megaphone"></span> NEW</div>
Added option to use captcha in video search submissions in the plugin settings.</h3>
<div ></a></div></div></div><hr style="margin:30px 0"><div class="wp-clearfix"><div class="changelog emd-section whats-new whats-new-811" style="margin:0">
<h3 style="font-size:18px;" class="new"><div style="font-size:110%;color:#00C851"><span class="dashicons dashicons-megaphone"></span> NEW</div>
Added option to show login or register before searching videos - handy feature for private or customer only videos.</h3>
<div ></a></div></div></div><hr style="margin:30px 0"><div class="wp-clearfix"><div class="changelog emd-section whats-new whats-new-810" style="margin:0">
<h3 style="font-size:18px;" class="new"><div style="font-size:110%;color:#00C851"><span class="dashicons dashicons-megaphone"></span> NEW</div>
Added ability enable or disable any video search field in the plugin settings.</h3>
<div ></a></div></div></div><hr style="margin:30px 0"><div class="wp-clearfix"><div class="changelog emd-section whats-new whats-new-809" style="margin:0">
<h3 style="font-size:18px;" class="tweak"><div  style="font-size:110%;color:#33b5e5"><span class="dashicons dashicons-admin-settings"></span> TWEAK</div>
Updated the third party code included in the plugin.</h3>
<div ></a></div></div></div><hr style="margin:30px 0"><div class="wp-clearfix"><div class="changelog emd-section whats-new whats-new-808" style="margin:0">
<h3 style="font-size:18px;" class="tweak"><div  style="font-size:110%;color:#33b5e5"><span class="dashicons dashicons-admin-settings"></span> TWEAK</div>
Improved the emd templating system removing obsolete code.</h3>
<div ></a></div></div></div><hr style="margin:30px 0"><div class="wp-clearfix"><div class="changelog emd-section whats-new whats-new-807" style="margin:0">
<h3 style="font-size:18px;" class="new"><div style="font-size:110%;color:#00C851"><span class="dashicons dashicons-megaphone"></span> NEW</div>
Added a sidebar widget allowing to search videos by title, category or tag.</h3>
<div ></a></div></div></div><hr style="margin:30px 0">
<h3 style="font-size: 18px;font-weight:700;color: white;background: #708090;padding:5px 10px;width:155px;border: 2px solid #fff;border-radius:4px;text-align:center">2.9.7 changes</h3>
<div class="wp-clearfix"><div class="changelog emd-section whats-new whats-new-771" style="margin:0">
<h3 style="font-size:18px;" class="tweak"><div  style="font-size:110%;color:#33b5e5"><span class="dashicons dashicons-admin-settings"></span> TWEAK</div>
Misc. library updates for better stability and compatibility.</h3>
<div ></a></div></div></div><hr style="margin:30px 0">
<h3 style="font-size: 18px;font-weight:700;color: white;background: #708090;padding:5px 10px;width:155px;border: 2px solid #fff;border-radius:4px;text-align:center">2.9.6 changes</h3>
<div class="wp-clearfix"><div class="changelog emd-section whats-new whats-new-732" style="margin:0">
<h3 style="font-size:18px;" class="tweak"><div  style="font-size:110%;color:#33b5e5"><span class="dashicons dashicons-admin-settings"></span> TWEAK</div>
Fixed the issue related to video thumbnails not displayed correctly in the widgets when video image resolution field is set.</h3>
<div ></a></div></div></div><hr style="margin:30px 0">
<h3 style="font-size: 18px;font-weight:700;color: white;background: #708090;padding:5px 10px;width:155px;border: 2px solid #fff;border-radius:4px;text-align:center">2.9.5 changes</h3>
<div class="wp-clearfix"><div class="changelog emd-section whats-new whats-new-712" style="margin:0">
<h3 style="font-size:18px;" class="tweak"><div  style="font-size:110%;color:#33b5e5"><span class="dashicons dashicons-admin-settings"></span> TWEAK</div>
Video grid and Video Grid Gallery thumbnails now use Video Image Resolution field to set the video image thumbnail and defaults to medium quality resolution.</h3>
<div ></a></div></div></div><hr style="margin:30px 0"><div class="wp-clearfix"><div class="changelog emd-section whats-new whats-new-711" style="margin:0">
<h3 style="font-size:18px;" class="tweak"><div  style="font-size:110%;color:#33b5e5"><span class="dashicons dashicons-admin-settings"></span> TWEAK</div>
Featured and recent video widget now use Video Image Resolution field to set the video image thumbnail and defaults to medium quality resolution.</h3>
<div ></a></div></div></div><hr style="margin:30px 0"><div class="wp-clearfix"><div class="changelog emd-section whats-new whats-new-710" style="margin:0">
<h3 style="font-size:18px;" class="tweak"><div  style="font-size:110%;color:#33b5e5"><span class="dashicons dashicons-admin-settings"></span> TWEAK</div>
Featured and recent video widget now use Video Image Resolution field to set the video image thumbnail.</h3>
<div ></a></div></div></div><hr style="margin:30px 0"><div class="wp-clearfix"><div class="changelog emd-section whats-new whats-new-709" style="margin:0">
<h3 style="font-size:18px;" class="new"><div style="font-size:110%;color:#00C851"><span class="dashicons dashicons-megaphone"></span> NEW</div>
Demo site - https://ytshowcasecom.emdplugins.com/ - where the latest version of YouTube Showcase Starter edition is installed.</h3>
<div ></a></div></div></div><hr style="margin:30px 0">
<h3 style="font-size: 18px;font-weight:700;color: white;background: #708090;padding:5px 10px;width:155px;border: 2px solid #fff;border-radius:4px;text-align:center">2.9.0 changes</h3>
<div class="wp-clearfix"><div class="changelog emd-section whats-new whats-new-583" style="margin:0">
<h3 style="font-size:18px;" class="fix"><div  style="font-size:110%;color:#c71585"><span class="dashicons dashicons-admin-tools"></span> FIX</div>
paging css</h3>
<div ></a></div></div></div><hr style="margin:30px 0"><div class="wp-clearfix"><div class="changelog emd-section whats-new whats-new-582" style="margin:0">
<h3 style="font-size:18px;" class="tweak"><div  style="font-size:110%;color:#33b5e5"><span class="dashicons dashicons-admin-settings"></span> TWEAK</div>
library updates</h3>
<div ></a></div></div></div><hr style="margin:30px 0">
<h3 style="font-size: 18px;font-weight:700;color: white;background: #708090;padding:5px 10px;width:155px;border: 2px solid #fff;border-radius:4px;text-align:center">2.8.0 changes</h3>
<div class="wp-clearfix"><div class="changelog emd-section whats-new whats-new-514" style="margin:0">
<h3 style="font-size:18px;" class="new"><div style="font-size:110%;color:#00C851"><span class="dashicons dashicons-megaphone"></span> NEW</div>
YouTube Showcase introduction video</h3>
<div ></a></div></div></div><hr style="margin:30px 0"><div class="wp-clearfix"><div class="changelog emd-section whats-new whats-new-513" style="margin:0">
<h3 style="font-size:18px;" class="fix"><div  style="font-size:110%;color:#c71585"><span class="dashicons dashicons-admin-tools"></span> FIX</div>
widget sidebar is not responding to screen size changes issue</h3>
<div ></a></div></div></div><hr style="margin:30px 0">
<h3 style="font-size: 18px;font-weight:700;color: white;background: #708090;padding:5px 10px;width:155px;border: 2px solid #fff;border-radius:4px;text-align:center">2.7.6 changes</h3>
<div class="wp-clearfix"><div class="changelog emd-section whats-new whats-new-512" style="margin:0">
<h3 style="font-size:18px;" class="fix"><div  style="font-size:110%;color:#c71585"><span class="dashicons dashicons-admin-tools"></span> FIX</div>
video gallery paging issue</h3>
<div ></a></div></div></div><hr style="margin:30px 0"><div class="wp-clearfix"><div class="changelog emd-section whats-new whats-new-491" style="margin:0">
<h3 style="font-size:18px;" class="tweak"><div  style="font-size:110%;color:#33b5e5"><span class="dashicons dashicons-admin-settings"></span> TWEAK</div>
Fix video gallery paging issue</h3>
<div ></a></div></div></div><hr style="margin:30px 0">
<h3 style="font-size: 18px;font-weight:700;color: white;background: #708090;padding:5px 10px;width:155px;border: 2px solid #fff;border-radius:4px;text-align:center">2.7.5 changes</h3>
<div class="wp-clearfix"><div class="changelog emd-section whats-new whats-new-454" style="margin:0">
<h3 style="font-size:18px;" class="tweak"><div  style="font-size:110%;color:#33b5e5"><span class="dashicons dashicons-admin-settings"></span> TWEAK</div>
Removed ellipsis for long video titles. It displays full titles for Video Grid.</h3>
<div ></a></div></div></div><hr style="margin:30px 0"><div class="wp-clearfix"><div class="changelog emd-section whats-new whats-new-453" style="margin:0">
<h3 style="font-size:18px;" class="tweak"><div  style="font-size:110%;color:#33b5e5"><span class="dashicons dashicons-admin-settings"></span> TWEAK</div>
All gallery pages will show 6 columns on desktop, 4 columns on tablets, 3 columns on phones</h3>
<div ></a></div></div></div><hr style="margin:30px 0">
<h3 style="font-size: 18px;font-weight:700;color: white;background: #708090;padding:5px 10px;width:155px;border: 2px solid #fff;border-radius:4px;text-align:center">2.7.2 changes</h3>
<div class="wp-clearfix"><div class="changelog emd-section whats-new whats-new-444" style="margin:0">
<h3 style="font-size:18px;" class="tweak"><div  style="font-size:110%;color:#33b5e5"><span class="dashicons dashicons-admin-settings"></span> TWEAK</div>
Made all video thumb images full width to cover all available space</h3>
<div ></a></div></div></div><hr style="margin:30px 0"><div class="wp-clearfix"><div class="changelog emd-section whats-new whats-new-443" style="margin:0">
<h3 style="font-size:18px;" class="tweak"><div  style="font-size:110%;color:#33b5e5"><span class="dashicons dashicons-admin-settings"></span> TWEAK</div>
Removed ellipsis for long video titles. It displays full titles</h3>
<div ></a></div></div></div><hr style="margin:30px 0">
<h3 style="font-size: 18px;font-weight:700;color: white;background: #708090;padding:5px 10px;width:155px;border: 2px solid #fff;border-radius:4px;text-align:center">2.7.1 changes</h3>
<div class="wp-clearfix"><div class="changelog emd-section whats-new whats-new-442" style="margin:0">
<h3 style="font-size:18px;" class="tweak"><div  style="font-size:110%;color:#33b5e5"><span class="dashicons dashicons-admin-settings"></span> TWEAK</div>
Changed ellipsis for long video titles to full titles</h3>
<div ></a></div></div></div><hr style="margin:30px 0">
<h3 style="font-size: 18px;font-weight:700;color: white;background: #708090;padding:5px 10px;width:155px;border: 2px solid #fff;border-radius:4px;text-align:center">2.7.0 changes</h3>
<div class="wp-clearfix"><div class="changelog emd-section whats-new whats-new-337" style="margin:0">
<h3 style="font-size:18px;" class="tweak"><div  style="font-size:110%;color:#33b5e5"><span class="dashicons dashicons-admin-settings"></span> TWEAK</div>
Updated codemirror libraries for custom CSS and JS options in plugin settings page</h3>
<div ></a></div></div></div><hr style="margin:30px 0"><div class="wp-clearfix"><div class="changelog emd-section whats-new whats-new-336" style="margin:0">
<h3 style="font-size:18px;" class="fix"><div  style="font-size:110%;color:#c71585"><span class="dashicons dashicons-admin-tools"></span> FIX</div>
PHP 7 compatibility</h3>
<div ></a></div></div></div><hr style="margin:30px 0"><div class="wp-clearfix"><div class="changelog emd-section whats-new whats-new-335" style="margin:0">
<h3 style="font-size:18px;" class="fix"><div  style="font-size:110%;color:#c71585"><span class="dashicons dashicons-admin-tools"></span> FIX</div>
wpautop issue with br tags</h3>
<div ></a></div></div></div><hr style="margin:30px 0"><div class="wp-clearfix"><div class="changelog emd-section whats-new whats-new-334" style="margin:0">
<h3 style="font-size:18px;" class="new"><div style="font-size:110%;color:#00C851"><span class="dashicons dashicons-megaphone"></span> NEW</div>
Added container type field in the plugin settings</h3>
<div ></a></div></div></div><hr style="margin:30px 0"><div class="wp-clearfix"><div class="changelog emd-section whats-new whats-new-333" style="margin:0">
<h3 style="font-size:18px;" class="new"><div style="font-size:110%;color:#00C851"><span class="dashicons dashicons-megaphone"></span> NEW</div>
Added custom JavaScript option in plugin settings under Tools tab</h3>
<div ></a></div></div></div><hr style="margin:30px 0">
<h3 style="font-size: 18px;font-weight:700;color: white;background: #708090;padding:5px 10px;width:155px;border: 2px solid #fff;border-radius:4px;text-align:center">2.6.0 changes</h3>
<div class="wp-clearfix"><div class="changelog emd-section whats-new whats-new-233" style="margin:0">
<h3 style="font-size:18px;" class="tweak"><div  style="font-size:110%;color:#33b5e5"><span class="dashicons dashicons-admin-settings"></span> TWEAK</div>
Minor shortcode page navigation fixes and improvements</h3>
<div ></a></div></div></div><hr style="margin:30px 0"><div class="wp-clearfix"><div class="changelog emd-section whats-new whats-new-232" style="margin:0">
<h3 style="font-size:18px;" class="fix"><div  style="font-size:110%;color:#c71585"><span class="dashicons dashicons-admin-tools"></span> FIX</div>
PHP 7 compatability</h3>
<div ></a></div></div></div><hr style="margin:30px 0"><div class="wp-clearfix"><div class="changelog emd-section whats-new whats-new-231" style="margin:0">
<h3 style="font-size:18px;" class="new"><div style="font-size:110%;color:#00C851"><span class="dashicons dashicons-megaphone"></span> NEW</div>
Added ability to disable EMD Templating system and switch back to theme based system from plugin settings</h3>
<div ></a></div></div></div><hr style="margin:30px 0">
<h3 style="font-size: 18px;font-weight:700;color: white;background: #708090;padding:5px 10px;width:155px;border: 2px solid #fff;border-radius:4px;text-align:center">2.5.1 changes</h3>
<div class="wp-clearfix"><div class="changelog emd-section whats-new whats-new-15" style="margin:0">
<h3 style="font-size:18px;" class="fix"><div  style="font-size:110%;color:#c71585"><span class="dashicons dashicons-admin-tools"></span> FIX</div>
Plugin deactivation issue when “Remove All Data” checked in plugin settings</h3>
<div ></a><p>When the plugin was deleted from WordPress Plugin page, the plugin deactivation process was deleting WordPress category and tags if “Remove All Data” checked under Video Settings > Tools.</p></div></div></div><hr style="margin:30px 0">
<h3 style="font-size: 18px;font-weight:700;color: white;background: #708090;padding:5px 10px;width:155px;border: 2px solid #fff;border-radius:4px;text-align:center">2.5.0 changes</h3>
<div class="wp-clearfix"><div class="changelog emd-section whats-new whats-new-4" style="margin:0">
<h3 style="font-size:18px;" class="tweak"><div  style="font-size:110%;color:#33b5e5"><span class="dashicons dashicons-admin-settings"></span> TWEAK</div>
New Text domain for WordPress.org translation support</h3>
<div ></a><p>We've changed the text domain of the plugin to make it compatible with WordPress translation system so your previous settings <strong>will not</strong> work. Click on on the settings page and <strong>save your settings</strong> again.</p></div></div></div><hr style="margin:30px 0"><div class="wp-clearfix"><div class="changelog emd-section whats-new whats-new-3" style="margin:0">
<h3 style="font-size:18px;" class="new"><div style="font-size:110%;color:#00C851"><span class="dashicons dashicons-megaphone"></span> NEW</div>
New Custom CSS area</h3>
<div ></a><p>Added Custom CSS area where you can put in plugin related CSS code specific. The code saved in this area does not get deleted during and after plugin updates.</p></div></div></div><hr style="margin:30px 0"><div class="wp-clearfix"><div class="changelog emd-section whats-new whats-new-2" style="margin:0">
<h3 style="font-size:18px;" class="new"><div style="font-size:110%;color:#00C851"><span class="dashicons dashicons-megaphone"></span> NEW</div>
New templating sytem</h3>
<div ></a><p>We have a new templating system which allows:</p>
<ul style="list-style:disc">
<li>Changing page templates for video, video archive and taxonomy pages</li>
<li>Hiding page navigation links</li>
</ul>
<p>and more from plugin settings. There is also a new EMD Widget area where you can put all your sidebar widgets that you need to be displayed in plugin pages.</p></div></div></div><hr style="margin:30px 0">
<?php echo '</div>'; ?>
<?php echo '<div class="tab-content" id="tab-resources"';
	if ("resources" != $active_tab) {
		echo 'style="display:none;"';
	}
	echo '>';
?>
<div style="color:white;background:#0000003b;padding:5px 10px;font-size: 1.4em;font-weight: 600;">Extensive documentation is available</div><div class="emd-section changelog resources resources-4" style="margin:0;background-color:white;padding:10px"><div style="height:40px" id="gs-sec-4"></div><div id="gallery" class="wp-clearfix"></div><div class="sec-desc"><a href="https://docs.emdplugins.com/docs/youtube-showcase-community-documentation">YouTube Showcase Community Edition Documentation</a></div></div><div style="margin-top:15px"><a href="#ptop" class="top">Go to top</a></div><hr style="margin-top:40px"><div style="color:white;background:#0000003b;padding:5px 10px;font-size: 1.4em;font-weight: 600;">How to resolve theme related issues</div><div class="emd-section changelog resources resources-141" style="margin:0;background-color:white;padding:10px"><div style="height:40px" id="gs-sec-141"></div><div id="gallery" class="wp-clearfix"><div class="sec-img gallery-item"><a class="thickbox tooltip" rel="gallery-141" href="<?php echo YOUTUBE_SHOWCASE_PLUGIN_URL . "assets/img/emd_templating_system.png"; ?>"><img src="<?php echo YOUTUBE_SHOWCASE_PLUGIN_URL . "assets/img/emd_templating_system.png"; ?>"></a></div></div><div class="sec-desc"><p>If your theme is not coded based on WordPress theme coding standards, does have an unorthodox markup or its style.css is messing up how YouTube Showcase Community pages look and feel, you will see some unusual changes on your site such as sidebars not getting displayed where they are supposed to or random text getting displayed on headers etc. after plugin activation.</p>
<p>The good news is YouTube Showcase Community plugin is designed to minimize theme related issues by providing two distinct templating systems:</p>
<ul>
<li>The EMD templating system is the default templating system where the plugin uses its own templates for plugin pages.</li>
<li>The theme templating system where YouTube Showcase Community uses theme templates for plugin pages.</li>
</ul>
<p>The EMD templating system is the recommended option. If the EMD templating system does not work for you, you need to check "Disable EMD Templating System" option at Settings > Tools tab and switch to theme based templating system.</p>
<p>Please keep in mind that when you disable EMD templating system, you loose the flexibility of modifying plugin pages without changing theme template files.</p>
<p>If none of the provided options works for you, you may still fix theme related conflicts following the steps in <a href="https://docs.emdplugins.com/docs/youtube-showcase-community-documentation">YouTube Showcase Community Documentation - Resolving theme related conflicts section.</a></p>

<div class="quote">
<p>If you’re unfamiliar with code/templates and resolving potential conflicts, <a href="https://emdplugins.com/open-a-support-ticket/?pk_campaign=raq-hireme&ticket_topic=pre-sales-questions"> do yourself a favor and hire us</a>. Sometimes the cost of hiring someone else to fix things is far less than doing it yourself. We will get your site up and running in no time.</p>
</div></div></div><div style="margin-top:15px"><a href="#ptop" class="top">Go to top</a></div><hr style="margin-top:40px">
<?php echo '</div>'; ?>
<?php echo '<div class="tab-content" id="tab-features"';
	if ("features" != $active_tab) {
		echo 'style="display:none;"';
	}
	echo '>';
?>
<h3>Start growing your business by showcasing your videos</h3>
<p>Explore the full list of features available in the the latest version of YouTube Showcase. Click on a feature title to learn more.</p>
<table class="widefat features striped form-table" style="width:auto;font-size:16px">
<tr><td><a href="https://emdplugins.com/?p=10590&pk_campaign=youtube-showcase-com&pk_kwd=getting-started"><img style="width:128px;height:auto" src="<?php echo YOUTUBE_SHOWCASE_PLUGIN_URL . "assets/img/video-page.png"; ?>"></a></td><td><a href="https://emdplugins.com/?p=10590&pk_campaign=youtube-showcase-com&pk_kwd=getting-started">Dedicated YouTube video pages to grab your visitors' attention</a></td><td></td></tr>
<tr><td><a href="https://emdplugins.com/?p=10591&pk_campaign=youtube-showcase-com&pk_kwd=getting-started"><img style="width:128px;height:auto" src="<?php echo YOUTUBE_SHOWCASE_PLUGIN_URL . "assets/img/video-gallery.png"; ?>"></a></td><td><a href="https://emdplugins.com/?p=10591&pk_campaign=youtube-showcase-com&pk_kwd=getting-started">Beautiful YouTube video galleries to promote your YouTube videos instantly</a></td><td></td></tr>
<tr><td><a href="https://emdplugins.com/?p=10588&pk_campaign=youtube-showcase-com&pk_kwd=getting-started"><img style="width:128px;height:auto" src="<?php echo YOUTUBE_SHOWCASE_PLUGIN_URL . "assets/img/youtube.png"; ?>"></a></td><td><a href="https://emdplugins.com/?p=10588&pk_campaign=youtube-showcase-com&pk_kwd=getting-started">Manage your YouTube videos in one central location - no more wasting hours for lost YouTube videos</a></td><td></td></tr>
<tr><td><a href="https://emdplugins.com/?p=10592&pk_campaign=youtube-showcase-com&pk_kwd=getting-started"><img style="width:128px;height:auto" src="<?php echo YOUTUBE_SHOWCASE_PLUGIN_URL . "assets/img/shop.png"; ?>"></a></td><td><a href="https://emdplugins.com/?p=10592&pk_campaign=youtube-showcase-com&pk_kwd=getting-started">Help visitors find similar YouTube videos easily by grouping and tagging</a></td><td></td></tr>
<tr><td><a href="https://emdplugins.com/?p=10670&pk_campaign=youtube-showcase-com&pk_kwd=getting-started"><img style="width:128px;height:auto" src="<?php echo YOUTUBE_SHOWCASE_PLUGIN_URL . "assets/img/video-folder.png"; ?>"></a></td><td><a href="https://emdplugins.com/?p=10670&pk_campaign=youtube-showcase-com&pk_kwd=getting-started">Promote YouTube videos on your sidebars</a></td><td></td></tr>
<tr><td><a href="https://emdplugins.com/?p=10589&pk_campaign=youtube-showcase-com&pk_kwd=getting-started"><img style="width:128px;height:auto" src="<?php echo YOUTUBE_SHOWCASE_PLUGIN_URL . "assets/img/responsive.png"; ?>"></a></td><td><a href="https://emdplugins.com/?p=10589&pk_campaign=youtube-showcase-com&pk_kwd=getting-started">Let visitors see your YouTube videos from any device</a></td><td></td></tr>
<tr><td><a href="https://emdplugins.com/?p=10674&pk_campaign=youtube-showcase-com&pk_kwd=getting-started"><img style="width:128px;height:auto" src="<?php echo YOUTUBE_SHOWCASE_PLUGIN_URL . "assets/img/adv-video-gallery.png"; ?>"></a></td><td><a href="https://emdplugins.com/?p=10674&pk_campaign=youtube-showcase-com&pk_kwd=getting-started">Many ways to display YouTube videos to make visitors stay on your site longer </a></td><td> - Premium feature (included in Pro)</td></tr>
<tr><td><a href="https://emdplugins.com/?p=11418&pk_campaign=youtube-showcase-com&pk_kwd=getting-started"><img style="width:128px;height:auto" src="<?php echo YOUTUBE_SHOWCASE_PLUGIN_URL . "assets/img/api.png"; ?>"></a></td><td><a href="https://emdplugins.com/?p=11418&pk_campaign=youtube-showcase-com&pk_kwd=getting-started">Easy import from any YouTube channel or playlist using YouTube API.</a></td><td> - Premium feature (included in Pro)</td></tr>
<tr><td><a href="https://emdplugins.com/?p=10991&pk_campaign=youtube-showcase-com&pk_kwd=getting-started"><img style="width:128px;height:auto" src="<?php echo YOUTUBE_SHOWCASE_PLUGIN_URL . "assets/img/empower-users.png"; ?>"></a></td><td><a href="https://emdplugins.com/?p=10991&pk_campaign=youtube-showcase-com&pk_kwd=getting-started">Expand YouTube video manager role with a few clicks</a></td><td> - Premium feature (included in Pro)</td></tr>
<tr><td><a href="https://emdplugins.com/?p=10675&pk_campaign=youtube-showcase-com&pk_kwd=getting-started"><img style="width:128px;height:auto" src="<?php echo YOUTUBE_SHOWCASE_PLUGIN_URL . "assets/img/yt-playlist.png"; ?>"></a></td><td><a href="https://emdplugins.com/?p=10675&pk_campaign=youtube-showcase-com&pk_kwd=getting-started">Display YouTube playlists, channels, search results like no others</a></td><td> - Premium feature (included in Pro)</td></tr>
<tr><td><a href="https://emdplugins.com/?p=10602&pk_campaign=youtube-showcase-com&pk_kwd=getting-started"><img style="width:128px;height:auto" src="<?php echo YOUTUBE_SHOWCASE_PLUGIN_URL . "assets/img/key.png"; ?>"></a></td><td><a href="https://emdplugins.com/?p=10602&pk_campaign=youtube-showcase-com&pk_kwd=getting-started">Empower your non technical staff through video manager user role</a></td><td> - Premium feature (included in Pro)</td></tr>
<tr><td><a href="https://emdplugins.com/?p=10671&pk_campaign=youtube-showcase-com&pk_kwd=getting-started"><img style="width:128px;height:auto" src="<?php echo YOUTUBE_SHOWCASE_PLUGIN_URL . "assets/img/dd.png"; ?>"></a></td><td><a href="https://emdplugins.com/?p=10671&pk_campaign=youtube-showcase-com&pk_kwd=getting-started">Set the display order of your YouTube videos by drag and drop</a></td><td> - Premium feature (included in Pro)</td></tr>
<tr><td><a href="https://emdplugins.com/?p=10676&pk_campaign=youtube-showcase-com&pk_kwd=getting-started"><img style="width:128px;height:auto" src="<?php echo YOUTUBE_SHOWCASE_PLUGIN_URL . "assets/img/rgb.png"; ?>"></a></td><td><a href="https://emdplugins.com/?p=10676&pk_campaign=youtube-showcase-com&pk_kwd=getting-started">Encourage visitors to stay longer by displaying related YouTube videos</a></td><td> - Premium feature (included in Pro)</td></tr>
<tr><td><a href="https://emdplugins.com/?p=10600&pk_campaign=youtube-showcase-com&pk_kwd=getting-started"><img style="width:128px;height:auto" src="<?php echo YOUTUBE_SHOWCASE_PLUGIN_URL . "assets/img/multimedia-stat.png"; ?>"></a></td><td><a href="https://emdplugins.com/?p=10600&pk_campaign=youtube-showcase-com&pk_kwd=getting-started">Let visitors know how popular you YouTube videos are by optional video stats </a></td><td> - Premium feature (included in Pro)</td></tr>
<tr><td><a href="https://emdplugins.com/?p=10673&pk_campaign=youtube-showcase-com&pk_kwd=getting-started"><img style="width:128px;height:auto" src="<?php echo YOUTUBE_SHOWCASE_PLUGIN_URL . "assets/img/tools.png"; ?>"></a></td><td><a href="https://emdplugins.com/?p=10673&pk_campaign=youtube-showcase-com&pk_kwd=getting-started">Customize YouTube player just the way you wanted</a></td><td> - Premium feature (included in Pro)</td></tr>
<tr><td><a href="https://emdplugins.com/?p=10672&pk_campaign=youtube-showcase-com&pk_kwd=getting-started"><img style="width:128px;height:auto" src="<?php echo YOUTUBE_SHOWCASE_PLUGIN_URL . "assets/img/comments.png"; ?>"></a></td><td><a href="https://emdplugins.com/?p=10672&pk_campaign=youtube-showcase-com&pk_kwd=getting-started">Dedicated, custom commenting system for YouTube videos only</a></td><td> - Premium feature (included in Pro)</td></tr>
<tr><td><a href="https://emdplugins.com/?p=10677&pk_campaign=youtube-showcase-com&pk_kwd=getting-started"><img style="width:128px;height:auto" src="<?php echo YOUTUBE_SHOWCASE_PLUGIN_URL . "assets/img/custom-video-pages.png"; ?>"></a></td><td><a href="https://emdplugins.com/?p=10677&pk_campaign=youtube-showcase-com&pk_kwd=getting-started">Create shortcodes visually to display your YouTube video galleries</a></td><td> - Premium feature (included in Pro)</td></tr>
<tr><td><a href="https://emdplugins.com/?p=10603&pk_campaign=youtube-showcase-com&pk_kwd=getting-started"><img style="width:128px;height:auto" src="<?php echo YOUTUBE_SHOWCASE_PLUGIN_URL . "assets/img/zoomin.png"; ?>"></a></td><td><a href="https://emdplugins.com/?p=10603&pk_campaign=youtube-showcase-com&pk_kwd=getting-started">Find YouTube videos faster and track changes with dynamic filters</a></td><td> - Add-on (included in Pro)</td></tr>
<tr><td><a href="https://emdplugins.com/?p=10604&pk_campaign=youtube-showcase-com&pk_kwd=getting-started"><img style="width:128px;height:auto" src="<?php echo YOUTUBE_SHOWCASE_PLUGIN_URL . "assets/img/csv-impexp.png"; ?>"></a></td><td><a href="https://emdplugins.com/?p=10604&pk_campaign=youtube-showcase-com&pk_kwd=getting-started">Bulk import, update or backup your YouTube videos from or to CSV instantly</a></td><td> - Add-on (included in Pro)</td></tr>
</table>
<?php echo '</div>'; ?>
<?php echo '</div>';
}