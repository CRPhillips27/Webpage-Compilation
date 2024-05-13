$(document).ready(function () {
    var hitWall = false; 
    var gameStarted = false; 
    function resetMaze() {
        $('.boundary').removeClass('youlose');
        hitWall = false;
        $('#status').text('Move your mouse over the "S" to begin.');
        gameStarted = false;
    }
    $('.boundary').on('mouseenter', function () {
        if (gameStarted) {
            hitWall = true;
            $('.boundary').addClass('youlose');
            $('#status').text('You lose! Click the "S" to try again.');
        }
    });
    $('#start').on('click', function () {
        resetMaze();
        gameStarted = true;
    });
    $('#end').on('mouseenter', function () {
        if (!hitWall && gameStarted) {
            $('#status').text('You win! Click the "S" to play again.');
        }
    });
    $('#maze').on('mouseleave', function () {
        if (gameStarted) {
            hitWall = true;
            $('.boundary').addClass('youlose');
            $('#status').text('You lose! Click the "S" to try again.');
        }
    });
});
