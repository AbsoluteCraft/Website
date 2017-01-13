module.exports = {
    load: function () {
        $('.motd-icon-input').keyup(function() {
            $(this).next().attr('class', 'fa fa-' + $(this).val());
        });

        $('.btn-edit-motd').click(function() {
            $('#edit-motd').modal('show');
        });
    }
};