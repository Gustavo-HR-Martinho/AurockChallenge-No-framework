// Render all posts
const postContainer = $('#postsContainer')
const renderPosts = () => {
    $.get('./app/routes.php', {
        'action': 'getPosts'
    }).done((response) => {
        let posts = JSON.parse(response)
        console.log('Posts:', posts)

        posts.forEach(post => { 
            postContainer.prepend(
            `<div class="post" id="${post.id}">
                <h2 class="post-title">${post.title}</h2>
                <p class="post-content">${post.content}</p>
                <hr>
                <h3>Comentários:</h3>
                <div class="${'post-comments-'+post.id}">
                    Publicar novo comentário
                    <input type="hidden" name="post_id" id="post_id" value="${post.id}">
                    <input type="text" name="authorname" id="${'authorname'+post.id}" placeholder="Nome">
                    <textarea name="comment-content" id="${'comment-content'+post.id}" cols="100" rows="5" placeholder="Comentário..."></textarea>
                    <button onclick="createComments(${post.id})">Enviar comentário</button>
                </div>
            </div>
            <hr>`)
            
            post.comments.forEach(comment => {
                $('.post-comments-'+post.id).prepend(
                `<div class="comment">
                    <h4 class="comment-title">${comment.authorname}</h4>
                    <p class="comment-content">${comment.content}</p>
                </div>
                <hr>`)
            });
        })
    })
}

renderPosts()