module.exports = {
    load: function () {
        $('#table-donations').DataTable({
            paging: false,
            order: [[5, 'desc']],
            columnDefs: [
                {
                    targets: [0, 6],
                    orderable: false
                },
                {
                    targets: 5,
                    type: 'date'
                }
            ]
        });
    }
};