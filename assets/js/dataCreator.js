const createComments = (post_id) => {
    newComment = {
        authorname: $('#authorname'+post_id).val(),
        content: $('#comment-content'+post_id).val()
    }

    $.post('./app/routes.php', {
        action: 'publishComment',
        newComment_authorName: newComment.authorname,
        newComment_content: newComment.content,
        newComment_postId: post_id
    }).done((response) => {
        console.log(`New comment from ${newComment.authorname} created`)
        console.log(response)
        window.location.reload(false)
    })
}

// Publish new post
const publishPost = () => {
    // New post object
    newPost = {
        title: $('#new-post-title').val(),
        content: $('#new-post-content').val()
    }

    // New post request
    $.post('./app/routes.php', {
        action: 'publishPost', // Route action
        newPost_title: newPost.title,
        newPost_content: newPost.content    
    }).done((response) => {
        console.log(`New post published`)
        console.log(response)
        window.location.reload(false)
    })
}