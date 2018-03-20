<?php
/**
 * Author: lf
 * Blog: https://blog.feehi.com
 * Email: job@feehi.com
 * Created at: 2017-03-15 21:16
 */

if (Yii::$app->getSession()->hasFlash('success')) {
    $successTitle = addslashes( yii::t('app', 'Success') );
    $info = addslashes( Yii::$app->getSession()->getFlash('success') );
    $str = <<<EOF
        toastr.options = {
           "closeButton": true,
            "debug": false,
            "progressBar": false,
            "positionClass": "toast-top-center",
            "onclick": null,
            "showDuration": "300",
            "hideDuration": "1000",
            "timeOut": "5000",
            "extendedTimeOut": "1000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
       };
       toastr.success("{$successTitle}", "{$info}");
EOF;
    $this->registerJs($str);
}
if (Yii::$app->getSession()->hasFlash('error')) {
    $errorTitle = addslashes( yii::t('app', 'Error') );
    $info = addslashes( Yii::$app->getSession()->getFlash('error') );
    $str = <<<EOF
       toastr.options = {
          "closeButton": true,
          "debug": false,
          "progressBar": true,
          "positionClass": "toast-top-center",
          "showDuration": "400",
          "hideDuration": "1000",
          "timeOut": "1000",
          "extendedTimeOut": "1000",
          "showEasing": "swing",
          "hideEasing": "linear",
          "showMethod": "fadeIn",
          "hideMethod": "fadeOut"
       };
       toastr.error("{$errorTitle}", "{$info}");
EOF;
    $this->registerJs($str);
}
if (Yii::$app->getSession()->hasFlash('warning')) {
    $errorTitle = addslashes( yii::t('app', 'Warning') );
    $info = addslashes( Yii::$app->getSession()->getFlash('warning') );
    $str = <<<EOF
       toastr.options = {
            "closeButton": true,
            "debug": false,
            "progressBar": false,
            "positionClass": "toast-top-center",
            "onclick": null,
            "showDuration": "300",
            "hideDuration": "1000",
            "timeOut": "5000",
            "extendedTimeOut": "1000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
       };
       toastr.warning("{$errorTitle}", "{$info}");
EOF;
    $this->registerJs($str);
}
if (Yii::$app->getSession()->hasFlash('info')) {
    $infoTitle = addslashes( yii::t('app', 'Info') );
    $info = addslashes( Yii::$app->getSession()->getFlash('info') );
    $str = <<<EOF
       toastr.options = {
        "closeButton": true,
        "debug": false,
        "progressBar": false,
        "positionClass": "toast-top-center",
        "onclick": null,
        "showDuration": "300",
        "hideDuration": "1000",
        "timeOut": "5000",
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
       };
       toastr.info("{$infoTitle}", "{$info}");
EOF;
    $this->registerJs($str);
}
?>