console.log('tww-dashboard.js loaded');

const state = {
    hameMenuClicked: false,
}

const setState = (key, value) => {
    state[key] = value;
}

const getEl = (el) => document.getElementById(el);

const initSidebar = () => {
    const dashHamContainer = getEl('dash-ham-container');
    const dashOpenIcon = getEl('ham-open');
    const dashCloseIcon = getEl('ham-close');
    const sidebar = getEl('dashboard-sidebar');
    const sideBarBuddy = getEl('sidebar-buddy');

    if(dashCloseIcon) {
        dashCloseIcon.addEventListener('click', function() {
            dashHamContainer.classList.remove('dash-ham-container--is-open');
            sidebar.classList.remove('dashboard-sidebar--is-open');
            sideBarBuddy.classList.remove('sidebar-buddy--is-open');
            sidebar.classList.add('dashboard-sidebar--is-closed');
            sideBarBuddy.classList.add('sidebar-buddy--is-closed');
            setState('hameMenuClicked', true);
        });
    }

    if(dashOpenIcon) {  
        dashOpenIcon.addEventListener('click', function() {
            dashHamContainer.classList.add('dash-ham-container--is-open');
            sidebar.classList.add('dashboard-sidebar--is-open');
            sideBarBuddy.classList.add('sidebar-buddy--is-open');
            sidebar.classList.remove('dashboard-sidebar--is-closed');
            sideBarBuddy.classList.remove('sidebar-buddy--is-closed');
            setState('hameMenuClicked', true);
        });
    }
}

const initBrowserResize = () => {
    const dashHamContainer = getEl('dash-ham-container');
    const sidebar = getEl('dashboard-sidebar');
    const sideBarBuddy = getEl('sidebar-buddy');

    window.addEventListener('resize', function() {
        if(window.innerWidth >= 768 && false === state.hameMenuClicked) {
            dashHamContainer.classList.remove('dash-ham-container--is-open');
            sidebar.classList.remove('dashboard-sidebar--is-open');
            sideBarBuddy.classList.remove('sidebar-buddy--is-open');
        }
    });
}

(function() {
    initSidebar();
})();