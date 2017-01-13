module.exports = {
    load: function () {
        $('.motd-icon-input').keyup(function() {
            $(this).next().attr('class', 'fa fa-' + $(this).val());
        });

        $('.btn-edit-motd').click(function() {
            var $tr = $(this).closest('tr');
            $('#input-motd-id').val($tr.data('id'));
            $('#input-motd-message').val($tr.data('message'));
            $('#input-motd-type').val($tr.data('type'));
            $('#input-motd-icon').val($tr.data('icon'));
            $('#input-motd-icon').keyup();

            $('#edit-motd').modal('show');
        });
    }
};