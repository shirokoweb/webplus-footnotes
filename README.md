This plugin adds footnotes to WordPress posts.
The plugin is written in PHP and doesn't relay on any other file (beside those for translations).

## Here is an explanation of how the plugin works and how to use it:

### How it works:

The plugin adds footnotes to articles by looking for text in the format of ((citation text ref:URL)).
When it finds this text format in the post content, it extracts the citation text and URL from it.
It replaces the original text with a link to the citation and adds the citation to a list of footnotes in a sequential order.
The plugin then adds the list of footnotes to the end of the post content.

### How to use it:

- Install and activate the plugin on your WordPress site.
- In the post editor, write your post as usual and add citations in the format of ((citation text ref:URL)).
  Example: ((This is my fabulous text citing an external source ref:https://domain.tld)). URL must be prefixed by `ref:`
- Publish or update the post and view it on the front-end.

The plugin will automatically add superscript links to each citation in the post content and add a list of footnotes to the end of the post.
When readers click on a citation link, they will be taken to the corresponding footnote in the list.
When readers click on a footnote link, they will be taken back to the corresponding citation in the post content.

### Localization and translation:

The plugin has a text domain of "webplus-footnotes" for localization and translation.
The plugin uses the load_plugin_textdomain function to load the translation files.

The plugin Has only 2 strings available for translation and is already available in English and French :
- `This plugin adds footnotes to articles`
- `References`

**To translate the strings:**
1. Open the /webplus-footnotes/languages/webplus-footnotes.pot file with your favorite .pot editor and create a new translation file for your language.
2. Translate strings and export .mo and .po files. Example for spanish (Spain) es_ES: webplus-footnotes-es_ES.mo webplus-footnotes-es_ES.po
3. Upload to /webplus-footnotes/languages/ folder your .mo and .po files, and voilà.

### Screenshots:

**WordPress Editor**

![image](https://user-images.githubusercontent.com/6638982/226123834-6062ce8c-874a-4b3d-9d83-659f69f4b111.png)

**Frontend citation supscript**

![image](https://user-images.githubusercontent.com/6638982/226123930-c7d03514-65d2-45c2-a79b-d434f80f5cdd.png)

**Frontend footnote**

![image](https://user-images.githubusercontent.com/6638982/226124080-89b028d0-f9d7-4dd2-839b-a72d125e7d05.png)
