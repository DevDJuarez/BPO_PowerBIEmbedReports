"use strict";
function _typeof(e) {
    return (_typeof =
        "function" == typeof Symbol && "symbol" == typeof Symbol.iterator
            ? function (e) {
                  return typeof e;
              }
            : function (e) {
                  return e &&
                      "function" == typeof Symbol &&
                      e.constructor === Symbol &&
                      e !== Symbol.prototype
                      ? "symbol"
                      : typeof e;
              })(e);
}
function _inherits(e, t) {
    if ("function" != typeof t && null !== t)
        throw new TypeError(
            "Super expression must either be null or a function"
        );
    (e.prototype = Object.create(t && t.prototype, {
        constructor: { value: e, writable: !0, configurable: !0 },
    })),
        t && _setPrototypeOf(e, t);
}
function _setPrototypeOf(e, t) {
    return (_setPrototypeOf =
        Object.setPrototypeOf ||
        function (e, t) {
            return (e.__proto__ = t), e;
        })(e, t);
}
function _createSuper(i) {
    var r = _isNativeReflectConstruct();
    return function () {
        var e,
            t = _getPrototypeOf(i);
        if (r) {
            var n = _getPrototypeOf(this).constructor;
            e = Reflect.construct(t, arguments, n);
        } else e = t.apply(this, arguments);
        return _possibleConstructorReturn(this, e);
    };
}
function _possibleConstructorReturn(e, t) {
    return !t || ("object" !== _typeof(t) && "function" != typeof t)
        ? _assertThisInitialized(e)
        : t;
}
function _assertThisInitialized(e) {
    if (void 0 === e)
        throw new ReferenceError(
            "this hasn't been initialised - super() hasn't been called"
        );
    return e;
}
function _isNativeReflectConstruct() {
    if ("undefined" == typeof Reflect || !Reflect.construct) return !1;
    if (Reflect.construct.sham) return !1;
    if ("function" == typeof Proxy) return !0;
    try {
        return (
            Date.prototype.toString.call(
                Reflect.construct(Date, [], function () {})
            ),
            !0
        );
    } catch (e) {
        return !1;
    }
}
function _getPrototypeOf(e) {
    return (_getPrototypeOf = Object.setPrototypeOf
        ? Object.getPrototypeOf
        : function (e) {
              return e.__proto__ || Object.getPrototypeOf(e);
          })(e);
}
function _createForOfIteratorHelper(e, t) {
    var n;
    if ("undefined" == typeof Symbol || null == e[Symbol.iterator]) {
        if (
            Array.isArray(e) ||
            (n = _unsupportedIterableToArray(e)) ||
            (t && e && "number" == typeof e.length)
        ) {
            n && (e = n);
            var i = 0,
                r = function () {};
            return {
                s: r,
                n: function () {
                    return i >= e.length
                        ? { done: !0 }
                        : { done: !1, value: e[i++] };
                },
                e: function (e) {
                    throw e;
                },
                f: r,
            };
        }
        throw new TypeError(
            "Invalid attempt to iterate non-iterable instance.\nIn order to be iterable, non-array objects must have a [Symbol.iterator]() method."
        );
    }
    var o,
        a = !0,
        l = !1;
    return {
        s: function () {
            n = e[Symbol.iterator]();
        },
        n: function () {
            var e = n.next();
            return (a = e.done), e;
        },
        e: function (e) {
            (l = !0), (o = e);
        },
        f: function () {
            try {
                a || null == n.return || n.return();
            } finally {
                if (l) throw o;
            }
        },
    };
}
function _unsupportedIterableToArray(e, t) {
    if (e) {
        if ("string" == typeof e) return _arrayLikeToArray(e, t);
        var n = Object.prototype.toString.call(e).slice(8, -1);
        return (
            "Object" === n && e.constructor && (n = e.constructor.name),
            "Map" === n || "Set" === n
                ? Array.from(e)
                : "Arguments" === n ||
                  /^(?:Ui|I)nt(?:8|16|32)(?:Clamped)?Array$/.test(n)
                ? _arrayLikeToArray(e, t)
                : void 0
        );
    }
}
function _arrayLikeToArray(e, t) {
    (null == t || t > e.length) && (t = e.length);
    for (var n = 0, i = new Array(t); n < t; n++) i[n] = e[n];
    return i;
}
function _classCallCheck(e, t) {
    if (!(e instanceof t))
        throw new TypeError("Cannot call a class as a function");
}
function _defineProperties(e, t) {
    for (var n = 0; n < t.length; n++) {
        var i = t[n];
        (i.enumerable = i.enumerable || !1),
            (i.configurable = !0),
            "value" in i && (i.writable = !0),
            Object.defineProperty(e, i.key, i);
    }
}
function _createClass(e, t, n) {
    return (
        t && _defineProperties(e.prototype, t), n && _defineProperties(e, n), e
    );
}
var Emitter = (function () {
        function e() {
            _classCallCheck(this, e);
        }
        return (
            _createClass(e, [
                {
                    key: "on",
                    value: function (e, t) {
                        return (
                            (this._callbacks = this._callbacks || {}),
                            this._callbacks[e] || (this._callbacks[e] = []),
                            this._callbacks[e].push(t),
                            this
                        );
                    },
                },
                {
                    key: "emit",
                    value: function (e) {
                        this._callbacks = this._callbacks || {};
                        var t = this._callbacks[e];
                        if (t) {
                            for (
                                var n = arguments.length,
                                    i = new Array(1 < n ? n - 1 : 0),
                                    r = 1;
                                r < n;
                                r++
                            )
                                i[r - 1] = arguments[r];
                            var o,
                                a = _createForOfIteratorHelper(t);
                            try {
                                for (a.s(); !(o = a.n()).done; ) {
                                    o.value.apply(this, i);
                                }
                            } catch (e) {
                                a.e(e);
                            } finally {
                                a.f();
                            }
                        }
                        return this;
                    },
                },
                {
                    key: "off",
                    value: function (e, t) {
                        if (!this._callbacks || 0 === arguments.length)
                            return (this._callbacks = {}), this;
                        var n = this._callbacks[e];
                        if (!n) return this;
                        if (1 === arguments.length)
                            return delete this._callbacks[e], this;
                        for (var i = 0; i < n.length; i++) {
                            if (n[i] === t) {
                                n.splice(i, 1);
                                break;
                            }
                        }
                        return this;
                    },
                },
            ]),
            e
        );
    })(),
    Dropzone = (function () {
        _inherits(b, Emitter);
        var a = _createSuper(b);
        function b(e, t) {
            var n, i, r;
            if (
                (_classCallCheck(this, b),
                ((n = a.call(this)).element = e),
                (n.version = b.version),
                (n.defaultOptions.previewTemplate =
                    n.defaultOptions.previewTemplate.replace(/\n*/g, "")),
                (n.clickableElements = []),
                (n.listeners = []),
                (n.files = []),
                "string" == typeof n.element &&
                    (n.element = document.querySelector(n.element)),
                !n.element || null == n.element.nodeType)
            )
                throw new Error("Invalid dropzone element.");
            if (n.element.dropzone)
                throw new Error("Dropzone already attached.");
            b.instances.push(_assertThisInitialized(n)),
                (n.element.dropzone = _assertThisInitialized(n));
            var o = null != (r = b.optionsForElement(n.element)) ? r : {};
            if (
                ((n.options = b.extend(
                    {},
                    n.defaultOptions,
                    o,
                    null != t ? t : {}
                )),
                n.options.forceFallback || !b.isBrowserSupported())
            )
                return _possibleConstructorReturn(
                    n,
                    n.options.fallback.call(_assertThisInitialized(n))
                );
            if (
                (null == n.options.url &&
                    (n.options.url = n.element.getAttribute("action")),
                !n.options.url)
            )
                throw new Error("No URL provided.");
            if (n.options.acceptedFiles && n.options.acceptedMimeTypes)
                throw new Error(
                    "You can't provide both 'acceptedFiles' and 'acceptedMimeTypes'. 'acceptedMimeTypes' is deprecated."
                );
            if (n.options.uploadMultiple && n.options.chunking)
                throw new Error(
                    "You cannot set both: uploadMultiple and chunking."
                );
            return (
                n.options.acceptedMimeTypes &&
                    ((n.options.acceptedFiles = n.options.acceptedMimeTypes),
                    delete n.options.acceptedMimeTypes),
                null != n.options.renameFilename &&
                    (n.options.renameFile = function (e) {
                        return n.options.renameFilename.call(
                            _assertThisInitialized(n),
                            e.name,
                            e
                        );
                    }),
                "string" == typeof n.options.method &&
                    (n.options.method = n.options.method.toUpperCase()),
                (i = n.getExistingFallback()) &&
                    i.parentNode &&
                    i.parentNode.removeChild(i),
                !1 !== n.options.previewsContainer &&
                    (n.options.previewsContainer
                        ? (n.previewsContainer = b.getElement(
                              n.options.previewsContainer,
                              "previewsContainer"
                          ))
                        : (n.previewsContainer = n.element)),
                n.options.clickable &&
                    (!0 === n.options.clickable
                        ? (n.clickableElements = [n.element])
                        : (n.clickableElements = b.getElements(
                              n.options.clickable,
                              "clickable"
                          ))),
                n.init(),
                n
            );
        }
        return (
            _createClass(b, null, [
                {
                    key: "initClass",
                    value: function () {
                        (this.prototype.Emitter = Emitter),
                            (this.prototype.events = [
                                "drop",
                                "dragstart",
                                "dragend",
                                "dragenter",
                                "dragover",
                                "dragleave",
                                "addedfile",
                                "addedfiles",
                                "removedfile",
                                "thumbnail",
                                "error",
                                "errormultiple",
                                "processing",
                                "processingmultiple",
                                "uploadprogress",
                                "totaluploadprogress",
                                "sending",
                                "sendingmultiple",
                                "success",
                                "successmultiple",
                                "canceled",
                                "canceledmultiple",
                                "complete",
                                "completemultiple",
                                "reset",
                                "maxfilesexceeded",
                                "maxfilesreached",
                                "queuecomplete",
                            ]),
                            (this.prototype.defaultOptions = {
                                url: null,
                                method: "post",
                                withCredentials: !1,
                                timeout: 3e4,
                                parallelUploads: 2,
                                uploadMultiple: !1,
                                chunking: !1,
                                forceChunking: !1,
                                chunkSize: 2e6,
                                parallelChunkUploads: !1,
                                retryChunks: !1,
                                retryChunksLimit: 3,
                                maxFilesize: 256,
                                paramName: "file",
                                createImageThumbnails: !0,
                                maxThumbnailFilesize: 10,
                                thumbnailWidth: 120,
                                thumbnailHeight: 120,
                                thumbnailMethod: "crop",
                                resizeWidth: null,
                                resizeHeight: null,
                                resizeMimeType: null,
                                resizeQuality: 0.8,
                                resizeMethod: "contain",
                                filesizeBase: 1e3,
                                maxFiles: null,
                                headers: null,
                                clickable: !0,
                                ignoreHiddenFiles: !0,
                                acceptedFiles: null,
                                acceptedMimeTypes: null,
                                autoProcessQueue: !0,
                                autoQueue: !0,
                                addRemoveLinks: !1,
                                previewsContainer: null,
                                hiddenInputContainer: "body",
                                capture: null,
                                renameFilename: null,
                                renameFile: null,
                                forceFallback: !1,
                                dictDefaultMessage: "Drop files here to upload",
                                dictFallbackMessage:
                                    "Your browser does not support drag'n'drop file uploads.",
                                dictFallbackText:
                                    "Please use the fallback form below to upload your files like in the olden days.",
                                dictFileTooBig:
                                    "File is too big ({{filesize}}MiB). Max filesize: {{maxFilesize}}MiB.",
                                dictInvalidFileType:
                                    "You can't upload files of this type.",
                                dictResponseError:
                                    "Server responded with {{statusCode}} code.",
                                dictCancelUpload: "Cancel upload",
                                dictUploadCanceled: "Upload canceled.",
                                dictCancelUploadConfirmation:
                                    "Are you sure you want to cancel this upload?",
                                dictRemoveFile: "Remove file",
                                dictRemoveFileConfirmation: null,
                                dictMaxFilesExceeded:
                                    "You can not upload any more files.",
                                dictFileSizeUnits: {
                                    tb: "TB",
                                    gb: "GB",
                                    mb: "MB",
                                    kb: "KB",
                                    b: "b",
                                },
                                init: function () {},
                                params: function (e, t, n) {
                                    if (n)
                                        return {
                                            dzuuid: n.file.upload.uuid,
                                            dzchunkindex: n.index,
                                            dztotalfilesize: n.file.size,
                                            dzchunksize: this.options.chunkSize,
                                            dztotalchunkcount:
                                                n.file.upload.totalChunkCount,
                                            dzchunkbyteoffset:
                                                n.index *
                                                this.options.chunkSize,
                                        };
                                },
                                accept: function (e, t) {
                                    return t();
                                },
                                chunksUploaded: function (e, t) {
                                    t();
                                },
                                fallback: function () {
                                    var e;
                                    this.element.className = "".concat(
                                        this.element.className,
                                        " dz-browser-not-supported"
                                    );
                                    var t,
                                        n = _createForOfIteratorHelper(
                                            this.element.getElementsByTagName(
                                                "div"
                                            )
                                        );
                                    try {
                                        for (n.s(); !(t = n.n()).done; ) {
                                            var i = t.value;
                                            if (
                                                /(^| )dz-message($| )/.test(
                                                    i.className
                                                )
                                            ) {
                                                (e = i).className =
                                                    "dz-message";
                                                break;
                                            }
                                        }
                                    } catch (e) {
                                        n.e(e);
                                    } finally {
                                        n.f();
                                    }
                                    e ||
                                        ((e = b.createElement(
                                            '<div class="dz-message"><span></span></div>'
                                        )),
                                        this.element.appendChild(e));
                                    var r = e.getElementsByTagName("span")[0];
                                    return (
                                        r &&
                                            (null != r.textContent
                                                ? (r.textContent =
                                                      this.options.dictFallbackMessage)
                                                : null != r.innerText &&
                                                  (r.innerText =
                                                      this.options.dictFallbackMessage)),
                                        this.element.appendChild(
                                            this.getFallbackForm()
                                        )
                                    );
                                },
                                resize: function (e, t, n, i) {
                                    var r = {
                                            srcX: 0,
                                            srcY: 0,
                                            srcWidth: e.width,
                                            srcHeight: e.height,
                                        },
                                        o = e.width / e.height;
                                    null == t && null == n
                                        ? ((t = r.srcWidth), (n = r.srcHeight))
                                        : null == t
                                        ? (t = n * o)
                                        : null == n && (n = t / o);
                                    var a =
                                        (t = Math.min(t, r.srcWidth)) /
                                        (n = Math.min(n, r.srcHeight));
                                    if (r.srcWidth > t || r.srcHeight > n)
                                        if ("crop" === i)
                                            a < o
                                                ? ((r.srcHeight = e.height),
                                                  (r.srcWidth =
                                                      r.srcHeight * a))
                                                : ((r.srcWidth = e.width),
                                                  (r.srcHeight =
                                                      r.srcWidth / a));
                                        else {
                                            if ("contain" !== i)
                                                throw new Error(
                                                    "Unknown resizeMethod '".concat(
                                                        i,
                                                        "'"
                                                    )
                                                );
                                            a < o ? (n = t / o) : (t = n * o);
                                        }
                                    return (
                                        (r.srcX = (e.width - r.srcWidth) / 2),
                                        (r.srcY = (e.height - r.srcHeight) / 2),
                                        (r.trgWidth = t),
                                        (r.trgHeight = n),
                                        r
                                    );
                                },
                                transformFile: function (e, t) {
                                    return (this.options.resizeWidth ||
                                        this.options.resizeHeight) &&
                                        e.type.match(/image.*/)
                                        ? this.resizeImage(
                                              e,
                                              this.options.resizeWidth,
                                              this.options.resizeHeight,
                                              this.options.resizeMethod,
                                              t
                                          )
                                        : t(e);
                                },
                                previewTemplate:
                                    '<div class="dz-preview dz-file-preview">\n  <div class="dz-image"><img data-dz-thumbnail /></div>\n  <div class="dz-details">\n    <div class="dz-size"><span data-dz-size></span></div>\n    <div class="dz-filename"><span data-dz-name></span></div>\n  </div>\n  <div class="dz-progress"><span class="dz-upload" data-dz-uploadprogress></span></div>\n  <div class="dz-error-message"><span data-dz-errormessage></span></div>\n  <div class="dz-success-mark">\n    <svg width="54px" height="54px" viewBox="0 0 54 54" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">\n      <title>Check</title>\n      <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">\n        <path d="M23.5,31.8431458 L17.5852419,25.9283877 C16.0248253,24.3679711 13.4910294,24.366835 11.9289322,25.9289322 C10.3700136,27.4878508 10.3665912,30.0234455 11.9283877,31.5852419 L20.4147581,40.0716123 C20.5133999,40.1702541 20.6159315,40.2626649 20.7218615,40.3488435 C22.2835669,41.8725651 24.794234,41.8626202 26.3461564,40.3106978 L43.3106978,23.3461564 C44.8771021,21.7797521 44.8758057,19.2483887 43.3137085,17.6862915 C41.7547899,16.1273729 39.2176035,16.1255422 37.6538436,17.6893022 L23.5,31.8431458 Z M27,53 C41.3594035,53 53,41.3594035 53,27 C53,12.6405965 41.3594035,1 27,1 C12.6405965,1 1,12.6405965 1,27 C1,41.3594035 12.6405965,53 27,53 Z" stroke-opacity="0.198794158" stroke="#747474" fill-opacity="0.816519475" fill="#FFFFFF"></path>\n      </g>\n    </svg>\n  </div>\n  <div class="dz-error-mark">\n    <svg width="54px" height="54px" viewBox="0 0 54 54" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">\n      <title>Error</title>\n      <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">\n        <g stroke="#747474" stroke-opacity="0.198794158" fill="#FFFFFF" fill-opacity="0.816519475">\n          <path d="M32.6568542,29 L38.3106978,23.3461564 C39.8771021,21.7797521 39.8758057,19.2483887 38.3137085,17.6862915 C36.7547899,16.1273729 34.2176035,16.1255422 32.6538436,17.6893022 L27,23.3431458 L21.3461564,17.6893022 C19.7823965,16.1255422 17.2452101,16.1273729 15.6862915,17.6862915 C14.1241943,19.2483887 14.1228979,21.7797521 15.6893022,23.3461564 L21.3431458,29 L15.6893022,34.6538436 C14.1228979,36.2202479 14.1241943,38.7516113 15.6862915,40.3137085 C17.2452101,41.8726271 19.7823965,41.8744578 21.3461564,40.3106978 L27,34.6568542 L32.6538436,40.3106978 C34.2176035,41.8744578 36.7547899,41.8726271 38.3137085,40.3137085 C39.8758057,38.7516113 39.8771021,36.2202479 38.3106978,34.6538436 L32.6568542,29 Z M27,53 C41.3594035,53 53,41.3594035 53,27 C53,12.6405965 41.3594035,1 27,1 C12.6405965,1 1,12.6405965 1,27 C1,41.3594035 12.6405965,53 27,53 Z"></path>\n        </g>\n      </g>\n    </svg>\n  </div>\n</div>',
                                drop: function () {
                                    return this.element.classList.remove(
                                        "dz-drag-hover"
                                    );
                                },
                                dragstart: function () {},
                                dragend: function () {
                                    return this.element.classList.remove(
                                        "dz-drag-hover"
                                    );
                                },
                                dragenter: function () {
                                    return this.element.classList.add(
                                        "dz-drag-hover"
                                    );
                                },
                                dragover: function () {
                                    return this.element.classList.add(
                                        "dz-drag-hover"
                                    );
                                },
                                dragleave: function () {
                                    return this.element.classList.remove(
                                        "dz-drag-hover"
                                    );
                                },
                                paste: function () {},
                                reset: function () {
                                    return this.element.classList.remove(
                                        "dz-started"
                                    );
                                },
                                addedfile: function (t) {
                                    var n = this;
                                    if (
                                        (this.element ===
                                            this.previewsContainer &&
                                            this.element.classList.add(
                                                "dz-started"
                                            ),
                                        this.previewsContainer)
                                    ) {
                                        (t.previewElement = b.createElement(
                                            this.options.previewTemplate.trim()
                                        )),
                                            (t.previewTemplate =
                                                t.previewElement),
                                            this.previewsContainer.appendChild(
                                                t.previewElement
                                            );
                                        var e,
                                            i = _createForOfIteratorHelper(
                                                t.previewElement.querySelectorAll(
                                                    "[data-dz-name]"
                                                )
                                            );
                                        try {
                                            for (i.s(); !(e = i.n()).done; ) {
                                                var r = e.value;
                                                r.textContent = t.name;
                                            }
                                        } catch (e) {
                                            i.e(e);
                                        } finally {
                                            i.f();
                                        }
                                        var o,
                                            a = _createForOfIteratorHelper(
                                                t.previewElement.querySelectorAll(
                                                    "[data-dz-size]"
                                                )
                                            );
                                        try {
                                            for (a.s(); !(o = a.n()).done; )
                                                (r = o.value).innerHTML =
                                                    this.filesize(t.size);
                                        } catch (e) {
                                            a.e(e);
                                        } finally {
                                            a.f();
                                        }
                                        this.options.addRemoveLinks &&
                                            ((t._removeLink = b.createElement(
                                                '<a class="dz-remove" href="javascript:undefined;" data-dz-remove>'.concat(
                                                    this.options.dictRemoveFile,
                                                    "</a>"
                                                )
                                            )),
                                            t.previewElement.appendChild(
                                                t._removeLink
                                            ));
                                        var l,
                                            s = function (e) {
                                                return (
                                                    e.preventDefault(),
                                                    e.stopPropagation(),
                                                    t.status === b.UPLOADING
                                                        ? b.confirm(
                                                              n.options
                                                                  .dictCancelUploadConfirmation,
                                                              function () {
                                                                  return n.removeFile(
                                                                      t
                                                                  );
                                                              }
                                                          )
                                                        : n.options
                                                              .dictRemoveFileConfirmation
                                                        ? b.confirm(
                                                              n.options
                                                                  .dictRemoveFileConfirmation,
                                                              function () {
                                                                  return n.removeFile(
                                                                      t
                                                                  );
                                                              }
                                                          )
                                                        : n.removeFile(t)
                                                );
                                            },
                                            u = _createForOfIteratorHelper(
                                                t.previewElement.querySelectorAll(
                                                    "[data-dz-remove]"
                                                )
                                            );
                                        try {
                                            for (u.s(); !(l = u.n()).done; ) {
                                                l.value.addEventListener(
                                                    "click",
                                                    s
                                                );
                                            }
                                        } catch (e) {
                                            u.e(e);
                                        } finally {
                                            u.f();
                                        }
                                    }
                                },
                                removedfile: function (e) {
                                    return (
                                        null != e.previewElement &&
                                            null !=
                                                e.previewElement.parentNode &&
                                            e.previewElement.parentNode.removeChild(
                                                e.previewElement
                                            ),
                                        this._updateMaxFilesReachedClass()
                                    );
                                },
                                thumbnail: function (e, t) {
                                    if (e.previewElement) {
                                        e.previewElement.classList.remove(
                                            "dz-file-preview"
                                        );
                                        var n,
                                            i = _createForOfIteratorHelper(
                                                e.previewElement.querySelectorAll(
                                                    "[data-dz-thumbnail]"
                                                )
                                            );
                                        try {
                                            for (i.s(); !(n = i.n()).done; ) {
                                                var r = n.value;
                                                (r.alt = e.name), (r.src = t);
                                            }
                                        } catch (e) {
                                            i.e(e);
                                        } finally {
                                            i.f();
                                        }
                                        return setTimeout(function () {
                                            return e.previewElement.classList.add(
                                                "dz-image-preview"
                                            );
                                        }, 1);
                                    }
                                },
                                error: function (e, t) {
                                    if (e.previewElement) {
                                        e.previewElement.classList.add(
                                            "dz-error"
                                        ),
                                            "string" != typeof t &&
                                                t.error &&
                                                (t = t.error);
                                        var n,
                                            i = _createForOfIteratorHelper(
                                                e.previewElement.querySelectorAll(
                                                    "[data-dz-errormessage]"
                                                )
                                            );
                                        try {
                                            for (i.s(); !(n = i.n()).done; ) {
                                                n.value.textContent = t;
                                            }
                                        } catch (e) {
                                            i.e(e);
                                        } finally {
                                            i.f();
                                        }
                                    }
                                },
                                errormultiple: function () {},
                                processing: function (e) {
                                    if (
                                        e.previewElement &&
                                        (e.previewElement.classList.add(
                                            "dz-processing"
                                        ),
                                        e._removeLink)
                                    )
                                        return (e._removeLink.innerHTML =
                                            this.options.dictCancelUpload);
                                },
                                processingmultiple: function () {},
                                uploadprogress: function (e, t) {
                                    if (e.previewElement) {
                                        var n,
                                            i = _createForOfIteratorHelper(
                                                e.previewElement.querySelectorAll(
                                                    "[data-dz-uploadprogress]"
                                                )
                                            );
                                        try {
                                            for (i.s(); !(n = i.n()).done; ) {
                                                var r = n.value;
                                                "PROGRESS" === r.nodeName
                                                    ? (r.value = t)
                                                    : (r.style.width =
                                                          "".concat(t, "%"));
                                            }
                                        } catch (e) {
                                            i.e(e);
                                        } finally {
                                            i.f();
                                        }
                                    }
                                },
                                totaluploadprogress: function () {},
                                sending: function () {},
                                sendingmultiple: function () {},
                                success: function (e) {
                                    if (e.previewElement)
                                        return e.previewElement.classList.add(
                                            "dz-success"
                                        );
                                },
                                successmultiple: function () {},
                                canceled: function (e) {
                                    return this.emit(
                                        "error",
                                        e,
                                        this.options.dictUploadCanceled
                                    );
                                },
                                canceledmultiple: function () {},
                                complete: function (e) {
                                    if (
                                        (e._removeLink &&
                                            (e._removeLink.innerHTML =
                                                this.options.dictRemoveFile),
                                        e.previewElement)
                                    )
                                        return e.previewElement.classList.add(
                                            "dz-complete"
                                        );
                                },
                                completemultiple: function () {},
                                maxfilesexceeded: function () {},
                                maxfilesreached: function () {},
                                queuecomplete: function () {},
                                addedfiles: function () {},
                            }),
                            (this.prototype._thumbnailQueue = []),
                            (this.prototype._processingThumbnail = !1);
                    },
                },
                {
                    key: "extend",
                    value: function (e) {
                        for (
                            var t = arguments.length,
                                n = new Array(1 < t ? t - 1 : 0),
                                i = 1;
                            i < t;
                            i++
                        )
                            n[i - 1] = arguments[i];
                        for (var r = 0, o = n; r < o.length; r++) {
                            var a = o[r];
                            for (var l in a) {
                                var s = a[l];
                                e[l] = s;
                            }
                        }
                        return e;
                    },
                },
            ]),
            _createClass(
                b,
                [
                    {
                        key: "getAcceptedFiles",
                        value: function () {
                            return this.files
                                .filter(function (e) {
                                    return e.accepted;
                                })
                                .map(function (e) {
                                    return e;
                                });
                        },
                    },
                    {
                        key: "getRejectedFiles",
                        value: function () {
                            return this.files
                                .filter(function (e) {
                                    return !e.accepted;
                                })
                                .map(function (e) {
                                    return e;
                                });
                        },
                    },
                    {
                        key: "getFilesWithStatus",
                        value: function (t) {
                            return this.files
                                .filter(function (e) {
                                    return e.status === t;
                                })
                                .map(function (e) {
                                    return e;
                                });
                        },
                    },
                    {
                        key: "getQueuedFiles",
                        value: function () {
                            return this.getFilesWithStatus(b.QUEUED);
                        },
                    },
                    {
                        key: "getUploadingFiles",
                        value: function () {
                            return this.getFilesWithStatus(b.UPLOADING);
                        },
                    },
                    {
                        key: "getAddedFiles",
                        value: function () {
                            return this.getFilesWithStatus(b.ADDED);
                        },
                    },
                    {
                        key: "getActiveFiles",
                        value: function () {
                            return this.files
                                .filter(function (e) {
                                    return (
                                        e.status === b.UPLOADING ||
                                        e.status === b.QUEUED
                                    );
                                })
                                .map(function (e) {
                                    return e;
                                });
                        },
                    },
                    {
                        key: "init",
                        value: function () {
                            var o = this;
                            if (
                                ("form" === this.element.tagName &&
                                    this.element.setAttribute(
                                        "enctype",
                                        "multipart/form-data"
                                    ),
                                this.element.classList.contains("dropzone") &&
                                    !this.element.querySelector(
                                        ".dz-message"
                                    ) &&
                                    this.element.appendChild(
                                        b.createElement(
                                            '<div class="dz-default dz-message"><button class="dz-button" type="button">'.concat(
                                                this.options.dictDefaultMessage,
                                                "</button></div>"
                                            )
                                        )
                                    ),
                                this.clickableElements.length)
                            ) {
                                !(function r() {
                                    return (
                                        o.hiddenFileInput &&
                                            o.hiddenFileInput.parentNode.removeChild(
                                                o.hiddenFileInput
                                            ),
                                        (o.hiddenFileInput =
                                            document.createElement("input")),
                                        o.hiddenFileInput.setAttribute(
                                            "type",
                                            "file"
                                        ),
                                        (null === o.options.maxFiles ||
                                            1 < o.options.maxFiles) &&
                                            o.hiddenFileInput.setAttribute(
                                                "multiple",
                                                "multiple"
                                            ),
                                        (o.hiddenFileInput.className =
                                            "dz-hidden-input"),
                                        null !== o.options.acceptedFiles &&
                                            o.hiddenFileInput.setAttribute(
                                                "accept",
                                                o.options.acceptedFiles
                                            ),
                                        null !== o.options.capture &&
                                            o.hiddenFileInput.setAttribute(
                                                "capture",
                                                o.options.capture
                                            ),
                                        (o.hiddenFileInput.style.visibility =
                                            "hidden"),
                                        (o.hiddenFileInput.style.position =
                                            "absolute"),
                                        (o.hiddenFileInput.style.top = "0"),
                                        (o.hiddenFileInput.style.left = "0"),
                                        (o.hiddenFileInput.style.height = "0"),
                                        (o.hiddenFileInput.style.width = "0"),
                                        b
                                            .getElement(
                                                o.options.hiddenInputContainer,
                                                "hiddenInputContainer"
                                            )
                                            .appendChild(o.hiddenFileInput),
                                        o.hiddenFileInput.addEventListener(
                                            "change",
                                            function () {
                                                var e = o.hiddenFileInput.files;
                                                if (e.length) {
                                                    var t,
                                                        n =
                                                            _createForOfIteratorHelper(
                                                                e
                                                            );
                                                    try {
                                                        for (
                                                            n.s();
                                                            !(t = n.n()).done;

                                                        ) {
                                                            var i = t.value;
                                                            o.addFile(i);
                                                        }
                                                    } catch (e) {
                                                        n.e(e);
                                                    } finally {
                                                        n.f();
                                                    }
                                                }
                                                return (
                                                    o.emit("addedfiles", e), r()
                                                );
                                            }
                                        )
                                    );
                                })();
                            }
                            this.URL =
                                null !== window.URL
                                    ? window.URL
                                    : window.webkitURL;
                            var e,
                                t = _createForOfIteratorHelper(this.events);
                            try {
                                for (t.s(); !(e = t.n()).done; ) {
                                    var n = e.value;
                                    this.on(n, this.options[n]);
                                }
                            } catch (e) {
                                t.e(e);
                            } finally {
                                t.f();
                            }
                            this.on("uploadprogress", function () {
                                return o.updateTotalUploadProgress();
                            }),
                                this.on("removedfile", function () {
                                    return o.updateTotalUploadProgress();
                                }),
                                this.on("canceled", function (e) {
                                    return o.emit("complete", e);
                                }),
                                this.on("complete", function (e) {
                                    if (
                                        0 === o.getAddedFiles().length &&
                                        0 === o.getUploadingFiles().length &&
                                        0 === o.getQueuedFiles().length
                                    )
                                        return setTimeout(function () {
                                            return o.emit("queuecomplete");
                                        }, 0);
                                });
                            function i(e) {
                                return (
                                    (function (e) {
                                        if (e.dataTransfer.types)
                                            for (
                                                var t = 0;
                                                t < e.dataTransfer.types.length;
                                                t++
                                            )
                                                if (
                                                    "Files" ===
                                                    e.dataTransfer.types[t]
                                                )
                                                    return !0;
                                        return !1;
                                    })(e) &&
                                    (e.stopPropagation(),
                                    e.preventDefault
                                        ? e.preventDefault()
                                        : (e.returnValue = !1))
                                );
                            }
                            return (
                                (this.listeners = [
                                    {
                                        element: this.element,
                                        events: {
                                            dragstart: function (e) {
                                                return o.emit("dragstart", e);
                                            },
                                            dragenter: function (e) {
                                                return (
                                                    i(e), o.emit("dragenter", e)
                                                );
                                            },
                                            dragover: function (e) {
                                                var t;
                                                try {
                                                    t =
                                                        e.dataTransfer
                                                            .effectAllowed;
                                                } catch (e) {}
                                                return (
                                                    (e.dataTransfer.dropEffect =
                                                        "move" === t ||
                                                        "linkMove" === t
                                                            ? "move"
                                                            : "copy"),
                                                    i(e),
                                                    o.emit("dragover", e)
                                                );
                                            },
                                            dragleave: function (e) {
                                                return o.emit("dragleave", e);
                                            },
                                            drop: function (e) {
                                                return i(e), o.drop(e);
                                            },
                                            dragend: function (e) {
                                                return o.emit("dragend", e);
                                            },
                                        },
                                    },
                                ]),
                                this.clickableElements.forEach(function (t) {
                                    return o.listeners.push({
                                        element: t,
                                        events: {
                                            click: function (e) {
                                                return (
                                                    (t === o.element &&
                                                        e.target !==
                                                            o.element &&
                                                        !b.elementInside(
                                                            e.target,
                                                            o.element.querySelector(
                                                                ".dz-message"
                                                            )
                                                        )) ||
                                                        o.hiddenFileInput.click(),
                                                    !0
                                                );
                                            },
                                        },
                                    });
                                }),
                                this.enable(),
                                this.options.init.call(this)
                            );
                        },
                    },
                    {
                        key: "destroy",
                        value: function () {
                            return (
                                this.disable(),
                                this.removeAllFiles(!0),
                                null != this.hiddenFileInput &&
                                    this.hiddenFileInput.parentNode &&
                                    (this.hiddenFileInput.parentNode.removeChild(
                                        this.hiddenFileInput
                                    ),
                                    (this.hiddenFileInput = null)),
                                delete this.element.dropzone,
                                b.instances.splice(b.instances.indexOf(this), 1)
                            );
                        },
                    },
                    {
                        key: "updateTotalUploadProgress",
                        value: function () {
                            var e,
                                t = 0,
                                n = 0;
                            if (this.getActiveFiles().length) {
                                var i,
                                    r = _createForOfIteratorHelper(
                                        this.getActiveFiles()
                                    );
                                try {
                                    for (r.s(); !(i = r.n()).done; ) {
                                        var o = i.value;
                                        (t += o.upload.bytesSent),
                                            (n += o.upload.total);
                                    }
                                } catch (e) {
                                    r.e(e);
                                } finally {
                                    r.f();
                                }
                                e = (100 * t) / n;
                            } else e = 100;
                            return this.emit("totaluploadprogress", e, n, t);
                        },
                    },
                    {
                        key: "_getParamName",
                        value: function (e) {
                            return "function" == typeof this.options.paramName
                                ? this.options.paramName(e)
                                : ""
                                      .concat(this.options.paramName)
                                      .concat(
                                          this.options.uploadMultiple
                                              ? "[".concat(e, "]")
                                              : ""
                                      );
                        },
                    },
                    {
                        key: "_renameFile",
                        value: function (e) {
                            return "function" != typeof this.options.renameFile
                                ? e.name
                                : this.options.renameFile(e);
                        },
                    },
                    {
                        key: "getFallbackForm",
                        value: function () {
                            var e, t;
                            if ((e = this.getExistingFallback())) return e;
                            var n = '<div class="dz-fallback">';
                            this.options.dictFallbackText &&
                                (n += "<p>".concat(
                                    this.options.dictFallbackText,
                                    "</p>"
                                )),
                                (n += '<input type="file" name="'
                                    .concat(this._getParamName(0), '" ')
                                    .concat(
                                        this.options.uploadMultiple
                                            ? 'multiple="multiple"'
                                            : void 0,
                                        ' /><input type="submit" value="Upload!"></div>'
                                    ));
                            var i = b.createElement(n);
                            return (
                                "FORM" !== this.element.tagName
                                    ? (t = b.createElement(
                                          '<form action="'
                                              .concat(
                                                  this.options.url,
                                                  '" enctype="multipart/form-data" method="'
                                              )
                                              .concat(
                                                  this.options.method,
                                                  '"></form>'
                                              )
                                      )).appendChild(i)
                                    : (this.element.setAttribute(
                                          "enctype",
                                          "multipart/form-data"
                                      ),
                                      this.element.setAttribute(
                                          "method",
                                          this.options.method
                                      )),
                                null != t ? t : i
                            );
                        },
                    },
                    {
                        key: "getExistingFallback",
                        value: function () {
                            for (
                                var e = function (e) {
                                        var t,
                                            n = _createForOfIteratorHelper(e);
                                        try {
                                            for (n.s(); !(t = n.n()).done; ) {
                                                var i = t.value;
                                                if (
                                                    /(^| )fallback($| )/.test(
                                                        i.className
                                                    )
                                                )
                                                    return i;
                                            }
                                        } catch (e) {
                                            n.e(e);
                                        } finally {
                                            n.f();
                                        }
                                    },
                                    t = 0,
                                    n = ["div", "form"];
                                t < n.length;
                                t++
                            ) {
                                var i,
                                    r = n[t];
                                if (
                                    (i = e(
                                        this.element.getElementsByTagName(r)
                                    ))
                                )
                                    return i;
                            }
                        },
                    },
                    {
                        key: "setupEventListeners",
                        value: function () {
                            return this.listeners.map(function (i) {
                                return (function () {
                                    var e = [];
                                    for (var t in i.events) {
                                        var n = i.events[t];
                                        e.push(
                                            i.element.addEventListener(t, n, !1)
                                        );
                                    }
                                    return e;
                                })();
                            });
                        },
                    },
                    {
                        key: "removeEventListeners",
                        value: function () {
                            return this.listeners.map(function (i) {
                                return (function () {
                                    var e = [];
                                    for (var t in i.events) {
                                        var n = i.events[t];
                                        e.push(
                                            i.element.removeEventListener(
                                                t,
                                                n,
                                                !1
                                            )
                                        );
                                    }
                                    return e;
                                })();
                            });
                        },
                    },
                    {
                        key: "disable",
                        value: function () {
                            var t = this;
                            return (
                                this.clickableElements.forEach(function (e) {
                                    return e.classList.remove("dz-clickable");
                                }),
                                this.removeEventListeners(),
                                (this.disabled = !0),
                                this.files.map(function (e) {
                                    return t.cancelUpload(e);
                                })
                            );
                        },
                    },
                    {
                        key: "enable",
                        value: function () {
                            return (
                                delete this.disabled,
                                this.clickableElements.forEach(function (e) {
                                    return e.classList.add("dz-clickable");
                                }),
                                this.setupEventListeners()
                            );
                        },
                    },
                    {
                        key: "filesize",
                        value: function (e) {
                            var t = 0,
                                n = "b";
                            if (0 < e) {
                                for (
                                    var i = ["tb", "gb", "mb", "kb", "b"],
                                        r = 0;
                                    r < i.length;
                                    r++
                                ) {
                                    var o = i[r];
                                    if (
                                        Math.pow(
                                            this.options.filesizeBase,
                                            4 - r
                                        ) /
                                            10 <=
                                        e
                                    ) {
                                        (t =
                                            e /
                                            Math.pow(
                                                this.options.filesizeBase,
                                                4 - r
                                            )),
                                            (n = o);
                                        break;
                                    }
                                }
                                t = Math.round(10 * t) / 10;
                            }
                            return "<strong>"
                                .concat(t, "</strong> ")
                                .concat(this.options.dictFileSizeUnits[n]);
                        },
                    },
                    {
                        key: "_updateMaxFilesReachedClass",
                        value: function () {
                            return null != this.options.maxFiles &&
                                this.getAcceptedFiles().length >=
                                    this.options.maxFiles
                                ? (this.getAcceptedFiles().length ===
                                      this.options.maxFiles &&
                                      this.emit("maxfilesreached", this.files),
                                  this.element.classList.add(
                                      "dz-max-files-reached"
                                  ))
                                : this.element.classList.remove(
                                      "dz-max-files-reached"
                                  );
                        },
                    },
                    {
                        key: "drop",
                        value: function (e) {
                            if (e.dataTransfer) {
                                this.emit("drop", e);
                                for (
                                    var t = [], n = 0;
                                    n < e.dataTransfer.files.length;
                                    n++
                                )
                                    t[n] = e.dataTransfer.files[n];
                                if (t.length) {
                                    var i = e.dataTransfer.items;
                                    i &&
                                    i.length &&
                                    null != i[0].webkitGetAsEntry
                                        ? this._addFilesFromItems(i)
                                        : this.handleFiles(t);
                                }
                                this.emit("addedfiles", t);
                            }
                        },
                    },
                    {
                        key: "paste",
                        value: function (e) {
                            if (
                                null !=
                                __guard__(
                                    null != e ? e.clipboardData : void 0,
                                    function (e) {
                                        return e.items;
                                    }
                                )
                            ) {
                                this.emit("paste", e);
                                var t = e.clipboardData.items;
                                return t.length
                                    ? this._addFilesFromItems(t)
                                    : void 0;
                            }
                        },
                    },
                    {
                        key: "handleFiles",
                        value: function (e) {
                            var t,
                                n = _createForOfIteratorHelper(e);
                            try {
                                for (n.s(); !(t = n.n()).done; ) {
                                    var i = t.value;
                                    this.addFile(i);
                                }
                            } catch (e) {
                                n.e(e);
                            } finally {
                                n.f();
                            }
                        },
                    },
                    {
                        key: "_addFilesFromItems",
                        value: function (o) {
                            var a = this;
                            return (function () {
                                var e,
                                    t = [],
                                    n = _createForOfIteratorHelper(o);
                                try {
                                    for (n.s(); !(e = n.n()).done; ) {
                                        var i,
                                            r = e.value;
                                        null != r.webkitGetAsEntry &&
                                        (i = r.webkitGetAsEntry())
                                            ? i.isFile
                                                ? t.push(
                                                      a.addFile(r.getAsFile())
                                                  )
                                                : i.isDirectory
                                                ? t.push(
                                                      a._addFilesFromDirectory(
                                                          i,
                                                          i.name
                                                      )
                                                  )
                                                : t.push(void 0)
                                            : null != r.getAsFile &&
                                              (null == r.kind ||
                                                  "file" === r.kind)
                                            ? t.push(a.addFile(r.getAsFile()))
                                            : t.push(void 0);
                                    }
                                } catch (e) {
                                    n.e(e);
                                } finally {
                                    n.f();
                                }
                                return t;
                            })();
                        },
                    },
                    {
                        key: "_addFilesFromDirectory",
                        value: function (e, o) {
                            function t(t) {
                                return __guardMethod__(
                                    console,
                                    "log",
                                    function (e) {
                                        return e.log(t);
                                    }
                                );
                            }
                            var a = this,
                                n = e.createReader();
                            return (function r() {
                                return n.readEntries(function (e) {
                                    if (0 < e.length) {
                                        var t,
                                            n = _createForOfIteratorHelper(e);
                                        try {
                                            for (n.s(); !(t = n.n()).done; ) {
                                                var i = t.value;
                                                i.isFile
                                                    ? i.file(function (e) {
                                                          if (
                                                              !a.options
                                                                  .ignoreHiddenFiles ||
                                                              "." !==
                                                                  e.name.substring(
                                                                      0,
                                                                      1
                                                                  )
                                                          )
                                                              return (
                                                                  (e.fullPath =
                                                                      ""
                                                                          .concat(
                                                                              o,
                                                                              "/"
                                                                          )
                                                                          .concat(
                                                                              e.name
                                                                          )),
                                                                  a.addFile(e)
                                                              );
                                                      })
                                                    : i.isDirectory &&
                                                      a._addFilesFromDirectory(
                                                          i,
                                                          ""
                                                              .concat(o, "/")
                                                              .concat(i.name)
                                                      );
                                            }
                                        } catch (e) {
                                            n.e(e);
                                        } finally {
                                            n.f();
                                        }
                                        r();
                                    }
                                    return null;
                                }, t);
                            })();
                        },
                    },
                    {
                        key: "accept",
                        value: function (e, t) {
                            this.options.maxFilesize &&
                            e.size > 1024 * this.options.maxFilesize * 1024
                                ? t(
                                      this.options.dictFileTooBig
                                          .replace(
                                              "{{filesize}}",
                                              Math.round(
                                                  e.size / 1024 / 10.24
                                              ) / 100
                                          )
                                          .replace(
                                              "{{maxFilesize}}",
                                              this.options.maxFilesize
                                          )
                                  )
                                : b.isValidFile(e, this.options.acceptedFiles)
                                ? null != this.options.maxFiles &&
                                  this.getAcceptedFiles().length >=
                                      this.options.maxFiles
                                    ? (t(
                                          this.options.dictMaxFilesExceeded.replace(
                                              "{{maxFiles}}",
                                              this.options.maxFiles
                                          )
                                      ),
                                      this.emit("maxfilesexceeded", e))
                                    : this.options.accept.call(this, e, t)
                                : t(this.options.dictInvalidFileType);
                        },
                    },
                    {
                        key: "addFile",
                        value: function (t) {
                            var n = this;
                            (t.upload = {
                                uuid: b.uuidv4(),
                                progress: 0,
                                total: t.size,
                                bytesSent: 0,
                                filename: this._renameFile(t),
                            }),
                                this.files.push(t),
                                (t.status = b.ADDED),
                                this.emit("addedfile", t),
                                this._enqueueThumbnail(t),
                                this.accept(t, function (e) {
                                    e
                                        ? ((t.accepted = !1),
                                          n._errorProcessing([t], e))
                                        : ((t.accepted = !0),
                                          n.options.autoQueue &&
                                              n.enqueueFile(t)),
                                        n._updateMaxFilesReachedClass();
                                });
                        },
                    },
                    {
                        key: "enqueueFiles",
                        value: function (e) {
                            var t,
                                n = _createForOfIteratorHelper(e);
                            try {
                                for (n.s(); !(t = n.n()).done; ) {
                                    var i = t.value;
                                    this.enqueueFile(i);
                                }
                            } catch (e) {
                                n.e(e);
                            } finally {
                                n.f();
                            }
                            return null;
                        },
                    },
                    {
                        key: "enqueueFile",
                        value: function (e) {
                            var t = this;
                            if (e.status !== b.ADDED || !0 !== e.accepted)
                                throw new Error(
                                    "This file can't be queued because it has already been processed or was rejected."
                                );
                            if (
                                ((e.status = b.QUEUED),
                                this.options.autoProcessQueue)
                            )
                                return setTimeout(function () {
                                    return t.processQueue();
                                }, 0);
                        },
                    },
                    {
                        key: "_enqueueThumbnail",
                        value: function (e) {
                            var t = this;
                            if (
                                this.options.createImageThumbnails &&
                                e.type.match(/image.*/) &&
                                e.size <=
                                    1024 *
                                        this.options.maxThumbnailFilesize *
                                        1024
                            )
                                return (
                                    this._thumbnailQueue.push(e),
                                    setTimeout(function () {
                                        return t._processThumbnailQueue();
                                    }, 0)
                                );
                        },
                    },
                    {
                        key: "_processThumbnailQueue",
                        value: function () {
                            var t = this;
                            if (
                                !this._processingThumbnail &&
                                0 !== this._thumbnailQueue.length
                            ) {
                                this._processingThumbnail = !0;
                                var n = this._thumbnailQueue.shift();
                                return this.createThumbnail(
                                    n,
                                    this.options.thumbnailWidth,
                                    this.options.thumbnailHeight,
                                    this.options.thumbnailMethod,
                                    !0,
                                    function (e) {
                                        return (
                                            t.emit("thumbnail", n, e),
                                            (t._processingThumbnail = !1),
                                            t._processThumbnailQueue()
                                        );
                                    }
                                );
                            }
                        },
                    },
                    {
                        key: "removeFile",
                        value: function (e) {
                            if (
                                (e.status === b.UPLOADING &&
                                    this.cancelUpload(e),
                                (this.files = without(this.files, e)),
                                this.emit("removedfile", e),
                                0 === this.files.length)
                            )
                                return this.emit("reset");
                        },
                    },
                    {
                        key: "removeAllFiles",
                        value: function (e) {
                            null == e && (e = !1);
                            var t,
                                n = _createForOfIteratorHelper(
                                    this.files.slice()
                                );
                            try {
                                for (n.s(); !(t = n.n()).done; ) {
                                    var i = t.value;
                                    (i.status === b.UPLOADING && !e) ||
                                        this.removeFile(i);
                                }
                            } catch (e) {
                                n.e(e);
                            } finally {
                                n.f();
                            }
                            return null;
                        },
                    },
                    {
                        key: "resizeImage",
                        value: function (r, e, t, n, o) {
                            var a = this;
                            return this.createThumbnail(
                                r,
                                e,
                                t,
                                n,
                                !0,
                                function (e, t) {
                                    if (null == t) return o(r);
                                    var n = a.options.resizeMimeType;
                                    null == n && (n = r.type);
                                    var i = t.toDataURL(
                                        n,
                                        a.options.resizeQuality
                                    );
                                    return (
                                        ("image/jpeg" !== n &&
                                            "image/jpg" !== n) ||
                                            (i = ExifRestore.restore(
                                                r.dataURL,
                                                i
                                            )),
                                        o(b.dataURItoBlob(i))
                                    );
                                }
                            );
                        },
                    },
                    {
                        key: "createThumbnail",
                        value: function (e, t, n, i, r, o) {
                            var a = this,
                                l = new FileReader();
                            (l.onload = function () {
                                (e.dataURL = l.result),
                                    "image/svg+xml" !== e.type
                                        ? a.createThumbnailFromUrl(
                                              e,
                                              t,
                                              n,
                                              i,
                                              r,
                                              o
                                          )
                                        : null != o && o(l.result);
                            }),
                                l.readAsDataURL(e);
                        },
                    },
                    {
                        key: "displayExistingFile",
                        value: function (t, e, n, i, r) {
                            var o = this,
                                a =
                                    !(4 < arguments.length && void 0 !== r) ||
                                    r;
                            if (
                                (this.emit("addedfile", t),
                                this.emit("complete", t),
                                a)
                            ) {
                                (t.dataURL = e),
                                    this.createThumbnailFromUrl(
                                        t,
                                        this.options.thumbnailWidth,
                                        this.options.thumbnailHeight,
                                        this.options.resizeMethod,
                                        this.options.fixOrientation,
                                        function (e) {
                                            o.emit("thumbnail", t, e), n && n();
                                        },
                                        i
                                    );
                            } else this.emit("thumbnail", t, e), n && n();
                        },
                    },
                    {
                        key: "createThumbnailFromUrl",
                        value: function (o, a, l, s, t, u, e) {
                            var c = this,
                                d = document.createElement("img");
                            return (
                                e && (d.crossOrigin = e),
                                (t =
                                    "from-image" !=
                                        getComputedStyle(document.body)
                                            .imageOrientation && t),
                                (d.onload = function () {
                                    var e = function (e) {
                                        return e(1);
                                    };
                                    return (
                                        "undefined" != typeof EXIF &&
                                            null !== EXIF &&
                                            t &&
                                            (e = function (e) {
                                                return EXIF.getData(
                                                    d,
                                                    function () {
                                                        return e(
                                                            EXIF.getTag(
                                                                this,
                                                                "Orientation"
                                                            )
                                                        );
                                                    }
                                                );
                                            }),
                                        e(function (e) {
                                            (o.width = d.width),
                                                (o.height = d.height);
                                            var t = c.options.resize.call(
                                                    c,
                                                    o,
                                                    a,
                                                    l,
                                                    s
                                                ),
                                                n =
                                                    document.createElement(
                                                        "canvas"
                                                    ),
                                                i = n.getContext("2d");
                                            switch (
                                                ((n.width = t.trgWidth),
                                                (n.height = t.trgHeight),
                                                4 < e &&
                                                    ((n.width = t.trgHeight),
                                                    (n.height = t.trgWidth)),
                                                e)
                                            ) {
                                                case 2:
                                                    i.translate(n.width, 0),
                                                        i.scale(-1, 1);
                                                    break;
                                                case 3:
                                                    i.translate(
                                                        n.width,
                                                        n.height
                                                    ),
                                                        i.rotate(Math.PI);
                                                    break;
                                                case 4:
                                                    i.translate(0, n.height),
                                                        i.scale(1, -1);
                                                    break;
                                                case 5:
                                                    i.rotate(0.5 * Math.PI),
                                                        i.scale(1, -1);
                                                    break;
                                                case 6:
                                                    i.rotate(0.5 * Math.PI),
                                                        i.translate(
                                                            0,
                                                            -n.width
                                                        );
                                                    break;
                                                case 7:
                                                    i.rotate(0.5 * Math.PI),
                                                        i.translate(
                                                            n.height,
                                                            -n.width
                                                        ),
                                                        i.scale(-1, 1);
                                                    break;
                                                case 8:
                                                    i.rotate(-0.5 * Math.PI),
                                                        i.translate(
                                                            -n.height,
                                                            0
                                                        );
                                            }
                                            drawImageIOSFix(
                                                i,
                                                d,
                                                null != t.srcX ? t.srcX : 0,
                                                null != t.srcY ? t.srcY : 0,
                                                t.srcWidth,
                                                t.srcHeight,
                                                null != t.trgX ? t.trgX : 0,
                                                null != t.trgY ? t.trgY : 0,
                                                t.trgWidth,
                                                t.trgHeight
                                            );
                                            var r = n.toDataURL("image/png");
                                            if (null != u) return u(r, n);
                                        })
                                    );
                                }),
                                null != u && (d.onerror = u),
                                (d.src = o.dataURL)
                            );
                        },
                    },
                    {
                        key: "processQueue",
                        value: function () {
                            var e = this.options.parallelUploads,
                                t = this.getUploadingFiles().length,
                                n = t;
                            if (!(e <= t)) {
                                var i = this.getQueuedFiles();
                                if (0 < i.length) {
                                    if (this.options.uploadMultiple)
                                        return this.processFiles(
                                            i.slice(0, e - t)
                                        );
                                    for (; n < e; ) {
                                        if (!i.length) return;
                                        this.processFile(i.shift()), n++;
                                    }
                                }
                            }
                        },
                    },
                    {
                        key: "processFile",
                        value: function (e) {
                            return this.processFiles([e]);
                        },
                    },
                    {
                        key: "processFiles",
                        value: function (e) {
                            var t,
                                n = _createForOfIteratorHelper(e);
                            try {
                                for (n.s(); !(t = n.n()).done; ) {
                                    var i = t.value;
                                    (i.processing = !0),
                                        (i.status = b.UPLOADING),
                                        this.emit("processing", i);
                                }
                            } catch (e) {
                                n.e(e);
                            } finally {
                                n.f();
                            }
                            return (
                                this.options.uploadMultiple &&
                                    this.emit("processingmultiple", e),
                                this.uploadFiles(e)
                            );
                        },
                    },
                    {
                        key: "_getFilesWithXhr",
                        value: function (t) {
                            return this.files
                                .filter(function (e) {
                                    return e.xhr === t;
                                })
                                .map(function (e) {
                                    return e;
                                });
                        },
                    },
                    {
                        key: "cancelUpload",
                        value: function (e) {
                            if (e.status === b.UPLOADING) {
                                var t,
                                    n = this._getFilesWithXhr(e.xhr),
                                    i = _createForOfIteratorHelper(n);
                                try {
                                    for (i.s(); !(t = i.n()).done; ) {
                                        t.value.status = b.CANCELED;
                                    }
                                } catch (e) {
                                    i.e(e);
                                } finally {
                                    i.f();
                                }
                                void 0 !== e.xhr && e.xhr.abort();
                                var r,
                                    o = _createForOfIteratorHelper(n);
                                try {
                                    for (o.s(); !(r = o.n()).done; ) {
                                        var a = r.value;
                                        this.emit("canceled", a);
                                    }
                                } catch (e) {
                                    o.e(e);
                                } finally {
                                    o.f();
                                }
                                this.options.uploadMultiple &&
                                    this.emit("canceledmultiple", n);
                            } else
                                (e.status !== b.ADDED &&
                                    e.status !== b.QUEUED) ||
                                    ((e.status = b.CANCELED),
                                    this.emit("canceled", e),
                                    this.options.uploadMultiple &&
                                        this.emit("canceledmultiple", [e]));
                            if (this.options.autoProcessQueue)
                                return this.processQueue();
                        },
                    },
                    {
                        key: "resolveOption",
                        value: function (e) {
                            if ("function" != typeof e) return e;
                            for (
                                var t = arguments.length,
                                    n = new Array(1 < t ? t - 1 : 0),
                                    i = 1;
                                i < t;
                                i++
                            )
                                n[i - 1] = arguments[i];
                            return e.apply(this, n);
                        },
                    },
                    {
                        key: "uploadFile",
                        value: function (e) {
                            return this.uploadFiles([e]);
                        },
                    },
                    {
                        key: "uploadFiles",
                        value: function (s) {
                            var u = this;
                            this._transformFiles(s, function (e) {
                                if (u.options.chunking) {
                                    var t = e[0];
                                    (s[0].upload.chunked =
                                        u.options.chunking &&
                                        (u.options.forceChunking ||
                                            t.size > u.options.chunkSize)),
                                        (s[0].upload.totalChunkCount =
                                            Math.ceil(
                                                t.size / u.options.chunkSize
                                            ));
                                }
                                if (s[0].upload.chunked) {
                                    var r = s[0],
                                        o = e[0];
                                    r.upload.chunks = [];
                                    var i = function () {
                                        for (
                                            var e = 0;
                                            void 0 !== r.upload.chunks[e];

                                        )
                                            e++;
                                        if (!(e >= r.upload.totalChunkCount)) {
                                            0;
                                            var t = e * u.options.chunkSize,
                                                n = Math.min(
                                                    t + u.options.chunkSize,
                                                    o.size
                                                ),
                                                i = {
                                                    name: u._getParamName(0),
                                                    data: o.webkitSlice
                                                        ? o.webkitSlice(t, n)
                                                        : o.slice(t, n),
                                                    filename: r.upload.filename,
                                                    chunkIndex: e,
                                                };
                                            (r.upload.chunks[e] = {
                                                file: r,
                                                index: e,
                                                dataBlock: i,
                                                status: b.UPLOADING,
                                                progress: 0,
                                                retries: 0,
                                            }),
                                                u._uploadData(s, [i]);
                                        }
                                    };
                                    if (
                                        ((r.upload.finishedChunkUpload =
                                            function (e) {
                                                var t = !0;
                                                (e.status = b.SUCCESS),
                                                    (e.dataBlock = null),
                                                    (e.xhr = null);
                                                for (
                                                    var n = 0;
                                                    n <
                                                    r.upload.totalChunkCount;
                                                    n++
                                                ) {
                                                    if (
                                                        void 0 ===
                                                        r.upload.chunks[n]
                                                    )
                                                        return i();
                                                    r.upload.chunks[n]
                                                        .status !== b.SUCCESS &&
                                                        (t = !1);
                                                }
                                                t &&
                                                    u.options.chunksUploaded(
                                                        r,
                                                        function () {
                                                            u._finished(
                                                                s,
                                                                "",
                                                                null
                                                            );
                                                        }
                                                    );
                                            }),
                                        u.options.parallelChunkUploads)
                                    )
                                        for (
                                            var n = 0;
                                            n < r.upload.totalChunkCount;
                                            n++
                                        )
                                            i();
                                    else i();
                                } else {
                                    for (var a = [], l = 0; l < s.length; l++)
                                        a[l] = {
                                            name: u._getParamName(l),
                                            data: e[l],
                                            filename: s[l].upload.filename,
                                        };
                                    u._uploadData(s, a);
                                }
                            });
                        },
                    },
                    {
                        key: "_getChunk",
                        value: function (e, t) {
                            for (var n = 0; n < e.upload.totalChunkCount; n++)
                                if (
                                    void 0 !== e.upload.chunks[n] &&
                                    e.upload.chunks[n].xhr === t
                                )
                                    return e.upload.chunks[n];
                        },
                    },
                    {
                        key: "_uploadData",
                        value: function (t, e) {
                            var n,
                                i = this,
                                r = new XMLHttpRequest(),
                                o = _createForOfIteratorHelper(t);
                            try {
                                for (o.s(); !(n = o.n()).done; ) {
                                    n.value.xhr = r;
                                }
                            } catch (e) {
                                o.e(e);
                            } finally {
                                o.f();
                            }
                            t[0].upload.chunked &&
                                (t[0].upload.chunks[e[0].chunkIndex].xhr = r);
                            var a = this.resolveOption(this.options.method, t),
                                l = this.resolveOption(this.options.url, t);
                            r.open(a, l, !0),
                                (r.timeout = this.resolveOption(
                                    this.options.timeout,
                                    t
                                )),
                                (r.withCredentials =
                                    !!this.options.withCredentials),
                                (r.onload = function (e) {
                                    i._finishedUploading(t, r, e);
                                }),
                                (r.ontimeout = function () {
                                    i._handleUploadError(
                                        t,
                                        r,
                                        "Request timedout after ".concat(
                                            i.options.timeout / 1e3,
                                            " seconds"
                                        )
                                    );
                                }),
                                (r.onerror = function () {
                                    i._handleUploadError(t, r);
                                }),
                                ((null != r.upload ? r.upload : r).onprogress =
                                    function (e) {
                                        return i._updateFilesUploadProgress(
                                            t,
                                            r,
                                            e
                                        );
                                    });
                            var s = {
                                Accept: "application/json",
                                "Cache-Control": "no-cache",
                                "X-Requested-With": "XMLHttpRequest",
                            };
                            for (var u in (this.options.headers &&
                                b.extend(s, this.options.headers),
                            s)) {
                                var c = s[u];
                                c && r.setRequestHeader(u, c);
                            }
                            var d = new FormData();
                            if (this.options.params) {
                                var p = this.options.params;
                                for (var h in ("function" == typeof p &&
                                    (p = p.call(
                                        this,
                                        t,
                                        r,
                                        t[0].upload.chunked
                                            ? this._getChunk(t[0], r)
                                            : null
                                    )),
                                p)) {
                                    var f = p[h];
                                    if (Array.isArray(f))
                                        for (var m = 0; m < f.length; m++)
                                            d.append(h, f[m]);
                                    else d.append(h, f);
                                }
                            }
                            var v,
                                g = _createForOfIteratorHelper(t);
                            try {
                                for (g.s(); !(v = g.n()).done; ) {
                                    var y = v.value;
                                    this.emit("sending", y, r, d);
                                }
                            } catch (e) {
                                g.e(e);
                            } finally {
                                g.f();
                            }
                            this.options.uploadMultiple &&
                                this.emit("sendingmultiple", t, r, d),
                                this._addFormElementData(d);
                            for (var F = 0; F < e.length; F++) {
                                var k = e[F];
                                d.append(k.name, k.data, k.filename);
                            }
                            this.submitRequest(r, d, t);
                        },
                    },
                    {
                        key: "_transformFiles",
                        value: function (n, i) {
                            for (
                                var e = this,
                                    r = [],
                                    o = 0,
                                    t = function (t) {
                                        e.options.transformFile.call(
                                            e,
                                            n[t],
                                            function (e) {
                                                (r[t] = e),
                                                    ++o === n.length && i(r);
                                            }
                                        );
                                    },
                                    a = 0;
                                a < n.length;
                                a++
                            )
                                t(a);
                        },
                    },
                    {
                        key: "_addFormElementData",
                        value: function (e) {
                            if ("FORM" === this.element.tagName) {
                                var t,
                                    n = _createForOfIteratorHelper(
                                        this.element.querySelectorAll(
                                            "input, textarea, select, button"
                                        )
                                    );
                                try {
                                    for (n.s(); !(t = n.n()).done; ) {
                                        var i = t.value,
                                            r = i.getAttribute("name"),
                                            o = i.getAttribute("type");
                                        if (
                                            ((o = o && o.toLowerCase()),
                                            null != r)
                                        )
                                            if (
                                                "SELECT" === i.tagName &&
                                                i.hasAttribute("multiple")
                                            ) {
                                                var a,
                                                    l =
                                                        _createForOfIteratorHelper(
                                                            i.options
                                                        );
                                                try {
                                                    for (
                                                        l.s();
                                                        !(a = l.n()).done;

                                                    ) {
                                                        var s = a.value;
                                                        s.selected &&
                                                            e.append(
                                                                r,
                                                                s.value
                                                            );
                                                    }
                                                } catch (e) {
                                                    l.e(e);
                                                } finally {
                                                    l.f();
                                                }
                                            } else
                                                (!o ||
                                                    ("checkbox" !== o &&
                                                        "radio" !== o) ||
                                                    i.checked) &&
                                                    e.append(r, i.value);
                                    }
                                } catch (e) {
                                    n.e(e);
                                } finally {
                                    n.f();
                                }
                            }
                        },
                    },
                    {
                        key: "_updateFilesUploadProgress",
                        value: function (e, t, n) {
                            var i;
                            if (void 0 !== n) {
                                if (
                                    ((i = (100 * n.loaded) / n.total),
                                    e[0].upload.chunked)
                                ) {
                                    var r = e[0],
                                        o = this._getChunk(r, t);
                                    (o.progress = i),
                                        (o.total = n.total),
                                        (o.bytesSent = n.loaded);
                                    (r.upload.progress = 0),
                                        (r.upload.total = 0);
                                    for (
                                        var a = (r.upload.bytesSent = 0);
                                        a < r.upload.totalChunkCount;
                                        a++
                                    )
                                        void 0 !== r.upload.chunks[a] &&
                                            void 0 !==
                                                r.upload.chunks[a].progress &&
                                            ((r.upload.progress +=
                                                r.upload.chunks[a].progress),
                                            (r.upload.total +=
                                                r.upload.chunks[a].total),
                                            (r.upload.bytesSent +=
                                                r.upload.chunks[a].bytesSent));
                                    r.upload.progress =
                                        r.upload.progress /
                                        r.upload.totalChunkCount;
                                } else {
                                    var l,
                                        s = _createForOfIteratorHelper(e);
                                    try {
                                        for (s.s(); !(l = s.n()).done; ) {
                                            var u = l.value;
                                            (u.upload.progress = i),
                                                (u.upload.total = n.total),
                                                (u.upload.bytesSent = n.loaded);
                                        }
                                    } catch (e) {
                                        s.e(e);
                                    } finally {
                                        s.f();
                                    }
                                }
                                var c,
                                    d = _createForOfIteratorHelper(e);
                                try {
                                    for (d.s(); !(c = d.n()).done; ) {
                                        var p = c.value;
                                        this.emit(
                                            "uploadprogress",
                                            p,
                                            p.upload.progress,
                                            p.upload.bytesSent
                                        );
                                    }
                                } catch (e) {
                                    d.e(e);
                                } finally {
                                    d.f();
                                }
                            } else {
                                var h = !0;
                                i = 100;
                                var f,
                                    m = _createForOfIteratorHelper(e);
                                try {
                                    for (m.s(); !(f = m.n()).done; ) {
                                        var v = f.value;
                                        (100 === v.upload.progress &&
                                            v.upload.bytesSent ===
                                                v.upload.total) ||
                                            (h = !1),
                                            (v.upload.progress = i),
                                            (v.upload.bytesSent =
                                                v.upload.total);
                                    }
                                } catch (e) {
                                    m.e(e);
                                } finally {
                                    m.f();
                                }
                                if (h) return;
                                var g,
                                    y = _createForOfIteratorHelper(e);
                                try {
                                    for (y.s(); !(g = y.n()).done; ) {
                                        var F = g.value;
                                        this.emit(
                                            "uploadprogress",
                                            F,
                                            i,
                                            F.upload.bytesSent
                                        );
                                    }
                                } catch (e) {
                                    y.e(e);
                                } finally {
                                    y.f();
                                }
                            }
                        },
                    },
                    {
                        key: "_finishedUploading",
                        value: function (e, t, n) {
                            var i;
                            if (
                                e[0].status !== b.CANCELED &&
                                4 === t.readyState
                            ) {
                                if (
                                    "arraybuffer" !== t.responseType &&
                                    "blob" !== t.responseType &&
                                    ((i = t.responseText),
                                    t.getResponseHeader("content-type") &&
                                        ~t
                                            .getResponseHeader("content-type")
                                            .indexOf("application/json"))
                                )
                                    try {
                                        i = JSON.parse(i);
                                    } catch (e) {
                                        (n = e),
                                            (i =
                                                "Invalid JSON response from server.");
                                    }
                                this._updateFilesUploadProgress(e),
                                    200 <= t.status && t.status < 300
                                        ? e[0].upload.chunked
                                            ? e[0].upload.finishedChunkUpload(
                                                  this._getChunk(e[0], t)
                                              )
                                            : this._finished(e, i, n)
                                        : this._handleUploadError(e, t, i);
                            }
                        },
                    },
                    {
                        key: "_handleUploadError",
                        value: function (e, t, n) {
                            if (e[0].status !== b.CANCELED) {
                                if (
                                    e[0].upload.chunked &&
                                    this.options.retryChunks
                                ) {
                                    var i = this._getChunk(e[0], t);
                                    if (
                                        i.retries++ <
                                        this.options.retryChunksLimit
                                    )
                                        return void this._uploadData(e, [
                                            i.dataBlock,
                                        ]);
                                    console.warn(
                                        "Retried this chunk too often. Giving up."
                                    );
                                }
                                this._errorProcessing(
                                    e,
                                    n ||
                                        this.options.dictResponseError.replace(
                                            "{{statusCode}}",
                                            t.status
                                        ),
                                    t
                                );
                            }
                        },
                    },
                    {
                        key: "submitRequest",
                        value: function (e, t) {
                            e.send(t);
                        },
                    },
                    {
                        key: "_finished",
                        value: function (e, t, n) {
                            var i,
                                r = _createForOfIteratorHelper(e);
                            try {
                                for (r.s(); !(i = r.n()).done; ) {
                                    var o = i.value;
                                    (o.status = b.SUCCESS),
                                        this.emit("success", o, t, n),
                                        this.emit("complete", o);
                                }
                            } catch (e) {
                                r.e(e);
                            } finally {
                                r.f();
                            }
                            if (
                                (this.options.uploadMultiple &&
                                    (this.emit("successmultiple", e, t, n),
                                    this.emit("completemultiple", e)),
                                this.options.autoProcessQueue)
                            )
                                return this.processQueue();
                        },
                    },
                    {
                        key: "_errorProcessing",
                        value: function (e, t, n) {
                            var i,
                                r = _createForOfIteratorHelper(e);
                            try {
                                for (r.s(); !(i = r.n()).done; ) {
                                    var o = i.value;
                                    (o.status = b.ERROR),
                                        this.emit("error", o, t, n),
                                        this.emit("complete", o);
                                }
                            } catch (e) {
                                r.e(e);
                            } finally {
                                r.f();
                            }
                            if (
                                (this.options.uploadMultiple &&
                                    (this.emit("errormultiple", e, t, n),
                                    this.emit("completemultiple", e)),
                                this.options.autoProcessQueue)
                            )
                                return this.processQueue();
                        },
                    },
                ],
                [
                    {
                        key: "uuidv4",
                        value: function () {
                            return "xxxxxxxx-xxxx-4xxx-yxxx-xxxxxxxxxxxx".replace(
                                /[xy]/g,
                                function (e) {
                                    var t = (16 * Math.random()) | 0;
                                    return (
                                        "x" === e ? t : (3 & t) | 8
                                    ).toString(16);
                                }
                            );
                        },
                    },
                ]
            ),
            b
        );
    })();
