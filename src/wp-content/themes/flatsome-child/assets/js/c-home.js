// add btn
jQuery(document).ready(async function ($) {
    const postFetcher = new PostFetcher(".addBtn");
    const posts = await postFetcher.fetch();
    (posts.data ?? []).forEach((post) => {
        const buttonsHTML = `<div class="post-btn">
            <a href="${post?.link_vao_choi ?? "#"
            }" target="_blank" class="button btn-1"><span>Cược ngay</span></a>
            <a href="${post.url}" class="button btn-2"><span>Review</span></a>
            </div>`;
        const tag = $(`.addBtn a[href="${post.url}"]`).closest(".post-item");
        $(buttonsHTML).insertAfter(tag.find(".box-image"));
    });
});


jQuery(document).ready(async function ($) {
    const postFetcher = new PostFetcher(".addBtn2");
    const posts = await postFetcher.fetch();
    (posts.data ?? []).forEach((post) => {
        const buttonsHTML = `<div class="post-btn post-btn-2">
            <a href="${post?.link_vao_choi ?? "#"
            }" target="_blank" class="button btn-1"><span>Cược ngay</span></a>
            <a href="${post.url}" class="button btn-2"><span>Review</span></a>
            </div>`;
        const tag = $(`.addBtn2 a[href="${post.url}"]`).closest(".post-item");
        $(buttonsHTML).insertAfter(tag.find(".box"));
    });
});
jQuery(document).ready(async function ($) {
    const postFetcher = new PostFetcher(".addBtn3");
    const posts = await postFetcher.fetch();
    (posts.data ?? []).forEach((post) => {
        const buttonsHTML = `<div class="post-btn post-btn-2">
            <a href="${post?.link_vao_choi ?? "#"
            }" target="_blank" class="button btn-1"><span>Cược ngay</span></a>
            <a href="${post.url}" class="button btn-2"><span>Xem Review</span></a>
            </div>`;
        const tag = $(`.addBtn3 a[href="${post.url}"]`).closest(".post-item");
        $(buttonsHTML).insertAfter(tag.find(".box-text-inner"));
    });
});

// make header transparent for single blog
jQuery(document).ready(function ($) {
    $('.single-post #header').addClass('transparent');
});
jQuery(document).ready(function ($) {
    $('.search #header').addClass('transparent');
});


// paginate cate the thao
function createCarousel(itemsSelector, prevButtonSelector, nextButtonSelector, itemsPerPage) {
    jQuery(document).ready(function ($) {
        var items = $(itemsSelector);
        var currentPage = 1;
        var numberOfPages = Math.ceil(items.length / itemsPerPage);

        function showCurrentItems() {
            items.hide();
            var start = (currentPage - 1) * itemsPerPage;
            var end = start + itemsPerPage;
            items.slice(start, end).show();
        }

        showCurrentItems();

        $(nextButtonSelector).click(function () {
            if (currentPage < numberOfPages) {
                currentPage++;
                showCurrentItems();
            }
        });

        $(prevButtonSelector).click(function () {
            if (currentPage > 1) {
                currentPage--;
                showCurrentItems();
            }
        });
    });
}
// HOME: SLOTS
createCarousel(
    '.c-cate-the-thao .c-keo-hot .post-item',
    'c-cate-the-thao .stack .button:nth-child(1)',
    'c-cate-the-thao .stack .button:nth-child(2)',
    8);


function setupPagination(itemsSelector, prevButtonSelector, nextButtonSelector, itemsToShow, itemsPerPage) {
    jQuery(document).ready(function ($) {
        var $items = $(itemsSelector);
        var currentIndex = 0;
        function updateItems() {
            $items.hide().each(function () {
                this.className = this.className.replace(/\bshow-\d+\b/g, '');
            });
            $items.slice(currentIndex, currentIndex + itemsToShow).each(function (index) {
                $(this).show().addClass('show-' + (index + 1));
            });
        }
        updateItems();
        function showNextItems() {
            currentIndex += itemsPerPage;
            if (currentIndex + itemsToShow > $items.length) {
                currentIndex = 0;
            }
            updateItems();
        }
        function showPrevItems() {
            currentIndex -= itemsPerPage;
            if (currentIndex < 0) {
                currentIndex = Math.max(0, $items.length - itemsToShow);
            }
            updateItems();
        }
        $(prevButtonSelector).click(function (e) {
            e.preventDefault();
            showPrevItems();
        });
        $(nextButtonSelector).click(function (e) {
            e.preventDefault();
            showNextItems();
        });
    });
}
// HOME: KHUYEN MAI
setupPagination('.c-cate-the-thao .c-keo-hot .post-item', '.c-cate-the-thao .stack .button:nth-child(1)', '.c-cate-the-thao .stack .button:nth-child(2)', 8, 8);

