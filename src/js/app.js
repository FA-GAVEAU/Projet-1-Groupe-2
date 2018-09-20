var main = function() {
    $('.btn').click(function() {
      //var post = $('.guest-msg').val();
      var name = $('.name').val();
      var location = $('.location').val();
      var message = $('.message').val();
      $('.btn').addClass('disabled');

      //$('<li>').prependTo('.messages').text(name);
      $('.messages').prepend('<li><strong>Name: </strong>' + name + ' (<em>' + location + '</em>)<div><strong>Message: </strong>' + message + '</div></li>');
      $('.name').val('');
      $('.location').val('');
      $('.message').val('');
      $('.counter').text(140);
    });

    $('.message').keyup(function() {
        var postLength = $(this).val().length;
        var charactersLeft = 140 - postLength;

        $('.counter').text(charactersLeft);
        $('.btn').removeClass('disabled');
        });

      $('.btn').addClass('disabled');
    };

    $(document).ready(main);
