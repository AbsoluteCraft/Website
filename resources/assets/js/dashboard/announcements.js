module.exports = {
    load: function () {
        $('#table-announcements').DataTable({
            paging: false,
            order: [[2, 'desc']],
            columnDefs: [
                {
                    targets: 2,
                    type: 'date'
                },
                {
                    target: 3,
                    orderable: false
                }
            ]
        });
    }
};