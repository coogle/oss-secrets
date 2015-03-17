<?php 
/**
 * Initialize the meta boxes. 
 */
function testimonial_meta() {

  $testimonial_fields = array(
    'id'        => 'testimonial_details',
    'title'     => 'Testimonial Details',
    'desc'      => '',
    'pages'     => array( 'testimonial' ),
    'context'   => 'normal',
    'priority'  => 'high',
    'fields'    => array(
      array(
        'id'          => 'test_photo',
        'label'       => 'Photo',
        'desc'        => 'Upload the photo for this testimonial. Any uploaded photo will be resized to 108px x 108px',
        'std'         => '',
        'type'        => 'upload',
        'class'       => '',
        'choices'     => array()
      ),
      array(
        'id'          => 'test_name',
        'label'       => 'Name',
        'desc'        => 'Please add here the name for your testimonial. (e.g. John Doe)',
        'std'         => '',
        'type'        => 'text',
        'class'       => '',
        'choices'     => array()
      ),
      array(
        'id'          => 'test_title',
        'label'       => 'Title',
        'desc'        => 'Add the title (e.g. CEO)',
        'std'         => '',
        'type'        => 'text',
        'class'       => '',
        'choices'     => array()
      )
    )
  );
  ot_register_meta_box( $testimonial_fields );
}
add_action( 'admin_init', 'testimonial_meta' );



function portfolio_meta_boxes() {

  $upload_portfolio = array(
    'id'        => 'upload_images',
    'title'     => 'Gallery Images',
    'desc'      => '',
    'pages'     => array( 'portfolio' ),
    'context'   => 'normal',
    'priority'  => 'high',
    'fields'    => array(
      array(
        'id'          => 'portfolio_images',
        'label'       => 'Portfolio Images',
        'desc'        => 'Add your portfolio images for displaying in gallery. The final size will be 750 x 440 px, so be shure to upload bigger images.',
        'std'         => '',
        'type'        => 'list-item',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => '',
        'settings'    => array( 
          array(
            'id'          => 'upload_portfolio_image',
            'label'       => 'Upload image',
            'desc'        => '',
            'std'         => '',
            'type'        => 'upload',
            'rows'        => '',
            'post_type'   => '',
            'taxonomy'    => '',
            'class'       => ''
          )
        )
      )
    )
  );
  ot_register_meta_box( $upload_portfolio );
}
add_action( 'admin_init', 'portfolio_meta_boxes' );



function page_meta_boxes() {

  $page_background = array(
    'id'        => 'custom_page_meta',
    'title'     => 'Page styles',
    'desc'      => 'This will set the background and content color for this page. Keep in mind that these options will take effect only if this page will be displayed as section on the home page.',
    'pages'     => array( 'page' ),
    'context'   => 'normal',
    'priority'  => 'high',
    'fields'    => array(
      array(
        'id'          => 'custom_page_background',
        'label'       => 'Page Background',
        'desc'        => 'Set the background for your page.',
        'std'         => '',
        'type'        => 'background',
        'class'       => '',
        'choices'     => array()
      ),
      array(
        'id'          => 'custom_page_title_color',
        'label'       => 'Title color',
        'desc'        => 'Some backgrounds will need you to choose another color than default so you just need to make the title visible on uploaded background.',
        'std'         => '',
        'type'        => 'colorpicker',
        'class'       => '',
        'choices'     => array()
      ),
      array(
        'id'          => 'custom_page_content_color',
        'label'       => 'Content color',
        'desc'        => 'Some backgrounds will need you to choose another color than default so you just need to make content visible on uploaded background.',
        'std'         => '',
        'type'        => 'colorpicker',
        'class'       => '',
        'choices'     => array()
      )
    )
  );
  ot_register_meta_box( $page_background );
}
add_action( 'admin_init', 'page_meta_boxes' );

?>