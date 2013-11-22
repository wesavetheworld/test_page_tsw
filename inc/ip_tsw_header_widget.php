<?php
	
	class ip_tsw_header_widget extends WP_Widget{
	
		//constructor
		function ip_tsw_header_widget(){
		
			parent::WP_Widget(false,$name=__('Header Widget','ip_tsw'));
		}
		
		//widget form
		function form($instance){
		
			if($instance){
				$title=esc_attr($instance['title']);
				$link=esc_attr($instance['link']);
				$telephone=esc_attr($instance['telephone']);
				$email=esc_attr($instance['email']);
			}else{
				$title='';
				$link='';
				$telephone='';
				$email='';
			}
			
		?>
		
		<p>
			<label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Widget Title', 'ip_tsw'); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" />
		</p>
		
		<p>
			<label for="<?php echo $this->get_field_id('link'); ?>"><?php _e('Link URL', 'ip_tsw'); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id('link'); ?>" name="<?php echo $this->get_field_name('link'); ?>" type="text" value="<?php echo $link; ?>" />
		</p>
		
		<p>
			<label for="<?php echo $this->get_field_id('telephone'); ?>"><?php _e('Telephone number', 'ip_tsw'); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id('telephone'); ?>" name="<?php echo $this->get_field_name('telephone'); ?>" type="text" value="<?php echo $telephone; ?>" />
		</p>
		
		<p>
			<label for="<?php echo $this->get_field_id('email'); ?>"><?php _e('Email URL', 'ip_tsw'); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id('email'); ?>" name="<?php echo $this->get_field_name('email'); ?>" type="text" value="<?php echo $email; ?>" />
		</p>
		
		<?php
		}
		
		//update
		function update($new_instance,$old_instance){
			
			$instance=$old_instance;
			
			$instance['title']=strip_tags($new_instance['title']);
			$instance['link']=strip_tags($new_instance['link']);
			$instance['telephone']=strip_tags($new_instance['telephone']);
			$instance['email']=strip_tags($new_instance['email']);
			return $instance;
		}
		
		//display widget
		function widget($args,$instance){
			
			extract($args);
			
			$title=apply_filters('widget_title',$instance['title']);
			$link=$instance['link'];
			$telephone=$instance['telephone'];
			$email=$instance['email'];
			
			
			echo '<div class="col-md-12 ip_tsw_header_widget">';
			
			if($title){
				echo '<span class="header_widget_title">'.$title.'</span>';
			}
			if($link){
				echo '<span class="header_widget_link"> <a href="'.$link.'" class="blue click-here">Click here</a></span>';
			}
			
			echo '<br><span> Or </span>';
			
			if($telephone){
				echo '<span class="header_widget_tel"><span class="blue">Telephone: </span>'.$telephone.'</span>';
			}
			
			if($telephone && $email){
				echo ' / ';
				}
			if($email){
				echo '<span class="header_widget_email"><span class="blue">Email: </span>'.$email.'</span>';
			}
			
			echo '</div>';
			
		}
	}
	
	// register widget
	add_action('widgets_init', create_function('', 'return register_widget("ip_tsw_header_widget");'));
?>