//  document.addEventListener('DOMContentLoaded', function () {
//             const searchInput = document.getElementById('prayerRoomSearch');
//             const items = document.querySelectorAll('.prayer-room-item');
//             const noResults = document.getElementById('noPrayerRoomsMessage');

//             searchInput.addEventListener('input', function () {
//                 const searchTerm = searchInput.value.trim().toLowerCase();
//                 let visibleCount = 0;

//                 items.forEach(item => {
//                     const title = item.querySelector('h3').textContent.toLowerCase();
//                     const content = item.querySelector('p').textContent.toLowerCase();
//                     const match = title.includes(searchTerm) || content.includes(searchTerm);

//                     const show = (searchTerm.length < 3 || match);
//                     item.style.display = show ? '' : 'none';

//                     if (show) visibleCount++;
//                 });

//                 noResults.style.display = (searchTerm.length >= 3 && visibleCount === 0) ? 'block' : 'none';
//             });

//             document.querySelectorAll('.download-with-count').forEach(button => {
//                 button.addEventListener('click', function (e) {
//                     const postId = this.dataset.postId;
//                     const downloadUrl = this.href;
//                     window.location.href = downloadUrl;
//                     fetch('<?php echo admin_url('admin-ajax.php'); ?>', {
//                         method: 'POST',
//                         headers: {
//                             'Content-Type': 'application/x-www-form-urlencoded'
//                         },
//                         body: 'action=increment_download_count&post_id=' + postId
//                     })
//                         .then(response => response.json())
//                         .then(data => {
//                             if (data.success) {
//                                 const counter = this.closest('.prayer-room-cards').querySelector('.document-count');
//                                 if (counter) {
//                                     counter.textContent = data.data.new_count;
//                                 }
//                             }
//                         });
//                     e.preventDefault();
//                 });
//             });



//         });


// prayer-room.js

document.addEventListener('DOMContentLoaded', function () {
    const searchInput = document.getElementById('prayerRoomSearch');
    const items = document.querySelectorAll('.prayer-room-item');
    const noResults = document.getElementById('noPrayerRoomsMessage');

    if (searchInput) {
        searchInput.addEventListener('input', function () {
            const searchTerm = searchInput.value.trim().toLowerCase();
            let visibleCount = 0;

            items.forEach(item => {
                const title = item.querySelector('h3').textContent.toLowerCase();
                const content = item.querySelector('p').textContent.toLowerCase();
                const match = title.includes(searchTerm) || content.includes(searchTerm);

                const show = (searchTerm.length < 3 || match);
                item.style.display = show ? '' : 'none';

                if (show) visibleCount++;
            });

            if (noResults) {
                noResults.style.display = (searchTerm.length >= 3 && visibleCount === 0) ? 'block' : 'none';
            }
        });
    }

    document.querySelectorAll('.download-with-count').forEach(button => {
        button.addEventListener('click', function (e) {
            const postId = this.dataset.postId;
            const downloadUrl = this.href;

            window.location.href = downloadUrl;

            fetch(prayerRoomData.ajax_url, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded'
                },
                body: 'action=increment_download_count&post_id=' + postId
            })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        const counter = button.closest('.prayer-room-cards').querySelector('.document-count');
                        if (counter) {
                            counter.textContent = data.data.new_count;
                        }
                    }
                });

            e.preventDefault();
        });
    });
});
