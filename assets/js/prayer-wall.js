jQuery(function ($) {
    function loadPrayerRequests() {
        // var search = $('#prayer-search').val().trim();
        var search = ($('#prayer-search').val() || '').trim();

        const filters = $('.filter-checkbox:checked').map(function () {
            return $(this).val();
        }).get();
        if (search.length > 0 && search.length < 3) {
            $('#prayer-request-list').html('<p>Please enter at least 3 characters.</p>');
            return;
        }

        $.ajax({
            url: prayerWallAjax.ajax_url,
            type: 'POST',
            data: {
                action: 'load_prayer_requests',
                nonce: prayerWallAjax.nonce,
                search: search,
                filters: filters
            },
            beforeSend: function () {
                $('#prayer-request-list').html('<div class="loading"></div>');
            },
            success: function (response) {
                $('#prayer-request-list').html(response);
            }
        });
    }
    function debounce(func, delay) {
        let timeout;
        return function () {
            clearTimeout(timeout);
            timeout = setTimeout(func, delay);
        };
    }

    const debouncedSearch = debounce(loadPrayerRequests, 300);
    loadPrayerRequests();
    $('#prayer-search').on('input', debouncedSearch);
    $('.filter-checkbox').on('change', function () {
        loadPrayerRequests();
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

    // // Toggle filter dropdown on filter button click
    // $('#filterButton').click(function () {
    //     $('.filter-wrapper--dropdown').fadeToggle(100);
    // });


    // // Hide filter dropdown when the close button is clicked
    // $('.filter-wrapper--dropdown .close-btn').click(function () {
    //     $('.filter-wrapper--dropdown').fadeOut(100);
    // });


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

    // Toggle comment box
    $(document).on('click', '.comment-btn', function () {
        $(this).siblings('.comment-box').slideToggle();
    });

    // Close comment box
    $(document).on('click', '.comment-box .close-btn', function () {
        $(this).closest('.comment-box').slideUp();
    });

    // Toggle share box
    $(document).on('click', '.share-btn', function () {
        $(this).siblings('.social-share-box').slideToggle();
    });
    $(document).on('click', '.social-share-box .close-btn', function () {
        $(this).closest('.social-share-box').slideUp();
    });

    // content show more and less
    $(document).on("click", ".expand-text-btn", function () {
        var requestText = $(this).closest(".prayer-card--request").find(".request-text");
        requestText.toggleClass("expandable");

        if (requestText.hasClass("expandable")) {
            requestText.css({
                "-webkit-line-clamp": "initial",
                "max-height": "none"
            });
            $(this).html('Read Less <i class="fa fa-chevron-up"></i>');
        } else {
            requestText.css({
                "-webkit-line-clamp": "7",
                "max-height": "170px"
            });
            $(this).html('Read More <i class="fa fa-chevron-down"></i>');
        }
    });


    // change icon and text when click pray button
    $(document).on('click', '.pray-btn', function () {
        $(this).html('<img src="http://mysight.test/wp-content/uploads/2025/06/prayer-hand-icon.png" class="img-fluid" alt="Prayer Icon">Prayed');
        $(this).addClass('active');
    });
    $(document).on('click', '.group-pray-btn', function () {
        $(this).html('<img src="http://mysight.test/wp-content/uploads/2025/06/prayer-hand-icon.png" class="img-fluid" alt="Prayer Icon">Group Prayed');
        $(this).addClass('active');
    });



    // submt prayer_count and show total prayer_count

    $(document).on('submit', '.prayer-action-form', function (e) {

        e.preventDefault();
        var form = $(this);
        var data = form.serialize();

        $.post(prayerWallAjax.ajax_url, data, function (response) {
            if (response.success) {
                loadPrayerRequests();
            } else {
                alert(response.data.message);
            }
        });
    });




});




// Facebook share function
function shareOnFacebook(url) {
    window.open('https://www.facebook.com/sharer/sharer.php?u=' + encodeURIComponent(url), '_blank', 'width=600,height=400');
}

// Instagram doesn't have a direct share API, so we'll just open the URL
function shareOnInstagram(url) {
    // Note: Instagram doesn't support direct sharing from web, this will just open the URL
    window.open('https://www.instagram.com/', '_blank');
}

// Twitter share function
function shareOnTwitter(text, url) {
    window.open('https://twitter.com/intent/tweet?text=' + encodeURIComponent(text) + '&url=' + encodeURIComponent(url), '_blank', 'width=600,height=400');
}

// LinkedIn share function
function shareOnLinkedIn(url) {
    window.open('https://www.linkedin.com/sharing/share-offsite/?url=' + encodeURIComponent(url), '_blank', 'width=600,height=400');
}