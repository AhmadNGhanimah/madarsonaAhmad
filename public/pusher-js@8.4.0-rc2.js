/**
 * Bundled by jsDelivr using Rollup v2.79.1 and Terser v5.19.2.
 * Original file: /npm/pusher-js@8.4.0-rc2/dist/web/pusher.js
 *
 * Do NOT use SRI with dynamically generated files! More information: https://www.jsdelivr.com/using-sri-with-dynamic-files
 */
var t, e = {exports: {}};
/*!
 * Pusher JavaScript Library v8.4.0-rc2
 * https://pusher.com/
 *
 * Copyright 2020, Pusher
 * Released under the MIT licence.
 */
window, t = function () {
    return function (t) {
        var e = {};

        function n(i) {
            if (e[i]) return e[i].exports;
            var r = e[i] = {i: i, l: !1, exports: {}};
            return t[i].call(r.exports, r, r.exports, n), r.l = !0, r.exports
        }

        return n.m = t, n.c = e, n.d = function (t, e, i) {
            n.o(t, e) || Object.defineProperty(t, e, {enumerable: !0, get: i})
        }, n.r = function (t) {
            "undefined" != typeof Symbol && Symbol.toStringTag && Object.defineProperty(t, Symbol.toStringTag, {value: "Module"}), Object.defineProperty(t, "__esModule", {value: !0})
        }, n.t = function (t, e) {
            if (1 & e && (t = n(t)), 8 & e) return t;
            if (4 & e && "object" == typeof t && t && t.__esModule) return t;
            var i = Object.create(null);
            if (n.r(i), Object.defineProperty(i, "default", {
                enumerable: !0,
                value: t
            }), 2 & e && "string" != typeof t) for (var r in t) n.d(i, r, function (e) {
                return t[e]
            }.bind(null, r));
            return i
        }, n.n = function (t) {
            var e = t && t.__esModule ? function () {
                return t.default
            } : function () {
                return t
            };
            return n.d(e, "a", e), e
        }, n.o = function (t, e) {
            return Object.prototype.hasOwnProperty.call(t, e)
        }, n.p = "", n(n.s = 2)
    }([function (t, e, n) {
        var i, r = this && this.__extends || (i = function (t, e) {
            return i = Object.setPrototypeOf || {__proto__: []} instanceof Array && function (t, e) {
                t.__proto__ = e
            } || function (t, e) {
                for (var n in e) e.hasOwnProperty(n) && (t[n] = e[n])
            }, i(t, e)
        }, function (t, e) {
            function n() {
                this.constructor = t
            }

            i(t, e), t.prototype = null === e ? Object.create(e) : (n.prototype = e.prototype, new n)
        });
        Object.defineProperty(e, "__esModule", {value: !0});
        var s = 256, o = function () {
            function t(t) {
                void 0 === t && (t = "="), this._paddingCharacter = t
            }

            return t.prototype.encodedLength = function (t) {
                return this._paddingCharacter ? (t + 2) / 3 * 4 | 0 : (8 * t + 5) / 6 | 0
            }, t.prototype.encode = function (t) {
                for (var e = "", n = 0; n < t.length - 2; n += 3) {
                    var i = t[n] << 16 | t[n + 1] << 8 | t[n + 2];
                    e += this._encodeByte(i >>> 18 & 63), e += this._encodeByte(i >>> 12 & 63), e += this._encodeByte(i >>> 6 & 63), e += this._encodeByte(i >>> 0 & 63)
                }
                var r = t.length - n;
                return r > 0 && (i = t[n] << 16 | (2 === r ? t[n + 1] << 8 : 0), e += this._encodeByte(i >>> 18 & 63), e += this._encodeByte(i >>> 12 & 63), e += 2 === r ? this._encodeByte(i >>> 6 & 63) : this._paddingCharacter || "", e += this._paddingCharacter || ""), e
            }, t.prototype.maxDecodedLength = function (t) {
                return this._paddingCharacter ? t / 4 * 3 | 0 : (6 * t + 7) / 8 | 0
            }, t.prototype.decodedLength = function (t) {
                return this.maxDecodedLength(t.length - this._getPaddingLength(t))
            }, t.prototype.decode = function (t) {
                if (0 === t.length) return new Uint8Array(0);
                for (var e = this._getPaddingLength(t), n = t.length - e, i = new Uint8Array(this.maxDecodedLength(n)), r = 0, o = 0, a = 0, c = 0, h = 0, u = 0, l = 0; o < n - 4; o += 4) c = this._decodeChar(t.charCodeAt(o + 0)), h = this._decodeChar(t.charCodeAt(o + 1)), u = this._decodeChar(t.charCodeAt(o + 2)), l = this._decodeChar(t.charCodeAt(o + 3)), i[r++] = c << 2 | h >>> 4, i[r++] = h << 4 | u >>> 2, i[r++] = u << 6 | l, a |= c & s, a |= h & s, a |= u & s, a |= l & s;
                if (o < n - 1 && (c = this._decodeChar(t.charCodeAt(o)), h = this._decodeChar(t.charCodeAt(o + 1)), i[r++] = c << 2 | h >>> 4, a |= c & s, a |= h & s), o < n - 2 && (u = this._decodeChar(t.charCodeAt(o + 2)), i[r++] = h << 4 | u >>> 2, a |= u & s), o < n - 3 && (l = this._decodeChar(t.charCodeAt(o + 3)), i[r++] = u << 6 | l, a |= l & s), 0 !== a) throw new Error("Base64Coder: incorrect characters for decoding");
                return i
            }, t.prototype._encodeByte = function (t) {
                var e = t;
                return e += 65, e += 25 - t >>> 8 & 6, e += 51 - t >>> 8 & -75, e += 61 - t >>> 8 & -15, e += 62 - t >>> 8 & 3, String.fromCharCode(e)
            }, t.prototype._decodeChar = function (t) {
                var e = s;
                return e += (42 - t & t - 44) >>> 8 & -256 + t - 43 + 62, e += (46 - t & t - 48) >>> 8 & -256 + t - 47 + 63, e += (47 - t & t - 58) >>> 8 & -256 + t - 48 + 52, e += (64 - t & t - 91) >>> 8 & -256 + t - 65 + 0, e += (96 - t & t - 123) >>> 8 & -256 + t - 97 + 26
            }, t.prototype._getPaddingLength = function (t) {
                var e = 0;
                if (this._paddingCharacter) {
                    for (var n = t.length - 1; n >= 0 && t[n] === this._paddingCharacter; n--) e++;
                    if (t.length < 4 || e > 2) throw new Error("Base64Coder: incorrect padding")
                }
                return e
            }, t
        }();
        e.Coder = o;
        var a = new o;
        e.encode = function (t) {
            return a.encode(t)
        }, e.decode = function (t) {
            return a.decode(t)
        };
        var c = function (t) {
            function e() {
                return null !== t && t.apply(this, arguments) || this
            }

            return r(e, t), e.prototype._encodeByte = function (t) {
                var e = t;
                return e += 65, e += 25 - t >>> 8 & 6, e += 51 - t >>> 8 & -75, e += 61 - t >>> 8 & -13, e += 62 - t >>> 8 & 49, String.fromCharCode(e)
            }, e.prototype._decodeChar = function (t) {
                var e = s;
                return e += (44 - t & t - 46) >>> 8 & -256 + t - 45 + 62, e += (94 - t & t - 96) >>> 8 & -256 + t - 95 + 63, e += (47 - t & t - 58) >>> 8 & -256 + t - 48 + 52, e += (64 - t & t - 91) >>> 8 & -256 + t - 65 + 0, e += (96 - t & t - 123) >>> 8 & -256 + t - 97 + 26
            }, e
        }(o);
        e.URLSafeCoder = c;
        var h = new c;
        e.encodeURLSafe = function (t) {
            return h.encode(t)
        }, e.decodeURLSafe = function (t) {
            return h.decode(t)
        }, e.encodedLength = function (t) {
            return a.encodedLength(t)
        }, e.maxDecodedLength = function (t) {
            return a.maxDecodedLength(t)
        }, e.decodedLength = function (t) {
            return a.decodedLength(t)
        }
    }, function (t, e, n) {
        Object.defineProperty(e, "__esModule", {value: !0});
        var i = "utf8: invalid string", r = "utf8: invalid source encoding";

        function s(t) {
            for (var e = 0, n = 0; n < t.length; n++) {
                var r = t.charCodeAt(n);
                if (r < 128) e += 1; else if (r < 2048) e += 2; else if (r < 55296) e += 3; else {
                    if (!(r <= 57343)) throw new Error(i);
                    if (n >= t.length - 1) throw new Error(i);
                    n++, e += 4
                }
            }
            return e
        }

        e.encode = function (t) {
            for (var e = new Uint8Array(s(t)), n = 0, i = 0; i < t.length; i++) {
                var r = t.charCodeAt(i);
                r < 128 ? e[n++] = r : r < 2048 ? (e[n++] = 192 | r >> 6, e[n++] = 128 | 63 & r) : r < 55296 ? (e[n++] = 224 | r >> 12, e[n++] = 128 | r >> 6 & 63, e[n++] = 128 | 63 & r) : (i++, r = (1023 & r) << 10, r |= 1023 & t.charCodeAt(i), r += 65536, e[n++] = 240 | r >> 18, e[n++] = 128 | r >> 12 & 63, e[n++] = 128 | r >> 6 & 63, e[n++] = 128 | 63 & r)
            }
            return e
        }, e.encodedLength = s, e.decode = function (t) {
            for (var e = [], n = 0; n < t.length; n++) {
                var i = t[n];
                if (128 & i) {
                    var s = void 0;
                    if (i < 224) {
                        if (n >= t.length) throw new Error(r);
                        if (128 != (192 & (o = t[++n]))) throw new Error(r);
                        i = (31 & i) << 6 | 63 & o, s = 128
                    } else if (i < 240) {
                        if (n >= t.length - 1) throw new Error(r);
                        var o = t[++n], a = t[++n];
                        if (128 != (192 & o) || 128 != (192 & a)) throw new Error(r);
                        i = (15 & i) << 12 | (63 & o) << 6 | 63 & a, s = 2048
                    } else {
                        if (!(i < 248)) throw new Error(r);
                        if (n >= t.length - 2) throw new Error(r);
                        o = t[++n], a = t[++n];
                        var c = t[++n];
                        if (128 != (192 & o) || 128 != (192 & a) || 128 != (192 & c)) throw new Error(r);
                        i = (15 & i) << 18 | (63 & o) << 12 | (63 & a) << 6 | 63 & c, s = 65536
                    }
                    if (i < s || i >= 55296 && i <= 57343) throw new Error(r);
                    if (i >= 65536) {
                        if (i > 1114111) throw new Error(r);
                        i -= 65536, e.push(String.fromCharCode(55296 | i >> 10)), i = 56320 | 1023 & i
                    }
                }
                e.push(String.fromCharCode(i))
            }
            return e.join("")
        }
    }, function (t, e, n) {
        t.exports = n(3).default
    }, function (t, e, n) {
        n.r(e);

        class i {
            constructor(t, e) {
                this.lastId = 0, this.prefix = t, this.name = e
            }

            create(t) {
                this.lastId++;
                var e = this.lastId, n = this.prefix + e, i = this.name + "[" + e + "]", r = !1, s = function () {
                    r || (t.apply(null, arguments), r = !0)
                };
                return this[e] = s, {number: e, id: n, name: i, callback: s}
            }

            remove(t) {
                delete this[t.number]
            }
        }

        var r = new i("_pusher_script_", "Pusher.ScriptReceivers"), s = {
            VERSION: "8.4.0-rc2",
            PROTOCOL: 7,
            wsPort: 80,
            wssPort: 443,
            wsPath: "",
            httpHost: "sockjs.pusher.com",
            httpPort: 80,
            httpsPort: 443,
            httpPath: "/pusher",
            stats_host: "stats.pusher.com",
            authEndpoint: "/pusher/auth",
            authTransport: "ajax",
            activityTimeout: 12e4,
            pongTimeout: 3e4,
            unavailableTimeout: 1e4,
            userAuthentication: {endpoint: "/pusher/user-auth", transport: "ajax"},
            channelAuthorization: {endpoint: "/pusher/auth", transport: "ajax"},
            cdn_http: "http://js.pusher.com",
            cdn_https: "https://js.pusher.com",
            dependency_suffix: ""
        }, o = new i("_pusher_dependencies", "Pusher.DependenciesReceivers"), a = new class {
            constructor(t) {
                this.options = t, this.receivers = t.receivers || r, this.loading = {}
            }

            load(t, e, n) {
                var i = this;
                if (i.loading[t] && i.loading[t].length > 0) i.loading[t].push(n); else {
                    i.loading[t] = [n];
                    var r = he.createScriptRequest(i.getPath(t, e)), s = i.receivers.create((function (e) {
                        if (i.receivers.remove(s), i.loading[t]) {
                            var n = i.loading[t];
                            delete i.loading[t];
                            for (var o = function (t) {
                                t || r.cleanup()
                            }, a = 0; a < n.length; a++) n[a](e, o)
                        }
                    }));
                    r.send(s)
                }
            }

            getRoot(t) {
                var e = he.getDocument().location.protocol;
                return (t && t.useTLS || "https:" === e ? this.options.cdn_https : this.options.cdn_http).replace(/\/*$/, "") + "/" + this.options.version
            }

            getPath(t, e) {
                return this.getRoot(e) + "/" + t + this.options.suffix + ".js"
            }
        }({
            cdn_http: s.cdn_http,
            cdn_https: s.cdn_https,
            version: s.VERSION,
            suffix: s.dependency_suffix,
            receivers: o
        });
        const c = {
            baseUrl: "https://pusher.com",
            urls: {
                authenticationEndpoint: {path: "/docs/channels/server_api/authenticating_users"},
                authorizationEndpoint: {path: "/docs/channels/server_api/authorizing-users/"},
                javascriptQuickStart: {path: "/docs/javascript_quick_start"},
                triggeringClientEvents: {path: "/docs/client_api_guide/client_events#trigger-events"},
                encryptedChannelSupport: {fullUrl: "https://github.com/pusher/pusher-js/tree/cc491015371a4bde5743d1c87a0fbac0feb53195#encrypted-channel-support"}
            }
        };
        var h, u = function (t) {
            const e = c.urls[t];
            if (!e) return "";
            let n;
            return e.fullUrl ? n = e.fullUrl : e.path && (n = c.baseUrl + e.path), n ? `See: ${n}` : ""
        };
        !function (t) {
            t.UserAuthentication = "user-authentication", t.ChannelAuthorization = "channel-authorization"
        }(h || (h = {}));

        class l extends Error {
            constructor(t) {
                super(t), Object.setPrototypeOf(this, new.target.prototype)
            }
        }

        class d extends Error {
            constructor(t) {
                super(t), Object.setPrototypeOf(this, new.target.prototype)
            }
        }

        class p extends Error {
            constructor(t) {
                super(t), Object.setPrototypeOf(this, new.target.prototype)
            }
        }

        class f extends Error {
            constructor(t) {
                super(t), Object.setPrototypeOf(this, new.target.prototype)
            }
        }

        class g extends Error {
            constructor(t) {
                super(t), Object.setPrototypeOf(this, new.target.prototype)
            }
        }

        class b extends Error {
            constructor(t) {
                super(t), Object.setPrototypeOf(this, new.target.prototype)
            }
        }

        class m extends Error {
            constructor(t) {
                super(t), Object.setPrototypeOf(this, new.target.prototype)
            }
        }

        class v extends Error {
            constructor(t) {
                super(t), Object.setPrototypeOf(this, new.target.prototype)
            }
        }

        class y extends Error {
            constructor(t, e) {
                super(e), this.status = t, Object.setPrototypeOf(this, new.target.prototype)
            }
        }

        var w = function (t, e, n, i, r) {
                const s = he.createXHR();
                for (var o in s.open("POST", n.endpoint, !0), s.setRequestHeader("Content-Type", "application/x-www-form-urlencoded"), n.headers) s.setRequestHeader(o, n.headers[o]);
                if (null != n.headersProvider) {
                    let t = n.headersProvider();
                    for (var o in t) s.setRequestHeader(o, t[o])
                }
                return s.onreadystatechange = function () {
                    if (4 === s.readyState) if (200 === s.status) {
                        let t, e = !1;
                        try {
                            t = JSON.parse(s.responseText), e = !0
                        } catch (t) {
                            r(new y(200, `JSON returned from ${i.toString()} endpoint was invalid, yet status code was 200. Data was: ${s.responseText}`), null)
                        }
                        e && r(null, t)
                    } else {
                        let t = "";
                        switch (i) {
                            case h.UserAuthentication:
                                t = u("authenticationEndpoint");
                                break;
                            case h.ChannelAuthorization:
                                t = `Clients must be authorized to join private or presence channels. ${u("authorizationEndpoint")}`
                        }
                        r(new y(s.status, `Unable to retrieve auth string from ${i.toString()} endpoint - received status: ${s.status} from ${n.endpoint}. ${t}`), null)
                    }
                }, s.send(e), s
            }, S = String.fromCharCode, _ = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789+/",
            k = function (t) {
                var e = t.charCodeAt(0);
                return e < 128 ? t : e < 2048 ? S(192 | e >>> 6) + S(128 | 63 & e) : S(224 | e >>> 12 & 15) + S(128 | e >>> 6 & 63) + S(128 | 63 & e)
            }, C = function (t) {
                return t.replace(/[^\x00-\x7F]/g, k)
            }, T = function (t) {
                var e = [0, 2, 1][t.length % 3],
                    n = t.charCodeAt(0) << 16 | (t.length > 1 ? t.charCodeAt(1) : 0) << 8 | (t.length > 2 ? t.charCodeAt(2) : 0);
                return [_.charAt(n >>> 18), _.charAt(n >>> 12 & 63), e >= 2 ? "=" : _.charAt(n >>> 6 & 63), e >= 1 ? "=" : _.charAt(63 & n)].join("")
            }, P = window.btoa || function (t) {
                return t.replace(/[\s\S]{1,3}/g, T)
            }, E = class {
                constructor(t, e, n, i) {
                    this.clear = e, this.timer = t((() => {
                        this.timer && (this.timer = i(this.timer))
                    }), n)
                }

                isRunning() {
                    return null !== this.timer
                }

                ensureAborted() {
                    this.timer && (this.clear(this.timer), this.timer = null)
                }
            };

        function O(t) {
            window.clearTimeout(t)
        }

        function x(t) {
            window.clearInterval(t)
        }

        class L extends E {
            constructor(t, e) {
                super(setTimeout, O, t, (function (t) {
                    return e(), null
                }))
            }
        }

        class A extends E {
            constructor(t, e) {
                super(setInterval, x, t, (function (t) {
                    return e(), t
                }))
            }
        }

        var R = {
            now: () => Date.now ? Date.now() : (new Date).valueOf(), defer: t => new L(0, t), method(t, ...e) {
                var n = Array.prototype.slice.call(arguments, 1);
                return function (e) {
                    return e[t].apply(e, n.concat(arguments))
                }
            }
        }, I = R;

        function D(t, ...e) {
            for (var n = 0; n < e.length; n++) {
                var i = e[n];
                for (var r in i) i[r] && i[r].constructor && i[r].constructor === Object ? t[r] = D(t[r] || {}, i[r]) : t[r] = i[r]
            }
            return t
        }

        function j() {
            for (var t = ["Pusher"], e = 0; e < arguments.length; e++) "string" == typeof arguments[e] ? t.push(arguments[e]) : t.push(J(arguments[e]));
            return t.join(" : ")
        }

        function N(t, e) {
            var n = Array.prototype.indexOf;
            if (null === t) return -1;
            if (n && t.indexOf === n) return t.indexOf(e);
            for (var i = 0, r = t.length; i < r; i++) if (t[i] === e) return i;
            return -1
        }

        function U(t, e) {
            for (var n in t) Object.prototype.hasOwnProperty.call(t, n) && e(t[n], n, t)
        }

        function H(t) {
            var e = [];
            return U(t, (function (t, n) {
                e.push(n)
            })), e
        }

        function M(t, e, n) {
            for (var i = 0; i < t.length; i++) e.call(n || window, t[i], i, t)
        }

        function z(t, e) {
            for (var n = [], i = 0; i < t.length; i++) n.push(e(t[i], i, t, n));
            return n
        }

        function q(t, e) {
            e = e || function (t) {
                return !!t
            };
            for (var n = [], i = 0; i < t.length; i++) e(t[i], i, t, n) && n.push(t[i]);
            return n
        }

        function B(t, e) {
            var n = {};
            return U(t, (function (i, r) {
                (e && e(i, r, t, n) || Boolean(i)) && (n[r] = i)
            })), n
        }

        function $(t, e) {
            for (var n = 0; n < t.length; n++) if (e(t[n], n, t)) return !0;
            return !1
        }

        function F(t) {
            return e = function (t) {
                return "object" == typeof t && (t = J(t)), encodeURIComponent((e = t.toString(), P(C(e))));
                var e
            }, n = {}, U(t, (function (t, i) {
                n[i] = e(t)
            })), n;
            var e, n
        }

        function X(t) {
            var e, n, i = B(t, (function (t) {
                return void 0 !== t
            }));
            return z((e = F(i), n = [], U(e, (function (t, e) {
                n.push([e, t])
            })), n), I.method("join", "=")).join("&")
        }

        function J(t) {
            try {
                return JSON.stringify(t)
            } catch (i) {
                return JSON.stringify((e = [], n = [], function t(i, r) {
                    var s, o, a;
                    switch (typeof i) {
                        case"object":
                            if (!i) return null;
                            for (s = 0; s < e.length; s += 1) if (e[s] === i) return {$ref: n[s]};
                            if (e.push(i), n.push(r), "[object Array]" === Object.prototype.toString.apply(i)) for (a = [], s = 0; s < i.length; s += 1) a[s] = t(i[s], r + "[" + s + "]"); else for (o in a = {}, i) Object.prototype.hasOwnProperty.call(i, o) && (a[o] = t(i[o], r + "[" + JSON.stringify(o) + "]"));
                            return a;
                        case"number":
                        case"string":
                        case"boolean":
                            return i
                    }
                }(t, "$")))
            }
            var e, n
        }

        var W = new class {
            constructor() {
                this.globalLog = t => {
                    window.console && window.console.log && window.console.log(t)
                }
            }

            debug(...t) {
                this.log(this.globalLog, t)
            }

            warn(...t) {
                this.log(this.globalLogWarn, t)
            }

            error(...t) {
                this.log(this.globalLogError, t)
            }

            globalLogWarn(t) {
                window.console && window.console.warn ? window.console.warn(t) : this.globalLog(t)
            }

            globalLogError(t) {
                window.console && window.console.error ? window.console.error(t) : this.globalLogWarn(t)
            }

            log(t, ...e) {
                var n = j.apply(this, arguments);
                Re.log ? Re.log(n) : Re.logToConsole && t.bind(this)(n)
            }
        }, G = function (t, e, n, i, r) {
            void 0 === n.headers && null == n.headersProvider || W.warn(`To send headers with the ${i.toString()} request, you must use AJAX, rather than JSONP.`);
            var s = t.nextAuthCallbackID.toString();
            t.nextAuthCallbackID++;
            var o = t.getDocument(), a = o.createElement("script");
            t.auth_callbacks[s] = function (t) {
                r(null, t)
            };
            var c = "Pusher.auth_callbacks['" + s + "']";
            a.src = n.endpoint + "?callback=" + encodeURIComponent(c) + "&" + e;
            var h = o.getElementsByTagName("head")[0] || o.documentElement;
            h.insertBefore(a, h.firstChild)
        };

        class V {
            constructor(t) {
                this.src = t
            }

            send(t) {
                var e = this, n = "Error loading " + e.src;
                e.script = document.createElement("script"), e.script.id = t.id, e.script.src = e.src, e.script.type = "text/javascript", e.script.charset = "UTF-8", e.script.addEventListener ? (e.script.onerror = function () {
                    t.callback(n)
                }, e.script.onload = function () {
                    t.callback(null)
                }) : e.script.onreadystatechange = function () {
                    "loaded" !== e.script.readyState && "complete" !== e.script.readyState || t.callback(null)
                }, void 0 === e.script.async && document.attachEvent && /opera/i.test(navigator.userAgent) ? (e.errorScript = document.createElement("script"), e.errorScript.id = t.id + "_error", e.errorScript.text = t.name + "('" + n + "');", e.script.async = e.errorScript.async = !1) : e.script.async = !0;
                var i = document.getElementsByTagName("head")[0];
                i.insertBefore(e.script, i.firstChild), e.errorScript && i.insertBefore(e.errorScript, e.script.nextSibling)
            }

            cleanup() {
                this.script && (this.script.onload = this.script.onerror = null, this.script.onreadystatechange = null), this.script && this.script.parentNode && this.script.parentNode.removeChild(this.script), this.errorScript && this.errorScript.parentNode && this.errorScript.parentNode.removeChild(this.errorScript), this.script = null, this.errorScript = null
            }
        }

        class Y {
            constructor(t, e) {
                this.url = t, this.data = e
            }

            send(t) {
                if (!this.request) {
                    var e = X(this.data), n = this.url + "/" + t.number + "?" + e;
                    this.request = he.createScriptRequest(n), this.request.send(t)
                }
            }

            cleanup() {
                this.request && this.request.cleanup()
            }
        }

        var K = {
            name: "jsonp", getAgent: function (t, e) {
                return function (n, i) {
                    var s = "http" + (e ? "s" : "") + "://" + (t.host || t.options.host) + t.options.path,
                        o = he.createJSONPRequest(s, n), a = he.ScriptReceivers.create((function (e, n) {
                            r.remove(a), o.cleanup(), n && n.host && (t.host = n.host), i && i(e, n)
                        }));
                    o.send(a)
                }
            }
        };

        function Q(t, e, n) {
            return t + "://" + (e.useTLS ? e.hostTLS : e.hostNonTLS) + n
          //  return t + (e.useTLS ? "s" : "") + "://" + (e.useTLS ? e.hostTLS : e.hostNonTLS) + n
        }

        function Z(t, e) {
            return "/app/" + t + "?protocol=" + s.PROTOCOL + "&client=js&version=" + s.VERSION + (e ? "&" + e : "")
        }

        var tt = {
            getInitial: function (t, e) {
                return Q("ws", e, (e.httpPath || "") + Z(t, "flash=false"))
            }
        }, et = {
            getInitial: function (t, e) {
                return Q("http", e, (e.httpPath || "/pusher") + Z(t))
            }
        }, nt = {
            getInitial: function (t, e) {
                return Q("http", e, e.httpPath || "/pusher")
            }, getPath: function (t, e) {
                return Z(t)
            }
        };

        class it {
            constructor() {
                this._callbacks = {}
            }

            get(t) {
                return this._callbacks[rt(t)]
            }

            add(t, e, n) {
                var i = rt(t);
                this._callbacks[i] = this._callbacks[i] || [], this._callbacks[i].push({fn: e, context: n})
            }

            remove(t, e, n) {
                if (t || e || n) {
                    var i = t ? [rt(t)] : H(this._callbacks);
                    e || n ? this.removeCallback(i, e, n) : this.removeAllCallbacks(i)
                } else this._callbacks = {}
            }

            removeCallback(t, e, n) {
                M(t, (function (t) {
                    this._callbacks[t] = q(this._callbacks[t] || [], (function (t) {
                        return e && e !== t.fn || n && n !== t.context
                    })), 0 === this._callbacks[t].length && delete this._callbacks[t]
                }), this)
            }

            removeAllCallbacks(t) {
                M(t, (function (t) {
                    delete this._callbacks[t]
                }), this)
            }
        }

        function rt(t) {
            return "_" + t
        }

        class st {
            constructor(t) {
                this.callbacks = new it, this.global_callbacks = [], this.failThrough = t
            }

            bind(t, e, n) {
                return this.callbacks.add(t, e, n), this
            }

            bind_global(t) {
                return this.global_callbacks.push(t), this
            }

            unbind(t, e, n) {
                return this.callbacks.remove(t, e, n), this
            }

            unbind_global(t) {
                return t ? (this.global_callbacks = q(this.global_callbacks || [], (e => e !== t)), this) : (this.global_callbacks = [], this)
            }

            unbind_all() {
                return this.unbind(), this.unbind_global(), this
            }

            emit(t, e, n) {
                for (var i = 0; i < this.global_callbacks.length; i++) this.global_callbacks[i](t, e);
                var r = this.callbacks.get(t), s = [];
                if (n ? s.push(e, n) : e && s.push(e), r && r.length > 0) for (i = 0; i < r.length; i++) r[i].fn.apply(r[i].context || window, s); else this.failThrough && this.failThrough(t, e);
                return this
            }
        }

        class ot extends st {
            constructor(t, e, n, i, r) {
                super(), this.initialize = he.transportConnectionInitializer, this.hooks = t, this.name = e, this.priority = n, this.key = i, this.options = r, this.state = "new", this.timeline = r.timeline, this.activityTimeout = r.activityTimeout, this.id = this.timeline.generateUniqueID()
            }

            handlesActivityChecks() {
                return Boolean(this.hooks.handlesActivityChecks)
            }

            supportsPing() {
                return Boolean(this.hooks.supportsPing)
            }

            connect() {
                if (this.socket || "initialized" !== this.state) return !1;
                var t = this.hooks.urls.getInitial(this.key, this.options);
                try {
                    this.socket = this.hooks.getSocket(t, this.options)
                } catch (t) {
                    return I.defer((() => {
                        this.onError(t), this.changeState("closed")
                    })), !1
                }
                return this.bindListeners(), W.debug("Connecting", {
                    transport: this.name,
                    url: t
                }), this.changeState("connecting"), !0
            }

            close() {
                return !!this.socket && (this.socket.close(), !0)
            }

            send(t) {
                return "open" === this.state && (I.defer((() => {
                    this.socket && this.socket.send(t)
                })), !0)
            }

            ping() {
                "open" === this.state && this.supportsPing() && this.socket.ping()
            }

            onOpen() {
                this.hooks.beforeOpen && this.hooks.beforeOpen(this.socket, this.hooks.urls.getPath(this.key, this.options)), this.changeState("open"), this.socket.onopen = void 0
            }

            onError(t) {
                this.emit("error", {
                    type: "WebSocketError",
                    error: t
                }), this.timeline.error(this.buildTimelineMessage({error: t.toString()}))
            }

            onClose(t) {
                t ? this.changeState("closed", {
                    code: t.code,
                    reason: t.reason,
                    wasClean: t.wasClean
                }) : this.changeState("closed"), this.unbindListeners(), this.socket = void 0
            }

            onMessage(t) {
                this.emit("message", t)
            }

            onActivity() {
                this.emit("activity")
            }

            bindListeners() {
                this.socket.onopen = () => {
                    this.onOpen()
                }, this.socket.onerror = t => {
                    this.onError(t)
                }, this.socket.onclose = t => {
                    this.onClose(t)
                }, this.socket.onmessage = t => {
                    this.onMessage(t)
                }, this.supportsPing() && (this.socket.onactivity = () => {
                    this.onActivity()
                })
            }

            unbindListeners() {
                this.socket && (this.socket.onopen = void 0, this.socket.onerror = void 0, this.socket.onclose = void 0, this.socket.onmessage = void 0, this.supportsPing() && (this.socket.onactivity = void 0))
            }

            changeState(t, e) {
                this.state = t, this.timeline.info(this.buildTimelineMessage({state: t, params: e})), this.emit(t, e)
            }

            buildTimelineMessage(t) {
                return D({cid: this.id}, t)
            }
        }

        class at {
            constructor(t) {
                this.hooks = t
            }

            isSupported(t) {
                return this.hooks.isSupported(t)
            }

            createConnection(t, e, n, i) {
                return new ot(this.hooks, t, e, n, i)
            }
        }

        var ct = new at({
            urls: tt, handlesActivityChecks: !1, supportsPing: !1, isInitialized: function () {
                return Boolean(he.getWebSocketAPI())
            }, isSupported: function () {
                return Boolean(he.getWebSocketAPI())
            }, getSocket: function (t) {
                return he.createWebSocket(t)
            }
        }), ht = {
            urls: et, handlesActivityChecks: !1, supportsPing: !0, isInitialized: function () {
                return !0
            }
        }, ut = D({
            getSocket: function (t) {
                return he.HTTPFactory.createStreamingSocket(t)
            }
        }, ht), lt = D({
            getSocket: function (t) {
                return he.HTTPFactory.createPollingSocket(t)
            }
        }, ht), dt = {
            isSupported: function () {
                return he.isXHRSupported()
            }
        }, pt = {ws: ct, xhr_streaming: new at(D({}, ut, dt)), xhr_polling: new at(D({}, lt, dt))}, ft = new at({
            file: "sockjs",
            urls: nt,
            handlesActivityChecks: !0,
            supportsPing: !1,
            isSupported: function () {
                return !0
            },
            isInitialized: function () {
                return void 0 !== window.SockJS
            },
            getSocket: function (t, e) {
                return new window.SockJS(t, null, {
                    js_path: a.getPath("sockjs", {useTLS: e.useTLS}),
                    ignore_null_origin: e.ignoreNullOrigin
                })
            },
            beforeOpen: function (t, e) {
                t.send(JSON.stringify({path: e}))
            }
        }), gt = {
            isSupported: function (t) {
                return he.isXDRSupported(t.useTLS)
            }
        }, bt = new at(D({}, ut, gt)), mt = new at(D({}, lt, gt));
        pt.xdr_streaming = bt, pt.xdr_polling = mt, pt.sockjs = ft;
        var vt = pt, yt = new class extends st {
            constructor() {
                super();
                var t = this;
                void 0 !== window.addEventListener && (window.addEventListener("online", (function () {
                    t.emit("online")
                }), !1), window.addEventListener("offline", (function () {
                    t.emit("offline")
                }), !1))
            }

            isOnline() {
                return void 0 === window.navigator.onLine || window.navigator.onLine
            }
        };

        class wt {
            constructor(t, e, n) {
                this.manager = t, this.transport = e, this.minPingDelay = n.minPingDelay, this.maxPingDelay = n.maxPingDelay, this.pingDelay = void 0
            }

            createConnection(t, e, n, i) {
                i = D({}, i, {activityTimeout: this.pingDelay});
                var r = this.transport.createConnection(t, e, n, i), s = null, o = function () {
                    r.unbind("open", o), r.bind("closed", a), s = I.now()
                }, a = t => {
                    if (r.unbind("closed", a), 1002 === t.code || 1003 === t.code) this.manager.reportDeath(); else if (!t.wasClean && s) {
                        var e = I.now() - s;
                        e < 2 * this.maxPingDelay && (this.manager.reportDeath(), this.pingDelay = Math.max(e / 2, this.minPingDelay))
                    }
                };
                return r.bind("open", o), r
            }

            isSupported(t) {
                return this.manager.isAlive() && this.transport.isSupported(t)
            }
        }

        const St = {
            decodeMessage: function (t) {
                try {
                    var e = JSON.parse(t.data), n = e.data;
                    if ("string" == typeof n) try {
                        n = JSON.parse(e.data)
                    } catch (t) {
                    }
                    var i = {event: e.event, channel: e.channel, data: n};
                    return e.user_id && (i.user_id = e.user_id), i
                } catch (e) {
                    throw {type: "MessageParseError", error: e, data: t.data}
                }
            }, encodeMessage: function (t) {
                return JSON.stringify(t)
            }, processHandshake: function (t) {
                var e = St.decodeMessage(t);
                if ("pusher:connection_established" === e.event) {
                    if (!e.data.activity_timeout) throw "No activity timeout specified in handshake";
                    return {action: "connected", id: e.data.socket_id, activityTimeout: 1e3 * e.data.activity_timeout}
                }
                if ("pusher:error" === e.event) return {
                    action: this.getCloseAction(e.data),
                    error: this.getCloseError(e.data)
                };
                throw "Invalid handshake"
            }, getCloseAction: function (t) {
                return t.code < 4e3 ? t.code >= 1002 && t.code <= 1004 ? "backoff" : null : 4e3 === t.code ? "tls_only" : t.code < 4100 ? "refused" : t.code < 4200 ? "backoff" : t.code < 4300 ? "retry" : "refused"
            }, getCloseError: function (t) {
                return 1e3 !== t.code && 1001 !== t.code ? {
                    type: "PusherError",
                    data: {code: t.code, message: t.reason || t.message}
                } : null
            }
        };
        var _t = St;

        class kt extends st {
            constructor(t, e) {
                super(), this.id = t, this.transport = e, this.activityTimeout = e.activityTimeout, this.bindListeners()
            }

            handlesActivityChecks() {
                return this.transport.handlesActivityChecks()
            }

            send(t) {
                return this.transport.send(t)
            }

            send_event(t, e, n) {
                var i = {event: t, data: e};
                return n && (i.channel = n), W.debug("Event sent", i), this.send(_t.encodeMessage(i))
            }

            ping() {
                this.transport.supportsPing() ? this.transport.ping() : this.send_event("pusher:ping", {})
            }

            close() {
                this.transport.close()
            }

            bindListeners() {
                var t = {
                    message: t => {
                        var e;
                        try {
                            e = _t.decodeMessage(t)
                        } catch (e) {
                            this.emit("error", {type: "MessageParseError", error: e, data: t.data})
                        }
                        if (void 0 !== e) {
                            switch (W.debug("Event recd", e), e.event) {
                                case"pusher:error":
                                    this.emit("error", {type: "PusherError", data: e.data});
                                    break;
                                case"pusher:ping":
                                    this.emit("ping");
                                    break;
                                case"pusher:pong":
                                    this.emit("pong")
                            }
                            this.emit("message", e)
                        }
                    }, activity: () => {
                        this.emit("activity")
                    }, error: t => {
                        this.emit("error", t)
                    }, closed: t => {
                        e(), t && t.code && this.handleCloseEvent(t), this.transport = null, this.emit("closed")
                    }
                }, e = () => {
                    U(t, ((t, e) => {
                        this.transport.unbind(e, t)
                    }))
                };
                U(t, ((t, e) => {
                    this.transport.bind(e, t)
                }))
            }

            handleCloseEvent(t) {
                var e = _t.getCloseAction(t), n = _t.getCloseError(t);
                n && this.emit("error", n), e && this.emit(e, {action: e, error: n})
            }
        }

        class Ct {
            constructor(t, e) {
                this.transport = t, this.callback = e, this.bindListeners()
            }

            close() {
                this.unbindListeners(), this.transport.close()
            }

            bindListeners() {
                this.onMessage = t => {
                    var e;
                    this.unbindListeners();
                    try {
                        e = _t.processHandshake(t)
                    } catch (t) {
                        return this.finish("error", {error: t}), void this.transport.close()
                    }
                    "connected" === e.action ? this.finish("connected", {
                        connection: new kt(e.id, this.transport),
                        activityTimeout: e.activityTimeout
                    }) : (this.finish(e.action, {error: e.error}), this.transport.close())
                }, this.onClosed = t => {
                    this.unbindListeners();
                    var e = _t.getCloseAction(t) || "backoff", n = _t.getCloseError(t);
                    this.finish(e, {error: n})
                }, this.transport.bind("message", this.onMessage), this.transport.bind("closed", this.onClosed)
            }

            unbindListeners() {
                this.transport.unbind("message", this.onMessage), this.transport.unbind("closed", this.onClosed)
            }

            finish(t, e) {
                this.callback(D({transport: this.transport, action: t}, e))
            }
        }

        class Tt {
            constructor(t, e) {
                this.timeline = t, this.options = e || {}
            }

            send(t, e) {
                this.timeline.isEmpty() || this.timeline.send(he.TimelineTransport.getAgent(this, t), e)
            }
        }

        class Pt extends st {
            constructor(t, e) {
                super((function (e, n) {
                    W.debug("No callbacks on " + t + " for " + e)
                })), this.name = t, this.pusher = e, this.subscribed = !1, this.subscriptionPending = !1, this.subscriptionCancelled = !1
            }

            authorize(t, e) {
                return e(null, {auth: ""})
            }

            trigger(t, e) {
                if (0 !== t.indexOf("client-")) throw new l("Event '" + t + "' does not start with 'client-'");
                if (!this.subscribed) {
                    var n = u("triggeringClientEvents");
                    W.warn(`Client event triggered before channel 'subscription_succeeded' event . ${n}`)
                }
                return this.pusher.send_event(t, e, this.name)
            }

            disconnect() {
                this.subscribed = !1, this.subscriptionPending = !1
            }

            handleEvent(t) {
                var e = t.event, n = t.data;
                "pusher_internal:subscription_succeeded" === e ? this.handleSubscriptionSucceededEvent(t) : "pusher_internal:subscription_count" === e ? this.handleSubscriptionCountEvent(t) : 0 !== e.indexOf("pusher_internal:") && this.emit(e, n, {})
            }

            handleSubscriptionSucceededEvent(t) {
                this.subscriptionPending = !1, this.subscribed = !0, this.subscriptionCancelled ? this.pusher.unsubscribe(this.name) : this.emit("pusher:subscription_succeeded", t.data)
            }

            handleSubscriptionCountEvent(t) {
                t.data.subscription_count && (this.subscriptionCount = t.data.subscription_count), this.emit("pusher:subscription_count", t.data)
            }

            subscribe() {
                this.subscribed || (this.subscriptionPending = !0, this.subscriptionCancelled = !1, this.authorize(this.pusher.connection.socket_id, ((t, e) => {
                    t ? (this.subscriptionPending = !1, W.error(t.toString()), this.emit("pusher:subscription_error", Object.assign({}, {
                        type: "AuthError",
                        error: t.message
                    }, t instanceof y ? {status: t.status} : {}))) : this.pusher.send_event("pusher:subscribe", {
                        auth: e.auth,
                        channel_data: e.channel_data,
                        channel: this.name
                    })
                })))
            }

            unsubscribe() {
                this.subscribed = !1, this.pusher.send_event("pusher:unsubscribe", {channel: this.name})
            }

            cancelSubscription() {
                this.subscriptionCancelled = !0
            }

            reinstateSubscription() {
                this.subscriptionCancelled = !1
            }
        }

        class Et extends Pt {
            authorize(t, e) {
                return this.pusher.config.channelAuthorizer({channelName: this.name, socketId: t}, e)
            }
        }

        class Ot {
            constructor() {
                this.reset()
            }

            get(t) {
                return Object.prototype.hasOwnProperty.call(this.members, t) ? {id: t, info: this.members[t]} : null
            }

            each(t) {
                U(this.members, ((e, n) => {
                    t(this.get(n))
                }))
            }

            setMyID(t) {
                this.myID = t
            }

            onSubscription(t) {
                this.members = t.presence.hash, this.count = t.presence.count, this.me = this.get(this.myID)
            }

            addMember(t) {
                return null === this.get(t.user_id) && this.count++, this.members[t.user_id] = t.user_info, this.get(t.user_id)
            }

            removeMember(t) {
                var e = this.get(t.user_id);
                return e && (delete this.members[t.user_id], this.count--), e
            }

            reset() {
                this.members = {}, this.count = 0, this.myID = null, this.me = null
            }
        }

        var xt = function (t, e, n, i) {
            return new (n || (n = Promise))((function (r, s) {
                function o(t) {
                    try {
                        c(i.next(t))
                    } catch (t) {
                        s(t)
                    }
                }

                function a(t) {
                    try {
                        c(i.throw(t))
                    } catch (t) {
                        s(t)
                    }
                }

                function c(t) {
                    var e;
                    t.done ? r(t.value) : (e = t.value, e instanceof n ? e : new n((function (t) {
                        t(e)
                    }))).then(o, a)
                }

                c((i = i.apply(t, e || [])).next())
            }))
        };

        class Lt extends Et {
            constructor(t, e) {
                super(t, e), this.members = new Ot
            }

            authorize(t, e) {
                super.authorize(t, ((t, n) => xt(this, void 0, void 0, (function* () {
                    if (!t) if (null != n.channel_data) {
                        var i = JSON.parse(n.channel_data);
                        this.members.setMyID(i.user_id)
                    } else {
                        if (yield this.pusher.user.signinDonePromise, null == this.pusher.user.user_data) {
                            let t = u("authorizationEndpoint");
                            return W.error(`Invalid auth response for channel '${this.name}', expected 'channel_data' field. ${t}, or the user should be signed in.`), void e("Invalid auth response")
                        }
                        this.members.setMyID(this.pusher.user.user_data.id)
                    }
                    e(t, n)
                }))))
            }

            handleEvent(t) {
                var e = t.event;
                if (0 === e.indexOf("pusher_internal:")) this.handleInternalEvent(t); else {
                    var n = t.data, i = {};
                    t.user_id && (i.user_id = t.user_id), this.emit(e, n, i)
                }
            }

            handleInternalEvent(t) {
                var e = t.event, n = t.data;
                switch (e) {
                    case"pusher_internal:subscription_succeeded":
                        this.handleSubscriptionSucceededEvent(t);
                        break;
                    case"pusher_internal:subscription_count":
                        this.handleSubscriptionCountEvent(t);
                        break;
                    case"pusher_internal:member_added":
                        var i = this.members.addMember(n);
                        this.emit("pusher:member_added", i);
                        break;
                    case"pusher_internal:member_removed":
                        var r = this.members.removeMember(n);
                        r && this.emit("pusher:member_removed", r)
                }
            }

            handleSubscriptionSucceededEvent(t) {
                this.subscriptionPending = !1, this.subscribed = !0, this.subscriptionCancelled ? this.pusher.unsubscribe(this.name) : (this.members.onSubscription(t.data), this.emit("pusher:subscription_succeeded", this.members))
            }

            disconnect() {
                this.members.reset(), super.disconnect()
            }
        }

        var At = n(1), Rt = n(0);

        class It extends Et {
            constructor(t, e, n) {
                super(t, e), this.key = null, this.nacl = n
            }

            authorize(t, e) {
                super.authorize(t, ((t, n) => {
                    if (t) return void e(t, n);
                    let i = n.shared_secret;
                    i ? (this.key = Object(Rt.decode)(i), delete n.shared_secret, e(null, n)) : e(new Error(`No shared_secret key in auth payload for encrypted channel: ${this.name}`), null)
                }))
            }

            trigger(t, e) {
                throw new b("Client events are not currently supported for encrypted channels")
            }

            handleEvent(t) {
                var e = t.event, n = t.data;
                0 !== e.indexOf("pusher_internal:") && 0 !== e.indexOf("pusher:") ? this.handleEncryptedEvent(e, n) : super.handleEvent(t)
            }

            handleEncryptedEvent(t, e) {
                if (!this.key) return void W.debug("Received encrypted event before key has been retrieved from the authEndpoint");
                if (!e.ciphertext || !e.nonce) return void W.error("Unexpected format for encrypted event, expected object with `ciphertext` and `nonce` fields, got: " + e);
                let n = Object(Rt.decode)(e.ciphertext);
                if (n.length < this.nacl.secretbox.overheadLength) return void W.error(`Expected encrypted event ciphertext length to be ${this.nacl.secretbox.overheadLength}, got: ${n.length}`);
                let i = Object(Rt.decode)(e.nonce);
                if (i.length < this.nacl.secretbox.nonceLength) return void W.error(`Expected encrypted event nonce length to be ${this.nacl.secretbox.nonceLength}, got: ${i.length}`);
                let r = this.nacl.secretbox.open(n, i, this.key);
                if (null === r) return W.debug("Failed to decrypt an event, probably because it was encrypted with a different key. Fetching a new key from the authEndpoint..."), void this.authorize(this.pusher.connection.socket_id, ((e, s) => {
                    e ? W.error(`Failed to make a request to the authEndpoint: ${s}. Unable to fetch new key, so dropping encrypted event`) : (r = this.nacl.secretbox.open(n, i, this.key), null !== r ? this.emit(t, this.getDataToEmit(r)) : W.error("Failed to decrypt event with new key. Dropping encrypted event"))
                }));
                this.emit(t, this.getDataToEmit(r))
            }

            getDataToEmit(t) {
                let e = Object(At.decode)(t);
                try {
                    return JSON.parse(e)
                } catch (t) {
                    return e
                }
            }
        }

        class Dt extends st {
            constructor(t, e) {
                super(), this.state = "initialized", this.connection = null, this.key = t, this.options = e, this.timeline = this.options.timeline, this.usingTLS = this.options.useTLS, this.errorCallbacks = this.buildErrorCallbacks(), this.connectionCallbacks = this.buildConnectionCallbacks(this.errorCallbacks), this.handshakeCallbacks = this.buildHandshakeCallbacks(this.errorCallbacks);
                var n = he.getNetwork();
                n.bind("online", (() => {
                    this.timeline.info({netinfo: "online"}), "connecting" !== this.state && "unavailable" !== this.state || this.retryIn(0)
                })), n.bind("offline", (() => {
                    this.timeline.info({netinfo: "offline"}), this.connection && this.sendActivityCheck()
                })), this.updateStrategy()
            }

            switchCluster(t) {
                this.key = t, this.updateStrategy(), this.retryIn(0)
            }

            connect() {
                this.connection || this.runner || (this.strategy.isSupported() ? (this.updateState("connecting"), this.startConnecting(), this.setUnavailableTimer()) : this.updateState("failed"))
            }

            send(t) {
                return !!this.connection && this.connection.send(t)
            }

            send_event(t, e, n) {
                return !!this.connection && this.connection.send_event(t, e, n)
            }

            disconnect() {
                this.disconnectInternally(), this.updateState("disconnected")
            }

            isUsingTLS() {
                return this.usingTLS
            }

            startConnecting() {
                var t = (e, n) => {
                    e ? this.runner = this.strategy.connect(0, t) : "error" === n.action ? (this.emit("error", {
                        type: "HandshakeError",
                        error: n.error
                    }), this.timeline.error({handshakeError: n.error})) : (this.abortConnecting(), this.handshakeCallbacks[n.action](n))
                };
                this.runner = this.strategy.connect(0, t)
            }

            abortConnecting() {
                this.runner && (this.runner.abort(), this.runner = null)
            }

            disconnectInternally() {
                this.abortConnecting(), this.clearRetryTimer(), this.clearUnavailableTimer(), this.connection && this.abandonConnection().close()
            }

            updateStrategy() {
                this.strategy = this.options.getStrategy({
                    key: this.key,
                    timeline: this.timeline,
                    useTLS: this.usingTLS
                })
            }

            retryIn(t) {
                this.timeline.info({
                    action: "retry",
                    delay: t
                }), t > 0 && this.emit("connecting_in", Math.round(t / 1e3)), this.retryTimer = new L(t || 0, (() => {
                    this.disconnectInternally(), this.connect()
                }))
            }

            clearRetryTimer() {
                this.retryTimer && (this.retryTimer.ensureAborted(), this.retryTimer = null)
            }

            setUnavailableTimer() {
                this.unavailableTimer = new L(this.options.unavailableTimeout, (() => {
                    this.updateState("unavailable")
                }))
            }

            clearUnavailableTimer() {
                this.unavailableTimer && this.unavailableTimer.ensureAborted()
            }

            sendActivityCheck() {
                this.stopActivityCheck(), this.connection.ping(), this.activityTimer = new L(this.options.pongTimeout, (() => {
                    this.timeline.error({pong_timed_out: this.options.pongTimeout}), this.retryIn(0)
                }))
            }

            resetActivityCheck() {
                this.stopActivityCheck(), this.connection && !this.connection.handlesActivityChecks() && (this.activityTimer = new L(this.activityTimeout, (() => {
                    this.sendActivityCheck()
                })))
            }

            stopActivityCheck() {
                this.activityTimer && this.activityTimer.ensureAborted()
            }

            buildConnectionCallbacks(t) {
                return D({}, t, {
                    message: t => {
                        this.resetActivityCheck(), this.emit("message", t)
                    }, ping: () => {
                        this.send_event("pusher:pong", {})
                    }, activity: () => {
                        this.resetActivityCheck()
                    }, error: t => {
                        this.emit("error", t)
                    }, closed: () => {
                        this.abandonConnection(), this.shouldRetry() && this.retryIn(1e3)
                    }
                })
            }

            buildHandshakeCallbacks(t) {
                return D({}, t, {
                    connected: t => {
                        this.activityTimeout = Math.min(this.options.activityTimeout, t.activityTimeout, t.connection.activityTimeout || 1 / 0), this.clearUnavailableTimer(), this.setConnection(t.connection), this.socket_id = this.connection.id, this.updateState("connected", {socket_id: this.socket_id})
                    }
                })
            }

            buildErrorCallbacks() {
                let t = t => e => {
                    e.error && this.emit("error", {type: "WebSocketError", error: e.error}), t(e)
                };
                return {
                    tls_only: t((() => {
                        this.usingTLS = !0, this.updateStrategy(), this.retryIn(0)
                    })), refused: t((() => {
                        this.disconnect()
                    })), backoff: t((() => {
                        this.retryIn(1e3)
                    })), retry: t((() => {
                        this.retryIn(0)
                    }))
                }
            }

            setConnection(t) {
                for (var e in this.connection = t, this.connectionCallbacks) this.connection.bind(e, this.connectionCallbacks[e]);
                this.resetActivityCheck()
            }

            abandonConnection() {
                if (this.connection) {
                    for (var t in this.stopActivityCheck(), this.connectionCallbacks) this.connection.unbind(t, this.connectionCallbacks[t]);
                    var e = this.connection;
                    return this.connection = null, e
                }
            }

            updateState(t, e) {
                var n = this.state;
                if (this.state = t, n !== t) {
                    var i = t;
                    "connected" === i && (i += " with new socket ID " + e.socket_id), W.debug("State changed", n + " -> " + i), this.timeline.info({
                        state: t,
                        params: e
                    }), this.emit("state_change", {previous: n, current: t}), this.emit(t, e)
                }
            }

            shouldRetry() {
                return "connecting" === this.state || "connected" === this.state
            }
        }

        class jt {
            constructor() {
                this.channels = {}
            }

            add(t, e) {
                return this.channels[t] || (this.channels[t] = function (t, e) {
                    if (0 === t.indexOf("private-encrypted-")) {
                        if (e.config.nacl) return Ut.createEncryptedChannel(t, e, e.config.nacl);
                        let n = "Tried to subscribe to a private-encrypted- channel but no nacl implementation available",
                            i = u("encryptedChannelSupport");
                        throw new b(`${n}. ${i}`)
                    }
                    if (0 === t.indexOf("private-")) return Ut.createPrivateChannel(t, e);
                    if (0 === t.indexOf("presence-")) return Ut.createPresenceChannel(t, e);
                    if (0 === t.indexOf("#")) throw new d('Cannot create a channel with name "' + t + '".');
                    return Ut.createChannel(t, e)
                }(t, e)), this.channels[t]
            }

            all() {
                return function (t) {
                    var e = [];
                    return U(t, (function (t) {
                        e.push(t)
                    })), e
                }(this.channels)
            }

            find(t) {
                return this.channels[t]
            }

            remove(t) {
                var e = this.channels[t];
                return delete this.channels[t], e
            }

            disconnect() {
                U(this.channels, (function (t) {
                    t.disconnect()
                }))
            }
        }

        var Nt = {
            createChannels: () => new jt,
            createConnectionManager: (t, e) => new Dt(t, e),
            createChannel: (t, e) => new Pt(t, e),
            createPrivateChannel: (t, e) => new Et(t, e),
            createPresenceChannel: (t, e) => new Lt(t, e),
            createEncryptedChannel: (t, e, n) => new It(t, e, n),
            createTimelineSender: (t, e) => new Tt(t, e),
            createHandshake: (t, e) => new Ct(t, e),
            createAssistantToTheTransportManager: (t, e, n) => new wt(t, e, n)
        }, Ut = Nt;

        class Ht {
            constructor(t) {
                this.options = t || {}, this.livesLeft = this.options.lives || 1 / 0
            }

            getAssistant(t) {
                return Ut.createAssistantToTheTransportManager(this, t, {
                    minPingDelay: this.options.minPingDelay,
                    maxPingDelay: this.options.maxPingDelay
                })
            }

            isAlive() {
                return this.livesLeft > 0
            }

            reportDeath() {
                this.livesLeft -= 1
            }
        }

        class Mt {
            constructor(t, e) {
                this.strategies = t, this.loop = Boolean(e.loop), this.failFast = Boolean(e.failFast), this.timeout = e.timeout, this.timeoutLimit = e.timeoutLimit
            }

            isSupported() {
                return $(this.strategies, I.method("isSupported"))
            }

            connect(t, e) {
                var n = this.strategies, i = 0, r = this.timeout, s = null, o = (a, c) => {
                    c ? e(null, c) : (i += 1, this.loop && (i %= n.length), i < n.length ? (r && (r *= 2, this.timeoutLimit && (r = Math.min(r, this.timeoutLimit))), s = this.tryStrategy(n[i], t, {
                        timeout: r,
                        failFast: this.failFast
                    }, o)) : e(!0))
                };
                return s = this.tryStrategy(n[i], t, {timeout: r, failFast: this.failFast}, o), {
                    abort: function () {
                        s.abort()
                    }, forceMinPriority: function (e) {
                        t = e, s && s.forceMinPriority(e)
                    }
                }
            }

            tryStrategy(t, e, n, i) {
                var r = null, s = null;
                return n.timeout > 0 && (r = new L(n.timeout, (function () {
                    s.abort(), i(!0)
                }))), s = t.connect(e, (function (t, e) {
                    t && r && r.isRunning() && !n.failFast || (r && r.ensureAborted(), i(t, e))
                })), {
                    abort: function () {
                        r && r.ensureAborted(), s.abort()
                    }, forceMinPriority: function (t) {
                        s.forceMinPriority(t)
                    }
                }
            }
        }

        class zt {
            constructor(t) {
                this.strategies = t
            }

            isSupported() {
                return $(this.strategies, I.method("isSupported"))
            }

            connect(t, e) {
                return function (t, e, n) {
                    var i = z(t, (function (t, i, r, s) {
                        return t.connect(e, n(i, s))
                    }));
                    return {
                        abort: function () {
                            M(i, qt)
                        }, forceMinPriority: function (t) {
                            M(i, (function (e) {
                                e.forceMinPriority(t)
                            }))
                        }
                    }
                }(this.strategies, t, (function (t, n) {
                    return function (i, r) {
                        n[t].error = i, i ? function (t) {
                            return function (t, e) {
                                for (var n = 0; n < t.length; n++) if (!e(t[n], n, t)) return !1;
                                return !0
                            }(t, (function (t) {
                                return Boolean(t.error)
                            }))
                        }(n) && e(!0) : (M(n, (function (t) {
                            t.forceMinPriority(r.transport.priority)
                        })), e(null, r))
                    }
                }))
            }
        }

        function qt(t) {
            t.error || t.aborted || (t.abort(), t.aborted = !0)
        }

        class Bt {
            constructor(t, e, n) {
                this.strategy = t, this.transports = e, this.ttl = n.ttl || 18e5, this.usingTLS = n.useTLS, this.timeline = n.timeline
            }

            isSupported() {
                return this.strategy.isSupported()
            }

            connect(t, e) {
                var n = this.usingTLS, i = function (t) {
                    var e = he.getLocalStorage();
                    if (e) try {
                        var n = e[$t(t)];
                        if (n) return JSON.parse(n)
                    } catch (e) {
                        Ft(t)
                    }
                    return null
                }(n), r = i && i.cacheSkipCount ? i.cacheSkipCount : 0, s = [this.strategy];
                if (i && i.timestamp + this.ttl >= I.now()) {
                    var o = this.transports[i.transport];
                    o && (["ws", "wss"].includes(i.transport) || r > 3 ? (this.timeline.info({
                        cached: !0,
                        transport: i.transport,
                        latency: i.latency
                    }), s.push(new Mt([o], {timeout: 2 * i.latency + 1e3, failFast: !0}))) : r++)
                }
                var a = I.now(), c = s.pop().connect(t, (function i(o, h) {
                    o ? (Ft(n), s.length > 0 ? (a = I.now(), c = s.pop().connect(t, i)) : e(o)) : (function (t, e, n, i) {
                        var r = he.getLocalStorage();
                        if (r) try {
                            r[$t(t)] = J({timestamp: I.now(), transport: e, latency: n, cacheSkipCount: i})
                        } catch (t) {
                        }
                    }(n, h.transport.name, I.now() - a, r), e(null, h))
                }));
                return {
                    abort: function () {
                        c.abort()
                    }, forceMinPriority: function (e) {
                        t = e, c && c.forceMinPriority(e)
                    }
                }
            }
        }

        function $t(t) {
            return "pusherTransport" + (t ? "TLS" : "NonTLS")
        }

        function Ft(t) {
            var e = he.getLocalStorage();
            if (e) try {
                delete e[$t(t)]
            } catch (t) {
            }
        }

        class Xt {
            constructor(t, {delay: e}) {
                this.strategy = t, this.options = {delay: e}
            }

            isSupported() {
                return this.strategy.isSupported()
            }

            connect(t, e) {
                var n, i = this.strategy, r = new L(this.options.delay, (function () {
                    n = i.connect(t, e)
                }));
                return {
                    abort: function () {
                        r.ensureAborted(), n && n.abort()
                    }, forceMinPriority: function (e) {
                        t = e, n && n.forceMinPriority(e)
                    }
                }
            }
        }

        class Jt {
            constructor(t, e, n) {
                this.test = t, this.trueBranch = e, this.falseBranch = n
            }

            isSupported() {
                return (this.test() ? this.trueBranch : this.falseBranch).isSupported()
            }

            connect(t, e) {
                return (this.test() ? this.trueBranch : this.falseBranch).connect(t, e)
            }
        }

        class Wt {
            constructor(t) {
                this.strategy = t
            }

            isSupported() {
                return this.strategy.isSupported()
            }

            connect(t, e) {
                var n = this.strategy.connect(t, (function (t, i) {
                    i && n.abort(), e(t, i)
                }));
                return n
            }
        }

        function Gt(t) {
            return function () {
                return t.isSupported()
            }
        }

        var Vt, Yt = function (t, e, n) {
            var i = {};

            function r(e, r, s, o, a) {
                var c = n(t, e, r, s, o, a);
                return i[e] = c, c
            }

            var s, o = Object.assign({}, e, {
                    hostNonTLS: t.wsHost + ":" + t.wsPort,
                    hostTLS: t.wsHost + ":" + t.wssPort,
                    httpPath: t.wsPath
                }), a = Object.assign({}, o, {useTLS: !0}), c = Object.assign({}, e, {
                    hostNonTLS: t.httpHost + ":" + t.httpPort,
                    hostTLS: t.httpHost + ":" + t.httpsPort,
                    httpPath: t.httpPath
                }), h = {loop: !0, timeout: 15e3, timeoutLimit: 6e4},
                u = new Ht({minPingDelay: 1e4, maxPingDelay: t.activityTimeout}),
                l = new Ht({lives: 2, minPingDelay: 1e4, maxPingDelay: t.activityTimeout}), d = r("ws", "ws", 3, o, u),
                p = r("wss", "ws", 3, a, u), f = r("sockjs", "sockjs", 1, c),
                g = r("xhr_streaming", "xhr_streaming", 1, c, l), b = r("xdr_streaming", "xdr_streaming", 1, c, l),
                m = r("xhr_polling", "xhr_polling", 1, c), v = r("xdr_polling", "xdr_polling", 1, c),
                y = new Mt([d], h), w = new Mt([p], h), S = new Mt([f], h), _ = new Mt([new Jt(Gt(g), g, b)], h),
                k = new Mt([new Jt(Gt(m), m, v)], h),
                C = new Mt([new Jt(Gt(_), new zt([_, new Xt(k, {delay: 4e3})]), k)], h), T = new Jt(Gt(C), C, S);
            return s = e.useTLS ? new zt([y, new Xt(T, {delay: 2e3})]) : new zt([y, new Xt(w, {delay: 2e3}), new Xt(T, {delay: 5e3})]), new Bt(new Wt(new Jt(Gt(d), s, T)), i, {
                ttl: 18e5,
                timeline: e.timeline,
                useTLS: e.useTLS
            })
        }, Kt = {
            getRequest: function (t) {
                var e = new window.XDomainRequest;
                return e.ontimeout = function () {
                    t.emit("error", new p), t.close()
                }, e.onerror = function (e) {
                    t.emit("error", e), t.close()
                }, e.onprogress = function () {
                    e.responseText && e.responseText.length > 0 && t.onChunk(200, e.responseText)
                }, e.onload = function () {
                    e.responseText && e.responseText.length > 0 && t.onChunk(200, e.responseText), t.emit("finished", 200), t.close()
                }, e
            }, abortRequest: function (t) {
                t.ontimeout = t.onerror = t.onprogress = t.onload = null, t.abort()
            }
        };

        class Qt extends st {
            constructor(t, e, n) {
                super(), this.hooks = t, this.method = e, this.url = n
            }

            start(t) {
                this.position = 0, this.xhr = this.hooks.getRequest(this), this.unloader = () => {
                    this.close()
                }, he.addUnloadListener(this.unloader), this.xhr.open(this.method, this.url, !0), this.xhr.setRequestHeader && this.xhr.setRequestHeader("Content-Type", "application/json"), this.xhr.send(t)
            }

            close() {
                this.unloader && (he.removeUnloadListener(this.unloader), this.unloader = null), this.xhr && (this.hooks.abortRequest(this.xhr), this.xhr = null)
            }

            onChunk(t, e) {
                for (; ;) {
                    var n = this.advanceBuffer(e);
                    if (!n) break;
                    this.emit("chunk", {status: t, data: n})
                }
                this.isBufferTooLong(e) && this.emit("buffer_too_long")
            }

            advanceBuffer(t) {
                var e = t.slice(this.position), n = e.indexOf("\n");
                return -1 !== n ? (this.position += n + 1, e.slice(0, n)) : null
            }

            isBufferTooLong(t) {
                return this.position === t.length && t.length > 262144
            }
        }

        !function (t) {
            t[t.CONNECTING = 0] = "CONNECTING", t[t.OPEN = 1] = "OPEN", t[t.CLOSED = 3] = "CLOSED"
        }(Vt || (Vt = {}));
        var Zt = Vt, te = 1;

        function ee(t) {
            var e = -1 === t.indexOf("?") ? "?" : "&";
            return t + e + "t=" + +new Date + "&n=" + te++
        }

        function ne(t) {
            return he.randomInt(t)
        }

        var ie, re = class {
            constructor(t, e) {
                this.hooks = t, this.session = ne(1e3) + "/" + function (t) {
                    for (var e = [], n = 0; n < t; n++) e.push(ne(32).toString(32));
                    return e.join("")
                }(8), this.location = function (t) {
                    var e = /([^\?]*)\/*(\??.*)/.exec(t);
                    return {base: e[1], queryString: e[2]}
                }(e), this.readyState = Zt.CONNECTING, this.openStream()
            }

            send(t) {
                return this.sendRaw(JSON.stringify([t]))
            }

            ping() {
                this.hooks.sendHeartbeat(this)
            }

            close(t, e) {
                this.onClose(t, e, !0)
            }

            sendRaw(t) {
                if (this.readyState !== Zt.OPEN) return !1;
                try {
                    return he.createSocketRequest("POST", ee((e = this.location, n = this.session, e.base + "/" + n + "/xhr_send"))).start(t), !0
                } catch (t) {
                    return !1
                }
                var e, n
            }

            reconnect() {
                this.closeStream(), this.openStream()
            }

            onClose(t, e, n) {
                this.closeStream(), this.readyState = Zt.CLOSED, this.onclose && this.onclose({
                    code: t,
                    reason: e,
                    wasClean: n
                })
            }

            onChunk(t) {
                var e;
                if (200 === t.status) switch (this.readyState === Zt.OPEN && this.onActivity(), t.data.slice(0, 1)) {
                    case"o":
                        e = JSON.parse(t.data.slice(1) || "{}"), this.onOpen(e);
                        break;
                    case"a":
                        e = JSON.parse(t.data.slice(1) || "[]");
                        for (var n = 0; n < e.length; n++) this.onEvent(e[n]);
                        break;
                    case"m":
                        e = JSON.parse(t.data.slice(1) || "null"), this.onEvent(e);
                        break;
                    case"h":
                        this.hooks.onHeartbeat(this);
                        break;
                    case"c":
                        e = JSON.parse(t.data.slice(1) || "[]"), this.onClose(e[0], e[1], !0)
                }
            }

            onOpen(t) {
                var e, n, i;
                this.readyState === Zt.CONNECTING ? (t && t.hostname && (this.location.base = (e = this.location.base, n = t.hostname, (i = /(https?:\/\/)([^\/:]+)((\/|:)?.*)/.exec(e))[1] + n + i[3])), this.readyState = Zt.OPEN, this.onopen && this.onopen()) : this.onClose(1006, "Server lost session", !0)
            }

            onEvent(t) {
                this.readyState === Zt.OPEN && this.onmessage && this.onmessage({data: t})
            }

            onActivity() {
                this.onactivity && this.onactivity()
            }

            onError(t) {
                this.onerror && this.onerror(t)
            }

            openStream() {
                this.stream = he.createSocketRequest("POST", ee(this.hooks.getReceiveURL(this.location, this.session))), this.stream.bind("chunk", (t => {
                    this.onChunk(t)
                })), this.stream.bind("finished", (t => {
                    this.hooks.onFinished(this, t)
                })), this.stream.bind("buffer_too_long", (() => {
                    this.reconnect()
                }));
                try {
                    this.stream.start()
                } catch (t) {
                    I.defer((() => {
                        this.onError(t), this.onClose(1006, "Could not start streaming", !1)
                    }))
                }
            }

            closeStream() {
                this.stream && (this.stream.unbind_all(), this.stream.close(), this.stream = null)
            }
        }, se = {
            getReceiveURL: function (t, e) {
                return t.base + "/" + e + "/xhr_streaming" + t.queryString
            }, onHeartbeat: function (t) {
                t.sendRaw("[]")
            }, sendHeartbeat: function (t) {
                t.sendRaw("[]")
            }, onFinished: function (t, e) {
                t.onClose(1006, "Connection interrupted (" + e + ")", !1)
            }
        }, oe = {
            getReceiveURL: function (t, e) {
                return t.base + "/" + e + "/xhr" + t.queryString
            }, onHeartbeat: function () {
            }, sendHeartbeat: function (t) {
                t.sendRaw("[]")
            }, onFinished: function (t, e) {
                200 === e ? t.reconnect() : t.onClose(1006, "Connection interrupted (" + e + ")", !1)
            }
        }, ae = {
            getRequest: function (t) {
                var e = new (he.getXHRAPI());
                return e.onreadystatechange = e.onprogress = function () {
                    switch (e.readyState) {
                        case 3:
                            e.responseText && e.responseText.length > 0 && t.onChunk(e.status, e.responseText);
                            break;
                        case 4:
                            e.responseText && e.responseText.length > 0 && t.onChunk(e.status, e.responseText), t.emit("finished", e.status), t.close()
                    }
                }, e
            }, abortRequest: function (t) {
                t.onreadystatechange = null, t.abort()
            }
        }, ce = {
            createStreamingSocket(t) {
                return this.createSocket(se, t)
            }, createPollingSocket(t) {
                return this.createSocket(oe, t)
            }, createSocket: (t, e) => new re(t, e), createXHR(t, e) {
                return this.createRequest(ae, t, e)
            }, createRequest: (t, e, n) => new Qt(t, e, n), createXDR: function (t, e) {
                return this.createRequest(Kt, t, e)
            }
        }, he = {
            nextAuthCallbackID: 1,
            auth_callbacks: {},
            ScriptReceivers: r,
            DependenciesReceivers: o,
            getDefaultStrategy: Yt,
            Transports: vt,
            transportConnectionInitializer: function () {
                var t = this;
                t.timeline.info(t.buildTimelineMessage({transport: t.name + (t.options.useTLS ? "s" : "")})), t.hooks.isInitialized() ? t.changeState("initialized") : t.hooks.file ? (t.changeState("initializing"), a.load(t.hooks.file, {useTLS: t.options.useTLS}, (function (e, n) {
                    t.hooks.isInitialized() ? (t.changeState("initialized"), n(!0)) : (e && t.onError(e), t.onClose(), n(!1))
                }))) : t.onClose()
            },
            HTTPFactory: ce,
            TimelineTransport: K,
            getXHRAPI: () => window.XMLHttpRequest,
            getWebSocketAPI: () => window.WebSocket || window.MozWebSocket,
            setup(t) {
                window.Pusher = t;
                var e = () => {
                    this.onDocumentBody(t.ready)
                };
                window.JSON ? e() : a.load("json2", {}, e)
            },
            getDocument: () => document,
            getProtocol() {
                return this.getDocument().location.protocol
            },
            getAuthorizers: () => ({ajax: w, jsonp: G}),
            onDocumentBody(t) {
                document.body ? t() : setTimeout((() => {
                    this.onDocumentBody(t)
                }), 0)
            },
            createJSONPRequest: (t, e) => new Y(t, e),
            createScriptRequest: t => new V(t),
            getLocalStorage() {
                try {
                    return window.localStorage
                } catch (t) {
                    return
                }
            },
            createXHR() {
                return this.getXHRAPI() ? this.createXMLHttpRequest() : this.createMicrosoftXHR()
            },
            createXMLHttpRequest() {
                return new (this.getXHRAPI())
            },
            createMicrosoftXHR: () => new ActiveXObject("Microsoft.XMLHTTP"),
            getNetwork: () => yt,
            createWebSocket(t) {
                return new (this.getWebSocketAPI())(t)
            },
            createSocketRequest(t, e) {
                if (this.isXHRSupported()) return this.HTTPFactory.createXHR(t, e);
                if (this.isXDRSupported(0 === e.indexOf("https:"))) return this.HTTPFactory.createXDR(t, e);
                throw "Cross-origin HTTP requests are not supported"
            },
            isXHRSupported() {
                var t = this.getXHRAPI();
                return Boolean(t) && void 0 !== (new t).withCredentials
            },
            isXDRSupported(t) {
                var e = t ? "https:" : "http:", n = this.getProtocol();
                return Boolean(window.XDomainRequest) && n === e
            },
            addUnloadListener(t) {
                void 0 !== window.addEventListener ? window.addEventListener("unload", t, !1) : void 0 !== window.attachEvent && window.attachEvent("onunload", t)
            },
            removeUnloadListener(t) {
                void 0 !== window.addEventListener ? window.removeEventListener("unload", t, !1) : void 0 !== window.detachEvent && window.detachEvent("onunload", t)
            },
            randomInt: t => Math.floor((window.crypto || window.msCrypto).getRandomValues(new Uint32Array(1))[0] / Math.pow(2, 32) * t)
        };
        !function (t) {
            t[t.ERROR = 3] = "ERROR", t[t.INFO = 6] = "INFO", t[t.DEBUG = 7] = "DEBUG"
        }(ie || (ie = {}));
        var ue = ie;

        class le {
            constructor(t, e, n) {
                this.key = t, this.session = e, this.events = [], this.options = n || {}, this.sent = 0, this.uniqueID = 0
            }

            log(t, e) {
                t <= this.options.level && (this.events.push(D({}, e, {timestamp: I.now()})), this.options.limit && this.events.length > this.options.limit && this.events.shift())
            }

            error(t) {
                this.log(ue.ERROR, t)
            }

            info(t) {
                this.log(ue.INFO, t)
            }

            debug(t) {
                this.log(ue.DEBUG, t)
            }

            isEmpty() {
                return 0 === this.events.length
            }

            send(t, e) {
                var n = D({
                    session: this.session,
                    bundle: this.sent + 1,
                    key: this.key,
                    lib: "js",
                    version: this.options.version,
                    cluster: this.options.cluster,
                    features: this.options.features,
                    timeline: this.events
                }, this.options.params);
                return this.events = [], t(n, ((t, n) => {
                    t || this.sent++, e && e(t, n)
                })), !0
            }

            generateUniqueID() {
                return this.uniqueID++, this.uniqueID
            }
        }

        class de {
            constructor(t, e, n, i) {
                this.name = t, this.priority = e, this.transport = n, this.options = i || {}
            }

            isSupported() {
                return this.transport.isSupported({useTLS: this.options.useTLS})
            }

            connect(t, e) {
                if (!this.isSupported()) return pe(new v, e);
                if (this.priority < t) return pe(new f, e);
                var n = !1,
                    i = this.transport.createConnection(this.name, this.priority, this.options.key, this.options),
                    r = null, s = function () {
                        i.unbind("initialized", s), i.connect()
                    }, o = function () {
                        r = Ut.createHandshake(i, (function (t) {
                            n = !0, h(), e(null, t)
                        }))
                    }, a = function (t) {
                        h(), e(t)
                    }, c = function () {
                        var t;
                        h(), t = J(i), e(new g(t))
                    }, h = function () {
                        i.unbind("initialized", s), i.unbind("open", o), i.unbind("error", a), i.unbind("closed", c)
                    };
                return i.bind("initialized", s), i.bind("open", o), i.bind("error", a), i.bind("closed", c), i.initialize(), {
                    abort: () => {
                        n || (h(), r ? r.close() : i.close())
                    }, forceMinPriority: t => {
                        n || this.priority < t && (r ? r.close() : i.close())
                    }
                }
            }
        }

        function pe(t, e) {
            return I.defer((function () {
                e(t)
            })), {
                abort: function () {
                }, forceMinPriority: function () {
                }
            }
        }

        const {Transports: fe} = he;
        var ge = function (t, e, n, i, r, s) {
            var o, a = fe[n];
            if (!a) throw new m(n);
            return t.enabledTransports && -1 === N(t.enabledTransports, e) || t.disabledTransports && -1 !== N(t.disabledTransports, e) ? o = be : (r = Object.assign({ignoreNullOrigin: t.ignoreNullOrigin}, r), o = new de(e, i, s ? s.getAssistant(a) : a, r)), o
        }, be = {
            isSupported: function () {
                return !1
            }, connect: function (t, e) {
                var n = I.defer((function () {
                    e(new v)
                }));
                return {
                    abort: function () {
                        n.ensureAborted()
                    }, forceMinPriority: function () {
                    }
                }
            }
        }, me = t => {
            if (void 0 === he.getAuthorizers()[t.transport]) throw `'${t.transport}' is not a recognized auth transport`;
            return (e, n) => {
                const i = ((t, e) => {
                    var n = "socket_id=" + encodeURIComponent(t.socketId);
                    for (var i in e.params) n += "&" + encodeURIComponent(i) + "=" + encodeURIComponent(e.params[i]);
                    if (null != e.paramsProvider) {
                        let t = e.paramsProvider();
                        for (var i in t) n += "&" + encodeURIComponent(i) + "=" + encodeURIComponent(t[i])
                    }
                    return n
                })(e, t);
                he.getAuthorizers()[t.transport](he, i, t, h.UserAuthentication, n)
            }
        }, ve = t => {
            if (void 0 === he.getAuthorizers()[t.transport]) throw `'${t.transport}' is not a recognized auth transport`;
            return (e, n) => {
                const i = ((t, e) => {
                    var n = "socket_id=" + encodeURIComponent(t.socketId);
                    for (var i in n += "&channel_name=" + encodeURIComponent(t.channelName), e.params) n += "&" + encodeURIComponent(i) + "=" + encodeURIComponent(e.params[i]);
                    if (null != e.paramsProvider) {
                        let t = e.paramsProvider();
                        for (var i in t) n += "&" + encodeURIComponent(i) + "=" + encodeURIComponent(t[i])
                    }
                    return n
                })(e, t);
                he.getAuthorizers()[t.transport](he, i, t, h.ChannelAuthorization, n)
            }
        };
        const ye = (t, e, n) => {
            const i = {
                authTransport: e.transport,
                authEndpoint: e.endpoint,
                auth: {params: e.params, headers: e.headers}
            };
            return (e, r) => {
                const s = t.channel(e.channelName);
                n(s, i).authorize(e.socketId, r)
            }
        };

        function we(t, e) {
            let n = {
                activityTimeout: t.activityTimeout || s.activityTimeout,
                cluster: t.cluster,
                httpPath: t.httpPath || s.httpPath,
                httpPort: t.httpPort || s.httpPort,
                httpsPort: t.httpsPort || s.httpsPort,
                pongTimeout: t.pongTimeout || s.pongTimeout,
                statsHost: t.statsHost || s.stats_host,
                unavailableTimeout: t.unavailableTimeout || s.unavailableTimeout,
                wsPath: t.wsPath || s.wsPath,
                wsPort: t.wsPort || s.wsPort,
                wssPort: t.wssPort || s.wssPort,
                enableStats: Ce(t),
                httpHost: Se(t),
                useTLS: ke(t),
                wsHost: _e(t),
                userAuthenticator: Pe(t),
                channelAuthorizer: Ee(t, e)
            };
            return "disabledTransports" in t && (n.disabledTransports = t.disabledTransports), "enabledTransports" in t && (n.enabledTransports = t.enabledTransports), "ignoreNullOrigin" in t && (n.ignoreNullOrigin = t.ignoreNullOrigin), "timelineParams" in t && (n.timelineParams = t.timelineParams), "nacl" in t && (n.nacl = t.nacl), n
        }

        function Se(t) {
            return t.httpHost ? t.httpHost : t.cluster ? `sockjs-${t.cluster}.pusher.com` : s.httpHost
        }

        function _e(t) {
            return t.wsHost ? t.wsHost : `ws-${t.cluster}.pusher.com`
        }

        function ke(t) {
            return "https:" === he.getProtocol() || !1 !== t.forceTLS
        }

        function Ce(t) {
            return "enableStats" in t ? t.enableStats : "disableStats" in t && !t.disableStats
        }

        const Te = t => "customHandler" in t && null != t.customHandler;

        function Pe(t) {
            const e = Object.assign(Object.assign({}, s.userAuthentication), t.userAuthentication);
            return Te(e) ? e.customHandler : me(e)
        }

        function Ee(t, e) {
            const n = function (t, e) {
                let n;
                if ("channelAuthorization" in t) n = Object.assign(Object.assign({}, s.channelAuthorization), t.channelAuthorization); else if (n = {
                    transport: t.authTransport || s.authTransport,
                    endpoint: t.authEndpoint || s.authEndpoint
                }, "auth" in t && ("params" in t.auth && (n.params = t.auth.params), "headers" in t.auth && (n.headers = t.auth.headers)), "authorizer" in t) return {customHandler: ye(e, n, t.authorizer)};
                return n
            }(t, e);
            return Te(n) ? n.customHandler : ve(n)
        }

        class Oe extends st {
            constructor(t) {
                super((function (t, e) {
                    W.debug(`No callbacks on watchlist events for ${t}`)
                })), this.pusher = t, this.bindWatchlistInternalEvent()
            }

            handleEvent(t) {
                t.data.events.forEach((t => {
                    this.emit(t.name, t)
                }))
            }

            bindWatchlistInternalEvent() {
                this.pusher.connection.bind("message", (t => {
                    "pusher_internal:watchlist_events" === t.event && this.handleEvent(t)
                }))
            }
        }

        var xe = function () {
            let t, e;
            return {
                promise: new Promise(((n, i) => {
                    t = n, e = i
                })), resolve: t, reject: e
            }
        };

        class Le extends st {
            constructor(t) {
                super((function (t, e) {
                    W.debug("No callbacks on user for " + t)
                })), this.signin_requested = !1, this.user_data = null, this.serverToUserChannel = null, this.signinDonePromise = null, this._signinDoneResolve = null, this._onAuthorize = (t, e) => {
                    if (t) return W.warn(`Error during signin: ${t}`), void this._cleanup();
                    this.pusher.send_event("pusher:signin", {auth: e.auth, user_data: e.user_data})
                }, this.pusher = t, this.pusher.connection.bind("state_change", (({previous: t, current: e}) => {
                    "connected" !== t && "connected" === e && this._signin(), "connected" === t && "connected" !== e && (this._cleanup(), this._newSigninPromiseIfNeeded())
                })), this.watchlist = new Oe(t), this.pusher.connection.bind("message", (t => {
                    "pusher:signin_success" === t.event && this._onSigninSuccess(t.data), this.serverToUserChannel && this.serverToUserChannel.name === t.channel && this.serverToUserChannel.handleEvent(t)
                }))
            }

            signin() {
                this.signin_requested || (this.signin_requested = !0, this._signin())
            }

            _signin() {
                this.signin_requested && (this._newSigninPromiseIfNeeded(), "connected" === this.pusher.connection.state && this.pusher.config.userAuthenticator({socketId: this.pusher.connection.socket_id}, this._onAuthorize))
            }

            _onSigninSuccess(t) {
                try {
                    this.user_data = JSON.parse(t.user_data)
                } catch (e) {
                    return W.error(`Failed parsing user data after signin: ${t.user_data}`), void this._cleanup()
                }
                if ("string" != typeof this.user_data.id || "" === this.user_data.id) return W.error(`user_data doesn't contain an id. user_data: ${this.user_data}`), void this._cleanup();
                this._signinDoneResolve(), this._subscribeChannels()
            }

            _subscribeChannels() {
                this.serverToUserChannel = new Pt(`#server-to-user-${this.user_data.id}`, this.pusher), this.serverToUserChannel.bind_global(((t, e) => {
                    0 !== t.indexOf("pusher_internal:") && 0 !== t.indexOf("pusher:") && this.emit(t, e)
                })), (t => {
                    t.subscriptionPending && t.subscriptionCancelled ? t.reinstateSubscription() : t.subscriptionPending || "connected" !== this.pusher.connection.state || t.subscribe()
                })(this.serverToUserChannel)
            }

            _cleanup() {
                this.user_data = null, this.serverToUserChannel && (this.serverToUserChannel.unbind_all(), this.serverToUserChannel.disconnect(), this.serverToUserChannel = null), this.signin_requested && this._signinDoneResolve()
            }

            _newSigninPromiseIfNeeded() {
                if (!this.signin_requested) return;
                if (this.signinDonePromise && !this.signinDonePromise.done) return;
                const {promise: t, resolve: e, reject: n} = xe();
                t.done = !1;
                const i = () => {
                    t.done = !0
                };
                t.then(i).catch(i), this.signinDonePromise = t, this._signinDoneResolve = e
            }
        }

        class Ae {
            static ready() {
                Ae.isReady = !0;
                for (var t = 0, e = Ae.instances.length; t < e; t++) Ae.instances[t].connect()
            }

            static getClientFeatures() {
                return H(B({ws: he.Transports.ws}, (function (t) {
                    return t.isSupported({})
                })))
            }

            constructor(t, e) {
                !function (t) {
                    if (null == t) throw "You must pass your app key when you instantiate Pusher."
                }(t), function (t) {
                    if (null == t) throw "You must pass an options object";
                    if (null == t.cluster) throw "Options object must provide a cluster";
                    "disableStats" in t && W.warn("The disableStats option is deprecated in favor of enableStats")
                }(e), this.key = t, this.options = e, this.config = we(this.options, this), this.channels = Ut.createChannels(), this.global_emitter = new st, this.sessionID = he.randomInt(1e9), this.timeline = new le(this.key, this.sessionID, {
                    cluster: this.config.cluster,
                    features: Ae.getClientFeatures(),
                    params: this.config.timelineParams || {},
                    limit: 50,
                    level: ue.INFO,
                    version: s.VERSION
                }), this.config.enableStats && (this.timelineSender = Ut.createTimelineSender(this.timeline, {
                    host: this.config.statsHost,
                    path: "/timeline/v2/" + he.TimelineTransport.name
                })), this.connection = Ut.createConnectionManager(this.key, {
                    getStrategy: t => he.getDefaultStrategy(this.config, t, ge),
                    timeline: this.timeline,
                    activityTimeout: this.config.activityTimeout,
                    pongTimeout: this.config.pongTimeout,
                    unavailableTimeout: this.config.unavailableTimeout,
                    useTLS: Boolean(this.config.useTLS)
                }), this.connection.bind("connected", (() => {
                    this.subscribeAll(), this.timelineSender && this.timelineSender.send(this.connection.isUsingTLS())
                })), this.connection.bind("message", (t => {
                    var e = 0 === t.event.indexOf("pusher_internal:");
                    if (t.channel) {
                        var n = this.channel(t.channel);
                        n && n.handleEvent(t)
                    }
                    e || this.global_emitter.emit(t.event, t.data)
                })), this.connection.bind("connecting", (() => {
                    this.channels.disconnect()
                })), this.connection.bind("disconnected", (() => {
                    this.channels.disconnect()
                })), this.connection.bind("error", (t => {
                    W.warn(t)
                })), Ae.instances.push(this), this.timeline.info({instances: Ae.instances.length}), this.user = new Le(this), Ae.isReady && this.connect()
            }

            switchCluster(t) {
                const {appKey: e, cluster: n} = t;
                this.key = e, this.options = Object.assign(Object.assign({}, this.options), {cluster: n}), this.config = we(this.options, this), this.connection.switchCluster(this.key)
            }

            channel(t) {
                return this.channels.find(t)
            }

            allChannels() {
                return this.channels.all()
            }

            connect() {
                if (this.connection.connect(), this.timelineSender && !this.timelineSenderTimer) {
                    var t = this.connection.isUsingTLS(), e = this.timelineSender;
                    this.timelineSenderTimer = new A(6e4, (function () {
                        e.send(t)
                    }))
                }
            }

            disconnect() {
                this.connection.disconnect(), this.timelineSenderTimer && (this.timelineSenderTimer.ensureAborted(), this.timelineSenderTimer = null)
            }

            bind(t, e, n) {
                return this.global_emitter.bind(t, e, n), this
            }

            unbind(t, e, n) {
                return this.global_emitter.unbind(t, e, n), this
            }

            bind_global(t) {
                return this.global_emitter.bind_global(t), this
            }

            unbind_global(t) {
                return this.global_emitter.unbind_global(t), this
            }

            unbind_all(t) {
                return this.global_emitter.unbind_all(), this
            }

            subscribeAll() {
                var t;
                for (t in this.channels.channels) this.channels.channels.hasOwnProperty(t) && this.subscribe(t)
            }

            subscribe(t) {
                var e = this.channels.add(t, this);
                return e.subscriptionPending && e.subscriptionCancelled ? e.reinstateSubscription() : e.subscriptionPending || "connected" !== this.connection.state || e.subscribe(), e
            }

            unsubscribe(t) {
                var e = this.channels.find(t);
                e && e.subscriptionPending ? e.cancelSubscription() : (e = this.channels.remove(t)) && e.subscribed && e.unsubscribe()
            }

            send_event(t, e, n) {
                return this.connection.send_event(t, e, n)
            }

            shouldUseTLS() {
                return this.config.useTLS
            }

            signin() {
                this.user.signin()
            }
        }

        Ae.instances = [], Ae.isReady = !1, Ae.logToConsole = !1, Ae.Runtime = he, Ae.ScriptReceivers = he.ScriptReceivers, Ae.DependenciesReceivers = he.DependenciesReceivers, Ae.auth_callbacks = he.auth_callbacks;
        var Re = e.default = Ae;
        he.setup(Ae)
    }])
};
var n = e.exports = t();
export {n as default};
//# sourceMappingURL=/sm/1b2f071b2b5d279a4d79d6096716a285bac811bae3b798e2fe38b98afab92174.map
