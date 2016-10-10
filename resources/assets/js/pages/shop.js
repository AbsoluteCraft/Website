module.exports = {
    load: function () {

        if(window.location.hash) {
            $(window.location.hash).modal('show');
        }

        $('.btn-donate').popover({
            html: true,
            placement: 'top',
            title: 'Enter the amount',
            content: function() {
                return (
                    '<form action="' + $('#shop-donate-url').text() + '" method="post">' +
                    '<input type="hidden" name="_token" value="' + $('#csrf').text() + '">' +
                        '<input type="hidden" name="rank" value="' + $(this).data('rank') + '">' +
                        '<div class="input-group">' +
                            '<span class="input-group-addon" id="donate-currency">£</span>' +
                            '<input type="text" name="amount" class="form-control" placeholder="Amount" value="5.00" aria-describedby="donate-currency">' +
                        '</div>' +
                        '<button type="submit" class="btn btn-success">Confirm</button>' +
                    '</form>'
                );
            }
        });

        $('main.shop .modal')
            .on('show.bs.modal', function() {
                window.location.hash = this.id;
            }).on('hidden.bs.modal', function() {
                window.location.hash = '';
            });
    }
};