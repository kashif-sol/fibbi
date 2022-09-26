var   classes = "",
n = "",
ids = "";
document.body.addEventListener("mouseover", function (r) {
var o = r.target;
o.classList.add("avada-highlight-invalid"), (o.style.cursor = "not-allowed");
});

document.body.addEventListener("mouseout", function (t) {
var e = t.target;
e.classList.remove("avada-highlight"), e.classList.remove("avada-highlight-invalid"), (e.style.cursor = "unset");
});


document.body.addEventListener("click", function (t) {

      t.preventDefault();
      var o = t.target;
      classes = o.classList[0];
      ids = o.id;
     
       var r = "before";
      if( ids === ""  && classes  === "" ){
        alert("Cannot find the element (ID or class) for the position you selected. Please contact Mageplaza technical support for assistance")
      }else if(ids !== ""){
                navigator.clipboard.writeText("#" + ids);
          if(confirm("Your selector copied please paste app text box: #".concat(ids, "?")))
          {
            
          }
      }else if(classes !== ""){
                              navigator.clipboard.writeText("." + classes);
       if(confirm("Your selector copied please paste app text box: .".concat(classes, "?")))
          {
            console.log(classes);
            
          }
      }

     
    
});