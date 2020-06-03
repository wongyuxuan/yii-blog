<?php
    $this->title = '登录';
    use yii\helpers\Url;
?>
<?php $this->beginBlock('style'); ?>
<style>
    body{
        background: url("<?= Url::to('@img/loginBg.jpg') ?>") no-repeat;
        background-size: cover;
    }
</style>
<?php $this->endBlock(); ?>
<?php $this->beginBlock('script'); ?>
<script>

    layui.use('layer',function () {
        var tip = <?= $tip ?>;
        var layer = layui.layer;
        if(tip == 1){
            var msg = '<?= $error ?>';
            layer.msg(msg,function () {
                login();
            });
        }else{
            login();
        }
    });

    function login() {
        layer.open({
            type: 2,
            title: false,
            shadeClose: false,
            closeBtn: 0,
            shade: false,
            area: ['500px', '400px'],
            content: '//test.wongyuxuan.com/login/auth?authclient=qq',
        });
    }
</script>
<?php $this->endBlock(); ?>
