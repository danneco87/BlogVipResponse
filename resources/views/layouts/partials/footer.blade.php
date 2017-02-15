<?php
/**
 * Created by PhpStorm.
 * User: danneco
 * Date: 12-2-17
 * Time: 16:14
 */
?>
<footer class="blog-footer">
    <p>Blog template built for <a href="http://getbootstrap.com">Bootstrap</a> by <a href="https://twitter.com/mdo">@mdo</a>.</p>
    <p>
        <a href="#top" onclick="$('html,body').animate({scrollTop:0},'fast');return false;">Back to top</a>
    </p>
</footer>
<script type="text/javascript">
    $( '.btn.btn-default' ).on( 'submit', function(e) {
        e.preventDefault();
        var postId = $('#postId').val();
        var comment = $('#comment').val();
        $.ajax({
            type: "POST",
            url: host+'/storeComment',
            data: {comment:comment, postId:postId},
            success: function( msg ) {
                $("body").append("<div>"+msg+"</div>");
            }
        })});
</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
