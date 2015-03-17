<?php

// Remove automated paragraphs around the shortcodes
function pixelglow_shortcodes_formatter($content) {
	$block = join("|",array(
		"team_member",
		"section",
		"button",
		"prettycol",
		"portfolio",
		"row",
		"col",
		"service",
		"tab",
		"tabs",
		"carousel",
		"carousel_item",
		"features",
		"feature",
		"contact_form",
		"googlemap",
		"social_icons",
		"progress",
		"iconbox",
		"separator",
		"promobox",
		"pricing_col",
		"dropcap",
		"emphasize",
		"image_slider",
		"slide",
		"cf_section",
		"special_title"
	));

	// opening tag
	$rep = preg_replace("/(<p>)?\[($block)(\s[^\]]+)?\](<\/p>|<br \/>)?/","[$2$3]",$content);

	// closing tag
	$rep = preg_replace("/(<p>)?\[\/($block)](<\/p>|<br \/>)?/","[/$2]",$rep);

	return $rep;
}

add_filter('the_content', 'pixelglow_shortcodes_formatter');
add_filter('widget_text', 'pixelglow_shortcodes_formatter');

// We need to be able to figure out the attributes of a wrapped shortcode
function bs_attribute_map($str, $att = null) {
    $res = array();
    $return = array();
    $reg = get_shortcode_regex();
    preg_match_all('~'.$reg.'~',$str, $matches);
    foreach($matches[2] as $key => $name) {
        $parsed = shortcode_parse_atts($matches[3][$key]);
        $parsed = is_array($parsed) ? $parsed : array();

            $res[$name] = $parsed;
            $return[] = $res;
        }
    return $return;
}

// Font Awesome Shortcodes
function addscFontAwesome($atts) {
	extract(shortcode_atts(array(
	'type'  => '',
	'size' => '',
	'rotate' => '',
	'flip' => '',
	'pull' => '',
	'spin' => 'false',
 
	), $atts));
     
	$type = ($type) ? 'fa fa-'.$type. '' : 'fa-star';
	$size = ($size) ? ' fa-'.$size. '' : '';
	$rotate = ($rotate) ? ' fa-rotate-'.$rotate. '' : '';
	$flip = ($flip) ? ' fa-flip-'.$flip. '' : '';
	$pull = ($pull) ? ' pull-'.$pull. '' : '';
	$animated = (isset($spin) && $spin == 'true') ? ' fa-spin' : '';
 
	$theAwesomeFont = '<i class="'.$type.$size.$rotate.$flip.$pull.$animated.'"></i>';

	return $theAwesomeFont;
}

add_shortcode('icon', 'addscFontAwesome');


// Buttons Shortcodes
function scbuttons($atts) {
	extract(shortcode_atts(array(
	'size'  => '',
	'corners' => '',
	'color' => '',
	'text' => '',
	'href' => '',
	), $atts));

	$classes = "btn";
	$size = ($size) ? ' btn-'.$size. '' : 'btn-small';
	$corners = ($corners) ? ' btn-'.$corners. '' : 'btn-round';
	$color = ($color) ? ' btn-'.$color. '' : 'btn-red';
	$classes .= $size.$corners.$color;
 
	$button = '<a class="'.$classes.'" href="'.$href.'" >'.$text.'</a>';
     
	return $button;
}
add_shortcode('button', 'scbuttons');



// Pretty Bootstrap Columns shortcode
function pretty_col($atts, $content = null) {
	extract(shortcode_atts(array(
		'icon' => '',
		'title' => '',
		'link' => '',
		'columns' => '',
		'offset' => '',
		'breakpoint' => ''
	), $atts));

	if ($link !== '') {
		$anchor = '<h2><a href="'.$link.'">'.$title.'</a></h2>';
	} else {
		$anchor = '<h2>'.$title.'</h2>';
	}

	if ($breakpoint !== '') {
		$break = $breakpoint;
	} else {
		$break= 'md';
	}

	if ($offset !== '') {
		$offcol = ' col-'.$break.'-offset-'.$offset;
	} else {
		$offcol = '';
	}

	$return_string = '';
	$return_string = '<div class="col-'.$break.'-'.$columns.$offcol.' service-column">';
	$return_string .= '<figure class="service-icon"><i class="fa fa-'.$icon.'"></i></figure>';
	$return_string .= $anchor;
	$return_string .= '<p class="service-description">'.$content.'</p></div>';

	return $return_string;
}
add_shortcode('prettycol', 'pretty_col');


