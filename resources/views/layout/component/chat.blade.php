<div class="widget-layout d-none">
    <div class="widget-preview--action">
        <div class="widget-preview--action-text">Gửi tin nhắn</div>
    </div>
    <div class="chat-button chat-button--right">
        <div class="chat-button--unread">2</div>
    </div>
</div>
<div class="widget-chat d-none">
    <div class="widget-preview--header">
        <div class="widget-preview--header-text">Gửi tin nhắn
            <div class="widget-preview--close">&times;</div>
        </div>
    </div>
    <div class="contents">
        <div class="widget-chat-content my-chat">
            <div class="widget-chat-content-text">Hello</div>
        </div>
        <div class="widget-chat-content friend-chat">
            <div class="widget-chat-content-text">Hi</div>
        </div>
    </div>
    <div class="widget-chat-input">
        <form action="" method="post">
            <input type="text" name="chat" id="chat" placeholder="Gửi tin nhắn">
            <button type="button" class="chat-submit disable">Gửi</button>
        </form>
    </div>
</div>
<script>
    $(function () {
        $("#chat").on('keyup', function () {
            var chat = $(this).val();
            if (chat.length > 2) {
                $('.chat-submit').removeClass('disable');
            } else {
                $('.chat-submit').addClass('disable');
            }
        });
        $(".chat-submit").on('click', function () {
            alert(2)
        })
    })
</script>