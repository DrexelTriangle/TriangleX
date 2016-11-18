<?php
/**
 * Template part for displaying subsection sidebar item.
 *
 * @package Triangle_X
 */
 
$cat = get_queried_object();
$subcategories = get_categories(array('child_of' => $cat->term_id));

if(sizeof($subcategories) > 0)
{
	echo '<div class="sidebar-subsections">';
	echo '<div class="title">Sub Sections</div>';
	
	// Print sub sections
	echo "<ul>";
	foreach($subcategories as $sub)
		printf('<a href="./%1$s"><li>%2$s</li></a>', esc_attr($sub->slug), esc_html($sub->cat_name));
	echo "</ul>";
	echo '</div>';
}

?>