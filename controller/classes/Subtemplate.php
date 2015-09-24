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
						$result .= $this->galleries($subtemplate,$subtemplateTitle);
						break;
					case 'team':
						$result .= $this->team($subtemplate,$subtemplateTitle);
						break;
					case 'content':
						$result .= $this->content($subtemplate,$subtemplateTitle);
						break;
					case 'image':
						$result .= $this->image($subtemplate,$subtemplateTitle);
						break;
					case 'faq':
						$result .= $this->faq($subtemplate,$subtemplateTitle);
						break;
					case 'values':
						$result .= $this->values($subtemplate,$subtemplateTitle);
						break;
					case 'careers':
						$result .= $this->careers($subtemplate,$subtemplateTitle);
						break;
					case 'mediadetail':
						$result .= $this->mediaDetail($subtemplate,$subtemplateTitle);
						break;
					case 'download':
						$result .= $this->download($subtemplate,$subtemplateTitle);
						break;
				}
			}
		}

		return $result;
	}

	public function featureCircles($subtemplate,$subtemplateTitle) {

		$featureCircles = '';
		if (have_rows('feature_circles')) {
			while (have_rows('feature_circles')) {
				the_row();

				$title          = get_sub_field('title');
				$icon           = get_sub_field('icon')['url'];
				$description    = get_sub_field('description');

				$featureCircles .= "<article class='feature-circle'>
										<img src='{$icon}' alt='{$title} Icon'>
										<h1>{$title}</h1>
										<div class='description'>{$description}</div>
									</article>";
			}
		}

		$result = "<section class='subtemplate feature-circles'><div class='centered-header'><div class='column-container'>{$featureCircles}</div></div></section>";

		return $result;
	}
	public function caseStudies($subtemplate,$subtemplateTitle) {
		$caseStudies = '';
		if (have_rows('case_study')) {
			while (have_rows('case_study')) {
				the_row();

				$content          = get_sub_field('content');
				$bgImage          = get_sub_field('background_image')['url'];

				$caseStudies .= "<article class='case-study' style='background-image:url({$bgImage})'>
									<div class='centered-header'>
									<div class='description'>{$content}</div>
									</div>
								</article>";
			}
		}

		$result = "<section class='subtemplate case-studies'><div class='slide-container'>{$caseStudies}</div><div class='slider-action' id='back'></div><div class='slider-action' id='forward'></div></section>";

		return $result;
	}
	public function oldNew($subtemplate,$subtemplateTitle) {
		$oldNewRows = '';
		if (have_rows('old_way__new_way')) {
			while (have_rows('old_way__new_way')) {
				the_row();

				$oldway          = get_sub_field('old_way_text');
				$newway          = get_sub_field('new_way_text');

				$oldNewRows .= "<tr class='old-new'>
									<td class='old'>{$oldway}</td>
									<td class='new'>{$newway}</td>
								</tr>";
			}
		}

		$result = "<section class='subtemplate old-new'>
					<div class='centered-content'>
						<h1>{$subtemplateTitle}</h1>
						<table>
							<thead><tr><th>Old Way</th><th>New Way</th></tr></thead>
							<tbody>{$oldNewRows}</tbody>
						</table>
					</div>
					</section>";

		return $result;
	}
	public function productOverview($subtemplate,$subtemplateTitle) {

		$imageUrl      = get_sub_field('image')['url'];
		$imageAlt      = get_sub_field('image')['alt'];

		$content    = get_sub_field('content');

		$result = "<section class='subtemplate product-overview'>
						<div class='centered-prodFeat'>
							<img src='{$imageUrl}' alt='{$imageAlt}'>
							<div class='text-column'>
								<h1>{$subtemplateTitle}</h1>
								<div>{$content}</div>
							</div>
						</div>
					</section>";
		return $result;
	}
	public function blueBox($subtemplate,$subtemplateTitle) {

		$content    = get_sub_field('content');

		$result = "<section class='subtemplate blue-box'>
						<div class='centered-content'>
						<article class='blue-copy'>
							<h1>{$subtemplateTitle}</h1>
							<div>{$content}</div>
						</article>
						</div>
					</section>";

		return $result;
	}
	public function createAccount($subtemplate,$subtemplateTitle) {
		$buttonText     = get_sub_field('create_free_account_text');
		$signUpLink     = get_field('sign_up_link','option');
		$backgroundImg  = get_sub_field('image')['url'];


		$result = "<section class='subtemplate sign-up' style='background-image: url({$backgroundImg})'>
						<div class='centered-content'>
							<a href='{$signUpLink}' class='button blue-overPic'>{$buttonText}</a>
						</div>
					</section>";

		return $result;
	}
	public function galleries($subtemplate,$subtemplateTitle) {
		$galleryLink        = get_sub_field('gallery_page');
		$galleriesImgUrl    = get_sub_field('galleries_image')['url'];
		$galleriesImgAlt    = get_sub_field('galleries_image')['alt'];


		$result = "<section class='subtemplate galleries-marketplaces'>
						<div class='centered-content'>
							<h1>{$subtemplateTitle}</h1>
							<img src='{$galleriesImgUrl}' alt='{$galleriesImgAlt}'>
							<a href='{$galleryLink}' class='button white-blue'>Read more</a>
						</div>
					</section>";

		return $result;
	}
	public function blogFeatures($subtemplate,$subtemplateTitle) {
		$blogFeatures = '';
		if (have_rows('blog_features')) {
			while (have_rows('blog_features')) {
				the_row();

				$title          = get_sub_field('feature_title');
				$feature        = get_sub_field('post');
				$postTitle      = $feature->post_title;
				$url            = get_permalink($feature->ID);
				$image          = wp_get_attachment_image_src(get_post_thumbnail_id($feature->ID),'large')[0];

				$blogFeatures .= "<a href='{$url}'><article class='blog'><div>
									<img src='{$image}' alt='{$postTitle} Image'>
									<h2>{$title}</h2>
									<h1>{$postTitle}</h1></div>
								</article></a>";
			}
		}

		$result = "<section class='subtemplate blog-features'>
					<div class='centered-content'>
						<div class='column-container'>
						{$blogFeatures}
						</div>
					</div>
					</section>";

		return $result;
	}
	public function team($subtemplate,$subtemplateTitle) {
		$content        = get_sub_field('content');
		$meetTeamLink   = get_sub_field('meet_the_team_link');

		$args           = array(
			'post_type' => 'team',
			'order'     => 'ASC'
		);

		$teamMembers = get_posts($args);
		$teamMemberMarkup = '';
		if (!empty($teamMembers)) {
			foreach ($teamMembers as $teamMember) {
				$id     = $teamMember->ID;
				$name   = $teamMember->post_title;
				$role   = get_field('role',$id);
				$image  = get_field('image',$id)['url'];
				$facebook   = get_field('facebook_link',$id);
				if ($facebook) {
					$facebook = "<a href='{$facebook}' target='_blank'>Facebook</a>";
				}

				$github     = get_field('github_link',$id);
				if ($github) {
					$github = "<a href='{$github}' target='_blank'>Github</a>";
				}

				$linkedin   = get_field('linkedin_link',$id);
				if ($linkedin) {
					$linkedin = "<a href='{$linkedin}' target='_blank'>Linkedin</a>";
				}

				$twitter    = get_field('twitter_link',$id);
				if ($twitter) {
					$twitter = "<a href='{$twitter}' target='_blank'>Twitter</a>";
				}

				$teamMemberMarkup .= "<article class='team-member'>
										<img src='{$image}' alt='Picture of {$name}'>
										<h1>{$name}</h1>
										<h2>{$role}</h2>
										{$facebook}
										{$github}
										{$linkedin}
										{$twitter}
										</article>";
			}
		}

		$result = "<section class='subtemplate team'>
						<div class='centered-content'>
							<div class='intro'>{$content}</div>
							<div class='column-container'>{$teamMemberMarkup}</div>
							<a href='{$meetTeamLink}' class='button white-blue'>Meet the Team</a>
						</div>
					</section>";

		return $result;
	}
	public function content($subtemplate,$subtemplateTitle) {

		$content = get_sub_field('content');

		$result = "<section class='subtemplate content'>
						<div class='centered-content'>
						<h1>{$subtemplateTitle}</h1>
						<div>{$content}</div>
						</div>
					</section>";

		return $result;
	}
	public function image($subtemplate,$subtemplateTitle) {

		$image = get_sub_field('image')['url'];
		$imageAlt = get_sub_field('image')['alt'];

		$result = "<section class='subtemplate image'>
						<div class='centered-content'>
						<h1>{$subtemplateTitle}</h1>
						<div><img src='{$image}' alt='{$imageAlt}'></div>
						</div>
					</section>";

		return $result;
	}
	public function faq($subtemplate,$subtemplateTitle) {
		$featuredFAQ = '<dl class="featured-faqs">';
		if (have_rows('featured_faqs')) {
			while (have_rows('featured_faqs')) {
				the_row();

				$question          = get_sub_field('question');
				$answer          = get_sub_field('answer');

				$featuredFAQ .= "<dt>{$question}</dt>
								<dd>{$answer}</dd>";
			}
		}
		$featuredFAQ .= "</dl>";

		$regularFAQ = '<dl class="regular-faqs">';
		if (have_rows('regular_faqs')) {
			while (have_rows('regular_faqs')) {
				the_row();

				$question          = get_sub_field('question');
				$answer          = get_sub_field('answer');

				$regularFAQ .= "<dt>Q: {$question}</dt>
								<dd>A: {$answer}</dd>";
			}
		}
		$regularFAQ .= "</dl>";

		$result = "<section class='subtemplate faq'>
					<div class='centered-content'>
						<h1>{$subtemplateTitle}</h1>
						{$featuredFAQ}
						{$regularFAQ}
					</div>
					</section>";

		return $result;
	}
	public function values($subtemplate,$subtemplateTitle) {
		$values = '';
		if (have_rows('ascribe_values')) {
			while (have_rows('ascribe_values')) {
				the_row();

				$title          = get_sub_field('value_title');
				$description    = get_sub_field('value_description');

				$values .= "<article class='value'>
										<h1>{$title}</h1>
										<div class='description'>{$description}</div>
									</article>";
			}
		}

		$result = "<section class='subtemplate values'><div class='centered-content'><div class='column-container'>{$values}</div></div></section>";

		return $result;
	}
	public function careers($subtemplate,$subtemplateTitle) {
		$args           = array(
			'post_type' => 'career',
			'order'     => 'ASC'
		);

		$careers = get_posts($args);
		$careerMarkup = '';
		if (!empty($careers)) {
			foreach ($careers as $career) {
				$id     = $career->ID;
				$name   = $career->post_title;
				$url    = get_permalink($id);

				$careerMarkup .= "<li class='career'><a href='{$url}'>{$name}</a></li>";
			}
		}

		$result = "<section class='subtemplate careers'>
						<div class='centered-content'>
							<h1>{$subtemplateTitle}</h1>
							<ul class='careers'>{$careerMarkup}</ul>
						</div>
					</section>";

		return $result;
	}
	public function mediaDetail($subtemplate,$subtemplateTitle) {
		$args           = array(
			'post_type' => 'presscoverage',
			'order'     => 'ASC'
		);

		$pressItems = get_posts($args);
		$pressMarkup = '';
		if (!empty($pressItems)) {
			foreach ($pressItems as $item) {
				$id     = $item->ID;
				$name   = $item->post_title;
				$url    = get_field('link_to_article',$id);
				$pubDate= get_field('date_published',$id);
				$quote  = get_field('quote',$id);

				$pressMarkup .= "<article class='press-article'>
									<h1><a href='{$url}'>{$name}</a></h1>
									<time>{$pubDate}</time>
									<blockquote>{$quote}</blockquote>
								</article>";
			}
		}

		$result = "<section class='subtemplate press-articles'>
						<div class='centered-content'>
							<h1>{$subtemplateTitle}</h1>
							<div>{$pressMarkup}</div>
						</div>
					</section>";

		return $result;
	}
	public function download($subtemplate,$subtemplateTitle) {
		$leftUrl = get_sub_field('left_button_url');
		$leftText = get_sub_field('left_button_text');
		$rightUrl = get_sub_field('right_button_url');
		$rightText = get_sub_field('right_button_text');

		$result = "<section class='subtemplate downloads'>
						<div class='centered-content'>
						<a href='{$leftUrl}' download class='left button blue'>{$leftText}</a>
						<a href='{$rightUrl}' download class='right button blue'>{$rightText}</a>
						</div>
					</section>";

		return $result;
	}
}