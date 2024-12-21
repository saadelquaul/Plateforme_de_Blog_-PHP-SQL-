const addArticleBtn = document.querySelector('.add-article');
const articlesList = document.querySelector('.articles');
const script = document.createElement('script');
addArticleBtn.addEventListener('click', function() {
    articlesList.remove();
    const div = document.createElement('div');
    div.classList.add('articleForm');
fetch('../pages/blogForm.php')
.then(response => response.text())
.then(select => {
    div.innerHTML = `<form  action="blog-feed.php" method="post">
    <label for="title">Title:</label> 
    <input type="text" id="title" name="title">
    <label for="tags">Tags:</label>
    `+
    select
    +`
    <label for="image">
        IMAGE:
    </label>
    <input type="file" id="image" name="image">
    <label for="content">Content:</label>
    <textarea name="content" id="content" placeholder="Write your toughts here.."></textarea>

    <button type="submit">Submit</button>
</form>`;
      ;
    

})
.catch(error => {
    console.error(error);});
    document.querySelector('.blog-feed').appendChild(div);
    
});


//##########

const editBtn = document.querySelectorAll('.edit-article');
editBtn.forEach(btn => {
    
    
    btn.addEventListener('click',function(){
        const article = document.querySelectorAll('article[data-id="'+btn.getAttribute('data-id')+'"]');
        articlesList.remove();
    const div = document.createElement('div');
    div.classList.add('articleForm');
fetch('../pages/blogForm.php')
.then(response => response.text())
.then(select => {
    div.innerHTML = `<h2>Edit Article</h2>
    <form id="editForm"  action="blog-feed.php" method="post">
    <input type="hidden" name="EditedArticleId" value="`+btn.getAttribute('data-id')+`">
    <label for="title">Title:</label> 
    <input type="text" id="title" name="Editedtitle" value="`+article[0].querySelector('h2').textContent+`">
    <label for="tags">Tags:</label>
    `+
    select 
    +`
    <label for="image">
        IMAGE:
    </label>
    <input type="file" id="image" name="Editedimage" value="`+article[0].querySelector('img').src+`">
    <label for="content">Content:</label>
    <textarea name="Editedcontent" id="content" placeholder="Write your toughts here..">`+article[0].querySelector('.content').textContent+`</textarea>
    <button type="submit">Submit</button>
</form>`;
      ;

})
.catch(error => {
    console.error(error);});
    document.querySelector('.blog-feed').appendChild(div);


        
    })
})




// article.forEach(element => {
//     element.remove();
// });