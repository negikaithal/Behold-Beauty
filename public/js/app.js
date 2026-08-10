/* ==========================================================================
   Behold Beauty Makeup Studio - Interactive Client Side Engine
   ========================================================================== */

document.addEventListener('DOMContentLoaded', () => {
    // 1. Mobile Navigation Toggle
    const navToggle = document.getElementById('mobileNavToggle');
    const navLinks = document.getElementById('navLinks');

    if (navToggle && navLinks) {
        navToggle.addEventListener('click', () => {
            navLinks.classList.toggle('active');
        });
    }

    // 2. Before & After Drag Comparison Slider
    const baContainer = document.querySelector('.before-after-container');
    if (baContainer) {
        const afterWrapper = baContainer.querySelector('.ba-after-wrapper');
        const sliderHandle = baContainer.querySelector('.ba-slider-handle');
        let isDragging = false;

        const updateSliderPosition = (x) => {
            const rect = baContainer.getBoundingClientRect();
            let offsetX = x - rect.left;
            if (offsetX < 0) offsetX = 0;
            if (offsetX > rect.width) offsetX = rect.width;

            const percentage = (offsetX / rect.width) * 100;
            afterWrapper.style.width = `${percentage}%`;
            sliderHandle.style.left = `${percentage}%`;
        };

        baContainer.addEventListener('mousedown', (e) => {
            isDragging = true;
            updateSliderPosition(e.clientX);
        });

        window.addEventListener('mousemove', (e) => {
            if (!isDragging) return;
            updateSliderPosition(e.clientX);
        });

        window.addEventListener('mouseup', () => {
            isDragging = false;
        });

        // Touch events for mobile
        baContainer.addEventListener('touchstart', (e) => {
            isDragging = true;
            updateSliderPosition(e.touches[0].clientX);
        });

        window.addEventListener('touchmove', (e) => {
            if (!isDragging) return;
            updateSliderPosition(e.touches[0].clientX);
        });

        window.addEventListener('touchend', () => {
            isDragging = false;
        });
    }

    // 3. Gallery Filtering
    const filterBtns = document.querySelectorAll('.filter-btn');
    const galleryItems = document.querySelectorAll('.gallery-item');

    if (filterBtns.length > 0 && galleryItems.length > 0) {
        filterBtns.forEach(btn => {
            btn.addEventListener('click', () => {
                filterBtns.forEach(b => b.classList.remove('active'));
                btn.classList.add('active');

                const filter = btn.getAttribute('data-filter');

                galleryItems.forEach(item => {
                    const category = item.getAttribute('data-category');
                    if (filter === 'All' || category === filter || (filter === 'Before & After' && category === 'Before & After')) {
                        item.style.display = 'block';
                    } else {
                        item.style.display = 'none';
                    }
                });
            });
        });
    }

    // 4. Lightbox Modal
    const lightboxModal = document.getElementById('lightboxModal');
    const lightboxImg = document.getElementById('lightboxImg');
    const lightboxClose = document.getElementById('lightboxClose');

    if (lightboxModal && lightboxImg) {
        galleryItems.forEach(item => {
            item.addEventListener('click', () => {
                const img = item.querySelector('img');
                if (img) {
                    lightboxImg.src = img.src;
                    lightboxModal.classList.add('active');
                }
            });
        });

        if (lightboxClose) {
            lightboxClose.addEventListener('click', () => {
                lightboxModal.classList.remove('active');
            });
        }

        lightboxModal.addEventListener('click', (e) => {
            if (e.target === lightboxModal) {
                lightboxModal.classList.remove('active');
            }
        });
    }

    // 5. Booking Form Category -> Specific Service Dependent Dropdown
    const categorySelect = document.getElementById('service_category');
    const serviceSelect = document.getElementById('specific_service');

    if (categorySelect && serviceSelect && window.beholdServicesData) {
        const updateServiceOptions = () => {
            const selectedCat = categorySelect.value;
            serviceSelect.innerHTML = '<option value="">-- Select Specific Service --</option>';

            if (selectedCat && window.beholdServicesData[selectedCat]) {
                window.beholdServicesData[selectedCat].forEach(srv => {
                    const opt = document.createElement('option');
                    opt.value = srv.name;
                    opt.textContent = `${srv.name} - ₹${srv.price.toLocaleString('en-IN')}`;
                    serviceSelect.appendChild(opt);
                });
            } else if (selectedCat === 'Bridal Package' && window.beholdBridalPackagesData) {
                window.beholdBridalPackagesData.forEach(pkg => {
                    const opt = document.createElement('option');
                    opt.value = pkg.name;
                    opt.textContent = `${pkg.name} - ₹${pkg.price.toLocaleString('en-IN')}`;
                    serviceSelect.appendChild(opt);
                });
            }
        };

        categorySelect.addEventListener('change', updateServiceOptions);

        // Pre-select if pre-filled query param
        if (categorySelect.value) {
            updateServiceOptions();
        }
    }
});
