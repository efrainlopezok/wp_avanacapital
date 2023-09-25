// SITE js
var SITE = {
    isMobile: function() {
        //var uagent = navigator.userAgent.toLowerCase();
        //if (uagent.search("iphone") > -1 || uagent.search("ipod") > -1){
        if (/Android|webOS|iPhone|iPod|BlackBerry/i.test(navigator.userAgent)) {
            return true;
        } else {
            return false;
        }
    },
    //Tablet Condition
    isTablet: function() {
        var uagent = navigator.userAgent.toLowerCase();
        //if (uagent.search("iphone") > -1 || uagent.search("ipod") > -1){
        if (/Android|iPad/i.test(navigator.userAgent)) {
            return true;
        } else {
            return false;
        }
    },

    toTop: function() {
        jQuery('html, body').animate({ scrollTop: 0 }, 'slow');
    },

    scrollToSection: function() {
        try {
            var hash = window.location.hash;
            if (hash && hash.length > 0) {
                jQuery('html,body').animate({ scrollTop: jQuery(hash).offset().top - 0 }, 'slow');
            }

            jQuery(".menu-item > .sub-menu > .menu-item > .sub-menu > li").on("click", "a", function(event) {
                //event.preventDefault();
                var hash = this.hash;
                jQuery('html,body').animate({ scrollTop: jQuery(hash).offset().top - 0 }, 'slow');
            });

            jQuery("a[href='#']").on("click", function(event) {
                event.preventDefault();
            });
        } catch (err) {
            //err.message;
            return false;
        }

    },

    getUrlParameter: function getUrlParameter(sParam) {
        var sPageURL = decodeURIComponent(window.location.search.substring(1)),
            sURLVariables = sPageURL.split('&'),
            sParameterName,
            i;

        for (i = 0; i < sURLVariables.length; i++) {
            sParameterName = sURLVariables[i].split('=');

            if (sParameterName[0] === sParam) {
                return sParameterName[1] === undefined ? true : sParameterName[1];
            }
        }
    },
    initMobileMenu: function() {
        //	The menu on the left
        jQuery('#mobile_menu').mmenu({
            selectedClass: "current_page_item"
        });
    },

    //Show Form Error
    showErrorBox: function(error) {
        var errorbox = '<div id="error-messages" class="error-popup mfp-hide"> <h2>Oops!</h2><ul id="error-list"></ul></div>';
        if (jQuery("#error-messages").size() == 0) {
            jQuery(errorbox).appendTo("body");
        }
        jQuery("#error-list").empty().append(error);
        jQuery.magnificPopup.open({
            items: { src: '#error-messages' },
            type: 'inline'
        }, 0);
        return false;
    },

    toTitleCase: function(str) {
        return str.replace(/\w\S*/g, function(txt) { return txt.charAt(0).toUpperCase() + txt.substr(1).toLowerCase(); });
    },

    equalHeight: function(el) {
        if (jQuery(el).size() > 0) {
            var byRow = true;
            jQuery(el).matchHeight(byRow);
        }
    },

    populateSelect: function(el, items) {
        el.options.length = 0;
        if (items.length > 0)
            el.options[0] = new Option('Please Select', '');
        $.each(items, function() {
            (el.options[el.options.length] = new Option(this.name, this.value)).setAttribute("data-flid", this.flid);;
        });
    },

    filterByProperty: function(arr, prop, value) {
        return $.grep(arr, function(item) { return item[prop] == value });
    },

    //Accordian
    initAccordion: function() {
        var oAccordion = jQuery('.accordion_container');
        if (oAccordion.size() > 0) {
            var menu_ul = jQuery('.accordion_container > li > div.accordion_content'),
                menu_a = jQuery('.accordion_container > li > a'),
                default_open_slide = jQuery('.accordion_container > li > div.default_open_slide');
            menu_ul.hide();
            default_open_slide.show();
            menu_a.click(function(e) {
                e.preventDefault();
                if (!jQuery(this).hasClass('active')) {
                    menu_a.removeClass('active');
                    menu_ul.filter(':visible').slideUp('normal');
                    jQuery(this).addClass('active').next().stop(true, true).slideDown('normal');
                } else {
                    jQuery(this).removeClass('active');
                    jQuery(this).next().stop(true, true).slideUp('normal');
                }
            });
        }
    },

    socialShare: function(o) {
        var $a = jQuery(o);
        var social = $a.data('social');
        var params = $a.data("share-params");
        if (social == "facebook") {
            url = "https://www.facebook.com/sharer/sharer.php?" + params;
        } else if (social == "twitter") {
            url = "https://twitter.com/intent/tweet?" + params;
        } else if (social == "pinterest") {
            url = "https://pinterest.com/pin/create/button/?" + params;
        } else if (social == "gplus") {
            url = "https://plus.google.com/share?" + params;
        }

        window.open(url, 'social-share-dialog', 'width=626,height=436');
        return false;
    },

    initTabs: function() {
        jQuery(".tabs").on("click", "a", function(event) {
            event.preventDefault();
            jQuery(this).parent().addClass("active");
            jQuery(this).parent().siblings().removeClass("active");
            var tab = jQuery(this).attr("href");
            jQuery(".tab-content").hide();
            jQuery(tab).show();
        });

        jQuery(".tabs a:eq(0)").click();
    },

    customTabs: function(tabsid) {
        jQuery(tabsid).responsiveTabs({
            startCollapsed: 'accordion'
        });
    },

    initSlider: function(slider, numSlides) {
        var slideOptions = {}
        if (numSlides == 1) {
            slideOptions = {
                controls: false,
                responsive: true,
                auto: true,
                pause: 20000

            }
        } else if (numSlides == 3) {
            slideOptions = {
                controls: false,
                responsive: true,
                slideWidth: 380,
                minSlides: 1,
                maxSlides: 3,
                moveSlides: 1,
                //infiniteLoop: false,
                slideMargin: 0,
                auto: true,
                pause: 15000
            }
        } else if (numSlides == 4) {
            var slide_width = 300;
            if (SITE.isMobile()) {
                slide_width = 320;
            }
            slideOptions = {
                pager: false,
                responsive: true,
                infiniteLoop: false,
                nextSelector: '#team_next',
                prevSelector: '#team_prev',
                slideWidth: slide_width,
                minSlides: 1,
                maxSlides: 4,
                moveSlides: 1,
                slideMargin: 0,
                auto: true
            }
        }
        jQuery(slider).bxSlider(slideOptions);
    },

    initfilter: function() {
        //when a link in the filters div is clicked...
        jQuery('#team_filters a').click(function(e) {
            //prevent the default behaviour of the link
            e.preventDefault();

            //get the id of the clicked link(which is equal to classes of our content
            jQuery('#team_filters a').removeClass('active');
            jQuery(this).addClass('active');
            var filter = jQuery(this).attr('id');

            //show all the list items(this is needed to get the hidden ones shown)
            jQuery('#team_content > div').show();

            /*using the :not attribute and the filter class in it we are selecting
            only the list items that don't have that class and hide them '*/
            if (filter != undefined) {
                jQuery('#team_content > div:not(.' + filter + ')').hide();
            }

        });
    },

    paginateFundedDeals: function() {
        var perPageItem = 16;
        if (jQuery(".initpagination").size() > 0) {
            jQuery("#deals_pagination").jPages("destroy");
            jQuery("#deals_pagination_detail").html(' ')
            jQuery(".initpagination > div").removeAttr("style");
        }
        if (jQuery('.filtered').size() > perPageItem) {
            jQuery("#deals_pagination").jPages({
                perPage: perPageItem,
                minHeight: false,
                containerID: "funded_deals_list_container",
                callback: function(pages, items) {
                    //jQuery("#legend1").html("Page " + pages.current + " of " + pages.count);
                    jQuery("#deals_pagination_detail").html('Deals ' + items.range.start + " - " + items.range.end + " of " + items.count);
                    jQuery("#funded_deals_list_container").addClass("initpagination");

                }
            });
        }
        jQuery('#deals_pagination a').on('click', function() {
            jQuery('html,body').animate({ scrollTop: jQuery('#funded_deals_list_container').offset().top - 100 }, 'slow');
        });

    },

    dealFilter: function() {
        //Map 
        var regions_code = [];
        var stateCode;
        var codeloop = "";

        jQuery('#map').vectorMap({
            map: 'usa_en',
            backgroundColor: null,
            color: '#ffffff',
            enableZoom: false,
            showTooltip: true,
            selectedColor: '#912036',
            hoverColor: '#912036',
            multiSelectRegion: true,
            //selectedRegions: []
            onRegionSelect: function(event, code, region) {
                //Add value in array
                regions_code.push('.' + code);
            },
            onRegionDeselect: function(event, code, region) {
                //remove value from array					
                var arr_index = regions_code.indexOf('.' + code);
                if (arr_index > -1) {
                    regions_code.splice(arr_index, 1);
                }
            }
        });

        //End Map
        //when a link in the filters div is clicked...
        jQuery('#deal_loan a').click(function(e) {
            jQuery(this).toggleClass("active");
        });

        jQuery('#deal_property a').click(function(e) {
            jQuery(this).toggleClass("active");
        });


        jQuery('#filter_by_deals').click(function(e) {

            var demographics = regions_code;
            var property = []
            var loan = [];
            var finalCollection = [];
            var i = 0;
            var j = 0;
            var k = 0;
            jQuery('#deal_loan a').each(function(index, elem) {
                var o = jQuery(this);
                if (o.hasClass("active")) {
                    var selected_loan = o.data('filter-loan-type');
                    loan.push("." + selected_loan);
                }
            });
            jQuery('#deal_property a').each(function(index, elem) {
                var o = jQuery(this);
                if (o.hasClass("active")) {
                    var selected_property = o.data('filter-property-type');
                    property.push("." + selected_property);
                }
            });

            if (demographics.length > 0) {
                for (dg in demographics) {
                    if (property.length > 0) {
                        for (pr in property) {
                            if (loan.length > 0) {
                                for (ln in loan) {
                                    finalCollection[k] = { 'demographic': demographics[dg] };
                                    finalCollection[k]['property'] = property[pr];
                                    finalCollection[k]['loan'] = loan[ln];
                                    k++;
                                }
                            } else {
                                finalCollection[j] = { 'demographic': demographics[dg] };
                                finalCollection[j]['property'] = property[pr];
                                j++;
                            }
                        }
                    } else if (loan.length > 0) {
                        for (ln in loan) {
                            finalCollection[k] = { 'demographic': demographics[dg] };
                            finalCollection[k]['loan'] = loan[ln];
                            k++;
                        }
                    } else {
                        finalCollection[i] = { 'demographic': demographics[dg] };
                    }
                    i++;
                }
            } else if (property.length > 0) {
                for (pr in property) {
                    if (loan.length > 0) {
                        for (ln in loan) {
                            finalCollection[k] = { 'property': property[pr] };
                            finalCollection[k]['loan'] = loan[ln];
                            k++;
                        }
                    } else {
                        finalCollection[j] = { 'property': property[pr] };
                        j++;
                    }
                }
            } else if (loan.length > 0) {
                for (ln in loan) {
                    finalCollection[k] = { 'loan': loan[ln] };
                    k++;
                }
            }

            var selected_filters = [];
            //old before pagination
            //jQuery('#funded_deals_list .property').hide();
            jQuery('#funded_deals_list .property').removeClass('filtered');

            $.each(finalCollection, function(key, value) {
                var items = "";
                if (finalCollection[key]['demographic'] && finalCollection[key]['demographic'] != "" && typeof(finalCollection[key]['demographic']) == "string") {
                    items += finalCollection[key]['demographic'];
                }
                if (finalCollection[key]['property'] && finalCollection[key]['property'] != "" && typeof(finalCollection[key]['property']) == "string") {
                    items += finalCollection[key]['property'];
                }
                if (finalCollection[key]['loan'] && finalCollection[key]['loan'] != "" && typeof(finalCollection[key]['loan']) == "string") {
                    items += finalCollection[key]['loan'];
                }
                selected_filters.push(items);
                //old before pagination
                //jQuery('#funded_deals_list '+ items).show();
                jQuery('#funded_deals_list ' + items).addClass('filtered');
            });
            SITE.paginateFundedDeals();
            //console.log(selected_filters);

            //filterClass = loan_selected.slice(0, -2);
            //jQuery('#funded_deals_list .property').hide();
            //jQuery('#funded_deals_list '+ filterClass).show();
            jQuery('html,body').animate({ scrollTop: jQuery('#funded_deals_list').offset().top - 50 }, 'slow');
        });

        jQuery('#filter_reset').click(function(e) {
            jQuery('#deal_loan').find("a").removeClass("active");
            jQuery('#deal_property').find("a").removeClass("active");
            jQuery('#filter_deal_loan_val').val("");
            jQuery('#filter_deal_property_val').val("");
            //old before pagination
            //jQuery('#funded_deals_list .property').show();
            jQuery('#funded_deals_list .property').addClass('filtered');
            jQuery('#map svg path').attr('fill', 'white');
            regions_code = [];
            demographics = regions_code;
            SITE.paginateFundedDeals();

        });

        SITE.paginateFundedDeals();
    },

    sectionScroll: function() {
        jQuery(window).scroll(function() {
            var window_top = jQuery(window).scrollTop() + 50;
            // the "12" should equal the margin-top value for nav.stickydiv
            var div_top = jQuery('#section_wrapper').offset().top;
            if (window_top >= div_top) {
                jQuery('#nav_section').addClass('nav-fixed');
            } else {
                jQuery('#nav_section').removeClass('nav-fixed');
            }
        });

        jQuery(document).on("scroll", onScroll);

        jQuery('#nav_section a[href^="#"]').on('click', function(e) {
            e.preventDefault();
            jQuery(document).off("scroll");
            jQuery('a').each(function() {
                jQuery(this).removeClass('active');
            })
            jQuery(this).addClass('active');
            var target = this.hash,
                menu = target;
            $target = jQuery(target);
            jQuery('html, body').stop().animate({
                'scrollTop': $target.offset().top - 30
            }, 600, 'swing', function() {
                window.location.hash = target;
                jQuery(document).on("scroll", onScroll);
            });
        });

        function onScroll(event) {
            var scrollPos = jQuery(document).scrollTop();
            jQuery('#nav_section a').each(function() {
                var currLink = jQuery(this);
                var refElement = jQuery(currLink.attr("href"));
                if (refElement.position().top - 30 <= scrollPos && refElement.position().top + refElement.height() > scrollPos) {
                    jQuery('#nav_section ul li a').removeClass("active");
                    currLink.addClass("active");
                } else {
                    currLink.removeClass("active");
                }
            });
        }
    },

    stickyHeader: function() {
        if (jQuery(window).width() > 768) {
            if (jQuery('body').scrollTop() >= 200) {
                //sticky Header
                var iCurScrollPos = jQuery('body').scrollTop();
                if (iCurScrollPos >= iScrollPos) {
                    //Scrolling Down
                    jQuery('#header').removeClass('sticky-header').css('opacity', '0');
                } else {
                    //Scrolling Up
                    jQuery('#header').addClass('sticky-header').css('opacity', '1');
                }
                iScrollPos = iCurScrollPos;
            } else {
                jQuery('#header').removeClass('sticky-header').css('opacity', '1');
            }
        } else {
            jQuery('#header').removeClass('sticky-header').css('opacity', '1');
        }
    },

    thankyouForComment: function() {
        var comment_id = SITE.getUrlParameter('comment');
        jQuery('html,body').animate({ scrollTop: jQuery("#div-comment-" + comment_id).offset().top - 0 }, 'slow');

        setTimeout(function() {
            jQuery('.thankyou_comment').magnificPopup({
                type: 'inline',
                modal: true,
                preloader: false
            }).trigger("click");
        }, 1000);

        setTimeout(function() {
            jQuery.magnificPopup.close();
        }, 4000);
    }



};


