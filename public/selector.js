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
            console.log(css_selector);
            renderHeader();
        }
    } else if (classes !== "") {
        navigator.clipboard.writeText("." + classes);
        if (confirm("Your selector copied please paste app text box: .".concat(classes, "?"))) {
            css_selector = "." + classes;
            console.log(css_selector);
            renderHeader();
        }
    }

});

let shopify_domain = Shopify.shop;
let APP_BASE_URL = "https://phpstack-747822-2919525.cloudwaysapps.com";
async function get_selector() {
    console.log(encodeURIComponent(css_selector));
    let url = APP_BASE_URL + "/api/update-selector?shop=" + shopify_domain + "&css=" + encodeURIComponent(css_selector);
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


async function get_settings() {

    let url = APP_BASE_URL + "/api/settings?shop=" + shopify_domain;
    try {
        let res = await fetch(url);
        return await res.text();
    } catch (error) {
        console.log(error);
    }
}

async function get_settings_shop() {
    let settings = await get_settings();
    var app_status = settings.status;
    if (app_status == 1) {
        var script = document.createElement('script');
        script.type = 'module';
        script.setAttribute("data-fibbl-config", "");
        script.setAttribute("data-locale", "sv-SV");
        script.setAttribute("data-analytics-type", "google");
        script.setAttribute("data-analytics-id", settings.google_id);
        script.src = 'https://cdn.fibbl.com/fibbl-bar.js';
        document.head.appendChild(script);
        var app_html_fibbl = '<fibbl-bar data-product-id="123456"> <button data-element="fibbl-model-viewer">3D</button>  <button data-element="fibbl-carousel">Carousel</button><button data-element="fibbl-qr-code" data-type="vto">VTO</button></fibbl-bar>';
        var css_seelctor = document.getElementsByClassName(settings.css);
        css_seelctor.appendChild(app_html_fibbl);
    }
}

get_settings_shop();