function modal_main(page) {
    var content = page;
    var mod_con = document.getElementById(content);
    var btn = document.getElementById('mod-btn');
    var btn1 = document.getElementById('mod-btn1');
    var hr = document.getElementById('hr');
    var vr = document.getElementById('vr');
    var pp = document.getElementById('popup');
    
    function modal() {
        pp.style.display = 'flex';
        time = setTimeout(() => {
            hr.style.width = '80%';
            time = setTimeout(() => {
                hr.style.height = '700px';
                time = setTimeout(() => {
                    vr.style.height = '600px';
                    mod_con.style.display = "block";
                    time = setTimeout(() => {
                        vr.style.width = '90%';
                        window.clearTimeout(time);
                    }, 300)
                }, 300)
            }, 500)
        }, 300)
    }
    
    function close(){
        vr.style.width = '3px';
        time = setTimeout(() => {
            mod_con.style.display = "none";
            vr.style.height = '0px';
            time = setTimeout(() => {
                hr.style.height = '3px';
                time = setTimeout(() => {
                    hr.style.width = '0px';
                    time = setTimeout(() => {
                        pp.style.display = 'none';
                        window.clearTimeout(time);
                    }, 400)
                }, 500)
            }, 200)
        }, 500)
    }
    
    btn1.addEventListener('click', function() {
        close();
    })
        window.addEventListener('click', function(event) {
            if (event.target == pp || event.target == hr) {
                close();
            }
        })

    modal();
}


var card_name = document.getElementById('card-name-box');

function over(n){
    var name = n;
    card_name.value = name;
}

function mout(){
    card_name.value = "";
}






