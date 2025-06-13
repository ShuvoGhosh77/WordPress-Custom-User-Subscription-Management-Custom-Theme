jQuery(function ($) {

    // Toggle filter dropdown on filter button click
    $('#filterButton').click(function () {
        $('.filter-wrapper--dropdown').fadeToggle(100);
    });


    // Hide filter dropdown when the close button is clicked
    $('.filter-wrapper--dropdown .close-btn').click(function () {
        $('.filter-wrapper--dropdown').fadeOut(100);
    });
    // Update filter count and its visibility
    $('.filter-checkbox').change(function () {
        var filterCount = $('.filter-checkbox:checked').length;
        $('.filter-count').text(filterCount);
        if (filterCount > 0) {
            $('.filter-count').css('display', 'flex');
        } else {
            $('.filter-count').css('display', 'none');
        }
    });


    // Submit comment via AJAX
    $(document).on('submit', '.prayer-comment-form', function (e) {
        e.preventDefault();
        var form = $(this);
        var data = form.serialize();

        $.post(prayerWallAjax.ajax_url, data, function (response) {
            if (response.success) {
                // alert(response.data.message);
                form.closest('.comment-box').find('textarea').val('');
                loadPrayerRequests(); // Reload to show new comment count
            } else {
                alert(response.data.message);
            }
        });
    });



    const $checkboxes = $('.filter-checkbox');
    const $searchInput = $('#testimonySearch');
    const $cards = $('.testimony-item');
    const $filterCount = $('.filter-count');
    const $noResultsMessage = $('#noTestimoniesMessage');

    function filterTestimonies() {
        const searchText = $searchInput.val().trim().toLowerCase();
        const filters = $checkboxes.filter(':checked').map(function () {
            return $(this).val();
        }).get();

        const today = new Date();
        const todayStr = today.toISOString().split('T')[0];

        const yesterday = new Date(today);
        yesterday.setDate(today.getDate() - 1);
        const yesterdayStr = yesterday.toISOString().split('T')[0];

        const oneWeekAgo = new Date(today);
        oneWeekAgo.setDate(today.getDate() - 7);

        const oneMonthAgo = new Date(today);
        oneMonthAgo.setMonth(today.getMonth() - 1);

        let visibleCount = 0;

        $cards.each(function () {
            const $card = $(this);
            const text = $card.data('content').toLowerCase();
            const dateStr = $card.data('date');
            const postDate = new Date(dateStr);

            let show = true;

            if (filters.length > 0) {
                show = false;

                if (filters.includes('recent') && (dateStr === todayStr || dateStr === yesterdayStr)) {
                    show = true;
                }
                if (filters.includes('week') && postDate >= oneWeekAgo) {
                    show = true;
                }
                if (filters.includes('month') && postDate >= oneMonthAgo) {
                    show = true;
                }
            }

            if (searchText.length >= 3 && !text.includes(searchText)) {
                show = false;
            }

            $card.toggle(show);
            if (show) visibleCount++;
        });

        $filterCount.text(filters.length);
        $noResultsMessage.toggle(visibleCount === 0);
    }

    $checkboxes.on('change', filterTestimonies);
    $searchInput.on('input', filterTestimonies);



});






// document.addEventListener('DOMContentLoaded', function () {
//     const checkboxes = document.querySelectorAll('.filter-checkbox');
//     const searchInput = document.getElementById('testimonySearch');
//     const cards = document.querySelectorAll('.testimony-item');
//     const filterCount = document.querySelector('.filter-count');
//     const noResultsMessage = document.getElementById('noTestimoniesMessage');

//     function filterTestimonies() {
//         const searchText = searchInput.value.trim().toLowerCase();
//         const filters = Array.from(checkboxes)
//             .filter(cb => cb.checked)
//             .map(cb => cb.value);

//         const today = new Date();
//         const todayStr = today.toISOString().split('T')[0];

//         const yesterday = new Date(today);
//         yesterday.setDate(today.getDate() - 1);
//         const yesterdayStr = yesterday.toISOString().split('T')[0];

