<?php
/*
Template Name: API Docs
*/

get_header();

?>

<article class="apiary__content"></article>

<script src="https://api.apiary.io/seeds/embed.js"></script>

<script>
    var embed = new Apiary.Embed({
        subdomain: 'ascribe',
        element: '.apiary__content'
    });
</script>
