function openNav() {
    var width = document.getElementById('main-body');
    if(width.offsetWidth<500){
        document.getElementById("mySidenav").style.width = "100%";
    }else{
        document.getElementById("mySidenav").style.width = "500px";
        document.getElementById("main-body").style.marginRight = "500px";
        document.getElementById("main-body").style.filter = "blur(15px)";
    }

}

function closeNav() {
    document.getElementById("mySidenav").style.width = "0";
    document.getElementById("main-body").style.marginRight = "0";
    document.getElementById("main-body").style.filter = "blur(0px)";
}
