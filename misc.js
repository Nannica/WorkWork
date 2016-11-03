/**
 * Equal heights top blocks and their containing elements
 */
;(function($jq, _window, undefined) {
    $jq(document).ready(function() {

        // Vars
        var topBlocks = $jq('.top-block');

        // Function for setting equal heights
        var setEqualHeights = function(elements) {
            var heights = elements.map(function() {
                return $jq(this).height();
            }).get();

            var maxHeight = Math.max.apply(null, heights);
            elements.height(maxHeight);
        };

        // Image heights
        var topBlockImages = topBlocks.find('.image');

        if (topBlockImages.length) {
            setEqualHeights(topBlockImages);
            $jq(_window).on('themeResize', function() {
                if ($jq(_window).width() < 769) {
                    $jq.each(topBlockImages, function(i, elem) {
                        $jq(elem).height('');
                    });
                    setEqualHeights(topBlockImages);
                }
            });
        }

        // Inner sections
        var innerSections = topBlocks.find('.inner-section');

        if (innerSections.length) {
            setEqualHeights(innerSections);
            $jq(_window).on('themeResize', function() {
                if ($jq(_window).width() < 769) {
                    setEqualHeights(innerSections);
                }
            });
        }

        // Top blocks container heights
        if (topBlocks.length) {
            setEqualHeights(topBlocks);
            $jq(_window).on('themeResize', function() {
                if ($jq(_window).width() < 769) {
                    setEqualHeights(topBlocks);
                }
            });
        }

        // Products grid
        var products = $jq('.products-grid').find('.item-inner');
        var productNames = products.find('.product-name');
        var productInfos = products.find('.info');
        var productDescs = products.find('.product-desc');
        var productBottom = products.find('.bottom');

        $jq('.products-grid').find('.item').removeAttr('style');

        var truncateText = function(elements, height) {
            $jq.each(elements, function(i, elem) {
                elem = $jq(elem);
                if (elem.height() > height) {
                    var words = elem.html().split(/\s+/);
                    words.push('...');

                    do {
                        words.splice(-2, 1);
                        elem.html( words.join(' ') );
                    } while (elem.height() > height);
                }
            });
        };

        if (productNames.length) {
            truncateText(productNames, 42);
        }
        $jq(_window).on('themeResize', function() {
            if (productNames.length) {
                truncateText(productNames, 42);
            }
        });

        if (productDescs.length) {
            truncateText(productDescs, 72);
        }
        $jq(_window).on('themeResize', function() {
            if (productDescs.length) {
                truncateText(productDescs, 72);
            }
        });

        if (productDescs.length) {
            setEqualHeights(productDescs);
            $jq(_window).on('themeResize', function() {
                if ($jq(_window).width() < 480) {
                    productDescs.height('');
                } else {
                    setEqualHeights(productDescs);
                }
            });
        }

        if (productBottom.length) {
            setEqualHeights(productBottom);
            $jq(_window).on('themeResize', function() {
                if ($jq(_window).width() < 480) {
                    productBottom.height('');
                } else {
                    setEqualHeights(productBottom);
                }
            });
        }

        if (productInfos.length) {
            setEqualHeights(productInfos);
            $jq(_window).on('themeResize', function() {
                if ($jq(_window).width() < 480) {
                    productInfos.height('');
                } else {
                    setEqualHeights(productInfos);
                }
            });
        }
    });
})(jQuery, window);

/** Info-icons */
;(function($, _window) {
    $(document).ready(function(){
        var imageContainer = $('.image-container');
        if (imageContainer) {
            imageContainer.each(function() {
                var _current = $(this);
                var iconInfo = $('img.info-icon', _current);
                var inactive = $('div.inactive', _current);

                if (iconInfo && inactive) {
                    iconInfo.hover(function() {
                        inactive
                            .addClass('active')
                            .removeClass('hidden')
                            .css('display', 'block');
                    }, function() {
                        inactive
                            .removeClass('active')
                            .addClass('hidden')
                            .css('display', 'none');
                    });
                }
            });
        }
    });
})(jQuery, window);

/** Fancybox */
;(function($, _window) {
    $(document).ready(function(){
		$('a[rel="lightbox-textImage"]').fancybox();
		$('a[rel="lightbox"]').fancybox();
		$('a.fancybox').fancybox();
    });
})(jQuery, window);