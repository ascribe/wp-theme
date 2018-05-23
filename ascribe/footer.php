<?php
/**
 * The template for displaying the footer.
 *
 * @package ascribe
 * @since 0.1.0
 */

$year                = date("Y");
$address             = get_field('address', 'option');
$email               = get_field('email', 'option');
$consultLink         = get_field('request_consultation_link', 'option');
$euLink              = get_field('eu_logo_link', 'option');
$footerContactButton = get_field('footer_contact_button', 'option');

$themeUrl = WPTHEME_TEMPLATE_URL . '/';

$facebook   = get_field('facebook_url','option');
if ($facebook) {
    $facebookIcon = '<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Layer_1" x="0px" y="0px" viewBox="0 0 24 24" style="enable-background:new 0 0 24 24;" xml:space="preserve" class="social-icon replaced-svg">
<path d="M17.502747,3.688797H6.498352c-1.513306,0-2.751221,1.237915-2.751221,2.75122v11.003296  c0,1.514038,1.237915,2.751221,2.751221,2.751221h6.271484v-6.535889h-2.172913v-2.698975h2.172913V9.601334  c0-1.9469,1.461792-3.530945,3.259399-3.530945h2.172974v2.69043h-2.172974c-0.256165,0-0.54303,0.348633-0.54303,0.814941v1.383911  h2.716003v2.698975h-2.716003v6.535889h2.016541c1.513,0,2.750122-1.237183,2.750122-2.751221V6.440017  C20.252869,4.926712,19.015747,3.688797,17.502747,3.688797z"></path>
</svg>';
    $facebook = "<li><a href='{$facebook}' target='_blank' class='facebook'>{$facebookIcon}</a></li>";
}

$github     = get_field('github_url','option');
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
    $github = "<li><a href='{$github}' target='_blank' class='github'>{$gitIcon}</a></li>";
}

$instagram   = get_field('instagram_url','option');
if ($instagram) {
    $instagramIcon = '<svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
     viewBox="0 0 24 24" style="enable-background:new 0 0 24 24;" xml:space="preserve" class="social-icon">
<path d="M19.255823,10.502824h-1.559658c0.135622,0.406867,0.203432,0.881545,0.203432,1.356224
    c0,2.983694-2.441203,5.424897-5.424897,5.424897s-5.424898-2.441203-5.424898-5.424897
    c0-0.474679,0.067811-0.949357,0.203433-1.356224H5.693578v7.459235c0,0.406866,0.271245,0.678112,0.678112,0.678112h12.206019
    c0.406868,0,0.678114-0.271246,0.678114-0.678112V10.502824z M19.255823,5.756038c0-0.406868-0.271246-0.678112-0.678114-0.678112
    h-2.034336c-0.406868,0-0.678112,0.271245-0.678112,0.678112v2.034337c0,0.406867,0.271244,0.678112,0.678112,0.678112h2.034336
    c0.406868,0,0.678114-0.271245,0.678114-0.678112V5.756038z M12.4747,8.468487c-1.898714,0-3.390561,1.491848-3.390561,3.390561
    s1.491847,3.390561,3.390561,3.390561s3.390561-1.491847,3.390561-3.390561S14.373414,8.468487,12.4747,8.468487
     M19.255823,20.674507H5.693578c-1.152791,0-2.034337-0.881546-2.034337-2.034336V5.077926
    c0-1.152791,0.881546-2.034337,2.034337-2.034337h13.562245c1.15279,0,2.034336,0.881546,2.034336,2.034337v13.562245
    C21.290159,19.792961,20.408613,20.674507,19.255823,20.674507"/>
</svg>';
    $instagram = "<li><a href='{$instagram}' target='_blank' class='instagram'>{$instagramIcon}</a></li>";
}

$linkedin   = get_field('linkedin_link','option');
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
    $linkedin = "<li><a href='{$linkedin}' target='_blank' class='linkedin'>{$linkedIcon}</a></li>";
}

