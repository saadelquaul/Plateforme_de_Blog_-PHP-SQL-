const addArticleBtn = document.querySelector('.add-article');
const articlesList = document.querySelector('.articles');
const script = document.createElement('script');
addArticleBtn.addEventListener('click', function() {
    articlesList.remove();
    
fetch('../pages/blogForm.php')
.then(response => response.text())
.then(data => {
    const div = document.createElement('div');
    div.classList.add('articleForm');
    div.innerHTML = data;
    document.querySelector('.blog-feed').appendChild(div);
    const articelForm = document.querySelector('form');
      articelForm.onsubmit = () => {
        const content = document.querySelector('input[name=content]');
        content.value = quill.root.innerHTML;}

})
.catch(error => {
    console.error(error);});
    
    
});


//##########

const editBtn = document.querySelectorAll('.edit-article');
editBtn.forEach(btn => {
    
    
    btn.addEventListener('click',function(){
        console.log(1);
        const article = document.querySelectorAll('article[data-id="'+btn.getAttribute('data-id')+'"]');
        
    })
})




// article.forEach(element => {
//     element.remove();
// });