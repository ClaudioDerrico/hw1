
const toTopList= document.querySelectorAll(".contenuto a");
for(toTop of toTopList)
toTop.addEventListener('click',backToTop)

function backToTop(){
    window.scrollTo(0,0);
    document.querySelector('#accedi').classList.add('blink_text');
}

