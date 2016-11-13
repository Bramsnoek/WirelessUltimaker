var preventUploads = true;

$(function() {
    $.get("https://api.fhict.nl/groups?access_token=" + accesToken, function(data) {
        for(let item of data){
            if(item.groupName.toUpperCase().indexOf("DELTA") !== -1){
                preventUploads = false;
            }
        }
         if(preventUploads){
                document.getElementById('formWrapper').remove()
                document.getElementById('title').remove()
                return;
            }
    });
});

function removeDeltaError() {
    document.getElementById('noDeltaError').remove()
}

 function resetFileReader(){ 
    cleared = true
    reader.result = ""
}
                        
function closeSuccesMessage(){
    document.getElementById('scsmessage').style.display="none"
}