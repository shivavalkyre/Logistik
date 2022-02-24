// $(function(){
//     var lastIndex;
//     $('#dg').edatagrid({
//         url: '../control/get_input_penjualan.php',
//         saveUrl: '../control/save_input_penjualan.php',
//         updateUrl: '../control/update_input_penjualan.php',
//         destroyUrl: '../control/delete_input_penjualan.php',
//         onDblClickRow:function(rowIndex){
//             if (lastIndex != rowIndex){
//                 $(this).edatagrid('endEdit', lastIndex);
//                 $(this).edatagrid('beginEdit', rowIndex);
//             }
//             lastIndex = rowIndex;
//         },
//         onBeginEdit:function(rowIndex){
//             var editors = $('#dg').edatagrid('getEditors', rowIndex);
//             var n1 = $(editors[2].target);
//             var n2 = $(editors[4].target);
//             var n3 = $(editors[5].target);
//             n1.add(n2).numberbox({
//                 onChange:function(){
                    
//                     var cost = n1.numberbox('getValue')*n2.numberbox('getValue');
//                     //alert(cost);
//                     n3.numberbox('setValue',cost);
//                 }
//             })
//         }
       
//     });

 
			
// });