Dropzone.initClass(),
    (Dropzone.version = "5.7.2"),
    (Dropzone.options = {}),
    (Dropzone.optionsForElement = function (e) {
        return e.getAttribute("id")
            ? Dropzone.options[camelize(e.getAttribute("id"))]
            : void 0;
    }),
    (Dropzone.instances = []),
    (Dropzone.forElement = function (e) {
        if (
            ("string" == typeof e && (e = document.querySelector(e)),
            null == (null != e ? e.dropzone : void 0))
        )
            throw new Error(
                "No Dropzone found for given element. This is probably because you're trying to access it before Dropzone had the time to initialize. Use the `init` option to setup any additional observers on your Dropzone."
            );
        return e.dropzone;
    }),
    (Dropzone.autoDiscover = !0),
    (Dropzone.discover = function () {
        var o;
        if (document.querySelectorAll)
            o = document.querySelectorAll(".dropzone");
        else {
            o = [];
            var e = function (r) {
                return (function () {
                    var e,
                        t = [],
                        n = _createForOfIteratorHelper(r);
                    try {
                        for (n.s(); !(e = n.n()).done; ) {
                            var i = e.value;
                            /(^| )dropzone($| )/.test(i.className)
                                ? t.push(o.push(i))
                                : t.push(void 0);
                        }
                    } catch (e) {
                        n.e(e);
                    } finally {
                        n.f();
                    }
                    return t;
                })();
            };
            e(document.getElementsByTagName("div")),
                e(document.getElementsByTagName("form"));
        }
        return (function () {
            var e,
                t = [],
                n = _createForOfIteratorHelper(o);
            try {
                for (n.s(); !(e = n.n()).done; ) {
                    var i = e.value;
                    !1 !== Dropzone.optionsForElement(i)
                        ? t.push(new Dropzone(i))
                        : t.push(void 0);
                }
            } catch (e) {
                n.e(e);
            } finally {
                n.f();
            }
            return t;
        })();
    }),
    (Dropzone.blacklistedBrowsers = [
        /opera.*(Macintosh|Windows Phone).*version\/12/i,
    ]),
    (Dropzone.isBrowserSupported = function () {
        var e = !0;
        if (
            window.File &&
            window.FileReader &&
            window.FileList &&
            window.Blob &&
            window.FormData &&
            document.querySelector
        )
            if ("classList" in document.createElement("a")) {
                var t,
                    n = _createForOfIteratorHelper(
                        Dropzone.blacklistedBrowsers
                    );
                try {
                    for (n.s(); !(t = n.n()).done; ) {
                        t.value.test(navigator.userAgent) && (e = !1);
                    }
                } catch (e) {
                    n.e(e);
                } finally {
                    n.f();
                }
            } else e = !1;
        else e = !1;
        return e;
    }),
    (Dropzone.dataURItoBlob = function (e) {
        for (
            var t = atob(e.split(",")[1]),
                n = e.split(",")[0].split(":")[1].split(";")[0],
                i = new ArrayBuffer(t.length),
                r = new Uint8Array(i),
                o = 0,
                a = t.length,
                l = 0 <= a;
            l ? o <= a : a <= o;
            l ? o++ : o--
        )
            r[o] = t.charCodeAt(o);
        return new Blob([i], { type: n });
    });
