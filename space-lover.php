<?php
/**
 * @package   Space_Lover
 * @author    Tunghsiao Liu <t@sparanoid.com>
 * @license   GPL-2.0+
 * @link      http://sparanoid.com/
 * @copyright Sparanoid
 *
 * @wordpress-plugin
 * Plugin Name:       Space Lover
 * Plugin URI:        http://sparanoid.com/work/space-lover/
 * Description:       Magically add an extra space between Chinese characters and English letters / numbers / common punctuation marks
 * Version:           1.0.15
 * Author:            Tunghsiao Liu
 * Author URI:        http://sparanoid.com/
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
// http://regex101.com/r/hU3wD2/6
// http://regex101.com/r/yW0nZ7/1
function space_lover_prepare($content) {
  // $content = strip_tags($content);
  $content = preg_replace('~(\p{Han})([a-zA-Z0-9\p{Ps}])(?![^<]*>)~u', '\1 \2', $content);
  $content = preg_replace('~([a-zA-Z0-9\p{Pe}])(\p{Han})(?![^<]*>)~u', '\1 \2', $content);
  $content = preg_replace('~([!?‽:;,.])(\p{Han})~u', '\1 \2', $content);
  $content = preg_replace('~(\p{Han})(<[a-zA-Z]+?.*?>)~u', '\1 \2', $content);
  $content = preg_replace('~(\p{Han})(<\/[a-zA-Z]+>)~u', '\1\2 ', $content);
  $content = preg_replace('~(<\/[a-zA-Z]+>)(\p{Han})~u', '\1 \2', $content);
  $content = preg_replace('~(<[a-zA-Z]+?.*?>)(\p{Han})~u', ' \1\2', $content);
  // $content = preg_replace('~\![ ]?(\p{Han})~u', '！\1', $content);
  // $content = preg_replace('~\:[ ]?(\p{Han})~u', '：\1', $content);
  // $content = preg_replace('~\;[ ]?(\p{Han})~u', '；\1', $content);
  // $content = preg_replace('~\?[ ]?(\p{Han})~u', '？\1', $content);
  // $content = preg_replace('~\,[ ]?(\p{Han})~u', '，\1', $content);
  // $content = preg_replace('~\.[ ]?(\p{Han})~u', '。\1', $content);
  // $content = preg_replace('~\+[ ]?(\p{Han})~u', '＋\1', $content);
  // $content = preg_replace('~\=[ ]?(\p{Han})~u', '＝\1', $content);
  // $content = preg_replace('~\&[ ]?(\p{Han})~u', '＆\1', $content);
  $content = preg_replace('~[ ]*([「」『』（）〈〉《》【】〔〕〖〗〘〙〚〛])[ ]*~u', '\1', $content);
  return $content;
}

foreach ( $sl_work_tags as $sl_work_tag ) {
  add_filter($sl_work_tag, 'space_lover_prepare');
}
?>
