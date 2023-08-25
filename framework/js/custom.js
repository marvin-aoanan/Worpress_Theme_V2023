jQuery(document).ready(function($){
    // Custom jQuery functions
});

// Function to toggle class when a button click
function btnToggleClick(btn, targetElement) {
    btn.addEventListener('click', function(evt) {
        evt.preventDefault();
        this.classList.toggle('is-active');
        targetElement.forEach((targetElement) => {
            targetElement.classList.toggle('is-active');
        });
       
    });
}
// Implement btnToggleClick()
var btn = document.querySelector(".nav-main__btn");
var targetElements = document.querySelectorAll("html, body, #main, #navbar");
btnToggleClick(btn, targetElements);

// Function to get element's height dynamically
function getElementHeight(element) {
    let heights = [];
    let unit = "px"
    for (let x=0; x < element.length; x++) {   
        elemHeight = element[x].clientHeight;
        elemName = element[x].nodeName.toLowerCase();
        heights.push(elemName + "-height: " + elemHeight + unit);
    }
    console.log(heights);
    return heights;
}
//Implement getElementHeight()
var elements = document.querySelectorAll("header, #footer");
var getHeight = getElementHeight(elements);

// Set new style in the head
function setNewStyle() {
    let elementsHeight = "";
    for(let x = 0; x<getHeight.length; x++) {
        elementsHeight += "--" + getHeight[x] + ";\n";
    }
    var style = document.createElement("style");
    document.head.appendChild(style);
    style.sheet.insertRule(`:root { ${elementsHeight} }`, 0);
    console.log(elementsHeight);
}setNewStyle();


// Sticky Function
// When the user scrolls the page, execute myFunction
window.onscroll = function() {
    stickIt();
};

// Get the header position
var navbar = document.getElementById("header");
var stickyPos = navbar.offsetTop;

// Add the sticky class to the navbar when you reach its scroll position. Remove "sticky" when you leave the scroll position
function stickIt() {
  if (window.scrollY > stickyPos) {
    navbar.classList.add("is-stickIt");
  } else {
    navbar.classList.remove("is-stickIt");
  }
}