/**
 * Created by Administrator on 2017/8/21.
 */

$(function(){
    var ue = UE.getEditor('editor');
    $('#product_save_submit').on('click',function () {
        postAjax(ue);
    });
});


function postAjax(ue) {
    var productsData=new FormData();
    productsData.append('opt','2');
    productsData.append('product_title',$('#title').val());
    productsData.append('product_content',ue.body.innerText);
    productsData.append('post_pic',$("#fileImg")[0].files[0]);
    productsData.append('product_post_time',getDate());
    productsData.append('product_category',$('#category').val());
    productsData.append('product_status',' ');
    productsData.append('product_sort',$('#sort').val());
    productsData.append('product_price',$('#product_price').val());//售价
    productsData.append('product_market_price',$('#market_price').val());//市场价
    productsData.append('product_cost_price',$('#cost_price').val());//成本价
    productsData.append('product_num',$('#product_num').val());//可卖数量
    productsData.append('product_specification',$('#specification').val());//产品规格
    productsData.append('product_origin',$('#origin').val());//产地
    productsData.append('product_material',$('#material').val());//材质
    productsData.append('product_supplier',$('#supplier').val());//供应商
    productsData.append('product_unit',$('#unit').val());//单位
    productsData.append('product_weight',$('#weight').val());//重量
    productsData.append('product_key',$('#products_key').val());//关键字
    productsData.append('product_summary',$('#summary').val());//产品摘要
    $.ajax({
        type:"post",
        url:'/admin/data/products_add.php',
        data:productsData,
        // 告诉jQuery不要去处理发送的数据
        processData : false,
        // 告诉jQuery不要去设置Content-Type请求头
        contentType : false,
        beforeSend:function () {
            layer.load(2);
        },
        success:function (msg) {
            layer.closeAll('loading');
            layer.confirm(msg);
            console.log(msg);
        }
    });
}

