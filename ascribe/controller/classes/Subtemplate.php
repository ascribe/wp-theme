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
                    case 'calltoaction':
                        $result .= $this->callToAction($subtemplateTitle);
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
                    case 'testimonials':
                        $result .= $this->testimonials($subtemplateTitle);
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

                $featureCircles .= "<article class='grid__col feature-circle'>
                                        <img class='feature-circle__image' src='{$icon}' alt='{$title} Icon'>
                                        <h1 class='feature-circle__title'>{$title}</h1>
                                        <div class='feature-circle__description'>{$description}</div>
                                    </article>";
            }
        }

        $result = "<section class='subtemplate feature-circles row'><div class='grid grid--gutters grid--full grid-small--half grid-medium--third'>{$featureCircles}</div></section>";

        return $result;
    }
    public function featureCircles($subtemplateTitle) {

        $featureCircles = '';
        if (have_rows('feature_circles_w_icon')) {
            while (have_rows('feature_circles_w_icon')) {
                the_row();

                $title          = get_sub_field('title');
                $description    = get_sub_field('description');

                $featureCircles .= "<article class='grid__col surround-circle'>
                                    <div class='circle'>
                                    <div class='container'>
                                    <div class='wrapper'>
                                    <div class='inner'>
                                        <h1 class='feature-circle__title'>{$title}</h1>
                                        <div class='feature-circle__description'>{$description}</div>
                                    </div>
                                    </div>
                                    </div>
                                    </div>
                                    </article>";
            }
        }

        $result = "<section class='subtemplate feature-circles row'><div class='grid grid--gutters grid--full grid-small--third'>{$featureCircles}</div></section>";

        return $result;
    }
    public function columns($subtemplateTitle) {

        $descriptiveColumns = '';
        $content        = get_sub_field('content');

        if (have_rows('short_description')) {
            while (have_rows('short_description')) {
                the_row();

                $colTitle          = get_sub_field('title');
                $colContent        = get_sub_field('content');

                $descriptiveColumns .= "<article class='grid__col short-description'>
                                            <h1 class='short-description__title'>{$colTitle}</h1>
                                            <div class='short-description__description'>{$colContent}</div>
                                        </article>";
            }
        }

        $result = "<section class='subtemplate short-descriptions'>
                        <div class='row'>
                            <h1 class='subtemplate__title'>{$subtemplateTitle}</h1>
                            <div class='subtemplate__description'>{$content}</div>
                            <div class='grid grid--gutters grid--full grid-small--half grid-medium--third'>{$descriptiveColumns}</div>
                        </div>
                   </section>";

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

        $result = "<section class='subtemplate case-studies'><div class='slide-container'>{$caseStudies}</div><div class='slider-action' id='back'><span></span></div><div class='slider-action' id='forward'><span></span></div></section>";

        return $result;
    }
    public function slides($subtemplateTitle) {
        $caseStudies = '';
        if (have_rows('slides')) {
            while (have_rows('slides')) {
                the_row();

                $content        = get_sub_field('content');
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

        $result = "<section class='subtemplate slides case-studies'><div class='slide-container'>{$caseStudies}</div><div class='slider-action' id='back'></div><div class='slider-action' id='forward'></div></section>";

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
                    <div class='row'>
                        <h1 class='subtemplate__title'>{$subtemplateTitle}</h1>
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

        $result = "<section class='subtemplate product-overview'>
                        <div class='row'>
                            <article class='grid grid--gutters grid--full grid-small--half'>
                                <figure class='grid__col grid__col--center'>
                                    <img src='{$imageUrl}' alt='{$imageAlt}'>
                                </figure>

                                <div class='grid__col grid__col--center text-column'>
                                    <h1 class='{$headingSize}'>{$subtemplateTitle}</h1>
                                    <div>{$content}</div>
                                </div>
                            </article>
                        </div>
                    </section>";
        return $result;
    }
    public function blueBox($subtemplateTitle) {

        $content        = get_sub_field('content');
        $blueBoxCtaText = get_sub_field('bluebox_cta_text');
        $blueBoxCtaLink = get_sub_field('bluebox_cta_link');

        $result = "<section class='subtemplate blue-box'>
                        <div class='row row--content'>
                            <article class='blue-copy'>
                                <h1>{$subtemplateTitle}</h1>
                                <div>{$content}</div>
                                <a href='{$blueBoxCtaLink}' class='button pink-overPic'>{$blueBoxCtaText}</a>
                            </article>
                        </div>
                    </section>";

        return $result;
    }
    public function callToAction($subtemplateTitle) {

        if ($subtemplateTitle) {
            $ctaTitle = "<h1 class='cta__title'>$subtemplateTitle</h1>";
        }
        $ctaText        = get_sub_field('cta_button_text');
        $ctaLink        = get_sub_field('cta_button_link');
        $backgroundImg  = get_sub_field('image')['url'];


        $result = "<section class='subtemplate cta' style='background-image: url({$backgroundImg})'>
                        <div class='cta__container'>
                            {$ctaTitle}
                            <a href='{$ctaLink}' class='cta__button button blue-overPic'>{$ctaText}</a>
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
                        <div class='row'>
                            <h1 class='subtemplate__title'>{$subtemplateTitle}</h1>
                            <img src='{$galleriesImgUrl}' alt='{$galleriesImgAlt}'>
                            {$galleryMarkup}
                        </div>
                    </section>";

        return $result;
    }


    //
    // Subtemplate: Featured Blog Posts
    //
    public function blogFeatures() {

        $blogFeatures     = '';
        $subtemplateTitle = get_sub_field('section_title');
        $blogPage         = get_page_by_title('Blog');
        $blogUrl          = get_permalink($blogPage->ID);

        if (have_rows('blog_features', 'option')) {
            while (have_rows('blog_features', 'option')) {
                the_row();
                $feature   = get_sub_field('post');
                $postTitle = $feature->post_title;
                $url       = get_permalink($feature->ID);
                $content   = substr($feature->post_content, 0, 144) . '...';
                $date      = date('F Y', strtotime($feature->post_date));
                $image     = wp_get_attachment_image_src(get_post_thumbnail_id($feature->ID),'blog-feature-crop')[0];

                $blogFeatures .= "<div class='grid__col'>
                                    <a href='{$url}'>
                                        <article class='featured'>
                                            <img class='featured__image' src='{$image}' alt='{$postTitle} Image'>
                                            <h1 class='featured__title'>{$postTitle}</h1>
                                        </article>
                                    </a>
                                </div>";

            }
        } else {

            $latestPosts = wp_get_recent_posts(array( 'numberposts' => '3', 'post_status' => 'publish', ));

            foreach( $latestPosts as $latest ) {
                $postTitle = $latest['post_title'];
                $url       = get_permalink($latest['ID']);
                $content   = substr($latest['post_content'], 0, 144) . '...';
                $date      = date('F Y', strtotime($latest['post_date']));
                $image     = wp_get_attachment_image_src(get_post_thumbnail_id($latest['ID']),'blog-feature-crop')[0];

                $blogFeatures .= "<div class='grid__col'>
                                    <a href='{$url}'>
                                        <article class='featured'>
                                            <img class='featured__image' src='{$image}' alt='{$postTitle} Image'>
                                            <h1 class='featured__title'>{$postTitle}</h1>
                                        </article>
                                    </a>
                                </div>";
            }
        }

        $result = "<section class='subtemplate row subtemplate--featured'>
                        <h1 class='subtemplate__title'>{$subtemplateTitle}</h1>
                        <div class='grid grid--gutters grid--full grid-mini--half grid-small--fit'>
                            {$blogFeatures}
                        </div>
                        <p class='subtemplate--featured--more'><a class='button small white-blue' href='{$blogUrl}'>Go to Blog</a></p>
                </section>";

        return $result;
    }


    //
    // Subtemplate: Team
    //
    public function team($subtemplateTitle) {
        $content        = get_sub_field('content');
        $meetTeamLink   = get_sub_field('meet_the_team_link');
        $numberOfPeople = get_sub_field('number_of_people_to_display');

        $args           = array(
            'post_type' => 'team',
            'order'     => 'DESC',
            'posts_per_page' => $numberOfPeople
        );

        $teamMembers = get_posts($args);
        $teamMemberMarkup = '';
        if (!empty($teamMembers)) {
            foreach ($teamMembers as $teamMember) {
                $id     = $teamMember->ID;
                $name   = $teamMember->post_title;
                $role   = get_field('role',$id);
                $image  = get_field('image',$id)['url'];
                $hoverimage  = get_field('hover_image',$id)['url'];
                if (!$hoverimage) {
                    $hoverimage = $image;
                }
                $facebook   = get_field('facebook_link',$id);

                $themeUrl   = WPTHEME_TEMPLATE_URL . '/';

                if ($facebook) {
                    $facebookIcon = '<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Layer_1" x="0px" y="0px" viewBox="0 0 24 24" style="enable-background:new 0 0 24 24;" xml:space="preserve" class="social-icon replaced-svg">
<path d="M17.502747,3.688797H6.498352c-1.513306,0-2.751221,1.237915-2.751221,2.75122v11.003296  c0,1.514038,1.237915,2.751221,2.751221,2.751221h6.271484v-6.535889h-2.172913v-2.698975h2.172913V9.601334  c0-1.9469,1.461792-3.530945,3.259399-3.530945h2.172974v2.69043h-2.172974c-0.256165,0-0.54303,0.348633-0.54303,0.814941v1.383911  h2.716003v2.698975h-2.716003v6.535889h2.016541c1.513,0,2.750122-1.237183,2.750122-2.751221V6.440017  C20.252869,4.926712,19.015747,3.688797,17.502747,3.688797z"></path>
</svg>';
                    $facebook = "<a href='{$facebook}' target='_blank' class='facebook'>{$facebookIcon}</a>";
                }

                $github     = get_field('github_link',$id);
                if ($github) {
                    $gitIcon = '<svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
     viewBox="0 0 24 24" style="enable-background:new 0 0 24 24;" xml:space="preserve" class="social-icon">
<path d="M12,2.675904c-5.246338,0-9.5,4.253662-9.5,9.5c0,4.197998,2.72175,7.758179,6.497035,9.01409
    c0.474889,0.086985,0.648264-0.206421,0.648264-0.456909c0-0.226143-0.008702-0.975271-0.013341-1.768484
    C6.990234,19.538626,6.43185,17.84436,6.43185,17.84436c-0.432547-1.097046-1.054723-1.389282-1.054723-1.389282
    c-0.863368-0.589111,0.065498-0.577515,0.065498-0.577515c0.953823,0.066092,1.455986,0.97876,1.455986,0.97876
    c0.847726,1.451904,2.224244,1.032104,2.764649,0.788574c0.086353-0.612305,0.332203-1.032104,0.603027-1.268677
    C8.157435,16.136179,5.939,15.320923,5.939,11.680717c0-1.037912,0.370518-1.884452,0.977015-2.549525
    C6.819179,8.88998,6.492153,7.923392,7.009939,6.61588c0,0,0.796701-0.255127,2.612722,0.974121
    c0.757255-0.211635,1.569615-0.316005,2.377319-0.319493c0.80713,0.003488,1.620047,0.109009,2.378489,0.320643
    c1.81257-1.230398,2.610421-0.974121,2.610421-0.974121c0.519531,1.308681,0.192505,2.2741,0.095093,2.514161
    c0.608816,0.665073,0.97644,1.511631,0.97644,2.549525c0,3.649484-2.221924,4.453124-4.338308,4.688546
    c0.342111,0.294556,0.644775,0.87207,0.644775,1.758057c0,1.269846-0.012766,2.293823-0.012766,2.606934
    c0,0.252808,0.172782,0.548513,0.654053,0.45574C18.780588,19.931763,21.5,16.371582,21.5,12.175903
    C21.5,6.929566,17.246338,2.675904,12,2.675904z"/>
</svg>
';
                    $github = "<a href='{$github}' target='_blank' class='github'>{$gitIcon}</a>";
                }

                $linkedin   = get_field('linkedin_link',$id);
                if ($linkedin) {
                    $linkedIcon = '<svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
     viewBox="0 0 24 24" style="enable-background:new 0 0 24 24;" xml:space="preserve" class="social-icon">
<g>
    <rect x="5.017809" y="8.190847" width="3.427236" height="11.995403"/>
    <path d="M18.100838,8.8747c-1.275997-0.716306-3.158699-0.776488-4.514939-0.15739V8.190847h-3.427236v11.995403h3.427236
        v-7.671779l1.41224-0.679668c0.346379-0.166374,1.10544-0.151271,1.426956,0.02951
        c0.242357,0.135392,0.588039,0.696245,0.588039,1.039294v7.282643h3.427237v-7.282643
        C20.440371,11.328789,19.456303,9.633682,18.100838,8.8747z"/>
    <circle cx="6.731427" cy="4.763844" r="2.141945"/>
</g>
</svg>
';
                    $linkedin = "<a href='{$linkedin}' target='_blank' class='linkedin'>{$linkedIcon}</a>";
                }

                $twitter    = get_field('twitter_link',$id);
                if ($twitter) {
                    $twitIcon = '<svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
     viewBox="0 0 24 24" style="enable-background:new 0 0 24 24;" xml:space="preserve" class="social-icon">
<path d="M22.021578,5.726143c-0.737148,0.32688-1.530106,0.548534-2.361347,0.647079
    c0.849844-0.508886,1.501448-1.314126,1.80793-2.274726c-0.794682,0.471035-1.67498,0.813644-2.611732,0.997087
    c-0.749146-0.79856-1.818058-1.297966-3.00103-1.297966c-2.270847,0-4.111745,1.841544-4.111745,4.111745
    c0,0.322642,0.035769,0.636161,0.106231,0.936753c-3.418051-0.171879-6.44781-1.807929-8.476029-4.296983
    C3.02004,5.158,2.817276,5.864336,2.817276,6.617646c0,1.425673,0.725657,2.684709,1.828974,3.422288
    c-0.673368-0.020685-1.307806-0.206571-1.86223-0.513483c0,0.016879,0,0.03541,0,0.050853
    c0,1.993814,1.416838,3.654788,3.298388,4.032162c-0.344693,0.096103-0.708419,0.144873-1.083637,0.144873
    c-0.264822,0-0.522605-0.024565-0.773349-0.073334c0.522892,1.633608,2.041148,2.8229,3.841321,2.854791
    c-1.407716,1.10339-3.180954,1.760237-5.107755,1.760237c-0.332123,0-0.659362-0.018244-0.980567-0.056814
    c1.819852,1.165447,3.981596,1.8465,6.304014,1.8465c7.563841,0,11.699073-6.265157,11.699073-11.699072
    c0-0.179564-0.00388-0.357046-0.011206-0.531655C20.774107,7.274566,21.47168,6.550345,22.021578,5.726143z"/>
</svg>';
                    $twitter = "<a href='{$twitter}' target='_blank' class='twitter'>{$twitIcon}</a>";
                }

                $website    = get_field('personal_website_link',$id);
                if ($website) {
                    $webIcon = '<svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
     viewBox="0 0 24 24" style="enable-background:new 0 0 24 24;" xml:space="preserve">
<path d="M11.585175,2.610985c-5.153222,0-9.330716,4.177494-9.330716,9.330647c0,5.153222,4.177494,9.330716,9.330716,9.330716
    c5.153154,0,9.330647-4.177494,9.330647-9.330716C20.915821,6.788479,16.738329,2.610985,11.585175,2.610985z M7.504134,13.917454
    H6.899088L6.33973,12.170231c-0.129035-0.408097-0.23461-0.771125-0.325366-1.202065H5.999546
    c-0.091374,0.43835-0.204357,0.816195-0.333392,1.210092l-0.589611,1.739197H4.471498l-1.104517-3.660525h0.680985
    l0.484036,1.860824c0.105574,0.408097,0.204357,0.786559,0.27227,1.164404h0.022843
    c0.083348-0.370436,0.204358-0.763716,0.325366-1.156995l0.597019-1.868233h0.559976l0.566767,1.829954
    c0.136444,0.438967,0.242018,0.824838,0.325366,1.195273h0.022843c0.060504-0.370436,0.15867-0.756307,0.279679-1.187247
    l0.521698-1.83798h0.658141L7.504134,13.917454z M13.155752,13.917454h-0.605045l-0.559359-1.747223
    c-0.129035-0.408097-0.23461-0.771125-0.325366-1.202065h-0.014818c-0.091373,0.43835-0.204357,0.816195-0.333392,1.210092
    l-0.58961,1.739197h-0.605045L9.0186,10.256928h0.680984l0.484036,1.860824c0.105575,0.408097,0.204357,0.786559,0.27227,1.164404
    h0.022844c0.083347-0.370436,0.204357-0.763716,0.325366-1.156995l0.597019-1.868233h0.559976l0.566767,1.829954
    c0.136444,0.438967,0.242019,0.824838,0.325367,1.195273h0.022843c0.060505-0.370436,0.15867-0.756307,0.279679-1.187247
    l0.521697-1.83798h0.658141L13.155752,13.917454z M18.807371,13.917454h-0.605045l-0.559359-1.747223
    c-0.129036-0.408097-0.23461-0.771125-0.325367-1.202065h-0.014818c-0.091373,0.43835-0.204357,0.816195-0.333391,1.210092
    l-0.589611,1.739197h-0.605045l-1.104517-3.660525h0.680985l0.484036,1.860824
    c0.105574,0.408097,0.204357,0.786559,0.27227,1.164404h0.022842c0.083349-0.370436,0.204359-0.763716,0.325367-1.156995
    l0.597019-1.868233h0.559977l0.566767,1.829954c0.136444,0.438967,0.242018,0.824838,0.325367,1.195273h0.022842
    c0.060505-0.370436,0.15867-0.756307,0.27968-1.187247l0.521696-1.83798h0.658142L18.807371,13.917454z"/>
</svg>';
                    $website = "<a href='{$website}' target='_blank' class='twitter'>{$webIcon}</a>";
                }

                $teamMemberMarkup .= "<article class='grid__col team-member'>
                                        <img class='team-member__image' src='{$image}' alt='Picture of {$name}' data-hover='{$hoverimage}' data-regular='{$image}'>
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

        $result = "<section class='subtemplate team tour-page content'>
                        <div class='row row--content'>
                            <h1 class='subtemplate__title'>{$subtemplateTitle}</h1>
                            <div class='intro'>{$content}</div>
                            <div class='grid grid--gutters grid--full grid-small--half grid-medium--third'>{$teamMemberMarkup}</div>
                            <a href='{$meetTeamLink}' class='button white-blue'>Meet the Team</a>
                        </div>
                    </section>";

        return $result;
    }
    public function teamGeneral($subtemplateTitle) {
        $content        = get_sub_field('content');

        $args           = array(
            'post_type' => 'team',
            'order'     => 'DESC',
            'posts_per_page' => -1
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

                $teamMemberMarkup .= "<article class='grid__col team-member'>
                                        <img class='team-member__image' src='{$image}' alt='Picture of {$name}'>
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

        $result = "<section class='subtemplate row row--content team'>
                        <h1 class='subtemplate__title'>{$subtemplateTitle}</h1>
                        <div class='intro'>{$content}</div>
                        <div class='grid grid--gutters grid--full grid-small--half grid-medium--third'>{$teamMemberMarkup}</div>
                    </section>";

        return $result;
    }
    public function content($subtemplateTitle) {

        $content = get_sub_field('content');

        $bgColor        = get_sub_field('background_color');

        $result = "<section class='subtemplate row row--content content {$bgColor}'>
                        <h1 class='subtemplate__title'>{$subtemplateTitle}</h1>
                        <div>{$content}</div>
                    </section>";

        return $result;
    }
    public function contentBoxed($subtemplateTitle) {

        $content = get_sub_field('content');

        $result = "<section class='subtemplate row row--content content-boxed'>
                        <h1 class='subtemplate__title'>{$subtemplateTitle}</h1>
                        <div>{$content}</div>
                    </section>";

        return $result;
    }
    public function image($subtemplateTitle) {

        $image    = get_sub_field('image')['url'];
        $imageAlt = get_sub_field('image')['alt'];

        $result = "<section class='subtemplate image'>
                        <div class='row'>
                            <h1 class='subtemplate__title'>{$subtemplateTitle}</h1>
                            <div><img src='{$image}' alt='{$imageAlt}'></div>
                        </div>
                    </section>";

        return $result;
    }


    //
    // Subtemplate: FAQs
    //
    public function faq($subtemplateTitle) {

        $featuredFAQ = '';
        $regularFAQ  = '';

        if (have_rows('featured_faqs')) {

            $featuredFAQ = '<dl class="faq faq--featured">';

            while (have_rows('featured_faqs')) {
                the_row();

                $question     = get_sub_field('question');
                $answer       = get_sub_field('answer');

                $featuredFAQ .= "<dt class='faq__question'><i class='caret'></i> {$question}</dt>
                                <dd class='faq__answer'>{$answer}</dd>";
            }

            $featuredFAQ .= "</dl>";
        }

        if (have_rows('regular_faqs')) {

            $regularFAQ = '<dl class="faq faq--regular">';

            while (have_rows('regular_faqs')) {
                the_row();

                $question    = get_sub_field('question');
                $answer      = get_sub_field('answer');

                $regularFAQ .= "<dt class='faq__question'><i class='caret'></i> {$question}</dt>
                                <dd class='faq__answer'>{$answer}</dd>";
            }

            $regularFAQ .= "</dl>";
        }

        // create ID for section jumps from lowercased & sanitized title
        $subtemplateTitleID = strtolower(sanitize_html_class($subtemplateTitle));

        $result = "<section class='section-faq'>
                        <h1 class='faq__title' id='{$subtemplateTitleID}'>{$subtemplateTitle}</h1>
                        {$featuredFAQ}
                        {$regularFAQ}
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

                $values .= "<article class='grid__col value'>
                                <h1>{$title}</h1>
                                <div class='description'>{$description}</div>
                            </article>";
            }
        }

        $result = "<section class='subtemplate row values'>
                        <h1 class='subtemplate__title'>{$subtemplateTitle}</h1>
                        <main><div class='grid grid--gutters grid--full grid-small--half'>{$values}</div></main>
                    </section>";

        return $result;
    }


    public function careers($subtemplateTitle) {
        $args           = array(
            'post_type' => 'career',
            'order'     => 'ASC'
        );

        $careers      = get_posts($args);
        $careerMarkup = '';

        if (!empty($careers)) {
            foreach ($careers as $career) {
                $id   = $career->ID;
                $name = $career->post_title;
                $url  = get_permalink($id);

                $careerMarkup .= "<li class='career'><a href='{$url}'>{$name}</a></li>";
            }
        } else {
            $careerMarkup .= get_sub_field('empty_text');
        }

        $result = "<section class='subtemplate row row--content careers'>
                        <h1 class='subtemplate__title'>{$subtemplateTitle}</h1>
                        <ul>{$careerMarkup}</ul>
                    </section>";

        return $result;
    }


    public function mediaDetail($subtemplateTitle) {
        $image = get_sub_field('image')['url'];

        $args           = array(
            'post_type' => 'presscoverage',
            'order'     => 'DESC',
            'meta_key'	=> 'date_published',
            'orderby'	=> 'meta_value_num',
            'posts_per_page' => -1
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

        $result = "<section class='subtemplate row row--content press-articles '>
                        <h1 class='subtemplate__title'>{$subtemplateTitle}</h1>
                        <img src='{$image}' alt='Media Companies'>
                        <div>{$pressMarkup}</div>
                        <!--<a href='#' id='more-articles' class='button blue'>Show More</a>-->
                    </section>";

        return $result;
    }
    public function download($subtemplateTitle) {
        $buttonUrl  = get_sub_field('button_url');
        $buttonText = get_sub_field('button_text');

        $result = "<section class='subtemplate row downloads'>
                        <a href='{$buttonUrl}' download class='button blue'>{$buttonText}</a>
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
                $contactInfo    = make_clickable(get_sub_field('contact_details'));

                $contactPoints .= "<article class='contact-point'>
                                    <h1>{$title}</h1>
                                    <div>{$contactInfo}</div>
                                </article>";
            }
        }

        $result = "<section class='subtemplate row row--content contact'>
                        <h1 class='subtemplate__title'>{$subtemplateTitle}</h1>

                        <div class='grid grid--gutters grid--fit grid-small--half'>
                            <div class='grid__col form'>{$content}</div>
                            <aside class='grid__col contact-points'>{$contactPoints}</aside>
                        </div>
                    </section>";

        return $result;
    }
    public function eventPage($subtemplateTitle) {

        $datePage = get_query_var('date');

        if (empty($datePage)) {
            return $this->mainEventPage($subtemplateTitle);
        }
        else {

            if (!preg_match('/2\d{7}$|all/',$datePage)) {
                return $this->mainEventPage($subtemplateTitle);
            }

            $args = '';
            if ($datePage === 'all') {
                $args           = array(
                    'post_type' => 'event',
                    'order'     => 'DESC',
                    'orderby'   => 'meta_value',
                    'meta_key'  => 'date',
                    'posts_per_page' => -1
                );
            }
            else {
                $firstOfMonth   = DateTime::createFromFormat('Ymd',$datePage);
                $month          = $firstOfMonth->format('m');
                $year           = $firstOfMonth->format('Y');
                $daysInMonth    = cal_days_in_month(CAL_GREGORIAN,$month,$year);
                $startDate      = $year.$month.'01';
                $endDate        = $year.$month.$daysInMonth;

                $args           = array(
                    'post_type' => 'event',
                    'order'     => 'ASC',
                    'orderby'   => 'meta_value',
                    'meta_key'  => 'date',
                    'posts_per_page' => -1,
                    'meta_query' => array(
                        array(
                            'key' => 'date',
                            'value' => $startDate,
                            'compare' => '>=',
                        ),
                        array(
                            'key' => 'date',
                            'value' => $endDate,
                            'compare' => '<='
                        )
                    )
                );
            }



            $events = get_posts($args);
            $eventMarkup = '';
            $dateInLoop = '';
            $lastDate = '';
            if (!empty($events)) {
                foreach ($events as $item) {
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

                    $eventMarkup .= "{$header}
                                    <article class='event'>
                                    <h1><a href='{$url}'>{$name}</a></h1>
                                    <time>{$pubDate}</time>
                                    <blockquote>{$quote}</blockquote>
                                </article>";

                    $lastDate = $dateInLoop;
                }
            }
            else {
                $eventMarkup = "<p>There are no events for this time period</p>";
            }

            $sidebar = $this->eventSidebar();

            $result = "<section class='subtemplate row upcoming-events'>
                        <div class='row'>
                            <div class='event-container'>
                                <h1>Events</h1>
                                <div>{$eventMarkup}</div>
                            </div>
                            {$sidebar}
                        </div>
                    </section>";

            return $result;
        }



    }
    public function existingNew($subtemplateTitle) {

        $existing   = get_sub_field('existing_marketplace_content');
        $new        = get_sub_field('new_marketplace_content');

        $result = "<section class='subtemplate existing-new'>
                        <div class='row'>
                            <h1 class='subtemplate__title'>{$subtemplateTitle}</h1>
                            <div class='grid grid--full grid-small--half'>
                                <div data-tab='existing' class='grid__col top-tab active'><div>Existing Marketplace</div></div>
                                <div data-tab='new' class='grid__col top-tab'><div>New Marketplace</div></div>
                            </div>
                            <div id='existing' class='content marketplace-info active'><h1 class='phone-only'>Existing Marketplace</h1>{$existing}</div>
                            <div id='new' class='content marketplace-info'><h1 class='phone-only'>New Marketplace</h1>{$new}</div>
                        </div>
                    </section>";

        return $result;
    }
    public function startedFast($subtemplateTitle) {

        $content   = get_sub_field('content');
        $apiImg    = get_sub_field('api_image')['url'];
        $whiteImg  = get_sub_field('white_label_marketplace_image')['url'];
        $apiText    = get_sub_field('api_text');
        $whiteText  = get_sub_field('white_label_text');

        $result = "<section class='subtemplate get-started'>
                        <div class='row'>
                            <h1 class='subtemplate__title'>{$subtemplateTitle}</h1>
                            <div class='subtemplate__description'>{$content}</div>

                            <div class='grid grid--gutters grid--full grid-small--half'>
                                <div class='grid__col api methods-of-use'>
                                    <h1>API</h1>
                                    <img src='{$apiImg}' alt='API'>
                                    {$apiText}
                                </div>
                                <div class='grid__col white-label methods-of-use'>
                                    <h1>White Label Marketplace</h1>
                                    <img src='{$whiteImg}' alt='White Label Marketplace'>
                                    {$whiteText}
                                </div>
                            </div>

                        </div>
                    </section>";

        return $result;
    }

    public function mainEventPage($subtemplateTitle) {
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

        $sidebar = $this->eventSidebar();

        $result = "<section class='subtemplate row upcoming-events'>
                        <div class='row'>
                            <div class='event-container'>
                                <h1>Upcoming Events</h1>
                                <div>{$futureMarkup}</div>
                            </div>
                            {$sidebar}
                        </div>
                    </section>
                    <div class='chevron-divider'></div>
                    <section class='subtemplate row past-events'>
                        <div class='row'>
                            <div class='event-container'>
                                <h1>Past Events</h1>
                                <div>{$pastMarkup}</div>
                            </div>
                        </div>
                    </section>";

        return $result;
    }

    public function eventSidebar() {
        $today = date('Ymd');

        $args           = array(
            'post_type' => 'event',
            'order'     => 'ASC',
            'orderby'   => 'meta_value',
            'meta_key'  => 'date',
            'posts_per_page' => -1,
            'meta_query' => array(
                array(
                    'key' => 'date',
                    'value' => $today, //array
                    'compare' => '>=',
                )
            )
        );
        $url = get_home_url();
        $futureEvents = get_posts($args);
        $futureListItems = '';
        $dateInLoop = '';
        $lastDate = '';
        if (!empty($futureEvents)) {
            foreach ($futureEvents as $item) {
                $id     = $item->ID;
                $pubDate= get_field('date',$id);

                $dateInLoop = date_create_from_format('F j, Y', $pubDate);
                $dateTitle = date_format($dateInLoop, 'F Y');

                $dateForLink    = date_format($dateInLoop,'Y').date_format($dateInLoop,'m').'01';
                if ($dateTitle !== $lastDate) {
                    $url = get_home_url();
                    $futureListItems .= "<li><a href='{$url}/events/?date={$dateForLink}'>{$dateTitle}</a></li>";
                }

                $lastDate = $dateTitle;
            }
        }

        $args           = array(
            'post_type' => 'event',
            'order'     => 'DESC',
            'orderby'   => 'meta_value',
            'meta_key'  => 'date',
            'posts_per_page' => -1,
            'meta_query' => array(
                array(
                    'key' => 'date',
                    'value' => $today, //array
                    'compare' => '<',
                )
            )
        );

        $pastEvents = get_posts($args);
        $pastListItems = '';
        $lastDate = '';
        if (!empty($pastEvents)) {
            foreach ($pastEvents as $item) {
                $id     = $item->ID;
                $pubDate= get_field('date',$id);

                $dateInLoop = date_create_from_format('F j, Y', $pubDate);
                $dateTitle = date_format($dateInLoop, 'F Y');

                $dateForLink    = date_format($dateInLoop,'Y').date_format($dateInLoop,'m').'01';
                if ($dateTitle !== $lastDate) {

                    $pastListItems .= "<li><a href='{$url}/events/?date={$dateForLink}'>{$dateTitle}</a></li>";
                }

                $lastDate = $dateTitle;
            }
        }

        $result = "<aside class='event-archives'>
                     <h1>Upcoming Events</h1>
                     <ul>
                         {$futureListItems}
                    </ul>
                    <h1>Past Events</h1>
                     <ul>
                         {$pastListItems}
                    </ul>
                    <h1><a href='{$url}/events/?date=all'>Show All</a></h1>
                    </aside>";

        return $result;
    }

    //
    // Subtemplate: Testimonials
    //
    public function testimonials($subtemplateTitle) {

        $testimonials = get_sub_field('testimonials');
        $testimonialMarkup = '';

        if ( $testimonials ) {
            foreach ($testimonials as $testimonial) {

                $id           = $testimonial->ID;
                $quote        = get_field('quote', $id);
                $name         = get_field('name', $id);
                $company      = get_field('company', $id);
                $link         = get_field('link', $id);
                $photo_object = get_field('photo', $id);
                $photo_size   = 'thumbnail';
                $photo_url    = $photo_object['sizes'][$photo_size];

                $testimonialMarkup .= "<div class='grid__col'>
                                        <figure class='testimonial'>
                                            <blockquote class='testimonial__quote'>{$quote}</blockquote>
                                            <figcaption class='testimonial__caption'>
                                                <img class='testimonial__avatar' src='{$photo_url}'>
                                                <cite class='testimonial__cite'>
                                                    <span class='testimonial__name'>{$name}</span>
                                                    <span class='testimonial__org'><a href='{$link}'>{$company}</a></span>
                                                </cite>
                                            </figcaption>
                                        </figure>
                                    </div>";
            }
        }

        $result = "<section class='subtemplate testimonials'>
                        <div class='row'>
                            <h1 class='subtemplate__title'>{$subtemplateTitle}</h1>
                            <article class='grid grid--full grid-medium--fit grid--gutters'>
                                {$testimonialMarkup}
                            </article>
                        </div>
                    </section>";

        return $result;
    }
}
