var css_selector = "";
let query_params = (new URL(document.location)).searchParams;
let smart_selector = query_params.get("smartSelector");
let product_data = meta.product;
let product_path = window.location.href.split('?')[0] + ".json";
 

 async function get_product_details() {
    try {
        let res = await fetch(product_path);
        return await res.text();
    } catch (error) {
        console.log(error);
    }
}



if(smart_selector != "" && ( smart_selector == true || smart_selector == "true"))
{

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
}

let shopify_domain = Shopify.shop;
let APP_BASE_URL = "https://phpstack-747822-2919525.cloudwaysapps.com";
async function get_selector() {
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

    var product_details = await get_product_details();
    product_details = JSON.parse(product_details);
    var resp = await get_settings();
    resp = JSON.parse(resp);
    let settings = resp.data;
    var app_status = settings.status;
    if (app_status == 1) {
        var product_ident = settings.product_identifier;
        var btn_postition1 = settings.btn_postition;
        var btn_postition2 = settings.btn_postition2;
        var btn_postition3 = settings.btn_postition3;
        var product_identifier = product_data.id;
        if(product_ident == "product_id")
        {
            product_identifier = product_data.id;
        }
        else if(product_ident == "barcode")
        {
            product_identifier = product_details.product.variants[0].barcode;
        }
        else if(product_ident == "sku")
        {
            product_identifier = product_data.variants[0].sku;
        }
        

        var script = document.createElement('script');
        script.type = 'module';
        script.setAttribute("data-fibbl-config", "");
        script.setAttribute("data-locale", "sv-SV");
        script.setAttribute("data-analytics-type", "google");
        script.setAttribute("data-analytics-id", settings.google_id);
        script.src = 'https://cdn.fibbl.com/fibbl-bar.js';
        document.head.appendChild(script);
        var style_code = 'position: absolute;width: 100%;z-index: 999999999999;display: block !important;';
        if(btn_postition2 == "B"){
            style_code += 'bottom: -36px;';
        }else if(btn_postition2 == "T"){
            style_code += 'top: -0px;';
        }

        //head = document.head || document.getElementsByTagName('head')[0],
        //style = document.createElement('style');
       // head.appendChild(style);
        ///style.styleSheet.cssText = style_code;

        var app_html_fibbl = '<div id="fibbl-app-container" style="'+style_code+'"><fibbl-bar data-product-id="'+product_identifier+'"> <button data-element="fibbl-model-viewer">3D</button>  <button data-element="fibbl-carousel">Carousel</button><button data-element="fibbl-qr-code" data-type="vto">VTO</button></fibbl-bar></div>';
        if(settings.css.charAt(0) === '#')
        {
            var id_name = settings.css.substring(1);
            if(btn_postition1 == "I")
                document.getElementById(id_name).innerHTML += app_html_fibbl;
            else if(btn_postition1 == "A")
            {
                document.getElementById(id_name).insertAdjacentHTML('beforebegin',app_html_fibbl);
            } 
            else if(btn_postition1 == "B")
            {
                document.getElementById(id_name).insertAdjacentHTML('afterend',app_html_fibbl);
            } 
            
        }else{
           
            var class_name = settings.css.substring(1);
            if(btn_postition1 == "I")
                document.getElementsByClassName(class_name)[0].innerHTML += app_html_fibbl;
            else if(btn_postition1 == "A")
            {
                document.getElementsByClassName(class_name)[0].insertAdjacentHTML('beforebegin',app_html_fibbl);
            } 
            else if(btn_postition1 == "B")
            {
                document.getElementsByClassName(class_name)[0].insertAdjacentHTML('afterend',app_html_fibbl);

            } 
            
        }
        
    }
}

get_settings_shop();