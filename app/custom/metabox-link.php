<?php
/* ADD LINK METABOX */
add_action("admin_init", "portfolio_meta_box");   
function portfolio_meta_box(){  
  add_meta_box("projInfo-meta", "Project Options", "portfolio_meta_options", "portfolio", "side", "low");  
}  

function portfolio_meta_options(){  
    global $post;  
    if ( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE ) return $post_id;
    $custom = get_post_custom($post->ID);  
    $link = $custom["portfolio_link"][0];  
?>  
  <input id='post_link_text' class='widefat' name='portfolio_link' size='20' type='text' value='<?php echo $link; ?>'  placeholder='Got a link?' />
<?php  
  }
  add_action('save_post', 'save_project_link'); 

function save_project_link(){  
  global $post;  
   
  if ( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE ){ 
    return $post_id;
  }else{
    update_post_meta($post->ID, "portfolio_link", $_POST["portfolio_link"]); 
  }
}


function portoflio_link() {
  $portfolio_link = esc_url(get_post_custom_values('portfolio_link')[0]);

  if($portfolio_link):
    return '<a href="'.$portfolio_link.'" target="_blank"><i class="fa fa-link"></i></a>';
  endif;
}