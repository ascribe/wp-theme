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


				switch ($subtemplateType) {
					case 'featurecirclesicons':
						$result .= $this->featureCirclesIcons($subtemplateTitle);
						break;
					case 'featurecircles':
						$result .= $this->featureCircles($subtemplateTitle);
						break;
					case 'casestudies':
						$result .= $this->caseStudies($subtemplateTitle);
						break;
					case 'slides':
						$result .= $this->slides($subtemplateTitle);
						break;
					case 'oldnew':
						$result .= $this->oldNew($subtemplateTitle);
						break;
					case 'existingnew':
						$result .= $this->existingNew($subtemplateTitle);
						break;
					case 'threecolumn':
						$result .= $this->columns($subtemplateTitle);
						break;

					case 'productoverview':
						$result .= $this->productOverview($subtemplateTitle);
						break;
					case 'getstartedfast':
						$result .= $this->startedFast($subtemplateTitle);
						break;

					case 'bluebox':
						$result .= $this->blueBox($subtemplateTitle);
						break;
					case 'createaccount':
						$result .= $this->createAccount($subtemplateTitle);
						break;
					case 'galleries':
						$result .= $this->galleries($subtemplateTitle);
						break;
					case 'blogfeatures':
						$result .= $this->blogFeatures();
						break;
					case 'mediafeature':
						$result .= $this->galleries($subtemplateTitle);
						break;
					case 'content':
						$result .= $this->content($subtemplateTitle);
						break;
					case 'contentBoxed':
						$result .= $this->contentBoxed($subtemplateTitle);
						break;
					case 'team':
						$result .= $this->team($subtemplateTitle);
						break;
					case 'pricing':
						$result .= $this->pricing($subtemplateTitle);
						break;

					case 'teamGeneral':
						$result .= $this->teamGeneral($subtemplateTitle);
						break;
					case 'image':
						$result .= $this->image($subtemplateTitle);
						break;
					case 'faq':
						$result .= $this->faq($subtemplateTitle);
						break;
					case 'values':
						$result .= $this->values($subtemplateTitle);
						break;
					case 'careers':
						$result .= $this->careers($subtemplateTitle);
						break;
					case 'mediadetail':
						$result .= $this->mediaDetail($subtemplateTitle);
						break;
					case 'download':
						$result .= $this->download($subtemplateTitle);
						break;
					case 'contact':
						$result .= $this->contactPage($subtemplateTitle);
						break;
					case 'events':
						$result .= $this->eventPage($subtemplateTitle);
						break;
				}
			}
		}

		return $result;
	}

	public function featureCirclesIcons($subtemplateTitle) {

		$featureCircles = '';
		if (have_rows('feature_circles_w_icon')) {
			while (have_rows('feature_circles_w_icon')) {
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
	public function featureCircles($subtemplateTitle) {

		$featureCircles = '';
		if (have_rows('feature_circles_w_icon')) {
			while (have_rows('feature_circles_w_icon')) {
				the_row();

				$title          = get_sub_field('title');
				$description    = get_sub_field('description');

				$featureCircles .= "<article class='surround-circle'>
										<h1>{$title}</h1>
										<div class='description'>{$description}</div>
									</article>";
			}
		}

		$result = "<section class='subtemplate feature-circles'><div class='centered-header'><div class='column-container'>{$featureCircles}</div></div></section>";

		return $result;
	}
	public function columns($subtemplateTitle) {

		$descriptiveColumns = '';
		if (have_rows('short_description')) {
			while (have_rows('short_description')) {
				the_row();

				$title          = get_sub_field('title');
				$content        = get_sub_field('content');

				$descriptiveColumns .= "<article class='short-description'>
										<h1>{$title}</h1>
										<div class='description'>{$content}</div>
									</article>";
			}
		}

		$result = "<section class='subtemplate short-descriptions'><div class='centered-content'><div class='column-container'>{$descriptiveColumns}</div></div></section>";

		return $result;
	}
	public function caseStudies($subtemplateTitle) {
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
	public function slides($subtemplateTitle) {
		$caseStudies = '';
		if (have_rows('slides')) {
			while (have_rows('slides')) {
				the_row();

				$content          = get_sub_field('content');
				$image          = get_sub_field('image')['url'];
				$imageAlt       = get_sub_field('image')['alt'];

				$caseStudies .= "<article class='case-study'>
									<div class='centered-header'>
									<img src='{$image}' alt='{$imageAlt}'>
									<div class='description'>{$content}</div>
									</div>
								</article>";
			}
		}

		$result = "<section class='subtemplate slides'><div class='slide-container'>{$caseStudies}</div><div class='slider-action' id='back'></div><div class='slider-action' id='forward'></div></section>";

		return $result;
	}
	public function oldNew($subtemplateTitle) {
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
	public function productOverview($subtemplateTitle) {

		$imageUrl       = get_sub_field('image')['url'];
		$imageAlt       = get_sub_field('image')['alt'];
		$headingSize    = get_sub_field('heading_size');

		$content    = get_sub_field('content');

		$result = "<section class='subtemplate product-overview {$headingSize}'>
						<div class='centered-prodFeat'>
							<img src='{$imageUrl}' alt='{$imageAlt}'>
							<div class='text-column'>
								<h1 class='{$headingSize}'>{$subtemplateTitle}</h1>
								<div>{$content}</div>
							</div>
						</div>
					</section>";
		return $result;
	}
	public function blueBox($subtemplateTitle) {

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
	public function createAccount($subtemplateTitle) {
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
	public function galleries($subtemplateTitle) {
		$galleryLink        = get_sub_field('gallery_page');
		$galleriesImgUrl    = get_sub_field('galleries_image')['url'];
		$galleriesImgAlt    = get_sub_field('galleries_image')['alt'];

		$galleryMarkup = '';
		if ($galleryLink) {
			$galleryMarkup = "<a href='{$galleryLink}' class='button white-blue'>Read more</a>";
		}


		$result = "<section class='subtemplate galleries-marketplaces'>
						<div class='centered-content'>
							<h1>{$subtemplateTitle}</h1>
							<img src='{$galleriesImgUrl}' alt='{$galleriesImgAlt}'>
							{$galleryMarkup}
						</div>
					</section>";

		return $result;
	}
	public function blogFeatures($page = "home") {
		$blogFeatures = '';
		if (have_rows('blog_features','option')) {
			while (have_rows('blog_features','option')) {
				the_row();

				$title          = get_sub_field('feature_title');
				$feature        = get_sub_field('post');
				$postTitle      = $feature->post_title;
				$url            = get_permalink($feature->ID);
				$content        = substr($feature->post_content, 0, 144) . '...';
				$date           = date('F Y',$feature->post_date);
				$image          = wp_get_attachment_image_src(get_post_thumbnail_id($feature->ID),'large')[0];

				if ($page == "home") {
					$blogFeatures .= "<a href='{$url}'><article class='blog'><div>
									<img src='{$image}' alt='{$postTitle} Image'>
									<h2>{$title}</h2>
									<h1>{$postTitle}</h1></div>
								</article></a>";

				}
				else {
					$blogFeatures .= "<a href='{$url}'><article class='blog'>
									<h1>{$postTitle}</h1>
									<time>{$date}</time>
									<div>{$content}</div>
								</article></a>";

				}
			}
		}

		if ($page == "home") {
			$result = "<section class='subtemplate blog-features'>
					<div class='centered-content'>
						<div class='column-container'>
						{$blogFeatures}
						</div>
					</div>
					</section>";
		}
		else {
			$result = "<section class='sidebar-blog-features'>
						{$blogFeatures}
						</section>";
		}

		return $result;
	}
	public function team($subtemplateTitle) {
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

				$themeUrl   = WPTHEME_TEMPLATE_URL . '/';

				if ($facebook) {
					$facebook = "<a href='{$facebook}' target='_blank' class='facebook'><img src='{$themeUrl}images/svg/facebook.svg' alt='Facebook' class='social-icon'></a>";
				}

				$github     = get_field('github_link',$id);
				if ($github) {
					$github = "<a href='{$github}' target='_blank' class='github'><img src='{$themeUrl}images/svg/git.svg' alt='Github' class='social-icon'></a>";
				}

				$linkedin   = get_field('linkedin_link',$id);
				if ($linkedin) {
					$linkedin = "<a href='{$linkedin}' target='_blank' class='linkedin'><img src='{$themeUrl}images/svg/linkedin.svg' alt='Linkedin' class='social-icon'></a>";
				}

				$twitter    = get_field('twitter_link',$id);
				if ($twitter) {
					$twitter = "<a href='{$twitter}' target='_blank' class='twitter'><img src='{$themeUrl}images/svg/twitter.svg' alt='Twitter' class='social-icon'></a>";
				}

				$website    = get_field('personal_website_link',$id);
				if ($website) {
					$website = "<a href='{$website}' target='_blank' class='twitter'><img src='{$themeUrl}images/svg/website.svg' alt='Website' class='social-icon'></a>";
				}

				$teamMemberMarkup .= "<article class='team-member'>
										<img src='{$image}' alt='Picture of {$name}'>
										<h1>{$name}</h1>
										<h2>{$role}</h2>
										{$facebook}
										{$github}
										{$linkedin}
										{$twitter}
										{$website}
										</article>";
			}
		}

		$result = "<section class='subtemplate team tour-page'>
						<div class='centered-content'>
							<div class='intro'>{$content}</div>
							<div class='column-container'>{$teamMemberMarkup}</div>
							<a href='{$meetTeamLink}' class='button white-blue'>Meet the Team</a>
						</div>
					</section>";

		return $result;
	}
	public function teamGeneral($subtemplateTitle) {
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

				$themeUrl   = WPTHEME_TEMPLATE_URL . '/';

				if ($facebook) {
					$facebook = "<a href='{$facebook}' target='_blank' class='facebook'><img src='{$themeUrl}images/svg/facebook.svg' alt='Facebook' class='social-icon'></a>";
				}

				$github     = get_field('github_link',$id);
				if ($github) {
					$github = "<a href='{$github}' target='_blank' class='github'><img src='{$themeUrl}images/svg/git.svg' alt='Github' class='social-icon'></a>";
				}

				$linkedin   = get_field('linkedin_link',$id);
				if ($linkedin) {
					$linkedin = "<a href='{$linkedin}' target='_blank' class='linkedin'><img src='{$themeUrl}images/svg/linkedin.svg' alt='Linkedin' class='social-icon'></a>";
				}

				$twitter    = get_field('twitter_link',$id);
				if ($twitter) {
					$twitter = "<a href='{$twitter}' target='_blank' class='twitter'><img src='{$themeUrl}images/svg/twitter.svg' alt='Twitter' class='social-icon'></a>";
				}

				$website    = get_field('personal_website_link',$id);
				if ($website) {
					$website = "<a href='{$website}' target='_blank' class='twitter'><img src='{$themeUrl}images/svg/website.svg' alt='Website' class='social-icon'></a>";
				}

				$teamMemberMarkup .= "<article class='team-member'>
										<img src='{$image}' alt='Picture of {$name}'>
										<h1>{$name}</h1>
										<h2>{$role}</h2>
										{$facebook}
										{$github}
										{$linkedin}
										{$twitter}
										{$website}
										</article>";
			}
		}

		$result = "<section class='subtemplate team'>
						<div class='centered-content-padding'>
						<div class='centered-content'>
							<div class='intro'>{$content}</div>
							<div class='column-container'>{$teamMemberMarkup}</div>
						</div>
						</div>
					</section>";

		return $result;
	}
	public function content($subtemplateTitle) {

		$content = get_sub_field('content');

		$result = "<section class='subtemplate content'>
						<div class='centered-content-padding'>
						<div class='centered-content'>
						<h1>{$subtemplateTitle}</h1>
						<div>{$content}</div>
						</div>
						</div>
					</section>";

		return $result;
	}
	public function contentBoxed($subtemplateTitle) {

		$content = get_sub_field('content');

		$result = "<section class='subtemplate content-boxed'>
						<div class='centered-content-padding'>
						<div class='centered-content'>
						<h1>{$subtemplateTitle}</h1>
						<div>{$content}</div>
						</div>
						</div>
					</section>";

		return $result;
	}
	public function image($subtemplateTitle) {

		$image = get_sub_field('image')['url'];
		$imageAlt = get_sub_field('image')['alt'];

		$result = "<section class='subtemplate image'>
						<div class='centered-content-padding'>
						<div class='centered-content'>
						<h1>{$subtemplateTitle}</h1>
						<div><img src='{$image}' alt='{$imageAlt}'></div>
						</div>
						</div>
					</section>";

		return $result;
	}
	public function faq($subtemplateTitle) {
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
					<div class='centered-content-padding'>
					<div class='centered-content'>
						<h1>{$subtemplateTitle}</h1>
						{$featuredFAQ}
						{$regularFAQ}
						</div>
					</div>
					</section>";

		return $result;
	}
	public function values($subtemplateTitle) {
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

		$result = "<section class='subtemplate values'><div class='centered-content-padding'><div class='centered-content'>
					<h1>{$subtemplateTitle}</h1>
					<div class='column-container'>{$values}</div>
					</div></div></section>";

		return $result;
	}
	public function careers($subtemplateTitle) {
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
							<ul>{$careerMarkup}</ul>
						</div>
					</section>";

		return $result;
	}
	public function mediaDetail($subtemplateTitle) {
		$image = get_sub_field('image')['url'];

		$args           = array(
			'post_type' => 'presscoverage',
			'order'     => 'ASC',
			'posts_per_page' => 50
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
						<div class='centered-content-padding'>
						<div class='centered-content'>
							<h1>{$subtemplateTitle}</h1>
							<img src='{$image}' alt='Media Companies'>
							<div>{$pressMarkup}</div>
							<!--<a href='#' id='more-articles' class='button blue'>Show More</a>-->
							</div>
						</div>
					</section>";

		return $result;
	}
	public function download($subtemplateTitle) {
		$leftUrl = get_sub_field('left_button_url');
		$leftText = get_sub_field('left_button_text');
		$rightUrl = get_sub_field('right_button_url');
		$rightText = get_sub_field('right_button_text');

		$result = "<section class='subtemplate downloads'>
						<div class='centered-content-padding'>
						<div class='centered-content'>
						<a href='{$leftUrl}' download class='left button blue'>{$leftText}</a>
						<a href='{$rightUrl}' download class='right button blue'>{$rightText}</a>
						</div>
						</div>
					</section>";

		return $result;
	}
	public function contactPage($subtemplateTitle) {
		$contactPoints  = '';

		$content        = get_sub_field('content');

		if (have_rows('contact_point')) {
			while (have_rows('contact_point')) {
				the_row();

				$title          = get_sub_field('contact_description');
				$contactInfo    = get_sub_field('contact_details');

				$contactPoints .= "<article class='contact-point'>
									<h1>{$title}</h1>
									<div>{$contactInfo}</div>
								</article>";
			}
		}

		$result = "<section class='subtemplate contact'>
					<div class='centered-content-padding'>
					<div class='centered-content'>
					<h1>{$subtemplateTitle}</h1>
						<div class='column-container'>
						<div class='form'>{$content}</div>
						<aside class='contact-points'>{$contactPoints}</aside>
						</div>
					</div>
					</div>
					</section>";

		return $result;
	}
	public function eventPage($subtemplateTitle) {

		$today = date('Ymd');
		$args           = array(
			'post_type' => 'event',
			'order'     => 'ASC',
			'orderby'   => 'meta_value',
			'meta_key'  => 'date',
			'posts_per_page' => 20,
			'meta_query' => array(
				array(
					'key' => 'date',
					'value' => $today, //array
					'compare' => '>=',
				)
			)
		);

		$futureEvents = get_posts($args);
		$futureMarkup = '';
		$dateInLoop = '';
		$lastDate = '';
		if (!empty($futureEvents)) {
			foreach ($futureEvents as $item) {
				$id     = $item->ID;
				$name   = $item->post_title;
				$url    = get_field('link_to_event',$id);
				$pubDate= get_field('date',$id);
				$quote  = get_field('description',$id);

				$dateInLoop = date_create_from_format('F j, Y', $pubDate);
				$dateInLoop = date_format($dateInLoop, 'F Y');
				$header = '';
				if ($dateInLoop !== $lastDate) {
					$header = "<h2><span>{$dateInLoop}</span></h2>";
				}

				$futureMarkup .= "{$header}
									<article class='event'>
									<h1><a href='{$url}'>{$name}</a></h1>
									<time>{$pubDate}</time>
									<blockquote>{$quote}</blockquote>
								</article>";

				$lastDate = $dateInLoop;
			}
		}

		$args           = array(
			'post_type' => 'event',
			'order'     => 'DESC',
			'orderby'   => 'meta_value',
			'meta_key'  => 'date',
			'posts_per_page' => 10,
			'meta_query' => array(
				array(
					'key' => 'date',
					'value' => $today, //array
					'compare' => '<',
				)
			)
		);

		$pastEvents = get_posts($args);
		$pastMarkup = '';
		$lastDate = '';
		if (!empty($pastEvents)) {
			foreach ($pastEvents as $item) {
				$id     = $item->ID;
				$name   = $item->post_title;
				$url    = get_field('link_to_event',$id);
				$pubDate= get_field('date',$id);
				$quote  = get_field('description',$id);

				$dateInLoop = date_create_from_format('F j, Y', $pubDate);
				$dateInLoop = date_format($dateInLoop, 'F Y');
				$header = '';
				if ($dateInLoop !== $lastDate) {

					$header = "<h2><span>{$dateInLoop}</span></h2>";
				}

				$pastMarkup .= "{$header}
									<article class='event'>
									<h1><a href='{$url}'>{$name}</a></h1>
									<time>{$pubDate}</time>
									<blockquote>{$quote}</blockquote>
								</article>";

				$lastDate = $dateInLoop;
			}
		}

		$result = "<section class='subtemplate upcoming-events'>
						<div class='centered-content-padding'>
						<div class='centered-content'>
							<h1>Upcoming Events</h1>
							<div>{$futureMarkup}</div>
						</div>
						</div>
					</section>
					<div class='chevron-divider'></div>
					<section class='subtemplate past-events'>
						<div class='centered-content-padding'>
						<div class='centered-content' id='content'>
							<h1>Past Events</h1>
							<div>{$pastMarkup}</div>
						</div>
						</div>
					</section>";

		return $result;
	}
	public function existingNew($subtemplateTitle) {

		$existing   = get_sub_field('existing_marketplace_content');
		$new        = get_sub_field('new_marketplace_content');

		$result = "<section class='subtemplate existing-new'>
						<div class='centered-content'>
						<h1>{$subtemplateTitle}</h1>
						<div id='existing-tab'>Existing Marketplace</div>
						<div id='new-tab'>New Marketplace</div>
						<div id='existing'>{$existing}</div>
						<div id='new'>{$new}</div>
						</div>
					</section>";

		return $result;
	}
	public function startedFast($subtemplateTitle) {

		$content   = get_sub_field('content');
		$apiImg    = get_sub_field('api_image')['url'];
		$whiteImg  = get_sub_field('white_label_marketplace_image')['url'];

		$result = "<section class='subtemplate get-started'>
						<div class='centered-content'>
						<h1>{$subtemplateTitle}</h1>
						<div class='description'>{$content}</div>
						<div class='api'>
							<h1>API</h1>
							<img src='{$apiImg}' alt='API'>
						</div>
						<div class='white-label'>
							<h1>White Label Marketplace</h1>
							<img src='{$whiteImg}' alt='White Label Marketplace'>
						</div>
						</div>
					</section>";

		return $result;
	}
	public function pricing($subtemplateTitle) {

		$bgImg      = get_sub_field('background_image')['url'];
		$rightPricing   = get_sub_field('right_pricing_text');
		$leftPricing    = get_sub_field('left_pricing_text');

		$result = "<section class='subtemplate pricing' style='background-image:url({$bgImg})'>
						<div class='centered-content'>
						<h1>{$subtemplateTitle}</h1>
							<div class='left-pricing'>{$leftPricing}</div>
							<div class='right-pricing'>{$rightPricing}</div>
						</div>
					</section>";

		return $result;
	}
}