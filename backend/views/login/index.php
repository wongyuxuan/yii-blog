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
    layui.use('layer', function(){ //独立版的layer无需执行这一句
        var $ = layui.jquery, layer = layui.layer; //独立版的layer无需执行这一句
        layer.open({
            type: 2,
            title: false,
            shadeClose: false,
            closeBtn: 0,
            shade: false,
            area: ['500px', '400px'],
            content: '//test.wongyuxuan.com/login/auth?authclient=qq',
        });

    });
</script>
<?php $this->endBlock(); ?>
