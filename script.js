/**
 * Switches the active visibility of page sections and navigation styling.
 * @param {string} pageId - The ID of the section to show.
 * @param {HTMLElement} element - The menu item that was clicked.
 */
function showPage(pageId, element) {
    // 1. Hide all sections
    document.querySelectorAll('.page-section').forEach(p => {
        p.classList.remove('active');
    });

    // 2. Show the targeted section
    const target = document.getElementById(pageId);
    if (target) {
        target.classList.add('active');
    }

    // 3. Update the header title based on pageId
    document.getElementById('current-page-title').innerText = pageId.toUpperCase().replace(/-/g, ' ');
    
    // 4. Update the active class for menu items
    document.querySelectorAll('.nav-item').forEach(i => {
        i.classList.remove('active');
    });
    
    // Ensure only top-level nav-items are marked as active
    if (element && element.classList.contains('nav-item')) {
        element.classList.add('active');
    }
}