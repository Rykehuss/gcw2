var firstItem = 0;
var items = [];

function itemWidth() {
    var disp = items[0].style["display"];
    items[0].style["display"] = "flex";
    var width = items[0].offsetWidth;
    items[0].style["display"] = disp;
    return width;
}

function sliderRedraw() {
    items = document.querySelectorAll('.partner');
    var container = document.querySelector('.slider');
    var arrow = document.querySelectorAll('.arrow');
    var itemsNum = Math.floor((container.offsetWidth - 2 * arrow[0].offsetWidth - 70) / itemWidth());
    console.log(itemsNum);

    for (i = 0; i < items.length; i++) {
        var order = items.length - firstItem + i;
        if (order >= items.length) {
            order = order - items.length;
        }
        items[i].style["order"] = order;
    }
    for (i = 0; i < items.length; i++) {
        if (parseInt(items[i].style["order"]) < itemsNum) {
            items[i].style["display"] = "flex";
        } else {
            items[i].style["display"] = "none";
        }

    }
}

function next() {
    console.log('next() call');
    console.log('firstItem:' + firstItem);
    console.log('items.length:' + items.length);

    if (items.length > 0) {
        firstItem = (firstItem + 1) % items.length;
        console.log('firstItem:' + firstItem);
    }
    sliderRedraw();
}

window.onload = function() {
    items = document.querySelectorAll('.partner');

    var nextArrow = document.querySelector('.arrow-next');
    nextArrow.onclick = function() {
        next();
    };
    sliderRedraw();
};

window.onresize = function() {
    sliderRedraw();
};