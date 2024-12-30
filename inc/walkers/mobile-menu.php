<?php

class Basic_Starter_Mobile_Menu_Walker extends Walker_Nav_Menu
{
  public function start_el(&$output, $item, $depth = 0, $args = array(), $id = 0)
  {
    $indent = str_repeat("\t", $depth);

    // $item_id = "menu-item-$item->ID";
    // $class_names = $item->classes;
    $class_names = [];
    $class_names[] = "menu__item";

    $class_names = array_map('sanitize_html_class', $class_names, array());

    $output .=  "$indent<li class=\"" . join(' ', $class_names) . "\">\n";
    $output .=  "$indent  <a href=\"" . esc_url($item->url) . "\" class=\"menu__link\">" . $item->title . "</a>\n";
  }

  public function end_el(&$output, $item, $depth = 0, $args = array())
  {
    $indent = str_repeat("\t", $depth);
    $output .= "$indent</li>\n";
  }
}
