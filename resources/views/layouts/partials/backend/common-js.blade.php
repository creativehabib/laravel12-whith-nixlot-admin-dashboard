
<!-- Scroll To Top -->
<div class="scrollToTop">
    <span class="arrow"><i class="ri-arrow-up-s-fill fs-20"></i></span>
</div>
<div id="responsive-overlay"></div>
<!-- Popper JS -->
<script src="{{ asset('assets/libs/@popperjs/core/umd/popper.min.js') }}"></script>

<!-- Bootstrap JS -->
<script src="{{ asset('assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

<!-- Defaultmenu JS -->
<script src="{{ asset('assets/js/defaultmenu.min.js') }}"></script>

<!-- Node Waves JS-->
<script src="{{ asset('assets/libs/node-waves/waves.min.js') }}"></script>

<!-- Sticky JS -->
<script src="{{ asset('assets/js/sticky.js') }}"></script>

<!-- Simplebar JS -->
<script src="{{ asset('assets/libs/simplebar/simplebar.min.js') }}"></script>
<script src="{{ asset('assets/js/simplebar.js') }}"></script>

<!-- Color Picker JS -->
<script src="{{ asset('assets/libs/@simonwep/picker/pickr.es5.min.js') }}"></script>
<script src="{{ asset('js/iziToast.js') }}"></script>
<script src="{{ asset('js/sweetalert.js') }}"></script>
@include('vendor.lara-izitoast.toast')
<script>
    document.addEventListener("DOMContentLoaded", function () {
        const menuItems = document.querySelectorAll(".side-menu__item");
        const currentUrl = window.location.href;

        menuItems.forEach(e => {

            if (e.getAttribute('href') === currentUrl) {
                e.classList.add('active');
                e.parentElement.classList.add('active');
                let parent = e.closest('ul');
                let parentNotMain = e.closest('ul:not(.main-menu)');
                let hasParent = true;
                // while (hasParent) {
                if (parent) {
                    parent.classList.add('active');
                    parent.previousElementSibling.classList.add('active');
                    parent.parentElement.classList.add('active');

                    if (parent.parentElement.classList.contains("has-sub")) {
                        let elemrntRef = parent.parentElement.parentElement.parentElement
                        elemrntRef.classList.add("open", "active")
                        elemrntRef.firstElementChild.classList.add("active")
                        elemrntRef.children[1].style.display = "block"
                        Array.from(elemrntRef.children[1].children).map((element) => {
                            if (element.classList.contains("active")) {
                                element.children[1].style.display = "block"
                            }
                        })
                    }

                    if (parent.classList.contains("child1")) {
                        slideDown(parent);
                    }
                    parent = parent.parentElement.closest('ul');
                    //
                    if (parent && parent.closest('ul:not(.main-menu)')) {
                        parentNotMain = parent.closest('ul:not(.main-menu)');
                    }
                    if (!parentNotMain) hasParent = false;
                }
                else {
                    hasParent = false;
                }
            }
            // }
        })

        menuItems.forEach((menuItem) => {
            let menuItemHref = menuItem.getAttribute("href");

            // Ensure the menu item has a valid href and matches the current URL
            if (menuItemHref && currentUrl.includes(menuItemHref)) {
                let parentSlide = menuItem.closest(".slide");
                let parentHasSub = menuItem.closest(".has-sub");
                let submenu = menuItem.closest(".slide-menu");

                // Add active class to clicked menu item
                menuItem.classList.add("active");

                // Activate parent slide
                if (parentSlide) {
                    parentSlide.classList.add("active");
                }

                // If inside a submenu, activate its parent has-sub
                if (parentHasSub) {
                    parentHasSub.classList.add("active", "open");

                    // Also add 'active' class to the submenu
                    if (submenu) {
                        submenu.classList.add("active");
                    }
                }
            }
        });

        // Click event for submenu toggle behavior
        menuItems.forEach((menuItem) => {
            menuItem.addEventListener("click", function (event) {
                let menuItemHref = this.getAttribute("href");
                let parentSlide = this.closest(".slide");
                let parentHasSub = this.closest(".has-sub");
                let submenu = this.nextElementSibling;

                // Allow normal navigation for real links
                if (menuItemHref && !menuItemHref.startsWith("javascript:void(0)")) {
                    return;
                }

                event.preventDefault(); // Prevent navigation for submenus

                // Remove active/open classes from all elements
                document.querySelectorAll(".side-menu__item").forEach((el) => el.classList.remove("active"));
                document.querySelectorAll(".slide").forEach((el) => el.classList.remove("active"));
                document.querySelectorAll(".slide-menu").forEach((el) => el.classList.remove("active"));
                document.querySelectorAll(".has-sub").forEach((el) => el.classList.remove("open", "active"));

                // Activate the clicked menu item
                this.classList.add("active");

                // Activate parent slide
                if (parentSlide) {
                    parentSlide.classList.add("active");
                }

                // Activate parent 'has-sub' and submenu
                if (parentHasSub) {
                    parentHasSub.classList.add("active", "open");

                    if (submenu) {
                        submenu.classList.add("active");
                    }
                }
            });
        });
    });
</script>
@stack('scripts')
