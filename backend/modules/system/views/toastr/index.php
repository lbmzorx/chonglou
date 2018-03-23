<div class="panel">
    <div class="panel-heading">
        <h3 class="panel-title"><?=\Yii::t('app',$this->title)?></h3>
    </div>
    <div class="panel-body">
        <div class="row">
            <div class="col-lg-4 col-sm-4">
                <div class="form-group">
                    <label class="control-label" for="title">Title</label>
                    <input id="title" type="text" class="form-control" placeholder="Enter a title ... " value="Toastr Notification">
                </div>
                <div class="form-group">
                    <label class="control-label" for="message">Message</label>
                    <textarea class="form-control" id="message" rows="3" placeholder="Enter a message ...">Flatlab is an Awesome dashboard build with BS3 </textarea>
                </div>
                <div class="form-group">
                    <div class="checkbox-list">
                        <label class="fancy-checkbox">
                            <input type="checkbox" name="viewset" value="close" id="closeButton">
                            <span>Close Button</span>
                        </label>
                    </div>
                    <div class="checkbox-list">
                        <label class="fancy-checkbox" name="viewset" value="click" id="addBehaviorOnToastClick">
                            <input type="checkbox">
                            <span>Add behavior on toast click</span>
                        </label>
                    </div>
                    <div class="checkbox-list">
                        <label class="fancy-checkbox" name="viewset" value="progress-bar" id="progress-info">
                            <input type="checkbox" name="">
                            <span>Progress Bar</span>
                        </label>
                    </div>
                    <div class="checkbox-list">
                        <label class="fancy-checkbox">
                            <input type="checkbox" name="viewset" value="debug" id="debugInfo">
                            <span>Debug</span>
                        </label>
                    </div>
                </div>
            </div>
            <div class="col-lg-2 col-sm-2">
                <div class="form-group" id="toastTypeGroup">
                    <label>Toast Type</label>
                    <label class="fancy-radio">
                        <input type="radio" name="toasts" value="success">
                        <span><i></i>Success</span>
                    </label>
                    <label class="fancy-radio">
                        <input type="radio" name="toasts" value="info">
                        <span><i></i>Info</span>
                    </label>
                    <label class="fancy-radio">
                        <input type="radio" name="toasts" value="warning">
                        <span><i></i>Warning</span>
                    </label>
                    <label class="fancy-radio">
                        <input type="radio" name="toasts" value="error">
                        <span><i></i>Error</span>
                    </label>
                </div>
                <div class="form-group" id="positionGroup">
                    <label>Position</label>
                    <label class="fancy-radio">
                        <input type="radio"  name="positions" value="toast-top-right">
                        <span><i></i>Top Right</span>
                    </label>
                    <label class="fancy-radio">
                        <input type="radio"  name="positions" value="toast-bottom-right">
                        <span><i></i>Bottom Right</span>
                    </label>
                    <label class="fancy-radio">
                        <input type="radio"  name="positions" value="toast-top-left">
                        <span><i></i>Top Right</span>
                    </label>
                    <label class="fancy-radio">
                        <input type="radio"  name="positions" value="toast-bottom-left">
                        <span><i></i>Bottom Left</span>
                    </label>
                    <label class="fancy-radio">
                        <input type="radio"  name="positions" value="toast-top-center">
                        <span><i></i>Top Center</span>
                    </label>
                    <label class="fancy-radio">
                        <input type="radio"  name="positions" value="toast-bottom-center">
                        <span><i></i>Bottom Center</span>
                    </label>
                    <label class="fancy-radio">
                        <input type="radio"  name="positions" value="toast-top-full-width">
                        <span><i></i>Top Full Width</span>
                    </label>
                    <label class="fancy-radio">
                        <input type="radio"  name="positions" value="toast-bottom-full-width">
                        <span><i></i>Bottom Full Width</span>
                    </label>
                </div>
            </div>
            <div class="col-lg-3 col-sm-3">
                <div class="form-group">
                    <div class="controls toastr-pad">
                        <label class="control-label" for="showEasing">Show Easing</label>
                        <input id="showEasing" type="text" placeholder="swing, linear" class="form-control input-small" value="swing">
                        <label class="control-label" for="hideEasing">Hide Easing</label>
                        <input id="hideEasing" type="text" placeholder="swing, linear" class="form-control input-small" value="linear">
                        <label class="control-label" for="showMethod">Show Method</label>
                        <input id="showMethod" type="text" placeholder="show, fadeIn, slideDown" class="form-control input-small" value="fadeIn">
                        <label class="control-label" for="hideMethod">Hide Method</label>
                        <input id="hideMethod" type="text" placeholder="hide, fadeOut, slideUp" class="form-control input-small" value="fadeOut">
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-3">
                <div class="form-group">
                    <div class="controls toastr-pad">
                        <label class="control-label" for="showDuration">Show Duration</label>
                        <input id="showDuration" type="text" placeholder="ms" class="form-control input-small" value="300">
                        <label class="control-label" for="hideDuration">Hide Duration</label>
                        <input id="hideDuration" type="text" placeholder="ms" class="form-control input-small" value="1000">
                        <label class="control-label" for="timeOut">Time out</label>
                        <input id="timeOut" type="text" placeholder="ms" class="form-control input-small" value="5000">
                        <label class="control-label" for="timeOut">Extended time out</label>
                        <input id="extendedTimeOut" type="text" placeholder="ms" class="form-control input-small" value="1000">
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 col-sm-12">
                <button type="button" class="btn btn-success" id="showtoast">Show Toast</button>
                <button type="button" class="btn btn-danger" id="cleartoasts">Clear Toasts</button>
                <button type="button" class="btn btn-danger" id="clearlasttoast">Clear Last Toast</button>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <pre id="toastrOptions">Command: toastr[success]("Flatlab is an Awesome dashboard build with BS3 ", "Toastr Notification")

                toastr.options = {
                  "closeButton": true,
                  "debug": false,
                  "progressBar": false,
                  "positionClass": "toast-top-center",
                  "showDuration": "300",
                  "hideDuration": "1000",
                  "timeOut": "5000",
                  "extendedTimeOut": "1000",
                  "showEasing": "swing",
                  "hideEasing": "linear",
                  "showMethod": "fadeIn",
                  "hideMethod": "fadeOut"
                }</pre>
            </div>
        </div>
    </div>
