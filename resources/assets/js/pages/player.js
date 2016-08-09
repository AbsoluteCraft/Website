module.exports = {
    load: function() {
        var $grid = $('.dynmap-grid figure a');
        var $image = $('.dynmap-grid figure img');

        var centerGrid = function() {
            var height = $grid.width() / 3 + ($image.width() / 5);
            console.log($grid, $grid.width(), height);

            $grid.css('position', 'static');
            $grid.css('margin-top', '-' + height + 'px');
        };

        $(window).resize(centerGrid);
        centerGrid();
        window.setTimeout(centerGrid, 1000);
    }
};