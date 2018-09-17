var selectAll=document.getElementById('select-all');
var checkboxs=document.getElementsByTagName('tbody')[0].getElementsByTagName('input');
var deleteAll=document.getElementById("id1");
console.log(deleteAll);
//全选的实现
selectAll.onclick=function(){
    for(var i=0;i<checkboxs.length;i++){
        checkboxs[i].checked=this.checked;
    }
}
for(var i=0;i<checkboxs.length;i++){
    checkboxs[i].onclick=function(){
        var flag=true;
        for(var i=0;i<checkboxs.length;i++){
            if(!checkboxs[i].checked){
                flag=false;
                break;
            }
        }
        selectAll.checked=flag;
    }
}
//批量删除
deleteAll.onclick=function(){
    var values=[];
    for(var i=0;i<checkboxs.length;i++){
       if(checkboxs[i].checked){
           values.push(checkboxs[i].value);
       } 
    }
    this.href=this.href+"?id="+values.join(",");
}

