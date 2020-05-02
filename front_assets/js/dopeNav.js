(function ($) {
    $.fn.dopeNav = function (options) {

        // Variables
        var navContainer = $('.dope-nav-container');
        var dope_nav = $('.dopenav ul');
        var dope_navli = $('.dopenav > ul > li');
        var navbarToggler = $('.dope-navbar-toggler');
        var closeIcon = $('.dopecloseIcon');
        var navToggler = $('.navbarToggler');
        var dopeMenu = $('.dope-menu');
        var var_window = $(window);

        // default options
        var defaultOpt = $.extend({
            breakpoint: 991,
            openCloseSpeed: 350,
            megaopenCloseSpeed: 700,
            alwaysHidden: false,
            openMobileMenu: 'left',
            dropdownRtl: false,
            stickyNav: false,
            stickyFooterNav: false
        }, options);

        return this.each(function () {

            // // light or dark theme
            // if (defaultOpt.theme === 'light' || defaultOpt.theme === 'dark') {
            //     navContainer.addClass(defaultOpt.theme);
            // }

            // open mobile menu direction 'left' or 'right' side
            if (defaultOpt.openMobileMenu === 'left' || defaultOpt.openMobileMenu === 'right') {
                navContainer.addClass(defaultOpt.openMobileMenu);
            }

            // dropdown rtl
            if (defaultOpt.dropdownRtl === true) {
                navContainer.addClass('dropdown-rtl');
            }

            // navbar toggler
            navbarToggler.on('click', function () {
                navToggler.toggleClass('active');
                dopeMenu.toggleClass('menu-on');
            });

            // close icon
            closeIcon.on('click', function () {
                dopeMenu.removeClass('menu-on');
                navToggler.removeClass('active');
            });

            // add dropdown & megamenu class in parent li class
            dope_navli.has('.dropdown').addClass('cn-dropdown-item');
            dope_navli.has('.megamenu').addClass('megamenu-item');

            // adds toggle button to li items that have children
            dope_nav.find('li a').each(function () {
                if ($(this).next().length > 0) {
                    $(this).parent('li').addClass('has-down').append('<span class="dd-trigger"></span>');
                }
            });

            // expands the dropdown menu on each click
            dope_nav.find('li .dd-trigger').on('click', function (e) {
                e.preventDefault();
                $(this).parent('li').children('ul').stop(true, true).slideToggle(defaultOpt.openCloseSpeed);
                $(this).parent('li').toggleClass('active');
            });

            // add padding in dropdown & megamenu item
            $('.megamenu-item').removeClass('has-down');

            // expands the megamenu on each click
            dope_nav.find('li .dd-trigger').on('click', function (e) {
                e.preventDefault();
                $(this).parent('li').children('.megamenu').slideToggle(defaultOpt.megaopenCloseSpeed);
            });

            // check browser width in real-time
            function breakpointCheck() {
                var windoWidth = window.innerWidth;
                if (windoWidth <= defaultOpt.breakpoint) {
                    navContainer.removeClass('breakpoint-off').addClass('breakpoint-on');
                } else {
                    navContainer.removeClass('breakpoint-on').addClass('breakpoint-off');
                }
            }

            breakpointCheck();

            var_window.on('resize', function () {
                breakpointCheck();
            });

            // always hidden enable
            if (defaultOpt.alwaysHidden === true) {
                navContainer.addClass('breakpoint-on').removeClass('breakpoint-off');
            }

            // sticky
            if (defaultOpt.stickyNav === true) {
                var_window.on('scroll', function () {
                    if (var_window.scrollTop() > 0) {
                        navContainer.addClass('dope-sticky');
                    } else {
                        navContainer.removeClass('dope-sticky');
                    }
                });
            }

            // footer sticky
            if (defaultOpt.stickyFooterNav === true) {
                navContainer.addClass('dope-sticky-footer');
            }
        });
    };
}(jQuery));


//One Page Nav js

! function (i, t, n, s) {
    var e = function (s, e) {
        this.elem = s, this.$elem = i(s), this.options = e, this.metadata = this.$elem.data("plugin-options"), this.$win = i(t), this.sections = {}, this.didScroll = !1, this.$doc = i(n), this.docHeight = this.$doc.height()
    };
    e.prototype = {
        defaults: {
            navItems: "a",
            currentClass: "current",
            changeHash: !1,
            easing: "swing",
            filter: "",
            scrollSpeed: 750,
            scrollThreshold: .5,
            begin: !1,
            end: !1,
            scrollChange: !1
        },
        init: function () {
            return this.config = i.extend({}, this.defaults, this.options, this.metadata), this.$nav = this.$elem.find(this.config.navItems), "" !== this.config.filter && (this.$nav = this.$nav.filter(this.config.filter)), this.$nav.on("click.onePageNav", i.proxy(this.handleClick, this)), this.getPositions(), this.bindInterval(), this.$win.on("resize.onePageNav", i.proxy(this.getPositions, this)), this
        },
        adjustNav: function (i, t) {
            i.$elem.find("." + i.config.currentClass).removeClass(i.config.currentClass), t.addClass(i.config.currentClass)
        },
        bindInterval: function () {
            var t, i = this;
            i.$win.on("scroll.onePageNav", function () {
                i.didScroll = !0
            }), i.t = setInterval(function () {
                t = i.$doc.height(), i.didScroll && (i.didScroll = !1, i.scrollChange()), t !== i.docHeight && (i.docHeight = t, i.getPositions())
            }, 250)
        },
        getHash: function (i) {
            return i.attr("href").split("#")[1]
        },
        getPositions: function () {
            var n, s, e, t = this;
            t.$nav.each(function () {
                n = t.getHash(i(this)), e = i("#" + n), e.length && (s = e.offset().top, t.sections[n] = Math.round(s))
            })
        },
        getSection: function (i) {
            var t = null,
                n = Math.round(this.$win.height() * this.config.scrollThreshold);
            for (var s in this.sections) this.sections[s] - n < i && (t = s);
            return t
        },
        handleClick: function (n) {
            var s = this,
                e = i(n.currentTarget),
                o = e.parent(),
                a = "#" + s.getHash(e);
            o.hasClass(s.config.currentClass) || (s.config.begin && s.config.begin(), s.adjustNav(s, o), s.unbindInterval(), s.scrollTo(a, function () {
                s.config.changeHash && (t.location.hash = a), s.bindInterval(), s.config.end && s.config.end()
            })), n.preventDefault()
        },
        scrollChange: function () {
            var n, i = this.$win.scrollTop(),
                t = this.getSection(i);
            null !== t && (n = this.$elem.find('a[href$="#' + t + '"]').parent(), n.hasClass(this.config.currentClass) || (this.adjustNav(this, n), this.config.scrollChange && this.config.scrollChange(n)))
        },
        scrollTo: function (t, n) {
            var s = i(t).offset().top - 70;
            i("html, body").animate({
                scrollTop: s
            }, this.config.scrollSpeed, this.config.easing, n)
        },
        unbindInterval: function () {
            clearInterval(this.t), this.$win.unbind("scroll.onePageNav")
        }
    }, e.defaults = e.prototype.defaults, i.fn.onePageNav = function (i) {
        return this.each(function () {
            new e(this, i).init()
        })
    }
}(jQuery, window, document);