const drags = document.getElementsByClassName("dragable");
const dragsPrio = document.getElementsByClassName("dragable-priority");
const drops = document.querySelectorAll(".dropable");
let dragged=null;

dragDrop(drags)
dragDrop(dragsPrio)

function dragDrop(dragItems){
    console.log("--")
    for (let i = 0; i<dragItems.length; i++){
        dragItems[i].addEventListener('dragstart', function(){
            dragged = dragItems[i]
        })
        dragItems[i].addEventListener('dragend', function(){
            dragged = null;
        })
        for(let j =0; j<drops.length; j++){
            drops[j].addEventListener('dragover', function (e){
                e.preventDefault()
            })
            drops[j].addEventListener('dragenter',function(e){
                e.preventDefault()
            })
            drops[j].addEventListener('drop',function(){
                this.append(dragged)
                if(dragged.classList.contains('dragable-priority')){
                    drops[j].classList.add("linethrough")
                  
                }else{
                    
                }
            })
        }
    }
}
