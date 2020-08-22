<?php $this->beginBlock('style'); ?>
<style>
    #value .key {
        color: #ff5722;
        display: inline-block;
        width: 111px;
        text-align: right;
    }

    #value .value {
        color: #366500;
        padding-left: 10px;
    }

    li {
        padding: 5px;
    }

    li:hover {
        cursor: pointer;
        background: #8bc34aa1;
        padding: 5px;
    }
</style>
<?php $this->endBlock(); ?>

<body>
<div class="page-header">
    <h1>
        地址智能识别
        <small>支持省市区街道/姓名/电话/邮编/身份证号码(字母大写)</small>
    </h1>
</div>

<div class="alert alert-danger" role="alert">地址、姓名、电话、邮编、身份证号码（字母大写）用空格或者特殊字符分开!!（支持以下数据格式</div>
<div>
    特殊字符<code>~!@#$^&*()=|{}':;',\\[\\].<>/?~！@#￥……&*（）——|{}【】‘；：”“’。，、？-</code>
</div>
<br />
<ol>
    <li>广东省珠海市香洲区盘山路28号幸福茶庄,陈景勇，13593464918</li>
    <li>马云，陕西省西安市雁塔区丈八沟街道高新四路高新大都荟 13593464918</li>
    <li>陕西省西安市雁塔区丈八沟街道高新四路高新大都荟710061 刘国良 13593464918 211381198512096810</li>
    <li>西安市雁塔区丈八沟街道高新四路高新大都荟710061 刘国良 13593464918 211381198512096810</li>
    <li>雁塔区丈八沟街道高新四路高新大都荟710061 刘国良 13593464918 211381198512096810</li>
    <li>北京市朝阳区姚家园3楼 13593464918 马云</li>
    <li>河北省石家庄市新华区中华北大街68号鹿城商务中心6号楼1413室 150-3569-6956 马云</li>
    <li>疆维吾尔自治区乌鲁木齐市沙依巴克区西虹东路463号 400-1808855 小红</li>
    <li>新疆阿克苏温宿县博孜墩柯尔克孜族乡吾斯塘博村一组306号 800-8585222 马云</li>
</ol>

<textarea
    class="form-control layui-textarea"
    onchange="getAddress()"
    cols="50"
    rows="5"
    id="textarea"
    placeholder="请粘贴你的地址或者点击上述地址进行识别"
></textarea>
<h4>省市区街道四级联动</h4>
<div id="response"></div>
<div id="value"></div>

<?php $this->beginBlock('script'); ?>
<script>
    $('li').on('click',function(e){
        $("#textarea").val( $(this).html().trim())
        getAddress()
    })
    function getAddress() {
        // let parse_list = smart($("#textarea").val());

        let address = $("#textarea").val();

        $.ajax({
            type: "POST",
            datType: "JSON",
            url: "http://47.99.162.96:7001/address",
            data: { address : [address] },
            success: function f(rs) {
                console.log(rs);
                let html = "";
                for (let item of rs){
                    for (let key in item) {
                        if (item[key]) {
                            html +=
                                `<p><span class="key">` +
                                key +
                                `</span>:<span class="value">` +
                                item[key] +
                                `</span></p>`;
                        }
                    }
                }
                console.log(html);
                $("#value").html(html);
            }
        })

    }





</script>

<script async src="https://www.googletagmanager.com/gtag/js?id=UA-119026906-1"></script>
<script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'UA-119026906-1');
</script>

<?php $this->endBlock(); ?>
