// import Alpine from 'alpinejs'
//
// window.Alpine = Alpine
//
// Alpine.start()

import.meta.glob([
    '../images/**'
]);

document.addEventListener('DOMContentLoaded', function() {
    // Initialize counters
    setTimeout(animateCounters, 500);

    // Initialize login modal
    initLoginModal();

    // Initialize search functionality
    initSearch();

    // Initialize card modal
    initCardModal();
});

// Login Modal Functions
function initLoginModal() {
    // Ensure the modal exists before adding event listeners
    const loginModal = document.getElementById('loginModal');
    if (!loginModal) {
        console.error('Login modal element not found');
        return;
    }

    // Close modal when clicking outside
    loginModal.addEventListener('click', function(e) {
        if (e.target === this) {
            closeLoginModal();
        }
    });

    // Make functions globally available
    window.openLoginModal = openLoginModal;
    window.closeLoginModal = closeLoginModal;
    window.togglePasswordVisibility = togglePasswordVisibility;
}

function openLoginModal() {
    const modal = document.getElementById('loginModal');
    if (modal) {
        modal.classList.remove('hidden');
        document.body.style.overflow = 'hidden';
    }
}

function closeLoginModal() {
    const modal = document.getElementById('loginModal');
    if (modal) {
        modal.classList.add('hidden');
        document.body.style.overflow = '';
    }
}

function togglePasswordVisibility() {
    const passwordInput = document.getElementById('passwordInput');
    const eyeIcon = document.getElementById('eyeIcon');

    if (passwordInput && eyeIcon) {
        if (passwordInput.type === 'password') {
            passwordInput.type = 'text';
            eyeIcon.classList.remove('fa-eye');
            eyeIcon.classList.add('fa-eye-slash');
        } else {
            passwordInput.type = 'password';
            eyeIcon.classList.remove('fa-eye-slash');
            eyeIcon.classList.add('fa-eye');
        }
    }
}

// Search Functionality
function initSearch() {
    const searchTypeBtn = document.getElementById('searchTypeBtn');
    const searchTypeDropdown = document.getElementById('searchTypeDropdown');
    const searchTypeLabel = document.getElementById('searchTypeLabel');
    const searchInput = document.querySelector('.search-container input[type="text"]');

    if (searchTypeBtn && searchTypeDropdown) {
        searchTypeBtn.addEventListener('click', function(e) {
            e.stopPropagation();
            searchTypeDropdown.classList.toggle('hidden');
        });

        if (searchTypeDropdown) {
            searchTypeDropdown.querySelectorAll('.dropdown-item').forEach(item => {
                item.addEventListener('click', function() {
                    const type = this.getAttribute('data-type');
                    if (searchTypeLabel) searchTypeLabel.textContent = type;
                    if (searchInput) searchInput.placeholder = `Search ${type}...`;
                    searchTypeDropdown.classList.add('hidden');
                });
            });
        }
    }

    document.addEventListener('click', function() {
        const dropdown = document.getElementById('searchTypeDropdown');
        if (dropdown) dropdown.classList.add('hidden');
    });
}

// Number Counting Animation
function animateCounters() {
    const counters = document.querySelectorAll('.count-animation');
    const speed = 200; // The lower the faster

    counters.forEach(counter => {
        const target = +counter.getAttribute('data-target').replace(/,/g, '');
        const count = +counter.innerText.replace(/,/g, '');
        const increment = target / speed;

        if (count < target) {
            counter.innerText = Math.ceil(count + increment).toLocaleString();
            setTimeout(animateCounters, 1);
        } else {
            counter.innerText = target.toLocaleString();
        }
    });
}

// Card Modal Functions
function initCardModal() {
    const cardModal = document.getElementById('cardModal');
    if (cardModal) {
        cardModal.addEventListener('click', function(e) {
            if (e.target === this) {
                closeCardModal();
            }
        });
    }

    window.showCardModal = showCardModal;
    window.closeCardModal = closeCardModal;
}

function showCardModal(title, description, icon, count) {
    const modal = document.getElementById('cardModal');
    if (modal) {
        const modalTitle = document.getElementById('modalTitle');
        const modalDescription = document.getElementById('modalDescription');
        const modalIcon = document.getElementById('modalIcon');
        const modalCount = document.getElementById('modalCount');

        if (modalTitle) modalTitle.textContent = title;
        if (modalDescription) modalDescription.textContent = description;
        if (modalIcon) modalIcon.className = icon + ' text-usepmaroon text-5xl mb-6';
        if (modalCount) modalCount.textContent = count;

        modal.style.display = 'flex';
        document.body.style.overflow = 'hidden';
    }
}

function closeCardModal() {
    const modal = document.getElementById('cardModal');
    if (modal) {
        modal.style.display = 'none';
        document.body.style.overflow = '';
    }
}
