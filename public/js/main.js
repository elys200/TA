function slideToggle(t,e,o){0===t.clientHeight?j(t,e,o,!0):j(t,e,o)}function slideUp(t,e,o){j(t,e,o)}function slideDown(t,e,o){j(t,e,o,!0)}function j(t,e,o,i){void 0===e&&(e=400),void 0===i&&(i=!1),t.style.overflow="hidden",i&&(t.style.display="block");var p,l=window.getComputedStyle(t),n=parseFloat(l.getPropertyValue("height")),a=parseFloat(l.getPropertyValue("padding-top")),s=parseFloat(l.getPropertyValue("padding-bottom")),r=parseFloat(l.getPropertyValue("margin-top")),d=parseFloat(l.getPropertyValue("margin-bottom")),g=n/e,y=a/e,m=s/e,u=r/e,h=d/e;window.requestAnimationFrame(function l(x){void 0===p&&(p=x);var f=x-p;i?(t.style.height=g*f+"px",t.style.paddingTop=y*f+"px",t.style.paddingBottom=m*f+"px",t.style.marginTop=u*f+"px",t.style.marginBottom=h*f+"px"):(t.style.height=n-g*f+"px",t.style.paddingTop=a-y*f+"px",t.style.paddingBottom=s-m*f+"px",t.style.marginTop=r-u*f+"px",t.style.marginBottom=d-h*f+"px"),f>=e?(t.style.height="",t.style.paddingTop="",t.style.paddingBottom="",t.style.marginTop="",t.style.marginBottom="",t.style.overflow="",i||(t.style.display="none"),"function"==typeof o&&o()):window.requestAnimationFrame(l)})}

var mainJsInitialized = false;

function setSidebarActive(active) {
    var sidebar = document.getElementById('sidebar');
    if (!sidebar) return;
    if (active) {
        sidebar.classList.add('active');
    } else {
        sidebar.classList.remove('active');
    }
    sessionStorage.setItem('sidebarActive', active ? 'true' : 'false');
}

function toggleSidebar() {
    var sidebar = document.getElementById('sidebar');
    if (!sidebar) return;
    var isActive = sidebar.classList.contains('active');
    setSidebarActive(!isActive);
}

function initSidebarState() {
    var isDesktop = window.innerWidth >= 1200;
    var saved = sessionStorage.getItem('sidebarActive');
    var shouldBeActive = saved !== null ? saved === 'true' : isDesktop;

    // Disable transisi sementara agar tidak flash
    var wrapper = document.querySelector('.sidebar-wrapper');
    if (wrapper) wrapper.style.transition = 'none';

    setSidebarActive(shouldBeActive);

    // Re-enable transisi setelah state diterapkan
    requestAnimationFrame(function() {
        requestAnimationFrame(function() {
            if (wrapper) wrapper.style.transition = '';
            document.documentElement.classList.add('sidebar-ready');
        });
    });
}

function initPerfectScrollbar() {
    if (typeof PerfectScrollbar == 'function') {
        var container = document.querySelector('.sidebar-wrapper');
        if (container && !container._ps) {
            container._ps = new PerfectScrollbar(container, { wheelPropagation: false });
        }
    }
}

document.addEventListener('DOMContentLoaded', function() {
    if (mainJsInitialized) return;
    mainJsInitialized = true;

    initSidebarState();
    initPerfectScrollbar();

    // Submenu toggle
    var sidebarItems = document.querySelectorAll('.sidebar-item.has-sub');
    for (var i = 0; i < sidebarItems.length; i++) {
        sidebarItems[i].querySelector('.sidebar-link').addEventListener('click', function(e) {
            e.preventDefault();
            var submenu = this.closest('.sidebar-item').querySelector('.submenu');
            if (submenu.classList.contains('active')) submenu.style.display = 'block';
            if (submenu.style.display == 'none') submenu.classList.add('active');
            else submenu.classList.remove('active');
            slideToggle(submenu, 300);
        });
    }

    // Event delegation untuk burger & sidebar-hide (elemen di-replace Turbo)
    document.addEventListener('click', function(e) {
        if (e.target.closest('.burger-btn')) toggleSidebar();
        if (e.target.closest('.sidebar-hide')) setSidebarActive(false);
    });

    window.addEventListener('resize', function() {
        if (window.innerWidth >= 1200) {
            setSidebarActive(true);
        } else {
            setSidebarActive(false);
        }
    });
});

// Setiap Turbo navigasi — restore state, jangan reset
document.addEventListener('turbo:load', function() {
    // Re-apply state karena Turbo mungkin swap elemen
    initSidebarState();

    var activeItem = document.querySelector('.sidebar-item.active');
    if (activeItem) activeItem.scrollIntoView(false);
});
