function fetchQuestions(id){
    $.ajax({
        url: "/api/getComments/" + id,
        type:"GET",
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success:function(comments){
            renderComments(comments);
            console.log(comments);
        },
        error: function(error) {
         console.log(error);
        }
    });
}

function renderComments(comments){
        comments.forEach(comment => {
            
            parent_post = document.getElementById('comment' + comment.parent_post);
            parent_post.innerHTML += `
            <div class="comment" id="comment${comment.id}">

                <h3>${comment.name}</h3>
                <p>${comment.blog}</p>
                <p>${comment.created_at}</p>
                <button id="btn${comment.id}"class="respond">Svara</button>

            </div>`;
            if(comment.childs.length > 0){
                renderComments(comment.childs);
            }
        });
}

fetchQuestions(window.location.pathname.substring(7));

$(document).on('click', '.respond', function() {
    document.getElementById("responseWrapper").style.display = "inline";
    document.getElementById('responseForm').addEventListener('submit', (e)=>{
        e.preventDefault();
        document.getElementById('responseParent').value = this.id.substring(3);
        document.getElementById("responseForm").submit();
    })
});
