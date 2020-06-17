(function(){
    var canvas = document.getElementById('stars'),
        ctx = canvas.getContext('2d'),
        H = window.innerHeight,
        W = window.innerWidth;
    $(window).resize(function(){
        canvas.width = W;
        canvas.height = H;        
    })  
    canvas.width = W;
    canvas.height = H;    
    var img = new Image();
    img.src = "img/estrella-04.png";    

    var container = document.getElementById('container');
    container.style.width = W + "px";
    container.style.height = H + "px";    

    var ms = 35;
    var stars = [];
    
    for (var i = 0; i < ms; i++) {
        stars.push({
            x: Math.random() * W,
            y: Math.random() * H,
            r: Math.random() * 35 + 28           
        });
    } 
    
    window.onload = function(){                                   
        function drawStars(){
            ctx.clearRect(0, 0, W, H);
            ctx.beginPath();
            for( var i = 0; i < ms; i++ ){                       
                var s = stars[i];                  
                ctx.drawImage(img,s.x,s.y,s.r,s.r);            
            }
            moveStars();
        }       
        function moveStars(){
            for(var i = 0; i < ms; i++){
                var s = stars[i];            
                s.x += 0.033;
                s.y += 0;                
                if(s.x > W || s.y > H){                    
                    stars[i] = {
                        x: Math.random() * -(W * 0.05),
                        y: Math.random() * H,
                        r: Math.random() * 35 + 18,                        
                    }
                }                
            }
        }
        setInterval(drawStars, 5 );   
    }
}());

