<?php

function city_buildings_metabox( $post ){
	$cities = get_posts(array( 'post_type'=>'city', 'posts_per_page'=>-1, 'orderby'=>'post_title', 'order'=>'ASC' ));

	if( $cities ){
		echo '
		<div style="max-height:200px; overflow-y:auto;">
			<ul>
		';

		foreach( $cities as $city ){
			echo '
			<li><label>
				<input type="radio" name="post_parent" value="'. $city->ID .'" '. checked($city->ID, $post->post_parent, 0) .'> '. esc_html($city->post_title) .'
			</label></li>
			';
		}

		echo '
			</ul>
		</div>';
	}
	else
		echo 'Команд нет...';
}

add_action('add_meta_boxes', function () {
	add_meta_box( 'buildings', 'Город', 'city_buildings_metabox', 'buildings', 'side', 'high'  );
}, 1);