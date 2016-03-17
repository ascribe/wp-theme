<aside class="entry-share">

    <?php
        $title   = urlencode(get_the_title());
        $url     = urlencode(get_the_permalink());
        $twitter = get_field('twitter_url', 'option');
    ?>

    <a class="js-tracking-twitter-share" href="https://twitter.com/intent/tweet?text=<?php echo $title ?>&amp;url=<?php echo $url ?>&amp;via=ascribeio" title="Share on Twitter" rel="external nofollow" target="_blank">
        <svg version="1.1" class="icon" id="icon-twitter" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="-109 111 36 36">
        <path d="M-85.3,123.2c-0.6-0.7-1.5-1.1-2.5-1.1c-1.9,0-3.5,1.6-3.5,3.5c0,0.3,0,0.5,0.1,0.8
            c-2.9-0.1-5.5-1.5-7.2-3.6c-0.3,0.5-0.5,1.1-0.5,1.8c0,1.2,0.6,2.3,1.6,2.9c-0.6,0-1.1-0.2-1.6-0.4l0,0c0,1.7,1.2,3.1,2.8,3.4
            c-0.3,0.1-0.6,0.1-0.9,0.1c-0.2,0-0.4,0-0.7-0.1c0.4,1.4,1.7,2.4,3.3,2.4c-1.2,0.9-2.7,1.5-4.3,1.5c-0.3,0-0.6,0-0.8,0
            c1.5,1,3.4,1.6,5.4,1.6c6.4,0,9.9-5.3,9.9-9.9c0-0.2,0-0.3,0-0.5c0.7-0.5,1.3-1.1,1.7-1.8c-0.6,0.3-1.3,0.5-2,0.6
            c0.7-0.4,1.3-1.1,1.5-1.9C-83.8,122.7-84.5,123-85.3,123.2z"/>
        </svg>
    </a>

    <a class="js-tracking-facebook-share" href="http://www.facebook.com/sharer/sharer.php?s=100&p[url]=<?php echo $url ?>&amp;p[title]=<?php echo $title ?>" rel="external nofollow" target="_blank">
        <svg version="1.1" class="icon" id="icon-facebook" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="-109 111 36 36">
        <path  d="M-87.6,122.6h1.5v-3c-0.3,0-1.1-0.1-2.3-0.1c-2.5,0-4.6,1.7-4.6,4.6v2.4h-3v3.1h2.9v8.9h4v-8.9h2.7
            l0.4-3.1h-3.2v-2.1C-89.1,123.4-89,122.6-87.6,122.6z"/>
        </svg>
    </a>

    <a class="js-tracking-linkedin-share" href="https://www.linkedin.com/shareArticle?mini=true&amp;url=<?php echo $url ?>" rel="external nofollow">
        <svg version="1.1" class="icon" id="icon-linkedin" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="-109 111 36 36">
        <g>
            <rect x="-100" y="125.4" class="st1" width="3.9" height="12.5"/>
            <path d="M-98,120c-1.3,0-2.1,0.8-2.1,1.9c0,1,0.8,1.9,2,1.9c1.3,0,2.1-0.8,2.1-1.9C-96,120.8-96.8,120-98,120z"/>
            <path d="M-86.3,125.2c-2.1,0-3.4,1.2-3.9,2h-0.1l-0.2-1.7H-94c0.1,1.1,0.1,2.4,0.1,4v8.5h3.9v-7.2c0-0.4,0-0.7,0.1-1
                c0.3-0.8,0.9-1.5,2-1.5c1.4,0,2,1.1,2,2.7v6.9h3.9h0.1v-7.3C-81.8,126.9-83.8,125.2-86.3,125.2z"/>
        </g>
        </svg>
    </a>

</aside>
