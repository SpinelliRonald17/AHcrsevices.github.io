document.querySelector(".box1").addEventListener("click", box_selected1);
document.querySelector(".box2").addEventListener("click", box_selected2);
document.querySelector(".box3").addEventListener("click", box_selected3);
document.querySelector(".box4").addEventListener("click", box_selected4);
document.querySelector(".box5").addEventListener("click", box_selected5);
document.querySelector(".box6").addEventListener("click", box_selected6);


//declarando variables

//box1

box1 = document.querySelector(".box1");
check_bg1 = document.querySelector(".box1 .check");
icon_check1 = document.querySelector(".box1 .fa-check");

//box2

box2 = document.querySelector(".box2");
check_bg2 = document.querySelector(".box2 .check");
icon_check2 = document.querySelector(".box2 .fa-check");

//box3

box3 = document.querySelector(".box3");
check_bg3 = document.querySelector(".box3 .check");
icon_check3 = document.querySelector(".box3 .fa-check");

//box4

box4 = document.querySelector(".box4");
check_bg4 = document.querySelector(".box4 .check");
icon_check4 = document.querySelector(".box4 .fa-check");

//box5

box5 = document.querySelector(".box5");
check_bg5 = document.querySelector(".box5 .check");
icon_check5 = document.querySelector(".box5 .fa-check");

//box6

box6 = document.querySelector(".box6");
check_bg6 = document.querySelector(".box6 .check");
icon_check6 = document.querySelector(".box6 .fa-check");

value_box = 0;

function box_selected1 () {
    box2.classList.remove('box-selected');
    check_bg2.classList.remove('check-selected');
    icon_check2.classList.remove('icon-check');

    box3.classList.remove('box-selected');
    check_bg3.classList.remove('check-selected');
    icon_check3.classList.remove('icon-check');

    box4.classList.remove('box-selected');
    check_bg4.classList.remove('check-selected');
    icon_check4.classList.remove('icon-check');

    box5.classList.remove('box-selected');
    check_bg5.classList.remove('check-selected');
    icon_check5.classList.remove('icon-check');

    box6.classList.remove('box-selected');
    check_bg6.classList.remove('check-selected');
    icon_check6.classList.remove('icon-check');

    box1.classList.toggle('box-selected');
    check_bg1.classList.toggle('check-selected');
    icon_check1.classList.toggle('icon-check');

    value_box = 1;
    console.log(value_box);
}

function box_selected2 () {

    box1.classList.remove('box-selected');
    check_bg1.classList.remove('check-selected');
    icon_check1.classList.remove('icon-check');

    box3.classList.remove('box-selected');
    check_bg3.classList.remove('check-selected');
    icon_check3.classList.remove('icon-check');

    box4.classList.remove('box-selected');
    check_bg4.classList.remove('check-selected');
    icon_check4.classList.remove('icon-check');

    box5.classList.remove('box-selected');
    check_bg5.classList.remove('check-selected');
    icon_check5.classList.remove('icon-check');

    box6.classList.remove('box-selected');
    check_bg6.classList.remove('check-selected');
    icon_check6.classList.remove('icon-check');

    box2.classList.toggle('box-selected');
    check_bg2.classList.toggle('check-selected');
    icon_check2.classList.toggle('icon-check');

    value_box = 2;
    console.log(value_box);
}

function box_selected3 () {
    box1.classList.remove('box-selected');
    check_bg1.classList.remove('check-selected');
    icon_check1.classList.remove('icon-check');

    box2.classList.remove('box-selected');
    check_bg2.classList.remove('check-selected');
    icon_check2.classList.remove('icon-check');

    box4.classList.remove('box-selected');
    check_bg4.classList.remove('check-selected');
    icon_check4.classList.remove('icon-check');

    box5.classList.remove('box-selected');
    check_bg5.classList.remove('check-selected');
    icon_check5.classList.remove('icon-check');

    box6.classList.remove('box-selected');
    check_bg6.classList.remove('check-selected');
    icon_check6.classList.remove('icon-check');

    box3.classList.toggle('box-selected');
    check_bg3.classList.toggle('check-selected');
    icon_check3.classList.toggle('icon-check');
    

    value_box = 3;
    console.log(value_box);
}

