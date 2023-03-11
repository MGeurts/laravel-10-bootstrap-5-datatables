$(function () {
    /* -------------------------------------------------------------------------------------------- */
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        error: function (jqXHR, textStatus, errorThrown) {
            showToast({
                type: 'error',
                title: 'ERROR ' + jqXHR.status,
                message: errorThrown + " ...<hr/>",
            });
        }
    });
    /* ------------------------------------------- */
    $('select').select2({
        theme: "bootstrap-5",
        minimumResultsForSearch: 31,
        placeholder: "Choose ...",
        language: "en",
    }).on('select2:open', function () {
        document.querySelector('.select2-search__field').focus();
    });
    /* ------------------------------------------- */
    function nthIndex(str, pat, n) {
        var L = str.length,
            i = -1;
        while (n-- && i++ < L) {
            i = str.indexOf(pat, i);
            if (i < 0) break;
        }
        return i;
    }
    /* -------------------------------------------------------------------------------------------- */
});