//         const oneWeekAgo = new Date(today);
//         oneWeekAgo.setDate(today.getDate() - 7);

//         const oneMonthAgo = new Date(today);
//         oneMonthAgo.setMonth(today.getMonth() - 1);

//         let visibleCount = 0;

//         cards.forEach(card => {
//             const text = card.getAttribute('data-content').toLowerCase();
//             const dateStr = card.getAttribute('data-date');
//             const postDate = new Date(dateStr);

//             let show = true;

//             if (filters.length > 0) {
//                 show = false;

//                 if (filters.includes('recent') && (dateStr === todayStr || dateStr === yesterdayStr)) {
//                     show = true;
//                 }
//                 if (filters.includes('week') && postDate >= oneWeekAgo) {
//                     show = true;
//                 }
//                 if (filters.includes('month') && postDate >= oneMonthAgo) {
//                     show = true;
//                 }
//             }

//             if (searchText.length >= 3 && !text.includes(searchText)) {
//                 show = false;
//             }

//             card.style.display = show ? '' : 'none';

//             if (show) visibleCount++;
//         });

//         // Update filter count
//         filterCount.textContent = filters.length;

//         // Show or hide the "no results" message
//         if (visibleCount === 0) {
//             noResultsMessage.style.display = 'block';
//         } else {
//             noResultsMessage.style.display = 'none';
//         }
//     }

//     checkboxes.forEach(cb => cb.addEventListener('change', filterTestimonies));
//     searchInput.addEventListener('input', filterTestimonies);
// });


// document.addEventListener('DOMContentLoaded', function () {
//     const checkboxes = document.querySelectorAll('.filter-checkbox');
//     const searchInput = document.getElementById('testimonySearch');
//     const cards = document.querySelectorAll('.testimony-item');
//     const filterCount = document.querySelector('.filter-count');
//     const noResultsMessage = document.getElementById('noTestimoniesMessage');

//     function filterTestimonies() {
//         const searchText = searchInput.value.trim().toLowerCase();
//         const filters = Array.from(checkboxes)
//             .filter(cb => cb.checked)
//             .map(cb => cb.value);

//         const today = new Date();
//         const todayStr = today.toISOString().split('T')[0];

//         const yesterday = new Date(today);
//         yesterday.setDate(today.getDate() - 1);
//         const yesterdayStr = yesterday.toISOString().split('T')[0];

//         const oneWeekAgo = new Date(today);
//         oneWeekAgo.setDate(today.getDate() - 7);

//         const oneMonthAgo = new Date(today);
//         oneMonthAgo.setMonth(today.getMonth() - 1);

//         let visibleCount = 0;

//         cards.forEach(card => {
//             const text = card.getAttribute('data-content').toLowerCase();
//             const dateStr = card.getAttribute('data-date');
//             const postDate = new Date(dateStr);

//             let show = true;

//             if (filters.length > 0) {
//                 show = false;

//                 if (filters.includes('recent') && (dateStr === todayStr || dateStr === yesterdayStr)) {
//                     show = true;
//                 }
//                 if (filters.includes('week') && postDate >= oneWeekAgo) {
//                     show = true;
//                 }
//                 if (filters.includes('month') && postDate >= oneMonthAgo) {
//                     show = true;
//                 }
//             }

//             if (searchText.length >= 3 && !text.includes(searchText)) {
//                 show = false;
//             }

//             card.style.display = show ? '' : 'none';

//             if (show) visibleCount++;
//         });

//         // Update filter count
//         filterCount.textContent = filters.length;

//         // Show or hide the "no results" message
//         if (visibleCount === 0) {
//             noResultsMessage.style.display = 'block';
//         } else {
//             noResultsMessage.style.display = 'none';
//         }
//     }

//     checkboxes.forEach(cb => cb.addEventListener('change', filterTestimonies));
//     searchInput.addEventListener('input', filterTestimonies);
// });
