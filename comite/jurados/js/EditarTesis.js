//var winglobal;

function CenterWindow(url, id, Iwidth, Iheigth, features) {
    var width = Iwidth;
    var heigth = Iheigth;

    var wname = "name";

    var centerLeft = parseInt((window.screen.availWidth - width) / 2);
    var centerTop = parseInt((window.screen.availHeight - heigth) / 2 - 50);

    var misc_features;
    if (features) {
        misc_features = ", " + features;
    } else {
        misc_features = ", status=no, location=no, scrollbars=yes, resizable=yes";
    }
    var windowFeatures =
        "width=" +
        width +
        ",height=" +
        heigth +
        ",left=" +
        centerLeft +
        ",top=" +
        centerTop +
        misc_features;

    // console.log(url);
    var win = window.open(url + id, wname, windowFeatures);
    win.focus();

    //winglobal = win;
    return win;
}

function myFunction(NUMBER) {
    alert(NUMBER);
}