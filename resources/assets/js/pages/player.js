var qwest = require('qwest');

module.exports = {
    load: function() {
        var $grid = $('.dynmap-grid figure a');
        var $image = $('.dynmap-grid figure img');

        var centerGrid = function() {
            var height = $grid.width() / 3 + ($image.width() / 5);

            $grid.css('position', 'static');
            $grid.css('margin-top', '-' + height + 'px');
        };

        $(window).resize(centerGrid);
        centerGrid();
        window.setTimeout(centerGrid, 1000);

        var $bio = $('#bio-text');
        var bio_editing = false;
        var bio_text = '';
        var $bio_icon = $('#btn-edit-profile .fa');

        $('#btn-edit-profile').click(function() {
            if(bio_editing) {
                closeEditBio();
            } else {
                openEditBio();
            }
        });

        var openEditBio = function() {
            bio_editing = true;
            bio_text = $bio.text();
            var text = bio_text;
            if(bio_text.trim() == 'This player has not set their bio.' || bio_text.trim() =='You have not made a bio! Click edit to create one:') {
                text = '';
            }
            $bio.html('<textarea id="input-bio" class="form-control input-sm">' + text + '</textarea>');
            $bio_icon.removeClass('fa-pencil').addClass('fa-chevron-right');
            $('#input-bio').keyup(function (e) {
                if (e.keyCode == 27) {
                    $bio.text(bio_text);
                    $bio_icon.removeClass('fa-chevron-right').addClass('fa-pencil');
                    bio_editing = false;
                }
            });
            $('#input-bio').focus();
        };

        var closeEditBio = function() {
            var value = $('#input-bio').val();
            if(value != '') {
                saveBio(value);
                $bio.text(bio_text);
            }
            bio_editing = false;
        };

        var saveBio = function(bio) {
            qwest.post($('#update_route').text(), {
                    bio: bio,
                    _token: $('#csrf').text()
                })
                .then(function() {
                    $bio_icon.removeClass('fa-pencil').addClass('fa-check');

                    window.setTimeout(function() {
                        $bio_icon.removeClass('fa-check').addClass('fa-pencil');
                    }, 600);
                });
        };
    }
};