var without = function (e, t) {
        return e
            .filter(function (e) {
                return e !== t;
            })
            .map(function (e) {
                return e;
            });
    },
    camelize = function (e) {
        return e.replace(/[\-_](\w)/g, function (e) {
            return e.charAt(1).toUpperCase();
        });
    };
(Dropzone.createElement = function (e) {
    var t = document.createElement("div");
    return (t.innerHTML = e), t.childNodes[0];
}),
    (Dropzone.elementInside = function (e, t) {
        if (e === t) return !0;
        for (; (e = e.parentNode); ) if (e === t) return !0;
        return !1;
    }),
    (Dropzone.getElement = function (e, t) {
        var n;
        if (
            ("string" == typeof e
                ? (n = document.querySelector(e))
                : null != e.nodeType && (n = e),
            null == n)
        )
            throw new Error(
                "Invalid `".concat(
                    t,
                    "` option provided. Please provide a CSS selector or a plain HTML element."
                )
            );
        return n;
    }),
    (Dropzone.getElements = function (e, t) {
        var n, i;
        if (e instanceof Array) {
            i = [];
            try {
                var r,
                    o = _createForOfIteratorHelper(e);
                try {
                    for (o.s(); !(r = o.n()).done; )
                        (n = r.value), i.push(this.getElement(n, t));
                } catch (e) {
                    o.e(e);
                } finally {
                    o.f();
                }
            } catch (e) {
                i = null;
            }
        } else if ("string" == typeof e) {
            i = [];
            var a,
                l = _createForOfIteratorHelper(document.querySelectorAll(e));
            try {
                for (l.s(); !(a = l.n()).done; ) (n = a.value), i.push(n);
            } catch (e) {
                l.e(e);
            } finally {
                l.f();
            }
        } else null != e.nodeType && (i = [e]);
        if (null == i || !i.length)
            throw new Error(
                "Invalid `".concat(
                    t,
                    "` option provided. Please provide a CSS selector, a plain HTML element or a list of those."
                )
            );
        return i;
    }),
    (Dropzone.confirm = function (e, t, n) {
        return window.confirm(e) ? t() : null != n ? n() : void 0;
    }),
    (Dropzone.isValidFile = function (e, t) {
        if (!t) return !0;
        t = t.split(",");
        var n,
            i = e.type,
            r = i.replace(/\/.*$/, ""),
            o = _createForOfIteratorHelper(t);
        try {
            for (o.s(); !(n = o.n()).done; ) {
                var a = n.value;
                if ("." === (a = a.trim()).charAt(0)) {
                    if (
                        -1 !==
                        e.name
                            .toLowerCase()
                            .indexOf(a.toLowerCase(), e.name.length - a.length)
                    )
                        return !0;
                } else if (/\/\*$/.test(a)) {
                    if (r === a.replace(/\/.*$/, "")) return !0;
                } else if (i === a) return !0;
            }
        } catch (e) {
            o.e(e);
        } finally {
            o.f();
        }
        return !1;
    }),
    "undefined" != typeof jQuery &&
        null !== jQuery &&
        (jQuery.fn.dropzone = function (e) {
            return this.each(function () {
                return new Dropzone(this, e);
            });
        }),
    "undefined" != typeof module && null !== module
        ? (module.exports = Dropzone)
        : (window.Dropzone = Dropzone),
    (Dropzone.ADDED = "added"),
    (Dropzone.QUEUED = "queued"),
    (Dropzone.ACCEPTED = Dropzone.QUEUED),
    (Dropzone.UPLOADING = "uploading"),
    (Dropzone.PROCESSING = Dropzone.UPLOADING),
    (Dropzone.CANCELED = "canceled"),
    (Dropzone.ERROR = "error"),
    (Dropzone.SUCCESS = "success");