</div>
<?php \common\widgets\JsBlock::begin()?>
<script type="text/javascript">
    $(function () {
        var i = -1;
        var toastCount = 0;
        var $toastlast;

        var getMessage = function () {
            var msgs = ['Hi, this is toastr notification',
                '<div><input class="input-small" value="textbox"/>&nbsp;<a href="http://thevectorlab.net/flatlab/" target="_blank">This is a hyperlink</a></div><div><button type="button" id="okBtn" class="btn btn-primary">Close me</button><button type="button" id="surpriseBtn" class="btn" style="margin: 0 8px 0 8px">Surprise me</button></div>',
                'Flatlab is awesome',
                'Build with BS3!',
                'Easy to use',
                'Have fun storming the castle!'
            ];
            i++;
            if (i === msgs.length) {
                i = 0;
            }

            return msgs[i];
        };
        $('#showtoast').click(function () {
            var shortCutFunction = $("#toastTypeGroup input:radio:checked").val();
            var msg = $('#message').val();
            var title = $('#title').val() || '';
            var $showDuration = $('#showDuration');
            var $hideDuration = $('#hideDuration');
            var $timeOut = $('#timeOut');
            var $extendedTimeOut = $('#extendedTimeOut');
            var $showEasing = $('#showEasing');
            var $hideEasing = $('#hideEasing');
            var $showMethod = $('#showMethod');
            var $hideMethod = $('#hideMethod');
            var toastIndex = toastCount++;

            toastr.options = {
                closeButton: $('#closeButton').prop('checked'),
                debug: $('#debugInfo').prop('checked'),
                progressBar: $('#progressBar').prop('checked'),
                positionClass: $('#positionGroup input:radio:checked').val() || 'toast-top-right',
                preventDuplicates: $('#preventDuplicates').prop('checked'),
                onclick: null
            };

            if ($('#addBehaviorOnToastClick').prop('checked')) {
                toastr.options.onclick = function () {
                    alert('You can perform some custom action after a toast goes away');
                };
            }

            if ($showDuration.val().length) {
                toastr.options.showDuration = $showDuration.val();
            }

            if ($hideDuration.val().length) {
                toastr.options.hideDuration = $hideDuration.val();
            }

            if ($timeOut.val().length) {
                toastr.options.timeOut = $timeOut.val();
            }

            if ($extendedTimeOut.val().length) {
                toastr.options.extendedTimeOut = $extendedTimeOut.val();
            }

            if ($showEasing.val().length) {
                toastr.options.showEasing = $showEasing.val();
            }

            if ($hideEasing.val().length) {
                toastr.options.hideEasing = $hideEasing.val();
            }

            if ($showMethod.val().length) {
                toastr.options.showMethod = $showMethod.val();
            }

            if ($hideMethod.val().length) {
                toastr.options.hideMethod = $hideMethod.val();
            }



            if (!msg) {
                msg = getMessage();
            }

            $("#toastrOptions").text("Command: toastr["
                + shortCutFunction
                + "](\""
                + msg
                + (title ? "\", \"" + title : '')
                + "\")\n\ntoastr.options = "
                + JSON.stringify(toastr.options, null, 2)
            );

            var $toast = toastr[shortCutFunction](msg, title); // Wire up an event handler to a button in the toast, if it exists
            $toastlast = $toast;
            if ($toast.find('#okBtn').length) {
                $toast.delegate('#okBtn', 'click', function () {
                    alert('you clicked me. i was toast #' + toastIndex + '. goodbye!');
                    $toast.remove();
                });
            }
            if ($toast.find('#surpriseBtn').length) {
                $toast.delegate('#surpriseBtn', 'click', function () {
                    alert('Surprise! you clicked me. i was toast #' + toastIndex + '. You could perform an action here.');
                });
            }
        });
        function getLastToast(){
            return $toastlast;
        }
        $('#clearlasttoast').click(function () {
            toastr.clear(getLastToast());
        });
        $('#cleartoasts').click(function () {
            toastr.clear();
        });
    })
</script>
<?php \common\widgets\JsBlock::end()?>