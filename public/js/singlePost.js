// hämtar alla kommenntarer till en specifik post
function fetchQuestions(id){
    $.ajax({
        url: "/api/getComments/" + id,
        type:"GET",
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success:function(comments){
            renderComments(comments); // renderar kommentarerna
        },
        error: function(error) {
         console.log(error); // vid error log det i konsolen
        }
    });
}
// renderar kommentarerna som html
function renderComments(comments){

        comments.forEach(comment => { // loopar igenom alla kommentarer och renderar dom

            parent_post = document.getElementById('comment' + comment.parent_post); //hämtar parent postens div tag för att kunna rendera kommentaren i rätt div
            parent_post.innerHTML += `
            <div class="comment" id="comment${comment.id}">

                <h3>${comment.name}</h3>
                <p>${comment.blog}</p>
                <p>${comment.created_at}</p>
                <button id="btn${comment.id}"class="respond">Svara</button>

            </div>`;
            //ifall kommentaren har ett eller mer barn så renderas dessa också (recursion)
            if(comment.childs.length > 0){
                renderComments(comment.childs);
            }
        });
}

fetchQuestions(window.location.pathname.substring(7)); // hämtar alla kommentarer till en specifik post med id från url

//vid klick på svara på en kommentar eller blogg inlägget renderas en form för att skriva en kommentar
$(document).on('click', '.respond', function() {
    document.getElementById("responseWrapper").style.display = "inline";
    document.getElementById('responseForm').addEventListener('submit', (e)=>{
        e.preventDefault();
        document.getElementById('responseParent').value = this.id.substring(3);
        document.getElementById("responseForm").submit();
    })
});
