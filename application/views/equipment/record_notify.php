<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">แจ้งซ่อม</h4>
                <div class="row">
                    <div class="col-12">
                        <div class="table-responsive">
                            <table id="equipment_table" class="table">
                                <thead>
                                    <tr>
                                        <th class='text-center'>รหัสอุปกรณ์</th>
                                        <th class='text-center'>ชื่ออุปกรณ์</th>
                                        <th class='text-center'>รายละเอียด</th>
                                        <th class='text-center'>สถานะ</th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        equipment_table = $('#equipment_table').DataTable({
            ajax: {
                url: "<?php echo site_url("equipment/get_equipment") ?>",
                dataSrc: "data",
            },
            columns: [{
                    data: "id",
                },

                {
                    data: "equipment_name"
                }, {
                    data: "equipment_status"
                },
            ],
            columnDefs: [{
                targets: 3,
                data: "id",
                render: function(data, type, row, meta) {
                    if (row.equipment_status == 'ปกติ') {
                        orderButton = `<div class="dropdown">
                          <button class="btn btn-success dropdown-toggle" type="button" id="dropdownMenuIconButton1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">สถานะ
                          </button>
                          <div class="dropdown-menu" aria-labelledby="dropdownMenuIconButton1">
                            <h6 class="dropdown-header">Settings</h6>
                            <a class="dropdown-item" href="#"onclick="updateStatusNormal('${row.id}')">ปกติ</a>
                            <a class="dropdown-item" href="#"onclick="updateStatusFixing('${row.id}')">กำลังซ่อมแซม</a>
                            <a class="dropdown-item" href="#"onclick="updateStatusNotRent('${row.id}')">ไม่ว่าง</a>
                          </div>
                        </div>`
                        return orderButton;

                    }
                    if (row.equipment_status == 'กำลังซ่อมแซม') {
                        showOrderButton = `
                    <div class="dropdown">
                          <button class="btn btn-warning dropdown-toggle" type="button" id="dropdownMenuIconButton1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">สถานะ
                          </button>
                          <div class="dropdown-menu" aria-labelledby="dropdownMenuIconButton1">
                            <h6 class="dropdown-header">Settings</h6>
                            <a class="dropdown-item" href="#"onclick="updateStatusNormal('${row.id}')">ปกติ</a>
                            <a class="dropdown-item" href="#"onclick="updateStatusFixing('${row.id}')">กำลังซ่อมแซม</a>
                            <a class="dropdown-item" href="#"onclick="updateStatusNotRent('${row.id}')">ไม่ว่าง</a>
                          </div>
                        </div>`
                        return showOrderButton;
                    }
                    if (row.equipment_status == 'ไม่ว่าง') {
                        showOrderButton = `
                    <div class="dropdown">
                          <button class="btn btn-danger dropdown-toggle" type="button" id="dropdownMenuIconButton1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">สถานะ
                          </button>
                          <div class="dropdown-menu" aria-labelledby="dropdownMenuIconButton1">
                            <h6 class="dropdown-header">Settings</h6>
                            <a class="dropdown-item" href="#"onclick="updateStatusNormal('${row.id}')">ปกติ</a>
                            <a class="dropdown-item" href="#"onclick="updateStatusFixing('${row.id}')">กำลังซ่อมแซม</a>
                            <a class="dropdown-item" href="#"onclick="updateStatusNotRent('${row.id}')">ไม่ว่าง</a>
                          </div>
                        </div>`
                        return showOrderButton;
                    }
                },
            }, ],
        });
    });

    function updateStatusNormal(id) {
        var id = id;

        var updateStatus = {
            id: id,
        };
        $.ajax({
            type: "POST",
            url: "<?= site_url("equipment/updateStatusNormal") ?>",
            data: updateStatus,
            dataType: 'json',
            success: function(data) {}
        });
        equipment_table.ajax.reload();
    };

    function updateStatusFixing(id) {
        var id = id;

        var updateStatus = {
            id: id,
        };
        $.ajax({
            type: "POST",
            url: "<?= site_url("equipment/updateStatusFixing") ?>",
            data: updateStatus,
            dataType: 'json',
            success: function(data) {}
        });
        equipment_table.ajax.reload();
    };

    function updateStatusNotRent(id) {
        var id = id;

        var updateStatus = {
            id: id,
        };
        $.ajax({
            type: "POST",
            url: "<?= site_url("equipment/updateStatusNotRent") ?>",
            data: updateStatus,
            dataType: 'json',
            success: function(data) {}
        });
        equipment_table.ajax.reload();
    };
</script>