var detectVerticalSquash = function (e) {
        e.naturalWidth;
        var t = e.naturalHeight,
            n = document.createElement("canvas");
        (n.width = 1), (n.height = t);
        var i = n.getContext("2d");
        i.drawImage(e, 0, 0);
        for (
            var r = i.getImageData(1, 0, 1, t).data, o = 0, a = t, l = t;
            o < l;

        ) {
            0 === r[4 * (l - 1) + 3] ? (a = l) : (o = l), (l = (a + o) >> 1);
        }
        var s = l / t;
        return 0 == s ? 1 : s;
    },
    drawImageIOSFix = function (e, t, n, i, r, o, a, l, s, u) {
        var c = detectVerticalSquash(t);
        return e.drawImage(t, n, i, r, o, a, l, s, u / c);
    },
    ExifRestore = (function () {
        function e() {
            _classCallCheck(this, e);
        }
        return (
            _createClass(e, null, [
                {
                    key: "initClass",
                    value: function () {
                        this.KEY_STR =
                            "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789+/=";
                    },
                },
                {
                    key: "encode64",
                    value: function (e) {
                        for (
                            var t = "",
                                n = void 0,
                                i = void 0,
                                r = "",
                                o = void 0,
                                a = void 0,
                                l = void 0,
                                s = "",
                                u = 0;
                            (o = (n = e[u++]) >> 2),
                                (a = ((3 & n) << 4) | ((i = e[u++]) >> 4)),
                                (l = ((15 & i) << 2) | ((r = e[u++]) >> 6)),
                                (s = 63 & r),
                                isNaN(i) ? (l = s = 64) : isNaN(r) && (s = 64),
                                (t =
                                    t +
                                    this.KEY_STR.charAt(o) +
                                    this.KEY_STR.charAt(a) +
                                    this.KEY_STR.charAt(l) +
                                    this.KEY_STR.charAt(s)),
                                (n = i = r = ""),
                                (o = a = l = s = ""),
                                u < e.length;

                        );
                        return t;
                    },
                },
                {
                    key: "restore",
                    value: function (e, t) {
                        if (!e.match("data:image/jpeg;base64,")) return t;
                        var n = this.decode64(
                                e.replace("data:image/jpeg;base64,", "")
                            ),
                            i = this.slice2Segments(n),
                            r = this.exifManipulation(t, i);
                        return "data:image/jpeg;base64,".concat(
                            this.encode64(r)
                        );
                    },
                },
                {
                    key: "exifManipulation",
                    value: function (e, t) {
                        var n = this.getExifArray(t),
                            i = this.insertExif(e, n);
                        return new Uint8Array(i);
                    },
                },
                {
                    key: "getExifArray",
                    value: function (e) {
                        for (var t = void 0, n = 0; n < e.length; ) {
                            if ((255 === (t = e[n])[0]) & (225 === t[1]))
                                return t;
                            n++;
                        }
                        return [];
                    },
                },
                {
                    key: "insertExif",
                    value: function (e, t) {
                        var n = e.replace("data:image/jpeg;base64,", ""),
                            i = this.decode64(n),
                            r = i.indexOf(255, 3),
                            o = i.slice(0, r),
                            a = i.slice(r),
                            l = o;
                        return (l = (l = l.concat(t)).concat(a));
                    },
                },
                {
                    key: "slice2Segments",
                    value: function (e) {
                        for (var t = 0, n = []; ; ) {
                            if ((255 === e[t]) & (218 === e[t + 1])) break;
                            if ((255 === e[t]) & (216 === e[t + 1])) t += 2;
                            else {
                                var i = t + (256 * e[t + 2] + e[t + 3]) + 2,
                                    r = e.slice(t, i);
                                n.push(r), (t = i);
                            }
                            if (t > e.length) break;
                        }
                        return n;
                    },
                },
                {
                    key: "decode64",
                    value: function (e) {
                        var t = void 0,
                            n = void 0,
                            i = "",
                            r = void 0,
                            o = void 0,
                            a = "",
                            l = 0,
                            s = [];
                        for (
                            /[^A-Za-z0-9\+\/\=]/g.exec(e) &&
                                console.warn(
                                    "There were invalid base64 characters in the input text.\nValid base64 characters are A-Z, a-z, 0-9, '+', '/',and '='\nExpect errors in decoding."
                                ),
                                e = e.replace(/[^A-Za-z0-9\+\/\=]/g, "");
                            (t =
                                (this.KEY_STR.indexOf(e.charAt(l++)) << 2) |
                                ((r = this.KEY_STR.indexOf(e.charAt(l++))) >>
                                    4)),
                                (n =
                                    ((15 & r) << 4) |
                                    ((o = this.KEY_STR.indexOf(
                                        e.charAt(l++)
                                    )) >>
                                        2)),
                                (i =
                                    ((3 & o) << 6) |
                                    (a = this.KEY_STR.indexOf(e.charAt(l++)))),
                                s.push(t),
                                64 !== o && s.push(n),
                                64 !== a && s.push(i),
                                (t = n = i = ""),
                                (r = o = a = ""),
                                l < e.length;

                        );
                        return s;
                    },
                },
            ]),
            e
        );
    })();
