# daz_clickable_keywords

A Textpattern CMS article tag that makes the keywords clickable.

Basics
The plugin, daz_clickable_keywords, is a drop-in replacement for <txp:keywords /> Place it in an article form and it will display the article’s keywords plus link to a URL with a query using that keyword. Use it to link to other articles with that keyword, or grab the keyword for your own programming.

<txp:daz_clickable_keywords />
Attributes
<txp:daz_clickable_keywords section ="keywords" wraptag="ul" break="li" class="list-inline" breakclass="list-inline-item" keyword="keyword" />
To show the articles indicated by the keywords, you’ll need to place a <txp:article> or <txp:article_custom> tag on the ‘section’ page, like so:

<txp:article_custom keywords='<txp:page_url type="keyword" />' />
is a regular Textpattern tag. Make sure that you change 'keyword' in that tag to what ever word you use as 'keyword' in
The attributes are:

section
The Textpattern section that you want linked in the URL.
Default is ‘keywords’. If you want to use ‘keywords’ as a section, you’ll need to create it as a section first.

wraptag
The HTML tags wrapping the list of keywords:

ul for unordered list, eg
ol for numbered list, eg
p for paragraph, eg
Default is unset.
break
The HTML tags wrapping each individual keyword

li for list, eg `<li></li>`
p for paragraph, eg `<p></p>`

Default is unset.

class
The CSS class for the wraptag

Default is unset.

breakclass
The CSS class for the break tag

Default is unset.

keyword
The identifier in the URL that indicates the linked keyword

Default is keyword.

Examples
Assuming your article keywords are: Sammy, Lola, Floyd, Bob, Doug, Edith

Section is tags
<txp:daz_clickable_keywords section = "tags" />
Returns: `<a href="/tags/?keyword=Sammy">Sammy</a>` (etc)

Keyword is ‘inventory’
<txp:daz_clickable_keywords keyword = "inventory" />
Returns: `<a href="/keywords/?inventory=Lola">Lola</a>` (etc)

Wrap tag with unordered list
<txp:daz_clickable_keywords wraptag = "ul" break = "li" />
Returns: `<ul><li><a href="/keywords/?keyword=Bob">Bob</a></li> (etc) <li><a href="/keywords/?keyword=Doug">Doug</a></li></ul>`

Assign class to wraptag and break
<txp:daz_clickable_keywords wraptag = "ul" break = "li" class="list-inline" breaktag="list-inline-item" />
Returns: `<ul class="list-inline"><li class="list-inline-item"><a href="/keywords/?keyword=Edith">Edith</a></li> (etc)</ul>`

