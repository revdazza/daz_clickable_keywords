<?php

// This is a PLUGIN TEMPLATE.

// Copy this file to a new name like abc_myplugin.php.  Edit the code, then
// run this file at the command line to produce a plugin for distribution:
// $ php abc_myplugin.php > abc_myplugin-0.1.txt

// Plugin name is optional.  If unset, it will be extracted from the current
// file name. Plugin names should start with a three letter prefix which is
// unique and reserved for each plugin author ('abc' is just an example).
// Uncomment and edit this line to override:
# $plugin['name'] = 'abc_plugin';

// Allow raw HTML help, as opposed to Textile.
// 0 = Plugin help is in Textile format, no raw HTML allowed (default).
// 1 = Plugin help is in raw HTML.  Not recommended.
# $plugin['allow_html_help'] = 0;

$plugin['version'] = '0.1';
$plugin['author'] = 'Darren Atwater';
$plugin['author_uri'] = 'https://www.reverendmoonbeam.com/';
$plugin['description'] = 'Make keywords clickable';

// Plugin load order:
// The default value of 5 would fit most plugins, while for instance comment
// spam evaluators or URL redirectors would probably want to run earlier
// (1...4) to prepare the environment for everything else that follows.
// Values 6...9 should be considered for plugins which would work late.
// This order is user-overrideable.
$plugin['order'] = 5;

// Plugin 'type' defines where the plugin is loaded
// 0 = public       : only on the public side of the website (default)
// 1 = public+admin : on both the public and non-AJAX admin side
// 2 = library      : only when include_plugin() or require_plugin() is called
// 3 = admin        : only on the non-AJAX admin side
// 4 = admin+ajax   : only on admin side
// 5 = public+admin+ajax   : on both the public and admin side
$plugin['type'] = 0;

// Plugin 'flags' signal the presence of optional capabilities to the core plugin loader.
// Use an appropriately OR-ed combination of these flags.
// The four high-order bits 0xf000 are available for this plugin's private use.
if (!defined('PLUGIN_HAS_PREFS')) define('PLUGIN_HAS_PREFS', 0x0001); // This plugin wants to receive "plugin_prefs.{$plugin['name']}" events
if (!defined('PLUGIN_LIFECYCLE_NOTIFY')) define('PLUGIN_LIFECYCLE_NOTIFY', 0x0002); // This plugin wants to receive "plugin_lifecycle.{$plugin['name']}" events

# $plugin['flags'] = PLUGIN_HAS_PREFS | PLUGIN_LIFECYCLE_NOTIFY;

// Plugin 'textpack' is optional. It provides i18n strings to be used in conjunction with gTxt().
// Syntax:
// ## arbitrary comment
// #@event
// #@language ISO-LANGUAGE-CODE
// abc_string_name => Localized String

/** Uncomment me, if you need a textpack
$plugin['textpack'] = <<< EOT
#@admin
#@language en, en-gb, en-us
abc_sample_string => Sample String
abc_one_more => One more
#@language de
abc_sample_string => Beispieltext
abc_one_more => Noch einer
EOT;
**/
// End of textpack

if (!defined('txpinterface'))
	@include_once('zem_tpl.php');

