!function(r){r(window).on("load",function(){var e=r("body"),o=0,n=[".history",".skill",".works",".contact"];function i(){r.each(n,function(o,n){var i,s=e.find(n),c=s.offset().top,t=s.innerHeight();r(window).on("scroll",function(){i=r(window).scrollTop(),c<i+200&&i+200<t+c?s.addClass("js-show"):s.removeClass("js-show")})})}checkBp(),isSp,i(),r(window).on("resize",function(){0<o&&clearTimeout(o),o=setTimeout(function(){checkBp(),isSp,i()},200)})})}(jQuery);
