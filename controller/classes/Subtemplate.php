<?php
/**
 * Created by PhpStorm.
 * User: sarahetter
 * Date: 15-09-17
 * Time: 4:47 PM
 */

class Subtemplate {

	public function loopSubtemplates() {
		global $post;
		$id             = $post->ID;
		$result = '';

		$subtemplates = get_field('subtemplate', $id);
		$result       = '';
		if( $subtemplates ) {
			foreach ( $subtemplates as $subtemplate ) {
				$subtemplateType = $subtemplate['subtemplate_type'];

				$subtemplateTitle = $subtemplate['section_title'];

				switch ($subtemplateType) {
					case 'content':
						$result .= $this->content($subtemplate,$subtemplateTitle);
						break;

				}
			}

			return $result;
		}


		return $result;
	}


}