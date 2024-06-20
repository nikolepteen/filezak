var count = 0;
document.getElementById("myButton").onclick = function(){
    count++;
    if (count % 2 == 0) {
        document.getElementById("demo").innerHTML = "";
    } else {
        //создаем новый элемент img
        var img = document.createElement("img");
        //устанавливаем источник изобр
        img.src = "image/click.png";
        //добавляем изобр в параграф
        document.getElementById("demo").appendChild(img);  
    }
}