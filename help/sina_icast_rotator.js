if (typeof iCast_Rotator != 'function') {
    var iCast_Rotator = function (o, l, w) {
        var f;
        this.o = o;
        this.j = l;
        this.v = this.o == 1 ? l : w;
        this.id = iCast_Rotator.id++;
        this.m = 'iCast_Rotator_' + this.id;
        this.n = [];
        this.L = new Date();
        this.e = 0;
        var D = false;
        for (var i = 0; i < this.o; i++) {
            f = this.m + '_' + (i + 1);
            g = iCast_Rotator.B(f);
            if (g != '') {
                this.n[i] = g;
                D = true;
            } else {
                this.n[i] = 0;
            }
        }
        if (!D) {
            var r = Math.ceil(Math.random() * this.o);
            var t = this.m + '_' + r;
            iCast_Rotator.P(t, this.L.getTime(), 1440);
            this.e = r;
            return r;
        } else {
            var R = this.n.join(',').split(',');
            var k = R.sort();
            var max = Number(k[k.length - 1]);
            var min = Number(k[0]);
            for (var i = 0; i < this.n.length; i++) {
                if (max == this.n[i]) {
                    F = i + 1;
                    break;
                }
            }
            if (typeof F != 'undefined') {
                G = this.m + '_' + F;
                H = Number(iCast_Rotator.B(G));
                K = new Date(H + this.v * 1000 * 60);
                M = new Date(min + this.j * 1000 * 60);
                if (this.L > M && this.L > K) {
                    I = F % this.o + 1;
                    J = this.m + '_' + I;
                    iCast_Rotator.P(J, this.L.getTime(), 1440);
                    this.e = I;
                    return I;
                } else {
                    this.e = 0;
                    return 0;
                }
            }
        }
    };
    iCast_Rotator.id = 1;
    iCast_Rotator.B = function (N) {
        var c = document.cookie.split("; ");
        for (var i = 0; i < c.length; i++) {
            var d = c[i].split("=");
            if (N == d[0]) return unescape(d[1]);
        }
        return '';
    };
    iCast_Rotator.P = function (N, O, Q) {
        var L = new Date();
        var z = new Date(L.getTime() + Q * 60000);
        document.cookie = N + "=" + escape(O) + "; path=/; expires=" + z.toGMTString() + ";";
    }
};