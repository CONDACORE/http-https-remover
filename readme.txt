=== HTTP / HTTPS Remover ===
Contributors: condacore
Donate link: https://www.paypal.me/MariusBolik
Tags: http, https, mixed content
Requires at least: 1.2.0
Tested up to: 4.7
Stable tag: 1.2
License: GPLv3
License URI: http://www.gnu.org/licenses/gpl-3.0.html

A fix for mixed content! This Plugin removes HTTP and HTTPS protocols from all links. Works in Front- and Backend!

== Description ==

= Main Features =
- Works in Front- and Backend<br>
- Makes every Plugin compatible with https<br>
- No Setup needed<br>
- Compatible with Visual Composer
- Fixes Google Fonts issues


**Mixed content** occurs when initial HTML is loaded over a secure HTTPS connection, but other resources (such as images, videos, stylesheets, scripts) are loaded over an insecure HTTP connection. This is called mixed content because both HTTP and HTTPS content are being loaded to display the same page, and the initial request was secure over HTTPS. Modern browsers display warnings about this type of content to indicate to the user that this page contains insecure resources.

Your users are counting on you to protect them when they visit your website. It is important to fix your mixed content issues to protect all your visitors, including those on older browsers. And that's what this plugin does!


= Example =

Without Plugin:
`"http://domain.com/script.js"`
`"https://domain.com/script.js"` 

With Plugin:
`"//domain.com/script.js"` 

For more infos take a look at the screenshot.

= Note =

**The Plugin does not remove http and https from external links.**


= If using CloudFlare or other Caching Plugin =

**CloudFlare:** <br>
1. Go to Settings -> CloudFlare -> More Settings<br>
2. Disable "Automatic HTTPS Rewrites" (Our Plugin is better) :)<br>
3. Go back to "Home" in CloudFlare Plugin and click "Purge Cache" for the changes to take effect!

**Other Cache Plugin:** <br>
Please purge/clear cache for the changes to take effect!


= More =
[Feel free to visit our Website](https://condacore.com/)


== Installation ==
1. Upload `http-https-remover` folder to your `/wp-content/plugins/` directory.
2. Activate the plugin from Admin > Plugins menu.
3. Once activated your site is ready!

== Screenshots ==

1. The Sourcecode of the Website will look like this!

== Changelog ==
= 1.2 (12/11/16) =
* Added support for Google (Fonts, Ajax, Maps etc.)
* Compatibility for Wordpress 4.7
= 1.1.1 (10/18/16) =
* Added support for "content" tag
* Added support for "loaderUrl" tag
= 1.1 (10/17/16) =
* Fixed the issue that videos in Revolution Slider stopped playing
* The plugin now works on backend too
* Other small changes
= 1.0 (10/16/16) =
* Initial release
