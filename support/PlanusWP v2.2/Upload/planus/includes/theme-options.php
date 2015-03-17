<?php
/**
 * Initialize the custom theme options.
 */
add_action( 'admin_init', 'custom_theme_options' );

/**
 * Build the custom settings & update OptionTree.
 */
function custom_theme_options() {
  /**
   * Get a copy of the saved settings array. 
   */
  $saved_settings = get_option( 'option_tree_settings', array() );
  
  /**
   * Custom settings array that will eventually be 
   * passes to the OptionTree Settings API Class.
   */
  $custom_settings = array( 
    'contextual_help' => array( 
      'content'       => array( 
        array(
          'id'        => 'option_types_help',
          'title'     => 'Option Types',
          'content'   => '<p>Help content goes here!</p>'
        )
      ),
      'sidebar'       => '<p>Sidebar content goes here!</p>'
    ),
    'sections'        => array( 
      array(
        'id'          => 'general_settings',
        'title'       => __('General Settings', 'planuswp')
      ),
      array(
        'id'          => 'home_sections',
        'title'       => __('Home Sections', 'planuswp')
      ),
      array(
        'id'          => 'welcome_section',
        'title'       => __('Welcome Section', 'planuswp')
      ),
      array(
        'id'          => 'about_section',
        'title'       => __('About Section', 'planuswp')
      ),
      array(
        'id'          => 'portfolio_section',
        'title'       => __('Portfolio Section', 'planuswp')
      ),
      array(
        'id'          => 'services_section',
        'title'       => __('Services Section', 'planuswp')
      ),
      array(
        'id'          => 'testimonials_section',
        'title'       => __('Testimonials Section', 'planuswp')
      ),
      array(
        'id'          => 'blog_section',
        'title'       => __('Blog Section', 'planuswp')
      ),
      array(
        'id'          => 'contact_section',
        'title'       => __('Contact Section', 'planuswp')
      ),
      array(
        'id'          => 'map_section',
        'title'       => __('Map Section', 'planuswp')
      ),
      array(
        'id'          => 'fonts_section',
        'title'       => __('Custom Fonts', 'planuswp')
      ),
      array(
        'id'          => 'css_section',
        'title'       => __('Custom CSS', 'planuswp')
      )
    ),
    'settings'        => array(
      array(
        'id'          => 'brand_color',
        'label'       => __('Brand Main Color', 'planuswp'),
        'desc'        => __('This option will set the color for some elements like icons, social icons, links, hover states.', 'planuswp'),
        'std'         => '',
        'type'        => 'colorpicker',
        'section'     => 'general_settings',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'logo_upload',
        'label'       => __('Logo upload', 'planuswp'),
        'desc'        => __('Use this field to upload your logo. This logo will be shown on the header bar of the theme. After uploading, you need to <strong>press the "Send to OptionTree" button</strong> in order to populate the input with the URI of that media.', 'planuswp'),
        'std'         => '',
        'type'        => 'upload',
        'section'     => 'general_settings',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'white_logo',
        'label'       => __('White Logo Upload', 'planuswp'),
        'desc'        => __('Here you can upload the white or light version of your logo meant to be used on darker backgrounds on the home screen. Also this logo will be used on dark menu.', 'planuswp'),
        'std'         => '',
        'type'        => 'upload',
        'section'     => 'general_settings',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'logo_choice',
        'label'       => __('Choose which logo to display', 'planuswp'),
        'desc'        => __('Please choose which logo should be shown on your header. Please take in account your image choice for welcome screen background and menu style choice (white or black).', 'planuswp'),
        'std'         => '',
        'type'        => 'radio',
        'section'     => 'general_settings',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and',
        'choices'     => array( 
          array(
            'value'       => 'normal_website_logo',
            'label'       => __('Normal Logo', 'planuswp'),
            'src'         => ''
          ),
          array(
            'value'       => 'white_website_logo',
            'label'       => __('White Logo', 'planuswp'),
            'src'         => ''
          )
        )
      ),
      array(
        'id'          => 'favicon_ico_upload',
        'label'       => __('Favicon upload (.ico)', 'planuswp'),
        'desc'        => __('Use this field to upload your favicon in .ico format (16x16 px)', 'planuswp'),
        'std'         => '',
        'type'        => 'upload',
        'section'     => 'general_settings',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'favicon_png_upload',
        'label'       => __('Favicon upload (.png)', 'planuswp'),
        'desc'        => __('Use this field to upload your favicon in .png format (16x16 px)', 'planuswp'),
        'std'         => '',
        'type'        => 'upload',
        'section'     => 'general_settings',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'apple_touch_icon',
        'label'       => __('Apple Touch Icon (.png)', 'planuswp'),
        'desc'        => __('Use this field to upload the Apple touch icon in .png format (152x152 px)', 'planuswp'),
        'std'         => '',
        'type'        => 'upload',
        'section'     => 'general_settings',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'tile_image',
        'label'       => __('Windows 8 Tile Image (.png)', 'planuswp'),
        'desc'        => __('Use this field to upload the Windows 8 Tile Icon icon in .png format (144x144 px)', 'planuswp'),
        'std'         => '',
        'type'        => 'upload',
        'section'     => 'general_settings',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'tile_color',
        'label'       => __('Windows 8 Tile Color', 'planuswp'),
        'desc'        => __('Use this field to choose the color for the Windows 8 Tile.', 'planuswp'),
        'std'         => '',
        'type'        => 'colorpicker',
        'section'     => 'general_settings',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'menu_style',
        'label'       => __('Choose home menu style', 'planuswp'),
        'desc'        => '',
        'std'         => '',
        'type'        => 'radio',
        'section'     => 'general_settings',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and',
        'choices'     => array( 
          array(
            'value'       => 'white_menu',
            'label'       => 'White menu',
            'src'         => ''
          ),
          array(
            'value'       => 'black_menu',
            'label'       => 'Black menu',
            'src'         => ''
          )
        )
      ),
      array(
        'id'          => 'footer_text',
        'label'       => __('Footer Informations', 'planuswp'),
        'desc'        => __('Use this field to write your disclaymer or copyrights on footer.', 'planuswp'),
        'std'         => '',
        'type'        => 'text',
        'section'     => 'general_settings',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'footer_content_color',
        'label'       => __('Footer content color', 'planuswp'),
        'desc'        => __('Use this field to choose the color for footer content.', 'planuswp'),
        'std'         => '',
        'type'        => 'colorpicker',
        'section'     => 'general_settings',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'footer_background_settings',
        'label'       => __('Footer Background Settings', 'planuswp'),
        'desc'        => __('Here you can set the background for footer. You can change also the style using all given controls.', 'planuswp'),
        'std'         => '',
        'type'        => 'background',
        'section'     => 'general_settings',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'sections',
        'label'       => __('Sections', 'planuswp'),
        'desc'        => __('Here you can set the order of all sections from the home page. Just drag and drop the items to adjust the order.', 'planuswp'),
        'std'         => '',
        'type'        => 'list-item',
        'section'     => 'home_sections',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and',
        'settings'    => array( 
          array(
            'id'          => 'section_title_menu',
            'label'       => __('Section title on menu', 'planuswp'),
            'desc'        => __('Insert the section name which will be displayed on home page menu. If you leave it empty, the section will be omitted from menu.', 'planuswp'),
            'std'         => '',
            'type'        => 'text',
            'rows'        => '',
            'post_type'   => '',
            'taxonomy'    => '',
            'min_max_step'=> '',
            'class'       => '',
            'condition'   => '',
            'operator'    => 'and'
          ),
          array(
            'id'          => 'choose_section',
            'label'       => __('Choose Predefined Section', 'planuswp'),
            'desc'        => __('If you want to display a custom page on this section, forget about this field and go to the next one.', 'planuswp'),
            'std'         => '',
            'type'        => 'select',
            'rows'        => '',
            'post_type'   => '',
            'taxonomy'    => '',
            'min_max_step'=> '',
            'class'       => '',
            'condition'   => '',
            'operator'    => 'and',
            'choices'     => array( 
              array(
                'value'       => 'header',
                'label'       => 'Welcome',
                'src'         => ''
              ),
              array(
                'value'       => 'about',
                'label'       => 'About',
                'src'         => ''
              ),
              array(
                'value'       => 'services',
                'label'       => 'Services',
                'src'         => ''
              ),
              array(
                'value'       => 'portfolio',
                'label'       => 'Portfolio',
                'src'         => ''
              ),
              array(
                'value'       => 'testimonials',
                'label'       => 'Testimonials',
                'src'         => ''
              ),
              array(
                'value'       => 'blog',
                'label'       => 'Latest Blog Posts',
                'src'         => ''
              ),
              array(
                'value'       => 'contact',
                'label'       => 'Contact',
                'src'         => ''
              )
            )
          ),
          array(
            'id'          => 'custom_page_section',
            'label'       => __('Select your custom page', 'planuswp'),
            'desc'        => __('Please select the page you already created. If you choose a page here, the above field will be ignored.', 'planuswp'),
            'std'         => '',
            'type'        => 'page-select',
            'rows'        => '',
            'post_type'   => '',
            'taxonomy'    => '',
            'min_max_step'=> '',
            'class'       => '',
            'condition'   => '',
            'operator'    => 'and'
          ),
        )
      ),
      array(
        'id'          => 'welcome_logo',
        'label'       => __('Welcome Screen logo', 'planuswp'),
        'desc'        => __('This logo is a sign or mark which you can show on the Welcome Screen. If don;t want it, you can leave it blank.', 'planuswp'),
        'std'         => '',
        'type'        => 'upload',
        'section'     => 'welcome_section',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'welcome_title',
        'label'       => __('Welcome Screen Title', 'planuswp'),
        'desc'        => __('This should be the main title of the website visible on the Welcome screen.', 'planuswp'),
        'std'         => '',
        'type'        => 'text',
        'section'     => 'welcome_section',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'welcome_description',
        'label'       => __('Welcome Screen Description', 'planuswp'),
        'desc'        => __('Please be descriptive but short. This is a generic statement about you or your company.', 'planuswp'),
        'std'         => '',
        'type'        => 'text',
        'section'     => 'welcome_section',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'welcome_content_color',
        'label'       => __('Welcome Screen Content Color', 'planuswp'),
        'desc'        => __('Change the color of the welcome screen content. You can use this option when the background is bright.', 'planuswp'),
        'std'         => '',
        'type'        => 'colorpicker',
        'section'     => 'welcome_section',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'welcome_screen_settings',
        'label'       => __('Welcome Screen Background Settings', 'planuswp'),
        'desc'        => __('Here you can replace the image from the Welcome Screen. You can change also the style using all given controls.', 'planuswp'),
        'std'         => '',
        'type'        => 'background',
        'section'     => 'welcome_section',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'show_contact_button',
        'label'       => __('Show "Quick Contact" button on home screen', 'planuswp'),
        'desc'        => '',
        'std'         => '',
        'type'        => 'on-off',
        'section'     => 'welcome_section',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'text_contact_button',
        'label'       => __('Text for "Quick Contact" button', 'planuswp'),
        'desc'        => __('Add the label for "Quick Contact" button', 'planuswp'),
        'std'         => 'Contact me',
        'type'        => 'text',
        'section'     => 'welcome_section',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'link_contact_button',
        'label'       => __('Link for "Quick Contact" button', 'planuswp'),
        'desc'        => __('Add the url for "Quick Contact" button. You can change the destination of this button, so you can add even IDs to target sections like "#contact".', 'planuswp'),
        'std'         => '#contact',
        'type'        => 'text',
        'section'     => 'welcome_section',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'about_title',
        'label'       => __('Title', 'planuswp'),
        'desc'        => __('Here you can insert the title for "About Me" section.', 'planuswp'),
        'std'         => '',
        'type'        => 'text',
        'section'     => 'about_section',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'about_title_color',
        'label'       => __('Title color', 'planuswp'),
        'desc'        => __('Choose the color for About section title.', 'planuswp'),
        'std'         => '',
        'type'        => 'colorpicker',
        'section'     => 'about_section',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'about_content_color',
        'label'       => __('Content color', 'planuswp'),
        'desc'        => __('Choose the color for About section content. Just change the text to white if you have a dark background.', 'planuswp'),
        'std'         => '',
        'type'        => 'colorpicker',
        'section'     => 'about_section',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'about_background_settings',
        'label'       => __('Background Settings', 'planuswp'),
        'desc'        => __('Here you can set the background for the About Section. You can change also the style using all given controls.', 'planuswp'),
        'std'         => '',
        'type'        => 'background',
        'section'     => 'about_section',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'about_images',
        'label'       => __('Upload Images', 'planuswp'),
        'desc'        => __('Here you can add and upload your images to be seen on About Section. Please <strong>do not upload more than 3 images</strong>.', 'planuswp'),
        'std'         => '',
        'type'        => 'list-item',
        'section'     => 'about_section',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and',
        'settings'    => array( 
          array(
            'id'          => 'about_image',
            'label'       => __('Image', 'planuswp'),
            'desc'        => '',
            'std'         => '',
            'type'        => 'upload',
            'rows'        => '',
            'post_type'   => '',
            'taxonomy'    => '',
            'min_max_step'=> '',
            'class'       => '',
            'condition'   => '',
            'operator'    => 'and'
          )
        )
      ),
      array(
        'id'          => 'about_content',
        'label'       => __('About Content', 'planuswp'),
        'desc'        => __('Add your description here. You can use the options to style the text.', 'planuswp'),
        'std'         => '',
        'type'        => 'textarea',
        'section'     => 'about_section',
        'rows'        => '10',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'insert_social_icons',
        'label'       => __('Social Icons', 'planuswp'),
        'desc'        => __('Use the Add New button to add social icons to About section.', 'planuswp'),
        'std'         => '',
        'type'        => 'list-item',
        'section'     => 'about_section',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and',
        'settings'    => array( 
          array(
            'id'          => 'social_profile',
            'label'       => __('Social Profile', 'planuswp'),
            'desc'        => '',
            'std'         => '',
            'type'        => 'select',
            'rows'        => '',
            'post_type'   => '',
            'taxonomy'    => '',
            'min_max_step'=> '',
            'class'       => '',
            'condition'   => '',
            'operator'    => 'and',
            'choices'     => array( 
              array(
                'value'       => 'fa-facebook',
                'label'       => 'Facebook',
                'src'         => ''
              ),
              array(
                'value'       => 'fa-twitter',
                'label'       => 'Twitter',
                'src'         => ''
              ),
              array(
                'value'       => 'fa-google-plus',
                'label'       => 'Google Plus',
                'src'         => ''
              ),
              array(
                'value'       => 'fa-linkedin',
                'label'       => 'Linkedin',
                'src'         => ''
              ),
              array(
                'value'       => 'fa-skype',
                'label'       => 'Skype',
                'src'         => ''
              ),
              array(
                'value'       => 'fa-dribbble',
                'label'       => 'Dribbble',
                'src'         => ''
              ),
              array(
                'value'       => 'fa-flickr',
                'label'       => 'Flickr',
                'src'         => ''
              ),
              array(
                'value'       => 'fa-pinterest',
                'label'       => 'Pinterest',
                'src'         => ''
              ),
              array(
                'value'       => 'fa-stack-overflow',
                'label'       => 'Stack Overflow',
                'src'         => ''
              ),
              array(
                'value'       => 'fa-youtube',
                'label'       => 'Youtube',
                'src'         => ''
              ),
              array(
                'value'       => 'fa-vimeo-square',
                'label'       => 'Vimeo',
                'src'         => ''
              ),
              array(
                'value'       => 'fa-dropbox',
                'label'       => 'Dropbox',
                'src'         => ''
              ),
              array(
                'value'       => 'fa-foursquare',
                'label'       => 'Foursquare',
                'src'         => ''
              ),
              array(
                'value'       => 'fa-instagram',
                'label'       => 'Instagram',
                'src'         => ''
              ),
              array(
                'value'       => 'fa-github',
                'label'       => 'Github',
                'src'         => ''
              ),
              array(
                'value'       => 'fa-tumblr',
                'label'       => 'Tumblr',
                'src'         => ''
              ),
              array(
                'value'       => 'fa-xing',
                'label'       => 'Xing',
                'src'         => ''
              )
            )
          ),
          array(
            'id'          => 'profile_url',
            'label'       => __('Profile URL', 'planuswp'),
            'desc'        => '',
            'std'         => '',
            'type'        => 'text',
            'rows'        => '',
            'post_type'   => '',
            'taxonomy'    => '',
            'min_max_step'=> '',
            'class'       => '',
            'condition'   => '',
            'operator'    => 'and'
          )
        )
      ),
      array(
        'id'          => 'portfolio_title',
        'label'       => __('Title for Potfolio Section', 'planuswp'),
        'desc'        => __('Here you can set the title for portfolio Section. By default the values is "Portfolio".', 'planuswp'),
        'std'         => '',
        'type'        => 'text',
        'section'     => 'portfolio_section',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'portfolio_background_settings',
        'label'       => __('Background Settings', 'planuswp'),
        'desc'        => __('Here you can set the background for the Portfolio Section. You can change also the style using all given controls.', 'planuswp'),
        'std'         => '',
        'type'        => 'background',
        'section'     => 'portfolio_section',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'portfolio_thumbnail_border',
        'label'       => __('Portfolio item border color', 'planuswp'),
        'desc'        => __('This will set the color for portfolio image border', 'planuswp'),
        'std'         => '#DF5757',
        'type'        => 'colorpicker',
        'section'     => 'portfolio_section',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'portfolio_thumbnail_overlay',
        'label'       => __('Portfolio item overlay color', 'planuswp'),
        'desc'        => __('This will set the color for portfolio image overlay', 'planuswp'),
        'std'         => '#579F6A',
        'type'        => 'colorpicker',
        'section'     => 'portfolio_section',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'show_more_work',
        'label'       => __('Show "More work" button', 'planuswp'),
        'desc'        => '',
        'std'         => '',
        'type'        => 'on-off',
        'section'     => 'portfolio_section',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'text_more_work',
        'label'       => __('Text for "More work" button', 'planuswp'),
        'desc'        => '',
        'std'         => '',
        'type'        => 'text',
        'section'     => 'portfolio_section',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'link_more_work',
        'label'       => __('Link for "More work" button', 'planuswp'),
        'desc'        => __('Leave this field empty if you want to have "More Work" button linked to portfolio archive page.', 'planuswp'),
        'std'         => '',
        'type'        => 'text',
        'section'     => 'portfolio_section',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'services_title',
        'label'       => __('Title for Services Section', 'planuswp'),
        'desc'        => __('This title will be visible on the top of the Services section. Be short and descriptive.', 'planuswp'),
        'std'         => '',
        'type'        => 'text',
        'section'     => 'services_section',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'services_title_color',
        'label'       => __('Title color', 'planuswp'),
        'desc'        => __('Choose the color for Services section title.', 'planuswp'),
        'std'         => '',
        'type'        => 'colorpicker',
        'section'     => 'services_section',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'services_content_color',
        'label'       => __('Content color', 'planuswp'),
        'desc'        => __('Choose the color for Services section content. Just change the text to white if you have a dark background.', 'planuswp'),
        'std'         => '',
        'type'        => 'colorpicker',
        'section'     => 'services_section',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'services_background_settings',
        'label'       => __('Background Settings', 'planuswp'),
        'desc'        => __('Here you can set the background for the Services Section. You can change also the style using all given controls.', 'planuswp'),
        'std'         => '',
        'type'        => 'background',
        'section'     => 'services_section',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'services_page',
        'label'       => __('Select the Services page', 'planuswp'),
        'desc'        => __('Please select the Services page which will be shown on thos section. You need to create a services page in order to be visible on the select field.', 'planuswp'),
        'std'         => '',
        'type'        => 'page-select',
        'section'     => 'services_section',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'pretty_column_hover_color',
        'label'       => __('Pretty Column hover color', 'planuswp'),
        'desc'        => __('This will set the color for hover state of pretty columns', 'planuswp'),
        'std'         => '#579F6A',
        'type'        => 'colorpicker',
        'section'     => 'services_section',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'pretty_column_text_color',
        'label'       => __('Pretty Column text color on hover', 'planuswp'),
        'desc'        => __('This will set the color for text on hover state for pretty columns', 'planuswp'),
        'std'         => '#ffffff',
        'type'        => 'colorpicker',
        'section'     => 'services_section',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'testimonials_title',
        'label'       => __('Ttitle for Testimonial Section', 'planuswp'),
        'desc'        => __('Here goes the title for your Testimonial Section', 'planuswp'),
        'std'         => '',
        'type'        => 'text',
        'section'     => 'testimonials_section',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'testimonials_title_color',
        'label'       => __('Title color', 'planuswp'),
        'desc'        => __('Choose the color for testimonials section title.', 'planuswp'),
        'std'         => '',
        'type'        => 'colorpicker',
        'section'     => 'testimonials_section',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'testimonials_content_color',
        'label'       => __('Content color', 'planuswp'),
        'desc'        => __('Choose the color for testimonials section content. Just change the text to white if you have a dark background.', 'planuswp'),
        'std'         => '',
        'type'        => 'colorpicker',
        'section'     => 'testimonials_section',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'testimonials_background_settings',
        'label'       => __('Background Settings', 'planuswp'),
        'desc'        => __('Here you can set the background for the Testimonials Section. You can change also the style using all given controls.', 'planuswp'),
        'std'         => '',
        'type'        => 'background',
        'section'     => 'testimonials_section',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'blog_title',
        'label'       => __('Title for Blog Section', 'planuswp'),
        'desc'        => __('This title will be visible on the top of the Blog section. Please be descriptive, but keep it short.', 'planuswp'),
        'std'         => '',
        'type'        => 'text',
        'section'     => 'blog_section',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'blog_title_color',
        'label'       => __('Title color', 'planuswp'),
        'desc'        => __('Choose the color for blog section title.', 'planuswp'),
        'std'         => '',
        'type'        => 'colorpicker',
        'section'     => 'blog_section',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'blog_background_settings',
        'label'       => __('Background Settings', 'planuswp'),
        'desc'        => __('Here you can set the background for the Blog Section. You can change also the style using all given controls.', 'planuswp'),
        'std'         => '',
        'type'        => 'background',
        'section'     => 'blog_section',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'text_read_blog',
        'label'       => __('Text for Blog Button', 'planuswp'),
        'desc'        => __('This is the text for the button bellow blog posts. E.g. "Read our blog" or "Read more articles".', 'planuswp'),
        'std'         => '',
        'type'        => 'text',
        'section'     => 'blog_section',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'select_blog_page',
        'label'       => __('Select Blog Page', 'planuswp'),
        'desc'        => __('Select the page created by you as Blog page', 'planuswp'),
        'std'         => '',
        'type'        => 'page-select',
        'section'     => 'blog_section',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'contact_title',
        'label'       => __('Title for Contact Section', 'planuswp'),
        'desc'        => __('Here goes the title for your Contact Section.', 'planuswp'),
        'std'         => '',
        'type'        => 'text',
        'section'     => 'contact_section',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'contact_title_color',
        'label'       => __('Title color', 'planuswp'),
        'desc'        => __('Choose the color for contact section title.', 'planuswp'),
        'std'         => '',
        'type'        => 'colorpicker',
        'section'     => 'contact_section',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'contact_content_color',
        'label'       => __('Content color', 'planuswp'),
        'desc'        => __('Choose the color for contact section content. Just change the text to white if you have a dark background.', 'planuswp'),
        'std'         => '',
        'type'        => 'colorpicker',
        'section'     => 'contact_section',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'contact_submit_color',
        'label'       => __('Submit button color', 'planuswp'),
        'desc'        => __('Choose the color for Submit button.', 'planuswp'),
        'std'         => '',
        'type'        => 'colorpicker',
        'section'     => 'contact_section',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'contact_background_settings',
        'label'       => __('Background Settings', 'planuswp'),
        'desc'        => __('Here you can set the background for the Contact Section. You can change also the style using all given controls.', 'planuswp'),
        'std'         => '',
        'type'        => 'background',
        'section'     => 'contact_section',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'contact_content',
        'label'       => __('Content', 'planuswp'),
        'desc'        => __('Please add here the content you want to be shown on Contact Section.', 'planuswp'),
        'std'         => '',
        'type'        => 'textarea',
        'section'     => 'contact_section',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'contact_email',
        'label'       => __('Your email adress', 'planuswp'),
        'desc'        => __('Add here you ermail adress where you want to receive the email from your website.', 'planuswp'),
        'std'         => '',
        'type'        => 'text',
        'section'     => 'contact_section',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'contact_subject',
        'label'       => __('Email Subject', 'planuswp'),
        'desc'        => __('Insert the subject of received emails.', 'planuswp'),
        'std'         => '',
        'type'        => 'text',
        'section'     => 'contact_section',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'contact_adress',
        'label'       => __('Adress', 'planuswp'),
        'desc'        => __('Insert your contact adress. This will be displayed under the "map pin" icon.', 'planuswp'),
        'std'         => '',
        'type'        => 'text',
        'section'     => 'contact_section',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'contact_phone',
        'label'       => __('Phone Number', 'planuswp'),
        'desc'        => __('Insert your phone number where your users can find you.', 'planuswp'),
        'std'         => '',
        'type'        => 'text',
        'section'     => 'contact_section',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'map_page',
        'label'       => __('Select the Map page', 'planuswp'),
        'desc'        => __('Please select the Map page which will be shown on the section. You need to create a map page in order to be visible on the select field.', 'planuswp'),
        'std'         => '',
        'type'        => 'page-select',
        'section'     => 'map_section',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'fonts_api',
        'label'       => __( 'Google Fonts API', 'titanium' ),
        'desc'        => __( 'In order to populate the Fonts dropdown with all Google fonts, you need get an API KEY from <a href="https://developers.google.com/fonts/docs/developer_api#Auth" target="_blank">here</a>. Create a project and get the API.', 'titanium' ),
        'std'         => '',
        'type'        => 'text',
        'section'     => 'fonts_section',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'body_font',
        'label'       => __('Body Font', 'planuswp'),
        'desc'        => __('Choose your preferred font for body text', 'planuswp'),
        'std'         => '',
        'type'        => 'typography',
        'section'     => 'fonts_section',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'menu_font',
        'label'       => __('Menu Font', 'planuswp'),
        'desc'        => __('Choose your preferred font for menus', 'planuswp'),
        'std'         => '',
        'type'        => 'typography',
        'section'     => 'fonts_section',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'heading_one_font',
        'label'       => __('H1 Font', 'planuswp'),
        'desc'        => __('Choose your preferred font for Heading1', 'planuswp'),
        'std'         => '',
        'type'        => 'typography',
        'section'     => 'fonts_section',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'heading_two_font',
        'label'       => __('H2 Font', 'planuswp'),
        'desc'        => __('Choose your preferred font for Heading2', 'planuswp'),
        'std'         => '',
        'type'        => 'typography',
        'section'     => 'fonts_section',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'heading_three_font',
        'label'       => __('H3 Font', 'planuswp'),
        'desc'        => __('Choose your preferred font for Heading3', 'planuswp'),
        'std'         => '',
        'type'        => 'typography',
        'section'     => 'fonts_section',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'heading_four_font',
        'label'       => __('H4 Font', 'planuswp'),
        'desc'        => __('Choose your preferred font for Heading4', 'planuswp'),
        'std'         => '',
        'type'        => 'typography',
        'section'     => 'fonts_section',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'heading_five_font',
        'label'       => __('H5 Font', 'planuswp'),
        'desc'        => __('Choose your preferred font for Heading5', 'planuswp'),
        'std'         => '',
        'type'        => 'typography',
        'section'     => 'fonts_section',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'welcome_heading_one',
        'label'       => __('Welcome screen Title', 'planuswp'),
        'desc'        => __('Choose your font and text style for title from Welcome screen', 'planuswp'),
        'std'         => '',
        'type'        => 'typography',
        'section'     => 'fonts_section',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'welcome_heading_one',
        'label'       => __('Welcome screen Title', 'planuswp'),
        'desc'        => __('Choose your font and text style for title from Welcome screen', 'planuswp'),
        'std'         => '',
        'type'        => 'typography',
        'section'     => 'fonts_section',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'custom_css_theme',
        'label'       => __('Theme Dynamic Styles', 'planuswp'),
        'desc'        => __('<p><strong>Important!</strong> - Do not remove any of the existing rules.</p><p>I have had the most success setting the "dynamic.css" file (from theme root) CHMOD to 0777 but feel free to play around with permissions until everything is working. A good starting point is 0666. When the server can save to the file, CSS will automatically be updated when you save your Theme Options.</p>', 'planuswp'),
        'std'         => "#portfolio .portfolio-row .portfolio-mix .portfolio-item a .caption-bg {
-webkit-box-shadow: inset 0 0 0 6px {{portfolio_thumbnail_border}}, inset 0 0 0 0 {{portfolio_thumbnail_overlay}};
-moz-box-shadow: inset 0 0 0 6px {{portfolio_thumbnail_border}}, inset 0 0 0 0 {{portfolio_thumbnail_overlay}};
box-shadow: inset 0 0 0 6px {{portfolio_thumbnail_border}}, inset 0 0 0 0 {{portfolio_thumbnail_overlay}};
}
#portfolio .portfolio-row .portfolio-mix .portfolio-item a .caption-bg::before {
content: '';
-webkit-box-shadow: inset 0 0 0 0 {{portfolio_thumbnail_overlay}};
-moz-box-shadow: inset 0 0 0 0 {{portfolio_thumbnail_overlay}};
box-shadow: inset 0 0 0 0 {{portfolio_thumbnail_overlay}};
}
#portfolio .portfolio-row .portfolio-mix .portfolio-item a:hover .caption-bg::before {
content: '';
-webkit-box-shadow: inset 0 0 0 160px {{portfolio_thumbnail_overlay}};
-moz-box-shadow: inset 0 0 0 160px {{portfolio_thumbnail_overlay}};
box-shadow: inset 0 0 0 160px {{portfolio_thumbnail_overlay}};
}
body { {{body_font}} }
h1 { {{heading_one_font}} }
h2 { {{heading_two_font}} }
h3 { {{heading_three_font}} }
h4 { {{heading_four_font}} }
h5 { {{heading_five_font}} }
.jumbotron h1 { {{welcome_heading_one}} color: {{welcome_content_color}}; }
.navbar, .single-top-menu { {{menu_font}} }
.service-column:hover { background-color: {{pretty_column_hover_color}}; }
.service-column:hover i { color: {{pretty_column_hover_color}}; }
.service-column:hover h2, .service-column:hover p { color: {{pretty_column_text_color}}; }
.service-column:hover .service-icon { 
-webkit-box-shadow: inset 0 0 0 0 {{pretty_column_hover_color}};
-moz-box-shadow: inset 0 0 0 0 {{pretty_column_hover_color}};
box-shadow: inset 0 0 0 0 {{pretty_column_hover_color}};
}
.jumbotron p, .jumbotron p .btn:hover { color: {{welcome_content_color}}; }


.navbar .navbar-nav .sub-menu li a:hover,
#about .social-icons .icon-social i,
#portfolio .filter.btn-outline-white,
.post-title a:hover,
.single-post-meta i,
.comment-respond .logged-in-as a,
.form-submit input,
.primary-menu li ul li a:hover,
.primary-menu li ul .current-menu-item a,
#portfolio .btn-red,
#blog .btn-red { color: {{brand_color}}; }

#about .round-outline .round-photo-anchor .round-caption-bg,
#about .social-icons .icon-social:hover,
#portfolio .filter.btn-outline-white:hover,
#portfolio .cat-list li.active,
#portfolio .cat-list li:active,
.da-dots span.da-dots-current:after,
.form-submit input:hover,
.primary-menu li a:hover,
.primary-menu .current-menu-item a,
.navbar .navbar-nav li a:hover,
.navbar .navbar-nav li:hover,
.navbar .navbar-nav .active,
.bx-wrapper .bx-pager.bx-default-pager .active:after,
#portfolio .btn-red:hover,
#portfolio .btn-red:focus,
#blog .btn-red:hover,
#blog .btn-red:focus { background-color: {{brand_color}}; }

#about .social-icons .icon-social,
#portfolio .filter.btn-outline-white,
.da-slide .da-img .round-outline,
.form-submit input,
#portfolio .btn-red,
#blog .btn-red { border-color: {{brand_color}}; }

#portfolio .btn-red:hover,
#portfolio .btn-red:focus { color: #fff; }
#blog .btn-red:hover,
#blog .btn-red:focus { color: #fff; }

#about h1 { color: {{about_title_color}}; }
#about { color: {{about_content_color}}; }
#services h1 { color: {{services_title_color}}; }
#services { color: {{services_content_color}}; }
#testimonials h1 { color: {{testimonials_title_color}}; }
#testimonials, #testimonials blockquote { color: {{testimonials_content_color}}; }
#blog h1 { color: {{blog_title_color}}; }
#contact h1 { color: {{contact_title_color}}; }
#contact, #contact p, #contact .icon, #contact form input, #contact form textarea { color: {{contact_content_color}}; }
#contact form input::-webkit-input-placeholder,
#contact form textarea::-webkit-input-placeholder { color: {{contact_content_color}}; }
#contact form input:-moz-placeholder,
#contact form textarea:-moz-placeholder { color: {{contact_content_color}}; }
#contact form button[type='submit'] { color: {{contact_submit_color}}; border-color: {{contact_submit_color}}; background: none;}
#contact form button[type='submit']:hover { background-color: {{contact_submit_color}}; }
.footer { color: {{footer_content_color}}; }",
        'type'        => 'css',
        'section'     => 'css_section',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'custom_css_users',
        'label'       => __('Custom CSS', 'planuswp'),
        'desc'        => __('<p>You can change any CSS rule by adding it here. You can add new CSS rules too.</p><p>I have had the most success setting the "dynamic.css" file (from theme root) CHMOD to 0777 but feel free to play around with permissions until everything is working. A good starting point is 0666. When the server can save to the file, CSS will automatically be updated when you save your Theme Options.</p>', 'planuswp'),
        'std'         => '',
        'type'        => 'css',
        'section'     => 'css_section',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
    )
  );
  
  /* allow settings to be filtered before saving */
  $custom_settings = apply_filters( 'option_tree_settings_args', $custom_settings );
  
  /* settings are not the same update the DB */
  if ( $saved_settings !== $custom_settings ) {
    update_option( 'option_tree_settings', $custom_settings ); 
  }
  
}