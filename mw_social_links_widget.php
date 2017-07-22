<?php 
/*
 *  Содержание:
 *  
 *  1. mw_social_links_widget  -  Виджет для ссылок соцсетей
 *
 */



/*
 *  1. Виджет для ссылок соцсетей
 *  
*/ 

add_action( 'widgets_init', 'mw_social_links_widget' );

function mw_social_links_widget() { 
	register_widget( 'Links_to_socnets' );
}

class Social_links extends WP_Widget {

	function Social_links() {
	
		$widget_ops = array( 'classname' => 'example', 'description' => __('Введите ссылки в поля ввода', 'social_links-widget') );
		
		$control_ops = array( 'width' => 300, 'height' => 400, 'id_base' => 'social_links-widget' );
		
		$this->WP_Widget( 'social_links-widget', __('Блок соцсетей', 'example'), $widget_ops, $control_ops );
	}
	
	function widget( $args, $instance ) {
		extract( $args );

		// Переменные виджета
		$title = apply_filters('widget_title', $instance['title'] );
		$vk_link = $instance['vk_link'];
		$twitter_link = $instance['twitter_link'];
		$facebook_link = $instance['facebook_link'];		
		$youtube_link = $instance['youtube_link'];	
		
	
		// Вывод разметки
	    echo ('<div class="socnet__links">');
		
		if ( $vk_link !== "" ) :
		echo ('<a class="vk_link" href="'.$vk_link.'"></a>');
		endif;

		if ( $twitter_link !== "" ) :
		echo ('<a class="twitter_link" href="'.$twitter_link.'"></a>');
		endif;

		if ( $facebook_link !== "" ) :
		echo ('<a class="facebook_link" href="'.$facebook_link.'"></a>');
		endif;	

		if ( $youtube_link !== "" ) :
		echo ('<a class="youtube_link" href="'.$youtube_link.'"></a>');
		endif;

		echo ('</div>');
	}
	

	// Обновляем виджет
	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;

		// Очистка тэгов
		$instance['title'] = strip_tags( $new_instance['title'] );
		$instance['vk_link'] = strip_tags( $new_instance['vk_link'] );		
		$instance['twitter_link'] = strip_tags( $new_instance['twitter_link'] );		
		$instance['facebook_link'] = strip_tags( $new_instance['facebook_link'] );
		$instance['youtube_link'] = strip_tags( $new_instance['youtube_link'] );

		return $instance;
	}

	
	// Форма ввода в админ-панели
	function form( $instance ) {

		//Set up some default widget settings.
		$defaults = array( 'title' => __('Example', 'example'), 'rss_link' => __('Ссылка на RSS', 'example'), 'subscription_on_email' => __('Код почтовой подписки', 'example') );
		$instance =  $instance; ?>
		
		<p>
		    <label for="<?php echo $this->get_field_id( 'vk_link' ); ?>"><?php _e('Введите ссылку на ВКонтакте:', 'example'); ?></label>			   
			<input type="text" id="<?php echo $this->get_field_id( 'vk_link' ); ?>" name="<?php echo $this->get_field_name( 'vk_link' ); ?>" value="<?php echo $instance['vk_link']; ?>" style="width:100%;" />
		</p>
		<p>
		    <label for="<?php echo $this->get_field_id( 'twitter_link' ); ?>"><?php _e('Введите ссылку на ваш твитер:', 'example'); ?></label>			   
			<input type="text" id="<?php echo $this->get_field_id( 'twitter_link' ); ?>" name="<?php echo $this->get_field_name( 'twitter_link' ); ?>" value="<?php echo $instance['twitter_link']; ?>" style="width:100%;" />
		</p>		
		<p>
		    <label for="<?php echo $this->get_field_id( 'facebook_link' ); ?>"><?php _e('Введите ссылку на сообщество в Facebook:', 'example'); ?></label>			    
			<input type="text" id="<?php echo $this->get_field_id( 'facebook_link' ); ?>" name="<?php echo $this->get_field_name( 'facebook_link' ); ?>" value="<?php echo $instance['facebook_link']; ?>" style="width:100%;" />
		</p>
		<p>
		    <label for="<?php echo $this->get_field_id( 'youtube_link' ); ?>"><?php _e('Введите ссылку на ваш Youtube:', 'example'); ?></label>			   
			<input type="text" id="<?php echo $this->get_field_id( 'youtube_link' ); ?>" name="<?php echo $this->get_field_name( 'youtube_link' ); ?>" value="<?php echo $instance['youtube_link']; ?>" style="width:100%;" />
		</p>


	<?php
	}
}
/* ***   Виджет для ссылок соцсетей   End   *** */ 
