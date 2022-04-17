let pallete,clr,brd,fr,bc;
function theme(color,border,front,back){
    if(color=='#F5F5F5') document.documentElement.style.setProperty("--text",'#000000')
    else document.documentElement.style.setProperty("--text",'white')

    document.documentElement.style.setProperty("--main",color)
        var color2=back+'50';
    document.documentElement.style.setProperty("--main2",color2)
    document.documentElement.style.setProperty("--main3",border)
    document.documentElement.style.setProperty("--front",front)
    document.documentElement.style.setProperty("--back",back)

    var pallete=[color,border,front,back];
    savetheme(pallete);
}
function savetheme(pallete){
    const pallet=JSON.stringify(pallete)
    window.localStorage.setItem('theme', pallet)
}
function readtheme(){
    //console.log(window.localStorage.getItem('theme'))
    return JSON.parse(window.localStorage.getItem('theme'));
    
}
$(document).ready(function(){
    //clr='#527445';
    pallete=readtheme();
    theme(pallete[0],pallete[1],pallete[2],pallete[3]);

    let list = document.querySelectorAll('.color');

    function activeLink(){
        list.forEach((item) => item.classList.remove('active'));
        this.classList.add('active');
    }
    list.forEach((item) => item.addEventListener('click',activeLink));
})
