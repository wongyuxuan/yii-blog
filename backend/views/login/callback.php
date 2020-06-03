<?php
$this->title = 'qq登录';
use yii\helpers\Url;
?>

<?php $this->beginBlock('script'); ?>
<script>
    layui.use('layer', function(){ //独立版的layer无需执行这一句
        var $ = layui.jquery, layer = layui.layer; //独立版的layer无需执行这一句
        parent.location.reload();
        layer.closeAll();
    });
</script>
<?php $this->endBlock(); ?>
