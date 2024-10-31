=== Plugin Name ===
Contributors: justin.kuepper
Donate link: http://justinkuepper.me/quotemedia_tools
Tags: stocks, finance, quotes, charts, trading
Requires at least: 3.0.1
Tested up to: 3.4
Stable tag: 1.0
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

QuoteMedia Tools provides short codes to integrate QuoteMedia's stock quote and chart API.

== Description ==

QuoteMedia Tools provides short codes to integrate real-time stock quotes and charts into WordPress posts.

= Stock Quotes =

`[stockquote symbol="MSFT"]`

Generates a real-time stock quote formatted like so `(MSFT 23.10 +6.7%)`.

= Stock Charts =

`[stockchart symbol="MSFT"]`

Generates a 3-month price chart for the ticker symbol "MSFT".

The stock chart short code can also contain additional parameters to help customize the chart:

* **`float`** to designate the CSS float parameter on the chart. For example, `[stockchart symbol="MSFT" float="right"]` will float the chart right. Default: "left".
* **`padding`** to designate the CSS padding on the chart. For example, `[stockchart symbol="MSFT" padding="10px 0 0 0"]` will add 10px to the top. Default: "0 10px 10px 10px".
* **`scale`** to designate the timeframe that the chart shows. For example, `[stockchart symbol="MSFT" scale="1y"]` will show a one-year chart. Default: "3m".
* **`width`** to designate the chart's width. For example, `[stockchart symbol="MSFT" width="500"]` will show a chart with a 500px width. Default: "250".
* **`height`** to designate the chart's height. For example, `[stockchart symbol="MSFT" height="100"]` will show a chart with a 100px height. Default: "150".

== Installation ==

1. Upload `quotemedia_tools.php` to the `/wp-content/plugins/` directory
2. Activate the plugin through the 'Plugins' menu in WordPress
3. Add your QuoteMedia Webmaster ID in the plugin's settings page.
4. Use the short codes in posts to show real-time stock quotes and charts.

== Frequently Asked Questions ==

= How do I obtain a QuoteMedia Webmaster ID? =

QuoteMedia can be reached by calling (877) 367-5970 or by e-mailing contactus@quotemedia.com. If you're so inclined, mention that you were referred by this WordPress plugin. The costs for QuoteMedia API access varies depending on usage, so you'll have to call them for more information.

= Are you affiliated with QuoteMedia? =

No, I developed a website utilizing QuoteMedia's API and thought it would be nice to have a WordPress plugin to make things easier. I plan on adding functionality to the plugin based on requests or based on my future requirements during my day job.

= Where can I find more information? =

Visit the [official website](http://justinkuepper.me/quotemedia_tools) for this plugin for additional documentation or help.

== Screenshots ==

1. Stock Quote & Chart in Action

== Changelog ==

= 1.0 =
* Initial Release