function box_selected4 () {
    box1.classList.remove('box-selected');
    check_bg1.classList.remove('check-selected');
    icon_check1.classList.remove('icon-check');

    box2.classList.remove('box-selected');
    check_bg2.classList.remove('check-selected');
    icon_check2.classList.remove('icon-check');

    box3.classList.remove('box-selected');
    check_bg3.classList.remove('check-selected');
    icon_check3.classList.remove('icon-check');

    box5.classList.remove('box-selected');
    check_bg5.classList.remove('check-selected');
    icon_check5.classList.remove('icon-check');

    box6.classList.remove('box-selected');
    check_bg6.classList.remove('check-selected');
    icon_check6.classList.remove('icon-check');

    box4.classList.toggle('box-selected');
    check_bg4.classList.toggle('check-selected');
    icon_check4.classList.toggle('icon-check');

    value_box = 4;
    console.log(value_box);
}

function box_selected5 () {
    box1.classList.remove('box-selected');
    check_bg1.classList.remove('check-selected');
    icon_check1.classList.remove('icon-check');

    box2.classList.remove('box-selected');
    check_bg2.classList.remove('check-selected');
    icon_check2.classList.remove('icon-check');

    box3.classList.remove('box-selected');
    check_bg3.classList.remove('check-selected');
    icon_check3.classList.remove('icon-check');

    box4.classList.remove('box-selected');
    check_bg4.classList.remove('check-selected');
    icon_check4.classList.remove('icon-check');

    box6.classList.remove('box-selected');
    check_bg6.classList.remove('check-selected');
    icon_check6.classList.remove('icon-check');

    box5.classList.toggle('box-selected');
    check_bg5.classList.toggle('check-selected');
    icon_check5.classList.toggle('icon-check');

    value_box = 5;
    console.log(value_box);
}

function box_selected6 () {
    box1.classList.remove('box-selected');
    check_bg1.classList.remove('check-selected');
    icon_check1.classList.remove('icon-check');

    box2.classList.remove('box-selected');
    check_bg2.classList.remove('check-selected');
    icon_check2.classList.remove('icon-check');

    box3.classList.remove('box-selected');
    check_bg3.classList.remove('check-selected');
    icon_check3.classList.remove('icon-check');

    box4.classList.remove('box-selected');
    check_bg4.classList.remove('check-selected');
    icon_check4.classList.remove('icon-check');

    box5.classList.remove('box-selected');
    check_bg5.classList.remove('check-selected');
    icon_check5.classList.remove('icon-check');

    box6.classList.toggle('box-selected');
    check_bg6.classList.toggle('check-selected');
    icon_check6.classList.toggle('icon-check');

    value_box = 6;
    console.log(value_box);
}











                                //Buscador de contenido


//Ejecutando funciones
document.getElementById("icon-search").addEventListener("click", mostrar_buscador);
document.getElementById("cover-ctn-search").addEventListener("click", ocultar_buscador);

//Declarando variables
bars_search =       document.getElementById("ctn-bars-search");
cover_ctn_search =  document.getElementById("cover-ctn-search");
inputSearch =       document.getElementById("inputSearch");
box_search =        document.getElementById("box-search");


//Funcion para mostrar el buscador
function mostrar_buscador(){

    bars_search.style.top = "80px";
    cover_ctn_search.style.display = "block";
    inputSearch.focus();

    if (inputSearch.value === ""){
        box_search.style.display = "none";
    }

}

//Funcion para ocultar el buscador
function ocultar_buscador(){

    bars_search.style.top = "-10px";
    cover_ctn_search.style.display = "none";
    inputSearch.value = "";
    box_search.style.display = "none";

}


//Creando filtrado de busqueda

document.getElementById("inputSearch").addEventListener("keyup", buscador_interno);

function buscador_interno(){


    filter = inputSearch.value.toUpperCase();
    li = box_search.getElementsByTagName("li");

    //Recorriendo elementos a filtrar mediante los "li"
    for (i = 0; i < li.length; i++){

        a = li[i].getElementsByTagName("a")[0];
        textValue = a.textContent || a.innerText;

        if(textValue.toUpperCase().indexOf(filter) > -1){

            li[i].style.display = "";
            box_search.style.display = "block";

            if (inputSearch.value === ""){
                box_search.style.display = "none";
            }

        }else{
            li[i].style.display = "none";
        }

    }



}
