var DatatablesBasicPaginations = {
    init: function () {
        $("#m_table_1").DataTable({
            pagingType: "full_numbers",
        });
    },
};
jQuery(document).ready(function () {
    DatatablesBasicPaginations.init();
});
