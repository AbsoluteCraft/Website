module.exports = {
    load: function () {
        $('#table-users').DataTable({
            paging: false,
            order: [[2, 'desc']],
            columnDefs: [
                {
                    targets: [0, 5],
                    orderable: false
                },
                {
                    targets: 4,
                    type: 'date'
                }
            ]
        });
    }
};