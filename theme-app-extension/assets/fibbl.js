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



if (smart_selector != "" && (smart_selector == true || smart_selector == "true")) {

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
        if (ids === "" && classes === "" || (ids == undefined)) {
            alert("Cannot find the element (ID or class) for the position you selected. Please contact Mageplaza technical support for assistance")
        } else if (ids !== "") {
            navigator.clipboard.writeText("#" + ids);
            if (confirm("The element name ((" + ids + ")) was automatically copy and pasted into the Shopify app. Please return to the app and complete the configuration.")) {
                css_selector = "#" + ids;
                console.log(css_selector);
                renderHeader();
            }
        } else if (classes !== "") {
            navigator.clipboard.writeText("." + classes);
            if (confirm("The element name ((" + classes + ")) was automatically copy and pasted into the Shopify app. Please return to the app and complete the configuration.")) {
                css_selector = "." + classes;
                console.log(css_selector);
                renderHeader();
            }
        }

    });
}

let shopify_domain = Shopify.shop;
let APP_BASE_URL = "https://phplaravel-860065-2971478.cloudwaysapps.com";
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
        if (product_ident == "product_id") {
            product_identifier = product_data.id;
        } else if (product_ident == "barcode") {
            product_identifier = product_details.product.variants[0].barcode;
        } else if (product_ident == "sku") {
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
        var style_code = 'width: 40%;z-index: 999999999999;display: block !important;';
        if (btn_postition2 == "B") {
            style_code += 'bottom: -36px;';
        } else if (btn_postition2 == "T") {
            style_code += 'top: 0px;';
        }

        if (btn_postition3 == "M") {
            style_code += 'left: 0;right: 0;margin: auto;';
        } else if (btn_postition3 == "R") {
            style_code += 'right: 0px;';
        } else {
            style_code += 'left: 0px;';
        }

        if (btn_postition1 == "I") {
            style_code += 'position: absolute;';
        } else {
            style_code += 'position: relative;';
        }

        //head = document.head || document.getElementsByTagName('head')[0],
        //style = document.createElement('style');
        // head.appendChild(style);
        ///style.styleSheet.cssText = style_code;

        var app_html_fibbl = '<div id="fibbl-app-container" style="' + style_code + '"><fibbl-bar data-product-id="' + product_identifier + '"> <button data-element="fibbl-model-viewer"><?xml version="1.0" encoding="UTF-8"?><svg id="Lager_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 400 400"><defs><style>.cls-1{fill:none;}.cls-2{clip-path:url(#clippath);}.cls-3{fill:#162023;}</style><clipPath id="clippath"><rect class="cls-1" y="0" width="400" height="400"/></clipPath></defs><g class="cls-2"><g><polygon class="cls-3" points="55.91 230 55.91 250 96.77 250 100.91 254.14 100.91 265 71.45 265 71.45 285 100.91 285 100.91 295.86 96.77 300 55.91 300 55.91 320 105.05 320 120.91 304.14 120.91 285 120.91 265 120.91 245.86 105.05 230 55.91 230"/><path class="cls-3" d="M134.56,230v90h52.5l25.86-25.86v-37.6l-20.82-26.55h-57.53Zm58.35,55.86l-14.14,14.14h-24.21v-50h27.8l10.55,13.45v22.4Z"/><path class="cls-3" d="M239.88,81.47l-105.76,61.06v70.36h20v-47.26l75.76,43.74v97.98l20,12.56v-110.54l75.76-43.74v87.48l-93.95,54.24,18.19,12.56,95.76-55.26v-122.12l-105.76-61.06Zm75.76,66.83l-75.76,43.74-75.76-43.74,75.76-43.74,75.76,43.74Z"/></g></g></svg></button> <button data-element="fibbl-carousel"><?xml version="1.0" encoding="UTF-8"?><svg id="Lager_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 400 400"><defs><style>.cls-1{fill:none;}.cls-2{clip-path:url(#clippath);}.cls-3{fill:#162023;}</style><clipPath id="clippath"><rect class="cls-1" x="0" width="400" height="400"/></clipPath></defs><g class="cls-2"><g><rect class="cls-3" x="50" y="230" width="20" height="90"/><polygon class="cls-3" points="145 230 125 230 85 230 85 320 105 320 105 250 125 250 125 320 145 320 145 250 160.5 250 165 255.09 165 320 185 320 185 247.51 169.5 230 145 230"/><polygon class="cls-3" points="240 285 260 285 260 295.86 255.86 300 224.14 300 220 295.86 220 254.14 224.14 250 270 250 270 230 215.86 230 200 245.86 200 304.14 215.86 320 264.14 320 280 304.14 280 265 240 265 240 285"/><polygon class="cls-3" points="95 130 85 140 85 210 105 210 105 150 300 150 300 270 320 270 320 140 310 130 95 130"/><polygon class="cls-3" points="350 90 130 90 130 110 340 110 340 230 360 230 360 100 350 90"/></g></g></svg></button> <button data-element="fibbl-qr-code" data-type="ar"><?xml version="1.0" encoding="UTF-8"?><svg id="Lager_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 400 400"><defs><style>.cls-1{fill:none;}.cls-2{clip-path:url(#clippath);}.cls-3{fill:#162023;}</style><clipPath id="clippath"><rect class="cls-1" y="0" width="400" height="400"/></clipPath></defs><g class="cls-2"><g><polygon class="cls-3" points="181.5 110.36 137.86 135.2 137.86 188.79 157.86 188.79 157.86 158.72 178.1 170.92 188.43 153.79 167.64 141.26 191.39 127.74 181.5 110.36"/><polygon class="cls-3" points="327.52 249.07 307.18 260.65 317.07 278.03 347.52 260.71 347.52 218.63 327.52 218.63 327.52 249.07"/><polygon class="cls-3" points="307.1 112.19 297.21 129.57 317.74 141.26 298.94 152.6 309.27 169.73 327.52 158.72 327.52 185.43 347.52 185.43 347.52 135.2 307.1 112.19"/><polygon class="cls-3" points="242.69 98.54 270.33 114.27 280.23 96.89 242.69 75.53 210.01 94.14 219.9 111.52 242.69 98.54"/><polygon class="cls-3" points="232.69 230.96 252.69 230.96 252.69 203.83 281.93 186.2 271.61 169.08 242.69 186.51 213.78 169.08 203.45 186.2 232.69 203.83 232.69 230.96"/><polygon class="cls-3" points="252.69 291.64 252.69 263.98 232.69 263.98 232.69 311.05 245.21 318.91 283.78 296.97 273.89 279.58 252.69 291.64"/></g><path class="cls-3" d="M60.9,229.62l-10,10v80h20v-20h30v20h20v-80l-10-10H60.9Zm10,50v-30h30v30h-30Z"/><path class="cls-3" d="M152.9,298.63h18.06l9.33,20.98h21.89l-10.08-22.66,10.8-13.91v-36.18l-11.7-17.24h-58.3v90h20v-20.98Zm0-49.02h27.7l2.3,3.39v23.19l-1.9,2.44h-28.1v-29.02Z"/></g></svg></button> <button data-element="fibbl-qr-code" data-type="vto"><?xml version="1.0" encoding="UTF-8"?><svg id="Lager_1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 400 400"><defs><style>.cls-1{fill:#162023;}</style></defs><g><polygon class="cls-1" points="64 250 87 250 87 318.91 107 318.91 107 250 130 250 130 230 64 230 64 250"/><polygon class="cls-1" points="259 230 259 270 258.87 270 238.87 270 238.87 230 218.87 230 218.87 280 228.87 290 238.87 290 238.87 318.91 258.87 318.91 258.87 290 269 290 279 280 279 230 259 230"/></g><path class="cls-1" d="M161,299.02h18.06l9.33,20.98h21.89l-10.08-22.66,10.8-13.91v-36.18l-11.7-17.24h-58.3v90h20v-20.98Zm0-49.02h27.7l2.3,3.39v23.19l-1.9,2.44h-28.1v-29.02Z"/><polygon class="cls-1" points="294.86 195.07 309 209.21 309 263 329 263 329 200.93 303.14 175.07 244.86 175.07 219 200.93 219 209.65 239 209.65 239 209.21 253.14 195.07 294.86 195.07"/><polygon class="cls-1" points="280.24 145.04 267.84 145.04 256.33 133.52 242.18 147.66 259.56 165.04 288.52 165.04 309 144.56 309 115.59 288.52 95.11 263.34 95.11 263.34 115.11 280.24 115.11 289 123.87 289 136.27 280.24 145.04"/><polygon class="cls-1" points="179 115.07 179 135.07 239 135.07 249 125.07 249 65.07 229 65.07 229 100.93 176.07 48 161.93 62.14 214.86 115.07 179 115.07"/></svg></button></fibbl-bar></div><style>.active_fibble_container{position: relative;} #fibbl-app-container button {    width: 10%; border: 0px !important;background: transparent !important;}fibbl-bar {background: transparent !important;}<style>';
        if (settings.css.charAt(0) === '#') {
            var id_name = settings.css.substring(1);
            var child = document.getElementById(id_name).parentNode;
            child.classList.add('active_fibble_container');
            if (btn_postition1 == "I")
                document.getElementById(id_name).innerHTML += app_html_fibbl;
            else if (btn_postition1 == "A") {
                document.getElementById(id_name).insertAdjacentHTML('beforebegin', app_html_fibbl);
            } else if (btn_postition1 == "B") {
                document.getElementById(id_name).insertAdjacentHTML('afterend', app_html_fibbl);
            }

        } else {

            var class_name = settings.css.substring(1);
            var child = document.getElementsByClassName(class_name)[0].parentNode;
            child.classList.add('active_fibble_container');
            if (btn_postition1 == "I")
                document.getElementsByClassName(class_name)[0].innerHTML += app_html_fibbl;
            else if (btn_postition1 == "A") {
                document.getElementsByClassName(class_name)[0].insertAdjacentHTML('beforebegin', app_html_fibbl);
            } else if (btn_postition1 == "B") {
                document.getElementsByClassName(class_name)[0].insertAdjacentHTML('afterend', app_html_fibbl);

            }

        }

    }
}

get_settings_shop();