var SITEForms = {
    onlyInteger: function() {
        jQuery('.only-integer').keypress(function(event) {
            var charCode = (event.which) ? event.which : event.keyCode;
            if (charCode > 31 && (charCode < 48 || charCode > 57) && charCode != 37 && charCode != 39 && charCode != 46) {
                return false;
            }
            return true;
        });
    },
    onlyFloat: function() {
        jQuery('.only-float').keypress(function(event) {
            var charCode = (event.which) ? event.which : event.keyCode;
            if (charCode > 31 && (charCode < 48 || charCode > 59) && charCode != 37 && charCode != 39 && charCode != 46) {
                return false;
            } // prevent if not number/dot

            if (charCode == 46 && jQuery(this).val().indexOf('.') != -1) {
                return false;
            } // prevent if already dot
            return true;
        });
    },
    isValidEmail: function(v) {
        var filter_email = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
        if (filter_email.test(v) == false) {
            return false;
        } else {
            return true;
        }
    },

    isValidZip: function(v) {
        var filter_zipcode = /^(\d{5}-\d{4}|\d{5}|\d{9})$|^([a-zA-Z]\d[a-zA-Z]( )?\d[a-zA-Z]\d)$/;
        if (filter_zipcode.test(v) == false) {
            return false;
        } else {
            return true;
        }
    },

    isValidPhone: function(v) {
        var filter_phone = /^([0-9]( |-)?)?(\(?[0-9]{3}\)?|[0-9]{3})( |-)?([0-9]{3}( |-)?[0-9]{4}|[a-zA-Z0-9]{7})$/;
        if (filter_phone.test(v) == false) {
            return false;
        } else {
            return true;
        }
    },

    getValue: function(fieldID) {
        var value = jQuery.trim(jQuery("#" + fieldID).val());
        jQuery("#" + fieldID).val(value);
        return value;
    },

    isInt: function(n) {
        return Number(n) === n && n % 1 === 0;
    },

    isFloat: function(n) {
        return Number(n) === n && n % 1 !== 0;
    }

}

