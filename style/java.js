var url = document.getElementById("onurl");
var url1 = document.getElementById("onurl1");
var link = document.getElementById("urlbox");

url.addEventListener("click", function(){
    time = setTimeout(function(){
        link.style.bottom= "-115px";
        url.style.display= "none";
        url1.style.display= "block";
        
        
    }, 200)
    
})

url1.addEventListener("click", function(){
    time = setTimeout(function(){
        link.style.bottom= "0px";
        url.style.display= "block";
        url1.style.display= "none";
    }, 200)
    
})

var rs = document.getElementById("onsum");
var rs1 = document.getElementById("onsum1");
var sub = document.getElementById("result");

rs.addEventListener("click", function(){
    time = setTimeout(function(){
        sub.style.bottom= "10px";
        rs.style.display= "none";
        rs1.style.display= "block";
        
        
    }, 200)
    
})

rs1.addEventListener("click", function(){
    time = setTimeout(function(){
        sub.style.bottom= "-135px";
        rs.style.display= "block";
        rs1.style.display= "none";
    }, 200)
    
})

