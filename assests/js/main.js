
    let navUl = document.querySelector('.nav-ul')
    let hamburger = document.querySelector('.hamburger')
    let bars = document.querySelectorAll('.hamburger span')
    let isActive = false

    hamburger.addEventListener('click', function() {
        navUl.classList.toggle('active')
        if(!isActive) {
            bars[0].style.transform = 'rotate(45deg)'
            bars[1].style.opacity = '0'
            bars[2].style.transform = 'rotate(-45deg)'
            isActive = true
        } else {
            bars[0].style.transform = 'rotate(0deg)'
            bars[1].style.opacity = '1'
            bars[2].style.transform = 'rotate(0deg)'
            isActive = false
        }
    });
        
    const searchBtnShow = document.getElementById('search-btn-show');
    const searchClose = document.getElementById('search-close');
    const searchSection = document.querySelector('.search-section');

    searchBtnShow.addEventListener('click', ()=>{ 
        searchSection.style.display = "block";
        searchBtnShow.style.display = "none";
    })
    searchClose.addEventListener('click', ()=>{
        searchSection.style.display = "none";
        searchBtnShow.style.display = "block";
    })