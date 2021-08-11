=== Space Lover ===
Contributors: Sparanoid
Donate link: https://sparanoid.com/donate/
Tags: comments, content, chinese, china, copywriting
Requires at least: 3.5.1
Tested up to: 5.8
Stable tag: 1.1.6
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Magically add an extra space between Chinese characters and English letters / numbers / common punctuation marks

== Description ==

A must-have plugin if you're running a Chinese blog. This plugin also works fine with multisite enabled WordPress (aka. WordPress Mu).

No options, no additional database inserts, no stupid banners and shitty ads, install and go.

你客戶／合作夥伴不光文案寫的爛，而且還不會排版？Space Lover 可以幫到你。它會神奇的在中文、日文和英文、數字、符號之間自動加入空白，讓客戶網站的文案、文章看上去規範整潔。

無選項、無 MySQL 插入，無廣告，安裝即用。

覺得這招治標不治本？也可以試試 [sparanoid/chinese-copywriting-guidelines](https://github.com/sparanoid/chinese-copywriting-guidelines)，讓你的客戶／合作夥伴學會如何正確的排版。

Before:

    今天出去買菜花了5000元

After:

    今天出去買菜花了 5000 元

== Installation ==

This section describes how to install the plugin and get it working.

Plase Note: Your server must have [UTF-8 Mode](http://php.net/manual/en/regexp.reference.unicode.php) enabled in order to use this plugin.

= Using The WordPress Dashboard =

1. Navigate to the 'Add New' in the plugins dashboard
2. Search for 'Space Lover'
3. Click 'Install Now'
4. Activate the plugin on the Plugin dashboard

= Uploading in WordPress Dashboard =

1. Navigate to the 'Add New' in the plugins dashboard
2. Navigate to the 'Upload' area
3. Select `space-lover.zip` from your computer
4. Click 'Install Now'
5. Activate the plugin in the Plugin dashboard

= Using FTP =

1. Download `space-lover.zip`
2. Extract the `space-lover` directory to your computer
3. Upload the `space-lover` directory to the `/wp-content/plugins/` directory
4. Activate the plugin in the Plugin dashboard

== Frequently Asked Questions ==

= Compatible with multisite? =

Yep.

= Can I activate Space Lover and Space Lover Lite at the same time? =

Yep.

= Differences between Space Lover and Space Lover Lite? =

- The new **Space Lover** (since v1.0.5) uses PHP regex to replace output contents.
- **Space Lover Lite** just inserts one script to dynamic add spaces.
- **Space Lover** changes your post output in your themes, RSS output
- **Space Lover Lite** only changes what you see, the post output is untouched, so you'll still get original post contents in your RSS feeds, however this method is slightly safer than Space Lover.

= Space Lover 與 Space Lover Lite 的區別？ =

- 新版 **Space Lover**（v1.0.5）使用 PHP 的正則替換文章的輸出內容
- **Space Lover Lite** 只插入 JavaScript 腳本，動態添加空格
- **Space Lover** 會修改所有文章的輸出形式，例如用戶所看到的頁面，RSS 輸出等
- **Space Lover Lite** 只會改變您在網站上看到的形式，而文章本身的內容是沒有被修改過的，所以使用此擴展時，RSS 的輸出並不會產生變化，唯一的優點是，這種方法與 Space Lover 比較相對安全，不會有內容被錯誤替換的可能。

== Changelog ==

= 1.1.6 =
* Compatibility check for 5.8, nothing new, just bump version to tell everyone this plugin still works.

= 1.1.5 =
* Fix: wrong closing punc condition, props John Shen

= 1.1.4 =
* Fix: missing space for special halfwidth characters, props John Shen

= 1.1.3 =
* Fix: unwatned space between general punctuations introduced from the last commit

= 1.1.2 =
* Fix: unwanted space between ruby tags, props John Shen
* Compatibility check for 5.0

= 1.1.1 =
* Feature: refine ampersand characters fix
* Compatibility check for 4.9

= 1.1.0 =
* Fix: missing space for percentage sign
* Fix: unwanted space after special ampersand characters

= 1.0.15 =
* Update assets.

= 1.0.14 =
* Compatibility check for 4.6 and 4.7, nothing new, just bump version to tell everyone this plugin still works.

= 1.0.13 =
* Compatibility check for 4.5, nothing new, just bump version to tell everyone this plugin still works.

= 1.0.12 =
* Compatibility check for 4.4, nothing new, just bump version to tell everyone this plugin still works.

= 1.0.11 =
* Compatibility check for 4.3, nothing new, just bump version to tell everyone this plugin still works.

= 1.0.10 =
* Compatibility check for 4.2.2, nothing new, just bump version to tell everyone this plugin still works.

= 1.0.9 =
* Compatibility check for 4.1 and 4.1 alpha, nothing new, just bump version to tell everyone this plugin still works.

= 1.0.8 =
* Update: Add spaces between links

= 1.0.7 =
* Fix: Better readme

= 1.0.6 =
* Fix: Chinese characters no longer being replaced

= 1.0.5 =
* Update: To provide better result, this plugin no longer uses [vinta/paranoid-auto-spacing](https://github.com/vinta/paranoid-auto-spacing) to add spaces, now it uses PHP regex rules to replace contents ouput.

= 1.0.4 =
* Update: Jetpack Infinite Scroll support

= 1.0.3 =
* Update: New copywriting

= 1.0.2 =
* Fix: Remove actual assets imagess

= 1.0.1 =
* Fix: Add the missing assets files

= 1.0.0 =
* First release

== Upgrade Notice ==

= 1.1.6 =
* Compatibility check for 5.8, nothing new, just bump version to tell everyone this plugin still works.

= 1.1.5 =
* Fix: wrong closing punc condition, props John Shen

= 1.1.4 =
* Fix: missing space for special halfwidth characters, props John Shen

= 1.1.3 =
* Fix: unwatned space between general punctuations introduced from the last commit

= 1.1.2 =
* Fix: unwanted space between ruby tags, props John Shen

= 1.1.1 =
* Feature: refine ampersand characters fix

= 1.1.0 =
* Fix: missing space for percentage sign and unwanted space after special ampersand characters

= 1.0.15 =
* Update assets.

= 1.0.14 =
* Compatibility check for 4.6 and 4.7, nothing new, just bump version to tell everyone this plugin still works.

= 1.0.13 =
* Compatibility check for 4.5, nothing new, just bump version to tell everyone this plugin still works.

= 1.0.12 =
* Compatibility check for 4.4, nothing new, just bump version to tell everyone this plugin still works.

= 1.0.11 =
* Compatibility check for 4.3, nothing new, just bump version to tell everyone this plugin still works.

= 1.0.10 =
* Compatibility check for 4.2.2, nothing new, just bump version to tell everyone this plugin still works.

= 1.0.9 =
* Compatibility check for 4.1 and 4.1 alpha, nothing new, just bump version to tell everyone this plugin still works.

= 1.0.8 =
* Update: Add spaces between links

= 1.0.7 =
* Fix: Better readme

= 1.0.6 =
* Fix: Chinese characters no longer being replaced

= 1.0.5 =
* Update: To provide better result, this plugin no longer uses [vinta/paranoid-auto-spacing](https://github.com/vinta/paranoid-auto-spacing) to add spaces, now it uses PHP regex rules to replace contents ouput.

= 1.0.4 =
* Update: Jetpack Infinite Scroll support

= 1.0.3 =
* Update: New copywriting

= 1.0.2 =
* Fix: Remove actual assets images

= 1.0.1 =
* Fix: Add the missing assets files

= 1.0.0 =
* First release
