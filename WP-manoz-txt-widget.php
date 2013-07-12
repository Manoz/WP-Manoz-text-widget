<?php
/*
Plugin Name: WP Manoz Text Widget
Plugin URI: http://www.manoz.fr/
Description: Le widget de texte de base de Wordpress ne me plaisait pas. J'en ai donc fabriqué un. Vous n'avez plus qu'à aller dans "Apparence" > "Widgets" pour l'activer.
Version: 1.0
Author: Manoz
Author URI: http://www.manoz.fr/
*/

add_action( 'widgets_init', 'load_manoz_txt_widget' );

function load_manoz_txt_widget() {
	register_widget('manozWidgetTxt');
}

class manozWidgetTxt extends WP_Widget {
	
	function manozWidgetTxt() {

		$widget_ops = array( 'classname' => 'mnz-txt-widget', 'description' => 'Simple widget de texte (ou code html)', 'before_widget' => '<div id="mnz-txt-widget">','after_widget'  => "</div>" );
		
		// Taille du widget ici.
		$control_ops = array( 'width' => 300, 'height' => 350, 'id_base' => 'manoz-text' );

		$this->WP_Widget( 'manoz-text', 'Manoz Text Widget', $widget_ops, $control_ops );
	}
	
	function widget( $args, $instance ) {
		extract($args);

		$title = apply_filters( 'widget_title', empty( $instance['title'] ) ? '' : $instance['title'], $instance, $this->id_base );
		$text = apply_filters( 'widget_text', empty( $instance['text'] ) ? '' : $instance['text'], $instance );

		// On créer une classe css globale pour personnaliser le widget
		echo '<div id="mnz-txt-container">';

		if ( !empty( $title ) ) { echo $before_title . $title . $after_title; } ?>
			<div class="textwidget"><?php echo !empty( $instance['filter'] ) ? wpautop( $text ) : $text; ?></div>
		<?php

		echo '</div>';
	}

	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['title'] = strip_tags($new_instance['title']);
		if ( current_user_can('unfiltered_html') )
			$instance['text'] =  $new_instance['text'];
		else
			$instance['text'] = stripslashes( wp_filter_post_kses( addslashes($new_instance['text']) ) ); // wp_filter_post_kses() expects slashed
		$instance['filter'] = isset($new_instance['filter']);
		return $instance;
	}

	function form( $instance ) {
		$instance = wp_parse_args( (array) $instance, array( 'title' => '', 'text' => '' ) );
		$title = strip_tags($instance['title']);
		$text = esc_textarea($instance['text']);
?>
		<p><label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:'); ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>" /></p>

		<textarea class="widefat" rows="16" cols="20" id="<?php echo $this->get_field_id('text'); ?>" name="<?php echo $this->get_field_name('text'); ?>"><?php echo $text; ?></textarea>

		<p><input id="<?php echo $this->get_field_id('filter'); ?>" name="<?php echo $this->get_field_name('filter'); ?>" type="checkbox" <?php checked(isset($instance['filter']) ? $instance['filter'] : 0); ?> />&nbsp;<label for="<?php echo $this->get_field_id('filter'); ?>"><?php _e('Automatically add paragraphs'); ?></label></p>
<?php
	}
}

?>