if (0) {
?>
# --- BEGIN PLUGIN HELP ---

h1. daz_clickable_keywords

"Download page":https://reverendmoonbeam.com/code/389/textpattern-plugin-daz_clickable_keywords

"Textpattern CMS":https://textpattern.com article tag that makes the keywords clickable.


h2. Basics

The plugin, daz_clickable_keywords, is a drop-in replacement for <txp:keywords /> Place it in an article form and it will display the article's keywords plus link to a URL with a query using that keyword. Use it to link to other articles with that keyword, or grab the keyword for your own programming.

bc. <txp:daz_clickable_keywords />

h2. Attributes

bc. <txp:daz_clickable_keywords section ="keywords" wraptag="ul" break="li" class="list-inline" breakclass="list-inline-item" keyword="keyword" />

To show the articles indicated by the keywords, you'll need to place a <txp:article> or <txp:article_custom> tag on the 'section' page, like so:

bc. <txp:article_custom keywords='<txp:page_url type="keyword" />' />

<txp:page_url type="keyword" /> is a regular Textpattern tag. Make sure that you change 'keyword' in that tag to what ever word you use as 'keyword' in <txp:daz_clickable_keywords />



The attributes are:

*section*
The Textpattern section that you want linked in the URL.
Default is 'keywords'. If you want to use 'keywords' as a section, you'll need to create it as a section first.

*wraptag*
The HTML tags wrapping the list of keywords:

ul for unordered list, eg <ul></ul>
ol for numbered list, eg <ol></ol>
p for paragraph, eg <p></p>
Default is unset.

*break*
The HTML tags wrapping each individual keyword

li for list, eg <li></li>
p for paragraph, eg <p></p>

Default is unset.

*class*
The CSS class for the wraptag

Default is unset.

*breakclass*
The CSS class for the break tag

Default is unset.

*keyword*
The identifier in the URL that indicates the linked keyword

Default is keyword.




h2. Examples

Assuming your article keywords are: Sammy, Lola, Floyd, Bob, Doug, Edith

h3. Section is tags

bc. <txp:daz_clickable_keywords section = "tags" />

@Returns: <a href="/tags/?keyword=Sammy">Sammy</a> (etc)@

h3. Keyword is 'inventory'

bc. <txp:daz_clickable_keywords keyword = "inventory" />

Returns: @<a href="/keywords/?inventory=Lola">Lola</a> (etc)@

h3. Wrap tag with unordered list

bc. bc. <txp:daz_clickable_keywords wraptag = "ul" break = "li" />

Returns: @<ul><li><a href="/keywords/?keyword=Bob">Bob</a></li> (etc) <li><a href="/keywords/?keyword=Doug">Doug</a></li></ul>@

h3. Assign class to wraptag and break

bc. <txp:daz_clickable_keywords wraptag = "ul" break = "li" class="list-inline" breaktag="list-inline-item" />

Returns: @<ul class="list-inline"><li class="list-inline-item"><a href="/keywords/?keyword=Edith">Edith</a></li> (etc)</ul>@

h2. License

MIT License

Copyright (c) 2022 Darren Atwater

Permission is hereby granted, free of charge, to any person obtaining a copy
of this software and associated documentation files (the "Software"), to deal
in the Software without restriction, including without limitation the rights
to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
copies of the Software, and to permit persons to whom the Software is
furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in all
copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE
SOFTWARE.

h2. Author

Darren Atwater
*Website:* "ReverendMoonbeam.com":https://www.reverendmoonbeam.com
*Email:* dba@darrenatwater.com


h2. Changelog

h3. Version 0.1 - 2022/10/28

* Initial release.

# --- END PLUGIN HELP ---
<?php
}

# --- BEGIN PLUGIN CODE ---

function daz_keywords($atts, $key='') {
	global $thisarticle;
		extract(lAtts(array(
			'wraptag'  => '',
			'class'  => '',
			'break'  => '',
			'breakclass' => '',
			'keyword'  => 'keyword',
			'section'  => 'keywords'
		),$atts));

		$wraptag = trim($wraptag);
		$break = trim($break);		
		$class = trim($class);
		$breakclass = trim($breakclass);
		$keyword = trim($keyword);
		$section = trim($section);

		$keywords = $thisarticle['keywords'];
		
		if($break) {
			$breakend = '</' . $break . '>';
			$break = '<' . $break;
			
				if($breakclass) {
					$break = $break . ' class = "' . $breakclass . '" ';
				}
				
			$break = $break . '>';

		} else {
			$break = '';
			$breakend = '';
		}

		if($wraptag) {
			$wraptagend = '</' . $wraptag . '>';
			$wraptag = '<' . $wraptag;
			
				if($class) {
					$wraptag = $wraptag . ' class = "' . $class . '" ';
				}
						
			$wraptag = $wraptag . '>';
			 
		} else {
			$wraptag = '';
			$wraptag = '';
		}


		if(isset($keywords)) {	
			$key = $wraptag;
			
				$keyworks = explode(",", $keywords);
					foreach($keyworks as $keywork) {
						$keywork = trim($keywork);
						 $key = $key . $break .  '<a href="/' . $section . '/?'. $keyword. '=' . $keywork .'">' . $keywork . '</a>' . $breakend;
					}		
	
			$key = $key . $wraptagend;
		}

	return $key;
}


if (txpinterface === 'public') {
	// Register public tags.
	if (class_exists('\Textpattern\Tag\Registry')) {
		Txp::get('\Textpattern\Tag\Registry')
			->register('daz_keywords');
	}
}

# --- END PLUGIN CODE ---

?>