// Bootstrap columns
function bootstrapColumns($atts, $content = null) {
	extract(shortcode_atts(array(
		'columns' => '',
		'offset' => '',
		'breakpoint' => ''
	), $atts));

	$col = '<div class="col-'.$breakpoint.'-'.$columns;
	$off = ' col-'.$breakpoint.'-offset-'.$offset.'"';
	$string = $col.$off.'>'.do_shortcode($content).'</div>';

	return $string;
}
add_shortcode('col', 'bootstrapColumns');


// Row shortcode - wrap any columns into this shortcode
function row($atts, $content = null) {

	$return_string = '<div class="row">'.do_shortcode($content).'</div>';

	return $return_string;
}
add_shortcode("row", "row");


// Bootstrap Tabs Shortcode
function tabs( $atts, $content = null ) {

	if( isset( $GLOBALS['tabs_count'] ) )
		$GLOBALS['tabs_count']++;
	else
		$GLOBALS['tabs_count'] = 0;

	$GLOBALS['tabs_default_count'] = 0;
      
	extract( shortcode_atts( array(
		"type"   => false,
		"xclass" => false
	), $atts ) );
 
	$ul_class  = 'nav';
	$ul_class .= ( $type )     ? ' nav-' . $type : ' nav-tabs';
	$ul_class .= ( $xclass )   ? ' ' . $xclass : '';

	$div_class = 'tab-content';

	$id = 'custom-tabs-'. $GLOBALS['tabs_count'];

	$atts_map = bs_attribute_map( $content );

	// Extract the tab titles for use in the tab widget.
	if ( $atts_map ) {
		$tabs = array();
		$GLOBALS['tabs_default_active'] = true;
		foreach( $atts_map as $check ) {
			if( !empty($check["tab"]["active"]) ) {
				$GLOBALS['tabs_default_active'] = false;
			}
		}
		$i = 0;
		foreach( $atts_map as $tab ) {
			$tabs[] = sprintf(
				'<li%s><a href="#%s" data-toggle="tab">%s</a></li>',
				( !empty($tab["tab"]["active"]) || ($GLOBALS['tabs_default_active'] && $i == 0) ) ? ' class="active"' : '',
				'custom-tab-' . $GLOBALS['tabs_count'] . '-' . sanitize_title( $tab["tab"]["title"] ),
				$tab["tab"]["title"]
			);
			$i++;
		}
	}

	$ul_class = esc_attr( $ul_class );
	$id = esc_attr( $id );
	$tabs = ( $tabs )  ? implode( $tabs ) : '';
	$div_class = esc_attr( $div_class );
	
	$output = '<ul class="'.$ul_class.'" id="'.$id.'">'.$tabs.'</ul><div class="'.$div_class.'">'.do_shortcode( $content ).'</div>';

	return $output;
}
add_shortcode("tabs", "tabs");


// Bootstrap Tab Shortcode
function tab( $atts, $content = null ) {

	extract( shortcode_atts( array(
		'title'   => false,
		'active'  => false,
		'fade'    => false,
		'xclass'  => false,
	), $atts ) );
    
	if( $GLOBALS['tabs_default_active'] && $GLOBALS['tabs_default_count'] == 0 ) {
		$active = true;
	}
	$GLOBALS['tabs_default_count']++;

	$class  = 'tab-pane';
	$class .= ( $fade )            ? ' fade' : '';
	$class .= ( $active )          ? ' active' : '';
	$class .= ( $active && $fade ) ? ' in' : '';

	$id = 'custom-tab-'. $GLOBALS['tabs_count'] . '-'. sanitize_title( $title );

	return sprintf( 
		'<div id="%s" class="%s">%s</div>',
		esc_attr( $id ),
		esc_attr( $class ),
		do_shortcode( $content )
	);

}
add_shortcode("tab", "tab");


// Bootstrap Collapsible Shortcode - use it with Collapse shortcode
function collapsibles( $atts, $content = null ) {

	if( isset($GLOBALS['collapsibles_count']) )
		$GLOBALS['collapsibles_count']++;
	else
		$GLOBALS['collapsibles_count'] = 0;

	extract( shortcode_atts( array(
		"xclass" => false
	), $atts ) );
      
	$class = 'panel-group';
	$class .= ( $xclass )   ? ' ' . $xclass : '';

	$id = 'custom-collapse-'. $GLOBALS['collapsibles_count'];

	return sprintf( 
		'<div class="%s" id="%s">%s</div>',
		esc_attr( $class ),
		esc_attr( $id ),
		do_shortcode( $content )
	);

}
add_shortcode("collapsibles", "collapsibles");


