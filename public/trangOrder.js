
var mons = [];
var idTam = 0;
var doUong = {
    id : ++idTam,
    ten: "Trà sữa thái xanh",
    gia: 25000,
    soLuong: 1,
    topping: [
        {id: 1, tenTopping: 'Chân Trâu đen', gia: 5000, soLuong: 3}
    ]
}
var doUong2 = {
    id : ++idTam,
    ten: "Trà sữa thái xanh full toping",
    gia: 25000,
    soLuong: 1,
    topping: []
}


mons.push(doUong );
mons.push(doUong2 );

function updateTable() {
    
    var table = document.getElementById("table_hoadon");
    table.innerHTML = '<tr class="border"> <th class="border" style="width: 25%">Tên</th> <th class="border" style="width: 15%">SLượng</th> <th class="border" style="width: 15%">Giá</th> <th class="border" style="width: 20%">Tổng</th> <th class="border" style="width: 15%">Xóa</th> </tr>';
    var tr_hang = document.getElementById("hang_sp");
    for(let item of mons) {
        console.log(item.ten);

        
        
        for(let itemTopping of item.topping) {
            var theTopping = '<td class="cotDauTien"> <div class="tenMon_tenTopping_selectOption"> <div class="ten_mon">'+itemTopping.tenTopping+'</div>  </div> </td> <td> <input style="width: 35px" type="number" class="" placeholder="1" /> </td> <td>'+ itemTopping.gia+ '</td> <td></td> <td> <button class="btn bg-transparent"> <span class="iconify" data-icon="fa6-solid:delete-left"></span> </button> </td>'
            var tr_2 = document.createElement('tr');
            tr_2.id = 'hang_sp';
            tr_2.className = 'border'; 
            tr_2.innerHTML = theTopping;
            table.append(tr_2);

            item.gia += itemTopping.gia;
        }
        var theMoi = '<td class="cotDauTien"> <div class="tenMon_tenTopping_selectOption"> <div class="ten_mon">'+item.ten+'</div> <div class="d-flex justify-content-center selectTopping"> <div class="input-group"> <select onChange="themTopping('+ item.id+ ')" class="custom-select" id="select_sp'+item.id+'"> <option selected>Thêm</option> <option value="1">Topping 1</option> <option value="2">Topping 1</option> <option value="3">Topping 1</option> </select> </div> </div> </div> </td> <td> <input style="width: 35px" type="number" class="" placeholder="1" /> </td> <td>'+ item.gia+ '</td> <td></td> <td> <button class="btn bg-transparent"> <span class="iconify" data-icon="fa6-solid:delete-left"></span> </button> </td>'
        var tr_1 = document.createElement('tr');
        tr_1.id = 'hang_sp'+item.id;
        tr_1.className = 'border'; 
        tr_1.innerHTML = theMoi;
        table.append(tr_1);

    }

    
}

updateTable();









// function orderSP () {
//     var tensp = document.getElementById("ten_sp01").textContent;
//     var giasp = document.getElementById("gia_sp01").textContent;
//     var table = document.getElementById("table_hoadon");
//     var tr_hang = document.getElementById("hang_sp");
//     var a = '<td class="cotDauTien"> <div class="tenMon_tenTopping_selectOption"> <div class="ten_mon">'+tensp+'</div> <div class="d-flex justify-content-center selectTopping"> <div class="input-group"> <select class="custom-select" id="inputGroupSelect04"> <option selected>Thêm</option> <option value="1">Topping 1</option> <option value="2">Topping 1</option> <option value="3">Topping 1</option> </select> </div> </div> </div> </td> <td> <input style="width: 35px" type="number" class="" placeholder="1" /> </td> <td>'+ giasp+ '</td> <td>250000</td> <td> <button class="btn bg-transparent"> <span class="iconify" data-icon="fa6-solid:delete-left"></span> </button> </td>'
//     var tr = document.createElement('tr');
//     tr.id = 'hang_sp';
//     tr.className = 'border'; 
//     tr.innerHTML = a;
//     table.append(tr);
// console.log('ưqidjqiwd');
// }


function themTopping (id) {
    var itemTam;
    for(let i = 0 ; i < mons.length; i++) {
        if(mons[i].id == id) {
            itemTam = mons[i];
            break;
        }

    }
    var select = document.getElementById('select_sp'+id);
    var optionSelected = select.selectedOptions[0];

    var b = optionSelected.text;

    var topping = {
        id: 1,
        tenTP: optionSelected.text,
        soLuong: 1,
        gia: 5000
    }

    itemTam.topping.push(topping);

    updateTable();
}