$medium    = get_field('medium_url','option');
if ($medium) {
    $mediumIcon = '<svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
     viewBox="0 0 24 24" style="enable-background:new 0 0 24 24;" xml:space="preserve" class="social-icon">
<g id="g10" transform="matrix(1.3333333,0,0,-1.3333333,0,126.66667)">
    <g id="g12" transform="scale(0.1)">
        <path id="path14" d="M166.979996,907.168213h-6.089111c-2.260651,0-5.457886-3.261108-5.457886-5.348938v-75.672424
            c0-2.090393,3.197235-4.939575,5.457886-4.939575h6.089111V803.2453h-55.168983v17.961975h11.546997v79.545959h-0.565804
            L95.82766,803.2453H74.95134l-26.616726,97.507935h-0.673573v-79.545959h11.546993V803.2453H13.020055v17.961975h5.914332
            c2.435684,0,5.632662,2.849182,5.632662,4.939575v75.672424c0,2.08783-3.196978,5.348938-5.632662,5.348938h-5.914332v17.962036
            H70.77607l18.962349-70.565002h0.521667l19.137733,70.565002h57.582176V907.168213"/>
    </g>
</g>
</svg>';
    $medium = "<li><a href='{$medium}' target='_blank' class='medium'>{$mediumIcon}</a></li>";
}

$reddit    = get_field('reddit_url','option');
if ($reddit) {
    $redditIcon = '<svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
     viewBox="0 0 24 24" style="enable-background:new 0 0 24 24;" xml:space="preserve" class="social-icon">
<path d="M21.500202,11.34273c0-1.153058-0.893827-2.087798-1.99642-2.087798c-0.698593,0-1.312998,0.375515-1.669735,0.943782
    c-1.385969-0.966459-3.25451-1.588227-5.327679-1.668936c-0.015877-1.482683,0.150045-2.583934,0.934364-2.945143l0.038683-0.017789
    l0.034919-0.024283c0.704523-0.490029,1.672995-0.22697,2.729114,0.186711c-0.010494,0.091261-0.016529,0.183963-0.016529,0.278195
    c0,1.256454,0.960447,2.278692,2.140947,2.278692c1.180546,0,2.140993-1.022237,2.140993-2.278692
    s-0.960447-2.278644-2.140993-2.278644c-0.769131,0-1.444595,0.434105-1.822134,1.084015
    c-1.241854-0.482018-2.482408-0.800331-3.546845-0.085355c-1.279602,0.618151-1.481442,2.176948-1.460395,3.804788
    c-2.076787,0.089254-3.946097,0.720717-5.325937,1.69783C5.864388,9.618558,5.226207,9.20863,4.496219,9.20863
    c-1.102592,0-1.99642,0.934735-1.99642,2.087799c0,0.951335,0.608674,1.753484,1.440812,2.005238
    c-0.085638,0.336285-0.132809,0.681999-0.132809,1.03569c0,3.212727,3.688456,5.817154,8.238398,5.817154
    s8.238397-2.604427,8.238397-5.817154c0-0.348615-0.0459-0.689465-0.12915-1.021208
    C20.937929,13.033583,21.500202,12.257064,21.500202,11.34273z M7.456427,13.167045c0-0.665358,0.526536-1.204735,1.176053-1.204735
    c0.649515,0,1.176052,0.539377,1.176052,1.204735S9.281995,14.37178,8.63248,14.37178
    C7.982963,14.37178,7.456427,13.832402,7.456427,13.167045z M15.263037,16.858324
    c-1.045108,0.580391-2.207019,1.128075-3.542299,1.128075c-1.034142,0-2.172241-0.328432-3.440885-1.224594
    c-0.21737-0.153557-0.269135-0.454271-0.11558-0.67164c0.15351-0.217323,0.454224-0.269183,0.67164-0.11558
    c2.452436,1.732372,4.218222,1.007978,5.959159,0.041178c0.232711-0.129321,0.526083-0.045366,0.655263,0.187298
    C15.579562,16.435772,15.495701,16.729097,15.263037,16.858324z M14.753683,14.268519
    c-0.649516,0-1.176053-0.539378-1.176053-1.204736s0.526537-1.204736,1.176053-1.204736s1.176052,0.539378,1.176052,1.204736
    S15.403199,14.268519,14.753683,14.268519z"/>
</svg>';
    $reddit = "<li><a href='{$reddit}' target='_blank' class='reddit'>{$redditIcon}</a></li>";
}

