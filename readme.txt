=== My Profiles ===

Contributors: anantshri
Donate link: http://anantshri.info/index.php?page=wpprofiles
Tags: myprofiles,social profile,networking, social networking, widget
Requires at least: 2.6
Tested up to: 2.8.4
Stable tag: 0.5


Plugin to provides a sleek and easy way to list all your public profiles and to let others connect with you



== Description ==

Since the time we start our journey on internet we keep accumulating multiple online profiles.

Sometimes it feels so weird to tell our friends which nickname has been used for which site 

This plugin helps you in showcasing all or rather most of your profiles at one place <br />
and in turn provides an opportunity for bloggers to expand there networks on multiple sites<br />
without the troubles of remembering various nicknames all the time

Some of  the salient features of this plugin

* Simple hassle free widget + admin panel to add websites.
* for those not having widget enabled theme or don't want to use widget we now have function call enabled.
* If your favourite site is missing its as easy as 1 2 3 to add your website in the list [refer 
FAQ section].
* support showcasing of multiple profiles [refer FAQ]

So go ahead and grab it to start flaunting your profiles on your very own blog.

<b>There had been some error in updating the repository and hence few of you might have got notice of an update 0.6 but I have to revert that back to 0.5 due to a severe bug causing wordpress admin to become non responsive. hence this version is 0.7 to avoid any confusion</b>


== Installation ==

1. Upload `myprofiles` folder to the `/wp-content/plugins/` directory
1. Activate the plugin through the 'Plugins' menu in WordPress
1. Go to Myprofiles admin page and add your details.

== Frequently Asked Questions ==

= What if my site is missing =

In case you find that your favorite site is missing all you need is

* your profile URL
* img in 16 x 16 pixel format.

to add one more site in the list just check `myprofiles_global.php` it contains an array list with all sites index one by one,

Just at the end add your site details

Example
`
	"<website_name>" => Array(
	    "name" => 'myprofiles_<website_name>',
		"favicon" => 'images/<website_name>.png',
		"url" => '<profile_url>',
	)
`

Just Replace <website_name> with your website name <br /> 
place 16 x 16 pixel large image of website "preferably FAVICON" in `plugins/myprofiles/img` folder.<br /> 
Just replace <profile_url> with your personal url but change your nickname / profile_number to `NAME`<br /> 
and voila your new profile is in the admin interface just add your nick and you are good to go<br /> 
<br /> 
example for profile_url => `http://www.twitter.com/anantshri` will be converted to `http://www.twitter.com/NAME`
<br /> <br /> 
If in case of doubt feel free to contact me or post message at the forum.

= how to use this plugin without widget =

With version 0.6 you can eassily use this plugin even without using widget interface.

in order to use this you just have to call `show_myprofiles()` anywhere inside the body or footer.
But you have to keep in mind that this function will give you a list of all your profile's with images 
but styling is not inclided in it. that is to be taken care by the theme editor only.
(in case some one need's help i am always ready to help)

= how to add multiple profiles =

Use the same box in myprofiles admin section just place your usernames by `;` seperator.

== Screenshots ==
1. Screen shot of working my profiles plugin on my site

2. Admin panel of myprofiles


== Changelog ==

= Version 0.7 =

1. XHTML compliance
2. option to directly add using function call reducing dependency on widget option. [refer FAQ section on how to use it].
3. Added support for multiple profile
4. added internationalization option <- need more help on making it truly international
5. removed sidebar php file and instead created a generic function to display all profile

= Version 0.6 =

1. Tried adding some feature but instead ended up adding bugs hence not released

= Version 0.5 =

Initial Release