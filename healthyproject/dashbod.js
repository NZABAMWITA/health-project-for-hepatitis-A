const allsideMenu = document.qwerySelectorAll('#sidebar .side-menu.top li a');

allsideMenu.forEach(item=> {
    const li = item.parentElement;
    
    item.addEventlistener('click', function (){
        allsideMenu.forEach(i=>{
            i.parentElement.classList.remove('active');
        })
        li.classlist.add('active');
    })
});


//TOGGLE SIDEBAR
const menuBar = document.qwerySelector('#content nav .bx.bx-menu');
const sidebar = document.getElementById('sidebar');

menuBar.addEventListener('click', function () {
    sidebar.classList.toggle('hide');
})



    
    const searchButton = document.qwerySelector('#content nav form .form-input button');
    const searchButtonIcon = document.qwerySelector('#content nav form .form-input button.bx');
    const searchForm = document.qwerySelector('#content nav form');

    searchButton.addEventListener('click', function (e) {
        if(window.innerWidth < 576) {
        e.preventDefault();
        searchForm.classList.toggle('show');
        if(searchForm.classList.contains('show')) {
            searchButtonIcon.classList.replace('bx-search', 'bx-x');
        } else {
            searchButtonIcon.classList.replace('bx-x','bx-search')
        }
        }
    })


    if(window.innerWidth < 768) {
        sidebar.classList.add('hide')
    } else if(window.innerWidth > 576) {
        searchButtonIcon.classList.replace('bx-x', 'bx-search');
        searchForm.classList.remove('show');
        
    }

    window.addEventlistener('resize', function () {
        if(this.innerWidth > 576) {
            searchButtonIcon.classList.replace('bx-x', 'bx-search');
            searchButton.classList.remove('show');
        }
    })