//---------------------------------------------
$(document).scroll(function () {
    if (jQuery('.columns .whiteblock-cont-bottom').size() > 0) {
        jQuery('.columns .whiteblock-cont-bottom').waitForImages(function () {
            SITE.equalHeight(".columns .whiteblock-cont-bottom");
        });
    }
});
jQuery(window).load(function() {
    //equal div height on image load

    if (typeof FastClick !== 'undefined') {
        if (typeof document.body !== 'undefined') {
            FastClick.attach(document.body);
        }
    }


    SITE.initMobileMenu();
    if (jQuery("#investor_statistics").size() > 0) {
        SITE.customTabs('#investor_statistics');
    }
    if (jQuery("#whatwedo_tabs").size() > 0) {
        SITE.customTabs('#whatwedo_tabs');
    }
    if (jQuery("#program_section_tab").size() > 0) {
        SITE.customTabs('#program_section_tab');
    }
    if (jQuery("#presentation_section_tab").size() > 0) {
        SITE.customTabs('#presentation_section_tab');
    }
    if (jQuery("#vtab").size() > 0) {
        SITE.customTabs('#vtab');
    }
    if (jQuery("#single_slide_slider").size() > 0) {
        SITE.initSlider('#single_slide_slider', 1);
    }

    if (jQuery("#lending_process").size() > 0) {
        SITE.initSlider('#lending_process', 1);
    }
    if (jQuery("#commercial_top_tabs").size() > 0) {
        SITE.customTabs('#commercial_top_tabs');
    }
    if (jQuery("#commercial_bottom_tabs").size() > 0) {
        SITE.customTabs('#commercial_bottom_tabs');
    }
    if (jQuery(".only-integer").size() > 0) {
        SITEForms.onlyInteger();
    }

    if (jQuery(".only-float").size() > 0) {
        SITEForms.onlyFloat();
    }
    //SITE.initTabs();
    if (jQuery("#map").size() > 0) {
        SITE.dealFilter();
    }
    SITE.scrollToSection();

    if (jQuery("#section_wrapper").size() > 0) {
        SITE.sectionScroll();
    }

    if (jQuery(".phone-mask").size() > 0) {
        jQuery(".phone-mask").mask("(999) 999-9999");
    }

    //jQuery('#frm_calculator_construction_loan').parsley();

    jQuery('.popup-gallery').magnificPopup({
        delegate: 'a.gthumb',
        type: 'image',
        tLoading: 'Loading image #%curr%...',
        mainClass: 'mfp-img-mobile',
        gallery: {
            enabled: true,
            navigateByImgClick: true,
            preload: [0, 1] // Will preload 0 - before current, and 1 after the current image
        },
        image: {
            tError: '<a href="%url%">The image #%curr%</a> could not be loaded.',
            titleSrc: function(item) {
                return item.el.attr('title');
            }
        }
    });

    jQuery('.popup-content-gallery').magnificPopup({
        delegate: 'a.popup-content',
        type: 'inline',
        tLoading: 'Loading content #%curr%...',
        mainClass: 'mfp-img-mobile',
        gallery: {
            enabled: true,
            navigateByImgClick: true,
            preload: [0, 1] // Will preload 0 - before current, and 1 after the current image
        },
        callbacks: {
            buildControls: function() {
                // re-appends controls inside the main container
                this.contentContainer.append(this.arrowLeft.add(this.arrowRight));
            }
        }

        //prependTo: '#section_capitalvalues .popup-content-gallery'
    });

    jQuery('.popup-youtube').magnificPopup({
        type: 'iframe',
        mainClass: 'mfp-fade',
        removalDelay: 160,
        preloader: false
    });

    jQuery('.popup-iframe').magnificPopup({
        type: 'iframe',
        mainClass: 'mfp-fade',
        removalDelay: 160,
        preloader: false
    });

    jQuery('.popup-inline').magnificPopup({
        type: 'inline',
        preloader: false
    });

    jQuery('.popup-modal').magnificPopup({
        type: 'inline',
        preloader: false,
        modal: true
    });

    jQuery(document).on('click', '.popup-modal-dismiss', function(e) {
        e.preventDefault();
        jQuery.magnificPopup.close();
    });

    jQuery('.image-popup').magnificPopup({
        type: 'image',
        closeOnContentClick: true,
        closeBtnInside: true,
        mainClass: 'mfp-fade',
        image: {
            verticalFit: true
        }
    });

    if (jQuery("iframe").size() > 0 && jQuery(".iframe_video").size() > 0) {
        fluidvids.init({
            selector: ['.iframe_video'], // runs querySelectorAll()
            players: ['www.youtube.com', 'player.vimeo.com'] // players to support
        });
    }

    if (jQuery('.gform_wrapper').size() > 0) {
        jQuery(".gform_wrapper .gf-disable input").attr('readonly', 'true');
        jQuery(".hide-name-label span label").append('<span class="gfield_required">*</span>');
    }

    jQuery('#back_to_top').on('click', function() {
        SITE.toTop();
    });

    if (jQuery('.select').size() > 0) {
        jQuery('.select').niceSelect();
    }

    if (jQuery('.team-list').size() > 0) {
        if (jQuery('#team_filters').size() > 0) {
            SITE.initfilter();
        }
        var team_orig_img = "";
        var team_hover_img = "";
        var img_o;
        jQuery('.img-block').hover(function() {
                img_o = jQuery(this);
                team_hover_img = img_o.data("hover-img");
                team_orig_img = img_o.data("orig-img");
                img_o.css('background-image', 'url(' + team_hover_img + ')');
            },
            function() {
                img_o.css('background-image', 'url(' + team_orig_img + ')');
            });
    }

    //On Hover Change logo
    jQuery('#header #logo #logo_big').hover(
        // jQuery(this).attr('src');
        function() {
            var image_red = jQuery(this).attr('data-image-red');
            jQuery(this).attr('src', image_red);
        },
        function() {
            var image_white = jQuery(this).attr('data-image-white');
            jQuery(this).attr('src', image_white);
            
        }
    );
    //On Hover Change logo Mobile
    jQuery('#header #logo #logo_small').hover(
        function() {
            var image_red = jQuery(this).attr('data-image-red');
            jQuery(this).attr('src', image_red);
        },
        function() {
            var image_white = jQuery(this).attr('data-image-white');
            jQuery(this).attr('src', image_white);
        }
    );

});
// Resize header div's height
jQuery(window).on('debouncedresize', function() {
    jQuery.fn.matchHeight._update();
    jQuery.fn.matchHeight._maintainScroll = true;
    var mobile_menu_api = jQuery("#mobile_menu").data("mmenu");
    mobile_menu_api.close();
    SITE.stickyHeader();
});

