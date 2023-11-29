function checkform()
{
    var f =document.forms["theform"].elements;
    var cansubmit =true;
    for(var i=0;i<f.length;i++)
    {
        if(f[i].value.length==0)cansubmit =false;

    }
    document.getElementById('submitbutton').disabled=!cansubmit;

}
function resetText()
{
    var textBoxes =document.getElementsByTagName('input');
    for (var ii=0;ii<tb.length;ii++)
    {
        if(tb[ii].type=='text')
        {
            tb[ii].value='';
        }
        else{
            
        }

    }
}