<?php
function show_myprofiles()
{
				global $myprofiles_path; 
				global $myprofiles;
//				echo $before_widget;  
	//			echo $before_title;
		//		echo $after_title;
	$count_profile = 1;
	foreach($myprofiles as $site=>$details)
	{
		$nm = $details['name'];
		$uri = $details['url'];
		$img = $details['favicon'];
		$url = str_replace("NAME",get_option($nm),$uri);
		if(get_option($nm))
		{
?>
			<div id="myprofiles_<?php  echo $count_profile; ?>">
				<a href="<?php echo $url; ?>" title="<?php echo $site ?>" target="_blank">
					<img border="0" src="<?php echo $myprofiles_path . $img;?>" alt="<?php echo $site; ?>" />
				</a>
			</div> 
<?php
			$count_profile = $count_profile + 1;
		}
	}
	$count_profile = 0;
}
?>		 


<?php
$myprofiles = Array(
	"43things" => Array(
	    "name" => 'myprofiles_43things',
		"favicon" => 'images/43things.png',
		"url" => 'http://www.43things.com/person/NAME',
	),
	"Blogger" => Array(
	    "name" => 'myprofiles_blogger',
		"favicon" => 'images/blogger.png',
		"url" => 'http://www.blogger.com/profile/NAME',
	),
	"Claimid" => Array(
	    "name" => 'myprofiles_claimid',
		"favicon" => 'images/claimid.png',
		"url" => 'http://www.claimid.com/NAME',
	),
	"del.icio.us" => Array(
	    "name" => 'myprofiles_delicious',
		"favicon" => 'images/delicious.png',
		"url" => 'http://del.icio.us/NAME',
	),
	"Digg" => Array(
	    "name" => 'myprofiles_digg',
		"favicon" => 'images/digg.png',
		"url" => 'http://digg.com/users/NAME',
	),
	"FaceBook" => Array(
	    "name" => 'myprofiles_facebook',
		"favicon" => 'images/facebook.png',
		"url" => 'http://www.facebook.com/NAME',
	),
	"Flickr" => Array(
	    "name" => 'myprofiles_Flickr',
		"favicon" => 'images/flickr.png',
		"url" => 'http://www.flickr.com/photos/NAME',
	),
	"FriendFeed" => Array(
	    "name" => 'myprofiles_FriendFeed',
		"favicon" => 'images/friendfeed.png',
		"url" => 'http://friendfeed.com/NAME',
	),
	"Friendster" => Array(
	    "name" => 'myprofiles_friendster',
		"favicon" => 'images/friendster.png',
		"url" => 'http://www.friendster.com/in/NAME',
	),
	"Hi5" => Array(
	    "name" => 'myprofiles_hi5',
		"favicon" => 'images/hi5.png',
		"url" => 'http://NAME.hi5.com',
	),
	"Indiblogger" => Array(
	    "name" => 'myprofiles_indiblog',
		"favicon" => 'images/indiblog.png',
		"url" => 'http://www.indiblogger.in/blogger.php?blogger=NAME',
	),
	"Jaiku" => Array(
	    "name" => 'myprofiles_Jaiku',
		"favicon" => 'images/jaiku.png',
		"url" => 'http://NAME.jaiku.com',
	),
	"Jobster" => Array(
	    "name" => 'myprofiles_jobster',
		"favicon" => 'images/jobster.png',
		"url" => 'http://www.jobster.com/people/NAME',
	),
	"Jyte" => Array(
	    "name" => 'myprofiles_jyte',
		"favicon" => 'images/jyte.png',
		"url" => 'http://jyte.com/profile/NAME',
	),	
	"Last.fm" => Array(
	    "name" => 'myprofiles_lastfm',
		"favicon" => 'images/lastfm.png',
		"url" => 'http://www.last.fm/user/NAME',
	),
	"Linkedin" => Array(
	    "name" => 'myprofiles_linkedin',
		"favicon" => 'images/linkedin.png',
		"url" => 'http://www.linkedin.com/in/NAME',
	),
	"Minglebox" => Array(
	    "name" => 'myprofiles_mingle',
		"favicon" => 'images/minglebox.png',
		"url" => 'http://www.minglebox.com/NAME',
	),
	"Multiply" => Array(
	    "name" => 'myprofiles_Multiply',
		"favicon" => 'images/multiply.png',
		"url" => 'http://NAME.multiply.com',
	),
	"MyBlogLog" => Array(
	    "name" => 'myprofiles_MyBlogLog',
		"favicon" => 'images/mybloglog.png',
		"url" => 'http://www.mybloglog.com/buzz/members/NAME/',
	),
	"MySpace" => Array(
	    "name" => 'myprofiles_MySpace',
		"favicon" => 'images/myspace.png',
		"url" => 'http://www.myspace.com/NAME',
	),
	"Orkut" => Array(
	    "name" => 'myprofiles_orkut',
		"favicon" => 'images/orkut.png',
		"url" => 'http://www.orkut.com/Profile.aspx?uid=NAME',
	),
	"Plaxo" => Array(
	    "name" => 'myprofiles_plaxo',
		"favicon" => 'images/plaxo.png',
		"url" => 'http://NAME.myplaxo.com/',
	),
	"Reddit" => Array(
	    "name" => 'myprofiles_reddit',
		"favicon" => 'images/reddit.png',
		"url" => 'http://reddit.com/user/NAME/',
	),
	"Shelfari" => Array(
	    "name" => 'myprofiles_shelfari',
		"favicon" => 'images/shelfari.png',
		"url" => 'http://www.shelfari.com/NAME',
	),
	"SlideShare" => Array(
	    "name" => 'myprofiles_slideshare',
		"favicon" => 'images/slideshare.gif',
		"url" => 'http://www.slideshare.net/NAME/',
	),
    "Stumbleupon" => Array(
	    "name" => 'myprofiles_Stumbleupon',
		"favicon" => 'images/stumbleupon.png',
		"url" => 'http://NAME.stumbleupon.com',
	),
    "Technorati" => Array(
	    "name" => 'myprofiles_technorati',
		"favicon" => 'images/technorati.png',
		"url" => 'http://technorati.com/people/technorati/NAME',
	),
	"Twitter" => Array(
	    "name" => 'myprofiles_twitter',
		"favicon" => 'images/twitter.png',
		"url" => 'http://www.twitter.com/NAME',
	),
	"VOX" => Array(
	    "name" => 'myprofiles_vox',
		"favicon" => 'images/vox.png',
		"url" => 'http://www.vox.com/profiles/NAME',
	),
	"Wikipedia" => Array(
	    "name" => 'myprofiles_wikipedia',
		"favicon" => 'images/wikipedia.png',
		"url" => 'http://en.wikipedia.org/wiki/User:NAME',
	),
	"Yahoo" => Array(
	    "name" => 'myprofiles_yahoo',
		"favicon" => 'images/yahoo.png',
		"url" => 'http://profiles.yahoo.com/NAME',
	),
	"YouTube" => Array(
	    "name" => 'myprofiles_youtube',
		"favicon" => 'images/youtube.png',
		"url" => 'http://youtube.com/user/NAME',
	)
);
?>