$tumblr    = get_field('tumblr_url','option');
if ($tumblr) {
    $tumblrIcon = '<svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
     viewBox="0 0 24 24" style="enable-background:new 0 0 24 24;" xml:space="preserve" class="social-icon">
<path d="M12.806825,2.675906v4.285488h4.284753v3.307951h-4.284753v4.751539c0,1.075847-0.013974,1.695121,0.100188,1.999938
    c0.112938,0.303263,0.396588,0.617723,0.705491,0.799631c0.410562,0.245815,0.878657,0.368723,1.40657,0.368723
    c0.938063,0,1.871799-0.304817,2.799485-0.914532v2.923214c-0.790804,0.371908-1.509045,0.633657-2.150712,0.784513
    c-0.642402,0.149221-1.336697,0.225058-2.082476,0.225058c-0.847193,0-1.347157-0.106972-1.997976-0.320017
    c-0.65082-0.21468-1.20619-0.52113-1.665539-0.914612c-0.460412-0.396589-0.778464-0.81802-0.956453-1.263313
    c-0.177494-0.44611-0.266081-1.093334-0.266081-1.940855v-6.499288H6.181442V7.645392
    C6.909242,7.409139,7.753575,7.07,8.271518,6.629447C8.79183,6.186523,9.208031,5.657385,9.522081,5.037374
    c0.314786-0.61854,0.531099-1.406976,0.649185-2.361468H12.806825z"/>
</svg>
';
    $tumblr = "<li><a href='{$tumblr}' target='_blank' class='tumblr'>{$tumblrIcon}</a></li>";
}

$twitter    = get_field('twitter_url','option');
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
    $twitter = "<li><a href='{$twitter}' target='_blank' class='twitter'>{$twitIcon}</a></li>";
}



?>


    <div class="chevron-divider"></div>


    <footer class="footer">

        <section class="footer__top">
            <div class="row">


                <?php wp_nav_menu( array( 'theme_location' => 'main-footer-menu', 'container' => false ) ); ?>

                <div class="footer__contact">

                    <?php if ($footerContactButton) { ?>
                        <a href="<?php echo $consultLink; ?>" class="button small"><?php echo $footerContactButton ?></a>
                    <?php } ?>

                    <div><?php echo $address; ?></div>
                    <div><a href="mailto:<?php echo $email; ?>"><?php echo $email; ?></a></div>
                </div>

            </div>
        </section>

        <section class="footer__bottom">
            <div class="row">

                <div class="footer__bigchaindb">
                    <a href="https://www.bigchaindb.com/">
                        <img width="170" src="https://www.ascribe.io/wp-content/uploads/2016/07/Powered-by-dark.png" />
                    </a>
                </div>

                <div class="footer__eu">
                    <?php if ($euLink) { ?>
                        <a href="<?php echo $euLink ?>">
                            <img width="150" src="https://www.ascribe.io/wp-content/uploads/2015/11/eu-dev-fund.png" />
                        </a>
                    <?php } else { ?>
                        <img width="150" src="https://www.ascribe.io/wp-content/uploads/2015/11/eu-dev-fund.png" />
                    <?php } ?>
                </div>

                <div class="footer__copyright">© <?php echo $year; ?> BigchainDB GmbH</div>

                <?php wp_nav_menu( array( 'theme_location' => 'lower-footer-menu', 'container' => false ) ); ?>

                <ul class="footer__social">
                    <?php echo $facebook; ?>
                    <?php echo $github; ?>
                    <?php echo $instagram; ?>
                    <?php echo $linkedin; ?>
                    <?php echo $medium; ?>
                    <?php echo $reddit; ?>
                    <?php echo $tumblr; ?>
                    <?php echo $twitter; ?>
                </ul>

            </div>
        </section>

    </footer>


    </div>

    <?php wp_footer(); ?>

</body>
</html>
