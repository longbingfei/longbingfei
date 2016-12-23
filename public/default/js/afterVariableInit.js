/**
 * Created by zhangxian on 16/11/11.
 */

//检测操作权限
function checkpermission(permission) {
    var pms = JSON.parse(Pms);
    for (var i in pms) {
        if (pms[i] === permission) {
            return true;
        }
    }

    return $.Confirm({title: '操作提示', message: '无操作权限'});
}
