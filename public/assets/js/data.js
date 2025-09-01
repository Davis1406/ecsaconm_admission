$(function () {
    var applicationsTable = $("#applicationstable").DataTable({
        "responsive": true,
        "lengthChange": true,
        "autoWidth": false,
        "paging": true,
        "buttons": ["copy", "csv", "excel", "pdf", "colvis"],
        "columns": [
            { "visible": true }, // ID
            { "visible": true }, // Name
            { "visible": true }, // Email
            { "visible": true }, // Country
            { "visible": true }, // Programme
            { "visible": true }, // Status
            { "visible": true }  // Action
        ]
    }).buttons().container().appendTo('#applicationstable_wrapper .col-md-6:eq(0)');

    // Function to initialize popovers for action buttons
    function initPopovers() {
        $(document).on('click', '.action-icon', function () {
            $(this).popover({
                placement: 'right',
                trigger: 'focus',
                html: true,
                content: $(this).data('content')
            }).popover('toggle');
            return false;
        });
    }
    // Initialize popovers on page load
    initPopovers();

    // Reinitialize popovers after each draw for both tables
    applicationsTable.on('draw', function () {
        initPopovers();
    });

});
