/**
 ** ascribe v0.0.1
 ** The best WordPress theme ever made!
 ** http://ascribe.io
 **
 ** Territorial <us@territorial.ca>
 **
 ** 
 ** https://github.com/ascribe/wp-theme.git 
 **/
function stickyNav(){var e=$(".sticky");$(window).on("load resize scroll",function(){$(window).width()>768&&($(window).scrollTop()>100?e.addClass("stuck"):e.removeClass("stuck"))})}function mobileNav(){$(".hamburger").click(function(){$(".mobile-nav").toggleClass("active")})}$(document).ready(function(){function e(){$("body").hasClass("page-template-template-tour")&&$(".tour-switcher .menu").prepend($(".tour-switcher .current-menu-item")),$(".current-menu-item a").click(function(e){e.preventDefault(),$("#menu-landing-page-menu").toggleClass("active")})}function t(){$(".case-study:gt(0)").addClass("hidden"),$(".slider-action").click(function(){var e=$(this).attr("id");"back"===e?($(".case-study").addClass("hidden"),$(".case-study").last().prependTo(".slide-container").removeClass("hidden")):(displayed=$(".case-study").first(),displayed.addClass("hidden"),$(".case-study").eq(1).removeClass("hidden"),displayed.appendTo(".slide-container"))})}function a(){$(".featured-faqs dt").click(function(){$(this).next("dd").toggleClass("open")})}function s(){$(".top-tab").click(function(){$(".top-tab").removeClass("active"),$(this).addClass("active");var e=$(this).data("tab");$(".marketplace-info").removeClass("active"),$("#"+e).addClass("active")})}t(),a(),s(),e(),mobileNav(),stickyNav()});