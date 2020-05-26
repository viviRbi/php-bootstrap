// check all checkbox, take all values

function checkAll(self){
    let allValues = []
    const checkboxes = document.getElementsByName('check[]');
    for(let i=0; i< checkboxes.length; i++){
        checkboxes[i].checked = self.checked;
        allValues.push(checkboxes[i].value)
        self.value = allValues;
    }
}
