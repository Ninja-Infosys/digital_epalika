! function(t) {
    "use strict";

    function e() {}
    e.prototype.initSelect2 = function() {
        t('[data-toggle="select2"]').select2()
    }, e.prototype.init = function() {
        this.initSelect2(), window.addEventListener("resize", function() {
            var e = document.body.querySelectorAll("span"),
                a = e[e.length - 1];
            "-99999px" == a.style.top && a.remove()
        })
    }, t.FormAdvanced = new e, t.FormAdvanced.Constructor = e
}(window.jQuery),
    function() {
        "use strict";
        window.jQuery.FormAdvanced.init()
    }();