// Bootstrap Collapse Shortcode - use it with Collapsible shortcode
function collapse( $atts, $content = null ) {

	extract( shortcode_atts( array(
		"title"   => false,
		"type"    => false,
		"active"  => false,
		"xclass"  => false,
	), $atts ) );

	$panel_class = 'panel';
	$panel_class .= ( $type )     ? ' panel-' . $type : ' panel-default';
	$panel_class .= ( $xclass )   ? ' ' . $xclass : '';

	$collapse_class = 'panel-collapse';
	$collapse_class .= ( $active )  ? ' in' : ' collapse';

	$parent = 'custom-collapse-'. $GLOBALS['collapsibles_count'];
	$current_collapse = $parent . '-'. sanitize_title( $title );
      
	return sprintf( 
		'<div class="%1$s">
			<div class="panel-heading">
				<h4 class="panel-title">
					<a class="accordion-toggle" data-toggle="collapse" data-parent="#%2$s" href="#%3$s">%4$s</a>
				</h4>
			</div>
			<div id="%3$s" class="%5$s">
				<div class="panel-body">%6$s</div>
			</div>
		</div>',
		esc_attr( $panel_class ),
		$parent,
		$current_collapse,
		$title,
		esc_attr( $collapse_class ),
		do_shortcode( $content )
	);
}
add_shortcode("collapse", "collapse");


// Google Map shortcode
function googleMap($atts, $content = null) {
	extract(shortcode_atts(array(
		"id" => 'myMap',
		"type" => 'road',
		"latitude" => '36.394757',
		"longitude" => '-105.600586',
		"zoom" => '16',
		"message" => 'This is the message...',
		"width" => '100%',
		"height" => '400',
		"hue" => ''
	), $atts));

	$mapType = '';
	if($type == "satellite") 
		$mapType = "SATELLITE";
	else if($type == "terrain")
		$mapType = "TERRAIN";  
	else if($type == "hybrid")
		$mapType = "HYBRID";
	else
		$mapType = "ROADMAP";  

echo '<!-- Google Map -->
	<script type="text/javascript">  
		jQuery(document).ready(function() {

			function initializeGoogleMap() {
				var myLatlng = new google.maps.LatLng('.$latitude.','.$longitude.');
				var myOptions = {
					center: myLatlng,  
					zoom: '.$zoom.',
					mapTypeControl: false,
					mapTypeId: google.maps.MapTypeId.'.$mapType.',
					panControl: false,
					zoomControl: true,
					scaleControl: true,
					streetViewControl: false,
					scrollwheel: false
				};

			var styles = [{
				stylers: [
					{ hue: "'.$hue.'" },
					{ saturation: -20 }
				]},{
				featureType: "road",
				elementType: "geometry",
				stylers: [
					{ lightness: 100 },
					{ visibility: "simplified" }
				]
			}];

			var map = new google.maps.Map(document.getElementById("'.$id.'"), myOptions);
			map.setOptions({styles: styles});

			var contentString = "'.$message.'";
			var infowindow = new google.maps.InfoWindow({
				content: contentString
			});

			var marker = new google.maps.Marker({
				position: myLatlng,
				center: myLatlng
			});

			google.maps.event.addListener(marker, "click", function() {
				infowindow.open(map,marker);
			});

			google.maps.event.addDomListener(window, "resize", function() {
				map.setCenter(myLatlng);
			});

			marker.setMap(map);

			}
			initializeGoogleMap();

		});
	</script>';

return '<div id="'.$id.'" style="width:'.$width.'px; height:'.$height.'px;" class="googleMap"></div>';
}
add_shortcode('googlemap','googleMap');


/* =====================================================================
Shortcode: Pricing table
Author: Silviu Stefu
Description: Shortcodes to show features columns with icons
===================================================================== */

