// Highlight active sidebar item
const currentPath = window.location.pathname.split('/').pop();
const sidebarItems = document.querySelectorAll('.sidebar-item');

sidebarItems.forEach(item => {
    if (item.getAttribute('data-page') + ".html" === currentPath) {
        item.classList.add('bg-gray-700');
    }
});

function toggleForm() {
    const overlay = document.getElementById('formOverlay');
    overlay.classList.toggle('hidden');
}

const toggleSidebar = document.getElementById('toggleSidebar');
const sidebar = document.getElementById('sidebar');
const mainContent = document.getElementById('mainContent');
const profileMenuButton = document.getElementById('profileMenuButton');
const profileMenu = document.getElementById('profileMenu');

// Sidebar toggle
toggleSidebar.addEventListener('click', () => {
    if (sidebar.classList.contains('-translate-x-full')) {
        sidebar.classList.remove('-translate-x-full');
        sidebar.classList.add('translate-x-0');
        mainContent.classList.add('ml-64');
    } else {
        sidebar.classList.add('-translate-x-full');
        sidebar.classList.remove('translate-x-0');
        mainContent.classList.remove('ml-64');
    }
});

// Profile dropdown toggle
profileMenuButton.addEventListener('click', () => {
    profileMenu.classList.toggle('hidden');
});

// Close dropdown when clicking outside
window.addEventListener('click', (e) => {
    if (!profileMenuButton.contains(e.target) && !profileMenu.contains(e.target)) {
        profileMenu.classList.add('hidden');
    }
});

// Data Banjar
const banjarOptions = {
    "Desa Bungkulan": ["Banjar Dinas Alas Harum", "Banjar Dinas Ancak", "Banjar Dinas Badung", "Banjar Dinas Dauh Munduk", "Banjar Dinas Jro Gusti", "Banjar Dinas Jro Wargi", "Banjar Dinas Kubukelod", "Banjar Dinas Pamesan", "Banjar Dinas Punduh Lo", "Banjar Dinas Punduh Sangsit", "Banjar Dinas Sari", "Banjar Dinas Satria", "Banjar Dinas Sema"],
    "Desa Temukus": ["Banjar Bingin Banjah", "Banjar Dinas Labuhan Aji", "Banjar Dinas Pegayaman", "Banjar Dinas Tengah"]
};

const desaSelect = document.getElementById('desa');
const banjarSelect = document.getElementById('banjar');

// Update Banjar options based on selected Desa
desaSelect.addEventListener('change', () => {
    const selectedDesa = desaSelect.value;

    // Clear existing options
    banjarSelect.innerHTML = '<option value="">Pilih Banjar</option>';

    // Add new options
    if (banjarOptions[selectedDesa]) {
        banjarOptions[selectedDesa].forEach(banjar => {
            const option = document.createElement('option');
            option.value = banjar;
            option.textContent = banjar;
            banjarSelect.appendChild(option);
        });
    }
});