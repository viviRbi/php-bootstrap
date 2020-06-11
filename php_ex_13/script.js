const drags = document.getElementsByClassName("dragable");
const dragsPrio = document.getElementsByClassName("dragable-priority")
const dragsPro = document.getElementsByClassName("dragable-progress")
const drops = document.querySelectorAll(".dropable");
let dragged='';
let dragged2='';
let dragged3='';

dragDrop(drags, dragged);
dragDrop(dragsPrio, dragged2);
dragDrop(dragsPro, dragged3);

function dragDrop(dragItems, drg){
    for (let i = 0; i<dragItems.length; i++){
        dragItems[i].addEventListener('dragstart', function(){
            drg = dragItems[i]
        })
        dragItems[i].addEventListener('dragend', function(){
            drg = '';
        })
        for(let j =0; j<drops.length; j++){
            drops[j].addEventListener('dragover', function (e){
                e.preventDefault()
            })
            drops[j].addEventListener('dragenter',function(e){
                e.preventDefault()
            })
            drops[j].addEventListener('drop',function(){
                if(drg.innerText ==="Complete"){
                    drops[j].classList.add("linethrough")
                }
                this.append(drg)
            })
        }
    }
}