ExifRestore.initClass();
var contentLoaded = function (t, n) {
    function i(e) {
        if ("readystatechange" !== e.type || "complete" === o.readyState)
            return (
                ("load" === e.type ? t : o)[s](u + e.type, i, !1),
                !r && (r = !0) ? n.call(t, e.type || e) : void 0
            );
    }
    var r = !1,
        e = !0,
        o = t.document,
        a = o.documentElement,
        l = o.addEventListener ? "addEventListener" : "attachEvent",
        s = o.addEventListener ? "removeEventListener" : "detachEvent",
        u = o.addEventListener ? "" : "on";
    if ("complete" !== o.readyState) {
        if (o.createEventObject && a.doScroll) {
            try {
                e = !t.frameElement;
            } catch (e) {}
            e &&
                !(function t() {
                    try {
                        a.doScroll("left");
                    } catch (e) {
                        return void setTimeout(t, 50);
                    }
                    return i("poll");
                })();
        }
        return (
            o[l](u + "DOMContentLoaded", i, !1),
            o[l](u + "readystatechange", i, !1),
            t[l](u + "load", i, !1)
        );
    }
};
function __guard__(e, t) {
    return null != e ? t(e) : void 0;
}
function __guardMethod__(e, t, n) {
    return null != e && "function" == typeof e[t] ? n(e, t) : void 0;
}
(Dropzone._autoDiscoverFunction = function () {
    if (Dropzone.autoDiscover) return Dropzone.discover();
}),
    contentLoaded(window, Dropzone._autoDiscoverFunction);
