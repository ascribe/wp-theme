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

		if (have_rows('subtemplate',$id)) {
			while (have_rows('subtemplate',$id)) {
				the_row();

				$subtemplateType = get_sub_field('subtemplate_type');

				$subtemplateTitle = get_sub_field('section_title');

				$subtemplate = '';

				switch ($subtemplateType) {
					case 'featurecircles':
						$result .= $this->featureCircles($subtemplate,$subtemplateTitle);
						break;
					case 'casestudies':
						$result .= $this->caseStudies($subtemplate,$subtemplateTitle);
						break;
					case 'oldnew':
						$result .= $this->oldNew($subtemplate,$subtemplateTitle);
						break;
					case 'productoverview':
						$result .= $this->productOverview($subtemplate,$subtemplateTitle);
						break;
					case 'bluebox':
						$result .= $this->blueBox($subtemplate,$subtemplateTitle);
						break;
					case 'createaccount':
						$result .= $this->createAccount($subtemplate,$subtemplateTitle);
						break;
					case 'galleries':
						$result .= $this->galleries($subtemplate,$subtemplateTitle);
						break;
					case 'blogfeatures':
						$result .= $this->blogFeatures($subtemplate,$subtemplateTitle);
						break;
					case 'mediafeature':
						$result .= $this->mediaFeature($subtemplate,$subtemplateTitle);
						break;
					case 'team':
						$result .= $this->team($subtemplate,$subtemplateTitle);
						break;
					case 'content':
						$result .= $this->content($subtemplate,$subtemplateTitle);
						break;
					case 'faq':
						$result .= $this->faq($subtemplate,$subtemplateTitle);
						break;
					case 'careers':
						$result .= $this->careers($subtemplate,$subtemplateTitle);
						break;
					case 'mediadetail':
						$result .= $this->mediaDetail($subtemplate,$subtemplateTitle);
						break;
				}
			}
		}

		return $result;
	}

	public function featureCircles($subtemplate,$subtemplateTitle) {
		$result = '';

		return $result;
	}
	public function caseStudies($subtemplate,$subtemplateTitle) {
		$result = '';

		return $result;
	}
	public function oldNew($subtemplate,$subtemplateTitle) {
		$result = '';

		return $result;
	}
	public function productOverview($subtemplate,$subtemplateTitle) {
		$result = '';

		return $result;
	}
	public function blueBox($subtemplate,$subtemplateTitle) {
		$result = '';

		return $result;
	}
	public function createAccount($subtemplate,$subtemplateTitle) {
		$result = '';

		return $result;
	}
	public function galleries($subtemplate,$subtemplateTitle) {
		$result = '';

		return $result;
	}
	public function blogFeatures($subtemplate,$subtemplateTitle) {
		$result = '';

		return $result;
	}
	public function mediaFeature($subtemplate,$subtemplateTitle) {
		$result = '';

		return $result;
	}
	public function team($subtemplate,$subtemplateTitle) {
		$result = '';

		return $result;
	}
	public function content($subtemplate,$subtemplateTitle) {
		$result = '';

		$result .= get_sub_field('content');

		return $result;
	}
	public function faq($subtemplate,$subtemplateTitle) {
		$result = '';

		return $result;
	}
	public function careers($subtemplate,$subtemplateTitle) {
		$result = '';

		return $result;
	}
	public function mediaDetail($subtemplate,$subtemplateTitle) {
		$result = '';

		return $result;
	}
}