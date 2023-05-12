function text() {
    layer.msg('正在提交', {time: 5000000});
    $.ajax({
        type: 'POST',
        data: $('#configform').serialize(),
        url: 'index.php?act=setting',
        success: function (data) {
            layer.msg('保存完成', {time: 1000});
        }
    });
}

function reset1() {
    layer.confirm('确定要还原设置吗？', {title: '提示'}, function () {
        $.ajax({
            type: 'POST',
            data: $('#configform').serialize(),
            url: 'index.php?act=reset',
            success: function (data) {
                layer.msg('还原完成', {time: 1000});
            }
        });
    });
}