function display_pricing_column( $atts ) {
	$atts = extract( shortcode_atts( array(
		'plan'			=> '',
		'plan_color'	=> '',
		'price'			=> '',
		'currency'		=> '',
		'price_symbol'	=> '',
		'frequency'		=> '',
		'features'		=> '',
		'url'			=> '',
		'link_target'	=> '',
		'button_label'	=> '',
		'breakpoint'	=> 'md',
		'size'			=> '4',
		'featured'		=> 'no'
	),$atts ) );

	$featured = (isset($featured) && $featured == "yes") ? ' pricing-featured' : '' ;
	$target = (isset($link_target) && $link_target == "blank") ? ' target="_blank"' : '' ;
	$button = (isset($url) && $url) ? '<li class="pricing-button"><a href="'.$url.'" class="btn btn-red btn-big btn-round"'.$target.'>'.$button_label.'</a></li>' : '' ;
	if (isset($features) && $features) {
		$feat_arr = explode('-/-', $features);
		$feat_list = '';
		foreach ($feat_arr as $feature) {
			$feat_list .= '<li>'.$feature.'</li>';
		}
	}
	$plan_color = (isset($plan_color) && $plan_color !== "") ? ' style="background:'.$plan_color.'"' : '' ;
	$animated = (isset($animated) && $animated == "yes") ? ' animated' : '' ;

	$output = '<div class="col-'.$breakpoint.'-'.$size.'">
		<ul class="pricing-col'.$featured.$animated.'">
			<li class="pricing-plan"><h3>'.$plan.'</h3></li>
			<li class="pricing-price"'.$plan_color.'>
				<span class="pricing-symbol">'.$price_symbol.'</span>'
				.$price.
				'<span class="pricing-currency">'.$currency.'</span>
				<span class="pricing-frequency">'.$frequency.'</span>
			</li>'
			.$feat_list
			.$button.
		'</ul>
	</div>';

	return $output;
}
add_shortcode( 'pricing_col','display_pricing_column' );


/* =====================================================================
Shortcode: Separator
Author: Silviu Stefu
Description: Shortcodes to show features columns with icons
===================================================================== */

function display_separator( $atts ) {
	$atts = extract( shortcode_atts( array(
		'top'		=> '',
		'bottom'	=> '',
		'length'	=> '',
		'ornament'	=> '',
		'invisible'	=> '',
	),$atts ) );

	if ($top !== '' && $bottom == '') {
		$style = ' style="margin-top: '.$top.'px;"';
	} elseif ($top == '' && $bottom !== '') {
		$style = ' style="margin-bottom: '.$bottom.'px;"';
	} elseif ($top !== '' && $bottom !== '') {
		$style = ' style="margin-bottom: '.$bottom.'px; margin-top:'.$top.'px;"';
	}
	
	$length = (isset($length) && $length == "short") ? ' sep-short' : ' sep-long' ;
	$ornament = (isset($ornament) && $ornament == "yes") ? '<div class="sep-ornament"></div>' : '' ;
	$innerInv = (isset($invisible) && $invisible == "yes") ? ' sep-inner-invisible' : '' ;
	$sepInv = (isset($invisible) && $invisible == "yes") ? ' sep-invisible' : '' ;

	$output = '<div class="separator'.$sepInv.'"'.$style.'>
		<div class="sep-inner'.$length.$innerInv.'">'.$ornament.'</div>
	</div>';

	return $output;
}
add_shortcode( 'separator','display_separator' );

/* =====================================================================
Shortcode: Features columns
Author: Silviu Stefu
Description: Shortcodes to show features columns with icons
===================================================================== */

function display_features_row( $atts, $content = null ) {
	$atts = extract( shortcode_atts( array(
		'extra_class' => '',
		'style' => '',
	),$atts ) );

	$extra_class = (isset($extra_class) && $extra_class !== "") ? ' '.$extra_class : '' ;
	$style = (isset($style) && $style == "vertical") ? ' vertical-features' : ' horizontal-features';

	return '<div class="row features-row'.$style.$extra_class.'">'.do_shortcode( $content ).'</div>';
}
add_shortcode( 'features','display_features_row' );


function display_feature( $atts ) {
	$atts = extract( shortcode_atts( array(
		'icon'  		=> 'desktop',
		'color' 		=> '',
		'description'	=> '',
		'size'			=> '4',
		'breakpoint'	=> 'sm',
		'offset'		=> '',
	),$atts ) );

	$col = 'col-'.$breakpoint.'-'.$size;
	$off = (isset($offset) && $offset) ? ' col-'.$breakpoint.'-offset-'.$offset.'"' : '' ;
	$color = (isset($color) && $color) ? 'style="color: '.$color.'"' : '' ;

	$output = '<div class="'.$col.$off.'">
		<div class="feature-col clearfix">
			<i class="fa fa-'.$icon.'"'.$color.'></i>
			<span>'.$description.'</span>
		</div>
	</div>';

	return $output;
}
add_shortcode( 'feature','display_feature' );

?>