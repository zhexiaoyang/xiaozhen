$(".countdown").css({'float':'left','width': 'auto','height': '30px','background': '#f4645f','font-size': '14px;','color': '#fff','line-height': '30px','text-align': 'center','font-weight': 'bold','border-radius': '5px','margin-right': '10px','padding-left':'10px','padding-right':'10px'});
$(".clear").css({'clear':'both','padding-bottom':'10px'});

var countDownTime = {
    init: function(a, b, c, d, e) {
        this.t = a, this.d = b, this.h = c, this.m = d, this.s = e
    },
    start: function() {
        var a = this;
        setInterval(a.timer, 1e3)
    },
    timer: function(a) {
        var b, c, d, e, f, g, h;
        a = this.countDownTime, b = new Date, c = new Date(a.t), d = c.getTime() - b.getTime(), e = Math.floor(a.formatTime(d, "day")), f = Math.floor(a.formatTime(d, "hours")), g = Math.floor(a.formatTime(d, "minutes")), h = Math.floor(a.formatTime(d, "seconds")), a.d && (a.d.innerText = a.formatNumber(e)), a.h && (a.h.innerText = a.formatNumber(f)), a.m && (a.m.innerText = a.formatNumber(g)), a.s && (a.s.innerText = a.formatNumber(h))
    },
    formatNumber: function(a) {
        if(a<=0){a=0}
        return a = a.toString(), a[1] ? a : "0" + a
    },
    formatTime: function(a, b) {
        switch (b) {
            case "day":
                return a / 1e3 / 60 / 60 / 24;
            case "hours":
                return a / 1e3 / 60 / 60 % 24;
            case "minutes":
                return a / 1e3 / 60 % 60;
            case "seconds":
                return a / 1e3 % 60
        }
    }
};


var	day = document.getElementById('day');
var	hours = document.getElementById('hours');
var	minutes = document.getElementById('minutes');
var seconds = document.getElementById('seconds');
