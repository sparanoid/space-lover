<?php
/**
 * @package   Space_Lover
 * @author    Tunghsiao Liu <t@sparanoid.com>
 * @license   GPL-2.0+
 * @link      https://sparanoid.com/
 * @copyright Sparanoid
 *
 * @wordpress-plugin
 * Plugin Name:       Space Lover
 * Plugin URI:        https://sparanoid.com/work/space-lover/
 * Description:       Magically add an extra space between Chinese characters and English letters / numbers / common punctuation marks
 * Version:           1.1.6
 * Author:            Tunghsiao Liu
 * Author URI:        https://sparanoid.com/
 * Text Domain:       space-lover
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Domain Path:       /languages
 * GitHub Plugin URI: https://github.com/sparanoid/space-lover
 */

$sl_work_tags = array(
  'the_title',             // http://codex.wordpress.org/Function_Reference/the_title
  'the_content',           // http://codex.wordpress.org/Function_Reference/the_content
  'the_excerpt',           // http://codex.wordpress.org/Function_Reference/the_excerpt
  // 'list_cats',          Deprecated. http://codex.wordpress.org/Function_Reference/list_cats
  'single_post_title',     // http://codex.wordpress.org/Function_Reference/single_post_title
  'comment_author',        // http://codex.wordpress.org/Function_Reference/comment_author
  'comment_text',          // http://codex.wordpress.org/Function_Reference/comment_text
  // 'link_name',          Deprecated.
  // 'link_notes',         Deprecated.
  'link_description',      // Deprecated, but still widely used.
  'bloginfo',              // http://codex.wordpress.org/Function_Reference/bloginfo
  'wp_title',              // http://codex.wordpress.org/Function_Reference/wp_title
  'term_description',      // http://codex.wordpress.org/Function_Reference/term_description
  'category_description',  // http://codex.wordpress.org/Function_Reference/category_description
  'widget_title',          // Used by all widgets in themes
  'widget_text'            // Used by all widgets in themes
  );


// http://unicode.org/reports/tr44/
// http://php.net/manual/en/regexp.reference.unicode.php
// http://www.fileformat.info/info/unicode/category/Pe/list.htm
// https://github.com/sparanoid/chinese-copywriting-guidelines
// https://github.com/huacnlee/auto-correct
// http://stackoverflow.com/questions/12493128/
// http://regex101.com/r/yW0nZ7/1
function space_lover_prepare($content) {
  // $content = strip_tags($content);

  // Space for opneing (Ps) and closing (Pe) punctuations
  $content = preg_replace('~(\p{Han})([a-zA-Z0-9\p{Ps}\p{Pi}])(?![^<]*>)~u', '\1 \2', $content);
  $content = preg_replace('~([a-zA-Z0-9\p{Pe}\p{Pf}])(\p{Han})(?![^<]*>)~u', '\1 \2', $content);

  // Space for general punctuations
  $content = preg_replace('~([!?‽:;,.%])(\p{Han})~u', '\1 \2', $content);
  $content = preg_replace('~(\p{Han})([@$#])~u', '\1 \2', $content);

  // Space fix for 'ampersand' character https://regex101.com/r/hU3wD2/13
  // Sometimes WordPress generated output contains characters like `&#038;`.
  // This causes unwanted additional space from the above rule.
  //
  // https://regex101.com/r/hU3wD2/13 - original HTML entities method
  // https://regex101.com/r/hU3wD2/14 - refined ampersand method
  $content = preg_replace('~(&amp;?(?:amp)?;) (\p{Han})(?![^<]*>)~u', '\1\2', $content);

  // Space for HTML tags
  // https://regex101.com/r/hU3wD2/25

  // {中文}<tag>{英文/数字/起始标点/特殊符号}
  // 一台<a href="#">“Makerbot,二代”</a>3D打印机
  $content = preg_replace('~(\p{Han})(<(?!ruby)[a-zA-Z]+?[^>]*?>)([a-zA-Z0-9\p{Ps}\p{Pi}@$#])~u', '\1 \2\3', $content);

  // {中文}</tag>{英文/数字}
  // <code>Makerbot二代</code>3D打印机
  $content = preg_replace('~(\p{Han})(<\/(?!ruby)[a-zA-Z]+>)([a-zA-Z0-9])~u', '\1\2 \3', $content);

  // {英文/数字/闭合标点/特殊符号}<tag>{中文}
  // 买了一台Makerbot,<a href="#">二代3D</a>打印机
  $content = preg_replace('~([a-zA-Z0-9\p{Pe}\p{Pf}!?‽:;,.%])(<(?!ruby)[a-zA-Z]+?[^>]*?>)(\p{Han})~u', '\1 \2\3', $content);

  // {英文/数字/起始标点/特殊符号}</tag>{中文}
  // 买了一台Makerbot,<a href="#">二代3D</a>打印机
  $content = preg_replace('~([a-zA-Z0-9\p{Ps}\p{Pi}!?‽:;,.%])(<\/(?!ruby)[a-zA-Z]+>)(\p{Han})~u', '\1\2 \3', $content);

  // $content = preg_replace('~\![ ]?(\p{Han})~u', '！\1', $content);
  // $content = preg_replace('~\:[ ]?(\p{Han})~u', '：\1', $content);
  // $content = preg_replace('~\;[ ]?(\p{Han})~u', '；\1', $content);
  // $content = preg_replace('~\?[ ]?(\p{Han})~u', '？\1', $content);
  // $content = preg_replace('~\,[ ]?(\p{Han})~u', '，\1', $content);
  // $content = preg_replace('~\.[ ]?(\p{Han})~u', '。\1', $content);
  // $content = preg_replace('~\+[ ]?(\p{Han})~u', '＋\1', $content);
  // $content = preg_replace('~\=[ ]?(\p{Han})~u', '＝\1', $content);
  // $content = preg_replace('~\&[ ]?(\p{Han})~u', '＆\1', $content);

  // Special characters fix for Chinese Ps/Pe categories
  $content = preg_replace('~[ ]*([「」『』（）〈〉《》【】〔〕〖〗〘〙〚〛])[ ]*~u', '\1', $content);
  return $content;
}

foreach ( $sl_work_tags as $sl_work_tag ) {
  add_filter($sl_work_tag, 'space_lover_prepare');
}
