let setUPToolTip=function(){
    let tooltip= "Before you click the search button you have to enter student's id that you want to update or delete.";
    let toolTipElements=Array.from(document.querySelectorAll('#searchButton')); //querySelectorAll(".nav-link-wrapper"))
    //let toolTipElements=document.getElementById('searchButton'); //querySelectorAll(".nav-link-wrapper"))
    let toolTipDiv= document.querySelector('.div-tooltip');
    let timer;
    let displayTooltip=function(e){
        toolTipDiv.innerHTML=tooltip;
        toolTipDiv.style.top=e.pageY + 'px';
        toolTipDiv.style.left=e.pageX + 'px';
        fadein(toolTipDiv);
    };
    let fadeout=function(elem){
        let op=1;
        if(!timer){
            timer=setInterval(function(){
                if(op<=0.1){
                    clearInterval(timer);
                    timer=null;
                    elem.style.opacity=0;
                    elem.style.display='none';
                }
                elem.style.opacity=op;
                op-=op*0.1;
            },10);
        }  
    };
    let fadein=function(elem){
        let op=0.1;
        elem.style.display='block';
        let timer=setInterval(function(){
            if(op>=1){
                clearInterval(timer);
            }
            elem.style.opacity=op;
            op+=op*0.1;
        },10);
    }
    toolTipElements.forEach(function(element){
        let timeout
        element.addEventListener('mouseenter',function(e){
            timeout=setTimeout(function(){
                displayTooltip(e);
            },400)
        });
        element.addEventListener('mouseleave',function(e){
            clearTimeout(timeout)
            fadeout(toolTipDiv);
        })
    })
}
setUPToolTip();