var css_selector = "";
document.body.addEventListener("mouseover", function(r) {
    var o = r.target;
    o.style.cursor = "not-allowed";
    o.style.border = '2px solid red';

});

document.body.addEventListener("mouseout", function(t) {
    var e = t.target;
    e.style.cursor = "unset";
    e.style.border = '0px solid red';
});



document.body.addEventListener("click", function(t) {

    t.preventDefault();
    var o = t.target;
    var classes = o.classList[0];
    ids = o.id;

    var r = "before";
    if (ids === "" && classes === "") {
        alert("Cannot find the element (ID or class) for the position you selected. Please contact Mageplaza technical support for assistance")
    } else if (ids !== "") {
        navigator.clipboard.writeText("#" + ids);
        if (confirm("Your selector copied please paste app text box: #".concat(ids, "?"))) {
            css_selector = "#" + ids;
            renderHeader();
        }
    } else if (classes !== "") {
        navigator.clipboard.writeText("." + classes);
        if (confirm("Your selector copied please paste app text box: .".concat(classes, "?"))) {
            css_selector = "#" + classes;
            renderHeader();
        }
    }

});

let shopify_domain = Shopify.shop;
let APP_BASE_URL = "https://phpstack-747822-2919525.cloudwaysapps.com";
async function get_selector() {
    let url = APP_BASE_URL + "/api/update-selector?shop=" + shopify_domain + "&css=" + css_selector;
    try {
        let res = await fetch(url);
        return await res.text();
    } catch (error) {
        console.log(error);
    }
}

async function renderHeader() {
    let data = await get_selector();
}