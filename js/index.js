var arrayName;
if(localStorage.getItem("productContainer") == null)
{
    arrayName = [];
}else
{
    arrayName =JSON.parse(localStorage.getItem("productContainer"));
}
var inps = document.getElementsByClassName("form-control");

function addProduct()
{
    var productName = document.getElementById("productName").value;
    var productModel = document.getElementById("productModel").value;
    var productSalary = document.getElementById("productSalary").value;
    var productDesc = document.getElementById("productDesc").value;

    var productOb = 
    {
        productName : productName,
        productModel : productModel,
        productSalary : productSalary,
        productDesc : productDesc
    }
    arrayName.push(productOb);
    localStorage.setItem("productContainer",JSON.stringify(arrayName));
    formReuse();
}
function displayData()
{
    var temp =``;
    for(let i  = 0; i<arrayName.length;i++)
    {
        temp +=`
        <div class="col-md-4">
            <div class="products">
                <img src="images/3.jpg" class="img-fluid">
                <h2>`+arrayName[i].productName+`<span class="ml-3 badge badge-primary">`+arrayName[i].productModel+`</span></h2>
                <p>`+arrayName[i].productDesc+`</p>
                <h2 class="sal bg-dark" >`+arrayName[i].productSalary+`</h2>
             </div>
         </div> `;
    }
    document.getElementById("productsRow").innerHTML=temp;
}
function formReuse()
{
    for(var i = 0 ; i < inps.length ; i++)
    {
        inps[i].value="";
    }

}

var images =  Array.from(document.querySelectorAll(".content img"));
var box = document.getElementById("showLayout");
var imgIndex = 0;
for(let i = 0 ; i<images.length; i++)
{
    images[i].addEventListener("click",function(e){
        box.style.display = "flex";
        var imgSrc = e.target.src ;
        var imgIndex = images.indexOf(e.target);
        box.firstElementChild.style.backgroundImage = "url("+imgSrc+")";
    })
}

var close = document.getElementById("close");
var next = document.getElementById("next");
var prev = document.getElementById("prev");

close.addEventListener("click",function(){
    box.style.display = "none";
})

next.addEventListener("click",function(){
    imgIndex ++;
    if(imgIndex == images.length)
    {
        imgIndex = 0;
    }
    box.firstElementChild.style.backgroundImage = "url("+images[imgIndex].src+")";
})
prev.addEventListener("click",function(){
    imgIndex --;
    if(imgIndex < 0)
    {
        imgIndex = images.length-1;
    }
    box.firstElementChild.style.backgroundImage = "url("+images[imgIndex].src+")";
});

let aboutOffset = $("#About").offset().top;
$(window).scroll(function(){
    let wScroll = $(window).scrollTop();
    if(wScroll > aboutOffset)
    {
        $("nav").addClass("bg-black");
        $(".btnset").fadeIn(1000);
        $("#userSearch").fadeOut(100);
    }else
    {
        $("nav").removeClass("bg-black");
        $(".btnset").fadeOut(1000);
        $("#userSearch").fadeIn(100);
    }
})

$(".btnset").click(function(){
    $("body,html").animate({scrollTo:'0'},3000);
})

$(".sone").click(function(){
    let aHref = $(this).attr("href");
    $("body,html").animate({scrollTop:$(`${aHref}`).offset().top},2000)
})
/*
         search
let searchContent =  Array.from(document.querySelectorAll("section"));
function searchProduct(term){
    for(let i = 0 ; i < searchContent.length ; i++)
    {
        if(searchContent[i].id.toLowerCase().includes(term.toLowerCase()))
        {
           for what???????????
        }
    }
}
*/


$("#spanColorO").css("background-color","#009E65");
$("#spanColorT").css("background-color","#416EBE");
$("#spanColorTh").css("background-color","#E38334");
$("#spanColorF").css("background-color","#28327F");
$("#spanColorFi").css("background-color","#B5B5B5");
$("#spanColorS").css("background-color","#BE0231");

$(".spanClass").click(function(){
    let col = $(this).css("background-color");
    $("h2").css("color",col);
});

$("#color-item-span").click(function(){
   $(".option-box").toggle();
});
/*
    change Color 
$("#color-item-span").click(function(){
    let xm = $(".option-box").outerWidth(true);
    if($(".options-container").css("left")=="0px")
    {
        $(".options-container").animate({left:`${xm}px`},1000)
    }
    else
    {
        $(".options-container").animate({left:`0px`},1000)
    }
});*/


let bgGround = document.getElementById("bgground");

$(".Bg-img").click(function(){
    let bgSrc = $(this).attr("src");
    bgGround.style.backgroundImage="url("+bgSrc+")";
})


/*
     Random BackGround 
let bggSrc = ["3.jpg","me.jpg","mm.jpeg","mmm.jpg"];
setInterval(()=>{
    let bgRandom = Math.floor(Math.random() * bggSrc.length);
    bgGround.style.backgroundImage='url("images/'+bggSrc[bgRandom]+'")';

},10000)
*/