//sticky Header var
var iScrollPos = 0;
jQuery(window).scroll(function() {
    // Back to top Button
    if (jQuery(window).scrollTop() > 400) {
        jQuery('#back_to_top').fadeIn();
    } else {
        jQuery('#back_to_top').fadeOut();
    }
    SITE.stickyHeader();
});

jQuery(window).resize(function() {
    SITE.stickyHeader();
});


if (jQuery("#frm_investor").size() > 0) {
    jQuery(window).load(function() {
        jQuery("#mortgages span").click(function() {
            jQuery('#mortgages span').removeClass('selected');
            jQuery(this).addClass("selected");
            jQuery('#error_experience').hide();
        });
        // jQuery("#equity_intrests span").click(function(){
        //     jQuery('#equity_intrests span').removeClass('selected');
        //     jQuery(this).addClass("selected");
        // });
        // jQuery("#development-projects span").click(function(){
        //     jQuery('#development-projects span').removeClass('selected');
        //     jQuery(this).addClass("selected");
        // });
        // jQuery("#risk_tolerance a").click(function(){
        //     jQuery('#risk_tolerance a').removeClass('selected');
        //     jQuery(this).addClass("selected");
        // });
        jQuery("#income_assessment li a").click(function() {
            jQuery('#income_assessment li a').removeClass('selected');
            jQuery(this).addClass("selected");
            var incomeAssessment = jQuery(this).data('income-assessment');
            jQuery('#income_assessment_val').val(incomeAssessment);
        });

        jQuery(".tolerance-content-block .cta").click(function() {
            jQuery('.tolerance-content-block .cta').text('Select');
            jQuery('.tolerance-content-block .columns').removeClass('active');
            jQuery(this).text("Selected");
            var riskTolerance = jQuery(this).data('risk-tolerance');
            jQuery('#risk_tolerance_val').val(riskTolerance);
            jQuery(this).closest(".columns").addClass("active");
        });
    });
    var error = '<ul class="parsley-errors-list filled" id="parsley-id-13"><li class="parsley-required">This value is required.</li></ul>';
    var errorExperience = '<ul class="parsley-errors-list filled" id="parsley-id-13"><li class="parsley-required">Plaese select experience.</li></ul>';
    jQuery(function() {
        var $sections = jQuery('.wizzard-content');

        function navigateTo(index) {
            // Mark the steps section with the class 'active'
            jQuery(".nav-tab li").removeClass("active");
            jQuery(".nav-tab li.step-" + index).addClass("active");
            // Mark the current section with the class 'current'
            $sections.removeClass('active').eq(index).addClass('active');
            // Show only the navigation buttons that make sense for the current section:
            jQuery('.form-navigation .previous').toggle(index > 0);
            var atTheEnd = index >= $sections.length - 1;
            jQuery('.form-navigation .next').toggle(!atTheEnd);
            jQuery('.form-navigation [type=submit]').toggle(atTheEnd);

            jQuery('.form-navigation [type=submit]').on('click', function() {
                return submitToLeasePath();
            });

            if (atTheEnd) {
                showDataToReview();
            }
        }

        function curIndex() {
            // Return the current index by looking at which section has the class 'current'
            return $sections.index($sections.filter('.active'));
        }
        // Previous button is easy, just go back
        jQuery('.form-navigation .previous').click(function() {
            navigateTo(curIndex() - 1);
        });
        // Next button goes forward iff current block validates
        jQuery('.form-navigation .next').click(function() {
            //alert(curIndex())
            if (jQuery('#frm_investor').parsley().validate('block-' + curIndex())) {
                navigateTo(curIndex() + 1);
                jQuery('html,body').animate({ scrollTop: jQuery(".become_investor_tab").offset().top - 70 }, 'slow');
            }
        });

        // Prepare sections by setting the `data-parsley-group` attribute to 'block-0', 'block-1', etc.
        $sections.each(function(index, section) {
            jQuery(section).find(':input').attr('data-parsley-group', 'block-' + index);
        });
        navigateTo(0); // Start at the beginning
    });

    function showDataToReview() {

    }

    function submitToLeasePath() {

    }
}
jQuery( document ).ready(function() {
     // Parallax
    new universalParallax().init({
        speed: 4
    });
});