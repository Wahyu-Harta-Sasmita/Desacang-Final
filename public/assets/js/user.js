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
