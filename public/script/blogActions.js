var modalAddComment;
var modalEditBlog;
var blogId;

function refreshComments(comments) {
    var selector = '.blog-record[data-blog-id="' + blogId + '"] .blog-content .blog-comments';
    var divComments = $(selector);
    divComments.children().remove();
    comments.forEach(function(comment) {
        var divComment = $('<div class="blog-comment">')
            .append($('<div class="blog-comment-text">')
                .html(comment.Text))
            .append($('<div class="clearfix">'))
            .append($('<div class="blog-comment-footer">')
                .html(comment.Fio + ' ' + comment.Date));
        divComments.append(divComment);
    });
}

function refreshBlog(blogHtml) {
    var selector = '.blog-record[data-blog-id="' + blogId + '"]';
    var blogRecord = $(selector);
    blogRecord.children().remove();
    blogRecord.html(blogHtml);
}

function afterRenderPopupAddComment() {
    $('#send-comment-button').prop('disabled', true);
    $('#comment-text').on('keyup', function() {
        if(!$(this).val().length) {
            $('#send-comment-button').prop('disabled', true);
        } else {
            $('#send-comment-button').prop('disabled', false);
        }
    });
    $('#send-comment-button').on('click', function () {
        modalAddComment.iziModal("close");
        $("body").append(
            $('<iframe>')
                .attr('name', 'frame')
                .css({display: 'none'})
                .on('load', function () {
                    var result = this.contentWindow.document.body.innerHTML;
                    if(!result) {
                        return false;
                    }
                    refreshComments(JSON.parse(result));
                }));
        var data = '<root><comment>' + $('#comment-text').val() + '</comment><blogId>' + blogId + '</blogId></root>';
        frame.location.replace("/addComment?xml=" + encodeURIComponent(data));
    });
}

function afterRenderPopupEditBlog() {
    $('#save-changes-button').on('click', function () {
        modalEditBlog.iziModal("close");
        var request = new XMLHttpRequest();
        request.open('POST', '/editBlog', true);
        request.onreadystatechange = function () {
            if (request.readyState == 4) {
                if (request.status == 200) {
                    refreshBlog(request.responseText);
                } else {
                    alert(request.statusText);
                }
            }
        };
        request.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        var body = "blogId=" + encodeURIComponent(blogId);
        body += "&title=" + encodeURIComponent($('#blog-title').val());
        body += "&message=" + encodeURIComponent($('#blog-message').val());
        request.send(body);
    });
}

$(function() {
    modalAddComment = $('#modal-add-comment');
    modalAddComment.iziModal({
        closeButton: true,
        title: 'Добавление комментария',
        headerColor: '#286090',
        afterRender: afterRenderPopupAddComment
    });

    modalEditBlog = $('#modal-edit-blog');
    modalEditBlog.iziModal({
        closeButton: true,
        title: 'Редактирование блога',
        headerColor: '#286090',
        afterRender: afterRenderPopupEditBlog
    });

   $('.add-comment-action').on('click', function (event) {
       event.preventDefault();
       blogId = $(this).attr('data-blog-id');
       modalAddComment.iziModal('open');
   });

   $('.edit-blog-action').on('click', function (event) {
       event.preventDefault();
       blogId = $(this).attr('data-blog-id');
       modalEditBlog.iziModal('open');
   });
});