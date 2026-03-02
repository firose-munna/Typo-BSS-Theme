/**
 * BSS Theme - Mega Menu Interactions
 * Desktop: hover with delay, close on outside click
 * Mobile: accordion toggle with body scroll lock
 */

const BSS_BREAKPOINT = 1280;

const body = document.body;
const header = document.querySelector('.bss-header');
const mobileToggle = document.querySelector('.JS_bss-mobile-toggle');
const menu = document.getElementById('bss-navigation');
const megamenuTriggers = document.querySelectorAll('.JS_bss-megamenu-trigger');
const navListItems = document.querySelectorAll('.bss-header__nav-list-item--has-megamenu');

if (header && menu) {

    const isDesktop = () => window.innerWidth >= BSS_BREAKPOINT;

    let hoverOpenTimeout = null;
    let hoverCloseTimeout = null;
    let currentOpenMenu = null;

    // -------------------------------------------------------------------------
    // Utility: Open / Close a mega menu
    // -------------------------------------------------------------------------
    function openMegaMenu(navItem) {
        if (currentOpenMenu && currentOpenMenu !== navItem) {
            closeMegaMenu(currentOpenMenu);
        }
        const megamenu = navItem.querySelector('.bss-megamenu');
        if (!megamenu) return;

        megamenu.classList.add('bss-megamenu--open');
        megamenu.setAttribute('aria-hidden', 'false');
        navItem.classList.add('bss-header__nav-list-item--megamenu-open');

        const trigger = navItem.querySelector('.JS_bss-megamenu-trigger');
        if (trigger) trigger.setAttribute('aria-expanded', 'true');

        currentOpenMenu = navItem;
    }

    function closeMegaMenu(navItem) {
        const megamenu = navItem.querySelector('.bss-megamenu');
        if (!megamenu) return;

        megamenu.classList.remove('bss-megamenu--open');
        megamenu.setAttribute('aria-hidden', 'true');
        navItem.classList.remove('bss-header__nav-list-item--megamenu-open');

        const trigger = navItem.querySelector('.JS_bss-megamenu-trigger');
        if (trigger) trigger.setAttribute('aria-expanded', 'false');

        if (currentOpenMenu === navItem) {
            currentOpenMenu = null;
        }
    }

    function closeAllMegaMenus() {
        navListItems.forEach(item => closeMegaMenu(item));
        currentOpenMenu = null;
    }

    // -------------------------------------------------------------------------
    // Desktop: Hover with delay
    // -------------------------------------------------------------------------
    navListItems.forEach(navItem => {
        navItem.addEventListener('mouseenter', () => {
            if (!isDesktop()) return;

            clearTimeout(hoverCloseTimeout);
            hoverOpenTimeout = setTimeout(() => {
                openMegaMenu(navItem);
            }, 100);
        });

        navItem.addEventListener('mouseleave', () => {
            if (!isDesktop()) return;

            clearTimeout(hoverOpenTimeout);
            hoverCloseTimeout = setTimeout(() => {
                closeMegaMenu(navItem);
            }, 250);
        });
    });

    // Desktop: Prevent link click on menu triggers (navigate on second click)
    megamenuTriggers.forEach(trigger => {
        trigger.addEventListener('click', (e) => {
            if (!isDesktop()) return;

            const navItem = trigger.closest('.bss-header__nav-list-item--has-megamenu');
            if (!navItem) return;

            const megamenu = navItem.querySelector('.bss-megamenu');
            if (megamenu && !megamenu.classList.contains('bss-megamenu--open')) {
                e.preventDefault();
                openMegaMenu(navItem);
            }
            // If already open, allow normal navigation
        });
    });

    // Desktop: Close on outside click
    document.addEventListener('click', (e) => {
        if (!isDesktop()) return;
        if (!currentOpenMenu) return;
        if (e.target.closest('.bss-header__nav-list-item--has-megamenu')) return;

        closeAllMegaMenus();
    });

    // Desktop: Close on Escape key
    document.addEventListener('keydown', (e) => {
        if (e.key === 'Escape') {
            closeAllMegaMenus();

            // Also close mobile menu
            if (!isDesktop() && menu.classList.contains('bss-header__menu--open')) {
                closeMobileMenu();
            }
        }
    });

    // -------------------------------------------------------------------------
    // Mobile: Toggle and accordion
    // -------------------------------------------------------------------------
    function openMobileMenu() {
        menu.classList.add('bss-header__menu--open');
        mobileToggle.setAttribute('aria-expanded', 'true');
        body.classList.add('bss-body--menu-open');
    }

    function closeMobileMenu() {
        menu.classList.remove('bss-header__menu--open');
        mobileToggle.setAttribute('aria-expanded', 'false');
        body.classList.remove('bss-body--menu-open');
        closeAllMegaMenus();
    }

    if (mobileToggle) {
        mobileToggle.addEventListener('click', () => {
            if (isDesktop()) return;

            if (menu.classList.contains('bss-header__menu--open')) {
                closeMobileMenu();
            } else {
                openMobileMenu();
            }
        });
    }

    // Mobile: Accordion toggle for mega menus
    megamenuTriggers.forEach(trigger => {
        trigger.addEventListener('click', (e) => {
            if (isDesktop()) return;
            e.preventDefault();

            const navItem = trigger.closest('.bss-header__nav-list-item--has-megamenu');
            if (!navItem) return;

            const megamenu = navItem.querySelector('.bss-megamenu');
            if (!megamenu) return;

            if (megamenu.classList.contains('bss-megamenu--open')) {
                closeMegaMenu(navItem);
            } else {
                closeAllMegaMenus();
                openMegaMenu(navItem);
            }
        });
    });

    // -------------------------------------------------------------------------
    // Resize: Reset state when crossing breakpoint
    // -------------------------------------------------------------------------
    let lastWasDesktop = isDesktop();

    window.addEventListener('resize', () => {
        const nowDesktop = isDesktop();

        if (nowDesktop !== lastWasDesktop) {
            closeAllMegaMenus();

            if (nowDesktop) {
                menu.classList.remove('bss-header__menu--open');
                body.classList.remove('bss-body--menu-open');
                if (mobileToggle) mobileToggle.setAttribute('aria-expanded', 'false');
            }

            lastWasDesktop = nowDesktop;
        }
    });
}
